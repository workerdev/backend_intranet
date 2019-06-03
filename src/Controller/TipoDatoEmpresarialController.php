<?php

namespace App\Controller;

use App\Entity\DatoEmpresarial;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoDatoEmpresarial;
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

class TipoDatoEmpresarialController extends AbstractController
{   
    /**
     * @Route("/tipodatoempresarial", name="tipodatoempresarial")
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
        
        $tipodatoempresarial = $this->getDoctrine()->getRepository(TipoDatoEmpresarial::class)->findBy(array('estado' => '1'));
        return $this->render('tipodatoempresarial/index.html.twig', array('objects' => $tipodatoempresarial, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipodatoempresarial_insertar", methods={"POST"}, name="tipodatoempresarial_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
                    
            $tipodatoempresarial = new TipoDatoEmpresarial();
            $tipodatoempresarial->setNombre($nombre);
            
            $tipodatoempresarial->setEstado(1);
            $errors = $validator->validate($tipodatoempresarial);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($tipodatoempresarial);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$tipodatoempresarial->getId().".",   
            'success' => true,
            'message' => 'Tipo de dato empresarial registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/tipodatoempresarial_actualizar", methods={"POST"}, name="tipodatoempresarial_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];

            $tipodatoempresarial = new TipoDatoEmpresarial();
            $tipodatoempresarial->setId($id);
            $tipodatoempresarial->setNombre($nombre);
        
            $tipodatoempresarial->setEstado(1);
            $errors = $validator->validate($tipodatoempresarial);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($tipodatoempresarial);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de dato empresarial actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipodatoempresarial_editar", methods={"POST"}, name="tipodatoempresarial_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipodatoempresarial = $this->getDoctrine()->getRepository(TipoDatoEmpresarial::class)->find($id);
            $id = $tipodatoempresarial->getId();
            $nombre= $tipodatoempresarial->getNombre();
        
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipodatoempresarial, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de dato empresarial listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tpdtemp_prev", methods={"POST"}, name="tpdtemp_prev")
     */
    public function tpdtemp_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $empresarial = $this->getDoctrine()->getRepository(DatoEmpresarial::class)->findBy(array('fktipodatoempresarial' => $id, 'estado' => '1'));
            
            if(sizeof($empresarial) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de dato empresarial?", 'success' => true,
                'message' => 'Baja tipo de auditoría.');
            }else{
                if(sizeof($empresarial) > 0) $vr = " dato empresarial";

                $info = array('response'=>"El tipo no se puede eliminar, debido a que tiene relación con ".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de dato empresarial.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipodatoempresarial_eliminar", methods={"POST"}, name="tipodatoempresarial_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipodatoempresarial = $this->getDoctrine()->getRepository(TipoDatoEmpresarial::class)->find($id);

            $tipodatoempresarial->setEstado(0);
            $cx->persist($tipodatoempresarial);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipodatoempresarial->getId().".",'success' => true,
                'message' => 'Tipo de dato empresarial dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}