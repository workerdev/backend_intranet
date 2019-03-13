<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Modulo;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ModuloChildrenFixtures extends Fixture implements DependentFixtureInterface
{
    /** MODULO DE USUARIOS **/
    public const USUARIO_CHILD = 'child-user';
    public const ROL_CHILD = 'child-rol';
    public const PERFIL_CHILD = 'child-perf';

    /** MODULO DE CONFIGURACION **/
    public const RESPONSABILIDADSOCIAL_CHILD = 'child-respsc';
    public const MENU_CHILD = 'child-menu';
    public const ENLACES_CHILD = 'child-enl';
    public const CATALOGO_CHILD = 'child-catlg';
    public const ACCIDENTE_CHILD = 'child-accdn';

    /** MODULO DE GESTION **/
    public const DOCUMENTO_CHILD = 'child-doc';
    public const DOCEXTRA_CHILD = 'child-dcext';
    public const NORMA_CHILD = 'child-nrm';
    public const TIPODOC_CHILD = 'child-tpdoc';
    public const TIPONORMA_CHILD = 'child-tpnrm';
    public const BAJADOC_CHILD = 'child-bjdoc';
    public const DOCPROCESO_CHILD = 'child-dcproc';
    public const DOCPROCREV_CHILD = 'child-dcprorv';
    public const DOCFORM_CHILD = 'child-dcfrm';
    public const DOCTIPOEXT_CHILD = 'child-dctpext';
    public const ESTADODOC_CHILD = 'child-estdoc';
    public const ESTADOSEG_CHILD = 'child-estseg';
    public const SEGUIMIENTOELAB_CHILD = 'child-segelb';

    /** MODULO DE PROCESOS **/
    public const GERENCIA_CHILD = 'child-grc';
    public const AREA_CHILD = 'child-area';
    public const SECTOR_CHILD = 'child-sec';
    public const FICHAPROC_CHILD = 'child-fchp';
    public const RIESGOPORT_CHILD = 'child-rsgopt';
    public const PROBABILIDAD_CHILD = 'child-prob';
    public const IMPACTO_CHILD = 'child-imp';
    public const PROCRELACION_CHILD = 'child-prorel';
    public const TIPORIESGOPT_CHILD = 'child-tprsgop';
    public const SEGUIMIENTORSOP_CHILD = 'child-segrsgop';
    public const GCIARSECTOR_CHILD = 'child-gciarsector';
    public const RECURSONEC_CHILD = 'child-rcnec';
    public const CONTROLCRTLVO_CHILD = 'child-ctrlctvo';
    public const GRUPORIESGO_CHILD = 'child-grprsg';
    public const ESTADORIESGO_CHILD = 'child-estrsg';

    public const TIPONOTA_CHILD = 'child-tpnota';
    public const ESTADOCRLTVO_CHILD = 'child-estctvo';
    public const TIPORECURSO_CHILD = 'child-tprec';

    /** MODULO DE INDICADORES **/
    public const INDICADORPROC_CHILD = 'child-indproc';
    public const INDICADORSEG_CHILD = 'child-indseg';
    public const UNIDADMEDIDA_CHILD = 'child-undmd';
    
    /** MODULO DE AUDITORIA **/
    public const PLANACCION_CHILD = 'child-plnac';
    public const ESTADOPLAN_CHILD = 'child-estpln';
    public const TIPOAUDITORIA_CHILD = 'child-tpadtria';
    public const AUDITORIA_CHILD = 'child-audtra';
    public const AUDITORIAEQUIPO_CHILD = 'child-eqaudtra';
    public const TIPOAUDITOR_CHILD = 'child-tpaudtr';
    public const AUDITOR_CHILD = 'child-audtr';
    public const FORTALEZA_CHILD = 'child-fort';
    public const TIPOHALLAZGO_CHILD = 'child-tphlg';
    public const HALLAZGO_CHILD = 'child-hlgadtra';
    public const ACCION_CHILD = 'child-accn';
    public const ACCIONSEGUIMIENTO_CHILD = 'child-accnseg';
    public const ACCIONREPROGRAMA_CHILD = 'child-accnrpg';
    public const ACCIONEFICACIA_CHILD = 'child-accnefc';
    public const DOCADICIONAL_CHILD = 'child-docadd';
    public const SEGUIMIENTOPLAN_CHILD = 'child-segpln';
    public const DETALLEAUDITOR_CHILD = 'child-detadtr';
    public const DETALLEDOC_CHILD = 'child-detdoc';

    /** MODULO DE ACCIONES **/
    public const ESTADONOV_CHILD = 'child-estnv';
    public const REGMEJORA_CHILD = 'child-rgmej';
    public const SEGMEJORA_CHILD = 'child-sgmej';
    public const TIPODATOEMP_CHILD = 'child-tpdtemp';
    public const DATOEMPRESARIAL_CHILD = 'child-dtemp';
    public const TIPONOVEDAD_CHILD = 'child-tpnov';

    /** MODULO DE COMUNICACION **/
    public const NOTICIA_CHILD = 'child-not';
    public const CATEGORIANOT_CHILD = 'child-catnot';
    public const NOTICIACAT_CHILD = 'child-notcat';
    public const GALERIA_CHILD = 'child-gal';
    public const FILE_CHILD = 'child-file';

    /** MODULO DE CONSULTA **/
    public const ORGANIGRAMA_CHILD = 'child-org';

    /** MODULO DE PERSONAL **/
    public const TIPOCARGO_CHILD = 'child-tpcrg';
    public const CARGO_CHILD = 'child-cargo';
    public const ESTADOPERSONAL_CHILD = 'child-estper';
    public const PERSONAL_CHILD = 'child-prsnl';
    public const TURNO_CHILD = 'child-turn';
    public const FICHACARGO_CHILD = 'child-fcargo';
    public const DOCUMENTOASO_CHILD = 'child-docaso';

    public function load(ObjectManager $manager)
    {
        /** MODULO DE USUARIOS **/
        $userprt = new Modulo();
        $userprt->setNombre('usuarios');
        $userprt->setTitulo('Usuario');
        $userprt->setRuta('/usuario');
        $userprt->setIcono('account_box');
        $userprt->setMenu(1);
        $userprt->setFkmodulo($this->getReference(ModuloFixtures::USUARIO_MOD));
        $manager->persist($userprt);

        $rolprt = new Modulo();
        $rolprt->setNombre('roles');
        $rolprt->setTitulo('Rol');
        $rolprt->setRuta('/rol');
        $rolprt->setIcono('dashboard');
        $rolprt->setMenu(1);
        $rolprt->setFkmodulo($this->getReference(ModuloFixtures::USUARIO_MOD));
        $manager->persist($rolprt);

        $perfprt = new Modulo();
        $perfprt->setNombre('perfil');
        $perfprt->setTitulo('Perfil de usuario');
        $perfprt->setRuta('/perfil');
        $perfprt->setIcono('dvr');
        $perfprt->setMenu(1);
        $perfprt->setFkmodulo($this->getReference(ModuloFixtures::USUARIO_MOD));
        $manager->persist($perfprt);


        /** MODULO DE CONFIGURACION **/
        $respscprt = new Modulo();
        $respscprt->setNombre('responsabilidad_social');
        $respscprt->setTitulo('Responsabilidad social');
        $respscprt->setRuta('/responsabilidad');
        $respscprt->setIcono('business');
        $respscprt->setMenu(1);
        $respscprt->setFkmodulo($this->getReference(ModuloFixtures::CONFIGURACION_MOD));
        $manager->persist($respscprt);

        $menuprt = new Modulo();
        $menuprt->setNombre('menu_modulo');
        $menuprt->setTitulo('Menú');
        $menuprt->setRuta('/menu');
        $menuprt->setIcono('business');
        $menuprt->setMenu(1);
        $menuprt->setFkmodulo($this->getReference(ModuloFixtures::CONFIGURACION_MOD));
        $manager->persist($menuprt);

        $enlcprt = new Modulo();
        $enlcprt->setNombre('enlaces');
        $enlcprt->setTitulo('Enlaces externos');
        $enlcprt->setRuta('/enlaces');
        $enlcprt->setIcono('business');
        $enlcprt->setMenu(1);
        $enlcprt->setFkmodulo($this->getReference(ModuloFixtures::CONFIGURACION_MOD));
        $manager->persist($enlcprt);

        $catlgprt = new Modulo();
        $catlgprt->setNombre('catalogo');
        $catlgprt->setTitulo('Catálogo');
        $catlgprt->setRuta('/catalogo');
        $catlgprt->setIcono('business');
        $catlgprt->setMenu(1);
        $catlgprt->setFkmodulo($this->getReference(ModuloFixtures::CONFIGURACION_MOD));
        $manager->persist($catlgprt);

        $tsaccprt = new Modulo();
        $tsaccprt->setNombre('accidentes');
        $tsaccprt->setTitulo('Tiempo sin accidentes');
        $tsaccprt->setRuta('/accidentes');
        $tsaccprt->setIcono('business');
        $tsaccprt->setMenu(1);
        $tsaccprt->setFkmodulo($this->getReference(ModuloFixtures::CONFIGURACION_MOD));
        $manager->persist($tsaccprt);

        
        /** MODULO DE GESTION **/
        $tpdocprt = new Modulo();
        $tpdocprt->setNombre('tipodocumento');
        $tpdocprt->setTitulo('Tipo de documento');
        $tpdocprt->setRuta('/tipodocumento');
        $tpdocprt->setIcono('business');
        $tpdocprt->setMenu(1);
        $tpdocprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($tpdocprt);

        $dctoprt = new Modulo();
        $dctoprt->setNombre('documento');
        $dctoprt->setTitulo('Documento');
        $dctoprt->setRuta('/documento');
        $dctoprt->setIcono('business');
        $dctoprt->setMenu(1);
        $dctoprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($dctoprt);

        $doctpexprt = new Modulo();
        $doctpexprt->setNombre('doctipoextra');
        $doctpexprt->setTitulo('Documento tipo extra');
        $doctpexprt->setRuta('/doctipoextra');
        $doctpexprt->setIcono('business');
        $doctpexprt->setMenu(1);
        $doctpexprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($doctpexprt);

        $docaddprt = new Modulo();
        $docaddprt->setNombre('documentoextra');
        $docaddprt->setTitulo('Documento extra');
        $docaddprt->setRuta('/documentoextra');
        $docaddprt->setIcono('business');
        $docaddprt->setMenu(1);
        $docaddprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($docaddprt);
        
        $tpnrmprt = new Modulo();
        $tpnrmprt->setNombre('tiponorma');
        $tpnrmprt->setTitulo('Tipo de norma');
        $tpnrmprt->setRuta('/tiponorma');
        $tpnrmprt->setIcono('business');
        $tpnrmprt->setMenu(1);
        $tpnrmprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($tpnrmprt);

        $nrmdocprt = new Modulo();
        $nrmdocprt->setNombre('normadocumento');
        $nrmdocprt->setTitulo('Norma del documento');
        $nrmdocprt->setRuta('/normadocumento');
        $nrmdocprt->setIcono('business');
        $nrmdocprt->setMenu(1);
        $nrmdocprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($nrmdocprt);

        $docprocprt = new Modulo();
        $docprocprt->setNombre('documentoproceso');
        $docprocprt->setTitulo('Documento en proceso');
        $docprocprt->setRuta('/documentoproceso');
        $docprocprt->setIcono('business');
        $docprocprt->setMenu(1);
        $docprocprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($docprocprt);

        $dcprorvprt = new Modulo();
        $dcprorvprt->setNombre('docprocesorev');
        $dcprorvprt->setTitulo('Documento en proceso de revisión');
        $dcprorvprt->setRuta('/docprocesorev');
        $dcprorvprt->setIcono('business');
        $dcprorvprt->setMenu(1);
        $dcprorvprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($dcprorvprt);

        $bajadocprt = new Modulo();
        $bajadocprt->setNombre('bajadocumento');
        $bajadocprt->setTitulo('Documento de baja');
        $bajadocprt->setRuta('/bajadocumento');
        $bajadocprt->setIcono('business');
        $bajadocprt->setMenu(1);
        $bajadocprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($bajadocprt);

        $docfrmprt = new Modulo();
        $docfrmprt->setNombre('documentoformulario');
        $docfrmprt->setTitulo('Documento formulario');
        $docfrmprt->setRuta('/documentoformulario');
        $docfrmprt->setIcono('business');
        $docfrmprt->setMenu(1);
        $docfrmprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($docfrmprt);

        $estdocprt = new Modulo();
        $estdocprt->setNombre('estadodocumento');
        $estdocprt->setTitulo('Estado del documento');
        $estdocprt->setRuta('/estadodocumento');
        $estdocprt->setIcono('business');
        $estdocprt->setMenu(1);
        $estdocprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($estdocprt);

        $estsegprt = new Modulo();
        $estsegprt->setNombre('estadoseguimiento');
        $estsegprt->setTitulo('Estado de seguimiento');
        $estsegprt->setRuta('/estadoseguimiento');
        $estsegprt->setIcono('business');
        $estsegprt->setMenu(1);
        $estsegprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($estsegprt);

        $segelbprt = new Modulo();
        $segelbprt->setNombre('seguimientoelaboracion');
        $segelbprt->setTitulo('Seguimiento elaboración');
        $segelbprt->setRuta('/seguimientoelaboracion');
        $segelbprt->setIcono('business');
        $segelbprt->setMenu(1);
        $segelbprt->setFkmodulo($this->getReference(ModuloFixtures::GESTION_MOD));
        $manager->persist($segelbprt);


        /** MODULO DE PROCESOS **/
        $grciaprt = new Modulo();
        $grciaprt->setNombre('gerencia');
        $grciaprt->setTitulo('Gerencia');
        $grciaprt->setRuta('/gerencia');
        $grciaprt->setIcono('business');
        $grciaprt->setMenu(1);
        $grciaprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($grciaprt);

        $areaprt = new Modulo();
        $areaprt->setNombre('area');
        $areaprt->setTitulo('Área');
        $areaprt->setRuta('/area');
        $areaprt->setIcono('business');
        $areaprt->setMenu(1);
        $areaprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($areaprt);

        $sectprt = new Modulo();
        $sectprt->setNombre('sector');
        $sectprt->setTitulo('Sector');
        $sectprt->setRuta('/sector');
        $sectprt->setIcono('business');
        $sectprt->setMenu(1);
        $sectprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($sectprt);
        
        $gciarstprt = new Modulo();
        $gciarstprt->setNombre('gciarsector');
        $gciarstprt->setTitulo('Gerencia, área y sector');
        $gciarstprt->setRuta('/gciarsector');
        $gciarstprt->setIcono('business');
        $gciarstprt->setMenu(1);
        $gciarstprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($gciarstprt);

        $fchprocprt = new Modulo();
        $fchprocprt->setNombre('fichaprocesos');
        $fchprocprt->setTitulo('Ficha de proceso');
        $fchprocprt->setRuta('/fichaprocesos');
        $fchprocprt->setIcono('business');
        $fchprocprt->setMenu(1);
        $fchprocprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($fchprocprt);

        $tpcroprt = new Modulo();
        $tpcroprt->setNombre('tipocro');
        $tpcroprt->setTitulo('Tipo de riesgo');
        $tpcroprt->setRuta('/tipocro');
        $tpcroprt->setIcono('business');
        $tpcroprt->setMenu(1);
        $tpcroprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($tpcroprt);

        $impctprt = new Modulo();
        $impctprt->setNombre('impacto');
        $impctprt->setTitulo('Impacto');
        $impctprt->setRuta('/impacto');
        $impctprt->setIcono('business');
        $impctprt->setMenu(1);
        $impctprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($impctprt);

        $probprt = new Modulo();
        $probprt->setNombre('probabilidad');
        $probprt->setTitulo('Probabilidad');
        $probprt->setRuta('/probabilidad');
        $probprt->setIcono('business');
        $probprt->setMenu(1);
        $probprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($probprt);

        $rsgoptprt = new Modulo();
        $rsgoptprt->setNombre('riesgosoportunidades');
        $rsgoptprt->setTitulo('Riesgos y oportunidades');
        $rsgoptprt->setRuta('/riesgosoportunidades');
        $rsgoptprt->setIcono('business');
        $rsgoptprt->setMenu(1);
        $rsgoptprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($rsgoptprt);
        
        $grprsgprt = new Modulo();
        $grprsgprt->setNombre('gruporiesgo');
        $grprsgprt->setTitulo('Grupo de riesgo');
        $grprsgprt->setRuta('/gruporiesgo');
        $grprsgprt->setIcono('business');
        $grprsgprt->setMenu(1);
        $grprsgprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($grprsgprt);
        
        $estrsgprt = new Modulo();
        $estrsgprt->setNombre('estadoriesgo');
        $estrsgprt->setTitulo('Estado de riesgo');
        $estrsgprt->setRuta('/estadoriesgo');
        $estrsgprt->setIcono('business');
        $estrsgprt->setMenu(1);
        $estrsgprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($estrsgprt);

        $procrelprt = new Modulo();
        $procrelprt->setNombre('procesorelacionado');
        $procrelprt->setTitulo('Proceso relacionado');
        $procrelprt->setRuta('/procesorelacionado');
        $procrelprt->setIcono('business');
        $procrelprt->setMenu(1);
        $procrelprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($procrelprt);

        $crosegprt = new Modulo();
        $crosegprt->setNombre('seguimientocro');
        $crosegprt->setTitulo('Seguimiento de riesgo');
        $crosegprt->setRuta('/seguimientocro');
        $crosegprt->setIcono('business');
        $crosegprt->setMenu(1);
        $crosegprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($crosegprt);
        
        $tprecprt = new Modulo();
        $tprecprt->setNombre('recurso');
        $tprecprt->setTitulo('Tipo de recurso');
        $tprecprt->setRuta('/recurso');
        $tprecprt->setIcono('business');
        $tprecprt->setMenu(1);
        $tprecprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($tprecprt);
        
        $recnecprt = new Modulo();
        $recnecprt->setNombre('recursonecesario');
        $recnecprt->setTitulo('Recurso necesario');
        $recnecprt->setRuta('/recursonecesario');
        $recnecprt->setIcono('business');
        $recnecprt->setMenu(1);
        $recnecprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($recnecprt);
        
        $ctlctvoprt = new Modulo();
        $ctlctvoprt->setNombre('controlcorrelativo');
        $ctlctvoprt->setTitulo('Control correlativo');
        $ctlctvoprt->setRuta('/controlcorrelativo');
        $ctlctvoprt->setIcono('business');
        $ctlctvoprt->setMenu(1);
        $ctlctvoprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($ctlctvoprt);
        
        $estctvoprt = new Modulo();
        $estctvoprt->setNombre('estadocorrelativo');
        $estctvoprt->setTitulo('Estado correlativo');
        $estctvoprt->setRuta('/estadocorrelativo');
        $estctvoprt->setIcono('business');
        $estctvoprt->setMenu(1);
        $estctvoprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($estctvoprt);
        
        $tpnotaprt = new Modulo();
        $tpnotaprt->setNombre('tiponota');
        $tpnotaprt->setTitulo('Tipo de nota');
        $tpnotaprt->setRuta('/tiponota');
        $tpnotaprt->setIcono('business');
        $tpnotaprt->setMenu(1);
        $tpnotaprt->setFkmodulo($this->getReference(ModuloFixtures::PROCESO_MOD));
        $manager->persist($tpnotaprt);

        /** MODULO DE INDICADORES **/
        $undmedprt = new Modulo();
        $undmedprt->setNombre('unidadmedida');
        $undmedprt->setTitulo('Unidad de medida');
        $undmedprt->setRuta('/unidadmedida');
        $undmedprt->setIcono('business');
        $undmedprt->setMenu(1);
        $undmedprt->setFkmodulo($this->getReference(ModuloFixtures::INDICADOR_MOD));
        $manager->persist($undmedprt);

        $indprcprt = new Modulo();
        $indprcprt->setNombre('indicadorproceso');
        $indprcprt->setTitulo('Indicador de proceso');
        $indprcprt->setRuta('/indicadorproceso');
        $indprcprt->setIcono('business');
        $indprcprt->setMenu(1);
        $indprcprt->setFkmodulo($this->getReference(ModuloFixtures::INDICADOR_MOD));
        $manager->persist($indprcprt);

        $segindprt = new Modulo();
        $segindprt->setNombre('seguimientoindicador');
        $segindprt->setTitulo('Indicador de seguimiento');
        $segindprt->setRuta('/seguimientoindicador');
        $segindprt->setIcono('business');
        $segindprt->setMenu(1);
        $segindprt->setFkmodulo($this->getReference(ModuloFixtures::INDICADOR_MOD));
        $manager->persist($segindprt);


        /** MODULO DE AUDITORIA **/
        $plnaccprt = new Modulo();
        $plnaccprt->setNombre('planaccion');
        $plnaccprt->setTitulo('Plan de acción');
        $plnaccprt->setRuta('/planaccion');
        $plnaccprt->setIcono('business');
        $plnaccprt->setMenu(1);
        $plnaccprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($plnaccprt);

        $estplnprt = new Modulo();
        $estplnprt->setNombre('estadoplan');
        $estplnprt->setTitulo('Estado de plan');
        $estplnprt->setRuta('/estadoplan');
        $estplnprt->setIcono('business');
        $estplnprt->setMenu(1);
        $estplnprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($estplnprt);

        $tpadtraprt = new Modulo();
        $tpadtraprt->setNombre('tipoauditoria');
        $tpadtraprt->setTitulo('Tipo de auditoría');
        $tpadtraprt->setRuta('/tipoauditoria');
        $tpadtraprt->setIcono('business');
        $tpadtraprt->setMenu(1);
        $tpadtraprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($tpadtraprt);

        $adtraprt = new Modulo();
        $adtraprt->setNombre('auditoria');
        $adtraprt->setTitulo('Auditoría');
        $adtraprt->setRuta('/auditoria');
        $adtraprt->setIcono('business');
        $adtraprt->setMenu(1);
        $adtraprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($adtraprt);

        $eqadtraprt = new Modulo();
        $eqadtraprt->setNombre('auditoriaequipo');
        $eqadtraprt->setTitulo('Equipo de auditoría');
        $eqadtraprt->setRuta('/auditoriaequipo');
        $eqadtraprt->setIcono('business');
        $eqadtraprt->setMenu(1);
        $eqadtraprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($eqadtraprt);

        $tpadtorprt = new Modulo();
        $tpadtorprt->setNombre('tipoauditor');
        $tpadtorprt->setTitulo('Tipo de auditor');
        $tpadtorprt->setRuta('/tipoauditor');
        $tpadtorprt->setIcono('business');
        $tpadtorprt->setMenu(1);
        $tpadtorprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($tpadtorprt);

        $adtorprt = new Modulo();
        $adtorprt->setNombre('auditor');
        $adtorprt->setTitulo('Auditor');
        $adtorprt->setRuta('/auditor');
        $adtorprt->setIcono('business');
        $adtorprt->setMenu(1);
        $adtorprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($adtorprt);

        $fortprt = new Modulo();
        $fortprt->setNombre('fortaleza');
        $fortprt->setTitulo('Fortaleza');
        $fortprt->setRuta('/fortaleza');
        $fortprt->setIcono('business');
        $fortprt->setMenu(1);
        $fortprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($fortprt);

        $tphlzgprt = new Modulo();
        $tphlzgprt->setNombre('tipohallazgo');
        $tphlzgprt->setTitulo('Tipo de hallazgo');
        $tphlzgprt->setRuta('/tipohallazgo');
        $tphlzgprt->setIcono('business');
        $tphlzgprt->setMenu(1);
        $tphlzgprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($tphlzgprt);

        $hlgadtaprt = new Modulo();
        $hlgadtaprt->setNombre('hallazgo');
        $hlgadtaprt->setTitulo('Hallazgo');
        $hlgadtaprt->setRuta('/hallazgo');
        $hlgadtaprt->setIcono('business');
        $hlgadtaprt->setMenu(1);
        $hlgadtaprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($hlgadtaprt);

        $accnprt = new Modulo();
        $accnprt->setNombre('accion');
        $accnprt->setTitulo('Acción');
        $accnprt->setRuta('/accion');
        $accnprt->setIcono('business');
        $accnprt->setMenu(1);
        $accnprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($accnprt);

        $accnsegprt = new Modulo();
        $accnsegprt->setNombre('accionseguimiento');
        $accnsegprt->setTitulo('Seguimiento de acción');
        $accnsegprt->setRuta('/accionseguimiento');
        $accnsegprt->setIcono('business');
        $accnsegprt->setMenu(1);
        $accnsegprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($accnsegprt);

        $accnrpgprt = new Modulo();
        $accnrpgprt->setNombre('accionreprograma');
        $accnrpgprt->setTitulo('Reprograma de acción');
        $accnrpgprt->setRuta('/accionreprograma');
        $accnrpgprt->setIcono('business');
        $accnrpgprt->setMenu(1);
        $accnrpgprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($accnrpgprt);

        $accnefcprt = new Modulo();
        $accnefcprt->setNombre('accioneficacia');
        $accnefcprt->setTitulo('Eficacia de la acción');
        $accnefcprt->setRuta('/accioneficacia');
        $accnefcprt->setIcono('business');
        $accnefcprt->setMenu(1);
        $accnefcprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($accnefcprt);

        $docnaddprt = new Modulo();
        $docnaddprt->setNombre('documentoadicional');
        $docnaddprt->setTitulo('Documento adicional');
        $docnaddprt->setRuta('/documentoadicional');
        $docnaddprt->setIcono('business');
        $docnaddprt->setMenu(1);
        $docnaddprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($docnaddprt);

        $segplnprt = new Modulo();
        $segplnprt->setNombre('seguimientoplan');
        $segplnprt->setTitulo('Seguimiento de plan');
        $segplnprt->setRuta('/seguimientoplan');
        $segplnprt->setIcono('business');
        $segplnprt->setMenu(1);
        $segplnprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($segplnprt);

        $dtadtorprt = new Modulo();
        $dtadtorprt->setNombre('detalleauditor');
        $dtadtorprt->setTitulo('Detalle del auditor');
        $dtadtorprt->setRuta('/detalleauditor');
        $dtadtorprt->setIcono('business');
        $dtadtorprt->setMenu(1);
        $dtadtorprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($dtadtorprt);

        $dtdocprt = new Modulo();
        $dtdocprt->setNombre('detalledocumento');
        $dtdocprt->setTitulo('Detalle del documento');
        $dtdocprt->setRuta('/detalledocumento');
        $dtdocprt->setIcono('business');
        $dtdocprt->setMenu(1);
        $dtdocprt->setFkmodulo($this->getReference(ModuloFixtures::AUDITORIA_MOD));
        $manager->persist($dtdocprt);


        /** MODULO DE ACCIONES **/
        $estnvdprt = new Modulo();
        $estnvdprt->setNombre('estadonovedad');
        $estnvdprt->setTitulo('Estado de la novedad');
        $estnvdprt->setRuta('/estadonovedad');
        $estnvdprt->setIcono('business');
        $estnvdprt->setMenu(1);
        $estnvdprt->setFkmodulo($this->getReference(ModuloFixtures::ACCION_MOD));
        $manager->persist($estnvdprt);

        $rgmejprt = new Modulo();
        $rgmejprt->setNombre('registromejora');
        $rgmejprt->setTitulo('Registro de mejora');
        $rgmejprt->setRuta('/registromejora');
        $rgmejprt->setIcono('business');
        $rgmejprt->setMenu(1);
        $rgmejprt->setFkmodulo($this->getReference(ModuloFixtures::ACCION_MOD));
        $manager->persist($rgmejprt);

        $segmejprt = new Modulo();
        $segmejprt->setNombre('seguimientomejora');
        $segmejprt->setTitulo('Seguimiento de mejora');
        $segmejprt->setRuta('/seguimientomejora');
        $segmejprt->setIcono('business');
        $segmejprt->setMenu(1);
        $segmejprt->setFkmodulo($this->getReference(ModuloFixtures::ACCION_MOD));
        $manager->persist($segmejprt);

        $tpdtemprt = new Modulo();
        $tpdtemprt->setNombre('tipodatoempresarial');
        $tpdtemprt->setTitulo('Tipo de dato empresarial');
        $tpdtemprt->setRuta('/tipodatoempresarial');
        $tpdtemprt->setIcono('business');
        $tpdtemprt->setMenu(1);
        $tpdtemprt->setFkmodulo($this->getReference(ModuloFixtures::ACCION_MOD));
        $manager->persist($tpdtemprt);

        $dtoemprt = new Modulo();
        $dtoemprt->setNombre('datoempresarial');
        $dtoemprt->setTitulo('Dato empresarial');
        $dtoemprt->setRuta('/datoempresarial');
        $dtoemprt->setIcono('business');
        $dtoemprt->setMenu(1);
        $dtoemprt->setFkmodulo($this->getReference(ModuloFixtures::ACCION_MOD));
        $manager->persist($dtoemprt);

        $tpnvdprt = new Modulo();
        $tpnvdprt->setNombre('tiponovedad');
        $tpnvdprt->setTitulo('Tipo de novedad');
        $tpnvdprt->setRuta('/tiponovedad');
        $tpnvdprt->setIcono('business');
        $tpnvdprt->setMenu(1);
        $tpnvdprt->setFkmodulo($this->getReference(ModuloFixtures::ACCION_MOD));
        $manager->persist($tpnvdprt);


        /** MODULO DE COMUNICACION **/
        $notcprt = new Modulo();
        $notcprt->setNombre('noticia');
        $notcprt->setTitulo('Noticia');
        $notcprt->setRuta('/noticia');
        $notcprt->setIcono('business');
        $notcprt->setMenu(1);
        $notcprt->setFkmodulo($this->getReference(ModuloFixtures::COMUNICACION_MOD));
        $manager->persist($notcprt);

        $catnotprt = new Modulo();
        $catnotprt->setNombre('categorianoticia');
        $catnotprt->setTitulo('Categoría de la noticia');
        $catnotprt->setRuta('/categorianoticia');
        $catnotprt->setIcono('business');
        $catnotprt->setMenu(1);
        $catnotprt->setFkmodulo($this->getReference(ModuloFixtures::COMUNICACION_MOD));
        $manager->persist($catnotprt);
        $this->addReference(self::CATEGORIANOT_CHILD, $catnotprt);

        $notcatprt = new Modulo();
        $notcatprt->setNombre('noticiacategoria');
        $notcatprt->setTitulo('Noticia categoría');
        $notcatprt->setRuta('/noticiacategoria');
        $notcatprt->setIcono('business');
        $notcatprt->setMenu(1);
        $notcatprt->setFkmodulo($this->getReference(ModuloFixtures::COMUNICACION_MOD));
        $manager->persist($notcatprt);

        $galprt = new Modulo();
        $galprt->setNombre('galeria');
        $galprt->setTitulo('Galería');
        $galprt->setRuta('/galeria');
        $galprt->setIcono('business');
        $galprt->setMenu(1);
        $galprt->setFkmodulo($this->getReference(ModuloFixtures::COMUNICACION_MOD));
        $manager->persist($galprt);

        $fileprt = new Modulo();
        $fileprt->setNombre('file');
        $fileprt->setTitulo('Files');
        $fileprt->setRuta('/files');
        $fileprt->setIcono('business');
        $fileprt->setMenu(1);
        $fileprt->setFkmodulo($this->getReference(ModuloFixtures::COMUNICACION_MOD));
        $manager->persist($fileprt);


        /** MODULO DE CONSULTA **/
        $orgprt = new Modulo();
        $orgprt->setNombre('organigrama');
        $orgprt->setTitulo('Organigrama');
        $orgprt->setRuta('/organigrama');
        $orgprt->setIcono('business');
        $orgprt->setMenu(1);
        $orgprt->setFkmodulo($this->getReference(ModuloFixtures::CONSULTA_MOD));
        $manager->persist($orgprt);


        /** MODULO DE PERSONAL **/
        $tpcrgprt = new Modulo();
        $tpcrgprt->setNombre('tipocargo');
        $tpcrgprt->setTitulo('Tipo de cargo');
        $tpcrgprt->setRuta('/tipocargo');
        $tpcrgprt->setIcono('business');
        $tpcrgprt->setMenu(1);
        $tpcrgprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($tpcrgprt);

        $cargoprt = new Modulo();
        $cargoprt->setNombre('cargo');
        $cargoprt->setTitulo('Cargos');
        $cargoprt->setRuta('/personalcargo');
        $cargoprt->setIcono('business');
        $cargoprt->setMenu(1);
        $cargoprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($cargoprt);

        $estpsnprt = new Modulo();
        $estpsnprt->setNombre('estadopersonal');
        $estpsnprt->setTitulo('Estado de personal');
        $estpsnprt->setRuta('/estadopersonal');
        $estpsnprt->setIcono('business');
        $estpsnprt->setMenu(1);
        $estpsnprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($estpsnprt);

        $prsnlprt = new Modulo();
        $prsnlprt->setNombre('personal');
        $prsnlprt->setTitulo('Personal');
        $prsnlprt->setRuta('/personal');
        $prsnlprt->setIcono('business');
        $prsnlprt->setMenu(1);
        $prsnlprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($prsnlprt);

        $turnprt = new Modulo();
        $turnprt->setNombre('turno');
        $turnprt->setTitulo('Turno');
        $turnprt->setRuta('/turno');
        $turnprt->setIcono('business');
        $turnprt->setMenu(1);
        $turnprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($turnprt);

        $fcargoprt = new Modulo();
        $fcargoprt->setNombre('fichacargo');
        $fcargoprt->setTitulo('Ficha de cargo');
        $fcargoprt->setRuta('/fichacargo');
        $fcargoprt->setIcono('business');
        $fcargoprt->setMenu(1);
        $fcargoprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($fcargoprt);

        $docuasoprt = new Modulo();
        $docuasoprt->setNombre('documentosaso');
        $docuasoprt->setTitulo('Documento asociado');
        $docuasoprt->setRuta('/documentosaso');
        $docuasoprt->setIcono('business');
        $docuasoprt->setMenu(1);
        $docuasoprt->setFkmodulo($this->getReference(ModuloFixtures::PERSONAL_MOD));
        $manager->persist($docuasoprt);
        
        
        $manager->flush();

        $this->addReference(self::USUARIO_CHILD, $userprt);
        $this->addReference(self::ROL_CHILD, $rolprt);
        $this->addReference(self::PERFIL_CHILD, $perfprt);

        $this->addReference(self::RESPONSABILIDADSOCIAL_CHILD, $respscprt);
        $this->addReference(self::MENU_CHILD, $menuprt);
        $this->addReference(self::ENLACES_CHILD, $enlcprt);
        $this->addReference(self::CATALOGO_CHILD, $catlgprt);
        $this->addReference(self::ACCIDENTE_CHILD, $tsaccprt);
        $this->addReference(self::DOCUMENTO_CHILD, $dctoprt);
        $this->addReference(self::DOCEXTRA_CHILD, $docaddprt);
        $this->addReference(self::TIPODOC_CHILD, $tpdocprt);
        $this->addReference(self::NORMA_CHILD, $nrmdocprt);
        $this->addReference(self::TIPONORMA_CHILD, $tpnrmprt);
        $this->addReference(self::DOCPROCESO_CHILD, $docprocprt);
        $this->addReference(self::DOCPROCREV_CHILD, $dcprorvprt);
        $this->addReference(self::BAJADOC_CHILD, $bajadocprt);
        $this->addReference(self::DOCFORM_CHILD, $docfrmprt);
        $this->addReference(self::DOCTIPOEXT_CHILD, $doctpexprt);
        $this->addReference(self::GERENCIA_CHILD, $grciaprt);
        $this->addReference(self::AREA_CHILD, $areaprt);
        $this->addReference(self::SECTOR_CHILD, $sectprt);
        $this->addReference(self::FICHAPROC_CHILD, $fchprocprt);
        $this->addReference(self::RIESGOPORT_CHILD, $rsgoptprt);
        $this->addReference(self::PROBABILIDAD_CHILD, $probprt);
        $this->addReference(self::IMPACTO_CHILD, $impctprt);
        $this->addReference(self::PROCRELACION_CHILD, $procrelprt);
        $this->addReference(self::TIPORIESGOPT_CHILD, $tpcroprt);
        $this->addReference(self::SEGUIMIENTORSOP_CHILD, $crosegprt);
        $this->addReference(self::GCIARSECTOR_CHILD, $gciarstprt);
        $this->addReference(self::INDICADORPROC_CHILD, $indprcprt);
        $this->addReference(self::INDICADORSEG_CHILD, $segindprt);

        $this->addReference(self::PLANACCION_CHILD, $plnaccprt);
        $this->addReference(self::ESTADOPLAN_CHILD, $estplnprt);
        $this->addReference(self::TIPOAUDITORIA_CHILD, $tpadtraprt);
        $this->addReference(self::AUDITORIA_CHILD, $adtraprt);
        $this->addReference(self::AUDITORIAEQUIPO_CHILD, $eqadtraprt);
        $this->addReference(self::TIPOAUDITOR_CHILD, $tpadtorprt);
        $this->addReference(self::AUDITOR_CHILD, $adtorprt);
        $this->addReference(self::FORTALEZA_CHILD, $fortprt);
        $this->addReference(self::TIPOHALLAZGO_CHILD, $tphlzgprt);
        $this->addReference(self::HALLAZGO_CHILD, $hlgadtaprt);
        $this->addReference(self::ACCION_CHILD, $accnprt);
        $this->addReference(self::ACCIONSEGUIMIENTO_CHILD, $accnsegprt);
        $this->addReference(self::ACCIONREPROGRAMA_CHILD, $accnrpgprt);
        $this->addReference(self::ACCIONEFICACIA_CHILD, $accnefcprt);
        $this->addReference(self::DOCADICIONAL_CHILD, $docnaddprt);
        $this->addReference(self::SEGUIMIENTOPLAN_CHILD, $segplnprt);
        $this->addReference(self::DETALLEAUDITOR_CHILD, $dtadtorprt);
        $this->addReference(self::DETALLEDOC_CHILD, $dtdocprt);

        $this->addReference(self::ESTADONOV_CHILD, $estnvdprt);
        $this->addReference(self::REGMEJORA_CHILD, $rgmejprt);
        $this->addReference(self::SEGMEJORA_CHILD, $segmejprt);
        $this->addReference(self::TIPODATOEMP_CHILD, $tpdtemprt);
        $this->addReference(self::DATOEMPRESARIAL_CHILD, $dtoemprt);
        $this->addReference(self::TIPONOVEDAD_CHILD, $tpnvdprt);
        $this->addReference(self::NOTICIA_CHILD, $notcprt);
        $this->addReference(self::NOTICIACAT_CHILD, $notcatprt);
        $this->addReference(self::GALERIA_CHILD, $galprt);
        $this->addReference(self::FILE_CHILD, $fileprt);

        $this->addReference(self::ORGANIGRAMA_CHILD, $orgprt);

        $this->addReference(self::TIPOCARGO_CHILD, $tpcrgprt);
        $this->addReference(self::CARGO_CHILD, $cargoprt);
        $this->addReference(self::ESTADOPERSONAL_CHILD, $estpsnprt);
        $this->addReference(self::PERSONAL_CHILD, $prsnlprt);
        $this->addReference(self::TURNO_CHILD, $turnprt);
        $this->addReference(self::FICHACARGO_CHILD, $fcargoprt);
        $this->addReference(self::DOCUMENTOASO_CHILD, $docuasoprt);
        
        $this->addReference(self::ESTADODOC_CHILD, $estdocprt);
        $this->addReference(self::ESTADOSEG_CHILD, $estsegprt);
        $this->addReference(self::SEGUIMIENTOELAB_CHILD, $segelbprt);
        
        $this->addReference(self::RECURSONEC_CHILD, $recnecprt);
        $this->addReference(self::CONTROLCRTLVO_CHILD, $ctlctvoprt);
        $this->addReference(self::GRUPORIESGO_CHILD, $grprsgprt);
        $this->addReference(self::ESTADORIESGO_CHILD, $estrsgprt);
        $this->addReference(self::TIPONOTA_CHILD, $tpnotaprt);
        $this->addReference(self::ESTADOCRLTVO_CHILD, $estctvoprt);
        $this->addReference(self::TIPORECURSO_CHILD, $tprecprt);

        $this->addReference(self::UNIDADMEDIDA_CHILD, $undmedprt);
    }

    public function getDependencies()
    {
        return array(
            ModuloFixtures::class,
        );
    }
}
