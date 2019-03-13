<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\CROSeguimiento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\RiesgosOportunidades;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class CROSeguimientoController extends AbstractController
{   
    /**
     * @Route("/croseguimiento", name="croseguimiento")
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
       
        $croseguimiento = $this->getDoctrine()->getRepository(CROSeguimiento::class)->findBy(array('estado' => '1'));
        $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('estado' => '1'));
        return $this->render('croseguimiento/index.html.twig', array('objects' => $croseguimiento, 'riesgos' => $riesgos, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/croseguimiento_insertar", methods={"POST"}, name="croseguimiento_insertar")
     */
    public function insertar(Request $request )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $responsable = $sx['responsable'];
            $observaciones = $sx['observaciones'];
            $fecha = $sx['fechaseg']; 
            $riesgos = $sx['riesgos'];

            $CROSeguimiento = new CROSeguimiento();
            $CROSeguimiento->setResponsable($responsable);
            $CROSeguimiento->setObservaciones($observaciones);
            $CROSeguimiento->setFechaSeg(new \DateTime($fecha));
            $CROSeguimiento->setEstado(1);  

            $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($riesgos);
            $CROSeguimiento->setFkrol($riesgos);

            $cx->persist($CROSeguimiento);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$CROSeguimiento->getId().".",   
            'success' => true,
            'message' => 'Seguimiento de riesgos registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/croseguimiento_actualizar", methods={"POST"}, name="croseguimiento_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $responsable = $sx['responsable'];
            $observaciones = $sx['observaciones'];
            $fecha = $sx['fechaseg']; 
            $riesgos = $sx['riesgos'];

            $CROSeguimiento = new CROSeguimiento();
            $CROSeguimiento->setResponsable($responsable);
            $CROSeguimiento->setObservaciones($observaciones);
            $accidente1->setFechaSeg(new \DateTime($fecha));
            $CROSeguimiento->setEstado(1);  

            $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($riesgos);
            $CROSeguimiento->setFkrol($riesgos);
            $CROSeguimiento->setEstado(1);

            $cx->merge($CROSeguimiento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Seguimiento de riesgos actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/croseguimiento_editar", methods={"POST"}, name="croseguimiento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $CROSeguimiento = $this->getDoctrine()->getRepository(CROSeguimiento::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($CROSeguimiento, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de riesgos listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/croseguimiento_eliminar", methods={"POST"}, name="croseguimiento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $CROSeguimiento = $this->getDoctrine()->getRepository(CROSeguimiento::class)->find($id);

            $CROSeguimiento->setEstado(0);
            $cx->persist($CROSeguimiento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$CROSeguimiento->getId().".",'success' => true,
                'message' => 'Seguimiento de riesgos dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}