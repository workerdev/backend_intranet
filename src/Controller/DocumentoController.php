<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\EstadoDocumento;
use App\Entity\Documento;
use App\Entity\DocumentoBaja;
use App\Entity\DocumentoProceso;
use App\Entity\DocumentoFormulario;
use App\Entity\NormaDocumento;
use App\Entity\DocumentosAso;
use App\Form\DocumentoType;
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
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

use App\Entity\Rol;

class DocumentoController extends Controller
{
    /**
     * @Route("/documento", name="documento_listar")
     * @Method({"GET"})
     */
    public function index(Documento $documento = null, Request $request)
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

        $form = $this->createForm(DocumentoType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosDocumento = $form->getData();
            
            if($datosDocumento->getId() == 0 ){
                $documento = new Documento();
            }else{
                $documento = $this->getDoctrine()->getRepository(Documento::class)->find($datosDocumento->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['vinculoarchivodig']->getData())){
                if($documento->getVinculoarchivodig() == null){
                    $documento->setVinculoarchivodig("N/A");
                }
            }else{
                $file = $form['vinculoarchivodig']->getData();
                $fileName = $file->getClientOriginalName();  
                $directorio = $this->getParameter('Directorio_Documento');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $documento->setVinculoarchivodig($url);
            } 

            if(empty($form['vinculodiagflujo']->getData())){
                if($documento->getvinculodiagflujo() == null){
                    $documento->setvinculodiagflujo("N/A");
                }
            }else{
                $file = $form['vinculodiagflujo']->getData();
                $fileName = $file->getClientOriginalName();             
                $directorio = $this->getParameter('Directorio_Documento');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $documento->setvinculodiagflujo($url);
            }
            
            $documento->setCodigo($datosDocumento->getCodigo());
            $documento->setVersionvigente($datosDocumento->getVersionvigente());
            $documento->setTitulo($datosDocumento->getTitulo());
            $documento->setFechaPublicacion($datosDocumento->getFechaPublicacion());

            if($datosDocumento->getCarpetaOperativa() == null) $documento->setCarpetaOperativa('');
            else $documento->setCarpetaOperativa($datosDocumento->getCarpetaOperativa());
            $documento->setEstado(1);
            
            $proceso = new FichaProcesos();
            $proceso = $datosDocumento->getFkficha();
            $documento->setFkficha($proceso);

            $tipo = new TipoDocumento();
            $tipo = $datosDocumento->getFktipo();
            $documento->setFktipo($tipo);

            $aprobador = new Usuario();
            $aprobador = $datosDocumento->getFkaprobador();
            $documento->setFkaprobador($aprobador);

            if($datosDocumento->getId() == 0){
                $cx->persist($documento);
                $cx->flush();
                unset($documento);
                unset($datosDocumento);
            }else{
                $cx->persist($documento);
                $cx->flush();
                unset($documento);
                unset($datosDocumento);
            }
            $redireccion = new RedirectResponse('/documento');
            return $redireccion;
        }

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        $Documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'));
        return $this->render('documento/index.html.twig', array('objects' => $Documento, 'form' => $form->createView(), 'aprobador' => $aprobador, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/documento_insertar", methods={"POST"}, name="documento_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $codigo = $sx['codigo'];
            $titulo = $sx['titulo'];
            $versionvigente = $sx['versionvigente'];
            $vinculoarchivo = $sx['vinculoarchivodig'];
            $vinculodiag = $sx['vinculoarchivodig'];
            $ficha = $sx['fkficha'];
            $tipo = $sx['fktipo'];
            $aprobador = $sx['fkaprobador'];
            $fechapb = $sx['fechaPublicacion'];
            $carpetaop = $sx['carpetaOperativa'];

            $Documento = new Documento();
            $Documento->setCodigo($codigo);
            $Documento->setTitulo($titulo);
            $Documento->setVersionvigente($versionvigente);
            $Documento->setVinculoarchivodig($vinculoarchivo);
            $Documento->setVinculodiagflujo($vinculodiag);
            $Documento->setFechaPublicacion(new \DateTime($fechapb));
            $Documento->setCarpetaOperativa($carpetaop);
            $Documento->setEstado(1);

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha) : $ficha=null;
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo=null;
            $aprobador != '' ? $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($aprobador) : $aprobador =null;
                $Documento->setFkficha($ficha);
                $Documento->setFktipo($tipo);
                $Documento->setFkaprobador($aprobador);

            $errors = $validator->validate($Documento);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new  Response(json_encode($array));
            }

