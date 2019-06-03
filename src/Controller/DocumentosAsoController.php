<?php

namespace App\Controller;

use App\Entity\DocumentosAso;
use App\Entity\FichaCargo;
use App\Entity\Documento;
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
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;


class DocumentosAsoController extends Controller
{
    /**
     * @Route("/documentosaso", name="documentosaso_listar")
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
        
        $DocumentosAso = $this->getDoctrine()->getRepository(DocumentosAso::class)->findBy(array('estado' => '1'));
        
        $fichacargo = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('estado' => '1'));
        $documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'));
        
        return $this->render('documentosaso/index.html.twig', array('objects' => $DocumentosAso, 'tipo' => $fichacargo, 'tipo2' => $documento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/documentosaso_insertar", methods={"POST"}, name="documentosaso_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);

            $fichacargo = $sx['fichacargo'];
            $documento = $sx['documento'];
            
            $documentosaso = new DocumentosAso();
            $documentosaso->setEstado(1);
            
            $fichacargo != '' ? $fichacar = $this->getDoctrine()->getRepository(FichaCargo::class)->find($fichacargo): $fichacar=null;
            $documentosaso->setFkfichacargo($fichacar);

            $documento != '' ?$doc = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $doc = null;

            $documentosaso->setFkDocumento($doc);
            $errors = $validator->validate($documentosaso);
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
            $cx->persist($documentosaso);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$documentosaso->getId().".",'success' => true,
                'message' => 'Documento asociado registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentosaso_actualizar", methods={"POST"}, name="documentosaso_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fichacargo = $sx['fichacargo'];
            $documento = $sx['documento'];

            $documentosaso = $this->getDoctrine()->getRepository(DocumentosAso::class)->find($id);
            $documentosaso->setId($id);
            
            $documentosaso->setEstado(1);


            $fichacargo != '' ? $fichacar = $this->getDoctrine()->getRepository(FichaCargo::class)->find($fichacargo): $fichacar=null;
            $documentosaso->setFkfichacargo($fichacar);

            $documento != ''  ?  $doc = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $doc = null;
            $documentosaso->setFkDocumento($doc);
            $errors = $validator->validate($documentosaso);
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

            $cx->merge($documentosaso);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento asociado actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentosaso_editar", methods={"POST"}, name="documentosaso_editar")
     */
    public function editar()
    {
        try {
            $cx = json_decode($_POST['object'], true);
            $id = $cx['id'];
            $DocumentosAso = $this->getDoctrine()->getRepository(DocumentosAso::class)->find($id);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($DocumentosAso, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Gerencia listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentosaso_eliminar", methods={"POST"}, name="documentosaso_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $documentosaso = $this->getDoctrine()->getRepository(DocumentosAso::class)->find($id);

            $documentosaso->setEstado(0);
            $cx->persist($documentosaso);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$documentosaso->getId().".",'success' => true,
                'message' => 'Documento asociado dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}