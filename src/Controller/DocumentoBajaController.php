<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\TipoDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocumentoBaja;
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

class DocumentoBajaController extends Controller
{
    /**
     * @Route("/bajadocumento", name="bajadocumento_listar")
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
        $DocumentoBaja = $this->getDoctrine()->getRepository(DocumentoBaja::class)->findBy(array('estado' => '1'));
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $TipoDocumento = $this->getDoctrine()->getRepository(TipoDocumento::class)->findBy(array('estado' => '1'));
        return $this->render('documentobaja/index.html.twig', array('objects' => $DocumentoBaja, 'proceso' => $FichaProcesos, 'tipo' => $TipoDocumento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
    }

    /**
     * @Route("/bajadocumento_insertar", methods={"POST"}, name="bajadocumento_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $codigo = $sx['codigo'];
            $proceso = $sx['proceso'];
            $tipo = $sx['tipo'];
            $titulo = $sx['titulo'];
            $version = $sx['version'];
            $fechapublicacion = $sx['fechapublicacion'];
            $aprobadopor = $sx['aprobadopor'];
            $carpetaoperativa = $sx['carpetaoperativa'];
            $vinculoarchivo = $sx['vinculoarchivo'];

            $bajadocumento = new DocumentoBaja();
            $bajadocumento->setCodigo($codigo);
            $bajadocumento->setTitulo($titulo);
            $bajadocumento->setVersionvigente($version);
            $bajadocumento->setFechapublicacion(new \DateTime($fechapublicacion));
            $bajadocumento->setAprobadopor($aprobadopor);
            $bajadocumento->setCarpetaoperativa($carpetaoperativa);
            $bajadocumento->setVinculoarchivo($vinculoarchivo);
            $bajadocumento->setEstado(1);

            $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $proceso = null;
            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo = null;
            $bajadocumento->setFkproceso($proceso); 
            $bajadocumento->setFktipo($tipo);

            $errors = $validator->validate($bajadocumento);
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
            $cx->persist($bajadocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$bajadocumento->getId().".",'success' => true,
                'message' => 'Documento de baja registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/bajadocumento_actualizar", methods={"POST"}, name="bajadocumento_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $codigo = $sx['codigo'];
            $proceso = $sx['proceso'];
            $tipo = $sx['tipo'];
            $titulo = $sx['titulo'];
            $version = $sx['version'];
            $fechapublicacion = $sx['fechapublicacion'];
            $aprobadopor = $sx['aprobadopor'];
            $carpetaoperativa = $sx['carpetaoperativa'];
            $vinculoarchivo = $sx['vinculoarchivo'];

            $bajadocumento = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($id);
            $bajadocumento->setId($id);
            $bajadocumento->setCodigo($codigo);
            $bajadocumento->setTitulo($titulo);
            $bajadocumento->setVersionvigente($version);
            $bajadocumento->setFechapublicacion(new \DateTime($fechapublicacion));
            $bajadocumento->setAprobadopor($aprobadopor);
            $bajadocumento->setCarpetaoperativa($carpetaoperativa);
            $bajadocumento->setVinculoarchivo($vinculoarchivo);
            $bajadocumento->setEstado(1);

            $proceso != '' ? $proceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($proceso) : $proceso = null;
            $tipo != ''? $tipo = $this->getDoctrine()->getRepository(TipoDocumento::class)->find($tipo) : $tipo = null;
            $bajadocumento->setFkproceso($proceso);
            $bajadocumento->setFktipo($tipo);

            $errors = $validator->validate($bajadocumento);
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

            $cx->merge($bajadocumento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Documento de baja actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/bajadocumento_editar", methods={"POST"}, name="bajadocumento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $bajadocumento = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($id);
            $fpb = $bajadocumento->getFechapublicacion();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $bajadocumento->getId(),
                "codigo" => $bajadocumento->getCodigo(),
                "titulo" => $bajadocumento->getTitulo(),
                "versionvigente" => $bajadocumento->getVersionVigente(),
                "fechapublicacion" => $result,
                "aprobadopor" => $bajadocumento->getAprobadopor(),
                "carpetaoperativa" => $bajadocumento->getCarpetaoperativa(),
                "vinculoarchivo" => $bajadocumento->getVinculoarchivo(),
                "fkproceso" => $bajadocumento->getFkproceso(),
                "fktipo" => $bajadocumento->getFktipo()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento de baja listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/bajadocumento_eliminar", methods={"POST"}, name="bajadocumento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $bajadocumento = $this->getDoctrine()->getRepository(DocumentoBaja::class)->find($id);

            $bajadocumento->setEstado(0);
            $cx->persist($bajadocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$bajadocumento->getId().".",'success' => true,
                'message' => 'Documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}