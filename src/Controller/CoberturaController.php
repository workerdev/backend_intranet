<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\TipoCobertura;
use App\Entity\Cobertura;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
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


class CoberturaController extends AbstractController
{   
    /**
     * @Route("/cobertura", name="cobertura")
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
        $tipocobertura = $this->getDoctrine()->getRepository(TipoCobertura::class)->findBy(array('estado' => '1'));
        $cobertura = $this->getDoctrine()->getRepository(Cobertura::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('cobertura/index.html.twig', array('objects' => $cobertura, 'tipo' => $tipocobertura, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/cobertura_insertar", methods={"POST"}, name="cobertura_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $unidad = $sx['unidad'];
            $anio = $sx['anio'];
            $mes = $sx['mes'];
            $valor = $sx['valor'];
            $tipo = $sx['tipo'];              
            
            $cobertura = new Cobertura();
            $cobertura->setUnidad($unidad);
            $cobertura->setAnio($anio);
            $cobertura->setMes($mes);
            $cobertura->setValor($valor);
            $cobertura->setEstado(1);

            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoCobertura::class)->find($tipo): $tipo=null;
            $cobertura->setFktipo($tipo);
            $errors = $validator->validate($cobertura);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($cobertura);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$cobertura->getId().".",   
            'success' => true,
            'message' => 'Cobertura registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/cobertura_actualizar", methods={"POST"}, name="cobertura_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $unidad = $sx['unidad'];
            $anio = $sx['anio'];
            $mes = $sx['mes'];
            $valor = $sx['valor'];
            $tipo = $sx['tipo'];

            $cobertura = new Cobertura();
            $cobertura->setId($id);
            $cobertura->setUnidad($unidad);
            $cobertura->setAnio($anio);
            $cobertura->setMes($mes);
            $cobertura->setValor($valor);
            $cobertura->setEstado(1);

            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoCobertura::class)->find($tipo): $tipo=null;
            $cobertura->setFktipo($tipo);
            
            $errors = $validator->validate($cobertura);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }
            $cx->merge($cobertura);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Cobertura actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/cobertura_editar", methods={"POST"}, name="cobertura_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $cobertura = $this->getDoctrine()->getRepository(Cobertura::class)->find($id);
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($cobertura, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Cobertura listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/cobertura_eliminar", methods={"POST"}, name="cobertura_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $cobertura = $this->getDoctrine()->getRepository(Cobertura::class)->find($id);
            
            $cobertura->setEstado(0);
            $cx->persist($cobertura);
            $cx->flush();
            
            $resultado = array('response'=>"El ID modificado es: ".$cobertura->getId().".",'success' => true,
            'message' => 'Cobertura dado de baja correctamente.');
            
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}