<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\EstadoPersonal;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Personal;
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
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

use App\Entity\Rol;

class EstadoPersonalController extends AbstractController
{   
    /**
     * @Route("/estadopersonal", name="estadopersonal")
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
        
        $estadopersonal = $this->getDoctrine()->getRepository(EstadoPersonal::class)->findBy(array('estado' => '1'));
        return $this->render('estadopersonal/index.html.twig', array('objects' => $estadopersonal, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/estadopersonal_insertar", methods={"POST"}, name="estadopersonal_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $estadopersonal = new EstadoPersonal();
            $estadopersonal->setNombre($nombre);
            $estadopersonal->setDescripcion($descripcion);
            $estadopersonal->setEstado(1);
            $errors = $validator->validate($estadopersonal);
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
            $cx->persist($estadopersonal);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$estadopersonal->getId().".",   
            'success' => true,
            'message' => 'Estado de personal registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/estadopersonal_actualizar", methods={"POST"}, name="estadopersonal_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $estadopersonal = new EstadoPersonal();
            $estadopersonal->setId($id);
            $estadopersonal->setNombre($nombre);
            $estadopersonal->setDescripcion($descripcion);
            $estadopersonal->setEstado(1);
            $errors = $validator->validate($estadopersonal);
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
            $cx->merge($estadopersonal);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Estado de personal actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadopersonal_editar", methods={"POST"}, name="estadopersonal_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $estadopersonal = $this->getDoctrine()->getRepository(estadopersonal::class)->find($id);
            $id = $estadopersonal->getId();
            $nombre= $estadopersonal->getNombre();
            $descripcion = $estadopersonal->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($estadopersonal, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Estado de personal listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/estado_prev", methods={"POST"}, name="estado_prev")
     */
    public function estado_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(array('fkestadopersonal' => $id, 'estado' => '1'));
            
            if(sizeof($personal) == 0){
                $info = array('response'=>"¿Desea dar de baja el estado de personal?", 'success' => true,
                'message' => 'Baja estado de personal.');
            }else{
                if(sizeof($personal) > 0) $vr = " personal";

                $info = array('response'=>"El estado no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros del estado de personal.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadopersonal_eliminar", methods={"POST"}, name="estadopersonal_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $estadopersonal = $this->getDoctrine()->getRepository(estadopersonal::class)->find($id);

            $estadopersonal->setEstado(0);
            $cx->persist($estadopersonal);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$estadopersonal->getId().".",'success' => true,
                'message' => 'Estado de personal dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}