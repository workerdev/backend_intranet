<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoCargo;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Cargo;
use App\Entity\PersonalCargo;
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


class TipoCargoController extends AbstractController
{   
    /**
     * @Route("/tipocargo", name="tipocargo")
     * @Method({"GET"})
     */
    public function index()
    {
        $s_user = $this->get('session')->get('s_user');
        if(empty($s_user)){
            $redireccion = new RedirectResponse('/login');
            return $redireccion;
        }
        
        $vid = $s_user[0]['fkrol']['id'];
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
        $tipocargo = $this->getDoctrine()->getRepository(TipoCargo::class)->findBy(array('estado' => '1'));
        return $this->render('tipocargo/index.html.twig', array('objects' => $tipocargo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/tipocargo_insertar", methods={"POST"}, name="tipocargo_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $tipocargo = new TipoCargo();
            $tipocargo->setNombre($nombre);
            $tipocargo->setDescripcion($descripcion);
            $tipocargo->setEstado(1);
            $errors = $validator->validate($tipocargo);
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
            $cx->persist($tipocargo);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tipocargo->getId().".",   
            'success' => true,
            'message' => 'Tipo de cargo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipocargo_actualizar", methods={"POST"}, name="tipocargo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipocargo = $this->getDoctrine()->getRepository(TipoCargo::class)->find($id);
            $tipocargo->setId($id);
            $tipocargo->setNombre($nombre);
            $tipocargo->setDescripcion($descripcion);
            $tipocargo->setEstado(1);
            $errors = $validator->validate($tipocargo);
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
            $cx->merge($tipocargo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de cargo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipocargo_editar", methods={"POST"}, name="tipocargo_editar")
     */
    public function editar()
    { 
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipocargo = $this->getDoctrine()->getRepository(TipoCargo::class)->find($id);
            $id = $tipocargo->getId();
            $nombre= $tipocargo->getNombre();
            $descripcion = $tipocargo->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipocargo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de cargo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tpcargo_prev", methods={"POST"}, name="tpcargo_prev")
     */
    public function tpcargo_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $cargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($cargo) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de cargo?", 'success' => true,
                'message' => 'Baja tipo de cargo.');
            }else{
                if(sizeof($cargo) > 0) $vr = " cargo de personal";

                $info = array('response'=>"El tipo de cargo no se puede eliminar, debido a que tiene relación con los datos".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de cargo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipocargo_eliminar", methods={"POST"}, name="tipocargo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipocargo = $this->getDoctrine()->getRepository(TipoCargo::class)->find($id);

            $tipocargo->setEstado(0);
            $cx->persist($tipocargo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipocargo->getId().".",'success' => true,
                'message' => 'Tipo de cargo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}