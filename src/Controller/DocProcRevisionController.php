<?php

namespace App\Controller;

use App\Entity\Acceso;
use App\Entity\DocProcRevision;
use App\Entity\DocumentoProceso;
use App\Entity\FichaCargo;
use App\Entity\Modulo;
use App\Entity\Rol;
use App\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class DocProcRevisionController extends AbstractController
{
    /**
     * @Route("/docprocesorev", name="docprocesorev")
     * @Method({"GET"})
     */
    public function index()
    {
        $s_user = $this->get('session')->get('s_user');
        if (empty($s_user)) {
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
        $responsable = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('estado' => '1'));
        $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('estado' => '1'));
        $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('estado' => '1'));
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('docprocesorev/index.html.twig', array('objects' => $docprocrev, 'tipo' => $documentoproceso, 'responsable' => $responsable, 'docderiv' => $docderiv, 'parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }

    /**
     * @Route("/docprocesorev_insertar", methods={"POST"}, name="docprocesorev_insertar")
     */
    public function insertar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);

            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $firma = $sx['firma'];
            $estadodoc = $sx['estadodoc'];
            $docid = $sx['fkdocs'];

            $docprocrev = new DocProcRevision();
            $docprocrev->setFecha(new \DateTime($fecha));
            $docprocrev->setResponsable($responsable);
            $docprocrev->setFirma($firma);
            $docprocrev->setEstadodoc($estadodoc);
            $docprocrev->setEstado(1);

            $docid != '' ? $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($docid) : $documentoproceso = null;
            $docprocrev->setFkdoc($documentoproceso);

            $errors = $validator->validate($docprocrev);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array));
            }
            $cx->persist($docprocrev);
            $cx->flush();

            $resultado = array('response' => "El ID registrado es: " . $docprocrev->getId() . ".", 'success' => true,
                'message' => 'Documento en revisión agregado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docprocesorev_derivar", methods={"POST"}, name="docprocesorev_derivar")
     */
    public function derivar(ValidatorInterface $validator, \Swift_Mailer $mailer)
    {
        try {
            $s_user = $this->get('session')->get('s_user');
            $idu = $s_user['id'];
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);

            $id = $sx['id'];
            $responsable = $sx['responsable'];
            $firma = $sx['firma'];
            $estadodoc = $sx['estadodoc'];
            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d");
            $responsable != '' ? $responsable = $this->getDoctrine()->getRepository(Usuario::class)->find($responsable) : $responsable = null;

            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['id' => $id, 'fkresponsable' => $idu, 'estado' => '1']);
            $docprocrev->setFirma($firma);
            $docprocrev->setEstadodoc($estadodoc);

            $docrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['fkdoc' => $docprocrev->getFkdoc()->getId(), 'fkresponsable' => $responsable->getId(), 'estado' => '1']);
            $docrev->setFirma('Por firmar');
            $docrev->setFecha(new \DateTime($fecha));
            $cx->persist($docrev);
            $cx->flush();

            $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findOneBy(['id' => $docrev->getFkdoc()->getId(), 'estado' => '1']);
            $message = (new \Swift_Message('ELFEC - Documento a revisar'))
                ->setFrom('charly_90_6@hotmail.com')
                ->setTo($responsable->getCorreo())
                ->setBody($this->renderView('mail/notificacion.html.twig',
                    array(
                        'docproceso' => $documentoproceso,
                        'adicional' => array('fecha' => $fecha, 'dominio' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                    )
                ), 'text/html');

            $mailer->send($message);

            $errors = $validator->validate($docprocrev);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array));
            }

            $cx->persist($docprocrev);
            $cx->flush();

            $resultado = array('response' => "El ID registrado es: " . $docprocrev->getId() . ".", 'success' => true,
                'message' => 'Documento en revisión agregado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docprocesorev_aprorec", methods={"POST"}, name="docprocesorev_aprorec")
     */
    public function aprorec(ValidatorInterface $validator, \Swift_Mailer $mailer)
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $sx = json_decode($_POST['object'], true);

            $s_user = $this->get('session')->get('s_user');
            $id = $sx['id'];
            $firma = $sx['firma'];
            $estadodoc = $sx['estadodoc'];

            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            $docprocrev->setFirma($firma);
            $docprocrev->setEstadodoc($estadodoc);

            $errors = $validator->validate($docprocrev);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                }
                return new Response(json_encode($array));
            }

            $cx->merge($docprocrev);
            $cx->flush();

            if ($estadodoc == 'RECHAZADO') {
                $cx = $this->getDoctrine()->getEntityManager()->getConnection();
                // Lista docs. proceso de revision
                $sql = "select cb_docprocrevision_fkdoc from cb_gest_docprocrevision
                        where cb_docprocrevision_estado =1
                        and cb_docprocrevision_id =:id";
                $stmt = $cx->prepare($sql);
                $stmt->execute(['id' => ($id)]);
                $fkdoc = $stmt->fetchAll();

                $documento = $fkdoc[0]['cb_docprocrevision_fkdoc'];

                // Obtener la primera persona derivada
                $cx = $this->getDoctrine()->getEntityManager()->getConnection();
                $sql = "select cb_docprocrevision_id from cb_gest_docprocrevision
                        where cb_docprocrevision_estado =1
                        and cb_docprocrevision_fkdoc =:documento";
                $stmt = $cx->prepare($sql);
                $stmt->execute(['documento' => ($documento)]);
                $fkdoc = $stmt->fetchAll();

                $sql = "select cb_docprocrevision_fkresponsable from cb_gest_docprocrevision
                        where cb_docprocrevision_estado =1
                        and cb_docprocrevision_id =:id";
                $stmt = $cx->prepare($sql);
                $stmt->execute(['id' => ($id)]);
                $fkresponsableprincipal = $stmt->fetchAll();

                $cx = $this->getDoctrine()->getEntityManager()->getConnection();
                $sql = "select cb_docprocrevision_fkresponsable from cb_gest_docprocrevision
                        where cb_docprocrevision_estado =1
                        and cb_docprocrevision_fkdoc =:documento";
                $stmt = $cx->prepare($sql);
                $stmt->execute(['documento' => ($documento)]);
                $fkresponsable = $stmt->fetchAll();
                $idprincipal = $fkresponsableprincipal[0]['cb_docprocrevision_fkresponsable'];
                //$usariorech = $this->getDoctrine()->getRepository(Usuario::class)->findId($idprincipal);
                $usariorech = $this->getDoctrine()->getRepository(Usuario::class)->findBy(array('id' => $idprincipal, 'estado' => '1'));
                $serializer = new Serializer(array(new ObjectNormalizer()));
                $data = $serializer->normalize($usariorech, null, array('attributes' => array('correo')));
                $correo = array();
                foreach ($fkresponsable as $responsable) {

                    $user = $this->getDoctrine()->getRepository(Usuario::class)->find($responsable['cb_docprocrevision_fkresponsable']);
                    $serializer = new Serializer(array(new ObjectNormalizer()));
                    $data2 = $serializer->normalize($usariorech, null, array('attributes' => array('correo')));
                    $correo[] = $data2[0]['correo'];
                }
                //  $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['id'=>$documento,'estado'=>'1']);
                // $docrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['fkdoc'=>$docprocrev->getFkdoc()->getId(), 'fkresponsable'=>$responsable->getId(), 'estado'=>'1']);
                $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['id' => $id, 'estado' => '1']);
                $docrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->findOneBy(['fkdoc' => $docprocrev->getFkdoc()->getId(), 'estado' => '1']);
                $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findOneBy(['id' => $docrev->getFkdoc()->getId(), 'estado' => '1']);

                // $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('id' => $documento, 'estado' => '1'));
                $datarechpor = $data[0]['correo'];
                $fecha = date("Y-m-d");
                $message = (new \Swift_Message('ELFEC - Documento a rechazado por ' . $datarechpor))
                    ->setFrom('charly_90_6@hotmail.com')
                    ->setTo($correo)
                    ->setBody($this->renderView('mail/notificacion.html.twig',
                        array(
                            'docproceso' => $documentoproceso,
                            'adicional' => array('fecha' => $fecha, 'dominio' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
                        )
                    ), 'text/html');
                $mailer->send($message);
                foreach ($fkdoc as $elemento) {
                    $valormin = min($fkdoc);
                    $valormin1 = $valormin['cb_docprocrevision_id'];
                    $ide = $elemento['cb_docprocrevision_id'];
                    if ($valormin1 == $ide) {
                        $cx = $this->getDoctrine()->getManager();
                        $documentorev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($ide);
                        //$docproc = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($docprocrev->getId());
                        $documentorev->setFirma('Por firmar');
                        $documentorev->setEstadodoc('');
                        $cx->merge($documentorev);
                        $cx->flush();
                    } else {
                        $cx = $this->getDoctrine()->getManager();
                        $documentorev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($ide);
                        //$docproc = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($docprocrev->getId());
                        $documentorev->setFirma('');
                        $documentorev->setEstadodoc('');
                        $cx->merge($documentorev);
                        $cx->flush();
                    }

                }

                $docproc = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($docprocrev->getFkdoc()->getId());
                //     $docproc->setAprobadorechazado($estadodoc);
                $user = $this->getDoctrine()->getRepository(Usuario::class)->find($s_user['id']);
                //    $docproc->setFkaprobador($user);
                date_default_timezone_set('America/La_Paz');
                $fecha = date("Y-m-d");
                //     $docproc->setFechaaprobacion(new \DateTime($fecha));
                //    $cx->merge($docprocrev);
                //    $cx->flush();
                $resultado = array('response' => "El ID registrado es: " . $docprocrev->getId() . ".", 'success' => true,
                    'message' => 'Documento en revisión modificado correctamente.');
                $resultado = json_encode($resultado);
                return new Response($resultado);
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docprocesorev_actualizar", methods={"POST"}, name="docprocesorev_actualizar")
     */
    public function actualizar(ValidatorInterface $validator)
    {
        try {
            $cx = $this->getDoctrine()->getManager();

            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $fecha = $sx['fecha'];
            $responsable = $sx['responsable'];
            $firma = $sx['firma'];
            $estadodoc = $sx['estadodoc'];
            $docid = $sx['fkdocs'];

            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);

            $docprocrev->setId($id);
            $docprocrev->setFecha(new \DateTime($fecha));
            $docprocrev->setResponsable($responsable);
            $docprocrev->setFirma($firma);
            $docprocrev->setEstadodoc($estadodoc);
            $docprocrev->setEstado(1);

            $docid != '' ? $documentoproceso = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($docid) : $documentoproceso = null;
            $docprocrev->setFkdoc($documentoproceso);

            $errors = $validator->validate($docprocrev);
            if (count($errors) > 0) {
                $array = array();
                $array['error'] = 'error';
                foreach ($errors as $e) {
                    $array += [$e->getPropertyPath() => $e->getMessage()];
                    // dd($e->getMessage());
                    // dd($e->getPropertyPath()) ;
                }
                return new Response(json_encode($array));
            }

            $cx->merge($docprocrev);
            $cx->flush();

            $resultado = array('success' => true,
                'message' => 'Documento en revisión actualizado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docprocesorev_editar", methods={"POST"}, name="docprocesorev_editar")
     */
    public function editar()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            $fpb = $docprocrev->getFecha();
            $result = $fpb->format('Y-m-d');
            $sendinf = [
                "id" => $docprocrev->getId(),
                "fecha" => $result,
                "responsable" => $docprocrev->getResponsable(),
                "firma" => $docprocrev->getFirma(),
                "estadodoc" => $docprocrev->getEstadodoc(),
                "fkdoc" => $docprocrev->getFkdoc(),
            ];
            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($sendinf, 'json');
            $resultado = array('response' => $json, 'success' => true,
                'message' => 'Documento en revisión listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docprocrevision_editar", methods={"POST"}, name="docprocrevision_editar")
     */
    public function editar_rev()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $dprocrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(['fkdoc' => $id, 'estado' => '1'], ['id' => 'ASC']);
            $docs = array();
            foreach ($dprocrevision as $docprocrev) {
                $fpb = $docprocrev->getFecha();
                if ($fpb != null) {
                    $result = $fpb->format('Y-m-d');
                } else {
                    $result = $fpb;
                }

                $sendinf = [
                    "id" => $docprocrev->getId(),
                    "fecha" => $result,
                    "fkresponsable" => $docprocrev->getFkresponsable(),
                    "firma" => $docprocrev->getFirma(),
                    "estadodoc" => $docprocrev->getEstadodoc(),
                    "fkdoc" => $docprocrev->getFkdoc(),
                ];
                $docs[] = $sendinf;
            }

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize($docs, 'json');
            $resultado = array('response' => $json, 'success' => true,
                'message' => 'Documentos en revisión listado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docrev_prev", methods={"POST"}, name="docrev_prev")
     */
    public function docrev_prev()
    {
        try {
            $info = "";
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $doc_rev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);
            $doc_proc = $this->getDoctrine()->getRepository(DocumentoProceso::class)->findBy(array('id' => $doc_rev->getFkdoc()->getId(), 'estado' => '1'));

            if (sizeof($doc_proc) == 0) {
                $info = array('response' => "¿Desea dar de baja el documento en revisión?", 'success' => true,
                    'message' => 'Baja documento en revisión.');
            } else {
                if (sizeof($doc_proc) > 0) {
                    $vr = " documentos en proceso";
                }

                $info = array('response' => "El documento en revisión no se puede eliminar, debido a que tiene relación con los datos de" . $vr, 'success' => false,
                    'message' => 'Se eliminarán todos los registros asociados al documento en revisión.');
            }
            $resultado = json_encode($info);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/docprocesorev_eliminar", methods={"POST"}, name="docprocesorev_eliminar")
     */
    public function eliminar()
    {
        try {
            $cx = $this->getDoctrine()->getManager();
            $id = $_POST['id'];
            $docprocrev = $this->getDoctrine()->getRepository(DocProcRevision::class)->find($id);

            $docprocrev->setEstado(0);
            $cx->persist($docprocrev);
            $cx->flush();

            $resultado = array('response' => "El ID modificado es: " . $docprocrev->getId() . ".", 'success' => true,
                'message' => 'Documento en revisión dado de baja correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
}
