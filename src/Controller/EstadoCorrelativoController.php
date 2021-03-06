<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\EstadoCorrelativo;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Entity\Correlativo;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class EstadoCorrelativoController extends AbstractController
{   
    /**
     * @Route("/estadocorrelativo", name="estadocorrelativo")
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
        
        $estadocorrelativo = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('estadocorrelativo/index.html.twig', array('objects' => $estadocorrelativo, 'parents' => $parent, 'children' => $child, 'options' => $option, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/estadocorrelativo_insertar", methods={"POST"}, name="estadocorrelativo_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $estadocorrelativo = new EstadoCorrelativo();
            $estadocorrelativo->setNombre($nombre);
            $estadocorrelativo->setDescripcion($descripcion);
            $estadocorrelativo->setEstado(1);
            $errors = $validator->validate($estadocorrelativo);
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
            $cx->persist($estadocorrelativo);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$estadocorrelativo->getId().".",   
            'success' => true,
            'message' => 'Estado correlativo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/estadocorrelativo_actualizar", methods={"POST"}, name="estadocorrelativo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $estadocorrelativo = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->find($id);
            $estadocorrelativo->setId($id);
            $estadocorrelativo->setNombre($nombre);
            $estadocorrelativo->setDescripcion($descripcion);
            $estadocorrelativo->setEstado(1);
            $errors = $validator->validate($estadocorrelativo);
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
            $cx->merge($estadocorrelativo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Estado correlativo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadocorrelativo_editar", methods={"POST"}, name="estadocorrelativo_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $estadocorrelativo = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->find($id);
            $id = $estadocorrelativo->getId();
            $nombre= $estadocorrelativo->getNombre();
            $descripcion = $estadocorrelativo->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($estadocorrelativo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Estado correlativo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadocorrelativo_eliminar", methods={"POST"}, name="estadocorrelativo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $estadocorrelativo = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->find($id);

            $estadocorrelativo->setEstado(0);
            $cx->persist($estadocorrelativo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$estadocorrelativo->getId().".",'success' => true,
                'message' => 'Estado correlativo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/estadocrtv_prev", methods={"POST"}, name="estadocrtv_prev")
     */
    public function estadocrtv_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findBy(array('fkestado' => $id, 'estado' => '1'));
            
            if(sizeof($correlativo) == 0){
                $info = array('response'=>"¿Desea dar de baja el estado correlativo?", 'success' => true,
                'message' => 'Baja estado correlativo.');
            }else{
                if(sizeof($correlativo) > 0) $vr = " correlativo";

                $info = array('response'=>"El estado correlativo no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al estado correlativo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}