<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocumentoBaja;
use App\Form\DocumentoBajaType;
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


class DocumentoBajaController extends Controller
{
    /**
     * @Route("/bajadocumento", name="bajadocumento_listar")
     * @Method({"GET"})
     */
    public function index(DocumentoBaja $docbaja = null, Request $request)
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

        $form = $this->createForm(DocumentoBajaType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosDocumento = $form->getData();
            
            if($datosDocumento->getId() == 0 ){
                $docbaja = new DocumentoBaja();
            }else{
                $docbaja = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($datosDocumento->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['vinculoarchivo']->getData())){
                if($docbaja->getVinculoarchivo() == null){
                    $docbaja->setVinculoarchivo("N/A");
                }
            }else{
                $file = $form['vinculoarchivo']->getData();
                $fileName = $file->getClientOriginalName();      
                $directorio = $this->getParameter('Directorio_DocExtra');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;  
                $docbaja->setVinculoarchivo($url);
            }

            $docbaja->setCodigo($datosDocumento->getCodigo());
            $docbaja->setTitulo($datosDocumento->getTitulo());
            $docbaja->setVersionvigente($datosDocumento->getVersionvigente());
            $docbaja->setFechapublicacion($datosDocumento->getFechapublicacion());
            $docbaja->setCarpetaoperativa($datosDocumento->getCarpetaoperativa());
            $docbaja->setEstado(1);
            
            $ficha = new FichaProcesos();
            $ficha = $datosDocumento->getFkproceso();
            $docbaja->setFkproceso($ficha);

            $tipo = new TipoDocumento();
            $tipo = $datosDocumento->getFktipo();
            $docbaja->setFktipo($tipo);

            $aprobador = new Usuario();
            $aprobador = $datosDocumento->getFkaprobador();
            $docbaja->setFkaprobador($aprobador);

            if($datosDocumento->getId() == 0){
                $cx->persist($docbaja);
                $cx->flush();
                unset($docbaja);
                unset($datosDocumento);
            }else{
                $cx->merge($docbaja);
                $cx->flush();
                unset($docbaja);
                unset($datosDocumento);
            }
            $redireccion = new RedirectResponse('/bajadocumento');
            return $redireccion;
        }

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $DocumentoBaja = $this->getDoctrine()->getRepository(DocumentoBaja::class)->findBy(array('estado' => '1'));
        return $this->render('documentobaja/index.html.twig', array('objects' => $DocumentoBaja, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos , 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    
    /**
     * @Route("/bajadocumento_editar", methods={"POST"}, name="bajadocumento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $bajadocumento = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($id);
            $fpb = $bajadocumento->getFechapublicacion();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $bajadocumento->getId(),
                "codigo" => $bajadocumento->getCodigo(),
                "titulo" => $bajadocumento->getTitulo(),
                "versionvigente" => $bajadocumento->getVersionVigente(),
                "fechapublicacion" => $result,
                "fkaprobador" => $bajadocumento->getFkaprobador(),
                "carpetaoperativa" => $bajadocumento->getCarpetaoperativa(),
                "vinculoarchivo" => $bajadocumento->getVinculoarchivo(),
                "fkproceso" => $bajadocumento->getFkproceso(),
                "fktipo" => $bajadocumento->getFktipo()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento de baja listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/bajadocumento_eliminar", methods={"POST"}, name="bajadocumento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $bajadocumento = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($id);

            $bajadocumento->setEstado(0);
            $cx->persist($bajadocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$bajadocumento->getId().".",'success' => true,
                'message' => 'Documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}