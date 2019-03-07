<?php

namespace App\Controller;

use App\Entity\IndicadorProceso;
use App\Entity\SeguimientoIndicador;
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
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

class SeguimientoIndicadorController extends Controller
{
    /**
     * @Route("/seguimientoindicador", name="seguimientoindicador_listar")
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
        
        $SeguimientoIndicador = $this->getDoctrine()->getRepository(SeguimientoIndicador::class)->findBy(array('estado' => '1'));
        $IndicadorProceso = $this->getDoctrine()->getRepository(IndicadorProceso::class)->findBy(array('estado' => '1'));
        $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        return $this->render('seguimientoindicador/index.html.twig', array('objects' => $SeguimientoIndicador, 'tipo' => $IndicadorProceso, 'tipo2' => $fkresponsable, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/seguimientoindicador_insertar", methods={"POST"}, name="seguimientoindicador_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $ano = $sx['ano'];
            $mes = $sx['mes'];
            $valor = $sx['valor'];
            $observacion = $sx['observacion'];

            $indicador = $sx['indicador'];
            $fkresponsable = $sx['fkresponsable'];

            $seguimientoindicador = new SeguimientoIndicador();
            if ($ano != '' && (is_numeric($ano)))  $seguimientoindicador->setAno($ano);
            if ($mes != '' && (is_numeric($mes)) ) $seguimientoindicador->setMes($mes);
            $seguimientoindicador->setObservacion($observacion);
            $seguimientoindicador->setValor($valor);
            $seguimientoindicador->setEstado(1);

            $indicador != '' ? $indicador = $this->getDoctrine()->getRepository(IndicadorProceso::class)->find($indicador) : $indicador = null;
            $seguimientoindicador->setFkindicador($indicador);
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable = null;
            $seguimientoindicador->setFkresponsable($fkresponsable);
            $errors = $validator->validate($seguimientoindicador);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($seguimientoindicador);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$seguimientoindicador->getId().".",'success' => true,
                'message' => 'Seguimiento de indicador registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoindicador_actualizar", methods={"POST"}, name="seguimientoindicador_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $ano = $sx['ano'];
            $mes = $sx['mes'];
            $valor = $sx['valor'];
            $observacion = $sx['observacion'];

            $indicador = $sx['indicador'];
            $fkresponsable = $sx['fkresponsable'];

            $seguimientoindicador = $this->getDoctrine()->getRepository(SeguimientoIndicador::class)->find($id);
            $seguimientoindicador->setId($id);
            $seguimientoindicador->setAno($ano);
            $seguimientoindicador->setMes($mes);
            $seguimientoindicador->setValor($valor);
            $seguimientoindicador->setObservacion($observacion);
            $seguimientoindicador->setEstado(1);

            $indicador != '' ? $indicador = $this->getDoctrine()->getRepository(IndicadorProceso::class)->find($indicador) : $indicador = null;
            $seguimientoindicador->setFkindicador($indicador);   $indicador != '' ? $indicador = $this->getDoctrine()->getRepository(IndicadorProceso::class)->find($indicador) : $indicador = null;
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable = null;
            $seguimientoindicador->setFkresponsable($fkresponsable);   $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable = null;
            $errors = $validator->validate($seguimientoindicador);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($seguimientoindicador);
            $cx->flush();
            $resultado = array('success' => true,
                    'message' => 'indicador actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoindicador_editar", methods={"POST"}, name="seguimientoindicador_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimientoindicador = $this->getDoctrine()->getRepository(SeguimientoIndicador::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($seguimientoindicador, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de indicador listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoindicador_eliminar", methods={"POST"}, name="seguimientoindicador_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $seguimientoindicador = $this->getDoctrine()->getRepository(SeguimientoIndicador::class)->find($id);

            $seguimientoindicador->setEstado(0);
            $cx->persist($seguimientoindicador);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$seguimientoindicador->getId().".",'success' => true,
                'message' => 'Seguimiento de indicador dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}