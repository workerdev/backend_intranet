<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Gerencia;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\GerenciaAreaSector;
use App\Entity\Rol;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Ldap\Ldap;

use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Ldap\Exception\ConnectionException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;


class GerenciaController extends AbstractController
{   
    /**
     * @Route("/gerencia", name="gerencia")
     * @Method({"GET"})
     */
    public function index()
    {
        $s_user = $this->get('session')->get('s_user');
        if(empty($s_user)){
            $redireccion = new RedirectResponse('/login');
            return $redireccion;
        }
        
        $vid = $s_user['fkrol']['id'];
        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('id' => $vid, 'estado' => '1'));
        $accesos = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('fkrol' => $rol[0]));

        $mods = array();
        foreach ($accesos as $access) {
            $accdt = (object) $access;
            $item = $this->getDoctrine()->getRepository(Modulo::class)->find($accdt->getFkmodulo()->getId());
            $mods[] = $item;
        }
        $parent = $mods;
        $child = $mods;
        $permisos = array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }
        $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->findBy(array('estado' => '1'));
        return $this->render('gerencia/index.html.twig', 
        array('objects' => $gerencia, 
              'parents' => $parent, 
              'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/gerencia_insertar", methods={"POST"}, name="gerencia_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
          /*$dn="cn=read-only-admin,dc=example,dc=com";
            $password= 'password1';
           
           
           
            $ldap = Ldap::create('ext_ldap', array(
                'host' => 'ldap.forumsys.com',
                'encryption' => 'none',
                'port' => '389',
            ));
            
        
            
        //    $ldap = Ldap::create('ext_ldap', ['connection_string' => 'ldaps://my-server:636']);

            
        try {
            $ldap->bind($dn, $password);
            $query =  $ldap->query('dc=example,dc=com', '(&(ou=mathematicians))');
            $results = $query->execute()->toArray();
            return $ldap;
        }
        catch (ConnectionException $ce) {
            return 'ERRROSANGO'; // dd('Credenciales invalidas jejejjejejej');
            throw $ce;
        }*/
              
          
            
//foreach ($results as $entry) {
    // Do something with the results
//}
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $gerencia = new Gerencia();
            $gerencia->setNombre($nombre);
            $gerencia->setDescripcion($descripcion);
            $gerencia->setEstado(1);
            $errors = $validator->validate($gerencia);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                    // dd($e->getMessage());
                    // dd($e->getPropertyPath()) ;
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($gerencia);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$gerencia->getId().".",   
            'success' => true,
            'message' => 'Gerencia registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/gerencia_actualizar", methods={"POST"}, name="gerencia_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($id);
            $gerencia->setId($id);
            $gerencia->setNombre($nombre);
            $gerencia->setDescripcion($descripcion);
            $gerencia->setEstado(1);
            $errors = $validator->validate($gerencia);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                    // dd($e->getMessage());
                    // dd($e->getPropertyPath()) ;
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($gerencia);
            $cx->flush();
            $resultado = array('success' => true,
                    'message' => 'Gerencia actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/gerencia_editar", methods={"POST"}, name="gerencia_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($id);
            $id = $gerencia->getId();
            $nombre= $gerencia->getNombre();
            $descripcion = $gerencia->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($gerencia, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Gerencia listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/gerencia_prev", methods={"POST"}, name="gerencia_prev")
     */
    public function gerencia_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $gas = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->findBy(array('fkgerencia' => $id, 'estado' => '1'));
            
            if(sizeof($gas) == 0){
                $info = array('response'=>"¿Desea dar de baja la gerencia?", 'success' => true,
                'message' => 'Baja de la gerencia.');
            }else{
                if(sizeof($gas) > 0) $vr = " gerencia, área y sector";

                $info = array('response'=>"La gerencia no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros de la gerencia.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/gerencia_eliminar", methods={"POST"}, name="gerencia_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($id);

            $gerencia->setEstado(0);
            $cx->persist($gerencia);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$gerencia->getId().".",'success' => true,
                'message' => 'Gerencia dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}