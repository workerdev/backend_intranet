<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = $allowSchemes = [];
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), ['HEAD', 'GET'], true)) {
            // no-op
        } elseif ($allowSchemes) {
            redirect_scheme:
            $scheme = $this->context->getScheme();
            $this->context->setScheme(key($allowSchemes));
            try {
                if ($ret = $this->doMatch($pathinfo)) {
                    return $this->redirect($pathinfo, $ret['_route'], $this->context->getScheme()) + $ret;
                }
            } finally {
                $this->context->setScheme($scheme);
            }
        } elseif ('/' !== $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/') {
            $pathinfo = $trimmedPathinfo === $pathinfo ? $pathinfo.'/' : $trimmedPathinfo;
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $pathinfo, array &$allow = [], array &$allowSchemes = []): array
    {
        $allow = $allowSchemes = [];
        $pathinfo = rawurldecode($pathinfo) ?: '/';
        $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/';
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($trimmedPathinfo) {
            case '/sesion':
                // sesion
                if ('/' !== $pathinfo && $trimmedPathinfo !== $pathinfo) {
                    goto not_sesion;
                }

                $ret = ['_route' => 'sesion', '_controller' => 'App\\Controller\\SecurityController::login'];
                if (!isset(($a = ['POST' => 0])[$requestMethod])) {
                    $allow += $a;
                    goto not_sesion;
                }

                return $ret;
                not_sesion:
                // sesion7
                if ('/' !== $pathinfo && $trimmedPathinfo !== $pathinfo) {
                    goto not_sesion7;
                }

                $ret = ['_route' => 'sesion7', '_controller' => 'App\\Controller\\SecurityController::login7'];
                if (!isset(($a = ['POST' => 0])[$requestMethod])) {
                    $allow += $a;
                    goto not_sesion7;
                }

                return $ret;
                not_sesion7:
                break;
            default:
                $routes = [
                    '/acceso' => [['_route' => 'acceso_listar', '_controller' => 'App\\Controller\\AccesoController::index'], null, null, null, false],
                    '/acceso_insertar' => [['_route' => 'acceso_insertar', '_controller' => 'App\\Controller\\AccesoController::insertar'], null, ['POST' => 0], null, false],
                    '/acceso_actualizar' => [['_route' => 'acceso_actualizar', '_controller' => 'App\\Controller\\AccesoController::actualizar'], null, ['POST' => 0], null, false],
                    '/acceso_editar' => [['_route' => 'acceso_editar', '_controller' => 'App\\Controller\\AccesoController::editar'], null, ['POST' => 0], null, false],
                    '/acceso_eliminar' => [['_route' => 'acceso_eliminar', '_controller' => 'App\\Controller\\AccesoController::eliminar'], null, ['POST' => 0], null, false],
                    '/accidentes' => [['_route' => 'accidentes', '_controller' => 'App\\Controller\\AccidentesController::index'], null, null, null, false],
                    '/accidentes_eliminar' => [['_route' => 'accidentes_eliminar', '_controller' => 'App\\Controller\\AccidentesController::eliminar'], null, ['POST' => 0], null, false],
                    '/accidentes_actualizar' => [['_route' => 'accidentes_actualizar', '_controller' => 'App\\Controller\\AccidentesController::actualizar'], null, ['POST' => 0], null, false],
                    '/accidentes_editar' => [['_route' => 'accidentes_editar', '_controller' => 'App\\Controller\\AccidentesController::editar'], null, ['POST' => 0], null, false],
                    '/accidentes_reset' => [['_route' => 'accidentes_reset', '_controller' => 'App\\Controller\\AccidentesController::reset'], null, ['POST' => 0], null, false],
                    '/accion' => [['_route' => 'accion_listar', '_controller' => 'App\\Controller\\AccionController::index'], null, null, null, false],
                    '/accion_insertar' => [['_route' => 'accion_insertar', '_controller' => 'App\\Controller\\AccionController::insertar'], null, ['POST' => 0], null, false],
                    '/accion_actualizar' => [['_route' => 'accion_actualizar', '_controller' => 'App\\Controller\\AccionController::actualizar'], null, ['POST' => 0], null, false],
                    '/accion_editar' => [['_route' => 'accion_editar', '_controller' => 'App\\Controller\\AccionController::editar'], null, ['POST' => 0], null, false],
                    '/accion_prev' => [['_route' => 'accion_prev', '_controller' => 'App\\Controller\\AccionController::accion_prev'], null, ['POST' => 0], null, false],
                    '/accion_eliminar' => [['_route' => 'accion_eliminar', '_controller' => 'App\\Controller\\AccionController::eliminar'], null, ['POST' => 0], null, false],
                    '/accion_listall' => [['_route' => 'accion_listall', '_controller' => 'App\\Controller\\AccionController::list_all'], null, ['POST' => 0], null, false],
                    '/accion_obtener' => [['_route' => 'accion_obtener', '_controller' => 'App\\Controller\\AccionController::obtener'], null, ['POST' => 0], null, false],
                    '/accioneficacia' => [['_route' => 'accioneficacia_listar', '_controller' => 'App\\Controller\\AccionEficaciaController::index'], null, null, null, false],
                    '/accioneficacia_insertar' => [['_route' => 'accioneficacia_insertar', '_controller' => 'App\\Controller\\AccionEficaciaController::insertar'], null, ['POST' => 0], null, false],
                    '/accioneficacia_actualizar' => [['_route' => 'accioneficacia_actualizar', '_controller' => 'App\\Controller\\AccionEficaciaController::actualizar'], null, ['POST' => 0], null, false],
                    '/accioneficacia_editar' => [['_route' => 'accioneficacia_editar', '_controller' => 'App\\Controller\\AccionEficaciaController::editar'], null, ['POST' => 0], null, false],
                    '/accioneficacia_eliminar' => [['_route' => 'accioneficacia_eliminar', '_controller' => 'App\\Controller\\AccionEficaciaController::eliminar'], null, ['POST' => 0], null, false],
                    '/accionreprograma' => [['_route' => 'accionreprograma_listar', '_controller' => 'App\\Controller\\AccionReprogramaController::index'], null, null, null, false],
                    '/accionreprograma_insertar' => [['_route' => 'accionreprograma_insertar', '_controller' => 'App\\Controller\\AccionReprogramaController::insertar'], null, ['POST' => 0], null, false],
                    '/accionreprograma_actualizar' => [['_route' => 'accionreprograma_actualizar', '_controller' => 'App\\Controller\\AccionReprogramaController::actualizar'], null, ['POST' => 0], null, false],
                    '/accionreprograma_editar' => [['_route' => 'accionreprograma_editar', '_controller' => 'App\\Controller\\AccionReprogramaController::editar'], null, ['POST' => 0], null, false],
                    '/dateformat' => [['_route' => 'dateformat', '_controller' => 'App\\Controller\\AccionReprogramaController::darformato'], null, ['POST' => 0], null, false],
                    '/accionreprograma_eliminar' => [['_route' => 'accionreprograma_eliminar', '_controller' => 'App\\Controller\\AccionReprogramaController::eliminar'], null, ['POST' => 0], null, false],
                    '/accionseguimiento' => [['_route' => 'accionseguimiento_listar', '_controller' => 'App\\Controller\\AccionSeguimientoController::index'], null, null, null, false],
                    '/accionseguimiento_insertar' => [['_route' => 'accionseguimiento_insertar', '_controller' => 'App\\Controller\\AccionSeguimientoController::insertar'], null, ['POST' => 0], null, false],
                    '/accionseguimiento_insertrpg' => [['_route' => 'accionseguimiento_insertrpg', '_controller' => 'App\\Controller\\AccionSeguimientoController::insert_reprog'], null, ['POST' => 0], null, false],
                    '/accionseguimiento_actualizar' => [['_route' => 'accionseguimiento_actualizar', '_controller' => 'App\\Controller\\AccionSeguimientoController::actualizar'], null, ['POST' => 0], null, false],
                    '/accionseguimiento_editar' => [['_route' => 'accionseguimiento_editar', '_controller' => 'App\\Controller\\AccionSeguimientoController::editar'], null, ['POST' => 0], null, false],
                    '/accionseguimiento_eliminar' => [['_route' => 'accionseguimiento_eliminar', '_controller' => 'App\\Controller\\AccionSeguimientoController::eliminar'], null, ['POST' => 0], null, false],
                    '/area' => [['_route' => 'area', '_controller' => 'App\\Controller\\AreaController::index'], null, null, null, false],
                    '/area_insertar' => [['_route' => 'area_insertar', '_controller' => 'App\\Controller\\AreaController::insertar'], null, ['POST' => 0], null, false],
                    '/area_actualizar' => [['_route' => 'area_actualizar', '_controller' => 'App\\Controller\\AreaController::actualizar'], null, ['POST' => 0], null, false],
                    '/area_editar' => [['_route' => 'area_editar', '_controller' => 'App\\Controller\\AreaController::editar'], null, ['POST' => 0], null, false],
                    '/area_prev' => [['_route' => 'area_prev', '_controller' => 'App\\Controller\\AreaController::area_prev'], null, ['POST' => 0], null, false],
                    '/area_eliminar' => [['_route' => 'area_eliminar', '_controller' => 'App\\Controller\\AreaController::eliminar'], null, ['POST' => 0], null, false],
                    '/auditor' => [['_route' => 'auditor', '_controller' => 'App\\Controller\\AuditorController::index'], null, null, null, false],
                    '/auditor_insertar' => [['_route' => 'auditor_insertar', '_controller' => 'App\\Controller\\AuditorController::insertar'], null, ['POST' => 0], null, false],
                    '/auditor_actualizar' => [['_route' => 'auditor_actualizar', '_controller' => 'App\\Controller\\AuditorController::actualizar'], null, ['POST' => 0], null, false],
                    '/auditor_editar' => [['_route' => 'auditor_editar', '_controller' => 'App\\Controller\\AuditorController::editar'], null, ['POST' => 0], null, false],
                    '/auditor_prev' => [['_route' => 'auditor_prev', '_controller' => 'App\\Controller\\AuditorController::auditor_prev'], null, ['POST' => 0], null, false],
                    '/auditor_eliminar' => [['_route' => 'auditor_eliminar', '_controller' => 'App\\Controller\\AuditorController::eliminar'], null, ['POST' => 0], null, false],
                    '/auditoria' => [['_route' => 'auditoria', '_controller' => 'App\\Controller\\AuditoriaController::index'], null, null, null, false],
                    '/auditoria_insertar' => [['_route' => 'auditoria_insertar', '_controller' => 'App\\Controller\\AuditoriaController::insertar'], null, ['POST' => 0], null, false],
                    '/auditoria_actualizar' => [['_route' => 'auditoria_actualizar', '_controller' => 'App\\Controller\\AuditoriaController::actualizar'], null, ['POST' => 0], null, false],
                    '/auditoria_editar' => [['_route' => 'auditoria_editar', '_controller' => 'App\\Controller\\AuditoriaController::editar'], null, ['POST' => 0], null, false],
                    '/auditoria_prev' => [['_route' => 'auditoria_prev', '_controller' => 'App\\Controller\\AuditoriaController::auditoria_prev'], null, ['POST' => 0], null, false],
                    '/auditoria_eliminar' => [['_route' => 'auditoria_eliminar', '_controller' => 'App\\Controller\\AuditoriaController::eliminar'], null, ['POST' => 0], null, false],
                    '/auditoria_documentos' => [['_route' => 'auditoria_documentos', '_controller' => 'App\\Controller\\AuditoriaController::documentos'], null, ['POST' => 0], null, false],
                    '/auditoriaequipo' => [['_route' => 'auditoriaequipo', '_controller' => 'App\\Controller\\AuditoriaEquipoController::index'], null, null, null, false],
                    '/auditoriaequipo_insertar' => [['_route' => 'auditoriaequipo_insertar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::insertar'], null, ['POST' => 0], null, false],
                    '/auditoriaequipo_actualizar' => [['_route' => 'auditoriaequipo_actualizar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::actualizar'], null, ['POST' => 0], null, false],
                    '/auditoriaequipo_editar' => [['_route' => 'auditoriaequipo_editar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::editar'], null, ['POST' => 0], null, false],
                    '/auditoriaequipo_eliminar' => [['_route' => 'auditoriaequipo_eliminar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::eliminar'], null, ['POST' => 0], null, false],
                    '/equipoaud_insertar' => [['_route' => 'equipoaud_insertar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::insert_group'], null, ['POST' => 0], null, false],
                    '/equipoaud_editar' => [['_route' => 'equipoaud_editar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::edit_group'], null, ['POST' => 0], null, false],
                    '/auditoriatipo' => [['_route' => 'auditoriatipo', '_controller' => 'App\\Controller\\AuditoriaTipoController::index'], null, null, null, false],
                    '/auditoriatipo_insertar' => [['_route' => 'auditoriatipo_insertar', '_controller' => 'App\\Controller\\AuditoriaTipoController::insertar'], null, ['POST' => 0], null, false],
                    '/auditoriatipo_actualizar' => [['_route' => 'auditoriatipo_actualizar', '_controller' => 'App\\Controller\\AuditoriaTipoController::actualizar'], null, ['POST' => 0], null, false],
                    '/auditoriatipo_editar' => [['_route' => 'auditoriatipo_editar', '_controller' => 'App\\Controller\\AuditoriaTipoController::editar'], null, ['POST' => 0], null, false],
                    '/auditoriatipo_eliminar' => [['_route' => 'auditoriatipo_eliminar', '_controller' => 'App\\Controller\\AuditoriaTipoController::eliminar'], null, ['POST' => 0], null, false],
                    '/croseguimiento' => [['_route' => 'croseguimiento', '_controller' => 'App\\Controller\\CROSeguimientoController::index'], null, null, null, false],
                    '/croseguimiento_insertar' => [['_route' => 'croseguimiento_insertar', '_controller' => 'App\\Controller\\CROSeguimientoController::insertar'], null, ['POST' => 0], null, false],
                    '/croseguimiento_actualizar' => [['_route' => 'croseguimiento_actualizar', '_controller' => 'App\\Controller\\CROSeguimientoController::actualizar'], null, ['POST' => 0], null, false],
                    '/croseguimiento_editar' => [['_route' => 'croseguimiento_editar', '_controller' => 'App\\Controller\\CROSeguimientoController::editar'], null, ['POST' => 0], null, false],
                    '/croseguimiento_eliminar' => [['_route' => 'croseguimiento_eliminar', '_controller' => 'App\\Controller\\CROSeguimientoController::eliminar'], null, ['POST' => 0], null, false],
                    '/catalogo' => [['_route' => 'catalogo', '_controller' => 'App\\Controller\\CatalogoController::index'], null, null, null, false],
                    '/catalogo_insertar' => [['_route' => 'catalogo_insertar', '_controller' => 'App\\Controller\\CatalogoController::insertar'], null, ['POST' => 0], null, false],
                    '/catalogo_actualizar' => [['_route' => 'catalogo_actualizar', '_controller' => 'App\\Controller\\CatalogoController::actualizar'], null, ['POST' => 0], null, false],
                    '/catalogo_editar' => [['_route' => 'catalogo_editar', '_controller' => 'App\\Controller\\CatalogoController::editar'], null, ['POST' => 0], null, false],
                    '/catalogo_eliminar' => [['_route' => 'catalogo_eliminar', '_controller' => 'App\\Controller\\CatalogoController::eliminar'], null, ['POST' => 0], null, false],
                    '/categorianoticia' => [['_route' => 'categoria_noticia', '_controller' => 'App\\Controller\\CategoriaNoticiaController::index'], null, null, null, false],
                    '/categorianoticia_insertar' => [['_route' => 'categorianoticia_insertar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::insertar'], null, ['POST' => 0], null, false],
                    '/categorianoticia_actualizar' => [['_route' => 'categorianoticia_actualizar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::actualizar'], null, ['POST' => 0], null, false],
                    '/categorianoticia_editar' => [['_route' => 'categorianoticia_editar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::editar'], null, ['POST' => 0], null, false],
                    '/categoria_prev' => [['_route' => 'categoria_prev', '_controller' => 'App\\Controller\\CategoriaNoticiaController::categoria_prev'], null, ['POST' => 0], null, false],
                    '/categorianoticia_eliminar' => [['_route' => 'categorianoticia_eliminar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::eliminar'], null, ['POST' => 0], null, false],
                    '/cobertura' => [['_route' => 'cobertura', '_controller' => 'App\\Controller\\CoberturaController::index'], null, null, null, false],
                    '/cobertura_insertar' => [['_route' => 'cobertura_insertar', '_controller' => 'App\\Controller\\CoberturaController::insertar'], null, ['POST' => 0], null, false],
                    '/cobertura_actualizar' => [['_route' => 'cobertura_actualizar', '_controller' => 'App\\Controller\\CoberturaController::actualizar'], null, ['POST' => 0], null, false],
                    '/cobertura_editar' => [['_route' => 'cobertura_editar', '_controller' => 'App\\Controller\\CoberturaController::editar'], null, ['POST' => 0], null, false],
                    '/cobertura_eliminar' => [['_route' => 'cobertura_eliminar', '_controller' => 'App\\Controller\\CoberturaController::eliminar'], null, ['POST' => 0], null, false],
                    '/controlcorrelativo' => [['_route' => 'controlcorrelativo_listar', '_controller' => 'App\\Controller\\ControlCorrelativoController::index'], null, null, null, false],
                    '/controlcorrelativo_insertar' => [['_route' => 'controlcorrelativo_insertar', '_controller' => 'App\\Controller\\ControlCorrelativoController::insertar'], null, ['POST' => 0], null, false],
                    '/controlcorrelativo_actualizar' => [['_route' => 'controlcorrelativo_actualizar', '_controller' => 'App\\Controller\\ControlCorrelativoController::actualizar'], null, ['POST' => 0], null, false],
                    '/controlcorrelativo_editar' => [['_route' => 'controlcorrelativo_editar', '_controller' => 'App\\Controller\\ControlCorrelativoController::editar'], null, ['POST' => 0], null, false],
                    '/controlcorrelativo_eliminar' => [['_route' => 'controlcorrelativo_eliminar', '_controller' => 'App\\Controller\\ControlCorrelativoController::eliminar'], null, ['POST' => 0], null, false],
                    '/ctrlcorrelativo_prev' => [['_route' => 'ctrlcorrelativo_prev', '_controller' => 'App\\Controller\\ControlCorrelativoController::ctrlcorrelativo_prev'], null, ['POST' => 0], null, false],
                    '/correlativo' => [['_route' => 'correlativo_listar', '_controller' => 'App\\Controller\\CorrelativoController::index'], null, ['GET' => 0, 'POST' => 1], null, false],
                    '/correlativo_editar' => [['_route' => 'correlativo_editar', '_controller' => 'App\\Controller\\CorrelativoController::editar'], null, ['POST' => 0], null, false],
                    '/correlativo_filtro' => [['_route' => 'correlativo_filtro', '_controller' => 'App\\Controller\\CorrelativoController::filter'], null, ['POST' => 0], null, false],
                    '/obtener_unidad' => [['_route' => 'obtener_unidad', '_controller' => 'App\\Controller\\CorrelativoController::obtener_unidad'], null, ['POST' => 0], null, false],
                    '/correlativo_eliminar' => [['_route' => 'correlativo_eliminar', '_controller' => 'App\\Controller\\CorrelativoController::eliminar'], null, ['POST' => 0], null, false],
                    '/correo' => [['_route' => 'correo', '_controller' => 'App\\Controller\\CorreoController::index'], null, ['GET' => 0, 'POST' => 1], null, false],
                    '/datoempresarial' => [['_route' => 'datoempresarial_listar', '_controller' => 'App\\Controller\\DatoEmpresarialController::index'], null, null, null, false],
                    '/datoempresarial_insertar' => [['_route' => 'datoempresarial_insertar', '_controller' => 'App\\Controller\\DatoEmpresarialController::insertar'], null, ['POST' => 0], null, false],
                    '/datoempresarial_actualizar' => [['_route' => 'datoempresarial_actualizar', '_controller' => 'App\\Controller\\DatoEmpresarialController::actualizar'], null, ['POST' => 0], null, false],
                    '/datoempresarial_editar' => [['_route' => 'datoempresarial_editar', '_controller' => 'App\\Controller\\DatoEmpresarialController::editar'], null, ['POST' => 0], null, false],
                    '/datoempresarial_eliminar' => [['_route' => 'datoempresarial_eliminar', '_controller' => 'App\\Controller\\DatoEmpresarialController::eliminar'], null, ['POST' => 0], null, false],
                    '/delautoridad' => [['_route' => 'delautoridad', '_controller' => 'App\\Controller\\DelegacionAutoridadController::index'], null, ['GET' => 0, 'POST' => 1], null, false],
                    '/delautoridad_editar' => [['_route' => 'delautoridad_editar', '_controller' => 'App\\Controller\\DelegacionAutoridadController::editar'], null, ['POST' => 0], null, false],
                    '/delautoridad_eliminar' => [['_route' => 'delautoridad_eliminar', '_controller' => 'App\\Controller\\DelegacionAutoridadController::eliminar'], null, ['POST' => 0], null, false],
                    '/detalleauditor' => [['_route' => 'detalleauditor_listar', '_controller' => 'App\\Controller\\DetalleAuditorController::index'], null, null, null, false],
                    '/detalleauditor_insertar' => [['_route' => 'detalleauditor_insertar', '_controller' => 'App\\Controller\\DetalleAuditorController::insertar'], null, ['POST' => 0], null, false],
                    '/detalleauditor_actualizar' => [['_route' => 'detalleauditor_actualizar', '_controller' => 'App\\Controller\\DetalleAuditorController::actualizar'], null, ['POST' => 0], null, false],
                    '/detalleauditor_editar' => [['_route' => 'detalleauditor_editar', '_controller' => 'App\\Controller\\DetalleAuditorController::editar'], null, ['POST' => 0], null, false],
                    '/detalleauditor_eliminar' => [['_route' => 'detalleauditor_eliminar', '_controller' => 'App\\Controller\\DetalleAuditorController::eliminar'], null, ['POST' => 0], null, false],
                    '/detalledocumento' => [['_route' => 'detalledocumento_listar', '_controller' => 'App\\Controller\\DetalleDocumentoController::index'], null, null, null, false],
                    '/detalledocumento_insertar' => [['_route' => 'detalledocumento_insertar', '_controller' => 'App\\Controller\\DetalleDocumentoController::insertar'], null, ['POST' => 0], null, false],
                    '/detalledocumento_actualizar' => [['_route' => 'detalledocumento_actualizar', '_controller' => 'App\\Controller\\DetalleDocumentoController::actualizar'], null, ['POST' => 0], null, false],
                    '/detalledocumento_editar' => [['_route' => 'detalledocumento_editar', '_controller' => 'App\\Controller\\DetalleDocumentoController::editar'], null, ['POST' => 0], null, false],
                    '/detalledocumento_eliminar' => [['_route' => 'detalledocumento_eliminar', '_controller' => 'App\\Controller\\DetalleDocumentoController::eliminar'], null, ['POST' => 0], null, false],
                    '/docprocesorev' => [['_route' => 'docprocesorev', '_controller' => 'App\\Controller\\DocProcRevisionController::index'], null, null, null, false],
                    '/docprocesorev_insertar' => [['_route' => 'docprocesorev_insertar', '_controller' => 'App\\Controller\\DocProcRevisionController::insertar'], null, ['POST' => 0], null, false],
                    '/docprocesorev_derivar' => [['_route' => 'docprocesorev_derivar', '_controller' => 'App\\Controller\\DocProcRevisionController::derivar'], null, ['POST' => 0], null, false],
                    '/docprocesorev_aprorec' => [['_route' => 'docprocesorev_aprorec', '_controller' => 'App\\Controller\\DocProcRevisionController::aprorec'], null, ['POST' => 0], null, false],
                    '/docprocesorev_actualizar' => [['_route' => 'docprocesorev_actualizar', '_controller' => 'App\\Controller\\DocProcRevisionController::actualizar'], null, ['POST' => 0], null, false],
                    '/docprocesorev_editar' => [['_route' => 'docprocesorev_editar', '_controller' => 'App\\Controller\\DocProcRevisionController::editar'], null, ['POST' => 0], null, false],
                    '/docprocrevision_editar' => [['_route' => 'docprocrevision_editar', '_controller' => 'App\\Controller\\DocProcRevisionController::editar_rev'], null, ['POST' => 0], null, false],
                    '/docrev_prev' => [['_route' => 'docrev_prev', '_controller' => 'App\\Controller\\DocProcRevisionController::docrev_prev'], null, ['POST' => 0], null, false],
                    '/docprocesorev_eliminar' => [['_route' => 'docprocesorev_eliminar', '_controller' => 'App\\Controller\\DocProcRevisionController::eliminar'], null, ['POST' => 0], null, false],
                    '/doctipoextra' => [['_route' => 'doctipoextra', '_controller' => 'App\\Controller\\DocTipoExtraController::index'], null, null, null, false],
                    '/doctipoextra_insertar' => [['_route' => 'doctipoextra_insertar', '_controller' => 'App\\Controller\\DocTipoExtraController::insertar'], null, ['POST' => 0], null, false],
                    '/doctipoextra_actualizar' => [['_route' => 'doctipoextra_actualizar', '_controller' => 'App\\Controller\\DocTipoExtraController::actualizar'], null, ['POST' => 0], null, false],
                    '/doctipoextra_editar' => [['_route' => 'doctipoextra_editar', '_controller' => 'App\\Controller\\DocTipoExtraController::editar'], null, ['POST' => 0], null, false],
                    '/tipoext_prev' => [['_route' => 'tipoext_prev', '_controller' => 'App\\Controller\\DocTipoExtraController::tipoext_prev'], null, ['POST' => 0], null, false],
                    '/doctipoextra_eliminar' => [['_route' => 'doctipoextra_eliminar', '_controller' => 'App\\Controller\\DocTipoExtraController::eliminar'], null, ['POST' => 0], null, false],
                    '/documentoadicional' => [['_route' => 'documentoadicional', '_controller' => 'App\\Controller\\DocumentoAdicionalController::index'], null, null, null, false],
                    '/documento_adicional_insertar' => [['_route' => 'documento_adicional_insertar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::insertar'], null, ['POST' => 0], null, false],
                    '/documento_adicional_actualizar' => [['_route' => 'documento_adicional_actualizar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::actualizar'], null, ['POST' => 0], null, false],
                    '/documento_adicional_editar' => [['_route' => 'documento_adicional_editar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::editar'], null, ['POST' => 0], null, false],
                    '/documento_adicional_eliminar' => [['_route' => 'documento_adicional_eliminar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::eliminar'], null, ['POST' => 0], null, false],
                    '/bajadocumento' => [['_route' => 'bajadocumento_listar', '_controller' => 'App\\Controller\\DocumentoBajaController::index'], null, null, null, false],
                    '/bajadocumento_editar' => [['_route' => 'bajadocumento_editar', '_controller' => 'App\\Controller\\DocumentoBajaController::editar'], null, ['POST' => 0], null, false],
                    '/bajadocumento_eliminar' => [['_route' => 'bajadocumento_eliminar', '_controller' => 'App\\Controller\\DocumentoBajaController::eliminar'], null, ['POST' => 0], null, false],
                    '/documento' => [['_route' => 'documento_listar', '_controller' => 'App\\Controller\\DocumentoController::index'], null, null, null, false],
                    '/documento_insertar' => [['_route' => 'documento_insertar', '_controller' => 'App\\Controller\\DocumentoController::insertar'], null, ['POST' => 0], null, false],
                    '/documento_actualizar' => [['_route' => 'documento_actualizar', '_controller' => 'App\\Controller\\DocumentoController::actualizar'], null, ['POST' => 0], null, false],
                    '/documento_editar' => [['_route' => 'documento_editar', '_controller' => 'App\\Controller\\DocumentoController::editar'], null, ['POST' => 0], null, false],
                    '/documento_prev' => [['_route' => 'documento_prev', '_controller' => 'App\\Controller\\DocumentoController::documento_prev'], null, ['POST' => 0], null, false],
                    '/documento_eliminar' => [['_route' => 'documento_eliminar', '_controller' => 'App\\Controller\\DocumentoController::eliminar'], null, ['POST' => 0], null, false],
                    '/documento_tipodoc' => [['_route' => 'documento_tipodoc', '_controller' => 'App\\Controller\\DocumentoController::tipodoc'], null, ['POST' => 0], null, false],
                    '/documento_alldoc' => [['_route' => 'documento_alldoc', '_controller' => 'App\\Controller\\DocumentoController::alldoc'], null, ['POST' => 0], null, false],
                    '/documentoextra' => [['_route' => 'documentoextra_listar', '_controller' => 'App\\Controller\\DocumentoExtraController::index'], null, null, null, false],
                    '/documentoextra_editar' => [['_route' => 'documentoextra_editar', '_controller' => 'App\\Controller\\DocumentoExtraController::editar'], null, ['POST' => 0], null, false],
                    '/documentoextra_eliminar' => [['_route' => 'documentoextra_eliminar', '_controller' => 'App\\Controller\\DocumentoExtraController::eliminar'], null, ['POST' => 0], null, false],
                    '/documentoformulario' => [['_route' => 'documentoformulario', '_controller' => 'App\\Controller\\DocumentoFormularioController::index'], null, null, null, false],
                    '/documentoformulario_editar' => [['_route' => 'documentoformulario_editar', '_controller' => 'App\\Controller\\DocumentoFormularioController::editar'], null, ['POST' => 0], null, false],
                    '/documentoformulario_eliminar' => [['_route' => 'documentoformulario_eliminar', '_controller' => 'App\\Controller\\DocumentoFormularioController::eliminar'], null, ['POST' => 0], null, false],
                    '/documentoproceso' => [['_route' => 'documentoproceso_listar', '_controller' => 'App\\Controller\\DocumentoProcesoController::index'], null, null, null, false],
                    '/documentoproceso_insertar' => [['_route' => 'documentoproceso_insertar', '_controller' => 'App\\Controller\\DocumentoProcesoController::insertardoc'], null, ['POST' => 0], null, false],
                    '/docproc_prev' => [['_route' => 'docproc_prev', '_controller' => 'App\\Controller\\DocumentoProcesoController::docproc_prev'], null, ['POST' => 0], null, false],
                    '/documentoproceso_eliminar' => [['_route' => 'documentoproceso_eliminar', '_controller' => 'App\\Controller\\DocumentoProcesoController::eliminar'], null, ['POST' => 0], null, false],
                    '/documentoproceso_editar' => [['_route' => 'documentoproceso_editar', '_controller' => 'App\\Controller\\DocumentoProcesoController::editar'], null, ['POST' => 0], null, false],
                    '/revision_insertar' => [['_route' => 'revision_insertar', '_controller' => 'App\\Controller\\DocumentoProcesoController::insertar_rev'], null, ['POST' => 0], null, false],
                    '/revision_actualizar' => [['_route' => 'revision_actualizar', '_controller' => 'App\\Controller\\DocumentoProcesoController::actualizar_rev'], null, ['POST' => 0], null, false],
                    '/documentoproceso_userderiv' => [['_route' => 'documentoproceso_userderiv', '_controller' => 'App\\Controller\\DocumentoProcesoController::userderiv'], null, ['POST' => 0], null, false],
                    '/documentoproceso_getdoc' => [['_route' => 'documentoproceso_getdoc', '_controller' => 'App\\Controller\\DocumentoProcesoController::get_documento'], null, ['POST' => 0], null, false],
                    '/documentoproceso_uploadfile' => [['_route' => 'documentoproceso_uploadfile', '_controller' => 'App\\Controller\\DocumentoProcesoController::uploadfile'], null, ['POST' => 0], null, false],
                    '/documentoproceso_finalrev' => [['_route' => 'documentoproceso_finalrev', '_controller' => 'App\\Controller\\DocumentoProcesoController::finalrev'], null, ['POST' => 0], null, false],
                    '/documentosaso' => [['_route' => 'documentosaso_listar', '_controller' => 'App\\Controller\\DocumentosAsoController::index'], null, null, null, false],
                    '/documentosaso_insertar' => [['_route' => 'documentosaso_insertar', '_controller' => 'App\\Controller\\DocumentosAsoController::insertar'], null, ['POST' => 0], null, false],
                    '/documentosaso_actualizar' => [['_route' => 'documentosaso_actualizar', '_controller' => 'App\\Controller\\DocumentosAsoController::actualizar'], null, ['POST' => 0], null, false],
                    '/documentosaso_editar' => [['_route' => 'documentosaso_editar', '_controller' => 'App\\Controller\\DocumentosAsoController::editar'], null, ['POST' => 0], null, false],
                    '/documentosaso_eliminar' => [['_route' => 'documentosaso_eliminar', '_controller' => 'App\\Controller\\DocumentosAsoController::eliminar'], null, ['POST' => 0], null, false],
                    '/enlaces' => [['_route' => 'enlaces', '_controller' => 'App\\Controller\\EnlacesController::index'], null, null, null, false],
                    '/enlaces_actualizar' => [['_route' => 'enlaces_actualizar', '_controller' => 'App\\Controller\\EnlacesController::actualizar'], null, ['POST' => 0], null, false],
                    '/enlaces_editar' => [['_route' => 'enlaces_editar', '_controller' => 'App\\Controller\\EnlacesController::editar'], null, ['POST' => 0], null, false],
                    '/enlaces_eliminar' => [['_route' => 'enlaces_eliminar', '_controller' => 'App\\Controller\\EnlacesController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadocorrelativo' => [['_route' => 'estadocorrelativo', '_controller' => 'App\\Controller\\EstadoCorrelativoController::index'], null, null, null, false],
                    '/estadocorrelativo_insertar' => [['_route' => 'estadocorrelativo_insertar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::insertar'], null, ['POST' => 0], null, false],
                    '/estadocorrelativo_actualizar' => [['_route' => 'estadocorrelativo_actualizar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadocorrelativo_editar' => [['_route' => 'estadocorrelativo_editar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::editar'], null, ['POST' => 0], null, false],
                    '/estadocorrelativo_eliminar' => [['_route' => 'estadocorrelativo_eliminar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadocrtv_prev' => [['_route' => 'estadocrtv_prev', '_controller' => 'App\\Controller\\EstadoCorrelativoController::estadocrtv_prev'], null, ['POST' => 0], null, false],
                    '/estadodocumento' => [['_route' => 'estadodocumento', '_controller' => 'App\\Controller\\EstadoDocumentoController::index'], null, null, null, false],
                    '/estadodocumento_insertar' => [['_route' => 'estadodocumento_insertar', '_controller' => 'App\\Controller\\EstadoDocumentoController::insertar'], null, ['POST' => 0], null, false],
                    '/estadodocumento_actualizar' => [['_route' => 'estadodocumento_actualizar', '_controller' => 'App\\Controller\\EstadoDocumentoController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadodocumento_editar' => [['_route' => 'estadodocumento_editar', '_controller' => 'App\\Controller\\EstadoDocumentoController::editar'], null, ['POST' => 0], null, false],
                    '/estadodocumento_eliminar' => [['_route' => 'estadodocumento_eliminar', '_controller' => 'App\\Controller\\EstadoDocumentoController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadonovedad' => [['_route' => 'estadonovedad', '_controller' => 'App\\Controller\\EstadoNovedadController::index'], null, null, null, false],
                    '/estadonovedad_insertar' => [['_route' => 'estadonovedad_insertar', '_controller' => 'App\\Controller\\EstadoNovedadController::insertar'], null, ['POST' => 0], null, false],
                    '/estadonovedad_actualizar' => [['_route' => 'estadonovedad_actualizar', '_controller' => 'App\\Controller\\EstadoNovedadController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadonovedad_editar' => [['_route' => 'estadonovedad_editar', '_controller' => 'App\\Controller\\EstadoNovedadController::editar'], null, ['POST' => 0], null, false],
                    '/estadonovedad_eliminar' => [['_route' => 'estadonovedad_eliminar', '_controller' => 'App\\Controller\\EstadoNovedadController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadopersonal' => [['_route' => 'estadopersonal', '_controller' => 'App\\Controller\\EstadoPersonalController::index'], null, null, null, false],
                    '/estadopersonal_insertar' => [['_route' => 'estadopersonal_insertar', '_controller' => 'App\\Controller\\EstadoPersonalController::insertar'], null, ['POST' => 0], null, false],
                    '/estadopersonal_actualizar' => [['_route' => 'estadopersonal_actualizar', '_controller' => 'App\\Controller\\EstadoPersonalController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadopersonal_editar' => [['_route' => 'estadopersonal_editar', '_controller' => 'App\\Controller\\EstadoPersonalController::editar'], null, ['POST' => 0], null, false],
                    '/estado_prev' => [['_route' => 'estado_prev', '_controller' => 'App\\Controller\\EstadoPersonalController::estado_prev'], null, ['POST' => 0], null, false],
                    '/estadopersonal_eliminar' => [['_route' => 'estadopersonal_eliminar', '_controller' => 'App\\Controller\\EstadoPersonalController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadoplan' => [['_route' => 'estadoplan', '_controller' => 'App\\Controller\\EstadoPlanController::index'], null, null, null, false],
                    '/estadoplan_insertar' => [['_route' => 'estadoplan_insertar', '_controller' => 'App\\Controller\\EstadoPlanController::insertar'], null, ['POST' => 0], null, false],
                    '/estadoplan_actualizar' => [['_route' => 'estadoplan_actualizar', '_controller' => 'App\\Controller\\EstadoPlanController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadoplan_editar' => [['_route' => 'estadoplan_editar', '_controller' => 'App\\Controller\\EstadoPlanController::editar'], null, ['POST' => 0], null, false],
                    '/estadoplan_eliminar' => [['_route' => 'estadoplan_eliminar', '_controller' => 'App\\Controller\\EstadoPlanController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadoriesgo' => [['_route' => 'EstadoRiesgo', '_controller' => 'App\\Controller\\EstadoRiesgoController::index'], null, null, null, false],
                    '/estadoriesgo_insertar' => [['_route' => 'estadoriesgo_insertar', '_controller' => 'App\\Controller\\EstadoRiesgoController::insertar'], null, ['POST' => 0], null, false],
                    '/estadoriesgo_actualizar' => [['_route' => 'estadoriesgo_actualizar', '_controller' => 'App\\Controller\\EstadoRiesgoController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadoriesgo_editar' => [['_route' => 'estadoriesgo_editar', '_controller' => 'App\\Controller\\EstadoRiesgoController::editar'], null, ['POST' => 0], null, false],
                    '/estadoriesgo_eliminar' => [['_route' => 'estadoriesgo_eliminar', '_controller' => 'App\\Controller\\EstadoRiesgoController::eliminar'], null, ['POST' => 0], null, false],
                    '/estadoseguimiento' => [['_route' => 'estadoseguimiento', '_controller' => 'App\\Controller\\EstadoSeguimientoController::index'], null, null, null, false],
                    '/estadoseguimiento_insertar' => [['_route' => 'estadoseguimiento_insertar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::insertar'], null, ['POST' => 0], null, false],
                    '/estadoseguimiento_actualizar' => [['_route' => 'estadoseguimiento_actualizar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::actualizar'], null, ['POST' => 0], null, false],
                    '/estadoseguimiento_editar' => [['_route' => 'estadoseguimiento_editar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::editar'], null, ['POST' => 0], null, false],
                    '/estadoseguimiento_eliminar' => [['_route' => 'estadoseguimiento_eliminar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::eliminar'], null, ['POST' => 0], null, false],
                    '/fichacargo' => [['_route' => 'fichacargo_listar', '_controller' => 'App\\Controller\\FichaCargoController::index'], null, null, null, false],
                    '/fichacargo_editar' => [['_route' => 'fichacargo_editar', '_controller' => 'App\\Controller\\FichaCargoController::editar'], null, ['POST' => 0], null, false],
                    '/ficha_prev' => [['_route' => 'ficha_prev', '_controller' => 'App\\Controller\\FichaCargoController::ficha_prev'], null, ['POST' => 0], null, false],
                    '/fichacargo_eliminar' => [['_route' => 'fichacargo_eliminar', '_controller' => 'App\\Controller\\FichaCargoController::eliminar'], null, ['POST' => 0], null, false],
                    '/fichacargo_aprobarfcjefe' => [['_route' => 'fichacargo_aprobarfcjefe', '_controller' => 'App\\Controller\\FichaCargoController::aprobarfcjefe'], null, ['POST' => 0], null, false],
                    '/fichacargo_aprobarfcgerente' => [['_route' => 'fichacargo_aprobarfcgerente', '_controller' => 'App\\Controller\\FichaCargoController::aprobarfcgerente'], null, ['POST' => 0], null, false],
                    '/fichaprocesos' => [['_route' => 'fichaprocesos_listar', '_controller' => 'App\\Controller\\FichaProcesosController::index'], null, null, null, false],
                    '/fichaprocesos_insertar' => [['_route' => 'fichaprocesos_insertar', '_controller' => 'App\\Controller\\FichaProcesosController::insertar'], null, ['POST' => 0], null, false],
                    '/fichaprocesos_actualizar' => [['_route' => 'fichaprocesos_actualizar', '_controller' => 'App\\Controller\\FichaProcesosController::actualizar'], null, ['POST' => 0], null, false],
                    '/fichaprocesos_editar' => [['_route' => 'fichaprocesos_editar', '_controller' => 'App\\Controller\\FichaProcesosController::editar'], null, ['POST' => 0], null, false],
                    '/fichaproc_prev' => [['_route' => 'fichaproc_prev', '_controller' => 'App\\Controller\\FichaProcesosController::fichaproc_prev'], null, ['POST' => 0], null, false],
                    '/fichaprocesos_eliminar' => [['_route' => 'fichaprocesos_eliminar', '_controller' => 'App\\Controller\\FichaProcesosController::eliminar'], null, ['POST' => 0], null, false],
                    '/files' => [['_route' => 'file_listar', '_controller' => 'App\\Controller\\FileController::index'], null, ['GET' => 0, 'POST' => 1], null, false],
                    '/files_actualizar' => [['_route' => 'files_actualizar', '_controller' => 'App\\Controller\\FileController::actualizar'], null, ['POST' => 0], null, false],
                    '/files_editar' => [['_route' => 'files_editar', '_controller' => 'App\\Controller\\FileController::editar'], null, ['POST' => 0], null, false],
                    '/files_eliminar' => [['_route' => 'files_eliminar', '_controller' => 'App\\Controller\\FileController::eliminar'], null, ['POST' => 0], null, false],
                    '/fortaleza' => [['_route' => 'fortaleza', '_controller' => 'App\\Controller\\FortalezaController::index'], null, null, null, false],
                    '/fortaleza_insertar' => [['_route' => 'fortaleza_insertar', '_controller' => 'App\\Controller\\FortalezaController::insertar'], null, ['POST' => 0], null, false],
                    '/fortaleza_actualizar' => [['_route' => 'fortaleza_actualizar', '_controller' => 'App\\Controller\\FortalezaController::actualizar'], null, ['POST' => 0], null, false],
                    '/fortaleza_editar' => [['_route' => 'fortaleza_editar', '_controller' => 'App\\Controller\\FortalezaController::editar'], null, ['POST' => 0], null, false],
                    '/fortaleza_eliminar' => [['_route' => 'fortaleza_eliminar', '_controller' => 'App\\Controller\\FortalezaController::eliminar'], null, ['POST' => 0], null, false],
                    '/fortaleza_listall' => [['_route' => 'fortaleza_listall', '_controller' => 'App\\Controller\\FortalezaController::list_all'], null, ['POST' => 0], null, false],
                    '/galeria' => [['_route' => 'galeria', '_controller' => 'App\\Controller\\GaleriaController::index'], null, null, null, false],
                    '/galeria_insertar' => [['_route' => 'galeria_insertar', '_controller' => 'App\\Controller\\GaleriaController::insertar'], null, ['POST' => 0], null, false],
                    '/galeria_actualizar' => [['_route' => 'galeria_actualizar', '_controller' => 'App\\Controller\\GaleriaController::actualizar'], null, ['POST' => 0], null, false],
                    '/galeria_editar' => [['_route' => 'galeria_editar', '_controller' => 'App\\Controller\\GaleriaController::editar'], null, ['POST' => 0], null, false],
                    '/galeria_eliminar' => [['_route' => 'galeria_eliminar', '_controller' => 'App\\Controller\\GaleriaController::eliminar'], null, ['POST' => 0], null, false],
                    '/gciarsector' => [['_route' => 'gciarsector', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::index'], null, null, null, false],
                    '/gciarsector_insertar' => [['_route' => 'gciarsector_insertar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::insertar'], null, ['POST' => 0], null, false],
                    '/gciarsector_actualizar' => [['_route' => 'gciarsector_actualizar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::actualizar'], null, ['POST' => 0], null, false],
                    '/gciarsector_editar' => [['_route' => 'gciarsectoreditar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::editar'], null, ['POST' => 0], null, false],
                    '/gciarsector_prev' => [['_route' => 'gciarsector_prev', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::gciarsector_prev'], null, ['POST' => 0], null, false],
                    '/gciarsector_eliminar' => [['_route' => 'gciarsector_eliminar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::eliminar'], null, ['POST' => 0], null, false],
                    '/gerencia' => [['_route' => 'gerencia', '_controller' => 'App\\Controller\\GerenciaController::index'], null, null, null, false],
                    '/gerencia_insertar' => [['_route' => 'gerencia_insertar', '_controller' => 'App\\Controller\\GerenciaController::insertar'], null, ['POST' => 0], null, false],
                    '/gerencia_actualizar' => [['_route' => 'gerencia_actualizar', '_controller' => 'App\\Controller\\GerenciaController::actualizar'], null, ['POST' => 0], null, false],
                    '/gerencia_editar' => [['_route' => 'gerencia_editar', '_controller' => 'App\\Controller\\GerenciaController::editar'], null, ['POST' => 0], null, false],
                    '/gerencia_prev' => [['_route' => 'gerencia_prev', '_controller' => 'App\\Controller\\GerenciaController::gerencia_prev'], null, ['POST' => 0], null, false],
                    '/gerencia_eliminar' => [['_route' => 'gerencia_eliminar', '_controller' => 'App\\Controller\\GerenciaController::eliminar'], null, ['POST' => 0], null, false],
                    '/grupocorreo' => [['_route' => 'grupocorreo', '_controller' => 'App\\Controller\\GrupoCorreoController::index'], null, null, null, false],
                    '/grupocorreo_insertar' => [['_route' => 'grupocorreo_insertar', '_controller' => 'App\\Controller\\GrupoCorreoController::insertar'], null, ['POST' => 0], null, false],
                    '/grupocorreo_actualizar' => [['_route' => 'grupocorreo_actualizar', '_controller' => 'App\\Controller\\GrupoCorreoController::actualizar'], null, ['POST' => 0], null, false],
                    '/grupocorreo_editar' => [['_route' => 'grupocorreo_editar', '_controller' => 'App\\Controller\\GrupoCorreoController::editar'], null, ['POST' => 0], null, false],
                    '/grupocorreo_eliminar' => [['_route' => 'grupocorreo_eliminar', '_controller' => 'App\\Controller\\GrupoCorreoController::eliminar'], null, ['POST' => 0], null, false],
                    '/gruporiesgo' => [['_route' => 'gruporiesgo', '_controller' => 'App\\Controller\\GrupoRiesgoController::index'], null, null, null, false],
                    '/gruporiesgo_insertar' => [['_route' => 'gruporiesgo_insertar', '_controller' => 'App\\Controller\\GrupoRiesgoController::insertar'], null, ['POST' => 0], null, false],
                    '/gruporiesgo_actualizar' => [['_route' => 'gruporiesgo_actualizar', '_controller' => 'App\\Controller\\GrupoRiesgoController::actualizar'], null, ['POST' => 0], null, false],
                    '/gruporiesgo_editar' => [['_route' => 'gruporiesgo_editar', '_controller' => 'App\\Controller\\GrupoRiesgoController::editar'], null, ['POST' => 0], null, false],
                    '/gruporiesgo_eliminar' => [['_route' => 'gruporiesgo_eliminar', '_controller' => 'App\\Controller\\GrupoRiesgoController::eliminar'], null, ['POST' => 0], null, false],
                    '/hallazgo' => [['_route' => 'hallazgo_listar', '_controller' => 'App\\Controller\\HallazgoController::index'], null, null, null, false],
                    '/hallazgo_insertar' => [['_route' => 'hallazgo_insertar', '_controller' => 'App\\Controller\\HallazgoController::insertar'], null, ['POST' => 0], null, false],
                    '/hallazgo_actualizar' => [['_route' => 'hallazgo_actualizar', '_controller' => 'App\\Controller\\HallazgoController::actualizar'], null, ['POST' => 0], null, false],
                    '/hallazgo_editar' => [['_route' => 'hallazgo_editar', '_controller' => 'App\\Controller\\HallazgoController::editar'], null, ['POST' => 0], null, false],
                    '/hallazgo_prev' => [['_route' => 'hallazgo_prev', '_controller' => 'App\\Controller\\HallazgoController::hallazgo_prev'], null, ['POST' => 0], null, false],
                    '/hallazgo_eliminar' => [['_route' => 'hallazgo_eliminar', '_controller' => 'App\\Controller\\HallazgoController::eliminar'], null, ['POST' => 0], null, false],
                    '/hallazgo_listall' => [['_route' => 'hallazgo_listall', '_controller' => 'App\\Controller\\HallazgoController::list_all'], null, ['POST' => 0], null, false],
                    '/hallazgo_filteraud' => [['_route' => 'hallazgo_filteraud', '_controller' => 'App\\Controller\\HallazgoController::filter_aud'], null, ['POST' => 0], null, false],
                    '/impacto' => [['_route' => 'impacto', '_controller' => 'App\\Controller\\ImpactoController::index'], null, null, null, false],
                    '/impacto_insertar' => [['_route' => 'impacto_insertar', '_controller' => 'App\\Controller\\ImpactoController::insertar'], null, ['POST' => 0], null, false],
                    '/impacto_actualizar' => [['_route' => 'impacto_actualizar', '_controller' => 'App\\Controller\\ImpactoController::actualizar'], null, ['POST' => 0], null, false],
                    '/impacto_editar' => [['_route' => 'impacto_editar', '_controller' => 'App\\Controller\\ImpactoController::editar'], null, ['POST' => 0], null, false],
                    '/impacto_prev' => [['_route' => 'impacto_prev', '_controller' => 'App\\Controller\\ImpactoController::impacto_prev'], null, ['POST' => 0], null, false],
                    '/impacto_eliminar' => [['_route' => 'impacto_eliminar', '_controller' => 'App\\Controller\\ImpactoController::eliminar'], null, ['POST' => 0], null, false],
                    '/' => [['_route' => 'elfec_listar', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false],
                    '/indicadorproceso' => [['_route' => 'indicadorproceso_listar', '_controller' => 'App\\Controller\\IndicadorProcesoController::index'], null, null, null, false],
                    '/indicadorproceso_insertar' => [['_route' => 'indicadorproceso_insertar', '_controller' => 'App\\Controller\\IndicadorProcesoController::insertar'], null, ['POST' => 0], null, false],
                    '/indicadorproceso_actualizar' => [['_route' => 'indicadorproceso_actualizar', '_controller' => 'App\\Controller\\IndicadorProcesoController::actualizar'], null, ['POST' => 0], null, false],
                    '/indicadorproceso_editar' => [['_route' => 'indicadorproceso_editar', '_controller' => 'App\\Controller\\IndicadorProcesoController::editar'], null, ['POST' => 0], null, false],
                    '/indicador_prev' => [['_route' => 'indicador_prev', '_controller' => 'App\\Controller\\IndicadorProcesoController::indicador_prev'], null, ['POST' => 0], null, false],
                    '/indicadorproceso_eliminar' => [['_route' => 'indicadorproceso_eliminar', '_controller' => 'App\\Controller\\IndicadorProcesoController::eliminar'], null, ['POST' => 0], null, false],
                    '/menu' => [['_route' => 'menu', '_controller' => 'App\\Controller\\MenuController::index'], null, null, null, false],
                    '/menu_insertar' => [['_route' => 'menu_insertar', '_controller' => 'App\\Controller\\MenuController::insertar'], null, ['POST' => 0], null, false],
                    '/menu_actualizar' => [['_route' => 'menu_actualizar', '_controller' => 'App\\Controller\\MenuController::actualizar'], null, ['POST' => 0], null, false],
                    '/menu_editar' => [['_route' => 'menu_editar', '_controller' => 'App\\Controller\\MenuController::editar'], null, ['POST' => 0], null, false],
                    '/menu_eliminar' => [['_route' => 'menu_eliminar', '_controller' => 'App\\Controller\\MenuController::eliminar'], null, ['POST' => 0], null, false],
                    '/mision' => [['_route' => 'mision', '_controller' => 'App\\Controller\\MisionController::index'], null, null, null, false],
                    '/modulo' => [['_route' => 'modulo_listar', '_controller' => 'App\\Controller\\ModuloController::index'], null, null, null, false],
                    '/modulo_insertar' => [['_route' => 'modulo_insertar', '_controller' => 'App\\Controller\\ModuloController::insertar'], null, ['POST' => 0], null, false],
                    '/modulo_actualizar' => [['_route' => 'modulo_actualizar', '_controller' => 'App\\Controller\\ModuloController::actualizar'], null, ['POST' => 0], null, false],
                    '/modulo_editar' => [['_route' => 'modulo_editar', '_controller' => 'App\\Controller\\ModuloController::editar'], null, ['POST' => 0], null, false],
                    '/modulo_eliminar' => [['_route' => 'modulo_eliminar', '_controller' => 'App\\Controller\\ModuloController::eliminar'], null, ['POST' => 0], null, false],
                    '/normadocumento' => [['_route' => 'normadocumento_listar', '_controller' => 'App\\Controller\\NormaDocumentoController::index'], null, null, null, false],
                    '/normadocumento_insertar' => [['_route' => 'normadocumento_insertar', '_controller' => 'App\\Controller\\NormaDocumentoController::insertar'], null, ['POST' => 0], null, false],
                    '/normadocumento_actualizar' => [['_route' => 'normadocumento_actualizar', '_controller' => 'App\\Controller\\NormaDocumentoController::actualizar'], null, ['POST' => 0], null, false],
                    '/normadocumento_editar' => [['_route' => 'normadocumento_editar', '_controller' => 'App\\Controller\\NormaDocumentoController::editar'], null, ['POST' => 0], null, false],
                    '/normadocumento_eliminar' => [['_route' => 'normadocumento_eliminar', '_controller' => 'App\\Controller\\NormaDocumentoController::eliminar'], null, ['POST' => 0], null, false],
                    '/noticiacategoria' => [['_route' => 'noticiacategoria_listar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::index'], null, null, null, false],
                    '/noticiacategoria_lista' => [['_route' => 'noticiacategoria_lista', '_controller' => 'App\\Controller\\NoticiaCategoriaController::mostrar'], null, ['GET' => 0], null, false],
                    '/noticiacategoria_insertar' => [['_route' => 'noticiacategoria_insertar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::insertar'], null, ['POST' => 0], null, false],
                    '/noticiacategoria_actualizar' => [['_route' => 'noticiacategoria_actualizar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::actualizar'], null, ['POST' => 0], null, false],
                    '/noticiacategoria_editar' => [['_route' => 'noticiacategoria_editar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::editar'], null, ['POST' => 0], null, false],
                    '/noticiacategoria_eliminar' => [['_route' => 'noticiacategoria_eliminar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::eliminar'], null, ['POST' => 0], null, false],
                    '/noticia' => [['_route' => 'noticia', '_controller' => 'App\\Controller\\NoticiaController::index'], null, null, null, false],
                    '/noticia_insertar' => [['_route' => 'noticia_insertar', '_controller' => 'App\\Controller\\NoticiaController::insertar'], null, ['POST' => 0], null, false],
                    '/noticia_actualizar' => [['_route' => 'noticia_actualizar', '_controller' => 'App\\Controller\\NoticiaController::actualizar'], null, ['POST' => 0], null, false],
                    '/noticia_editar' => [['_route' => 'noticia_editar', '_controller' => 'App\\Controller\\NoticiaController::editar'], null, ['POST' => 0], null, false],
                    '/noticia_eliminar' => [['_route' => 'noticia_eliminar', '_controller' => 'App\\Controller\\NoticiaController::eliminar'], null, ['POST' => 0], null, false],
                    '/organigramagerencia' => [['_route' => 'organigramagerencia', '_controller' => 'App\\Controller\\OrganigramaGerenciaController::index'], null, ['GET' => 0, 'POST' => 1], null, false],
                    '/organigramagerencia_editar' => [['_route' => 'organigramagerencia_editar', '_controller' => 'App\\Controller\\OrganigramaGerenciaController::editar'], null, ['POST' => 0], null, false],
                    '/organigramagerencia_eliminar' => [['_route' => 'organigramagerencia_eliminar', '_controller' => 'App\\Controller\\OrganigramaGerenciaController::eliminar'], null, ['POST' => 0], null, false],
                    '/perfil' => [['_route' => 'perfil', '_controller' => 'App\\Controller\\PerfilController::index'], null, null, null, false],
                    '/perfil_actualizar' => [['_route' => 'perfil_actualizar', '_controller' => 'App\\Controller\\PerfilController::actualizar'], null, ['POST' => 0], null, false],
                    '/usuario_update_profile' => [['_route' => 'usuario_update_profile', '_controller' => 'App\\Controller\\PerfilController::usuario_update_profile'], null, ['POST' => 0], null, false],
                    '/usuario_update_password' => [['_route' => 'usuario_update_password', '_controller' => 'App\\Controller\\PerfilController::usuario_update_password'], null, ['POST' => 0], null, false],
                    '/permiso' => [['_route' => 'permiso_listar', '_controller' => 'App\\Controller\\PermisoController::index'], null, null, null, false],
                    '/permiso_insertar' => [['_route' => 'permiso_insertar', '_controller' => 'App\\Controller\\PermisoController::insertar'], null, ['POST' => 0], null, false],
                    '/permiso_actualizar' => [['_route' => 'permiso_actualizar', '_controller' => 'App\\Controller\\PermisoController::actualizar'], null, ['POST' => 0], null, false],
                    '/permiso_editar' => [['_route' => 'permiso_editar', '_controller' => 'App\\Controller\\PermisoController::editar'], null, ['POST' => 0], null, false],
                    '/permiso_eliminar' => [['_route' => 'permiso_eliminar', '_controller' => 'App\\Controller\\PermisoController::eliminar'], null, ['POST' => 0], null, false],
                    '/personalcargo' => [['_route' => 'personalcargo_listar', '_controller' => 'App\\Controller\\PersonalCargoController::index'], null, ['GET' => 0], null, false],
                    '/organigrama' => [['_route' => 'PersonalCargo_listar2', '_controller' => 'App\\Controller\\PersonalCargoController::organigrama'], null, ['GET' => 0], null, false],
                    '/organigrama_cambios' => [['_route' => 'organigrama cambios', '_controller' => 'App\\Controller\\PersonalCargoController::cambiosorganigrama'], null, ['POST' => 0], null, false],
                    '/personalcargo_insertar' => [['_route' => 'PersonalCargo_insertar', '_controller' => 'App\\Controller\\PersonalCargoController::insertar'], null, ['POST' => 0], null, false],
                    '/personalcargo_actualizar' => [['_route' => 'PersonalCargo_actualizar', '_controller' => 'App\\Controller\\PersonalCargoController::actualizar'], null, ['POST' => 0], null, false],
                    '/personalcargo_editar' => [['_route' => 'PersonalCargo_editar', '_controller' => 'App\\Controller\\PersonalCargoController::editar'], null, ['POST' => 0], null, false],
                    '/cargo_prev' => [['_route' => 'cargo_prev', '_controller' => 'App\\Controller\\PersonalCargoController::cargo_prev'], null, ['POST' => 0], null, false],
                    '/personalcargo_eliminar' => [['_route' => 'PersonalCargo_eliminar', '_controller' => 'App\\Controller\\PersonalCargoController::eliminar'], null, ['POST' => 0], null, false],
                    '/personal' => [['_route' => 'personal_listar', '_controller' => 'App\\Controller\\PersonalController::index'], null, null, null, false],
                    '/personal_insertar' => [['_route' => 'personal_insertar', '_controller' => 'App\\Controller\\PersonalController::insertar'], null, ['POST' => 0], null, false],
                    '/personal_editar' => [['_route' => 'personal_editar', '_controller' => 'App\\Controller\\PersonalController::editar'], null, ['POST' => 0], null, false],
                    '/personal_eliminar' => [['_route' => 'personal_eliminar', '_controller' => 'App\\Controller\\PersonalController::eliminar'], null, ['POST' => 0], null, false],
                    '/planaccion' => [['_route' => 'planaccion', '_controller' => 'App\\Controller\\PlanAccionController::index'], null, null, null, false],
                    '/planaccion_insertar' => [['_route' => 'planaccion_insertar', '_controller' => 'App\\Controller\\PlanAccionController::insertar'], null, ['POST' => 0], null, false],
                    '/planaccion_actualizar' => [['_route' => 'planaccion_actualizar', '_controller' => 'App\\Controller\\PlanAccionController::actualizar'], null, ['POST' => 0], null, false],
                    '/planaccion_editar' => [['_route' => 'planaccion_editar', '_controller' => 'App\\Controller\\PlanAccionController::editar'], null, ['POST' => 0], null, false],
                    '/planaccion_eliminar' => [['_route' => 'planaccion_eliminar', '_controller' => 'App\\Controller\\PlanAccionController::eliminar'], null, ['POST' => 0], null, false],
                    '/probabilidad' => [['_route' => 'probabilidad', '_controller' => 'App\\Controller\\ProbabilidadController::index'], null, null, null, false],
                    '/probabilidad_insertar' => [['_route' => 'probabilidad_insertar', '_controller' => 'App\\Controller\\ProbabilidadController::insertar'], null, ['POST' => 0], null, false],
                    '/probabilidad_actualizar' => [['_route' => 'probabilidad_actualizar', '_controller' => 'App\\Controller\\ProbabilidadController::actualizar'], null, ['POST' => 0], null, false],
                    '/probabilidad_editar' => [['_route' => 'probabilidad_editar', '_controller' => 'App\\Controller\\ProbabilidadController::editar'], null, ['POST' => 0], null, false],
                    '/probabilidad_prev' => [['_route' => 'probabilidad_prev', '_controller' => 'App\\Controller\\ProbabilidadController::probabilidad_prev'], null, ['POST' => 0], null, false],
                    '/probabilidad_eliminar' => [['_route' => 'probabilidad_eliminar', '_controller' => 'App\\Controller\\ProbabilidadController::eliminar'], null, ['POST' => 0], null, false],
                    '/procesorelacionado' => [['_route' => 'procesorelacionado', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::index'], null, null, null, false],
                    '/procesorelacionado_insertar' => [['_route' => 'procesorelacionado_insertar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::insertar'], null, ['POST' => 0], null, false],
                    '/procesorelacionado_actualizar' => [['_route' => 'procesorelacionado_actualizar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::actualizar'], null, ['POST' => 0], null, false],
                    '/procesorelacionado_editar' => [['_route' => 'procesorelacionado_editar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::editar'], null, ['POST' => 0], null, false],
                    '/procesorelacionado_eliminar' => [['_route' => 'procesorelacionado_eliminar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::eliminar'], null, ['POST' => 0], null, false],
                    '/publicaciondoc' => [['_route' => 'publicaciondoc', '_controller' => 'App\\Controller\\PublicacionController::index'], null, null, null, false],
                    '/publicaciondoc_listar' => [['_route' => 'publicaciondoc_listar', '_controller' => 'App\\Controller\\PublicacionController::listar'], null, ['POST' => 0], null, false],
                    '/publicaciondoc_publicar' => [['_route' => 'publicaciondoc_publicar', '_controller' => 'App\\Controller\\PublicacionController::publicar'], null, ['POST' => 0], null, false],
                    '/recurso' => [['_route' => 'recurso', '_controller' => 'App\\Controller\\RecursoController::index'], null, null, null, false],
                    '/recurso_insertar' => [['_route' => 'recurso_insertar', '_controller' => 'App\\Controller\\RecursoController::insertar'], null, ['POST' => 0], null, false],
                    '/recurso_actualizar' => [['_route' => 'recurso_actualizar', '_controller' => 'App\\Controller\\RecursoController::actualizar'], null, ['POST' => 0], null, false],
                    '/recurso_editar' => [['_route' => 'recurso_editar', '_controller' => 'App\\Controller\\RecursoController::editar'], null, ['POST' => 0], null, false],
                    '/recurso_eliminar' => [['_route' => 'recurso_eliminar', '_controller' => 'App\\Controller\\RecursoController::eliminar'], null, ['POST' => 0], null, false],
                    '/recursonecesario' => [['_route' => 'recursonecesario_listar', '_controller' => 'App\\Controller\\RecursoNecesarioController::index'], null, null, null, false],
                    '/recursonecesario_insertar' => [['_route' => 'recursonecesario_insertar', '_controller' => 'App\\Controller\\RecursoNecesarioController::insertar'], null, ['POST' => 0], null, false],
                    '/recursonecesario_actualizar' => [['_route' => 'recursonecesario_actualizar', '_controller' => 'App\\Controller\\RecursoNecesarioController::actualizar'], null, ['POST' => 0], null, false],
                    '/recursonecesario_editar' => [['_route' => 'recursonecesario_editar', '_controller' => 'App\\Controller\\RecursoNecesarioController::editar'], null, ['POST' => 0], null, false],
                    '/recursonecesario_eliminar' => [['_route' => 'recursonecesario_eliminar', '_controller' => 'App\\Controller\\RecursoNecesarioController::eliminar'], null, ['POST' => 0], null, false],
                    '/registromejora' => [['_route' => 'registromejora_listar', '_controller' => 'App\\Controller\\RegistroMejoraController::index'], null, null, null, false],
                    '/registromejora_insertar' => [['_route' => 'registromejora_insertar', '_controller' => 'App\\Controller\\RegistroMejoraController::insertar'], null, ['POST' => 0], null, false],
                    '/registromejora_actualizar' => [['_route' => 'registromejora_actualizar', '_controller' => 'App\\Controller\\RegistroMejoraController::actualizar'], null, ['POST' => 0], null, false],
                    '/registromejora_editar' => [['_route' => 'registromejora_editar', '_controller' => 'App\\Controller\\RegistroMejoraController::editar'], null, ['POST' => 0], null, false],
                    '/registromejora_eliminar' => [['_route' => 'registromejora_eliminar', '_controller' => 'App\\Controller\\RegistroMejoraController::eliminar'], null, ['POST' => 0], null, false],
                    '/reporting' => [['_route' => 'reporting', '_controller' => 'App\\Controller\\ReportingController::index'], null, null, null, false],
                    '/aud_anual' => [['_route' => 'aud_anual', '_controller' => 'App\\Controller\\ReportingController::aud_anual'], null, ['POST' => 0], null, false],
                    '/auditoria_notif' => [['_route' => 'auditoria_notif', '_controller' => 'App\\Controller\\ReportingController::auditoria_notif'], null, ['POST' => 0], null, false],
                    '/auditoria_rep' => [['_route' => 'auditoria_rep', '_controller' => 'App\\Controller\\ReportingController::auditoria_rep'], null, ['POST' => 0], null, false],
                    '/accion_verif' => [['_route' => 'accion_verif', '_controller' => 'App\\Controller\\ReportingController::accion_verif'], null, ['POST' => 0], null, false],
                    '/docproceso_reporte' => [['_route' => 'docproceso_reporte', '_controller' => 'App\\Controller\\ReportingController::reporte'], null, ['POST' => 0], null, false],
                    '/responsabilidad' => [['_route' => 'responsabilidad', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::index'], null, null, null, false],
                    '/responsabilidad_insertar' => [['_route' => 'responsabilidad_insertar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::insertar'], null, ['POST' => 0], null, false],
                    '/responsabilidad_actualizar' => [['_route' => 'responsabilidad_actualizar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::actualizar'], null, ['POST' => 0], null, false],
                    '/responsabilidad_editar' => [['_route' => 'constitucionales_editar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::editar'], null, ['POST' => 0], null, false],
                    '/responsabilidad_eliminar' => [['_route' => 'constitucionales_eliminar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::eliminar'], null, ['POST' => 0], null, false],
                    '/riesgosoportunidades' => [['_route' => 'riesgosoportunidades_listar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::index'], null, null, null, false],
                    '/riesgosoportunidades_insertar' => [['_route' => 'riesgosoportunidades_insertar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::insertar'], null, ['POST' => 0], null, false],
                    '/riesgosoportunidades_actualizar' => [['_route' => 'riesgosoportunidades_actualizar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::actualizar'], null, ['POST' => 0], null, false],
                    '/riesgosoportunidades_editar' => [['_route' => 'riesgosoportunidades_editar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::editar'], null, ['POST' => 0], null, false],
                    '/crocm_prev' => [['_route' => 'crocm_prev', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::crocm_prev'], null, ['POST' => 0], null, false],
                    '/riesgosoportunidades_eliminar' => [['_route' => 'riesgosoportunidades_eliminar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::eliminar'], null, ['POST' => 0], null, false],
                    '/rol' => [['_route' => 'rol', '_controller' => 'App\\Controller\\RolController::index'], null, null, null, false],
                    '/rol_insertar' => [['_route' => 'rol_insertar', '_controller' => 'App\\Controller\\RolController::insertar'], null, ['POST' => 0], null, false],
                    '/rol_actualizar' => [['_route' => 'rol_actualizar', '_controller' => 'App\\Controller\\RolController::actualizar'], null, ['POST' => 0], null, false],
                    '/rol_editar' => [['_route' => 'rol_editar', '_controller' => 'App\\Controller\\RolController::editar'], null, ['POST' => 0], null, false],
                    '/rol_prev' => [['_route' => 'rol_prev', '_controller' => 'App\\Controller\\RolController::rol_prev'], null, ['POST' => 0], null, false],
                    '/rol_eliminar' => [['_route' => 'rol_eliminar', '_controller' => 'App\\Controller\\RolController::eliminar'], null, ['POST' => 0], null, false],
                    '/sig' => [['_route' => 'sig', '_controller' => 'App\\Controller\\SIGController::index'], null, ['GET' => 0, 'POST' => 1], null, false],
                    '/sig_editar' => [['_route' => 'sigeditar', '_controller' => 'App\\Controller\\SIGController::editar'], null, ['POST' => 0], null, false],
                    '/sig_eliminar' => [['_route' => 'sig_eliminar', '_controller' => 'App\\Controller\\SIGController::eliminar'], null, ['POST' => 0], null, false],
                    '/sector' => [['_route' => 'sector_listar', '_controller' => 'App\\Controller\\SectorController::index'], null, null, null, false],
                    '/sector_insertar' => [['_route' => 'sector_insertar', '_controller' => 'App\\Controller\\SectorController::insertar'], null, ['POST' => 0], null, false],
                    '/sector_actualizar' => [['_route' => 'sector_actualizar', '_controller' => 'App\\Controller\\SectorController::actualizar'], null, ['POST' => 0], null, false],
                    '/sector_editar' => [['_route' => 'sector_editar', '_controller' => 'App\\Controller\\SectorController::editar'], null, ['POST' => 0], null, false],
                    '/sector_prev' => [['_route' => 'sector_prev', '_controller' => 'App\\Controller\\SectorController::sector_prev'], null, ['POST' => 0], null, false],
                    '/sector_eliminar' => [['_route' => 'sector_eliminar', '_controller' => 'App\\Controller\\SectorController::eliminar'], null, ['POST' => 0], null, false],
                    '/login' => [['_route' => 'app_security_index', '_controller' => 'App\\Controller\\SecurityController::index'], null, ['GET' => 0], null, false],
                    '/logout' => [['_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false],
                    '/valid_action4' => [['_route' => 'valid_action4', '_controller' => 'App\\Controller\\SecurityController::action4'], null, ['POST' => 0], null, false],
                    '/valid_action' => [['_route' => 'valid_action', '_controller' => 'App\\Controller\\SecurityController::action'], null, ['POST' => 0], null, false],
                    '/seguimientocro' => [['_route' => 'seguimientocro', '_controller' => 'App\\Controller\\SeguimientoCroController::index'], null, null, null, false],
                    '/seguimientocro_insertar' => [['_route' => 'seguimientocro_insertar', '_controller' => 'App\\Controller\\SeguimientoCroController::insertar'], null, ['POST' => 0], null, false],
                    '/seguimientocro_actualizar' => [['_route' => 'seguimientocro_actualizar', '_controller' => 'App\\Controller\\SeguimientoCroController::actualizar'], null, ['POST' => 0], null, false],
                    '/seguimientocro_editar' => [['_route' => 'seguimientocro_editar', '_controller' => 'App\\Controller\\SeguimientoCroController::editar'], null, ['POST' => 0], null, false],
                    '/seguimientocro_eliminar' => [['_route' => 'seguimientocro_eliminar', '_controller' => 'App\\Controller\\SeguimientoCroController::eliminar'], null, ['POST' => 0], null, false],
                    '/seguimientoelaboracion' => [['_route' => 'seguimientoelaboracion_listar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::index'], null, null, null, false],
                    '/seguimientoelaboracion_insertar' => [['_route' => 'seguimientoelaboracion_insertar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::insertar'], null, ['POST' => 0], null, false],
                    '/seguimientoelaboracion_actualizar' => [['_route' => 'seguimientoelaboracion_actualizar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::actualizar'], null, ['POST' => 0], null, false],
                    '/seguimientoelaboracion_editar' => [['_route' => 'seguimientoelaboracion_editar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::editar'], null, ['POST' => 0], null, false],
                    '/seguimientoelaboracion_eliminar' => [['_route' => 'seguimientoelaboracion_eliminar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::eliminar'], null, ['POST' => 0], null, false],
                    '/seguimientoindicador' => [['_route' => 'seguimientoindicador_listar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::index'], null, null, null, false],
                    '/seguimientoindicador_insertar' => [['_route' => 'seguimientoindicador_insertar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::insertar'], null, ['POST' => 0], null, false],
                    '/seguimientoindicador_actualizar' => [['_route' => 'seguimientoindicador_actualizar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::actualizar'], null, ['POST' => 0], null, false],
                    '/seguimientoindicador_editar' => [['_route' => 'seguimientoindicador_editar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::editar'], null, ['POST' => 0], null, false],
                    '/seguimientoindicador_eliminar' => [['_route' => 'seguimientoindicador_eliminar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::eliminar'], null, ['POST' => 0], null, false],
                    '/seguimientomejora' => [['_route' => 'seguimientomejora_listar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::index'], null, null, null, false],
                    '/seguimientomejora_insertar' => [['_route' => 'seguimientomejora_insertar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::insertar'], null, ['POST' => 0], null, false],
                    '/seguimientomejora_actualizar' => [['_route' => 'seguimientomejora_actualizar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::actualizar'], null, ['POST' => 0], null, false],
                    '/seguimientomejora_editar' => [['_route' => 'seguimientomejora_editar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::editar'], null, ['POST' => 0], null, false],
                    '/seguimientomejora_eliminar' => [['_route' => 'seguimientomejora_eliminar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::eliminar'], null, ['POST' => 0], null, false],
                    '/seguimientoplan' => [['_route' => 'seguimientoplan_listar', '_controller' => 'App\\Controller\\SeguimientoPlanController::index'], null, null, null, false],
                    '/seguimientoplan_insertar' => [['_route' => 'seguimientoplan_insertar', '_controller' => 'App\\Controller\\SeguimientoPlanController::insertar'], null, ['POST' => 0], null, false],
                    '/seguimientoplan_actualizar' => [['_route' => 'seguimientoplan_actualizar', '_controller' => 'App\\Controller\\SeguimientoPlanController::actualizar'], null, ['POST' => 0], null, false],
                    '/seguimientoplan_editar' => [['_route' => 'seguimientoplan_editar', '_controller' => 'App\\Controller\\SeguimientoPlanController::editar'], null, ['POST' => 0], null, false],
                    '/seguimientoplan_eliminar' => [['_route' => 'seguimientoplan_eliminar', '_controller' => 'App\\Controller\\SeguimientoPlanController::eliminar'], null, ['POST' => 0], null, false],
                    '/enlace_lista' => [['_route' => 'enlace_lista', '_controller' => 'App\\Controller\\ServiciosController::mostrarenlace'], null, ['GET' => 0], null, false],
                    '/menu_lista' => [['_route' => 'menu_lista', '_controller' => 'App\\Controller\\ServiciosController::mostrarmenu'], null, ['GET' => 0], null, false],
                    '/enviarcorreo' => [['_route' => 'enviarcorreo', '_controller' => 'App\\Controller\\ServiciosController::enviarcorreo'], null, null, null, false],
                    '/enviarcorreo_buzon' => [['_route' => 'enviarcorreo_buzon', '_controller' => 'App\\Controller\\ServiciosController::enviarcorreo_buzon'], null, null, null, false],
                    '/organigrama2' => [['_route' => 'organigrama2', '_controller' => 'App\\Controller\\ServiciosController::organigrama'], null, null, null, false],
                    '/organigrama_por_cargo' => [['_route' => 'organigrama_por_cargo', '_controller' => 'App\\Controller\\ServiciosController::organigrama_por_cargo'], null, null, null, false],
                    '/directoriovista' => [['_route' => 'directoriovista', '_controller' => 'App\\Controller\\ServiciosController::directorio'], null, ['GET' => 0], null, false],
                    '/datoempresarial_lista' => [['_route' => 'datoempresarial_lista', '_controller' => 'App\\Controller\\ServiciosController::mostrar'], null, ['GET' => 0], null, false],
                    '/link_vista' => [['_route' => 'link_vista', '_controller' => 'App\\Controller\\ServiciosController::links'], null, ['GET' => 0], null, false],
                    '/files_vista' => [['_route' => 'files_vista', '_controller' => 'App\\Controller\\ServiciosController::files'], null, ['GET' => 0], null, false],
                    '/turno_service' => [['_route' => 'turno_vista', '_controller' => 'App\\Controller\\ServiciosController::turno'], null, ['GET' => 0], null, false],
                    '/tipoempresarial_lista' => [['_route' => 'tipoempresarial_lista', '_controller' => 'App\\Controller\\ServiciosController::getTipoEmpresarialLista'], null, ['GET' => 0], null, false],
                    '/last_file_service' => [['_route' => 'last_file_service', '_controller' => 'App\\Controller\\ServiciosController::lastFileUpload'], null, ['GET' => 0], null, false],
                    '/galeriaList' => [['_route' => 'galeriaList', '_controller' => 'App\\Controller\\ServiciosController::galeriaList'], null, ['GET' => 0], null, false],
                    '/galeriaIndividualService' => [['_route' => 'galeriaIndividualService', '_controller' => 'App\\Controller\\ServiciosController::galeriaIndividual'], null, ['POST' => 0], null, false],
                    '/noticias_vista' => [['_route' => 'noticias_vista', '_controller' => 'App\\Controller\\ServiciosController::noticias'], null, ['GET' => 0], null, false],
                    '/getResponsabilidadService' => [['_route' => 'getResponsabilidadService', '_controller' => 'App\\Controller\\ServiciosController::getResponsabilidadService'], null, ['GET' => 0], null, false],
                    '/getLastNoticiaCategoria' => [['_route' => 'lastNoticiaCategoria', '_controller' => 'App\\Controller\\ServiciosController::lastNoticiaCategoria'], null, ['GET' => 0], null, false],
                    '/getLastPrensaCategoria' => [['_route' => 'getLastPrensaCategoria', '_controller' => 'App\\Controller\\ServiciosController::lastPrensaCategoria'], null, ['GET' => 0], null, false],
                    '/catalogo_vista' => [['_route' => 'catalogo_vista', '_controller' => 'App\\Controller\\ServiciosController::catalogo'], null, ['GET' => 0], null, false],
                    '/accidente_vista' => [['_route' => 'accidente_vista', '_controller' => 'App\\Controller\\ServiciosController::accidente'], null, ['GET' => 0], null, false],
                    '/noticia_tipo' => [['_route' => 'noticia_tipo', '_controller' => 'App\\Controller\\ServiciosController::noticiaTipo'], null, ['POST' => 0], null, false],
                    '/getnoticias_categoria' => [['_route' => 'categorianoticia', '_controller' => 'App\\Controller\\ServiciosController::categoriaNoticia'], null, ['POST' => 0], null, false],
                    '/getNoticia' => [['_route' => 'getNoticia', '_controller' => 'App\\Controller\\ServiciosController::getNoticia'], null, ['POST' => 0], null, false],
                    '/getCumpleaneros' => [['_route' => 'getCumpleañeros', '_controller' => 'App\\Controller\\ServiciosController::getCumpleañeros'], null, ['GET' => 0], null, false],
                    '/login2' => [['_route' => 'login2', '_controller' => 'App\\Controller\\ServiciosController::login2'], null, ['POST' => 0], null, false],
                    '/sigprocfcgerencia' => [['_route' => 'procesogerencia', '_controller' => 'App\\Controller\\ServiciosController::procesogerencia'], null, null, null, false],
                    '/sigprocfcgerenciadetalle' => [['_route' => 'sigprocfcgerenciadetalle ', '_controller' => 'App\\Controller\\ServiciosController::sigprocfcgerenciadetalle'], null, ['POST' => 0], null, false],
                    '/sigprocfcprocesos' => [['_route' => 'procesoprocesos', '_controller' => 'App\\Controller\\ServiciosController::sigprocesoprocesos'], null, null, null, false],
                    '/indicadores' => [['_route' => 'indicadores', '_controller' => 'App\\Controller\\ServiciosController::indicadores'], null, ['GET' => 0], null, false],
                    '/detalleindicador' => [['_route' => 'detalleindicador', '_controller' => 'App\\Controller\\ServiciosController::detalleindicador'], null, ['POST' => 0], null, false],
                    '/indicadorseg' => [['_route' => 'indicadorseg', '_controller' => 'App\\Controller\\ServiciosController::indicadorseg'], null, ['GET' => 0], null, false],
                    '/sigprocriesgogerencia' => [['_route' => 'sigprocriesgogerencia', '_controller' => 'App\\Controller\\ServiciosController::sigprocpiesgogerencia'], null, ['GET' => 0], null, false],
                    '/crocmdetalle' => [['_route' => 'crocmdetalle', '_controller' => 'App\\Controller\\ServiciosController::crocmdetalle'], null, ['POST' => 0], null, false],
                    '/seguimientocrocm' => [['_route' => 'seguimientocrocm', '_controller' => 'App\\Controller\\ServiciosController::seguimientocrocm'], null, ['GET' => 0], null, false],
                    '/documentos' => [['_route' => 'documentos', '_controller' => 'App\\Controller\\ServiciosController::documentos'], null, ['GET' => 0], null, false],
                    '/docs_by_gerencia' => [['_route' => 'docs_by_gerencia', '_controller' => 'App\\Controller\\ServiciosController::docs_by_gerencia'], null, ['POST' => 0], null, false],
                    '/detalledoc' => [['_route' => 'detalledoc', '_controller' => 'App\\Controller\\ServiciosController::detalledoc'], null, ['POST' => 0], null, false],
                    '/getdocformulario' => [['_route' => 'getdocformulario', '_controller' => 'App\\Controller\\ServiciosController::getdocformulario'], null, ['GET' => 0], null, false],
                    '/docform_by_gerencia' => [['_route' => 'docform_by_gerencia', '_controller' => 'App\\Controller\\ServiciosController::docform_by_gerencia'], null, ['POST' => 0], null, false],
                    '/getdocformulariodetalle' => [['_route' => 'getdocformulariodetalle', '_controller' => 'App\\Controller\\ServiciosController::getdocformulariodetalle'], null, ['POST' => 0], null, false],
                    '/documentoexternolegales' => [['_route' => 'documentoexternolegales', '_controller' => 'App\\Controller\\ServiciosController::documentoexternolegales'], null, ['GET' => 0], null, false],
                    '/documentosenproceso' => [['_route' => 'documentosenproceso', '_controller' => 'App\\Controller\\ServiciosController::documentosenproceso'], null, ['POST' => 0], null, false],
                    '/documentosrev' => [['_route' => 'documentosrev', '_controller' => 'App\\Controller\\ServiciosController::documentosrev'], null, ['POST' => 0], null, false],
                    '/documentobaja' => [['_route' => 'documentobaja', '_controller' => 'App\\Controller\\ServiciosController::documentobaja'], null, ['GET' => 0], null, false],
                    '/fichascargo' => [['_route' => 'fichascargo', '_controller' => 'App\\Controller\\ServiciosController::fichascargo'], null, ['GET' => 0], null, false],
                    '/detallefcargo' => [['_route' => 'detallefcargo', '_controller' => 'App\\Controller\\ServiciosController::detallefcargo'], null, ['POST' => 0], null, false],
                    '/listar_audhlg' => [['_route' => 'listar_audhlg', '_controller' => 'App\\Controller\\ServiciosController::listar_audhlg'], null, null, null, false],
                    '/detalleaud' => [['_route' => 'detalleaud', '_controller' => 'App\\Controller\\ServiciosController::detalleaud'], null, ['POST' => 0], null, false],
                    '/detallehlg' => [['_route' => 'detallehlg', '_controller' => 'App\\Controller\\ServiciosController::detallehlg'], null, ['POST' => 0], null, false],
                    '/listar_hallazgo' => [['_route' => 'listar_hallazgo', '_controller' => 'App\\Controller\\ServiciosController::listar_hallazgo'], null, null, null, false],
                    '/listar_accion' => [['_route' => 'listar_accion', '_controller' => 'App\\Controller\\ServiciosController::listar_accion'], null, null, null, false],
                    '/dethlg_idac' => [['_route' => 'dethlg_idac', '_controller' => 'App\\Controller\\ServiciosController::dethlg_idac'], null, ['POST' => 0], null, false],
                    '/crocm_list' => [['_route' => 'crocm_list', '_controller' => 'App\\Controller\\ServiciosController::crocm_list'], null, null, null, false],
                    '/crocm_consulta' => [['_route' => 'crocm_consulta', '_controller' => 'App\\Controller\\ServiciosController::crocm_consulta'], null, null, null, false],
                    '/detaud_crocm' => [['_route' => 'detaud_crocm', '_controller' => 'App\\Controller\\ServiciosController::detaud_crocm'], null, ['POST' => 0], null, false],
                    '/listar_verificaref' => [['_route' => 'listar_verificaref', '_controller' => 'App\\Controller\\ServiciosController::listar_verificaref'], null, null, null, false],
                    '/listar_fortaleza' => [['_route' => 'listar_fortaleza', '_controller' => 'App\\Controller\\ServiciosController::listar_fortaleza'], null, null, null, false],
                    '/loginbackend4' => [['_route' => 'loginbackend4', '_controller' => 'App\\Controller\\ServiciosController::info4'], null, ['POST' => 0], null, false],
                    '/loginbackend' => [['_route' => 'loginbackend', '_controller' => 'App\\Controller\\ServiciosController::info'], null, ['POST' => 0], null, false],
                    '/combo_proceso' => [['_route' => 'combo_proceso', '_controller' => 'App\\Controller\\ServiciosController::combo_proceso'], null, null, null, false],
                    '/combo_tipocrocm' => [['_route' => 'combo_tipocrocm', '_controller' => 'App\\Controller\\ServiciosController::combo_tipocrocm'], null, null, null, false],
                    '/combo_probabilidad' => [['_route' => 'combo_probabilidad', '_controller' => 'App\\Controller\\ServiciosController::combo_probabilidad'], null, null, null, false],
                    '/combo_impacto' => [['_route' => 'combo_impacto', '_controller' => 'App\\Controller\\ServiciosController::combo_impacto'], null, null, null, false],
                    '/combo_responsable' => [['_route' => 'combo_responsable', '_controller' => 'App\\Controller\\ServiciosController::combo_responsable'], null, null, null, false],
                    '/insertar_crocm' => [['_route' => 'insertar_crocm', '_controller' => 'App\\Controller\\ServiciosController::insertar_crocm'], null, ['POST' => 0], null, false],
                    '/combo_org_cargo' => [['_route' => 'combo_org_cargo', '_controller' => 'App\\Controller\\ServiciosController::combo_org_cargo'], null, null, null, false],
                    '/combo_organigrama' => [['_route' => 'combo_organigrama', '_controller' => 'App\\Controller\\ServiciosController::combo_organigrama'], null, null, null, false],
                    '/listar_cobertura' => [['_route' => 'listar_cobertura', '_controller' => 'App\\Controller\\ServiciosController::listar_cobertura'], null, null, null, false],
                    '/data_correlative' => [['_route' => 'data_correlative', '_controller' => 'App\\Controller\\ServiciosController::data_correlative'], null, ['POST' => 0], null, false],
                    '/formdt_correlative' => [['_route' => 'formdt_correlative', '_controller' => 'App\\Controller\\ServiciosController::formdt_correlative'], null, ['POST' => 0], null, false],
                    '/correlative_insert' => [['_route' => 'correlative_insert', '_controller' => 'App\\Controller\\ServiciosController::correlative_insert'], null, ['POST' => 0], null, false],
                    '/correlative_edit' => [['_route' => 'correlative_edit', '_controller' => 'App\\Controller\\ServiciosController::correlative_edit'], null, ['POST' => 0], null, false],
                    '/correlative_update' => [['_route' => 'correlative_update', '_controller' => 'App\\Controller\\ServiciosController::correlative_update'], null, ['POST' => 0], null, false],
                    '/correlative_delete' => [['_route' => 'correlative_delete', '_controller' => 'App\\Controller\\ServiciosController::correlative_delete'], null, ['POST' => 0], null, false],
                    '/datasig' => [['_route' => 'datasig', '_controller' => 'App\\Controller\\ServiciosController::datasig'], null, ['GET' => 0], null, false],
                    '/data_delautoridad' => [['_route' => 'data_delautoridad', '_controller' => 'App\\Controller\\ServiciosController::data_delautoridad'], null, ['GET' => 0], null, false],
                    '/tipoauditor' => [['_route' => 'tipoauditor', '_controller' => 'App\\Controller\\TipoAuditorController::index'], null, null, null, false],
                    '/tipoauditor_insertar' => [['_route' => 'tipoauditor_insertar', '_controller' => 'App\\Controller\\TipoAuditorController::insertar'], null, ['POST' => 0], null, false],
                    '/tipoauditor_actualizar' => [['_route' => 'tipoauditor_actualizar', '_controller' => 'App\\Controller\\TipoAuditorController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipoauditor_editar' => [['_route' => 'tipoauditor_editar', '_controller' => 'App\\Controller\\TipoAuditorController::editar'], null, ['POST' => 0], null, false],
                    '/tpauditor_prev' => [['_route' => 'tpauditor_prev', '_controller' => 'App\\Controller\\TipoAuditorController::tpauditor_prev'], null, ['POST' => 0], null, false],
                    '/tipoauditor_eliminar' => [['_route' => 'tipoauditor_eliminar', '_controller' => 'App\\Controller\\TipoAuditorController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipoauditoria' => [['_route' => 'tipoauditoria', '_controller' => 'App\\Controller\\TipoAuditoriaController::index'], null, null, null, false],
                    '/tipoauditoria_insertar' => [['_route' => 'tipoauditoria_insertar', '_controller' => 'App\\Controller\\TipoAuditoriaController::insertar'], null, ['POST' => 0], null, false],
                    '/tipoauditoria_actualizar' => [['_route' => 'tipoauditoria_actualizar', '_controller' => 'App\\Controller\\TipoAuditoriaController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipoauditoria_editar' => [['_route' => 'tipoauditoria_editar', '_controller' => 'App\\Controller\\TipoAuditoriaController::editar'], null, ['POST' => 0], null, false],
                    '/tipoaud_prev' => [['_route' => 'tipoaud_prev', '_controller' => 'App\\Controller\\TipoAuditoriaController::tipoaud_prev'], null, ['POST' => 0], null, false],
                    '/tipoauditoria_eliminar' => [['_route' => 'tipoauditoria_eliminar', '_controller' => 'App\\Controller\\TipoAuditoriaController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipocro' => [['_route' => 'tipocro', '_controller' => 'App\\Controller\\TipoCROController::index'], null, null, null, false],
                    '/tipocro_insertar' => [['_route' => 'tipocro_insertar', '_controller' => 'App\\Controller\\TipoCROController::insertar'], null, ['POST' => 0], null, false],
                    '/tipocro_actualizar' => [['_route' => 'tipocro_actualizar', '_controller' => 'App\\Controller\\TipoCROController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipocro_editar' => [['_route' => 'tipocro_editar', '_controller' => 'App\\Controller\\TipoCROController::editar'], null, ['POST' => 0], null, false],
                    '/tipocro_prev' => [['_route' => 'tipocro_prev', '_controller' => 'App\\Controller\\TipoCROController::tipocro_prev'], null, ['POST' => 0], null, false],
                    '/tipocro_eliminar' => [['_route' => 'tipocro_eliminar', '_controller' => 'App\\Controller\\TipoCROController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipocargo' => [['_route' => 'tipocargo', '_controller' => 'App\\Controller\\TipoCargoController::index'], null, null, null, false],
                    '/tipocargo_insertar' => [['_route' => 'tipocargo_insertar', '_controller' => 'App\\Controller\\TipoCargoController::insertar'], null, ['POST' => 0], null, false],
                    '/tipocargo_actualizar' => [['_route' => 'tipocargo_actualizar', '_controller' => 'App\\Controller\\TipoCargoController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipocargo_editar' => [['_route' => 'tipocargo_editar', '_controller' => 'App\\Controller\\TipoCargoController::editar'], null, ['POST' => 0], null, false],
                    '/tpcargo_prev' => [['_route' => 'tpcargo_prev', '_controller' => 'App\\Controller\\TipoCargoController::tpcargo_prev'], null, ['POST' => 0], null, false],
                    '/tipocargo_eliminar' => [['_route' => 'tipocargo_eliminar', '_controller' => 'App\\Controller\\TipoCargoController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipocobertura' => [['_route' => 'tipocobertura', '_controller' => 'App\\Controller\\TipoCoberturaController::index'], null, null, null, false],
                    '/tipocobertura_insertar' => [['_route' => 'tipocobertura_insertar', '_controller' => 'App\\Controller\\TipoCoberturaController::insertar'], null, ['POST' => 0], null, false],
                    '/tipocobertura_actualizar' => [['_route' => 'tipocobertura_actualizar', '_controller' => 'App\\Controller\\TipoCoberturaController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipocobertura_editar' => [['_route' => 'tipocobertura_editar', '_controller' => 'App\\Controller\\TipoCoberturaController::editar'], null, ['POST' => 0], null, false],
                    '/tipocob_prev' => [['_route' => 'tipocob_prev', '_controller' => 'App\\Controller\\TipoCoberturaController::tipocob_prev'], null, ['POST' => 0], null, false],
                    '/tipocobertura_eliminar' => [['_route' => 'tipocobertura_eliminar', '_controller' => 'App\\Controller\\TipoCoberturaController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipodatoempresarial' => [['_route' => 'tipodatoempresarial', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::index'], null, null, null, false],
                    '/tipodatoempresarial_insertar' => [['_route' => 'tipodatoempresarial_insertar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::insertar'], null, ['POST' => 0], null, false],
                    '/tipodatoempresarial_actualizar' => [['_route' => 'tipodatoempresarial_actualizar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipodatoempresarial_editar' => [['_route' => 'tipodatoempresarial_editar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::editar'], null, ['POST' => 0], null, false],
                    '/tpdtemp_prev' => [['_route' => 'tpdtemp_prev', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::tpdtemp_prev'], null, ['POST' => 0], null, false],
                    '/tipodatoempresarial_eliminar' => [['_route' => 'tipodatoempresarial_eliminar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipodocumento' => [['_route' => 'tipodocumento', '_controller' => 'App\\Controller\\TipoDocumentoController::index'], null, null, null, false],
                    '/tipodocumento_insertar' => [['_route' => 'tipodocumento_insertar', '_controller' => 'App\\Controller\\TipoDocumentoController::insertar'], null, ['POST' => 0], null, false],
                    '/tipodocumento_actualizar' => [['_route' => 'tipodocumento_actualizar', '_controller' => 'App\\Controller\\TipoDocumentoController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipodocumento_editar' => [['_route' => 'tipodocumento_editar', '_controller' => 'App\\Controller\\TipoDocumentoController::editar'], null, ['POST' => 0], null, false],
                    '/tipodoc_prev' => [['_route' => 'tipodoc_prev', '_controller' => 'App\\Controller\\TipoDocumentoController::tipodoc_prev'], null, ['POST' => 0], null, false],
                    '/tipodocumento_eliminar' => [['_route' => 'tipodocumento_eliminar', '_controller' => 'App\\Controller\\TipoDocumentoController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipohallazgo' => [['_route' => 'tipohallazgo', '_controller' => 'App\\Controller\\TipoHallazgoController::index'], null, null, null, false],
                    '/tipo_hallazgo_insertar' => [['_route' => 'tipo_hallazgo_insertar', '_controller' => 'App\\Controller\\TipoHallazgoController::insertar'], null, ['POST' => 0], null, false],
                    '/tipo_hallazgo_actualizar' => [['_route' => 'tipo_hallazgo_actualizar', '_controller' => 'App\\Controller\\TipoHallazgoController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipo_hallazgo_editar' => [['_route' => 'tipo_hallazgo_editar', '_controller' => 'App\\Controller\\TipoHallazgoController::editar'], null, ['POST' => 0], null, false],
                    '/tipo_hallazgo_eliminar' => [['_route' => 'tipo_hallazgo_eliminar', '_controller' => 'App\\Controller\\TipoHallazgoController::eliminar'], null, ['POST' => 0], null, false],
                    '/tiponorma' => [['_route' => 'tiponorma', '_controller' => 'App\\Controller\\TipoNormaController::index'], null, null, null, false],
                    '/tiponorma_insertar' => [['_route' => 'tiponorma_insertar', '_controller' => 'App\\Controller\\TipoNormaController::insertar'], null, ['POST' => 0], null, false],
                    '/tiponorma_actualizar' => [['_route' => 'tiponorma_actualizar', '_controller' => 'App\\Controller\\TipoNormaController::actualizar'], null, ['POST' => 0], null, false],
                    '/tiponorma_editar' => [['_route' => 'tiponorma_editar', '_controller' => 'App\\Controller\\TipoNormaController::editar'], null, ['POST' => 0], null, false],
                    '/tiponorma_eliminar' => [['_route' => 'tiponorma_eliminar', '_controller' => 'App\\Controller\\TipoNormaController::eliminar'], null, ['POST' => 0], null, false],
                    '/tiponota' => [['_route' => 'tiponota', '_controller' => 'App\\Controller\\TipoNotaController::index'], null, null, null, false],
                    '/tiponota_insertar' => [['_route' => 'tiponota_insertar', '_controller' => 'App\\Controller\\TipoNotaController::insertar'], null, ['POST' => 0], null, false],
                    '/tiponota_actualizar' => [['_route' => 'tiponota_actualizar', '_controller' => 'App\\Controller\\TipoNotaController::actualizar'], null, ['POST' => 0], null, false],
                    '/tiponota_editar' => [['_route' => 'tiponota_editar', '_controller' => 'App\\Controller\\TipoNotaController::editar'], null, ['POST' => 0], null, false],
                    '/tiponota_eliminar' => [['_route' => 'tiponota_eliminar', '_controller' => 'App\\Controller\\TipoNotaController::eliminar'], null, ['POST' => 0], null, false],
                    '/tiponota_prev' => [['_route' => 'tiponota_prev', '_controller' => 'App\\Controller\\TipoNotaController::tiponota_prev'], null, ['POST' => 0], null, false],
                    '/tiponovedad' => [['_route' => 'tiponovedad', '_controller' => 'App\\Controller\\TipoNovedadController::index'], null, null, null, false],
                    '/tiponovedad_insertar' => [['_route' => 'tiponovedad_insertar', '_controller' => 'App\\Controller\\TipoNovedadController::insertar'], null, ['POST' => 0], null, false],
                    '/tiponovedad_actualizar' => [['_route' => 'tiponovedad_actualizar', '_controller' => 'App\\Controller\\TipoNovedadController::actualizar'], null, ['POST' => 0], null, false],
                    '/tiponovedad_editar' => [['_route' => 'tiponovedad_editar', '_controller' => 'App\\Controller\\TipoNovedadController::editar'], null, ['POST' => 0], null, false],
                    '/tiponovedad_eliminar' => [['_route' => 'tiponovedad_eliminar', '_controller' => 'App\\Controller\\TipoNovedadController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipopermiso' => [['_route' => 'tipopermiso_listar', '_controller' => 'App\\Controller\\TipoPermisoController::index'], null, null, null, false],
                    '/tipopermiso_insertar' => [['_route' => 'tipopermiso_insertar', '_controller' => 'App\\Controller\\TipoPermisoController::insertar'], null, ['POST' => 0], null, false],
                    '/tipopermiso_actualizar' => [['_route' => 'tipopermiso_actualizar', '_controller' => 'App\\Controller\\TipoPermisoController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipopermiso_editar' => [['_route' => 'tipopermiso_editar', '_controller' => 'App\\Controller\\TipoPermisoController::editar'], null, ['POST' => 0], null, false],
                    '/tipopermiso_eliminar' => [['_route' => 'tipopermiso_eliminar', '_controller' => 'App\\Controller\\TipoPermisoController::eliminar'], null, ['POST' => 0], null, false],
                    '/tipopermiso_prev' => [['_route' => 'tipopermiso_prev', '_controller' => 'App\\Controller\\TipoPermisoController::tipopermiso_prev'], null, ['POST' => 0], null, false],
                    '/tipoturno' => [['_route' => 'tipoturno', '_controller' => 'App\\Controller\\TipoTurnoController::index'], null, null, null, false],
                    '/tipoturno_insertar' => [['_route' => 'tipoturno_insertar', '_controller' => 'App\\Controller\\TipoTurnoController::insertar'], null, ['POST' => 0], null, false],
                    '/tipoturno_actualizar' => [['_route' => 'tipoturno_actualizar', '_controller' => 'App\\Controller\\TipoTurnoController::actualizar'], null, ['POST' => 0], null, false],
                    '/tipoturno_editar' => [['_route' => 'tipoturno_editar', '_controller' => 'App\\Controller\\TipoTurnoController::editar'], null, ['POST' => 0], null, false],
                    '/tipoturno_prev' => [['_route' => 'tipoturno_prev', '_controller' => 'App\\Controller\\TipoTurnoController::tipoturno_prev'], null, ['POST' => 0], null, false],
                    '/tipoturno_eliminar' => [['_route' => 'tipoturno_eliminar', '_controller' => 'App\\Controller\\TipoTurnoController::eliminar'], null, ['POST' => 0], null, false],
                    '/turno' => [['_route' => 'turno_listar', '_controller' => 'App\\Controller\\TurnoController::index'], null, null, null, false],
                    '/turno_insertar' => [['_route' => 'turno_insertar', '_controller' => 'App\\Controller\\TurnoController::insertar'], null, ['POST' => 0], null, false],
                    '/turno_actualizar' => [['_route' => 'turno_actualizar', '_controller' => 'App\\Controller\\TurnoController::actualizar'], null, ['POST' => 0], null, false],
                    '/turno_editar' => [['_route' => 'turno_editar', '_controller' => 'App\\Controller\\TurnoController::editar'], null, ['POST' => 0], null, false],
                    '/turno_eliminar' => [['_route' => 'turno_eliminar', '_controller' => 'App\\Controller\\TurnoController::eliminar'], null, ['POST' => 0], null, false],
                    '/unidad' => [['_route' => 'unidad_listar', '_controller' => 'App\\Controller\\UnidadController::index'], null, ['GET' => 0], null, false],
                    '/unidad_insertar' => [['_route' => 'unidad_insertar', '_controller' => 'App\\Controller\\UnidadController::insertar'], null, ['POST' => 0], null, false],
                    '/unidad_actualizar' => [['_route' => 'unidad_actualizar', '_controller' => 'App\\Controller\\UnidadController::actualizar'], null, ['POST' => 0], null, false],
                    '/unidad_editar' => [['_route' => 'unidad_editar', '_controller' => 'App\\Controller\\UnidadController::editar'], null, ['POST' => 0], null, false],
                    '/unidad_eliminar' => [['_route' => 'unidad_eliminar', '_controller' => 'App\\Controller\\UnidadController::eliminar'], null, ['POST' => 0], null, false],
                    '/unidadcrtv_prev' => [['_route' => 'unidadcrtv_prev', '_controller' => 'App\\Controller\\UnidadController::unidadcrtv_prev'], null, ['POST' => 0], null, false],
                    '/unidadmedida' => [['_route' => 'unidadmedida', '_controller' => 'App\\Controller\\UnidadMedidaController::index'], null, null, null, false],
                    '/unidadmedida_insertar' => [['_route' => 'unidadmedida_insertar', '_controller' => 'App\\Controller\\UnidadMedidaController::insertar'], null, ['POST' => 0], null, false],
                    '/unidadmedida_actualizar' => [['_route' => 'unidadmedida_actualizar', '_controller' => 'App\\Controller\\UnidadMedidaController::actualizar'], null, ['POST' => 0], null, false],
                    '/unidadmedida_editar' => [['_route' => 'unidadmedida_editar', '_controller' => 'App\\Controller\\UnidadMedidaController::editar'], null, ['POST' => 0], null, false],
                    '/unidad_prev' => [['_route' => 'unidad_prev', '_controller' => 'App\\Controller\\UnidadMedidaController::unidad_prev'], null, ['POST' => 0], null, false],
                    '/unidadmedida_eliminar' => [['_route' => 'unidadmedida_eliminar', '_controller' => 'App\\Controller\\UnidadMedidaController::eliminar'], null, ['POST' => 0], null, false],
                    '/usuario' => [['_route' => 'usuario', '_controller' => 'App\\Controller\\UsuarioController::index'], null, null, null, false],
                    '/usuario_insertar' => [['_route' => 'usuario_insertar', '_controller' => 'App\\Controller\\UsuarioController::insertar'], null, ['POST' => 0], null, false],
                    '/usuario_actualizar' => [['_route' => 'usuario_actualizar', '_controller' => 'App\\Controller\\UsuarioController::actualizar'], null, ['POST' => 0], null, false],
                    '/usuario_editar' => [['_route' => 'usuario_editar', '_controller' => 'App\\Controller\\UsuarioController::editar'], null, ['POST' => 0], null, false],
                    '/usuario_eliminar' => [['_route' => 'usuario_eliminar', '_controller' => 'App\\Controller\\UsuarioController::eliminar'], null, ['POST' => 0], null, false],
                ];

                if (!isset($routes[$trimmedPathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$trimmedPathinfo];
                if ('/' !== $pathinfo && $hasTrailingSlash === ($trimmedPathinfo === $pathinfo)) {
                    if ('GET' === $canonicalMethod && (!$requiredMethods || isset($requiredMethods['GET']))) {
                        return $allow = $allowSchemes = [];
                    }
                    break;
                }

                $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                    if ($hasRequiredScheme) {
                        $allow += $requiredMethods;
                    }
                    break;
                }
                if (!$hasRequiredScheme) {
                    $allowSchemes += $requiredSchemes;
                    break;
                }

                return $ret;
        }

        $matchedPathinfo = $pathinfo;
        $regexList = [
            0 => '{^(?'
                    .'|/organigrama/([^/]++)(*:28)'
                    .'|/_error/(\\d+)(?:\\.([^/]++))?(*:63)'
                .')/?$}sD',
        ];

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    default:
                        $routes = [
                            28 => [['_route' => 'organigrama_filtro', '_controller' => 'App\\Controller\\PersonalCargoController::filtro'], ['id'], ['GET' => 0], null, false, true],
                            63 => [['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true],
                        ];

                        list($ret, $vars, $requiredMethods, $requiredSchemes, $hasTrailingSlash, $hasTrailingVar) = $routes[$m];

                        $hasTrailingVar = $trimmedPathinfo !== $pathinfo && $hasTrailingVar;
                        if ('/' !== $pathinfo && !$hasTrailingVar && $hasTrailingSlash === ($trimmedPathinfo === $pathinfo)) {
                            if ('GET' === $canonicalMethod && (!$requiredMethods || isset($requiredMethods['GET']))) {
                                return $allow = $allowSchemes = [];
                            }
                            break;
                        }
                        if ($hasTrailingSlash && $hasTrailingVar && preg_match($regex, rtrim($matchedPathinfo, '/') ?: '/', $n) && $m === (int) $n['MARK']) {
                            $matches = $n;
                        }

                        foreach ($vars as $i => $v) {
                            if (isset($matches[1 + $i])) {
                                $ret[$v] = $matches[1 + $i];
                            }
                        }

                        $hasRequiredScheme = !$requiredSchemes || isset($requiredSchemes[$context->getScheme()]);
                        if ($requiredMethods && !isset($requiredMethods[$canonicalMethod]) && !isset($requiredMethods[$requestMethod])) {
                            if ($hasRequiredScheme) {
                                $allow += $requiredMethods;
                            }
                            break;
                        }
                        if (!$hasRequiredScheme) {
                            $allowSchemes += $requiredSchemes;
                            break;
                        }

                        return $ret;
                }

                if (63 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow && !$allowSchemes) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return [];
    }
}
