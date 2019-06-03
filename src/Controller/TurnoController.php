<?php

namespace App\Controller;

use App\Entity\Personal;
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
        $Turno = $this->getDoctrine()->getRepository(Turno::class)->findBy(array('estado' => '1'));
        $Personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(array('estado' => '1'));
	$docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));       
	$fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('turno/index.html.twig', array('objects' => $Turno, 'personal' => $Personal, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/turno_insertar", methods={"POST"}, name="turno_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $turnoh = $sx['turnoh'];
            $personal = $sx['personal'];

            $turno = new Turno();
            $turno->setNombre($turnoh);
            $turno->setEstado(1);
            $turno->setDescripcion("descripcion");

            $personal != ''? $personal = $this->getDoctrine()->getRepository(Personal::class)->find($personal):$personal=null;
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
            $turnoh = $sx['turno'];
            $personal = $sx['personal'];

            $turno = $this->getDoctrine()->getRepository(Turno::class)->find($id);
            $turno->setId($id);
            $turno->setNombre($turnoh);
            $turno->setEstado(1);
            $turno->setDescripcion('');

            $personal != ''? $personal = $this->getDoctrine()->getRepository(Personal::class)->find($personal):$personal=null;
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
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($turno, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Turno listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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