<?php

namespace App\Controller;

use App\Entity\Accidentes;
use App\Entity\Catalogo;
use App\Entity\CategoriaNoticia;
use App\Entity\ControlCorrelativo;
use App\Entity\Correlativo;
use App\Entity\Correo;
use App\Entity\DatoEmpresarial;
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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
     * @Route("/enviarcorreo", name="enviarcorreo")
     * @Method({"POST"})
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
            ->setFrom('charly_90_6@hotmail.com') //intranet@elfec.com
            ->setTo('avargas@cloudbit.com.bo') //cflores@elfec.com
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
     * @Route("/enviarcorreo_buzon", name="enviarcorreo_buzon")
     * @Method({"POST"})
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
            ->setFrom('charly_90_6@hotmail.com') //intranet@elfec.com
            ->setTo('avargas@cloudbit.com.bo') //cflores@elfec.com
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
     * @Route("/organigrama2", name="organigrama2")
     * @Method({"GET"})
     */
    public function organigrama()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT
            CARGO.cb_cargo_id AS KEY,
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
            FROM
            cb_personal_cargo CARGO
            LEFT JOIN ( SELECT cb_personal_id, cb_personal_fkcargo, cb_personal_nombre, cb_personal_apellido FROM cb_personal_personal WHERE cb_personal_estado = 1 ) PER ON CARGO.cb_cargo_id = PER.cb_personal_fkcargo
            LEFT JOIN cb_personal_tipo_cargo TC ON TC.cb_tipo_cargo_id = CARGO.cb_cargo_fktipo
            WHERE
            CARGO.cb_cargo_estado = 1;
            ";

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

    /**
     * @Route("/directoriovista", methods={"GET"}, name="directoriovista")
     */
    public function directorio(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $DatoEmpresarial1 = $cx->getRepository(Personal::class)->findBy(array('estado' => '1'));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $data = $serializer->normalize($DatoEmpresarial1, null, array('attributes' => array('nombre', 'apellido', 'correo', 'telefono', 'fksector', 'fkarea')));

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($data, 'json');

            return new jsonResponse(json_decode($data2));
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT
    concat(cb_personal_nombre,' ',cb_personal_apellido) as nombre,
    cb_personal_fnac as fecha,
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
     * @Route("/sigprocfcgerencia", name="procesogerencia")
     * @Method({"GET"})
     */
    public function procesogerencia()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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

            $cx = $this->getDoctrine()->getEntityManager();

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
     * @Route("/sigprocfcprocesos", name="procesoprocesos")
     * @Method({"GET"})
     */
    public function sigprocesoprocesos()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

            $sql = "SELECT cb_documento_codigo AS codigo_documento, cb_ficha_procesos_codproceso AS cod_proceso, cb_tipo_documento_nombre AS tipo_documento, cb_documento_titulo AS titulo_doc,
                        cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobado_por,
                        cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculoarchivodig AS vinculo_archivo, cb_documento_vinculodiagflujo AS vinculo_diagrama
                    FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_usuario_usuario
                    WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id
                        AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1 AND cb_documento_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $documento = $stmt->fetchAll();

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

            $elementos = array('documento' => $documento, 'fichaproceso' => $fproceso, 'gerenciareasector' => $gcarstr, 'fichacargo' => $fcargo);

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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_documento_formulario_codigo AS cod_formulario, cb_documento_formulario_titulo AS titulo_formulario,
                        cb_documento_formulario_vinculofiledig AS vinculo_archivo, cb_documento_formulario_vinculofiledesc AS descarga_formulario, cb_documento_formulario_versionvigente AS version,
                        cb_documento_formulario_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS aprobado_por, cb_tipo_documento_nombre AS tipo_doc_relacionado,
                        cb_documento_codigo AS doc_relacionado
                    FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_gest_doc_formulario, cb_gestion_tipo_documento, cb_usuario_usuario
                    WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND
                        cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_estado=1 AND cb_documento_formulario_fkaprobador=cb_usuario_id
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_documento_formulario_id AS ID_FORMULARIO, cb_documento_codigo AS COD_DOCUMENTO, cb_documento_formulario_codigo AS COD_FORMULARIO,
            cb_documento_formulario_titulo AS TITULO_FORMULARIO, cb_documento_formulario_versionVigente AS VERSION_VIGENTE_FORMULARIO,
            cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION_FORMULARIO, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR,
            cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_formulario_vinculoFileDesc AS VINCULO_ARCHIVO_DESCARGA
        FROM cb_gest_doc_formulario, cb_gestion_documento, cb_gestion_tipo_documento, cb_usuario_usuario
        WHERE cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_codigo=:id AND
        cb_documento_codigo=:documento AND cb_documento_formulario_estado=1 AND cb_documento_formulario_fkaprobador=cb_usuario_id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id), 'documento' => ($documento)]);
            $FORMULARIO = $stmt->fetchAll();
            $sql2 = "SELECT cb_documento_codigo AS COD_DOCUMENTO, cb_ficha_procesos_nombre AS COD_PROCESO, cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
                cb_documento_titulo AS TITULO_DOC, cb_documento_versionvigente AS VERSION_VIGENTE, cb_documento_fechaPublicacion AS FECHA_PUBLICACION,
                (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR, cb_documento_carpetaoperativa AS CARPETA_OPERATIVA,
                cb_documento_vinculoarchivodig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_DE_FLUJO
            FROM cb_gestion_documento,cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
            WHERE cb_documento_fkaprobador=cb_usuario_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_documento_fktipo=cb_tipo_documento_id AND
                cb_documento_estado=1 AND cb_documento_codigo=:documento";
            $stmt = $cx->prepare($sql2);
            $stmt->execute(['documento' => ($documento)]);
            $DOCUMENTOS = $stmt->fetchAll();
            $elementos = array('FORMULARIO' => $FORMULARIO, 'DOCUMENTOS' => $DOCUMENTOS);
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

            $sql = "SELECT cb_docprocrevision_fkdoc AS id_revision, cb_docprocrevision_fecha AS fecha_recibido, cb_docprocrevision_responsable AS responsable_revision,
                        cb_docprocrevision_estadodoc AS estado, cb_docprocrevision_firma AS firma_electronica
                    FROM cb_gest_doc_proceso, cb_gest_docprocrevision
                    WHERE cb_docprocrevision_fkdoc=cb_documento_proceso_id AND cb_docprocrevision_estado=1 AND cb_documento_proceso_id=:id";
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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

    /***************************************************************************************************************************************************************************************************************************************************************/

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
     * @Route("/listar_audhlg", name="listar_audhlg")
     * @Method({"GET"})
     */
    public function listar_audhlg()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_auditoria_codigo AS id, date_part('year', cb_auditoria_fechaprogramada) AS anio,
                        cb_auditoria_fechaprogramada AS f_programada, cb_auditoria_fechahorainicio AS f_inicio, cb_auditoria_fechahorafin AS f_fin,
                        cb_auditoria_alcance AS alcance, cb_auditoria_conclusiones AS conclusiones, cb_tipo_auditoria_nombre AS tipo_auditoria, cb_auditoria_id AS idaud
                    FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area
                    WHERE cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND
                        cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_auditoria_estado=1 ORDER BY 1, 2, 3";

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

    /* AUDITORIA DETALLE *****************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA*/

    /**
     * @Route("/detalleaud", methods={"POST"}, name="detalleaud")
     */
    public function detalleaud(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

            $sql = "SELECT cb_auditoria_codigo AS id_auditoria, cb_gas_codigo AS id_area, cb_tipo_auditoria_nombre AS tipo_auditoria, cb_auditoria_fechaprogramada AS f_programada,
                        cb_auditoria_duracionestimada AS duracion_estimada_horas, cb_auditoria_lugar AS lugar_de_auditoria, cb_auditoria_alcance AS alcance,
                        cb_auditoria_objetivos AS objetivos, cb_auditoria_fechahorainicio AS fecha_hora_inicio, cb_auditoria_fechahorafin AS fecha_hora_fin,
                        cb_auditoria_responsable AS responsable_registro, cb_auditoria_fecharegistro AS fecha_registro, cb_auditoria_conclusiones AS conclusiones
                    FROM cb_aud_auditoria, cb_proc_gas, cb_aud_tipo_auditoria
                    WHERE cb_auditoria_fkarea=cb_gas_id AND cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_auditoria_estado=1 AND cb_auditoria_codigo=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $auditoria = $stmt->fetchAll();

            $sql2 = "SELECT cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector,
                        (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_gas_vigente AS vigente
                    FROM cb_aud_auditoria, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_usuario_usuario
                    WHERE cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND
                        cb_gas_fkresponsable=cb_usuario_id AND cb_gas_estado=1 AND cb_auditoria_codigo=:id";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $gerenciareasector = $stmt->fetchAll();

            $sql3 = "SELECT cb_auditoria_codigo AS id_auditoria, cb_auditor_item AS item_auditor, cb_tipo_auditor_nombre AS tipo_auditor,
                        cb_auditor_item AS item, cb_auditor_apellidosnombres AS apellidos_nombres, cb_auditor_vigente AS vigente
                    FROM cb_aud_auditoria_equipo, cb_aud_auditoria, cb_aud_tipo_auditor, cb_aud_auditor
                    WHERE cb_auditoria_equipo_fkauditoria=cb_auditoria_id AND cb_auditoria_equipo_fktipo=cb_tipo_auditor_id AND
                        cb_auditoria_equipo_fkauditor=cb_auditor_id AND cb_auditoria_equipo_estado=1 AND cb_auditoria_codigo=:id";

            $stmt = $cx->prepare($sql3);
            $stmt->execute(['id' => ($id)]);
            $equipo = $stmt->fetchAll();

            $sql4 = "SELECT cb_hallazgo_id AS id_hallazgo, cb_tipo_hallazgo_nombre AS tipo_hallazgo, cb_hallazgo_ordinal AS ordinal,
                        cb_hallazgo_titulo AS titulo, cb_hallazgo_descripcion AS descripcion
                    FROM cb_aud_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo
                    WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_hallazgo_estado=1 AND cb_auditoria_codigo=:id";

            $stmt = $cx->prepare($sql4);
            $stmt->execute(['id' => ($id)]);
            $hallazgo = $stmt->fetchAll();

            $elementos = array('auditoria' => $auditoria, 'gerenciareasector' => $gerenciareasector, 'equipo' => $equipo, 'hallazgo' => $hallazgo);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

            $sql = "SELECT cb_hallazgo_id AS id_hallazgo, cb_auditoria_codigo AS id_auditoria, cb_tipo_hallazgo_nombre AS tipo_hallazgo,
                        cb_hallazgo_ordinal AS ordinal_hallazgo, cb_hallazgo_titulo AS titulo_hallazgo, cb_hallazgo_descripcion AS descripcion_hallazgo,
                        cb_hallazgo_evidencia AS evidencia_del_hallazgo, cb_hallazgo_documento AS documento_del_hallazgo, cb_hallazgo_puntoiso AS punto_iso_del_hallazgo,
                        cb_impacto_nombre AS impacto, cb_probabilidad_ocurrencia_nombre AS probabilidad, cb_hallazgo_analisiscausaraiz AS analisis_causa_raiz,
                        cb_hallazgo_recomendaciones AS recomendaciones, cb_hallazgo_cargoauditado AS cargo_del_auditado, cb_hallazgo_nombreauditado AS nombre_del_auditado,
                        cb_hallazgo_responsable AS responsable_registro, cb_hallazgo_fecharegistro AS fecha_registro
                    FROM cb_aud_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo, cb_procesos_impacto, cb_prob_ocurrencia
                    WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_hallazgo_fkimpacto=cb_impacto_id AND
                        cb_hallazgo_fkprobabilidad=cb_probabilidad_ocurrencia_id AND cb_hallazgo_estado=1 AND cb_hallazgo_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $hallazgo = $stmt->fetchAll();

            $sql2 = "SELECT cb_accion_estadoaccion AS estado, cb_accion_id AS id_accion, cb_accion_ordinal AS ordinal_accion, cb_accion_descripcion AS accion,
                        cb_accion_fechaimplementacion AS f_implementacion, cb_accion_responsableimplementacion AS responsable
                    FROM cb_aud_hallazgo, cb_aud_accion
                    WHERE cb_accion_fkhallazgo=cb_hallazgo_id AND cb_accion_estado=1 AND cb_hallazgo_id=:id";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $accion = $stmt->fetchAll();

            $elementos = array('hallazgo' => $hallazgo, 'accion' => $accion);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* HALLAZGOS LISTA ********************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_hallazgo", name="listar_hallazgo")
     * @Method({"GET"})
     */
    public function listar_hallazgo()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_auditoria_codigo AS id_auditoria, date_part('year', cb_auditoria_fechaprogramada) AS anio,
                        cb_auditoria_fechaprogramada AS f_programada, cb_hallazgo_id AS id_hallazgo, cb_hallazgo_ordinal AS ordinal,
                        cb_tipo_hallazgo_nombre AS tipo_hallazgo, cb_hallazgo_titulo AS titulo, cb_hallazgo_descripcion AS descripcion
                    FROM cb_aud_hallazgo, cb_aud_auditoria, cb_aud_tipo_hallazgo, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area
                    WHERE cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND
                        cb_hallazgo_fkauditoria=cb_auditoria_id AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_hallazgo_estado=1 ORDER BY 1, 2, 3, 7";

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

    /* ACCIONES LISTA *********************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_accion", name="listar_accion")
     * @Method({"GET"})
     */
    public function listar_accion()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_hallazgo_id AS id_hallazgo, cb_hallazgo_ordinal AS ordinal_hallazgo,
                        cb_hallazgo_titulo AS titulo, cb_hallazgo_descripcion AS descripcion, cb_accion_id AS id_accion,
                        cb_accion_ordinal AS ordinal_accion, cb_accion_descripcion AS accion, cb_accion_fechaimplementacion AS f_implementacion,
                        cb_accion_responsableregistro AS responsable, cb_accion_estadoaccion AS estado
                    FROM cb_aud_hallazgo, cb_aud_auditoria, cb_aud_accion, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area
                    WHERE cb_accion_fkhallazgo=cb_hallazgo_id AND cb_hallazgo_fkauditoria=cb_auditoria_id AND cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND
                        cb_gas_fkarea=cb_area_id AND cb_accion_estado=1 ORDER BY 1, 2, 3, 4, 7, 8";

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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

            $sql = "SELECT cb_hallazgo_id AS id_hallazgo, cb_auditoria_codigo AS id_auditoria, cb_tipo_hallazgo_nombre AS tipo_hallazgo,
                        cb_hallazgo_ordinal AS ordinal_hallazgo, cb_hallazgo_titulo AS titulo_hallazgo, cb_hallazgo_descripcion AS descripcion_hallazgo,
                        cb_hallazgo_evidencia AS evidencia_del_hallazgo, cb_hallazgo_documento AS documento_del_hallazgo, cb_hallazgo_puntoiso AS punto_iso_del_hallazgo,
                        cb_impacto_nombre AS impacto, cb_probabilidad_ocurrencia_nombre AS probabilidad, cb_hallazgo_analisiscausaraiz AS analisis_causa_raiz,
                        cb_hallazgo_recomendaciones AS recomendaciones, cb_hallazgo_cargoauditado AS cargo_del_auditado, cb_hallazgo_nombreauditado AS nombre_del_auditado,
                        cb_hallazgo_responsable AS responsable_registro, cb_hallazgo_fecharegistro AS fecha_registro
                    FROM cb_aud_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo, cb_procesos_impacto, cb_prob_ocurrencia, cb_aud_accion
                    WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_hallazgo_fkimpacto=cb_impacto_id AND
                        cb_accion_fkhallazgo=cb_hallazgo_id AND cb_hallazgo_fkprobabilidad=cb_probabilidad_ocurrencia_id AND cb_hallazgo_estado=1 AND cb_accion_id=:id";
            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => ($id)]);
            $hallazgo = $stmt->fetchAll();

            $sql2 = "SELECT cb_accion_estadoaccion AS estado, cb_accion_id AS id_accion, cb_accion_ordinal AS ordinal_accion, cb_accion_descripcion AS accion,
                        cb_accion_fechaimplementacion AS f_implementacion, cb_accion_responsableimplementacion AS responsable
                    FROM cb_aud_hallazgo, cb_aud_accion
                    WHERE cb_accion_fkhallazgo=cb_hallazgo_id AND cb_accion_estado=1 AND cb_accion_id=:id";

            $stmt = $cx->prepare($sql2);
            $stmt->execute(['id' => ($id)]);
            $accion = $stmt->fetchAll();

            $elementos = array('hallazgo' => $hallazgo, 'accion' => $accion);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');

            return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /* CROCM LISTA ************************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/crocm_list", name="crocm_list")
     * @Method({"POST"})
     */
    public function crocm_list()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
     * @Route("/crocm_consulta", name="crocm_consulta")
     * @Method({"POST"})
     */
    public function crocm_consulta()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
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
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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

    /* VERIFICACION EFICACIA LISTA ********/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_verificaref", name="listar_verificaref")
     * @Method({"GET"})
     */
    public function listar_verificaref()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_hallazgo_id AS id_hallazgo, cb_hallazgo_ordinal AS ordinal_hallazgo,
                        cb_hallazgo_titulo AS titulo_hallazgo, cb_hallazgo_descripcion AS descripcion, cb_accion_id as id_accion, cb_accion_ordinal AS ordinal_accion,
                        cb_accion_descripcion AS accion, cb_accion_eficacia_eficaz AS eficaz_si_no, cb_accion_eficacia_resultado AS resultado,
                        cb_accion_eficacia_fecha AS f_verificacion, cb_accion_eficacia_responsable AS responsable, cb_accion_eficacia_nombreverificador AS nombre_verificado,
                        cb_accion_eficacia_cargoverificador AS cargo_verificado
                    FROM cb_aud_hallazgo, cb_aud_accion, cb_aud_accion_eficacia, cb_aud_auditoria, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area
                    WHERE cb_accion_eficacia_fkaccion=cb_accion_id AND cb_accion_fkhallazgo=cb_hallazgo_id AND cb_hallazgo_fkauditoria=cb_auditoria_id AND
                        cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_accion_eficacia_estado=1";

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

    /* FORTALEZAS LISTA *******************/
    /* DESARROLLADOR: ARIEL VARGAS TICONA */

    /**
     * @Route("/listar_fortaleza", name="listar_fortaleza")
     * @Method({"GET"})
     */
    public function listar_fortaleza()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();
            $sql = "SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_auditoria_codigo AS id_auditoria, date_part('year', cb_auditoria_fechaprogramada) AS anio,
                        cb_auditoria_fechaprogramada AS f_programada, cb_fortaleza_id AS id_fortaleza, cb_fortaleza_ordinal AS ordinal_f, cb_fortaleza_descripcion AS descripcion
                    FROM cb_aud_fortaleza, cb_aud_auditoria, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area
                    WHERE cb_fortaleza_fkauditoria=cb_auditoria_id AND cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND
                        cb_fortaleza_estado=1";

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
                $elementos = array('Nombre' => $usuariob[0]->getNombre(), 'Apellido' => $usuariob[0]->getApellido(), 'Cargo' => 'Gerente', 'login' => $user);

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

        $username = 'Administrador'; //'ctcloudbit';
        $password = 'P@ssw0rd1234'; //'Elfec2019';
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
                'host' => '192.168.0.6',
                //'host' => '172.17.1.139',
                'encryption' => 'none',
                'port' => '389',
            ));
            $attributes = ['givenName' /*Nombres*/, 'department' /*gerencia*/, 'sn' /*appellidos*/, 'title' /*cargo*/, 'dn' /*dn*/, 'mail' /*email*/, 'name' /*primernombre*/, 'physicalDeliveryOfficeName' /* cargo */, 'sAMAccountName' /*login*/, 'userPrincipalName' /*loginparaloguear@elfec.com*/];
            
            $process = 'validate';
            $ldap->bind($dn, $password);
            $process = 'consult';
            $query = $ldap->query('DC=elfec,DC=com', 'sAMAccountName=' . $user, ['filter' => $attributes]);

            $results = $query->execute();

            $dt_aux = $this->getDoctrine()->getRepository(Usuario::class)->findOneBy(array('estado' => '1', 'username' => $user));
            if(!empty($dt_aux)) $process = 'username';

            foreach ($results as $entry) {
                $entry; // Do something with the results
                $encoders = [new XmlEncoder(), new JsonEncoder()];
                $normalizers = [new ObjectNormalizer()];

                $serializer = new Serializer($normalizers, $encoders);
                $data = $serializer->normalize($entry, null);

                if ($ayudanombre = array_key_exists("sAMAccountName", $data['attributes'])) {
                    if ($user == $data['attributes']['sAMAccountName'][0]) {
                        $dn = $data['dn'];
                        $ldap->bind($dn, $pass);
                        $process = 'success';

                        if ($ayudanombre = array_key_exists("givenName", $data['attributes'])) {
                            $Nombre = $data['attributes']['givenName'][0];
                        } else {
                            $Nombre = 'Sin\Nombre';
                        }
                        if ($ayudaApe = array_key_exists("sn", $data['attributes'])) {
                            $Apellido = $data['attributes']['sn'][0];

                        } else {
                            $Apellido = 'Sin\Apellido';
                        }

                        if ($ayudaCargo = array_key_exists("title", $data['attributes'])) {
                            $Cargo = $data['attributes']['title'][0];
                        } else {
                            $Cargo = 'Sin\Cargo';
                        }
                        if ($ayudalogin = array_key_exists("sAMAccountName", $data['attributes'])) {
                            $login = $data['attributes']['sAMAccountName'][0];
                        } else {
                            $login = 'Sin\login';
                        }
                        if (isset($data['attributes']['physicalDeliveryOfficeName'][0])) {
                            $unidad = $data['attributes']['physicalDeliveryOfficeName'][0];
                            $unidadEntidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('nombre' => $unidad, 'estado' => '1'));
                            $usuarioEntidad = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('username' => $user, 'estado' => '1'));
                            $cx = $this->getDoctrine()->getManager();
                            if (empty($usuarioEntidad)) {
                                $usuarionuevo = new Usuario();
                                if (isset($data['attributes']['givenName'][0])) {
                                    $usuarionuevo->setNombre($data['attributes']['givenName'][0]);
                                } else {
                                    $usuarionuevo->setNombre('S/N');
                                }
                                if (isset($data['attributes']['sn'][0])) {
                                    $usuarionuevo->setApellido($data['attributes']['sn'][0]);
                                } else {
                                    $usuarionuevo->setApellido('S/A');
                                }
                                if (isset($data['attributes']['mail'][0])) {
                                    $usuarionuevo->setCorreo($data['attributes']['mail'][0]);
                                } else {
                                    $usuarionuevo->setCorreo('S/Correo');
                                }
                                if (isset($data['attributes']['title'][0])) {
                                    $usuarionuevo->setCargo($data['attributes']['title'][0]);
                                } else {
                                    $usuarionuevo->setCargo('S/Cargo');
                                }
                                if (isset($data['attributes']['sAMAccountName'][0])) {
                                    $usuarionuevo->setUsername($data['attributes']['sAMAccountName'][0]);
                                } else {
                                    $usuarionuevo->setUsername('S/Login');
                                }
                                if ($ayudanombre = array_key_exists("cn", $data['attributes'])) {
                                    if ($data['attributes']['cn'][0] == 'Administrador') {
                                        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre' => 'Administrador'));
                                    } else {
                                        $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre' => 'Usuario'));
                                    }
                                } else {
                                    $rol = $this->getDoctrine()->getRepository(Rol::class)->findBy(array('estado' => '1', 'nombre' => 'Usuario'));
                                }
                                $usuarionuevo->setEstado(1);

                                $usuarionuevo->setFkrol($rol[0]);
                                $cx->persist($usuarionuevo);
                                $cx->flush();
                            }

                            $usuarioEntidad = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('username' => $user, 'estado' => '1'));

                            $usuario = $usuarioEntidad[0]->getId();
                            $tipo = 'Completo';

                            $permiso = $this->getDoctrine()->getRepository(Permiso::class)->findBy(array('fkusuario' => $usuario, 'estado' => '1'));
                            if (empty($permiso)) {
                                $cx = $this->getDoctrine()->getManager();
                                $newpermiso = new Permiso();
                                $newpermiso->setFkusuario($usuarioEntidad[0]);
                                $newpermiso->setFkunidad($unidadEntidad[0]);
                                $newpermiso->setTipo($tipo);
                                $newpermiso->setEstado(1);
                                $cx->persist($newpermiso);
                                $cx->flush();
                            }

                        }

                        $elementos = array('Nombre' => $Nombre, 'Apellido' => $Apellido, 'Cargo' => $Cargo, 'login' => $login, 'process' => $process);

                        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                        $data2 = $serializer->serialize($elementos, 'json');
                        return new Response($data2);
                    }
                }
            }
            if($process == 'success'){
                $elementos = array('Nombre' => $Nombre, 'Apellido' => $Apellido, 'Cargo' => $Cargo, 'login' => $login, 'process' => $process);

                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $data2 = $serializer->serialize($elementos, 'json');
                return new Response($data2);
            }else{
                $info = 'Datos de usuario incorrectos';
                $process = 'empty';

                //return new JsonResponse($info);

                $elementos = array('message' => $info, 'process' => $process);

                $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                $data2 = $serializer->serialize($elementos, 'json');
                return new Response($data2);
            }
        } catch (ConnectionException $ce) {
            if ($process == 'username') $ldap_msg = "Contraseña incorrecta";
            else {
                if ($process == 'validate') $ldap_msg = "Error al consultar los datos del AD";
                else{
                    $process = 'exception';
                    $ldap_msg = $ce->getMessage();
                }
            }

            //return new JsonResponse($translator->trans($ldap_msg));
            $elementos = array('message' => $translator->trans($ldap_msg), 'process' => $process);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($elementos, 'json');
            return new Response($data2);
        } finally {
            switch ($process) {
                case "connect":
                    $ldap_msg = "The LDAP PHP extension is not enabled.";

                    //return new JsonResponse($translator->trans($ldap_msg));
                    $elementos = array('message' => $translator->trans($ldap_msg), 'process' => $process);

                    $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                    $data2 = $serializer->serialize($elementos, 'json');
                    return new Response($data2);
                    break;
                case "validate":
                    $ldap_msg = "Error al consultar los datos del AD";

                    //return new JsonResponse($translator->trans($ldap_msg));
                    $elementos = array('message' => $translator->trans($ldap_msg), 'process' => $process);

                    $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                    $data2 = $serializer->serialize($elementos, 'json');
                    return new Response($data2);
                    break;
                case "username":
                    $ldap_msg = "Password incorrecto";

                    //return new JsonResponse($ldap_msg);
                    $elementos = array('message' => $translator->trans($ldap_msg), 'process' => $process);

                    $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
                    $data2 = $serializer->serialize($elementos, 'json');
                    return new Response($data2);
                    break;
            }
        }
    }

    /**
     * @Route("/combo_proceso", name="combo_proceso")
     * @Method({"GET"})
     */
    public function combo_proceso()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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
     * @Route("/combo_tipocrocm", name="combo_tipocrocm")
     * @Method({"GET"})
     */
    public function combo_tipocrocm()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $tipo = $cx->getRepository(TipoCRO::class)->findBy(array('estado' => '1'));
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
     * @Route("/combo_probabilidad", name="combo_probabilidad")
     * @Method({"GET"})
     */
    public function combo_probabilidad()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $probabilidad = $cx->getRepository(Probabilidad::class)->findBy(array('estado' => '1'));
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
     * @Route("/combo_impacto", name="combo_impacto")
     * @Method({"GET"})
     */
    public function combo_impacto()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $impacto = $cx->getRepository(Impacto::class)->findBy(array('estado' => '1'));
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
     * @Route("/combo_responsable", name="combo_responsable")
     * @Method({"GET"})
     */
    public function combo_responsable()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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
            $cx = $this->getDoctrine()->getEntityManager();

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
     * @Route("/combo_organigrama", name="combo_organigrama")
     * @Method({"GET"})
     */
    public function combo_organigrama()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $organigrama = $cx->getRepository(OrganigramaGerencia::class)->findBy(array('estado' => '1'));
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
     * @Route("/listar_cobertura", name="listar_cobertura")
     * @Method({"POST"})
     */
    public function listar_cobertura()
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

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
     * @Route("/correlativo_gestiones", methods={"POST"}, name="correlativo_gestiones")
     */
    public function correlativo_gestiones(Request $request)
    {
        try {
            $cx = $this->getDoctrine()->getEntityManager()->getConnection();

            $sx = json_decode($request->getContent(), true);
            $username = $sx['username'];

            $sql = "SELECT distinct date_part('Year', cb_correlativo_fechareg) AS gestion
            FROM cb_correlativo_correlativo , cb_usuario_usuario
            WHERE cb_correlativo_fksolicitante=cb_usuario_id
            AND cb_usuario_username=:username
            and cb_correlativo_estado=1";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['username' => ($username)]);
            $cobertura = $stmt->fetchAll();

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $data2 = $serializer->serialize($cobertura, 'json');

            return new jsonResponse(json_decode($data2));

        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/listar_correlativogestion", methods={"POST"}, name="listar_correlativogestion")
     */
    public function listar_correlativogestion(Request $request)
    {
        try {

            date_default_timezone_set('America/La_Paz');
            $dia = date("d");
            $mes = date("m");
            $anho = date("y");

            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            $gestion = $sx['gestion'];
            $cx = $this->getDoctrine()->getManager();

            $correlativo = $cx->getRepository(Correlativo::class)->findPermissionByUser2($user, $gestion);
            $correlativos = array();
            foreach ($correlativo as $crtv) {
                //$dtcrtv = (object) $crtv;
                // $fecreg = $dtcrtv->getFechareg();
                // $fecent = $dtcrtv->getEntrega();
                // if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                //if($fecent != null) $rsfce = $fecent->format('Y-m-d'); else $rsfce = $fecent;
                if ($crtv['cb_correlativo_fksolicitante'] != null) {
                    $fksolicitante = $this->getDoctrine()->getRepository(Usuario::class)->find($crtv['cb_correlativo_fksolicitante']);
                } else {
                    $fksolicitante = null;
                }
                $fksolicitante = $this->getDoctrine()->getRepository(Usuario::class)->find($crtv['cb_correlativo_fksolicitante']);

                if ($crtv['cb_correlativo_fkcorrelativo'] != null) {
                    $fkscorrelativo = $this->getDoctrine()->getRepository(EstadoCorrelativo::class)->find($crtv['cb_correlativo_fkcorrelativo']);
                } else {
                    $fkscorrelativo = null;
                }
                if ($crtv['cb_correlativo_fkunidad'] != null) {
                    $fkunidad = $this->getDoctrine()->getRepository(Unidad::class)->find($crtv['cb_correlativo_fkunidad']);
                } else {
                    $fkunidad = null;
                }

                if ($crtv['cb_correlativo_fktiponota'] != null) {
                    $fktiponota = $this->getDoctrine()->getRepository(TipoNota::class)->find($crtv['cb_correlativo_fktiponota']);
                } else {
                    $fktiponota = null;
                }

                $sendinf = [
                    "id" => $crtv['cb_correlativo_id'],
                    "antecedente" => $crtv['cb_correlativo_antecedente'],
                    "item" => $crtv['cb_correlativo_item'],
                    "numcorrelativo" => $crtv['cb_correlativo_numcorrelativo'],
                    "fechareg" => $crtv['cb_correlativo_fechareg'],
                    "redactor" => $crtv['cb_correlativo_redactor'],
                    "destinatario" => $crtv['cb_correlativo_destinatario'],
                    "referencia" => $crtv['cb_correlativo_referencia'],
                    "fksolicitante" => $fksolicitante,
                    "fkcorrelativo" => $fkscorrelativo,
                    "fktiponota" => $fktiponota,
                    "estadocorrelativo" => $crtv['cb_correlativo_estadocorrelativo'],
                    "ip" => $crtv['cb_correlativo_ip'],
                    "url" => $crtv['cb_correlativo_url'],
                    "urleditable" => $crtv['cb_correlativo_urleditable'],
                    "entrega" => $crtv['cb_correlativo_entrega'],
                    "fkunidad" => $fkunidad,
                    "urlorigen" => $crtv['cb_correlativo_urlorigen'],
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
     * @Route("/listar_correlativo", methods={"POST"}, name="listar_correlativo")
     */
    public function listar_correlativo(Request $request)
    {
        try {

            date_default_timezone_set('America/La_Paz');
            $dia = date("d");
            $mes = date("m");
            $anho = date("y");

            $sx = json_decode($request->getContent(), true);
            $user = $sx['username'];
            //  $user = $sx['gestion'];
            $cx = $this->getDoctrine()->getManager();
            $correlativo = $cx->getRepository(Correlativo::class)->findPermissionByUser($user);

            $correlativos = array();
            foreach ($correlativo as $crtv) {
                $dtcrtv = (object) $crtv;

                $fecreg = $dtcrtv->getFechareg();
                $fecent = $dtcrtv->getEntrega();
                if ($fecreg != null) {
                    $rsfcr = $fecreg->format('Y-m-d');
                } else {
                    $rsfcr = $fecreg;
                }

                if ($fecent != null) {
                    $rsfce = $fecent->format('Y-m-d');
                } else {
                    $rsfce = $fecent;
                }

                $sendinf = [
                    "id" => $dtcrtv->getId(),
                    "antecedente" => $dtcrtv->getAntecedente(),
                    "item" => $dtcrtv->getItem(),
                    "numcorrelativo" => $dtcrtv->getNumcorrelativo(),
                    "fechareg" => $rsfcr,
                    "redactor" => $dtcrtv->getRedactor(),
                    "destinatario" => $dtcrtv->getDestinatario(),
                    "referencia" => $dtcrtv->getReferencia(),
                    "fksolicitante" => $dtcrtv->getFksolicitante(),
                    "fkcorrelativo" => $dtcrtv->getFkcorrelativo(),
                    "fktiponota" => $dtcrtv->getFktiponota(),
                    "estadocorrelativo" => $dtcrtv->getEstadoCorrelativo(),
                    "ip" => $dtcrtv->getIp(),
                    "url" => $dtcrtv->getUrl(),
                    "urleditable" => $dtcrtv->getUrleditable(),
                    "entrega" => $rsfce,
                    "fkunidad" => $dtcrtv->getFkunidad(),
                    "urlorigen" => $dtcrtv->getUrlorigen(),
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

            $controlcorrelativo = $this->getDoctrine()->getRepository(ControlCorrelativo::class)->findBy(array('estado' => '1'));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $datacontrol = $serializer->normalize($controlcorrelativo, null, array('attributes' => array('id', 'nombre')));

            $tiponota = $this->getDoctrine()->getRepository(TipoNota::class)->findBy(array('estado' => '1'));
            $serializer = new Serializer(array(new ObjectNormalizer()));
            $datatipo = $serializer->normalize($tiponota, null, array('attributes' => array('id', 'nombre')));

            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->unidadByPermission($user);
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
     * @Route("/correlativoinsert", methods={"POST"}, name="correlativoinsert")
     */
    public function correlativoinsert(Request $request)
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
            $Correlativo->setItem($item);
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
     * @Route("/correlativomodificar", methods={"POST"}, name="correlativomodificar")
     */
    public function correlativomodificar(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);

            $id = $sx['id'];
            //  $fechareg = $sx['fechareg'];
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

            $Correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            //$numcorrelativo = $this->numerar();
            //$Correlativo->setFechareg(new \DateTime('now'));
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
            $Correlativo->setItem($item);
            $Correlativo->setUrleditable($urleditable);
            $Correlativo->setEntrega(new \DateTime($entrega));
            $unidad = $this->getDoctrine()->getRepository(Unidad::class)->findBy(array('nombre' => $fkunidad));
            $Correlativo->setFkunidad($unidad[0]);
            $Correlativo->setUrlorigen($urlorigen);
            $Correlativo->setIp($ipcontrol);
            $Correlativo->setEstado(1);
            $cx->persist($Correlativo);
            $cx->flush();
            $resultado = array('response' => "El numero de correlativo Modificado es: " . $Correlativo->getNumcorrelativo() . ".",
                'success' => true,
                'message' => 'Correlativo Modificado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);

            // return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    public function numerar()
    {
        try {
            date_default_timezone_set('America/La_Paz');
            $dia = date("d");
            $mes = date("m");

            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT cb_correlativo_numcorrelativo AS numcorrelativo
                    FROM cb_correlativo_correlativo
                    WHERE date_part('Day', cb_correlativo_fechareg) = 1 AND date_part('Month', cb_correlativo_fechareg) = 1 AND
                        cb_correlativo_estado = 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $query = $stmt->fetchAll();

            $sql2 = "SELECT cb_correlativo_numcorrelativo + 1 AS numcorrelativo
                    FROM cb_correlativo_correlativo
                    WHERE cb_correlativo_estado = 1 AND cb_correlativo_id IN
                    (SELECT MAX(c.cb_correlativo_id)
                    FROM cb_correlativo_correlativo c
                    WHERE c.cb_correlativo_estado = 1)";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute();
            $query2 = $stmt2->fetchAll();

            if ($dia == '01' && $mes == '01' && empty($query) || empty($query) && empty($query2)) {
                $num = 1;
            } else {
                $num = $query2[0]['numcorrelativo'];
            }

            return $num;
        } catch (Exception $e) {
            return 0;
        }

    }

    /**
     * @Route("/correlativoeliminar", methods={"POST"}, name="correlativoeliminar")
     */
    public function correlativoeliminar(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $cx = $this->getDoctrine()->getManager();
            $id = $sx['id'];
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);

            $correlativo->setEstado(0);
            $cx->persist($correlativo);
            $cx->flush();

            $resultado = array('response' => "El numero de correlativo Eliminado es: " . $correlativo->getNumcorrelativo() . ".", 'success' => true,
                'message' => 'Correlativo dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/correlativopermiso", methods={"POST"}, name="correlativopermiso")
     */
    public function correlativopermiso(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);

            $username = $sx['username'];

            $permisos = $this->getDoctrine()->getRepository(Correlativo::class)->filterByPermissions($username);

            // $resultado = array('response'=>"El numero de correlativo Modificado es: ".$Correlativo->getNumcorrelativo().".",
            //'success' => true,
            //   'message' => 'Correlativo Modificado correctamente.');

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));

            $data2 = $serializer->serialize($permisos, 'json');

            return new jsonResponse(json_decode($data2));

            $resultado = json_encode($resultado);
            return new Response($resultado);

            // return new jsonResponse(json_decode($data2));
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
            return new Response('Excepción capturada: ', $e->getMessage(), "\n");
        }
    }

    /**
     * @Route("/correlativoeditar", methods={"POST"}, name="correlativoeditar")
     */
    public function correlativoeditar(Request $request)
    {
        try {
            $sx = json_decode($request->getContent(), true);
            $id = $sx['id'];
            $cx = $this->getDoctrine()->getManager();
            $correlativo = $this->getDoctrine()->getRepository(Correlativo::class)->find($id);
            $fecreg = $correlativo->getFechareg();
            $fecent = $correlativo->getEntrega();
            if ($fecreg != null) {
                $rsfcr = $fecreg->format('Y-m-d');
            } else {
                $rsfcr = $fecreg;
            }

            if ($fecent != null) {
                $rsfce = $fecent->format('Y-m-d');
            } else {
                $rsfce = $fecent;
            }

            $sendinf = [
                "id" => $correlativo->getId(),
                "fechareg" => $rsfcr,
                "numcorrelativo" => $correlativo->getNumcorrelativo(),
                "fksolicitante" => $correlativo->getFksolicitante(),
                "redactor" => $correlativo->getRedactor(),
                "destinatario" => $correlativo->getDestinatario(),
                "referencia" => $correlativo->getReferencia(),
                "fkcorrelativo" => $correlativo->getFkcorrelativo(),
                "fktiponota" => $correlativo->getFktiponota(),
                "url" => $correlativo->getUrl(),
                "antecedente" => $correlativo->getAntecedente(),
                "estadocorrelativo" => $correlativo->getEstadoCorrelativo(),
                "item" => $correlativo->getItem(),
                "urleditable" => $correlativo->getUrleditable(),
                "entrega" => $rsfce,
                "fkunidad" => $correlativo->getFkunidad(),
                "urlorigen" => $correlativo->getUrlorigen(),
                "ipcontrol" => $correlativo->getIp(),
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));

            $json = $serializer->serialize($sendinf, 'json');

            $resultado = $json;
            return new Response($resultado);

            // return new jsonResponse(json_decode($data2));
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
                    WHERE a.cb_sig_fksuperior IS NOT NULL)";

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $parent = $stmt->fetchAll();

            $sql2 = "SELECT cb_sig_id AS id, cb_sig_titulo AS titulo, cb_sig_ruta AS ruta, cb_sig_fksuperior AS fksuperior, NULL AS children
                    FROM cb_cfg_sig
                    WHERE cb_sig_fksuperior IS NULL AND cb_sig_id NOT IN
                    (SELECT DISTINCT (a.cb_sig_fksuperior)
                    FROM cb_cfg_sig a
                    WHERE a.cb_sig_fksuperior IS NOT NULL)
                    ORDER BY 1";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute();
            $first = $stmt2->fetchAll();

            $sig = array();
            foreach ($parent as $item) {
                $id = $item['id'];
                $sql3 = "SELECT cb_sig_id AS id, cb_sig_titulo AS titulo, cb_sig_ruta AS ruta, cb_sig_fksuperior AS fksuperior
                        FROM cb_cfg_sig
                        WHERE cb_sig_fksuperior=:id
                        ORDER BY 1";

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