<?php

namespace App\Controller;

use App\Entity\Permiso;
use App\Entity\TipoPermiso;
use App\Entity\Unidad;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use PhpParser\Node\VarLikeIdentifier;
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


class PermisoController extends Controller
{
    /**
     * @Route("/permiso", name="permiso_listar")
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
        
        $tipo = $this->getDoctrine()->getRepository(TipoPermiso::class)->findBy(array('estado' => '1'));
        $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('estado' => '1'));
        $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('permiso/index.html.twig', array('objects' => $permiso, 'tipo' => $tipo, 'unidad' => $unidad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/permiso_insertar", methods={"POST"}, name="permiso_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $item = $sx['item'];
            $tipo = $sx['tipo'];
            $unidad = $sx['unidad'];

            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoPermiso::class)->find($tipo) : $tipo=null;
            $unidad != '' ? $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($unidad) : $unidad=null;

            $permiso = new Permiso();
            $permiso->setItem($item);
            $permiso->setFktipo($tipo);
            $permiso->setFkunidad($unidad);
            $permiso->setEstado(1);
            
            $errors = $validator->validate($permiso);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($permiso);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$permiso->getId().".",'success' => true,
                'message' => 'Permiso registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/permiso_actualizar", methods={"POST"}, name="permiso_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $item = $sx['item'];
            $tipo = $sx['tipo'];
            $unidad = $sx['unidad'];

            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoPermiso::class)->find($tipo) : $tipo=null;
            $unidad != '' ? $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($unidad) : $unidad=null;

            $permiso = new Permiso();
            $permiso->setId($id);
            $permiso->setItem($item);
            $permiso->setFktipo($tipo);
            $permiso->setFkunidad($unidad);
            $permiso->setEstado(1);
            
            $errors = $validator->validate($permiso);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->merge($permiso);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Permiso actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/permiso_editar", methods={"POST"}, name="permiso_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($permiso, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Permiso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/permiso_eliminar", methods={"POST"}, name="permiso_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->find($id);

            $permiso->setEstado(0);
            $cx->persist($permiso);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$permiso->getId().".",'success' => true,
                'message' => 'Permiso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}