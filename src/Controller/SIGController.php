<?php

namespace App\Controller;

use App\Form\SIGType;
use App\Entity\SIG;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Rol;

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



class SIGController extends Controller
{
    /**
     * @Route("/sig", name="sig", methods={"GET", "POST"})
     */
    public function index(SIG $sig = null, Request $request)
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
        //dd($permisos);
        $form = $this->createForm(SIGType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosig = $form->getData();
            
            if($datosig->getId() == 0 ){
                $sig = new SIG();
            }else{
                $sig = $this->getDoctrine()->getRepository(SIG::class)->find($datosig->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['ruta']->getData())){
                if($sig->getRuta() == null){
                    $sig->setRuta("N/A");
                }
            }else{
                $file = $form['ruta']->getData();
                $fileName = $file->getClientOriginalName();  
                $directorio = $this->getParameter('Directorio_SIG');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $sig->setRuta($url);
            } 
            $sig->setTitulo($datosig->getTitulo());
            $sig->setFksuperior($datosig->getFksuperior());
            if($datosig->getFksuperior() != null){
                $psig = $this->getDoctrine()->getRepository(SIG::class)->find($datosig->getFksuperior()->getId());
                $psig->setRuta("N/A");
                $psig->setFksuperior(null);
                $cx->persist($psig);
                $cx->flush();
            }
            $sig->setEstado(1);

            if($datosig->getId() == 0){
                $cx->persist($sig);
                $cx->flush();
                unset($sig);
                unset($datosig);
            }else{
                $cx->persist($sig);
                $cx->flush();
                unset($sig);
                unset($datosig);
            }
           
            $redireccion = new RedirectResponse('/sig');
            return $redireccion;
        }
        $sig = $this->getDoctrine()->getRepository(SIG::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('sig/index.html.twig', array('objects' => $sig, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr, 'form' => $form->createView()));
    }


    /**
     * @Route("/sig_editar", methods={"POST"}, name="sigeditar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $file = $this->getDoctrine()->getRepository(SIG::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($file, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'SIG listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/sig_eliminar", methods={"POST"}, name="sig_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $file = $this->getDoctrine()->getRepository(SIG::class)->find($id);

            $file->setEstado(0);
            $cx->persist($file);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$file->getId().".",'success' => true,
                'message' => 'SIG dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}