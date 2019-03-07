<?php

namespace App\Controller;

use function GuzzleHttp\Promise\queue;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\DependencyInjection\Tests\Fixtures\factoryFunction;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Documento;
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


class TipoDocumentoController extends AbstractController
{
    /**
     * @Route("/tipodocumento", name="tipodocumento")
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
            $accdt = (object)$access;
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
        
        $tipodocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->findBy(array('estado' => '1'));
        return $this->render('tipodocumento/index.html.twig', array('objects' => $tipodocumento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipodocumento_insertar", methods={"POST"}, name="tipodocumento_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);

            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $tipodocumento = new TipoDocumento();
            $tipodocumento->setNombre($nombre);
            $tipodocumento->setDescripcion($descripcion);
            $tipodocumento->setEstado(1);


            $errors = $validator->validate($tipodocumento);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                    // dd($e->getMessage());
                    // dd($e->getPropertyPath()) ;
                }
            return new  Response(json_encode($array));
             }
            $cx->persist($tipodocumento);
            $cx->flush();
            $resultado = array('response' => "El ID registrado es: " . $tipodocumento->getId() . ".",
                'success' => true,
                'message' => 'Tipo de documento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipodocumento_actualizar", methods={"POST"}, name="tipodocumento_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipodocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($id);
            $tipodocumento->setId($id);
            $tipodocumento->setNombre($nombre);
            $tipodocumento->setDescripcion($descripcion);
            $tipodocumento->setEstado(1);

            $errors = $validator->validate($tipodocumento);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                    // dd($e->getMessage());
                    // dd($e->getPropertyPath()) ;
                }
                return new  Response(json_encode($array));
            }

            $cx->merge($tipodocumento);
            $cx->flush();

            $resultado = array('success' => true,
                'message' => 'Tipo de documento actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipodocumento_editar", methods={"POST"}, name="tipodocumento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipodocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($id);
            $id = $tipodocumento->getId();
            $nombre = $tipodocumento->getNombre();
            $descripcion = $tipodocumento->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipodocumento, 'json');
            $resultado = array('response' => $json, 'success' => true,
                'message' => 'Tipo de documento listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipodoc_prev", methods={"POST"}, name="tipodoc_prev")
     */
    public function tipodoc_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($documento) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de documento?", 'success' => true,
                'message' => 'Baja tipo de documento.');
            }else{
                if(sizeof($documento) > 0) $vr = " documentos";

                $info = array('response'=>"El tipo de documento no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de documento.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }    
    
    
    /**
     * @Route("/tipodocumento_eliminar", methods={"POST"}, name="tipodocumento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipodocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($id);

            $tipodocumento->setEstado(0);
            $cx->persist($tipodocumento);
            $cx->flush();

            $resultado = array('response' => "El ID modificado es: " . $tipodocumento->getId() . ".", 'success' => true,
                'message' => 'Tipo de documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
}