<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\UnidadMedida;
use App\Entity\Usuario;;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\IndicadorProceso;
use App\Entity\SeguimientoIndicador;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class IndicadorProcesoController extends Controller
{
    /**
     * @Route("/indicadorproceso", name="indicadorproceso_listar")
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
        
        $IndicadorProceso = $this->getDoctrine()->getRepository(IndicadorProceso::class)->findBy(array('estado' => '1'));
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $UnidadMedida = $this->getDoctrine()->getRepository(UnidadMedida::class)->findBy(array('estado' => '1'));
        $Usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        return $this->render('indicadorproceso/index.html.twig', array('objects' => $IndicadorProceso, 'tipo' => $FichaProcesos, 'tipo2' => $UnidadMedida, 'tipo3' => $Usuario, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/indicadorproceso_insertar", methods={"POST"}, name="indicadorproceso_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $descripcion = $sx['descripcion'];
            $formula = $sx['formula'];
            $metaanual = $sx['metaanual'];
            $metamensual = $sx['metamensual'];
            $codigo = $sx['codigo'];
            $objetivo = $sx['objetivo'];
            $vigente = $sx['vigente'];

            $ficha = $sx['ficha'];
            $unidad = $sx['unidad'];
            $responsable = $sx['responsable'];

            $indicadorproceso = new IndicadorProceso();
            $indicadorproceso->setDescripcion($descripcion);
            $indicadorproceso->setFormula($formula);
            $indicadorproceso->setMetaanual($metaanual);
            $indicadorproceso->setMetamensual($metamensual);
            $indicadorproceso->setCodigo($codigo);
            $indicadorproceso->setObjetivo($objetivo);
            $indicadorproceso->setVigente($vigente);
            $indicadorproceso->setEstado(1);

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha): $ficha = null ;
            $unidad != '' ? $unidad = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($unidad) : $unidad = null ;
            $responsable != '' ? $responsable = $this->getDoctrine()->getRepository(Usuario::class)->find($responsable) : $responsable = null;
            $indicadorproceso->setFkficha($ficha);
            $indicadorproceso->setFkunidad($unidad);
            $indicadorproceso->setFkresponsable($responsable);
            $errors = $validator->validate($indicadorproceso);
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
            $cx->persist($indicadorproceso);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$indicadorproceso->getId().".",'success' => true,
                'message' => 'Indicador de proceso registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/indicadorproceso_actualizar", methods={"POST"}, name="indicadorproceso_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $descripcion = $sx['descripcion'];
            $formula = $sx['formula'];
            $metaanual = $sx['metaanual'];
            $metamensual = $sx['metamensual'];
            $codigo = $sx['codigo'];
            $objetivo = $sx['objetivo'];
            $vigente = $sx['vigente'];

            $ficha = $sx['ficha'];
            $unidad = $sx['unidad'];
            $responsable = $sx['responsable'];


            $indicadorproceso = new IndicadorProceso();
            $indicadorproceso->setId($id);
            $indicadorproceso->setDescripcion($descripcion);
            $indicadorproceso->setFormula($formula);
            $indicadorproceso->setMetaanual($metaanual);
            $indicadorproceso->setMetamensual($metamensual);
            $indicadorproceso->setCodigo($codigo);
            $indicadorproceso->setObjetivo($objetivo);
            $indicadorproceso->setVigente($vigente);
            $indicadorproceso->setEstado(1);

            $ficha != '' ? $ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($ficha): $ficha = null ;
            $unidad != '' ? $unidad = $this->getDoctrine()->getRepository(UnidadMedida::class)->find($unidad) : $unidad = null ;
            $responsable != '' ? $responsable = $this->getDoctrine()->getRepository(Usuario::class)->find($responsable) : $responsable = null;

            $indicadorproceso->setFkficha($ficha);
            $indicadorproceso->setFkunidad($unidad);
            $indicadorproceso->setFkresponsable($responsable);

            $errors = $validator->validate($indicadorproceso);
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
            $cx->merge($indicadorproceso);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Indicador de proceso actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/indicadorproceso_editar", methods={"POST"}, name="indicadorproceso_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $indicadorproceso = $this->getDoctrine()->getRepository(IndicadorProceso::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($indicadorproceso, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Indicador de proceso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/indicador_prev", methods={"POST"}, name="indicador_prev")
     */
    public function indicador_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimiento = $this->getDoctrine()->getRepository(SeguimientoIndicador::class)->findBy(array('fkindicador' => $id, 'estado' => '1'));
            
            if(sizeof($seguimiento) == 0){
                $info = array('response'=>"¿Desea dar de baja el indicador de proceso?", 'success' => true,
                'message' => 'Baja indicador de proceso.');
            }else{
                if(sizeof($seguimiento) > 0) $vr = " seguimiento de proceso";

                $info = array('response'=>"El indicador de proceso no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros del indicador de proceso.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/indicadorproceso_eliminar", methods={"POST"}, name="indicadorproceso_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $indicadorproceso = $this->getDoctrine()->getRepository(IndicadorProceso::class)->find($id);

            $indicadorproceso->setEstado(0);
            $cx->persist($indicadorproceso);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$indicadorproceso->getId().".",'success' => true,
                'message' => 'Indicador de proceso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}