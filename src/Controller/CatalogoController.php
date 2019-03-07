<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Catalogo;
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


class CatalogoController extends AbstractController
{   
    /**
     * @Route("/catalogo", name="catalogo")
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
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
       
        $catalogo = $this->getDoctrine()->getRepository(Catalogo::class)->findBy(array('estado' => '1'));
        return $this->render('catalogo/index.html.twig', array('objects' => $catalogo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/catalogo_insertar", methods={"POST"}, name="catalogo_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $sistema = $sx['sistema'];
            $descripcion = $sx['descripcion']; 
            $urldueno = $sx['urldueno'];                
            $catalogo = new Catalogo();
            $catalogo->setSistema($sistema);
            $catalogo->setDescripcion($descripcion);
            $catalogo->setUrldueno($urldueno);
            $catalogo->setEstado(1);
            $errors = $validator->validate($catalogo);
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
            $cx->persist($catalogo);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$catalogo->getId().".",   
            'success' => true,
            'message' => 'Catálogo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/catalogo_actualizar", methods={"POST"}, name="catalogo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $sistema = $sx['sistema'];
            $descripcion = $sx['descripcion']; 
            $urldueno = $sx['urldueno'];                
            $catalogo = $this->getDoctrine()->getRepository(Catalogo::class)->find($id);
            $catalogo->setId($id);
            $catalogo->setSistema($sistema);
            $catalogo->setDescripcion($descripcion);
            $catalogo->setUrldueno($urldueno);
            $catalogo->setEstado(1);
            $errors = $validator->validate($catalogo);
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
            $cx->merge($catalogo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Catálogo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/catalogo_editar", methods={"POST"}, name="catalogo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $catalogo = $this->getDoctrine()->getRepository(Catalogo::class)->find($id);
            $id = $catalogo->getId();
            $sistema= $catalogo->getSistema();
            $descripcion = $catalogo->getDescripcion();
            $urldueno = $catalogo->getUrldueno();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($catalogo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Catálogo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/catalogo_eliminar", methods={"POST"}, name="catalogo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $catalogo = $this->getDoctrine()->getRepository(Catalogo::class)->find($id);

            $catalogo->setEstado(0);
            $cx->persist($catalogo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$catalogo->getId().".",'success' => true,
                'message' => 'Catálogo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}