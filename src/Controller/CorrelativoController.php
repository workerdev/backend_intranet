<?php

namespace App\Controller;

use App\Entity\Personal;
use App\Entity\Correlativo;
use App\Entity\ControlCorrelativo;
use App\Entity\EstadoCorrelativo;
use App\Entity\TipoNota;
use App\Entity\Unidad;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Form\CorrelativoType;
use PhpParser\Node\VarLikeIdentifier;
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
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;


class CorrelativoController extends Controller
{
    /**
     * @Route("/correlativo", methods={"GET", "POST"}, name="correlativo_listar")
     */
    public function index(Correlativo $Correlativo = null, Request $request)
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
        
        $form = $this->createForm(CorrelativoType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosCorrelativo = $form->getData();
            
            if($datosCorrelativo->getId() == 0 ){
                $Correlativo = new Correlativo();
            }else{
                $Correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($datosCorrelativo->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['url']->getData())){
                if($Correlativo->getUrl() == null){
                    $Correlativo->setUrl("N/A");
                }
            }else{
                $fileu = $form['url']->getData();
                $fileNameu = $fileu->getClientOriginalName();             
                $fileu->move($this->getParameter('Directorio_Correlativo'), $fileNameu);
                $rutau = $this->getParameter('Directorio_Correlativo').'\\'.$fileNameu;
                $Correlativo->setUrl($rutau);
            }

            if(empty($form['urleditable']->getData())){
                if($Correlativo->getUrleditable() == null){
                    $Correlativo->setUrl("N/A");
                }
            }else{
                $fileue = $form['urleditable']->getData();
                $fileNameue = $fileue->getClientOriginalName();                
                $fileue->move($this->getParameter('Directorio_Correlativo'), $fileNameue);
                $rutaue = $this->getParameter('Directorio_Correlativo').'\\'.$fileNameue;
                $Correlativo->setUrleditable($rutaue);
            }

            if(empty($form['urlorigen']->getData())){
                if($Correlativo->getUrlorigen() == null){
                    $Correlativo->setUrl("N/A");
                }
            }else{
                $fileuo = $form['urlorigen']->getData();
                $fileNameuo = $fileuo->getClientOriginalName();                
                $fileuo->move($this->getParameter('Directorio_Correlativo'), $fileNameuo);
                $rutauo = $this->getParameter('Directorio_Correlativo').'\\'.$fileNameuo;
                $Correlativo->setUrlorigen($rutauo);
            }
            $Correlativo->setNumcorrelativo($datosCorrelativo->getNumcorrelativo());
            $Correlativo->setFechareg($datosCorrelativo->getFechareg());
            $Correlativo->setRedactor($datosCorrelativo->getRedactor());
            $Correlativo->setDestinatario($datosCorrelativo->getDestinatario());
            $Correlativo->setReferencia($datosCorrelativo->getReferencia());
            $Correlativo->setEquipo($datosCorrelativo->getEquipo());
            $Correlativo->setIp($datosCorrelativo->getIp());
            $Correlativo->setAntecedente($datosCorrelativo->getAntecedente());
            $Correlativo->setItem($datosCorrelativo->getItem());
            $Correlativo->setEntrega($datosCorrelativo->getEntrega());
            
            $solicitante = new Personal();
            $solicitante = $datosCorrelativo->getFksolicitante();
            $Correlativo->setFksolicitante($solicitante);

            $correlativo = new ControlCorrelativo();
            $correlativo = $datosCorrelativo->getFkcorrelativo();
            $Correlativo->setFkcorrelativo($correlativo);

            $tiponota = new TipoNota();
            $tiponota = $datosCorrelativo->getFktiponota();
            $Correlativo->setFktiponota($tiponota);

            $estado = new EstadoCorrelativo();
            $estado = $datosCorrelativo->getFkestado();
            $Correlativo->setFkestado($estado);

            $unidad = new Unidad();
            $unidad = $datosCorrelativo->getFkunidad();
            $Correlativo->setFkunidad($unidad);
            $Correlativo->setEstado(1);

            if($datosCorrelativo->getId() == 0){
                $cx->persist($Correlativo);
                $cx->flush();
                unset($Correlativo);
                unset($datosCorrelativo);
            }else{
                $cx->merge($Correlativo);
                $cx->flush();
                unset($Correlativo);
                unset($datosCorrelativo);
            }
            $redireccion = new RedirectResponse('/correlativo');
            return $redireccion;
        }
        
