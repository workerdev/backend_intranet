<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Documento;
use App\Entity\DocumentoBaja;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocumentoFormulario;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Entity\GrupoCorreo;
use App\Entity\Rol;
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


class PublicacionController extends AbstractController
{   
    /**
     * @Route("/publicaciondoc", name="publicaciondoc")
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
      
        $grupo = $this->getDoctrine()->getRepository(GrupoCorreo::class)->findBy(array('estado' => '1'));
        $publicacion = $this->getDoctrine()->getRepository(Documento::class)->findAllDoc();
        return $this->render('publicaciondoc/index.html.twig', array('objects' => $publicacion, 'grupo' => $grupo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/publicaciondoc_listar", methods={"POST"}, name="publicaciondoc_listar")
     */
    public function listar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $vldocs = $sx['docs'];

            $prevdocs = array();
            foreach ($vldocs as $dc){
                if($dc['tipo'] == 'Formulario'){
                    $dcto = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findOneBy(['id'=>$dc['id'], 'estado'=>'1']);
                }else{
                    if($dc['tipo'] == 'Baja'){
                        $dcto = $this->getDoctrine()->getRepository(DocumentoBaja::class)->findOneBy(['id'=>$dc['id'], 'estado'=>'1']);
                    }else{
                        $dcto = $this->getDoctrine()->getRepository(Documento::class)->findOneBy(['id'=>$dc['id'], 'estado'=>'1']);
                    }
                }
                $prevdocs[] = $dcto;
            }    
            $docs = array();
            foreach ($prevdocs as $ditem){
                if(property_exists($ditem, 'vinculoFileDig')){ // Formulario
                    $fpb = $ditem->getFechaPublicacion();
                    if($fpb != null) $result = $fpb->format('Y-m-d H:i:s'); else $result = $fpb;
                    $sendinf = [
                        "id" => $ditem->getId(),
                        "codigo" => $ditem->getCodigo(),
                        "titulo" => $ditem->getTitulo(),
                        "versionvigente" => $ditem->getVersionVigente(),
                        "vinculofiledig" => $ditem->getVinculoFileDig(),
                        "vinculofiledesc" => $ditem->getVinculoFileDesc(),
                        "fechapublicacion" => $result,
                        "fkficha" => $ditem->getFkdocumento()->getFkficha(),
                        "fkaprobador" => $ditem->getFkaprobador(),
                        "fkdocumento" => $ditem->getFkdocumento(),
                        "isform" => "true",
                        "isdisabled" => "false"
                    ];
                } else {
                    if(property_exists($ditem, 'vinculoarchivo')){ // Baja
                        $fpb = $ditem->getFechapublicacion();
                        if($fpb != null) $result = $fpb->format('Y-m-d H:i:s'); else $result = $fpb;
                        $sendinf = [
                            "id" => $ditem->getId(),
                            "codigo" => $ditem->getCodigo(),
                            "titulo" => $ditem->getTitulo(),
                            "versionvigente" => $ditem->getVersionVigente(),
                            "fechapublicacion" => $result,
                            "fkaprobador" => $ditem->getFkaprobador(),
                            "vinculoarchivo" => $ditem->getVinculoarchivo(),
                            "fkficha" => $ditem->getFkproceso(),
                            "fktipo" => $ditem->getFktipo(),
                            "isform" => "false",
                            "isdisabled" => "true"
                        ];
                    } else { // Documento
                        $fpb = $ditem->getFechaPublicacion();
                        if($fpb != null) $result = $fpb->format('Y-m-d H:i:s'); else $result = $fpb;
                        $sendinf = [
                            "id" => $ditem->getId(),
                            "codigo" => $ditem->getCodigo(),
                            "titulo" => $ditem->getTitulo(),
                            "versionvigente" => $ditem->getVersionVigente(),
                            "fechapublicacion" => $result,
                            "fkaprobador" => $ditem->getFkaprobador(),
                            "vinculoarchivodig" => $ditem->getVinculoarchivodig(),
                            "vinculodiagflujo" => $ditem->getVinculodiagflujo(),
                            "carpetaOperativa" => $ditem->getCarpetaOperativa(),
                            "fkficha" => $ditem->getFkficha(),
                            "fktipo" => $ditem->getFktipo(),
                            "isform" => "false",
                            "isdisabled" => "false"
                        ];
                    }
                }
                $docs[] = $sendinf;
            }
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($docs, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documentos en revisión listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/publicaciondoc_publicar", methods={"POST"}, name="publicaciondoc_publicar")
     */
    public function publicar(ValidatorInterface $validator, \Swift_Mailer $mailer)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");
            
            $datadoc = $sx['datadoc'];
            $dtgrupo = $sx['grupos'];
            /*foreach ($datadoc as $dc){
                if($dc['isform'] == 'true'){
                    $docform = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($dc['id']);
                    $docform->setFechaPublicacion(new \DateTime($fecha));
                    $cx->merge($docform);
                    $cx->flush();
                }else{
                    if($dc['isdisabled'] == 'true'){
                        $bajadoc = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($dc['id']);
                        $bajadoc->setFechaPublicacion(new \DateTime($fecha));
                        $cx->merge($bajadoc);
                        $cx->flush();
                    }else{
                        $doc = $this->getDoctrine()->getRepository(Documento::class)->find($dc['id']);
                        $doc->setFechaPublicacion(new \DateTime($fecha));
                        $cx->merge($doc);
                        $cx->flush();
                    }
                }
            }*/

            foreach ($dtgrupo as $gp){
                $grupo = $this->getDoctrine()->getRepository(GrupoCorreo::class)->find($gp);
                
                $message = (new \Swift_Message('ELFEC - Documentos en vigencia'))
                    ->setFrom($_SERVER['REMITENTE_CORREO'])
                    ->setTo($grupo->getCorreo())
                    ->setBody($this->renderView('mail/publicacion.html.twig', 
                        array(
                            'doclist' => $datadoc, 
                            'adicional' => array('fecha'=>$fecha, 'dominio'=>$_SERVER['HTTP_HOST'], 'logo'=>'/resources/images/h_color_lg.png')
                        )
                    ), 'text/html');

                $mailer->send($message);
            }

            $resultado = array('response'=>"Datos guardados.",   
            'success' => true,
            'message' => 'Documentos publicados correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}