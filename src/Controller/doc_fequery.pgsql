SELECT cb_gerencia_nombre, cb_area_nombre, cb_tipo_documento_nombre, cb_documento_codigo, cb_documento_titulo, 
	cb_documento_vinculoarchivodig, cb_documento_versionvigente, cb_documento_fechapublicacion, 
    (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobadopor, 
	cb_documento_carpetaoperativa, cb_documento_vinculodiagflujo, cb_ficha_procesos_codproceso, cb_documento_id
FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas, 
    cb_configuracion_gerencia, cb_procesos_area, cb_usuario_usuario
WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1;




SELECT cb_documento_codigo, cb_ficha_procesos_codproceso, cb_tipo_documento_nombre, cb_documento_titulo, 
    cb_documento_versionvigente, cb_documento_fechapublicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobadopor,
    cb_documento_carpetaoperativa, cb_documento_vinculoarchivodig, cb_documento_vinculodiagflujo
FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_usuario_usuario
WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id 
    AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1 AND cb_documento_id=4;


SELECT cb_ficha_procesos_id, cb_gas_codigo, cb_ficha_procesos_codproceso, cb_ficha_procesos_nombre,
    cb_ficha_procesos_objetivo, cb_ficha_procesos_entradasrequeridas, cb_ficha_procesos_recursosnecesarios,
    cb_ficha_procesos_vigente, cb_ficha_procesos_version, cb_ficha_procesos_fechaemision, cb_ficha_procesos_salidasesperadas
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
    AND cb_ficha_procesos_estado=1 AND cb_documento_id=4;


SELECT cb_gas_codigo, cb_gerencia_nombre, cb_area_nombre, cb_sector_nombre, cb_gas_responsable, cb_gas_vigente
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id
    AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND cb_gas_estado=1 AND cb_documento_id=4;


SELECT cb_ficha_cargo_nombre, cb_documento_codigo
FROM cb_gestion_documento, cb_fc_ficha_cargo, cb_fc_documentosaso
WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id 
    AND cb_ficha_cargo_estado=1 AND cb_documento_id=4;



select * from cb_fc_ficha_cargo;
select * from cb_gestion_documento;
select * from cb_fc_documentosaso;


select * from cb_configuracion_gerencia;
select * from cb_procesos_area;
select * from cb_configuracion_sector;
select * from cb_proc_gas;

select * from cb_gestion_tipo_documento;
select * from cb_procesos_ficha_procesos;
select * from cb_gestion_documento;
select * from cb_proc_doc_proceso;
select * from cb_proceso_docprocrevision;
select * from cb_procesos_bajadocumento;



select cb_documento_codigo ,cb_proc_doc_proceso.* 
from cb_proc_doc_proceso, cb_gestion_documento
WHERE cb_documento_id=cb_documento_proceso_fkdocumento;



SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
    cb_bajadocumento_fechapublicacion, cb_bajadocumento_aprobadopor, cb_bajadocumento_carpetaoperativa, 
    cb_bajadocumento_vinculoarchivo, cb_ficha_procesos_codproceso
FROM cb_procesos_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
    AND cb_bajadocumento_estado=1
UNION    
SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
    cb_bajadocumento_fechapublicacion, cb_bajadocumento_aprobadopor, cb_bajadocumento_carpetaoperativa, 
    cb_bajadocumento_vinculoarchivo, '' AS cb_ficha_procesos_codproceso
FROM cb_procesos_bajadocumento, cb_gestion_tipo_documento
WHERE cb_bajadocumento_fktipo=cb_tipo_documento_id AND cb_bajadocumento_estado=1 AND cb_bajadocumento_id NOT IN
    (SELECT cb_bajadocumento_id
    FROM cb_procesos_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
    WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
        AND cb_bajadocumento_estado=1) ORDER BY 1;
