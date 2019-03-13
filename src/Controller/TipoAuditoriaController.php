<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoAuditoria;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Auditoria;
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


class TipoAuditoriaController extends AbstractController
{   
    /**
     * @Route("/tipoauditoria", name="tipoauditoria")
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
        
        $tipoauditoria = $this->getDoctrine()->getRepository(TipoAuditoria::class)->findBy(array('estado' => '1'));
        return $this->render('tipoauditoria/index.html.twig', array('objects' => $tipoauditoria, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipoauditoria_insertar", methods={"POST"}, name="tipoauditoria_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $tipoauditoria = new TipoAuditoria();
            $tipoauditoria->setNombre($nombre);
            $tipoauditoria->setDescripcion($descripcion);
            $tipoauditoria->setEstado(1);
            $errors = $validator->validate($tipoauditoria);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($tipoauditoria);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tipoauditoria->getId().".",   
            'success' => true,
            'message' => 'Tipo de auditoría registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipoauditoria_actualizar", methods={"POST"}, name="tipoauditoria_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipoauditoria = $this->getDoctrine()->getRepository(TipoAuditoria::class)->find($id);
            $tipoauditoria->setId($id);
            $tipoauditoria->setNombre($nombre);
            $tipoauditoria->setDescripcion($descripcion);
            $tipoauditoria->setEstado(1);
            $errors = $validator->validate($tipoauditoria);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($tipoauditoria);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de auditoría actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoauditoria_editar", methods={"POST"}, name="tipoauditoria_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipoauditoria = $this->getDoctrine()->getRepository(TipoAuditoria::class)->find($id);
            $id = $tipoauditoria->getId();
            $nombre= $tipoauditoria->getNombre();
            $descripcion = $tipoauditoria->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipoauditoria, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de auditoría listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoaud_prev", methods={"POST"}, name="tipoaud_prev")
     */
    public function tipoaud_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($auditoria) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de auditoría?", 'success' => true,
                'message' => 'Baja tipo de auditoría.');
            }else{
                if(sizeof($auditoria) > 0) $vr = " auditoría";

                $info = array('response'=>"El tipo de auditoría no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de auditoría.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipoauditoria_eliminar", methods={"POST"}, name="tipoauditoria_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipoauditoria = $this->getDoctrine()->getRepository(TipoAuditoria::class)->find($id);

            $tipoauditoria->setEstado(0);
            $cx->persist($tipoauditoria);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipoauditoria->getId().".",'success' => true,
                'message' => 'Tipo de auditoría dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}