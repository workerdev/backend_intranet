<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\ProcesoRelacionado;
use App\Entity\FichaProcesos;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Rol;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

class ProcesoRelacionadoController extends AbstractController
{   
    /**
     * @Route("/procesorelacionado", name="procesorelacionado")
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
        
        $procesorelacionado = $this->getDoctrine()->getRepository(ProcesoRelacionado::class)->findBy(array('estado' => '1'));
        $fichaproceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        return $this->render('procesorelacionado/index.html.twig', array('objects' => $procesorelacionado,'tipo' => $fichaproceso, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/procesorelacionado_insertar", methods={"POST"}, name="procesorelacionado_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $proceso = $sx['proceso'];
            $procesorel = $sx['procesorel'];

            $procesorelacionado = new ProcesoRelacionado();
            $procesorelacionado->setEstado(1);

            $proceso != '' ? $fichaproceso1 = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $fichaproceso1 = null;
            $procesorel != '' ? $fichaproceso2 = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($procesorel) : $fichaproceso2 = null;
            $procesorelacionado->setFkproceso($fichaproceso1);
            $procesorelacionado->setFkprocesorel($fichaproceso2);
            $errors = $validator->validate($procesorelacionado);
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
            $cx->persist($procesorelacionado);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$procesorelacionado->getId().".",'success' => true,
                'message' => 'Proceso relacionado registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/procesorelacionado_actualizar", methods={"POST"}, name="procesorelacionado_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $proceso = $sx['proceso'];
            $procesorel = $sx['procesorel'];

            $procesorelacionado = $this->getDoctrine()->getRepository(ProcesoRelacionado::class)->find($id);
            $procesorelacionado->setId($id);
            
            $procesorelacionado->setEstado(1);
            $proceso != '' ? $fichaproceso1 = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $fichaproceso1 = null;
            $procesorel != '' ? $fichaproceso2 = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($procesorel) : $fichaproceso2 = null;
            $procesorelacionado->setFkproceso($fichaproceso1);
            $procesorelacionado->setFkprocesorel($fichaproceso2);
            $errors = $validator->validate($procesorelacionado);
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
            $cx->merge($procesorelacionado);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Proceso relacionado actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/procesorelacionado_editar", methods={"POST"}, name="procesorelacionado_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $procesorelacionado = $this->getDoctrine()->getRepository(ProcesoRelacionado::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($procesorelacionado, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Proceso relacionado listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/procesorelacionado_eliminar", methods={"POST"}, name="procesorelacionado_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $procesorelacionado = $this->getDoctrine()->getRepository(ProcesoRelacionado::class)->find($id);

            $procesorelacionado->setEstado(0);
            $cx->persist($procesorelacionado);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$procesorelacionado->getId().".",'success' => true,
                'message' => 'Proceso relacionado dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}