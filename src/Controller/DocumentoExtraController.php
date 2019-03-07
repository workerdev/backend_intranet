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
                $file->move($this->getParameter('Directorio_DocExtra'), $fileName);
                $ruta = $this->getParameter('Directorio_DocExtra').'\\'.$fileName;
                $docextra->setVinculoarchivo($ruta);
            }

            $docextra->setCodigo($datosDocumento->getCodigo());
            $docextra->setTitulo($datosDocumento->getTitulo());
            $docextra->setFechapublicacion($datosDocumento->getFechapublicacion());
            $docextra->setVigente($datosDocumento->getVigente());
            
            $proceso = new FichaProcesos();
            $proceso = $datosDocumento->getFkproceso();
            $docextra->setFkproceso($proceso);

            $tipo = new DocTipoiExtra();
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

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $DocumentoExtra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->findBy(array('estado' => '1'));
        return $this->render('documentoextra/index.html.twig', array('objects' => $DocumentoExtra, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/documentoextra_insertar", methods={"POST"}, name="documentoextra_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            
            $codigo = $sx['codigo'];
            $titulo = $sx['titulo'];
            $proceso = $sx['proceso'];
            $tipo = $sx['tipo'];
            $fechapublicacion = $sx['fechapublicacion'];
            $vigente = $sx['vigente'];
            $vinculoarchivo = $sx['vinculoarchivo'];

            $documentoextra = new DocumentoExtra();
            $documentoextra->setCodigo($codigo);
            $documentoextra->setTitulo($titulo);
            $documentoextra->setFechapublicacion(new \DateTime($fechapublicacion));
            $documentoextra->setVigente($vigente);
            $documentoextra->setVinculoarchivo($vinculoarchivo);
            
            $documentoextra->setEstado(1);
            trim($proceso);
            $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $proceso=null;
            $documentoextra->setFkproceso($proceso);
            trim($tipo);
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(DocTipoExtra::class)->find($tipo) : $tipo=null;
            $documentoextra->setFktipo($tipo);

            $errors = $validator->validate($documentoextra);
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




            $cx->persist($documentoextra);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$documentoextra->getId().".",'success' => true,
                'message' => 'Documento extra registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/documentoextra_actualizar", methods={"POST"}, name="documentoextra_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $codigo = $sx['codigo'];
            $titulo = $sx['titulo'];
            $proceso = $sx['proceso'];
            $tipo = $sx['tipo'];
            $fechapublicacion = $sx['fechapublicacion'];
            $vigente = $sx['vigente'];
            $vinculoarchivo = $sx['vinculoarchivo'];

            $documentoextra = $this->getDoctrine()->getRepository(DocumentoExtra::class)->find($id);
            $documentoextra->setId($id);
            $documentoextra->setCodigo($codigo);
            $documentoextra->setTitulo($titulo);
            $documentoextra->setFechapublicacion(new \DateTime($fechapublicacion));
            $documentoextra->setVigente($vigente);
            $documentoextra->setVinculoarchivo($vinculoarchivo);
            $documentoextra->setEstado(1);

            trim($proceso);
            $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $proceso=null;
            $documentoextra->setFkproceso($proceso);
            trim($tipo);
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(DocTipoExtra::class)->find($tipo) : $tipo=null;
            $documentoextra->setFktipo($tipo);

            $errors = $validator->validate($documentoextra);
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

            $cx->merge($documentoextra);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento extra actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
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
                "fkproceso" => $documentoextra->getFkproceso(),
                "fktipo" => $documentoextra->getFktipo(),
                "fechapublicacion" => $result,
                "vigente" => $documentoextra->getVigente(),
                "vinculoarchivo" => $documentoextra->getVinculoarchivo()
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