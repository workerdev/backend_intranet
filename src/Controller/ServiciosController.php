<?php

namespace App\Controller;

use App\Entity\Accidentes;
use App\Entity\Catalogo;
use App\Entity\CategoriaNoticia;
use App\Entity\ControlCorrelativo;
use App\Entity\Correlativo;
use App\Entity\Correo;
use App\Entity\DatoEmpresarial;
use App\Entity\DelegacionAutoridad;
use App\Entity\Documento;
use App\Entity\Enlaces;
use App\Entity\EstadoCorrelativo;
use App\Entity\FichaProcesos;
use App\Entity\Files;
use App\Entity\Impacto;
use App\Entity\Menu;
use App\Entity\Noticia;
use App\Entity\NoticiaCategoria;
use App\Entity\OrganigramaGerencia;
use App\Entity\Permiso;
use App\Entity\Personal;
use App\Entity\PersonalCargo;
use App\Entity\Probabilidad;
use App\Entity\ResponsabilidadSocial;
use App\Entity\RiesgosOportunidades;
use App\Entity\Rol;
use App\Entity\SIG;
use App\Entity\TipoCRO;
use App\Entity\TipoNota;
use App\Entity\Turno;
use App\Entity\Unidad;
use App\Entity\Usuario;
use App\Entity\Auditoria;
use App\Entity\SectorAudit;
use App\Entity\AuditoriaEquipo;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\AccionEficacia;
use App\Entity\Fortaleza;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Ldap\Exception\ConnectionException;
use Symfony\Component\Ldap\Ldap;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Translation\Loader\ArrayLoader;
use Symfony\Component\Translation\Translator;


class ServiciosController extends AbstractController
{
    private $encoders_json;
    private $normalizers_json;
    private $serializer_json;
    private $serializer_obj;

    public function __construct()
    {
        /* Array to Json */
        $this->encoders_json = [new XmlEncoder(), new JsonEncoder()];
        $this->normalizers_json = [new ObjectNormalizer()];
        $this->serializer_json = new Serializer($this->normalizers_json, $this->encoders_json);

        /* Array to Object */
        $this->serializer_obj = new Serializer([new ObjectNormalizer()]);
    }

