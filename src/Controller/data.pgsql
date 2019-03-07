SELECT *
FROM cb_aud_auditoria adta,
(SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_auditoria_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND
    fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id) AS docs
WHERE adta.cb_auditoria_fkarea=docs.cb_gas_id;



SELECT adq.cb_auditoria_equipo_id AS eq_id, tad.cb_tipo_auditoria_nombre AS  tpaud_tipo, adq.cb_auditoria_equipo_fkauditoria AS eq_fkaud, ad.cb_auditoria_fkarea AS aud_fkarea,
    ad.cb_auditoria_alcance AS aud_alcance, adt.cb_auditor_apellidosnombres AS adr_apnomb, tadt.cb_tipo_auditor_nombre AS tpadr_nombre, ad.cb_auditoria_lugar AS aud_lugar,
    ad.cb_auditoria_responsable AS aud_responsable, ad.cb_auditoria_fechahorainicio AS aud_fhini, ad.cb_auditoria_fechahorafin AS aud_fhfin, ad.cb_auditoria_duracionestimada AS aud_duracionest,
    ac.cb_accion_descripcion AS acn_descripcion, ef.cb_accion_eficacia_resultado AS ef_resultado, hl.cb_hallazgo_id AS hlg_id, fp.cb_ficha_procesos_nombre AS fp_nombre, g.cb_gerencia_nombre AS g_nombre
    FROM cb_aud_auditoria ad, cb_aud_auditor adt, cb_aud_tipo_auditoria tad, 
    cb_aud_tipo_auditor tadt, cb_aud_auditoria_equipo adq, cb_aud_hallazgo hl, cb_aud_accion ac, 
    cb_aud_accion_eficacia ef, cb_proc_gas pga, cb_procesos_ficha_procesos fp, cb_configuracion_gerencia g
WHERE adq.cb_auditoria_equipo_fkauditoria=ad.cb_auditoria_id AND
    adq.cb_auditoria_equipo_fkauditor=adt.cb_auditor_id AND 
    adq.cb_auditoria_equipo_fktipo=tadt.cb_tipo_auditor_id  AND
    ad.cb_auditoria_fktipo=tad.cb_tipo_auditoria_id AND ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND
    ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND hl.cb_hallazgo_id=ac.cb_accion_fkhallazgo AND
    ac.cb_accion_id=ef.cb_accion_eficacia_fkaccion AND ad.cb_auditoria_fkarea=pga.cb_gas_id AND
    fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id;




SELECT tbr.cb_auditoria_id AS aud_id, tbr.cb_auditoria_fkarea AS aud_fkarea, tbr.cb_auditoria_fktipo AS aud_fktipo, tbr.cb_auditoria_codigo AS aud_codigo,
    tbr.cb_auditoria_fechaprogramada AS aud_fprog, tbr.cb_auditoria_duracionestimada AS aud_duracion, tbr.cb_auditoria_lugar AS aud_lugar,
    tbr.cb_auditoria_alcance AS aud_alcance, tbr.cb_auditoria_objetivos AS aud_objetivos, tbr.cb_auditoria_fechahorainicio AS aud_fhini, 
    tbr.cb_auditoria_fechahorafin AS aud_fhfin, tbr.cb_auditoria_conclusiones AS aud_conclusiones, tbr.cb_auditoria_responsable AS aud_responsable,
    tbr.cb_auditoria_fecharegistro AS aud_freg, tbr.cb_auditoria_estado AS aud_estado, tbr.cb_documento_extra_id AS dex_id, tbr.cb_gas_id AS gas_id,
    tbr.cb_gas_responsable AS gas_responsable, tbr.cb_documento_extra_codigo AS dex_codigo, tbr.cb_documento_extra_titulo AS dex_titulo,
    tbr.cb_doc_tipoextra_tipo AS dtpex_tipo, tbr.cb_ficha_procesos_nombre AS fp_nombre, tbr.cb_gerencia_nombre AS g_nombre
FROM (SELECT *
FROM cb_aud_auditoria adta,
(SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_gas_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND
    fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id) AS docs
WHERE adta.cb_auditoria_fkarea=docs.cb_gas_id) AS tbr;



SELECT adq.cb_auditoria_equipo_id, tad.cb_tipo_auditoria_nombre, adq.cb_auditoria_equipo_fkauditoria, ad.cb_auditoria_fkarea,
    ad.cb_auditoria_alcance, adt.cb_auditor_apellidosnombres, tadt.cb_tipo_auditor_nombre, ad.cb_auditoria_lugar,
    ad.cb_auditoria_responsable, ad.cb_auditoria_fechahorainicio, ad.cb_auditoria_fechahorafin, ad.cb_auditoria_duracionestimada,
    ac.cb_accion_descripcion, ef.cb_accion_eficacia_resultado, hl.cb_hallazgo_id, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre,
    ad.cb_auditoria_objetivos
FROM cb_aud_auditoria ad, cb_aud_auditor adt, cb_aud_tipo_auditoria tad, 
    cb_aud_tipo_auditor tadt, cb_aud_auditoria_equipo adq, cb_aud_hallazgo hl, cb_aud_accion ac, 
    cb_aud_accion_eficacia ef, cb_proc_gas pga, cb_procesos_ficha_procesos fp, cb_configuracion_gerencia g
WHERE adq.cb_auditoria_equipo_fkauditoria=ad.cb_auditoria_id AND
    adq.cb_auditoria_equipo_fkauditor=adt.cb_auditor_id AND 
    adq.cb_auditoria_equipo_fktipo=tadt.cb_tipo_auditor_id  AND
    ad.cb_auditoria_fktipo=tad.cb_tipo_auditoria_id AND ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND
    ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND hl.cb_hallazgo_id=ac.cb_accion_fkhallazgo AND
    ac.cb_accion_id=ef.cb_accion_eficacia_fkaccion AND ad.cb_auditoria_fkarea=pga.cb_gas_id AND
    fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id;



