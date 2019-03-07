<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\SeguimientoCro;
use App\Entity\RiesgosOportunidades;
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
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Rol;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class SeguimientoCroController extends AbstractController
{   
    /**
     * @Route("/seguimientocro", name="seguimientocro")
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
        
        $seguimientocro = $this->getDoctrine()->getRepository(SeguimientoCro::class)->findBy(array('estado' => '1'));
        $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('estado' => '1'));
        $Usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        return $this->render('seguimientocro/index.html.twig', array('objects' => $seguimientocro, 'riesgos' => $riesgos, 'fkresponsable' => $Usuario, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/seguimientocro_insertar", methods={"POST"}, name="seguimientocro_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $riesgos = $sx['riesgos'];
            $fechaseg = $sx['fechaseg'];
            $fkresponsable = $sx['fkresponsable'];
            $observaciones = $sx['observaciones'];
            $estadoseg= $sx['estadoseg'];

            $seguimientocro = new SeguimientoCro();
            $seguimientocro->setFechaSeg(new \DateTime($fechaseg));
            $seguimientocro->setObservaciones($observaciones);
            $seguimientocro->setEstadoSeg($estadoseg);
            $riesgos != '' ? $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($riesgos): $riesgos = null;
            $seguimientocro->setFkriesgos($riesgos);
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable):$fkresponsable = null;
            $seguimientocro->setFkresponsable($fkresponsable);
            $seguimientocro->setEstado(1);
            $errors = $validator->validate($seguimientocro);
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
            $cx->persist($seguimientocro);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$seguimientocro->getId().".",   
            'success' => true,
            'message' => 'Seguimiento de riesgos registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/seguimientocro_actualizar", methods={"POST"}, name="seguimientocro_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $riesgos = $sx['riesgos'];
            $fechaseg = $sx['fechaseg'];
            $fkresponsable = $sx['fkresponsable'];
            $observaciones = $sx['observaciones'];
            $estadoseg= $sx['estadoseg'];

            $seguimientocro = $this->getDoctrine()->getRepository(SeguimientoCro::class)->find($id);
            $seguimientocro->setId($id);
            $seguimientocro->setFechaSeg(new \DateTime($fechaseg));
            
            $seguimientocro->setObservaciones($observaciones);
            $seguimientocro->setEstadoSeg($estadoseg);
            $riesgos != '' ? $riesgos = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($riesgos): $riesgos = null;
            $seguimientocro->setFkriesgos($riesgos);
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable): $fkresponsable = null;
            $seguimientocro->setFkresponsable($fkresponsable);
            $seguimientocro->setEstado(1);
            $errors = $validator->validate($seguimientocro);
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
            $cx->merge($seguimientocro);
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
     * @Route("/seguimientocro_editar", methods={"POST"}, name="seguimientocro_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimientocro = $this->getDoctrine()->getRepository(SeguimientoCro::class)->find($id);
            $fsg = $seguimientocro->getFechaSeg();
            $result = $fsg->format('Y-m-d');
            $sendinf = [
                "id" => $seguimientocro->getId(),
                "fkriesgos" => $seguimientocro->getFkriesgos(),
                "fechaseg" => $result,
                "fkresponsable" => $seguimientocro->getFkresponsable(),
                "observaciones" => $seguimientocro->getObservaciones(),
                "estadoseg" => $seguimientocro->getEstadoSeg()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Seguimiento de riesgos listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/seguimientocro_eliminar", methods={"POST"}, name="seguimientocro_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $seguimientocro = $this->getDoctrine()->getRepository(SeguimientoCro::class)->find($id);

            $seguimientocro->setEstado(0);
            $cx->persist($seguimientocro);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$seguimientocro->getId().".",'success' => true,
                'message' => 'Seguimiento de riesgos dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}