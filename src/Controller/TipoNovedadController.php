<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoNovedad;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;


class TipoNovedadController extends AbstractController
{   
    /**
     * @Route("/tiponovedad", name="tiponovedad")
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
        $tiponovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->findBy(array('estado' => '1'));
        return $this->render('tiponovedad/index.html.twig', array('objects' => $tiponovedad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/tiponovedad_insertar", methods={"POST"}, name="tiponovedad_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $tiponovedad = new TipoNovedad();
            $tiponovedad->setNombre($nombre);
            $tiponovedad->setDescripcion($descripcion);
            $tiponovedad->setEstado(1);
            $errors = $validator->validate($tiponovedad);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($tiponovedad);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tiponovedad->getId().".",   
            'success' => true,
            'message' => 'Tipo de novedad registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tiponovedad_actualizar", methods={"POST"}, name="tiponovedad_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tiponovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->find($id);            $tiponovedad->setId($id);
            $tiponovedad->setNombre($nombre);
            $tiponovedad->setDescripcion($descripcion);
            $tiponovedad->setEstado(1);
            $errors = $validator->validate($tiponovedad);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($tiponovedad);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de novedad actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tiponovedad_editar", methods={"POST"}, name="tiponovedad_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tiponovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->find($id);
            $id = $tiponovedad->getId();
            $nombre= $tiponovedad->getNombre();
            $descripcion = $tiponovedad->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tiponovedad, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de novedad listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tiponovedad_eliminar", methods={"POST"}, name="tiponovedad_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tiponovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->find($id);

            $tiponovedad->setEstado(0);
            $cx->persist($tiponovedad);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tiponovedad->getId().".",'success' => true,
                'message' => 'Tipo de novedad dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}