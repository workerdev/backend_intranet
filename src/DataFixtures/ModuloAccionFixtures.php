<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Modulo;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModuloAccionFixtures extends Fixture implements DependentFixtureInterface
{
    public const USUARIO_HOME = 'home-user';
    public const USUARIO_INSERT = 'insert-user';
    public const USUARIO_EDIT = 'edit-user';
    public const USUARIO_DELETE = 'delete-user';
    public const ROL_HOME = 'home-rol';
    public const ROL_INSERT = 'insert-rol';
    public const ROL_EDIT = 'edit-rol';
    public const ROL_DELETE = 'delete-rol';
    public const PERFIL_EDIT = 'edit-perfil';

    public const MENU_HOME = 'home-menu';
    public const MENU_INSERT = 'insert-menu';
    public const MENU_EDIT = 'edit-menu';
    public const MENU_DELETE = 'delete-menu';

    public function load(ObjectManager $manager)
    {
        $userhm = new Modulo();
        $userhm->setNombre('home_usuario');
        $userhm->setTitulo('Consultar');
        $userhm->setRuta('');
        $userhm->setIcono('home');
        $userhm->setMenu(0);
        $userhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::USUARIO_CHILD));
        $manager->persist($userhm);

        $userins = new Modulo();
        $userins->setNombre('usuario_insertar');
        $userins->setTitulo('Adicionar');
        $userins->setRuta('/usuario_insertar');
        $userins->setIcono('home');
        $userins->setMenu(0);
        $userins->setFkmodulo($this->getReference(ModuloChildrenFixtures::USUARIO_CHILD));
        $manager->persist($userins);

        $useredt = new Modulo();
        $useredt->setNombre('usuario_editar');
        $useredt->setTitulo('Actualizar');
        $useredt->setRuta('/usuario_editar');
        $useredt->setIcono('home');
        $useredt->setMenu(0);
        $useredt->setFkmodulo($this->getReference(ModuloChildrenFixtures::USUARIO_CHILD));
        $manager->persist($useredt);

        $userelm = new Modulo();
        $userelm->setNombre('usuario_eliminar');
        $userelm->setTitulo('Dar de Baja');
        $userelm->setRuta('/usuario_eliminar');
        $userelm->setIcono('home');
        $userelm->setMenu(0);
        $userelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::USUARIO_CHILD));
        $manager->persist($userelm);


        $rolhm = new Modulo();
        $rolhm->setNombre('home_rol');
        $rolhm->setTitulo('Consultar');
        $rolhm->setRuta('');
        $rolhm->setIcono('home');
        $rolhm->setMenu(0);
        $rolhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ROL_CHILD));
        $manager->persist($rolhm);

        $rolins = new Modulo();
        $rolins->setNombre('rol_insertar');
        $rolins->setTitulo('Adicionar');
        $rolins->setRuta('/rol_insertar');
        $rolins->setIcono('home');
        $rolins->setMenu(0);
        $rolins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ROL_CHILD));
        $manager->persist($rolins);

        $roledt = new Modulo();
        $roledt->setNombre('rol_editar');
        $roledt->setTitulo('Actualizar');
        $roledt->setRuta('/rol_editar');
        $roledt->setIcono('home');
        $roledt->setMenu(0);
        $roledt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ROL_CHILD));
        $manager->persist($roledt);

        $rolelm = new Modulo();
        $rolelm->setNombre('rol_eliminar');
        $rolelm->setTitulo('Dar de Baja');
        $rolelm->setRuta('/rol_eliminar');
        $rolelm->setIcono('home');
        $rolelm->setMenu(0);
        $rolelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ROL_CHILD));
        $manager->persist($rolelm);
        

        $perfedt = new Modulo();
        $perfedt->setNombre('menu_editar');
        $perfedt->setTitulo('Actualizar');
        $perfedt->setRuta('/menu_editar');
        $perfedt->setIcono('home');
        $perfedt->setMenu(0);
        $perfedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERFIL_CHILD));
        $manager->persist($perfedt);



        $respschm = new Modulo();
        $respschm->setNombre('home_responsabilidad');
        $respschm->setTitulo('Consultar');
        $respschm->setRuta('');
        $respschm->setIcono('home');
        $respschm->setMenu(0);
        $respschm->setFkmodulo($this->getReference(ModuloChildrenFixtures::RESPONSABILIDADSOCIAL_CHILD));
        $manager->persist($respschm);

        $respscins = new Modulo();
        $respscins->setNombre('responsabilidad_insertar');
        $respscins->setTitulo('Adicionar');
        $respscins->setRuta('/responsabilidad_insertar');
        $respscins->setIcono('home');
        $respscins->setMenu(0);
        $respscins->setFkmodulo($this->getReference(ModuloChildrenFixtures::RESPONSABILIDADSOCIAL_CHILD));
        $manager->persist($respscins);

        $respscedt = new Modulo();
        $respscedt->setNombre('responsabilidad_editar');
        $respscedt->setTitulo('Actualizar');
        $respscedt->setRuta('/responsabilidad_editar');
        $respscedt->setIcono('home');
        $respscedt->setMenu(0);
        $respscedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::RESPONSABILIDADSOCIAL_CHILD));
        $manager->persist($respscedt);

        $respscelm = new Modulo();
        $respscelm->setNombre('responsabilidad_eliminar');
        $respscelm->setTitulo('Dar de Baja');
        $respscelm->setRuta('/responsabilidad_eliminar');
        $respscelm->setIcono('home');
        $respscelm->setMenu(0);
        $respscelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::RESPONSABILIDADSOCIAL_CHILD));
        $manager->persist($respscelm);


        $menuhm = new Modulo();
        $menuhm->setNombre('home_menu');
        $menuhm->setTitulo('Consultar');
        $menuhm->setRuta('');
        $menuhm->setIcono('home');
        $menuhm->setMenu(0);
        $menuhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::MENU_CHILD));
        $manager->persist($menuhm);

        $menuins = new Modulo();
        $menuins->setNombre('menu_insertar');
        $menuins->setTitulo('Adicionar');
        $menuins->setRuta('/menu_insertar');
        $menuins->setIcono('home');
        $menuins->setMenu(0);
        $menuins->setFkmodulo($this->getReference(ModuloChildrenFixtures::MENU_CHILD));
        $manager->persist($menuins);

        $menuedt = new Modulo();
        $menuedt->setNombre('menu_editar');
        $menuedt->setTitulo('Actualizar');
        $menuedt->setRuta('/menu_editar');
        $menuedt->setIcono('home');
        $menuedt->setMenu(0);
        $menuedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::MENU_CHILD));
        $manager->persist($menuedt);

        $menuelm = new Modulo();
        $menuelm->setNombre('menu_eliminar');
        $menuelm->setTitulo('Dar de Baja');
        $menuelm->setRuta('/menu_eliminar');
        $menuelm->setIcono('home');
        $menuelm->setMenu(0);
        $menuelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::MENU_CHILD));
        $manager->persist($menuelm);


        $enlchm = new Modulo();
        $enlchm->setNombre('home_enlaces');
        $enlchm->setTitulo('Consultar');
        $enlchm->setRuta('');
        $enlchm->setIcono('home');
        $enlchm->setMenu(0);
        $enlchm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ENLACES_CHILD));
        $manager->persist($enlchm);

        $enlcins = new Modulo();
        $enlcins->setNombre('enlaces_insertar');
        $enlcins->setTitulo('Adicionar');
        $enlcins->setRuta('/enlaces_insertar');
        $enlcins->setIcono('home');
        $enlcins->setMenu(0);
        $enlcins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ENLACES_CHILD));
        $manager->persist($enlcins);

        $enlcedt = new Modulo();
        $enlcedt->setNombre('enlaces_editar');
        $enlcedt->setTitulo('Actualizar');
        $enlcedt->setRuta('/enlaces_editar');
        $enlcedt->setIcono('home');
        $enlcedt->setMenu(0);
        $enlcedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ENLACES_CHILD));
        $manager->persist($enlcedt);

        $enlcelm = new Modulo();
        $enlcelm->setNombre('enlaces_eliminar');
        $enlcelm->setTitulo('Dar de Baja');
        $enlcelm->setRuta('/enlaces_eliminar');
        $enlcelm->setIcono('home');
        $enlcelm->setMenu(0);
        $enlcelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ENLACES_CHILD));
        $manager->persist($enlcelm);


        $catlghm = new Modulo();
        $catlghm->setNombre('home_catalogo');
        $catlghm->setTitulo('Consultar');
        $catlghm->setRuta('');
        $catlghm->setIcono('home');
        $catlghm->setMenu(0);
        $catlghm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATALOGO_CHILD));
        $manager->persist($catlghm);

        $catlgins = new Modulo();
        $catlgins->setNombre('catalogo_insertar');
        $catlgins->setTitulo('Adicionar');
        $catlgins->setRuta('/catalogo_insertar');
        $catlgins->setIcono('home');
        $catlgins->setMenu(0);
        $catlgins->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATALOGO_CHILD));
        $manager->persist($catlgins);

        $catlgedt = new Modulo();
        $catlgedt->setNombre('catalogo_editar');
        $catlgedt->setTitulo('Actualizar');
        $catlgedt->setRuta('/catalogo_editar');
        $catlgedt->setIcono('home');
        $catlgedt->setMenu(0);
        $catlgedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATALOGO_CHILD));
        $manager->persist($catlgedt);

        $catlgelm = new Modulo();
        $catlgelm->setNombre('catalogo_eliminar');
        $catlgelm->setTitulo('Dar de Baja');
        $catlgelm->setRuta('/catalogo_eliminar');
        $catlgelm->setIcono('home');
        $catlgelm->setMenu(0);
        $catlgelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATALOGO_CHILD));
        $manager->persist($catlgelm);


        $accidentes = new Modulo();
        $accidentes->setNombre('home_accidentes');
        $accidentes->setTitulo('Consultar');
        $accidentes->setRuta( 'home_accidentes');
        $accidentes->setIcono('home');
        $accidentes->setMenu(0);
        $accidentes->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIDENTE_CHILD));
        $manager->persist($accidentes);

        $accidentesins = new Modulo();
        $accidentesins->setNombre('accidentes_insertar');
        $accidentesins->setTitulo('Adicionar');
        $accidentesins->setRuta( '/accidentes_insertar');
        $accidentesins->setIcono('home');
        $accidentesins->setMenu(0);
        $accidentesins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIDENTE_CHILD));
        $manager->persist($accidentesins);

        $accidentesedt = new Modulo();
        $accidentesedt->setNombre('accidentes_editar');
        $accidentesedt->setTitulo('Actualizar');
        $accidentesedt->setRuta( '/accidentes_editar');
        $accidentesedt->setIcono('home');
        $accidentesedt->setMenu(0);
        $accidentesedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIDENTE_CHILD));
        $manager->persist($accidentesedt);


        $sighm = new Modulo();
        $sighm->setNombre('home_sig');
        $sighm->setTitulo('Consultar');
        $sighm->setRuta('');
        $sighm->setIcono('home');
        $sighm->setMenu(0);
        $sighm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SIG_CHILD));
        $manager->persist($sighm);

        $sigins = new Modulo();
        $sigins->setNombre('sig_insertar');
        $sigins->setTitulo('Adicionar');
        $sigins->setRuta('/sig_insertar');
        $sigins->setIcono('home');
        $sigins->setMenu(0);
        $sigins->setFkmodulo($this->getReference(ModuloChildrenFixtures::SIG_CHILD));
        $manager->persist($sigins);

        $sigedt = new Modulo();
        $sigedt->setNombre('sig_editar');
        $sigedt->setTitulo('Actualizar');
        $sigedt->setRuta('/sig_editar');
        $sigedt->setIcono('home');
        $sigedt->setMenu(0);
        $sigedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::SIG_CHILD));
        $manager->persist($sigedt);

        $sigelm = new Modulo();
        $sigelm->setNombre('sig_eliminar');
        $sigelm->setTitulo('Dar de Baja');
        $sigelm->setRuta('/sig_eliminar');
        $sigelm->setIcono('home');
        $sigelm->setMenu(0);
        $sigelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SIG_CHILD));
        $manager->persist($sigelm);


        $mailhm = new Modulo();
        $mailhm->setNombre('home_correo');
        $mailhm->setTitulo('Consultar');
        $mailhm->setRuta('');
        $mailhm->setIcono('home');
        $mailhm->setMenu(0);
        $mailhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CORREO_CHILD));
        $manager->persist($mailhm);


        $docaddhm = new Modulo();
        $docaddhm->setNombre('home_documentoextra');
        $docaddhm->setTitulo('Consultar');
        $docaddhm->setRuta('');
        $docaddhm->setIcono('home');
        $docaddhm->setMenu(0);
        $docaddhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCEXTRA_CHILD));
        $manager->persist($docaddhm);

        $docaddins = new Modulo();
        $docaddins->setNombre('documentoextra_insertar');
        $docaddins->setTitulo('Adicionar');
        $docaddins->setRuta('/documentoextra_insertar');
        $docaddins->setIcono('home');
        $docaddins->setMenu(0);
        $docaddins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCEXTRA_CHILD));
        $manager->persist($docaddins);

        $docaddedt = new Modulo();
        $docaddedt->setNombre('documentoextra_editar');
        $docaddedt->setTitulo('Actualizar');
        $docaddedt->setRuta('/documentoextra_editar');
        $docaddedt->setIcono('home');
        $docaddedt->setMenu(0);
        $docaddedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCEXTRA_CHILD));
        $manager->persist($docaddedt);

        $docaddelm = new Modulo();
        $docaddelm->setNombre('documentoextra_eliminar');
        $docaddelm->setTitulo('Dar de Baja');
        $docaddelm->setRuta('/documentoextra_eliminar');
        $docaddelm->setIcono('home');
        $docaddelm->setMenu(0);
        $docaddelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCEXTRA_CHILD));
        $manager->persist($docaddelm);


        $nrmdochm = new Modulo();
        $nrmdochm->setNombre('home_normadocumento');
        $nrmdochm->setTitulo('Consultar');
        $nrmdochm->setRuta('');
        $nrmdochm->setIcono('home');
        $nrmdochm->setMenu(0);
        $nrmdochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::NORMA_CHILD));
        $manager->persist($nrmdochm);

        $nrmdocins = new Modulo();
        $nrmdocins->setNombre('normadocumento_insertar');
        $nrmdocins->setTitulo('Adicionar');
        $nrmdocins->setRuta('/normadocumento_insertar');
        $nrmdocins->setIcono('home');
        $nrmdocins->setMenu(0);
        $nrmdocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::NORMA_CHILD));
        $manager->persist($nrmdocins);

        $nrmdocedt = new Modulo();
        $nrmdocedt->setNombre('normadocumento_editar');
        $nrmdocedt->setTitulo('Actualizar');
        $nrmdocedt->setRuta('/normadocumento_editar');
        $nrmdocedt->setIcono('home');
        $nrmdocedt->setMenu(0);
        $nrmdocedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::NORMA_CHILD));
        $manager->persist($nrmdocedt);

        $nrmdocelm = new Modulo();
        $nrmdocelm->setNombre('normadocumento_eliminar');
        $nrmdocelm->setTitulo('Dar de Baja');
        $nrmdocelm->setRuta('/normadocumento_eliminar');
        $nrmdocelm->setIcono('home');
        $nrmdocelm->setMenu(0);
        $nrmdocelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::NORMA_CHILD));
        $manager->persist($nrmdocelm);


        $tpdochm = new Modulo();
        $tpdochm->setNombre('home_tipodocumento');
        $tpdochm->setTitulo('Consultar');
        $tpdochm->setRuta('');
        $tpdochm->setIcono('home');
        $tpdochm->setMenu(0);
        $tpdochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODOC_CHILD));
        $manager->persist($tpdochm);

        $tpdocins = new Modulo();
        $tpdocins->setNombre('tipodocumento_insertar');
        $tpdocins->setTitulo('Adicionar');
        $tpdocins->setRuta('/tipodocumento_insertar');
        $tpdocins->setIcono('home');
        $tpdocins->setMenu(0);
        $tpdocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODOC_CHILD));
        $manager->persist($tpdocins);

        $tpdocedt = new Modulo();
        $tpdocedt->setNombre('tipodocumento_editar');
        $tpdocedt->setTitulo('Actualizar');
        $tpdocedt->setRuta('/tipodocumento_editar');
        $tpdocedt->setIcono('home');
        $tpdocedt->setMenu(0);
        $tpdocedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODOC_CHILD));
        $manager->persist($tpdocedt);

        $tpdocelm = new Modulo();
        $tpdocelm->setNombre('tipodocumento_eliminar');
        $tpdocelm->setTitulo('Dar de Baja');
        $tpdocelm->setRuta('/tipodocumento_eliminar');
        $tpdocelm->setIcono('home');
        $tpdocelm->setMenu(0);
        $tpdocelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODOC_CHILD));
        $manager->persist($tpdocelm);


        $tpnrmhm = new Modulo();
        $tpnrmhm->setNombre('home_tiponorma');
        $tpnrmhm->setTitulo('Consultar');
        $tpnrmhm->setRuta('');
        $tpnrmhm->setIcono('home');
        $tpnrmhm->setMenu(0);
        $tpnrmhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONORMA_CHILD));
        $manager->persist($tpnrmhm);

        $tpnrmins = new Modulo();
        $tpnrmins->setNombre('tiponorma_insertar');
        $tpnrmins->setTitulo('Adicionar');
        $tpnrmins->setRuta('/tiponorma_insertar');
        $tpnrmins->setIcono('home');
        $tpnrmins->setMenu(0);
        $tpnrmins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONORMA_CHILD));
        $manager->persist($tpnrmins);

        $tpnrmedt = new Modulo();
        $tpnrmedt->setNombre('tiponorma_editar');
        $tpnrmedt->setTitulo('Actualizar');
        $tpnrmedt->setRuta('/tiponorma_editar');
        $tpnrmedt->setIcono('home');
        $tpnrmedt->setMenu(0);
        $tpnrmedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONORMA_CHILD));
        $manager->persist($tpnrmedt);

        $tpnrmelm = new Modulo();
        $tpnrmelm->setNombre('tiponorma_eliminar');
        $tpnrmelm->setTitulo('Dar de Baja');
        $tpnrmelm->setRuta('/tiponorma_eliminar');
        $tpnrmelm->setIcono('home');
        $tpnrmelm->setMenu(0);
        $tpnrmelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONORMA_CHILD));
        $manager->persist($tpnrmelm);


        $bajadochm = new Modulo();
        $bajadochm->setNombre('home_bajadocumento');
        $bajadochm->setTitulo('Consultar');
        $bajadochm->setRuta('');
        $bajadochm->setIcono('home');
        $bajadochm->setMenu(0);
        $bajadochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::BAJADOC_CHILD));
        $manager->persist($bajadochm);

        $bajadocins = new Modulo();
        $bajadocins->setNombre('bajadocumento_insertar');
        $bajadocins->setTitulo('Adicionar');
        $bajadocins->setRuta('/bajadocumento_insertar');
        $bajadocins->setIcono('home');
        $bajadocins->setMenu(0);
        $bajadocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::BAJADOC_CHILD));
        $manager->persist($bajadocins);

        $bajadocedt = new Modulo();
        $bajadocedt->setNombre('bajadocumento_editar');
        $bajadocedt->setTitulo('Actualizar');
        $bajadocedt->setRuta('/bajadocumento_editar');
        $bajadocedt->setIcono('home');
        $bajadocedt->setMenu(0);
        $bajadocedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::BAJADOC_CHILD));
        $manager->persist($bajadocedt);

        $bajadocelm = new Modulo();
        $bajadocelm->setNombre('bajadocumento_eliminar');
        $bajadocelm->setTitulo('Dar de Baja');
        $bajadocelm->setRuta('/bajadocumento_eliminar');
        $bajadocelm->setIcono('home');
        $bajadocelm->setMenu(0);
        $bajadocelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::BAJADOC_CHILD));
        $manager->persist($bajadocelm);


        $docfrmhm = new Modulo();
        $docfrmhm->setNombre('home_documentoformulario');
        $docfrmhm->setTitulo('Consultar');
        $docfrmhm->setRuta('');
        $docfrmhm->setIcono('home');
        $docfrmhm->setMenu(0);
        $docfrmhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCFORM_CHILD));
        $manager->persist($docfrmhm);

        $docfrmins = new Modulo();
        $docfrmins->setNombre('documentoformulario_insertar');
        $docfrmins->setTitulo('Adicionar');
        $docfrmins->setRuta('/documentoformulario_insertar');
        $docfrmins->setIcono('home');
        $docfrmins->setMenu(0);
        $docfrmins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCFORM_CHILD));
        $manager->persist($docfrmins);

        $docfrmedt = new Modulo();
        $docfrmedt->setNombre('documentoformulario_editar');
        $docfrmedt->setTitulo('Actualizar');
        $docfrmedt->setRuta('/documentoformulario_editar');
        $docfrmedt->setIcono('home');
        $docfrmedt->setMenu(0);
        $docfrmedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCFORM_CHILD));
        $manager->persist($docfrmedt);

        $docfrmelm = new Modulo();
        $docfrmelm->setNombre('documentoformulario_eliminar');
        $docfrmelm->setTitulo('Dar de Baja');
        $docfrmelm->setRuta('/documentoformulario_eliminar');
        $docfrmelm->setIcono('home');
        $docfrmelm->setMenu(0);
        $docfrmelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCFORM_CHILD));
        $manager->persist($docfrmelm);


        $doctpexhm = new Modulo();
        $doctpexhm->setNombre('home_doctipoextra');
        $doctpexhm->setTitulo('Consultar');
        $doctpexhm->setRuta('');
        $doctpexhm->setIcono('home');
        $doctpexhm->setMenu(0);
        $doctpexhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCTIPOEXT_CHILD));
        $manager->persist($doctpexhm);

        $doctpexins = new Modulo();
        $doctpexins->setNombre('doctipoextra_insertar');
        $doctpexins->setTitulo('Adicionar');
        $doctpexins->setRuta('/doctipoextra_insertar');
        $doctpexins->setIcono('home');
        $doctpexins->setMenu(0);
        $doctpexins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCTIPOEXT_CHILD));
        $manager->persist($doctpexins);

        $doctpexedt = new Modulo();
        $doctpexedt->setNombre('doctipoextra_editar');
        $doctpexedt->setTitulo('Actualizar');
        $doctpexedt->setRuta('/doctipoextra_editar');
        $doctpexedt->setIcono('home');
        $doctpexedt->setMenu(0);
        $doctpexedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCTIPOEXT_CHILD));
        $manager->persist($doctpexedt);

        $doctpexelm = new Modulo();
        $doctpexelm->setNombre('doctipoextra_eliminar');
        $doctpexelm->setTitulo('Dar de Baja');
        $doctpexelm->setRuta('/doctipoextra_eliminar');
        $doctpexelm->setIcono('home');
        $doctpexelm->setMenu(0);
        $doctpexelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCTIPOEXT_CHILD));
        $manager->persist($doctpexelm);


        $estdochm = new Modulo();
        $estdochm->setNombre('home_estadodocumento');
        $estdochm->setTitulo('Consultar');
        $estdochm->setRuta('');
        $estdochm->setIcono('home');
        $estdochm->setMenu(0);
        $estdochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADODOC_CHILD));
        $manager->persist($estdochm);

        $estdocins = new Modulo();
        $estdocins->setNombre('estadodocumento_insertar');
        $estdocins->setTitulo('Adicionar');
        $estdocins->setRuta('/estadodocumento_insertar');
        $estdocins->setIcono('home');
        $estdocins->setMenu(0);
        $estdocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADODOC_CHILD));
        $manager->persist($estdocins);

        $estdocedt = new Modulo();
        $estdocedt->setNombre('estadodocumento_editar');
        $estdocedt->setTitulo('Actualizar');
        $estdocedt->setRuta('/estadodocumento_editar');
        $estdocedt->setIcono('home');
        $estdocedt->setMenu(0);
        $estdocedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADODOC_CHILD));
        $manager->persist($estdocedt);

        $estdocelm = new Modulo();
        $estdocelm->setNombre('estadodocumento_eliminar');
        $estdocelm->setTitulo('Dar de Baja');
        $estdocelm->setRuta('/estadodocumento_eliminar');
        $estdocelm->setIcono('home');
        $estdocelm->setMenu(0);
        $estdocelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADODOC_CHILD));
        $manager->persist($estdocelm);


        $estseghm = new Modulo();
        $estseghm->setNombre('home_estadoseguimiento');
        $estseghm->setTitulo('Consultar');
        $estseghm->setRuta('');
        $estseghm->setIcono('home');
        $estseghm->setMenu(0);
        $estseghm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOSEG_CHILD));
        $manager->persist($estseghm);

        $estsegins = new Modulo();
        $estsegins->setNombre('estadoseguimiento_insertar');
        $estsegins->setTitulo('Adicionar');
        $estsegins->setRuta('/estadoseguimiento_insertar');
        $estsegins->setIcono('home');
        $estsegins->setMenu(0);
        $estsegins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOSEG_CHILD));
        $manager->persist($estsegins);

        $estsegedt = new Modulo();
        $estsegedt->setNombre('estadoseguimiento_editar');
        $estsegedt->setTitulo('Actualizar');
        $estsegedt->setRuta('/estadoseguimiento_editar');
        $estsegedt->setIcono('home');
        $estsegedt->setMenu(0);
        $estsegedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOSEG_CHILD));
        $manager->persist($estsegedt);

        $estsegelm = new Modulo();
        $estsegelm->setNombre('estadoseguimiento_eliminar');
        $estsegelm->setTitulo('Dar de Baja');
        $estsegelm->setRuta('/estadoseguimiento_eliminar');
        $estsegelm->setIcono('home');
        $estsegelm->setMenu(0);
        $estsegelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOSEG_CHILD));
        $manager->persist($estsegelm);


        $segelbhm = new Modulo();
        $segelbhm->setNombre('home_seguimientoelaboracion');
        $segelbhm->setTitulo('Consultar');
        $segelbhm->setRuta('');
        $segelbhm->setIcono('home');
        $segelbhm->setMenu(0);
        $segelbhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOELAB_CHILD));
        $manager->persist($segelbhm);

        $segelbins = new Modulo();
        $segelbins->setNombre('seguimientoelaboracion_insertar');
        $segelbins->setTitulo('Adicionar');
        $segelbins->setRuta('/seguimientoelaboracion_insertar');
        $segelbins->setIcono('home');
        $segelbins->setMenu(0);
        $segelbins->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOELAB_CHILD));
        $manager->persist($segelbins);

        $segelbedt = new Modulo();
        $segelbedt->setNombre('seguimientoelaboracion_editar');
        $segelbedt->setTitulo('Actualizar');
        $segelbedt->setRuta('/seguimientoelaboracion_editar');
        $segelbedt->setIcono('home');
        $segelbedt->setMenu(0);
        $segelbedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOELAB_CHILD));
        $manager->persist($segelbedt);

        $segelbelm = new Modulo();
        $segelbelm->setNombre('seguimientoelaboracion_eliminar');
        $segelbelm->setTitulo('Dar de Baja');
        $segelbelm->setRuta('/seguimientoelaboracion_eliminar');
        $segelbelm->setIcono('home');
        $segelbelm->setMenu(0);
        $segelbelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOELAB_CHILD));
        $manager->persist($segelbelm);



        $docprochm = new Modulo();
        $docprochm->setNombre('home_documentoproceso');
        $docprochm->setTitulo('Consultar');
        $docprochm->setRuta('');
        $docprochm->setIcono('home');
        $docprochm->setMenu(0);
        $docprochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCESO_CHILD));
        $manager->persist($docprochm);

        $docprocins = new Modulo();
        $docprocins->setNombre('documentoproceso_insertar');
        $docprocins->setTitulo('Adicionar');
        $docprocins->setRuta('/documentoproceso_insertar');
        $docprocins->setIcono('home');
        $docprocins->setMenu(0);
        $docprocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCESO_CHILD));
        $manager->persist($docprocins);

        $docprocedt = new Modulo();
        $docprocedt->setNombre('documentoproceso_editar');
        $docprocedt->setTitulo('Actualizar');
        $docprocedt->setRuta('/documentoproceso_editar');
        $docprocedt->setIcono('home');
        $docprocedt->setMenu(0);
        $docprocedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCESO_CHILD));
        $manager->persist($docprocedt);

        $docprocelm = new Modulo();
        $docprocelm->setNombre('documentoproceso_eliminar');
        $docprocelm->setTitulo('Dar de Baja');
        $docprocelm->setRuta('/documentoproceso_eliminar');
        $docprocelm->setIcono('home');
        $docprocelm->setMenu(0);
        $docprocelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCESO_CHILD));
        $manager->persist($docprocelm);

        $docprocaprob = new Modulo();
        $docprocaprob->setNombre('documentoproceso_aprobar');
        $docprocaprob->setTitulo('Aprobar documentos');
        $docprocaprob->setRuta('/documentoproceso_aprobar');
        $docprocaprob->setIcono('home');
        $docprocaprob->setMenu(0);
        $docprocaprob->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCESO_CHILD));
        $manager->persist($docprocaprob);


        $dcprorvhm = new Modulo();
        $dcprorvhm->setNombre('home_docprocesorev');
        $dcprorvhm->setTitulo('Consultar');
        $dcprorvhm->setRuta('');
        $dcprorvhm->setIcono('home');
        $dcprorvhm->setMenu(0);
        $dcprorvhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCREV_CHILD));
        $manager->persist($dcprorvhm);

        $dcprorvins = new Modulo();
        $dcprorvins->setNombre('docprocesorev_insertar');
        $dcprorvins->setTitulo('Adicionar');
        $dcprorvins->setRuta('/docprocesorev_insertar');
        $dcprorvins->setIcono('home');
        $dcprorvins->setMenu(0);
        $dcprorvins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCREV_CHILD));
        $manager->persist($dcprorvins);

        $dcprorvedt = new Modulo();
        $dcprorvedt->setNombre('docprocesorev_editar');
        $dcprorvedt->setTitulo('Actualizar');
        $dcprorvedt->setRuta('/docprocesorev_editar');
        $dcprorvedt->setIcono('home');
        $dcprorvedt->setMenu(0);
        $dcprorvedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCREV_CHILD));
        $manager->persist($dcprorvedt);

        $dcprorvelm = new Modulo();
        $dcprorvelm->setNombre('docprocesorev_eliminar');
        $dcprorvelm->setTitulo('Dar de Baja');
        $dcprorvelm->setRuta('/docprocesorev_eliminar');
        $dcprorvelm->setIcono('home');
        $dcprorvelm->setMenu(0);
        $dcprorvelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCPROCREV_CHILD));
        $manager->persist($dcprorvelm);


        $dctohm = new Modulo();
        $dctohm->setNombre('home_documento');
        $dctohm->setTitulo('Consultar');
        $dctohm->setRuta('');
        $dctohm->setIcono('home');
        $dctohm->setMenu(0);
        $dctohm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTO_CHILD));
        $manager->persist($dctohm);

        $dctoins = new Modulo();
        $dctoins->setNombre('documento_insertar');
        $dctoins->setTitulo('Adicionar');
        $dctoins->setRuta('/documento_insertar');
        $dctoins->setIcono('home');
        $dctoins->setMenu(0);
        $dctoins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTO_CHILD));
        $manager->persist($dctoins);

        $dctoedt = new Modulo();
        $dctoedt->setNombre('documento_editar');
        $dctoedt->setTitulo('Actualizar');
        $dctoedt->setRuta('/documento_editar');
        $dctoedt->setIcono('home');
        $dctoedt->setMenu(0);
        $dctoedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTO_CHILD));
        $manager->persist($dctoedt);

        $dctoelm = new Modulo();
        $dctoelm->setNombre('documento_eliminar');
        $dctoelm->setTitulo('Dar de Baja');
        $dctoelm->setRuta('/documento_eliminar');
        $dctoelm->setIcono('home');
        $dctoelm->setMenu(0);
        $dctoelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTO_CHILD));
        $manager->persist($dctoelm);


        $pubdochm = new Modulo();
        $pubdochm->setNombre('home_publicaciondoc');
        $pubdochm->setTitulo('Consultar');
        $pubdochm->setRuta('');
        $pubdochm->setIcono('home');
        $pubdochm->setMenu(0);
        $pubdochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PUBLICACIONDOC_CHILD));
        $manager->persist($pubdochm);

        $pubdocins = new Modulo();
        $pubdocins->setNombre('publicaciondoc_insertar');
        $pubdocins->setTitulo('Adicionar');
        $pubdocins->setRuta('/publicaciondoc_insertar');
        $pubdocins->setIcono('home');
        $pubdocins->setMenu(0);
        $pubdocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::PUBLICACIONDOC_CHILD));
        $manager->persist($pubdocins);


        $gpmailhm = new Modulo();
        $gpmailhm->setNombre('home_grupocorreo');
        $gpmailhm->setTitulo('Consultar');
        $gpmailhm->setRuta('');
        $gpmailhm->setIcono('home');
        $gpmailhm->setMenu(0);
        $gpmailhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPOCORREO_CHILD));
        $manager->persist($gpmailhm);

        $gpmailins = new Modulo();
        $gpmailins->setNombre('grupocorreo_insertar');
        $gpmailins->setTitulo('Adicionar');
        $gpmailins->setRuta('/grupocorreo_insertar');
        $gpmailins->setIcono('home');
        $gpmailins->setMenu(0);
        $gpmailins->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPOCORREO_CHILD));
        $manager->persist($gpmailins);

        $gpmailedt = new Modulo();
        $gpmailedt->setNombre('grupocorreo_editar');
        $gpmailedt->setTitulo('Actualizar');
        $gpmailedt->setRuta('/grupocorreo_editar');
        $gpmailedt->setIcono('home');
        $gpmailedt->setMenu(0);
        $gpmailedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPOCORREO_CHILD));
        $manager->persist($gpmailedt);

        $gpmailelm = new Modulo();
        $gpmailelm->setNombre('grupocorreo_eliminar');
        $gpmailelm->setTitulo('Dar de Baja');
        $gpmailelm->setRuta('/grupocorreo_eliminar');
        $gpmailelm->setIcono('home');
        $gpmailelm->setMenu(0);
        $gpmailelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPOCORREO_CHILD));
        $manager->persist($gpmailelm);



        $grciahm = new Modulo();
        $grciahm->setNombre('home_gerencia');
        $grciahm->setTitulo('Consultar');
        $grciahm->setRuta('');
        $grciahm->setIcono('home');
        $grciahm->setMenu(0);
        $grciahm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GERENCIA_CHILD));
        $manager->persist($grciahm);

        $grciains = new Modulo();
        $grciains->setNombre('gerencia_insertar');
        $grciains->setTitulo('Adicionar');
        $grciains->setRuta('/gerencia_insertar');
        $grciains->setIcono('home');
        $grciains->setMenu(0);
        $grciains->setFkmodulo($this->getReference(ModuloChildrenFixtures::GERENCIA_CHILD));
        $manager->persist($grciains);

        $grciaedt = new Modulo();
        $grciaedt->setNombre('gerencia_editar');
        $grciaedt->setTitulo('Actualizar');
        $grciaedt->setRuta('/gerencia_editar');
        $grciaedt->setIcono('home');
        $grciaedt->setMenu(0);
        $grciaedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::GERENCIA_CHILD));
        $manager->persist($grciaedt);

        $grciaelm = new Modulo();
        $grciaelm->setNombre('gerencia_eliminar');
        $grciaelm->setTitulo('Dar de Baja');
        $grciaelm->setRuta('/gerencia_eliminar');
        $grciaelm->setIcono('home');
        $grciaelm->setMenu(0);
        $grciaelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GERENCIA_CHILD));
        $manager->persist($grciaelm);


        $areahm = new Modulo();
        $areahm->setNombre('home_area');
        $areahm->setTitulo('Consultar');
        $areahm->setRuta('');
        $areahm->setIcono('home');
        $areahm->setMenu(0);
        $areahm->setFkmodulo($this->getReference(ModuloChildrenFixtures::AREA_CHILD));
        $manager->persist($areahm);

        $areains = new Modulo();
        $areains->setNombre('area_insertar');
        $areains->setTitulo('Adicionar');
        $areains->setRuta('/area_insertar');
        $areains->setIcono('home');
        $areains->setMenu(0);
        $areains->setFkmodulo($this->getReference(ModuloChildrenFixtures::AREA_CHILD));
        $manager->persist($areains);

        $areaedt = new Modulo();
        $areaedt->setNombre('area_editar');
        $areaedt->setTitulo('Actualizar');
        $areaedt->setRuta('/area_editar');
        $areaedt->setIcono('home');
        $areaedt->setMenu(0);
        $areaedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::AREA_CHILD));
        $manager->persist($areaedt);

        $areaelm = new Modulo();
        $areaelm->setNombre('area_eliminar');
        $areaelm->setTitulo('Dar de Baja');
        $areaelm->setRuta('/area_eliminar');
        $areaelm->setIcono('home');
        $areaelm->setMenu(0);
        $areaelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::AREA_CHILD));
        $manager->persist($areaelm);


        $secthm = new Modulo();
        $secthm->setNombre('home_sector');
        $secthm->setTitulo('Consultar');
        $secthm->setRuta('');
        $secthm->setIcono('home');
        $secthm->setMenu(0);
        $secthm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SECTOR_CHILD));
        $manager->persist($secthm);

        $sectins = new Modulo();
        $sectins->setNombre('sector_insertar');
        $sectins->setTitulo('Adicionar');
        $sectins->setRuta('/sector_insertar');
        $sectins->setIcono('home');
        $sectins->setMenu(0);
        $sectins->setFkmodulo($this->getReference(ModuloChildrenFixtures::SECTOR_CHILD));
        $manager->persist($sectins);

        $sectedt = new Modulo();
        $sectedt->setNombre('sector_editar');
        $sectedt->setTitulo('Actualizar');
        $sectedt->setRuta('/sector_editar');
        $sectedt->setIcono('home');
        $sectedt->setMenu(0);
        $sectedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::SECTOR_CHILD));
        $manager->persist($sectedt);

        $sectelm = new Modulo();
        $sectelm->setNombre('sector_eliminar');
        $sectelm->setTitulo('Dar de Baja');
        $sectelm->setRuta('/sector_eliminar');
        $sectelm->setIcono('home');
        $sectelm->setMenu(0);
        $sectelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SECTOR_CHILD));
        $manager->persist($sectelm);


        $fchprochm = new Modulo();
        $fchprochm->setNombre('home_fichaprocesos');
        $fchprochm->setTitulo('Consultar');
        $fchprochm->setRuta('');
        $fchprochm->setIcono('home');
        $fchprochm->setMenu(0);
        $fchprochm->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHAPROC_CHILD));
        $manager->persist($fchprochm);

        $fchprocins = new Modulo();
        $fchprocins->setNombre('fichaprocesos_insertar');
        $fchprocins->setTitulo('Adicionar');
        $fchprocins->setRuta('/fichaprocesos_insertar');
        $fchprocins->setIcono('home');
        $fchprocins->setMenu(0);
        $fchprocins->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHAPROC_CHILD));
        $manager->persist($fchprocins);

        $fchprocedt = new Modulo();
        $fchprocedt->setNombre('fichaprocesos_editar');
        $fchprocedt->setTitulo('Actualizar');
        $fchprocedt->setRuta('/fichaprocesos_editar');
        $fchprocedt->setIcono('home');
        $fchprocedt->setMenu(0);
        $fchprocedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHAPROC_CHILD));
        $manager->persist($fchprocedt);

        $fchprocelm = new Modulo();
        $fchprocelm->setNombre('fichaprocesos_eliminar');
        $fchprocelm->setTitulo('Dar de Baja');
        $fchprocelm->setRuta('/fichaprocesos_eliminar');
        $fchprocelm->setIcono('home');
        $fchprocelm->setMenu(0);
        $fchprocelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHAPROC_CHILD));
        $manager->persist($fchprocelm);


        $riesgooport = new Modulo();
        $riesgooport->setNombre('home_riesgosoportunidades');
        $riesgooport->setTitulo('Consultar');
        $riesgooport->setRuta('');
        $riesgooport->setIcono('home');
        $riesgooport->setMenu(0);
        $riesgooport->setFkmodulo($this->getReference(ModuloChildrenFixtures::RIESGOPORT_CHILD));
        $manager->persist($riesgooport);

        $riesgooportinse = new Modulo();
        $riesgooportinse->setNombre('riesgosoportunidades_insertar');
        $riesgooportinse->setTitulo('Adicionar');
        $riesgooportinse->setRuta('/riesgosoportunidades_insertar');
        $riesgooportinse->setIcono('home');
        $riesgooportinse->setMenu(0);
        $riesgooportinse->setFkmodulo($this->getReference(ModuloChildrenFixtures::RIESGOPORT_CHILD));
        $manager->persist($riesgooportinse);

        $riesgooportedit = new Modulo();
        $riesgooportedit->setNombre('riesgosoportunidades_editar');
        $riesgooportedit->setTitulo('Adicionar');
        $riesgooportedit->setRuta('/riesgosoportunidades_insertar');
        $riesgooportedit->setIcono('home');
        $riesgooportedit->setMenu(0);
        $riesgooportedit->setFkmodulo($this->getReference(ModuloChildrenFixtures::RIESGOPORT_CHILD));
        $manager->persist($riesgooportedit);

        $riesgooportelimi = new Modulo();
        $riesgooportelimi->setNombre('riesgosoportunidades_eliminar');
        $riesgooportelimi->setTitulo('Dar de Baja');
        $riesgooportelimi->setRuta('/riesgosoportunidades_eliminar');
        $riesgooportelimi->setIcono('home');
        $riesgooportelimi->setMenu(0);
        $riesgooportelimi->setFkmodulo($this->getReference(ModuloChildrenFixtures::RIESGOPORT_CHILD));
        $manager->persist($riesgooportelimi);


        $probhm = new Modulo();
        $probhm->setNombre('home_probabilidad');
        $probhm->setTitulo('Consultar');
        $probhm->setRuta('');
        $probhm->setIcono('home');
        $probhm->setMenu(0);
        $probhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROBABILIDAD_CHILD));
        $manager->persist($probhm);

        $probins = new Modulo();
        $probins->setNombre('probabilidad_insertar');
        $probins->setTitulo('Adicionar');
        $probins->setRuta('/probabilidad_insertar');
        $probins->setIcono('home');
        $probins->setMenu(0);
        $probins->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROBABILIDAD_CHILD));
        $manager->persist($probins);

        $probedt = new Modulo();
        $probedt->setNombre('probabilidad_editar');
        $probedt->setTitulo('Actualizar');
        $probedt->setRuta('/probabilidad_editar');
        $probedt->setIcono('home');
        $probedt->setMenu(0);
        $probedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROBABILIDAD_CHILD));
        $manager->persist($probedt);

        $probelm = new Modulo();
        $probelm->setNombre('probabilidad_eliminar');
        $probelm->setTitulo('Dar de Baja');
        $probelm->setRuta('/probabilidad_eliminar');
        $probelm->setIcono('home');
        $probelm->setMenu(0);
        $probelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROBABILIDAD_CHILD));
        $manager->persist($probelm);


        $impcthm = new Modulo();
        $impcthm->setNombre('home_impacto');
        $impcthm->setTitulo('Consultar');
        $impcthm->setRuta('');
        $impcthm->setIcono('home');
        $impcthm->setMenu(0);
        $impcthm->setFkmodulo($this->getReference(ModuloChildrenFixtures::IMPACTO_CHILD));
        $manager->persist($impcthm);

        $impctins = new Modulo();
        $impctins->setNombre('impacto_insertar');
        $impctins->setTitulo('Adicionar');
        $impctins->setRuta('/impacto_insertar');
        $impctins->setIcono('home');
        $impctins->setMenu(0);
        $impctins->setFkmodulo($this->getReference(ModuloChildrenFixtures::IMPACTO_CHILD));
        $manager->persist($impctins);

        $impctedt = new Modulo();
        $impctedt->setNombre('impacto_editar');
        $impctedt->setTitulo('Actualizar');
        $impctedt->setRuta('/impacto_editar');
        $impctedt->setIcono('home');
        $impctedt->setMenu(0);
        $impctedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::IMPACTO_CHILD));
        $manager->persist($impctedt);

        $impctelm = new Modulo();
        $impctelm->setNombre('impacto_eliminar');
        $impctelm->setTitulo('Dar de Baja');
        $impctelm->setRuta('/impacto_eliminar');
        $impctelm->setIcono('home');
        $impctelm->setMenu(0);
        $impctelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::IMPACTO_CHILD));
        $manager->persist($impctelm);


        $procrelhm = new Modulo();
        $procrelhm->setNombre('home_procesorelacionado');
        $procrelhm->setTitulo('Consultar');
        $procrelhm->setRuta('');
        $procrelhm->setIcono('home');
        $procrelhm->setMenu(0);
        $procrelhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROCRELACION_CHILD));
        $manager->persist($procrelhm);

        $procrelins = new Modulo();
        $procrelins->setNombre('procesorelacionado_insertar');
        $procrelins->setTitulo('Adicionar');
        $procrelins->setRuta('/procesorelacionado_insertar');
        $procrelins->setIcono('home');
        $procrelins->setMenu(0);
        $procrelins->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROCRELACION_CHILD));
        $manager->persist($procrelins);

        $procreledt = new Modulo();
        $procreledt->setNombre('procesorelacionado_editar');
        $procreledt->setTitulo('Actualizar');
        $procreledt->setRuta('/procesorelacionado_editar');
        $procreledt->setIcono('home');
        $procreledt->setMenu(0);
        $procreledt->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROCRELACION_CHILD));
        $manager->persist($procreledt);

        $procrelelm = new Modulo();
        $procrelelm->setNombre('procesorelacionado_eliminar');
        $procrelelm->setTitulo('Dar de Baja');
        $procrelelm->setRuta('/procesorelacionado_eliminar');
        $procrelelm->setIcono('home');
        $procrelelm->setMenu(0);
        $procrelelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PROCRELACION_CHILD));
        $manager->persist($procrelelm);


        $tpcrohm = new Modulo();
        $tpcrohm->setNombre('home_tipocro');
        $tpcrohm->setTitulo('Consultar');
        $tpcrohm->setRuta('');
        $tpcrohm->setIcono('home');
        $tpcrohm->setMenu(0);
        $tpcrohm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORIESGOPT_CHILD));
        $manager->persist($tpcrohm);

        $tpcroins = new Modulo();
        $tpcroins->setNombre('tipocro_insertar');
        $tpcroins->setTitulo('Adicionar');
        $tpcroins->setRuta('/tipocro_insertar');
        $tpcroins->setIcono('home');
        $tpcroins->setMenu(0);
        $tpcroins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORIESGOPT_CHILD));
        $manager->persist($tpcroins);

        $tpcroedt = new Modulo();
        $tpcroedt->setNombre('tipocro_editar');
        $tpcroedt->setTitulo('Actualizar');
        $tpcroedt->setRuta('/tipocro_editar');
        $tpcroedt->setIcono('home');
        $tpcroedt->setMenu(0);
        $tpcroedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORIESGOPT_CHILD));
        $manager->persist($tpcroedt);

        $tpcroelm = new Modulo();
        $tpcroelm->setNombre('tipocro_eliminar');
        $tpcroelm->setTitulo('Dar de Baja');
        $tpcroelm->setRuta('/tipocro_eliminar');
        $tpcroelm->setIcono('home');
        $tpcroelm->setMenu(0);
        $tpcroelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORIESGOPT_CHILD));
        $manager->persist($tpcroelm);


        $croseghm = new Modulo();
        $croseghm->setNombre('home_seguimientocro');
        $croseghm->setTitulo('Consultar');
        $croseghm->setRuta('');
        $croseghm->setIcono('home');
        $croseghm->setMenu(0);
        $croseghm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTORSOP_CHILD));
        $manager->persist($croseghm);

        $crosegins = new Modulo();
        $crosegins->setNombre('seguimientocro_insertar');
        $crosegins->setTitulo('Adicionar');
        $crosegins->setRuta('/seguimientocro_insertar');
        $crosegins->setIcono('home');
        $crosegins->setMenu(0);
        $crosegins->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTORSOP_CHILD));
        $manager->persist($crosegins);

        $crosegedt = new Modulo();
        $crosegedt->setNombre('seguimientocro_editar');
        $crosegedt->setTitulo('Actualizar');
        $crosegedt->setRuta('/seguimientocro_editar');
        $crosegedt->setIcono('home');
        $crosegedt->setMenu(0);
        $crosegedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTORSOP_CHILD));
        $manager->persist($crosegedt);

        $crosegelm = new Modulo();
        $crosegelm->setNombre('seguimientocro_eliminar');
        $crosegelm->setTitulo('Dar de Baja');
        $crosegelm->setRuta('/seguimientocro_eliminar');
        $crosegelm->setIcono('home');
        $crosegelm->setMenu(0);
        $crosegelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTORSOP_CHILD));
        $manager->persist($crosegelm);


        $gciarsthm = new Modulo();
        $gciarsthm->setNombre('home_gciarsector');
        $gciarsthm->setTitulo('Consultar');
        $gciarsthm->setRuta('');
        $gciarsthm->setIcono('home');
        $gciarsthm->setMenu(0);
        $gciarsthm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GCIARSECTOR_CHILD));
        $manager->persist($gciarsthm);

        $gciarstins = new Modulo();
        $gciarstins->setNombre('gciarsector_insertar');
        $gciarstins->setTitulo('Adicionar');
        $gciarstins->setRuta('/gciarsector_insertar');
        $gciarstins->setIcono('home');
        $gciarstins->setMenu(0);
        $gciarstins->setFkmodulo($this->getReference(ModuloChildrenFixtures::GCIARSECTOR_CHILD));
        $manager->persist($gciarstins);

        $gciarstedt = new Modulo();
        $gciarstedt->setNombre('gciarsector_editar');
        $gciarstedt->setTitulo('Actualizar');
        $gciarstedt->setRuta('/gciarsector_editar');
        $gciarstedt->setIcono('home');
        $gciarstedt->setMenu(0);
        $gciarstedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::GCIARSECTOR_CHILD));
        $manager->persist($gciarstedt);

        $gciarstelm = new Modulo();
        $gciarstelm->setNombre('gciarsector_eliminar');
        $gciarstelm->setTitulo('Dar de Baja');
        $gciarstelm->setRuta('/gciarsector_eliminar');
        $gciarstelm->setIcono('home');
        $gciarstelm->setMenu(0);
        $gciarstelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GCIARSECTOR_CHILD));
        $manager->persist($gciarstelm);


        $recnechm = new Modulo();
        $recnechm->setNombre('home_recursonecesario');
        $recnechm->setTitulo('Consultar');
        $recnechm->setRuta('');
        $recnechm->setIcono('home');
        $recnechm->setMenu(0);
        $recnechm->setFkmodulo($this->getReference(ModuloChildrenFixtures::RECURSONEC_CHILD));
        $manager->persist($recnechm);

        $recnecins = new Modulo();
        $recnecins->setNombre('recursonecesario_insertar');
        $recnecins->setTitulo('Adicionar');
        $recnecins->setRuta('/recursonecesario_insertar');
        $recnecins->setIcono('home');
        $recnecins->setMenu(0);
        $recnecins->setFkmodulo($this->getReference(ModuloChildrenFixtures::RECURSONEC_CHILD));
        $manager->persist($recnecins);

        $recnecedt = new Modulo();
        $recnecedt->setNombre('recursonecesario_editar');
        $recnecedt->setTitulo('Actualizar');
        $recnecedt->setRuta('/recursonecesario_editar');
        $recnecedt->setIcono('home');
        $recnecedt->setMenu(0);
        $recnecedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::RECURSONEC_CHILD));
        $manager->persist($recnecedt);

        $recnecelm = new Modulo();
        $recnecelm->setNombre('recursonecesario_eliminar');
        $recnecelm->setTitulo('Dar de Baja');
        $recnecelm->setRuta('/recursonecesario_eliminar');
        $recnecelm->setIcono('home');
        $recnecelm->setMenu(0);
        $recnecelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::RECURSONEC_CHILD));
        $manager->persist($recnecelm);


        $controlcorr = new Modulo();
        $controlcorr->setNombre('home_controlcorrelativo');
        $controlcorr->setTitulo('Consultar');
        $controlcorr->setRuta('');
        $controlcorr->setIcono('home');
        $controlcorr->setMenu(0);
        $controlcorr->setFkmodulo($this->getReference(ModuloChildrenFixtures::CONTROLCRTLVO_CHILD));
        $manager->persist($controlcorr);

        $controlcorrins = new Modulo();
        $controlcorrins->setNombre('controlcorrelativo_insertar');
        $controlcorrins->setTitulo('Adicionar');
        $controlcorrins->setRuta('/controlcorrelativo_insertar');
        $controlcorrins->setIcono('home');
        $controlcorrins->setMenu(0);
        $controlcorrins->setFkmodulo($this->getReference(ModuloChildrenFixtures::CONTROLCRTLVO_CHILD));
        $manager->persist($controlcorrins);

        $controlcorredit = new Modulo();
        $controlcorredit->setNombre('controlcorrelativo_editar');
        $controlcorredit->setTitulo('Actualizar');
        $controlcorredit->setRuta('/controlcorrelativo_editar');
        $controlcorredit->setIcono('home');
        $controlcorredit->setMenu(0);
        $controlcorredit->setFkmodulo($this->getReference(ModuloChildrenFixtures::CONTROLCRTLVO_CHILD));
        $manager->persist($controlcorredit);

        $controlcorrdel = new Modulo();
        $controlcorrdel->setNombre('controlcorrelativo_eliminar');
        $controlcorrdel->setTitulo('Dar de Baja');
        $controlcorrdel->setRuta('/controlcorrelativo_eliminar');
        $controlcorrdel->setIcono('home');
        $controlcorrdel->setMenu(0);
        $controlcorrdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::CONTROLCRTLVO_CHILD));
        $manager->persist($controlcorrdel);


        $grprsghm = new Modulo();
        $grprsghm->setNombre('home_gruporiesgo');
        $grprsghm->setTitulo('Consultar');
        $grprsghm->setRuta('');
        $grprsghm->setIcono('home');
        $grprsghm->setMenu(0);
        $grprsghm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPORIESGO_CHILD));
        $manager->persist($grprsghm);

        $grprsgins = new Modulo();
        $grprsgins->setNombre('gruporiesgo_insertar');
        $grprsgins->setTitulo('Adicionar');
        $grprsgins->setRuta('/gruporiesgo_insertar');
        $grprsgins->setIcono('home');
        $grprsgins->setMenu(0);
        $grprsgins->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPORIESGO_CHILD));
        $manager->persist($grprsgins);

        $grprsgedt = new Modulo();
        $grprsgedt->setNombre('gruporiesgo_editar');
        $grprsgedt->setTitulo('Actualizar');
        $grprsgedt->setRuta('/gruporiesgo_editar');
        $grprsgedt->setIcono('home');
        $grprsgedt->setMenu(0);
        $grprsgedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPORIESGO_CHILD));
        $manager->persist($grprsgedt);

        $grprsgelm = new Modulo();
        $grprsgelm->setNombre('gruporiesgo_eliminar');
        $grprsgelm->setTitulo('Dar de Baja');
        $grprsgelm->setRuta('/gruporiesgo_eliminar');
        $grprsgelm->setIcono('home');
        $grprsgelm->setMenu(0);
        $grprsgelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::GRUPORIESGO_CHILD));
        $manager->persist($grprsgelm);


        $estrsghm = new Modulo();
        $estrsghm->setNombre('home_estadoriesgo');
        $estrsghm->setTitulo('Consultar');
        $estrsghm->setRuta('');
        $estrsghm->setIcono('home');
        $estrsghm->setMenu(0);
        $estrsghm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADORIESGO_CHILD));
        $manager->persist($estrsghm);

        $estrsgins = new Modulo();
        $estrsgins->setNombre('estadoriesgo_insertar');
        $estrsgins->setTitulo('Adicionar');
        $estrsgins->setRuta('/estadoriesgo_insertar');
        $estrsgins->setIcono('home');
        $estrsgins->setMenu(0);
        $estrsgins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADORIESGO_CHILD));
        $manager->persist($estrsgins);

        $estrsgedt = new Modulo();
        $estrsgedt->setNombre('estadoriesgo_editar');
        $estrsgedt->setTitulo('Actualizar');
        $estrsgedt->setRuta('/estadoriesgo_editar');
        $estrsgedt->setIcono('home');
        $estrsgedt->setMenu(0);
        $estrsgedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADORIESGO_CHILD));
        $manager->persist($estrsgedt);

        $estrsgelm = new Modulo();
        $estrsgelm->setNombre('estadoriesgo_eliminar');
        $estrsgelm->setTitulo('Dar de Baja');
        $estrsgelm->setRuta('/estadoriesgo_eliminar');
        $estrsgelm->setIcono('home');
        $estrsgelm->setMenu(0);
        $estrsgelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADORIESGO_CHILD));
        $manager->persist($estrsgelm);


        $tpnotahm = new Modulo();
        $tpnotahm->setNombre('home_tiponota');
        $tpnotahm->setTitulo('Consultar');
        $tpnotahm->setRuta('');
        $tpnotahm->setIcono('home');
        $tpnotahm->setMenu(0);
        $tpnotahm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOTA_CHILD));
        $manager->persist($tpnotahm);

        $tpnotains = new Modulo();
        $tpnotains->setNombre('tiponota_insertar');
        $tpnotains->setTitulo('Adicionar');
        $tpnotains->setRuta('/tiponota_insertar');
        $tpnotains->setIcono('home');
        $tpnotains->setMenu(0);
        $tpnotains->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOTA_CHILD));
        $manager->persist($tpnotains);

        $tpnotaedt = new Modulo();
        $tpnotaedt->setNombre('tiponota_editar');
        $tpnotaedt->setTitulo('Actualizar');
        $tpnotaedt->setRuta('/tiponota_editar');
        $tpnotaedt->setIcono('home');
        $tpnotaedt->setMenu(0);
        $tpnotaedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOTA_CHILD));
        $manager->persist($tpnotaedt);

        $tpnotaelm = new Modulo();
        $tpnotaelm->setNombre('tiponota_eliminar');
        $tpnotaelm->setTitulo('Dar de Baja');
        $tpnotaelm->setRuta('/tiponota_eliminar');
        $tpnotaelm->setIcono('home');
        $tpnotaelm->setMenu(0);
        $tpnotaelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOTA_CHILD));
        $manager->persist($tpnotaelm);

        $rechm = new Modulo();
        $rechm->setNombre('home_recurso');
        $rechm->setTitulo('Consultar');
        $rechm->setRuta('');
        $rechm->setIcono('home');
        $rechm->setMenu(0);
        $rechm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORECURSO_CHILD));
        $manager->persist($rechm);

        $recins = new Modulo();
        $recins->setNombre('recurso_insertar');
        $recins->setTitulo('Adicionar');
        $recins->setRuta('/recurso_insertar');
        $recins->setIcono('home');
        $recins->setMenu(0);
        $recins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORECURSO_CHILD));
        $manager->persist($recins);

        $recedt = new Modulo();
        $recedt->setNombre('recurso_editar');
        $recedt->setTitulo('Actualizar');
        $recedt->setRuta('/recurso_editar');
        $recedt->setIcono('home');
        $recedt->setMenu(0);
        $recedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORECURSO_CHILD));
        $manager->persist($recedt);

        $recelm = new Modulo();
        $recelm->setNombre('recurso_eliminar');
        $recelm->setTitulo('Dar de Baja');
        $recelm->setRuta('/recurso_eliminar');
        $recelm->setIcono('home');
        $recelm->setMenu(0);
        $recelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPORECURSO_CHILD));
        $manager->persist($recelm);

        $ctvohm = new Modulo();
        $ctvohm->setNombre('home_correlativo');
        $ctvohm->setTitulo('Consultar');
        $ctvohm->setRuta('');
        $ctvohm->setIcono('home');
        $ctvohm->setMenu(0);
        $ctvohm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CORRELATIVO_CHILD));
        $manager->persist($ctvohm);

        $ctvoins = new Modulo();
        $ctvoins->setNombre('correlativo_insertar');
        $ctvoins->setTitulo('Adicionar');
        $ctvoins->setRuta('/correlativo_insertar');
        $ctvoins->setIcono('home');
        $ctvoins->setMenu(0);
        $ctvoins->setFkmodulo($this->getReference(ModuloChildrenFixtures::CORRELATIVO_CHILD));
        $manager->persist($ctvoins);

        $ctvoedt = new Modulo();
        $ctvoedt->setNombre('correlativo_editar');
        $ctvoedt->setTitulo('Actualizar');
        $ctvoedt->setRuta('/correlativo_editar');
        $ctvoedt->setIcono('home');
        $ctvoedt->setMenu(0);
        $ctvoedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::CORRELATIVO_CHILD));
        $manager->persist($ctvoedt);

        $ctvoelm = new Modulo();
        $ctvoelm->setNombre('correlativo_eliminar');
        $ctvoelm->setTitulo('Dar de Baja');
        $ctvoelm->setRuta('/correlativo_eliminar');
        $ctvoelm->setIcono('home');
        $ctvoelm->setMenu(0);
        $ctvoelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CORRELATIVO_CHILD));
        $manager->persist($ctvoelm);


        $undhm = new Modulo();
        $undhm->setNombre('home_unidad');
        $undhm->setTitulo('Consultar');
        $undhm->setRuta('');
        $undhm->setIcono('home');
        $undhm->setMenu(0);
        $undhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDAD_CHILD));
        $manager->persist($undhm);

        $undins = new Modulo();
        $undins->setNombre('unidad_insertar');
        $undins->setTitulo('Adicionar');
        $undins->setRuta('/unidad_insertar');
        $undins->setIcono('home');
        $undins->setMenu(0);
        $undins->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDAD_CHILD));
        $manager->persist($undins);

        $undedt = new Modulo();
        $undedt->setNombre('unidad_editar');
        $undedt->setTitulo('Actualizar');
        $undedt->setRuta('/unidad_editar');
        $undedt->setIcono('home');
        $undedt->setMenu(0);
        $undedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDAD_CHILD));
        $manager->persist($undedt);

        $undelm = new Modulo();
        $undelm->setNombre('unidad_eliminar');
        $undelm->setTitulo('Dar de Baja');
        $undelm->setRuta('/unidad_eliminar');
        $undelm->setIcono('home');
        $undelm->setMenu(0);
        $undelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDAD_CHILD));
        $manager->persist($undelm);


        $permshm = new Modulo();
        $permshm->setNombre('home_permiso');
        $permshm->setTitulo('Consultar');
        $permshm->setRuta('');
        $permshm->setIcono('home');
        $permshm->setMenu(0);
        $permshm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERMISO_CHILD));
        $manager->persist($permshm);

        $permsins = new Modulo();
        $permsins->setNombre('permiso_insertar');
        $permsins->setTitulo('Adicionar');
        $permsins->setRuta('/permiso_insertar');
        $permsins->setIcono('home');
        $permsins->setMenu(0);
        $permsins->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERMISO_CHILD));
        $manager->persist($permsins);

        $permsedt = new Modulo();
        $permsedt->setNombre('permiso_editar');
        $permsedt->setTitulo('Actualizar');
        $permsedt->setRuta('/permiso_editar');
        $permsedt->setIcono('home');
        $permsedt->setMenu(0);
        $permsedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERMISO_CHILD));
        $manager->persist($permsedt);

        $permselm = new Modulo();
        $permselm->setNombre('permiso_eliminar');
        $permselm->setTitulo('Dar de Baja');
        $permselm->setRuta('/permiso_eliminar');
        $permselm->setIcono('home');
        $permselm->setMenu(0);
        $permselm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERMISO_CHILD));
        $manager->persist($permselm);



        $indicadorproceso = new Modulo();
        $indicadorproceso->setNombre('home_indicadorproceso');
        $indicadorproceso->setTitulo('Consultar');
        $indicadorproceso->setRuta( '');
        $indicadorproceso->setIcono('home');
        $indicadorproceso->setMenu(0);
        $indicadorproceso->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORPROC_CHILD));
        $manager->persist($indicadorproceso);

        $indicadorprocesoins = new Modulo();
        $indicadorprocesoins->setNombre('indicadorproceso_insertar');
        $indicadorprocesoins->setTitulo('Adicionar');
        $indicadorprocesoins->setRuta( '/indicadorproceso_insertar');
        $indicadorprocesoins->setIcono('home');
        $indicadorprocesoins->setMenu(0);
        $indicadorprocesoins->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORPROC_CHILD));
        $manager->persist($indicadorprocesoins);

        $indicadorprocesoupd = new Modulo();
        $indicadorprocesoupd->setNombre('indicadorproceso_editar');
        $indicadorprocesoupd->setTitulo('Actualizar');
        $indicadorprocesoupd->setRuta( '/indicadorproceso_editar');
        $indicadorprocesoupd->setIcono('home');
        $indicadorprocesoupd->setMenu(0);
        $indicadorprocesoupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORPROC_CHILD));
        $manager->persist($indicadorprocesoupd);

        $indicadorprocesodel = new Modulo();
        $indicadorprocesodel->setNombre('indicadorproceso_eliminar');
        $indicadorprocesodel->setTitulo('Dar de Baja');
        $indicadorprocesodel->setRuta('/indicadorproceso_eliminar');
        $indicadorprocesodel->setIcono('home');
        $indicadorprocesodel->setMenu(0);
        $indicadorprocesodel->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORPROC_CHILD));
        $manager->persist($indicadorprocesodel);


        $segindicador = new Modulo();
        $segindicador->setNombre('home_seguimientoindicador');
        $segindicador->setTitulo('Consultar');
        $segindicador->setRuta( '');
        $segindicador->setIcono('home');
        $segindicador->setMenu(0);
        $segindicador->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORSEG_CHILD));
        $manager->persist($segindicador);

        $segindicadorins = new Modulo();
        $segindicadorins->setNombre('seguimientoindicador_insertar');
        $segindicadorins->setTitulo('Adicionar');
        $segindicadorins->setRuta( '/seguimientoindicador_insertar');
        $segindicadorins->setIcono('home');
        $segindicadorins->setMenu(0);
        $segindicadorins->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORSEG_CHILD));
        $manager->persist($segindicadorins);

        $segindicadorupd = new Modulo();
        $segindicadorupd->setNombre('seguimientoindicador_editar');
        $segindicadorupd->setTitulo('Actualizar');
        $segindicadorupd->setRuta( '/seguimientoindicador_editar');
        $segindicadorupd->setIcono('home');
        $segindicadorupd->setMenu(0);
        $segindicadorupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORSEG_CHILD));
        $manager->persist($segindicadorupd);

        $segindicadordel = new Modulo();
        $segindicadordel->setNombre('seguimientoindicador_eliminar');
        $segindicadordel->setTitulo('Dar de Baja');
        $segindicadordel->setRuta('/seguimientoindicador_eliminar');
        $segindicadordel->setIcono( 'home');
        $segindicadordel->setMenu(0);
        $segindicadordel->setFkmodulo($this->getReference(ModuloChildrenFixtures::INDICADORSEG_CHILD));
        $manager->persist($segindicadordel);
        

        $unidadmedida = new Modulo();
        $unidadmedida->setNombre('home_unidadmedida');
        $unidadmedida->setTitulo('Consultar');
        $unidadmedida->setRuta('');
        $unidadmedida->setIcono('home');
        $unidadmedida->setMenu(0);
        $unidadmedida->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDADMEDIDA_CHILD));
        $manager->persist($unidadmedida);

        $unidadmedidains = new Modulo();
        $unidadmedidains->setNombre('unidadmedida_insertar');
        $unidadmedidains->setTitulo('Adicionar');
        $unidadmedidains->setRuta( '/unidadmedida_insertar');
        $unidadmedidains->setIcono('home');
        $unidadmedidains->setMenu(0);
        $unidadmedidains->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDADMEDIDA_CHILD));
        $manager->persist($unidadmedidains);

        $unidadmedidadupd = new Modulo();
        $unidadmedidadupd->setNombre('unidadmedida_editar');
        $unidadmedidadupd->setTitulo('Actualizar');
        $unidadmedidadupd->setRuta( '/unidadmedida_editar');
        $unidadmedidadupd->setIcono('home');
        $unidadmedidadupd->setMenu(0);
        $unidadmedidadupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDADMEDIDA_CHILD));
        $manager->persist($unidadmedidadupd);

        $unidadmedidadel = new Modulo();
        $unidadmedidadel->setNombre('unidadmedida_eliminar');
        $unidadmedidadel->setTitulo('Dar de Baja');
        $unidadmedidadel->setRuta('/unidadmedida_eliminar');
        $unidadmedidadel->setIcono('home');
        $unidadmedidadel->setMenu(0);
        $unidadmedidadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::UNIDADMEDIDA_CHILD));
        $manager->persist($unidadmedidadel);


        $tipocob = new Modulo();
        $tipocob->setNombre('home_tipocobertura');
        $tipocob->setTitulo('Consultar');
        $tipocob->setRuta( '');
        $tipocob->setIcono('home');
        $tipocob->setMenu(0);
        $tipocob->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCOBERTURA_CHILD));
        $manager->persist($tipocob);

        $tipocobins = new Modulo();
        $tipocobins->setNombre('tipocobertura_insertar');
        $tipocobins->setTitulo('Adicionar');
        $tipocobins->setRuta( '/tipocobertura_insertar');
        $tipocobins->setIcono('home');
        $tipocobins->setMenu(0);
        $tipocobins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCOBERTURA_CHILD));
        $manager->persist($tipocobins);

        $tipocobupd = new Modulo();
        $tipocobupd->setNombre('tipocobertura_editar');
        $tipocobupd->setTitulo('Actualizar');
        $tipocobupd->setRuta( '/tipocobertura_editar');
        $tipocobupd->setIcono('home');
        $tipocobupd->setMenu(0);
        $tipocobupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCOBERTURA_CHILD));
        $manager->persist($tipocobupd);

        $tipocobdel = new Modulo();
        $tipocobdel->setNombre('tipocobertura_eliminar');
        $tipocobdel->setTitulo('Dar de Baja');
        $tipocobdel->setRuta('/tipocobertura_eliminar');
        $tipocobdel->setIcono( 'home');
        $tipocobdel->setMenu(0);
        $tipocobdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCOBERTURA_CHILD));
        $manager->persist($tipocobdel);


        $cobertura = new Modulo();
        $cobertura->setNombre('home_cobertura');
        $cobertura->setTitulo('Consultar');
        $cobertura->setRuta( '');
        $cobertura->setIcono('home');
        $cobertura->setMenu(0);
        $cobertura->setFkmodulo($this->getReference(ModuloChildrenFixtures::COBERTURA_CHILD));
        $manager->persist($cobertura);

        $coberturains = new Modulo();
        $coberturains->setNombre('cobertura_insertar');
        $coberturains->setTitulo('Adicionar');
        $coberturains->setRuta( '/cobertura_insertar');
        $coberturains->setIcono('home');
        $coberturains->setMenu(0);
        $coberturains->setFkmodulo($this->getReference(ModuloChildrenFixtures::COBERTURA_CHILD));
        $manager->persist($coberturains);

        $coberturaupd = new Modulo();
        $coberturaupd->setNombre('cobertura_editar');
        $coberturaupd->setTitulo('Actualizar');
        $coberturaupd->setRuta( '/cobertura_editar');
        $coberturaupd->setIcono('home');
        $coberturaupd->setMenu(0);
        $coberturaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::COBERTURA_CHILD));
        $manager->persist($coberturaupd);

        $coberturadel = new Modulo();
        $coberturadel->setNombre('cobertura_eliminar');
        $coberturadel->setTitulo('Dar de Baja');
        $coberturadel->setRuta('/cobertura_eliminar');
        $coberturadel->setIcono( 'home');
        $coberturadel->setMenu(0);
        $coberturadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::COBERTURA_CHILD));
        $manager->persist($coberturadel);



        $planeacion = new Modulo();
        $planeacion->setNombre('home_planaccion');
        $planeacion->setTitulo('Consultar');
        $planeacion->setRuta('');
        $planeacion->setIcono('home');
        $planeacion->setMenu(0);
        $planeacion->setFkmodulo($this->getReference(ModuloChildrenFixtures::PLANACCION_CHILD));
        $manager->persist($planeacion);

        $planeacionins = new Modulo();
        $planeacionins->setNombre('planaccion_insertar');
        $planeacionins->setTitulo('Adicionar');
        $planeacionins->setRuta('/planaccion_insertar');
        $planeacionins->setIcono('home');
        $planeacionins->setMenu(0);
        $planeacionins->setFkmodulo($this->getReference(ModuloChildrenFixtures::PLANACCION_CHILD));
        $manager->persist($planeacionins);

        $planeacionupd = new Modulo();
        $planeacionupd->setNombre('planaccion_editar');
        $planeacionupd->setTitulo('Actualizar');
        $planeacionupd->setRuta('/planaccion_editar');
        $planeacionupd->setIcono('home');
        $planeacionupd->setMenu(0);
        $planeacionupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::PLANACCION_CHILD));
        $manager->persist($planeacionupd);

        $planeaciondel = new Modulo();
        $planeaciondel->setNombre('planaccion_eliminar');
        $planeaciondel->setTitulo('Dar de Baja');
        $planeaciondel->setRuta('/planaccion_eliminar');
        $planeaciondel->setIcono('home');
        $planeaciondel->setMenu(0);
        $planeaciondel->setFkmodulo($this->getReference(ModuloChildrenFixtures::PLANACCION_CHILD));
        $manager->persist($planeaciondel);


        $estadoplan = new Modulo();
        $estadoplan->setNombre('home_estadoplan');
        $estadoplan->setTitulo('Consultar');
        $estadoplan->setRuta('');
        $estadoplan->setIcono('home');
        $estadoplan->setMenu(0);
        $estadoplan->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPLAN_CHILD));
        $manager->persist($estadoplan);

        $estadoplanins = new Modulo();
        $estadoplanins->setNombre('estadoplan_insertar');
        $estadoplanins->setTitulo('Adicionar');
        $estadoplanins->setRuta('/estadoplan_insertar');
        $estadoplanins->setIcono('home');
        $estadoplanins->setMenu(0);
        $estadoplanins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPLAN_CHILD));
        $manager->persist($estadoplanins);

        $estadoplanupd = new Modulo();
        $estadoplanupd->setNombre('estadoplan_editar');
        $estadoplanupd->setTitulo('Actualizar');
        $estadoplanupd->setRuta('/estadoplan_editar');
        $estadoplanupd->setIcono('home');
        $estadoplanupd->setMenu(0);
        $estadoplanupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPLAN_CHILD));
        $manager->persist($estadoplanupd);

        $estadoplandel = new Modulo();
        $estadoplandel->setNombre('estadoplan_eliminar');
        $estadoplandel->setTitulo('Dar de Baja');
        $estadoplandel->setRuta('/estadoplan_eliminar');
        $estadoplandel->setIcono('home');
        $estadoplandel->setMenu(0);
        $estadoplandel->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPLAN_CHILD));
        $manager->persist($estadoplandel);


        $tpauditoria = new Modulo();
        $tpauditoria->setNombre('home_tipoauditoria');
        $tpauditoria->setTitulo('Consultar');
        $tpauditoria->setRuta('');
        $tpauditoria->setIcono('home');
        $tpauditoria->setMenu(0);
        $tpauditoria->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITORIA_CHILD));
        $manager->persist($tpauditoria);

        $tpauditoriains = new Modulo();
        $tpauditoriains->setNombre('tipoauditoria_insertar');
        $tpauditoriains->setTitulo('Adicionar');
        $tpauditoriains->setRuta('/tipoauditoria_insertar');
        $tpauditoriains->setIcono('home');
        $tpauditoriains->setMenu(0);
        $tpauditoriains->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITORIA_CHILD));
        $manager->persist($tpauditoriains);

        $tpauditoriaupd = new Modulo();
        $tpauditoriaupd->setNombre('tipoauditoria_editar');
        $tpauditoriaupd->setTitulo('Actualizar');
        $tpauditoriaupd->setRuta('/tipoauditoria_editar');
        $tpauditoriaupd->setIcono('home');
        $tpauditoriaupd->setMenu(0);
        $tpauditoriaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITORIA_CHILD));
        $manager->persist($tpauditoriaupd);

        $tpauditoriadel = new Modulo();
        $tpauditoriadel->setNombre('tipoauditoria_eliminar');
        $tpauditoriadel->setTitulo('Dar de Baja');
        $tpauditoriadel->setRuta('/tipoauditoria_eliminar');
        $tpauditoriadel->setIcono('home');
        $tpauditoriadel->setMenu(0);
        $tpauditoriadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITORIA_CHILD));
        $manager->persist($tpauditoriadel);


        $auditoria = new Modulo();
        $auditoria->setNombre('home_auditoria');
        $auditoria->setTitulo('Consultar');
        $auditoria->setRuta('');
        $auditoria->setIcono('home');
        $auditoria->setMenu(0);
        $auditoria->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIA_CHILD));
        $manager->persist($auditoria);

        $auditoriains = new Modulo();
        $auditoriains->setNombre('auditoria_insertar');
        $auditoriains->setTitulo('Adicionar');
        $auditoriains->setRuta('/auditoria_insertar');
        $auditoriains->setIcono('home');
        $auditoriains->setMenu(0);
        $auditoriains->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIA_CHILD));
        $manager->persist($auditoriains);

        $auditoriaupd = new Modulo();
        $auditoriaupd->setNombre('auditoria_editar');
        $auditoriaupd->setTitulo('Actualizar');
        $auditoriaupd->setRuta('/auditoria_editar');
        $auditoriaupd->setIcono('home');
        $auditoriaupd->setMenu(0);
        $auditoriaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIA_CHILD));
        $manager->persist($auditoriaupd);

        $auditoriadel = new Modulo();
        $auditoriadel->setNombre('auditoria_eliminar');
        $auditoriadel->setTitulo('Dar de Baja');
        $auditoriadel->setRuta('/auditoria_eliminar');
        $auditoriadel->setIcono('home');
        $auditoriadel->setMenu(0);
        $auditoriadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIA_CHILD));
        $manager->persist($auditoriadel);


        $eqauditoria = new Modulo();
        $eqauditoria->setNombre('home_auditoriaequipo');
        $eqauditoria->setTitulo('Consultar');
        $eqauditoria->setRuta('');
        $eqauditoria->setIcono('home');
        $eqauditoria->setMenu(0);
        $eqauditoria->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIAEQUIPO_CHILD));
        $manager->persist($eqauditoria);

        $eqauditoriains = new Modulo();
        $eqauditoriains->setNombre('auditoriaequipo_insertar');
        $eqauditoriains->setTitulo('Adicionar');
        $eqauditoriains->setRuta('/auditoriaequipo_insertar');
        $eqauditoriains->setIcono('home');
        $eqauditoriains->setMenu(0);
        $eqauditoriains->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIAEQUIPO_CHILD));
        $manager->persist($eqauditoriains);

        $eqauditoriaupd = new Modulo();
        $eqauditoriaupd->setNombre('auditoriaequipo_editar');
        $eqauditoriaupd->setTitulo('Actualizar');
        $eqauditoriaupd->setRuta('/auditoriaequipo_editar');
        $eqauditoriaupd->setIcono('home');
        $eqauditoriaupd->setMenu(0);
        $eqauditoriaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIAEQUIPO_CHILD));
        $manager->persist($eqauditoriaupd);

        $eqauditoriadel = new Modulo();
        $eqauditoriadel->setNombre('auditoriaequipo_eliminar');
        $eqauditoriadel->setTitulo('Dar de Baja');
        $eqauditoriadel->setRuta('/auditoriaequipo_eliminar');
        $eqauditoriadel->setIcono('home');
        $eqauditoriadel->setMenu(0);
        $eqauditoriadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITORIAEQUIPO_CHILD));
        $manager->persist($eqauditoriadel);


        $tpauditor = new Modulo();
        $tpauditor->setNombre('home_tipoauditor');
        $tpauditor->setTitulo('Consultar');
        $tpauditor->setRuta('');
        $tpauditor->setIcono('home');
        $tpauditor->setMenu(0);
        $tpauditor->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITOR_CHILD));
        $manager->persist($tpauditor);

        $tpauditorins = new Modulo();
        $tpauditorins->setNombre('tipoauditor_insertar');
        $tpauditorins->setTitulo('Adicionar');
        $tpauditorins->setRuta('/tipoauditor_insertar');
        $tpauditorins->setIcono('home');
        $tpauditorins->setMenu(0);
        $tpauditorins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITOR_CHILD));
        $manager->persist($tpauditorins);

        $tpauditorupd = new Modulo();
        $tpauditorupd->setNombre('tipoauditor_editar');
        $tpauditorupd->setTitulo('Actualizar');
        $tpauditorupd->setRuta('/tipoauditor_editar');
        $tpauditorupd->setIcono('home');
        $tpauditorupd->setMenu(0);
        $tpauditorupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITOR_CHILD));
        $manager->persist($tpauditorupd);

        $tpauditordel = new Modulo();
        $tpauditordel->setNombre('tipoauditor_eliminar');
        $tpauditordel->setTitulo('Dar de Baja');
        $tpauditordel->setRuta('/tipoauditor_eliminar');
        $tpauditordel->setIcono('home');
        $tpauditordel->setMenu(0);
        $tpauditordel->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOAUDITOR_CHILD));
        $manager->persist($tpauditordel);


        $auditor = new Modulo();
        $auditor->setNombre('home_auditor');
        $auditor->setTitulo('Consultar');
        $auditor->setRuta('');
        $auditor->setIcono('home');
        $auditor->setMenu(0);
        $auditor->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITOR_CHILD));
        $manager->persist($auditor);

        $auditorins = new Modulo();
        $auditorins->setNombre('auditor_insertar');
        $auditorins->setTitulo('Adicionar');
        $auditorins->setRuta('/auditor_insertar');
        $auditorins->setIcono('home');
        $auditorins->setMenu(0);
        $auditorins->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITOR_CHILD));
        $manager->persist($auditorins);

        $auditorupd = new Modulo();
        $auditorupd->setNombre('auditor_editar');
        $auditorupd->setTitulo('Actualizar');
        $auditorupd->setRuta('/auditor_editar');
        $auditorupd->setIcono('home');
        $auditorupd->setMenu(0);
        $auditorupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITOR_CHILD));
        $manager->persist($auditorupd);

        $auditordel = new Modulo();
        $auditordel->setNombre('auditor_eliminar');
        $auditordel->setTitulo('Dar de Baja');
        $auditordel->setRuta('/auditor_eliminar');
        $auditordel->setIcono('home');
        $auditordel->setMenu(0);
        $auditordel->setFkmodulo($this->getReference(ModuloChildrenFixtures::AUDITOR_CHILD));
        $manager->persist($auditordel);


        $fortaleza = new Modulo();
        $fortaleza->setNombre('home_fortaleza');
        $fortaleza->setTitulo('Consultar');
        $fortaleza->setRuta('');
        $fortaleza->setIcono('home');
        $fortaleza->setMenu(0);
        $fortaleza->setFkmodulo($this->getReference(ModuloChildrenFixtures::FORTALEZA_CHILD));
        $manager->persist($fortaleza);

        $fortalezains = new Modulo();
        $fortalezains->setNombre('fortaleza_insertar');
        $fortalezains->setTitulo('Adicionar');
        $fortalezains->setRuta('/fortaleza_insertar');
        $fortalezains->setIcono('home');
        $fortalezains->setMenu(0);
        $fortalezains->setFkmodulo($this->getReference(ModuloChildrenFixtures::FORTALEZA_CHILD));
        $manager->persist($fortalezains);

        $fortalezaupd = new Modulo();
        $fortalezaupd->setNombre('fortaleza_editar');
        $fortalezaupd->setTitulo('Actualizar');
        $fortalezaupd->setRuta('/fortaleza_editar');
        $fortalezaupd->setIcono('home');
        $fortalezaupd->setMenu(0);
        $fortalezaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::FORTALEZA_CHILD));
        $manager->persist($fortalezaupd);

        $fortalezadel = new Modulo();
        $fortalezadel->setNombre('fortaleza_eliminar');
        $fortalezadel->setTitulo('Dar de Baja');
        $fortalezadel->setRuta('/fortaleza_eliminar');
        $fortalezadel->setIcono('home');
        $fortalezadel->setMenu(0);
        $fortalezadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::FORTALEZA_CHILD));
        $manager->persist($fortalezadel);


        $tipohallazgo = new Modulo();
        $tipohallazgo->setNombre('home_tipohallazgo');
        $tipohallazgo->setTitulo('Consultar');
        $tipohallazgo->setRuta('');
        $tipohallazgo->setIcono('home');
        $tipohallazgo->setMenu(0);
        $tipohallazgo->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOHALLAZGO_CHILD));
        $manager->persist($tipohallazgo);

        $tipohallazgoins = new Modulo();
        $tipohallazgoins->setNombre('tipohallazgo_insertar');
        $tipohallazgoins->setTitulo('Adicionar');
        $tipohallazgoins->setRuta('/tipohallazgo_insertar');
        $tipohallazgoins->setIcono('home');
        $tipohallazgoins->setMenu(0);
        $tipohallazgoins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOHALLAZGO_CHILD));
        $manager->persist($tipohallazgoins);

        $tipohallazgoupd = new Modulo();
        $tipohallazgoupd->setNombre('tipohallazgo_editar');
        $tipohallazgoupd->setTitulo('Actualizar');
        $tipohallazgoupd->setRuta('/tipohallazgo_editar');
        $tipohallazgoupd->setIcono('home');
        $tipohallazgoupd->setMenu(0);
        $tipohallazgoupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOHALLAZGO_CHILD));
        $manager->persist($tipohallazgoupd);

        $tipohallazgodel = new Modulo();
        $tipohallazgodel->setNombre('tipohallazgo_eliminar');
        $tipohallazgodel->setTitulo('Dar de Baja');
        $tipohallazgodel->setRuta('/tipohallazgo_eliminar');
        $tipohallazgodel->setIcono('home');
        $tipohallazgodel->setMenu(0);
        $tipohallazgodel->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOHALLAZGO_CHILD));
        $manager->persist($tipohallazgodel);


        $halauditoria = new Modulo();
        $halauditoria->setNombre('home_hallazgo');
        $halauditoria->setTitulo('Consultar');
        $halauditoria->setRuta('');
        $halauditoria->setIcono('home');
        $halauditoria->setMenu(0);
        $halauditoria->setFkmodulo($this->getReference(ModuloChildrenFixtures::HALLAZGO_CHILD));
        $manager->persist($halauditoria);

        $halauditoriains = new Modulo();
        $halauditoriains->setNombre('hallazgo_insertar');
        $halauditoriains->setTitulo('Adicionar');
        $halauditoriains->setRuta('/hallazgo_insertar');
        $halauditoriains->setIcono('home');
        $halauditoriains->setMenu(0);
        $halauditoriains->setFkmodulo($this->getReference(ModuloChildrenFixtures::HALLAZGO_CHILD));
        $manager->persist($halauditoriains);

        $halauditoriaupd = new Modulo();
        $halauditoriaupd->setNombre('hallazgo_editar');
        $halauditoriaupd->setTitulo('Actualizar');
        $halauditoriaupd->setRuta('/hallazgo_editar');
        $halauditoriaupd->setIcono('home');
        $halauditoriaupd->setMenu(0);
        $halauditoriaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::HALLAZGO_CHILD));
        $manager->persist($halauditoriaupd);

        $halauditoriadel = new Modulo();
        $halauditoriadel->setNombre('hallazgo_eliminar');
        $halauditoriadel->setTitulo('Dar de Baja');
        $halauditoriadel->setRuta('/hallazgo_eliminar');
        $halauditoriadel->setIcono('home');
        $halauditoriadel->setMenu(0);
        $halauditoriadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::HALLAZGO_CHILD));
        $manager->persist($halauditoriadel);


        $accion = new Modulo();
        $accion->setNombre('home_accion');
        $accion->setTitulo('Consultar');
        $accion->setRuta('');
        $accion->setIcono('home');
        $accion->setMenu(0);
        $accion->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCION_CHILD));
        $manager->persist($accion);

        $accionins = new Modulo();
        $accionins->setNombre('accion_insertar');
        $accionins->setTitulo('Adicionar');
        $accionins->setRuta('/accion_insertar');
        $accionins->setIcono('home');
        $accionins->setMenu(0);
        $accionins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCION_CHILD));
        $manager->persist($accionins);

        $accionupd = new Modulo();
        $accionupd->setNombre('accion_editar');
        $accionupd->setTitulo('Actualizar');
        $accionupd->setRuta('/accion_editar');
        $accionupd->setIcono('home');
        $accionupd->setMenu(0);
        $accionupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCION_CHILD));
        $manager->persist($accionupd);

        $acciondel = new Modulo();
        $acciondel->setNombre('accion_eliminar');
        $acciondel->setTitulo('Dar de Baja');
        $acciondel->setRuta('/accion_eliminar');
        $acciondel->setIcono('home');
        $acciondel->setMenu(0);
        $acciondel->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCION_CHILD));
        $manager->persist($acciondel);


        $accnseg = new Modulo();
        $accnseg->setNombre('home_accionseguimiento');
        $accnseg->setTitulo('Consultar');
        $accnseg->setRuta('');
        $accnseg->setIcono('home');
        $accnseg->setMenu(0);
        $accnseg->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONSEGUIMIENTO_CHILD));
        $manager->persist($accnseg);

        $accnsegins = new Modulo();
        $accnsegins->setNombre('accionseguimiento_insertar');
        $accnsegins->setTitulo('Adicionar');
        $accnsegins->setRuta('/accionseguimiento_insertar');
        $accnsegins->setIcono('home');
        $accnsegins->setMenu(0);
        $accnsegins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONSEGUIMIENTO_CHILD));
        $manager->persist($accnsegins);

        $accnsegupd = new Modulo();
        $accnsegupd->setNombre('accionseguimiento_editar');
        $accnsegupd->setTitulo('Actualizar');
        $accnsegupd->setRuta('/accionseguimiento_editar');
        $accnsegupd->setIcono('home');
        $accnsegupd->setMenu(0);
        $accnsegupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONSEGUIMIENTO_CHILD));
        $manager->persist($accnsegupd);

        $accnsegdel = new Modulo();
        $accnsegdel->setNombre('accionseguimiento_eliminar');
        $accnsegdel->setTitulo('Dar de Baja');
        $accnsegdel->setRuta('/accionseguimiento_eliminar');
        $accnsegdel->setIcono('home');
        $accnsegdel->setMenu(0);
        $accnsegdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONSEGUIMIENTO_CHILD));
        $manager->persist($accnsegdel);


        $accnrpg = new Modulo();
        $accnrpg->setNombre('home_accionreprograma');
        $accnrpg->setTitulo('Consultar');
        $accnrpg->setRuta('');
        $accnrpg->setIcono('home');
        $accnrpg->setMenu(0);
        $accnrpg->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONREPROGRAMA_CHILD));
        $manager->persist($accnrpg);

        $accnrpgins = new Modulo();
        $accnrpgins->setNombre('accionreprograma_insertar');
        $accnrpgins->setTitulo('Adicionar');
        $accnrpgins->setRuta('/accionreprograma_insertar');
        $accnrpgins->setIcono('home');
        $accnrpgins->setMenu(0);
        $accnrpgins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONREPROGRAMA_CHILD));
        $manager->persist($accnrpgins);
        
        $accnrpgupd = new Modulo();
        $accnrpgupd->setNombre('accionreprograma_editar');
        $accnrpgupd->setTitulo('Actualizar');
        $accnrpgupd->setRuta('/accionreprograma_editar');
        $accnrpgupd->setIcono('home');
        $accnrpgupd->setMenu(0);
        $accnrpgupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONREPROGRAMA_CHILD));
        $manager->persist($accnrpgupd);

        $accnrpgdel = new Modulo();
        $accnrpgdel->setNombre('accionreprograma_eliminar');
        $accnrpgdel->setTitulo('Dar de Baja');
        $accnrpgdel->setRuta('/accionreprograma_eliminar');
        $accnrpgdel->setIcono('home');
        $accnrpgdel->setMenu(0);
        $accnrpgdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONREPROGRAMA_CHILD));
        $manager->persist($accnrpgdel);


        $accnefc = new Modulo();
        $accnefc->setNombre('home_accioneficacia');
        $accnefc->setTitulo('Consultar');
        $accnefc->setRuta('');
        $accnefc->setIcono('home');
        $accnefc->setMenu(0);
        $accnefc->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONEFICACIA_CHILD));
        $manager->persist($accnefc);

        $accnefcins = new Modulo();
        $accnefcins->setNombre('accioneficacia_insertar');
        $accnefcins->setTitulo('Adicionar');
        $accnefcins->setRuta('/accioneficacia_insertar');
        $accnefcins->setIcono('home');
        $accnefcins->setMenu(0);
        $accnefcins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONEFICACIA_CHILD));
        $manager->persist($accnefcins);

        $accnefcupd = new Modulo();
        $accnefcupd->setNombre('accioneficacia_editar');
        $accnefcupd->setTitulo('Actualizar');
        $accnefcupd->setRuta('/accioneficacia_editar');
        $accnefcupd->setIcono('home');
        $accnefcupd->setMenu(0);
        $accnefcupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONEFICACIA_CHILD));
        $manager->persist($accnefcupd);

        $accnefcdel = new Modulo();
        $accnefcdel->setNombre('accioneficacia_eliminar');
        $accnefcdel->setTitulo('Dar de Baja');
        $accnefcdel->setRuta('/accioneficacia_eliminar');
        $accnefcdel->setIcono('home');
        $accnefcdel->setMenu(0);
        $accnefcdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::ACCIONEFICACIA_CHILD));
        $manager->persist($accnefcdel);


        $documentacion = new Modulo();
        $documentacion->setNombre('home_documentoadicional');
        $documentacion->setTitulo('Consultar');
        $documentacion->setRuta('');
        $documentacion->setIcono('home');
        $documentacion->setMenu(0);
        $documentacion->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCADICIONAL_CHILD));
        $manager->persist($documentacion);

        $documentacionins = new Modulo();
        $documentacionins->setNombre('documentoadicional_insertar');
        $documentacionins->setTitulo('Adicionar');
        $documentacionins->setRuta('/documentoadicional_insertar');
        $documentacionins->setIcono('home');
        $documentacionins->setMenu(0);
        $documentacionins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCADICIONAL_CHILD));
        $manager->persist($documentacionins);

        $documentacionupd = new Modulo();
        $documentacionupd->setNombre('documentoadicional_editar');
        $documentacionupd->setTitulo('Actualizar');
        $documentacionupd->setRuta('/documentoadicional_editar');
        $documentacionupd->setIcono('home');
        $documentacionupd->setMenu(0);
        $documentacionupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCADICIONAL_CHILD));
        $manager->persist($documentacionupd);

        $documentaciondel = new Modulo();
        $documentaciondel->setNombre('documentoadicional_eliminar');
        $documentaciondel->setTitulo('Dar de Baja');
        $documentaciondel->setRuta('/documentoadicional_eliminar');
        $documentaciondel->setIcono('home');
        $documentaciondel->setMenu(0);
        $documentaciondel->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCADICIONAL_CHILD));
        $manager->persist($documentaciondel);


        $seguimientoplan = new Modulo();
        $seguimientoplan->setNombre('home_seguimientoplan');
        $seguimientoplan->setTitulo('Consultar');
        $seguimientoplan->setRuta('');
        $seguimientoplan->setIcono('home');
        $seguimientoplan->setMenu(0);
        $seguimientoplan->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOPLAN_CHILD));
        $manager->persist($seguimientoplan);

        $seguimientoplanins = new Modulo();
        $seguimientoplanins->setNombre('seguimientoplan_insertar');
        $seguimientoplanins->setTitulo('Adicionar');
        $seguimientoplanins->setRuta('/seguimientoplan_insertar');
        $seguimientoplanins->setIcono('home');
        $seguimientoplanins->setMenu(0);
        $seguimientoplanins->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOPLAN_CHILD));
        $manager->persist($seguimientoplanins);

        $seguimientoplanupd = new Modulo();
        $seguimientoplanupd->setNombre('seguimientoplan_editar');
        $seguimientoplanupd->setTitulo('Actualizar');
        $seguimientoplanupd->setRuta('/seguimientoplan_editar');
        $seguimientoplanupd->setIcono('home');
        $seguimientoplanupd->setMenu(0);
        $seguimientoplanupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOPLAN_CHILD));
        $manager->persist($seguimientoplanupd);

        $seguimientoplandel = new Modulo();
        $seguimientoplandel->setNombre('seguimientoplan_eliminar');
        $seguimientoplandel->setTitulo('Dar de Baja');
        $seguimientoplandel->setRuta('/seguimientoplan_eliminar');
        $seguimientoplandel->setIcono('home');
        $seguimientoplandel->setMenu(0);
        $seguimientoplandel->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGUIMIENTOPLAN_CHILD));
        $manager->persist($seguimientoplandel);


        $detalleAuditor = new Modulo();
        $detalleAuditor->setNombre('home_detalleauditor');
        $detalleAuditor->setTitulo('Consultar');
        $detalleAuditor->setRuta('');
        $detalleAuditor->setIcono('home');
        $detalleAuditor->setMenu(0);
        $detalleAuditor->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEAUDITOR_CHILD));
        $manager->persist($detalleAuditor);

        $detalleAuditorins = new Modulo();
        $detalleAuditorins->setNombre('detalleauditor_insertar');
        $detalleAuditorins->setTitulo('Adicionar');
        $detalleAuditorins->setRuta('/detalleauditor_insertar');
        $detalleAuditorins->setIcono('home');
        $detalleAuditorins->setMenu(0);
        $detalleAuditorins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEAUDITOR_CHILD));
        $manager->persist($detalleAuditorins);

        $detalleAuditorupd = new Modulo();
        $detalleAuditorupd->setNombre('detalleauditor_editar');
        $detalleAuditorupd->setTitulo('Actualizar');
        $detalleAuditorupd->setRuta('/detalleauditor_editar');
        $detalleAuditorupd->setIcono('home');
        $detalleAuditorupd->setMenu(0);
        $detalleAuditorupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEAUDITOR_CHILD));
        $manager->persist($detalleAuditorupd);

        $detalleAuditordel = new Modulo();
        $detalleAuditordel->setNombre('detalleauditor_eliminar');
        $detalleAuditordel->setTitulo('Dar de Baja');
        $detalleAuditordel->setRuta('/detalleauditor_eliminar');
        $detalleAuditordel->setIcono('home');
        $detalleAuditordel->setMenu(0);
        $detalleAuditordel->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEAUDITOR_CHILD));
        $manager->persist($detalleAuditordel);


        $detalledocumento = new Modulo();
        $detalledocumento->setNombre('home_detalledocumento');
        $detalledocumento->setTitulo('Consultar');
        $detalledocumento->setRuta('');
        $detalledocumento->setIcono('home');
        $detalledocumento->setMenu(0);
        $detalledocumento->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEDOC_CHILD));
        $manager->persist($detalledocumento);

        $detalledocumentoins = new Modulo();
        $detalledocumentoins->setNombre('detalledocumento_insertar');
        $detalledocumentoins->setTitulo('Adicionar');
        $detalledocumentoins->setRuta('/detalledocumento_insertar');
        $detalledocumentoins->setIcono('home');
        $detalledocumentoins->setMenu(0);
        $detalledocumentoins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEDOC_CHILD));
        $manager->persist($detalledocumentoins);

        $detalledocumentoupd = new Modulo();
        $detalledocumentoupd->setNombre('detalledocumento_editar');
        $detalledocumentoupd->setTitulo('Actualizar');
        $detalledocumentoupd->setRuta('/detalledocumento_editar');
        $detalledocumentoupd->setIcono('home');
        $detalledocumentoupd->setMenu(0);
        $detalledocumentoupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEDOC_CHILD));
        $manager->persist($detalledocumentoupd);

        $detalledocumentodel = new Modulo();
        $detalledocumentodel->setNombre('detalledocumento_eliminar');
        $detalledocumentodel->setTitulo('Dar de Baja');
        $detalledocumentodel->setRuta('/detalledocumento_eliminar');
        $detalledocumentodel->setIcono('home');
        $detalledocumentodel->setMenu(0);
        $detalledocumentodel->setFkmodulo($this->getReference(ModuloChildrenFixtures::DETALLEDOC_CHILD));
        $manager->persist($detalledocumentodel);



        $estNovedad = new Modulo();
        $estNovedad->setNombre('home_estadonovedad');
        $estNovedad->setTitulo('Consultar');
        $estNovedad->setRuta( 'home_estadonovedad');
        $estNovedad->setIcono('home');
        $estNovedad->setMenu(0);
        $estNovedad->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADONOV_CHILD));
        $manager->persist($estNovedad);

        $estNovedadins = new Modulo();
        $estNovedadins->setNombre('estadonovedad_insertar');
        $estNovedadins->setTitulo('Adicionar');
        $estNovedadins->setRuta( '/estadonovedad_insertar');
        $estNovedadins->setIcono('home');
        $estNovedadins->setMenu(0);
        $estNovedadins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADONOV_CHILD));
        $manager->persist($estNovedadins);

        $estNovedadupd = new Modulo();
        $estNovedadupd->setNombre('estadonovedad_editar');
        $estNovedadupd->setTitulo('Actualizar');
        $estNovedadupd->setRuta( '/estadonovedad_editar');
        $estNovedadupd->setIcono('home');
        $estNovedadupd->setMenu(0);
        $estNovedadupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADONOV_CHILD));
        $manager->persist($estNovedadupd);

        $estNovedaddel = new Modulo();
        $estNovedaddel->setNombre('estadonovedad_eliminar');
        $estNovedaddel->setTitulo('Dar de Baja');
        $estNovedaddel->setRuta('/estadonovedad_eliminar');
        $estNovedaddel->setIcono('home');
        $estNovedaddel->setMenu(0);
        $estNovedaddel->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADONOV_CHILD));
        $manager->persist($estNovedaddel);


        $regmejora = new Modulo();
        $regmejora->setNombre('home_registromejora');
        $regmejora->setTitulo('Consultar');
        $regmejora->setRuta( '');
        $regmejora->setIcono('home');
        $regmejora->setMenu(0);
        $regmejora->setFkmodulo($this->getReference(ModuloChildrenFixtures::REGMEJORA_CHILD));
        $manager->persist($regmejora);

        $regmejorains = new Modulo();
        $regmejorains->setNombre('registromejora_insertar');
        $regmejorains->setTitulo('Adicionar');
        $regmejorains->setRuta( '/registromejora_insertar');
        $regmejorains->setIcono('home');
        $regmejorains->setMenu(0);
        $regmejorains->setFkmodulo($this->getReference(ModuloChildrenFixtures::REGMEJORA_CHILD));
        $manager->persist($regmejorains);

        $regmejoraupd = new Modulo();
        $regmejoraupd->setNombre('registromejora_editar');
        $regmejoraupd->setTitulo('Actualizar');
        $regmejoraupd->setRuta( '/registromejora_editar');
        $regmejoraupd->setIcono('home');
        $regmejoraupd->setMenu(0);
        $regmejoraupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::REGMEJORA_CHILD));
        $manager->persist($regmejoraupd);

        $regmejoradel = new Modulo();
        $regmejoradel->setNombre('registromejora_eliminar');
        $regmejoradel->setTitulo('Dar de Baja');
        $regmejoradel->setRuta('/registromejora_eliminar');
        $regmejoradel->setIcono('home');
        $regmejoradel->setMenu(0);
        $regmejoradel->setFkmodulo($this->getReference(ModuloChildrenFixtures::REGMEJORA_CHILD));
        $manager->persist($regmejoradel);


        $segmejora = new Modulo();
        $segmejora->setNombre('home_seguimientomejora');
        $segmejora->setTitulo('Consultar');
        $segmejora->setRuta( '');
        $segmejora->setIcono('home');
        $segmejora->setMenu(0);
        $segmejora->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGMEJORA_CHILD));
        $manager->persist($segmejora);

        $segmejorains = new Modulo();
        $segmejorains->setNombre('seguimientomejora_insertar');
        $segmejorains->setTitulo('Adicionar');
        $segmejorains->setRuta( '/seguimientomejora_insertar');
        $segmejorains->setIcono('home');
        $segmejorains->setMenu(0);
        $segmejorains->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGMEJORA_CHILD));
        $manager->persist($segmejorains);

        $segmejoraupd = new Modulo();
        $segmejoraupd->setNombre('seguimientomejora_editar');
        $segmejoraupd->setTitulo('Actualizar');
        $segmejoraupd->setRuta( '/seguimientomejora_editar');
        $segmejoraupd->setIcono('home');
        $segmejoraupd->setMenu(0);
        $segmejoraupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGMEJORA_CHILD));
        $manager->persist($segmejoraupd);

        $segmejoradel = new Modulo();
        $segmejoradel->setNombre('seguimientomejora_eliminar');
        $segmejoradel->setTitulo('Dar de Baja');
        $segmejoradel->setRuta('/seguimientomejora_eliminar');
        $segmejoradel->setIcono('home');
        $segmejoradel->setMenu(0);
        $segmejoradel->setFkmodulo($this->getReference(ModuloChildrenFixtures::SEGMEJORA_CHILD));
        $manager->persist($segmejoradel);


        $datoemp = new Modulo();
        $datoemp->setNombre('home_tipodatoempresarial');
        $datoemp->setTitulo('Consultar');
        $datoemp->setRuta( '');
        $datoemp->setIcono('home');
        $datoemp->setMenu(0);
        $datoemp->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODATOEMP_CHILD));
        $manager->persist($datoemp);

        $datoempins = new Modulo();
        $datoempins->setNombre('tipodatoempresarial_insertar');
        $datoempins->setTitulo('Adicionar');
        $datoempins->setRuta( '/tipodatoempresarial_insertar');
        $datoempins->setIcono('home');
        $datoempins->setMenu(0);
        $datoempins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODATOEMP_CHILD));
        $manager->persist($datoempins);

        $datoempupd = new Modulo();
        $datoempupd->setNombre('tipodatoempresarial_editar');
        $datoempupd->setTitulo('Actualizar');
        $datoempupd->setRuta( '/tipodatoempresarial_editar');
        $datoempupd->setIcono('home');
        $datoempupd->setMenu(0);
        $datoempupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODATOEMP_CHILD));
        $manager->persist($datoempupd);

        $datoempdel = new Modulo();
        $datoempdel->setNombre('tipodatoempresarial_eliminar');
        $datoempdel->setTitulo('Dar de Baja');
        $datoempdel->setRuta('/tipodatoempresarial_eliminar');
        $datoempdel->setIcono('home');
        $datoempdel->setMenu(0);
        $datoempdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPODATOEMP_CHILD));
        $manager->persist($datoempdel);


        $empresarial = new Modulo();
        $empresarial->setNombre('home_datoempresarial');
        $empresarial->setTitulo('Consultar');
        $empresarial->setRuta( '');
        $empresarial->setIcono('home');
        $empresarial->setMenu(0);
        $empresarial->setFkmodulo($this->getReference(ModuloChildrenFixtures::DATOEMPRESARIAL_CHILD));
        $manager->persist($empresarial);

        $empresarialins = new Modulo();
        $empresarialins->setNombre('datoempresarial_insertar');
        $empresarialins->setTitulo('Adicionar');
        $empresarialins->setRuta( '/datoempresarial_insertar');
        $empresarialins->setIcono('home');
        $empresarialins->setMenu(0);
        $empresarialins->setFkmodulo($this->getReference(ModuloChildrenFixtures::DATOEMPRESARIAL_CHILD));
        $manager->persist($empresarialins);

        $empresarialupd = new Modulo();
        $empresarialupd->setNombre('datoempresarial_editar');
        $empresarialupd->setTitulo('Actualizar');
        $empresarialupd->setRuta( '/datoempresarial_editar');
        $empresarialupd->setIcono('home');
        $empresarialupd->setMenu(0);
        $empresarialupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::DATOEMPRESARIAL_CHILD));
        $manager->persist($empresarialupd);


        $empresarialdel = new Modulo();
        $empresarialdel->setNombre('datoempresarial_eliminar');
        $empresarialdel->setTitulo('Dar de Baja');
        $empresarialdel->setRuta('/datoempresarial_eliminar');
        $empresarialdel->setIcono('home');
        $empresarialdel->setMenu(0);
        $empresarialdel->setFkmodulo($this->getReference(ModuloChildrenFixtures::DATOEMPRESARIAL_CHILD));
        $manager->persist($empresarialdel);


        $tiponovedad = new Modulo();
        $tiponovedad->setNombre('home_tiponovedad');
        $tiponovedad->setTitulo('Consultar');
        $tiponovedad->setRuta( '');
        $tiponovedad->setIcono('home');
        $tiponovedad->setMenu(0);
        $tiponovedad->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOVEDAD_CHILD));
        $manager->persist($tiponovedad);

        $tiponovedadins = new Modulo();
        $tiponovedadins->setNombre('tiponovedad_insertar');
        $tiponovedadins->setTitulo('Adicionar');
        $tiponovedadins->setRuta( '/tiponovedad_insertar');
        $tiponovedadins->setIcono('home');
        $tiponovedadins->setMenu(0);
        $tiponovedadins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOVEDAD_CHILD));
        $manager->persist($tiponovedadins);

        $tiponovedadupd = new Modulo();
        $tiponovedadupd->setNombre('tiponovedad_editar');
        $tiponovedadupd->setTitulo('Actualizar');
        $tiponovedadupd->setRuta( '/tiponovedad_editar');
        $tiponovedadupd->setIcono('home');
        $tiponovedadupd->setMenu(0);
        $tiponovedadupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOVEDAD_CHILD));
        $manager->persist($tiponovedadupd);

        $tiponovedaddel = new Modulo();
        $tiponovedaddel->setNombre('tiponovedad_eliminar');
        $tiponovedaddel->setTitulo('Dar de Baja');
        $tiponovedaddel->setRuta('/tiponovedad_eliminar');
        $tiponovedaddel->setIcono('home');
        $tiponovedaddel->setMenu(0);
        $tiponovedaddel->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPONOVEDAD_CHILD));
        $manager->persist($tiponovedaddel);



        $noticia = new Modulo();
        $noticia->setNombre('home_noticia');
        $noticia->setTitulo('Consultar');
        $noticia->setRuta( 'home_noticia');
        $noticia->setIcono('home');
        $noticia->setMenu(0);
        $noticia->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIA_CHILD));
        $manager->persist($noticia);

        $noticiains = new Modulo();
        $noticiains->setNombre('noticia_insertar');
        $noticiains->setTitulo('Adicionar');
        $noticiains->setRuta( '/noticia_insertar');
        $noticiains->setIcono('home');
        $noticiains->setMenu(0);
        $noticiains->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIA_CHILD));
        $manager->persist($noticiains);

        $noticiaupd = new Modulo();
        $noticiaupd->setNombre('noticia_editar');
        $noticiaupd->setTitulo('Actualizar');
        $noticiaupd->setRuta( '/noticia_editar');
        $noticiaupd->setIcono('home');
        $noticiaupd->setMenu(0);
        $noticiaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIA_CHILD));
        $manager->persist($noticiaupd);

        $noticiadel = new Modulo();
        $noticiadel->setNombre('noticia_eliminar');
        $noticiadel->setTitulo('Eliminar');
        $noticiadel->setRuta( '/noticia_eliminar');
        $noticiadel->setIcono('home');
        $noticiadel->setMenu(0);
        $noticiadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIA_CHILD));
        $manager->persist($noticiadel);


        $catnoticia = new Modulo();
        $catnoticia->setNombre('home_categorianoticia');
        $catnoticia->setTitulo('Consultar');
        $catnoticia->setRuta( 'home_categorianoticia');
        $catnoticia->setIcono('home');
        $catnoticia->setMenu(0);
        $catnoticia->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATEGORIANOT_CHILD));
        $manager->persist($catnoticia);

        $catnoticiains = new Modulo();
        $catnoticiains->setNombre('categorianoticia_insertar');
        $catnoticiains->setTitulo('Adicionar');
        $catnoticiains->setRuta( '/categorianoticia_insertar');
        $catnoticiains->setIcono('home');
        $catnoticiains->setMenu(0);
        $catnoticiains->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATEGORIANOT_CHILD));
        $manager->persist($catnoticiains);

        $catnoticiaupd = new Modulo();
        $catnoticiaupd->setNombre('categorianoticia_editar');
        $catnoticiaupd->setTitulo('Actualizar');
        $catnoticiaupd->setRuta( '/categorianoticia_editar');
        $catnoticiaupd->setIcono('home');
        $catnoticiaupd->setMenu(0);
        $catnoticiaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATEGORIANOT_CHILD));
        $manager->persist($catnoticiaupd);

        $catnoticiadel = new Modulo();
        $catnoticiadel->setNombre('categorianoticia_eliminar');
        $catnoticiadel->setTitulo('Eliminar');
        $catnoticiadel->setRuta( '/categorianoticia_eliminar');
        $catnoticiadel->setIcono('home');
        $catnoticiadel->setMenu(0);
        $catnoticiadel->setFkmodulo($this->getReference(ModuloChildrenFixtures::CATEGORIANOT_CHILD));
        $manager->persist($catnoticiadel);


        $notcategoria = new Modulo();
        $notcategoria->setNombre('home_noticiacategoria');
        $notcategoria->setTitulo('Consultar');
        $notcategoria->setRuta( 'home_noticiacategoria');
        $notcategoria->setIcono('home');
        $notcategoria->setMenu(0);
        $notcategoria->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIACAT_CHILD));
        $manager->persist($notcategoria);

        $notcategoriains = new Modulo();
        $notcategoriains->setNombre('noticiacategoria_insertar');
        $notcategoriains->setTitulo('Adicionar');
        $notcategoriains->setRuta( '/noticiacategoria_insertar');
        $notcategoriains->setIcono('home');
        $notcategoriains->setMenu(0);
        $notcategoriains->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIACAT_CHILD));
        $manager->persist($notcategoriains);

        $notcategoriaupd = new Modulo();
        $notcategoriaupd->setNombre('noticiacategoria_editar');
        $notcategoriaupd->setTitulo('Actualizar');
        $notcategoriaupd->setRuta( '/noticiacategoria_editar');
        $notcategoriaupd->setIcono('home');
        $notcategoriaupd->setMenu(0);
        $notcategoriaupd->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIACAT_CHILD));
        $manager->persist($notcategoriaupd);

        $notelim = new Modulo();
        $notelim->setNombre('noticiacategoria_eliminar');
        $notelim->setTitulo('Eliminar');
        $notelim->setRuta('/noticiacategoria_eliminar');
        $notelim->setIcono('home');
        $notelim->setMenu(0);
        $notelim->setFkmodulo($this->getReference(ModuloChildrenFixtures::NOTICIACAT_CHILD));
        $manager->persist($notelim);


        $homcon = new Modulo();
        $homcon->setNombre('home_galeria');
        $homcon->setTitulo( 'Consultar');
        $homcon->setRuta('');
        $homcon->setIcono('home');
        $homcon->setMenu(0);
        $homcon->setFkmodulo($this->getReference(ModuloChildrenFixtures::GALERIA_CHILD));
        $manager->persist($homcon);

        $galadd = new Modulo();
        $galadd->setNombre('galeria_insertar');
        $galadd->setTitulo( 'Adicionar');
        $galadd->setRuta('/galeria_insertar');
        $galadd->setIcono('home');
        $galadd->setMenu(0);
        $galadd->setFkmodulo($this->getReference(ModuloChildrenFixtures::GALERIA_CHILD));
        $manager->persist($galadd);

        $galact = new Modulo();
        $galact->setNombre('galeria_editar');
        $galact->setTitulo('Actualizar');
        $galact->setRuta('/galeria_editar');
        $galact->setIcono('home');
        $galact->setMenu( 0);
        $galact->setFkmodulo($this->getReference(ModuloChildrenFixtures::GALERIA_CHILD));
        $manager->persist($galact);

        $galelim = new Modulo();
        $galelim->setNombre('galeria_eliminar');
        $galelim->setTitulo('Baja');
        $galelim->setRuta('/galeria_eliminar');
        $galelim->setIcono('home');
        $galelim->setMenu(0);
        $galelim->setFkmodulo($this->getReference(ModuloChildrenFixtures::GALERIA_CHILD));
        $manager->persist($galelim);


        $homefileconsul = new Modulo();
        $homefileconsul->setNombre('home_file');
        $homefileconsul->setTitulo( 'Consultar');
        $homefileconsul->setRuta( '');
        $homefileconsul->setIcono('home');
        $homefileconsul->setMenu( 0);
        $homefileconsul->setFkmodulo($this->getReference(ModuloChildrenFixtures::FILE_CHILD));
        $manager->persist($homefileconsul);

        $fileadd = new Modulo();
        $fileadd->setNombre('file_insertar');
        $fileadd->setTitulo( 'Adicionar');
        $fileadd->setRuta( '/file_insertar');
        $fileadd->setIcono( 'home');
        $fileadd->setMenu( 0);
        $fileadd->setFkmodulo($this->getReference(ModuloChildrenFixtures::FILE_CHILD));
        $manager->persist($fileadd);

        $fileact = new Modulo();
        $fileact->setNombre('file_editar');
        $fileact->setTitulo( 'Actualizar');
        $fileact->setRuta( '/file_editar');
        $fileact->setIcono( 'home');
        $fileact->setMenu( 0);
        $fileact->setFkmodulo($this->getReference(ModuloChildrenFixtures::FILE_CHILD));
        $manager->persist($fileact);

        $fileelim = new Modulo();
        $fileelim->setNombre('file_eliminar');
        $fileelim->setTitulo( 'Dar de Baja');
        $fileelim->setRuta('/file_eliminar');
        $fileelim->setIcono( 'home');
        $fileelim->setMenu(0);
        $fileelim->setFkmodulo($this->getReference(ModuloChildrenFixtures::FILE_CHILD));
        $manager->persist($fileelim);


        $homrorgcon = new Modulo();
        $homrorgcon->setNombre('home_organigrama');
        $homrorgcon->setTitulo( 'Consultar');
        $homrorgcon->setRuta( '');
        $homrorgcon->setIcono('home');
        $homrorgcon->setMenu( 0);
        $homrorgcon->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMA_CHILD));
        $manager->persist($homrorgcon);

        $orginadi = new Modulo();
        $orginadi->setNombre('organigrama_insertar');
        $orginadi->setTitulo( 'Adicionar');
        $orginadi->setRuta( '/organigrama_insertar');
        $orginadi->setIcono( 'home');
        $orginadi->setMenu( 0);
        $orginadi->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMA_CHILD));
        $manager->persist($orginadi);

        $orgedi = new Modulo();
        $orgedi->setNombre('organigrama_editar');
        $orgedi->setTitulo( 'Actualizar');
        $orgedi->setRuta( '/organigrama_editar');
        $orgedi->setIcono( 'home');
        $orgedi->setMenu( 0);
        $orgedi->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMA_CHILD));
        $manager->persist($orgedi);

        $orgelim = new Modulo();
        $orgelim->setNombre('organigrama_eliminar');
        $orgelim->setTitulo( 'Dar de Baja');
        $orgelim->setRuta('/organigrama_eliminar');
        $orgelim->setIcono('home');
        $orgelim->setMenu( 0);
        $orgelim->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMA_CHILD));
        $manager->persist($orgelim);     
        
        $homrorgciacon = new Modulo();
        $homrorgciacon->setNombre('home_organigramagerencia');
        $homrorgciacon->setTitulo( 'Consultar');
        $homrorgciacon->setRuta( '');
        $homrorgciacon->setIcono('home');
        $homrorgciacon->setMenu( 0);
        $homrorgciacon->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMAGERENCIA_CHILD));
        $manager->persist($homrorgciacon);

        $orgciainadi = new Modulo();
        $orgciainadi->setNombre('organigramagerencia_insertar');
        $orgciainadi->setTitulo( 'Adicionar');
        $orgciainadi->setRuta( '/organigramagerencia_insertar');
        $orgciainadi->setIcono( 'home');
        $orgciainadi->setMenu(0);
        $orgciainadi->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMAGERENCIA_CHILD));
        $manager->persist($orgciainadi);

        $orgciaedi = new Modulo();
        $orgciaedi->setNombre('organigramagerencia_editar');
        $orgciaedi->setTitulo('Actualizar');
        $orgciaedi->setRuta('/organigramagerencia_editar');
        $orgciaedi->setIcono( 'home');
        $orgciaedi->setMenu(0);
        $orgciaedi->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMAGERENCIA_CHILD));
        $manager->persist($orgciaedi);

        $orgciaelim = new Modulo();
        $orgciaelim->setNombre('organigramagerencia_eliminar');
        $orgciaelim->setTitulo( 'Dar de Baja');
        $orgciaelim->setRuta('/organigramagerencia_eliminar');
        $orgciaelim->setIcono('home');
        $orgciaelim->setMenu(0);
        $orgciaelim->setFkmodulo($this->getReference(ModuloChildrenFixtures::ORGANIGRAMAGERENCIA_CHILD));
        $manager->persist($orgciaelim);        

        $tpcrghm = new Modulo();
        $tpcrghm->setNombre('home_tipocargo');
        $tpcrghm->setTitulo('Consultar');
        $tpcrghm->setRuta('');
        $tpcrghm->setIcono('home');
        $tpcrghm->setMenu(0);
        $tpcrghm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCARGO_CHILD));
        $manager->persist($tpcrghm);

        $tpcrgins = new Modulo();
        $tpcrgins->setNombre('tipocargo_insertar');
        $tpcrgins->setTitulo('Adicionar');
        $tpcrgins->setRuta('/tipocargo_insertar');
        $tpcrgins->setIcono('home');
        $tpcrgins->setMenu(0);
        $tpcrgins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCARGO_CHILD));
        $manager->persist($tpcrgins);

        $tpcrgedt = new Modulo();
        $tpcrgedt->setNombre('tipocargo_editar');
        $tpcrgedt->setTitulo('Actualizar');
        $tpcrgedt->setRuta('/tipocargo_editar');
        $tpcrgedt->setIcono('home');
        $tpcrgedt->setMenu(0);
        $tpcrgedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCARGO_CHILD));
        $manager->persist($tpcrgedt);

        $tpcrgelm = new Modulo();
        $tpcrgelm->setNombre('tipocargo_eliminar');
        $tpcrgelm->setTitulo('Dar de Baja');
        $tpcrgelm->setRuta('/tipocargo_eliminar');
        $tpcrgelm->setIcono('home');
        $tpcrgelm->setMenu(0);
        $tpcrgelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TIPOCARGO_CHILD));
        $manager->persist($tpcrgelm);


        $cargohm = new Modulo();
        $cargohm->setNombre('home_personalcargo');
        $cargohm->setTitulo('Consultar');
        $cargohm->setRuta('');
        $cargohm->setIcono('home');
        $cargohm->setMenu(0);
        $cargohm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CARGO_CHILD));
        $manager->persist($cargohm);

        $cargoins = new Modulo();
        $cargoins->setNombre('personalcargo_insertar');
        $cargoins->setTitulo('Adicionar');
        $cargoins->setRuta('/personalcargo_insertar');
        $cargoins->setIcono('home');
        $cargoins->setMenu(0);
        $cargoins->setFkmodulo($this->getReference(ModuloChildrenFixtures::CARGO_CHILD));
        $manager->persist($cargoins);

        $cargoedt = new Modulo();
        $cargoedt->setNombre('personalcargo_editar');
        $cargoedt->setTitulo('Actualizar');
        $cargoedt->setRuta('/personalcargo_editar');
        $cargoedt->setIcono('home');
        $cargoedt->setMenu(0);
        $cargoedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::CARGO_CHILD));
        $manager->persist($cargoedt);

        $cargoelm = new Modulo();
        $cargoelm->setNombre('personalcargo_eliminar');
        $cargoelm->setTitulo('Dar de Baja');
        $cargoelm->setRuta('/personalcargo_eliminar');
        $cargoelm->setIcono('home');
        $cargoelm->setMenu(0);
        $cargoelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::CARGO_CHILD));
        $manager->persist($cargoelm);


        $estplnhm = new Modulo();
        $estplnhm->setNombre('home_estadopersonal');
        $estplnhm->setTitulo('Consultar');
        $estplnhm->setRuta('');
        $estplnhm->setIcono('home');
        $estplnhm->setMenu(0);
        $estplnhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPERSONAL_CHILD));
        $manager->persist($estplnhm);

        $estplnins = new Modulo();
        $estplnins->setNombre('estadopersonal_insertar');
        $estplnins->setTitulo('Adicionar');
        $estplnins->setRuta('/estadopersonal_insertar');
        $estplnins->setIcono('home');
        $estplnins->setMenu(0);
        $estplnins->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPERSONAL_CHILD));
        $manager->persist($estplnins);

        $estplnedt = new Modulo();
        $estplnedt->setNombre('estadopersonal_editar');
        $estplnedt->setTitulo('Actualizar');
        $estplnedt->setRuta('/estadopersonal_editar');
        $estplnedt->setIcono('home');
        $estplnedt->setMenu(0);
        $estplnedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPERSONAL_CHILD));
        $manager->persist($estplnedt);

        $estplnelm = new Modulo();
        $estplnelm->setNombre('estadopersonal_eliminar');
        $estplnelm->setTitulo('Dar de Baja');
        $estplnelm->setRuta('/estadopersonal_eliminar');
        $estplnelm->setIcono('home');
        $estplnelm->setMenu(0);
        $estplnelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::ESTADOPERSONAL_CHILD));
        $manager->persist($estplnelm);

        
        $prsnlhm = new Modulo();
        $prsnlhm->setNombre('home_personal');
        $prsnlhm->setTitulo('Consultar');
        $prsnlhm->setRuta('');
        $prsnlhm->setIcono('home');
        $prsnlhm->setMenu(0);
        $prsnlhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERSONAL_CHILD));
        $manager->persist($prsnlhm);

        $prsnlins = new Modulo();
        $prsnlins->setNombre('personal_insertar');
        $prsnlins->setTitulo('Adicionar');
        $prsnlins->setRuta('/personal_insertar');
        $prsnlins->setIcono('home');
        $prsnlins->setMenu(0);
        $prsnlins->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERSONAL_CHILD));
        $manager->persist($prsnlins);

        $prsnledt = new Modulo();
        $prsnledt->setNombre('personal_editar');
        $prsnledt->setTitulo('Actualizar');
        $prsnledt->setRuta('/personal_editar');
        $prsnledt->setIcono('home');
        $prsnledt->setMenu(0);
        $prsnledt->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERSONAL_CHILD));
        $manager->persist($prsnledt);

        $prsnlelm = new Modulo();
        $prsnlelm->setNombre('personal_eliminar');
        $prsnlelm->setTitulo('Dar de Baja');
        $prsnlelm->setRuta('/personal_eliminar');
        $prsnlelm->setIcono('home');
        $prsnlelm->setMenu(0);
        $prsnlelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::PERSONAL_CHILD));
        $manager->persist($prsnlelm);


        $turnhm = new Modulo();
        $turnhm->setNombre('home_turno');
        $turnhm->setTitulo('Consultar');
        $turnhm->setRuta('');
        $turnhm->setIcono('home');
        $turnhm->setMenu(0);
        $turnhm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TURNO_CHILD));
        $manager->persist($turnhm);

        $turnins = new Modulo();
        $turnins->setNombre('turno_insertar');
        $turnins->setTitulo('Adicionar');
        $turnins->setRuta('/turno_insertar');
        $turnins->setIcono('home');
        $turnins->setMenu(0);
        $turnins->setFkmodulo($this->getReference(ModuloChildrenFixtures::TURNO_CHILD));
        $manager->persist($turnins);

        $turnedt = new Modulo();
        $turnedt->setNombre('turno_editar');
        $turnedt->setTitulo('Actualizar');
        $turnedt->setRuta('/turno_editar');
        $turnedt->setIcono('home');
        $turnedt->setMenu(0);
        $turnedt->setFkmodulo($this->getReference(ModuloChildrenFixtures::TURNO_CHILD));
        $manager->persist($turnedt);

        $turnelm = new Modulo();
        $turnelm->setNombre('turno_eliminar');
        $turnelm->setTitulo('Dar de Baja');
        $turnelm->setRuta('/tunro_eliminar');
        $turnelm->setIcono('home');
        $turnelm->setMenu(0);
        $turnelm->setFkmodulo($this->getReference(ModuloChildrenFixtures::TURNO_CHILD));
        $manager->persist($turnelm);


        $fichacargo = new Modulo();
        $fichacargo->setNombre('home_fichacargo');
        $fichacargo->setTitulo('Consultar');
        $fichacargo->setRuta('');
        $fichacargo->setIcono('home');
        $fichacargo->setMenu(0);
        $fichacargo->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHACARGO_CHILD));
        $manager->persist($fichacargo);

        $fichacargoin = new Modulo();
        $fichacargoin->setNombre('fichacargo_insertar');
        $fichacargoin->setTitulo('Adicionar');
        $fichacargoin->setRuta('/fichacargo_insertar');
        $fichacargoin->setIcono('home');
        $fichacargoin->setMenu(0);
        $fichacargoin->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHACARGO_CHILD));
        $manager->persist($fichacargoin);

        $fichacargoed = new Modulo();
        $fichacargoed->setNombre('fichacargo_editar');
        $fichacargoed->setTitulo('Actualizar');
        $fichacargoed->setRuta('/fichacargo_editar');
        $fichacargoed->setIcono('home');
        $fichacargoed->setMenu(0);
        $fichacargoed->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHACARGO_CHILD));
        $manager->persist($fichacargoed);

        $fichacargoel = new Modulo();
        $fichacargoel->setNombre('fichacargo_eliminar');
        $fichacargoel->setTitulo('Dar de Baja');
        $fichacargoel->setRuta('/fichacargo_eliminar');
        $fichacargoel->setIcono('home');
        $fichacargoel->setMenu(0);
        $fichacargoel->setFkmodulo($this->getReference(ModuloChildrenFixtures::FICHACARGO_CHILD));
        $manager->persist($fichacargoel);



        $documentoaso = new Modulo();
        $documentoaso->setNombre('home_documentosaso');
        $documentoaso->setTitulo('Consultar');
        $documentoaso->setRuta('');
        $documentoaso->setIcono('home');
        $documentoaso->setMenu(0);
        $documentoaso->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTOASO_CHILD));
        $manager->persist($documentoaso);

        $documentoasoin = new Modulo();
        $documentoasoin->setNombre('documentosaso_insertar');
        $documentoasoin->setTitulo('Adicionar');
        $documentoasoin->setRuta('/documentosaso_insertar');
        $documentoasoin->setIcono('home');
        $documentoasoin->setMenu(0);
        $documentoasoin->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTOASO_CHILD));
        $manager->persist($documentoasoin);

        $documentoasoed = new Modulo();
        $documentoasoed->setNombre('documentosaso_editar');
        $documentoasoed->setTitulo('Actualizar');
        $documentoasoed->setRuta('/documentosaso_editar');
        $documentoasoed->setIcono('home');
        $documentoasoed->setMenu(0);
        $documentoasoed->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTOASO_CHILD));
        $manager->persist($documentoasoed);

        $documentoasoel = new Modulo();
        $documentoasoel->setNombre('documentosaso_eliminar');
        $documentoasoel->setTitulo('Dar de Baja');
        $documentoasoel->setRuta('/documentosaso_eliminar');
        $documentoasoel->setIcono('home');
        $documentoasoel->setMenu(0);
        $documentoasoel->setFkmodulo($this->getReference(ModuloChildrenFixtures::DOCUMENTOASO_CHILD));
        $manager->persist($documentoasoel);




        $manager->flush();

        $this->addReference(self::USUARIO_HOME, $userhm);
        $this->addReference(self::USUARIO_INSERT, $userins);
        $this->addReference(self::USUARIO_EDIT, $useredt);
        $this->addReference(self::USUARIO_DELETE, $userelm);
        $this->addReference(self::ROL_HOME, $rolhm);
        $this->addReference(self::ROL_INSERT, $rolins);
        $this->addReference(self::ROL_EDIT, $roledt);
        $this->addReference(self::ROL_DELETE, $rolelm);
        $this->addReference(self::PERFIL_EDIT, $perfedt);
        $this->addReference(self::MENU_HOME, $menuhm);
        $this->addReference(self::MENU_INSERT, $menuins);
        $this->addReference(self::MENU_EDIT, $menuedt);
        $this->addReference(self::MENU_DELETE, $menuelm);
    }

    public function getDependencies()
    {
        return array(
            ModuloChildrenFixtures::class,
        );
    }
}
