<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PlanAccion;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class PlanAccionController extends AbstractController
{   
    /**
     * @Route("/planaccion", name="planaccion")
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
        
        $planaccion = $this->getDoctrine()->getRepository(PlanAccion::class)->findBy(array('estado' => '1'));
        return $this->render('planaccion/index.html.twig', array('objects' => $planaccion, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/planaccion_insertar", methods={"POST"}, name="planaccion_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $titulo = $sx['titulo'];
            $motivos = $sx['motivos'];

            $fecha = $sx['fecha'];

            $responsable = $sx['responsable'];                
            $planaccion = new PlanAccion();
            $planaccion->setTitulo($titulo);
            $planaccion->setMotivos($motivos);
            $planaccion->setFecha(new \DateTime($fecha));
            $planaccion->setResponsable($responsable);
            $planaccion->setEstado(1);
            $errors = $validator->validate($planaccion);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($planaccion);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$planaccion->getId().".",   
            'success' => true,
            'message' => 'Plan de acción registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/planaccion_actualizar", methods={"POST"}, name="planaccion_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $titulo = $sx['titulo'];
            $motivos = $sx['motivos'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];

            $planaccion = $this->getDoctrine()->getRepository(PlanAccion::class)->find($id);
            $planaccion->setId($id);
            $planaccion->setTitulo($titulo);
            $planaccion->setMotivos($motivos);
            $planaccion->setFecha(new \DateTime($fecha));
            $planaccion->setResponsable($responsable);
            $planaccion->setEstado(1);
            $errors = $validator->validate($planaccion);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($planaccion);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Plan de acción actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/planaccion_editar", methods={"POST"}, name="planaccion_editar")
     */
    public function editar()
    { 
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $planaccion = $this->getDoctrine()->getRepository(PlanAccion::class)->find($id);
            $fec = $planaccion->getFecha();
            $result = $fec->format('Y-m-d');
            $sendinf = [
                "id" => $planaccion->getId(),
                "titulo" => $planaccion->getTitulo(),
                "motivos" => $planaccion->getMotivos(),
                "fecha" => $result,
                "responsable" => $planaccion->getResponsable()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Plan de acción listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/planaccion_eliminar", methods={"POST"}, name="planaccion_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $planaccion = $this->getDoctrine()->getRepository(PlanAccion::class)->find($id);

            $planaccion->setEstado(0);
            $cx->persist($planaccion);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$planaccion->getId().".",'success' => true,
                'message' => 'Plan de acción dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}