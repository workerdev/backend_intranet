<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Ldap\Ldap;
use Symfony\Component\Ldap\Adapter\ExtLdap\Adapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Rol;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Ldap\Exception\ConnectionException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;


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
     * @Route("/sesion", methods={"POST"}, name="sesion")
     */
    public function login()
    {   
        $sx = json_decode($_POST['object'], true);
        
        $user ='charly campos'; 
        $password ='P@ssw0rd';

        $usuario = $sx['user'];
        $pass = $sx['password'];

        $dn="cn=".$user.",CN=Users,DC=elfec,DC=com";
       
        $ldap = Ldap::create('ext_ldap', array(
            //'host' => '192.168.0.20',
            'host' => '172.17.1.150',
            'encryption' => 'none',
            'port' => '389',
        ));
    
        $aux;
        $attributes = ['givenName'/*Nombres*/, 'sn'/*appellidos*/, 'mail'/*email*/,'name'/*primernombre*/, 'physicalDeliveryOfficeName'/* cargo */,'samAccountName'/*login*/,'userPrincipalName'/*loginparaloguear@elfec.com*/];
  
        $ldap->bind($dn, $password);
        
        $query =  $ldap->query('DC=elfec,DC=com', 'samaccountname='.$usuario, ['filter' => $attributes]);
        
        $results = $query->execute();
        try{
            foreach ($results as $entry) {
                $entry;  // Do something with the results
                $encoders = [new XmlEncoder(), new JsonEncoder()];
                $normalizers = [new ObjectNormalizer()];

                $serializer = new Serializer($normalizers, $encoders);
                $data = $serializer->normalize($entry, null);
                
                if($ayudanombre= array_key_exists("sAMAccountName",$data['attributes'])) { 
                    if($usuario==$data['attributes']['sAMAccountName'][0]) {
                        $dn=$data['dn'];
                        $ldap->bind($dn, $pass);
                        
                        $usuariob = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1', 'username'=>$usuario));
                        $cx = $this->getDoctrine()->getManager();

                        $encoders = [new XmlEncoder(), new JsonEncoder()];
                        $normalizers = [new ObjectNormalizer()];
                        $serializer = new Serializer($normalizers, $encoders);
                        

                        if(empty($usuariob)) {
                            $usuariob = new Usuario();
                            if(isset($data['attributes']['givenName'][0])) {
                                $usuariob->setNombre($data['attributes']['givenName'][0]);
                            }else {
                                $usuariob->setNombre('S/N');
                            }
                            if(isset($data['attributes']['sn'][0])) {
                                $usuariob->setApellido($data['attributes']['sn'][0]);
                            }else{
                                $usuariob->setApellido('S/A');
                            }
                            if(isset($data['attributes']['mail'][0])) {
                                $usuariob->setCorreo($data['attributes']['mail'][0]);
                            }else{
                                $usuariob->setCorreo('S/Correo');
                            }
                            if($data['attributes']['name'][0]) {
                                $usuariob->setUsername($data['attributes']['name'][0]);
                            }else {
                                $usuariob->setUsername('Sin login');
                            }
                        
                            if( $ayudanombre= array_key_exists("cn",$data['attributes'] ))  {   
                                if($data['attributes']['cn'][0]== 'Administrador') {
                                    $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Administrador'));
                                }else{
                                    $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Usuario')); 
                                }
                            }else {
                                $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre'=>'Usuario'));
                            }
                            $usuariob->setEstado(1); 
                        
                            $usuariob->setFkrol($rol[0]);
                            $cx->persist($usuariob);
                            $cx->flush(); 
                            
                            $duser = $serializer->normalize($usuariob, null);
                        }else {
                            if(isset($data['attributes']['givenName'][0])){
                                $usuariob[0]->setNombre($data['attributes']['givenName'][0]);
                            }else {
                                $usuariob[0]->setNombre('S/N');
                            }
                            if(isset($data['attributes']['sn'][0])){
                                $usuariob[0]->setApellido($data['attributes']['sn'][0]);
                            }else {
                                $usuariob[0]->setApellido('S/Apellido');
                            }
                            if(isset($data['attributes']['mail'][0])){
                                $usuariob[0]->setCorreo($data['attributes']['mail'][0]);
                            }else {
                                $usuariob[0]->setCorreo('S/Correo');
                            }
                            if(isset($data['attributes']['name'][0])){ 
                                $usuariob[0]->setUsername($data['attributes']['name'][0]);
                            }else{ 
                                $usuariob[0]->setUsername('S/Login');
                            }
                            
                            $usuariob[0]->setEstado(1);  
                            $cx->persist($usuariob[0]);
                            $cx->flush(); 
                            
                            $duser = $serializer->normalize($usuariob[0], null);
                        }
                        $session = new Session();
                        $session->set('s_user', $duser);
                        
                        $s_user = $session->get('s_user');

                        $mensaje = "exitoso";
                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                        $resultado = array('response'=>$mensaje,'success' => true,
                            'message' => 'sesion exitosa.');
                        $resultado = json_encode($resultado);
                        return new Response($resultado);
                    }
                }
            } 
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => false,
                'message' => 'error', 'info'=>$aux);
            $resultado = json_encode($resultado);
            
            return new Response($resultado);       

        }catch(ConnectionException $ce){
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => false,
                'message' => 'error', 'info'=>$aux);
            $resultado = json_encode($resultado);
            
            return new Response($resultado);       
        }  
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logout() {
        $this->get('session')->invalidate();
        return $this->render('security/login.html.twig');
    }
    

    
    
    
    /**
     * @Route("/valid_action", methods={"POST"}, name="valid_action")
     */
    public function action()
    {   
        $sx = json_decode($_POST['object'], true);

        $user ='Administrador'; 
        $password ='P@ssw0rd';
        
        $s_user = $this->get('session')->get('s_user');
        $usuario = $s_user['username'];
        $pass = $sx['password'];

        $dn="cn=".$user.",CN=Users,DC=elfec,DC=com";
       
        $ldap = Ldap::create('ext_ldap', array(
            //'host' => '192.168.0.20',
            'host' => '172.17.1.150',
            
            'encryption' => 'none',
            'port' => '389',
        ));

        try {
            if(empty($usuario) || empty($pass)) {
                $mensaje = "vacio";
                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $resultado = array('response'=>$mensaje,'success' => true,
                    'message' => 'Ingrese los datos requeridos.');
                $resultado = json_encode($resultado);
                return new Response($mensaje);
            }
            $ldap->bind($dn, $password);

            $attributes = ['dn','sAMAccountName'];
            $query =  $ldap->query('DC=elfec,DC=com', 'objectclass=person', ['filter' => $attributes]);
            $results = $query->execute();

            foreach ($results as $entry) {
                $entry;  // Do something with the results
                $encoders = [new XmlEncoder(), new JsonEncoder()];
                $normalizers = [new ObjectNormalizer()];

                $serializer = new Serializer($normalizers, $encoders);
                $data = $serializer->normalize($entry, null);
                
                if($ayudanombre= array_key_exists("sAMAccountName",$data['attributes'])) { 
                    if($usuario==$data['attributes']['sAMAccountName'][0]) {
                        $dn=$data['dn'];
                        $ldap->bind($dn, $pass);
                        $mensaje = "exitoso";
                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                        $resultado = array('response'=>$mensaje,'success' => true,
                            'message' => 'sesion exitosa.');
                        $resultado = json_encode($resultado);
                        return new Response($mensaje);
                    }
                }
            }            
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => true,
                'message' => 'Failed.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
            
         
        }
        catch (ConnectionException $ce) {
            $mensaje = "error";
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $resultado = array('response'=>$mensaje,'success' => true,
                'message' => 'Failed.');
            $resultado = json_encode($resultado);
            return new Response($mensaje);
        }
    }
}