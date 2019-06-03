<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Auditor;
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


class AuditorController extends AbstractController
{   
    /**
     * @Route("/auditor", name="auditor")
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
      
        $auditor = $this->getDoctrine()->getRepository(Auditor::class)->findBy(array('estado' => '1'));
        return $this->render('auditor/index.html.twig', array('objects' => $auditor, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/auditor_insertar", methods={"POST"}, name="auditor_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $item = $sx['item'];
            $nombres = $sx['nombres'];
            $paterno = $sx['paterno'];
            $materno = $sx['materno'];
            $apellidosnombres = $sx['apellidosnombres'];
            $auditorsig = $sx['auditorsig'];
            $profesion = $sx['profesion'];
            $vigente = $sx['vigente'];

            $auditor = new Auditor();
            if($item !='' && is_numeric($item))$auditor->setItem($item);
            $auditor->setNombres($nombres);
            $auditor->setPaterno($paterno);
            $auditor->setMaterno($materno);
            $auditor->setApellidosnombres($apellidosnombres);
            $auditor->setAuditorsig($auditorsig);
            $auditor->setProfesion($profesion);  
            $auditor->setVigente($vigente);  
            $auditor->setEstado(1);
            $errors = $validator->validate($auditor);
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
            $cx->persist($auditor);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$auditor->getId().".",   
            'success' => true,
            'message' => 'Auditor registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/auditor_actualizar", methods={"POST"}, name="auditor_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $item = $sx['item'];
            $nombres = $sx['nombres'];
            $paterno = $sx['paterno'];
            $materno = $sx['materno'];
            $apellidosnombres = $sx['apellidosnombres'];
            $auditorsig = $sx['auditorsig'];
            $profesion = $sx['profesion'];
            $vigente = $sx['vigente'];

            $auditor = $this->getDoctrine()->getRepository(Auditor::class)->find($id);
            $auditor->setId($id);
            if($item !='' && is_numeric($item)) $auditor->setItem($item);
            $auditor->setNombres($nombres);
            $auditor->setPaterno($paterno);
            $auditor->setMaterno($materno);
            $auditor->setApellidosnombres($apellidosnombres);
            $auditor->setAuditorsig($auditorsig);
            $auditor->setProfesion($profesion);  
            $auditor->setVigente($vigente);  
            $auditor->setEstado(1);
            $errors = $validator->validate($auditor);
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
            $cx->merge($auditor);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Auditor actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/auditor_editar", methods={"POST"}, name="auditor_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditor = $this->getDoctrine()->getRepository(Auditor::class)->find($id);
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($auditor, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Auditor listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/auditor_prev", methods={"POST"}, name="auditor_prev")
     */
    public function auditor_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(array('fkauditor' => $id, 'estado' => '1'));
            
            if(sizeof($equipo) == 0){
                $info = array('response'=>"¿Desea dar de baja los datos del auditor?", 'success' => true,
                'message' => 'Baja de auditor.');
            }else{
                if(sizeof($equipo) > 0) $vr = " equipo de auditoría";

                $info = array('response'=>"El auditor no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados a el auditor.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/auditor_eliminar", methods={"POST"}, name="auditor_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $auditor = $this->getDoctrine()->getRepository(Auditor::class)->find($id);

            $auditor->setEstado(0);
            $cx->persist($auditor);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$auditor->getId().".",'success' => true,
                'message' => 'Auditor dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}