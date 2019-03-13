<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'doctrine.orm.default_entity_manager' shared service.

include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriver.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\Mapping\\Driver\\AnnotationDriver.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\NamingStrategy.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\QuoteStrategy.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\EntityListenerResolver.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Mapping\\EntityListenerServiceResolver.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Mapping\\ContainerAwareEntityListenerResolver.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Repository\\RepositoryFactory.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Repository\\ContainerRepositoryFactory.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Configuration.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Configuration.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\ManagerConfigurator.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\ObjectManager.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\EntityManagerInterface.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\EntityManager.php';

$a = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
$a->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()), array(0 => ($this->targetDirs[3].'\\src\\Entity'))), 'App\\Entity');

$b = new \Doctrine\ORM\Configuration();
$b->setEntityNamespaces(array('App' => 'App\\Entity'));
$b->setMetadataCacheImpl(($this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] ?? $this->load('getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService.php')));
$b->setQueryCacheImpl(($this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] ?? $this->load('getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService.php')));
$b->setResultCacheImpl(($this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] ?? $this->load('getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService.php')));
$b->setMetadataDriverImpl($a);
$b->setProxyDir(($this->targetDirs[0].'/doctrine/orm/Proxies'));
$b->setProxyNamespace('Proxies');
$b->setAutoGenerateProxyClasses(true);
$b->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
$b->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
$b->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy());
$b->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
$b->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerAwareEntityListenerResolver($this));
$b->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\ServiceLocator(array('App\\Repository\\AccidentesRepository' => function () {
    return ($this->privates['App\Repository\AccidentesRepository'] ?? $this->load('getAccidentesRepositoryService.php'));
}, 'App\\Repository\\AreaRepository' => function () {
    return ($this->privates['App\Repository\AreaRepository'] ?? $this->load('getAreaRepositoryService.php'));
}, 'App\\Repository\\AuditorRepository' => function () {
    return ($this->privates['App\Repository\AuditorRepository'] ?? $this->load('getAuditorRepositoryService.php'));
}, 'App\\Repository\\AuditoriaRepository' => function () {
    return ($this->privates['App\Repository\AuditoriaRepository'] ?? $this->load('getAuditoriaRepositoryService.php'));
}, 'App\\Repository\\CatalogoRepository' => function () {
    return ($this->privates['App\Repository\CatalogoRepository'] ?? $this->load('getCatalogoRepositoryService.php'));
}, 'App\\Repository\\CategoriaNoticiaRepository' => function () {
    return ($this->privates['App\Repository\CategoriaNoticiaRepository'] ?? $this->load('getCategoriaNoticiaRepositoryService.php'));
}, 'App\\Repository\\ConstitucionalesRepository' => function () {
    return ($this->privates['App\Repository\ConstitucionalesRepository'] ?? $this->load('getConstitucionalesRepositoryService.php'));
}, 'App\\Repository\\ControlCorrelativoRepository' => function () {
    return ($this->privates['App\Repository\ControlCorrelativoRepository'] ?? $this->load('getControlCorrelativoRepositoryService.php'));
}, 'App\\Repository\\CorreoRepository' => function () {
    return ($this->privates['App\Repository\CorreoRepository'] ?? $this->load('getCorreoRepositoryService.php'));
}, 'App\\Repository\\DatoEmpresarialRepository' => function () {
    return ($this->privates['App\Repository\DatoEmpresarialRepository'] ?? $this->load('getDatoEmpresarialRepositoryService.php'));
}, 'App\\Repository\\DetalleAuditorRepository' => function () {
    return ($this->privates['App\Repository\DetalleAuditorRepository'] ?? $this->load('getDetalleAuditorRepositoryService.php'));
}, 'App\\Repository\\DetalleDocumentoRepository' => function () {
    return ($this->privates['App\Repository\DetalleDocumentoRepository'] ?? $this->load('getDetalleDocumentoRepositoryService.php'));
}, 'App\\Repository\\DocumentacionAdicionalRepository' => function () {
    return ($this->privates['App\Repository\DocumentacionAdicionalRepository'] ?? $this->load('getDocumentacionAdicionalRepositoryService.php'));
}, 'App\\Repository\\DocumentoAdicionalRepository' => function () {
    return ($this->privates['App\Repository\DocumentoAdicionalRepository'] ?? $this->load('getDocumentoAdicionalRepositoryService.php'));
}, 'App\\Repository\\EnlacesRepository' => function () {
    return ($this->privates['App\Repository\EnlacesRepository'] ?? $this->load('getEnlacesRepositoryService.php'));
}, 'App\\Repository\\EstadoCorrelativoRepository' => function () {
    return ($this->privates['App\Repository\EstadoCorrelativoRepository'] ?? $this->load('getEstadoCorrelativoRepositoryService.php'));
}, 'App\\Repository\\EstadoDocumentoRepository' => function () {
    return ($this->privates['App\Repository\EstadoDocumentoRepository'] ?? $this->load('getEstadoDocumentoRepositoryService.php'));
}, 'App\\Repository\\EstadoNovedadRepository' => function () {
    return ($this->privates['App\Repository\EstadoNovedadRepository'] ?? $this->load('getEstadoNovedadRepositoryService.php'));
}, 'App\\Repository\\EstadoPersonalRepository' => function () {
    return ($this->privates['App\Repository\EstadoPersonalRepository'] ?? $this->load('getEstadoPersonalRepositoryService.php'));
}, 'App\\Repository\\EstadoPlanRepository' => function () {
    return ($this->privates['App\Repository\EstadoPlanRepository'] ?? $this->load('getEstadoPlanRepositoryService.php'));
}, 'App\\Repository\\EstadoRiesgoRepository' => function () {
    return ($this->privates['App\Repository\EstadoRiesgoRepository'] ?? $this->load('getEstadoRiesgoRepositoryService.php'));
}, 'App\\Repository\\EstadoSeguimientoRepository' => function () {
    return ($this->privates['App\Repository\EstadoSeguimientoRepository'] ?? $this->load('getEstadoSeguimientoRepositoryService.php'));
}, 'App\\Repository\\FichaProcesosRepository' => function () {
    return ($this->privates['App\Repository\FichaProcesosRepository'] ?? $this->load('getFichaProcesosRepositoryService.php'));
}, 'App\\Repository\\FilesRepository' => function () {
    return ($this->privates['App\Repository\FilesRepository'] ?? $this->load('getFilesRepositoryService.php'));
}, 'App\\Repository\\GaleriaRepository' => function () {
    return ($this->privates['App\Repository\GaleriaRepository'] ?? $this->load('getGaleriaRepositoryService.php'));
}, 'App\\Repository\\GerenciaRepository' => function () {
    return ($this->privates['App\Repository\GerenciaRepository'] ?? $this->load('getGerenciaRepositoryService.php'));
}, 'App\\Repository\\GrupoRiesgoRepository' => function () {
    return ($this->privates['App\Repository\GrupoRiesgoRepository'] ?? $this->load('getGrupoRiesgoRepositoryService.php'));
}, 'App\\Repository\\HallazgoAuditoriaRepository' => function () {
    return ($this->privates['App\Repository\HallazgoAuditoriaRepository'] ?? $this->load('getHallazgoAuditoriaRepositoryService.php'));
}, 'App\\Repository\\ImpactoRepository' => function () {
    return ($this->privates['App\Repository\ImpactoRepository'] ?? $this->load('getImpactoRepositoryService.php'));
}, 'App\\Repository\\IndicadorProcesoRepository' => function () {
    return ($this->privates['App\Repository\IndicadorProcesoRepository'] ?? $this->load('getIndicadorProcesoRepositoryService.php'));
}, 'App\\Repository\\InformacionDocumentadaRepository' => function () {
    return ($this->privates['App\Repository\InformacionDocumentadaRepository'] ?? $this->load('getInformacionDocumentadaRepositoryService.php'));
}, 'App\\Repository\\MenuRepository' => function () {
    return ($this->privates['App\Repository\MenuRepository'] ?? $this->load('getMenuRepositoryService.php'));
}, 'App\\Repository\\MisionRepository' => function () {
    return ($this->privates['App\Repository\MisionRepository'] ?? $this->load('getMisionRepositoryService.php'));
}, 'App\\Repository\\NoticiaCategoriaRepository' => function () {
    return ($this->privates['App\Repository\NoticiaCategoriaRepository'] ?? $this->load('getNoticiaCategoriaRepositoryService.php'));
}, 'App\\Repository\\NoticiaRepository' => function () {
    return ($this->privates['App\Repository\NoticiaRepository'] ?? $this->load('getNoticiaRepositoryService.php'));
}, 'App\\Repository\\PersonalRepository' => function () {
    return ($this->privates['App\Repository\PersonalRepository'] ?? $this->load('getPersonalRepositoryService.php'));
}, 'App\\Repository\\PlanAccionRepository' => function () {
    return ($this->privates['App\Repository\PlanAccionRepository'] ?? $this->load('getPlanAccionRepositoryService.php'));
}, 'App\\Repository\\ProbabilidadRepository' => function () {
    return ($this->privates['App\Repository\ProbabilidadRepository'] ?? $this->load('getProbabilidadRepositoryService.php'));
}, 'App\\Repository\\ProcesosCargoRepository' => function () {
    return ($this->privates['App\Repository\ProcesosCargoRepository'] ?? $this->load('getProcesosCargoRepositoryService.php'));
}, 'App\\Repository\\RecursoNecesarioRepository' => function () {
    return ($this->privates['App\Repository\RecursoNecesarioRepository'] ?? $this->load('getRecursoNecesarioRepositoryService.php'));
}, 'App\\Repository\\RecursoRepository' => function () {
    return ($this->privates['App\Repository\RecursoRepository'] ?? $this->load('getRecursoRepositoryService.php'));
}, 'App\\Repository\\RegistroMejoraRepository' => function () {
    return ($this->privates['App\Repository\RegistroMejoraRepository'] ?? $this->load('getRegistroMejoraRepositoryService.php'));
}, 'App\\Repository\\RiesgosOportunidadesRepository' => function () {
    return ($this->privates['App\Repository\RiesgosOportunidadesRepository'] ?? $this->load('getRiesgosOportunidadesRepositoryService.php'));
}, 'App\\Repository\\SectorRepository' => function () {
    return ($this->privates['App\Repository\SectorRepository'] ?? $this->load('getSectorRepositoryService.php'));
}, 'App\\Repository\\SeguimientoElaboracionRepository' => function () {
    return ($this->privates['App\Repository\SeguimientoElaboracionRepository'] ?? $this->load('getSeguimientoElaboracionRepositoryService.php'));
}, 'App\\Repository\\SeguimientoIndicadorRepository' => function () {
    return ($this->privates['App\Repository\SeguimientoIndicadorRepository'] ?? $this->load('getSeguimientoIndicadorRepositoryService.php'));
}, 'App\\Repository\\SeguimientoMejoraRepository' => function () {
    return ($this->privates['App\Repository\SeguimientoMejoraRepository'] ?? $this->load('getSeguimientoMejoraRepositoryService.php'));
}, 'App\\Repository\\SeguimientoPlanRepository' => function () {
    return ($this->privates['App\Repository\SeguimientoPlanRepository'] ?? $this->load('getSeguimientoPlanRepositoryService.php'));
}, 'App\\Repository\\SeguimientoRepository' => function () {
    return ($this->privates['App\Repository\SeguimientoRepository'] ?? $this->load('getSeguimientoRepositoryService.php'));
}, 'App\\Repository\\TipoCargoRepository' => function () {
    return ($this->privates['App\Repository\TipoCargoRepository'] ?? $this->load('getTipoCargoRepositoryService.php'));
}, 'App\\Repository\\TipoConstitucionalRepository' => function () {
    return ($this->privates['App\Repository\TipoConstitucionalRepository'] ?? $this->load('getTipoConstitucionalRepositoryService.php'));
}, 'App\\Repository\\TipoDatoEmpresarialRepository' => function () {
    return ($this->privates['App\Repository\TipoDatoEmpresarialRepository'] ?? $this->load('getTipoDatoEmpresarialRepositoryService.php'));
}, 'App\\Repository\\TipoDocumentoRepository' => function () {
    return ($this->privates['App\Repository\TipoDocumentoRepository'] ?? $this->load('getTipoDocumentoRepositoryService.php'));
}, 'App\\Repository\\TipoHallazgoRepository' => function () {
    return ($this->privates['App\Repository\TipoHallazgoRepository'] ?? $this->load('getTipoHallazgoRepositoryService.php'));
}, 'App\\Repository\\TipoNormaRepository' => function () {
    return ($this->privates['App\Repository\TipoNormaRepository'] ?? $this->load('getTipoNormaRepositoryService.php'));
}, 'App\\Repository\\TipoNotaRepository' => function () {
    return ($this->privates['App\Repository\TipoNotaRepository'] ?? $this->load('getTipoNotaRepositoryService.php'));
}, 'App\\Repository\\TipoNovedadRepository' => function () {
    return ($this->privates['App\Repository\TipoNovedadRepository'] ?? $this->load('getTipoNovedadRepositoryService.php'));
}, 'App\\Repository\\TurnoRepository' => function () {
    return ($this->privates['App\Repository\TurnoRepository'] ?? $this->load('getTurnoRepositoryService.php'));
}, 'App\\Repository\\UnidadMedidaRepository' => function () {
    return ($this->privates['App\Repository\UnidadMedidaRepository'] ?? $this->load('getUnidadMedidaRepositoryService.php'));
}, 'App\\Repository\\UsuarioRepository' => function () {
    return ($this->privates['App\Repository\UsuarioRepository'] ?? $this->load('getUsuarioRepositoryService.php'));
}))));

$this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(($this->services['doctrine.dbal.default_connection'] ?? $this->load('getDoctrine_Dbal_DefaultConnectionService.php')), $b);

(new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array()))->configure($instance);

return $instance;