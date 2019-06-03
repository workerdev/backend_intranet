<?php

namespace App\Controller;

use App\Entity\Hallazgo;
use App\Entity\AccionSeguimiento;
use App\Entity\Accion;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\AccionReprograma;
use App\Entity\AccionEficacia;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
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


class AccionController extends Controller
{
    /**
     * @Route("/accion", name="accion_listar")
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
        
        $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(array('estado' => '1'));
        $accion = $this->getDoctrine()->getRepository(Accion::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('accion/index.html.twig', array('objects' => $accion, 'hallazgo' => $hallazgo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/accion_insertar", methods={"POST"}, name="accion_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $ordinal = $sx['ordinal'];
            $descripcion = $sx['descripcion'];
            $fechaimplementacion = $sx['fechaimplementacion'];
            $responsableimplementacion = $sx['responsableimplementacion'];
            $estadoaccion = $sx['estadoaccion'];
            $responsableregistro = $sx['responsableregistro'];
            $fecharegistro = $sx['fecharegistro'];
            
            $hallazgo = $sx['hallazgo'];

            $accion = new Accion();
            if($ordinal != '' && is_numeric($ordinal))$accion->setOrdinal($ordinal);
            $accion->setDescripcion($descripcion);
            $accion->setFechaimplementacion(new \DateTime($fechaimplementacion));
            $accion->setResponsableimplementacion($responsableimplementacion);
            $accion->setEstadoaccion($estadoaccion);
            $accion->setResponsableregistro($responsableregistro);
            $accion->setFecharegistro(new \DateTime($fecharegistro));
            $accion->setEstado(1);

            $hallazgo != '' ? $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($hallazgo): $hallazgo =null;
            $accion->setFkhallazgo($hallazgo);
            $errors = $validator->validate($accion);
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
            $cx->persist($accion);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$accion->getId().".",'success' => true,
                'message' => 'Acción registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accion_actualizar", methods={"POST"}, name="accion_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $ordinal = $sx['ordinal'];
            $descripcion = $sx['descripcion'];
            $fechaimplementacion = $sx['fechaimplementacion'];
            $responsableimplementacion = $sx['responsableimplementacion'];
            $estadoaccion = $sx['estadoaccion'];
            $responsableregistro = $sx['responsableregistro'];
            $fecharegistro = $sx['fecharegistro'];
            
            $hallazgo = $sx['hallazgo'];

            $accion = $this->getDoctrine()->getRepository(Accion::class)->find($id);
            $accion->setId($id);
            if($ordinal != '' && is_numeric($ordinal))$accion->setOrdinal($ordinal);
            $accion->setDescripcion($descripcion);
            $accion->setFechaimplementacion(new \DateTime($fechaimplementacion));
            $accion->setResponsableimplementacion($responsableimplementacion);
            $accion->setEstadoaccion($estadoaccion);
            $accion->setResponsableregistro($responsableregistro);
            $accion->setFecharegistro(new \DateTime($fecharegistro));
            $accion->setEstado(1);

            $hallazgo != '' ? $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($hallazgo): $hallazgo =null;
            $accion->setFkhallazgo($hallazgo);
            $errors = $validator->validate($accion);
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
            $cx->merge($accion);
            $cx->flush();

            if($estadoaccion == 'Implementada'){
                $acciones = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->findBy(array('fkaccion' => $accion->getId()));
                if(count($acciones) > 0){
                    foreach ($acciones as $accionseg) {
                        $accupd = (object) $accionseg;
                        $accnseg = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->find($accupd->getId());
                        $accnseg->setEstadoseguimiento($estadoaccion);

                        $cx->persist($accnseg);
                        $cx->flush();
                    }
                }
            }

            $resultado = array('success' => true,
                    'message' => 'Acción actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accion_editar", methods={"POST"}, name="accion_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $accion = $this->getDoctrine()->getRepository(Accion::class)->find($id);
            $fecimp = $accion->getFechaimplementacion();
            $rsfci = $fecimp->format('Y-m-d');
            $fecreg = $accion->getFecharegistro();
            $rsfcr = $fecreg->format('Y-m-d');
            
            $sendinf = [
                "id" => $accion->getId(),
                "fkhallazgo" => $accion->getFkhallazgo(),
                "ordinal" => $accion->getOrdinal(),
                "descripcion" => $accion->getDescripcion(),
                "fechaimplementacion" => $rsfci,
                "responsableimplementacion" => $accion->getResponsableimplementacion(),
                "estadoaccion" => $accion->getEstadoaccion(),
                "responsableregistro" => $accion->getResponsableregistro(),
                "fecharegistro" => $rsfcr
            ];

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Acción listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/accion_prev", methods={"POST"}, name="accion_prev")
     */
    public function accion_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $seguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->findBy(array('fkaccion' => $id, 'estado' => '1'));
            $reprograma = $this->getDoctrine()->getRepository(AccionReprograma::class)->findBy(array('fkaccion' => $id, 'estado' => '1'));
            $eficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->findBy(array('fkaccion' => $id, 'estado' => '1'));
            
            if(sizeof($seguimiento) == 0 && sizeof($reprograma) == 0 && sizeof($eficacia) == 0){
                $info = array('response'=>"", 'success' => true,
                'message' => 'Baja de la acción.');
            }else{ $vr ="";
                if(sizeof($seguimiento) > 0) $vr = "- Seguimiento\n";
                if(sizeof($reprograma) > 0) $vr = $vr."- Reprograma\n";
                if(sizeof($eficacia) > 0) $vr = $vr."- Eficacia\n";

                $info = array('response'=>"La acción tiene relación con los sgtes. datos:\n".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados a la acción.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accion_eliminar", methods={"POST"}, name="accion_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $accion = $this->getDoctrine()->getRepository(Accion::class)->find($id);

            $seguimiento = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->findBy(array('fkaccion' => $accion->getId(), 'estado' => '1'));
            $seguimientos = (array) $seguimiento;
            if(isset($seguimientos[0])){
                foreach ($seguimiento as $seg) {
                    $segdt = (object) $seg;
                    $segdt->setEstado(0);
                    $cx->persist($segdt);
                    $cx->flush();
                }
            }

            $reprograma = $this->getDoctrine()->getRepository(AccionReprograma::class)->findBy(array('fkaccion' => $accion->getId(), 'estado' => '1'));
            $reprogramas = (array) $reprograma;
            if(isset($reprogramas[0])){
                foreach ($reprograma as $rep) {
                    $repdt = (object) $rep;
                    $repdt->setEstado(0);
                    $cx->persist($repdt);
                    $cx->flush();
                }
            }
            
            $eficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->findBy(array('fkaccion' => $accion->getId(), 'estado' => '1'));
            $eficacias = (array) $eficacia;
            if(isset($eficacias[0])){
                foreach ($eficacia as $efc) {
                    $efcdt = (object) $efc;
                    $efcdt->setEstado(0);
                    $cx->persist($efcdt);
                    $cx->flush();
                }
            }

            $accion->setEstado(0);
            $cx->persist($accion);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$accion->getId().".",'success' => true,
                'message' => 'Acción dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}