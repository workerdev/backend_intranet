<?php

namespace App\Controller;

use App\Entity\Accion;
use App\Entity\AccionReprograma;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AccionReprogramaController extends Controller
{
    /**
     * @Route("/accionreprograma", name="accionreprograma_listar")
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
        $permisos = array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
       	$fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(['estado' => '1', 'estadoaccion' => 'Pendiente'], ['descripcion' => 'ASC']);
        $accionreprograma = $this->getDoctrine()->getRepository(AccionReprograma::class)->findBy(array('estado' => '1'));
        return $this->render('accionreprograma/index.html.twig', array('objects' => $accionreprograma, 'accion' => $accion, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/accionreprograma_insertar", methods={"POST"}, name="accionreprograma_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $fechaanterior = $sx['fechaanterior'];
            $fechaimplementacion = $sx['fechaimplementacion'];
            $motivojustificacion = $sx['motivojustificacion'];
            $autoriza = $sx['autoriza'];
            $responsableregistro = $sx['responsableregistro'];
            $fecharegistro = $sx['fecharegistro'];
            
            $accion = $sx['accion'];

            $accionreprograma = new AccionReprograma();
            $accionreprograma->setFechaanterior(new \DateTime($fechaanterior));
            $accionreprograma->setFechaimplementacion(new \DateTime($fechaimplementacion));
            $accionreprograma->setMotivojustificacion($motivojustificacion);
            $accionreprograma->setAutoriza($autoriza);
            $accionreprograma->setResponsableregistro($responsableregistro);
            $accionreprograma->setFecharegistro(new \DateTime($fecharegistro));
            $accionreprograma->setEstado(1);

            $accion != '' ? $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion) : $accion = null;
            $accionreprograma->setFkaccion($accion);
            $errors = $validator->validate($accionreprograma);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($accionreprograma);
            $cx->flush();

            $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion);
            $accion->setFechaimplementacion(new \DateTime($fechaimplementacion));

            $cx->merge($accion);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$accionreprograma->getId().".",'success' => true,
                'message' => 'Reprograma registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accionreprograma_actualizar", methods={"POST"}, name="accionreprograma_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fechaanterior = $sx['fechaanterior'];
            $fechaimplementacion = $sx['fechaimplementacion'];
            $motivojustificacion = $sx['motivojustificacion'];
            $autoriza = $sx['autoriza'];
            $responsableregistro = $sx['responsableregistro'];
            $fecharegistro = $sx['fecharegistro'];
            
            $accion = $sx['accion'];

            $accionreprograma = new AccionReprograma();
            $accionreprograma->setId($id);
            $accionreprograma->setFechaanterior(new \DateTime($fechaanterior));
            $accionreprograma->setFechaimplementacion(new \DateTime($fechaimplementacion));
            $accionreprograma->setMotivojustificacion($motivojustificacion);
            $accionreprograma->setAutoriza($autoriza);
            $accionreprograma->setResponsableregistro($responsableregistro);
            $accionreprograma->setFecharegistro(new \DateTime($fecharegistro));
            $accionreprograma->setEstado(1);

            $accion != '' ? $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion) : $accion = null;
            $accionreprograma->setFkaccion($accion);
            $errors = $validator->validate($accionreprograma);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }

            $cx->merge($accionreprograma);
            $cx->flush();

            $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion);
            $accion->setFechaimplementacion(new \DateTime($fechaimplementacion));

            $cx->merge($accion);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Reprograma actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accionreprograma_editar", methods={"POST"}, name="accionreprograma_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accionreprograma = $this->getDoctrine()->getRepository(AccionReprograma::class)->find($id);
            $fecant = $accionreprograma->getFechaanterior();
            $rsfca = $fecant->format('Y-m-d');
            $fecimp = $accionreprograma->getFechaimplementacion();
            $rsfci = $fecimp->format('Y-m-d');
            $fecreg = $accionreprograma->getFecharegistro();
            $rsfcr = $fecreg->format('Y-m-d');
            
            $sendinf = [
                "id" => $accionreprograma->getId(),
                "fkaccion" => $accionreprograma->getFkaccion(),
                "fechaanterior" => $rsfca,
                "fechaimplementacion" => $rsfci,
                "motivojustificacion" => $accionreprograma->getMotivojustificacion(),
                "autoriza" => $accionreprograma->getAutoriza(),
                "responsableregistro" => $accionreprograma->getResponsableregistro(),
                "fecharegistro" => $rsfcr
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reprograma listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/dateformat", methods={"POST"}, name="dateformat")
     */
    public function darformato()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accion = $this->getDoctrine()->getRepository(Accion::class)->find($id);
            $fecimp = $accion->getFechaimplementacion();
            $rsfci = $fecimp->format('Y-m-d');
            
            $sendinf = [
                "fechaimplementacion" => $rsfci
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Fecha formateada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accionreprograma_eliminar", methods={"POST"}, name="accionreprograma_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $accionreprograma = $this->getDoctrine()->getRepository(AccionReprograma::class)->find($id);

            $accionreprograma->setEstado(0);
            $cx->persist($accionreprograma);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$accionreprograma->getId().".",'success' => true,
                'message' => 'Reprograma dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}