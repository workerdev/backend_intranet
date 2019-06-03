<?php

namespace App\Controller;

use App\Entity\FichaProcesos;
use App\Entity\Recurso;
use App\Entity\RecursoNecesario;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
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



class RecursoNecesarioController extends Controller
{
    /**
     * @Route("/recursonecesario", name="recursonecesario_listar")
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
        
        $RecursoNecesario = $this->getDoctrine()->getRepository(RecursoNecesario::class)->findBy(array('estado' => '1'));
        $FichaProcesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->findBy(array('estado' => '1'));
        $Recurso = $this->getDoctrine()->getRepository(Recurso::class)->findBy(array('estado' => '1'));
        return $this->render('recursonecesario/index.html.twig', array('objects' => $RecursoNecesario, 'tipo' => $FichaProcesos, 'tipo2' => $Recurso, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/recursonecesario_insertar", methods={"POST"}, name="recursonecesario_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);
            $detalle = $sx['detalle'];
            
            $fichaprocesos = $sx['fichaprocesos'];
            $recurso = $sx['recurso'];

            $recursonecesario = new RecursoNecesario();
            $recursonecesario->setDetalle($detalle);
            $recursonecesario->setEstado(1);

            $fichaprocesos != '' ? $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($fichaprocesos) : $fichaprocesos = null;
            $recurso != '' ? $recurso = $this->getDoctrine()->getRepository(Recurso::class)->find($recurso) : $recurso =null;
            $recursonecesario->setFkficha($fichaprocesos);
            $recursonecesario->setFktipo($recurso);
            $errors = $validator->validate($recursonecesario);
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
            $cx->persist($recursonecesario);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$recursonecesario->getId().".",'success' => true,
                'message' => 'Recurso necesario registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/recursonecesario_actualizar", methods={"POST"}, name="recursonecesario_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $detalle = $sx['detalle'];
            
            $fichaprocesos = $sx['fichaprocesos'];
            $recurso = $sx['recurso'];

            $recursonecesario = new RecursoNecesario();
            $recursonecesario->setId($id);
            $recursonecesario->setDetalle($detalle);
            $recursonecesario->setEstado(1);

            $fk_ficha = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($fichaprocesos);
            $fk_tipo = $this->getDoctrine()->getRepository(Recurso::class)->find($recurso);
            $recursonecesario->setFkficha($fk_ficha); 
            $recursonecesario->setFktipo($fk_tipo);
            $errors = $validator->validate($recursonecesario);
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
            $cx->merge($recursonecesario);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Recurso necesario actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/recursonecesario_editar", methods={"POST"}, name="recursonecesario_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $recursonecesario = $this->getDoctrine()->getRepository(RecursoNecesario::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($recursonecesario, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Recurso necesario listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/recursonecesario_eliminar", methods={"POST"}, name="recursonecesario_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $recursonecesario = $this->getDoctrine()->getRepository(RecursoNecesario::class)->find($id);

            $recursonecesario->setEstado(0);
            $cx->persist($recursonecesario);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$recursonecesario->getId().".",'success' => true,
                'message' => 'Recurso necesario dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}