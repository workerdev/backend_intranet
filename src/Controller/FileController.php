<?php

namespace App\Controller;

use App\Form\FilesType;
use App\Entity\Galeria;
use App\Entity\Files;
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

class FileController extends Controller
{
    /**
     * @Route("/archivos", name="archivo_listar", methods={"GET", "POST"})
     */
    public function index(Files $files = null, Request $request)
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
        $form = $this->createForm(FilesType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosFiles = $form->getData();
           // $datosFiles123= $this->getPathname();
            
            
            if($datosFiles->getId() == 0 ){
                $files = new Files();
            }else{
                $files = $this->getDoctrine()->getRepository(Files::class)->find($datosFiles->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            $galeriav = new Galeria();
            $galeriav = $datosFiles->getFkgaleria();
            $galeriadesc =$galeriav->getNombre();

            $file = $datosFiles->getRuta();
           
            $directorioproyec=$this->getParameter('Directorio_proyecto');
            //$fileName = $file->getClientOriginalName();             
            //$file->move($directorio.'\\'.$galeriadesc, $fileName);
            //$ruta1 = $directorioproyec.'\\'.$galeriadesc.'\\'.$fileName;
            //$files->setRuta($ruta1);

            if(empty($form['ruta']->getData())){
                if($files->getRuta() == null){
                    $files->setRuta("N/A");
                }
            }else{
                $file = $form['ruta']->getData();
                $fileName = str_replace(" ", "_", $file->getClientOriginalName());              
                //$file->move($this->getParameter('Directorio_Files'), $fileName);
                $file->move($directorioproyec.'/'.$galeriadesc, $fileName);
                $ruta = '/'.$galeriadesc.'/'.$fileName;
                $files->setRuta($ruta);
            }
            
            $files->setTipo($datosFiles->getTipo());
            $files->setFkgaleria($galeriav);
            $files->setEstado(1);

            if($datosFiles->getId() == 0){
                $cx->persist($files);
                $cx->flush();
                unset($files);
                unset($datosFiles);
            }else{
                $cx->merge($files);
                $cx->flush();
                unset($files);
                unset($datosFiles);
            }
            $redireccion = new RedirectResponse('/archivos');
            return $redireccion;
            //return $this->render('files/index.html.twig', array('objects' => $Files,'form' => $form->createView(), 'tipo' => $Galeria, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos));
        }
        
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
       
        $Files = $this->getDoctrine()->getRepository(Files::class)->findBy(array('estado' => '1'));
        $Galeria = $this->getDoctrine()->getRepository(Galeria::class)->findBy(array('estado' => '1'));

        return $this->render('files/index.html.twig', array('objects' => $Files, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos , 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr, 'form' => $form->createView()));
    }

    
   /**
     * @Route("/archivo_actualizar", methods={"POST"}, name="archivo_actualizar")
     */
    public function actualizar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $ruta = $sx['ruta'];
            $tipo = $sx['tipo'];
            $galeria = $sx['galeria'];

            $file = new File();
            $file->setId($id);
            $file->setRuta($ruta);
            $file->setTipo($tipo);
            $file->setEstado(1);

            $tipo = $this->getDoctrine()->getRepository(Galeria::class)->find($galeria);
            $file->setFkgaleria($tipo); 

            $cx->merge($file);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Archivo actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/archivo_editar", methods={"POST"}, name="archivo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $file = $this->getDoctrine()->getRepository(Files::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($file, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Archivo listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/archivo_eliminar", methods={"POST"}, name="archivo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $file = $this->getDoctrine()->getRepository(Files::class)->find($id);

            $file->setEstado(0);
            $cx->persist($file);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$file->getId().".",'success' => true,
                'message' => 'Archivo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}