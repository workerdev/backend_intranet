
SELECT cb_gas_id AS id_area, cb_gas_codigo as ID, cb_gerencia_nombre AS GERENCIA, cb_area_nombre AS AREA, cb_sector_nombre AS SECTOR, 
    cb_ficha_procesos_nombre AS NOMBRE_DEL_PROCESO, cb_ficha_procesos_codproceso AS CODIGO_DEL_PROCESO, 
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS RESPONSABLE, 
    cb_ficha_procesos_id AS idfc
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector, cb_usuario_usuario
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND 
    cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id
ORDER BY 6;


SELECT cb_ficha_procesos_id AS ID,cb_gas_codigo AS ID_AREA,cb_ficha_procesos_codproceso AS COD_PROCESO,cb_ficha_procesos_nombre AS NOMBRE_PROCESO,
cb_ficha_procesos_objetivo AS OBJETIVO_PROCESO,cb_ficha_procesos_vigente AS VIGENTE,cb_ficha_procesos_version AS VERSION,
cb_ficha_procesos_fechaemision AS FECHA_EMISION,cb_ficha_procesos_entradasrequeridas AS ENTRADAS_REQUERIDAS,
cb_ficha_procesos_salidasesperadas AS SALIDAS_ESPERADAS,cb_ficha_procesos_recursosnecesarios AS RECURSOS_NECESARIOS
FROM cb_procesos_ficha_procesos,cb_proc_gas g, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fksector=cb_sector_id AND
cb_ficha_procesos_id=1;

SELECT cb_gas_codigo AS ID_AREA, cb_gerencia_nombre AS GERENCIA,cb_area_nombre AS AREA,cb_sector_nombre AS SECTOR, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS RESPONSABLE,
cb_gas_vigente as VIGENTE
FROM cb_proc_gas ,cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector, cb_procesos_ficha_procesos, cb_usuario_usuario
WHERE cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id AND
cb_gas_id=cb_ficha_procesos_fkareagerenciasector AND cb_ficha_procesos_estado=1 AND cb_ficha_procesos_id=1;

SELECT cb_documento_codigo AS COD_DOCUMENTO,cb_ficha_procesos_codproceso AS COD_PROCESO,cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
cb_documento_titulo AS TITULO_DOC,cb_documento_versionvigente AS VERSION_VIGENTE,cb_documento_fechaPublicacion AS FECHA_PUBLICACION,
cb_usuario_nombre AS APROBADO_POR,cb_documento_carpetaOperativa AS CARPETA_OPERATIVA, 
cb_documento_vinculoarchivodig AS vinculo_archivo_digital, cb_documento_vinculodiagflujo AS vinculo_diagrama_de_flujo
FROM cb_gestion_documento, cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
WHERE cb_documento_fkficha = cb_ficha_procesos_id AND
cb_documento_fktipo=cb_tipo_documento_id AND
cb_documento_fkaprobador=cb_usuario_id AND
cb_documento_fkficha=1;

SELECT cb_riesgos_oportunidades_id AS ID_CRO, cb_tipocro_nombre AS TIPO_CRO, cb_ficha_procesos_codproceso AS COD_PROCESO, 
    cb_riesgos_oportunidades_origen AS ORIGEN_CRO, cb_riesgos_oportunidades_descripcion AS DESCRIPCION_CRO,
    cb_riesgos_oportunidades_analisiscausaraiz AS ANALISIS_CAUSA_RAIZ, cb_riesgos_oportunidades_accion AS ACCION,
    cb_probabilidad_ocurrencia_valor AS PROBABILIDAD, cb_impacto_valor AS IMPACTO,
    cb_riesgos_oportunidades_fecha AS FECHA_IMPLEMENTACION, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS RESPONSABLE_ACCION,
    cb_riesgos_oportunidades_estadocro AS ESTADO
FROM cb_proc_crom, cb_procesos_ficha_procesos, cb_procesos_tipocro, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_fkficha = cb_ficha_procesos_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND
    cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND 
    cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_fkficha=10;


