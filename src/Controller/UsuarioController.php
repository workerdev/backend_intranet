<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Rol;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UsuarioController extends AbstractController
{   
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    
    /**
     * @Route("/usuario", name="usuario")
     * @Method({"GET"})
     */
    public function index()
    {  $s_user = $this->get('session')->get('s_user');
        if(empty($s_user)){
            $redireccion = new RedirectResponse('/login');
            return $redireccion;
        }
        
        $vid = $s_user['fkrol']['id'];
        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('id' => $vid, 'estado' => '1'));
        $accesos = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('fkrol' => $rol[0]));
        $mods = array();
        $children = array();
        $options = array();
        foreach ($accesos as $access) {
            $accdt = (object) $access;
            $item = $this->getDoctrine()->getRepository(Modulo::class)->find($accdt->getFkmodulo()->getId());
            $mods[] = $item;
        }
        $parent = $mods;
        $child = $mods;
        $option = $mods;

        $permisos = array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }
        
        $usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('usuario/index.html.twig', array('objects' => $usuario, 'rol' => $rol, 'parents' => $parent, 'children' => $child, 'options' => $option, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/usuario_insertar", methods={"POST"}, name="usuario_insertar")
     */
    public function insertar(Request $request )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $apellido = $sx['apellido'];
            $correo = $sx['correo'];
            $username = $sx['username'];                
            $password = $sx['password']; 
            
            $rol = $sx['rol'];

            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setCorreo($correo);
            $usuario->setUsername($username);
            $usuario->setPassword(
                $this->encoder->encodePassword($usuario, $password)
            );
            $usuario->setEstado(1);  
            
            $rol = $this->getDoctrine()->getRepository(Rol::class)->find($rol);
            $usuario->setFkrol($rol);

            $cx->persist($usuario);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$usuario->getId().".",   
            'success' => true,
            'message' => 'Usuario registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/usuario_actualizar", methods={"POST"}, name="usuario_actualizar")
     */
    public function actualizar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            
            $id = $sx['id'];
            $apellido = $sx['apellido'];
            $nombre = $sx['nombre'];
            $correo = $sx['correo'];

            $cx = $this->getDoctrine()->getManager();
            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setCorreo($correo);
            $cx->persist($usuario);
            $cx->flush();

            $resultado = array('success' => true,
            'message' => 'Datos actualizados correctamente.');             
            
            $resultado = json_encode($resultado);
            return new Response($resultado);
            $cx->getConnection()->close();
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/usuario_editar", methods={"POST"}, name="usuario_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($usuario, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Usuario listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/usuario_eliminar", methods={"POST"}, name="usuario_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);

            $usuario->setEstado(2);
            $cx->persist($usuario);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$usuario->getId().".",'success' => true,
                'message' => 'Usuario dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}