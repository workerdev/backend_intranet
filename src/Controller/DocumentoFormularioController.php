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
        $DocumentoFormulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->findBy(array('estado' => '1'));
        $Documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('documentoformulario/index.html.twig', array('objects' => $DocumentoFormulario, 'documento' => $Documento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/documentoformulario_insertar", methods={"POST"}, name="documentoformulario_insertar")
     */
    public function insertar(ValidatorInterface $validator  )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $documento = $sx['documento'];
            $codigo = $sx['codigo'];
            $titulo = $sx['titulo'];
            $version = $sx['version'];
            $fecha = $sx['fechapb'];                
            //$carpetaop = $sx['carpeta'];
            $vinculodig = $sx['vfiledg'];              
            $vinculodesc = $sx['vfileds'];             
            $aprobador = $sx['aprobador']; 

            $DocumentoFormulario = new DocumentoFormulario();
            $DocumentoFormulario->setCodigo($codigo);
            $DocumentoFormulario->setTitulo($titulo);
            $DocumentoFormulario->setVersionVigente($version);
            $DocumentoFormulario->setFechaPublicacion(new \DateTime($fecha));
            $DocumentoFormulario->setAprobadoPor($aprobador);
            //$carpetaop == '' ? $carpetaop = null:$carpetaop;
            //$DocumentoFormulario->setCarpetaOperativa($carpetaop);
            $DocumentoFormulario->setVinculoDig($vinculodig);
            $DocumentoFormulario->setVinculoDesc($vinculodesc);
            $DocumentoFormulario->setEstado(1);

            $documento !=''? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento):$documento = null ;
            $DocumentoFormulario->setFkdocumento($documento);
            $errors = $validator->validate($DocumentoFormulario);
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
            $cx->persist($DocumentoFormulario);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$DocumentoFormulario->getId().".",   
            'success' => true,
            'message' => 'Documento formulario registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/documentoformulario_actualizar", methods={"POST"}, name="documentoformulario_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documento = $sx['documento'];
            $codigo = $sx['codigo'];
            $titulo = $sx['titulo'];
            $version = $sx['version'];
            $fecha = $sx['fechapb'];                    
            $vinculodig = $sx['vfiledg'];              
            $vinculodesc = $sx['vfileds'];            
            $aprobador = $sx['aprobador']; 

            $DocumentoFormulario = $this->getDoctrine()->getRepository(DocumentoFormulario::class)->find($id);
            $DocumentoFormulario->setId($id);
            $DocumentoFormulario->setCodigo($codigo);
            $DocumentoFormulario->setTitulo($titulo);
            $DocumentoFormulario->setVersionVigente($version);
            $DocumentoFormulario->setFechaPublicacion(new \DateTime($fecha));
            $DocumentoFormulario->setAprobadoPor($aprobador);
            //$carpetaop == '' ? $carpetaop = null:$carpetaop;
            //$DocumentoFormulario->setCarpetaOperativa($carpetaop);
            $DocumentoFormulario->setVinculoDig($vinculodig);
            $DocumentoFormulario->setVinculoDesc($vinculodesc);
            $DocumentoFormulario->setEstado(1);

            $documento !=''? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento):$documento = null ;
            $DocumentoFormulario->setFkdocumento($documento);
            $errors = $validator->validate($DocumentoFormulario);
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

            $cx->merge($DocumentoFormulario);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento formulario actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
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
                "aprobadoPor" => $DocumentoFormulario->getAprobadoPor(),
                "vinculoDig" => $DocumentoFormulario->getVinculoDig(),
                "vinculoDesc" => $DocumentoFormulario->getVinculoDesc(),
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