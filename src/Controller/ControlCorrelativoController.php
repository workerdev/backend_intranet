<?php

namespace App\Controller;

use App\Entity\Gerencia;
use App\Entity\ControlCorrelativo;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Entity\Correlativo;
use App\Entity\Unidad;
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


class ControlCorrelativoController extends Controller
{
    /**
     * @Route("/controlcorrelativo", name="controlcorrelativo_listar")
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
        $children = array();
        $options = array();
        foreach ($accesos as $access) {
            $accdt = (object) $access;
            $item = $this->getDoctrine()->getRepository(Modulo::class)->find($accdt->getFkmodulo()->getId());
            $mods[] = $item;
        }
        $parent = $mods;
        $child = $mods;
        $option = $mods;

        $permisos = array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }
        
        $controlcorrelativo = $this->getDoctrine()->getRepository(controlcorrelativo::class)->findBy(array('estado' => '1'));
        $Gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('controlcorrelativo/index.html.twig', array('objects' => $controlcorrelativo, 'gerencia' => $Gerencia, 'parents' => $parent, 'children' => $child, 'options' => $option, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/controlcorrelativo_insertar", methods={"POST"}, name="controlcorrelativo_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $codigo = $sx['codigo'];
            $descripcion = $sx['descripcion'];
            $gerencia = $sx['gerencia'];

            $controlcorrelativo = new ControlCorrelativo();
            $controlcorrelativo->setNombre($nombre);
            $controlcorrelativo->setCodigo($codigo);
            $controlcorrelativo->setDescripcion($descripcion);
            $controlcorrelativo->setEstado(1);

            $gerencia != '' ? $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($gerencia) : $gerencia=null;
            $controlcorrelativo->setFkgerencia($gerencia);
            $errors = $validator->validate($controlcorrelativo);
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
            $cx->persist($controlcorrelativo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$controlcorrelativo->getId().".",'success' => true,
                'message' => 'Control correlativo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/controlcorrelativo_actualizar", methods={"POST"}, name="controlcorrelativo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $codigo = $sx['codigo'];
            $descripcion = $sx['descripcion'];
            $gerencia = $sx['gerencia'];

            $controlcorrelativo = new ControlCorrelativo();
            $controlcorrelativo->setId($id);
            $controlcorrelativo->setNombre($nombre);
            $controlcorrelativo->setCodigo($codigo);
            $controlcorrelativo->setDescripcion($descripcion);
            $controlcorrelativo->setEstado(1);

            $gerencia != '' ? $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($gerencia) : $gerencia=null;
            $controlcorrelativo->setFkgerencia($gerencia);
            $errors = $validator->validate($controlcorrelativo);
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
            $cx->merge($controlcorrelativo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Control correlativo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/controlcorrelativo_editar", methods={"POST"}, name="controlcorrelativo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($controlcorrelativo, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Control correlativo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/controlcorrelativo_eliminar", methods={"POST"}, name="controlcorrelativo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($id);

            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findBy(array('fkcorrelativo' => $id, 'estado' => '1'));
            $correlativos = (array) $correlativo;
            if(isset($correlativos[0])){
                foreach ($correlativo as $crtv) {
                    $crtvdt = (object) $crtv;
                    $crtvdt->setEstado(0);
                    $cx->persist($crtvdt);
                    $cx->flush();
                }
            }

            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('fkcorrelativo' => $id, 'estado' => '1'));
            $unidades = (array) $unidad;
            if(isset($unidades[0])){
                foreach ($unidad as $und) {
                    $undet = (object) $und;
                    $undet->setEstado(0);
                    $cx->persist($undet);
                    $cx->flush();
                }
            }

            $controlcorrelativo->setEstado(0);
            $cx->persist($controlcorrelativo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$controlcorrelativo->getId().".",'success' => true,
                'message' => 'Control correlativo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/ctrlcorrelativo_prev", methods={"POST"}, name="ctrlcorrelativo_prev")
     */
    public function ctrlcorrelativo_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findBy(array('fkcorrelativo' => $id, 'estado' => '1'));
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('fkcorrelativo' => $id, 'estado' => '1'));
            
            if(sizeof($correlativo) == 0 && sizeof($unidad) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja del centro de control correlativo.');
            }else{
                if(sizeof($correlativo) > 0) $vr = "- Correlativo\n";
                if(sizeof($unidad) > 0) $vr = $vr."- Unidad\n";

                $info = array('response'=>"El centro de control correlativo tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al centro de control correlativo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}