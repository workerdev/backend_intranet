<?php

namespace App\Controller;
use App\Entity\Personal;
use App\Entity\PersonalCargo;
use App\Entity\EstadoPersonal;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use App\Entity\Sector;
use App\Entity\Area;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Rol;


class PersonalController extends Controller
{
    /**
     * @Route("/personal", name="personal_listar")
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
        $Personal = $this->getDoctrine()->getRepository(Personal::class)->findBy(array('estado' => '1'));
        $sector = $this->getDoctrine()->getRepository(Sector::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $area = $this->getDoctrine()->getRepository(Area::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $ProcesosCargo = $this->getDoctrine()->getRepository(PersonalCargo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $EstadoPersonal = $this->getDoctrine()->getRepository(EstadoPersonal::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('personal/index.html.twig', array('objects' => $Personal, 'tipo' => $ProcesosCargo, 'tipo2' => $EstadoPersonal, 'sector' => $sector, 'area' => $area, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }


    public function validate_data($data, $process)
    {
        if($process == ''){
            return false;
        }else{
            if($process == 'new'){
                foreach ($data as $key => $value) {
                    if(!in_array($key, ['idp', 'nombre', 'apellido', 'ci', 'correo', 'username', 'telefono', 'fnac', 'genero', 'fkprocesoscargo', 'fkestadopersonal', 'fksector', 'fkarea'])){
                        if($value == "" && $key != "idp") return false;
                    }
                }
                return true;
            }else{
                foreach ($data as $key => $value) {
                    if(!in_array($key, ['idp', 'nombre', 'apellido', 'ci', 'correo', 'username', 'telefono', 'fnac', 'genero', 'fkprocesoscargo', 'fkestadopersonal', 'fksector', 'fkarea'])){
                        if($value == '') return false;
                    }
                }
                return true;
            }
        }
    }


    /**
     * @Route("/personal_insertar", methods={"POST"}, name="personal_insertar")
     */
    public function insertar()
    {
        try {
            $file = $_FILES;
            $datos = $_POST;

            if($this->validate_data($datos, $datos['accion'])){
                //if(!empty($file['foto']['name']) || $datos['accion'] == 'update'){
                    $cx = $this->getDoctrine()->getManager();
                    $uploadedFile = '';
                    
                    $nombre = $datos['nombre'];
                    $apellido = $datos['apellido'];
                    $ci = $datos['ci'];
                    $correo = $datos['correo'];
                    $username = $datos['username'];
                    $telefono = $datos['telefono'];
                    $fechanac = $datos['fnac'];
                    $genero = $datos['genero'];
                    $procesos = $datos['fkprocesoscargo'];
                    $estado = $datos['fkestadopersonal'];
                    $sector = $datos['fksector'];
                    $area = $datos['fkarea'];
                    $foto = 'S/F';

                    if(intval($datos['idp']) > 0) $personal = $this->getDoctrine()->getRepository(Personal::class)->find($datos['idp']);
                    else $personal = new Personal();

                    $dt_name = str_replace(" ", "_", $nombre." ".$apellido);
                    $picture_name = strtolower($dt_name);   

                    if(!empty($file["foto"]["type"])){
                        $fileName = $file['foto']['name'];
                        $extension = substr($fileName, strrpos($fileName, "."), strlen($fileName));
                        $sourcePath = $file['foto']['tmp_name'];
                        $targetPath = $this->getParameter('Directorio_Personal') . '/' . $picture_name . $extension;
                        
                        if(move_uploaded_file($sourcePath, $targetPath)){
                            $uploadedFile = $picture_name;
                        }
                        $ruta = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                        $url = str_replace("\\", "/", $ruta);
                        $foto = $url;
                    }
                    if($datos['accion'] == 'update' && !empty($file['foto']['name']) || $datos['accion'] == 'new') $personal->setFoto($foto);
                    $personal->setNombre($nombre);
                    $personal->setApellido($apellido);
                    $personal->setGenero($genero);
                    $personal->setCi($ci);
                    $personal->setCorreo($correo);
                    $personal->setTelefono($telefono);
                    $personal->setFnac(new \DateTime($fechanac));
                    $personal->setUsername($username);
                    $personal->setEstado(1);

                    $procesos != '' ? $procesos = $this->getDoctrine()->getRepository(PersonalCargo::class)->find($procesos) : $procesos = null;
                    $estado != '' ? $estado = $this->getDoctrine()->getRepository(EstadoPersonal::class)->find($estado) : $estado = null;
                    $sector != '' ? $sector = $this->getDoctrine()->getRepository(Sector::class)->find($sector) : $sector = null;
                    $area != '' ? $area = $this->getDoctrine()->getRepository(Area::class)->find($area) : $area = null;
                    $personal->setFkPersonalCargo($procesos);
                    $personal->setFkestadopersonal($estado);
                    $personal->setFksector($sector);
                    $personal->setFkarea($area);

                    if($datos['accion'] == 'update'){
                        $cx->merge($personal);
                        $cx->flush();
                    }else{
                        $cx->persist($personal);
                        $cx->flush();
                    }

                    $resultado = array(
                        'response' => "Save",   
                        'success' => true,
                        'message' => 'Datos registrados correctamente.'
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                /*}else{
                    $resultado = array(
                        'response' => "NoFile",   
                        'success' => false,
                        'message' => 'Ingrese una imagen.'
                    );
                    $resultado = json_encode($resultado);
                    return new Response($resultado);
                }*/
            }else{
                $resultado = array(
                    'response' => "Empty",   
                    'success' => false,
                    'message' => 'Ingrese todo los datos.'
                );
                $resultado = json_encode($resultado);
                return new Response($resultado);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/personal_editar", methods={"POST"}, name="personal_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $personal = $this->getDoctrine()->getRepository(Personal::class)->find($id);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $fecha = $personal->getFnac();
            if($fecha != null) $fechaformat = $fecha->format('Y-m-d'); else $fechaformat = $fecha;
            $sendinf = [
                "id" => $personal->getId(),
                "nombre"=> $personal->getNombre(),
                "apellido" => $personal->getApellido(),
                "ci"=> $personal->getCi(),
                "correo" => $personal->getCorreo(),
                "username" => $personal->getUsername(),
                "telefono" => $personal->getTelefono(),
                "fnac"=> $fechaformat,
                "genero" => $personal->getGenero(),
                "fkprocesoscargo" => $personal->getFkPersonalCargo()->getId(),
                "procesoscargo" => $personal->getFkPersonalCargo()->getNombre(),
                "fkestadopersonal"=> $personal->getFkestadopersonal(),
                "fksector"=> $personal->getFksector(),
                "fkarea"=> $personal->getFkarea()

            ];
            $json = $serializer->serialize($sendinf, 'json');

            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Personal listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }


    /**
     * @Route("/personal_eliminar", methods={"POST"}, name="personal_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $personal = $this->getDoctrine()->getRepository(Personal::class)->find($id);

            $personal->setEstado(2);
            $cx->persist($personal);
            $cx->flush();

            $resultado = array('response'=>"El ID modificado es: ".$personal->getId().".",'success' => true,
                'message' => 'Personal dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}