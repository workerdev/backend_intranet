<?php

namespace App\Controller;

use App\Form\OrganigramaGerenciaType;
use App\Entity\OrganigramaGerencia;
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



class OrganigramaGerenciaController extends Controller
{
    /**
     * @Route("/organigramagerencia", name="organigramagerencia", methods={"GET", "POST"})
     */
    public function index(OrganigramaGerencia $organigramagerencia = null, Request $request)
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
        $form = $this->createForm(OrganigramaGerenciaType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosOrga = $form->getData();
            
            if($datosOrga->getId() == 0 ){
                $organigramagerencia = new OrganigramaGerencia();
            }else{
                $organigramagerencia = $this->getDoctrine()->getRepository(OrganigramaGerencia::class)->find($datosOrga->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['ruta']->getData())){
                if($organigramagerencia->getRuta() == null){
                    $organigramagerencia->setRuta("N/A");
                }
            }else{
                $file = $form['ruta']->getData();
                $fileName = $file->getClientOriginalName();  
                $directorio = $this->getParameter('Directorio_OrganigramaGerencia');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $organigramagerencia->setRuta($url);
            } 
            $organigramagerencia->setNombre($datosOrga->getNombre());
            $organigramagerencia->setEstado(1);

            if($datosOrga->getId() == 0){
                $cx->persist($organigramagerencia);
                $cx->flush();
                unset($organigramagerencia);
                unset($datosOrga);
            }else{
                $cx->persist($organigramagerencia);
                $cx->flush();
                unset($organigramagerencia);
                unset($datosOrga);
            }
           
            $redireccion = new RedirectResponse('/organigramagerencia');
            return $redireccion;
        }
        $OrganigramaGerencia = $this->getDoctrine()->getRepository(OrganigramaGerencia::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('organigramagerencia/index.html.twig', array('objects' => $OrganigramaGerencia, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr, 'form' => $form->createView()));
    }


    /**
     * @Route("/organigramagerencia_editar", methods={"POST"}, name="organigramagerencia_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $file = $this->getDoctrine()->getRepository(OrganigramaGerencia::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($file, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Organigrama gerencia listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/organigramagerencia_eliminar", methods={"POST"}, name="organigramagerencia_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $file = $this->getDoctrine()->getRepository(OrganigramaGerencia::class)->find($id);

            $file->setEstado(0);
            $cx->persist($file);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$file->getId().".",'success' => true,
                'message' => 'Organigrama gerencia dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}