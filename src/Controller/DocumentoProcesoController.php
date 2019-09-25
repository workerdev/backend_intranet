<?php

namespace App\Controller;

use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\Documento;
use App\Entity\DocumentoFormulario;
use App\Entity\DocumentoProceso;
use App\Entity\FichaCargo;
use App\Entity\FichaProcesos;
use App\Entity\Modulo;
use App\Entity\Rol;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\NormaDocumento;
use App\Entity\DocumentosAso;
use App\Entity\DocumentoBaja;
use App\Form\FileUploadType;
use App\Form\DocumentoFileType;
use App\Form\DocumentoProcesoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DocumentoProcesoController extends Controller
{
    /**
     * @Route("/documentoproceso", name="documentoproceso_listar")
     * @Method({"GET"})
     */
    public function index()
    {
        $s_user = $this->get('session')->get('s_user');
        if (empty($s_user)) {
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

        $docproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('fkaprobador'=>null, 'estado' => '1'));
        $fkdocs = array();
        foreach ($docproceso as $dp) {
            $dpdet = (object) $dp;
            $item = $dpdet->getId();
            $fkdocs[] = $item;
        }
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'), array('nombre' => 'ASC'));
        $documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'), array('codigo' => 'ASC'));
        $formulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findBy(array('estado' => '1'), array('codigo' => 'ASC'));
        $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->findBy(array('estado' => '1'), array('nombre' => 'ASC'));
        $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'), array('codproceso' => 'ASC'));
        $docrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('estado' => '1'));
        $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('estado' => '1'));
        return $this->render('documentoproceso/index.html.twig', array('objects' => $documentoproceso, 'current_user' => $idu, 'docrevision' => $docrevision, 'en_revision' => $fkdocs, 'aprobador' => $aprobador, 'tipo' => $tipo, 'proceso' => $proceso, 'profile' => $user, 'documento' => $documento, 'formulario' => $formulario, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    public function validate_data($data, $process)
    {
        if($process == ''){
            return false;
        }else{
            if($process == 'NUEVO'){
                if($data['codigonuevo'] == '') return false;
                else{
                    foreach ($data as $key => $value) {
                        if(!in_array($key, ['codigonuevo', 'fkdocumento', 'fkformulario', 'carpetaoperativa', 'aprobadorechazado', 'fechaaprobacion', 'fkaprobador'])){
                            if($value == "") return false;
                        }
                    }
                    return true;
                }
            }else{
                foreach ($data as $key => $value) {
                    if(!in_array($key, ['codigonuevo', 'fkdocumento', 'fkformulario', 'carpetaoperativa', 'aprobadorechazado', 'fechaaprobacion', 'fkaprobador'])){
                        if($value == '') return false;
                    }
                }
                return true;
            }
        }
    }


    public function validate_code($code)
    {
        if($code != '') {
            $documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(['codigo' => $code, 'estado' => '1']);
            $docformulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findBy(['codigo' => $code, 'estado' => '1']);
            
            if(count($documento) == 0 && count($docformulario) == 0) return true;
            else return false;
        } else {
            return false;
        }
    }

    
    /**
     * @Route("/documentoproceso_insertar", methods={"POST"}, name="documentoproceso_insertar")
     */
    public function insertardoc()
    {
        try {
            $file = $_FILES;
            $datos = $_POST;

            if($this->validate_data($datos, $datos['nuevoactualizacion'])){
                if(!empty($file['archivo']['name'])){
                    $cx = $this->getDoctrine()->getManager();
                    $uploadedFile = '';
                    
                    $tipo = $datos['fktipo'];
                    $documento = $datos['fkdocumento'];
                    $formulario = $datos['fkformulario'];
                    $proceso = $datos['fkproceso'];
                    $codn = $datos['codigonuevo'];
                    $docproceso = new DocumentoProceso();

                    if(!empty($file["archivo"]["type"])){
                        $fileName = $file['archivo']['name'];
                        $sourcePath = $file['archivo']['tmp_name'];
                        $targetPath = $this->getParameter('Directorio_DocProceso') . '/' . $fileName;
                        
                        if($datos['nuevoactualizacion'] == 'NUEVO'){
                            if(!$this->validate_code($datos['codigonuevo'])){
                                $resultado = array(
                                    'response' => "Code",   
                                    'success' => false,
                                    'message' => 'Ingrese otro código.'
                                );
                                $resultado = json_encode($resultado);
                                return new Response($resultado);
                            }
                        }
                        
                        if(move_uploaded_file($sourcePath, $targetPath)){
                            $uploadedFile = $fileName;
                        }
                        $ruta = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                        $url = str_replace("\\", "/", $ruta);

                        $docproceso->setVinculoarchivo($url);
                        $docproceso->setNuevoactualizacion($datos['nuevoactualizacion']);
                        $docproceso->setTitulo($datos['titulo']);
                        $docproceso->setVersionvigente($datos['versionvigente']);
                        $docproceso->setCarpetaoperativa($datos['carpetaoperativa']);
                        $docproceso->setCodigonuevo($datos['codigonuevo']);
                        $docproceso->setEstado(1);

                        $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo = null;
                        $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $documento = null;
                        $formulario != '' ? $formulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($formulario) : $formulario = null;
                        $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $proceso = null;
                        $docproceso->setFktipo($tipo);
                        $docproceso->setFkdocumento($documento);
                        $docproceso->setFkformulario($formulario);
                        $docproceso->setFkproceso($proceso);

                        $cx->persist($docproceso);
                        $cx->flush();

                        $resultado = array(
                            'response' => "Save",   
                            'success' => true,
                            'message' => 'Datos registrados correctamente.'
                        );
                        $resultado = json_encode($resultado);
                        return new Response($resultado);
                    }
                }else{
                    $resultado = array(
                        'response' => "NoFile",   
                        'success' => false,
                        'message' => 'Ingrese un archivo.'
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                }
            }else{
                $resultado = array(
                    'response' => "Empty",   
                    'success' => false,
                    'message' => 'Ingrese todo los datos.'
                );
                $resultado = json_encode($resultado);
                return new Response($resultado);
            }
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

            if (sizeof($doc_proc) == 0) {
                $info = array('response' => "¿Desea dar de baja el documento en proceso?", 'success' => true,
                    'message' => 'Baja del documento en proceso.', 'content' => '');
            } else {
                if (sizeof($doc_proc) > 0) {
                    $vr = " documento en revisión.";
                }

                $info = array('response' => "El documento en proceso tiene relación con los datos de" . $vr, 'content' => '¿Desea dar de baja el documento en proceso?',
                    'success' => false, 'message' => 'Se eliminarán todos los registros asociados al documento en proceso.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
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
            if (isset($doc_revs[0])) {
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

            $resultado = array('response' => "El ID modificado es: " . $documentoproceso->getId() . ".", 'success' => true,
                'message' => 'Documento en proceso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
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
            if ($fapb != null) {
                $result = $fapb->format('Y-m-d H:i:s');
            } else {
                $result = $fapb;
            }

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
                "fechaaprobacion" => $result,
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response' => $json, 'success' => true,
                'message' => 'Documento en proceso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    public function sending_mail($mailer, $idrv, $idoc, $process, $site)
    {
        try {
            $s_user = $this->get('session')->get('s_user');
            $cx = $this->getDoctrine()->getManager();
            $idrev = $idrv;
            $id = $idoc;
            $proc = $process;
            $website = $site;

            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);
            $docrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['fkdoc'=>$id, 'fkresponsable'=>$idrev, 'estado'=>'1']);
            $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($idrev);

            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");

            if($docrevision != null){
                $docrevision->setFecha(new \DateTime($fecha));

                if($proc == 'rechazar') $docrevision->setEstadodoc('');
                $docrevision->setFirma('Por firmar');

                $message = (new \Swift_Message('ELFEC - Documento a revisar'))
                    ->setFrom($_SERVER['REMITENTE_CORREO'])
                    ->setTo($revisor->getCorreo())
                    ->setBody($this->renderView('mail/notificacion.html.twig',
                        array(
                            'docproceso' => $documentoproceso,
                            'adicional' => array('fecha' => $fecha, 'website' => $website, 'dominio' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                        )
                    ), 'text/html');

                $mailer->send($message);

                $cx->merge($docrevision);
                $cx->flush();
            }else{
                if($proc == 'rechazar'){
                    $documentos = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(['fkdoc'=>$id, 'estado'=>'1'], ['id' => 'ASC']);
                    $idbp = 0;
                    foreach ($documentos as $docprocrev) {
                        $rev_doc = $this->getDoctrine()->getRepository(Usuario::class)->find($docprocrev->getFkresponsable()->getId());

                        if($docprocrev->getFirma() != ''){
                            if($idbp == 0) $idbp = $rev_doc->getId();
                            else{
                                $message = (new \Swift_Message('ELFEC - Documento a revisar'))
                                    ->setFrom($_SERVER['REMITENTE_CORREO'])
                                    ->setTo($rev_doc->getCorreo())
                                    ->setBody($this->renderView('mail/notificacion.html.twig',
                                        array(
                                            'docproceso' => $documentoproceso,
                                            'adicional' => array('fecha' => $fecha, 'website' => $website, 'dominio' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                                        )
                                    ), 'text/html');
        
                                $mailer->send($message);
                            }
                            $docprocrev->setEstadodoc('');
                            $docprocrev->setFirma('');
                            $cx->merge($docprocrev);
                            $cx->flush();
                        }
                    }
    
                    $docrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['fkdoc'=>$id, 'fkresponsable'=>$idbp, 'estado'=>'1']);
                    $docrevision->setFecha(new \DateTime($fecha));
                    $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($idbp);
    
                    $docrevision->setEstadodoc('');
                    $docrevision->setFirma('Por firmar');
                    $docrevision->setFecha(new \DateTime($fecha));
    
                    $message = (new \Swift_Message('ELFEC - Documento a revisar'))
                        ->setFrom($_SERVER['REMITENTE_CORREO'])
                        ->setTo($revisor->getCorreo())
                        ->setBody($this->renderView('mail/notificacion.html.twig',
                            array(
                                'docproceso' => $documentoproceso,
                                'adicional' => array('fecha' => $fecha, 'website' => $website, 'dominio' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                            )
                        ), 'text/html');
                    $mailer->send($message);
    
                    $cx->merge($docrevision);
                    $cx->flush();
                }
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/revision_insertar", methods={"POST"}, name="revision_insertar")
     */
    public function insertar_rev(\Swift_Mailer $mailer)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);

            $id = $sx['id'];
            $aprobador = $sx['fkaprobador'];
            $derivados = $sx['derivados'];
            $website = $sx['website'];
            $mail_rev = 0;

            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);

            foreach ($derivados as $idrev) {
                $docrevision = new DocProcRevision();
                $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($idrev);
                $docrevision->setFkresponsable($revisor);

                if ($derivados[0] == $idrev) {
                    $mail_rev = $idrev;
                } 
                $docrevision->setFirma('');
                $docrevision->setEstadodoc('');
                $docrevision->setEstado(1);
                $docrevision->setFkdoc($documentoproceso);
                $cx->persist($docrevision);
                $cx->flush();
            }
            $aprobador != '' ? $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($aprobador) : $aprobador = null;
            $documentoproceso->setFkaprobador($aprobador);

            $cx->persist($documentoproceso);
            $cx->flush();

            $this->sending_mail($mailer, $mail_rev, $documentoproceso->getId(), 'derivar', $website);
            $resultado = array('response' => "El ID registrado es: " . $documentoproceso->getId() . ".",
                'success' => true,
                'message' => 'Datos registrados correctamente.'
            );
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/revision_actualizar", methods={"POST"}, name="revision_actualizar")
     */
    public function actualizar_rev(\Swift_Mailer $mailer)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);

            $id = $sx['id'];
            $aprobador = $sx['fkaprobador'];
            $derivados = $sx['derivados'];
            $website = $sx['website'];
            $list_rv = $sx['id_new'];
            $list_dl = $sx['id_del'];
            $mail_rev = 0;

            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);

            $i = 0;
            foreach ($derivados as $idrev) {
                if($list_rv[$i] == '0') $docrevision = new DocProcRevision();
                else $docrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($list_rv[$i]);
                
                $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($idrev);
                $docrevision->setFkresponsable($revisor);

                if ($derivados[0] == $idrev) {
                    $mail_rev = $idrev;
                } 
                $docrevision->setFirma('');
                $docrevision->setEstadodoc('');
                $docrevision->setEstado(1);
                $docrevision->setFkdoc($documentoproceso);

                if($list_rv[$i] == '0') $cx->persist($docrevision);
                else $cx->merge($docrevision);
                $cx->flush();
                $i++;
            }
            foreach ($list_dl as $del) {
                if($del != '0'){
                    $docrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($del);
                    $docrev->setEstado(0);
                    $cx->merge($docrev);
                }
            }
            $aprobador != '' ? $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($aprobador) : $aprobador = null;
            $documentoproceso->setFkaprobador($aprobador);

            $cx->persist($documentoproceso);
            $cx->flush();

            $this->sending_mail($mailer, $mail_rev, $documentoproceso->getId(), 'derivar', $website);
            $resultado = array('response' => "El ID registrado es: " . $documentoproceso->getId() . ".",
                'success' => true,
                'message' => 'Datos actualizados correctamente.'
            );
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
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
                if ($udrv->getId() == $revisor) {
                    if ($i < sizeof($doc_rev)) {
                        $derivado = $doc_rev[$i]->getFkresponsable();
                        $combo = $derivado;
                    }
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($combo, 'json');
            $resultado = array('response' => $json, 'success' => true,
                'message' => 'Datos usuario listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentoproceso_getdoc", methods={"POST"}, name="documentoproceso_getdoc")
     */
    public function get_documento()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $docrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($docrevision->getFkdoc()->getId());
            $fapb = $documentoproceso->getFechaaprobacion();
            if ($fapb != null) {
                $result = $fapb->format('Y-m-d H:i:s');
            } else {
                $result = $fapb;
            }

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
                "fechaaprobacion" => $result,
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response' => $json, 'success' => true,
                'message' => 'Documento en proceso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    public function previous_user($idoc)
    {
        try {
            $s_user = $this->get('session')->get('s_user');
            $revisor = $s_user['id'];

            $dctorev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['id' => $idoc, 'estado' => '1']);
            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findOneBy(['id' => $dctorev->getFkdoc(), 'estado' => '1']);
            $doc_rev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(['fkdoc' => $documentoproceso->getId(), 'estado' => '1'], ['id' => 'ASC']);

            $i = 0;
            $derivado = 0;
            $combo = $this->getDoctrine()->getRepository(Usuario::class)->find($revisor);
            foreach ($doc_rev as $rev) {
                $dtrev = (object) $rev;
                $udrv = $dtrev->getFkresponsable();
                if ($udrv->getId() == $revisor) {
                    $j = $i - 1;
                    if ($j >= 0) {
                        $derivado = $doc_rev[$j]->getFkresponsable()->getId();
                    }
                }
                $i++;
            }

            return $derivado;
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentoproceso_uploadfile", methods={"POST"}, name="documentoproceso_uploadfile")
     */
    public function uploadfile(\Swift_Mailer $mailer)
    {
        try {
            $file = $_FILES;
            $datos = $_POST;
            $cx = $this->getDoctrine()->getManager();
            
            if(isset($datos['op_upload'])) $swfile = $datos['op_upload'];
            $id = $datos['idrv'];
            $nrev = $datos['revfl'];
            $proc = $datos['infproc'];
            $website = $datos['urlserver'];
            
            $s_user = $this->get('session')->get('s_user');
            $idu = $s_user['id'];
            $docrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['fkdoc' => $id, 'fkresponsable' => $idu, 'estado' => '1']);
            $doc_idrv = $docrevision->getId();

            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");
            $docrevision->setFecha(new \DateTime($fecha));
            $docrevision->setFirma('Firmado');

            $docproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);
            if(isset($datos['op_upload']) && !empty($file['archivodig']['name']) && $swfile == "on") {
                $sourcePath = $file['archivodig']['tmp_name'];
                $uploadedFile = '';
                $extension = substr($file['archivodig']['name'], strrpos($file['archivodig']['name'], "."), strlen($file['archivodig']['name']));

                $act_extension = substr($docproceso->getVinculoarchivo(), strrpos($docproceso->getVinculoarchivo(), "."), strlen($docproceso->getVinculoarchivo()));
                $filenames = $docproceso->getVinculoarchivo();
                $defaultName = $file['archivodig']['name'];

                if($act_extension == $extension) $namefile = substr($filenames, strpos($filenames, "documentoproceso") + strlen("documentoproceso") + 1, strlen($filenames));
                else $namefile = $file['archivodig']['name'];
                $targetPath = $this->getParameter('Directorio_DocProceso') . '/' . $namefile;
                
                $ruta = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                $url = str_replace("\\", "/", $ruta);

                $docproceso->setVinculoarchivo($url);
                $cx->persist($docproceso);
                $cx->flush();

                if($proc == 'rechazar'){
                    $rev_prev = $this->previous_user($doc_idrv);

                    if($rev_prev > 0){
                        $docrevision->setEstadodoc('');
                        $docrevision->setFirma('');
                    }
                }
                else $docrevision->setEstadodoc('DERIVADO CON MODIFICACIONES');
                
                if(move_uploaded_file($sourcePath, $targetPath)){
                    $uploadedFile = $namefile;
                }

                if($docproceso->getFkaprobador()->getId() == $idu && $proc != 'rechazar') $docrevision->setEstadodoc('PARA PUBLICAR');
                $cx->persist($docrevision);
                $cx->flush();

                $this->sending_mail($mailer, $nrev, $id, $proc, $website);
                $resultado = array(
                    'response' => "Saved",   
                    'success' => true,
                    'message' => 'Datos registrados correctamente.',
                    'revisor' => $nrev,
                    'idc' => $id,
                    'proceso' => $proc
                );
                $resultado = json_encode($resultado);
                return new Response($resultado);
            }else{
                if(isset($datos['op_upload']) && $swfile == "on"){
                    $resultado = array(
                        'response' => "NoFile",   
                        'success' => false,
                        'message' => 'Ingrese un archivo.'
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                }else{
                    if($proc == 'rechazar'){
                        $rev_prev = $this->previous_user($doc_idrv);

                        if($rev_prev > 0){
                            $docrevision->setEstadodoc('');
                            $docrevision->setFirma('');
                        }
                    }
                    else $docrevision->setEstadodoc('DERIVADO SIN MODIFICACIONES');

                    if($docproceso->getFkaprobador()->getId() == $idu && $proc != 'rechazar') $docrevision->setEstadodoc('PARA PUBLICAR');

                    if($proc != 'rechazar'){
                        $cx->persist($docrevision);
                        $cx->flush();
                    }
                    else $nrev = 0;
                    
                    $this->sending_mail($mailer, $nrev, $id, $proc, $website);
                    $resultado = array(
                        'response' => "Saved",   
                        'success' => true,
                        'message' => 'Datos registrados correctamente.',
                        'revisor' => $nrev,
                        'idc' => $id,
                        'proceso' => $proc
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                }
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentoproceso_finalrev", methods={"POST"}, name="documentoproceso_finalrev")
     */
    public function finalrev()
    {
        try {
            $file = $_FILES;
            $datos = $_POST;
            $cx = $this->getDoctrine()->getManager();

            $id = $datos['idfr'];
            $accion = $datos['accion'];
            $url = 'N/A';
            $urladd = 'N/A';

            $s_user = $this->get('session')->get('s_user');
            $idu = $s_user['id'];
            $docproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);

            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");
            $docproceso->setFechaaprobacion(new \DateTime($fecha));
            if($accion == 'aprobar') $docproceso->setAprobadorechazado('APROBADO');
            else $docproceso->setAprobadorechazado('RECHAZADO');

            $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($idu);
            $docproceso->setFkaprobador($aprobador);

            if(!empty($file['archivoadd']['name'])) {
                $uploadedFl = '';
                $flname = $file['archivoadd']['name'];
                $source = $file['archivoadd']['tmp_name'];
                $target = $this->getParameter('Directorio_DocProceso') . '/' . $flname;
                
                if(move_uploaded_file($source, $target)){
                    $uploadedFl = $flname;
                }
                $rutadd = substr($target, strpos($target, "public") + 6, strlen($target));
                $urladd = str_replace("\\", "/", $rutadd);
            }

            if(!empty($file['archivopdf']['name'])) {
                $uploadedFile = '';
                $filenames = $file['archivopdf']['name'];
                $sourcePath = $file['archivopdf']['tmp_name'];
                $targetPath = $this->getParameter('Directorio_DocProceso') . '/' . $filenames;
                
                $extension = substr($file['archivopdf']['name'], strrpos($file['archivopdf']['name'], "."), strlen($file['archivopdf']['name']));
                $ruta = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                $url = str_replace("\\", "/", $ruta);
                $docproceso->setVinculoarchivo($url);
                
                if($extension == '.pdf'){
                    if(move_uploaded_file($sourcePath, $targetPath)){
                        $uploadedFile = $filenames;
                    }
                    $cx->persist($docproceso);
                    $cx->flush();
                }else{
                    $resultado = array(
                        'response' => "Type",   
                        'success' => false,
                        'message' => 'Extension inválida.'
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                }
            }else{
                if($accion != 'rechazar'){
                    $resultado = array(
                        'response' => "NoFile",   
                        'success' => false,
                        'message' => 'Ingrese un archivo.'
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                }
            }

            if ($docproceso->getNuevoactualizacion() == 'NUEVO') {
                $fnd_tipo = $docproceso->getFktipo()->getNombre();
                $fnd_fkdoc = $datos['documento'];
                $fnd_dproc = $docproceso;
                $fnd_urlf = $url;
                $fnd_fadd = $urladd;
                $fnd_aprob = $aprobador;

                $this->new_document($fnd_tipo, $fnd_fkdoc, $fnd_dproc, $fnd_urlf, $fnd_fadd, $fnd_aprob);
            } else {
                if ($docproceso->getNuevoactualizacion() == 'ACTUALIZACION') {
                    $fud_tipo = $docproceso->getFktipo()->getNombre();
                    $fud_fkdoc = $datos['documento'];
                    $fud_dproc = $docproceso;
                    $fud_urlf = $url;
                    $fud_fadd = $urladd;
                    $fud_aprob = $aprobador;
                    
                    $this->update_document($fud_tipo, $fud_fkdoc, $fud_dproc, $fud_urlf, $fud_fadd, $fud_aprob);
                } else {
                    $frd_tipo = $docproceso->getFktipo()->getNombre();
                    $frd_fkdoc = $datos['documento'];
                    $frd_dproc = $docproceso;
                    $frd_urlf = $url;
                    $frd_fadd = $urladd;
                    $frd_aprob = $aprobador;
                    $frd_idoc = $id;
                    
                    $this->remove_document($frd_tipo, $frd_fkdoc, $frd_dproc, $frd_urlf, $frd_fadd, $frd_aprob, $frd_idoc);
                }
            }
            $resultado = array(
                'response' => "Save",   
                'success' => true,
                'message' => 'Datos registrados correctamente.'
            );
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function new_document($tipo, $fkdoc, $docproceso, $url, $urladd, $aprobador)
    {
        $cx = $this->getDoctrine()->getManager();
        if ($tipo == 'Formulario') {
            $fkdoc != '' ? $fkdoc = $this->getDoctrine()->getRepository(Documento::class)->find($fkdoc) : $fkdoc = null;

            $docformulario = new DocumentoFormulario();
            $docformulario->setCodigo($docproceso->getCodigonuevo());
            $docformulario->setTitulo($docproceso->getTitulo());
            $docformulario->setVersionVigente($docproceso->getVersionvigente());
            $docformulario->setVinculoFileDig($url);
            $docformulario->setvinculoFileDesc($urladd);
            $docformulario->setFechaPublicacion($docproceso->getFechaaprobacion());
            $docformulario->setEstado(1);

            $docformulario->setFkdocumento($fkdoc);
            $docformulario->setFkaprobador($aprobador);
            $cx->persist($docformulario);
            $cx->flush();
        } else {
            $documento = new Documento();
            $documento->setCodigo($docproceso->getCodigonuevo());
            $documento->setTitulo($docproceso->getTitulo());
            $documento->setVersionvigente($docproceso->getVersionvigente());
            $documento->setVinculoarchivodig($url);
            $documento->setVinculodiagflujo($urladd);
            $documento->setCarpetaOperativa($docproceso->getCarpetaoperativa());
            $documento->setFechaPublicacion($docproceso->getFechaaprobacion());
            $documento->setEstado(1);

            $documento->setFkficha($docproceso->getFkproceso());
            $documento->setFktipo($docproceso->getFktipo());
            $documento->setFkaprobador($aprobador);
            $cx->persist($documento);
            $cx->flush();
        }
    }

    public function update_document($tipo, $fkdoc, $docproceso, $url, $urladd, $aprobador)
    {
        $cx = $this->getDoctrine()->getManager();
        if ($tipo == 'Formulario') {
            $fkdoc != '' ? $fkdoc = $this->getDoctrine()->getRepository(Documento::class)->find($fkdoc) : $fkdoc = null;

            $dcform = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($docproceso->getFkformulario()->getId());
            $dcform->setTitulo($docproceso->getTitulo());
            $dcform->setVersionVigente($docproceso->getVersionvigente());
            $dcform->setVinculoFileDig($url);

            if($dcform->getvinculoFileDesc() == 'N/A' && $urladd != 'N/A' || $dcform->getvinculoFileDesc() == null && $urladd != 'N/A' || $dcform->getvinculoFileDesc() == '' && $urladd != 'N/A' || $urladd != 'N/A'){
                $dcform->setvinculoFileDesc($urladd);
            }
            $dcform->setFechaPublicacion($docproceso->getFechaaprobacion());

            $dcform->setFkdocumento($fkdoc);
            $dcform->setFkaprobador($aprobador);
            $cx->merge($dcform);
            $cx->flush();
        } else {
            $dcto = $this->getDoctrine()->getRepository(Documento::class)->find($docproceso->getFkdocumento()->getId());
            $dcto->setTitulo($docproceso->getTitulo());
            $dcto->setVersionvigente($docproceso->getVersionvigente());
            $dcto->setVinculoarchivodig($url);

            if($dcto->getVinculodiagflujo() == 'N/A' && $urladd != 'N/A' || $dcto->getVinculodiagflujo() == null && $urladd != 'N/A' || $dcto->getVinculodiagflujo() == '' && $urladd != 'N/A' || $urladd != 'N/A'){
                $dcto->setVinculodiagflujo($urladd);
            }
            $dcto->setCarpetaOperativa($docproceso->getCarpetaoperativa());

            $dcto->setFkficha($docproceso->getFkproceso());
            $dcto->setFktipo($docproceso->getFktipo());
            $dcto->setFkaprobador($aprobador);
            $dcto->setFechaPublicacion($docproceso->getFechaaprobacion());
            $cx->merge($dcto);
            $cx->flush();
        }
    }

    public function remove_document($type, $fkdoc, $docproceso, $url, $urladd, $aprobador, $id)
    {
        $s_user = $this->get('session')->get('s_user');
        $revisor = $s_user['id'];
        $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($revisor);
        date_default_timezone_set('America/La_Paz');
        $fecha = date("Y-m-d H:i:s");
        $cx = $this->getDoctrine()->getManager();

        if ($type == 'Formulario') {
            $docformulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($docproceso->getFkformulario()->getId());

            $bajadoc = new DocumentoBaja();
            $bajadoc->setCodigo($docformulario->getCodigo());
            $bajadoc->setTitulo($docformulario->getTitulo());
            $bajadoc->setVersionvigente($docformulario->getversionVigente());
            $bajadoc->setVinculoarchivo($docformulario->getVinculoFileDig());
            
            
            $bajadoc->setFechapublicacion(new \DateTime($fecha));
            $bajadoc->setEstado(1);
            $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->findOneBy(['nombre' => 'Formulario']);

            if(!empty($tipo)) $bajadoc->setFktipo($tipo);
            $bajadoc->setFkaprobador($usuario);
            $bajadoc->setFkproceso($docproceso->getFkproceso());
            $cx->persist($bajadoc);
            $cx->flush();   

            $docformulario->setEstado(0);
            $cx->persist($docformulario);
            $cx->flush();
        } else {
            $documento = $this->getDoctrine()->getRepository(Documento::class)->find($docproceso->getFkdocumento()->getId());

            $proceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $procesos = (array) $proceso;
            if(isset($procesos[0])){
                foreach ($proceso as $proc) {
                    $procdt = (object) $proc;
                    $procdt->setEstado(0);
                    $cx->persist($procdt);
                    $cx->flush();
                }
            }

            $formulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $formularios = (array) $formulario;
            if(isset($formularios[0])){
                foreach ($formulario as $form) {
                    $formdt = (object) $form;
                    $formdt->setEstado(0);
                    $cx->persist($formdt);
                    $cx->flush();
                }
            }

            $norma = $this->getDoctrine()->getRepository(NormaDocumento::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $normas = (array) $norma;
            if(isset($normas[0])){
                foreach ($norma as $nrm) {
                    $nrmdt = (object) $nrm;
                    $nrmdt->setEstado(0);
                    $cx->persist($nrmdt);
                    $cx->flush();
                }
            }
            
            $asociado = $this->getDoctrine()->getRepository(DocumentosAso::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $asociados = (array) $asociado;
            if(isset($asociados[0])){
                foreach ($asociado as $asoc) {
                    $asocdt = (object) $asoc;
                    $asocdt->setEstado(0);
                    $cx->persist($asocdt);
                    $cx->flush();
                }
            }

            $bajadoc = new DocumentoBaja();
            $bajadoc->setCodigo($documento->getCodigo());
            $bajadoc->setTitulo($documento->getTitulo());
            $bajadoc->setVersionvigente($documento->getversionVigente());
            $bajadoc->setVinculoarchivo($documento->getVinculoarchivodig());

            if($documento->getFechaPublicacion() != null) $bajadoc->setFechapublicacion(new \DateTime($fecha));
            $bajadoc->setCarpetaoperativa($documento->getCarpetaOperativa());
            $bajadoc->setEstado(1);
            $bajadoc->setFkproceso($documento->getFkficha());
            $bajadoc->setFktipo($documento->getFktipo());
            $bajadoc->setFkaprobador($usuario);
            $cx->persist($bajadoc);
            $cx->flush();   

            $documento->setEstado(0);
            $cx->persist($documento);
            $cx->flush();
        }
    }
}
