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

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;


class CorrelativoController extends Controller
{
    /**
     * @Route("/correlativo", methods={"GET", "POST"}, name="correlativo_listar")
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
        $idu = $s_user['id'];
        $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findByPermission($idu);

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('correlativo/index.html.twig', array('objects' => $correlativo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/correlativo_editar", methods={"POST"}, name="correlativo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];            
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
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
                "fksolicitante" => $correlativo->getFksolicitante(),
                "fkcorrelativo" => $correlativo->getFkcorrelativo(),
                "fktiponota" => $correlativo->getFktiponota(),
                "equipo" => $correlativo->getEquipo(),
                "EstadoCorrelativo" => $correlativo->getEstadoCorrelativo(),
                "ip" => $correlativo->getIp(),
                "url" => $correlativo->getUrl(),
                "urleditable" => $correlativo->getUrleditable(),
                "entrega" => $rsfce,
                "fkunidad" => $correlativo->getFkunidad(),
                "urlorigen" => $correlativo->getUrlorigen()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Correlativo listado correctamente.');
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    public function numerar()
    {
        try {
            date_default_timezone_set('America/La_Paz');
            $dia = date("d");
            $mes = date("m");

            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_correlativo_numcorrelativo AS numcorrelativo 
                    FROM cb_correlativo_correlativo
                    WHERE date_part('Day', cb_correlativo_fechareg) = 1 AND date_part('Month', cb_correlativo_fechareg) = 1 AND 
                        cb_correlativo_estado = 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();

            $sql2 = "SELECT cb_correlativo_numcorrelativo + 1 AS numcorrelativo
                    FROM cb_correlativo_correlativo
                    WHERE cb_correlativo_estado = 1 AND cb_correlativo_id IN
                    (SELECT MAX(c.cb_correlativo_id) 
                    FROM cb_correlativo_correlativo c 
                    WHERE c.cb_correlativo_estado = 1)";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute();
            $query2 = $stmt2->fetchAll();
            
            if($dia == '01' && $mes == '01' && empty($query) || empty($query) && empty($query2)){
                $num = 1;
            }else{
                $num = $query2[0]['numcorrelativo'];
            }
            
            return $num;
        } catch (Exception $e) {
            return 0;
        }
    }


    /**
     * @Route("/obtener_unidad", methods={"POST"}, name="obtener_unidad")
     */
    public function obtener_unidad()
    {
        try {
            $s_user = $this->get('session')->get('s_user');
            $idu = $s_user['id'];       
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unitByPermission($idu);
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($unidad, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Unidad listada correctamente.');
            $resultados = json_encode($resultado);
            return new Response($resultados);
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