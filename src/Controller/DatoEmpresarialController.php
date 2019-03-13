<?php

namespace App\Controller;

use App\Entity\TipoDatoEmpresarial;
use App\Entity\DatoEmpresarial;
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
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;


class DatoEmpresarialController extends Controller
{
    /**
     * @Route("/datoempresarial", name="datoempresarial_listar")
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
        $DatoEmpresarial = $this->getDoctrine()->getRepository(DatoEmpresarial::class)->findBy(array('estado' => '1'));
        $TipoDatoEmpresarial = $this->getDoctrine()->getRepository(TipoDatoEmpresarial::class)->findBy(array('estado' => '1'));
        return $this->render('datoempresarial/index.html.twig', array('objects' => $DatoEmpresarial, 'tipo' => $TipoDatoEmpresarial, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }
    

    /**
     * @Route("/datoempresarial_insertar", methods={"POST"}, name="datoempresarial_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $descripcion = $sx['descripcion'];
            $tipodatoempresarial = $sx['tipodatoempresarial'];

            $datoempresarial = new DatoEmpresarial();
            $datoempresarial->setDescripcion($descripcion);
            $datoempresarial->setEstado(1);

            $tipodatoempresarial!= '' ? $tipodatoempresarial = $this->getDoctrine()->getRepository(TipoDatoEmpresarial::class)->find($tipodatoempresarial):$tipodatoempresarial=null;
            $datoempresarial->setFktipodatoempresarial($tipodatoempresarial);
            $errors = $validator->validate($datoempresarial);
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
            $cx->persist($datoempresarial);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$datoempresarial->getId().".",'success' => true,
                'message' => 'Dato empresarial registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/datoempresarial_actualizar", methods={"POST"}, name="datoempresarial_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            
            $descripcion = $sx['descripcion'];
            $tipodatoempresarial = $sx['tipodatoempresarial'];

            $datoempresarial = new DatoEmpresarial();
            $datoempresarial->setId($id);
            $datoempresarial->setDescripcion($descripcion);
            $datoempresarial->setEstado(1);

            $tipodatoempresarial != '' ? $tipodatoempresarial = $this->getDoctrine()->getRepository(TipoDatoEmpresarial::class)->find($tipodatoempresarial):$tipodatoempresarial=null;
            $datoempresarial->setFktipodatoempresarial($tipodatoempresarial);
            $errors = $validator->validate($datoempresarial);
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

            $cx->merge($datoempresarial);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Dato empresarial actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/datoempresarial_editar", methods={"POST"}, name="datoempresarial_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $datoempresarial = $this->getDoctrine()->getRepository(DatoEmpresarial::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($datoempresarial, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Dato empresarial listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/datoempresarial_eliminar", methods={"POST"}, name="datoempresarial_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $datoempresarial = $this->getDoctrine()->getRepository(DatoEmpresarial::class)->find($id);

            $datoempresarial->setEstado(0);
            $cx->persist($datoempresarial);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$datoempresarial->getId().".",'success' => true,
                'message' => 'Dato empresarial dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}