/*SELECT ip.id AS ID,fi.nombre AS COD_PROCESO, ip.codigo AS CODIGO_INDICADOR, ip.objetivo AS OBJETIVO_INDICADOR, 
    ip.descripcion AS DESCRIPCION_INDICADOR, u.nombre AS UNIDAD,ip.metamensual AS META_MENSUAL, 
    ip.metaanual AS META_ANUAL, ip.vigente AS VIGENTE
FROM App\Entity\IndicadorProceso ip
JOIN ip.fkficha fi
JOIN ip.fkresponsable re
JOIN ip.fkunidad u
WHERE fi.id=10;*/

SELECT cb_ficha_procesos_nombre AS nombre_del_proceso, cb_ficha_procesos_codproceso AS codigo_proceso, cb_gas_codigo AS id, 
    cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, 
    cb_ficha_procesos_id AS idfc, cb_gas_id AS id_area
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector, cb_usuario_usuario
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND 
    cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id
ORDER BY 2;


SELECT cb_gas_codigo AS id, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_procesos_codproceso AS cod_proceso, 
    cb_indicador_proceso_codigo AS codigo_indicador, cb_indicador_proceso_objetivo AS objetivo_del_indicador, 
    cb_indicador_proceso_descripcion AS descripcion_del_indicador
FROM cb_configuracion_gerencia, cb_procesos_area, cb_proc_gas, cb_procesos_ficha_procesos, cb_procesos_indicador_proceso
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id
    AND cb_indicador_proceso_fkficha=cb_ficha_procesos_id AND cb_indicador_proceso_estado=1 ORDER BY 2;


SELECT cb_indicador_proceso_id AS id, cb_ficha_procesos_codproceso AS cod_proceso, cb_indicador_proceso_codigo AS codigo_indicador,
    cb_indicador_proceso_objetivo AS objetivo_indicador, cb_indicador_proceso_descripcion AS descripcion_indicador,
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_elaboracion, cb_indicador_proceso_formula AS formula, cb_unidad_medida_nombre AS unidad, 
    cb_indicador_proceso_metamensual AS meta_mensual, cb_indicador_proceso_metaanual AS meta_anual, cb_indicador_proceso_vigente AS vigente
FROM cb_procesos_indicador_proceso, cb_procesos_ficha_procesos, cb_usuario_usuario, cb_procesos_unidad_medida
WHERE cb_indicador_proceso_fkficha=cb_ficha_procesos_id AND cb_indicador_proceso_fkresponsable=cb_usuario_id  
    AND cb_indicador_proceso_fkunidad=cb_unidad_medida_id AND cb_indicador_proceso_estado=1 AND cb_indicador_proceso_codigo='IRT-CAL1';


SELECT cb_seguimiento_indicador_id AS id, cb_indicador_proceso_codigo AS codigo_indicador, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS resp_seguimiento,
    cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes, cb_seguimiento_indicador_valor AS indicador, cb_seguimiento_indicador_observacion AS observaciones
FROM cb_procesos_indicador_proceso, cb_proceso_seg_indicador, cb_usuario_usuario
WHERE cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_estado=1 AND 
     cb_indicador_proceso_fkresponsable=cb_usuario_id AND cb_indicador_proceso_codigo='IRT-CAL1';


SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_del_proceso, cb_indicador_proceso_codigo AS codigo_del_indicador, 
    cb_indicador_proceso_objetivo AS objetivo_del_indicador, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_del_seguimiento, 
    cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes,
    cb_seguimiento_indicador_valor AS valor_del_indicador, cb_seguimiento_indicador_observacion AS observaciones
FROM cb_configuracion_gerencia, cb_proc_gas, cb_procesos_ficha_procesos, cb_procesos_indicador_proceso, cb_proceso_seg_indicador, cb_usuario_usuario
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_indicador_proceso_fkficha=cb_ficha_procesos_id
    AND cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_fkresponsable=cb_usuario_id AND cb_seguimiento_indicador_estado=1;



