<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\DocumentoFormulario;
use App\Entity\Documento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Form\DocumentoFormularioType;
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


class DocumentoFormularioController extends AbstractController
{ 
    /**
     * @Route("/documentoformulario", name="documentoformulario")
     * @Method({"GET"})
     */
    public function index(DocumentoFormulario $docformulario = null, Request $request)
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

        $form = $this->createForm(DocumentoFormularioType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosDocumento = $form->getData();
            
            if($datosDocumento->getId() == 0 ){
                $docformulario = new DocumentoFormulario();
            }else{
                $docformulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($datosDocumento->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['vinculoFileDig']->getData())){
                if($docformulario->getVinculoFileDig() == null){
                    $docformulario->setVinculoFileDig("N/A");
                }
            }else{
                $file = $form['vinculoFileDig']->getData();
                $fileName = $file->getClientOriginalName();             
                $directorio = $this->getParameter('Directorio_DocFormulario');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $docformulario->setVinculoFileDig($url);
            } 

            if(empty($form['vinculoFileDesc']->getData())){
                if($docformulario->getvinculoFileDesc() == null){
                    $docformulario->setvinculoFileDesc("N/A");
                }
            }else{
                $file = $form['vinculoFileDesc']->getData();
                $fileName = $file->getClientOriginalName();             
                $directorio = $this->getParameter('Directorio_DocFormulario');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $docformulario->setvinculoFileDesc($url);
            }

            $docformulario->setCodigo($datosDocumento->getCodigo());
            $docformulario->setTitulo($datosDocumento->getTitulo());
            $docformulario->setVersionVigente($datosDocumento->getVersionVigente());
            $docformulario->setFechaPublicacion($datosDocumento->getFechaPublicacion());
            $docformulario->setEstado(1);
            
            $documento = new Documento();
            $documento = $datosDocumento->getFkdocumento();
            $docformulario->setFkdocumento($documento);

            $aprobador = new Usuario();
            $aprobador = $datosDocumento->getFkaprobador();
            $docformulario->setFkaprobador($aprobador);

            if($datosDocumento->getId() == 0){
                $cx->persist($docformulario);
                $cx->flush();
                unset($docformulario);
                unset($datosDocumento);
            }else{
                $cx->merge($docformulario);
                $cx->flush();
                unset($docformulario);
                unset($datosDocumento);
            }
            $redireccion = new RedirectResponse('/documentoformulario');
            return $redireccion;
        }

        $DocumentoFormulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('documentoformulario/index.html.twig', array('objects' => $DocumentoFormulario, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/documentoformulario_editar", methods={"POST"}, name="documentoformulario_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $DocumentoFormulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($id);
            $fpb = $DocumentoFormulario->getFechaPublicacion();
            if($fpb != null) $result = $fpb->format('Y-m-d'); else $result = $fpb;
            $sendinf = [
                "id" => $DocumentoFormulario->getId(),
                "codigo" => $DocumentoFormulario->getCodigo(),
                "titulo" => $DocumentoFormulario->getTitulo(),
                "versionVigente" => $DocumentoFormulario->getversionVigente(),
                "fechaPublicacion" => $result,
                "fkaprobador" => $DocumentoFormulario->getFkaprobador(),
                "vinculoFileDig" => $DocumentoFormulario->getVinculoFileDig(),
                "vinculoFileDesc" => $DocumentoFormulario->getVinculoFileDesc(),
                "fkdocumento" => $DocumentoFormulario->getFkdocumento()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento formulario listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documentoformulario_eliminar", methods={"POST"}, name="documentoformulario_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $DocumentoFormulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($id);

            $DocumentoFormulario->setEstado(0);
            $cx->persist($DocumentoFormulario);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$DocumentoFormulario->getId().".",'success' => true,
                'message' => 'Documento formulario dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}