<?php

namespace App\Controller;

use App\Entity\Personal;
use App\Entity\TipoTurno;
use App\Entity\Turno;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Rol;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;


class TurnoController extends Controller
{
    /**
     * @Route("/turno", name="turno_listar")
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

        $turno = $this->getDoctrine()->getRepository(Turno::class)->findBy(['estado' => '1']);
        $tipo = $this->getDoctrine()->getRepository(TipoTurno::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));       
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
       
        return $this->render('turno/index.html.twig', array('objects' => $turno, 'tipo' => $tipo, 'personal' => $personal, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/turno_insertar", methods={"POST"}, name="turno_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $telefono = $sx['telefono'];
            $celular = $sx['celular'];
            $fechainicio = $sx['fechainicio'];
            $fechafin = $sx['fechafin'];
            $tipo = $sx['tipo'];
            $personal = $sx['personal'];

            $turno = new Turno();
            $turno->setTelefono($telefono);
            $turno->setCelular($celular);
            $turno->setFechainicio(new \DateTime($fechainicio));
            $turno->setFechafin(new \DateTime($fechafin));
            $turno->setEstado(1);

            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoTurno::class)->find($tipo):$tipo=null;
            $turno->setFktipo($tipo);
            $personal != ''? $personal = $this->getDoctrine()->getRepository(Personal::class)->find($personal):$personal=null;
            $turno->setFktipo($tipo);
            $turno->setFkpersonal($personal);
            $errors = $validator->validate($turno);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($turno);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$turno->getId().".",'success' => true,
                'message' => 'Turno registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/turno_actualizar", methods={"POST"}, name="turno_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $telefono = $sx['telefono'];
            $celular = $sx['celular'];
            $fechainicio = $sx['fechainicio'];
            $fechafin = $sx['fechafin'];
            $tipo = $sx['tipo'];
            $personal = $sx['personal'];

            $turno = $this->getDoctrine()->getRepository(Turno::class)->find($id);
            $turno->setId($id);
            $turno->setTelefono($telefono);
            $turno->setCelular($celular);
            $turno->setFechainicio(new \DateTime($fechainicio));
            $turno->setFechafin(new \DateTime($fechafin));
            $turno->setEstado(1);

            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoTurno::class)->find($tipo):$tipo=null;
            $turno->setFktipo($tipo);
            $personal != ''? $personal = $this->getDoctrine()->getRepository(Personal::class)->find($personal):$personal=null;
            $turno->setFktipo($tipo);
            $turno->setFkpersonal($personal);
            $errors = $validator->validate($turno);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }

            $cx->merge($turno);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Turno actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/turno_editar", methods={"POST"}, name="turno_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $turno = $this->getDoctrine()->getRepository(Turno::class)->find($id);

            $fbg = $turno->getFechainicio();
            if($fbg != null) $result = $fbg->format('Y-m-d'); else $result = $fbg;
            $fnd = $turno->getFechafin();
            if($fnd != null) $fresult = $fnd->format('Y-m-d'); else $fresult = $fnd;
            $sendinf = [
                "id" => $turno->getId(),
                "telefono" => $turno->getTelefono(),
                "celular" => $turno->getCelular(),
                "fechainicio" => $result,
                "fechafin" => $fresult,
                "fktipo" => $turno->getFktipo(),
                "fkpersonal" => $turno->getFkpersonal()->getId(),
                "personal" => $turno->getFkpersonal()->getNombre().' '.$turno->getFkpersonal()->getApellido()             
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Turno listado correctamente.');
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/turno_eliminar", methods={"POST"}, name="turno_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $turno = $this->getDoctrine()->getRepository(Turno::class)->find($id);

            $turno->setEstado(0);
            $cx->persist($turno);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$turno->getId().".",'success' => true,
                'message' => 'Turno dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}