SELECT gas.codigo AS ID_GAS, ge.nombre AS GERENCIA, ar.nombre AS AREA, fi.codproceso AS COD_PROCESO, ro.id AS ID_CROCM, 
    ti.nombre AS TIPO_CROCM, ro.origen AS ORIGEN_CROCM , ro.descripcion AS DESCRIPCION_CROCM
FROM App\Entity\RiesgosOportunidades ro
JOIN ro.fktipo ti
JOIN ro.fkficha fi
JOIN fi.fkareagerenciasector gas
JOIN gas.fkgerencia ge
JOIN gas.fkarea ar
JOIN ro.fkprobabilidad pro
JOIN ro.fkimpacto imp;

SELECT ro.id AS ID_CROCM, ti.nombre AS TIPO_CRO, fi.codproceso AS COD_PROCESO, ro.origen AS ORIGEN_CROCM,
    ro.descripcion AS DESCRIPCION_CROCM, ro.analisiscausaraiz AS ANALISIS_CAUSA_RAIZ, pro.valor AS PROBABILIDAD, 
    imp.valor AS IMPACTO, ro.accion AS ACCION, ro.fecha AS FECHA_IMPLEMENTACION, 
    (ro.fkresponsable.nombre || ' ' || ro.fkresponsable.apellido) AS RESPONSABLE_ACCION, ro.estadocro AS ESTADO                  
FROM App\Entity\RiesgosOportunidades ro
JOIN ro.fktipo ti
JOIN ro.fkficha fi
JOIN fi.fkareagerenciasector gas
JOIN gas.fkgerencia ge
JOIN gas.fkarea ar
JOIN ro.fkprobabilidad pro
JOIN ro.fkimpacto imp
WHERE ro.id=:id;




SELECT cb_riesgos_oportunidades_id AS "ID_CROCM", cb_tipocro_nombre AS "TIPO_CRO", cb_ficha_procesos_codproceso AS "COD_PROCESO", 
    cb_riesgos_oportunidades_origen AS "ORIGEN_CROCM", cb_riesgos_oportunidades_descripcion AS "DESCRIPCION_CROCM",
    cb_riesgos_oportunidades_analisiscausaraiz AS "ANALISIS_CAUSA_RAIZ", cb_probabilidad_ocurrencia_nombre AS "PROBABILIDAD", 
    cb_impacto_nombre AS "IMPACTO", cb_riesgos_oportunidades_accion AS "ACCION", cb_riesgos_oportunidades_fecha AS "FECHA_IMPLEMENTACION", 
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS "RESPONSABLE_ACCION", cb_riesgos_oportunidades_estadocro AS "ESTADO" 
FROM cb_proc_crom, cb_procesos_tipocro, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND
    cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
    cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_riesgos_oportunidades_estado=1 AND cb_riesgos_oportunidades_id=1;

                                                                                                                                                                   

SELECT cb_riesgos_oportunidades_id AS "ID_CROCM", cb_seguimientocro_fechaseg AS "FECHA_SEGUIMIENTO",
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS "RESPONSABLE_SEGUIMIENTO", 
    cb_seguimientocro_observaciones AS "OBSERVACIONES", cb_seguimientocro_estadoseg AS "ESTADO" 
FROM cb_proc_crom, cb_procesos_seguimientocro, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_id=cb_seguimientocro_fkriesgos AND cb_seguimientocro_fkresponsable=cb_usuario_id AND
    cb_seguimientocro_estado=1 AND cb_riesgos_oportunidades_id=1;


SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_proceso,
    cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo_crocm, cb_riesgos_oportunidades_descripcion AS descripcion_crocm,
    cb_riesgos_oportunidades_accion AS accion, cb_seguimientocro_fechaseg AS fec_segu, cb_seguimientocro_observaciones AS observaciones,
    cb_seguimientocro_estadoseg AS estado, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_seguimiento
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_proc_crom, cb_procesos_tipocro, cb_procesos_seguimientocro, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_gas_id=cb_ficha_procesos_fkareagerenciasector 
    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND cb_seguimientocro_fkresponsable=cb_usuario_id
    AND cb_seguimientocro_fkriesgos=cb_riesgos_oportunidades_id AND cb_seguimientocro_estado=1 ORDER BY 1, 2, 7;


SELECT cb_gerencia_nombre AS GERENCIA, cb_area_nombre AS AREA, cb_tipo_documento_nombre AS TIPO_DOCUMENTO, 
    cb_documento_codigo AS CODIGO, cb_documento_titulo AS TITULO_DOC, 
    cb_documento_vinculoarchivodig AS VINCULO_DOC, cb_documento_versionvigente AS VERSION, 
    cb_documento_fechapublicacion AS F_PUBLICACION, 
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR, 
    cb_documento_carpetaoperativa AS CARPETA_OPERATIVA, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_FLUJO, 
    cb_ficha_procesos_codproceso AS COD_PROCESO, cb_documento_id AS ID
FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas, 
    cb_configuracion_gerencia, cb_procesos_area, cb_usuario_usuario
WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1;



SELECT cb_documento_codigo AS codigo_documento, cb_ficha_procesos_codproceso AS cod_proceso, cb_tipo_documento_nombre AS tipo_documento, cb_documento_titulo AS titulo_doc, 
    cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS aprobado_por,
    cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculoarchivodig AS vinculo_archivo, cb_documento_vinculodiagflujo AS vinculo_diagrama
FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_usuario_usuario
WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id 
    AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1 AND cb_documento_id=1;


SELECT cb_ficha_procesos_id AS id, cb_gas_codigo AS id_area, cb_ficha_procesos_codproceso AS cod_proceso, cb_ficha_procesos_nombre AS nombre,
    cb_ficha_procesos_objetivo AS objetivo_proceso, cb_ficha_procesos_entradasrequeridas AS entradas_requeridas, cb_ficha_procesos_recursosnecesarios AS recursos_necesarios,
    cb_ficha_procesos_vigente AS vigente, cb_ficha_procesos_version AS version, cb_ficha_procesos_fechaemision AS fecha_emision, cb_ficha_procesos_salidasesperadas AS salidas_esperadas
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
    AND cb_ficha_procesos_estado=1 AND cb_documento_id=1;


SELECT cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_gas_vigente AS vigente
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_usuario_usuario
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id
    AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND cb_gas_fkresponsable=cb_usuario_id AND cb_gas_estado=1 AND cb_documento_id=1;


SELECT cb_ficha_cargo_nombre AS nombre_cargo, cb_documento_codigo AS codigo_documento
FROM cb_gestion_documento, cb_fc_ficha_cargo, cb_fc_documentosaso
WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id 
    AND cb_ficha_cargo_estado=1 AND cb_documento_id=3;


SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_documento_formulario_codigo AS cod_formulario, cb_documento_formulario_titulo AS titulo_formulario,
    cb_documento_formulario_vinculofiledig AS vinculo_archivo, cb_documento_formulario_vinculofiledesc AS descarga_formulario, cb_documento_formulario_versionvigente AS version,
    cb_documento_formulario_fechapublicacion AS f_publicacion, cb_documento_formulario_aprobadopor AS aprobado_por, cb_tipo_documento_nombre AS tipo_doc_relacionado,
    cb_documento_codigo AS doc_relacionado
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_gest_doc_formulario, cb_gestion_tipo_documento
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id 
    AND cb_gas_fkarea=cb_area_id AND cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_estado=1
ORDER BY 1, 2, 3;


