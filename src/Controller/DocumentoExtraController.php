<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\DocumentoExtra;
use App\Entity\DocTipoExtra;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Form\DocumentoExtraType;
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
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class DocumentoExtraController extends Controller
{
    /**
     * @Route("/documentoextra", name="documentoextra_listar")
     * @Method({"GET"})
     */
    public function index(DocumentoExtra $docextra = null, Request $request)
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

        $form = $this->createForm(DocumentoExtraType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosDocumento = $form->getData();
            
            if($datosDocumento->getId() == 0 ){
                $docextra = new DocumentoExtra();
            }else{
                $docextra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->find($datosDocumento->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['vinculoarchivo']->getData())){
                if($docextra->getVinculoarchivo() == null){
                    $docextra->setVinculoarchivo("N/A");
                }
            }else{
                $file = $form['vinculoarchivo']->getData();
                $fileName = $file->getClientOriginalName();     
                $directorio = $this->getParameter('Directorio_DocExtra');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $docextra->setVinculoarchivo($url);
            }

            $docextra->setCodigo($datosDocumento->getCodigo());
            $docextra->setTitulo($datosDocumento->getTitulo());
            $docextra->setFechapublicacion($datosDocumento->getFechapublicacion());
            $docextra->setVigente($datosDocumento->getVigente());
            $docextra->setEstado(1);
            
            $proceso = new FichaProcesos();
            $proceso = $datosDocumento->getFkproceso();
            $docextra->setFkproceso($proceso);

            $tipo = new DocTipoExtra();
            $tipo = $datosDocumento->getFktipo();
            $docextra->setFktipo($tipo);

            if($datosDocumento->getId() == 0){
                $cx->persist($docextra);
                $cx->flush();
                unset($docextra);
                unset($datosDocumento);
            }else{
                $cx->merge($docextra);
                $cx->flush();
                unset($docextra);
                unset($datosDocumento);
            }
            $redireccion = new RedirectResponse('/documentoextra');
            return $redireccion;
        }

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $DocumentoExtra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->findBy(array('estado' => '1'));
        return $this->render('documentoextra/index.html.twig', array('objects' => $DocumentoExtra, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/documentoextra_editar", methods={"POST"}, name="documentoextra_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documentoextra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->find($id);
            $fpb = $documentoextra->getFechapublicacion();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $documentoextra->getId(),
                "codigo" => $documentoextra->getCodigo(),
                "titulo" => $documentoextra->getTitulo(),
                "fechapublicacion" => $result,
                "vigente" => $documentoextra->getVigente(),
                "vinculoarchivo" => $documentoextra->getVinculoarchivo(),
                "fktipo" => $documentoextra->getFktipo(),
                "fkproceso" => $documentoextra->getFkproceso()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento extra listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/documentoextra_eliminar", methods={"POST"}, name="documentoextra_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $documentoextra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->find($id);

            $documentoextra->setEstado(0);
            $cx->persist($documentoextra);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$documentoextra->getId().".",'success' => true,
                'message' => 'Documento extra dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}