<?php

namespace App\Controller;

use App\Entity\RiesgosOportunidades;
use App\Entity\FichaProcesos;
use App\Entity\Probabilidad;
use App\Entity\Impacto;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Rol;
use App\Entity\Acceso;
use App\Entity\TipoCRO;
use App\Entity\SeguimientoCro;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;



class RiesgosOportunidadesController extends Controller
{
    /**
     * @Route("/riesgosoportunidades", name="riesgosoportunidades_listar")
     * @Method({"GET"})
     */
    public function index()
    {  $s_user = $this->get('session')->get('s_user');
        if(empty($s_user)){
            $redireccion = new RedirectResponse('/login');
            return $redireccion;
        }
        
        $vid = $s_user['fkrol']['id'];
        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('id' => $vid, 'estado' => '1'));
        $accesos = $this->getDoctrine()->getRepository(Acceso::class)->findBy(array('fkrol' => $rol[0]));

        $mods = array();
        $children = array();
        $options = array();
        foreach ($accesos as $access) {
            $accdt = (object) $access;
            $item = $this->getDoctrine()->getRepository(Modulo::class)->find($accdt->getFkmodulo()->getId());
            $mods[] = $item;
        }
        $parent = $mods;
        $child = $mods;
        $option = $mods;

        $permisos = array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        
        $RiesgosOportunidades = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('estado' => '1'));
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $TipoCRO = $this->getDoctrine()->getRepository(TipoCRO::class)->findBy(array('estado' => '1'));
        $Probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->findBy(array('estado' => '1'));
        $Impacto = $this->getDoctrine()->getRepository(Impacto::class)->findBy(array('estado' => '1'));
        $Usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
       return $this->render('riesgosoportunidades/index.html.twig', array('objects' => $RiesgosOportunidades, 'tipo' => $FichaProcesos, 'tipo2' => $TipoCRO, 'tipo3' => $Probabilidad, 'tipo4' => $Impacto, 'tipo5' => $Usuario, 'parents' => $parent, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr, 'children' => $child, 'options' => $option, 'permisos' => $permisos));
    }

    /**
     * @Route("/riesgosoportunidades_insertar", methods={"POST"}, name="riesgosoportunidades_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $descripcion = $sx['descripcion'];
            $origen = $sx['origen'];
            $accion = $sx['accion'];
            $fecha = $sx['fecha'];
            $estadocro = $sx['estadocro'];
            $analisiscausaraiz = $sx['analisiscausaraiz'];

            $fichaprocesos = $sx['fichaprocesos'];                
            $tipocro = $sx['tipocro'];
            $probabilidad = $sx['probabilidad'];
            $impacto = $sx['impacto'];
            $fkresponsable = $sx['fkresponsable'];


            $riesgosoportunidades = new RiesgosOportunidades();
            $riesgosoportunidades->setDescripcion($descripcion);
            $riesgosoportunidades->setOrigen($origen);
            $riesgosoportunidades->setAccion($accion);
            $riesgosoportunidades->setFecha(new \DateTime($fecha));
            $estadocro == null ? $estadocro='': $estadocro = $sx['estadocro'];

            $riesgosoportunidades->setEstadocro($estadocro);
            $riesgosoportunidades->setAnalisiscausaraiz($analisiscausaraiz);
            $riesgosoportunidades->setEstado(1);

            $fichaprocesos != '' ? $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($fichaprocesos) : $fichaprocesos = null;
            $tipocro != '' ? $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->find($tipocro) : $tipocro = null;
            $probabilidad != '' ? $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($probabilidad) : $probabilidad=null;
            $impacto != '' ? $impacto = $this->getDoctrine()->getRepository(Impacto::class)->find($impacto) : $impacto=null;
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable =null;
           
            $riesgosoportunidades->setFkficha($fichaprocesos);
            $riesgosoportunidades->setFktipo($tipocro);
            $riesgosoportunidades->setFkprobabilidad($probabilidad);
            $riesgosoportunidades->setFkimpacto($impacto);
            $riesgosoportunidades->setFkresponsable($fkresponsable);

            $errors = $validator->validate($riesgosoportunidades);
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

            $cx->persist($riesgosoportunidades);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$riesgosoportunidades->getId().".",'success' => true,
                'message' => 'Riesgo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/riesgosoportunidades_actualizar", methods={"POST"}, name="riesgosoportunidades_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $descripcion = $sx['descripcion'];
            $origen = $sx['origen'];
            $accion = $sx['accion'];
            $fecha = $sx['fecha'];
            $estadocro = $sx['estadocro'];
            $analisiscausaraiz = $sx['analisiscausaraiz'];

            $fichaprocesos = $sx['fichaprocesos'];                
            $tipocro = $sx['tipocro'];
            $probabilidad = $sx['probabilidad'];
            $impacto = $sx['impacto'];
            
            $fkresponsable = $sx['fkresponsable'];

//            $riesgosoportunidades = new RiesgosOportunidades();
            $riesgosoportunidades = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($id);
            $riesgosoportunidades->setId($id);
            $riesgosoportunidades->setDescripcion($descripcion);
            $riesgosoportunidades->setOrigen($origen);
            $riesgosoportunidades->setAccion($accion);
            $riesgosoportunidades->setFecha(new \DateTime($fecha));
            $estadocro == null ? $estadocro='': $estadocro = $sx['estadocro'];
            $riesgosoportunidades->setEstadocro($estadocro);
            $riesgosoportunidades->setAnalisiscausaraiz($analisiscausaraiz);
            $riesgosoportunidades->setEstado(1);

            $fichaprocesos != '' ? $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($fichaprocesos) : $fichaprocesos = null;
            $tipocro != '' ? $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->find($tipocro) : $tipocro = null;
            $probabilidad != '' ? $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($probabilidad) : $probabilidad=null;
            $impacto != '' ? $impacto = $this->getDoctrine()->getRepository(Impacto::class)->find($impacto) : $impacto=null;
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable =null;
            
            $riesgosoportunidades->setFkficha($fichaprocesos);
            $riesgosoportunidades->setFktipo($tipocro);
            $riesgosoportunidades->setFkprobabilidad($probabilidad);
            $riesgosoportunidades->setFkimpacto($impacto);
            $riesgosoportunidades->setFkresponsable($fkresponsable);
            $errors = $validator->validate($riesgosoportunidades);
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
//            $riesgosoportunidades->setFkficha($tipo);
//            $riesgosoportunidades->setFktipo($tipo2);
//            $riesgosoportunidades->setFkprobabilidad($tipo3);
//            $riesgosoportunidades->setFkimpacto($tipo4);
            $cx->merge($riesgosoportunidades);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Riesgo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/riesgosoportunidades_editar", methods={"POST"}, name="riesgosoportunidades_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $riesgosoportunidades = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($id);

            $fimp = $riesgosoportunidades->getFecha();
            $result = $fimp->format('Y-m-d');
            $sendinf = [
                "id" => $riesgosoportunidades->getId(),
                "descripcion" => $riesgosoportunidades->getDescripcion(),
                "origen" => $riesgosoportunidades->getOrigen(),
                "accion" => $riesgosoportunidades->getAccion(),
                "fecha" => $result,
                "estadocro" => $riesgosoportunidades->getEstadocro(),
                "analisiscausaraiz" => $riesgosoportunidades->getAnalisiscausaraiz(),
                "fkficha" => $riesgosoportunidades->getFkficha(),
                "fktipo" => $riesgosoportunidades->getFktipo(),
                "fkprobabilidad" => $riesgosoportunidades->getFkprobabilidad(),
                "fkimpacto" => $riesgosoportunidades->getFkimpacto(),
                "fkresponsable" => $riesgosoportunidades->getFkresponsable()
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Riesgo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/crocm_prev", methods={"POST"}, name="crocm_prev")
     */
    public function crocm_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimiento = $this->getDoctrine()->getRepository(SeguimientoCro::class)->findBy(array('fkriesgos' => $id, 'estado' => '1'));
            
            if(sizeof($seguimiento) == 0){
                $info = array('response'=>"¿Desea dar de baja los datos del riesgo y oportunidad?", 'success' => true,
                'message' => 'Baja riesgo y oportunidad.');
            }else{
                if(sizeof($seguimiento) > 0) $vr = " seguimiento de riesgos";

                $info = array('response'=>"El riesgo y oportunidad no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros del riesgo y oportunidad.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/riesgosoportunidades_eliminar", methods={"POST"}, name="riesgosoportunidades_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $riesgosoportunidades = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->find($id);

            $riesgosoportunidades->setEstado(0);
            $cx->persist($riesgosoportunidades);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$riesgosoportunidades->getId().".",'success' => true,
                'message' => 'Riesgo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}