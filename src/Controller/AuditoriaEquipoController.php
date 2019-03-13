<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Auditoria;
use App\Entity\Auditor;
use App\Entity\TipoAuditor;
use App\Entity\AuditoriaEquipo;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
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



class AuditoriaEquipoController extends AbstractController
{   
    /**
     * @Route("/auditoriaequipo", name="auditoriaequipo")
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
       
        $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(array('estado' => '1'));
        $auditor = $this->getDoctrine()->getRepository(Auditor::class)->findBy(array('estado' => '1'));
        $tipo = $this->getDoctrine()->getRepository(TipoAuditor::class)->findBy(array('estado' => '1'));
        $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(array('estado' => '1'));
        return $this->render('auditoriaequipo/index.html.twig', array('objects' => $equipo, 'auditoria' => $auditoria, 'auditor' => $auditor, 'tipo' => $tipo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/auditoriaequipo_insertar", methods={"POST"}, name="auditoriaequipo_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $auditoria = $sx['auditoria'];
            $auditor = $sx['auditor'];
            $tipo = $sx['tipo'];
            
            $auditoriaequipo = new AuditoriaEquipo();
            $auditoriaequipo->setEstado(1);
            
            $auditoria != '' ? $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria): $auditoria = null ;
            $auditoriaequipo->setFkauditoria($auditoria);
            $auditor != '' ? $auditor = $this->getDoctrine()->getRepository(Auditor::class)->find($auditor):$auditor=null;
            $auditoriaequipo->setFkauditor($auditor);
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoAuditor::class)->find($tipo): $tipo = null;
            $auditoriaequipo->setFktipo($tipo);
            $errors = $validator->validate($auditoriaequipo);
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
            $cx->persist($auditoriaequipo);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$auditoriaequipo->getId().".",   
            'success' => true,
            'message' => 'Equipo de auditoría registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/auditoriaequipo_actualizar", methods={"POST"}, name="auditoriaequipo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditoria = $sx['auditoria'];
            $auditor = $sx['auditor'];
            $tipo = $sx['tipo'];

            $auditoriaequipo = new AuditoriaEquipo();
            $auditoriaequipo->setId($id);
            $auditoriaequipo->setEstado(1);

            $auditoria != '' ? $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria): $auditoria = null ;
            $auditoriaequipo->setFkauditoria($auditoria);
            $auditor != '' ? $auditor = $this->getDoctrine()->getRepository(Auditor::class)->find($auditor):$auditor=null;
            $auditoriaequipo->setFkauditor($auditor);
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoAuditor::class)->find($tipo): $tipo = null;
            $auditoriaequipo->setFktipo($tipo);
            $errors = $validator->validate($auditoriaequipo);
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

            $cx->merge($auditoriaequipo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Equipo de auditoría actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/auditoriaequipo_editar", methods={"POST"}, name="auditoriaequipo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditoriaequipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($auditoriaequipo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Equipo de auditoría listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/auditoriaequipo_eliminar", methods={"POST"}, name="auditoriaequipo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $auditoriaequipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->find($id);

            $auditoriaequipo->setEstado(0);
            $cx->persist($auditoriaequipo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$auditoriaequipo->getId().".",'success' => true,
                'message' => 'Equipo de auditoría dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}