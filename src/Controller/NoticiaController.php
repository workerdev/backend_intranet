<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Noticia;
use App\Entity\Usuario;
use App\Entity\CategoriaNoticia;
use App\Entity\NoticiaCategoria;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Rol;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class NoticiaController extends AbstractController
{   
    /**
     * @Route("/noticia", name="noticia")
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
        
        $categorias = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->findBy(array('estado' => '1'));
        $noticia = $this->getDoctrine()->getRepository(Noticia::class)->findBy(array('estado' => '1'));
        return $this->render('noticia/index.html.twig', array('objects' => $noticia, 'categorias' => $categorias,'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/noticia_insertar", methods={"POST"}, name="noticia_insertar")
     */
    public function insertar(Request $request )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $titulo = $sx['titulo'];
            $subtitulo = $sx['subtitulo'];
            $contenido = $sx['contenido'];
            $tipo = $sx['tipo'];  
            $fecha = $sx['fecha'];
            $categorias = $sx['categorias'];
                                     
            $noticia = new Noticia();
            $noticia->setTitulo($titulo);
            $noticia->setSubtitulo($subtitulo);
            $noticia->setContenido($contenido);
            $noticia->setTipo($tipo);
            $noticia->setFecha(new \DateTime($fecha));
            $noticia->setEstado(1);               
            $cx->persist($noticia);
            $cx->flush();

            $id_noticia = $noticia->getId();
            foreach ($categorias as $categoria) {
                $NoticiaCategoria = new NoticiaCategoria();
                $noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($noticia->getId());
                $NoticiaCategoria->setFknoticia($noticia);
                $categoria = $this->getDoctrine()->getRepository(CategoriaNoticia::class)->find($categoria);
                $NoticiaCategoria->setFkcategoria($categoria);
                $cx->persist($NoticiaCategoria);
                $cx->flush();
            }

            $resultado = array('response'=>"El ID registrado es: ".$noticia->getId().".",   
            'success' => true,
            'message' => 'Datos de la noticia registrados correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/noticia_actualizar", methods={"POST"}, name="noticia_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $titulo = $sx['titulo'];
            $subtitulo = $sx['subtitulo'];
            $contenido = $sx['contenido'];
            $tipo = $sx['tipo'];    
            $fecha = $sx['fecha'];

            $noticia = new Noticia();
            $noticia->setId($id);
            $noticia->setTitulo($titulo);
            $noticia->setSubtitulo($subtitulo);
            $noticia->setContenido($contenido);
            $noticia->setTipo($tipo);
            $noticia->setFecha(new \DateTime($fecha));
            $noticia->setEstado(1); 

            $cx->merge($noticia);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Datos de la noticia actualizados correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/noticia_editar", methods={"POST"}, name="noticia_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($noticia, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Datos de la noticia listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/noticia_eliminar", methods={"POST"}, name="noticia_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $noticia = $this->getDoctrine()->getRepository(Noticia::class)->find($id);

            $noticecateg = $this->getDoctrine()->getRepository(NoticiaCategoria::class)->findBy(array('fknoticia' => $id));
            $noticecategs = (array) $noticecateg;

            if(isset($noticecategs[0])){
                foreach ($noticecateg as $ntc) {
                    $ntcdt = (object) $ntc;
                    $cx->remove($ntcdt);
                    $cx->flush();
                }
            }

            $noticia->setEstado(0);
            $cx->persist($noticia);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$noticia->getId().".",'success' => true,
                'message' => 'Datos de la noticia dados de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}