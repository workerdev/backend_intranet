<?php

namespace App\Controller;

use App\Entity\Auditoria;
use App\Entity\TipoHallazgo;
use App\Entity\Impacto;
use App\Entity\Probabilidad;
use App\Entity\Hallazgo;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Accion;
use App\Entity\AccionSeguimiento;
use App\Entity\AccionReprograma;
use App\Entity\AccionEficacia;
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


class HallazgoController extends Controller
{
    /**
     * @Route("/hallazgo", name="hallazgo_listar")
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
        
        $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['estado' => '1'], ['fecharegistro' => 'DESC']);
        $tipo = $this->getDoctrine()->getRepository(TipoHallazgo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $impacto = $this->getDoctrine()->getRepository(Impacto::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(['estado' => '1'], ['codigo' => 'ASC']);

        return $this->render('hallazgo/index.html.twig', array('objects' => $hallazgo, 'tipo' => $tipo, 'auditoria' => $auditoria, 'impacto' => $impacto, 'probabilidad' => $probabilidad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/hallazgo_insertar", methods={"POST"}, name="hallazgo_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $ordinal = $sx['ordinal'];
            $titulo = $sx['titulo'];
            $descripcion = $sx['descripcion'];
            $evidencia = $sx['evidencia'];
            $documento = $sx['documento'];
            $puntoiso = $sx['puntoiso'];
            $analisiscausaraiz = $sx['analisiscausaraiz'];
            $recomendaciones = $sx['recomendaciones'];
            $cargoauditado = $sx['cargoauditado'];
            $nombreauditado = $sx['nombreauditado'];
            $responsable = $sx['responsable'];
            $fecharegistro = $sx['fecharegistro'];
            
            $auditoria = $sx['auditoria'];
            $tipo = $sx['tipo'];
            $impacto = $sx['impacto'];
            $probabilidad = $sx['probabilidad'];

            $hallazgo = new Hallazgo();
            if($ordinal != '' && is_numeric($ordinal))$hallazgo->setOrdinal($ordinal);
            $hallazgo->setTitulo($titulo);
            $hallazgo->setDescripcion($descripcion);
            $hallazgo->setEvidencia($evidencia);
            $hallazgo->setDocumento($documento);
            $hallazgo->setPuntoiso($puntoiso);
            $hallazgo->setAnalisiscausaraiz($analisiscausaraiz);
            $hallazgo->setRecomendaciones($recomendaciones);
            $hallazgo->setCargoauditado($cargoauditado);
            $hallazgo->setNombreauditado($nombreauditado);
            $hallazgo->setResponsable($responsable);
            $hallazgo->setFecharegistro(new \DateTime($fecharegistro));
            $hallazgo->setEstado(1);

            $auditoria != '' ? $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria):$auditoria = null;
            $hallazgo->setFkauditoria($auditoria);
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoHallazgo::class)->find($tipo): $tipo=null;
            $hallazgo->setFktipo($tipo);
            $impacto != '' ? $impacto = $this->getDoctrine()->getRepository(Impacto::class)->find($impacto) : $impacto= null;
            $hallazgo->setFkimpacto($impacto);
            $probabilidad  != ''? $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($probabilidad): $probabilidad=null;
            $hallazgo->setFkprobabilidad($probabilidad);
            $errors = $validator->validate($hallazgo);
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
            $cx->persist($hallazgo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$hallazgo->getId().".",'success' => true,
                'message' => 'Hallazgo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/hallazgo_actualizar", methods={"POST"}, name="hallazgo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $ordinal = $sx['ordinal'];
            $titulo = $sx['titulo'];
            $descripcion = $sx['descripcion'];
            $evidencia = $sx['evidencia'];
            $documento = $sx['documento'];
            $puntoiso = $sx['puntoiso'];
            $analisiscausaraiz = $sx['analisiscausaraiz'];
            $recomendaciones = $sx['recomendaciones'];
            $cargoauditado = $sx['cargoauditado'];
            $nombreauditado = $sx['nombreauditado'];
            $responsable = $sx['responsable'];
            $fecharegistro = $sx['fecharegistro'];
            
            $auditoria = $sx['auditoria'];
            $tipo = $sx['tipo'];
            $impacto = $sx['impacto'];
            $probabilidad = $sx['probabilidad'];

            $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($id);
            $hallazgo->setId($id);
            if($ordinal != '' && is_numeric($ordinal))$hallazgo->setOrdinal($ordinal);
            $hallazgo->setTitulo($titulo);
            $hallazgo->setDescripcion($descripcion);
            $hallazgo->setEvidencia($evidencia);
            $hallazgo->setDocumento($documento);
            $hallazgo->setPuntoiso($puntoiso);
            $hallazgo->setAnalisiscausaraiz($analisiscausaraiz);
            $hallazgo->setRecomendaciones($recomendaciones);
            $hallazgo->setCargoauditado($cargoauditado);
            $hallazgo->setNombreauditado($nombreauditado);
            $hallazgo->setResponsable($responsable);
            $hallazgo->setFecharegistro(new \DateTime($fecharegistro));
            $hallazgo->setEstado(1);

            $auditoria != '' ? $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($auditoria):$auditoria = null;
            $hallazgo->setFkauditoria($auditoria);
            $tipo != '' ? $tipo = $this->getDoctrine()->getRepository(TipoHallazgo::class)->find($tipo): $tipo=null;
            $hallazgo->setFktipo($tipo);
            $impacto != '' ? $impacto = $this->getDoctrine()->getRepository(Impacto::class)->find($impacto) : $impacto= null;
            $hallazgo->setFkimpacto($impacto);
            $probabilidad  != ''? $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($probabilidad): $probabilidad=null;
            $hallazgo->setFkprobabilidad($probabilidad);
            $errors = $validator->validate($hallazgo);
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

            $cx->merge($hallazgo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Hallazgo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/hallazgo_editar", methods={"POST"}, name="hallazgo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($id);
            $fecreg = $hallazgo->getFecharegistro();
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
            
            $sendinf = [
                "id" => $hallazgo->getId(),
                "fkauditoria" => $hallazgo->getFkauditoria(),
                "fktipo" => $hallazgo->getFktipo(),
                "ordinal" => $hallazgo->getOrdinal(),
                "titulo" => $hallazgo->getTitulo(),
                "descripcion" => $hallazgo->getDescripcion(),
                "evidencia" => $hallazgo->getEvidencia(),
                "documento" => $hallazgo->getDocumento(),
                "puntoiso" => $hallazgo->getPuntoiso(),
                "fkimpacto" => $hallazgo->getFkimpacto(),
                "fkprobabilidad" => $hallazgo->getFkprobabilidad(),
                "analisiscausaraiz" => $hallazgo->getAnalisiscausaraiz(),
                "recomendaciones" => $hallazgo->getRecomendaciones(),
                "cargoauditado" => $hallazgo->getCargoauditado(),
                "nombreauditado" => $hallazgo->getNombreauditado(),
                "responsable" => $hallazgo->getResponsable(),
                "fecharegistro" => $rsfcr
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Hallazgo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/hallazgo_prev", methods={"POST"}, name="hallazgo_prev")
     */
    public function hallazgo_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('fkhallazgo' => $id, 'estado' => '1'));
            
            if(sizeof($accion) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja del hallazgo.');
            }else{
                if(sizeof($accion) > 0) $vr = " acción";

                $info = array('response'=>"El hallazgo tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al hallazgo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/hallazgo_eliminar", methods={"POST"}, name="hallazgo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($id);

            $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('fkhallazgo' => $id, 'estado' => '1'));
            $acciones = (array) $accion;

            if(isset($acciones[0])){
                foreach ($accion as $acn) {
                    $acndt = (object) $acn;
                    $seguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->findBy(array('fkaccion' => $acndt->getId(), 'estado' => '1'));
                    $seguimientos = (array) $seguimiento;

                    if(isset($seguimientos[0])){
                        foreach ($seguimiento as $seg) {
                            $segdt = (object) $seg;
                            $segdt->setEstado(0);
                            $cx->persist($segdt);
                            $cx->flush();
                        }
                    }
                    $reprograma = $this->getDoctrine()->getRepository(AccionReprograma::class)->findBy(array('fkaccion' => $acndt->getId(), 'estado' => '1'));
                    $reprogramas = (array) $reprograma;
                    if(isset($reprogramas[0])){
                        foreach ($reprograma as $rep) {
                            $repdt = (object) $rep;
                            $repdt->setEstado(0);
                            $cx->persist($repdt);
                            $cx->flush();
                        }
                    }
                    $eficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->findBy(array('fkaccion' => $acndt->getId(), 'estado' => '1'));
                    $eficacias = (array) $eficacia;
                    if(isset($eficacias[0])){
                        foreach ($eficacia as $efc) {
                            $efcdt = (object) $efc;
                            $efcdt->setEstado(0);
                            $cx->persist($efcdt);
                            $cx->flush();
                        }
                    }
                    $acndt->setEstado(0);
                    $cx->persist($acndt);
                    $cx->flush();
                }
            }


            $hallazgo->setEstado(0);
            $cx->persist($hallazgo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$hallazgo->getId().".",'success' => true,
                'message' => 'Hallazgo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/hallazgo_listall", methods={"POST"}, name="hallazgo_listall")
     */
    public function listall()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(array('estado' => '1', 'fkauditoria' => $id), array('id' => 'DESC'));

            $datahlg = array();
            foreach ($hallazgos as $hlg) {
                $hallazgo = (object) $hlg;
                $fecreg = $hallazgo->getFecharegistro();
                if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                
                $info = [
                    "id" => $hallazgo->getId(),
                    "fkauditoria" => $hallazgo->getFkauditoria(),
                    "fktipo" => $hallazgo->getFktipo(),
                    "ordinal" => $hallazgo->getOrdinal(),
                    "titulo" => $hallazgo->getTitulo(),
                    "descripcion" => $hallazgo->getDescripcion(),
                    "evidencia" => $hallazgo->getEvidencia(),
                    "documento" => $hallazgo->getDocumento(),
                    "puntoiso" => $hallazgo->getPuntoiso(),
                    "fkimpacto" => $hallazgo->getFkimpacto(),
                    "fkprobabilidad" => $hallazgo->getFkprobabilidad(),
                    "analisiscausaraiz" => $hallazgo->getAnalisiscausaraiz(),
                    "recomendaciones" => $hallazgo->getRecomendaciones(),
                    "cargoauditado" => $hallazgo->getCargoauditado(),
                    "nombreauditado" => $hallazgo->getNombreauditado(),
                    "responsable" => $hallazgo->getResponsable(),
                    "fecharegistro" => $rsfcr
                ];
                $datahlg[] = $info;
            }       

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($datahlg, 'json');
            $resultado = array(
                'response'=>$json,'success' => true,
                'message' => 'Hallazgos listados correctamente.'
            );
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/hallazgo_filteraud", methods={"POST"}, name="hallazgo_filteraud")
     */
    public function filter_aud()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            if($id == 0) $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['estado' => '1'], ['fecharegistro' => 'DESC']);
            else $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['fkauditoria' => $id, 'estado' => '1'], ['fecharegistro' => 'DESC']);

            /*$serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($hallazgos, 'json');*/

            $datahlg = array();
            foreach ($hallazgos as $hlg) {
                $hallazgo = (object) $hlg;
                $fecreg = $hallazgo->getFecharegistro();
                if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                
                $info = [
                    "id" => $hallazgo->getId(),
                    "fkauditoria" => $hallazgo->getFkauditoria(),
                    "fktipo" => $hallazgo->getFktipo(),
                    "ordinal" => $hallazgo->getOrdinal(),
                    "titulo" => $hallazgo->getTitulo(),
                    "descripcion" => $hallazgo->getDescripcion(),
                    "evidencia" => $hallazgo->getEvidencia(),
                    "documento" => $hallazgo->getDocumento(),
                    "puntoiso" => $hallazgo->getPuntoiso(),
                    "fkimpacto" => $hallazgo->getFkimpacto(),
                    "fkprobabilidad" => $hallazgo->getFkprobabilidad(),
                    "analisiscausaraiz" => $hallazgo->getAnalisiscausaraiz(),
                    "recomendaciones" => $hallazgo->getRecomendaciones(),
                    "cargoauditado" => $hallazgo->getCargoauditado(),
                    "nombreauditado" => $hallazgo->getNombreauditado(),
                    "responsable" => $hallazgo->getResponsable(),
                    "fecharegistro" => $rsfcr
                ];
                $datahlg[] = $info;
            }       

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));  
            $json = $serializer->serialize($datahlg, 'json');

            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Hallazgos listados correctamente.');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}