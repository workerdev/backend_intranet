<?php

namespace App\Controller;

use App\Form\DelegacionAutoridadType;
use App\Entity\DelegacionAutoridad;
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



class DelegacionAutoridadController extends Controller
{
    /**
     * @Route("/delautoridad", name="delautoridad", methods={"GET", "POST"})
     */
    public function index(DelegacionAutoridad $delautoridad = null, Request $request)
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
        $form = $this->createForm(DelegacionAutoridadType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datodelaut = $form->getData();
            
            if($datodelaut->getId() == 0 ){
                $delautoridad = new DelegacionAutoridad();
            }else{
                $delautoridad = $this->getDoctrine()->getRepository(DelegacionAutoridad::class)->find($datodelaut->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['foto']->getData())){
                if($delautoridad->getFoto() == null){
                    $delautoridad->setFoto("N/F");
                }
            }else{
                $file = $form['foto']->getData();
                $fileName = $file->getClientOriginalName();  
                $directorio = $this->getParameter('Directorio_Delautoridad_Foto');           
                $file->move($directorio, $fileName);
                $rutaf = substr($directorio, strpos($directorio, "delautoridad") + 12, strlen($directorio));
                $urlf = str_replace("\\", "/", $rutaf).'/'.$fileName;
                $delautoridad->setFoto($urlf);
            }  

            if(empty($form['archivo']->getData())){
                if($delautoridad->getArchivo() == null){
                    $delautoridad->setArchivo("N/A");
                }
            }else{
                $file = $form['archivo']->getData();
                $fileName = $file->getClientOriginalName();  
                $directorio = $this->getParameter('Directorio_Delautoridad_Archivo');           
                $file->move($directorio, $fileName);
                $rutafl = substr($directorio, strpos($directorio, "delautoridad") + 12, strlen($directorio));
                $urlfl = str_replace("\\", "/", $rutafl).'/'.$fileName;
                $delautoridad->setArchivo($urlfl);
            } 
            $delautoridad->setNombre($datodelaut->getNombre());
            $delautoridad->setCargo($datodelaut->getCargo());
            $delautoridad->setEstado(1);

            if($datodelaut->getId() == 0){
                $cx->persist($delautoridad);
                $cx->flush();
                unset($delautoridad);
                unset($datodelaut);
            }else{
                $cx->persist($delautoridad);
                $cx->flush();
                unset($delautoridad);
                unset($datodelaut);
            }
           
            $redireccion = new RedirectResponse('/delautoridad');
            return $redireccion;
        }
        $delautoridad = $this->getDoctrine()->getRepository(DelegacionAutoridad::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('delautoridad/index.html.twig', array('objects' => $delautoridad, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr, 'form' => $form->createView()));
    }


    /**
     * @Route("/delautoridad_editar", methods={"POST"}, name="delautoridad_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $delautoridad = $this->getDoctrine()->getRepository(DelegacionAutoridad::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($delautoridad, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Delegación de autoridad listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/delautoridad_eliminar", methods={"POST"}, name="delautoridad_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $file = $this->getDoctrine()->getRepository(DelegacionAutoridad::class)->find($id);

            $file->setEstado(0);
            $cx->persist($file);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$file->getId().".",'success' => true,
                'message' => 'Delegación de autoridad dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}