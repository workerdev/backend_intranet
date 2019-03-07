<?php

namespace App\Controller;

use App\Entity\Accion;
use App\Entity\AccionSeguimiento;
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


class AccionSeguimientoController extends Controller
{
    /**
     * @Route("/accionseguimiento", name="accionseguimiento_listar")
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
      
        $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('estado' => '1'));
        $accionseguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->findBy(array('estado' => '1'));
        return $this->render('accionseguimiento/index.html.twig', array('objects' => $accionseguimiento, 'accion' => $accion, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/accionseguimiento_insertar", methods={"POST"}, name="accionseguimiento_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $ordinal = $sx['ordinal'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $observaciones = $sx['observaciones'];
            $estadoseguimiento = $sx['estadoseguimiento'];
            
            $accion = $sx['accion'];

            $accionseguimiento = new AccionSeguimiento();
            if($ordinal !='' && is_numeric($ordinal))  $accionseguimiento->setOrdinal($ordinal);
            $accionseguimiento->setFecha(new \DateTime($fecha));
            $accionseguimiento->setResponsable($responsable);
            $accionseguimiento->setObservaciones($observaciones);
            $accionseguimiento->setEstadoseguimiento($estadoseguimiento);
            $accionseguimiento->setEstado(1);

            $accion != '' ? $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion): $accion=null;
            $accionseguimiento->setFkaccion($accion);
            $errors = $validator->validate($accionseguimiento);
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
            $cx->persist($accionseguimiento);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$accionseguimiento->getId().".",'success' => true,
                'message' => 'Seguimiento de la acción registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accionseguimiento_actualizar", methods={"POST"}, name="accionseguimiento_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $ordinal = $sx['ordinal'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $observaciones = $sx['observaciones'];
            $estadoseguimiento = $sx['estadoseguimiento'];
            
            $accion = $sx['accion'];

            $accionseguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->find($id);
            $accionseguimiento->setId($id);
            if($ordinal !='' && is_numeric($ordinal))  $accionseguimiento->setOrdinal($ordinal);
            $accionseguimiento->setFecha(new \DateTime($fecha));
            $accionseguimiento->setResponsable($responsable);
            $accionseguimiento->setObservaciones($observaciones);
            $accionseguimiento->setEstadoseguimiento($estadoseguimiento);
            $accionseguimiento->setEstado(1);

            $accion != '' ? $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion): $accion=null;
            $accionseguimiento->setFkaccion($accion);
            $errors = $validator->validate($accionseguimiento);
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

            $cx->merge($accionseguimiento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Seguimiento de la acción actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accionseguimiento_editar", methods={"POST"}, name="accionseguimiento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accionseguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->find($id);
            $fec = $accionseguimiento->getFecha();
            $rsfc = $fec->format('Y-m-d');
            
            $sendinf = [
                "id" => $accionseguimiento->getId(),
                "fkaccion" => $accionseguimiento->getFkaccion(),
                "ordinal" => $accionseguimiento->getOrdinal(),
                "fecha" => $rsfc,
                "responsable" => $accionseguimiento->getResponsable(),
                "observaciones" => $accionseguimiento->getObservaciones(),
                "estadoseguimiento" => $accionseguimiento->getEstadoseguimiento()
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de la acción listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accionseguimiento_eliminar", methods={"POST"}, name="accionseguimiento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $accionseguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->find($id);

            $accionseguimiento->setEstado(0);
            $cx->persist($accionseguimiento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$accionseguimiento->getId().".",'success' => true,
                'message' => 'Seguimiento de la acción dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}