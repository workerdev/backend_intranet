<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoAccion;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Accion;
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


class TipoAccionController extends AbstractController
{   
    /**
     * @Route("/tipoaccion", name="tipoaccion")
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
        
        $tipoaccion = $this->getDoctrine()->getRepository(TipoAccion::class)->findBy(array('estado' => '1'));
        return $this->render('tipoaccion/index.html.twig', array('objects' => $tipoaccion, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipoaccion_insertar", methods={"POST"}, name="tipoaccion_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $tipoaccion = new TipoAccion();
            $tipoaccion->setNombre($nombre);
            $tipoaccion->setDescripcion($descripcion);
            $tipoaccion->setEstado(1);

            $errors = $validator->validate($tipoaccion);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($tipoaccion);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$tipoaccion->getId().".",   
            'success' => true,
            'message' => 'Tipo de acción registrado correctamente.');

            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipoaccion_actualizar", methods={"POST"}, name="tipoaccion_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipoaccion = $this->getDoctrine()->getRepository(TipoAccion::class)->find($id);
            $tipoaccion->setId($id);
            $tipoaccion->setNombre($nombre);
            $tipoaccion->setDescripcion($descripcion);
            $tipoaccion->setEstado(1);

            $errors = $validator->validate($tipoaccion);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($tipoaccion);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de acción actualizado correctamente.');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoaccion_editar", methods={"POST"}, name="tipoaccion_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipoaccion = $this->getDoctrine()->getRepository(TipoAccion::class)->find($id);

            $id = $tipoaccion->getId();
            $nombre= $tipoaccion->getNombre();
            $descripcion = $tipoaccion->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipoaccion, 'json');

            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de acción listado correctamente.');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoacn_prev", methods={"POST"}, name="tipoacn_prev")
     */
    public function tipoacn_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($accion) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de acción?", 'success' => true,
                'message' => 'Baja tipo de acción.');
            }else{
                if(sizeof($accion) > 0) $vr = " acción";

                $info = array('response'=>"El Tipo de acción no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de acción.');
            }
            $resultado = json_encode($info);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipoaccion_eliminar", methods={"POST"}, name="tipoaccion_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipoaccion = $this->getDoctrine()->getRepository(TipoAccion::class)->find($id);

            $tipoaccion->setEstado(0);
            $cx->persist($tipoaccion);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipoaccion->getId().".",'success' => true,
                'message' => 'Tipo de acción dado de baja correctamente.');
                
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}