SELECT cb_documento_formulario_id AS ID_FORMULARIO, cb_documento_codigo AS COD_DOCUMENTO, cb_documento_formulario_codigo AS COD_FORMULARIO,
    cb_documento_formulario_titulo AS TITULO_FORMULARIO, cb_documento_formulario_versionVigente AS VERSION_VIGENTE_FORMULARIO,
    cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION_FORMULARIO, cb_documento_formulario_aprobadoPor AS APROBADO_POR,
    cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_formulario_vinculoFileDesc AS VINCULO_ARCHIVO_DESCARGA
FROM cb_gest_doc_formulario, cb_gestion_documento, cb_gestion_tipo_documento
WHERE cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND
    cb_documento_formulario_codigo='GO-07154-01' AND cb_documento_codigo='PR07154' AND cb_documento_formulario_estado=1;


SELECT cb_documento_codigo AS COD_DOCUMENTO, cb_ficha_procesos_nombre AS COD_PROCESO, cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
    cb_documento_titulo AS TITULO_DOC, cb_documento_versionvigente AS VERSION_VIGENTE, cb_documento_fechaPublicacion AS FECHA_PUBLICACION,
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR, cb_documento_carpetaoperativa AS CARPETA_OPERATIVA,
    cb_documento_vinculoarchivodig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_DE_FLUJO
FROM cb_gestion_documento,cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
WHERE cb_documento_fkaprobador=cb_usuario_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_documento_fktipo=cb_tipo_documento_id AND
    cb_documento_estado=1 AND cb_documento_codigo='PR07154';

SELECT ge.nombre AS GERENCIA ,ar.nombre AS AREA, ti.tipo AS TIPO, de.codigo AS CODIGO, de.titulo AS TITULO, 
    de.vinculoarchivo AS VINCULO_ARCHIVO, de.fechapublicacion AS FECHA_PUBLICACION, proc.codproceso AS COD_PROCESO
FROM App\Entity\DocumentoExtra de
JOIN de.fkproceso proc
JOIN proc.fkareagerenciasector ags
JOIN ags.fkgerencia ge
JOIN ags.fkarea ar
JOIN de.fktipo ti;

SELECT dp.id AS ID, dp.nuevoactualizacion AS NUEVO_O_ACTUALIZACION, doc.codigo AS COD_DOCUMENTO, proc.codproceso AS COD_PROCESO,
    ti.nombre AS TIPO_DOCUMENTO, dp.titulo AS TITULO, dp.versionvigente AS VERSION, dp.vinculoarchivo AS VINCULO_ARCHIVO_DIGITAL,
    dp.carpetaoperativa AS CARPETA_OPERATIVA, dp.aprobadorechazado AS APROBADO_O_RECHAZADO,
    dp.aprobadopor AS APROBADO_POR, dp.fechaaprobacion AS FECHA_APROBACION
FROM App\Entity\DocumentoProceso dp
JOIN dp.fkdocumento doc
JOIN dp.fkproceso proc
JOIN dp.fktipo ti;


SELECT IDENTITY(dpr.fkdoc) AS ID , dpr.fecha AS FECHA_RECIBIDO, dpr.responsable AS RESPONSABLE_REVISION, 
    dpr.estadodoc AS ESTADO, dpr.firma AS FIRMA_ELECTRONICA
FROM App\Entity\DocProcRevision dpr
WHERE dpr.fkdoc=4;


SELECT cb_docprocrevision_fkdoc AS id_revision, cb_docprocrevision_fecha AS fecha_recibido, cb_docprocrevision_responsable AS responsable_revision,
    cb_docprocrevision_estadodoc AS estado, cb_docprocrevision_firma AS firma_electronica
FROM cb_gest_doc_proceso, cb_gest_docprocrevision
WHERE cb_docprocrevision_fkdoc=cb_documento_proceso_id AND cb_docprocrevision_estado=1 AND cb_documento_proceso_id=4;


