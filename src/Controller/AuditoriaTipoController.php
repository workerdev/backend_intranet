<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\AuditoriaTipo;
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
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class AuditoriaTipoController extends AbstractController
{   
    /**
     * @Route("/auditoriatipo", name="auditoriatipo")
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
       
        $auditoriatipo = $this->getDoctrine()->getRepository(AuditoriaTipo::class)->findBy(array('estado' => '1'));
        return $this->render('auditoriatipo/index.html.twig', array('objects' => $auditoriatipo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/auditoriatipo_insertar", methods={"POST"}, name="auditoriatipo_insertar")
     */
    public function insertar(Request $request )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $auditoriatipo = new AuditoriaTipo();
            $auditoriatipo->setNombre($nombre);
            $auditoriatipo->setDescripcion($descripcion);
            $auditoriatipo->setEstado(1);  
            $cx->persist($auditoriatipo);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$auditoriatipo->getId().".",   
            'success' => true,
            'message' => 'Tipo de audítoría registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/auditoriatipo_actualizar", methods={"POST"}, name="auditoriatipo_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $auditoriatipo = new AuditoriaTipo();
            $auditoriatipo->setId($id);
            $auditoriatipo->setNombre($nombre);
            $auditoriatipo->setDescripcion($descripcion);
            $auditoriatipo->setEstado(1);
            $cx->merge($auditoriatipo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de audítoría actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/auditoriatipo_editar", methods={"POST"}, name="auditoriatipo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditoriatipo = $this->getDoctrine()->getRepository(AuditoriaTipo::class)->find($id);
            $id = $auditoriatipo->getId();
            $nombre= $auditoriatipo->getNombre();
            $descripcion = $auditoriatipo->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($auditoriatipo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo audítoria listado correctamente.');
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
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja tipo de auditoría.');
            }else{
                if(sizeof($auditoria) > 0) $vr = "- Auditoría\n";

                $info = array('response'=>"El tipo de auditoría tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de auditoría.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/auditoriatipo_eliminar", methods={"POST"}, name="auditoriatipo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $auditoriatipo = $this->getDoctrine()->getRepository(AuditoriaTipo::class)->find($id);

            $auditoriatipo->setEstado(0);
            $cx->persist($auditoriatipo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$auditoriatipo->getId().".",'success' => true,
                'message' => 'Tipo de audítoría dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}