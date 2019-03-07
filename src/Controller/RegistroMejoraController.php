<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\TipoNovedad;
use App\Entity\TipoNorma;
use App\Entity\EstadoNovedad;
use App\Entity\RegistroMejora;
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
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


use App\Entity\Rol;

class RegistroMejoraController extends Controller
{
    /**
     * @Route("/registromejora", name="registromejora_listar")
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
        
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $TipoNovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->findBy(array('estado' => '1'));
        $TipoNorma = $this->getDoctrine()->getRepository(TipoNorma::class)->findBy(array('estado' => '1'));
        $EstadoNovedad = $this->getDoctrine()->getRepository(EstadoNovedad::class)->findBy(array('estado' => '1'));
        $RegistroMejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->findBy(array('estado' => '1'));
        return $this->render('registromejora/index.html.twig', array('objects' => $RegistroMejora, 'tipo' => $FichaProcesos, 'tipo2' => $TipoNovedad, 'tipo3' => $TipoNorma, 'tipo4' => $EstadoNovedad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/registromejora_insertar", methods={"POST"}, name="registromejora_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $responsablenovedad = $sx['responsablenovedad'];
            $novedad = $sx['novedad'];
            $analisis = $sx['analisis'];
            $responsableimplementacion = $sx['responsableimplementacion'];

            $ficha = $sx['ficha'];
            $tiponovedad = $sx['tiponovedad'];
            $norma = $sx['norma'];
            $estado = $sx['estado'];

            $registromejora = new RegistroMejora();
            $registromejora->setResponsablenovedad($responsablenovedad);
            $registromejora->setNovedad($novedad);
            $registromejora->setAnalisis($analisis);
            $registromejora->setResponsableimplementacion($responsableimplementacion);
            $registromejora->setEstado(1);

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha): $ficha = null;
            $tiponovedad != '' ? $tiponovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->find($tiponovedad): $tiponovedad =null;
            $norma != '' ? $norma = $this->getDoctrine()->getRepository(TipoNorma::class)->find($norma):$norma =null;
            $estado != '' ? $estado = $this->getDoctrine()->getRepository(EstadoNovedad::class)->find($estado): $estado=null;
            $registromejora->setFkficha($ficha);        
            $registromejora->setFktiponovedad($tiponovedad);        
            $registromejora->setFknorma($norma);        
            $registromejora->setFkestado($estado);
            $errors = $validator->validate($registromejora);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($registromejora);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$registromejora->getId().".",'success' => true,
                'message' => 'Registro de mejora registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/registromejora_actualizar", methods={"POST"}, name="registromejora_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $responsablenovedad = $sx['responsablenovedad'];
            $novedad = $sx['novedad'];
            $analisis = $sx['analisis'];
            $responsableimplementacion = $sx['responsableimplementacion'];

            $ficha = $sx['ficha'];
            $tiponovedad = $sx['tiponovedad'];
            $norma = $sx['norma'];
            $estado = $sx['estado'];
            
            $registromejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->find($id);
            $registromejora->setId($id);
            $registromejora->setResponsablenovedad($responsablenovedad);
            $registromejora->setNovedad($novedad);
            $registromejora->setAnalisis($analisis);
            $registromejora->setResponsableimplementacion($responsableimplementacion);
            $registromejora->setEstado(1);

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha): $ficha = null;
            $tiponovedad != '' ? $tiponovedad = $this->getDoctrine()->getRepository(TipoNovedad::class)->find($tiponovedad): $tiponovedad =null;
            $norma != '' ? $norma = $this->getDoctrine()->getRepository(TipoNorma::class)->find($norma):$norma =null;
            $estado != '' ? $estado = $this->getDoctrine()->getRepository(EstadoNovedad::class)->find($estado): $estado=null;
            $registromejora->setFkficha($ficha);
            $registromejora->setFktiponovedad($tiponovedad);
            $registromejora->setFknorma($norma);
            $registromejora->setFkestado($estado);
            $errors = $validator->validate($registromejora);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }

            $cx->merge($registromejora);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Registro de mejora actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/registromejora_editar", methods={"POST"}, name="registromejora_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $registromejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($registromejora, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Registro de mejora listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/registromejora_eliminar", methods={"POST"}, name="registromejora_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $registromejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->find($id);

            $registromejora->setEstado(0);
            $cx->persist($registromejora);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$registromejora->getId().".",'success' => true,
                'message' => 'Registro de mejora dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}