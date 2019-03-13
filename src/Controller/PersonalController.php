<?php

namespace App\Controller;
use App\Entity\Personal;
use App\Entity\PersonalCargo;
use App\Entity\EstadoPersonal;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;


class PersonalController extends Controller
{
    /**
     * @Route("/personal", name="personal_listar")
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
        $Personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(array('estado' => '1'));
        $ProcesosCargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(array('estado' => '1'));
        $EstadoPersonal = $this->getDoctrine()->getRepository(EstadoPersonal::class)->findBy(array('estado' => '1'));
        return $this->render('personal/index.html.twig', array('objects' => $Personal, 'tipo' => $ProcesosCargo, 'tipo2' => $EstadoPersonal, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/personal_insertar", methods={"POST"}, name="personal_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $apellido = $sx['apellido'];
            $ci = $sx['ci'];
            $correo = $sx['correo'];
            $telefono = $sx['telefono'];
            $fnac = $sx['fnac'];
            $procesoscargo = $sx['personalcargo'];
            $estadopersonal = $sx['estadopersonal'];

            $personal = new Personal();
            $personal->setNombre($nombre);
            $personal->setApellido($apellido);
            if($ci != '' && is_numeric($ci))$personal->setCi($ci);
            $personal->setCorreo($correo);
            if($telefono != '' && is_numeric($telefono)) $personal->setTelefono($telefono);
            $personal->setFnac(new \DateTime($fnac));
            $procesoscargo != '' ? $procesoscargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($procesoscargo): $procesoscargo =null;
            $estadopersonal != '' ? $estadopersonal = $this->getDoctrine()->getRepository(EstadoPersonal::class)->find($estadopersonal): $estadopersonal=null;
            $personal->setFkPersonalCargo($procesoscargo); 
            $personal->setFkestadopersonal($estadopersonal);                
            $personal->setEstado(1);
            $errors = $validator->validate($personal);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->persist($personal);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$personal->getId().".",'success' => true,
                'message' => 'Personal registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/personal_actualizar", methods={"POST"}, name="personal_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $apellido = $sx['apellido'];
            $ci = $sx['ci'];
            $correo = $sx['correo'];
            $telefono = $sx['telefono'];
            $fnac = $sx['fnac'];
            $procesoscargo = $sx['personalcargo'];
            $estadopersonal = $sx['estadopersonal'];

            $personal = $this->getDoctrine()->getRepository(Personal::class)->find($id);
            $personal->setId($id);
            $personal->setNombre($nombre);
            $personal->setApellido($apellido);
            if($ci != '' && is_numeric($ci))$personal->setCi($ci);
            $personal->setCorreo($correo);
            if($telefono != '' && is_numeric($telefono)) $personal->setTelefono($telefono);
            $personal->setFnac(new \DateTime($fnac));
            $personal->setEstado(1);

            $procesoscargo != '' ? $procesoscargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($procesoscargo): $procesoscargo =null;
            $estadopersonal != '' ? $estadopersonal = $this->getDoctrine()->getRepository(EstadoPersonal::class)->find($estadopersonal): $estadopersonal=null;
            $personal->setFkPersonalCargo($procesoscargo);
            $personal->setFkestadopersonal($estadopersonal);
            $personal->setEstado(1);
            $errors = $validator->validate($personal);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }

            $cx->merge($personal);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Personal actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/personal_editar", methods={"POST"}, name="personal_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $personal = $this->getDoctrine()->getRepository(Personal::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $fecha = $personal->getFnac();
            $fechaformat = $fecha->format('Y-m-d');
            $sendinf = [
                "id" => $personal->getId(),
                "fnac"=> $fechaformat,
                "apellido" => $personal->getApellido(),
                "nombre"=> $personal->getNombre(),
                "telefono" => $personal->getTelefono(),
                "ci"=> $personal->getCi(),
                "correo" => $personal->getCorreo(),
                "fkprocesoscargo" => $personal->getFkPersonalCargo(),
                "fkestadopersonal"=> $personal->getFkestadopersonal()

            ];
            $json = $serializer->serialize($sendinf, 'json');

            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Personal listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/personal_eliminar", methods={"POST"}, name="personal_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $personal = $this->getDoctrine()->getRepository(Personal::class)->find($id);

            $personal->setEstado(0);
            $cx->persist($personal);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$personal->getId().".",'success' => true,
                'message' => 'Personal dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}