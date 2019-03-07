<?php

namespace App\Controller;

use App\Entity\ControlCorrelativo;
use App\Entity\Unidad;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Entity\Permiso;
use App\Entity\Correlativo;
use PhpParser\Node\VarLikeIdentifier;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;


class UnidadController extends Controller
{
    /**
     * @Route("/unidad", methods={"GET"}, name="unidad_listar")
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
        
        $control = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(array('estado' => '1'));
        $superior = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('estado' => '1'));
        $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('unidad/index.html.twig', array('objects' => $unidad, 'control' => $control, 'superior' => $superior, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/unidad_insertar", methods={"POST"}, name="unidad_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $correlativo = $sx['correlativo'];
            $superior = $sx['superior'];

            $correlativo != '' ? $correlativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($correlativo) : $correlativo=null;
            $superior != '' ? $superior = $this->getDoctrine()->getRepository(Unidad::class)->find($superior) : $superior=null;

            $unidad = new Unidad();
            $unidad->setNombre($nombre);
            $unidad->setFkcorrelativo($correlativo);
            $unidad->setFksuperior($superior);
            $unidad->setEstado(1);
            $errors = $validator->validate($unidad);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($unidad);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$unidad->getId().".",'success' => true,
                'message' => 'Unidad registrada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/unidad_actualizar", methods={"POST"}, name="unidad_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $correlativo = $sx['correlativo'];
            $superior = $sx['superior'];

            $correlativo != '' ? $correlativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($correlativo) : $correlativo=null;
            $superior != '' ? $superior = $this->getDoctrine()->getRepository(Unidad::class)->find($superior) : $superior=null;

            $unidad = new Unidad();
            $unidad->setId($id);
            $unidad->setNombre($nombre);
            $unidad->setFkcorrelativo($correlativo);
            $unidad->setFksuperior($superior);
            $unidad->setEstado(1);
            
            $errors = $validator->validate($unidad);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->merge($unidad);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Unidad actualizada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/unidad_editar", methods={"POST"}, name="unidad_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($unidad, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Unidad listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/unidad_eliminar", methods={"POST"}, name="unidad_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($id);

            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fkunidad' => $id, 'estado' => '1'));
            $permisos = (array) $permiso;
            if(isset($permisos[0])){
                foreach ($permiso as $prm) {
                    $prmdt = (object) $prm;
                    $prmdt->setEstado(0);
                    $cx->persist($prmdt);
                    $cx->flush();
                }
            }

            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findBy(array('fkunidad' => $id, 'estado' => '1'));
            $correlativos = (array) $correlativo;
            if(isset($correlativos[0])){
                foreach ($correlativo as $crtv) {
                    $crtvdt = (object) $crtv;
                    $crtvdt->setEstado(0);
                    $cx->persist($crtvdt);
                    $cx->flush();
                }
            }

            $unidad->setEstado(0);
            $cx->persist($unidad);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$unidad->getId().".",'success' => true,
                'message' => 'Unidad dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/unidadcrtv_prev", methods={"POST"}, name="unidadcrtv_prev")
     */
    public function unidadcrtv_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fkunidad' => $id, 'estado' => '1'));
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findBy(array('fkunidad' => $id, 'estado' => '1'));
            
            if(sizeof($permiso) == 0 && sizeof($correlativo) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja de la unidad.');
            }else{
                if(sizeof($permiso) > 0) $vr = "- Permiso\n";
                if(sizeof($correlativo) > 0) $vr = $vr."- Correlativo\n";

                $info = array('response'=>"La unidad tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados a la unidad.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}