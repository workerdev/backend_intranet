<?php

namespace App\Controller;

use App\Entity\TipoPermiso;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Entity\Permiso;
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


class TipoPermisoController extends Controller
{
    /**
     * @Route("/tipopermiso", name="tipopermiso_listar")
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
        
        $tipopermiso = $this->getDoctrine()->getRepository(TipoPermiso::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('tipopermiso/index.html.twig', array('objects' => $tipopermiso, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/tipopermiso_insertar", methods={"POST"}, name="tipopermiso_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipopermiso = new TipoPermiso();
            $tipopermiso->setNombre($nombre);
            $tipopermiso->setDescripcion($descripcion);
            $tipopermiso->setEstado(1);

            $errors = $validator->validate($tipopermiso);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($tipopermiso);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$tipopermiso->getId().".",'success' => true,
                'message' => 'Tipo de permiso registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipopermiso_actualizar", methods={"POST"}, name="tipopermiso_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];

            $tipopermiso = new TipoPermiso();
            $tipopermiso->setId($id);
            $tipopermiso->setNombre($nombre);
            $tipopermiso->setDescripcion($descripcion);
            $tipopermiso->setEstado(1);

            $errors = $validator->validate($tipopermiso);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->merge($tipopermiso);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Tipo de permiso actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/tipopermiso_editar", methods={"POST"}, name="tipopermiso_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $tipopermiso = $this->getDoctrine()->getRepository(TipoPermiso::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($tipopermiso, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Tipo de permiso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipopermiso_eliminar", methods={"POST"}, name="tipopermiso_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $tipopermiso = $this->getDoctrine()->getRepository(TipoPermiso::class)->find($id);

            $tipopermiso->setEstado(0);
            $cx->persist($tipopermiso);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$tipopermiso->getId().".",'success' => true,
                'message' => 'Tipo de permiso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/tipopermiso_prev", methods={"POST"}, name="tipopermiso_prev")
     */
    public function tipopermiso_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fktipo' => $id, 'estado' => '1'));
            
            if(sizeof($permiso) == 0){
                $info = array('response'=>"¿Desea dar de baja el tipo de permiso?", 'success' => true,
                'message' => 'Baja tipo de permiso.');
            }else{
                if(sizeof($permiso) > 0) $vr = " permisos";

                $info = array('response'=>"El tipo de permiso no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al tipo de permiso.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}