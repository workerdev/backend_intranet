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
use App\Form\DocumentoProcesoType;
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
use App\Entity\FichaCargo;


class DocumentoProcesoController extends Controller
{
    /**
     * @Route("/documentoproceso", name="documentoproceso_listar")
     * @Method({"GET"})
     */
    public function index(DocumentoProceso $docproceso = null, Request $request)
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

        $form = $this->createForm(DocumentoProcesoType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosDocumento = $form->getData();
            
            if($datosDocumento->getId() == 0 ){
                $docproceso = new DocumentoProceso();
            }else{
                $docproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($datosDocumento->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['vinculoarchivo']->getData())){
                if($docproceso->getVinculoarchivo() == null){
                    $docproceso->setVinculoarchivo("N/A");
                }
            }else{
                $file = $form['vinculoarchivo']->getData();
                $fileName = $file->getClientOriginalName();          
                $directorio = $this->getParameter('Directorio_DocProceso');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $docproceso->setVinculoarchivo($url);
            }

            $docproceso->setNuevoactualizacion($datosDocumento->getNuevoactualizacion());
            $docproceso->setTitulo($datosDocumento->getTitulo());
            $docproceso->setVersionvigente($datosDocumento->getVersionvigente());
            $docproceso->setCarpetaoperativa($datosDocumento->getCarpetaoperativa());
            $docproceso->setAprobadorechazado($datosDocumento->getAprobadorechazado());
            $docproceso->setFechaaprobacion($datosDocumento->getFechaaprobacion());
            $docproceso->setEstado(1);
            
            $documento = new Documento();
            $documento = $datosDocumento->getFkdocumento();
            $docproceso->setFkdocumento($documento);

            $proceso = new FichaProcesos();
            $proceso = $datosDocumento->getFkproceso();
            $docproceso->setFkproceso($proceso);

            $tipo = new TipoDocumento();
            $tipo = $datosDocumento->getFktipo();
            $docproceso->setFktipo($tipo);

            $arobador = new Usuario();
            $arobador = $datosDocumento->getFkaprobador();
            $docproceso->setFkaprobador($arobador);

            if($datosDocumento->getId() == 0){
                $cx->persist($docproceso);
                $cx->flush();
                unset($docproceso);
                unset($datosDocumento);
            }else{
                $cx->merge($docproceso);
                $cx->flush();
                unset($docproceso);
                unset($datosDocumento);
            }
            $redireccion = new RedirectResponse('/documentoproceso');
            return $redireccion;
        }
        
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        $DocumentoProceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('estado' => '1'));
        return $this->render('documentoproceso/index.html.twig', array('objects' => $DocumentoProceso, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
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
                "fkaprobador" => $documentoproceso->getFkaprobador(),
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