SELECT tbr.cb_bajadocumento_id AS id, tbr.cb_bajadocumento_codigo AS codigo_documento, tbr.cb_tipo_documento_nombre AS tipo_documento, tbr.cb_bajadocumento_titulo AS titulo, tbr.cb_bajadocumento_versionvigente AS version,
    tbr.cb_bajadocumento_fechapublicacion AS fecha_publicacion, tbr.cb_bajadocumento_aprobadopor AS aprobado_por, tbr.cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
    tbr.cb_bajadocumento_vinculoarchivo AS vinculo_archivo_digital, tbr.cb_ficha_procesos_codproceso AS codigo_proceso 
FROM (SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
    cb_bajadocumento_fechapublicacion, cb_bajadocumento_aprobadopor, cb_bajadocumento_carpetaoperativa, 
    cb_bajadocumento_vinculoarchivo, cb_ficha_procesos_codproceso
FROM cb_gest_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
    AND cb_bajadocumento_estado=1
UNION    
SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
    cb_bajadocumento_fechapublicacion, cb_bajadocumento_aprobadopor, cb_bajadocumento_carpetaoperativa, 
    cb_bajadocumento_vinculoarchivo, '' AS cb_ficha_procesos_codproceso
FROM cb_gest_bajadocumento, cb_gestion_tipo_documento
WHERE cb_bajadocumento_fktipo=cb_tipo_documento_id AND cb_bajadocumento_estado=1 AND cb_bajadocumento_id NOT IN
    (SELECT cb_bajadocumento_id
    FROM cb_gest_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
    WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
        AND cb_bajadocumento_estado=1) ORDER BY 1) AS tbr;


SELECT cb_auditoria_codigo AS id_auditoria, cb_gas_codigo AS id_area, cb_tipo_auditoria_nombre AS tipo_auditoria, cb_auditoria_fechaprogramada AS f_programada,
    cb_auditoria_duracionestimada AS duracion_estimada_horas, cb_auditoria_lugar AS lugar_de_auditoria, cb_auditoria_alcance AS alcance,
    cb_auditoria_objetivos AS objetivos, cb_auditoria_fechahorainicio AS fecha_hora_inicio, cb_auditoria_fechahorafin AS fecha_hora_fin,
    cb_auditoria_responsable AS responsable_registro, cb_auditoria_fecharegistro AS fecha_registro, cb_auditoria_conclusiones AS conclusiones 
FROM cb_aud_auditoria, cb_proc_gas, cb_aud_tipo_auditoria 
WHERE cb_auditoria_fkarea=cb_gas_id AND cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_auditoria_estado=1 AND cb_auditoria_codigo='01/12';

SELECT cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, 
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_gas_vigente AS vigente
FROM cb_aud_auditoria, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_usuario_usuario
WHERE cb_auditoria_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND
    cb_gas_fkresponsable=cb_usuario_id AND cb_gas_estado=1 AND cb_auditoria_codigo='01/12';


SELECT cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo, cb_ficha_procesos_codproceso AS cod_proceso, 
    cb_riesgos_oportunidades_origen AS origen_crocm, cb_riesgos_oportunidades_descripcion AS descripcion_crocm, 
    cb_riesgos_oportunidades_analisiscausaraiz AS analisis_causa_raiz, cb_probabilidad_ocurrencia_nombre AS probabilidad,
    cb_impacto_nombre AS impacto, cb_riesgos_oportunidades_accion AS accion, cb_riesgos_oportunidades_fecha AS f_implementacion,
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_riesgos_oportunidades_estadocro AS estado
FROM cb_procesos_ficha_procesos, cb_proc_crom, cb_procesos_tipocro, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND 
    cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND
    cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_estado=1;



SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_procesos_codproceso AS cod_proceso, cb_riesgos_oportunidades_id AS id_cro,
    cb_tipocro_nombre AS tipo, cb_riesgos_oportunidades_descripcion AS descripcion, cb_riesgos_oportunidades_accion AS accion,
    cb_riesgos_oportunidades_fecha AS f_implementacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_riesgos_oportunidades_estadocro AS estado
