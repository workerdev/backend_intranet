<?php

namespace App\Controller;

use App\Entity\Accion;
use App\Entity\AccionEficacia;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

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


class AccionEficaciaController extends Controller
{
    /**
     * @Route("/accioneficacia", name="accioneficacia_listar")
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
        
        $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('estado' => '1','estadoaccion' => 'Implementada'));
        $accioneficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->findBy(array('estado' => '1'));
        
        return $this->render('accioneficacia/index.html.twig', array('objects' => $accioneficacia, 'accion' => $accion, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/accioneficacia_insertar", methods={"POST"}, name="accioneficacia_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $eficaz = $sx['eficaz'];
            $resultado = $sx['resultado'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $nombreverificador = $sx['nombreverificador'];
            $cargoverificador = $sx['cargoverificador'];
            
            $accion = $sx['accion'];

            $accioneficacia = new AccionEficacia();
            $accioneficacia->setEficaz($eficaz);
            $accioneficacia->setResultado($resultado);
            $accioneficacia->setFecha(new \DateTime($fecha));
            $accioneficacia->setResponsable($responsable);
            $accioneficacia->setNombreverificador($nombreverificador);
            $accioneficacia->setCargoverificador($cargoverificador);
            $accioneficacia->setEstado(1);

            $accion != '' ? $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion) : $accion = null;
            $accioneficacia->setFkaccion($accion);
            $errors = $validator->validate($accioneficacia);
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
            $cx->persist($accioneficacia);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$accioneficacia->getId().".",'success' => true,
                'message' => 'Eficacia registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accioneficacia_actualizar", methods={"POST"}, name="accioneficacia_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $eficaz = $sx['eficaz'];
            $resultado = $sx['resultado'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $nombreverificador = $sx['nombreverificador'];
            $cargoverificador = $sx['cargoverificador'];
            
            $accion = $sx['accion'];

            $accioneficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->find($id);
            $accioneficacia->setId($id);
            $accioneficacia->setEficaz($eficaz);
            $accioneficacia->setResultado($resultado);
            $accioneficacia->setFecha(new \DateTime($fecha));
            $accioneficacia->setResponsable($responsable);
            $accioneficacia->setNombreverificador($nombreverificador);
            $accioneficacia->setCargoverificador($cargoverificador);
            $accioneficacia->setEstado(1);

            $accion != '' ? $accion = $this->getDoctrine()->getRepository(Accion::class)->find($accion) : $accion = null;
            $accioneficacia->setFkaccion($accion);
            $errors = $validator->validate($accioneficacia);
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

            $cx->merge($accioneficacia);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Eficacia actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accioneficacia_editar", methods={"POST"}, name="accioneficacia_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accioneficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->find($id);
            $fec = $accioneficacia->getFecha();
            if($fec != null) $rsfc = $fec->format('Y-m-d'); else $rsfc = $fec;
            
            $sendinf = [
                "id" => $accioneficacia->getId(),
                "fkaccion" => $accioneficacia->getFkaccion(),
                "eficaz" => $accioneficacia->getEficaz(),
                "resultado" => $accioneficacia->getResultado(),
                "fecha" => $rsfc,
                "responsable" => $accioneficacia->getResponsable(),
                "nombreverificador" => $accioneficacia->getNombreverificador(),
                "cargoverificador" => $accioneficacia->getCargoverificador()
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Eficacia listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accioneficacia_eliminar", methods={"POST"}, name="accioneficacia_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $accioneficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->find($id);

            $accioneficacia->setEstado(0);
            $cx->persist($accioneficacia);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$accioneficacia->getId().".",'success' => true,
                'message' => 'Eficacia dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}