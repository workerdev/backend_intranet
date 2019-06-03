<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\GerenciaAreaSector;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Gerencia;
use App\Entity\Area;
use App\Entity\Sector;
use App\Entity\FichaProcesos;
use App\Entity\Rol;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class GerenciaAreaSectorController extends AbstractController
{  
    /**
     * @Route("/gciarsector", name="gciarsector")
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
        
        $GerenciaAreaSector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->findBy(array('estado' => '1'));
        $Gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->findBy(array('estado' => '1'));
        $Area = $this->getDoctrine()->getRepository(Area::class)->findBy(array('estado' => '1'));
        $Sector = $this->getDoctrine()->getRepository(Sector::class)->findBy(array('estado' => '1'));
        $Usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        return $this->render('gciarsector/index.html.twig', array('objects' => $GerenciaAreaSector, 'gerencia' => $Gerencia, 'area' => $Area, 'sector' => $Sector, 'fkresponsable' => $Usuario, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/gciarsector_insertar", methods={"POST"}, name="gciarsector_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $fkresponsable = $sx['fkresponsable'];
            $codigo = $sx['codigo'];
            $vigente = $sx['vigente'];
            $area = $sx['area'];
            $gerencia = $sx['gerencia'];
            $sector = $sx['sector'];

            $GerenciaAreaSector = new GerenciaAreaSector();
            $GerenciaAreaSector->setCodigo($codigo);
            $GerenciaAreaSector->setVigente($vigente);
            $GerenciaAreaSector->setEstado(1);  

            $area != '' ? $area = $this->getDoctrine()->getRepository(Area::class)->find($area) : $area = null;
            $GerenciaAreaSector->setFkarea($area);
            $gerencia != '' ? $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($gerencia): $gerencia= null;
            $GerenciaAreaSector->setFkgerencia($gerencia);
            $sector != '' ? $sector = $this->getDoctrine()->getRepository(Sector::class)->find($sector):$sector=null;
            $GerenciaAreaSector->setFksector($sector);
            
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable =null;
            $GerenciaAreaSector->setFkresponsable($fkresponsable);
            $errors = $validator->validate($GerenciaAreaSector);
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
            $cx->persist($GerenciaAreaSector);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$GerenciaAreaSector->getId().".",   
            'success' => true,
            'message' => 'Gerencia, área y sector registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/gciarsector_actualizar", methods={"POST"}, name="gciarsector_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fkresponsable = $sx['fkresponsable'];
            $codigo = $sx['codigo'];
            $vigente = $sx['vigente'];
            $area = $sx['area'];
            $gerencia = $sx['gerencia'];
            $sector = $sx['sector'];

            $GerenciaAreaSector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($id);
            $GerenciaAreaSector->setId($id);
            $GerenciaAreaSector->setCodigo($codigo);
            $GerenciaAreaSector->setVigente($vigente);
            $GerenciaAreaSector->setEstado(1);

            $area != '' ? $area = $this->getDoctrine()->getRepository(Area::class)->find($area) : $area = null;
            $GerenciaAreaSector->setFkarea($area);
            $gerencia != '' ? $gerencia = $this->getDoctrine()->getRepository(Gerencia::class)->find($gerencia): $gerencia= null;
            $GerenciaAreaSector->setFkgerencia($gerencia);
            $sector != '' ? $sector = $this->getDoctrine()->getRepository(Sector::class)->find($sector):$sector=null;
            $GerenciaAreaSector->setFksector($sector);
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable =null;
            $GerenciaAreaSector->setFkresponsable($fkresponsable);
            $errors = $validator->validate($GerenciaAreaSector);
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
            $cx->merge($GerenciaAreaSector);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Gerencia, área y sector actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/gciarsector_editar", methods={"POST"}, name="gciarsectoreditar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $GerenciaAreaSector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($GerenciaAreaSector, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Gerencia, área y sector listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/gciarsector_prev", methods={"POST"}, name="gciarsector_prev")
     */
    public function gciarsector_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('fkareagerenciasector' => $id, 'estado' => '1'));
            
            if(sizeof($ficha) == 0){
                $info = array('response'=>"¿Desea dar de baja los datos de la gerencia, área y sector?", 'success' => true,
                'message' => 'Baja de la gerencia, área y sector.');
            }else{
                if(sizeof($ficha) > 0) $vr = " ficha de procesos";

                $info = array('response'=>"La gerencia, área y sector no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros de la gerencia, área y sector.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/gciarsector_eliminar", methods={"POST"}, name="gciarsector_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $GerenciaAreaSector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($id);

            $GerenciaAreaSector->setEstado(0);
            $cx->persist($GerenciaAreaSector);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$GerenciaAreaSector->getId().".",'success' => true,
                'message' => 'Gerencia, área y sector dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}