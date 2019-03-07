<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Accidentes;
use App\Entity\Noticia;
use App\Entity\NoticiaCategoria;
use App\Entity\CategoriaNoticia;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;


class AccidentesController extends AbstractController
{   
    /**
     * @Route("/accidentes", name="accidentes")
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
        $accidentes = $this->getDoctrine()->getRepository(Accidentes::class)->findBy(array('estado' => '1'));
        $accidentes = $this->getDoctrine()->getRepository(Accidentes::class)->findBy(
            ['estado' => '1'],
            ['id' => 'ASC']
        );
        return $this->render('accidentes/index.html.twig', array('objects' => $accidentes, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/accidentes_eliminar", methods={"POST"}, name="accidentes_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $accidentes = $this->getDoctrine()->getRepository(Accidentes::class)->find($id);

            $accidentes->setEstado(0);
            $cx->persist($accidentes);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$accidentes->getId().".",'success' => true,
                'message' => 'Accidente dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/accidentes_editar", methods={"POST"}, name="accidentes_editar")
     */
    public function editar(){
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $accidentes = $this->getDoctrine()->getRepository(Accidentes::class)->find($id);

            $accidentes->setEstado(0);
            $cx->persist($accidentes);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$accidentes->getId().".",'success' => true,
                'message' => 'Accidente actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/accidentes_reset", methods={"POST"}, name="accidentes_reset")
     */
    public function reset( Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($request->getContent(), true);
            $tipo = $_POST['tipo'];
            $accidenteAnterior = $this->getDoctrine()
            ->getRepository(Accidentes::class)
            ->findOneBy(
                array('estado'=>1),
                array('id' => 'DESC')
            );
            if($accidenteAnterior != null){
                $accidente = $accidenteAnterior;
                $accidente->setFechaFin(new \DateTime());
                $accidente->setTipo($tipo);
                $cx->persist($accidente);
                $cx->flush();
                $cx1 = $this->getDoctrine()->getManager();
                $accidente1 = new Accidentes();
                $accidente1->setFechaInicio(new \DateTime());
                $accidente1->setEstado(1);
                $cx1->persist($accidente1);
                $cx1->flush();

                $resultado = array('response'=>"El registro nuevo accidente.",
                    'success' => true,
                    'message' => 'Accidente registrado correctamente.');
                $resultado = json_encode($resultado);
                return new Response($resultado);
            }else{
                $accidente = new Accidentes();
                $accidente->setFechaInicio(new \DateTime());
                $accidente->setEstado(1);
                $accidente->setTipo('');
                $cx->persist($accidente);
                $cx->flush();

                $resultado = array('response'=>"Se dió inicio al contador de días sin accidentes: ".$accidente->getFechaInicio().".",
                    'success' => true,
                    'message' => 'Registrado correctamente.');
                $resultado = json_encode($resultado);
                return new Response($resultado);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}