<?php

namespace App\Controller;

use App\Entity\CategoriaNoticia;
use App\Entity\NoticiaCategoria;
use App\Entity\Noticia;
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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class NoticiaCategoriaController extends Controller
{
    /**
     * @Route("/noticiacategoria", name="noticiacategoria_listar")
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
        
        $NoticiaCategoria = $this->getDoctrine()->getRepository(NoticiaCategoria::class)->findAll();
        $CategoriaNoticia = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->findBy(array('estado' => '1'));
        $Noticia = $this->getDoctrine()->getRepository(Noticia::class)->findBy(array('estado' => '1'));
        return $this->render('noticiacategoria/index.html.twig', array('objects' => $NoticiaCategoria,'noticia' => $Noticia,'categoria' => $CategoriaNoticia, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/noticiacategoria_lista", methods={"GET"}, name="noticiacategoria_lista")
     */
    public function mostrar(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $NoticiaCategoria = $cx->getRepository(NoticiaCategoria::class)->findAll();
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $data = $serializer->normalize($NoticiaCategoria, null, array('attributes' => array('descripcion', 'fkCategoriaNoticiaCategoria' => ['id','nombre'])));
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($data, 'json');

            return new jsonResponse(json_decode($data2));
        }
        catch(Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
            return new Response('Excepción capturada: ',  $e->getMessage(), "\n");

        }
    }


    /**
     * @Route("/noticiacategoria_insertar", methods={"POST"}, name="noticiacategoria_insertar")
     */
    public function insertar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $noticia = $sx['noticia'];
            $categoria = $sx['categoria'];

            $NoticiaCategoria = new NoticiaCategoria();
            
            $noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($noticia);
            $NoticiaCategoria->setFknoticia($noticia);
            $categoria = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->find($categoria);
            $NoticiaCategoria->setFkcategoria($categoria); 

            $cx->persist($NoticiaCategoria);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$NoticiaCategoria->getId().".",'success' => true,
                'message' => 'Noticia categoría registrada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/noticiacategoria_actualizar", methods={"POST"}, name="noticiacategoria_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $noticia = $sx['noticia'];
            $categoria = $sx['categoria'];

            $NoticiaCategoria = new NoticiaCategoria();
            
            $NoticiaCategoria->setId($id);
            $noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($noticia);
            $NoticiaCategoria->setFknoticia($noticia);
            $categoria = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->find($categor);
            $NoticiaCategoria->setFkcategoria($noticia); 

            $cx->merge($NoticiaCategoria);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Noticia categoría actualizada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/noticiacategoria_editar", methods={"POST"}, name="noticiacategoria_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $NoticiaCategoria = $this->getDoctrine()->getRepository(NoticiaCategoria::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($NoticiaCategoria, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Noticia categoría listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/noticiacategoria_eliminar", methods={"POST"}, name="noticiacategoria_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $NoticiaCategoria = $this->getDoctrine()->getRepository(NoticiaCategoria::class)->find($id);

            $NoticiaCategoria->setEstado(0);
            $cx->persist($NoticiaCategoria);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$NoticiaCategoria->getId().".",'success' => true,
                'message' => 'Noticia categoría dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}