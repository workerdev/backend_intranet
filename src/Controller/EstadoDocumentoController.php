<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\EstadoDocumento;
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


class EstadoDocumentoController extends AbstractController
{   
    /**
     * @Route("/estadodocumento", name="estadodocumento")
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
        $estadodocumento = $this->getDoctrine()->getRepository(EstadoDocumento::class)->findBy(array('estado' => '1'));
        return $this->render('estadodocumento/index.html.twig', array('objects' => $estadodocumento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/estadodocumento_insertar", methods={"POST"}, name="estadodocumento_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $estadodocumento = new EstadoDocumento();
            $estadodocumento->setNombre($nombre);
            $estadodocumento->setDescripcion($descripcion);
            $estadodocumento->setEstado(1);
            $errors = $validator->validate($estadodocumento);
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
            $cx->persist($estadodocumento);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$estadodocumento->getId().".",   
            'success' => true,
            'message' => 'Estado del documento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/estadodocumento_actualizar", methods={"POST"}, name="estadodocumento_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $estadodocumento = new EstadoDocumento();
            $estadodocumento = $this->getDoctrine()->getRepository(EstadoDocumento::class)->find($id);
            $estadodocumento->setId($id);
            $estadodocumento->setNombre($nombre);
            $estadodocumento->setDescripcion($descripcion);
            $estadodocumento->setEstado(1);
            $errors = $validator->validate($estadodocumento);
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
            $cx->merge($estadodocumento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Estado del documento actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadodocumento_editar", methods={"POST"}, name="estadodocumento_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $estadodocumento = $this->getDoctrine()->getRepository(EstadoDocumento::class)->find($id);
            $id = $estadodocumento->getId();
            $nombre= $estadodocumento->getNombre();
            $descripcion = $estadodocumento->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($estadodocumento, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Estado del documento listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadodocumento_eliminar", methods={"POST"}, name="estadodocumento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $estadodocumento = $this->getDoctrine()->getRepository(EstadoDocumento::class)->find($id);

            $estadodocumento->setEstado(0);
            $cx->persist($estadodocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$estadodocumento->getId().".",'success' => true,
                'message' => 'Estado del documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}