<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Enlaces;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Form\EnlacesType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;

use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;


use App\Entity\Rol;

class EnlacesController extends AbstractController
{   
    /**
     * @Route("/enlaces", name="enlaces")
     * @Method({"GET"})
     */
    public function index(Enlaces $enlaces = null, Request $request)
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
        $form = $this->createForm(EnlacesType::class, null);
        $form ->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){ 
            //obtener datos del form
            $datosEnlaces = $form->getData();
            if($datosEnlaces->getId() == 0 ){
                $enlaces = new Enlaces();
            }else{
                $enlaces = $this->getDoctrine()->getRepository(Enlaces::class)->find($datosEnlaces->getId());
            }    
                    
            $cx = $this->getDoctrine()->getManager();   
            if(empty($form['ruta']->getData())){
                if($enlaces->getRuta() == null){
                    $enlaces->setRuta("N/A");
                }
            }else{
                $file = $form['ruta']->getData();
                $fileName = $file->getClientOriginalName();             
                $file->move($this->getParameter('Directorio_Enlaces'), $fileName);
                $ruta = $this->getParameter('Directorio_Enlaces').'//'.$fileName;
                $enlaces->setRuta($ruta);
            }
            
            $enlaces->setNombre($datosEnlaces->getNombre());
            $enlaces->setDescripcion($datosEnlaces->getDescripcion());
            $enlaces->setLink($datosEnlaces->getLink());              
            $enlaces->setEstado(1);
            
            if($datosEnlaces->getId() == 0){
                $cx->persist($enlaces);
                $cx->flush();
                unset($enlaces);
                unset($datosEnlaces);
            }else{
                $cx->merge($enlaces);
                $cx->flush();
                unset($enlaces);
                unset($datosEnlaces);
            }
            $redireccion = new RedirectResponse('/enlaces');
            return $redireccion;
        }
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));

        $Enlaces = $this->getDoctrine()->getRepository(Enlaces::class)->findBy(array('estado' => '1'));
        return $this->render('enlaces/index.html.twig', array('objects' => $Enlaces, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));          
    }

            
    /**
     * @Route("/enlaces_actualizar", methods={"POST"}, name="enlaces_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $nombre = $sx['descripcion'];
            $nombre = $sx['ruta'];
            $link = $sx['link'];

            $enlaces = new Enlaces();
            $enlaces->setId($id);
            $enlaces->setNombre($nombre);
            $enlaces->setNombre($descripcion);
            $enlaces->setNombre($ruta);
            $enlaces->setLink($link);
            $enlaces->setEstado(1);

            $cx->merge($enlaces);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Enlace externo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/enlaces_editar", methods={"POST"}, name="enlaces_editar")
     */
    public function editar()
    {    
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $enlaces = $this->getDoctrine()->getRepository(Enlaces::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($enlaces, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Enlace externo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/enlaces_eliminar", methods={"POST"}, name="enlaces_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $enlaces = $this->getDoctrine()->getRepository(Enlaces::class)->find($id);

            $enlaces->setEstado(0);
            $cx->persist($enlaces);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$enlaces->getId().".",'success' => true,
                'message' => 'Enlace externo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}