        $solicitante = $this->getDoctrine()->getRepository(Personal::class)->findBy(array('estado' => '1'));
        $control = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(array('estado' => '1'));
        $tipo = $this->getDoctrine()->getRepository(TipoNota::class)->findBy(array('estado' => '1'));
        $estado = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->findBy(array('estado' => '1'));
        $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('estado' => '1'));
        $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadojefe' => $s_user['nombre'].' '.$s_user['apellido'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('aprobadogerente' => $s_user['nombre'].' '.$s_user['apellido'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('correlativo/index.html.twig', array('objects' => $correlativo, 'solicitante' => $solicitante, 'correlativo' => $control, 'tipo' => $tipo, 'estado' => $estado, 'unidad' => $unidad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'form' => $form->createView(), 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/correlativo_insertar", methods={"POST"}, name="correlativo_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $numcorrelativo = $sx['numcorrelativo'];
            $fechareg = $sx['fechareg'];
            $solicitante = $sx['solicitante'];
            $redactor = $sx['redactor'];
            $destinatario = $sx['destinatario'];
            $referencia = $sx['referencia'];
            $ctrlcorrelativo = $sx['correlativo'];
            $tiponota = $sx['tiponota'];
            $equipo = $sx['equipo'];
            $ip = $sx['ip'];
            $url = $sx['url'];
            $antecedente = $sx['antecedente'];
            $estado = $sx['estado'];
            $item = $sx['item'];
            $urleditable = $sx['urleditable'];
            $entrega = $sx['entrega'];
            $unidad = $sx['unidad'];
            $urlorigen = $sx['urlorigen'];

            $solicitante != '' ? $solicitante = $this->getDoctrine()->getRepository(Personal::class)->find($solicitante) : $solicitante=null;
            $ctrlcorrelativo != '' ? $ctrlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($ctrlcorrelativo) : $ctrlcorrelativo=null;
            $tiponota != '' ? $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find($tiponota) : $tiponota=null;
            $estado != '' ? $estado = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->find($estado) : $estado=null;
            $unidad != '' ? $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($unidad) : $unidad=null;

            $correlativo = new Correlativo();
            $correlativo->setNumcorrelativo($numcorrelativo);
            $correlativo->setFechareg(new \DateTime($fechareg));
            $correlativo->setFKsolicitante($solicitante);
            $correlativo->setRedactor($redactor);
            $correlativo->setDestinatario($destinatario);
            $correlativo->setReferencia($referencia);
            $correlativo->setFkcorrelativo($ctrlcorrelativo);
            $correlativo->setFktiponota($tiponota);
            $correlativo->setEquipo($equipo);
            $correlativo->setIp($ip);
            $correlativo->setUrl($url);
            $correlativo->setAntecedente($antecedente);
            $correlativo->setFkestado($estado);
            $correlativo->setItem($item);
            $correlativo->setUrleditable($urleditable);
            $correlativo->setEntrega(new \DateTime($entrega));
            $correlativo->setFkunidad($unidad);
            $correlativo->setUrlorigen($urlorigen);
            $correlativo->setEstado(1);
            
            $errors = $validator->validate($correlativo);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->persist($correlativo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$correlativo->getId().".",'success' => true,
                'message' => 'Correlativo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/correlativo_actualizar", methods={"POST"}, name="correlativo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $numcorrelativo = $sx['numcorrelativo'];
            $fechareg = $sx['fechareg'];
            $solicitante = $sx['solicitante'];
            $redactor = $sx['redactor'];
            $destinatario = $sx['destinatario'];
            $referencia = $sx['referencia'];
            $ctrlcorrelativo = $sx['correlativo'];
            $tiponota = $sx['tiponota'];
            $equipo = $sx['equipo'];
            $ip = $sx['ip'];
            $url = $sx['url'];
            $antecedente = $sx['antecedente'];
            $estado = $sx['estado'];
            $item = $sx['item'];
            $urleditable = $sx['urleditable'];
            $entrega = $sx['entrega'];
            $unidad = $sx['unidad'];
            $urlorigen = $sx['urlorigen'];

            $solicitante != '' ? $solicitante = $this->getDoctrine()->getRepository(Personal::class)->find($solicitante) : $solicitante=null;
            $ctrlcorrelativo != '' ? $ctrlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($ctrlcorrelativo) : $ctrlcorrelativo=null;
            $tiponota != '' ? $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find($tiponota) : $tiponota=null;
            $estado != '' ? $estado = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->find($estado) : $estado=null;
            $unidad != '' ? $unidad = $this->getDoctrine()->getRepository(Unidad::class)->find($unidad) : $unidad=null;

            $correlativo = new Correlativo();
            $correlativo->setId($id);
            $correlativo->setNumcorrelativo($numcorrelativo);
            $correlativo->setFechareg(new \DateTime($fechareg));
            $correlativo->setFKsolicitante($solicitante);
            $correlativo->setRedactor($redactor);
            $correlativo->setDestinatario($destinatario);
            $correlativo->setReferencia($referencia);
            $correlativo->setFkcorrelativo($ctrlcorrelativo);
            $correlativo->setFktiponota($tiponota);
            $correlativo->setEquipo($equipo);
            $correlativo->setIp($ip);
            $correlativo->setUrl($url);
            $correlativo->setAntecedente($antecedente);
            $correlativo->setFkestado($estado);
            $correlativo->setItem($item);
            $correlativo->setUrleditable($urleditable);
            $correlativo->setEntrega(new \DateTime($entrega));
            $correlativo->setFkunidad($unidad);
            $correlativo->setUrlorigen($urlorigen);
            $correlativo->setEstado(1);
            
            $errors = $validator->validate($correlativo);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array)) ;
            }
            $cx->merge($correlativo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Correlativo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/correlativo_editar", methods={"POST"}, name="correlativo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $sendinf = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            /*$fecreg = $sendinf->getFechareg();
            $fecent = $sendinf->getEntrega();
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');
            if($fecent != null) $rsfce = $fecent->format('Y-m-d'); 
            $sendinf->setFechareg($rsfcr);
            $sendinf->setEntrega($rsfce);*/
            
            /*$correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            $fecreg = $correlativo->getFechareg();
            $fecent = $correlativo->getEntrega();
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
            if($fecent != null) $rsfce = $fecent->format('Y-m-d'); else $rsfce = $fecent;
            
            $sendinf = [
                "id" => $correlativo->getId(),
                "antecedente" => $correlativo->getAntecedente(),
                "item" => $correlativo->getItem(),
                "numcorrelativo" => $correlativo->getNumcorrelativo(),
                "fechareg" => $rsfcr,
                "redactor" => $correlativo->getRedactor(),
                "destinatario" => $correlativo->getDestinatario(),
                "referencia" => $correlativo->getReferencia(),
                "fkcorrelativo" => $correlativo->getFkcorrelativo(),
                "fktiponota" => $correlativo->getFktiponota(),
                "equipo" => $correlativo->getEquipo(),
                "ip" => $correlativo->getIp(),
                "url" => $correlativo->getUrl(),
                "urleditable" => $correlativo->getUrleditable(),
                "entrega" => $rsfce,
                "fkunidad" => $correlativo->getFkunidad(),
                "urlorigen" => $correlativo->getUrlorigen()
            ];*/
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Correlativo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/correlativo_numerar", methods={"POST"}, name="correlativo_numerar")
     */
    public function numerar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $idn = $sx['tipo'];
            date_default_timezone_set('America/La_Paz');
            $dia = date("d");
            $mes = date("m");
            $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find($idn);
            $tipo = $tiponota->getNombre();

            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_correlativo_numcorrelativo AS numcorrelativo 
                    FROM cb_proc_correlativo, cb_procesos_tipo_nota
                    WHERE date_part('Day', cb_correlativo_fechareg) = 1 AND date_part('Month', cb_correlativo_fechareg) = 1 AND 
                        cb_correlativo_fktiponota = cb_tipo_nota_id AND cb_tipo_nota_nombre = :tipo AND cb_correlativo_estado = 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['tipo' => ($tipo)]);
            $query = $stmt->fetchAll();

            $sql2 = "SELECT cb_correlativo_numcorrelativo + 1 AS numcorrelativo
                    FROM cb_proc_correlativo, cb_procesos_tipo_nota
                    WHERE cb_correlativo_fktiponota=cb_tipo_nota_id AND cb_tipo_nota_nombre = :tipo AND cb_correlativo_estado = 1 AND cb_correlativo_id IN
                    (SELECT MAX(c.cb_correlativo_id) 
                    FROM cb_proc_correlativo c, cb_procesos_tipo_nota n 
                    WHERE c.cb_correlativo_fktiponota = n.cb_tipo_nota_id AND n.cb_tipo_nota_nombre = :tipo AND c.cb_correlativo_estado = 1)";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute(['tipo' => ($tipo)]);
            $query2 = $stmt2->fetchAll();
            
            if($dia == '01' && $mes == '01' && empty($query) || empty($query) && empty($query2)){
                $num = array('numcorrelativo' => 1);
            }else{
                $num = $query2[0];
            }
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($num, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Correlativo numerado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/correlativo_eliminar", methods={"POST"}, name="correlativo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);

            $correlativo->setEstado(0);
            $cx->persist($correlativo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$correlativo->getId().".",'success' => true,
                'message' => 'Correlativo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    
}