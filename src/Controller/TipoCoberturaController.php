<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoCobertura;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Cobertura;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Rol;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class TipoCoberturaController extends AbstractController
{   
    /**
     * @Route("/tipocobertura", name="tipocobertura")
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
        
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $tipocobertura = $this->getDoctrine()->getRepository(TipoCobertura::class)->findBy(array('estado' => '1'));
        return $this->render('tipocobertura/index.html.twig', array('objects' => $tipocobertura, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipocobertura_insertar", methods={"POST"}, name="tipocobertura_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $TipoCobertura = new TipoCobertura();
            $TipoCobertura->setNombre($nombre);
            $TipoCobertura->setDescripcion($descripcion);
            $TipoCobertura->setEstado(1);
            $errors = $validator->validate($TipoCobertura);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($TipoCobertura);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$TipoCobertura->getId().".",   
            'success' => true,
            'message' => 'Tipo de cobertura registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipocobertura_actualizar", methods={"POST"}, name="tipocobertura_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $TipoCobertura = $this->getDoctrine()->getRepository(TipoCobertura::class)->find($id);
            $TipoCobertura->setId($id);
            $TipoCobertura->setNombre($nombre);
            $TipoCobertura->setDescripcion($descripcion);
            $TipoCobertura->setEstado(1);
            $errors = $validator->validate($TipoCobertura);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->merge($TipoCobertura);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de cobertura actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipocobertura_editar", methods={"POST"}, name="tipocobertura_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $TipoCobertura = $this->getDoctrine()->getRepository(TipoCobertura::class)->find($id);
            $id = $TipoCobertura->getId();
            $nombre= $TipoCobertura->getNombre();
            $descripcion = $TipoCobertura->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($TipoCobertura, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de cobertura listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipocob_prev", methods={"POST"}, name="tipocob_prev")
     */
    public function tipocob_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $cobertura = $this->getDoctrine()->getRepository(Cobertura::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($Cobertura) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de cobertura?", 'success' => true,
                'message' => 'Baja tipo de cobertura.');
            }else{
                if(sizeof($cobertura) > 0) $vr = " cobertura";

                $info = array('response'=>"El tipo de cobertura no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de cobertura.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipocobertura_eliminar", methods={"POST"}, name="tipocobertura_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $TipoCobertura = $this->getDoctrine()->getRepository(TipoCobertura::class)->find($id);

            $TipoCobertura->setEstado(0);
            $cx->persist($TipoCobertura);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$TipoCobertura->getId().".",'success' => true,
                'message' => 'Tipo de cobertura dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}