<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Auditoria;
use App\Entity\Fortaleza;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
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
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class FortalezaController extends AbstractController
{   
    /**
     * @Route("/fortaleza", name="fortaleza")
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
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(['estado' => '1'], ['codigo' => 'ASC']);
        $fortaleza = $this->getDoctrine()->getRepository(Fortaleza::class)->findBy(['estado' => '1'], ['fecharegistro' => 'DESC']);
        return $this->render('fortaleza/index.html.twig', array('objects' => $fortaleza, 'auditoria' => $auditoria, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/fortaleza_insertar", methods={"POST"}, name="fortaleza_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $auditoria = $sx['auditoria'];
            $ordinal = $sx['ordinal'];
            $descripcion = $sx['descripcion'];
            $responsable = $sx['responsable'];
            $fecharegistro = $sx['fecharegistro'];                
            
            $fortaleza = new Fortaleza();
            if($ordinal !='' && is_numeric($ordinal)) $fortaleza->setOrdinal($ordinal);
            $fortaleza->setDescripcion($descripcion);
            $fortaleza->setResponsable($responsable);
            $fortaleza->setFecharegistro(new \DateTime($fecharegistro));
            $fortaleza->setEstado(1);
            $auditoria != '' ? $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria): $auditoria = null;
            $fortaleza->setFkauditoria($auditoria);
            $errors = $validator->validate($fortaleza);
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
            $cx->persist($fortaleza);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$fortaleza->getId().".",   
            'success' => true,
            'message' => 'Fortaleza registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/fortaleza_actualizar", methods={"POST"}, name="fortaleza_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $auditoria = $sx['auditoria'];
            $ordinal = $sx['ordinal'];
            $descripcion = $sx['descripcion'];
            $responsable = $sx['responsable'];
            $fecharegistro = $sx['fecharegistro'];

            $fortaleza = $this->getDoctrine()->getRepository(Fortaleza::class)->find($id);
            $fortaleza->setId($id);

            if($ordinal !='' && is_numeric($ordinal)) $fortaleza->setOrdinal($ordinal);

            $fortaleza->setDescripcion($descripcion);
            $fortaleza->setResponsable($responsable);
            $fortaleza->setFecharegistro(new \DateTime($fecharegistro));
            $fortaleza->setEstado(1);

            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria);
            $fortaleza->setFkauditoria($auditoria);

            $errors = $validator->validate($fortaleza);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->merge($fortaleza);
            $cx->flush();

            $resultado = array('success' => true, 'message' => 'Fortaleza actualizado correctamente.');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/fortaleza_editar", methods={"POST"}, name="fortaleza_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fortaleza = $this->getDoctrine()->getRepository(Fortaleza::class)->find($id);
            $fecreg = $fortaleza->getFecharegistro();
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
            
            $sendinf = [
                "id" => $fortaleza->getId(),
                "fkauditoria" => $fortaleza->getFkauditoria(),
                "ordinal" => $fortaleza->getOrdinal(),
                "descripcion" => $fortaleza->getDescripcion(),
                "responsable" => $fortaleza->getResponsable(),
                "fecharegistro" => $rsfcr
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Fortaleza listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/fortaleza_eliminar", methods={"POST"}, name="fortaleza_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $fortaleza = $this->getDoctrine()->getRepository(Fortaleza::class)->find($id);

            $fortaleza->setEstado(0);
            $cx->persist($fortaleza);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$fortaleza->getId().".",'success' => true,
                'message' => 'Fortaleza dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/fortaleza_listall", methods={"POST"}, name="fortaleza_listall")
     */
    public function list_all()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fortalezas = $this->getDoctrine()->getRepository(Fortaleza::class)->findBy(array('estado' => '1', 'fkauditoria' => $id), array('id' => 'DESC'));

            $datafrt = array();
            foreach ($fortalezas as $fort) {
                $fortaleza = (object) $fort;
                $fecreg = $fortaleza->getFecharegistro();
                if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                
                $info = [
                    "id" => $fortaleza->getId(),
                    "fkauditoria" => $fortaleza->getFkauditoria(),
                    "ordinal" => $fortaleza->getOrdinal(),
                    "descripcion" => $fortaleza->getDescripcion(),
                    "responsable" => $fortaleza->getResponsable(),
                    "fecharegistro" => $rsfcr
                ];
                $datafrt[] = $info;
            }       

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($datafrt, 'json');
            $resultado = array(
                'response'=>$json,'success' => true,
                'message' => 'Fortalezas listadas correctamente.'
            );
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
}