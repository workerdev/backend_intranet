<?php

namespace App\Controller;

use App\Entity\FichaCargo;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\GerenciaAreaSector;
use App\Entity\DocumentosAso;
use App\Entity\DocProcRevision;
use App\Entity\Usuario;
use App\Form\FichaCargoType;
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


class FichaCargoController extends Controller
{
    /**
     * @Route("/fichacargo", name="fichacargo_listar")
     * @Method({"GET"})
     */
    public function index(FichaCargo $fcargo = null, Request $request)
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

        $form = $this->createForm(FichaCargoType::class, null);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ 
            $datosFicha = $form->getData();
            
            if($datosFicha->getId() == 0 ){
                $fcargo = new FichaCargo();
            }else{
                $fcargo = $this->getDoctrine()->getRepository(FichaCargo::class)->find($datosFicha->getId());
            }            
            $cx = $this->getDoctrine()->getManager(); 

            if(empty($form['hipervinculo']->getData())){
                if($fcargo->getHipervinculo() == null){
                    $fcargo->setHipervinculo("N/A");
                }
            }else{
                $file = $form['hipervinculo']->getData();
                $fileName = $file->getClientOriginalName();  
                $directorio = $this->getParameter('Directorio_FichaCargo');           
                $file->move($directorio, $fileName);
                $ruta = substr($directorio, strpos($directorio, "public") + 6, strlen($directorio));
                $url = str_replace("\\", "/", $ruta).'/'.$fileName;
                $fcargo->setHipervinculo($url);
            }

            $fcargo->setNombre($datosFicha->getNombre());
            $fcargo->setObjetivo($datosFicha->getObjetivo());
            $fcargo->setResponsabilidades($datosFicha->getResponsabilidades());
            $fcargo->setExperiencia($datosFicha->getExperiencia());
            $fcargo->setConocimientos($datosFicha->getConocimientos());
            $fcargo->setFormacion($datosFicha->getFormacion());
            $fcargo->setCaracteristicas($datosFicha->getCaracteristicas());
            $fcargo->setFechaaprobacion($datosFicha->getFechaaprobacion());
            $fcargo->setFirmajefe($datosFicha->getFirmajefe());
            $fcargo->setFirmagerente($datosFicha->getFirmagerente());
            $fcargo->setEstado(1);
            
            $area = new GerenciaAreaSector();
            $area = $datosFicha->getFkarea();
            $fcargo->setFkarea($area);

            $jefe = new Usuario();
            $jefe = $datosFicha->getFkjefeaprobador();
            $fcargo->setFkjefeaprobador($jefe);

            
            $gerente = new Usuario();
            $gerente = $datosFicha->getFkgerenteaprobador();
            $fcargo->setFkgerenteaprobador($gerente);

            if($datosFicha->getId() == 0){
                $cx->persist($fcargo);
                $cx->flush();
                unset($fcargo);
                unset($datosFicha);
            }else{
                $cx->persist($fcargo);
                $cx->flush();
                unset($fcargo);
                unset($datosFicha);
            }
            $redireccion = new RedirectResponse('/fichacargo');
            return $redireccion;
        }

        $FichaCargo = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('responsable' => $s_user['nombre'].' '.$s_user['apellido'], 'firma' => 'Por revisar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));    
        return $this->render('fichacargo/index.html.twig', array('objects' => $FichaCargo, 'form' => $form->createView(), 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    /**
     * @Route("/fichacargo_editar", methods={"POST"}, name="fichacargo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fichacargo = $this->getDoctrine()->getRepository(FichaCargo::class)->find($id);

            $fpb = $fichacargo->getFechaaprobacion();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $fichacargo->getId(),
                "fkarea" => $fichacargo->getFkarea(),
                "nombre" => $fichacargo->getNombre(),
                "objetivo" => $fichacargo->getObjetivo(),
                "responsabilidades" => $fichacargo->getResponsabilidades(),
                "experiencia" => $fichacargo->getExperiencia(),
                "conocimientos" => $fichacargo->getConocimientos(),
                "fechaaprobacion" => $result,
                "conocimientos" => $fichacargo->getConocimientos(),
                "formacion" => $fichacargo->getFormacion(),
                "caracteristicas" => $fichacargo->getCaracteristicas(),
                "fkjefeaprobador" => $fichacargo->getFkjefeaprobador(),
                "firmajefe" => $fichacargo->getFirmajefe(),
                "fkgerenteaprobador" => $fichacargo->getFkgerenteaprobador(),
                "firmagerente" => $fichacargo->getFirmagerente(),
                "hipervinculo" => $fichacargo->getHipervinculo()
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
           
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Documento listado correctamente.');
            $resultados = json_encode($resultado);
            return new Response($resultados);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/ficha_prev", methods={"POST"}, name="ficha_prev")
     */
    public function ficha_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documento = $this->getDoctrine()->getRepository(DocumentosAso::class)->findBy(array('fkfichacargo' => $id, 'estado' => '1'));
            
            if(sizeof($documento) == 0){
                $info = array('response'=>"¿Desea dar de baja la ficha de cargo?", 'success' => true,
                'message' => 'Baja ficha de cargo.');
            }else{
                if(sizeof($documento) > 0) $vr = " documentos asociados";

                $info = array('response'=>"La ficha de cargo no se puede eliminar, debido a que tiene relación con los datos de".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados a la ficha de cargo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/fichacargo_eliminar", methods={"POST"}, name="fichacargo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $fichacargo = $this->getDoctrine()->getRepository(FichaCargo::class)->find($id);

            $fichacargo->setEstado(0);
            $cx->persist($fichacargo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$fichacargo->getId().".",'success' => true,
                'message' => 'Ficha de cargo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/fichacargo_aprobarfcjefe", methods={"POST"}, name="fichacargo_aprobarfcjefe")
     */
    public function aprobarfcjefe(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();            
            $sx = json_decode($_POST['object'], true);
            
            $id = $sx['id'];
            $firmajefe = $sx['firmajefe'];
            
            $fichacargo = $this->getDoctrine()->getRepository(FichaCargo::class)->find($id);
            $fichacargo->setFirmajefe($firmajefe);

            $errors = $validator->validate($fichacargo);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }

            $cx->merge($fichacargo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$fichacargo->getId().".",'success' => true,
                'message' => 'Ficha de cargo modificada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/fichacargo_aprobarfcgerente", methods={"POST"}, name="fichacargo_aprobarfcgerente")
     */
    public function aprobarfcgerente(ValidatorInterface $validator )
    {
        try {
            $cx = $this->getDoctrine()->getManager();            
            $sx = json_decode($_POST['object'], true);
            
            $id = $sx['id'];
            $firmagerente = $sx['firmagerente'];
            
            $fichacargo = $this->getDoctrine()->getRepository(FichaCargo::class)->find($id);
            $fichacargo->setFirmagerente($firmagerente);

            $errors = $validator->validate($fichacargo);
            if (count($errors)>0){
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e){
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return  new  Response(json_encode($array)) ;
            }

            $cx->merge($fichacargo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$fichacargo->getId().".",'success' => true,
                'message' => 'Ficha de cargo modificada correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}