FROM cb_procesos_ficha_procesos, cb_proc_crom, cb_configuracion_gerencia, cb_procesos_area, cb_proc_gas, cb_procesos_tipocro, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND 
    cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND
    cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_estado=1;


SELECT cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo_cro, cb_ficha_procesos_codproceso AS cod_proceso, 
    cb_riesgos_oportunidades_origen AS origen_crocm, cb_riesgos_oportunidades_descripcion AS descripcion_crocm, 
    cb_riesgos_oportunidades_analisiscausaraiz AS analisis_causa_raiz, cb_probabilidad_ocurrencia_nombre AS probabilidad,
    cb_impacto_nombre AS impacto, cb_riesgos_oportunidades_accion AS accion, cb_riesgos_oportunidades_fecha AS f_implementacion, 
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable, cb_riesgos_oportunidades_estadocro AS estado
FROM cb_procesos_ficha_procesos, cb_proc_crom, cb_procesos_tipocro, cb_prob_ocurrencia, cb_procesos_impacto, cb_usuario_usuario
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_riesgos_oportunidades_fkimpacto=cb_impacto_id AND 
    cb_riesgos_oportunidades_fkprobabilidad=cb_probabilidad_ocurrencia_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id AND 
    cb_riesgos_oportunidades_fkresponsable=cb_usuario_id AND cb_riesgos_oportunidades_estado=1 AND cb_riesgos_oportunidades_id=7;


SELECT cb_seguimientocro_id AS id, cb_riesgos_oportunidades_id AS id_crocm, cb_seguimientocro_fechaseg AS f_seguimiento,
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS responsable_seguimiento, cb_seguimientocro_observaciones AS observaciones, 
    cb_seguimientocro_estadoseg AS estado
FROM cb_proc_crom, cb_procesos_seguimientocro, cb_usuario_usuario
WHERE cb_seguimientocro_fkriesgos=cb_riesgos_oportunidades_id AND cb_seguimientocro_estado=1 AND cb_seguimientocro_fkresponsable=cb_usuario_id AND 
    cb_riesgos_oportunidades_id=7;







SELECT cb_documento_formulario_id AS ID_FORMULARIO, cb_documento_codigo AS COD_DOCUMENTO, cb_documento_formulario_codigo AS COD_FORMULARIO,
    cb_documento_formulario_titulo AS TITULO_FORMULARIO, cb_documento_formulario_versionVigente AS VERSION_VIGENTE_FORMULARIO,
    cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION_FORMULARIO, cb_documento_formulario_aprobadoPor AS APROBADO_POR,
    cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_formulario_vinculoFileDesc AS VINCULO_ARCHIVO_DESCARGA
FROM cb_gest_doc_formulario, cb_gestion_documento, cb_gestion_tipo_documento
WHERE cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND
    cb_documento_formulario_codigo='GC-0820-01' AND cb_documento_codigo='PR0820' AND cb_documento_formulario_estado=1;


SELECT cb_documento_codigo AS COD_DOCUMENTO, cb_ficha_procesos_nombre AS COD_PROCESO, cb_tipo_documento_nombre AS TIPO_DOCUMENTO,
    cb_documento_titulo AS TITULO_DOC, cb_documento_versionvigente AS VERSION_VIGENTE, cb_documento_fechaPublicacion AS FECHA_PUBLICACION,
    (cb_usuario_nombre || ' ' || cb_usuario_apellido) AS APROBADO_POR, cb_documento_carpetaoperativa AS CARPETA_OPERATIVA,
    cb_documento_vinculoarchivodig AS VINCULO_ARCHIVO_DIGITAL, cb_documento_vinculodiagflujo AS VINCULO_DIAGRAMA_DE_FLUJO
FROM cb_gestion_documento,cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
WHERE cb_documento_fkaprobador=cb_usuario_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_documento_fktipo=cb_tipo_documento_id AND
    cb_documento_estado=1 AND cb_documento_codigo='PR0820';