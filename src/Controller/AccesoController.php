<?php
namespace App\Controller;
//////////////////////////////PRBANDO PULLLL
use App\Entity\EstadoPlan;
use App\Entity\PlanAccion;
use App\Entity\Acceso;
use App\Entity\Usuario;
use App\Entity\Modulo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Rol;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AccesoController extends Controller
{
    /**
     * @Route("/acceso", name="acceso_listar")
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
        $acceso = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('estado' => '1'));
        $Rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1'));
        $Modulo = $this->getDoctrine()->getRepository(Modulo::class)->findBy(array('estado' => '1'));
        return $this->render('acceso/index.html.twig', array('objects' => $acceso, 'rol' => $Rol, 'modulo' => $Modulo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }

    /**
     * @Route("/acceso_insertar", methods={"POST"}, name="acceso_insertar")
     */
    public function insertar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);

            $rol = $sx['rol'];
            $modulo = $sx['modulo'];

            $acceso = new Acceso();

            $rol = $this->getDoctrine()->getRepository(Rol::class)->find($rol);
            $modulo = $this->getDoctrine()->getRepository(Modulo::class)->find($modulo);

            $acceso->setFkrol($rol);
            $acceso->setFkmodulo($modulo);

            $cx->persist($acceso);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$acceso->getId().".",'success' => true,
                'message' => 'Acceso registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/acceso_actualizar", methods={"POST"}, name="acceso_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];

            $rol = $sx['rol'];
            $modulo = $sx['modulo'];

            $acceso = new Acceso();
            $acceso->setId($id);

            $rol = $this->getDoctrine()->getRepository(Rol::class)->find($rol);
            $modulo = $this->getDoctrine()->getRepository(Modulo::class)->find($modulo);

            $acceso->setFkrol($rol);
            $acceso->setFkmodulo($modulo);                

            $cx->merge($acceso);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Acceso actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/acceso_editar", methods={"POST"}, name="acceso_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $acceso = $this->getDoctrine()->getRepository(Acceso::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($acceso, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Acceso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/acceso_eliminar", methods={"POST"}, name="acceso_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $acceso = $this->getDoctrine()->getRepository(Acceso::class)->find($id);

            $cx->delete($acceso);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$acceso->getId().".",'success' => true,
                'message' => 'Acceso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}