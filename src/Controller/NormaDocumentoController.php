<?php

namespace App\Controller;

use App\Entity\Documento;
use App\Entity\TipoNorma;
use App\Entity\NormaDocumento;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Rol;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


class NormaDocumentoController extends Controller
{
    /**
     * @Route("/normadocumento", name="normadocumento_listar")
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
        $NormaDocumento = $this->getDoctrine()->getRepository(NormaDocumento::class)->findBy(array('estado' => '1'));
        $Documento = $this->getDoctrine()->getRepository(Documento::class)->findBy(array('estado' => '1'));
        $TipoNorma = $this->getDoctrine()->getRepository(TipoNorma::class)->findBy(array('estado' => '1'));

        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        
        return $this->render('normadocumento/index.html.twig', array('objects' => $NormaDocumento, 'tipo' => $TipoNorma, 'documento' => $Documento, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/normadocumento_insertar", methods={"POST"}, name="normadocumento_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $punto = $sx['punto'];
            $documento = $sx['documento'];
            $norma = $sx['norma'];

            $normadocumento = new NormaDocumento();
            $normadocumento->setPunto($punto);
            $normadocumento->setEstado(1);
            trim($documento); trim($norma);
            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $documento=null;
            $norma != '' ? $norma= $this->getDoctrine()->getRepository(TipoNorma::class)->find($norma) : $norma=null;
            $normadocumento->setFkdocumento($documento);
            $normadocumento->setFknorma($norma);

            $errors = $validator->validate($normadocumento);
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



            $errors = $validator->validate($normadocumento);
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

            $cx->persist($normadocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$normadocumento->getId().".",'success' => true,
                'message' => 'Norma documento registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/normadocumento_actualizar", methods={"POST"}, name="normadocumento_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $punto = $sx['punto'];
            $documento = $sx['documento'];
            $norma = $sx['norma'];

            $normadocumento = $this->getDoctrine()->getRepository(NormaDocumento::class)->find($id);
            $normadocumento->setId($id);
            $normadocumento->setPunto($punto);
            $normadocumento->setEstado(1);

            trim($documento); trim($norma);
            $documento != '' ? $documento = $this->getDoctrine()->getRepository(Documento::class)->find($documento) : $documento=null;
            $norma != '' ? $norma= $this->getDoctrine()->getRepository(TipoNorma::class)->find($norma) : $norma=null;

            $errors = $validator->validate($normadocumento);
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

            $normadocumento->setFkdocumento($documento);
            $normadocumento->setFknorma($norma);

            $cx->merge($normadocumento);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Norma documento actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/normadocumento_editar", methods={"POST"}, name="normadocumento_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $normadocumento = $this->getDoctrine()->getRepository(NormaDocumento::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($normadocumento, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Norma documento listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/normadocumento_eliminar", methods={"POST"}, name="normadocumento_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $normadocumento = $this->getDoctrine()->getRepository(NormaDocumento::class)->find($id);

            $normadocumento->setEstado(0);
            $cx->persist($normadocumento);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$normadocumento->getId().".",'success' => true,
                'message' => 'Norma documento dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}