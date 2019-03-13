<?php

namespace App\Controller;

use App\Entity\EstadoPlan;
use App\Entity\PlanAccion;
use App\Entity\SeguimientoPlan;
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
use App\Entity\Rol;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class SeguimientoPlanController extends Controller
{
    /**
     * @Route("/seguimientoplan", name="seguimientoplan_listar")
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
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $seguimientoplan = $this->getDoctrine()->getRepository(SeguimientoPlan::class)->findBy(array('estado' => '1'));
        $PlanAccion = $this->getDoctrine()->getRepository(PlanAccion::class)->findBy(array('estado' => '1'));
        $EstadoPlan = $this->getDoctrine()->getRepository(EstadoPlan::class)->findBy(array('estado' => '1'));
        return $this->render('seguimientoplan/index.html.twig', array('objects' => $seguimientoplan, 'plan' => $PlanAccion, 'estado' => $EstadoPlan, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/seguimientoplan_insertar", methods={"POST"}, name="seguimientoplan_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $responsable = $sx['responsable'];
            $fecha = $sx['fecha'];
            $observaciones = $sx['observaciones'];
            $fechaimplementacion = $sx['fechaimplementacion'];

            $plan = $sx['plan'];
            $estado = $sx['estado'];

            $seguimientoplan = new SeguimientoPlan();
            $seguimientoplan->setResponsable($responsable);
            $seguimientoplan->setFecha(new \DateTime($fecha));
            $seguimientoplan->setObservaciones($observaciones);
            $seguimientoplan->setFechaimplementacion(new \DateTime($fechaimplementacion));
            $seguimientoplan->setEstado(1);

            $plan != '' ? $plan = $this->getDoctrine()->getRepository(PlanAccion::class)->find($plan): $plan =null;
            $estado!= '' ? $estado = $this->getDoctrine()->getRepository(EstadoPlan::class)->find($estado): $estado=null;

            $seguimientoplan->setFkplan($plan);
            $seguimientoplan->setFkestado($estado);

            $errors = $validator->validate($seguimientoplan);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($seguimientoplan);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$seguimientoplan->getId().".",'success' => true,
                'message' => 'Seguimiento de plan correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoplan_actualizar", methods={"POST"}, name="seguimientoplan_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $responsable = $sx['responsable'];
            $fecha = $sx['fecha'];
            $observaciones = $sx['observaciones'];
            $fechaimplementacion = $sx['fechaimplementacion'];

            $plan = $sx['plan'];
            $estado = $sx['estado'];

            $seguimientoplan = $this->getDoctrine()->getRepository(SeguimientoPlan::class)->find($id);
            $seguimientoplan->setId($id);
            $seguimientoplan->setResponsable($responsable);
            $seguimientoplan->setFecha(new \DateTime($fecha));
            $seguimientoplan->setObservaciones($observaciones);
            $seguimientoplan->setFechaimplementacion(new \DateTime($fechaimplementacion));
            $seguimientoplan->setEstado(1);

            $plan != '' ? $plan = $this->getDoctrine()->getRepository(PlanAccion::class)->find($plan): $plan =null;
            $estado!= '' ? $estado = $this->getDoctrine()->getRepository(EstadoPlan::class)->find($estado): $estado=null;

            $seguimientoplan->setFkplan($plan);
            $seguimientoplan->setFkestado($estado);

            $errors = $validator->validate($seguimientoplan);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }

            $cx->merge($seguimientoplan);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Seguimineto de plan actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoplan_editar", methods={"POST"}, name="seguimientoplan_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimientoplan = $this->getDoctrine()->getRepository(SeguimientoPlan::class)->find($id);
            $fec = $seguimientoplan->getFecha();
            $fip = $seguimientoplan->getFechaimplementacion();
            $result = $fec->format('Y-m-d');
            $reimp = $fip->format('Y-m-d');
            $sendinf = [
                "id" => $seguimientoplan->getId(),
                "responsable" => $seguimientoplan->getResponsable(),
                "fecha" => $result,
                "observaciones" => $seguimientoplan->getObservaciones(),
                "fechaimplementacion" => $reimp
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de plan listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientoplan_eliminar", methods={"POST"}, name="seguimientoplan_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $seguimientoplan = $this->getDoctrine()->getRepository(SeguimientoPlan::class)->find($id);

            $seguimientoplan->setEstado(0);
            $cx->persist($seguimientoplan);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$seguimientoplan->getId().".",'success' => true,
                'message' => 'Seguimiento de plan dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}