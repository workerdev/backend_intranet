<?php

namespace App\Controller;

use App\Entity\Modulo;
use App\Entity\Usuario;
use App\Entity\Acceso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class ModuloController extends Controller
{
    /**
     * @Route("/modulo", name="modulo_listar")
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
        
        $modulo = $this->getDoctrine()->getRepository(Modulo::class)->findAll();
        $Modulo = $this->getDoctrine()->getRepository(Modulo::class)->findAll();
        $Modules = $this->getDoctrine()->getRepository(Modulo::class)->findAll();
        return $this->render('modulo/index.html.twig', array('objects' => $modulo, 'modulo' => $Modulo, 'modules' => $Modules, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/modulo_insertar", methods={"POST"}, name="modulo_insertar")
     */
    public function insertar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $titulo = $sx['titulo'];
            $ruta = $sx['ruta'];
            $icono = $sx['icono'];
            $menu = $sx['menu'];

            $paquete = $sx['paquete'];

            $modulo = new Modulo();
            $modulo->setNombre($nombre);
            $modulo->setTitulo($titulo);
            $modulo->setRuta($ruta);
            $modulo->setIcono($icono);
            $modulo->setMenu($menu);

            $paquete = $this->getDoctrine()->getRepository(Modulo::class)->find($paquete);

            $modulo->setFkmodulo($paquete);

            $cx->persist($modulo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$modulo->getId().".",'success' => true,
                'message' => 'Módulo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/modulo_actualizar", methods={"POST"}, name="modulo_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $titulo = $sx['titulo'];
            $ruta = $sx['ruta'];
            $icono = $sx['icono'];
            $menu = $sx['menu'];

            $paquete = $sx['paquete'];

            $modulo = new Modulo();
            $modulo->setId($id);
            $modulo->setNombre($nombre);
            $modulo->setTitulo($titulo);
            $modulo->setRuta($ruta);
            $modulo->setIcono($icono);
            $modulo->setMenu($menu);

            $paquete = $this->getDoctrine()->getRepository(Modulo::class)->find($paquete);              

            $cx->merge($modulo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Módulo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/modulo_editar", methods={"POST"}, name="modulo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $modulo = $this->getDoctrine()->getRepository(Modulo::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($modulo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Módulo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/modulo_eliminar", methods={"POST"}, name="modulo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $modulo = $this->getDoctrine()->getRepository(Modulo::class)->find($id);

            $modulo->setEstado(0);
            $cx->persist($modulo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$modulo->getId().".",'success' => true,
                'message' => 'Módulo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}