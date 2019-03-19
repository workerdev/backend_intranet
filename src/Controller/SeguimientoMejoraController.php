<?php

namespace App\Controller;

use App\Entity\RegistroMejora;
use App\Entity\SeguimientoMejora;
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
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Rol;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class SeguimientoMejoraController extends Controller
{
    /**
     * @Route("/seguimientomejora", name="seguimientomejora_listar")
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
        
        $SeguimientoMejora = $this->getDoctrine()->getRepository(SeguimientoMejora::class)->findBy(array('estado' => '1'));
        $RegistroMejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->findBy(array('estado' => '1'));
        return $this->render('seguimientomejora/index.html.twig', array('objects' => $SeguimientoMejora, 'tipo' => $RegistroMejora, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/seguimientomejora_insertar", methods={"POST"}, name="seguimientomejora_insertar")
     */
    public function insertar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $responsable = $sx['responsable'];
            $observacion = $sx['observacion'];
            $mejora = $sx['mejora'];

            $seguimientomejora = new SeguimientoMejora();
            $seguimientomejora->setResponsable($responsable);
            $seguimientomejora->setObservacion($observacion);
            $seguimientomejora->setEstado(1);

            $mejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->find($mejora);
            $seguimientomejora->setFkmejora($mejora);                

            $cx->persist($seguimientomejora);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$seguimientomejora->getId().".",'success' => true,
                'message' => 'Seguimiento de mejora correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientomejora_actualizar", methods={"POST"}, name="seguimientomejora_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $responsable = $sx['responsable'];
            $observacion = $sx['observacion'];
            $mejora = $sx['mejora'];

            $seguimientomejora = new SeguimientoMejora();
            $seguimientomejora->setId($id);
            $seguimientomejora->setResponsable($responsable);
            $seguimientomejora->setObservacion($observacion);
            $seguimientomejora->setEstado(1);


            $mejora = $this->getDoctrine()->getRepository(RegistroMejora::class)->find($mejora);
            $seguimientomejora->setFkmejora($mejora);      

            $cx->merge($seguimientomejora);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Seguimiento de mejora actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientomejora_editar", methods={"POST"}, name="seguimientomejora_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimientomejora = $this->getDoctrine()->getRepository(SeguimientoMejora::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($seguimientomejora, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de mejora listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimientomejora_eliminar", methods={"POST"}, name="seguimientomejora_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $seguimientomejora = $this->getDoctrine()->getRepository(SeguimientoMejora::class)->find($id);

            $seguimientomejora->setEstado(0);
            $cx->persist($seguimientomejora);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$seguimientomejora->getId().".",'success' => true,
                'message' => 'Seguimiento de mejora dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}