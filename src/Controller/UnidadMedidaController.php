<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\UnidadMedida;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\IndicadorProceso;
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


class UnidadMedidaController extends AbstractController
{   
    /**
     * @Route("/unidadmedida", name="unidadmedida")
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
        $unidadmedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->findBy(array('estado' => '1'));
        return $this->render('unidadmedida/index.html.twig', array('objects' => $unidadmedida, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/unidadmedida_insertar", methods={"POST"}, name="unidadmedida_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $sigla = $sx['sigla'];                 
            $unidadmedida = new UnidadMedida();
            $unidadmedida->setNombre($nombre);
            $unidadmedida->setDescripcion($descripcion);
            $unidadmedida->setSigla($sigla);
            $unidadmedida->setEstado(1);
            $errors = $validator->validate($unidadmedida);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($unidadmedida);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$unidadmedida->getId().".",   
            'success' => true,
            'message' => 'Unidad de medida registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/unidadmedida_actualizar", methods={"POST"}, name="unidadmedida_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $sigla = $sx['sigla'];

            $unidadmedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($id);
            $unidadmedida->setId($id);
            $unidadmedida->setNombre($nombre);
            $unidadmedida->setDescripcion($descripcion);
            $unidadmedida->setSigla($sigla);
            $unidadmedida->setEstado(1);
            $errors = $validator->validate($unidadmedida);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($unidadmedida);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Unidad de medida actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/unidadmedida_editar", methods={"POST"}, name="unidadmedida_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $unidadmedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($id);
            $id = $unidadmedida->getId();
            $nombre= $unidadmedida->getNombre();
            $descripcion = $unidadmedida->getDescripcion();
            $sigla = $unidadmedida->getSigla();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($unidadmedida, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Unidad de medida listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/unidad_prev", methods={"POST"}, name="unidad_prev")
     */
    public function unidad_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $indicador = $this->getDoctrine()->getRepository(IndicadorProceso::class)->findBy(array('fkunidad' => $id, 'estado' => '1'));
            
            if(sizeof($indicador) == 0){
                $info = array('response'=>"¿Desea dar de baja la unidad de medida?", 'success' => true,
                'message' => 'Baja unidad de medida.');
            }else{
                if(sizeof($indicador) > 0) $vr = " indicador de proceso";

                $info = array('response'=>"La unidad de medida no se puede eliminar, debido a que tiene relación con los datos ".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros de la unidad de medida.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/unidadmedida_eliminar", methods={"POST"}, name="unidadmedida_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $unidadmedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($id);

            $unidadmedida->setEstado(0);
            $cx->persist($unidadmedida);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$unidadmedida->getId().".",'success' => true,
                'message' => 'Unidad de medida dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}