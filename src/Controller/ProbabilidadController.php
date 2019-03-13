<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Probabilidad;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\RiesgosOportunidades;
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


class ProbabilidadController extends AbstractController
{   
    /**
     * @Route("/probabilidad", name="probabilidad")
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
        $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->findBy(array('estado' => '1'));
        return $this->render('probabilidad/index.html.twig', array('objects' => $probabilidad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/probabilidad_insertar", methods={"POST"}, name="probabilidad_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $valor = $sx['valor'];                
            $probabilidad = new Probabilidad();
            $probabilidad->setNombre($nombre);
            $probabilidad->setDescripcion($descripcion);
            $probabilidad->setValor($valor);
            $probabilidad->setEstado(1);
            $errors = $validator->validate($probabilidad);
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


            $cx->persist($probabilidad);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$probabilidad->getId().".",   
            'success' => true,
            'message' => 'Probabilidad registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/probabilidad_actualizar", methods={"POST"}, name="probabilidad_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $valor = $sx['valor'];

            $probabilidad = new Probabilidad();
            $probabilidad->setId($id);
            $probabilidad->setNombre($nombre);
            $probabilidad->setDescripcion($descripcion);
            $probabilidad->setValor($valor);
            $probabilidad->setEstado(1);
            $errors = $validator->validate($probabilidad);
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
            $cx->merge($probabilidad);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Probabilidad actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/probabilidad_editar", methods={"POST"}, name="probabilidad_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($id);
            $id = $probabilidad->getId();
            $nombre= $probabilidad->getNombre();
            $descripcion = $probabilidad->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($probabilidad, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Probabilidad listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/probabilidad_prev", methods={"POST"}, name="probabilidad_prev")
     */
    public function probabilidad_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('fkprobabilidad' => $id, 'estado' => '1'));
            //dd(sizeof($riesgos));
            if(sizeof($riesgos) == 0){
                $info = array('response'=>"¿Desea dar de baja los datos de la probabilidad?", 'success' => true,
                'message' => 'Baja de probabilidad.');
            }else{
                $vr = "";
                if(sizeof($riesgos) > 0) $vr = " riesgos y oportunidades.";

                $info = array('response'=>"La probabilidad no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros de la probabilidad.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/probabilidad_eliminar", methods={"POST"}, name="probabilidad_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($id);

            $probabilidad->setEstado(0);
            $cx->persist($probabilidad);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$probabilidad->getId().".",'success' => true,
                'message' => 'Probabilidad dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}