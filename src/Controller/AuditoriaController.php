<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\GerenciaAreaSector;
use App\Entity\TipoAuditoria;
use App\Entity\Auditoria;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\AuditoriaEquipo;
use App\Entity\Fortaleza;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\AccionSeguimiento;
use App\Entity\AccionReprograma;
use App\Entity\AccionEficacia;
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

class AuditoriaController extends AbstractController
{   
    /**
     * @Route("/auditoria", name="auditoria")
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
        $area = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->findBy(array('estado' => '1'));
        $tipoauditoria = $this->getDoctrine()->getRepository(TipoAuditoria::class)->findBy(array('estado' => '1'));
        $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(array('estado' => '1'));
        return $this->render('auditoria/index.html.twig', array('objects' => $auditoria, 'area' => $area, 'tipo' => $tipoauditoria, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }


    /**
     * @Route("/auditoria_insertar", methods={"POST"}, name="auditoria_insertar")
     */
    public function insertar(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            
            $codigo = $sx['codigo'];
            $area = $sx['area'];
            $tipo = $sx['tipo'];
            $fechaprogramada = $sx['fechaprogramada'];
            $duracionestimada = $sx['duracionestimada'];
            $lugar = $sx['lugar'];
            $alcance = $sx['alcance'];
            $objetivos = $sx['objetivos'];
            $fechahorainicio = $sx['fechahorainicio'];
            $fechahorafin = $sx['fechahorafin'];
            $conclusiones = $sx['conclusiones'];
            $responsable = $sx['responsable'];
            $fecharegistro = $sx['fecharegistro'];                
            
            $auditoria = new Auditoria();
            $auditoria->setCodigo($codigo);
            $auditoria->setFechaprogramada(new \DateTime($fechaprogramada));
            if ($duracionestimada != '' && is_numeric($duracionestimada) ) $auditoria->setDuracionestimada($duracionestimada);
            $auditoria->setLugar($lugar);
            $auditoria->setAlcance($alcance);
            $auditoria->setObjetivos($objetivos);
            $auditoria->setFechahorainicio(new \DateTime($fechahorainicio));
            $auditoria->setFechahorafin(new \DateTime($fechahorafin));
            $auditoria->setConclusiones($conclusiones);
            $auditoria->setResponsable($responsable);
            $auditoria->setFecharegistro(new \DateTime($fecharegistro));
            $auditoria->setEstado(1);
            $area != '' ? $area = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($area) :$area=null;
            $auditoria->setFkarea($area);
            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoAuditoria::class)->find($tipo): $tipo=null;
            $auditoria->setFktipo($tipo);
            $errors = $validator->validate($auditoria);
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
            $cx->persist($auditoria);
            $cx->flush();
            $resultado = array('response'=>"El ID registrado es: ".$auditoria->getId().".",   
            'success' => true,
            'message' => 'Auditoría registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    
    /**
     * @Route("/auditoria_actualizar", methods={"POST"}, name="auditoria_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $codigo = $sx['codigo'];
            $area = $sx['area'];
            $tipo = $sx['tipo'];
            $fechaprogramada = $sx['fechaprogramada'];
            $duracionestimada = $sx['duracionestimada'];
            $lugar = $sx['lugar'];
            $alcance = $sx['alcance'];
            $objetivos = $sx['objetivos'];
            $fechahorainicio = $sx['fechahorainicio'];
            $fechahorafin = $sx['fechahorafin'];
            $conclusiones = $sx['conclusiones'];
            $responsable = $sx['responsable'];
            $fecharegistro = $sx['fecharegistro'];

            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);
            $auditoria->setId($id);
            $auditoria->setCodigo($codigo);
            $area != '' ? $area = $this->getDoctrine()->getRepository(GerenciaAreaSector::class)->find($area) :$area=null;
            $auditoria->setFkarea($area);
            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoAuditoria::class)->find($tipo): $tipo=null;
            $auditoria->setFktipo($tipo);


            $auditoria->setFechaprogramada(new \DateTime($fechaprogramada));
            $auditoria->setDuracionestimada($duracionestimada);
            $auditoria->setLugar($lugar);
            $auditoria->setAlcance($alcance);
            $auditoria->setObjetivos($objetivos);
            $auditoria->setFechahorainicio(new \DateTime($fechahorainicio));
            $auditoria->setFechahorafin(new \DateTime($fechahorafin));
            $auditoria->setConclusiones($conclusiones);
            $auditoria->setResponsable($responsable);
            $auditoria->setFecharegistro(new \DateTime($fecharegistro));
            $auditoria->setEstado(1);
            $errors = $validator->validate($auditoria);
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
            $cx->merge($auditoria);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Auditoría actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/auditoria_editar", methods={"POST"}, name="auditoria_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id']; //dd($sx);
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);
            $fecpro = $auditoria->getFechaprogramada();
            $rsfcp = $fecpro->format('Y-m-d H:s');
            $fecini = $auditoria->getFechahorainicio();
            $rsfci = $fecini->format('Y-m-d H:s');
            $fecfin = $auditoria->getFechahorafin();
            $fecreg = $auditoria->getFecharegistro();
            if($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:s'); else $rsfcf = $fecfin;
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');  else $rsfcr = $fecreg;
            
            $sendinf = [
                "id" => $auditoria->getId(),
                "codigo" => $auditoria->getCodigo(),
                "fkarea" => $auditoria->getFkarea(),
                "fktipo" => $auditoria->getFktipo(),
                "fechaprogramada" => $rsfcp,
                "duracionestimada" => $auditoria->getDuracionestimada(),
                "lugar" => $auditoria->getLugar(),
                "alcance" => $auditoria->getAlcance(),
                "objetivos" => $auditoria->getObjetivos(),
                "fechahorainicio" => $rsfci,
                "fechahorafin" => $rsfcf,
                "conclusiones" => $auditoria->getConclusiones(),
                "responsable" => $auditoria->getResponsable(),
                "fecharegistro" => $rsfcr
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Auditoría listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/auditoria_prev", methods={"POST"}, name="auditoria_prev")
     */
    public function auditoria_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(array('fkauditoria' => $id, 'estado' => '1'));
            $fortaleza = $this->getDoctrine()->getRepository(Fortaleza::class)->findBy(array('fkauditoria' => $id, 'estado' => '1'));
            $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(array('fkauditoria' => $id, 'estado' => '1'));
            
            if(sizeof($equipo) == 0 && sizeof($fortaleza) == 0 && sizeof($hallazgo) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja de la auditoría.');
            }else{
                if(sizeof($equipo) > 0) $vr = "- Equipo de auditoría\n";
                if(sizeof($fortaleza) > 0) $vr = $vr."- Fortaleza\n";
                if(sizeof($hallazgo) > 0) $vr = $vr."- Hallazgo\n";

                $info = array('response'=>"La auditoría tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados a la auditoría.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/auditoria_eliminar", methods={"POST"}, name="auditoria_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);

            $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(array('fkauditoria' => $id, 'estado' => '1'));
            $equipos = (array) $equipo;
            if(isset($equipos[0])){
                foreach ($equipo as $eq) {
                    $eqdt = (object) $eq;
                    $eqdt->setEstado(0);
                    $cx->persist($eqdt);
                    $cx->flush();
                }
            }

            $fortaleza = $this->getDoctrine()->getRepository(Fortaleza::class)->findBy(array('fkauditoria' => $id, 'estado' => '1'));
            $fortalezas = (array) $fortaleza;
            if(isset($fortalezas[0])){
                foreach ($fortaleza as $fort) {
                    $fortdt = (object) $fort;
                    $fortdt->setEstado(0);
                    $cx->persist($fortdt);
                    $cx->flush();
                }
            }

            $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(array('fkauditoria' => $id, 'estado' => '1'));
            $hallazgos = (array) $hallazgo;
            if(isset($hallazgos[0])){
                foreach ($hallazgo as $hlg) {
                    $hlgdt = (object) $hlg;
                    $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('fkhallazgo' => $hlgdt->getId(), 'estado' => '1'));
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
                    $hlgdt->setEstado(0);
                    $cx->persist($hlgdt);
                    $cx->flush();
                }
            }
            $auditoria->setEstado(0);
            $cx->persist($auditoria);
            $cx->flush();
            
            $resultado = array('response'=>"El ID modificado es: ".$auditoria->getId().".",'success' => true,
            'message' => 'Auditoría dado de baja correctamente.');
            
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}