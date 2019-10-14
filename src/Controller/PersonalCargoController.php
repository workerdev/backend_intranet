<?php

namespace App\Controller;

use App\Entity\PersonalCargo;
use App\Entity\Personal;
use App\Entity\TipoCargo;
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
use JMS\Serializer\SerializerBuilder;


class PersonalCargoController extends Controller
{
    /**
     * @Route("/personalcargo", name="personalcargo_listar")
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
        
        $PersonalCargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $TipoCargo = $this->getDoctrine()->getRepository(TipoCargo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $superior = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        return $this->render('personalcargo/index.html.twig', array('objects' => $PersonalCargo, 'tipo' => $TipoCargo, 'superior' => $superior, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/organigrama", name="PersonalCargo_listar2")
     * @Method({"GET"})
     */
    public function organigrama()
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
        try
        {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql  = "SELECT CARGO.cb_cargo_id AS KEY,
                        CASE
                            WHEN PER.cb_personal_nombre IS NULL THEN
                            '[VACANTE]' 
                            WHEN CARGO.cb_cargo_fktipo IS NOT NULL THEN
                            concat ( PER.cb_personal_nombre, ' ', PER.cb_personal_apellido ) 
                            END AS NAME,
                            CARGO.cb_cargo_nombre AS title,
                        CASE		
                            WHEN CARGO.cb_cargo_fksuperior IS NULL THEN
                            CARGO.cb_cargo_id 
                            WHEN CARGO.cb_cargo_fksuperior IS NOT NULL THEN
                            CARGO.cb_cargo_fksuperior 
                            END AS parent,
                        CASE
                            WHEN CARGO.cb_cargo_fktipo = 1 THEN
                                FALSE 
                            WHEN CARGO.cb_cargo_fktipo = 2 THEN
                                TRUE ELSE FALSE 
                            END AS isAssistant,
                        CASE
                            WHEN PER.cb_personal_nombre IS NULL THEN
                                0 
                            WHEN CARGO.cb_cargo_fktipo IS NOT NULL THEN
                                PER.cb_personal_id 
                            END AS id_personal 
                    FROM cb_personal_cargo CARGO
                                LEFT JOIN (SELECT cb_personal_id, cb_personal_fkcargo, cb_personal_nombre, cb_personal_apellido
                                                    FROM cb_personal_personal 
                                                    WHERE cb_personal_estado = 1 ) PER ON CARGO.cb_cargo_id = PER.cb_personal_fkcargo
                                LEFT JOIN cb_personal_tipo_cargo TC ON TC.cb_tipo_cargo_id = CARGO.cb_cargo_fktipo 
                    WHERE CARGO.cb_cargo_estado = 1
                    ORDER BY 2";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $Personal = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Personal, 'json');
            $data3 = json_encode($data2);
            $data4 = json_decode($data3);

            $sql2 = "SELECT MAX(cb_cargo_id) AS last_id FROM cb_personal_cargo;";
            $stmt = $cx->prepare($sql2);
            $stmt->execute();
            $cantidad = $stmt->fetchAll();
            $data2 = $serializer->serialize($cantidad, 'json');
            $data3 = json_encode($data2);
            $data5 = json_decode($data3);

            $cargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
            $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
            $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
            $Personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(['estado' => '1', 'fkprocesoscargo' => null], ['nombre' => 'ASC']);

            return $this->render('personalcargo/organigrama.html.twig', array('organigrama' => $data4, 'cantidad' => $data5, 'personas'=>$Personal, 'cargo' => $cargo, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
        }catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/organigrama_cambios", name="organigrama cambios")
     * @Method({"POST"})
     */
    public function cambiosorganigrama()
    {
        try
        {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $objeto = json_decode($_POST['data'], true);
            $original = $objeto['original'];
            $modificado = $objeto['cambio'];
            $arrayOriginal = $original['nodeDataArray'];
            $arrayModificado = $modificado['nodeDataArray'];

            foreach ($arrayOriginal as $nodoOriginal){
                $repetido = false;
                foreach ($arrayModificado as $nodoModificado){
                    if($nodoOriginal['key'] == $nodoModificado['key']){
                        $repetido = true;
                        if($nodoOriginal['id_personal'] != $nodoModificado['id_personal']){
                            if($nodoModificado['id_personal'] == null){
                                $sqleliminar = "UPDATE cb_personal_personal SET cb_personal_fkcargo = null WHERE cb_personal_id = :id";
                                $stmt = $cx->prepare($sqleliminar);
                                $stmt->execute(['id' => $nodoOriginal['id_personal']]);
                            }else{
                                $sqleliminar = "UPDATE cb_personal_personal SET cb_personal_fkcargo = :id_cargo WHERE cb_personal_id = :id";
                                $stmt = $cx->prepare($sqleliminar);
                                $stmt->execute(['id' => $nodoModificado['id_personal'], 'id_cargo' => $nodoModificado['key']]);
                                $sqleliminar = "UPDATE cb_personal_personal SET cb_personal_fkcargo = null WHERE cb_personal_id = :id and cb_personal_id = :id_cargo";
                                $stmt = $cx->prepare($sqleliminar);
                                $stmt->execute(['id' => $nodoOriginal['id_personal'],'id_cargo' => $nodoModificado['key']]);
                            }
                        }
                        if($nodoOriginal['isassistant'] != $nodoModificado['isassistant']){
                            $sqleliminar = "UPDATE cb_personal_cargo SET cb_cargo_fktipo = :estado WHERE cb_cargo_id = :id";
                            $stmt = $cx->prepare($sqleliminar);
                            $estado = 1;
                            if($nodoModificado['isassistant']){
                                $estado = 2;
                            }
                            $stmt->execute(['id' => $nodoOriginal['key'], 'estado' => $estado]);
                        }
                        if($nodoOriginal['parent'] != $nodoModificado['parent']){
                            $sqleliminar = "UPDATE cb_personal_cargo SET cb_cargo_fksuperior = :id_superior WHERE cb_cargo_id = :id";
                            $stmt = $cx->prepare($sqleliminar);
                            $stmt->execute(['id' => $nodoOriginal['key'], 'id_superior' => $nodoModificado['parent']]);
                        }
                    }
                }
                if(!$repetido){
                    $sqleliminar = "UPDATE cb_personal_cargo SET cb_cargo_estado = 0 WHERE cb_cargo_id = :id";
                    $stmt = $cx->prepare($sqleliminar);
                    $stmt->execute(['id' => $nodoOriginal['key']]);
                    $sqleliminar = "UPDATE cb_personal_personal SET cb_personal_fkcargo = null WHERE cb_personal_fkcargo = :id";
                    $stmt = $cx->prepare($sqleliminar);
                    $stmt->execute(['id' => $nodoOriginal['key']]);
                }
            }
            $resultado = array('response'=>"cambios realizados",'success' => true,
                'message' => 'Cambios de organigrama realizados.');
            $resultado = json_encode($resultado);
            return new Response($resultado);

        }catch(Exception $e){

            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

    }

    /**
     * @Route("/personalcargo_insertar", methods={"POST"}, name="PersonalCargo_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $superior = $sx['superior'];
            $tipocargo = $sx['tipocargo'];

            $PersonalCargo = new PersonalCargo();
            $PersonalCargo->setNombre($nombre);
            $PersonalCargo->setDescripcion($descripcion);
            $PersonalCargo->setEstado(1);
            
            if ($superior == ""){ 
                $superior = null;
            }else{
                $superior = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($superior);
            }
            $PersonalCargo->setFksuperior($superior);  
            $tipocargo != '' ? $tipocargo = $this->getDoctrine()->getRepository(TipoCargo::class)->find($tipocargo): $tipocargo=null;
            $PersonalCargo->setFktipo($tipocargo);
            $errors = $validator->validate($PersonalCargo);
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
            $cx->persist($PersonalCargo);
            $cx->flush();

            $resultado = array('response'=>"El ID registrado es: ".$PersonalCargo->getId().".",'success' => true,
                'message' => 'Cargo del personal registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/personalcargo_actualizar", methods={"POST"}, name="PersonalCargo_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $nombre = $sx['nombre'];
            $descripcion = $sx['descripcion'];
            $superior = $sx['superior'];
            $tipocargo = $sx['tipocargo'];
            if ($superior == ""){ 
                $superior = null;
            }else{
                $superior = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($superior);
            }

            $PersonalCargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($id);
            $PersonalCargo->setId($id);
            $PersonalCargo->setNombre($nombre);
            $PersonalCargo->setDescripcion($descripcion);
            $PersonalCargo->setFksuperior($superior);
            $PersonalCargo->setEstado(1);

            $tipocargo != '' ? $tipocargo = $this->getDoctrine()->getRepository(TipoCargo::class)->find($tipocargo): $tipocargo=null;
            $PersonalCargo->setFktipo($tipocargo);
            $errors = $validator->validate($PersonalCargo);
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

            $cx->merge($PersonalCargo);
            $cx->flush();

            $resultado = array('success' => true,
                    'message' => 'Cargo del personal actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/personalcargo_editar", methods={"POST"}, name="PersonalCargo_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $personal_cargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($id);

            $serializer = SerializerBuilder::create()->build();
            $jsonObject = $serializer->serialize($personal_cargo, 'json');

            $resultado = array('response'=>$jsonObject,'success' => true,
                'message' => 'Cargo del personal listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    

    /**
     * @Route("/cargo_prev", methods={"POST"}, name="cargo_prev")
     */
    public function cargo_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $superior = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(array('fksuperior' => $id, 'estado' => '1'));
            
            if(sizeof($superior) == 0){
                $info = array('response'=>"¿Desea dar de baja el cargo de personal?", 'success' => true,
                'message' => 'Baja cargo de personal.');
            }else{
                if(sizeof($superior) > 0) $vr = " superior de otros cargos.";

                $info = array('response'=>"El cargo no se puede eliminar, debido a que es".$vr, 'success' => false,
                'message' => 'Se eliminarán todos los registros asociados al cargo.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/personalcargo_eliminar", methods={"POST"}, name="PersonalCargo_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $PersonalCargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($id);

            $PersonalCargo->setEstado(0);
            $cx->persist($PersonalCargo);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$PersonalCargo->getId().".",'success' => true,
                'message' => 'Cargo del personal dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function get_children($array, $id, $idf){
        $children = [];
        $aux = $array;
        foreach ($aux as $ditem){
            if($ditem['parent'] == $id && $ditem['key'] != $ditem['parent']) array_push($children, $ditem['key']);
        }
        return $children;
    }

    /**
     * @Route("/organigrama/{id}", name="organigrama_filtro", methods={"GET"})
     */
    public function filtro($id)
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
        $children = $mods;
        $permisos = array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }
        try
        {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT CARGO.cb_cargo_id AS KEY,
                    CASE
                        WHEN PER.cb_personal_nombre IS NULL THEN
                        '[VACANTE]' 
                        WHEN CARGO.cb_cargo_fktipo IS NOT NULL THEN
                        concat ( PER.cb_personal_nombre, ' ', PER.cb_personal_apellido ) 
                        END AS NAME,
                        CARGO.cb_cargo_nombre AS title,
                    CASE		
                        WHEN CARGO.cb_cargo_fksuperior IS NULL THEN
                        CARGO.cb_cargo_id 
                        WHEN CARGO.cb_cargo_fksuperior IS NOT NULL THEN
                        CARGO.cb_cargo_fksuperior 
                        END AS parent,
                    CASE
                        WHEN CARGO.cb_cargo_fktipo = 1 THEN
                            FALSE 
                        WHEN CARGO.cb_cargo_fktipo = 2 THEN
                            TRUE ELSE FALSE 
                        END AS isAssistant,
                    CASE
                        WHEN PER.cb_personal_nombre IS NULL THEN
                            0 
                        WHEN CARGO.cb_cargo_fktipo IS NOT NULL THEN
                            PER.cb_personal_id 
                        END AS id_personal 
                FROM cb_personal_cargo CARGO
                            LEFT JOIN (SELECT cb_personal_id, cb_personal_fkcargo, cb_personal_nombre, cb_personal_apellido
                                                FROM cb_personal_personal 
                                                WHERE cb_personal_estado = 1 ) PER ON CARGO.cb_cargo_id = PER.cb_personal_fkcargo
                            LEFT JOIN cb_personal_tipo_cargo TC ON TC.cb_tipo_cargo_id = CARGO.cb_cargo_fktipo 
                WHERE CARGO.cb_cargo_estado = 1
                ORDER BY 2";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $Personal = $stmt->fetchAll();
            $lista = $Personal;

            if($id == 0){
                $redireccion = new RedirectResponse('/organigrama');
                return $redireccion; //$dataorg = $lista;    
            }else{
                $refid = array();
                $aux = array();
                $refid[] = $id;
                $aux[] = $id;
                while(!empty($aux)){
                    $item = array_shift($aux);
                    $child = $this->get_children($lista, $item, $id);
                    $unite = array_merge($refid, $child);
                    $united = array_merge($aux, $child);
                    $refid = $unite;
                    $aux = $united;
                }

                $dataorg = [];
                foreach ($lista as $litem){
                    if(in_array($litem['key'], $refid)){
                        $dataorg [] = $litem;
                    }
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($dataorg, 'json');
            $data3 = json_encode($data2);
            $data4 = json_decode($data3);

            $sql2 = "SELECT MAX(cb_cargo_id) AS last_id FROM cb_personal_cargo";
            $stmt = $cx->prepare($sql2);
            $stmt->execute();
            $cantidad = $stmt->fetchAll();
            $data2 = $serializer->serialize($cantidad, 'json');
            $data3 = json_encode($data2);
            $data5 = json_decode($data3);

            $cargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
            $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
            $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
            $Personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(['estado' => '1', 'fkprocesoscargo' => null], ['nombre' => 'ASC']);

            return $this->render('personalcargo/organigrama.html.twig', array('organigrama' => $data4, 'cantidad' => $data5, 'personas'=>$Personal, 'cargo' => $cargo, 'parents' => $parent, 'children' => $children, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
        }catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}