    /**
     * @Route("/enlace_lista", methods={"GET"}, name="enlace_lista")
     */
    public function mostrarenlace(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $enlace = $cx->getRepository(Enlaces::class)->findBy(array('estado' => '1'));
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($enlace, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/menu_lista", methods={"GET"}, name="menu_lista")
     */

    public function mostrarmenu(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $menu = $cx->getRepository(Menu::class)->findBy(
                ['estado' => '1'],
                ['id' => 'ASC']
            );
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($menu, 'json');

            return new Response($data);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/enviarcorreo", methods={"POST"}, name="enviarcorreo")
     */
    public function enviarcorreo(Request $request, \Swift_Mailer $mailer)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($request->getContent(), true);
            $asunto = $sx['asunto'];
            $cuerpo = $sx['cuerpo'];
            $remitente = $sx['remitente'];
            $login = $sx['login'];

            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");

            $message = (new \Swift_Message('Asunto:   ' . $asunto . '  - COMITÉ DE ÉTICA'))
            ->setFrom($_SERVER['COMITE_ETICA_REMITENTE']) 
            ->setTo($_SERVER['COMITE_ETICA_DESTINATARIO']) 
            ->setBody($this->renderView('mail/index.html.twig',
                array(
                    'remitente' => $remitente,
                    'asunto' => $asunto,
                    'mensaje' => $cuerpo,
                    'adicional' => array('fecha' => $fecha, 'url' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                )
            ), 'text/html');

            $mailer->send($message);

            $resultado = 'OK';

            $correo = new Correo();
            $correo->setAsunto($asunto);
            $correo->setMensaje($cuerpo);
            $correo->setTipo('COMITÉ DE ÉTICA');
            $correo->setFecha(new \DateTime($fecha));
            $correo->setEstado(1);

            $fkusuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('username' => $login, 'estado' => '1'));
            $fkusuario[0] != '' ? $fkusuario[0] = $this->getDoctrine()->getRepository(Usuario::class)->find($fkusuario[0]) : $fkusuario[0] = null;
            $correo->setFkusuario($fkusuario[0]);

            $cx->persist($correo);
            $cx->flush();

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/enviarcorreo_buzon", methods={"POST"}, name="enviarcorreo_buzon")
     */
    public function enviarcorreo_buzon(Request $request, \Swift_Mailer $mailer)
    {
        try {

            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($request->getContent(), true);
            $asunto = $sx['asunto'];
            $cuerpo = $sx['cuerpo'];
            $remitente = $sx['remitente'];
            $login = $sx['login'];

            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");

            $message = (new \Swift_Message('Asunto:   ' . $asunto . '  - BUZÓN DE SUGERENCIAS'))
            ->setFrom($_SERVER['BUZON_SUGERENCIA_REMITENTE']) 
            ->setTo($_SERVER['BUZON_SUGERENCIA_DESTINATARIO']) 
            ->setBody($this->renderView('mail/index.html.twig',
                array(
                    'remitente' => $remitente,
                    'asunto' => $asunto,
                    'mensaje' => $cuerpo,
                    'adicional' => array('fecha' => $fecha, 'url' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                )
            ), 'text/html');

            $mailer->send($message);

            $resultado = 'OK';

            $correo = new Correo();
            $correo->setAsunto($asunto);
            $correo->setMensaje($cuerpo);
            $correo->setTipo('BUZÓN DE SUGERENCIAS');
            $correo->setFecha(new \DateTime($fecha));
            $correo->setEstado(1);

            $fkusuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('username' => $login, 'estado' => '1'));
            $fkusuario[0] != '' ? $fkusuario[0] = $this->getDoctrine()->getRepository(Usuario::class)->find($fkusuario[0]) : $fkusuario[0] = null;
            $correo->setFkusuario($fkusuario[0]);

            $cx->persist($correo);
            $cx->flush();

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/organigrama2", methods={"GET"}, name="organigrama2")
     */
    public function organigrama()
    {
        try {
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

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Personal, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    public function get_children($array, $id, $idf)
    {
        $children = [];
        $aux = $array;
        foreach ($aux as $ditem){
            if($ditem['parent'] == $id && $ditem['key'] != $ditem['parent']) array_push($children, $ditem['key']);
        }
        return $children;
    }

    /**
     * @Route("/organigrama_por_cargo", methods={"POST"}, name="organigrama_por_cargo")
     */
    public function organigrama_por_cargo(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];

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
            $personal = $stmt->fetchAll();

            $lista = $personal;

            if($id == 0){
                $dataorg = $personal;
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

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/directoriovista", methods={"GET"}, name="directoriovista")
     */
    public function directorio(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $dato_empresarial = $cx->getRepository(Personal::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);

            $data_directory = array();
            foreach ($dato_empresarial as $dt_emp) {
                $dato = (object) $dt_emp;
                $cargo = $dato->getFkPersonalCargo();
                if ($cargo == null) $cargo = 'Sin Asignar';
                else $cargo = $dato->getFkPersonalCargo()->getNombre();

                $info = [
                    "nombre" => $dato->getNombre(),
                    "apellido" => $dato->getApellido(),
                    "correo" => $dato->getCorreo(),
                    "telefono" => $dato->getTelefono(),
                    "fksector" => $dato->getFksector(),
                    "fkarea" => $dato->getFkarea(),
                    "genero" => $dato->getGenero(),
                    "foto" => $dato->getFoto(),
                    "cargo" => $cargo
                ];
                $data_directory[] = $info;
            }       

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($data_directory, 'json');

            return new jsonResponse(json_decode($json));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/datoempresarial_lista", methods={"GET"}, name="datoempresarial_lista")
     */
    public function mostrar(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $DatoEmpresarial = $cx->getRepository(DatoEmpresarial::class)->findBy(array('estado' => '1'));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $data = $serializer->normalize($DatoEmpresarial, null, array('attributes' => array('descripcion', 'fktipodatoempresarial' => ['id', 'nombre'])));

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($data, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/link_vista", methods={"GET"}, name="link_vista")
     */
    public function links(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $enlaces = $cx->getRepository(Enlaces::class)->findBy(array('estado' => '1'));
            //$serializer = new Serializer(array(new ObjectNormalizer()));
            // $data = $serializer->normalize($enlaces, null, array('attributes' => array('nombre','apellido','ci','correo','telefono')));

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($enlaces, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/files_vista", methods={"GET"}, name="files_vista")
     */
    public function files(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $Files = $cx->getRepository(Files::class)->findBy(array('estado' => '1'));
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Files, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/turno_service", methods={"GET"}, name="turno_vista")
     */
    public function turno(Request $request)
    {
        try {
            $turnos = $this->getDoctrine()->getRepository(Turno::class)->findBy(array('estado' => '1'));
            $datos = array();
            foreach ($turnos as $turno) {
                $fbg = $turno->getFechainicio();
                if($fbg != null) $result = $fbg->format('Y-m-d'); else $result = $fbg;
                $fnd = $turno->getFechafin();
                if($fnd != null) $fresult = $fnd->format('Y-m-d'); else $fresult = $fnd;
                $sendinf = [
                    "id" => $turno->getId(),
                    "telefono" => $turno->getTelefono(),
                    "celular" => $turno->getCelular(),
                    "fechainicio" => $result,
                    "fechafin" => $fresult,
                    "fktipo" => $turno->getFktipo(),
                    "fkpersonal" => $turno->getFkpersonal()->getId(),
                    "personal" => $turno->getFkpersonal()->getNombre().' '.$turno->getFkpersonal()->getApellido()             
                ];
                $datos[] = $sendinf;
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($datos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/tipoempresarial_lista", methods={"GET"}, name="tipoempresarial_lista")
     */
    public function getTipoEmpresarialLista()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT T
                    .cb_tipodatoempresarial_id AS ID,
                    T.cb_tipodatoempresarial_nombre AS nombre,
                    D.cb_datoempresarial_descripcion AS descripcion
                    FROM
                    cb_cfg_tipodatoemp
                    T JOIN cb_configuracion_datoempresarial D ON T.cb_tipodatoempresarial_id = D.cb_datoempresarial_fktipodatoempresarial
                    WHERE
                    D.cb_datoempresarial_estado = 1
                    AND T.cb_tipodatoempresarial_estado = 1
                    ";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($data, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");

        }
    }

    /**
     * @Route("/last_file_service", methods={"GET"}, name="last_file_service")
     */
    public function lastFileUpload(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_file_ruta as ruta, cb_file_tipo as tipo
                    FROM cb_comunicacion_file
                    WHERE cb_file_estado = 1
                    ORDER BY cb_file_id DESC
                    LIMIT 1 ";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $Turno = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Turno, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/galeriaList", methods={"GET"}, name="galeriaList")
     */
    public function galeriaList(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT
                    galeria.cb_galeria_id as galeria_id, galeria.cb_galeria_nombre as galeria_nombre, case
                    when N.cantidad ISNULL then 0
                    else N.cantidad
                    end AS file_cantidad, file.cb_file_id as file_id, file.cb_file_ruta as file_ruta, file.cb_file_tipo as file_tipo
                    FROM
                    cb_comunicacion_file File
                    JOIN (
                    SELECT MAX
                    ( F.cb_file_id ) AS file,
                    G.cb_galeria_id AS galeria,
                    count(F.cb_file_id) as cantidad
                    FROM
                    cb_comunicacion_galeria
                    G JOIN cb_comunicacion_file F ON G.cb_galeria_id = F.cb_galeria_fkgaleria
                    GROUP BY
                    G.cb_galeria_id
                    ) N ON File.cb_file_id = N.file RIGHT JOIN cb_comunicacion_galeria Galeria ON Galeria.cb_galeria_id = N.galeria";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $Turno = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Turno, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/galeriaIndividualService", methods={"POST"}, name="galeriaIndividualService")
     */
    public function galeriaIndividual(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($request->getContent(), true);
            $galeria_id = $sx['galeria_id'];
            $Files = $cx->getRepository(Files::class)->findBy(array('estado' => '1', 'fkgaleria' => $galeria_id));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $data = $serializer->normalize($Files, null, array('attributes' => array('id', 'ruta', 'tipo', 'fkgaleria' => ['nombre'])));
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($data, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/noticias_vista", methods={"GET"}, name="noticias_vista")
     */
    public function noticias(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $NoticiaCategoria = $cx->getRepository(NoticiaCategoria::class)->findAll();
            //$serializer = new Serializer(array(new ObjectNormalizer()));
            // $data = $serializer->normalize($enlaces, null, array('attributes' => array('nombre','apellido','ci','correo','telefono')));

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($NoticiaCategoria, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");

        }
    }

    /**
     * @Route("/getResponsabilidadService", methods={"GET"}, name="getResponsabilidadService")
     */
    public function getResponsabilidadService(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $Files = $cx->getRepository(ResponsabilidadSocial::class)->findBy(array('estado' => '1'));
            //                $serializer = new Serializer(array(new ObjectNormalizer()));
            //                $data = $serializer->normalize($Files, null, array('attributes' => array('id', 'ruta', 'tipo', 'fkgaleria' => ['nombre'])));
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Files, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/getLastNoticiaCategoria", methods={"GET"}, name="lastNoticiaCategoria")
     */
    public function lastNoticiaCategoria(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT NOTICIA.cb_noticia_id as id_noticia, NOTICIA.cb_noticia_titulo as titulo_noticia,NOTICIA.cb_noticia_contenido as contenido_noticia,NOTICIA.cb_noticia_contenido as contenido_noticia, NOTICIA.cb_noticia_subtitulo as subtitulo_noticia, CAT.cb_categorianoticia_nombre as nombre_categoria, CAT.cb_categorianoticia_id as categoria_id
                    FROM cb_comunicacion_noticia NOTICIA join (
                    SELECT MAX
                    ( N.cb_noticia_id ) AS noticia,
                    NC.cb_noticiacategoria_fkcategoria AS id_categoria
                    FROM
                    cb_comunicacion_noticia N
                    JOIN cb_comunicacion_noticiacategoria NC ON N.cb_noticia_id = NC.cb_noticiacategoria_fknoticia
                    WHERE
                    N.cb_noticia_tipo = 'Noticia Empresa'
                    AND N.cb_noticia_estado = 1
                    GROUP BY
                    NC.cb_noticiacategoria_fkcategoria ) NOTCAT on NOTICIA.cb_noticia_id = NOTCAT.noticia join cb_comunicacion_categorianoticia CAT on CAT.cb_categorianoticia_id = NOTCAT.id_categoria
                    WHERE CAT.cb_categorianoticia_estado = 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $Turno = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Turno, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");

        }
    }

    /**
     * @Route("/getLastPrensaCategoria", methods={"GET"}, name="getLastPrensaCategoria")
     */
    public function lastPrensaCategoria(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT NOTICIA.cb_noticia_id as id_noticia, NOTICIA.cb_noticia_titulo as titulo_noticia, NOTICIA.cb_noticia_subtitulo as subtitulo_noticia,NOTICIA.cb_noticia_contenido as contenido_noticia, CAT.cb_categorianoticia_nombre as nombre_categoria, CAT.cb_categorianoticia_id as categoria_id
                    FROM cb_comunicacion_noticia NOTICIA join (
                    SELECT MAX
                    ( N.cb_noticia_id ) AS noticia,
                    NC.cb_noticiacategoria_fkcategoria AS id_categoria
                    FROM
                    cb_comunicacion_noticia N
                    JOIN cb_comunicacion_noticiacategoria NC ON N.cb_noticia_id = NC.cb_noticiacategoria_fknoticia
                    WHERE
                    N.cb_noticia_tipo = 'Noticia Prensa'
                    AND N.cb_noticia_estado = 1
                    GROUP BY
                    NC.cb_noticiacategoria_fkcategoria ) NOTCAT on NOTICIA.cb_noticia_id = NOTCAT.noticia join cb_comunicacion_categorianoticia CAT on CAT.cb_categorianoticia_id = NOTCAT.id_categoria
                    WHERE CAT.cb_categorianoticia_estado = 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $Turno = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Turno, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");

        }
    }

    /**
     * @Route("/catalogo_vista", methods={"GET"}, name="catalogo_vista")
     */
    public function catalogo(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $Catalogo = $cx->getRepository(Catalogo::class)->findBy(array('estado' => '1'));
            //$serializer = new Serializer(array(new ObjectNormalizer()));
            // $data = $serializer->normalize($enlaces, null, array('attributes' => array('nombre','apellido','ci','correo','telefono')));

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Catalogo, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");

        }
    }

    ////////////////// RETORNAR UN NUMERO DE DIAS SIN ACCIDENTE QUE ES LA DIFERENCIA DE LAS DOS FECHAS

    /////////////////////
    /**
     * @Route("/accidente_vista", methods={"GET"}, name="accidente_vista")
     */
    public function accidente(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $accidentes = $this->getDoctrine()
                ->getRepository(Accidentes::class)->findAll();

            $valor = array();
            foreach ($accidentes as $accidente) {
                $accdt = (object) $accidente;
                $dato = $this->getDoctrine()->getRepository(Accidentes::class)->find($accdt->getId());
                $ini = $dato->getFechaInicio();
                $fin = date_create(date('Y-m-d'));
                $difh = date_diff($ini, $fin);
                $dias = substr($difh->format('%R%a'), 1);

                $valor[0] = $dias;
            }
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($valor, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/noticia_tipo", methods={"POST"}, name="noticia_tipo")
     */
    public function noticiaTipo(Request $request)
    {
        try {
            // $tipo = $request->get("tipo");
            $sx = json_decode($request->getContent(), true);
            $tipo = $sx['tipo'];
            $tipo2 = $sx['tipo3'];
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "select n.cb_noticia_id as id_noticia,n.cb_noticia_titulo as titulo_noticia, n.cb_noticia_subtitulo as subtitulo_noticia,
                    n.cb_noticia_fecha as fecha_noticia,n.cb_noticia_tipo as tipo_noticia, c.cb_categorianoticia_id as id_categoria, c.cb_categorianoticia_nombre as nombre_categoria
                    from cb_comunicacion_noticia n, cb_comunicacion_categorianoticia c, cb_comunicacion_noticiacategoria nc
                    where (cb_noticia_tipo =:tipo or cb_noticia_tipo =:tipo3) and nc.cb_noticiacategoria_fknoticia=n.cb_noticia_id and
                    nc.cb_noticiacategoria_fkcategoria = c.cb_categorianoticia_id and n.cb_noticia_estado = 1 and c.cb_categorianoticia_estado = 1
                    ORDER BY n.cb_noticia_fecha DESC";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['tipo' => ($tipo), 'tipo3' => ($tipo2)]);
            $Turno = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Turno, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/getnoticias_categoria", methods={"POST"}, name="categorianoticia")
     */
    public function categoriaNoticia(Request $request)
    {
        try {
            // $tipo = $request->get("tipo");
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $tipo = $sx['tipo'];
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "select N.cb_noticia_id as id_noticia, N.cb_noticia_titulo as titulo_noticia, N.cb_noticia_subtitulo as subtitulo_noticia, N.cb_noticia_contenido as contenido_noticia, N.cb_noticia_fecha as fecha_noticia
                    from cb_comunicacion_noticiacategoria NC
                    join cb_comunicacion_categorianoticia CN on NC.cb_noticiacategoria_fkcategoria = CN.cb_categorianoticia_id join cb_comunicacion_noticia N on NC.cb_noticiacategoria_fknoticia = N.cb_noticia_id
                    WHERE CN.cb_categorianoticia_id=:id and N.cb_noticia_estado = 1 and N.cb_noticia_tipo =:tipo
                    ORDER BY n.cb_noticia_fecha DESC";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id), 'tipo' => ($tipo)]);
            $Turno = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Turno, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
    /**
     * @Route("/getNoticia", methods={"POST"}, name="getNoticia")
     */
    public function getNoticia(Request $request)
    {
        try {
            // $tipo = $request->get("tipo");
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_noticia_titulo as titulo_noticia, cb_noticia_subtitulo as subtitulo_noticia, cb_noticia_contenido as contenido_noticia, cb_noticia_fecha as fecha_noticia FROM
                    cb_comunicacion_noticia N
                    WHERE N.cb_noticia_id =:id and N.cb_noticia_estado = 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $Noticia = $stmt->fetchAll();

            $sql2 = "SELECT CN.cb_categorianoticia_nombre as nombre_categoria
                    FROM cb_comunicacion_categorianoticia CN join cb_comunicacion_noticiacategoria NC on CN.cb_categorianoticia_id = NC.cb_noticiacategoria_fkcategoria
                    WHERE NC.cb_noticiacategoria_fknoticia =:id ";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $Categoria = $stmt->fetchAll();

            array_push($Noticia, $Categoria);
            //            $Noticia->categoria = $Categoria;

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($Noticia, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
    /**
     * @Route("/getCumpleaneros", methods={"GET"}, name="getCumpleañeros")
     */
    public function getCumpleañeros()
    {
        try {
            // $tipo = $request->get("tipo");
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT
                    concat(cb_personal_nombre,' ',cb_personal_apellido) as nombre,
                    cb_personal_fnac as fecha, cb_personal_genero as genero, cb_personal_foto as foto,
                    CASE
                    WHEN concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)) =
                    concat(date_part('year', NOW()),'-',date_part('month', NOW()),'-',date_part('day', NOW()))
                    THEN 'HOY'
                    ELSE
                    CASE
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 7
                    THEN 'DOMINGO'
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 1
                    THEN 'LUNES'
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 2
                    THEN 'MARTES'
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 3
                    THEN 'MIERCOLES'
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 4
                    THEN 'JUEVES'
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 5
                    THEN 'VIERNES'
                    WHEN extract(isodow from date (concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)))) = 6
                    THEN 'SABADO'
                    END
                    END AS DIA
                    FROM
                    cb_personal_personal
                    WHERE
                    cb_personal_estado = 1
                    AND
                    extract('week' from cast((date_part('year',now())||'-'||date_part('month', cb_personal_fnac)||'-'||date_part('day', cb_personal_fnac)) as date)) = extract('week' from now())
                    ORDER BY concat(date_part('year', NOW()),'-',date_part('month', cb_personal_fnac),'-',date_part('day', cb_personal_fnac)) ASC;";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $cumpleañeros = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($cumpleañeros, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/login2", methods={"POST"}, name="login2")
     */
    public function login2(Request $request)
    {

        $sx = json_decode($request->getContent(), true);
        $usuario1 = $sx['usuario'];
        $password1 = $sx['password'];
        $dn = "cn=read-only-admin,dc=example,dc=com";
        $password = 'password';
        $ldap = Ldap::create('ext_ldap', array(
            'host' => 'ldap.forumsys.com',
            'encryption' => 'none',
            'port' => '389',
        ));
        //  $variable=$ldap->bind($dn, $password);

        // if($variable==True)
        //{
        //   return new JsonResponse('False');
        //  }
        return new JsonResponse('True');

        // $query =  $ldap->query('dc=example,dc=com', '(&(ou=mathematicians))');
        //   $results = $query->execute()->toArray();

        //foreach ($results as $entry) {}

    }

    /************************************************************************************************************************************************************************************************************************
    /*                                                                                                                                                                                                                      /
    /*      1.- PROCESOS                                                                                                                                                                                                    /
    /*                                                                                                                                                                                                                      /
     ***********************************************************************************************************************************************************************************************************************/

    /************************************************************************************/
    /*                              * FICHAS DE PROCESOS                                 /
    /*                                                                                   /
    /************************************************************************************/

    /* ORDENADO POR GERENCIAS ***********/
    /* DESARROLLADOR: JUAN CARLOS CAMPOS*/

    /**
     * @Route("/sigprocfcgerencia", methods={"GET"}, name="procesogerencia")
     */
    public function procesogerencia()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gas_id AS id_area, cb_gas_codigo as ID, cb_gerencia_nombre AS GERENCIA, cb_area_nombre AS AREA, cb_sector_nombre AS SECTOR,
                cb_ficha_procesos_nombre AS NOMBRE_DEL_PROCESO, cb_ficha_procesos_codproceso AS CODIGO_DEL_PROCESO, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS RESPONSABLE,
                cb_ficha_procesos_id AS idfc
            FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector, cb_usuario_usuario
            WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND
                cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id
            ORDER BY 6";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($query, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");

        }
    }

    /* ORDENADO POR GERENCIAS DETALLE ***/
    /* DESARROLLADOR: JUAN CARLOS CAMPOS*/

    /**
     * @Route("/sigprocfcgerenciadetalle", methods={"POST"}, name="sigprocfcgerenciadetalle ")
     */
    public function sigprocfcgerenciadetalle(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_ficha_procesos_id AS ID,cb_gas_codigo AS ID_AREA,cb_ficha_procesos_codproceso AS COD_PROCESO,cb_ficha_procesos_nombre AS NOMBRE_PROCESO,
                        cb_ficha_procesos_objetivo AS OBJETIVO_PROCESO,cb_ficha_procesos_vigente AS VIGENTE,cb_ficha_procesos_version AS VERSION,
                        cb_ficha_procesos_fechaemision AS FECHA_EMISION,cb_ficha_procesos_entradasrequeridas AS ENTRADAS_REQUERIDAS,
                        cb_ficha_procesos_salidasesperadas AS SALIDAS_ESPERADAS,cb_ficha_procesos_recursosnecesarios AS RECURSOS_NECESARIOS,cb_ficha_procesos_req_legales as REQ_LEGALES
                    FROM cb_procesos_ficha_procesos,cb_proc_gas g, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector
                    WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fksector=cb_sector_id AND
                        cb_ficha_procesos_id=:id";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $FichaProc = $stmt->fetchAll();
            $sql2 = "SELECT cb_gas_codigo AS ID_AREA, cb_gerencia_nombre AS GERENCIA,cb_area_nombre AS AREA,cb_sector_nombre AS SECTOR, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS RESPONSABLE,
                        cb_gas_vigente as VIGENTE
                    FROM cb_proc_gas ,cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector, cb_procesos_ficha_procesos, cb_usuario_usuario
                    WHERE cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id AND
                        cb_gas_id=cb_ficha_procesos_fkareagerenciasector AND cb_ficha_procesos_estado=1 AND cb_ficha_procesos_id=:id;";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $Gas = $stmt->fetchAll();

            $sql3 = "SELECT cb_documento_codigo AS COD_DOCUMENTO,cb_ficha_procesos_codproceso AS COD_PROCESO,cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
                        cb_documento_titulo AS TITULO_DOC,cb_documento_versionvigente AS VERSION_VIGENTE,cb_documento_fechaPublicacion AS FECHA_PUBLICACION,
                        cb_usuario_nombre AS APROBADO_POR,cb_documento_carpetaOperativa AS CARPETA_OPERATIVA,
                        cb_documento_vinculoarchivodig AS vinculo_archivo_digital, cb_documento_vinculodiagflujo AS vinculo_diagrama_de_flujo
                    FROM cb_gestion_documento, cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
                    WHERE cb_documento_fkficha = cb_ficha_procesos_id AND
                        cb_documento_fktipo=cb_tipo_documento_id AND
                        cb_documento_fkaprobador=cb_usuario_id AND
                        cb_documento_fkficha=:id";

            $stmt = $cx->prepare($sql3);
            $stmt->execute(['id' => ($id)]);
            $Doc = $stmt->fetchAll();

            $sql4 = "SELECT cb_riesgos_oportunidades_id AS ID_CRO, cb_tipocro_nombre AS TIPO_CRO, cb_ficha_procesos_codproceso AS COD_PROCESO,
                        cb_riesgos_oportunidades_origen AS ORIGEN_CRO, cb_riesgos_oportunidades_descripcion AS DESCRIPCION_CRO,
                        cb_riesgos_oportunidades_analisiscausaraiz AS ANALISIS_CAUSA_RAIZ, cb_riesgos_oportunidades_accion AS ACCION,
                        cb_probabilidad_ocurrencia_valor AS PROBABILIDAD, cb_impacto_valor AS IMPACTO,
                        cb_riesgos_oportunidades_fecha AS FECHA_IMPLEMENTACION, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS RESPONSABLE_ACCION,
                        cb_riesgos_oportunidades_estadocro AS ESTADO
                    FROM cb_proc_crom, cb_procesos_ficha_procesos, cb_procesos_tipocro, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_fkficha = cb_ficha_procesos_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND
                        cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND
                        cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_fkficha=:id;";

            $stmt = $cx->prepare($sql4);
            $stmt->execute(['id' => ($id)]);
            $Riesgo = $stmt->fetchAll();

            $cx = $this->getDoctrine()->getManager();

            $dqlIndicador = "SELECT ip.id AS ID,fi.nombre AS COD_PROCESO, ip.codigo AS CODIGO_INDICADOR, ip.objetivo AS OBJETIVO_INDICADOR,
                                ip.descripcion AS DESCRIPCION_INDICADOR, u.nombre AS UNIDAD,ip.metamensual AS META_MENSUAL,
                                ip.metaanual AS META_ANUAL, ip.vigente AS VIGENTE
                            FROM App\Entity\IndicadorProceso ip
                            JOIN ip.fkficha fi
                            JOIN ip.fkresponsable re
                            JOIN ip.fkunidad u
                            WHERE fi.id=:fichaid";

            $query = $cx->createQuery($dqlIndicador);
            $query->setParameter('fichaid', $id);
            $indicador = $query->getResult();

            $elementos = array('Ficha' => $FichaProc, 'Gas' => $Gas, 'Documentos' => $Doc, 'Riesgo' => $Riesgo, 'Indicador' => $indicador);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* ORDENADO POR PROCESOS ************/
    /* DESARROLLADOR: JUAN CARLOS CAMPOS*/

    /**
     * @Route("/sigprocfcprocesos", methods={"GET"}, name="procesoprocesos")
     */
    public function sigprocesoprocesos()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_ficha_procesos_nombre AS nombre_del_proceso, cb_ficha_procesos_codproceso AS codigo_proceso, cb_gas_codigo AS id,
                        cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable,
                        cb_ficha_procesos_id AS idfc, cb_gas_id AS id_area
                    FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector, cb_usuario_usuario
                    WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND
                        cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id
                    ORDER BY 2";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($query, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**ORDENADO POR PROCESOS DETALLE */

    /***************************************************************************************************************************************************************************************************************************************************************/

    /*************************************************************************************/
    /*                              * INDICADORES                                        */
    /*                                                                                   */
    /*************************************************************************************/

    /* INDICADORES LISTA *****************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/indicadores", methods={"GET"}, name="indicadores")
     */
    public function indicadores()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gas_codigo AS id, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_procesos_codproceso AS cod_proceso,
                        cb_indicador_proceso_codigo AS codigo_indicador, cb_indicador_proceso_objetivo AS objetivo_del_indicador,
                        cb_indicador_proceso_descripcion AS descripcion_del_indicador
                    FROM cb_configuracion_gerencia, cb_procesos_area, cb_proc_gas, cb_procesos_ficha_procesos, cb_procesos_indicador_proceso
                    WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id
                        AND cb_indicador_proceso_fkficha=cb_ficha_procesos_id AND cb_indicador_proceso_estado=1 ORDER BY 2";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($query) > 0) {
                $data2 = $serializer->serialize($query, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* INDICADORES DETALLE ***************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detalleindicador", methods={"POST"}, name="detalleindicador")
     */
    public function detalleindicador(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $codigo = $sx['codigo'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_indicador_proceso_id AS id, cb_ficha_procesos_codproceso AS cod_proceso, cb_indicador_proceso_codigo AS codigo_indicador,
                        cb_indicador_proceso_objetivo AS objetivo_indicador, cb_indicador_proceso_descripcion AS descripcion_indicador,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_elaboracion, cb_indicador_proceso_formula AS formula, cb_unidad_medida_nombre AS unidad,
                        cb_indicador_proceso_metamensual AS meta_mensual, cb_indicador_proceso_metaanual AS meta_anual, cb_indicador_proceso_vigente AS vigente
                    FROM cb_procesos_indicador_proceso, cb_procesos_ficha_procesos, cb_usuario_usuario, cb_procesos_unidad_medida
                    WHERE cb_indicador_proceso_fkficha=cb_ficha_procesos_id AND cb_indicador_proceso_fkresponsable=cb_usuario_id
                        AND cb_indicador_proceso_fkunidad=cb_unidad_medida_id AND cb_indicador_proceso_estado=1 AND cb_indicador_proceso_codigo=:codigo";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['codigo' => ($codigo)]);
            $indicador = $stmt->fetchAll();

            $sql2 = "SELECT cb_seguimiento_indicador_id AS id, cb_indicador_proceso_codigo AS codigo_indicador, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS resp_seguimiento,
                        cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes, cb_seguimiento_indicador_valor AS indicador, cb_seguimiento_indicador_observacion AS observaciones
                    FROM cb_procesos_indicador_proceso, cb_proceso_seg_indicador, cb_usuario_usuario
                    WHERE cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_estado=1 AND
                        cb_indicador_proceso_fkresponsable=cb_usuario_id AND cb_indicador_proceso_codigo=:codigo";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['codigo' => ($codigo)]);
            $segindicador = $stmt->fetchAll();

            $elementos = array('indicador' => $indicador, 'segindicador' => $segindicador);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* INDICADORES SEGUIMIENTO LISTA *****/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/indicadorseg", methods={"GET"}, name="indicadorseg")
     */
    public function indicadorseg()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_del_proceso, cb_indicador_proceso_codigo AS codigo_del_indicador,
                        cb_indicador_proceso_objetivo AS objetivo_del_indicador, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_del_seguimiento,
                        cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes,
                        cb_seguimiento_indicador_valor AS valor_del_indicador, cb_seguimiento_indicador_observacion AS observaciones
                    FROM cb_configuracion_gerencia, cb_proc_gas, cb_procesos_ficha_procesos, cb_procesos_indicador_proceso, cb_proceso_seg_indicador, cb_usuario_usuario
                    WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_indicador_proceso_fkficha=cb_ficha_procesos_id AND
                        cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_fkresponsable=cb_usuario_id AND cb_seguimiento_indicador_estado=1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($query) > 0) {
                $data2 = $serializer->serialize($query, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/

    /*************************************************************************************/
    /*                              * CAMBIO RIESGOS                                     */
    /*                                                                                   */
    /*************************************************************************************/

    /************************************************************************************/

    /* ORDENADO POR GERENCIAS (LISTA) ***/
    /* DESARROLLADOR: EDWARD RIOS       */
    /**
     * @Route("/sigprocriesgogerencia", methods={"GET"}, name="sigprocriesgogerencia")
     */
    public function sigprocpiesgogerencia(Request $request)
    {
        try {
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new DateTimeNormalizer(), new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $dqlDoc = "SELECT gas.codigo AS ID_GAS, ge.nombre AS GERENCIA, ar.nombre AS AREA, fi.codproceso AS COD_PROCESO, ro.id AS ID_CROCM,
                        ti.nombre AS TIPO_CROCM, ro.origen AS ORIGEN_CROCM , ro.descripcion AS DESCRIPCION_CROCM
                    FROM App\Entity\RiesgosOportunidades ro
                    JOIN ro.fktipo ti
                    JOIN ro.fkficha fi
                    JOIN fi.fkareagerenciasector gas
                    JOIN gas.fkgerencia ge
                    JOIN gas.fkarea ar
                    JOIN ro.fkprobabilidad pro
                    JOIN ro.fkimpacto imp";
            $query = $cx->createQuery($dqlDoc);
            $indicador = $query->getResult();
            $format = "Y-m-d";
            $data2 = $serializer->serialize($indicador, 'json');
            return new Response($data2);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* ORDENADO POR GERENCIAS (LISTA DETALLE) ***/
    /* DESARROLLADOR: EDWARD RIOS               */

    /**
     * @Route("/crocmdetalle", methods={"POST"}, name="crocmdetalle")
     */
    public function crocmdetalle(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_riesgos_oportunidades_id AS \"ID_CROCM\", cb_tipocro_nombre AS \"TIPO_CRO\", cb_ficha_procesos_codproceso AS \"COD_PROCESO\",
                        cb_riesgos_oportunidades_origen AS \"ORIGEN_CROCM\", cb_riesgos_oportunidades_descripcion AS \"DESCRIPCION_CROCM\",
                        cb_riesgos_oportunidades_analisiscausaraiz AS \"ANALISIS_CAUSA_RAIZ\", cb_probabilidad_ocurrencia_nombre AS \"PROBABILIDAD\",
                        cb_impacto_nombre AS \"IMPACTO\", cb_riesgos_oportunidades_accion AS \"ACCION\", cb_riesgos_oportunidades_fecha AS \"FECHA_IMPLEMENTACION\",
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS \"RESPONSABLE_ACCION\", cb_riesgos_oportunidades_estadocro AS \"ESTADO\"
                    FROM cb_proc_crom, cb_procesos_tipocro, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND
                        cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
                        cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_riesgos_oportunidades_estado=1 AND cb_riesgos_oportunidades_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $crocm = $stmt->fetchAll();

            $sql2 = "SELECT cb_riesgos_oportunidades_id AS \"ID_CROCM\", cb_seguimientocro_fechaseg AS \"FECHA_SEGUIMIENTO\",
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS \"RESPONSABLE_SEGUIMIENTO\",
                        cb_seguimientocro_observaciones AS \"OBSERVACIONES\", cb_seguimientocro_estadoseg AS \"ESTADO\"
                    FROM cb_proc_crom, cb_procesos_seguimientocro, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_id=cb_seguimientocro_fkriesgos AND cb_seguimientocro_fkresponsable=cb_usuario_id AND
                        cb_seguimientocro_estado=1 AND cb_riesgos_oportunidades_id=:id";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $detalle = $stmt->fetchAll();

            $elementos = array('crocm' => $crocm, 'detalle' => $detalle);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* SEGUIMIENTO CROCM LISTA ***********/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/seguimientocrocm", methods={"GET"}, name="seguimientocrocm")
     */
    public function seguimientocrocm()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_proceso,
                        cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo_crocm, cb_riesgos_oportunidades_descripcion AS descripcion_crocm,
                        cb_riesgos_oportunidades_accion AS accion, cb_seguimientocro_fechaseg AS fec_segu, cb_seguimientocro_observaciones AS observaciones,
                        cb_seguimientocro_estadoseg AS estado, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_seguimiento
                    FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_proc_crom, cb_procesos_tipocro, cb_procesos_seguimientocro, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_gas_id=cb_ficha_procesos_fkareagerenciasector
                        AND cb_gas_fkgerencia=cb_gerencia_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND cb_seguimientocro_fkresponsable=cb_usuario_id
                        AND cb_seguimientocro_fkriesgos=cb_riesgos_oportunidades_id AND cb_seguimientocro_estado=1 ORDER BY 1, 2, 7";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($query) > 0) {
                $data2 = $serializer->serialize($query, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/

    /************************************************************************************************************************************************************************************************************************/
    /*                                                                                                                                                                                                                      */
    /*      1.- DOCUMENTOS                                                                                                                                                                                                  */
    /*                                                                                                                                                                                                                      */
    /*************************************************************************************************************************************************************************************************************************/
    /*************************************************************************************/
    /*                              * INFORMACION DOCUMENTADA                            */
    /*                                                                                   */
    /*************************************************************************************/

    /* DOCUMENTOS LISTA ******************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/documentos", methods={"GET"}, name="documentos")
     */
    public function documentos()
    {
        try {
            $sp = "_";
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS GERENCIA, cb_area_nombre AS AREA, cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
                    cb_documento_codigo AS CODIGO, cb_documento_titulo AS TITULO_DOC,
                        cb_documento_vinculoarchivodig AS VINCULO_DOC, cb_documento_versionvigente AS VERSION,
                        cb_documento_fechapublicacion AS F_PUBLICACION,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR,
                        cb_documento_carpetaoperativa AS CARPETA_OPERATIVA, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_FLUJO,
                        cb_ficha_procesos_codproceso AS COD_PROCESO, cb_documento_id AS ID
                    FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas,
                        cb_configuracion_gerencia, cb_procesos_area, cb_usuario_usuario
                    WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                        AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $documentos = $stmt->fetchAll();

            $docs = array();
            foreach ($documentos as $doc) {

                if(!in_array($doc['vinculo_doc'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$doc['vinculo_doc'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $doc['vinculo_doc'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($doc['vinculo_diagrama_flujo'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$doc['vinculo_diagrama_flujo'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filediagf = $doc['vinculo_diagrama_flujo'];
                    else $filediagf = 'N/A';
                }
                else $filediagf = 'N/A';

                $info = [
                    "gerencia" => $doc['gerencia'],
                    "area" => $doc['area'],
                    "tipo_documento" => $doc['tipo_documento'],
                    "codigo" => $doc['codigo'],
                    "titulo_doc" => $doc['titulo_doc'],
                    "vinculo_doc" => $filedig,
                    "version" => $doc['version'],
                    "f_publicacion" => $doc['f_publicacion'],
                    "aprobado_por" => $doc['aprobado_por'],
                    "carpeta_operativa" => $doc['carpeta_operativa'],
                    "vinculo_diagrama_flujo" => $filediagf,
                    "cod_proceso" => $doc['cod_proceso'],
                    "id" => $doc['id']
                ];
                $docs[] = $info;
            }       

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($docs) > 0) {
                $data2 = $serializer->serialize($docs, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/docs_by_gerencia", methods={"POST"}, name="docs_by_gerencia")
     */
    public function docs_by_gerencia(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $gerencia = $sx['gerencia'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_gerencia_nombre AS GERENCIA, cb_area_nombre AS AREA, cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
                    cb_documento_codigo AS CODIGO, cb_documento_titulo AS TITULO_DOC,
                        cb_documento_vinculoarchivodig AS VINCULO_DOC, cb_documento_versionvigente AS VERSION,
                        cb_documento_fechapublicacion AS F_PUBLICACION,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR,
                        cb_documento_carpetaoperativa AS CARPETA_OPERATIVA, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_FLUJO,
                        cb_ficha_procesos_codproceso AS COD_PROCESO, cb_documento_id AS ID
                    FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas,
                        cb_configuracion_gerencia, cb_procesos_area, cb_usuario_usuario
                    WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                        AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1 AND cb_gerencia_nombre=:gerencia";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['gerencia' => ($gerencia)]);
            $documentos = $stmt->fetchAll();

            $docs = array();
            foreach ($documentos as $doc) {

                if(!in_array($doc['vinculo_doc'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$doc['vinculo_doc'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $doc['vinculo_doc'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($doc['vinculo_diagrama_flujo'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$doc['vinculo_diagrama_flujo'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filediagf = $doc['vinculo_diagrama_flujo'];
                    else $filediagf = 'N/A';
                }
                else $filediagf = 'N/A';

                $info = [
                    "gerencia" => $doc['gerencia'],
                    "area" => $doc['area'],
                    "tipo_documento" => $doc['tipo_documento'],
                    "codigo" => $doc['codigo'],
                    "titulo_doc" => $doc['titulo_doc'],
                    "vinculo_doc" => $filedig,
                    "version" => $doc['version'],
                    "f_publicacion" => $doc['f_publicacion'],
                    "aprobado_por" => $doc['aprobado_por'],
                    "carpeta_operativa" => $doc['carpeta_operativa'],
                    "vinculo_diagrama_flujo" => $filediagf,
                    "cod_proceso" => $doc['cod_proceso'],
                    "id" => $doc['id']
                ];
                $docs[] = $info;
            }  

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($docs, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* DOCUMENTOS DETALLE ****************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detalledoc", methods={"POST"}, name="detalledoc")
     */
    public function detalledoc(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_documento_codigo AS codigo_documento, cb_ficha_procesos_codproceso AS cod_proceso, cb_tipo_documento_nombre AS tipo_documento, cb_documento_titulo AS titulo_doc,
                        cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobado_por,
                        cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculoarchivodig AS vinculo_archivo, cb_documento_vinculodiagflujo AS vinculo_diagrama
                    FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_usuario_usuario
                    WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id
                        AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1 AND cb_documento_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $doc = $stmt->fetchAll();

            $data_doc = [];
            if(sizeof($doc) > 0){
               if(!in_array($doc[0]['vinculo_archivo'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$doc[0]['vinculo_archivo'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $doc[0]['vinculo_archivo'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($doc[0]['vinculo_diagrama'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$doc[0]['vinculo_diagrama'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filediagf = $doc[0]['vinculo_diagrama'];
                    else $filediagf = 'N/A';
                }
                else $filediagf = 'N/A';

                $data_doc = [
                    "codigo_documento" => $doc[0]['codigo_documento'],
                    "cod_proceso" => $doc[0]['cod_proceso'],
                    "tipo_documento" => $doc[0]['tipo_documento'],
                    "titulo_doc" => $doc[0]['titulo_doc'],
                    "version" => $doc[0]['version'],
                    "f_publicacion" => $doc[0]['f_publicacion'],
                    "aprobado_por" => $doc[0]['aprobado_por'],
                    "carpeta_operativa" => $doc[0]['carpeta_operativa'],
                    "titulo_doc" => $doc[0]['titulo_doc'],
                    "vinculo_archivo" => $filedig,
                    "vinculo_diagrama" => $filediagf
                ]; 
            }

            $sql2 = "SELECT cb_ficha_procesos_id AS id, cb_gas_codigo AS id_area, cb_ficha_procesos_codproceso AS cod_proceso, cb_ficha_procesos_nombre AS nombre,
                        cb_ficha_procesos_objetivo AS objetivo_proceso, cb_ficha_procesos_entradasrequeridas AS entradas_requeridas, cb_ficha_procesos_recursosnecesarios AS recursos_necesarios,
                        cb_ficha_procesos_vigente AS vigente, cb_ficha_procesos_version AS version, cb_ficha_procesos_fechaemision AS fecha_emision, cb_ficha_procesos_salidasesperadas AS salidas_esperadas
                    FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas
                    WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                        AND cb_ficha_procesos_estado=1 AND cb_documento_id=:id; ";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $fproceso = $stmt->fetchAll();

            $sql3 = "SELECT cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_gas_vigente AS vigente
                    FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_usuario_usuario
                    WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id
                        AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id AND cb_gas_estado=1 AND cb_documento_id=:id";

            $stmt = $cx->prepare($sql3);
            $stmt->execute(['id' => ($id)]);
            $gcarstr = $stmt->fetchAll();

            $sql4 = "SELECT cb_ficha_cargo_nombre AS nombre_cargo, cb_documento_codigo AS codigo_documento
                    FROM cb_gestion_documento, cb_fc_ficha_cargo, cb_fc_documentosaso
                    WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id
                        AND cb_ficha_cargo_estado=1 AND cb_documento_id=:id;";

            $stmt = $cx->prepare($sql4);
            $stmt->execute(['id' => ($id)]);
            $fcargo = $stmt->fetchAll();

            $elementos = array('documento' => $data_doc, 'fichaproceso' => $fproceso, 'gerenciareasector' => $gcarstr, 'fichacargo' => $fcargo);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/
    /*************************************************************************************/
    /*                              * FORMULARIOS                                        */
    /*                                                                                   */
    /*************************************************************************************/

    /* DOCUMENTOS FORMULARIO LISTA *******/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/getdocformulario", methods={"GET"}, name="getdocformulario")
     */
    public function getdocformulario()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_documento_formulario_codigo AS cod_formulario, 
                        cb_documento_formulario_titulo AS titulo_formulario, cb_documento_formulario_vinculofiledig AS vinculo_archivo, 
                        cb_documento_formulario_vinculofiledesc AS descarga_formulario, cb_documento_formulario_versionvigente AS version,
                        cb_documento_formulario_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS aprobado_por, 
                        cb_tipo_documento_nombre AS tipo_doc_relacionado, cb_documento_codigo AS doc_relacionado
                    FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_gest_doc_formulario, 
                        cb_gestion_tipo_documento, cb_usuario_usuario
                    WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND
                        cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_estado=1 AND cb_documento_formulario_fkaprobador=cb_usuario_id
                    ORDER BY 1, 2, 3";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $documentos = $stmt->fetchAll();

            $docs = array();
            foreach ($documentos as $doc) {
                if(!in_array($doc['vinculo_archivo'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$doc['vinculo_archivo'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $doc['vinculo_archivo'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($doc['descarga_formulario'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$doc['descarga_formulario'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filedwn = $doc['descarga_formulario'];
                    else $filedwn = 'N/A';
                }
                else $filedwn = 'N/A';

                $info = [
                    "gerencia" => $doc['gerencia'],
                    "area" => $doc['area'],
                    "cod_formulario" => $doc['cod_formulario'],
                    "titulo_formulario" => $doc['titulo_formulario'],
                    "vinculo_archivo" => $filedig,
                    "descarga_formulario" => $filedwn,
                    "version" => $doc['version'],
                    "f_publicacion" => $doc['f_publicacion'],
                    "aprobado_por" => $doc['aprobado_por'],
                    "tipo_doc_relacionado" => $doc['tipo_doc_relacionado'],
                    "doc_relacionado" => $doc['doc_relacionado']
                ];
                $docs[] = $info;
            }  

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($docs) > 0) {
                $data2 = $serializer->serialize($docs, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/docform_by_gerencia", methods={"POST"}, name="docform_by_gerencia")
     */
    public function docform_by_gerencia(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $gerencia = $sx['gerencia'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_documento_formulario_codigo AS cod_formulario, cb_documento_formulario_titulo AS titulo_formulario,
                        cb_documento_formulario_vinculofiledig AS vinculo_archivo, cb_documento_formulario_vinculofiledesc AS descarga_formulario, cb_documento_formulario_versionvigente AS version,
                        cb_documento_formulario_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS aprobado_por, cb_tipo_documento_nombre AS tipo_doc_relacionado,
                        cb_documento_codigo AS doc_relacionado
                    FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_gest_doc_formulario, cb_gestion_tipo_documento, cb_usuario_usuario
                    WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND
                        cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_estado=1 AND cb_documento_formulario_fkaprobador=cb_usuario_id AND cb_gerencia_nombre=:gerencia
                    ORDER BY 1, 2, 3";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['gerencia' => ($gerencia)]);
            $documentos = $stmt->fetchAll();

            $docs = array();
            foreach ($documentos as $doc) {

                if(!in_array($doc['vinculo_archivo'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$doc['vinculo_archivo'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $doc['vinculo_archivo'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($doc['descarga_formulario'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$doc['descarga_formulario'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filedwn = $doc['descarga_formulario'];
                    else $filedwn = 'N/A';
                }
                else $filedwn = 'N/A';

                $info = [
                    "gerencia" => $doc['gerencia'],
                    "area" => $doc['area'],
                    "cod_formulario" => $doc['cod_formulario'],
                    "titulo_formulario" => $doc['titulo_formulario'],
                    "vinculo_archivo" => $filedig,
                    "descarga_formulario" => $filedwn,
                    "version" => $doc['version'],
                    "f_publicacion" => $doc['f_publicacion'],
                    "aprobado_por" => $doc['aprobado_por'],
                    "tipo_doc_relacionado" => $doc['tipo_doc_relacionado'],
                    "doc_relacionado" => $doc['doc_relacionado']
                ];
                $docs[] = $info;
            }  

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($docs, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**FORMULARIOS DETALLE *************/
    /* DESARROLADOR: JUAN CARLOS CAMPOS*/
    /**
     * @Route("/getdocformulariodetalle", methods={"POST"}, name="getdocformulariodetalle")
     */
    public function getdocformulariodetalle(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $documento = $sx['documento'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_documento_formulario_id AS ID_FORMULARIO, cb_documento_codigo AS COD_DOCUMENTO, cb_documento_formulario_codigo AS COD_FORMULARIO,
                        cb_documento_formulario_titulo AS TITULO_FORMULARIO, cb_documento_formulario_versionVigente AS VERSION_VIGENTE_FORMULARIO,
                        cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION_FORMULARIO, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR,
                        cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_formulario_vinculoFileDesc AS VINCULO_ARCHIVO_DESCARGA
                    FROM cb_gest_doc_formulario, cb_gestion_documento, cb_gestion_tipo_documento, cb_usuario_usuario
                    WHERE cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_codigo=:id AND
                    cb_documento_codigo=:documento AND cb_documento_formulario_estado=1 AND cb_documento_formulario_fkaprobador=cb_usuario_id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id), 'documento' => ($documento)]);
            $dform = $stmt->fetchAll();

            $data_docfrm = [];
            if(sizeof($dform) > 0){
                if(!in_array($dform[0]['vinculo_archivo_digital'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$dform[0]['vinculo_archivo_digital'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $dform[0]['vinculo_archivo_digital'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($dform[0]['vinculo_archivo_descarga'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$dform[0]['vinculo_archivo_descarga'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filedwn = $dform[0]['vinculo_archivo_descarga'];
                    else $filedwn = 'N/A';
                }
                else $filedwn = 'N/A';
    
                $data_docfrm = [
                    "id_formulario" => $dform[0]['id_formulario'],
                    "cod_documento" => $dform[0]['cod_documento'],
                    "cod_formulario" => $dform[0]['cod_formulario'],
                    "titulo_formulario" => $dform[0]['titulo_formulario'],
                    "version_vigente_formulario" => $dform[0]['version_vigente_formulario'],
                    "fecha_publicacion_formulario" => $dform[0]['fecha_publicacion_formulario'],
                    "aprobado_por" => $dform[0]['aprobado_por'],
                    "vinculo_archivo_digital" => $filedig,
                    "vinculo_archivo_descarga" => $filedwn
                ];
            }

            $sql2 = "SELECT cb_documento_codigo AS COD_DOCUMENTO, cb_ficha_procesos_nombre AS COD_PROCESO, cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
                        cb_documento_titulo AS TITULO_DOC, cb_documento_versionvigente AS VERSION_VIGENTE, cb_documento_fechaPublicacion AS FECHA_PUBLICACION,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR, cb_documento_carpetaoperativa AS CARPETA_OPERATIVA,
                        cb_documento_vinculoarchivodig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_DE_FLUJO
                    FROM cb_gestion_documento,cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
                    WHERE cb_documento_fkaprobador=cb_usuario_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_documento_fktipo=cb_tipo_documento_id AND
                        cb_documento_estado=1 AND cb_documento_codigo=:documento";
            $stmt = $cx->prepare($sql2);
            $stmt->execute(['documento' => ($documento)]);
            $documents = $stmt->fetchAll();

            $docs = array();
            foreach ($documents as $doc) {

                if(!in_array($doc['vinculo_archivo_digital'], ['N/A', null, ''])){
                    $urlfd = $this->getParameter('Directorio_proyecto').$doc['vinculo_archivo_digital'];
                    if(file_exists($urlfd) && (strpos($urlfd, '.') !== false)) $filedig = $doc['vinculo_archivo_digital'];
                    else $filedig = 'N/A';
                }
                else $filedig = 'N/A';
                
                if(!in_array($doc['vinculo_diagrama_de_flujo'], ['N/A', null, ''])){
                    $urlfdgf = $this->getParameter('Directorio_proyecto').$doc['vinculo_diagrama_de_flujo'];
                    if(file_exists($urlfdgf) && (strpos($urlfdgf, '.') !== false)) $filediagf = $doc['vinculo_diagrama_de_flujo'];
                    else $filediagf = 'N/A';
                }
                else $filediagf = 'N/A';

                $data_doc = [
                    "cod_documento" => $doc['cod_documento'],
                    "cod_proceso" => $doc['cod_proceso'],
                    "tipo_documento" => $doc['tipo_documento'],
                    "titulo_doc" => $doc['titulo_doc'],
                    "version_vigente" => $doc['version_vigente'],
                    "fecha_publicacion" => $doc['fecha_publicacion'],
                    "aprobado_por" => $doc['aprobado_por'],
                    "carpeta_operativa" => $doc['carpeta_operativa'],
                    "titulo_doc" => $doc['titulo_doc'],
                    "vinculo_archivo_digital" => $filedig,
                    "vinculo_diagrama_de_flujo" => $filediagf
                ]; 
                $docs[] = $data_doc;
            }    

            $elementos = array('FORMULARIO' => $data_docfrm, 'DOCUMENTOS' => $docs);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/
    /*************************************************************************************/
    /*                              * DOCUMENTOS EXTERNOS Y LEGALES                      */
    /*                                                                                   */
    /*************************************************************************************/
    /**DOCUMENTO EXTERNO LEGALES  ************/
    /*DESARROLADOR: EDWARD RIOS*/
    /**
     * @Route("/documentoexternolegales", methods={"GET"}, name="documentoexternolegales")
     */
    public function documentoexternolegales()
    {
        try {
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new DateTimeNormalizer(), new ObjectNormalizer());
            $serializer = new Serializer($normalizers, $encoders);
            $cx = $this->getDoctrine()->getManager();
            $dqlIndicador = "SELECT ge.nombre AS GERENCIA ,ar.nombre AS AREA, ti.tipo AS TIPO, de.codigo AS CODIGO, de.titulo AS TITULO,
                                de.vinculoarchivo AS VINCULO_ARCHIVO, de.fechapublicacion AS FECHA_PUBLICACION, proc.codproceso AS COD_PROCESO
                            FROM App\Entity\DocumentoExtra de
                            JOIN de.fkproceso proc
                            JOIN proc.fkareagerenciasector ags
                            JOIN ags.fkgerencia ge
                            JOIN ags.fkarea ar
                            JOIN de.fktipo ti";
            $query = $cx->createQuery($dqlIndicador);
            //            $query->setParameter('fichaid', $id);
            $indicador = $query->getResult();
            $data2 = $serializer->serialize($indicador, 'json');
            $data = json_decode($data2, true);
            $format = "Y-m-d"; //or something else that date() accepts as a format//
            foreach ($data as $d => $value) {
                $newDate = date_format(date_create($data[$d]['FECHA_PUBLICACION']), $format);
                $data[$d]['FECHA_PUBLICACION'] = $newDate;
            }
            $newdata = json_encode($data);
            return new Response($newdata);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/
    /*************************************************************************************/
    /*                              * DOCUMENTOS EN PROCESO                              */
    /*                                                                                   */
    /*************************************************************************************/

    /**DOCUMENTO EN PROCESO DETALLE ************/
    /*DESARROLADOR: EDWARD RIOS*/
    /**
     * @Route("/documentosenproceso", methods={"POST"}, name="documentosenproceso")
     */
    public function documentosenproceso(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_documento_proceso_id AS \"ID\", cb_documento_proceso_nuevoactualizacion AS \"NUEVO_O_ACTUALIZACION\", cb_documento_codigo AS \"COD_DOCUMENTO\", cb_ficha_procesos_codproceso AS \"COD_PROCESO\",
                    cb_tipo_documento_nombre AS \"TIPO_DOCUMENTO\", cb_documento_proceso_titulo AS \"TITULO\", cb_documento_proceso_versionvigente AS \"VERSION\", cb_documento_proceso_vinculoarchivo AS \"VINCULO_ARCHIVO_DIGITAL\",
                    cb_documento_proceso_carpetaoperativa AS \"CARPETA_OPERATIVA\", cb_documento_proceso_aprobadorechazado AS \"APROBADO_O_RECHAZADO\",
                    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS \"APROBADO_POR\", cb_documento_proceso_fechaaprobacion AS \"FECHA_APROBACION\"
                FROM cb_gest_doc_proceso, cb_gestion_documento, cb_procesos_ficha_procesos, cb_usuario_usuario, cb_gestion_tipo_documento
                WHERE cb_documento_proceso_fkaprobador=cb_usuario_id AND cb_documento_proceso_fkdocumento=cb_documento_id AND cb_documento_proceso_fkproceso=cb_ficha_procesos_id AND
                    cb_documento_proceso_fktipo=cb_tipo_documento_id AND cb_documento_proceso_estado=1";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $docproceso = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($docproceso, 'json');
            return new Response($data2);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* DOCUMENTOS EN REVISION LISTA ******/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/documentosrev", methods={"POST"}, name="documentosrev")
     */
    public function documentosrev(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_docprocrevision_fkdoc AS id_revision, cb_docprocrevision_fecha AS fecha_recibido, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_revision,
                    cb_docprocrevision_estadodoc AS estado, cb_docprocrevision_firma AS firma_electronica
                    FROM cb_gest_doc_proceso, cb_gest_docprocrevision, cb_usuario_usuario
                    WHERE cb_documento_proceso_fkaprobador=cb_usuario_id AND cb_docprocrevision_fkdoc=cb_documento_proceso_id AND cb_docprocrevision_estado=1 AND cb_documento_proceso_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $docrev = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($docrev, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/
    /*************************************************************************************/
    /*                              * DOCUMENTOS DADOS DE BAJA                           */
    /*                                                                                   */
    /*************************************************************************************/

    /* DOCUMENTOS BAJA LISTA *************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/documentobaja", methods={"GET"}, name="documentobaja")
     */
    public function documentobaja()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT tbr.cb_bajadocumento_id AS id, tbr.cb_bajadocumento_codigo AS codigo_documento, tbr.cb_tipo_documento_nombre AS tipo_documento, tbr.cb_bajadocumento_titulo AS titulo, tbr.cb_bajadocumento_versionvigente AS version,
                        tbr.cb_bajadocumento_fechapublicacion AS fecha_publicacion, tbr.cb_bajadocumento_aprobadopor AS aprobado_por, tbr.cb_bajadocumento_carpetaoperativa AS carpeta_operativa,
                        tbr.cb_bajadocumento_vinculoarchivo AS vinculo_archivo_digital, tbr.cb_ficha_procesos_codproceso AS codigo_proceso
                    FROM (SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
                        cb_bajadocumento_fechapublicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS cb_bajadocumento_aprobadopor, cb_bajadocumento_carpetaoperativa,
                        cb_bajadocumento_vinculoarchivo, cb_ficha_procesos_codproceso
                    FROM cb_gest_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento, cb_usuario_usuario
                    WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
                        AND cb_bajadocumento_estado=1 AND cb_bajadocumento_fkaprobador=cb_usuario_id
                    UNION
                    SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
                        cb_bajadocumento_fechapublicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS cb_bajadocumento_aprobadopor, cb_bajadocumento_carpetaoperativa,
                        cb_bajadocumento_vinculoarchivo, '' AS cb_ficha_procesos_codproceso
                    FROM cb_gest_bajadocumento, cb_gestion_tipo_documento, cb_usuario_usuario
                    WHERE cb_bajadocumento_fktipo=cb_tipo_documento_id AND cb_bajadocumento_estado=1 AND cb_bajadocumento_fkaprobador=cb_usuario_id AND cb_bajadocumento_id NOT IN
                        (SELECT cb_bajadocumento_id
                        FROM cb_gest_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
                        WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
                            AND cb_bajadocumento_estado=1) ORDER BY 1) AS tbr";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($query) > 0) {
                $data2 = $serializer->serialize($query, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /***************************************************************************************************************************************************************************************************************************************************************/

    /************************************************************************************************************************************************************************************************************************
    /*                                                                                                                                                                                                                      /
    /*      1.- FICHAS DE CARGO                                                                                                                                                                                             /
    /*                                                                                                                                                                                                                      /
     ***********************************************************************************************************************************************************************************************************************/
    /*************************************************************************************/
    /*                              * FICHAS DE CARGOS                                   */
    /*                                                                                   */
    /*************************************************************************************/

    /* FICHAS DE CARGO LISTA *************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/fichascargo", methods={"GET"}, name="fichascargo")
     */
    public function fichascargo()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_cargo_nombre AS id_cargo, cb_ficha_cargo_fechaaprobacion AS f_aprobacion,
            jefe.cb_usuario_nombre AS aprobado_jefe, gerente.cb_usuario_nombre AS aprobado_gerente, cb_ficha_cargo_id AS id
          FROM cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_fc_ficha_cargo,cb_usuario_usuario jefe,cb_usuario_usuario gerente
          WHERE cb_ficha_cargo_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_ficha_cargo_estado=1 and cb_ficha_cargo_fkjefeaprobador= jefe.cb_usuario_id and cb_ficha_cargo_fkgerenteaprobador= gerente.cb_usuario_id
          ORDER BY 1, 2, 3";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($query) > 0) {
                $data2 = $serializer->serialize($query, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* FICHAS DE CARGO DETALLE ***********/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detallefcargo", methods={"POST"}, name="detallefcargo")
     */
    public function detallefcargo(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_ficha_cargo_nombre AS id_cargo, cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector,
                        cb_ficha_cargo_objetivo AS objetivo_cargo, cb_ficha_cargo_responsabilidades AS responsabilidades, cb_ficha_cargo_experiencia AS experiencia,
                        cb_ficha_cargo_conocimientos AS conocimientos, cb_ficha_cargo_formacion AS formacion, cb_ficha_cargo_caracteristicas AS caracteristicas_pers,
                        cb_ficha_cargo_fechaaprobacion AS fecha_aprobacion, (jf.cb_usuario_nombre || ' ' || jf.cb_usuario_apellido) AS aprobado_jefe, cb_ficha_cargo_firmajefe AS firma_electronica_jefe,
                        (gr.cb_usuario_nombre || ' ' || gr.cb_usuario_apellido) AS aprobado_gerente, cb_ficha_cargo_firmagerente AS firma_electronica_gerente, cb_ficha_cargo_hipervinculo AS vinculo_archivo_ficha_cargo
                    FROM cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_fc_ficha_cargo, cb_usuario_usuario jf, cb_usuario_usuario gr
                    WHERE cb_ficha_cargo_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id
                        AND cb_ficha_cargo_estado=1 AND cb_ficha_cargo_fkjefeaprobador=jf.cb_usuario_id AND cb_ficha_cargo_fkgerenteaprobador=gr.cb_usuario_id AND cb_ficha_cargo_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $fcargo = $stmt->fetchAll();

            $sql2 = "SELECT cb_tipo_documento_nombre AS tipo_doc, cb_documento_codigo AS codigo_doc, cb_documento_titulo AS titulo_doc, cb_documento_vinculoarchivodig AS archivo
                    FROM cb_fc_ficha_cargo, cb_gestion_documento, cb_fc_documentosaso, cb_gestion_tipo_documento
                    WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id
                        AND cb_documentosaso_estado=1 AND cb_ficha_cargo_id=:id; ";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $docasc = $stmt->fetchAll();

            $elementos = array('fichacargo' => $fcargo, 'docasociados' => $docasc);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
    /************************************************************************************************************************************************************************************************************************/
    /*                                                                                                                                                                                                                      */
    /*      4.- AUDITORIAS S.I.G.                                                                                                                                                                                           */
    /*                                                                                                                                                                                                                      */
    /************************************************************************************************************************************************************************************************************************/

    /************************************************************************************/
    /*                              * AUDITORIAS                                         /
    /*                                                                                   /
    /************************************************************************************/

    /* AUDITORIAS Y HALLAZGOS LISTA *******/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_audhlg", methods={"GET"}, name="listar_audhlg")
     */
    public function listar_audhlg()
    {
        try {
            $auditorias = $this->getDoctrine()->getRepository(Auditoria::class)->findBy(['estado' => '1'], ['codigo' => 'ASC']);

            $data_aud = [];
            if (!empty($auditorias)) {
                foreach ($auditorias as $aud) {
                    $sectores = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $aud->getId()], ['fkgas' => 'ASC']);
                    
                    $dt_sector = [];
                    if (!empty($sectores)) {
                        foreach ($sectores as $sct) {
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkgerencia() != null) $gerencia = $sct->getFkgas()->getFkgerencia()->getNombre();
                            else $gerencia = '';
                            
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkarea() != null) $area = $sct->getFkgas()->getFkarea()->getNombre();
                            else $area = '';

                            $dt_sector[] = ['gerencia' => $gerencia, 'area' => $area];
                        }
                    }
                    
                    $fecpro = $aud->getFechaprogramada();
                    $fecini = $aud->getFechahorainicio();
                    $fecfin = $aud->getFechahorafin();
                    $fecreg = $aud->getFecharegistro();

                    if ($fecpro != null) {
                        $date = date('Y', strtotime($fecpro->format('Y-m-d')));
                        $anio = $date;
                    } 
                    else $anio = '';

                    if ($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = '';
                    if ($fecini != null) $rsfci = $fecini->format('Y-m-d H:i'); else $rsfci = $fecini;
                    if ($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:i'); else $rsfcf = $fecfin;

                    if ($aud->getFktipo() != null) $tipo = $aud->getFktipo()->getNombre();
                    else $tipo = '';
                    
                    $item_aud = [
                        "sectores" => $dt_sector,
                        "id" => $aud->getCodigo(),
                        "anio" => $anio,
                        "f_programada" => $rsfcp,
                        "f_inicio" => $rsfci,
                        "f_fin" => $rsfcf,
                        "alcance" => $aud->getAlcance(),
                        "conclusiones" => $aud->getConclusiones(),
                        "tipo_auditoria" => $tipo,
                        "idaud" => $aud->getId()
                    ];

                    $data_aud[] = $item_aud;
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($data_aud, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* AUDITORIA DETALLE *****************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detalleaud", methods={"POST"}, name="detalleaud")
     */
    public function detalleaud(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $codigo = $sx['id'];

            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findOneBy(['estado' => '1', 'codigo' => $codigo]);

            $response = [];
            if ($auditoria != null) {
                $fecpro = $auditoria->getFechaprogramada();
                $fecini = $auditoria->getFechahorainicio();
                $fecfin = $auditoria->getFechahorafin();
                $fecreg = $auditoria->getFecharegistro();
                if ($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = $fecpro;
                if ($fecini != null) $rsfci = $fecini->format('Y-m-d H:i'); else $rsfci = $fecini;
                if ($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:i'); else $rsfcf = $fecfin;
                if ($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');  else $rsfcr = $fecreg;

                if ($auditoria->getFktipo() != null) $tipo = $auditoria->getFktipo()->getNombre(); else $tipo = '';
                if ($auditoria->getFkproceso() != null) $proceso = $auditoria->getFkproceso()->getCodproceso(); else $proceso = '';
                if ($auditoria->getFkjefe() != null) $jefe = $auditoria->getFkjefe()->getNombre().' '.$auditoria->getFkjefe()->getApellido(); else $jefe = '';
                
                $item_aud = [
                    "id_auditoria" => $auditoria->getCodigo(),
                    "id_proceso" => $proceso,
                    "tipo_auditoria" => $tipo,
                    "f_programada" => $rsfcp,
                    "duracion_estimada_horas" => $auditoria->getDuracionestimada(),
                    "lugar_de_auditoria" => $auditoria->getLugar(),
                    "alcance" => $auditoria->getAlcance(),
                    "objetivos" => $auditoria->getObjetivos(),
                    "fecha_hora_inicio" => $rsfci,
                    "fecha_hora_fin" => $rsfcf,
                    "jefe_sup_coord" => $jefe,
                    "fecha_registro" => $rsfcr,
                    "conclusiones" => $auditoria->getConclusiones()
                ];

                $sectores = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $auditoria->getId()], ['fkgas' => 'ASC']);
                    
                $dt_sector = [];
                if (!empty($sectores)) {
                    foreach ($sectores as $sct) {
                        if ($sct->getFkgas() != null) {
                            if ($sct->getFkgas()->getFkgerencia() != null) $gerencia = $sct->getFkgas()->getFkgerencia()->getNombre();
                            else $gerencia = '';
                            
                            if ($sct->getFkgas()->getFkarea() != null) $area = $sct->getFkgas()->getFkarea()->getNombre();
                            else $area = '';
                            
                            if ($sct->getFkgas()->getFksector() != null) $sector = $sct->getFkgas()->getFksector()->getNombre();
                            else $sector = '';
                            
                            if ($sct->getFkgas()->getFkresponsable() != null) $responsable = $sct->getFkgas()->getFkresponsable()->getNombre().' '.$sct->getFkgas()->getFkresponsable()->getApellido();
                            else $responsable = '';

                            $item_sector = [
                                'id_area' => $sct->getFkgas()->getCodigo(), 
                                'gerencia' => $gerencia, 
                                'area' => $area,
                                'sector' => $sector, 
                                'responsable' => $responsable, 
                                'vigente' => $sct->getFkgas()->getVigente()
                            ];
                            $dt_sector[] = $item_sector;
                        }
                    }
                }

                $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(['fkauditoria' => $auditoria->getId(), 'estado' => '1']);
                
                $dt_equipo = [];
                if ($equipo != null) {
                    foreach ($equipo as $eqp) {
                        if ($eqp->getFkauditor() != null) {
                            if ($eqp->getFktipo() != null) $tipo_aud = $eqp->getFktipo()->getNombre(); else $tipo_aud = ''; 

                            $item_eqp = [
                                'id_auditoria' => $eqp->getFkauditoria()->getCodigo(), 
                                'item_auditor' => $eqp->getFkauditor()->getItem(), 
                                'tipo_auditor' => $tipo_aud,
                                'item' => $eqp->getFkauditor()->getItem(), 
                                'apellidos_nombres' => $eqp->getFkauditor()->getApellidosnombres(), 
                                'vigente' => $eqp->getFkauditor()->getVigente()
                            ];
                            $dt_equipo[] = $item_eqp;
                        }
                    }
                }

                $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['estado' => '1', 'fkauditoria' => $auditoria->getId()], ['fecharegistro' => 'ASC', 'titulo' => 'ASC']);

                $dt_hallazgo = [];
                if ($hallazgos != null) {
                    foreach ($hallazgos as $hlg) {
                        if ($hlg->getFktipo() != null) $tipo_hlg = $hlg->getFktipo()->getNombre(); else $tipo_hlg = '';
                        
                        $item_hlg = [
                            "id_hallazgo" => $hlg->getId(),
                            "tipo_hallazgo" => $tipo_hlg,
                            "ordinal" => $hlg->getOrdinal(),
                            "titulo" => $hlg->getTitulo(),
                            "descripcion" => $hlg->getDescripcion()
                        ];
                        
                        $dt_hallazgo[] = $item_hlg;
                    }
                }

                $response = ['auditoria' => $item_aud, 'sectores' => $dt_sector, 'equipo' => $dt_equipo, 'hallazgo' => $dt_hallazgo];
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($response, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* HALLAZGO DETALLE ******************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detallehlg", methods={"POST"}, name="detallehlg")
     */
    public function detallehlg(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            
            $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findOneBy(['estado' => '1', 'id' => $id]);

            $response = [];
            if ($hallazgo != null) {
                $fecreg = $hallazgo->getFecharegistro();
                if ($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;

                if ($hallazgo->getFktipo() != null) $tipo = $hallazgo->getFktipo()->getNombre(); else $tipo = '';
                if ($hallazgo->getFkimpacto() != null) $impacto = $hallazgo->getFkimpacto()->getNombre(); else $impacto = '';
                if ($hallazgo->getFkprobabilidad() != null) $probabilidad = $hallazgo->getFkprobabilidad()->getNombre(); else $probabilidad = '';
                
                $item_hlg = [
                    "id_hallazgo" => $hallazgo->getId(),
                    "id_auditoria" => $hallazgo->getFkauditoria()->getCodigo(),
                    "tipo_hallazgo" => $tipo,
                    "ordinal_hallazgo" => $hallazgo->getOrdinal(),
                    "titulo_hallazgo" => $hallazgo->getTitulo(),
                    "descripcion_hallazgo" => $hallazgo->getDescripcion(),
                    "evidencia_del_hallazgo" => $hallazgo->getEvidencia(),
                    "documento_del_hallazgo" => $hallazgo->getDocumento(),
                    "punto_iso_del_hallazgo" => $hallazgo->getPuntoiso(),
                    "impacto" => $impacto,
                    "probabilidad" => $probabilidad ,
                    "analisis_causa_raiz" => $hallazgo->getAnalisiscausaraiz(),
                    "recomendaciones" => $hallazgo->getRecomendaciones(),
                    "cargo_del_auditado" => $hallazgo->getCargoauditado(),
                    "nombre_del_auditado" => $hallazgo->getNombreauditado(),
                    "responsable_registro" => $hallazgo->getResponsable(),
                    "fecha_registro" => $rsfcr
                ];
                
                $acciones = $this->getDoctrine()->getRepository(Accion::class)->findBy(['estado' => '1', 'fkhallazgo' => $hallazgo->getId()], ['fechaimplementacion' => 'ASC']);
                $dt_accion = [];
                if ($acciones != null) {
                    foreach ($acciones as $acn) {
                        $fecimp = $acn->getFechaimplementacion();
                        if($fecimp != null) $rsfci = $fecimp->format('Y-m-d'); else $rsfci = $fecimp;

                        
                        if ($acn->getFktipo() != null) $tipo_acn = $acn->getFktipo()->getNombre(); else $tipo_acn = '';
                    
                        $item_acn = [
                            "estado" => $acn->getEstadoaccion(),
                            "id_accion" => $acn->getId(),
                            "ordinal_accion" => $acn->getOrdinal(),
                            "accion" => $acn->getDescripcion(),
                            "f_implementacion" => $rsfci,
                            "responsable" => $acn->getResponsableimplementacion(),
                            "tipo_accion" => $tipo_acn
                        ];

                        $dt_accion[] = $item_acn;
                    }
                }
                
                $response = ['hallazgo' =>  $item_hlg, 'accion' =>  $dt_accion];
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($response, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* HALLAZGOS LISTA ********************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_hallazgo", methods={"GET"}, name="listar_hallazgo")
     */
    public function listar_hallazgo()
    {
        try {
            $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['estado' => '1'], ['fecharegistro' => 'ASC', 'titulo' => 'ASC']);

            $dt_hallazgo = [];
            if (!empty($hallazgos)) {
                foreach ($hallazgos as $hlg) {
                    $fecreg = $hlg->getFecharegistro();
                    if ($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;

                    if ($hlg->getFktipo() != null) $tipo = $hlg->getFktipo()->getNombre(); else $tipo = '';

                    $fecpro = $hlg->getFkauditoria()->getFechaprogramada();
                    if ($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = '';

                    if ($fecpro != null) {
                        $date = date('Y', strtotime($fecpro->format('Y-m-d')));
                        $anio = $date;
                    } 
                    else $anio = '';

                    $sectores = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $hlg->getFkauditoria()->getId()], ['fkgas' => 'ASC']);

                    $dt_sector = [];
                    if (!empty($sectores)) {
                        foreach ($sectores as $sct) {
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkgerencia() != null) $gerencia = $sct->getFkgas()->getFkgerencia()->getNombre();
                            else $gerencia = '';
                            
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkarea() != null) $area = $sct->getFkgas()->getFkarea()->getNombre();
                            else $area = '';

                            $dt_sector[] = ['gerencia' => $gerencia, 'area' => $area];
                        }
                    }
                    
                    $item_hlg = [
                        "sectores" => $dt_sector,
                        "id_auditoria" => $hlg->getFkauditoria()->getCodigo(),
                        "anio" => $anio,
                        "f_programada" => $rsfcp,
                        "id_hallazgo" => $hlg->getId(),
                        "ordinal" => $hlg->getOrdinal(),
                        "tipo_hallazgo" => $tipo,
                        "titulo" => $hlg->getTitulo(),
                        "descripcion" => $hlg->getDescripcion()
                    ];
                    
                    $dt_hallazgo[] = $item_hlg;
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($dt_hallazgo, 'json');
            
            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* ACCIONES LISTA *********************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_accion", methods={"GET"}, name="listar_accion")
     */
    public function listar_accion()
    {
        try {
            $acciones = $this->getDoctrine()->getRepository(Accion::class)->findBy(['estado' => '1'], ['fechaimplementacion' => 'ASC']);

            $dt_accion = [];
            if ($acciones != null) {
                foreach ($acciones as $acn) {
                    $fecimp = $acn->getFechaimplementacion();
                    if($fecimp != null) $rsfci = $fecimp->format('Y-m-d'); else $rsfci = $fecimp;

                    if ($acn->getFktipo() != null) $tipo = $acn->getFktipo()->getNombre(); else $tipo = '';

                    $sectores = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $acn->getFkhallazgo()->getFkauditoria()->getId()], ['fkgas' => 'ASC']);

                    $dt_sector = [];
                    if (!empty($sectores)) {
                        foreach ($sectores as $sct) {
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkgerencia() != null) $gerencia = $sct->getFkgas()->getFkgerencia()->getNombre();
                            else $gerencia = '';
                            
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkarea() != null) $area = $sct->getFkgas()->getFkarea()->getNombre();
                            else $area = '';

                            $dt_sector[] = ['gerencia' => $gerencia, 'area' => $area];
                        }
                    }
                
                    $item_acn = [
                        "sectores" => $dt_sector,
                        "id_hallazgo" => $acn->getFkhallazgo()->getId(),
                        "ordinal_hallazgo" => $acn->getFkhallazgo()->getOrdinal(),
                        "titulo" => $acn->getFkhallazgo()->getTitulo(),
                        "descripcion" => $acn->getFkhallazgo()->getDescripcion(),
                        "id_accion" => $acn->getId(),
                        "ordinal_accion" => $acn->getOrdinal(),
                        "accion" => $acn->getDescripcion(),
                        "f_implementacion" => $rsfci,
                        "responsable" => $acn->getResponsableimplementacion(),
                        "estado" => $acn->getEstadoaccion(),
                        "tipo" => $tipo
                    ];

                    $dt_accion[] = $item_acn;
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($dt_accion, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* HALLAZGO DETALLE POR ID ACCION ****/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/dethlg_idac", methods={"POST"}, name="dethlg_idac")
     */
    public function dethlg_idac(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            
            $accion = $this->getDoctrine()->getRepository(Accion::class)->findOneBy(['estado' => '1', 'id' => $id]);

            $response = [];
            if ($accion != null) {
                $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findOneBy(['estado' => '1', 'id' => $accion->getFkhallazgo()->getId()]);

                $fecreg = $hallazgo->getFecharegistro();
                if ($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;

                if ($hallazgo->getFktipo() != null) $tipo = $hallazgo->getFktipo()->getNombre(); else $tipo = '';
                if ($hallazgo->getFkimpacto() != null) $impacto = $hallazgo->getFkimpacto()->getNombre(); else $impacto = '';
                if ($hallazgo->getFkprobabilidad() != null) $probabilidad = $hallazgo->getFkprobabilidad()->getNombre(); else $probabilidad = '';
                
                $item_hlg = [
                    "id_hallazgo" => $hallazgo->getId(),
                    "id_auditoria" => $hallazgo->getFkauditoria()->getCodigo(),
                    "tipo_hallazgo" => $tipo,
                    "ordinal_hallazgo" => $hallazgo->getOrdinal(),
                    "titulo_hallazgo" => $hallazgo->getTitulo(),
                    "descripcion_hallazgo" => $hallazgo->getDescripcion(),
                    "evidencia_del_hallazgo" => $hallazgo->getEvidencia(),
                    "documento_del_hallazgo" => $hallazgo->getDocumento(),
                    "punto_iso_del_hallazgo" => $hallazgo->getPuntoiso(),
                    "impacto" => $impacto,
                    "probabilidad" => $probabilidad ,
                    "analisis_causa_raiz" => $hallazgo->getAnalisiscausaraiz(),
                    "recomendaciones" => $hallazgo->getRecomendaciones(),
                    "cargo_del_auditado" => $hallazgo->getCargoauditado(),
                    "nombre_del_auditado" => $hallazgo->getNombreauditado(),
                    "responsable_registro" => $hallazgo->getResponsable(),
                    "fecha_registro" => $rsfcr
                ];
                
                $fecimp = $accion->getFechaimplementacion();
                if ($fecimp != null) $rsfci = $fecimp->format('Y-m-d'); else $rsfci = $fecimp;

                if ($accion->getFktipo() != null) $tipo_acn = $accion->getFktipo()->getNombre(); else $tipo_acn = '';
            
                $item_acn = [
                    "estado" => $accion->getEstadoaccion(),
                    "id_accion" => $accion->getId(),
                    "ordinal_accion" => $accion->getOrdinal(),
                    "accion" => $accion->getDescripcion(),
                    "f_implementacion" => $rsfci,
                    "responsable" => $accion->getResponsableimplementacion(),
                    "tipo_accion" => $tipo_acn
                ];
                
                $response = ['hallazgo' =>  $item_hlg, 'accion' =>  $item_acn];
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($response, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* VERIFICACION EFICACIA LISTA ********/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_verificaref", methods={"GET"}, name="listar_verificaref")
     */
    public function listar_verificaref()
    {
        try {
            $eficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->findBy(['estado' => '1'], ['fecha' => 'ASC', 'resultado' => 'ASC']);

            $dt_eficacia = [];
            if (!empty($eficacia)) {
                foreach ($eficacia as $efc) {
                    $accion = $this->getDoctrine()->getRepository(Accion::class)->findOneBy(['estado' => '1', 'id' => $efc->getFkaccion()]);
                    $hallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->findOneBy(['estado' => '1', 'id' => $accion->getFkhallazgo()->getId()]);
                    $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->findOneBy(['estado' => '1', 'id' => $hallazgo->getFkauditoria()->getId()]);
                    
                    if ($accion->getFktipo() != null) $tipo_acn = $accion->getFktipo()->getNombre(); else $tipo_acn = '';

                    $sectores = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $accion->getFkhallazgo()->getFkauditoria()->getId()], ['fkgas' => 'ASC']);

                    $dt_sector = [];
                    if (!empty($sectores)) {
                        foreach ($sectores as $sct) {
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkgerencia() != null) $gerencia = $sct->getFkgas()->getFkgerencia()->getNombre();
                            else $gerencia = '';
                            
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkarea() != null) $area = $sct->getFkgas()->getFkarea()->getNombre();
                            else $area = '';

                            $dt_sector[] = ['gerencia' => $gerencia, 'area' => $area];
                        }
                    }

                    $fec = $efc->getFecha();
                    if($fec != null) $rsfc = $fec->format('Y-m-d'); else $rsfc = $fec;
                
                    $item_eficacia = [
                        "sectores" => $dt_sector,
                        "id_hallazgo" => $hallazgo->getId(),
                        "ordinal_hallazgo" => $hallazgo->getOrdinal(),
                        "titulo_hallazgo" => $hallazgo->getTitulo(),
                        "descripcion" => $hallazgo->getDescripcion(),
                        "id_accion" => $accion->getId(),
                        "ordinal_accion" => $accion->getOrdinal(),
                        "accion" => $accion->getDescripcion(),
                        "tipo_accion" => $tipo_acn,
                        "eficaz_si_no" => $efc->getEficaz(),
                        "resultado" => $efc->getResultado(),
                        "f_verificacion" => $rsfc,
                        "responsable" => $efc->getResponsable(),
                        "nombre_verificado" => $efc->getNombreverificador(),
                        "cargo_verificado" => $efc->getCargoverificador()
                    ];

                    $dt_eficacia[] = $item_eficacia;
                }
            }
            
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($dt_eficacia, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* FORTALEZAS LISTA *******************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_fortaleza", methods={"GET"}, name="listar_fortaleza")
     */
    public function listar_fortaleza()
    {
        try {
            $fortalezas = $this->getDoctrine()->getRepository(Fortaleza::class)->findBy(['estado' => '1'], ['fecharegistro' => 'ASC', 'descripcion' => 'ASC']);

            $response = [];
            if (!empty($fortalezas)) {
                foreach ($fortalezas as $frt) {
                    $sectores = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $frt->getFkauditoria()->getId()], ['fkgas' => 'ASC']);

                    $dt_sector = [];
                    if (!empty($sectores)) {
                        foreach ($sectores as $sct) {
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkgerencia() != null) $gerencia = $sct->getFkgas()->getFkgerencia()->getNombre();
                            else $gerencia = '';
                            
                            if ($sct->getFkgas() != null && $sct->getFkgas()->getFkarea() != null) $area = $sct->getFkgas()->getFkarea()->getNombre();
                            else $area = '';

                            $dt_sector[] = ['gerencia' => $gerencia, 'area' => $area];
                        }
                    }

                    $fecpro = $frt->getFkauditoria()->getFechaprogramada();
                    if ($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = '';

                    if ($fecpro != null) {
                        $date = date('Y', strtotime($fecpro->format('Y-m-d')));
                        $anio = $date;
                    } 
                    else $anio = '';

                    $item_frt = [
                        "sectores" => $dt_sector,
                        "id_auditoria" => $frt->getFkauditoria()->getCodigo(),
                        "anio" => $anio,
                        "f_programada" => $rsfcp,
                        "id_fortaleza" => $frt->getId(),
                        "ordinal_f" => $frt->getOrdinal(),
                        "descripcion" => $frt->getDescripcion()
                    ];
                    $response[] = $item_frt;
                }
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($response, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
    
    /***************************************************************************************************************************************************************************************************************************************************************/

    /************************************************************************************/
    /*                              * CAMBIOS RIESGOS OPORTUNIDADES CORRECTIVAS Y MEJORAS                                         /
    /*                                                                                   /
    /************************************************************************************/
    
    /* CROCM LISTA ************************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/crocm_list", methods={"POST"}, name="crocm_list")
     */
    public function crocm_list()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo, cb_ficha_procesos_codproceso AS cod_proceso,
                        cb_riesgos_oportunidades_origen AS origen_crocm, cb_riesgos_oportunidades_descripcion AS descripcion_crocm,
                        cb_riesgos_oportunidades_analisiscausaraiz AS analisis_causa_raiz, cb_probabilidad_ocurrencia_nombre AS probabilidad,
                        cb_impacto_nombre AS impacto, cb_riesgos_oportunidades_accion AS accion, cb_riesgos_oportunidades_fecha AS f_implementacion,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_riesgos_oportunidades_estadocro AS estado
                    FROM cb_procesos_ficha_procesos, cb_proc_crom, cb_procesos_tipocro, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND
                        cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND
                        cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_estado=1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($query, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* CROCM CONSULTA *********************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/crocm_consulta", methods={"POST"}, name="crocm_consulta")
     */
    public function crocm_consulta()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_procesos_codproceso AS cod_proceso, cb_riesgos_oportunidades_id AS id_cro,
                        cb_tipocro_nombre AS tipo, cb_riesgos_oportunidades_descripcion AS descripcion, cb_riesgos_oportunidades_accion AS accion,
                        cb_riesgos_oportunidades_fecha AS f_implementacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_riesgos_oportunidades_estadocro AS estado
                    FROM cb_procesos_ficha_procesos, cb_proc_crom, cb_configuracion_gerencia, cb_procesos_area, cb_proc_gas, cb_procesos_tipocro, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
                        cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND
                        cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_estado=1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($query, 'json');
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
    /* CROCM DETALLE *********************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detaud_crocm", methods={"POST"}, name="detaud_crocm")
     */
    public function detaud_crocm(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo_cro, cb_ficha_procesos_codproceso AS cod_proceso,
                        cb_riesgos_oportunidades_origen AS origen_crocm, cb_riesgos_oportunidades_descripcion AS descripcion_crocm,
                        cb_riesgos_oportunidades_analisiscausaraiz AS analisis_causa_raiz, cb_probabilidad_ocurrencia_nombre AS probabilidad,
                        cb_impacto_nombre AS impacto, cb_riesgos_oportunidades_accion AS accion, cb_riesgos_oportunidades_fecha AS f_implementacion,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_riesgos_oportunidades_estadocro AS estado
                    FROM cb_procesos_ficha_procesos, cb_proc_crom, cb_procesos_tipocro, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
                    WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND
                        cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND
                        cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_estado=1 AND cb_riesgos_oportunidades_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $crocm = $stmt->fetchAll();

            $sql2 = "SELECT cb_seguimientocro_id AS id, cb_riesgos_oportunidades_id AS id_crocm, cb_seguimientocro_fechaseg AS f_seguimiento,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_seguimiento, cb_seguimientocro_observaciones AS observaciones,
                        cb_seguimientocro_estadoseg AS estado
                    FROM cb_proc_crom, cb_procesos_seguimientocro, cb_usuario_usuario
                    WHERE cb_seguimientocro_fkriesgos=cb_riesgos_oportunidades_id AND cb_seguimientocro_estado=1 AND cb_seguimientocro_fkresponsable=cb_usuario_id AND
                        cb_riesgos_oportunidades_id=:id";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $seguimiento = $stmt->fetchAll();

            $elementos = array('crocm' => $crocm, 'seguimiento' => $seguimiento);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
    
    /***************************************************************************************************************************************************************************************************************************************************************/

    /**
     * @Route("/loginbackend", methods={"POST"}, name="loginbackend")
     */
    public function info(Request $request)
    {
        $sx = json_decode($request->getContent(), true);

        $user = $sx['user'];
        $pass = $sx['password'];

        try {
            if (empty($user) || empty($pass)) {
                $mensaje = "empty";
                return new JsonResponse($mensaje);
            }

            $usuariob = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1', 'username' => $user)); //, 'password'=>$pass
            $cx = $this->getDoctrine()->getManager();

            if (empty($usuariob)) {
                $mensaje = "error";
                return new JsonResponse($mensaje);
            } else {
                $personal = $this->getDoctrine()->getRepository(Personal::class)->findOneBy(array('estado' => '1', 'username' => $user));
                if (empty($personal)) $item_personal = null;
                else $item_personal = $personal->getLegajo();

                $elementos = array('Nombre' => $usuariob[0]->getNombre(), 'Apellido' => $usuariob[0]->getApellido(), 'Cargo' => 'Gerente', 'login' => $user, 'item_personal' => $item_personal);

                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $data2 = $serializer->serialize($elementos, 'json');
                return new Response($data2);
            }
        } catch (ConnectionException $ce) {
            $mensaje = "error";
            return new JsonResponse($mensaje);
        }
    }

    /**
     * @Route("/loginbackend4", methods={"POST"}, name="loginbackend4")
     */
    public function info4(Request $request)
    {
        $sx = json_decode($request->getContent(), true);

        $username = $_SERVER['LDAPUSER'];
        $password = $_SERVER['LDAPPASS'];
        $process = 'init';

        $user = $sx['user'];
        $pass = $sx['password'];

        $translator = new Translator('es_ES');
        $translator->addLoader('array', new ArrayLoader());
        $translator->addResource('array', [
            "Can't contact LDAP server" => "No se puede contactar con el servidor LDAP",
        ], "es_ES");
        $translator->addResource('array', [
            "Invalid credentials" => "Credenciales inválidas",
        ], "es_ES");
        $translator->addResource('array', [
            "Connection timeout" => "No se puede conectar al servidor LDAP",
        ], "es_ES");
        $translator->addResource('array', [
            "The LDAP PHP extension is not enabled." => "La extensión PHP LDAP no está habilitada.",
        ], "es_ES");
        
        try {
            if (empty($user) || empty($pass)) {
                $mensaje = "empty";
                return new JsonResponse($mensaje);
            }
            //$dn = "CN=" . $username . ",OU=Personal Regular,OU=UTI,OU=ELFEC,DC=elfec,DC=com";
            $dn="cn=".$username.",CN=Users,DC=elfec,DC=com";

            $process = 'connect';
            $ldap = Ldap::create('ext_ldap', array(
                'host' => $_SERVER['LDAPIP'],
                'encryption' => 'none',
                'port' => $_SERVER['LDAPPORT'],
            ));
            $attributes = ['givenName' /*Nombres*/, 'department' /*gerencia*/, 'sn' /*appellidos*/, 'title' /*cargo*/, 'dn' /*dn*/, 'mail' /*email*/, 'name' /*primernombre*/, 'physicalDeliveryOfficeName' /* cargo */, 'sAMAccountName' /*login*/, 'userPrincipalName' /*loginparaloguear@elfec.com*/];
            
            $process = 'validate';
            $ldap->bind($dn, $password);
            $process = 'consult';
            $query = $ldap->query('DC=elfec,DC=com', 'sAMAccountName=' . $user, ['filter' => $attributes]);

            $results = $query->execute();
            
            $cx = $this->getDoctrine()->getManager();
            if($results != null){
                foreach ($results as $entry) {
                    $entry; // Do something with the results
                    $encoders = [new XmlEncoder(), new JsonEncoder()];
                    $normalizers = [new ObjectNormalizer()];
    
                    $serializer = new Serializer($normalizers, $encoders);
                    $data = $serializer->normalize($entry, null);
    
                    if (array_key_exists("sAMAccountName", $data['attributes'])) {
                        if ($user == $data['attributes']['sAMAccountName'][0]) {
                            $dn = $data['dn'];
                            $data_user = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(array('estado' => '1', 'username' => $user));
                            if(!empty($data_user)) $process = 'username';
    
                            $ldap->bind($dn, $pass);
                            $process = 'success';
    
                            if (array_key_exists("givenName", $data['attributes'])) $nombre = $data['attributes']['givenName'][0];
                            else $nombre = 'Sin\Nombre';

                            if (array_key_exists("sn", $data['attributes'])) $apellido = $data['attributes']['sn'][0];
                            else $apellido = 'Sin\Apellido';
    
                            if (array_key_exists("title", $data['attributes'])) $cargo = $data['attributes']['title'][0];
                            else $cargo = 'Sin\Cargo';
                            
                            if (array_key_exists("mail", $data['attributes'])) $correo = $data['attributes']['mail'][0];
                            else $correo = 'Sin/Correo';
                            
                            if (array_key_exists("sAMAccountName", $data['attributes'])) $login = $data['attributes']['sAMAccountName'][0];
                            else $login = 'Sin\login';

                            if (empty($data_user)) {
                                $usuarionuevo = new Usuario();
                                
                                $usuarionuevo->setNombre($nombre);
                                $usuarionuevo->setApellido($apellido);
                                $usuarionuevo->setCorreo($correo);
                                $usuarionuevo->setCargo($cargo);
                                $usuarionuevo->setUsername($login);

                                if (array_key_exists("cn", $data['attributes'])) {
                                    if ($data['attributes']['cn'][0] == 'Administrador') {
                                        $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(array('estado' => '1', 'nombre' => 'Administrador'));
                                    } else {
                                        $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(array('estado' => '1', 'nombre' => 'Usuario'));
                                    }
                                } else {
                                    $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(array('estado' => '1', 'nombre' => 'Usuario'));
                                }
                                $usuarionuevo->setEstado(1);

                                $usuarionuevo->setFkrol($rol);
                                $cx->persist($usuarionuevo);
                                $cx->flush();
                            }
                            
                            /*if (isset($data['attributes']['physicalDeliveryOfficeName'][0])) {
                                $unidad = $data['attributes']['physicalDeliveryOfficeName'][0];
                                $unidadEntidad = $this->getDoctrine()->getRepository(Unidad::class)->findOneBy(array('nombre' => $unidad, 'estado' => '1'));
                                $user_act = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(array('username' => $user, 'estado' => '1'));
    
                                if($unidadEntidad != null){
                                    $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findOneBy(['fkusuario' => $user_act->getId(), 'fkunidad' => $unidadEntidad->getId(), 'estado' => '1']);
                                    
                                    if (empty($permiso)) {
                                        $newpermiso = new Permiso();
                                        $newpermiso->setFkusuario($user_act);
                                        $newpermiso->setFkunidad($unidadEntidad);
                                        $newpermiso->setTipo('Completo');
                                        $newpermiso->setEstado(1);
                                        $cx->persist($newpermiso);
                                        $cx->flush();
                                    }
                                }
                            }*/
    
                            $personal = $this->getDoctrine()->getRepository(Personal::class)->findOneBy(array('estado' => '1', 'username' => $user));
                            if (empty($personal)) $item_personal = null;
                            else{
                                $item_personal = $personal->getLegajo();
                                if($personal->getFkPersonalCargo() != null) $cargo = $personal->getFkPersonalCargo()->getNombre();
                            }
    
                            $elementos = array('Nombre' => $nombre, 'Apellido' => $apellido, 'Cargo' => $cargo, 'login' => $login, 'item_personal' => $item_personal, 'process' => $process);
    
                            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                            $data2 = $serializer->serialize($elementos, 'json');
                            return new Response($data2);
                        }
                    }
                }
                $respuesta = array('message' => 'Datos de usuario incorrectos.', 'process' => $process);

                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $data2 = $serializer->serialize($respuesta, 'json');
                return new Response($data2);
            }else{
                $respuesta = array('message' => 'No existen datos en el AD para la consulta realizada.', 'process' => $process);

                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $data2 = $serializer->serialize($respuesta, 'json');
                return new Response($data2);
            }
            throw new Exception();
        } 
        catch (ConnectionException $ce) {
            if ($process == 'username') $ldap_msg = "Contraseña incorrecta";
            else {
                if ($process == 'validate') $ldap_msg = "Error al consultar los datos del AD";
                else{
                    $process = 'exception';
                    $ldap_msg = $ce->getMessage();
                }
            }

            //return new JsonResponse($translator->trans($ldap_msg));
            $respuesta = array('message' => $translator->trans($ldap_msg), 'process' => $process);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($respuesta, 'json');
            return new Response($data2);
        } 
        catch (Exception $e) {
            $ldap_msg = $e->getMessage();
            $respuesta = array('message' => $translator->trans($ldap_msg), 'process' => '');

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($respuesta, 'json');
            return new Response($data2);
        }
        /*finally {
            switch ($process) {
                case "connect":
                    $ldap_msg = "The LDAP PHP extension is not enabled.";

                    //return new JsonResponse($translator->trans($ldap_msg));
                    $elementos = array('message' => $translator->trans($ldap_msg), 'process' => $process);

                    $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                    $data2 = $serializer->serialize($elementos, 'json');
                    return new Response($data2);
                    break;
            }
        }*/
    }

    /**
     * @Route("/combo_proceso", methods={"GET"}, name="combo_proceso")
     */
    public function combo_proceso()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_ficha_procesos_id AS idfp, cb_ficha_procesos_codproceso AS codigofp
                    FROM cb_procesos_ficha_procesos
                    ORDER BY codigofp";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $proceso = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($proceso, 'json');
            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/combo_tipocrocm", methods={"GET"}, name="combo_tipocrocm")
     */
    public function combo_tipocrocm()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $tipo = $cx->getRepository(TipoCRO::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($tipo, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }

    /**
     * @Route("/combo_probabilidad", methods={"GET"}, name="combo_probabilidad")
     */
    public function combo_probabilidad()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $probabilidad = $cx->getRepository(Probabilidad::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($probabilidad, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }

    /**
     * @Route("/combo_impacto", methods={"GET"}, name="combo_impacto")
     */
    public function combo_impacto()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $impacto = $cx->getRepository(Impacto::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($impacto, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }

    /**
     * @Route("/combo_responsable", methods={"GET"}, name="combo_responsable")
     */
    public function combo_responsable()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_usuario_id AS idu, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS nombre
                    FROM cb_usuario_usuario
                    ORDER BY nombre";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $responsable = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($responsable, 'json');
            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/insertar_crocm", methods={"POST"}, name="insertar_crocm")
     */
    public function insertar_crocm(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $cx = $this->getDoctrine()->getManager();

            $descripcion = $sx['descripcion'];
            $origen = $sx['origen'];
            $accion = $sx['accion'];
            $fecha = $sx['fecha'];
            $estadocro = $sx['estadocro'];
            $analisiscausaraiz = $sx['analisiscausaraiz'];

            $fichaprocesos = $sx['fichaprocesos'];
            $tipocro = $sx['tipocro'];
            $probabilidad = $sx['probabilidad'];
            $impacto = $sx['impacto'];
            $fkresponsable = $sx['fkresponsable'];

            $riesgosoportunidades = new RiesgosOportunidades();
            $riesgosoportunidades->setDescripcion($descripcion);
            $riesgosoportunidades->setOrigen($origen);
            $riesgosoportunidades->setAccion($accion);
            $riesgosoportunidades->setFecha(new \DateTime($fecha));
            $estadocro == null ? $estadocro = '' : $estadocro = $sx['estadocro'];

            $riesgosoportunidades->setEstadocro($estadocro);
            $riesgosoportunidades->setAnalisiscausaraiz($analisiscausaraiz);
            $riesgosoportunidades->setEstado(1);

            $fichaprocesos != '' ? $fichaprocesos = $this->getDoctrine()->getRepository(FichaProcesos::class)->find($fichaprocesos) : $fichaprocesos = null;
            $tipocro != '' ? $tipocro = $this->getDoctrine()->getRepository(TipoCRO::class)->find($tipocro) : $tipocro = null;
            $probabilidad != '' ? $probabilidad = $this->getDoctrine()->getRepository(Probabilidad::class)->find($probabilidad) : $probabilidad = null;
            $impacto != '' ? $impacto = $this->getDoctrine()->getRepository(Impacto::class)->find($impacto) : $impacto = null;
            $fkresponsable != '' ? $fkresponsable = $this->getDoctrine()->getRepository(Usuario::class)->find($fkresponsable) : $fkresponsable = null;

            $riesgosoportunidades->setFkficha($fichaprocesos);
            $riesgosoportunidades->setFktipo($tipocro);
            $riesgosoportunidades->setFkprobabilidad($probabilidad);
            $riesgosoportunidades->setFkimpacto($impacto);
            $riesgosoportunidades->setFkresponsable($fkresponsable);
            $cx->persist($riesgosoportunidades);
            $cx->flush();

            $mensaje[0] = ["response" => "success"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }

    /**
     * @Route("/combo_org_cargo", methods={"GET"}, name="combo_org_cargo")
     */
    public function combo_org_cargo()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_cargo_id AS idc, cb_cargo_nombre AS cargo 
                    FROM cb_personal_cargo
                    ORDER BY 2";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $combo = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($combo, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }

    /**
     * @Route("/combo_organigrama", methods={"GET"}, name="combo_organigrama")
     */
    public function combo_organigrama()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $organigrama = $cx->getRepository(OrganigramaGerencia::class)->findBy(['estado' => '1'], ['id' => 'ASC']);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($organigrama, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }

    /**
     * @Route("/listar_cobertura", methods={"POST"}, name="listar_cobertura")
     */
    public function listar_cobertura()
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();

            $sql = "SELECT cb_tipo_cobertura_id AS id, cb_tipo_cobertura_nombre AS nombre, cb_tipo_cobertura_descripcion AS descripcion
                    FROM cb_ind_tipo_cobertura
                    WHERE cb_tipo_cobertura_estado=1";
            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $tipo = $stmt->fetchAll();

            $sql2 = "SELECT cb_cobertura_id AS id, cb_cobertura_fktipo AS fktipo, cb_cobertura_unidad AS unidad, cb_cobertura_anio AS anio, cb_cobertura_mes AS mes, cb_cobertura_valor AS valor
                    FROM cb_ind_cobertura
                    WHERE cb_cobertura_estado=1";

            $stmt = $cx->prepare($sql2);
            $stmt->execute();
            $cobertura = $stmt->fetchAll();

            $elementos = array('tipo' => $tipo, 'cobertura' => $cobertura);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/data_correlative4", methods={"POST"}, name="data_correlative4")
     */
    public function data_correlative4(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            $year = $sx['anio'];
            $cx = $this->getDoctrine()->getEntityManager();

            $correlativo = $cx->getRepository(Correlativo::class)->findPermissionByUser($user, $year);

            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadPermissionByUser($user);
            $unidades = array_column($unidad, 'id');

            $correlativos = array();
            if($correlativo != null){
                foreach ($correlativo as $crtv) {
                    $dtcrtv = $crtv;

                    $fecreg = $dtcrtv['fechareg'];
                    $fecent = $dtcrtv['entrega'];

                    if ($dtcrtv['item'] != null && $dtcrtv['item'] != "" && $dtcrtv['item'] != 0) {
                        $itemvl = $dtcrtv['item'];
                    } else {
                        $itemvl = "";
                    }

                    $fksolicitante = $dtcrtv['fksolicitante'];
                    $fkcorrelativo = $dtcrtv['fkcorrelativo'];
                    $fktiponota = $dtcrtv['fktiponota'];
                    $fkunidad = $dtcrtv['fkunidad'];
                    $fksolicitante != ''? $fksolicitante = $this->getDoctrine()->getRepository(Usuario::class)->find($fksolicitante):$fksolicitante=null;
                    $fkcorrelativo != ''? $fkcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($fkcorrelativo):$fkcorrelativo=null;
                    $fktiponota != ''? $fktiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find($fktiponota):$fktiponota=null;
                    $fkunidad != ''? $fkunidad = $this->getDoctrine()->getRepository(Unidad::class)->find($fkunidad):$fkunidad=null;
                    
                    if($fksolicitante != null) $fullname = $fksolicitante->getNombre().' '.$fksolicitante->getApellido();
                    else $fullname = '';

                    if($fkunidad != null){
                        if(in_array($fkunidad->getId(), $unidades)) $action_permission = true;
                        else $action_permission = false;
                    }
                    else $action_permission = false;

                    $serializer = new Serializer(array(new ObjectNormalizer()));
                    $fksolicitante_cln = $serializer->normalize($fksolicitante, null, array('attributes' => array('id', 'nombre', 'apellido')));
                    $fkcorrelativo_cln = $serializer->normalize($fkcorrelativo, null, array('attributes' => array('id', 'codigo', 'nombre', 'descripcion')));
                    $fktiponota_cln = $serializer->normalize($fktiponota, null, array('attributes' => array('id', 'nombre', 'descripcion')));
                    $fkunidad_cln = $serializer->normalize($fkunidad, null, array('attributes' => array('id', 'nombre')));

                    if (strpos($dtcrtv['url'], ";base64,") !== false) $dturl = 'base64';
                    else {
                        if (!in_array($dtcrtv['url'], ['N/A', null, ''])) {
                            $urlfl = $this->getParameter('Directorio_proyecto').$dtcrtv['url'];
                            if (file_exists($urlfl) && (strpos($urlfl, '.') !== false)) $dturl = $dtcrtv['url'];
                            else $dturl = 'N/A';
                        }
                        else $dturl = 'N/A';
                    }

                    if (strpos($dtcrtv['urleditable'], ";base64,") !== false) $dturleditable = 'base64';
                    else {
                        if (!in_array($dtcrtv['urleditable'], ['N/A', null, ''])) {
                            $urleditablefl = $this->getParameter('Directorio_proyecto').$dtcrtv['urleditable'];
                            if (file_exists($urleditablefl) && (strpos($urleditablefl, '.') !== false)) $dturleditable = $dtcrtv['urleditable'];
                            else $dturleditable = 'N/A';
                        }
                        else $dturleditable = 'N/A';
                    }

                    if (strpos($dtcrtv['urlorigen'], ";base64,") !== false) $dturlorigen = 'base64';
                    else {
                        if (!in_array($dtcrtv['urlorigen'], ['N/A', null, ''])) {
                            $urlorigenfl = $this->getParameter('Directorio_proyecto').$dtcrtv['urlorigen'];
                            if (file_exists($urlorigenfl) && (strpos($urlorigenfl, '.') !== false)) $dturlorigen = $dtcrtv['urlorigen'];
                            else $dturlorigen = 'N/A';
                        }
                        else $dturlorigen = 'N/A';
                    }

                    $sendinf = [
                        "id" => $dtcrtv['id'],
                        "antecedente" => $dtcrtv['antecedente'],
                        "item" => $itemvl,
                        "numcorrelativo" => $dtcrtv['numcorrelativo'],
                        "fechareg" => $fecreg,
                        "redactor" => $dtcrtv['redactor'],
                        "destinatario" => $dtcrtv['destinatario'],
                        "referencia" => $dtcrtv['referencia'],
                        "fksolicitante" => $fksolicitante_cln,
                        "fkcorrelativo" => $fkcorrelativo_cln,
                        "fktiponota" => $fktiponota_cln,
                        "estadocorrelativo" => $dtcrtv['estadocorrelativo'],
                        "ip" => $dtcrtv['ip'],
                        "url" => $dturl,
                        "urleditable" => $dturleditable,
                        "entrega" => $fecent,
                        "fkunidad" => $fkunidad_cln,
                        "urlorigen" => $dturlorigen,
                        "fullname" => $fullname,
                        "action_permission" => $action_permission
                    ];
                    $correlativos[] = $sendinf;
                }
            }

            if($unidades != null) $access = true;
            else $access = false;

            $sql = "SELECT DISTINCT(date_part('Year', cb_correlativo_fechareg)) AS anio
                FROM cb_correlativo_correlativo
                WHERE cb_correlativo_estado=1
                ORDER BY 1";

            $stmt = $cx->getConnection()->prepare($sql);
            $stmt->execute();
            $combo = $stmt->fetchAll();
            $data_gestion = array_column($combo, 'anio');

            $datos = array('btn_permission' => $access, 'combo_gestion' => $data_gestion, 'correlativos' => $correlativos);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($datos, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            $mensaje[0] = ["response" => "error"];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($mensaje, 'json');

            return new Response($data);
        }
    }
    
    /**
     * @Route("/data_correlative", methods={"POST"}, name="data_correlative")
     */
    public function data_correlative(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            $year = $sx['anio'];
            $cx = $this->getDoctrine()->getManager();
            
            $code = 200;
            $error = false;

            $correlativo = $cx->getRepository(Correlativo::class)->findPermissionByUser($user, $year);
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadPermissionByUser($user);
            $unidades = array_column($unidad, 'id');

            $correlativos = array();
            if (!empty($correlativo)) {
                foreach ($correlativo as $crtv) {
                    $dtcrtv = $crtv;

                    $fecreg = $dtcrtv['fechareg'];
                    $fecent = $dtcrtv['entrega'];

                    $itemvl = !in_array($dtcrtv['item'], [null, 0, ''])? $dtcrtv['item']: "";

                    $fksolicitante = $dtcrtv['fksolicitante'];
                    $fkcorrelativo = $dtcrtv['fkcorrelativo'];
                    $fktiponota = $dtcrtv['fktiponota'];
                    $fkunidad = $dtcrtv['fkunidad'];
                    $fksolicitante = $fksolicitante != ''? $this->getDoctrine()->getRepository(Usuario::class)->find($fksolicitante): null;
                    $fkcorrelativo = $fkcorrelativo != ''? $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($fkcorrelativo): null;
                    $fktiponota = $fktiponota != ''? $this->getDoctrine()->getRepository(TipoNota::class)->find($fktiponota): null;
                    $fkunidad = $fkunidad != ''? $this->getDoctrine()->getRepository(Unidad::class)->find($fkunidad): null;
                    
                    $fullname = $fksolicitante != null? $fksolicitante->getNombre().' '.$fksolicitante->getApellido(): '';

                    if ($fkunidad != null) {
                        $action_permission = in_array($fkunidad->getId(), $unidades)? true: false;
                    }
                    else $action_permission = false;

                    $fksolicitante_cln = $this->serializer_obj->normalize($fksolicitante, null, array('attributes' => array('id', 'nombre', 'apellido')));
                    $fkcorrelativo_cln = $this->serializer_obj->normalize($fkcorrelativo, null, array('attributes' => array('id', 'codigo', 'nombre', 'descripcion')));
                    $fktiponota_cln = $this->serializer_obj->normalize($fktiponota, null, array('attributes' => array('id', 'nombre', 'descripcion')));
                    $fkunidad_cln = $this->serializer_obj->normalize($fkunidad, null, array('attributes' => array('id', 'nombre')));

                    if (strpos($dtcrtv['url'], ";base64,") !== false) $dturl = 'base64';
                    else {
                        if (!in_array($dtcrtv['url'], ['N/A', null, ''])) {
                            $urlfl = $this->getParameter('Directorio_proyecto').$dtcrtv['url'];
                            $dturl = (file_exists($urlfl) && strpos($urlfl, '.') !== false)? $dtcrtv['url']: 'N/A';
                        }
                        else $dturl = 'N/A';
                    }

                    if (strpos($dtcrtv['urleditable'], ";base64,") !== false) $dturleditable = 'base64';
                    else {
                        if (!in_array($dtcrtv['urleditable'], ['N/A', null, ''])) {
                            $urleditablefl = $this->getParameter('Directorio_proyecto').$dtcrtv['urleditable'];
                            $dturleditable = (file_exists($urleditablefl) && strpos($urleditablefl, '.') !== false)? $dtcrtv['urleditable']: 'N/A';
                        }
                        else $dturleditable = 'N/A';
                    }

                    if (strpos($dtcrtv['urlorigen'], ";base64,") !== false) $dturlorigen = 'base64';
                    else {
                        if (!in_array($dtcrtv['urlorigen'], ['N/A', null, ''])) {
                            $urlorigenfl = $this->getParameter('Directorio_proyecto').$dtcrtv['urlorigen'];
                            $dturlorigen = (file_exists($urlorigenfl) && strpos($urlorigenfl, '.') !== false)? $dtcrtv['urlorigen']: 'N/A';
                        }
                        else $dturlorigen = 'N/A';
                    }

                    $itemcrtv = [
                        "id" => $dtcrtv['id'],
                        "antecedente" => $dtcrtv['antecedente'],
                        "item" => $itemvl,
                        "numcorrelativo" => $dtcrtv['numcorrelativo'],
                        "fechareg" => $fecreg,
                        "redactor" => $dtcrtv['redactor'],
                        "destinatario" => $dtcrtv['destinatario'],
                        "referencia" => $dtcrtv['referencia'],
                        "fksolicitante" => $fksolicitante_cln,
                        "fkcorrelativo" => $fkcorrelativo_cln,
                        "fktiponota" => $fktiponota_cln,
                        "estadocorrelativo" => $dtcrtv['estadocorrelativo'],
                        "ip" => $dtcrtv['ip'],
                        "url" => $dturl,
                        "urleditable" => $dturleditable,
                        "entrega" => $fecent,
                        "fkunidad" => $fkunidad_cln,
                        "urlorigen" => $dturlorigen,
                        "fullname" => $fullname,
                        "action_permission" => $action_permission
                    ];
                    $correlativos[] = $itemcrtv;
                }
            }

            $access = !empty($unidades)? true: false;
            
            $combo = $cx->getRepository(Correlativo::class)->findYears();
            $data_gestion = array_column($combo, 'anio');

            $datos = array('btn_permission' => $access, 'combo_gestion' => $data_gestion, 'correlativos' => $correlativos);
        } catch (Exception $e) {
            $code = 500;
            $error = true;
            $message = "Error: {$e->getMessage()}";
        }
    
        $response = new Response();
        $dtresponse = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $datos : $message
        ];
        $jsonresp = $this->serializer_json->serialize($dtresponse, "json");

        $response->setContent($jsonresp);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');
        $response->prepare($request);

        return $response;
    }

    public function array_columns(array $arr, array $keysSelect)
    {
        $keys = array_flip($keysSelect);
        $filteredArray = array_map(function($a) use($keys){
            return array_intersect_key($a,$keys);
        }, $arr);

        return $filteredArray;
    }

    /**
     * @Route("/formdt_correlative", methods={"POST"}, name="formdt_correlative")
     */
    public function formdt_correlative(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            $year = $sx['anio'];
            $cx = $this->getDoctrine()->getManager();
            
            $code = 200;
            $error = false;

            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $datacontrol = $this->serializer_obj->normalize($controlcorrelativo, null, array('attributes' => array('id', 'nombre')));

            $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $datatipo = $this->serializer_obj->normalize($tiponota, null, array('attributes' => array('id', 'nombre')));

            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadPermissionByUser($user);
            $keysData = array('id', 'nombre');
            $dataunidad = $this->array_columns($unidad, $keysData);

            $access = ($dataunidad != null)? true: false;

            $correlativos = $cx->getRepository(Correlativo::class)->findEditors();
            $redactor = array_column($correlativos, 'redactor');

            $controldt = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findOneBy(['nombre' => 'ELFEC']);
            $idcontrol = $this->serializer_obj->normalize($controldt, null, array('attributes' => array('id')));

            $combos = array('idctrl' => $idcontrol, 'permission_units' => $access, 'redactores' => $redactor, 'control' => $datacontrol, 'nota' => $datatipo, 'unidad' => $dataunidad);
        } catch (Exception $e) {
            $code = 500;
            $error = true;
            $message = "Error: {$e->getMessage()}";
        }
    
        $response = new Response();
        $dtresponse = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $combos : $message
        ];
        $jsonresp = $this->serializer_json->serialize($dtresponse, "json");

        $response->setContent($jsonresp);
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);

        return $response;
    }

    public function numerar()
    {
        try {
            date_default_timezone_set('America/La_Paz');
            $anio = date("Y");
            
            $number = $this->getDoctrine()->getRepository(Correlativo::class)->findNumbering($anio);
            $num = empty($number)? 1: $number[0]['numcorrelativo'];

            return $num;
        } catch (Exception $e) {
            return 0;
        }

    }

    /**
     * @Route("/correlative_insert", methods={"POST"}, name="correlative_insert")
     */
    public function correlative_insert(Request $request)
    {
        try {
            $datos = $_POST;
            $archivos = $_FILES;

            $entrega = $datos['entrega'];
            $fkcorrelativo = $datos['fkcorrelativo'];
            $fktiponota = $datos['fktiponota'];
            $fkunidad = $datos['fkunidad'];
            
            $code = 200;
            $error = false;
            
            date_default_timezone_set('America/La_Paz');
            $gestion = date("Y");

            if (array_key_exists("id", $datos)) {
                $correlative = $this->getDoctrine()->getRepository(Correlativo::class)->find($datos['id']);
            } else {
                $correlative = new Correlativo();

                $fksolicitante = $datos['fksolicitante'];
                $item = $datos['item'];
                
                $numcorrelativo = $this->numerar();
                $url = 'N/A';
                $urleditable = 'N/A';
                $urlorigen = 'N/A';

                $fksolicitante = $fksolicitante != ''? $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(['username' => $fksolicitante]): null;

                $correlative->setFechareg(new \DateTime('now'));
                $correlative->setNumcorrelativo($numcorrelativo);
                $correlative->setFksolicitante($fksolicitante);
                $correlative->setEstadoCorrelativo('Vigente');
                $correlative->setIp('');
                $correlative->setUrl($url);
                $correlative->setUrleditable($urleditable);
                $correlative->setUrlorigen($urlorigen);
                $correlative->setEstado(1);
    
                if (!in_array($item, [null, '', 0, 'null'])) $correlative->setItem($item);
            }

            if (array_key_exists("url", $archivos)) {
                if (!empty($archivos['url']['name'])) {
                    if (!empty($archivos["url"]["type"])) {
                        $fileName = $archivos['url']['name'];
                        $fileName = $gestion.'_'.$correlative->getNumcorrelativo().'_'.str_replace(" ", "_", $fileName);
                        $sourcePath = $archivos['url']['tmp_name'];
                        $targetPath = $this->getParameter('Directorio_Correlativo') . '/' . $fileName;
                        
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            $uploadedFile = $fileName;
                        }
                        $url = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                        $url = str_replace("\\", "/", $url);
                        $correlative->setUrl($url);
                    }
                }
            }

            if (array_key_exists("urleditable", $archivos)) {
                if (!empty($archivos['urleditable']['name'])) {
                    if (!empty($archivos["urleditable"]["type"])) {
                        $fileName = $archivos['urleditable']['name'];
                        $fileName = $gestion.'_'.$correlative->getNumcorrelativo().'_'.str_replace(" ", "_", $fileName);
                        $sourcePath = $archivos['urleditable']['tmp_name'];
                        $targetPath = $this->getParameter('Directorio_Correlativo') . '/' . $fileName;
                        
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            $uploadedFile = $fileName;
                        }
                        $urleditable = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                        $urleditable = str_replace("\\", "/", $urleditable);
                        $correlative->setUrleditable($urleditable);
                    }
                }
            }

            if (array_key_exists("urlorigen", $archivos)) {
                if (!empty($archivos['urlorigen']['name'])) {
                    if (!empty($archivos["urlorigen"]["type"])) {
                        $fileName = $archivos['urlorigen']['name'];
                        $fileName = $gestion.'_'.$correlative->getNumcorrelativo().'_'.str_replace(" ", "_", $fileName);
                        $sourcePath = $archivos['urlorigen']['tmp_name'];
                        $targetPath = $this->getParameter('Directorio_Correlativo') . '/' . $fileName;
                        
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            $uploadedFile = $fileName;
                        }
                        $urlorigen = substr($targetPath, strpos($targetPath, "public") + 6, strlen($targetPath));
                        $urlorigen = str_replace("\\", "/", $urlorigen);
                        $correlative->setUrlorigen($urlorigen);
                    }
                }
            }
            
            $fkcorrelativo = $fkcorrelativo != ''? $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find(['id' => $fkcorrelativo]): null;
            $fktiponota = $fktiponota != ''? $this->getDoctrine()->getRepository(TipoNota::class)->find(['id' => $fktiponota]): null;
            $fkunidad = $fkunidad != ''? $this->getDoctrine()->getRepository(Unidad::class)->find(['id' => $fkunidad]): null;
            
            $cx = $this->getDoctrine()->getManager();

            $correlative->setRedactor($datos['redactor']);
            $correlative->setDestinatario($datos['destinatario']);
            $correlative->setReferencia($datos['referencia']);
            $correlative->setFkcorrelativo($fkcorrelativo);
            $correlative->setFktiponota($fktiponota);
            $correlative->setAntecedente($datos['antecedente']);
            $correlative->setFkunidad($fkunidad);
            if (!in_array($entrega, [null, '', 'null'])) $correlative->setEntrega(new \DateTime($entrega));

            if (array_key_exists("id", $datos)) {
                $cx->merge($correlative);
                $message = "Correlativo número ".$correlative->getNumcorrelativo()." modificado correctamente.";
            } else {
                $cx->persist($correlative);
                $message = "El número de correlativo es: ".$correlative->getNumcorrelativo().".";
            }
            $cx->flush();
        } catch (Exception $e) {
            $code = 500;
            $error = true;
            $message = "Error: {$e->getMessage()}";
        }
    
        $response = new Response();
        $dtresponse = [
            'code' => $code,
            'error' => $error,
            'data' => $message
        ];
        $jsonresp = $this->serializer_json->serialize($dtresponse, "json");

        $response->setContent($jsonresp);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');
        $response->prepare($request);

        return $response;
    }

    /**
     * @Route("/correlative_edit", methods={"POST"}, name="correlative_edit")
     */
    public function correlative_edit(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $user = $sx['username'];
            $year = $sx['anio'];
            $cx = $this->getDoctrine()->getManager();
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            
            $code = 200;
            $error = false;

            if ($correlativo != null) {
                $fecreg = $correlativo->getFechareg();
                $fecent = $correlativo->getEntrega();
                $rsfcr = $fecreg != null? $fecreg->format('Y-m-d'): $fecreg;

                $rsfce = $fecent != null? $fecent->format('Y-m-d'): $fecent;

                $fksolicitante = $correlativo->getFksolicitante();
                $fkcorrelativo = $correlativo->getFkcorrelativo();
                $fktiponota = $correlativo->getFktiponota();
                $fkunidad = $correlativo->getFkunidad();

                $fksolicitante_cln = $this->serializer_obj->normalize($fksolicitante, null, array('attributes' => array('id', 'nombre', 'apellido')));
                $fkcorrelativo_cln = $this->serializer_obj->normalize($fkcorrelativo, null, array('attributes' => array('id', 'codigo', 'nombre', 'descripcion')));
                $fktiponota_cln = $this->serializer_obj->normalize($fktiponota, null, array('attributes' => array('id', 'nombre', 'descripcion')));
                $fkunidad_cln = $this->serializer_obj->normalize($fkunidad, null, array('attributes' => array('id', 'nombre')));

                $sendinf = [
                    "id" => $correlativo->getId(),
                    "fechareg" => $rsfcr,
                    "numcorrelativo" => $correlativo->getNumcorrelativo(),
                    "fksolicitante" => $fksolicitante_cln,
                    "redactor" => $correlativo->getRedactor(),
                    "destinatario" => $correlativo->getDestinatario(),
                    "referencia" => $correlativo->getReferencia(),
                    "fkcorrelativo" => $fkcorrelativo_cln,
                    "fktiponota" => $fktiponota_cln,
                    "url" => $correlativo->getUrl(),
                    "antecedente" => $correlativo->getAntecedente(),
                    "estadocorrelativo" => $correlativo->getEstadoCorrelativo(),
                    "item" => $correlativo->getItem(),
                    "urleditable" => $correlativo->getUrleditable(),
                    "entrega" => $rsfce,
                    "fkunidad" => $fkunidad_cln,
                    "urlorigen" => $correlativo->getUrlorigen(),
                    "ipcontrol" => $correlativo->getIp()
                ];
            }
            else $sendinf = null;

            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $datacontrol = $this->serializer_obj->normalize($controlcorrelativo, null, array('attributes' => array('id', 'nombre')));

            $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $datatipo = $this->serializer_obj->normalize($tiponota, null, array('attributes' => array('id', 'nombre')));

            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadPermissionByUser($user);
            $keysData = array('id', 'nombre');
            $dataunidad = $this->array_columns($unidad, $keysData);

            if ($correlativo->getFkunidad() != null) {
                $dtunit = array_column($unidad, 'id');

                $access = in_array($correlativo->getFkunidad()->getId(), $dtunit)? true: false;
            }
            else $access = false;

            $correlativos = $cx->getRepository(Correlativo::class)->findEditors();
            $redactor = array_column($correlativos, 'redactor');

            $datos = array('permission_unit' => $access, 'correlativo' => $sendinf, 'redactores' => $redactor, 'control' => $datacontrol, 'nota' => $datatipo, 'unidad' => $dataunidad);
        } catch (Exception $e) {
            $code = 500;
            $error = true;
            $message = "Error: {$e->getMessage()}";
        }
    
        $response = new Response();
        $dtresponse = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $datos : $message
        ];
        $jsonresp = $this->serializer_json->serialize($dtresponse, "json");

        $response->setContent($jsonresp);
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);

        return $response;
    }

    /**
     * @Route("/get_b64file", methods={"POST"}, name="get_b64file")
     */
    public function get_b64file(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $tipo = $sx['tipo'];
            
            $code = 200;
            $error = false;
            
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->findDataFile($id);
            $keysData = array('id', 'gestion', 'numcorrelativo', $tipo);
            $datafile = $this->array_columns($correlativo, $keysData);
        } catch (Exception $e) {
            $code = 500;
            $error = true;
            $message = "Error: {$e->getMessage()}";
        }
    
        $response = new Response();
        $dtresponse = [
            'code' => $code,
            'error' => $error,
            'data' => $code == 200 ? $datafile : $message
        ];
        $jsonresp = $this->serializer_json->serialize($dtresponse, "json");

        $response->setContent($jsonresp);
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);

        return $response;
    }

    /**
     * @Route("/correlative_delete", methods={"POST"}, name="correlative_delete")
     */
    public function correlative_delete(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $cx = $this->getDoctrine()->getManager();
            $id = $sx['id'];
            $user = $sx['username'];
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadPermissionByUser($user);
            
            $code = 200;
            $error = false;

            if ($correlativo->getFkunidad() != null) {
                $dtunit = array_column($unidad, 'id');

                $access = in_array($correlativo->getFkunidad()->getId(), $dtunit)? true: false;
            }
            else $access = false;

            if ($access) {
                $correlativo->setEstadoCorrelativo('Anulado');
                $cx->persist($correlativo);
                $cx->flush();

                $message = "Correlativo número " . $correlativo->getNumcorrelativo() . " anulado correctamente.";
            }
            else $message = "No tiene permiso para realizar esta acción en esta unidad.";
        } catch (Exception $e) {
            $code = 500;
            $error = true;
            $message = "Error: {$e->getMessage()}";
        }
    
        $response = new Response();
        $dtresponse = [
            'code' => $code,
            'error' => $error,
            'data' => $message
        ];
        $jsonresp = $this->serializer_json->serialize($dtresponse, "json");

        $response->setContent($jsonresp);
        $response->headers->set('Content-Type', 'application/json');
        $response->prepare($request);

        return $response;
    }
    
    /**
     * @Route("/correlativoinsert4", methods={"POST"}, name="correlativoinsert4")
     */
    public function correlativoinsert4(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);

            $fksolicitante = $sx['fksolicitante'];
            $redactor = $sx['redactor'];
            $destinatario = $sx['destinatario'];
            $referencia = $sx['referencia'];
            $fkcorrelativo = $sx['fkcorrelativo'];
            $fktiponota = $sx['fktiponota'];
            $url = $sx['url'];
            $antecedente = $sx['antecedente'];
            $estadocorrelativo = $sx['estadocorrelativo'];
            $item = $sx['item'];
            $urleditable = $sx['urleditable'];
            $entrega = $sx['entrega'];
            $fkunidad = $sx['fkunidad'];
            $urlorigen = $sx['urlorigen'];
            $ipcontrol = $sx['ipcontrol'];
            $cx = $this->getDoctrine()->getManager();
            $Correlativo = new Correlativo();
            $numcorrelativo = $this->numerar();
            $Correlativo->setNumcorrelativo($numcorrelativo);
            $Correlativo->setFechareg(new \DateTime('now'));
            $Usuario = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('username' => $fksolicitante));
            $Correlativo->setFksolicitante($Usuario[0]);
            $Correlativo->setRedactor($redactor);
            $Correlativo->setDestinatario($destinatario);
            $Correlativo->setReferencia($referencia);
            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(array('id' => $fkcorrelativo));
            if ($fkcorrelativo != null) {
                $Correlativo->setFkcorrelativo($controlcorrelativo[0]);
            }
            $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->findBy(array('id' => $fktiponota));
            $Correlativo->setFktiponota($tiponota[0]);
            $Correlativo->setUrl($url);
            $Correlativo->setAntecedente($antecedente);
            $Correlativo->setEstadoCorrelativo($estadocorrelativo);

            if ($item != null && $item != "" && $item != 0) {
                $Correlativo->setItem($item);
            }
            
            $Correlativo->setUrleditable($urleditable);
            $Correlativo->setEntrega(new \DateTime($entrega));
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('nombre' => $fkunidad));
            $Correlativo->setFkunidad($unidad[0]);
            $Correlativo->setUrlorigen($urlorigen);
            $Correlativo->setIp($ipcontrol);
            $Correlativo->setEstado(1);
            $cx->persist($Correlativo);
            $cx->flush();
            $resultado = array('response' => "El numero de correlativo es: " . $Correlativo->getNumcorrelativo() . ".",
                'success' => true,
                'message' => 'Correlativo registrado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);

            // return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }


    /**
     * @Route("/correlative_update", methods={"POST"}, name="correlative_update")
     */
    public function correlative_update(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $cx = $this->getDoctrine()->getManager();

            $id = $sx['id'];
            $redactor = $sx['redactor'];
            $destinatario = $sx['destinatario'];
            $referencia = $sx['referencia'];
            $fkcorrelativo = $sx['fkcorrelativo'];
            $fktiponota = $sx['fktiponota'];
            $url = $sx['url'];
            $antecedente = $sx['antecedente'];
            $urleditable = $sx['urleditable'];
            $entrega = $sx['entrega'];
            $fkunidad = $sx['fkunidad'];
            $urlorigen = $sx['urlorigen'];

            $correlative = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            $fkcorrelativo != ''? $fkcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find(['id' => $fkcorrelativo]): $fkcorrelativo = null;
            $fktiponota != ''? $fktiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find(['id' => $fktiponota]): $fktiponota = null;
            $fkunidad != ''? $fkunidad = $this->getDoctrine()->getRepository(Unidad::class)->find(['id' => $fkunidad]): $fkunidad = null;
            
            $correlative->setRedactor($redactor);
            $correlative->setDestinatario($destinatario);
            $correlative->setReferencia($referencia);
            $correlative->setFkcorrelativo($fkcorrelativo);
            $correlative->setFktiponota($fktiponota);
            $correlative->setUrl($url);
            $correlative->setAntecedente($antecedente);
            $correlative->setUrleditable($urleditable);

            if (!in_array($entrega, [null, '', 'null'])) $correlative->setEntrega(new \DateTime($entrega));
            $correlative->setFkunidad($fkunidad);
            $correlative->setUrlorigen($urlorigen);
            $correlative->setEstado(1);

            $cx->merge($correlative);
            $cx->flush();

            $resultado = array('response' => "El número de correlativo modificado es: " . $correlative->getNumcorrelativo() . ".",
                'success' => true,
                'message' => 'Correlativo modificado correctamente.');
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($resultado, 'json');

            $resultado = $json;

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/listar_correlativo", methods={"POST"}, name="listar_correlativo")
     */
    public function listar_correlativo(Request $request)
    {
        try {
            date_default_timezone_set('America/La_Paz');
            $dia = date("d");
            $mes = date("m");
            $anio = date("Y");

            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            //  $user = $sx['gestion'];
            $cx = $this->getDoctrine()->getManager();
            $correlativo = $cx->getRepository(Correlativo::class)->findPermissionByUser($user, $anio);

            $correlativos = array();
            foreach ($correlativo as $crtv) {
                $dtcrtv = $crtv;

                $fecreg = $dtcrtv['fechareg'];
                $fecent = $dtcrtv['entrega'];

                if ($dtcrtv['item'] != null && $dtcrtv['item'] != "" && $dtcrtv['item'] != 0) {
                    $itemvl = $dtcrtv['item'];
                } else {
                    $itemvl = "";
                }

                $fksolicitante = $dtcrtv['fksolicitante'];
                $fkcorrelativo = $dtcrtv['fkcorrelativo'];
                $fktiponota = $dtcrtv['fktiponota'];
                $fkunidad = $dtcrtv['fkunidad'];
                $fksolicitante != ''? $fksolicitante = $this->getDoctrine()->getRepository(Usuario::class)->find($fksolicitante):$fksolicitante=null;
                $fkcorrelativo != ''? $fkcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->find($fkcorrelativo):$fkcorrelativo=null;
                $fktiponota != ''? $fktiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find($fktiponota):$fktiponota=null;
                $fkunidad != ''? $fkunidad = $this->getDoctrine()->getRepository(Unidad::class)->find($fkunidad):$fkunidad=null;

                $sendinf = [
                    "id" => $dtcrtv['id'],
                    "antecedente" => $dtcrtv['antecedente'],
                    "item" => $itemvl,
                    "numcorrelativo" => $dtcrtv['numcorrelativo'],
                    "fechareg" => $fecreg,
                    "redactor" => $dtcrtv['redactor'],
                    "destinatario" => $dtcrtv['destinatario'],
                    "referencia" => $dtcrtv['referencia'],
                    "fksolicitante" => $fksolicitante,
                    "fkcorrelativo" => $fkcorrelativo,
                    "fktiponota" => $fktiponota,
                    "estadocorrelativo" => $dtcrtv['estadocorrelativo'],
                    "ip" => $dtcrtv['ip'],
                    "url" => $dtcrtv['url'],
                    "urleditable" => $dtcrtv['urleditable'],
                    "entrega" => $fecent,
                    "fkunidad" => $fkunidad,
                    "urlorigen" => $dtcrtv['urlorigen']
                ];
                $correlativos[] = $sendinf;
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            if (sizeof($correlativo) > 0) {
                $data2 = $serializer->serialize($correlativos, 'json');
            } else {
                $empty = array('mensaje' => 'No se encotraron datos.');
                $data2 = $serializer->serialize($empty, 'json');
            }
            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/correlativoform", methods={"POST"}, name="correlativoform")
     */
    public function correlativoform(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            $cx = $this->getDoctrine()->getManager();

            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $datacontrol = $serializer->normalize($controlcorrelativo, null, array('attributes' => array('id', 'nombre')));

            $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->findBy(['estado' => '1'], ['nombre' => 'ASC']);
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $datatipo = $serializer->normalize($tiponota, null, array('attributes' => array('id', 'nombre')));

            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadPermissionByUser($user);
            $dataunidad = array_column($unidad, 'cb_unidad_nombre');

            $elementos = array('Control' => $datacontrol, 'Nota' => $datatipo, 'Unidad' => $dataunidad);
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $respuesta = $serializer->serialize($elementos, 'json');
            return new jsonResponse(json_decode($respuesta));

        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/datasig", methods={"GET"}, name="datasig")
     */
    public function datasig(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_sig_id AS id, cb_sig_titulo AS titulo, cb_sig_ruta AS ruta, cb_sig_fksuperior AS fksuperior
                    FROM cb_cfg_sig
                    WHERE cb_sig_id IN
                        (SELECT DISTINCT (a.cb_sig_fksuperior)
                        FROM cb_cfg_sig a
                        WHERE a.cb_sig_fksuperior IS NOT NULL)
                    ORDER BY 2";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $parent = $stmt->fetchAll();

            $sql2 = "SELECT cb_sig_id AS id, cb_sig_titulo AS titulo, cb_sig_ruta AS ruta, cb_sig_fksuperior AS fksuperior, NULL AS children
                    FROM cb_cfg_sig
                    WHERE cb_sig_fksuperior IS NULL AND cb_sig_id NOT IN
                        (SELECT DISTINCT (a.cb_sig_fksuperior)
                        FROM cb_cfg_sig a
                        WHERE a.cb_sig_fksuperior IS NOT NULL)
                    ORDER BY 2";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute();
            $first = $stmt2->fetchAll();

            $sig = array();
            foreach ($parent as $item) {
                $id = $item['id'];
                $sql3 = "SELECT cb_sig_id AS id, cb_sig_titulo AS titulo, cb_sig_ruta AS ruta, cb_sig_fksuperior AS fksuperior
                        FROM cb_cfg_sig
                        WHERE cb_sig_fksuperior=:id
                        ORDER BY 2";

                $stmt3 = $cx->prepare($sql3);
                $stmt3->execute(['id' => ($id)]);
                $children = $stmt3->fetchAll();
                $item['children'] = $children;
                $sig[] = $item;
            }
            foreach ($first as $item) {
                $sig[] = $item;
            }
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($sig, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/data_delautoridad", methods={"GET"}, name="data_delautoridad")
     */
    public function data_delautoridad(Request $request)
    {
        try {
            $delautoridad = $this->getDoctrine()->getRepository(DelegacionAutoridad::class)->findBY(['estado' => '1']);
                    
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data = $serializer->serialize($delautoridad, 'json');

            return new jsonResponse(json_decode($data));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }
}