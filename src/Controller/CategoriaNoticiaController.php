<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\CategoriaNoticia;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\NoticiaCategoria;
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

use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

class CategoriaNoticiaController extends AbstractController
{   
    /**
     * @Route("/categorianoticia", name="categoria_noticia")
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
       
        $CategoriaNoticia = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->findBy(array('estado' => '1'));
        return $this->render('CategoriaNoticia/index.html.twig', array('objects' => $CategoriaNoticia, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));    
    }


    /**
     * @Route("/categorianoticia_insertar", methods={"POST"}, name="categorianoticia_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];                
            $CategoriaNoticia = new CategoriaNoticia();
            $CategoriaNoticia->setNombre($nombre);
            $CategoriaNoticia->setDescripcion($descripcion);
            $CategoriaNoticia->setEstado(1);
            $errors = $validator->validate($CategoriaNoticia);
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
            $cx->persist($CategoriaNoticia);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$CategoriaNoticia->getId().".",   
            'success' => true,
            'message' => 'Categoría de  la noticia registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/categorianoticia_actualizar", methods={"POST"}, name="categorianoticia_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $CategoriaNoticia = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->find($id);
            $CategoriaNoticia->setId($id);
            $CategoriaNoticia->setNombre($nombre);
            $CategoriaNoticia->setDescripcion($descripcion);
            $CategoriaNoticia->setEstado(1);
            $errors = $validator->validate($CategoriaNoticia);
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
            $cx->merge($CategoriaNoticia);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Categoría de  la noticia actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/categorianoticia_editar", methods={"POST"}, name="categorianoticia_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $CategoriaNoticia = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->find($id);
            $id = $CategoriaNoticia->getId();
            $nombre= $CategoriaNoticia->getNombre();
            $descripcion = $CategoriaNoticia->getDescripcion();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($CategoriaNoticia, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Categoría de  la noticia listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/categoria_prev", methods={"POST"}, name="categoria_prev")
     */
    public function categoria_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $noticia = $this->getDoctrine()->getRepository(NoticiaCategoria::class)->findBy(array('fkcategoria' => $id));
            
            if(sizeof($noticia) == 0){
                $info = array('response'=>"¿Desea dar de baja la categoría de noticia?", 'success' => true,
                'message' => 'Baja categoría de noticia.');
            }else{
                if(sizeof($noticia) > 0) $vr = " noticía";

                $info = array('response'=>"La categoría de noticia no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros de la categoría de noticia.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/categorianoticia_eliminar", methods={"POST"}, name="categorianoticia_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $CategoriaNoticia = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->find($id);

            $CategoriaNoticia->setEstado(0);
            $cx->persist($CategoriaNoticia);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$CategoriaNoticia->getId().".",'success' => true,
                'message' => 'Categoría de  la noticia dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}