<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\DocProcRevision;
use App\Entity\DocumentoProceso;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Rol;


class DocProcRevisionController extends AbstractController
{   
    /**
     * @Route("/docprocesorev", name="docprocesorev")
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
        $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('estado' => '1'));
        $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('estado' => '1'));
        return $this->render('docprocesorev/index.html.twig', array('objects' => $docprocrev,'tipo' => $documentoproceso,'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/docprocesorev_insertar", methods={"POST"}, name="docprocesorev_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();            
            $sx = json_decode($_POST['object'], true);
            
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $firma = $sx['firma'];
            $estadodoc = $sx['estadodoc'];
            $docid = $sx['fkdocs'];
            
            $docprocrev = new DocProcRevision();
            $docprocrev->setFecha(new \DateTime($fecha));
            $docprocrev->setResponsable($responsable);
            $docprocrev->setFirma($firma);
            $docprocrev->setEstadodoc($estadodoc);
            $docprocrev->setEstado(1);

            $docid != '' ? $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($docid) : $documentoproceso = null;
            $docprocrev->setFkdoc($documentoproceso);

            $errors = $validator->validate($docprocrev);
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


            $cx->persist($docprocrev);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$docprocrev->getId().".",'success' => true,
                'message' => 'Documento en revisión agregado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/docprocesorev_actualizar", methods={"POST"}, name="docprocesorev_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $firma = $sx['firma'];
            $estadodoc = $sx['estadodoc'];
            $docid = $sx['fkdocs'];

            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            
            $docprocrev->setId($id);
            $docprocrev->setFecha(new \DateTime($fecha));
            $docprocrev->setResponsable($responsable);
            $docprocrev->setFirma($firma);
            $docprocrev->setEstadodoc($estadodoc);
            $docprocrev->setEstado(1);

            $docid != '' ? $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($docid) : $documentoproceso = null;
            $docprocrev->setFkdoc($documentoproceso);

            $errors = $validator->validate($docprocrev);
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

            $cx->merge($docprocrev);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento en revisión actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/docprocesorev_editar", methods={"POST"}, name="docprocesorev_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            $fpb = $docprocrev->getFecha();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $docprocrev->getId(),
                "fecha" => $result,
                "responsable" => $docprocrev->getResponsable(),
                "firma" => $docprocrev->getFirma(),
                "estadodoc" => $docprocrev->getEstadodoc(),
                "fkdoc" => $docprocrev->getFkdoc()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento en revisión listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/docrev_prev", methods={"POST"}, name="docrev_prev")
     */
    public function docrev_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $doc_rev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            $doc_proc = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('id' => $doc_rev->getFkdoc()->getId(), 'estado' => '1'));
            
            if(sizeof($doc_proc) == 0){
                $info = array('response'=>"¿Desea dar de baja el documento en revisión?", 'success' => true,
                'message' => 'Baja documento en revisión.');
            }else{
                if(sizeof($doc_proc) > 0) $vr = " documentos en proceso";

                $info = array('response'=>"El documento en revisión no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al documento en revisión.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/docprocesorev_eliminar", methods={"POST"}, name="docprocesorev_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);

            $docprocrev->setEstado(0);
            $cx->persist($docprocrev);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$docprocrev->getId().".",'success' => true,
                'message' => 'Documento en revisión dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}