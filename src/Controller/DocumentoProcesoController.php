<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Documento;
use App\Entity\DocumentoProceso;
use App\Entity\DocProcRevision;
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

use App\Entity\Rol;

class DocumentoProcesoController extends Controller
{
    /**
     * @Route("/documentoproceso", name="documentoproceso_listar")
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
        $DocumentoProceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('estado' => '1'));
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $TipoDocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->findBy(array('estado' => '1'));
        $Documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'));
        return $this->render('documentoproceso/index.html.twig', array('objects' => $DocumentoProceso, 'proceso' => $FichaProcesos, 'tipo' => $TipoDocumento, 'documento' => $Documento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }
    

    /**
     * @Route("/documentoproceso_insertar", methods={"POST"}, name="documentoproceso_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nuevoactualizacion = $sx['nuevoactualizacion'];
            $documento = $sx['documento'];
            $proceso = $sx['proceso'];
            $tipo = $sx['tipo'];
            $titulo = $sx['titulo'];
            $versionvigente = $sx['versionvigente'];
            $vinculoarchivo = $sx['vinculoarchivo'];
            $carpetaoperativa = $sx['carpetaoperativa'];
            $aprobadorechazado = $sx['aprobadorechazado'];
            $aprobadopor = $sx['aprobadopor'];
            $fechaaprobacion = $sx['fechaaprobacion'];

            $documentoproceso = new DocumentoProceso();
            $documentoproceso->setNuevoactualizacion($nuevoactualizacion);
            $documentoproceso->setTitulo($titulo);
            $documentoproceso->setVersionvigente($versionvigente);
            $documentoproceso->setVinculoarchivo($vinculoarchivo);
            $documentoproceso->setCarpetaoperativa($carpetaoperativa);
            $documentoproceso->setAprobadorechazado($aprobadorechazado);
            $documentoproceso->setAprobadopor($aprobadopor);
            $documentoproceso->setFechaaprobacion(new \DateTime($fechaaprobacion));
            $documentoproceso->setEstado(1);

            $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso): $proceso =null;
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo = null;
            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $documento = null;
            $documentoproceso->setFkproceso($proceso); 
            $documentoproceso->setFktipo($tipo); 
            $documentoproceso->setFkdocumento($documento);

            $errors = $validator->validate($documentoproceso);
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

            $cx->persist($documentoproceso);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$documentoproceso->getId().".",'success' => true,
                'message' => 'Documento en proceso registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documentoproceso_actualizar", methods={"POST"}, name="documentoproceso_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nuevoactualizacion = $sx['nuevoactualizacion'];
            $documento = $sx['documento'];
            $proceso = $sx['proceso'];
            $tipo = $sx['tipo'];
            $titulo = $sx['titulo'];
            $versionvigente = $sx['versionvigente'];
            $vinculoarchivo = $sx['vinculoarchivo'];
            $carpetaoperativa = $sx['carpetaoperativa'];
            $aprobadorechazado = $sx['aprobadorechazado'];
            $aprobadopor = $sx['aprobadopor'];
            $fechaaprobacion = $sx['fechaaprobacion'];

            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);
            $documentoproceso->setId($id);
            $documentoproceso->setNuevoactualizacion($nuevoactualizacion);
            $documentoproceso->setTitulo($titulo);
            $documentoproceso->setVersionvigente($versionvigente);
            $documentoproceso->setVinculoarchivo($vinculoarchivo);
            $documentoproceso->setCarpetaoperativa($carpetaoperativa);
            $documentoproceso->setAprobadorechazado($aprobadorechazado);
            $documentoproceso->setAprobadopor($aprobadopor);
            $documentoproceso->setFechaaprobacion(new \DateTime($fechaaprobacion));
            $documentoproceso->setEstado(1);

            $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso): $proceso =null;
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo = null;
            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $documento = null;
            $documentoproceso->setFkproceso($proceso); 
            $documentoproceso->setFktipo($tipo); 
            $documentoproceso->setFkdocumento($documento);

            $errors = $validator->validate($documentoproceso);
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
            $cx->merge($documentoproceso);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento en proceso actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documentoproceso_editar", methods={"POST"}, name="documentoproceso_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);
            $fapb = $documentoproceso->getFechaaprobacion();
            $result = $fapb->format('Y-m-d');
            $sendinf = [
                "id" => $documentoproceso->getId(),
                "nuevoactualizacion" => $documentoproceso->getNuevoactualizacion(),
                "fkdocumento" => $documentoproceso->getFkdocumento(),
                "fkproceso" => $documentoproceso->getFkproceso(),
                "fktipo" => $documentoproceso->getFktipo(),
                "titulo" => $documentoproceso->getTitulo(),
                "versionvigente" => $documentoproceso->getVersionvigente(),
                "vinculoarchivo" => $documentoproceso->getVinculoarchivo(),
                "carpetaoperativa" => $documentoproceso->getCarpetaoperativa(),
                "aprobadorechazado" => $documentoproceso->getAprobadorechazado(),
                "aprobadopor" => $documentoproceso->getAprobadopor(),
                "fechaaprobacion" => $result
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento en proceso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/docproc_prev", methods={"POST"}, name="docproc_prev")
     */
    public function docproc_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $doc_proc = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkdoc' => $id, 'estado' => '1'));
            
            if(sizeof($doc_proc) == 0){
                $info = array('response'=>"¿Desea dar de baja el documento en proceso?", 'success' => true,
                'message' => 'Baja del documento en proceso.');
            }else{
                if(sizeof($doc_proc) > 0) $vr = " documento en revisión.";

                $info = array('response'=>"El documento en proceso tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al documento en proceso.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/documentoproceso_eliminar", methods={"POST"}, name="documentoproceso_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);

            $doc_rev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkdoc' => $id, 'estado' => '1'));
            $doc_revs = (array) $doc_rev;
            if(isset($doc_revs[0])){
                foreach ($doc_rev as $rev) {
                    $revdt = (object) $rev;
                    $revdt->setEstado(0);
                    $cx->persist($revdt);
                    $cx->flush();
                }
            }

            $documentoproceso->setEstado(0);
            $cx->persist($documentoproceso);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$documentoproceso->getId().".",'success' => true,
                'message' => 'Documento en proceso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}