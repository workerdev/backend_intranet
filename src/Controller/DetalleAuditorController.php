<?php

namespace App\Controller;

use App\Entity\Auditoria;
use App\Entity\Auditor;
use App\Entity\DetalleAuditor;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class DetalleAuditorController extends Controller
{
    /**
     * @Route("/detalleauditor", name="detalleauditor_listar")
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
       
        $DetalleAuditor = $this->getDoctrine()->getRepository(DetalleAuditor::class)->findBy(array('estado' => '1'));
        $Auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(array('estado' => '1'));
        $Auditor = $this->getDoctrine()->getRepository(Auditor::class)->findBy(array('estado' => '1'));
        return $this->render('detalleauditor/index.html.twig', array('objects' => $DetalleAuditor, 'tipo' => $Auditoria, 'tipo2' => $Auditor, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/detalleauditor_insertar", methods={"POST"}, name="detalleauditor_insertar")
     */
    public function insertar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            
            $auditoria = $sx['auditoria'];
            $auditor = $sx['auditor'];

            $detalleauditor = new DetalleAuditor();
            
            $detalleauditor->setEstado(1);

            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria);
            $auditor = $this->getDoctrine()->getRepository(Auditor::class)->find($auditor);
            $detalleauditor->setFkAuditoria($auditoria);              
            $detalleauditor->setFkAuditor($auditor);                

            $cx->persist($detalleauditor);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$detalleauditor->getId().".",'success' => true,
                'message' => 'Detalle de auditor registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/detalleauditor_actualizar", methods={"POST"}, name="detalleauditor_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditoria = $sx['auditoria'];
            $auditor = $sx['auditor'];

            $detalleauditor = new DetalleAuditor();
            $detalleauditor->setEstado(1);
            
            $tipo = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria);
            $tipo2 = $this->getDoctrine()->getRepository(Auditor::class)->find($auditor);
            $detalleauditor->setFkAuditoria($tipo);              
            $detalleauditor->setFkAuditor($tipo2);  

            $cx->merge($detalleauditor);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Detalle de auditor actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/detalleauditor_editar", methods={"POST"}, name="detalleauditor_editar")
     */
    public function editar()
    { 
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $detalleauditor = $this->getDoctrine()->getRepository(DetalleAuditor::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($detalleauditor, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Detalle de auditor listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/detalleauditor_eliminar", methods={"POST"}, name="detalleauditor_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $detalleauditor = $this->getDoctrine()->getRepository(DetalleAuditor::class)->find($id);

            $detalleauditor->setEstado(0);
            $cx->persist($detalleauditor);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$detalleauditor->getId().".",'success' => true,
                'message' => 'Detalle de auditor dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}