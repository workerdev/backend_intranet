<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Modulo;

class ModuloFixtures extends Fixture
{
    public const USUARIO_MOD = 'mod-user';
    public const CONFIGURACION_MOD = 'mod-config';
    public const GESTION_MOD = 'mod-gest';
    public const DOCUMENTO_MOD = 'mod-doc';
    public const PROCESO_MOD = 'mod-proc';
    public const ASIGNCRTV_MOD = 'mod-asgctv';
    public const INDICADOR_MOD = 'mod-ind';
    public const AUDITORIA_MOD = 'mod-aud';
    public const ACCION_MOD = 'mod-acc';
    public const COMUNICACION_MOD = 'mod-com';
    public const CONSULTA_MOD = 'mod-cons';
    public const PERSONAL_MOD = 'mod-pers';

    public function load(ObjectManager $manager)
    {
        $usermd = new Modulo();
        $usermd->setNombre('usuarios_modulo');
        $usermd->setTitulo('Usuarios');
        $usermd->setRuta('');
        $usermd->setIcono('person');
        $usermd->setMenu(1);
        $usermd->setFkmodulo(null);
        $manager->persist($usermd);

        $confgmd = new Modulo();
        $confgmd->setNombre('configuracion_modulo');
        $confgmd->setTitulo('Configuración');
        $confgmd->setRuta('');
        $confgmd->setIcono('build');
        $confgmd->setMenu(1);
        $confgmd->setFkmodulo(null);
        $manager->persist($confgmd);

        $gestmd = new Modulo();
        $gestmd->setNombre('gestion_modulo');
        $gestmd->setTitulo('Gestión');
        $gestmd->setRuta('');
        $gestmd->setIcono('assignment');
        $gestmd->setMenu(1);
        $gestmd->setFkmodulo(null);
        $manager->persist($gestmd);

        $docmd = new Modulo();
        $docmd->setNombre('gestion_documento');
        $docmd->setTitulo('Documentos');
        $docmd->setRuta('');
        $docmd->setIcono('library_books');
        $docmd->setMenu(1);
        $docmd->setFkmodulo(null);
        $manager->persist($docmd);

        $procmd = new Modulo();
        $procmd->setNombre('procesos_modulo');
        $procmd->setTitulo('Procesos');
        $procmd->setRuta('');
        $procmd->setIcono('dashboard');
        $procmd->setMenu(1);
        $procmd->setFkmodulo(null);
        $manager->persist($procmd);

        $asgctvmd = new Modulo();
        $asgctvmd->setNombre('correlativo_modulo');
        $asgctvmd->setTitulo('Correlativos');
        $asgctvmd->setRuta('');
        $asgctvmd->setIcono('format_list_numbered');
        $asgctvmd->setMenu(1);
        $asgctvmd->setFkmodulo(null);
        $manager->persist($asgctvmd);

        $indrmd = new Modulo();
        $indrmd->setNombre('indicador_modulo');
        $indrmd->setTitulo('Indicador');
        $indrmd->setRuta('');
        $indrmd->setIcono('timeline');
        $indrmd->setMenu(1);
        $indrmd->setFkmodulo(null);
        $manager->persist($indrmd);

        $adtramd = new Modulo();
        $adtramd->setNombre('auditoria_modulo');
        $adtramd->setTitulo('Auditoría');
        $adtramd->setRuta('');
        $adtramd->setIcono('assessment');
        $adtramd->setMenu(1);
        $adtramd->setFkmodulo(null);
        $manager->persist($adtramd);

        $accmd = new Modulo();
        $accmd->setNombre('acciones_modulo');
        $accmd->setTitulo('Acciones');
        $accmd->setRuta('');
        $accmd->setIcono('input');
        $accmd->setMenu(1);
        $accmd->setFkmodulo(null);
        $manager->persist($accmd);

        $comnmd = new Modulo();
        $comnmd->setNombre('comunicacion_modulo');
        $comnmd->setTitulo('Comunicación');
        $comnmd->setRuta('');
        $comnmd->setIcono('record_voice_over');
        $comnmd->setMenu(1);
        $comnmd->setFkmodulo(null);
        $manager->persist($comnmd);
        
        $consmd = new Modulo();
        $consmd->setNombre('consulta_modulo');
        $consmd->setTitulo('Consulta');
        $consmd->setRuta('');
        $consmd->setIcono('copyright');
        $consmd->setMenu(1);
        $consmd->setFkmodulo(null);
        $manager->persist($consmd);

        $personalmd = new Modulo();
        $personalmd->setNombre('personal_modulo');
        $personalmd->setTitulo('Personal');
        $personalmd->setRuta('');
        $personalmd->setIcono('directions_walk');
        $personalmd->setMenu(1);
        $personalmd->setFkmodulo(null);
        $manager->persist($personalmd);
        
        $manager->flush();

        $this->addReference(self::USUARIO_MOD, $usermd);
        $this->addReference(self::CONFIGURACION_MOD, $confgmd);
        $this->addReference(self::GESTION_MOD, $gestmd);
        $this->addReference(self::DOCUMENTO_MOD, $docmd);
        $this->addReference(self::PROCESO_MOD, $procmd);
        $this->addReference(self::ASIGNCRTV_MOD, $asgctvmd);
        $this->addReference(self::INDICADOR_MOD, $indrmd);
        $this->addReference(self::AUDITORIA_MOD, $adtramd);
        $this->addReference(self::ACCION_MOD, $accmd);
        $this->addReference(self::COMUNICACION_MOD, $comnmd);
        $this->addReference(self::CONSULTA_MOD, $consmd);
        $this->addReference(self::PERSONAL_MOD, $personalmd);
    }
}
