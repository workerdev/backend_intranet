<?php

namespace App\Controller;

use App\Entity\Gerencia;
use App\Entity\Permiso;
use App\Entity\Rol;
use App\Entity\Unidad;
use App\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Ldap\Exception\ConnectionException;
use Symfony\Component\Ldap\Ldap;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;


class SecurityController extends AbstractController
{
    /**
     * @Route("/login", methods={"GET"})
     */
    public function index()
    {
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/sesion4", methods={"POST"}, name="sesion4")
     */
    public function login4()
    {
        $sx = json_decode($_POST['object'], true);
        $process = 'init';

        $user = $_SERVER['LDAPUSER'];
        $password = $_SERVER['LDAPPASS'];

        $usuario = $sx['user'];
        $pass = $sx['password'];

        $translator = new Translator('es_ES');
        $translator->addLoader('array', new ArrayLoader());
        $translator->addResource('array', [
            "Can't contact LDAP server" => "No se puede contactar con el servidor LDAP",
        ], "es_ES");
        $translator->addResource('array', [
            "Invalid credentials" => "Credenciales inválidas",
        ], "es_ES");
        $translator->addResource('array', [
            "Connection timeout" => "No se puede conectar al servidor LDAP",
        ], "es_ES");
        $translator->addResource('array', [
            "The LDAP PHP extension is not enabled." => "La extensión PHP LDAP no está habilitada.",
        ], "es_ES");
        
        try {
            //$dn = "CN=" . $user . ",OU=Personal Regular,OU=UTI,OU=ELFEC,DC=elfec,DC=com";
            $dn="cn=".$user.",CN=Users,DC=elfec,DC=com";

            $process = 'connect';
            $ldap = Ldap::create('ext_ldap', array(
                'host' => $_SERVER['LDAPIP'],
                'encryption' => 'none',
                'port' => $_SERVER['LDAPPORT'],
            ));

            $process = 'validate';
            $ldap->bind($dn, $password);
            
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            $cx = $this->getDoctrine()->getManager();

            /* CARGANDO GERENCIAS **/
            $department = ['department'];
            $query_dep = $ldap->query('DC=elfec,DC=com', '(&(objectCategory=person)(objectClass=user)(department=*))', ['filter' => $department]);
            $results_dep = $query_dep->execute();

            if($results_dep != null){
                foreach ($results_dep as $entry_dep) {
                    $data_dep = $serializer->normalize($entry_dep, null);

                    if (isset($data_dep['attributes']['department'][0])) {
                        $gerencia = $data_dep['attributes']['department'][0];
                        $gerenciabd = $this->getDoctrine()->getRepository(Gerencia::class)->findOneBy(array('estado' => '1', 'nombre' => $gerencia));

                        if (empty($gerenciabd)) {
                            $newgerencia = new Gerencia();
                            $newgerencia->setNombre($gerencia);
                            $newgerencia->setDescripcion('Contenido del AD: '.$gerencia);
                            $newgerencia->setEstado(1);

                            $cx->persist($newgerencia);
                            $cx->flush();
                        }
                    }
                }
            }

            /* CARGANDO UNIDADES **/
            $office = ['physicalDeliveryOfficeName'];
            $query_office = $ldap->query('DC=elfec,DC=com', '(&(objectCategory=person)(objectClass=user)(physicalDeliveryOfficeName=*))', ['filter' => $office]);
            $results_office = $query_office->execute();

            if($results_office != null){
                foreach ($results_office as $entry_office) {
                    $data_office = $serializer->normalize($entry_office, null);

                    if (isset($data_office['attributes']['physicalDeliveryOfficeName'][0])) {
                        $unidad = $data_office['attributes']['physicalDeliveryOfficeName'][0];
                        $unidadbd = $this->getDoctrine()->getRepository(Unidad::class)->findOneBy(array('estado' => '1', 'nombre' => $unidad));
                        
                        if (empty($unidadbd)) {
                            $newunidad = new Unidad();
                            $newunidad->setNombre($unidad);
                            $newunidad->setFkcorrelativo(null);
                            $newunidad->setFksuperior(null);
                            $newunidad->setEstado(1);

                            $cx->persist($newunidad);
                            $cx->flush();
                        }
                    }
                }
            }

            /* VALIDANDO USUARIO **/
            $process = 'consult';
            $attributes = ['givenName' /*Nombres*/, 'sn' /*appellidos*/, 'mail' /*email*/, 'name' /*primernombre*/, 'physicalDeliveryOfficeName' /* cargo */, 'sAMAccountName' /*login*/, 'userPrincipalName' /*loginparaloguear@elfec.com*/];
            $query = $ldap->query('DC=elfec,DC=com', 'sAMAccountName=' . $usuario, ['filter' => $attributes]);
            $results = $query->execute();
        
            if($results != null){
                foreach ($results as $entry) {
                    $data = $serializer->normalize($entry, null);

                    if (array_key_exists("sAMAccountName", $data['attributes'])) {
                        if ($usuario == $data['attributes']['sAMAccountName'][0]) {
                            $dn = $data['dn'];
                            $usuariob = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(array('estado' => '1', 'username' => $usuario));
                            
                            if(!empty($usuariob)) $process = 'username';
                            $ldap->bind($dn, $pass);

                            if (isset($data['attributes']['givenName'][0])) $nombre = $data['attributes']['givenName'][0];
                            else $nombre = 'Sin/Nombre';

                            if (isset($data['attributes']['sn'][0])) $apellido = $data['attributes']['sn'][0];
                            else $apellido = 'Sin/Apellido';

                            if (isset($data['attributes']['title'][0])) $cargo = $data['attributes']['title'][0];
                            $cargo = 'Sin/Cargo';
                            
                            if (isset($data['attributes']['mail'][0])) $correo = $data['attributes']['mail'][0];
                            else $correo = 'Sin/Correo';
                            
                            if (isset($data['attributes']['sAMAccountName'][0])) $username = $data['attributes']['sAMAccountName'][0];
                            else $username = 'Sin/Login';

                            if (empty($usuariob)) {
                                $usuariob = new Usuario();

                                $usuariob->setNombre($nombre);
                                $usuariob->setApellido($apellido);
                                $usuariob->setCargo($cargo);
                                $usuariob->setCorreo($correo);
                                $usuariob->setUsername($username);

                                if (array_key_exists("cn", $data['attributes'])) {
                                    if ($data['attributes']['cn'][0] == 'Administrador') {
                                        $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(array('estado' => '1', 'nombre' => 'Administrador'));
                                    } else {
                                        $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(array('estado' => '1', 'nombre' => 'Usuario'));
                                    }
                                } else {
                                    $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(array('estado' => '1', 'nombre' => 'Usuario'));
                                }
                                $usuariob->setEstado(1);

                                $usuariob->setFkrol($rol);
                                $cx->persist($usuariob);
                                $cx->flush();
                            } else {
                                /*$usuariob->setNombre($nombre);
                                $usuariob->setApellido($apellido);
                                $usuariob->setCargo($cargo);
                                $usuariob->setCorreo($correo);
                                $usuariob->setUsername($username);*/

                                $usuariob->setEstado(1);
                                $cx->merge($usuariob);
                                $cx->flush();
                            }

                            if (isset($data['attributes']['physicalDeliveryOfficeName'][0])) {
                                $unidad = $data['attributes']['physicalDeliveryOfficeName'][0];
                                $unidadEntidad = $this->getDoctrine()->getRepository(Unidad::class)->findOneBy(array('nombre' => $unidad, 'estado' => '1'));

                                if($unidadEntidad != null){
                                    $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fkusuario' => $usuariob->getId(), 'fkunidad' => $unidadEntidad->getId(), 'estado' => '1'));
                                    
                                    if (empty($permiso)) {
                                        $newpermiso = new Permiso();
                                        $newpermiso->setFkunidad($unidadEntidad);
                                        $newpermiso->setFkusuario($usuariob);
                                        $newpermiso->setTipo('Completo');
                                        $newpermiso->setEstado(1);

                                        $cx->persist($newpermiso);
                                        $cx->flush();
                                    }
                                }
                            }
                            
                            $duser = $serializer->normalize($usuariob, null);
                            $session = new Session();
                            $session->set('s_user', $duser);
                            $s_user = $session->get('s_user');

                            $mensaje = "exitoso";
                            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                            
                            $resultado = array('response' => $mensaje, 'success' => true, 'message' => 'sesion exitosa.', 'process' => $process);
                            $resultado = json_encode($resultado);

                            return new Response($resultado);
                        }
                    }
                }
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response' => 'error', 'success' => false,
                    'message' => 'error', 'info' => 'Datos de usuario incorrectos', 'ldap_msg' => '', 'process' => $process);
                $resultado = json_encode($resultado);

                return new Response($resultado);
            }else{
                $respuesta = array('info' => 'No existen datos en el AD para la consulta realizada.', 'process' => $process, 'success' => false, 'message' => 'error', 'response' => 'error');
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = json_encode($respuesta);

                return new Response($resultado);
            }
            
            throw new Exception();
        } 
        catch (ConnectionException $ce) {
            if ($process == 'username') $ldap_msg = "Contraseña incorrecta";
            else {
                if ($process == 'validate') $ldap_msg = "Error al consultar los datos del AD";
                else{
                    $process = 'exception';
                    $ldap_msg = $ce->getMessage();
                }
            }
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response' => $mensaje, 'success' => false,
                'message' => 'error', 'ldap_msg' => $translator->trans($ldap_msg), 'info' => '', 'process' => $process);
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } 
        catch (Exception $e) {
            $respuesta = array('info' => $e->getMessage(), 'process' => $process, 'success' => false, 'message' => 'exception', 'response' => 'error');
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = json_encode($respuesta);

            return new Response($resultado);
        }
    }
    
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        $this->get('session')->invalidate();
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/valid_action4", methods={"POST"}, name="valid_action4")
     */
    public function action4()
    {
        $sx = json_decode($_POST['object'], true);

        $user = $_SERVER['LDAPUSER'];
        $password = $_SERVER['LDAPPASS'];

        $s_user = $this->get('session')->get('s_user');
        $usuario = $s_user['username'];
        $pass = $sx['password'];

        //$dn = "CN=" . $user . ",OU=Personal Regular,OU=UTI,OU=ELFEC,DC=elfec,DC=com";
        $dn="cn=".$user.",CN=Users,DC=elfec,DC=com";

        $ldap = Ldap::create('ext_ldap', array(
            'host' => $_SERVER['LDAPIP'],
            'encryption' => 'none',
            'port' => $_SERVER['LDAPPORT'],
        ));

        try {
            if (empty($usuario) || empty($pass)) {
                $mensaje = "vacio";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response' => $mensaje, 'success' => true,
                    'message' => 'Ingrese los datos requeridos.');
                $resultado = json_encode($resultado);
                return new Response($mensaje);
            }
            $ldap->bind($dn, $password);

            $attributes = ['dn', 'sAMAccountName'];
            $query = $ldap->query('DC=elfec,DC=com', 'sAMAccountName=' . $usuario, ['filter' => $attributes]);
            $results = $query->execute();

            if($results != null){
                foreach ($results as $entry) {
                    $entry; // Do something with the results
                    $encoders = [new XmlEncoder(), new JsonEncoder()];
                    $normalizers = [new ObjectNormalizer()];

                    $serializer = new Serializer($normalizers, $encoders);
                    $data = $serializer->normalize($entry, null);

                    if (array_key_exists("sAMAccountName", $data['attributes'])) {
                        if ($usuario == $data['attributes']['sAMAccountName'][0]) {
                            $dn = $data['dn'];
                            $ldap->bind($dn, $pass);

                            $mensaje = "exitoso";
                            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                            $resultado = array('response' => $mensaje, 'success' => true,
                                'message' => 'sesion exitosa.');
                            $resultado = json_encode($resultado);

                            return new Response($mensaje);
                        }
                    }
                }
            }
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response' => $mensaje, 'success' => true, 'message' => 'Failed.');
            $resultado = json_encode($resultado);

            return new Response($mensaje);
        } catch (ConnectionException $ce) {
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response' => $mensaje, 'success' => true,
                'message' => 'Failed.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
        }
    }

    /**
     * @Route("/sesion", methods={"POST"}, name="sesion")
     */
    public function login()
    {
        $sx = json_decode($_POST['object'], true);

        $usuario = $sx['user'];
        $pass = $sx['password'];

        try {
            $usuariob = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1', 'username' => $usuario, 'password' => $pass));
            $cx = $this->getDoctrine()->getManager();

            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            if (empty($usuariob)) {
                $mensaje = "error";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response' => $mensaje, 'success' => false,
                    'message' => 'error');
                $resultado = json_encode($resultado);

                return new Response($resultado);
            } else {
                $duser = $serializer->normalize($usuariob[0], null);
                $session = new Session();
                $session->set('s_user', $duser);
                $s_user = $session->get('s_user');

                $mensaje = "exitoso";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response' => $mensaje, 'success' => true,
                    'message' => 'sesion exitosa.');
                $resultado = json_encode($resultado);

                return new Response($resultado);
            }
        } catch (ConnectionException $ce) {
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response' => $mensaje, 'success' => false,
                'message' => 'error');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        }
    }
    
    /**
     * @Route("/valid_action", methods={"POST"}, name="valid_action")
     */
    public function action()
    {
        $sx = json_decode($_POST['object'], true);

        $s_user = $this->get('session')->get('s_user');
        $usuario = $s_user['username'];
        $pass = $sx['password'];

        try {
            $usuariob = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1', 'username' => $usuario, 'password' => $pass));
            $cx = $this->getDoctrine()->getManager();

            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            if (empty($usuario) || empty($pass)) {
                $mensaje = "vacio";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));

                $resultado = array('response' => $mensaje, 'success' => true,
                    'message' => 'Ingrese los datos requeridos.');
                $resultado = json_encode($resultado);

                return new Response($mensaje);
            } else {
                if (empty($usuariob)) {
                    $mensaje = "error";
                    $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                    $resultado = array('response' => $mensaje, 'success' => true,
                        'message' => 'Failed.');
                    $resultado = json_encode($resultado);
                    return new Response($mensaje);
                } else {
                    $mensaje = "exitoso";
                    $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                    $resultado = array('response' => $mensaje, 'success' => true,
                        'message' => 'sesion exitosa.');
                    $resultado = json_encode($resultado);
                    return new Response($mensaje);
                }
            }
        } catch (ConnectionException $ce) {
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response' => $mensaje, 'success' => true,
                'message' => 'Failed.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
        }
    }
}