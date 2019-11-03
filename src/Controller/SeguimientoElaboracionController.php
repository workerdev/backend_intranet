<?php

namespace App\Controller;

use App\Entity\Documento;
use App\Entity\EstadoSeguimiento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\SeguimientoElaboracion;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;


class SeguimientoElaboracionController extends Controller
{
    /**
     * @Route("/seguimientoelaboracion", name="seguimientoelaboracion_listar")
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
        
        $SeguimientoElaboracion = $this->getDoctrine()->getRepository(SeguimientoElaboracion::class)->findBy(array('estado' => '1'));
        $Documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(['estado' => '1'], ['codigo' => 'ASC']);
        $EstadoSeguimiento = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $Usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        return $this->render('seguimientoelaboracion/index.html.twig', array('objects' => $SeguimientoElaboracion, 'tipo' => $Documento, 'tipo2' => $EstadoSeguimiento, 'tipo3' => $Usuario, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/seguimientoelaboracion_insertar", methods={"POST"}, name="seguimientoelaboracion_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $documento = $sx['documento'];
            $estado = $sx['estado'];
            $revisor = $sx['revisor'];

            $seguimientoelaboracion = new SeguimientoElaboracion();
            $seguimientoelaboracion->setEstado(1);

            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento):$documento = null;
            $estado != '' ?  $estado = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->find($estado): $estado = null;
            $revisor !=''? $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($revisor):$revisor = null;
            $seguimientoelaboracion->setFkdocumento($documento); 
            $seguimientoelaboracion->setFkestado($estado); 
            $seguimientoelaboracion->setFkrevisor($revisor);
            $errors = $validator->validate($seguimientoelaboracion);
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
            $cx->persist($seguimientoelaboracion);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$seguimientoelaboracion->getId().".",'success' => true,
                'message' => 'Seguimiento de elaboración correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoelaboracion_actualizar", methods={"POST"}, name="seguimientoelaboracion_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documento = $sx['documento'];                
            $estado = $sx['estado'];
            $revisor = $sx['revisor'];

            $seguimientoelaboracion = new SeguimientoElaboracion();
            $seguimientoelaboracion->setId($id);
            $seguimientoelaboracion->setEstado(1);

            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento):$documento = null;
            $estado != '' ?  $estado = $this->getDoctrine()->getRepository(EstadoSeguimiento::class)->find($estado): $estado = null;
            $revisor !=''? $revisor = $this->getDoctrine()->getRepository(Usuario::class)->find($revisor):$revisor = null;
            $seguimientoelaboracion->setFkdocumento($documento);
            $seguimientoelaboracion->setFkestado($estado);
            $seguimientoelaboracion->setFkrevisor($revisor);
            $errors = $validator->validate($seguimientoelaboracion);
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

            $cx->merge($seguimientoelaboracion);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Seguimiento de elaboración actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoelaboracion_editar", methods={"POST"}, name="seguimientoelaboracion_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimientoelaboracion = $this->getDoctrine()->getRepository(SeguimientoElaboracion::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($seguimientoelaboracion, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de elaboración listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoelaboracion_eliminar", methods={"POST"}, name="seguimientoelaboracion_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $seguimientoelaboracion = $this->getDoctrine()->getRepository(SeguimientoElaboracion::class)->find($id);

            $seguimientoelaboracion->setEstado(0);
            $cx->persist($seguimientoelaboracion);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$seguimientoelaboracion->getId().".",'success' => true,
                'message' => 'Seguimiento de elaboración dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}