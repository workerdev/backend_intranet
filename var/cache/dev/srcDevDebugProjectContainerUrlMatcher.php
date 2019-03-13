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
        $allow = $allowSchemes = array();
        if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
            return $ret;
        }
        if ($allow) {
            throw new MethodNotAllowedException(array_keys($allow));
        }
        if (!in_array($this->context->getMethod(), array('HEAD', 'GET'), true)) {
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
        } elseif ('/' !== $pathinfo) {
            $pathinfo = '/' !== $pathinfo[-1] ? $pathinfo.'/' : substr($pathinfo, 0, -1);
            if ($ret = $this->doMatch($pathinfo, $allow, $allowSchemes)) {
                return $this->redirect($pathinfo, $ret['_route']) + $ret;
            }
            if ($allowSchemes) {
                goto redirect_scheme;
            }
        }

        throw new ResourceNotFoundException();
    }

    private function doMatch(string $rawPathinfo, array &$allow = array(), array &$allowSchemes = array()): array
    {
        $allow = $allowSchemes = array();
        $pathinfo = rawurldecode($rawPathinfo) ?: '/';
        $context = $this->context;
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        switch ($trimmedPathinfo = '/' !== $pathinfo && '/' === $pathinfo[-1] ? substr($pathinfo, 0, -1) : $pathinfo) {
            default:
                $routes = array(
                    '/acceso' => array(array('_route' => 'acceso_listar', '_controller' => 'App\\Controller\\AccesoController::index'), null, null, null, false),
                    '/acceso_insertar' => array(array('_route' => 'acceso_insertar', '_controller' => 'App\\Controller\\AccesoController::insertar'), null, array('POST' => 0), null, false),
                    '/acceso_actualizar' => array(array('_route' => 'acceso_actualizar', '_controller' => 'App\\Controller\\AccesoController::actualizar'), null, array('POST' => 0), null, false),
                    '/acceso_editar' => array(array('_route' => 'acceso_editar', '_controller' => 'App\\Controller\\AccesoController::editar'), null, array('POST' => 0), null, false),
                    '/acceso_eliminar' => array(array('_route' => 'acceso_eliminar', '_controller' => 'App\\Controller\\AccesoController::eliminar'), null, array('POST' => 0), null, false),
                    '/accidentes' => array(array('_route' => 'accidentes', '_controller' => 'App\\Controller\\AccidentesController::index'), null, null, null, false),
                    '/accidentes_eliminar' => array(array('_route' => 'accidentes_eliminar', '_controller' => 'App\\Controller\\AccidentesController::eliminar'), null, array('POST' => 0), null, false),
                    '/accidentes_editar' => array(array('_route' => 'accidentes_editar', '_controller' => 'App\\Controller\\AccidentesController::editar'), null, array('POST' => 0), null, false),
                    '/accidentes_reset' => array(array('_route' => 'accidentes_reset', '_controller' => 'App\\Controller\\AccidentesController::reset'), null, array('POST' => 0), null, false),
                    '/accion' => array(array('_route' => 'accion_listar', '_controller' => 'App\\Controller\\AccionController::index'), null, null, null, false),
                    '/accion_insertar' => array(array('_route' => 'accion_insertar', '_controller' => 'App\\Controller\\AccionController::insertar'), null, array('POST' => 0), null, false),
                    '/accion_actualizar' => array(array('_route' => 'accion_actualizar', '_controller' => 'App\\Controller\\AccionController::actualizar'), null, array('POST' => 0), null, false),
                    '/accion_editar' => array(array('_route' => 'accion_editar', '_controller' => 'App\\Controller\\AccionController::editar'), null, array('POST' => 0), null, false),
                    '/accion_prev' => array(array('_route' => 'accion_prev', '_controller' => 'App\\Controller\\AccionController::accion_prev'), null, array('POST' => 0), null, false),
                    '/accion_eliminar' => array(array('_route' => 'accion_eliminar', '_controller' => 'App\\Controller\\AccionController::eliminar'), null, array('POST' => 0), null, false),
                    '/accioneficacia' => array(array('_route' => 'accioneficacia_listar', '_controller' => 'App\\Controller\\AccionEficaciaController::index'), null, null, null, false),
                    '/accioneficacia_insertar' => array(array('_route' => 'accioneficacia_insertar', '_controller' => 'App\\Controller\\AccionEficaciaController::insertar'), null, array('POST' => 0), null, false),
                    '/accioneficacia_actualizar' => array(array('_route' => 'accioneficacia_actualizar', '_controller' => 'App\\Controller\\AccionEficaciaController::actualizar'), null, array('POST' => 0), null, false),
                    '/accioneficacia_editar' => array(array('_route' => 'accioneficacia_editar', '_controller' => 'App\\Controller\\AccionEficaciaController::editar'), null, array('POST' => 0), null, false),
                    '/accioneficacia_eliminar' => array(array('_route' => 'accioneficacia_eliminar', '_controller' => 'App\\Controller\\AccionEficaciaController::eliminar'), null, array('POST' => 0), null, false),
                    '/accionreprograma' => array(array('_route' => 'accionreprograma_listar', '_controller' => 'App\\Controller\\AccionReprogramaController::index'), null, null, null, false),
                    '/accionreprograma_insertar' => array(array('_route' => 'accionreprograma_insertar', '_controller' => 'App\\Controller\\AccionReprogramaController::insertar'), null, array('POST' => 0), null, false),
                    '/accionreprograma_actualizar' => array(array('_route' => 'accionreprograma_actualizar', '_controller' => 'App\\Controller\\AccionReprogramaController::actualizar'), null, array('POST' => 0), null, false),
                    '/accionreprograma_editar' => array(array('_route' => 'accionreprograma_editar', '_controller' => 'App\\Controller\\AccionReprogramaController::editar'), null, array('POST' => 0), null, false),
                    '/dateformat' => array(array('_route' => 'dateformat', '_controller' => 'App\\Controller\\AccionReprogramaController::darformato'), null, array('POST' => 0), null, false),
                    '/accionreprograma_eliminar' => array(array('_route' => 'accionreprograma_eliminar', '_controller' => 'App\\Controller\\AccionReprogramaController::eliminar'), null, array('POST' => 0), null, false),
                    '/accionseguimiento' => array(array('_route' => 'accionseguimiento_listar', '_controller' => 'App\\Controller\\AccionSeguimientoController::index'), null, null, null, false),
                    '/accionseguimiento_insertar' => array(array('_route' => 'accionseguimiento_insertar', '_controller' => 'App\\Controller\\AccionSeguimientoController::insertar'), null, array('POST' => 0), null, false),
                    '/accionseguimiento_actualizar' => array(array('_route' => 'accionseguimiento_actualizar', '_controller' => 'App\\Controller\\AccionSeguimientoController::actualizar'), null, array('POST' => 0), null, false),
                    '/accionseguimiento_editar' => array(array('_route' => 'accionseguimiento_editar', '_controller' => 'App\\Controller\\AccionSeguimientoController::editar'), null, array('POST' => 0), null, false),
                    '/accionseguimiento_eliminar' => array(array('_route' => 'accionseguimiento_eliminar', '_controller' => 'App\\Controller\\AccionSeguimientoController::eliminar'), null, array('POST' => 0), null, false),
                    '/area' => array(array('_route' => 'area', '_controller' => 'App\\Controller\\AreaController::index'), null, null, null, false),
                    '/area_insertar' => array(array('_route' => 'area_insertar', '_controller' => 'App\\Controller\\AreaController::insertar'), null, array('POST' => 0), null, false),
                    '/area_actualizar' => array(array('_route' => 'area_actualizar', '_controller' => 'App\\Controller\\AreaController::actualizar'), null, array('POST' => 0), null, false),
                    '/area_editar' => array(array('_route' => 'area_editar', '_controller' => 'App\\Controller\\AreaController::editar'), null, array('POST' => 0), null, false),
                    '/area_prev' => array(array('_route' => 'area_prev', '_controller' => 'App\\Controller\\AreaController::area_prev'), null, array('POST' => 0), null, false),
                    '/area_eliminar' => array(array('_route' => 'area_eliminar', '_controller' => 'App\\Controller\\AreaController::eliminar'), null, array('POST' => 0), null, false),
                    '/auditor' => array(array('_route' => 'auditor', '_controller' => 'App\\Controller\\AuditorController::index'), null, null, null, false),
                    '/auditor_insertar' => array(array('_route' => 'auditor_insertar', '_controller' => 'App\\Controller\\AuditorController::insertar'), null, array('POST' => 0), null, false),
                    '/auditor_actualizar' => array(array('_route' => 'auditor_actualizar', '_controller' => 'App\\Controller\\AuditorController::actualizar'), null, array('POST' => 0), null, false),
                    '/auditor_editar' => array(array('_route' => 'auditor_editar', '_controller' => 'App\\Controller\\AuditorController::editar'), null, array('POST' => 0), null, false),
                    '/auditor_prev' => array(array('_route' => 'auditor_prev', '_controller' => 'App\\Controller\\AuditorController::auditor_prev'), null, array('POST' => 0), null, false),
                    '/auditor_eliminar' => array(array('_route' => 'auditor_eliminar', '_controller' => 'App\\Controller\\AuditorController::eliminar'), null, array('POST' => 0), null, false),
                    '/auditoria' => array(array('_route' => 'auditoria', '_controller' => 'App\\Controller\\AuditoriaController::index'), null, null, null, false),
                    '/auditoria_insertar' => array(array('_route' => 'auditoria_insertar', '_controller' => 'App\\Controller\\AuditoriaController::insertar'), null, array('POST' => 0), null, false),
                    '/auditoria_actualizar' => array(array('_route' => 'auditoria_actualizar', '_controller' => 'App\\Controller\\AuditoriaController::actualizar'), null, array('POST' => 0), null, false),
                    '/auditoria_editar' => array(array('_route' => 'auditoria_editar', '_controller' => 'App\\Controller\\AuditoriaController::editar'), null, array('POST' => 0), null, false),
                    '/auditoria_prev' => array(array('_route' => 'auditoria_prev', '_controller' => 'App\\Controller\\AuditoriaController::auditoria_prev'), null, array('POST' => 0), null, false),
                    '/auditoria_eliminar' => array(array('_route' => 'auditoria_eliminar', '_controller' => 'App\\Controller\\AuditoriaController::eliminar'), null, array('POST' => 0), null, false),
                    '/auditoriaequipo' => array(array('_route' => 'auditoriaequipo', '_controller' => 'App\\Controller\\AuditoriaEquipoController::index'), null, null, null, false),
                    '/auditoriaequipo_insertar' => array(array('_route' => 'auditoriaequipo_insertar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::insertar'), null, array('POST' => 0), null, false),
                    '/auditoriaequipo_actualizar' => array(array('_route' => 'auditoriaequipo_actualizar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::actualizar'), null, array('POST' => 0), null, false),
                    '/auditoriaequipo_editar' => array(array('_route' => 'auditoriaequipo_editar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::editar'), null, array('POST' => 0), null, false),
                    '/auditoriaequipo_eliminar' => array(array('_route' => 'auditoriaequipo_eliminar', '_controller' => 'App\\Controller\\AuditoriaEquipoController::eliminar'), null, array('POST' => 0), null, false),
                    '/auditoriatipo' => array(array('_route' => 'auditoriatipo', '_controller' => 'App\\Controller\\AuditoriaTipoController::index'), null, null, null, false),
                    '/auditoriatipo_insertar' => array(array('_route' => 'auditoriatipo_insertar', '_controller' => 'App\\Controller\\AuditoriaTipoController::insertar'), null, array('POST' => 0), null, false),
                    '/auditoriatipo_actualizar' => array(array('_route' => 'auditoriatipo_actualizar', '_controller' => 'App\\Controller\\AuditoriaTipoController::actualizar'), null, array('POST' => 0), null, false),
                    '/auditoriatipo_editar' => array(array('_route' => 'auditoriatipo_editar', '_controller' => 'App\\Controller\\AuditoriaTipoController::editar'), null, array('POST' => 0), null, false),
                    '/auditoriatipo_eliminar' => array(array('_route' => 'auditoriatipo_eliminar', '_controller' => 'App\\Controller\\AuditoriaTipoController::eliminar'), null, array('POST' => 0), null, false),
                    '/croseguimiento' => array(array('_route' => 'croseguimiento', '_controller' => 'App\\Controller\\CROSeguimientoController::index'), null, null, null, false),
                    '/croseguimiento_insertar' => array(array('_route' => 'croseguimiento_insertar', '_controller' => 'App\\Controller\\CROSeguimientoController::insertar'), null, array('POST' => 0), null, false),
                    '/croseguimiento_actualizar' => array(array('_route' => 'croseguimiento_actualizar', '_controller' => 'App\\Controller\\CROSeguimientoController::actualizar'), null, array('POST' => 0), null, false),
                    '/croseguimiento_editar' => array(array('_route' => 'croseguimiento_editar', '_controller' => 'App\\Controller\\CROSeguimientoController::editar'), null, array('POST' => 0), null, false),
                    '/croseguimiento_eliminar' => array(array('_route' => 'croseguimiento_eliminar', '_controller' => 'App\\Controller\\CROSeguimientoController::eliminar'), null, array('POST' => 0), null, false),
                    '/catalogo' => array(array('_route' => 'catalogo', '_controller' => 'App\\Controller\\CatalogoController::index'), null, null, null, false),
                    '/catalogo_insertar' => array(array('_route' => 'catalogo_insertar', '_controller' => 'App\\Controller\\CatalogoController::insertar'), null, array('POST' => 0), null, false),
                    '/catalogo_actualizar' => array(array('_route' => 'catalogo_actualizar', '_controller' => 'App\\Controller\\CatalogoController::actualizar'), null, array('POST' => 0), null, false),
                    '/catalogo_editar' => array(array('_route' => 'catalogo_editar', '_controller' => 'App\\Controller\\CatalogoController::editar'), null, array('POST' => 0), null, false),
                    '/catalogo_eliminar' => array(array('_route' => 'catalogo_eliminar', '_controller' => 'App\\Controller\\CatalogoController::eliminar'), null, array('POST' => 0), null, false),
                    '/categorianoticia' => array(array('_route' => 'categoria_noticia', '_controller' => 'App\\Controller\\CategoriaNoticiaController::index'), null, null, null, false),
                    '/categorianoticia_insertar' => array(array('_route' => 'categorianoticia_insertar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::insertar'), null, array('POST' => 0), null, false),
                    '/categorianoticia_actualizar' => array(array('_route' => 'categorianoticia_actualizar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::actualizar'), null, array('POST' => 0), null, false),
                    '/categorianoticia_editar' => array(array('_route' => 'categorianoticia_editar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::editar'), null, array('POST' => 0), null, false),
                    '/categoria_prev' => array(array('_route' => 'categoria_prev', '_controller' => 'App\\Controller\\CategoriaNoticiaController::categoria_prev'), null, array('POST' => 0), null, false),
                    '/categorianoticia_eliminar' => array(array('_route' => 'categorianoticia_eliminar', '_controller' => 'App\\Controller\\CategoriaNoticiaController::eliminar'), null, array('POST' => 0), null, false),
                    '/controlcorrelativo' => array(array('_route' => 'controlcorrelativo_listar', '_controller' => 'App\\Controller\\ControlCorrelativoController::index'), null, null, null, false),
                    '/controlcorrelativo_insertar' => array(array('_route' => 'controlcorrelativo_insertar', '_controller' => 'App\\Controller\\ControlCorrelativoController::insertar'), null, array('POST' => 0), null, false),
                    '/controlcorrelativo_actualizar' => array(array('_route' => 'controlcorrelativo_actualizar', '_controller' => 'App\\Controller\\ControlCorrelativoController::actualizar'), null, array('POST' => 0), null, false),
                    '/controlcorrelativo_editar' => array(array('_route' => 'controlcorrelativo_editar', '_controller' => 'App\\Controller\\ControlCorrelativoController::editar'), null, array('POST' => 0), null, false),
                    '/controlcorrelativo_eliminar' => array(array('_route' => 'controlcorrelativo_eliminar', '_controller' => 'App\\Controller\\ControlCorrelativoController::eliminar'), null, array('POST' => 0), null, false),
                    '/datoempresarial' => array(array('_route' => 'datoempresarial_listar', '_controller' => 'App\\Controller\\DatoEmpresarialController::index'), null, null, null, false),
                    '/datoempresarial_insertar' => array(array('_route' => 'datoempresarial_insertar', '_controller' => 'App\\Controller\\DatoEmpresarialController::insertar'), null, array('POST' => 0), null, false),
                    '/datoempresarial_actualizar' => array(array('_route' => 'datoempresarial_actualizar', '_controller' => 'App\\Controller\\DatoEmpresarialController::actualizar'), null, array('POST' => 0), null, false),
                    '/datoempresarial_editar' => array(array('_route' => 'datoempresarial_editar', '_controller' => 'App\\Controller\\DatoEmpresarialController::editar'), null, array('POST' => 0), null, false),
                    '/datoempresarial_eliminar' => array(array('_route' => 'datoempresarial_eliminar', '_controller' => 'App\\Controller\\DatoEmpresarialController::eliminar'), null, array('POST' => 0), null, false),
                    '/detalleauditor' => array(array('_route' => 'detalleauditor_listar', '_controller' => 'App\\Controller\\DetalleAuditorController::index'), null, null, null, false),
                    '/detalleauditor_insertar' => array(array('_route' => 'detalleauditor_insertar', '_controller' => 'App\\Controller\\DetalleAuditorController::insertar'), null, array('POST' => 0), null, false),
                    '/detalleauditor_actualizar' => array(array('_route' => 'detalleauditor_actualizar', '_controller' => 'App\\Controller\\DetalleAuditorController::actualizar'), null, array('POST' => 0), null, false),
                    '/detalleauditor_editar' => array(array('_route' => 'detalleauditor_editar', '_controller' => 'App\\Controller\\DetalleAuditorController::editar'), null, array('POST' => 0), null, false),
                    '/detalleauditor_eliminar' => array(array('_route' => 'detalleauditor_eliminar', '_controller' => 'App\\Controller\\DetalleAuditorController::eliminar'), null, array('POST' => 0), null, false),
                    '/detalledocumento' => array(array('_route' => 'detalledocumento_listar', '_controller' => 'App\\Controller\\DetalleDocumentoController::index'), null, null, null, false),
                    '/detalledocumento_insertar' => array(array('_route' => 'detalledocumento_insertar', '_controller' => 'App\\Controller\\DetalleDocumentoController::insertar'), null, array('POST' => 0), null, false),
                    '/detalledocumento_actualizar' => array(array('_route' => 'detalledocumento_actualizar', '_controller' => 'App\\Controller\\DetalleDocumentoController::actualizar'), null, array('POST' => 0), null, false),
                    '/detalledocumento_editar' => array(array('_route' => 'detalledocumento_editar', '_controller' => 'App\\Controller\\DetalleDocumentoController::editar'), null, array('POST' => 0), null, false),
                    '/detalledocumento_eliminar' => array(array('_route' => 'detalledocumento_eliminar', '_controller' => 'App\\Controller\\DetalleDocumentoController::eliminar'), null, array('POST' => 0), null, false),
                    '/docprocesorev' => array(array('_route' => 'docprocesorev', '_controller' => 'App\\Controller\\DocProcRevisionController::index'), null, null, null, false),
                    '/docprocesorev_insertar' => array(array('_route' => 'docprocesorev_insertar', '_controller' => 'App\\Controller\\DocProcRevisionController::insertar'), null, array('POST' => 0), null, false),
                    '/docprocesorev_actualizar' => array(array('_route' => 'docprocesorev_actualizar', '_controller' => 'App\\Controller\\DocProcRevisionController::actualizar'), null, array('POST' => 0), null, false),
                    '/docprocesorev_editar' => array(array('_route' => 'docprocesorev_editar', '_controller' => 'App\\Controller\\DocProcRevisionController::editar'), null, array('POST' => 0), null, false),
                    '/docrev_prev' => array(array('_route' => 'docrev_prev', '_controller' => 'App\\Controller\\DocProcRevisionController::docrev_prev'), null, array('POST' => 0), null, false),
                    '/docprocesorev_eliminar' => array(array('_route' => 'docprocesorev_eliminar', '_controller' => 'App\\Controller\\DocProcRevisionController::eliminar'), null, array('POST' => 0), null, false),
                    '/doctipoextra' => array(array('_route' => 'doctipoextra', '_controller' => 'App\\Controller\\DocTipoExtraController::index'), null, null, null, false),
                    '/doctipoextra_insertar' => array(array('_route' => 'doctipoextra_insertar', '_controller' => 'App\\Controller\\DocTipoExtraController::insertar'), null, array('POST' => 0), null, false),
                    '/doctipoextra_actualizar' => array(array('_route' => 'doctipoextra_actualizar', '_controller' => 'App\\Controller\\DocTipoExtraController::actualizar'), null, array('POST' => 0), null, false),
                    '/doctipoextra_editar' => array(array('_route' => 'doctipoextra_editar', '_controller' => 'App\\Controller\\DocTipoExtraController::editar'), null, array('POST' => 0), null, false),
                    '/tipoext_prev' => array(array('_route' => 'tipoext_prev', '_controller' => 'App\\Controller\\DocTipoExtraController::tipoext_prev'), null, array('POST' => 0), null, false),
                    '/doctipoextra_eliminar' => array(array('_route' => 'doctipoextra_eliminar', '_controller' => 'App\\Controller\\DocTipoExtraController::eliminar'), null, array('POST' => 0), null, false),
                    '/documentoadicional' => array(array('_route' => 'documentoadicional', '_controller' => 'App\\Controller\\DocumentoAdicionalController::index'), null, null, null, false),
                    '/documento_adicional_insertar' => array(array('_route' => 'documento_adicional_insertar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::insertar'), null, array('POST' => 0), null, false),
                    '/documento_adicional_actualizar' => array(array('_route' => 'documento_adicional_actualizar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::actualizar'), null, array('POST' => 0), null, false),
                    '/documento_adicional_editar' => array(array('_route' => 'documento_adicional_editar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::editar'), null, array('POST' => 0), null, false),
                    '/documento_adicional_eliminar' => array(array('_route' => 'documento_adicional_eliminar', '_controller' => 'App\\Controller\\DocumentoAdicionalController::eliminar'), null, array('POST' => 0), null, false),
                    '/bajadocumento' => array(array('_route' => 'bajadocumento_listar', '_controller' => 'App\\Controller\\DocumentoBajaController::index'), null, null, null, false),
                    '/bajadocumento_insertar' => array(array('_route' => 'bajadocumento_insertar', '_controller' => 'App\\Controller\\DocumentoBajaController::insertar'), null, array('POST' => 0), null, false),
                    '/bajadocumento_actualizar' => array(array('_route' => 'bajadocumento_actualizar', '_controller' => 'App\\Controller\\DocumentoBajaController::actualizar'), null, array('POST' => 0), null, false),
                    '/bajadocumento_editar' => array(array('_route' => 'bajadocumento_editar', '_controller' => 'App\\Controller\\DocumentoBajaController::editar'), null, array('POST' => 0), null, false),
                    '/bajadocumento_eliminar' => array(array('_route' => 'bajadocumento_eliminar', '_controller' => 'App\\Controller\\DocumentoBajaController::eliminar'), null, array('POST' => 0), null, false),
                    '/documento' => array(array('_route' => 'documento_listar', '_controller' => 'App\\Controller\\DocumentoController::index'), null, null, null, false),
                    '/documento_insertar' => array(array('_route' => 'documento_insertar', '_controller' => 'App\\Controller\\DocumentoController::insertar'), null, array('POST' => 0), null, false),
                    '/documento_actualizar' => array(array('_route' => 'documento_actualizar', '_controller' => 'App\\Controller\\DocumentoController::actualizar'), null, array('POST' => 0), null, false),
                    '/documento_editar' => array(array('_route' => 'documento_editar', '_controller' => 'App\\Controller\\DocumentoController::editar'), null, array('POST' => 0), null, false),
                    '/documento_prev' => array(array('_route' => 'documento_prev', '_controller' => 'App\\Controller\\DocumentoController::documento_prev'), null, array('POST' => 0), null, false),
                    '/documento_eliminar' => array(array('_route' => 'documento_eliminar', '_controller' => 'App\\Controller\\DocumentoController::eliminar'), null, array('POST' => 0), null, false),
                    '/documentoextra' => array(array('_route' => 'documentoextra_listar', '_controller' => 'App\\Controller\\DocumentoExtraController::index'), null, null, null, false),
                    '/documentoextra_insertar' => array(array('_route' => 'documentoextra_insertar', '_controller' => 'App\\Controller\\DocumentoExtraController::insertar'), null, array('POST' => 0), null, false),
                    '/documentoextra_actualizar' => array(array('_route' => 'documentoextra_actualizar', '_controller' => 'App\\Controller\\DocumentoExtraController::actualizar'), null, array('POST' => 0), null, false),
                    '/documentoextra_editar' => array(array('_route' => 'documentoextra_editar', '_controller' => 'App\\Controller\\DocumentoExtraController::editar'), null, array('POST' => 0), null, false),
                    '/documentoextra_eliminar' => array(array('_route' => 'documentoextra_eliminar', '_controller' => 'App\\Controller\\DocumentoExtraController::eliminar'), null, array('POST' => 0), null, false),
                    '/documentoformulario' => array(array('_route' => 'documentoformulario', '_controller' => 'App\\Controller\\DocumentoFormularioController::index'), null, null, null, false),
                    '/documentoformulario_insertar' => array(array('_route' => 'documentoformulario_insertar', '_controller' => 'App\\Controller\\DocumentoFormularioController::insertar'), null, array('POST' => 0), null, false),
                    '/documentoformulario_actualizar' => array(array('_route' => 'documentoformulario_actualizar', '_controller' => 'App\\Controller\\DocumentoFormularioController::actualizar'), null, array('POST' => 0), null, false),
                    '/documentoformulario_editar' => array(array('_route' => 'documentoformulario_editar', '_controller' => 'App\\Controller\\DocumentoFormularioController::editar'), null, array('POST' => 0), null, false),
                    '/documentoformulario_eliminar' => array(array('_route' => 'documentoformulario_eliminar', '_controller' => 'App\\Controller\\DocumentoFormularioController::eliminar'), null, array('POST' => 0), null, false),
                    '/documentoproceso' => array(array('_route' => 'documentoproceso_listar', '_controller' => 'App\\Controller\\DocumentoProcesoController::index'), null, null, null, false),
                    '/documentoproceso_insertar' => array(array('_route' => 'documentoproceso_insertar', '_controller' => 'App\\Controller\\DocumentoProcesoController::insertar'), null, array('POST' => 0), null, false),
                    '/documentoproceso_actualizar' => array(array('_route' => 'documentoproceso_actualizar', '_controller' => 'App\\Controller\\DocumentoProcesoController::actualizar'), null, array('POST' => 0), null, false),
                    '/documentoproceso_editar' => array(array('_route' => 'documentoproceso_editar', '_controller' => 'App\\Controller\\DocumentoProcesoController::editar'), null, array('POST' => 0), null, false),
                    '/docproc_prev' => array(array('_route' => 'docproc_prev', '_controller' => 'App\\Controller\\DocumentoProcesoController::docproc_prev'), null, array('POST' => 0), null, false),
                    '/documentoproceso_eliminar' => array(array('_route' => 'documentoproceso_eliminar', '_controller' => 'App\\Controller\\DocumentoProcesoController::eliminar'), null, array('POST' => 0), null, false),
                    '/documentosaso' => array(array('_route' => 'documentosaso_listar', '_controller' => 'App\\Controller\\DocumentosAsoController::index'), null, null, null, false),
                    '/documentosaso_insertar' => array(array('_route' => 'documentosaso_insertar', '_controller' => 'App\\Controller\\DocumentosAsoController::insertar'), null, array('POST' => 0), null, false),
                    '/documentosaso_actualizar' => array(array('_route' => 'documentosaso_actualizar', '_controller' => 'App\\Controller\\DocumentosAsoController::actualizar'), null, array('POST' => 0), null, false),
                    '/documentosaso_editar' => array(array('_route' => 'documentosaso_editar', '_controller' => 'App\\Controller\\DocumentosAsoController::editar'), null, array('POST' => 0), null, false),
                    '/documentosaso_eliminar' => array(array('_route' => 'documentosaso_eliminar', '_controller' => 'App\\Controller\\DocumentosAsoController::eliminar'), null, array('POST' => 0), null, false),
                    '/enlaces' => array(array('_route' => 'enlaces', '_controller' => 'App\\Controller\\EnlacesController::index'), null, null, null, false),
                    '/enlaces_actualizar' => array(array('_route' => 'enlaces_actualizar', '_controller' => 'App\\Controller\\EnlacesController::actualizar'), null, array('POST' => 0), null, false),
                    '/enlaces_editar' => array(array('_route' => 'enlaces_editar', '_controller' => 'App\\Controller\\EnlacesController::editar'), null, array('POST' => 0), null, false),
                    '/enlaces_eliminar' => array(array('_route' => 'enlaces_eliminar', '_controller' => 'App\\Controller\\EnlacesController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadocorrelativo' => array(array('_route' => 'estadocorrelativo', '_controller' => 'App\\Controller\\EstadoCorrelativoController::index'), null, null, null, false),
                    '/estadocorrelativo_insertar' => array(array('_route' => 'estadocorrelativo_insertar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::insertar'), null, array('POST' => 0), null, false),
                    '/estadocorrelativo_actualizar' => array(array('_route' => 'estadocorrelativo_actualizar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadocorrelativo_editar' => array(array('_route' => 'estadocorrelativo_editar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::editar'), null, array('POST' => 0), null, false),
                    '/estadocorrelativo_eliminar' => array(array('_route' => 'estadocorrelativo_eliminar', '_controller' => 'App\\Controller\\EstadoCorrelativoController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadodocumento' => array(array('_route' => 'estadodocumento', '_controller' => 'App\\Controller\\EstadoDocumentoController::index'), null, null, null, false),
                    '/estadodocumento_insertar' => array(array('_route' => 'estadodocumento_insertar', '_controller' => 'App\\Controller\\EstadoDocumentoController::insertar'), null, array('POST' => 0), null, false),
                    '/estadodocumento_actualizar' => array(array('_route' => 'estadodocumento_actualizar', '_controller' => 'App\\Controller\\EstadoDocumentoController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadodocumento_editar' => array(array('_route' => 'estadodocumento_editar', '_controller' => 'App\\Controller\\EstadoDocumentoController::editar'), null, array('POST' => 0), null, false),
                    '/estadodocumento_eliminar' => array(array('_route' => 'estadodocumento_eliminar', '_controller' => 'App\\Controller\\EstadoDocumentoController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadonovedad' => array(array('_route' => 'estadonovedad', '_controller' => 'App\\Controller\\EstadoNovedadController::index'), null, null, null, false),
                    '/estadonovedad_insertar' => array(array('_route' => 'estadonovedad_insertar', '_controller' => 'App\\Controller\\EstadoNovedadController::insertar'), null, array('POST' => 0), null, false),
                    '/estadonovedad_actualizar' => array(array('_route' => 'estadonovedad_actualizar', '_controller' => 'App\\Controller\\EstadoNovedadController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadonovedad_editar' => array(array('_route' => 'estadonovedad_editar', '_controller' => 'App\\Controller\\EstadoNovedadController::editar'), null, array('POST' => 0), null, false),
                    '/estadonovedad_eliminar' => array(array('_route' => 'estadonovedad_eliminar', '_controller' => 'App\\Controller\\EstadoNovedadController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadopersonal' => array(array('_route' => 'estadopersonal', '_controller' => 'App\\Controller\\EstadoPersonalController::index'), null, null, null, false),
                    '/estadopersonal_insertar' => array(array('_route' => 'estadopersonal_insertar', '_controller' => 'App\\Controller\\EstadoPersonalController::insertar'), null, array('POST' => 0), null, false),
                    '/estadopersonal_actualizar' => array(array('_route' => 'estadopersonal_actualizar', '_controller' => 'App\\Controller\\EstadoPersonalController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadopersonal_editar' => array(array('_route' => 'estadopersonal_editar', '_controller' => 'App\\Controller\\EstadoPersonalController::editar'), null, array('POST' => 0), null, false),
                    '/estado_prev' => array(array('_route' => 'estado_prev', '_controller' => 'App\\Controller\\EstadoPersonalController::estado_prev'), null, array('POST' => 0), null, false),
                    '/estadopersonal_eliminar' => array(array('_route' => 'estadopersonal_eliminar', '_controller' => 'App\\Controller\\EstadoPersonalController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadoplan' => array(array('_route' => 'estadoplan', '_controller' => 'App\\Controller\\EstadoPlanController::index'), null, null, null, false),
                    '/estadoplan_insertar' => array(array('_route' => 'estadoplan_insertar', '_controller' => 'App\\Controller\\EstadoPlanController::insertar'), null, array('POST' => 0), null, false),
                    '/estadoplan_actualizar' => array(array('_route' => 'estadoplan_actualizar', '_controller' => 'App\\Controller\\EstadoPlanController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadoplan_editar' => array(array('_route' => 'estadoplan_editar', '_controller' => 'App\\Controller\\EstadoPlanController::editar'), null, array('POST' => 0), null, false),
                    '/estadoplan_eliminar' => array(array('_route' => 'estadoplan_eliminar', '_controller' => 'App\\Controller\\EstadoPlanController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadoriesgo' => array(array('_route' => 'EstadoRiesgo', '_controller' => 'App\\Controller\\EstadoRiesgoController::index'), null, null, null, false),
                    '/estadoriesgo_insertar' => array(array('_route' => 'estadoriesgo_insertar', '_controller' => 'App\\Controller\\EstadoRiesgoController::insertar'), null, array('POST' => 0), null, false),
                    '/estadoriesgo_actualizar' => array(array('_route' => 'estadoriesgo_actualizar', '_controller' => 'App\\Controller\\EstadoRiesgoController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadoriesgo_editar' => array(array('_route' => 'estadoriesgo_editar', '_controller' => 'App\\Controller\\EstadoRiesgoController::editar'), null, array('POST' => 0), null, false),
                    '/estadoriesgo_eliminar' => array(array('_route' => 'estadoriesgo_eliminar', '_controller' => 'App\\Controller\\EstadoRiesgoController::eliminar'), null, array('POST' => 0), null, false),
                    '/estadoseguimiento' => array(array('_route' => 'estadoseguimiento', '_controller' => 'App\\Controller\\EstadoSeguimientoController::index'), null, null, null, false),
                    '/estadoseguimiento_insertar' => array(array('_route' => 'estadoseguimiento_insertar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::insertar'), null, array('POST' => 0), null, false),
                    '/estadoseguimiento_actualizar' => array(array('_route' => 'estadoseguimiento_actualizar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::actualizar'), null, array('POST' => 0), null, false),
                    '/estadoseguimiento_editar' => array(array('_route' => 'estadoseguimiento_editar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::editar'), null, array('POST' => 0), null, false),
                    '/estadoseguimiento_eliminar' => array(array('_route' => 'estadoseguimiento_eliminar', '_controller' => 'App\\Controller\\EstadoSeguimientoController::eliminar'), null, array('POST' => 0), null, false),
                    '/fichacargo' => array(array('_route' => 'fichacargo_listar', '_controller' => 'App\\Controller\\FichaCargoController::index'), null, null, null, false),
                    '/fichacargo_insertar' => array(array('_route' => 'fichacargo_insertar', '_controller' => 'App\\Controller\\FichaCargoController::insertar'), null, array('POST' => 0), null, false),
                    '/fichacargo_actualizar' => array(array('_route' => 'fichacargo_actualizar', '_controller' => 'App\\Controller\\FichaCargoController::actualizar'), null, array('POST' => 0), null, false),
                    '/fichacargo_editar' => array(array('_route' => 'fichacargo_editar', '_controller' => 'App\\Controller\\FichaCargoController::editar'), null, array('POST' => 0), null, false),
                    '/ficha_prev' => array(array('_route' => 'ficha_prev', '_controller' => 'App\\Controller\\FichaCargoController::ficha_prev'), null, array('POST' => 0), null, false),
                    '/fichacargo_eliminar' => array(array('_route' => 'fichacargo_eliminar', '_controller' => 'App\\Controller\\FichaCargoController::eliminar'), null, array('POST' => 0), null, false),
                    '/fichaprocesos' => array(array('_route' => 'fichaprocesos_listar', '_controller' => 'App\\Controller\\FichaProcesosController::index'), null, null, null, false),
                    '/fichaprocesos_insertar' => array(array('_route' => 'fichaprocesos_insertar', '_controller' => 'App\\Controller\\FichaProcesosController::insertar'), null, array('POST' => 0), null, false),
                    '/fichaprocesos_actualizar' => array(array('_route' => 'fichaprocesos_actualizar', '_controller' => 'App\\Controller\\FichaProcesosController::actualizar'), null, array('POST' => 0), null, false),
                    '/fichaprocesos_editar' => array(array('_route' => 'fichaprocesos_editar', '_controller' => 'App\\Controller\\FichaProcesosController::editar'), null, array('POST' => 0), null, false),
                    '/fichaproc_prev' => array(array('_route' => 'fichaproc_prev', '_controller' => 'App\\Controller\\FichaProcesosController::fichaproc_prev'), null, array('POST' => 0), null, false),
                    '/fichaprocesos_eliminar' => array(array('_route' => 'fichaprocesos_eliminar', '_controller' => 'App\\Controller\\FichaProcesosController::eliminar'), null, array('POST' => 0), null, false),
                    '/files' => array(array('_route' => 'file_listar', '_controller' => 'App\\Controller\\FileController::index'), null, array('GET' => 0, 'POST' => 1), null, false),
                    '/files_actualizar' => array(array('_route' => 'files_actualizar', '_controller' => 'App\\Controller\\FileController::actualizar'), null, array('POST' => 0), null, false),
                    '/files_editar' => array(array('_route' => 'files_editar', '_controller' => 'App\\Controller\\FileController::editar'), null, array('POST' => 0), null, false),
                    '/files_eliminar' => array(array('_route' => 'files_eliminar', '_controller' => 'App\\Controller\\FileController::eliminar'), null, array('POST' => 0), null, false),
                    '/fortaleza' => array(array('_route' => 'fortaleza', '_controller' => 'App\\Controller\\FortalezaController::index'), null, null, null, false),
                    '/fortaleza_insertar' => array(array('_route' => 'fortaleza_insertar', '_controller' => 'App\\Controller\\FortalezaController::insertar'), null, array('POST' => 0), null, false),
                    '/fortaleza_actualizar' => array(array('_route' => 'fortaleza_actualizar', '_controller' => 'App\\Controller\\FortalezaController::actualizar'), null, array('POST' => 0), null, false),
                    '/fortaleza_editar' => array(array('_route' => 'fortaleza_editar', '_controller' => 'App\\Controller\\FortalezaController::editar'), null, array('POST' => 0), null, false),
                    '/fortaleza_eliminar' => array(array('_route' => 'fortaleza_eliminar', '_controller' => 'App\\Controller\\FortalezaController::eliminar'), null, array('POST' => 0), null, false),
                    '/galeria' => array(array('_route' => 'galeria', '_controller' => 'App\\Controller\\GaleriaController::index'), null, null, null, false),
                    '/galeria_insertar' => array(array('_route' => 'galeria_insertar', '_controller' => 'App\\Controller\\GaleriaController::insertar'), null, array('POST' => 0), null, false),
                    '/galeria_actualizar' => array(array('_route' => 'galeria_actualizar', '_controller' => 'App\\Controller\\GaleriaController::actualizar'), null, array('POST' => 0), null, false),
                    '/galeria_editar' => array(array('_route' => 'galeria_editar', '_controller' => 'App\\Controller\\GaleriaController::editar'), null, array('POST' => 0), null, false),
                    '/galeria_eliminar' => array(array('_route' => 'galeria_eliminar', '_controller' => 'App\\Controller\\GaleriaController::eliminar'), null, array('POST' => 0), null, false),
                    '/gciarsector' => array(array('_route' => 'gciarsector', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::index'), null, null, null, false),
                    '/gciarsector_insertar' => array(array('_route' => 'gciarsector_insertar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::insertar'), null, array('POST' => 0), null, false),
                    '/gciarsector_actualizar' => array(array('_route' => 'gciarsector_actualizar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::actualizar'), null, array('POST' => 0), null, false),
                    '/gciarsector_editar' => array(array('_route' => 'gciarsectoreditar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::editar'), null, array('POST' => 0), null, false),
                    '/gciarsector_prev' => array(array('_route' => 'gciarsector_prev', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::gciarsector_prev'), null, array('POST' => 0), null, false),
                    '/gciarsector_eliminar' => array(array('_route' => 'gciarsector_eliminar', '_controller' => 'App\\Controller\\GerenciaAreaSectorController::eliminar'), null, array('POST' => 0), null, false),
                    '/gerencia' => array(array('_route' => 'gerencia', '_controller' => 'App\\Controller\\GerenciaController::index'), null, null, null, false),
                    '/gerencia_insertar' => array(array('_route' => 'gerencia_insertar', '_controller' => 'App\\Controller\\GerenciaController::insertar'), null, array('POST' => 0), null, false),
                    '/gerencia_actualizar' => array(array('_route' => 'gerencia_actualizar', '_controller' => 'App\\Controller\\GerenciaController::actualizar'), null, array('POST' => 0), null, false),
                    '/gerencia_editar' => array(array('_route' => 'gerencia_editar', '_controller' => 'App\\Controller\\GerenciaController::editar'), null, array('POST' => 0), null, false),
                    '/gerencia_prev' => array(array('_route' => 'gerencia_prev', '_controller' => 'App\\Controller\\GerenciaController::gerencia_prev'), null, array('POST' => 0), null, false),
                    '/gerencia_eliminar' => array(array('_route' => 'gerencia_eliminar', '_controller' => 'App\\Controller\\GerenciaController::eliminar'), null, array('POST' => 0), null, false),
                    '/gruporiesgo' => array(array('_route' => 'gruporiesgo', '_controller' => 'App\\Controller\\GrupoRiesgoController::index'), null, null, null, false),
                    '/gruporiesgo_insertar' => array(array('_route' => 'gruporiesgo_insertar', '_controller' => 'App\\Controller\\GrupoRiesgoController::insertar'), null, array('POST' => 0), null, false),
                    '/gruporiesgo_actualizar' => array(array('_route' => 'gruporiesgo_actualizar', '_controller' => 'App\\Controller\\GrupoRiesgoController::actualizar'), null, array('POST' => 0), null, false),
                    '/gruporiesgo_editar' => array(array('_route' => 'gruporiesgo_editar', '_controller' => 'App\\Controller\\GrupoRiesgoController::editar'), null, array('POST' => 0), null, false),
                    '/gruporiesgo_eliminar' => array(array('_route' => 'gruporiesgo_eliminar', '_controller' => 'App\\Controller\\GrupoRiesgoController::eliminar'), null, array('POST' => 0), null, false),
                    '/hallazgo' => array(array('_route' => 'hallazgo_listar', '_controller' => 'App\\Controller\\HallazgoController::index'), null, null, null, false),
                    '/hallazgo_insertar' => array(array('_route' => 'hallazgo_insertar', '_controller' => 'App\\Controller\\HallazgoController::insertar'), null, array('POST' => 0), null, false),
                    '/hallazgo_actualizar' => array(array('_route' => 'hallazgo_actualizar', '_controller' => 'App\\Controller\\HallazgoController::actualizar'), null, array('POST' => 0), null, false),
                    '/hallazgo_editar' => array(array('_route' => 'hallazgo_editar', '_controller' => 'App\\Controller\\HallazgoController::editar'), null, array('POST' => 0), null, false),
                    '/hallazgo_prev' => array(array('_route' => 'hallazgo_prev', '_controller' => 'App\\Controller\\HallazgoController::hallazgo_prev'), null, array('POST' => 0), null, false),
                    '/hallazgo_eliminar' => array(array('_route' => 'hallazgo_eliminar', '_controller' => 'App\\Controller\\HallazgoController::eliminar'), null, array('POST' => 0), null, false),
                    '/impacto' => array(array('_route' => 'impacto', '_controller' => 'App\\Controller\\ImpactoController::index'), null, null, null, false),
                    '/impacto_insertar' => array(array('_route' => 'impacto_insertar', '_controller' => 'App\\Controller\\ImpactoController::insertar'), null, array('POST' => 0), null, false),
                    '/impacto_actualizar' => array(array('_route' => 'impacto_actualizar', '_controller' => 'App\\Controller\\ImpactoController::actualizar'), null, array('POST' => 0), null, false),
                    '/impacto_editar' => array(array('_route' => 'impacto_editar', '_controller' => 'App\\Controller\\ImpactoController::editar'), null, array('POST' => 0), null, false),
                    '/impacto_prev' => array(array('_route' => 'impacto_prev', '_controller' => 'App\\Controller\\ImpactoController::impacto_prev'), null, array('POST' => 0), null, false),
                    '/impacto_eliminar' => array(array('_route' => 'impacto_eliminar', '_controller' => 'App\\Controller\\ImpactoController::eliminar'), null, array('POST' => 0), null, false),
                    '/' => array(array('_route' => 'elfec_listar', '_controller' => 'App\\Controller\\IndexController::index'), null, null, null, false),
                    '/indicadorproceso' => array(array('_route' => 'indicadorproceso_listar', '_controller' => 'App\\Controller\\IndicadorProcesoController::index'), null, null, null, false),
                    '/indicadorproceso_insertar' => array(array('_route' => 'indicadorproceso_insertar', '_controller' => 'App\\Controller\\IndicadorProcesoController::insertar'), null, array('POST' => 0), null, false),
                    '/indicadorproceso_actualizar' => array(array('_route' => 'indicadorproceso_actualizar', '_controller' => 'App\\Controller\\IndicadorProcesoController::actualizar'), null, array('POST' => 0), null, false),
                    '/indicadorproceso_editar' => array(array('_route' => 'indicadorproceso_editar', '_controller' => 'App\\Controller\\IndicadorProcesoController::editar'), null, array('POST' => 0), null, false),
                    '/indicador_prev' => array(array('_route' => 'indicador_prev', '_controller' => 'App\\Controller\\IndicadorProcesoController::indicador_prev'), null, array('POST' => 0), null, false),
                    '/indicadorproceso_eliminar' => array(array('_route' => 'indicadorproceso_eliminar', '_controller' => 'App\\Controller\\IndicadorProcesoController::eliminar'), null, array('POST' => 0), null, false),
                    '/menu' => array(array('_route' => 'menu', '_controller' => 'App\\Controller\\MenuController::index'), null, null, null, false),
                    '/menu_insertar' => array(array('_route' => 'menu_insertar', '_controller' => 'App\\Controller\\MenuController::insertar'), null, array('POST' => 0), null, false),
                    '/menu_actualizar' => array(array('_route' => 'menu_actualizar', '_controller' => 'App\\Controller\\MenuController::actualizar'), null, array('POST' => 0), null, false),
                    '/menu_editar' => array(array('_route' => 'menu_editar', '_controller' => 'App\\Controller\\MenuController::editar'), null, array('POST' => 0), null, false),
                    '/menu_eliminar' => array(array('_route' => 'menu_eliminar', '_controller' => 'App\\Controller\\MenuController::eliminar'), null, array('POST' => 0), null, false),
                    '/mision' => array(array('_route' => 'mision', '_controller' => 'App\\Controller\\MisionController::index'), null, null, null, false),
                    '/modulo' => array(array('_route' => 'modulo_listar', '_controller' => 'App\\Controller\\ModuloController::index'), null, null, null, false),
                    '/modulo_insertar' => array(array('_route' => 'modulo_insertar', '_controller' => 'App\\Controller\\ModuloController::insertar'), null, array('POST' => 0), null, false),
                    '/modulo_actualizar' => array(array('_route' => 'modulo_actualizar', '_controller' => 'App\\Controller\\ModuloController::actualizar'), null, array('POST' => 0), null, false),
                    '/modulo_editar' => array(array('_route' => 'modulo_editar', '_controller' => 'App\\Controller\\ModuloController::editar'), null, array('POST' => 0), null, false),
                    '/modulo_eliminar' => array(array('_route' => 'modulo_eliminar', '_controller' => 'App\\Controller\\ModuloController::eliminar'), null, array('POST' => 0), null, false),
                    '/normadocumento' => array(array('_route' => 'normadocumento_listar', '_controller' => 'App\\Controller\\NormaDocumentoController::index'), null, null, null, false),
                    '/normadocumento_insertar' => array(array('_route' => 'normadocumento_insertar', '_controller' => 'App\\Controller\\NormaDocumentoController::insertar'), null, array('POST' => 0), null, false),
                    '/normadocumento_actualizar' => array(array('_route' => 'normadocumento_actualizar', '_controller' => 'App\\Controller\\NormaDocumentoController::actualizar'), null, array('POST' => 0), null, false),
                    '/normadocumento_editar' => array(array('_route' => 'normadocumento_editar', '_controller' => 'App\\Controller\\NormaDocumentoController::editar'), null, array('POST' => 0), null, false),
                    '/normadocumento_eliminar' => array(array('_route' => 'normadocumento_eliminar', '_controller' => 'App\\Controller\\NormaDocumentoController::eliminar'), null, array('POST' => 0), null, false),
                    '/noticiacategoria' => array(array('_route' => 'noticiacategoria_listar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::index'), null, null, null, false),
                    '/noticiacategoria_lista' => array(array('_route' => 'noticiacategoria_lista', '_controller' => 'App\\Controller\\NoticiaCategoriaController::mostrar'), null, array('GET' => 0), null, false),
                    '/noticiacategoria_insertar' => array(array('_route' => 'noticiacategoria_insertar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::insertar'), null, array('POST' => 0), null, false),
                    '/noticiacategoria_actualizar' => array(array('_route' => 'noticiacategoria_actualizar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::actualizar'), null, array('POST' => 0), null, false),
                    '/noticiacategoria_editar' => array(array('_route' => 'noticiacategoria_editar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::editar'), null, array('POST' => 0), null, false),
                    '/noticiacategoria_eliminar' => array(array('_route' => 'noticiacategoria_eliminar', '_controller' => 'App\\Controller\\NoticiaCategoriaController::eliminar'), null, array('POST' => 0), null, false),
                    '/noticia' => array(array('_route' => 'noticia', '_controller' => 'App\\Controller\\NoticiaController::index'), null, null, null, false),
                    '/noticia_insertar' => array(array('_route' => 'noticia_insertar', '_controller' => 'App\\Controller\\NoticiaController::insertar'), null, array('POST' => 0), null, false),
                    '/noticia_actualizar' => array(array('_route' => 'noticia_actualizar', '_controller' => 'App\\Controller\\NoticiaController::actualizar'), null, array('POST' => 0), null, false),
                    '/noticia_editar' => array(array('_route' => 'noticia_editar', '_controller' => 'App\\Controller\\NoticiaController::editar'), null, array('POST' => 0), null, false),
                    '/noticia_eliminar' => array(array('_route' => 'noticia_eliminar', '_controller' => 'App\\Controller\\NoticiaController::eliminar'), null, array('POST' => 0), null, false),
                    '/perfil' => array(array('_route' => 'perfil', '_controller' => 'App\\Controller\\PerfilController::index'), null, null, null, false),
                    '/perfil_actualizar' => array(array('_route' => 'perfil_actualizar', '_controller' => 'App\\Controller\\PerfilController::actualizar'), null, array('POST' => 0), null, false),
                    '/usuario_update_profile' => array(array('_route' => 'usuario_update_profile', '_controller' => 'App\\Controller\\PerfilController::usuario_update_profile'), null, array('POST' => 0), null, false),
                    '/usuario_update_password' => array(array('_route' => 'usuario_update_password', '_controller' => 'App\\Controller\\PerfilController::usuario_update_password'), null, array('POST' => 0), null, false),
                    '/personalcargo' => array(array('_route' => 'personalcargo_listar', '_controller' => 'App\\Controller\\PersonalCargoController::index'), null, null, null, false),
                    '/organigrama' => array(array('_route' => 'PersonalCargo_listar2', '_controller' => 'App\\Controller\\PersonalCargoController::organigrama'), null, null, null, false),
                    '/organigrama_cambios' => array(array('_route' => 'organigrama cambios', '_controller' => 'App\\Controller\\PersonalCargoController::cambiosorganigrama'), null, null, null, false),
                    '/personalcargo_insertar' => array(array('_route' => 'PersonalCargo_insertar', '_controller' => 'App\\Controller\\PersonalCargoController::insertar'), null, array('POST' => 0), null, false),
                    '/personalcargo_actualizar' => array(array('_route' => 'PersonalCargo_actualizar', '_controller' => 'App\\Controller\\PersonalCargoController::actualizar'), null, array('POST' => 0), null, false),
                    '/personalcargo_editar' => array(array('_route' => 'PersonalCargo_editar', '_controller' => 'App\\Controller\\PersonalCargoController::editar'), null, array('POST' => 0), null, false),
                    '/cargo_prev' => array(array('_route' => 'cargo_prev', '_controller' => 'App\\Controller\\PersonalCargoController::cargo_prev'), null, array('POST' => 0), null, false),
                    '/personalcargo_eliminar' => array(array('_route' => 'PersonalCargo_eliminar', '_controller' => 'App\\Controller\\PersonalCargoController::eliminar'), null, array('POST' => 0), null, false),
                    '/personal' => array(array('_route' => 'personal_listar', '_controller' => 'App\\Controller\\PersonalController::index'), null, null, null, false),
                    '/personal_insertar' => array(array('_route' => 'personal_insertar', '_controller' => 'App\\Controller\\PersonalController::insertar'), null, array('POST' => 0), null, false),
                    '/personal_actualizar' => array(array('_route' => 'personal_actualizar', '_controller' => 'App\\Controller\\PersonalController::actualizar'), null, array('POST' => 0), null, false),
                    '/personal_editar' => array(array('_route' => 'personal_editar', '_controller' => 'App\\Controller\\PersonalController::editar'), null, array('POST' => 0), null, false),
                    '/personal_eliminar' => array(array('_route' => 'personal_eliminar', '_controller' => 'App\\Controller\\PersonalController::eliminar'), null, array('POST' => 0), null, false),
                    '/planaccion' => array(array('_route' => 'planaccion', '_controller' => 'App\\Controller\\PlanAccionController::index'), null, null, null, false),
                    '/planaccion_insertar' => array(array('_route' => 'planaccion_insertar', '_controller' => 'App\\Controller\\PlanAccionController::insertar'), null, array('POST' => 0), null, false),
                    '/planaccion_actualizar' => array(array('_route' => 'planaccion_actualizar', '_controller' => 'App\\Controller\\PlanAccionController::actualizar'), null, array('POST' => 0), null, false),
                    '/planaccion_editar' => array(array('_route' => 'planaccion_editar', '_controller' => 'App\\Controller\\PlanAccionController::editar'), null, array('POST' => 0), null, false),
                    '/planaccion_eliminar' => array(array('_route' => 'planaccion_eliminar', '_controller' => 'App\\Controller\\PlanAccionController::eliminar'), null, array('POST' => 0), null, false),
                    '/poblar' => array(array('_route' => 'poblar', '_controller' => 'App\\Controller\\PoblarController::poblar'), null, array('GET' => 0), null, false),
                    '/probabilidad' => array(array('_route' => 'probabilidad', '_controller' => 'App\\Controller\\ProbabilidadController::index'), null, null, null, false),
                    '/probabilidad_insertar' => array(array('_route' => 'probabilidad_insertar', '_controller' => 'App\\Controller\\ProbabilidadController::insertar'), null, array('POST' => 0), null, false),
                    '/probabilidad_actualizar' => array(array('_route' => 'probabilidad_actualizar', '_controller' => 'App\\Controller\\ProbabilidadController::actualizar'), null, array('POST' => 0), null, false),
                    '/probabilidad_editar' => array(array('_route' => 'probabilidad_editar', '_controller' => 'App\\Controller\\ProbabilidadController::editar'), null, array('POST' => 0), null, false),
                    '/probabilidad_prev' => array(array('_route' => 'probabilidad_prev', '_controller' => 'App\\Controller\\ProbabilidadController::probabilidad_prev'), null, array('POST' => 0), null, false),
                    '/probabilidad_eliminar' => array(array('_route' => 'probabilidad_eliminar', '_controller' => 'App\\Controller\\ProbabilidadController::eliminar'), null, array('POST' => 0), null, false),
                    '/procesorelacionado' => array(array('_route' => 'procesorelacionado', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::index'), null, null, null, false),
                    '/procesorelacionado_insertar' => array(array('_route' => 'procesorelacionado_insertar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::insertar'), null, array('POST' => 0), null, false),
                    '/procesorelacionado_actualizar' => array(array('_route' => 'procesorelacionado_actualizar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::actualizar'), null, array('POST' => 0), null, false),
                    '/procesorelacionado_editar' => array(array('_route' => 'procesorelacionado_editar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::editar'), null, array('POST' => 0), null, false),
                    '/procesorelacionado_eliminar' => array(array('_route' => 'procesorelacionado_eliminar', '_controller' => 'App\\Controller\\ProcesoRelacionadoController::eliminar'), null, array('POST' => 0), null, false),
                    '/recurso' => array(array('_route' => 'recurso', '_controller' => 'App\\Controller\\RecursoController::index'), null, null, null, false),
                    '/recurso_insertar' => array(array('_route' => 'recurso_insertar', '_controller' => 'App\\Controller\\RecursoController::insertar'), null, array('POST' => 0), null, false),
                    '/recurso_actualizar' => array(array('_route' => 'recurso_actualizar', '_controller' => 'App\\Controller\\RecursoController::actualizar'), null, array('POST' => 0), null, false),
                    '/recurso_editar' => array(array('_route' => 'recurso_editar', '_controller' => 'App\\Controller\\RecursoController::editar'), null, array('POST' => 0), null, false),
                    '/recurso_eliminar' => array(array('_route' => 'recurso_eliminar', '_controller' => 'App\\Controller\\RecursoController::eliminar'), null, array('POST' => 0), null, false),
                    '/recursonecesario' => array(array('_route' => 'recursonecesario_listar', '_controller' => 'App\\Controller\\RecursoNecesarioController::index'), null, null, null, false),
                    '/recursonecesario_insertar' => array(array('_route' => 'recursonecesario_insertar', '_controller' => 'App\\Controller\\RecursoNecesarioController::insertar'), null, array('POST' => 0), null, false),
                    '/recursonecesario_actualizar' => array(array('_route' => 'recursonecesario_actualizar', '_controller' => 'App\\Controller\\RecursoNecesarioController::actualizar'), null, array('POST' => 0), null, false),
                    '/recursonecesario_editar' => array(array('_route' => 'recursonecesario_editar', '_controller' => 'App\\Controller\\RecursoNecesarioController::editar'), null, array('POST' => 0), null, false),
                    '/recursonecesario_eliminar' => array(array('_route' => 'recursonecesario_eliminar', '_controller' => 'App\\Controller\\RecursoNecesarioController::eliminar'), null, array('POST' => 0), null, false),
                    '/registromejora' => array(array('_route' => 'registromejora_listar', '_controller' => 'App\\Controller\\RegistroMejoraController::index'), null, null, null, false),
                    '/registromejora_insertar' => array(array('_route' => 'registromejora_insertar', '_controller' => 'App\\Controller\\RegistroMejoraController::insertar'), null, array('POST' => 0), null, false),
                    '/registromejora_actualizar' => array(array('_route' => 'registromejora_actualizar', '_controller' => 'App\\Controller\\RegistroMejoraController::actualizar'), null, array('POST' => 0), null, false),
                    '/registromejora_editar' => array(array('_route' => 'registromejora_editar', '_controller' => 'App\\Controller\\RegistroMejoraController::editar'), null, array('POST' => 0), null, false),
                    '/registromejora_eliminar' => array(array('_route' => 'registromejora_eliminar', '_controller' => 'App\\Controller\\RegistroMejoraController::eliminar'), null, array('POST' => 0), null, false),
                    '/reporting' => array(array('_route' => 'reporting', '_controller' => 'App\\Controller\\ReportingController::index'), null, null, null, false),
                    '/auditoria_anual' => array(array('_route' => 'auditoria_anual', '_controller' => 'App\\Controller\\ReportingController::auditoria_anual'), null, array('POST' => 0), null, false),
                    '/aud_anual' => array(array('_route' => 'aud_anual', '_controller' => 'App\\Controller\\ReportingController::aud_anual'), null, array('POST' => 0), null, false),
                    '/aud_notify' => array(array('_route' => 'aud_notify', '_controller' => 'App\\Controller\\ReportingController::aud_notify'), null, array('GET' => 0), null, false),
                    '/auditoria_notif' => array(array('_route' => 'auditoria_notif', '_controller' => 'App\\Controller\\ReportingController::auditoria_notif'), null, array('POST' => 0), null, false),
                    '/auditoria_rep' => array(array('_route' => 'auditoria_rep', '_controller' => 'App\\Controller\\ReportingController::auditoria_rep'), null, array('POST' => 0), null, false),
                    '/accion_verif' => array(array('_route' => 'accion_verif', '_controller' => 'App\\Controller\\ReportingController::accion_verif'), null, array('POST' => 0), null, false),
                    '/responsabilidad' => array(array('_route' => 'responsabilidad', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::index'), null, null, null, false),
                    '/responsabilidad_insertar' => array(array('_route' => 'responsabilidad_insertar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::insertar'), null, array('POST' => 0), null, false),
                    '/responsabilidad_actualizar' => array(array('_route' => 'responsabilidad_actualizar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::actualizar'), null, array('POST' => 0), null, false),
                    '/responsabilidad_editar' => array(array('_route' => 'constitucionales_editar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::editar'), null, array('POST' => 0), null, false),
                    '/responsabilidad_eliminar' => array(array('_route' => 'constitucionales_eliminar', '_controller' => 'App\\Controller\\ResponsabilidadSocialController::eliminar'), null, array('POST' => 0), null, false),
                    '/riesgosoportunidades' => array(array('_route' => 'riesgosoportunidades_listar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::index'), null, null, null, false),
                    '/riesgosoportunidades_insertar' => array(array('_route' => 'riesgosoportunidades_insertar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::insertar'), null, array('POST' => 0), null, false),
                    '/riesgosoportunidades_actualizar' => array(array('_route' => 'riesgosoportunidades_actualizar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::actualizar'), null, array('POST' => 0), null, false),
                    '/riesgosoportunidades_editar' => array(array('_route' => 'riesgosoportunidades_editar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::editar'), null, array('POST' => 0), null, false),
                    '/crocm_prev' => array(array('_route' => 'crocm_prev', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::crocm_prev'), null, array('POST' => 0), null, false),
                    '/riesgosoportunidades_eliminar' => array(array('_route' => 'riesgosoportunidades_eliminar', '_controller' => 'App\\Controller\\RiesgosOportunidadesController::eliminar'), null, array('POST' => 0), null, false),
                    '/rol' => array(array('_route' => 'rol', '_controller' => 'App\\Controller\\RolController::index'), null, null, null, false),
                    '/rol_insertar' => array(array('_route' => 'rol_insertar', '_controller' => 'App\\Controller\\RolController::insertar'), null, array('POST' => 0), null, false),
                    '/rol_actualizar' => array(array('_route' => 'rol_actualizar', '_controller' => 'App\\Controller\\RolController::actualizar'), null, array('POST' => 0), null, false),
                    '/rol_editar' => array(array('_route' => 'rol_editar', '_controller' => 'App\\Controller\\RolController::editar'), null, array('POST' => 0), null, false),
                    '/rol_prev' => array(array('_route' => 'rol_prev', '_controller' => 'App\\Controller\\RolController::rol_prev'), null, array('POST' => 0), null, false),
                    '/rol_eliminar' => array(array('_route' => 'rol_eliminar', '_controller' => 'App\\Controller\\RolController::eliminar'), null, array('POST' => 0), null, false),
                    '/sector' => array(array('_route' => 'sector_listar', '_controller' => 'App\\Controller\\SectorController::index'), null, null, null, false),
                    '/sector_insertar' => array(array('_route' => 'sector_insertar', '_controller' => 'App\\Controller\\SectorController::insertar'), null, array('POST' => 0), null, false),
                    '/sector_actualizar' => array(array('_route' => 'sector_actualizar', '_controller' => 'App\\Controller\\SectorController::actualizar'), null, array('POST' => 0), null, false),
                    '/sector_editar' => array(array('_route' => 'sector_editar', '_controller' => 'App\\Controller\\SectorController::editar'), null, array('POST' => 0), null, false),
                    '/sector_prev' => array(array('_route' => 'sector_prev', '_controller' => 'App\\Controller\\SectorController::sector_prev'), null, array('POST' => 0), null, false),
                    '/sector_eliminar' => array(array('_route' => 'sector_eliminar', '_controller' => 'App\\Controller\\SectorController::eliminar'), null, array('POST' => 0), null, false),
                    '/login' => array(array('_route' => 'app_security_index', '_controller' => 'App\\Controller\\SecurityController::index'), null, null, null, false),
                    '/sesion' => array(array('_route' => 'sesion', '_controller' => 'App\\Controller\\SecurityController::login'), null, array('POST' => 0), null, false),
                    '/logout' => array(array('_route' => 'logout', '_controller' => 'App\\Controller\\SecurityController::logout'), null, null, null, false),
                    '/seguimiento' => array(array('_route' => 'seguimiento', '_controller' => 'App\\Controller\\SeguimientoController::index'), null, null, null, false),
                    '/seguimiento_insertar' => array(array('_route' => 'seguimiento_insertar', '_controller' => 'App\\Controller\\SeguimientoController::insertar'), null, array('POST' => 0), null, false),
                    '/seguimiento_actualizar' => array(array('_route' => 'seguimiento_actualizar', '_controller' => 'App\\Controller\\SeguimientoController::actualizar'), null, array('POST' => 0), null, false),
                    '/seguimiento_editar' => array(array('_route' => 'seguimiento_editar', '_controller' => 'App\\Controller\\SeguimientoController::editar'), null, array('POST' => 0), null, false),
                    '/seguimiento_eliminar' => array(array('_route' => 'seguimiento_eliminar', '_controller' => 'App\\Controller\\SeguimientoController::eliminar'), null, array('POST' => 0), null, false),
                    '/seguimientocro' => array(array('_route' => 'seguimientocro', '_controller' => 'App\\Controller\\SeguimientoCroController::index'), null, null, null, false),
                    '/seguimientocro_insertar' => array(array('_route' => 'seguimientocro_insertar', '_controller' => 'App\\Controller\\SeguimientoCroController::insertar'), null, array('POST' => 0), null, false),
                    '/seguimientocro_actualizar' => array(array('_route' => 'seguimientocro_actualizar', '_controller' => 'App\\Controller\\SeguimientoCroController::actualizar'), null, array('POST' => 0), null, false),
                    '/seguimientocro_editar' => array(array('_route' => 'seguimientocro_editar', '_controller' => 'App\\Controller\\SeguimientoCroController::editar'), null, array('POST' => 0), null, false),
                    '/seguimientocro_eliminar' => array(array('_route' => 'seguimientocro_eliminar', '_controller' => 'App\\Controller\\SeguimientoCroController::eliminar'), null, array('POST' => 0), null, false),
                    '/seguimientoelaboracion' => array(array('_route' => 'seguimientoelaboracion_listar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::index'), null, null, null, false),
                    '/seguimientoelaboracion_insertar' => array(array('_route' => 'seguimientoelaboracion_insertar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::insertar'), null, array('POST' => 0), null, false),
                    '/seguimientoelaboracion_actualizar' => array(array('_route' => 'seguimientoelaboracion_actualizar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::actualizar'), null, array('POST' => 0), null, false),
                    '/seguimientoelaboracion_editar' => array(array('_route' => 'seguimientoelaboracion_editar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::editar'), null, array('POST' => 0), null, false),
                    '/seguimientoelaboracion_eliminar' => array(array('_route' => 'seguimientoelaboracion_eliminar', '_controller' => 'App\\Controller\\SeguimientoElaboracionController::eliminar'), null, array('POST' => 0), null, false),
                    '/seguimientoindicador' => array(array('_route' => 'seguimientoindicador_listar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::index'), null, null, null, false),
                    '/seguimientoindicador_insertar' => array(array('_route' => 'seguimientoindicador_insertar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::insertar'), null, array('POST' => 0), null, false),
                    '/seguimientoindicador_actualizar' => array(array('_route' => 'seguimientoindicador_actualizar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::actualizar'), null, array('POST' => 0), null, false),
                    '/seguimientoindicador_editar' => array(array('_route' => 'seguimientoindicador_editar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::editar'), null, array('POST' => 0), null, false),
                    '/seguimientoindicador_eliminar' => array(array('_route' => 'seguimientoindicador_eliminar', '_controller' => 'App\\Controller\\SeguimientoIndicadorController::eliminar'), null, array('POST' => 0), null, false),
                    '/seguimientomejora' => array(array('_route' => 'seguimientomejora_listar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::index'), null, null, null, false),
                    '/seguimientomejora_insertar' => array(array('_route' => 'seguimientomejora_insertar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::insertar'), null, array('POST' => 0), null, false),
                    '/seguimientomejora_actualizar' => array(array('_route' => 'seguimientomejora_actualizar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::actualizar'), null, array('POST' => 0), null, false),
                    '/seguimientomejora_editar' => array(array('_route' => 'seguimientomejora_editar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::editar'), null, array('POST' => 0), null, false),
                    '/seguimientomejora_eliminar' => array(array('_route' => 'seguimientomejora_eliminar', '_controller' => 'App\\Controller\\SeguimientoMejoraController::eliminar'), null, array('POST' => 0), null, false),
                    '/seguimientoplan' => array(array('_route' => 'seguimientoplan_listar', '_controller' => 'App\\Controller\\SeguimientoPlanController::index'), null, null, null, false),
                    '/seguimientoplan_insertar' => array(array('_route' => 'seguimientoplan_insertar', '_controller' => 'App\\Controller\\SeguimientoPlanController::insertar'), null, array('POST' => 0), null, false),
                    '/seguimientoplan_actualizar' => array(array('_route' => 'seguimientoplan_actualizar', '_controller' => 'App\\Controller\\SeguimientoPlanController::actualizar'), null, array('POST' => 0), null, false),
                    '/seguimientoplan_editar' => array(array('_route' => 'seguimientoplan_editar', '_controller' => 'App\\Controller\\SeguimientoPlanController::editar'), null, array('POST' => 0), null, false),
                    '/seguimientoplan_eliminar' => array(array('_route' => 'seguimientoplan_eliminar', '_controller' => 'App\\Controller\\SeguimientoPlanController::eliminar'), null, array('POST' => 0), null, false),
                    '/enlace_lista' => array(array('_route' => 'enlace_lista', '_controller' => 'App\\Controller\\ServiciosController::mostrarenlace'), null, array('GET' => 0), null, false),
                    '/menu_lista' => array(array('_route' => 'menu_lista', '_controller' => 'App\\Controller\\ServiciosController::mostrarmenu'), null, array('GET' => 0), null, false),
                    '/enviarcorreo' => array(array('_route' => 'enviarcorreo', '_controller' => 'App\\Controller\\ServiciosController::enviarcorreo'), null, null, null, false),
                    '/enviarcorreo_buzon' => array(array('_route' => 'enviarcorreo_buzon', '_controller' => 'App\\Controller\\ServiciosController::enviarcorreo_buzon'), null, null, null, false),
                    '/organigrama2' => array(array('_route' => 'organigrama2', '_controller' => 'App\\Controller\\ServiciosController::organigrama'), null, null, null, false),
                    '/directoriovista' => array(array('_route' => 'directoriovista', '_controller' => 'App\\Controller\\ServiciosController::directorio'), null, array('GET' => 0), null, false),
                    '/datoempresarial_lista' => array(array('_route' => 'datoempresarial_lista', '_controller' => 'App\\Controller\\ServiciosController::mostrar'), null, array('GET' => 0), null, false),
                    '/link_vista' => array(array('_route' => 'link_vista', '_controller' => 'App\\Controller\\ServiciosController::links'), null, array('GET' => 0), null, false),
                    '/files_vista' => array(array('_route' => 'files_vista', '_controller' => 'App\\Controller\\ServiciosController::files'), null, array('GET' => 0), null, false),
                    '/turno_service' => array(array('_route' => 'turno_vista', '_controller' => 'App\\Controller\\ServiciosController::turno'), null, array('GET' => 0), null, false),
                    '/tipoempresarial_lista' => array(array('_route' => 'tipoempresarial_lista', '_controller' => 'App\\Controller\\ServiciosController::getTipoEmpresarialLista'), null, array('GET' => 0), null, false),
                    '/last_file_service' => array(array('_route' => 'last_file_service', '_controller' => 'App\\Controller\\ServiciosController::lastFileUpload'), null, array('GET' => 0), null, false),
                    '/galeriaList' => array(array('_route' => 'galeriaList', '_controller' => 'App\\Controller\\ServiciosController::galeriaList'), null, array('GET' => 0), null, false),
                    '/galeriaIndividualService' => array(array('_route' => 'galeriaIndividualService', '_controller' => 'App\\Controller\\ServiciosController::galeriaIndividual'), null, array('POST' => 0), null, false),
                    '/noticias_vista' => array(array('_route' => 'noticias_vista', '_controller' => 'App\\Controller\\ServiciosController::noticias'), null, array('GET' => 0), null, false),
                    '/getResponsabilidadService' => array(array('_route' => 'getResponsabilidadService', '_controller' => 'App\\Controller\\ServiciosController::getResponsabilidadService'), null, array('GET' => 0), null, false),
                    '/getLastNoticiaCategoria' => array(array('_route' => 'lastNoticiaCategoria', '_controller' => 'App\\Controller\\ServiciosController::lastNoticiaCategoria'), null, array('GET' => 0), null, false),
                    '/getLastPrensaCategoria' => array(array('_route' => 'getLastPrensaCategoria', '_controller' => 'App\\Controller\\ServiciosController::lastPrensaCategoria'), null, array('GET' => 0), null, false),
                    '/catalogo_vista' => array(array('_route' => 'catalogo_vista', '_controller' => 'App\\Controller\\ServiciosController::catalogo'), null, array('GET' => 0), null, false),
                    '/accidente_vista' => array(array('_route' => 'accidente_vista', '_controller' => 'App\\Controller\\ServiciosController::accidente'), null, array('GET' => 0), null, false),
                    '/noticia_tipo' => array(array('_route' => 'noticia_tipo', '_controller' => 'App\\Controller\\ServiciosController::noticiaTipo'), null, array('POST' => 0), null, false),
                    '/getnoticias_categoria' => array(array('_route' => 'categorianoticia', '_controller' => 'App\\Controller\\ServiciosController::categoriaNoticia'), null, array('POST' => 0), null, false),
                    '/getNoticia' => array(array('_route' => 'getNoticia', '_controller' => 'App\\Controller\\ServiciosController::getNoticia'), null, array('POST' => 0), null, false),
                    '/getCumpleaneros' => array(array('_route' => 'getCumpleañeros', '_controller' => 'App\\Controller\\ServiciosController::getCumpleañeros'), null, array('GET' => 0), null, false),
                    '/login2' => array(array('_route' => 'login2', '_controller' => 'App\\Controller\\ServiciosController::login2'), null, array('POST' => 0), null, false),
                    '/sigprocfcgerencia' => array(array('_route' => 'procesogerencia', '_controller' => 'App\\Controller\\ServiciosController::procesogerencia'), null, null, null, false),
                    '/sigprocfcgerenciadetalle' => array(array('_route' => 'sigprocfcgerenciadetalle ', '_controller' => 'App\\Controller\\ServiciosController::sigprocfcgerenciadetalle'), null, array('POST' => 0), null, false),
                    '/sigprocfcprocesos' => array(array('_route' => 'procesoprocesos', '_controller' => 'App\\Controller\\ServiciosController::sigprocesoprocesos'), null, null, null, false),
                    '/indicadores' => array(array('_route' => 'indicadores', '_controller' => 'App\\Controller\\ServiciosController::indicadores'), null, array('GET' => 0), null, false),
                    '/detalleindicador' => array(array('_route' => 'detalleindicador', '_controller' => 'App\\Controller\\ServiciosController::detalleindicador'), null, array('POST' => 0), null, false),
                    '/indicadorseg' => array(array('_route' => 'indicadorseg', '_controller' => 'App\\Controller\\ServiciosController::indicadorseg'), null, array('GET' => 0), null, false),
                    '/sigprocriesgogerencia' => array(array('_route' => 'sigprocriesgogerencia', '_controller' => 'App\\Controller\\ServiciosController::sigprocpiesgogerencia'), null, array('GET' => 0), null, false),
                    '/crocmdetalle' => array(array('_route' => 'crocmdetalle', '_controller' => 'App\\Controller\\ServiciosController::crocmdetalle'), null, array('POST' => 0), null, false),
                    '/seguimientocrocm' => array(array('_route' => 'seguimientocrocm', '_controller' => 'App\\Controller\\ServiciosController::seguimientocrocm'), null, array('GET' => 0), null, false),
                    '/documentos' => array(array('_route' => 'documentos', '_controller' => 'App\\Controller\\ServiciosController::documentos'), null, array('GET' => 0), null, false),
                    '/detalledoc' => array(array('_route' => 'detalledoc', '_controller' => 'App\\Controller\\ServiciosController::detalledoc'), null, array('POST' => 0), null, false),
                    '/getdocformulario' => array(array('_route' => 'getdocformulario', '_controller' => 'App\\Controller\\ServiciosController::getdocformulario'), null, array('GET' => 0), null, false),
                    '/getdocformulariodetalle' => array(array('_route' => 'getdocformulariodetalle', '_controller' => 'App\\Controller\\ServiciosController::getdocformulariodetalle'), null, array('POST' => 0), null, false),
                    '/documentoexternolegales' => array(array('_route' => 'documentoexternolegales', '_controller' => 'App\\Controller\\ServiciosController::documentoexternolegales'), null, array('GET' => 0), null, false),
                    '/documentosenproceso' => array(array('_route' => 'documentosenproceso', '_controller' => 'App\\Controller\\ServiciosController::documentosenproceso'), null, array('POST' => 0), null, false),
                    '/documentosrev' => array(array('_route' => 'documentosrev', '_controller' => 'App\\Controller\\ServiciosController::documentosrev'), null, array('POST' => 0), null, false),
                    '/documentobaja' => array(array('_route' => 'documentobaja', '_controller' => 'App\\Controller\\ServiciosController::documentobaja'), null, array('GET' => 0), null, false),
                    '/fichascargo' => array(array('_route' => 'fichascargo', '_controller' => 'App\\Controller\\ServiciosController::fichascargo'), null, array('GET' => 0), null, false),
                    '/detallefcargo' => array(array('_route' => 'detallefcargo', '_controller' => 'App\\Controller\\ServiciosController::detallefcargo'), null, array('POST' => 0), null, false),
                    '/listar_audhlg' => array(array('_route' => 'listar_audhlg', '_controller' => 'App\\Controller\\ServiciosController::listar_audhlg'), null, null, null, false),
                    '/detalleaud' => array(array('_route' => 'detalleaud', '_controller' => 'App\\Controller\\ServiciosController::detalleaud'), null, array('POST' => 0), null, false),
                    '/detallehlg' => array(array('_route' => 'detallehlg', '_controller' => 'App\\Controller\\ServiciosController::detallehlg'), null, array('POST' => 0), null, false),
                    '/listar_hallazgo' => array(array('_route' => 'listar_hallazgo', '_controller' => 'App\\Controller\\ServiciosController::listar_hallazgo'), null, null, null, false),
                    '/listar_accion' => array(array('_route' => 'listar_accion', '_controller' => 'App\\Controller\\ServiciosController::listar_accion'), null, null, null, false),
                    '/dethlg_idac' => array(array('_route' => 'dethlg_idac', '_controller' => 'App\\Controller\\ServiciosController::dethlg_idac'), null, array('POST' => 0), null, false),
                    '/crocm_list' => array(array('_route' => 'crocm_list', '_controller' => 'App\\Controller\\ServiciosController::crocm_list'), null, null, null, false),
                    '/crocm_consulta' => array(array('_route' => 'crocm_consulta', '_controller' => 'App\\Controller\\ServiciosController::crocm_consulta'), null, null, null, false),
                    '/detaud_crocm' => array(array('_route' => 'detaud_crocm', '_controller' => 'App\\Controller\\ServiciosController::detaud_crocm'), null, array('POST' => 0), null, false),
                    '/listar_verificaref' => array(array('_route' => 'listar_verificaref', '_controller' => 'App\\Controller\\ServiciosController::listar_verificaref'), null, null, null, false),
                    '/listar_fortaleza' => array(array('_route' => 'listar_fortaleza', '_controller' => 'App\\Controller\\ServiciosController::listar_fortaleza'), null, null, null, false),
                    '/tipoauditor' => array(array('_route' => 'tipoauditor', '_controller' => 'App\\Controller\\TipoAuditorController::index'), null, null, null, false),
                    '/tipoauditor_insertar' => array(array('_route' => 'tipoauditor_insertar', '_controller' => 'App\\Controller\\TipoAuditorController::insertar'), null, array('POST' => 0), null, false),
                    '/tipoauditor_actualizar' => array(array('_route' => 'tipoauditor_actualizar', '_controller' => 'App\\Controller\\TipoAuditorController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipoauditor_editar' => array(array('_route' => 'tipoauditor_editar', '_controller' => 'App\\Controller\\TipoAuditorController::editar'), null, array('POST' => 0), null, false),
                    '/tpauditor_prev' => array(array('_route' => 'tpauditor_prev', '_controller' => 'App\\Controller\\TipoAuditorController::tpauditor_prev'), null, array('POST' => 0), null, false),
                    '/tipoauditor_eliminar' => array(array('_route' => 'tipoauditor_eliminar', '_controller' => 'App\\Controller\\TipoAuditorController::eliminar'), null, array('POST' => 0), null, false),
                    '/tipoauditoria' => array(array('_route' => 'tipoauditoria', '_controller' => 'App\\Controller\\TipoAuditoriaController::index'), null, null, null, false),
                    '/tipoauditoria_insertar' => array(array('_route' => 'tipoauditoria_insertar', '_controller' => 'App\\Controller\\TipoAuditoriaController::insertar'), null, array('POST' => 0), null, false),
                    '/tipoauditoria_actualizar' => array(array('_route' => 'tipoauditoria_actualizar', '_controller' => 'App\\Controller\\TipoAuditoriaController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipoauditoria_editar' => array(array('_route' => 'tipoauditoria_editar', '_controller' => 'App\\Controller\\TipoAuditoriaController::editar'), null, array('POST' => 0), null, false),
                    '/tipoaud_prev' => array(array('_route' => 'tipoaud_prev', '_controller' => 'App\\Controller\\TipoAuditoriaController::tipoaud_prev'), null, array('POST' => 0), null, false),
                    '/tipoauditoria_eliminar' => array(array('_route' => 'tipoauditoria_eliminar', '_controller' => 'App\\Controller\\TipoAuditoriaController::eliminar'), null, array('POST' => 0), null, false),
                    '/tipocro' => array(array('_route' => 'tipocro', '_controller' => 'App\\Controller\\TipoCROController::index'), null, null, null, false),
                    '/tipocro_insertar' => array(array('_route' => 'tipocro_insertar', '_controller' => 'App\\Controller\\TipoCROController::insertar'), null, array('POST' => 0), null, false),
                    '/tipocro_actualizar' => array(array('_route' => 'tipocro_actualizar', '_controller' => 'App\\Controller\\TipoCROController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipocro_editar' => array(array('_route' => 'tipocro_editar', '_controller' => 'App\\Controller\\TipoCROController::editar'), null, array('POST' => 0), null, false),
                    '/tipocro_prev' => array(array('_route' => 'tipocro_prev', '_controller' => 'App\\Controller\\TipoCROController::tipocro_prev'), null, array('POST' => 0), null, false),
                    '/tipocro_eliminar' => array(array('_route' => 'tipocro_eliminar', '_controller' => 'App\\Controller\\TipoCROController::eliminar'), null, array('POST' => 0), null, false),
                    '/tipocargo' => array(array('_route' => 'tipocargo', '_controller' => 'App\\Controller\\TipoCargoController::index'), null, null, null, false),
                    '/tipocargo_insertar' => array(array('_route' => 'tipocargo_insertar', '_controller' => 'App\\Controller\\TipoCargoController::insertar'), null, array('POST' => 0), null, false),
                    '/tipocargo_actualizar' => array(array('_route' => 'tipocargo_actualizar', '_controller' => 'App\\Controller\\TipoCargoController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipocargo_editar' => array(array('_route' => 'tipocargo_editar', '_controller' => 'App\\Controller\\TipoCargoController::editar'), null, array('POST' => 0), null, false),
                    '/tpcargo_prev' => array(array('_route' => 'tpcargo_prev', '_controller' => 'App\\Controller\\TipoCargoController::tpcargo_prev'), null, array('POST' => 0), null, false),
                    '/tipocargo_eliminar' => array(array('_route' => 'tipocargo_eliminar', '_controller' => 'App\\Controller\\TipoCargoController::eliminar'), null, array('POST' => 0), null, false),
                    '/tipodatoempresarial' => array(array('_route' => 'tipodatoempresarial', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::index'), null, null, null, false),
                    '/tipodatoempresarial_insertar' => array(array('_route' => 'tipodatoempresarial_insertar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::insertar'), null, array('POST' => 0), null, false),
                    '/tipodatoempresarial_actualizar' => array(array('_route' => 'tipodatoempresarial_actualizar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipodatoempresarial_editar' => array(array('_route' => 'tipodatoempresarial_editar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::editar'), null, array('POST' => 0), null, false),
                    '/tpdtemp_prev' => array(array('_route' => 'tpdtemp_prev', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::tpdtemp_prev'), null, array('POST' => 0), null, false),
                    '/tipodatoempresarial_eliminar' => array(array('_route' => 'tipodatoempresarial_eliminar', '_controller' => 'App\\Controller\\TipoDatoEmpresarialController::eliminar'), null, array('POST' => 0), null, false),
                    '/tipodocumento' => array(array('_route' => 'tipodocumento', '_controller' => 'App\\Controller\\TipoDocumentoController::index'), null, null, null, false),
                    '/tipodocumento_insertar' => array(array('_route' => 'tipodocumento_insertar', '_controller' => 'App\\Controller\\TipoDocumentoController::insertar'), null, array('POST' => 0), null, false),
                    '/tipodocumento_actualizar' => array(array('_route' => 'tipodocumento_actualizar', '_controller' => 'App\\Controller\\TipoDocumentoController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipodocumento_editar' => array(array('_route' => 'tipodocumento_editar', '_controller' => 'App\\Controller\\TipoDocumentoController::editar'), null, array('POST' => 0), null, false),
                    '/tipodoc_prev' => array(array('_route' => 'tipodoc_prev', '_controller' => 'App\\Controller\\TipoDocumentoController::tipodoc_prev'), null, array('POST' => 0), null, false),
                    '/tipodocumento_eliminar' => array(array('_route' => 'tipodocumento_eliminar', '_controller' => 'App\\Controller\\TipoDocumentoController::eliminar'), null, array('POST' => 0), null, false),
                    '/tipohallazgo' => array(array('_route' => 'tipohallazgo', '_controller' => 'App\\Controller\\TipoHallazgoController::index'), null, null, null, false),
                    '/tipo_hallazgo_insertar' => array(array('_route' => 'tipo_hallazgo_insertar', '_controller' => 'App\\Controller\\TipoHallazgoController::insertar'), null, array('POST' => 0), null, false),
                    '/tipo_hallazgo_actualizar' => array(array('_route' => 'tipo_hallazgo_actualizar', '_controller' => 'App\\Controller\\TipoHallazgoController::actualizar'), null, array('POST' => 0), null, false),
                    '/tipo_hallazgo_editar' => array(array('_route' => 'tipo_hallazgo_editar', '_controller' => 'App\\Controller\\TipoHallazgoController::editar'), null, array('POST' => 0), null, false),
                    '/tipo_hallazgo_eliminar' => array(array('_route' => 'tipo_hallazgo_eliminar', '_controller' => 'App\\Controller\\TipoHallazgoController::eliminar'), null, array('POST' => 0), null, false),
                    '/tiponorma' => array(array('_route' => 'tiponorma', '_controller' => 'App\\Controller\\TipoNormaController::index'), null, null, null, false),
                    '/tiponorma_insertar' => array(array('_route' => 'tiponorma_insertar', '_controller' => 'App\\Controller\\TipoNormaController::insertar'), null, array('POST' => 0), null, false),
                    '/tiponorma_actualizar' => array(array('_route' => 'tiponorma_actualizar', '_controller' => 'App\\Controller\\TipoNormaController::actualizar'), null, array('POST' => 0), null, false),
                    '/tiponorma_editar' => array(array('_route' => 'tiponorma_editar', '_controller' => 'App\\Controller\\TipoNormaController::editar'), null, array('POST' => 0), null, false),
                    '/tiponorma_eliminar' => array(array('_route' => 'tiponorma_eliminar', '_controller' => 'App\\Controller\\TipoNormaController::eliminar'), null, array('POST' => 0), null, false),
                    '/tiponota' => array(array('_route' => 'tiponota', '_controller' => 'App\\Controller\\TipoNotaController::index'), null, null, null, false),
                    '/tiponota_insertar' => array(array('_route' => 'tiponota_insertar', '_controller' => 'App\\Controller\\TipoNotaController::insertar'), null, array('POST' => 0), null, false),
                    '/tiponota_actualizar' => array(array('_route' => 'tiponota_actualizar', '_controller' => 'App\\Controller\\TipoNotaController::actualizar'), null, array('POST' => 0), null, false),
                    '/tiponota_editar' => array(array('_route' => 'tiponota_editar', '_controller' => 'App\\Controller\\TipoNotaController::editar'), null, array('POST' => 0), null, false),
                    '/tiponota_eliminar' => array(array('_route' => 'tiponota_eliminar', '_controller' => 'App\\Controller\\TipoNotaController::eliminar'), null, array('POST' => 0), null, false),
                    '/tiponovedad' => array(array('_route' => 'tiponovedad', '_controller' => 'App\\Controller\\TipoNovedadController::index'), null, null, null, false),
                    '/tiponovedad_insertar' => array(array('_route' => 'tiponovedad_insertar', '_controller' => 'App\\Controller\\TipoNovedadController::insertar'), null, array('POST' => 0), null, false),
                    '/tiponovedad_actualizar' => array(array('_route' => 'tiponovedad_actualizar', '_controller' => 'App\\Controller\\TipoNovedadController::actualizar'), null, array('POST' => 0), null, false),
                    '/tiponovedad_editar' => array(array('_route' => 'tiponovedad_editar', '_controller' => 'App\\Controller\\TipoNovedadController::editar'), null, array('POST' => 0), null, false),
                    '/tiponovedad_eliminar' => array(array('_route' => 'tiponovedad_eliminar', '_controller' => 'App\\Controller\\TipoNovedadController::eliminar'), null, array('POST' => 0), null, false),
                    '/turno' => array(array('_route' => 'turno_listar', '_controller' => 'App\\Controller\\TurnoController::index'), null, null, null, false),
                    '/turno_insertar' => array(array('_route' => 'turno_insertar', '_controller' => 'App\\Controller\\TurnoController::insertar'), null, array('POST' => 0), null, false),
                    '/turno_actualizar' => array(array('_route' => 'turno_actualizar', '_controller' => 'App\\Controller\\TurnoController::actualizar'), null, array('POST' => 0), null, false),
                    '/turno_editar' => array(array('_route' => 'turno_editar', '_controller' => 'App\\Controller\\TurnoController::editar'), null, array('POST' => 0), null, false),
                    '/turno_eliminar' => array(array('_route' => 'turno_eliminar', '_controller' => 'App\\Controller\\TurnoController::eliminar'), null, array('POST' => 0), null, false),
                    '/unidadmedida' => array(array('_route' => 'unidadmedida', '_controller' => 'App\\Controller\\UnidadMedidaController::index'), null, null, null, false),
                    '/unidadmedida_insertar' => array(array('_route' => 'unidadmedida_insertar', '_controller' => 'App\\Controller\\UnidadMedidaController::insertar'), null, array('POST' => 0), null, false),
                    '/unidadmedida_actualizar' => array(array('_route' => 'unidadmedida_actualizar', '_controller' => 'App\\Controller\\UnidadMedidaController::actualizar'), null, array('POST' => 0), null, false),
                    '/unidadmedida_editar' => array(array('_route' => 'unidadmedida_editar', '_controller' => 'App\\Controller\\UnidadMedidaController::editar'), null, array('POST' => 0), null, false),
                    '/unidad_prev' => array(array('_route' => 'unidad_prev', '_controller' => 'App\\Controller\\UnidadMedidaController::unidad_prev'), null, array('POST' => 0), null, false),
                    '/unidadmedida_eliminar' => array(array('_route' => 'unidadmedida_eliminar', '_controller' => 'App\\Controller\\UnidadMedidaController::eliminar'), null, array('POST' => 0), null, false),
                    '/usuario' => array(array('_route' => 'usuario', '_controller' => 'App\\Controller\\UsuarioController::index'), null, null, null, false),
                    '/usuario_insertar' => array(array('_route' => 'usuario_insertar', '_controller' => 'App\\Controller\\UsuarioController::insertar'), null, array('POST' => 0), null, false),
                    '/usuario_actualizar' => array(array('_route' => 'usuario_actualizar', '_controller' => 'App\\Controller\\UsuarioController::actualizar'), null, array('POST' => 0), null, false),
                    '/usuario_editar' => array(array('_route' => 'usuario_editar', '_controller' => 'App\\Controller\\UsuarioController::editar'), null, array('POST' => 0), null, false),
                    '/usuario_eliminar' => array(array('_route' => 'usuario_eliminar', '_controller' => 'App\\Controller\\UsuarioController::eliminar'), null, array('POST' => 0), null, false),
                );

                if (!isset($routes[$trimmedPathinfo])) {
                    break;
                }
                list($ret, $requiredHost, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$trimmedPathinfo];

                if ('/' !== $pathinfo) {
                    if ($hasTrailingSlash !== ('/' === $pathinfo[-1])) {
                        if ((!$requiredMethods || isset($requiredMethods['GET'])) && 'GET' === $canonicalMethod) {
                            return $allow = $allowSchemes = array();
                        }
                        break;
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

        $matchedPathinfo = $pathinfo;
        $regexList = array(
            0 => '{^(?'
                    .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .')(?:/?)$}sD',
        );

        foreach ($regexList as $offset => $regex) {
            while (preg_match($regex, $matchedPathinfo, $matches)) {
                switch ($m = (int) $matches['MARK']) {
                    default:
                        $routes = array(
                            35 => array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false),
                        );

                        list($ret, $vars, $requiredMethods, $requiredSchemes, $hasTrailingSlash) = $routes[$m];

                        if ('/' !== $pathinfo) {
                            if ('/' === $pathinfo[-1]) {
                                if (preg_match($regex, substr($pathinfo, 0, -1), $n) && $m === (int) $n['MARK']) {
                                    $matches = $n;
                                } else {
                                    $hasTrailingSlash = true;
                                }
                            }

                            if ($hasTrailingSlash !== ('/' === $pathinfo[-1])) {
                                if ((!$requiredMethods || isset($requiredMethods['GET'])) && 'GET' === $canonicalMethod) {
                                    return $allow = $allowSchemes = array();
                                }
                                break;
                            }
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

                if (35 === $m) {
                    break;
                }
                $regex = substr_replace($regex, 'F', $m - $offset, 1 + strlen($m));
                $offset += strlen($m);
            }
        }
        if ('/' === $pathinfo && !$allow && !$allowSchemes) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        return array();
    }
}
