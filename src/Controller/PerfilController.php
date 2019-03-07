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


class PerfilController extends AbstractController
{   
    private $encoder;
    
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }
    
    /**
     * @Route("/perfil", name="perfil")
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
        $idu = $s_user['id'];
        $user = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('id' => $idu, 'estado' => '1'));
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

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('perfil/index.html.twig', array('profile' => $user[0], 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }
    
    /**
     * @Route("/perfil_actualizar", methods={"POST"}, name="perfil_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $apellido = $sx['apellido'];
            $ci = $sx['ci'];
            $correo = $sx['correo'];
            $username = $sx['username'];                
            $password = $sx['password'];
            
            $rol = $sx['rol'];

            $usuario = new Usuario();
            $usuario->setId($id);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido);
            $usuario->setCi($ci);
            $usuario->setCorreo($correo);
            $usuario->setUsername($username);
            $usuario->setPassword(
                $this->encoder->encodePassword($usuario, $password)
            );
            $usuario->setEstado(1);

            $rol = $this->getDoctrine()->getRepository(Rol::class)->find($rol);
            $usuario->setFkrol($rol);

            $cx->merge($usuario);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Perfil actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
            $cx->getConnection()->close();
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/usuario_update_profile", methods={"POST"}, name="usuario_update_profile")
     */
    public function usuario_update_profile()
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
     * @Route("/usuario_update_password", methods={"POST"}, name="usuario_update_password")
     */
    public function usuario_update_password()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            
            $id = $sx['id'];
            $new_password = $sx['new_password'];
            $new_password_2 = $sx['new_password_2'];

            if ($new_password == $new_password_2)
            {
                $cx = $this->getDoctrine()->getManager();
                $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);
                $usuario->setPassword($this->encoder->encodePassword($usuario, $new_password));
                $cx->persist($usuario);
                $cx->flush();

                $resultado = array('success' => true,
                'message' => 'Contraseña cambiada correctamente.');
            }
            else
            {
                $resultado = array('success' => false,
                'message' => 'Datos incorrectos.');
            }
            
            $resultado = json_encode($resultado);
            return new Response($resultado);
            $cx->getConnection()->close();
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}