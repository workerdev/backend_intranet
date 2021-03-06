<?php

namespace App\Controller;

use App\Entity\EstadoDocumento;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\EstadoSeguimiento;
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
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class EstadoSeguimientoController extends AbstractController
{   
    /**
     * @Route("/estadoseguimiento", name="estadoseguimiento")
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
        
        $estadoseguimiento = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->findBy(array('estado' => '1'));
        return $this->render('estadoseguimiento/index.html.twig', array('objects' => $estadoseguimiento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/estadoseguimiento_insertar", methods={"POST"}, name="estadoseguimiento_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {

        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $estadoseguimiento = new EstadoSeguimiento();
            $estadoseguimiento->setNombre($nombre);
            $estadoseguimiento->setDescripcion($descripcion);
            $estadoseguimiento->setEstado(1);
            $errors = $validator->validate($estadoseguimiento);
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
            $cx->persist($estadoseguimiento);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$estadoseguimiento->getId().".",   
            'success' => true,
            'message' => 'Estado de seguimiento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/estadoseguimiento_actualizar", methods={"POST"}, name="estadoseguimiento_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $estadoseguimiento = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->find($id);
            $estadoseguimiento->setId($id);
            $estadoseguimiento->setNombre($nombre);
            $estadoseguimiento->setDescripcion($descripcion);
            $estadoseguimiento->setEstado(1);
            $errors = $validator->validate($estadoseguimiento);
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
            $cx->merge($estadoseguimiento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Estado de seguimiento actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadoseguimiento_editar", methods={"POST"}, name="estadoseguimiento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $estadoseguimiento = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->find($id);
            $id = $estadoseguimiento->getId();
            $nombre= $estadoseguimiento->getNombre();
            $descripcion = $estadoseguimiento->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($estadoseguimiento, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Estado de seguimiento listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/estadoseguimiento_eliminar", methods={"POST"}, name="estadoseguimiento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $estadoseguimiento = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->find($id);

            $estadoseguimiento->setEstado(0);
            $cx->persist($estadoseguimiento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$estadoseguimiento->getId().".",'success' => true,
                'message' => 'Estado de seguimiento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}