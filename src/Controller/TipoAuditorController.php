<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoAuditor;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\AuditoriaEquipo;
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
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

class TipoAuditorController extends AbstractController
{   
    /**
     * @Route("/tipoauditor", name="tipoauditor")
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
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $tipoauditor = $this->getDoctrine()->getRepository(TipoAuditor::class)->findBy(array('estado' => '1'));
        return $this->render('tipoauditor/index.html.twig', array('objects' => $tipoauditor, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipoauditor_insertar", methods={"POST"}, name="tipoauditor_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $tipoauditor = new TipoAuditor();
            $tipoauditor->setNombre($nombre);
            $tipoauditor->setDescripcion($descripcion);
            $tipoauditor->setEstado(1);
            $errors = $validator->validate($tipoauditor);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($tipoauditor);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tipoauditor->getId().".",   
            'success' => true,
            'message' => 'Tipo de auditor registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipoauditor_actualizar", methods={"POST"}, name="tipoauditor_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipoauditor = $this->getDoctrine()->getRepository(TipoAuditor::class)->find($id);
            $tipoauditor->setId($id);
            $tipoauditor->setNombre($nombre);
            $tipoauditor->setDescripcion($descripcion);
            $tipoauditor->setEstado(1);
            $errors = $validator->validate($tipoauditor);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($tipoauditor);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de auditor actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoauditor_editar", methods={"POST"}, name="tipoauditor_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipoauditor = $this->getDoctrine()->getRepository(TipoAuditor::class)->find($id);
            $id = $tipoauditor->getId();
            $nombre= $tipoauditor->getNombre();
            $descripcion = $tipoauditor->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipoauditor, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de auditor listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tpauditor_prev", methods={"POST"}, name="tpauditor_prev")
     */
    public function tpauditor_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($equipo) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de auditor?", 'success' => true,
                'message' => 'Baja tipo de auditor.');
            }else{
                if(sizeof($equipo) > 0) $vr = " equipo de auditoría";

                $info = array('response'=>"El tipo de auditoría no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de auditor.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipoauditor_eliminar", methods={"POST"}, name="tipoauditor_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipoauditor = $this->getDoctrine()->getRepository(TipoAuditor::class)->find($id);

            $tipoauditor->setEstado(0);
            $cx->persist($tipoauditor);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipoauditor->getId().".",'success' => true,
                'message' => 'Tipo de auditor dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}