SELECT *
FROM cb_aud_auditoria adta,
(SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_gas_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND 
    fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id)as docs
where adta.cb_auditoria_fkarea=docs.cb_gas_id;



SELECT adq.cb_auditoria_equipo_id, tad.cb_tipo_auditoria_nombre, adq.cb_auditoria_equipo_fkauditoria, ad.cb_auditoria_fkarea,
    ad.cb_auditoria_alcance, adt.cb_auditor_apellidosnombres, tadt.cb_tipo_auditor_nombre, ad.cb_auditoria_lugar,
    ad.cb_auditoria_responsable, ad.cb_auditoria_fechahorainicio, ad.cb_auditoria_fechahorafin, ad.cb_auditoria_duracionestimada,
    ac.cb_accion_descripcion, ef.cb_accion_eficacia_resultado, hl.cb_hallazgo_id, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre,
    ad.cb_auditoria_objetivos
FROM cb_aud_auditoria ad, cb_aud_auditor adt, cb_aud_tipo_auditoria tad, 
    cb_aud_tipo_auditor tadt, cb_aud_auditoria_equipo adq, cb_aud_hallazgo hl, cb_aud_accion ac, 
    cb_aud_accion_eficacia ef, cb_proc_gas pga, cb_procesos_ficha_procesos fp, cb_configuracion_gerencia g
WHERE adq.cb_auditoria_equipo_fkauditoria=ad.cb_auditoria_id AND
    adq.cb_auditoria_equipo_fkauditor=adt.cb_auditor_id AND 
    adq.cb_auditoria_equipo_fktipo=tadt.cb_tipo_auditor_id  AND
    ad.cb_auditoria_fktipo=tad.cb_tipo_auditoria_id AND ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND
    ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND hl.cb_hallazgo_id=ac.cb_accion_fkhallazgo AND
    ac.cb_accion_id=ef.cb_accion_eficacia_fkaccion AND ad.cb_auditoria_fkarea=pga.cb_gas_id AND
    fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id;




SELECT *
FROM cb_aud_auditoria adta,
(SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_gas_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND
    fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id)AS docs
WHERE adta.cb_auditoria_fkarea=docs.cb_gas_id;


SELECT DISTINCT(cb_documento_extra_codigo), cb_documento_extra_titulo, cb_doc_tipoextra_tipo, cb_aud_auditoria.*
FROM cb_aud_auditoria, cb_proc_gas, cb_procesos_ficha_procesos, cb_gest_documento_extra, cb_gestion_doctipoextra
WHERE cb_auditoria_fkarea=cb_gas_id AND cb_gas_id=cb_ficha_procesos_fkareagerenciasector AND
    cb_ficha_procesos_id=cb_documento_extra_fkproceso AND cb_documento_extra_fktipo=cb_doc_tipoextra_id;



SELECT cb_aud_fortaleza.*, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_aud_fortaleza
WHERE cb_auditoria_id=cb_fortaleza_fkauditoria AND cb_auditoria_fktipo=cb_tipo_auditoria_id;


SELECT DISTINCT(cb_hallazgo_id), cb_auditoria_id, cb_hallazgo_descripcion, cb_tipo_hallazgo_nombre, cb_accion_descripcion, cb_accion_eficacia_resultado, cb_accion_eficacia_fecha, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo, cb_aud_accion, cb_aud_accion_eficacia
WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_id=cb_accion_fkhallazgo AND cb_accion_id=cb_accion_eficacia_fkaccion
    AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_auditoria_fktipo=cb_tipo_auditoria_id;


SELECT DISTINCT(cb_hallazgo_id), cb_auditoria_id, cb_hallazgo_descripcion, cb_tipo_hallazgo_nombre, cb_accion_id, cb_accion_descripcion, cb_aud_accion_eficacia.*, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo, cb_aud_accion, cb_aud_accion_eficacia
WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_id=cb_accion_fkhallazgo AND cb_accion_id=cb_accion_eficacia_fkaccion
    AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_auditoria_fktipo=cb_tipo_auditoria_id
ORDER BY 2, 1;



INSERT INTO public.cb_aud_accion_eficacia(
	cb_accion_eficacia_fkaccion, cb_accion_eficacia_eficaz, cb_accion_eficacia_resultado, cb_accion_eficacia_fecha, 
	cb_accion_eficacia_responsable, cb_accion_eficacia_nombreverificador, cb_accion_eficacia_cargoverificador, cb_accion_eficacia_estado)
	VALUES 
	(5, 'Si', 'Verificado que ahora utilizan el formulario correcto en el llenado', 
	 '2018-11-13', 'RONNY BALDIVIESO', 'SANDRA TORREZ', 'JEFE DE CONTABILIDAD', 1);
	

INSERT INTO public.cb_gest_documento_extra(
	cb_documento_extra_fkproceso, cb_documento_extra_fktipo, cb_documento_extra_codigo, cb_documento_extra_titulo, 
	cb_documento_extra_fechapublicacion, cb_documento_extra_vigente, cb_documento_extra_estado)
	VALUES 
	(5, 2, 'CPE II', 'CPE-CONSTITUCION POLITICA DEL ESTADO II', '2009-01-01', '', 1),
	(5, 4, 'DL10135 II', 'DL10135-CODIGO DE TRANSITO II', '2009-01-01', '', 1);