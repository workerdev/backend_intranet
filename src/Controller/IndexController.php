<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Usuario;
use App\Entity\Modulo;
use App\Entity\Acceso;
use App\Entity\Rol;
use App\Entity\DocProcRevision;
use App\Entity\FichaCargo;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class IndexController extends Controller
{
    /**
     * @Route("/", methods={"GET"}, name="elfec_listar")
     */
    public function index()
    {
        $s_user = $this->get('session')->get('s_user');
        if(empty($s_user)){
            $redireccion = new RedirectResponse('/login');
            return $redireccion;
        }
        $serializer = new Serializer([new ObjectNormalizer()]);
        
        $vid = $s_user['fkrol']['id'];
        $rol = $this->getDoctrine()->getRepository(Rol::class)->findOneBy(['id' => $vid, 'estado' => '1']);
        $accesos = $this->getDoctrine()->getRepository(Acceso::class)->findBy(['fkrol' => $rol], ['fkmodulo' => 'DESC']);
        $dtaccess = $serializer->normalize($accesos, null, ['attributes' => ['fkmodulo' => ['id', 'nombre', 'titulo', 'ruta', 'icono', 'menu', 'fkmodulo' => ['id', 'titulo']]]]); 
        $datacss = array_map(function ($a) { return $a['fkmodulo']; }, $dtaccess);
        /*$mods = array();
        foreach ($accesos as $access) {
            $accdt = (object) $access;
            $item = $this->getDoctrine()->getRepository(Modulo::class)->find($access->getFkmodulo()->getId());
            $mods[] = $item;
        }*/
        $parent = $datacss; //$mods;
        $child = $datacss; //$mods;
        $dtpermisos = $serializer->normalize($accesos, null, ['attributes' => ['fkmodulo' => ['nombre']]]); 
        $permisos = array_map(function ($a) { return $a['fkmodulo']['nombre']; }, $dtpermisos);
        /*array();
        foreach ($mods as $mdl) {
            $mdldt = (object) $mdl;
            $item = $mdldt->getNombre();
            $permisos[] = $item;
        }*/
        $docderiv = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(array('fkresponsable' => $s_user['id'], 'firma' => 'Por firmar', 'estado' => '1'));
        $fcaprobjf = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkjefeaprobador' => $s_user['id'], 'firmajefe' => 'Por aprobar', 'estado' => '1'));
        $fcaprobgr = $this->getDoctrine()->getRepository(FichaCargo::class)->findBy(array('fkgerenteaprobador' => $s_user['id'], 'firmagerente' => 'Por aprobar', 'estado' => '1'));
        return $this->render('index/index.html.twig', array('parents' => $parent, 'children' => $child, 'permisos' => $permisos, 'docderiv' => $docderiv, 'fcaprobjf' => $fcaprobjf, 'fcaprobgr' => $fcaprobgr));
    }
}