<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\GerenciaAreaSector;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\IndicadorProceso;
use App\Entity\RiesgosOportunidades;
use App\Entity\ProcesoRelacionado;
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
use App\Entity\Rol
;use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class FichaProcesosController extends Controller
{
    /**
     * @Route("/fichaprocesos", name="fichaprocesos_listar")
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
        
        
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $areagerenciasector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->findBy(array('estado' => '1')); 
        return $this->render('fichaprocesos/index.html.twig', array('objects' => $FichaProcesos, 'tipo' => $areagerenciasector, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/fichaprocesos_insertar", methods={"POST"}, name="fichaprocesos_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $codproceso = $sx['codproceso'];
            $nombre = $sx['nombre'];
            $objetivo = $sx['objetivo'];
            $vigente = $sx['vigente'];
            $version = $sx['version'];
            $fechaemision = $sx['fechaemision'];
            $recursosnecesarios = $sx['recursosnecesarios'];
            $areagerenciasector = $sx['areagerenciasector'];
            $entradasrequeridas = $sx['entradasrequeridas'];
            $salidasesperadas = $sx['salidasesperadas'];

            $fichaprocesos = new FichaProcesos();
            $fichaprocesos->setCodproceso($codproceso);
            $fichaprocesos->setNombre($nombre);
            $fichaprocesos->setObjetivo($objetivo);
            $fichaprocesos->setVigente($vigente);
            $fichaprocesos->setVersion($version);
            $fichaprocesos->setFechaemision(new \DateTime($fechaemision));
            $fichaprocesos->setEntradasrequeridas($entradasrequeridas);
            $fichaprocesos->setSalidasesperadas($salidasesperadas);
            $fichaprocesos->setRecursosnecesarios($recursosnecesarios);
            $fichaprocesos->setEstado(1);

            $areagerenciasector !='' ?
                $areagerenciasector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($areagerenciasector) : $areagerenciasector = null;

            $fichaprocesos->setFkareagerenciasector($areagerenciasector);

            $errors = $validator->validate($fichaprocesos);
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



            $cx->persist($fichaprocesos);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$fichaprocesos->getId().".",'success' => true,
                'message' => 'Ficha de proceso registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/fichaprocesos_actualizar", methods={"POST"}, name="fichaprocesos_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $codproceso = $sx['codproceso'];
            $nombre = $sx['nombre'];
            $objetivo = $sx['objetivo'];
            $vigente = $sx['vigente'];
            $version = $sx['version'];
            $fechaemision = $sx['fechaemision'];
            $recursosnecesarios = $sx['recursosnecesarios'];
            $areagerenciasector = $sx['fkareagerenciasector'];
            $entradasrequeridas = $sx['entradasrequeridas'];
            $salidasesperadas = $sx['salidasesperadas'];

            $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($id);
            $fichaprocesos->setId($id);
            $fichaprocesos->setCodproceso($codproceso);
            $fichaprocesos->setNombre($nombre);
            $fichaprocesos->setObjetivo($objetivo);
            $fichaprocesos->setVigente($vigente);
            $fichaprocesos->setVersion($version);
            $fichaprocesos->setFechaemision(new \DateTime($fechaemision));
            $fichaprocesos->setEntradasrequeridas($entradasrequeridas);
            $fichaprocesos->setSalidasesperadas($salidasesperadas);
            $fichaprocesos->setRecursosnecesarios($recursosnecesarios);
            $fichaprocesos->setEstado(1);


            $areagerenciasector !='' ?
                $areagerenciasector = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($areagerenciasector) : $areagerenciasector = null;
            $fichaprocesos->setFkareagerenciasector($areagerenciasector);

            $errors = $validator->validate($fichaprocesos);
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


            $cx->merge($fichaprocesos);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Ficha de proceso actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/fichaprocesos_editar", methods={"POST"}, name="fichaprocesos_editar")
     */
    public function editar()
    {
        
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($id);

            $fpb = $fichaprocesos->getFechaemision();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $fichaprocesos->getId(),
                "codproceso" => $fichaprocesos->getCodproceso(),
                "nombre" => $fichaprocesos->getNombre(),
                "objetivo" => $fichaprocesos->getObjetivo(),
                "vigente" => $fichaprocesos->getVigente(),
                "version" => $fichaprocesos->getVersion(),
                "fechaemision" => $result,
                "entradasrequeridas" => $fichaprocesos->getEntradasrequeridas(),
                "salidasesperadas" => $fichaprocesos->getSalidasesperadas(),
                "recursosnecesarios" => $fichaprocesos->getRecursosnecesarios(),
                "fkareagerenciasector" => $fichaprocesos->getFkareagerenciasector()
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Ficha de proceso listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/fichaproc_prev", methods={"POST"}, name="fichaproc_prev")
     */
    public function fichaproc_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $indicador = $this->getDoctrine()->getRepository(IndicadorProceso::class)->findBy(array('fkficha' => $id, 'estado' => '1'));
            $crocm = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('fkficha' => $id, 'estado' => '1'));
            $proceso_rel = $this->getDoctrine()->getRepository(ProcesoRelacionado::class)->findBy(array('fkproceso' => $id, 'estado' => '1'));
            
            if(sizeof($indicador) == 0 && sizeof($crocm) == 0 && sizeof($proceso_rel) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja de la ficha de proceso.');
            }else{
                $vr = "";
                if(sizeof($indicador) > 0) $vr = "- Indicador\n";
                if(sizeof($crocm) > 0) $vr = $vr."- Riesgos y Oportunidades\n";
                if(sizeof($proceso_rel) > 0) $vr = $vr."- Proceso Relacionado\n";

                $info = array('response'=>"La ficha de proceso tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados a la ficha de proceso.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/fichaprocesos_eliminar", methods={"POST"}, name="fichaprocesos_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($id);

            $indicador = $this->getDoctrine()->getRepository(IndicadorProceso::class)->findBy(array('fkficha' => $id, 'estado' => '1'));
            $indicadores = (array) $indicador;
            if(isset($indicadores[0])){
                foreach ($indicadores as $indr) {
                    $indrdt = (object) $indr;
                    $indrdt->setEstado(0);
                    $cx->persist($indrdt);
                    $cx->flush();
                }
            }
            $riesgo = $this->getDoctrine()->getRepository(RiesgosOportunidades::class)->findBy(array('fkficha' => $id, 'estado' => '1'));
            $riesgos = (array) $riesgo;
            if(isset($riesgos[0])){
                foreach ($riesgos as $cro) {
                    $crodt = (object) $cro;
                    $crodt->setEstado(0);
                    $cx->persist($crodt);
                    $cx->flush();
                }
            }
            $proceso_rel = $this->getDoctrine()->getRepository(ProcesoRelacionado::class)->findBy(array('fkproceso' => $id, 'estado' => '1'));
            $procesos_rel = (array) $proceso_rel;
            if(isset($procesos_rel[0])){
                foreach ($procesos_rel as $proc) {
                    $procdt = (object) $proc;
                    $procdt->setEstado(0);
                    $cx->persist($procdt);
                    $cx->flush();
                }
            }

            $fichaprocesos->setEstado(0);
            $cx->persist($fichaprocesos);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$fichaprocesos->getId().".",'success' => true,
                'message' => 'Ficha de proceso dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}