            $cx->persist($Documento);
            $cx->flush();

            $resultado = array('response' => "El ID registrado es: " . $Documento->getId() . ".", 'success' => true,
                'message' => 'Documento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
 

    /**
     * @Route("/documento_actualizar", methods={"POST"}, name="documento_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $codigo = $sx['codigo'];
            $titulo = $sx['titulo'];
            $versionvigente = $sx['versionvigente'];
            $vinculoarchivo = $sx['vinculoarchivodig'];
            $vinculodiag = $sx['vinculoarchivodig'];
            $ficha = $sx['fkficha'];
            $tipo = $sx['fktipo'];
            $aprobador = $sx['fkaprobador'];
            $fechapb = $sx['fechaPublicacion'];
            $carpetaop = $sx['carpetaOperativa'];

            $Documento = new Documento();
            $Documento->setId($id);
            $Documento->setCodigo($codigo);
            $Documento->setTitulo($titulo);
            $Documento->setVersionvigente($versionvigente);
            $Documento->setVinculoarchivodig($vinculoarchivo);
            $Documento->setVinculodiagflujo($vinculodiag);
            $Documento->setFechaPublicacion(new \DateTime($fechapb));
            $Documento->setCarpetaOperativa($carpetaop);
            $Documento->setEstado(1);

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha) : $ficha=null;
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo=null;
            $aprobador != '' ? $aprobador = $this->getDoctrine()->getRepository(Usuario::class)->find($aprobador) : $aprobador =null;
            $Documento->setFkficha($ficha);
            $Documento->setFktipo($tipo);
            $Documento->setFkaprobador($aprobador);

            $cx->merge($Documento);
            $cx->flush();

            $resultado = array('success' => true,
                'message' => 'Documento actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documento_editar", methods={"POST"}, name="documento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $Documento = $this->getDoctrine()->getRepository(Documento::class)->find($id);
            $fpb = $Documento->getFechaPublicacion();
            if($fpb != null) $result = $fpb->format('Y-m-d').'T'.$fpb->format('H:i'); else $result = $fpb;
            $sendinf = [
                "id" => $Documento->getId(),
                "codigo" => $Documento->getCodigo(),
                "titulo" => $Documento->getTitulo(),
                "versionVigente" => $Documento->getversionVigente(),
                "vinculoarchivodig" => $Documento->getVinculoarchivodig(),
                "vinculodiagflujo" => $Documento->getVinculodiagflujo(),
                "fechaPublicacion" => $result,
                "carpetaOperativa" => $Documento->getCarpetaOperativa(),
                "fkficha" => $Documento->getFkficha(),
                "fktipo" => $Documento->getFktipo(),
                "fkaprobador" => $Documento->getFkaprobador()
                //"server" => $_SERVER['SERVER_NAME'].' - '.$_SERVER['SERVER_PORT']
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento listado correctamente.');
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/documento_prev", methods={"POST"}, name="documento_prev")
     */
    public function documento_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $proceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $formulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $norma = $this->getDoctrine()->getRepository(NormaDocumento::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            $asociado = $this->getDoctrine()->getRepository(DocumentosAso::class)->findBy(array('fkdocumento' => $id, 'estado' => '1'));
            
            if(sizeof($proceso) == 0 && sizeof($formulario) == 0 && sizeof($norma) == 0 && sizeof($asociado) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja de la auditoría.');
            }else{ $vr = "";
                if(sizeof($proceso) > 0) $vr = $vr."- Documento en proceso\n";
                if(sizeof($formulario) > 0) $vr = $vr."- Docuemento formulario\n";
                if(sizeof($norma) > 0) $vr = $vr."- Norma documento\n";
                if(sizeof($asociado) > 0) $vr = $vr."- Documentos asociados\n";

                $info = array('response'=>"El documento tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al documento.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documento_eliminar", methods={"POST"}, name="documento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $Documento = $this->getDoctrine()->getRepository(Documento::class)->find($id);
            $s_user = $this->get('session')->get('s_user');
            $idu = $s_user['id'];
            $user = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['id' => $idu, 'estado' => '1']);

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

            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i");
            $bajadoc = new DocumentoBaja();
            $bajadoc->setCodigo($Documento->getCodigo());
            $bajadoc->setTitulo($Documento->getTitulo());
            $bajadoc->setVersionvigente($Documento->getversionVigente());
            $bajadoc->setVinculoarchivo($Documento->getVinculoarchivodig());
            $bajadoc->setFechapublicacion(new \DateTime($fecha));
            $bajadoc->setCarpetaoperativa($Documento->getCarpetaOperativa());
            $bajadoc->setEstado(1);
            $bajadoc->setFkproceso($Documento->getFkficha());
            $bajadoc->setFktipo($Documento->getFktipo());
            $bajadoc->setFkaprobador($user);
            $cx->persist($bajadoc);
            $cx->flush();   

            $Documento->setEstado(0);
            $cx->persist($Documento);
            $cx->flush();

            $resultado = array('response' => "El ID modificado es: " . $Documento->getId() . ".", 'success' => true,
                'message' => 'Documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }


    /**     
     * @Route("/documento_tipodoc", methods={"POST"}, name="documento_tipodoc")
     */
    public function tipodoc()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            
            $documentos = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1', 'fktipo' => $id), array('codigo' => 'ASC'));

            $docs = array();
            foreach ($documentos as $doc) {
                $documento = (object) $doc;
                $item = $this->getDoctrine()->getRepository(Documento::class)->find($documento->getId());
                $fcpb = $documento->getFechaPublicacion();
                if ($fcpb !== null) $result = $fcpb->format('Y-m-d H:i'); else $result = $fcpb;

                $info = [
                    "id" => $documento->getId(),
                    "codigo" => $documento->getCodigo(),
                    "titulo" => $documento->getTitulo(),
                    "versionVigente" => $documento->getversionVigente(),
                    "vinculoarchivodig" => $documento->getVinculoarchivodig(),
                    "vinculodiagflujo" => $documento->getVinculodiagflujo(),
                    "fechaPublicacion" => $result,
                    "carpetaOperativa" => $documento->getCarpetaOperativa(),
                    "fkficha" => $documento->getFkficha(),
                    "fktipo" => $documento->getFktipo(),
                    "fkaprobador" => $documento->getFkaprobador()
                ];
                $docs[] = $info;
            }            

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($docs, 'json');
            $resultado = array(
                'response'=>$json,'success' => true,
                'message' => 'Documentos listados correctamente.'
            );
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documento_alldoc", methods={"POST"}, name="documento_alldoc")
     */
    public function alldoc()
    {
        try {
            //$tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($id);
            $documentos = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'), array('codigo' => 'ASC'));

            $docs = array();
            foreach ($documentos as $doc) {
                $documento = (object) $doc;
                $item = $this->getDoctrine()->getRepository(Documento::class)->find($documento->getId());
                $fcpb = $documento->getFechaPublicacion();
                if ($fcpb !== null) $result = $fcpb->format('Y-m-d H:i'); else $result = $fcpb;

                $info = [
                    "id" => $documento->getId(),
                    "codigo" => $documento->getCodigo(),
                    "titulo" => $documento->getTitulo(),
                    "versionVigente" => $documento->getversionVigente(),
                    "vinculoarchivodig" => $documento->getVinculoarchivodig(),
                    "vinculodiagflujo" => $documento->getVinculodiagflujo(),
                    "fechaPublicacion" => $result,
                    "carpetaOperativa" => $documento->getCarpetaOperativa(),
                    "fkficha" => $documento->getFkficha(),
                    "fktipo" => $documento->getFktipo(),
                    "fkaprobador" => $documento->getFkaprobador()
                ];
                $docs[] = $info;
            }       

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($docs, 'json');
            $resultado = array(
                'response'=>$json,'success' => true,
                'message' => 'Documentos listados correctamente.'
            );
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
}