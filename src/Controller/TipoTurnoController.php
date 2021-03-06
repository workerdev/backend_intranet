<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoTurno;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Turno;
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


class TipoTurnoController extends AbstractController
{   
    /**
     * @Route("/tipoturno", name="tipoturno")
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
        
        $tipoturno = $this->getDoctrine()->getRepository(TipoTurno::class)->findBy(array('estado' => '1'));
        return $this->render('tipoturno/index.html.twig', array('objects' => $tipoturno, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipoturno_insertar", methods={"POST"}, name="tipoturno_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $tipoturno = new TipoTurno();
            $tipoturno->setNombre($nombre);
            $tipoturno->setDescripcion($descripcion);
            $tipoturno->setEstado(1);
            $errors = $validator->validate($tipoturno);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($tipoturno);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tipoturno->getId().".",   
            'success' => true,
            'message' => 'Tipo de turno registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipoturno_actualizar", methods={"POST"}, name="tipoturno_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipoturno = $this->getDoctrine()->getRepository(TipoTurno::class)->find($id);
            $tipoturno->setId($id);
            $tipoturno->setNombre($nombre);
            $tipoturno->setDescripcion($descripcion);
            $tipoturno->setEstado(1);
            $errors = $validator->validate($tipoturno);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($tipoturno);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de turno actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoturno_editar", methods={"POST"}, name="tipoturno_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipoturno = $this->getDoctrine()->getRepository(TipoTurno::class)->find($id);
            $id = $tipoturno->getId();
            $nombre = $tipoturno->getNombre();
            $descripcion = $tipoturno->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipoturno, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de turno listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoturno_prev", methods={"POST"}, name="tipoturno_prev")
     */
    public function tipoturno_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $turno = $this->getDoctrine()->getRepository(Turno::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($turno) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de turno?", 'success' => true,
                'message' => 'Baja tipo de turno.');
            }else{
                if(sizeof($turno) > 0) $vr = " turno";

                $info = array('response'=>"El tipo de turno no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de turno.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipoturno_eliminar", methods={"POST"}, name="tipoturno_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipoturno = $this->getDoctrine()->getRepository(TipoTurno::class)->find($id);

            $tipoturno->setEstado(0);
            $cx->persist($tipoturno);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipoturno->getId().".",'success' => true,
                'message' => 'Tipo de turno dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}