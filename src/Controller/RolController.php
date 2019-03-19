<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Modulo;
use App\Entity\Rol;
use App\Entity\Acceso;
use App\Entity\Usuario;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use App\Repository\AccesoRepository;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RolController extends AbstractController
{   
    /**
     * @Route("/rol", name="rol")
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
        
        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1'));
        
        $allmd = $this->getDoctrine()->getRepository(Modulo::class)->findAll();
        $fparent = $allmd;
        $fchild = $allmd;
        $foption = $allmd;
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('rol/index.html.twig', array('objects' => $rol, 'fparents' => $fparent, 'fchildren' => $fchild, 'foptions' => $foption, 'parents' => $parent, 'children' => $child,'permisos'=> $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));       
    }


    /**
     * @Route("/rol_insertar", methods={"POST"}, name="rol_insertar")
     */
    public function insertar(Request $request )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $modulos = $sx['modules'];
            
            $rol = new Rol();
            $rol->setNombre($nombre);
            $rol->setDescripcion($descripcion);
            $rol->setEstado(1);  
            $cx->persist($rol);
            $cx->flush();
            
            $Rol = $this->getDoctrine()->getRepository(Rol::class)->find($rol->getId());
            foreach ($modulos as &$modulo) {
                $acceso = new Acceso();
                $Modulo = $this->getDoctrine()->getRepository(Modulo::class)->find($modulo);
                $acceso->setFkrol($Rol);
                $acceso->setFkmodulo($Modulo);
                $cx->persist($acceso);
                $cx->flush();
            }

            $resultado = array('response'=>"El ID registrado es: ".$rol->getId().".",   
            'success' => true,
            'message' => 'Rol registrado correctamente.');

            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/rol_actualizar", methods={"POST"}, name="rol_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $modulos = $sx['modules'];

            $rol = new Rol();
            $rol->setId($id);
            $rol->setNombre($nombre);
            $rol->setDescripcion($descripcion);
            $rol->setEstado(1);

            $cx->merge($rol);
            $cx->flush();
            
            $accesos = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('fkrol' => $rol->getId()));
            if(count($accesos) > 0){
                foreach ($accesos as $access) {
                    $accdel = (object) $access;
                    $delpass = $this->getDoctrine()->getRepository(Acceso::class)->find($accdel->getId());
                    $cx->remove($delpass);
                    $cx->flush(); 
                }
            }

            $Rol = $this->getDoctrine()->getRepository(Rol::class)->find($rol->getId());
            foreach ($modulos as &$modulo) {
                $acceso = new Acceso();
                $Modulo = $this->getDoctrine()->getRepository(Modulo::class)->find($modulo);
                $acceso->setFkrol($Rol);
                $acceso->setFkmodulo($Modulo);
                $cx->persist($acceso);
                $cx->flush();
            }

            $resultado = array('success' => true,
                    'message' => 'Rol actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/rol_editar", methods={"POST"}, name="rol_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $rol = $this->getDoctrine()->getRepository(Rol::class)->find($id);
            $id = $rol->getId();
            $nombre= $rol->getNombre();
            $descripcion = $rol->getDescripcion();
            $acceso = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('fkrol' => $id));

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($rol, 'json');
            $mods = $serializer->serialize($acceso, 'json');
            $resultado = array('response'=>$json,'mods'=>$mods,'success' => true,
                'message' => 'Rol listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/rol_prev", methods={"POST"}, name="rol_prev")
     */
    public function rol_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $rol = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('fkrol' => $id, 'estado' => '1'));
            
            if(sizeof($rol) == 0){
                $info = array('response'=>"¿Desea dar de baja el rol?", 'success' => true,
                'message' => 'Baja rol.');
            }else{
                if(sizeof($rol) > 0) $vr = " usuario";

                $info = array('response'=>"El rol no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros del rol.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/rol_eliminar", methods={"POST"}, name="rol_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $rol = $this->getDoctrine()->getRepository(Rol::class)->find($id);

            $acceso = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('fkrol' => $id));
            $accesos = (array) $acceso;
            if(isset($accesos[0])){
                foreach ($acceso as $acs) {
                    $acsdt = (object) $acs;
                    $cx->remove($acsdt);
                    $cx->flush();
                }
            }

            $rol->setEstado(0);
            $cx->persist($rol);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$rol->getId().".",'success' => true,
                'message' => 'Rol dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}