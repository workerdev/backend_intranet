<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\DocTipoExtra;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocumentoExtra;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class DocTipoExtraController extends AbstractController
{   
    /**
     * @Route("/doctipoextra", name="doctipoextra")
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
        
        $DocTipoExtra = $this->getDoctrine()->getRepository(DocTipoExtra::class)->findBy(array('estado' => '1'));
        return $this->render('doctipoextra/index.html.twig', array('objects' => $DocTipoExtra, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos,'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/doctipoextra_insertar", methods={"POST"}, name="doctipoextra_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $tipo = $sx['tipo'];
            $descripcion = $sx['descripcion'];

            $DocTipoExtra = new DocTipoExtra();
            $DocTipoExtra->setTipo($tipo);
            $DocTipoExtra->setDescripcion($descripcion);
            $DocTipoExtra->setEstado(1);

            $errors = $validator->validate($DocTipoExtra);
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

            $cx->persist($DocTipoExtra);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$DocTipoExtra->getId().".",   
            'success' => true,
            'message' => 'Documento tipo extra registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/doctipoextra_actualizar", methods={"POST"}, name="doctipoextra_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipo = $sx['tipo'];
            $descripcion = $sx['descripcion'];

            $DocTipoExtra = $this->getDoctrine()->getRepository(DocTipoExtra::class)->find($id);
            $DocTipoExtra->setId($id);
            $DocTipoExtra->setTipo($tipo);
            $DocTipoExtra->setDescripcion($descripcion);
            $DocTipoExtra->setEstado(1);
            $errors = $validator->validate($DocTipoExtra);
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


            $cx->merge($DocTipoExtra);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento tipo extra actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/doctipoextra_editar", methods={"POST"}, name="doctipoextra_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $DocTipoExtra = $this->getDoctrine()->getRepository(DocTipoExtra::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($DocTipoExtra, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento tipo extra listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipoext_prev", methods={"POST"}, name="tipoext_prev")
     */
    public function tipoext_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $doc_ext = $this->getDoctrine()->getRepository(DocumentoExtra::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($doc_ext) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de documento extra?", 'success' => true,
                'message' => 'Baja tipo de documento extra.');
            }else{
                if(sizeof($doc_ext) > 0) $vr = " documentos extra.";

                $info = array('response'=>"El tipo de documento no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de documento extra.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/doctipoextra_eliminar", methods={"POST"}, name="doctipoextra_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $DocTipoExtra = $this->getDoctrine()->getRepository(DocTipoExtra::class)->find($id);

            $DocTipoExtra->setEstado(0);
            $cx->persist($DocTipoExtra);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$DocTipoExtra->getId().".",'success' => true,
                'message' => 'Documento tipo extra dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}