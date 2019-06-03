<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoCRO;
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
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class TipoCROController extends AbstractController
{  
    /**
     * @Route("/tipocro", name="tipocro")
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
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->findBy(array('estado' => '1'));
        return $this->render('tipocro/index.html.twig', array('objects' => $tipocro, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipocro_insertar", methods={"POST"}, name="tipocro_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];; 
            
            $tipocro = new TipoCRO();
            $tipocro->setNombre($nombre);
            $tipocro->setDescripcion($descripcion);
            $tipocro->setEstado(1);
            $errors = $validator->validate($tipocro);
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
            $cx->persist($tipocro);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tipocro->getId().".",   
            'success' => true,
            'message' => 'Tipo de riesgo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
     /**
     * @Route("/tipocro_actualizar", methods={"POST"}, name="tipocro_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];; 
            
            $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->find($id);
            $tipocro->setId($id);
            $tipocro->setNombre($nombre);
            $tipocro->setDescripcion($descripcion);
            $tipocro->setEstado(1);
            $errors = $validator->validate($tipocro);
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
            $cx->merge($tipocro);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de riesgo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipocro_editar", methods={"POST"}, name="tipocro_editar")
     */
    public function editar()
    { 
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipocro, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de riesgo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipocro_prev", methods={"POST"}, name="tipocro_prev")
     */
    public function tipocro_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($riesgos) == 0){
                $info = array('response'=>"¿Desea dar de baja al tipo de riesgo?", 'success' => true,
                'message' => 'Baja tipo de riesgo.');
            }else{
                if(sizeof($riesgos) > 0) $vr = " riesgos y oportunidades.";

                $info = array('response'=>"El tipo no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros del tipo de riesgo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipocro_eliminar", methods={"POST"}, name="tipocro_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->find($id);

            $tipocro->setEstado(0);
            $cx->persist($tipocro);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipocro->getId().".",'success' => true,
                'message' => 'Tipo de riesgo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}