<?php

namespace App\Controller;

use App\Entity\DocumentoExtra;
use App\Entity\Auditoria;
use App\Entity\DetalleDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class DetalleDocumentoController extends Controller
{
    /**
     * @Route("/detalledocumento", name="detalledocumento_listar")
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
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
       
        $DetalleDocumento = $this->getDoctrine()->getRepository(DetalleDocumento::class)->findBy(array('estado' => '1'));
        $Auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(array('estado' => '1'));
        $DocumentoExtra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->findBy(array('estado' => '1'));
        return $this->render('detalledocumento/index.html.twig', array('objects' => $DetalleDocumento, 'tipo' => $Auditoria, 'tipo2' => $DocumentoExtra, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/detalledocumento_insertar", methods={"POST"}, name="detalledocumento_insertar")
     */
    public function insertar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['auditoria'];
            $descripcion = $sx['documento'];

            $detalledocumento = new DetalleDocumento();
            $detalledocumento->setEstado(1);

            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria);
            $documento = $this->getDoctrine()->getRepository(DocumentoExtra::class)->find($documento);
            $detalledocumento->setFkauditoria($auditoria);                
            $detalledocumento->setFkdocumento($documento);                

            $cx->persist($detalledocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$detalledocumento->getId().".",'success' => true,
                'message' => 'Detalle del documento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/detalledocumento_actualizar", methods={"POST"}, name="detalledocumento_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['auditoria'];
            $descripcion = $sx['documento'];

            $detalledocumento = new DetalleDocumento();
            $detalledocumento->setId($id);
        
            $detalledocumento->setEstado(1);

            $tipo = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria);
            $tipo2 = $this->getDoctrine()->getRepository(DocumentoExtra::class)->find($documento);
            $detalledocumento->setFkauditoria($tipo);                
            $detalledocumento->setFkdocumento($tipo2);         

            $cx->merge($detalledocumento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Detalle del documento actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/detalledocumento_editar", methods={"POST"}, name="detalledocumento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $detalledocumento = $this->getDoctrine()->getRepository(DetalleDocumento::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($detalledocumento, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Detalle del documento listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/detalledocumento_eliminar", methods={"POST"}, name="detalledocumento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $detalledocumento = $this->getDoctrine()->getRepository(DetalleDocumento::class)->find($id);

            $detalledocumento->setEstado(0);
            $cx->persist($detalledocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$detalledocumento->getId().".",'success' => true,
                'message' => 'Detalle del documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}