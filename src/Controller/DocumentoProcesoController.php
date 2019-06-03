<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Documento;
use App\Entity\DocumentoProceso;
use App\Entity\DocumentoFormulario;
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
        $idu = $s_user['id'];
        $user = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['id' => $idu, 'estado' => '1']);
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
            if($datosDocumento->getCarpetaoperativa() == null) $docproceso->setCarpetaoperativa("");
            else $docproceso->setCarpetaoperativa($datosDocumento->getCarpetaoperativa());
            $docproceso->setEstado(1);
            
            $proceso = new FichaProcesos();
            $proceso = $datosDocumento->getFkproceso();
            $docproceso->setFkproceso($proceso);

            $tipo = new TipoDocumento();
            $tipo = $datosDocumento->getFktipo();
            $docproceso->setFktipo($tipo);

            
            if($datosDocumento->getNuevoactualizacion() == 'NUEVO') $docproceso->setCodigonuevo($datosDocumento->getCodigonuevo());
            else{
                if($tipo->getNombre() == 'Formulario'){
                    $formulario = new DocumentoFormulario();
                    $formulario = $datosDocumento->getFkformulario();
                    $docproceso->setFkformulario($formulario);
                }else{
                    $documento = new Documento();
                    $documento = $datosDocumento->getFkdocumento();
                    $docproceso->setFkdocumento($documento);
                }
            }
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
        
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        $DocumentoProceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('estado' => '1'));
        $documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'));
        return $this->render('documentoproceso/index.html.twig', array('objects' => $DocumentoProceso, 'aprobador' => $aprobador, 'form' => $form->createView(), 'profile' => $user, 'documento' => $documento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
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
            if($fapb != null) $result = $fapb->format('Y-m-d'); else $result = $fapb;
            $sendinf = [
                "id" => $documentoproceso->getId(),
                "nuevoactualizacion" => $documentoproceso->getNuevoactualizacion(),
                "fkdocumento" => $documentoproceso->getFkdocumento(),
                "fkformulario" => $documentoproceso->getFkformulario(),
                "fkproceso" => $documentoproceso->getFkproceso(),
                "fktipo" => $documentoproceso->getFktipo(),
                "codigonuevo" => $documentoproceso->getCodigonuevo(),
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


    /**
     * @Route("/revision_insertar", methods={"POST"}, name="revision_insertar")
     */
    public function insertar(ValidatorInterface $validator, \Swift_Mailer $mailer)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $id = $sx['id'];
            $aprobador = $sx['fkaprobador'];
            $derivados = $sx['derivados'];              
            
            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);

            foreach ($derivados as $idrev) {
                $docrevision = new DocProcRevision();
                $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($idrev);
                $docrevision->setFkresponsable($revisor);
                
                if($derivados[0] == $idrev){
                    date_default_timezone_set('America/La_Paz');
                    $fecha = date("Y-m-d");
                    $docrevision->setFecha(new \DateTime($fecha));
                    $docrevision->setFirma('Por firmar');
                    
                    $message = (new \Swift_Message('ELFEC - Documento a revisar'))
                        ->setFrom('intranet@elfec.bo')
                        ->setTo($revisor->getCorreo())
                        ->setBody($this->renderView('mail/notificacion.html.twig', 
                            array(
                                'docproceso' => $documentoproceso, 
                                'adicional' => array('fecha'=>$fecha, 'dominio'=>$_SERVER['HTTP_HOST'], 'logo'=>'/resources/images/h_color_lg.png')
                            )
                        ), 'text/html');

                    $mailer->send($message);
                }else{
                    $docrevision->setFirma('');
                }
                $docrevision->setEstadodoc('');
                $docrevision->setEstado(1);
                $docrevision->setFkdoc($documentoproceso);
                $cx->persist($docrevision);
                $cx->flush();
            }
            $aprobador != '' ? $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($aprobador):$aprobador=null;
            $documentoproceso->setFkaprobador($aprobador);
            
            $errors = $validator->validate($documentoproceso);
            if (count($errors) > 0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($documentoproceso);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$documentoproceso->getId().".",   
            'success' => true,
            'message' => 'Datos registrados correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documentoproceso_userderiv", methods={"POST"}, name="documentoproceso_userderiv")
     */
    public function userderiv()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $s_user = $this->get('session')->get('s_user');
            $revisor = $s_user['id'];
            
            $dctorev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['id' => $id, 'estado' => '1']);
            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findOneBy(['id' => $dctorev->getFkdoc(), 'estado' => '1']);
            $doc_rev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(['fkdoc' => $documentoproceso->getId(), 'estado' => '1'], ['id' => 'ASC']);
            
            $i = 0;
            $combo = [];
            foreach ($doc_rev as $rev) {
                $i++;
                $dtrev = (object) $rev;
                $udrv = $dtrev->getFkresponsable();
                if($udrv->getId() == $revisor){
                    if($i < sizeof($doc_rev)){
                        $derivado = $doc_rev[$i]->getFkresponsable();
                        $combo = $derivado;
                    }
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($combo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Datos usuario listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

     /**
     * @Route("/documentoproceso_insertaraprob", methods={"POST"}, name="documentoproceso_insertaraprob")
     */
    public function insertaraprob(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            
            $id = $sx['id'];
            $codigo = $sx['codigo'];
            $tipo = $sx['tipo'];
            $titulo = $sx['titulo'];
            $ficha = $sx['ficha'];
            $versionvigente = $sx['version'];
            $vinculoarchivo = $sx['vinculoarchivo'];
            $vinculodiag = $sx['vinculodiagrama'];
            
            $aprobador = $sx['aprobador'];
            $fechapb = $sx['fechapublicacion'];
            $carpetaop = $sx['carpetaoperativa'];
            $fkdoc = $sx['fkdoc'];
            $nuevoactualizacion = $sx['nuevoactualizacion'];
            $documento = $sx['documento'];
            $formulario = $sx['formulario'];

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha) : $ficha=null;
            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $documento =null;
            $formulario != '' ? $formulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($formulario) : $formulario =null;

            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo=null;
            $aprobador != '' ? $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($aprobador) : $aprobador =null;
            $fkdoc != '' ? $fkdoc = $this->getDoctrine()->getRepository(Documento::class)->find($fkdoc) : $fkdoc =null;

            if($nuevoactualizacion == 'NUEVO'){
                if($tipo->getNombre() == 'Formulario'){
                    $docformulario = new DocumentoFormulario();
                    $docformulario->setCodigo($codigo);
                    $docformulario->setTitulo($titulo);
                    $docformulario->setVersionVigente($versionvigente);
                    $docformulario->setVinculoFileDig($vinculoarchivo);
                    $docformulario->setvinculoFileDesc("N/A");
                    $docformulario->setEstado(1);
                    
                    $docformulario->setFkdocumento($fkdoc);
                    $docformulario->setFkaprobador($aprobador);
                    $cx->persist($docformulario);
                    $cx->flush();
                }else{
                    $Documento = new Documento();
                    $Documento->setCodigo($codigo);
                    $Documento->setTitulo($titulo);
                    $Documento->setVersionvigente($versionvigente);
                    $Documento->setVinculoarchivodig($vinculoarchivo);
                    $Documento->setVinculodiagflujo($vinculodiag);
                    $Documento->setCarpetaOperativa($carpetaop);
                    $Documento->setEstado(1);
                    
                    $Documento->setFkficha($ficha);
                    $Documento->setFktipo($tipo);
                    $Documento->setFkaprobador($aprobador);
                    $cx->persist($Documento);
                    $cx->flush();
                }     
            }else{
                if($tipo->getNombre() == 'Formulario'){
                    $dcform = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($formulario->getId());
                    $dcform->setTitulo($titulo);
                    $dcform->setVersionVigente($versionvigente);
                    $dcform->setVinculoFileDig($vinculoarchivo);
                    
                    $dcform->setFkdocumento($fkdoc);
                    $dcform->setFkaprobador($aprobador);
                    $cx->merge($dcform);
                    $cx->flush();
                }else{
                    $dcto = $this->getDoctrine()->getRepository(Documento::class)->find($documento->getId());
                      // $dcto->setCodigo($codigo);
                    $dcto->setTitulo($titulo);
                    $dcto->setVersionvigente($versionvigente);
                    $dcto->setVinculoarchivodig($vinculoarchivo);
                    $dcto->setVinculodiagflujo($vinculodiag);
                    $dcto->setCarpetaOperativa($carpetaop);
                    
                    $dcto->setFkficha($ficha);  
                    $dcto->setFktipo($tipo);
                    $dcto->setFkaprobador($aprobador);
                    $cx->merge($dcto);
                    $cx->flush();     
                }
            }
            $docprc = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);
            date_default_timezone_set('America/La_Paz');
            $fechaaprobacion = date("Y-m-d");
            $docprc->setFechaaprobacion(new \DateTime($fechaaprobacion));
            $docprc->setAprobadorechazado('APROBADO');
            $cx->merge($docprc);
            $cx->flush();    

            $resultado = array('response' => "Datos guardados.", 'success' => true,
                'message' => 'Documento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

}