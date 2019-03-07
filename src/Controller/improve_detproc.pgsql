SELECT
cb_gerencia_nombre AS GERENCIA,
cb_area_nombre AS AREA,
cb_documento_formulario_codigo AS COD_FORMULARIO,
cb_documento_formulario_titulo AS TITULO_FORMULARIO,
cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO,
cb_documento_formulario_vinculoFileDesc AS DESCARGA_FORMULARIO,
cb_documento_formulario_versionVigente AS VERSION,
cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION,
cb_documento_formulario_aprobadoPor AS APROBADO_POR,
cb_tipo_documento_nombre AS TIPO_DOC_RELACIONADO,
cb_documento_codigo AS DOC_RELACIONADO
FROM
cb_gest_doc_formulario,
cb_gestion_documento,
cb_procesos_ficha_procesos,
cb_proc_gas,
cb_configuracion_gerencia,
cb_procesos_area,
cb_gestion_tipo_documento
WHERE
cb_documento_formulario_fkdocumento=cb_documento_id AND
cb_documento_fktipo=cb_tipo_documento_id AND
cb_documento_fkficha=cb_ficha_procesos_id AND
cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
cb_gas_fkgerencia=cb_gerencia_id AND
cb_gas_fkarea=cb_area_id AND cb_documento_formulario_estado=1;


SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_tipo_documento_nombre AS tipo_documento, 
cb_documento_codigo AS codigo, cb_documento_titulo AS titulo_doc, 
                    cb_documento_vinculoarchivodig AS vinculo_doc, cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, 
                    (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobado_por, 
                    cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculodiagflujo AS vinculo_diagrama_flujo, cb_ficha_procesos_codproceso AS cod_proceso, cb_documento_id AS id
                FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas, 
                    cb_configuracion_gerencia, cb_procesos_area, cb_usuario_usuario
                WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_documento_fkaprobador=cb_usuario_id




SELECT cb_documento_codigo AS codigo_documento, cb_ficha_procesos_codproceso AS cod_proceso, cb_tipo_documento_nombre AS tipo_documento, cb_documento_titulo AS titulo_doc, 
                cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobado_por,
                cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculoarchivodig AS vinculo_archivo, cb_documento_vinculodiagflujo AS vinculo_diagrama
            FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_usuario_usuario
            WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id 
                AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1




SELECT cb_ficha_procesos_id AS id, cb_gas_codigo AS id_area, cb_ficha_procesos_codproceso AS cod_proceso, cb_ficha_procesos_nombre AS nombre,
                cb_ficha_procesos_objetivo AS objetivo_proceso, cb_ficha_procesos_entradasrequeridas AS entradas_requeridas, cb_ficha_procesos_recursosnecesarios AS recursos_necesarios,
                cb_ficha_procesos_vigente AS vigente, cb_ficha_procesos_version AS version, cb_ficha_procesos_fechaemision AS fecha_emision, cb_ficha_procesos_salidasesperadas AS salidas_esperadas
            FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas
            WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                AND cb_ficha_procesos_estado=1



SELECT cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, cb_gas_responsable AS responsable, cb_gas_vigente AS vigente
            FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector
            WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id
                AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND cb_gas_estado=1




SELECT cb_ficha_cargo_nombre AS nombre_cargo, cb_documento_codigo AS codigo_documento
            FROM cb_gestion_documento, cb_fc_ficha_cargo, cb_fc_documentosaso
            WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id 
                AND cb_ficha_cargo_estado=1




SELECT cb_bajadocumento_id AS id, cb_bajadocumento_codigo AS codigo_documento, cb_tipo_documento_nombre AS tipo_documento, cb_bajadocumento_titulo AS titulo, cb_bajadocumento_versionvigente AS version,
                        cb_bajadocumento_fechapublicacion AS fecha_publicacion, cb_bajadocumento_aprobadopor AS aprobado_por, cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
                        cb_bajadocumento_vinculoarchivo AS  vinculo_archivo_digital, cb_ficha_procesos_codproceso AS codigo_proceso
                    FROM cb_procesos_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
                    WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
                        AND cb_bajadocumento_estado=1
                    UNION    
                    SELECT cb_bajadocumento_id AS id, cb_bajadocumento_codigo AS codigo_documento, cb_tipo_documento_nombre AS tipo_documento, cb_bajadocumento_titulo AS titulo, cb_bajadocumento_versionvigente AS version,
                        cb_bajadocumento_fechapublicacion AS fecha_publicacion, cb_bajadocumento_aprobadopor AS aprobado_por, cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
                        cb_bajadocumento_vinculoarchivo AS  vinculo_archivo_digital, '' AS cb_ficha_procesos_codproceso AS codigo_proceso
                    FROM cb_procesos_bajadocumento, cb_gestion_tipo_documento
                    WHERE cb_bajadocumento_fktipo=cb_tipo_documento_id AND cb_bajadocumento_estado=1 AND cb_bajadocumento_id NOT IN
                        (SELECT cb_bajadocumento_id
                        FROM cb_procesos_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
                        WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
                            AND cb_bajadocumento_estado=1) ORDER BY 1



SELECT tbr.cb_bajadocumento_id AS id, tbr.cb_bajadocumento_codigo AS codigo_documento, tbr.cb_tipo_documento_nombre AS tipo_documento, tbr.cb_bajadocumento_titulo AS titulo, tbr.cb_bajadocumento_versionvigente AS version,
    tbr.cb_bajadocumento_fechapublicacion AS fecha_publicacion, tbr.cb_bajadocumento_aprobadopor AS aprobado_por, tbr.cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
    tbr.cb_bajadocumento_vinculoarchivo AS vinculo_archivo_digital, tbr.cb_ficha_procesos_codproceso AS codigo_proceso 
FROM (SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
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
        AND cb_bajadocumento_estado=1) ORDER BY 1) AS tbr


SELECT * FROM cb_gest_doc_proceso;
SELECT * FROM cb_gest_docprocrevision;

SELECT
                    cb_gerencia_nombre AS GERENCIA,
                    cb_area_nombre AS AREA,
                    cb_documento_formulario_codigo AS COD_FORMULARIO,
                    cb_documento_formulario_titulo AS TITULO_FORMULARIO,
                    cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO,
                    cb_documento_formulario_vinculoFileDesc AS DESCARGA_FORMULARIO,
                    cb_documento_formulario_versionVigente AS VERSION,
                    cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION,
                    cb_documento_formulario_aprobadoPor AS APROBADO_POR,
                    cb_tipo_documento_nombre AS TIPO_DOC_RELACIONADO,
                    cb_documento_codigo AS DOC_RELACIONADO
                    FROM
                    cb_gest_doc_formulario,
                    cb_gestion_documento,
                    cb_procesos_ficha_procesos,
                    cb_proc_gas,
                    cb_configuracion_gerencia,
                    cb_procesos_area,
                    cb_gestion_tipo_documento
                    WHERE
                    cb_documento_formulario_fkdocumento=cb_documento_id AND
                    cb_documento_fktipo=cb_tipo_documento_id AND
                    cb_documento_fkficha=cb_ficha_procesos_id AND
                    cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
                    cb_gas_fkgerencia=cb_gerencia_id AND
                    cb_gas_fkarea=cb_area_id AND cb_documento_formulario_estado=1;




SELECT * FROM cb_procesos_ficha_procesos ORDER BY 3;
SELECT * FROM cb_procesos_indicador_proceso;
SELECT * FROM cb_proceso_seg_indicador;


SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_del_proceso, cb_indicador_proceso_codigo AS codigo_del_indicador, 
    cb_indicador_proceso_objetivo AS objetivo_del_indicador, cb_seguimiento_indicador_responsable AS responsable_del_seguimiento, 
    cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes,
    cb_seguimiento_indicador_valor AS valor_del_indicador, cb_seguimiento_indicador_observacion AS observaciones
FROM cb_configuracion_gerencia, cb_proc_gas, cb_procesos_ficha_procesos, cb_procesos_indicador_proceso, cb_proceso_seg_indicador
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_indicador_proceso_fkficha=cb_ficha_procesos_id
    AND cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_estado=1;




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
    AND cb_indicador_proceso_fkunidad=cb_unidad_medida_id AND cb_indicador_proceso_estado=1 AND cb_indicador_proceso_codigo='IFE-CAL1';



SELECT cb_seguimiento_indicador_id AS id, cb_indicador_proceso_codigo AS codigo_indicador, cb_seguimiento_indicador_responsable AS resp_seguimiento,
    cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes, cb_seguimiento_indicador_valor AS indicador, cb_seguimiento_indicador_observacion AS observaciones
FROM cb_procesos_indicador_proceso, cb_proceso_seg_indicador
WHERE cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_estado=1 AND cb_indicador_proceso_codigo='IFE-CAL1';


SELECT * FROM cb_configuracion_gerencia;
SELECT * FROM cb_procesos_area;
SELECT * FROM cb_configuracion_sector;
SELECT * FROM cb_proc_gas;
SELECT * FROM cb_procesos_ficha_procesos;
SELECT * FROM cb_prob_ocurrencia;
SELECT * FROM cb_procesos_impacto;
SELECT * FROM cb_procesos_tipocro;
SELECT * FROM cb_proc_riesgos_oportunidades;
SELECT * FROM cb_procesos_seguimientocro;



SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_proceso,
    cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo_crocm, cb_riesgos_oportunidades_descripcion AS descrippcion_crocm,
    cb_riesgos_oportunidades_accion AS accion, cb_seguimientocro_fechaseg AS fec_segu, cb_seguimientocro_observaciones AS observaciones,
    cb_seguimientocro_estadoseg AS estado, cb_seguimientocro_responsable AS responsable_seguimiento
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_proc_riesgos_oportunidades, cb_procesos_tipocro, cb_procesos_seguimientocro
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_gas_id=cb_ficha_procesos_fkareagerenciasector 
    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id 
    AND cb_seguimientocro_fkriesgos=cb_riesgos_oportunidades_id AND cb_seguimientocro_estado=1 ORDER BY 1, 2, 7;


SELECT * FROM cb_configuracion_gerencia;
SELECT * FROM cb_procesos_area;
SELECT * FROM cb_configuracion_sector;
SELECT * FROM cb_proc_gas;
SELECT * FROM cb_gestion_tipo_documento;
SELECT * FROM cb_gestion_documento;
SELECT * FROM cb_fc_ficha_cargo;
SELECT * FROM cb_fc_documentosaso;



SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_cargo_nombre AS id_cargo, cb_ficha_cargo_fechaaprobacion AS f_aprobacion,
    cb_ficha_cargo_aprobadojefe AS aprobado_jefe, cb_ficha_cargo_aprobadogerente AS aprobado_gerente, cb_ficha_cargo_id AS id
FROM cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_fc_ficha_cargo
WHERE cb_ficha_cargo_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_ficha_cargo_estado=1
ORDER BY 1, 2, 3;



SELECT cb_ficha_cargo_nombre AS id_cargo, cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector,
    cb_ficha_cargo_objetivo AS objetivo_cargo, cb_ficha_cargo_responsabilidades AS responsabilidades, cb_ficha_cargo_experiencia AS experiencia,
    cb_ficha_cargo_conocimientos AS conocimientos, cb_ficha_cargo_formacion AS formacion, cb_ficha_cargo_caracteristicas AS caracteristicas_pers,
    cb_ficha_cargo_fechaaprobacion AS fecha_aprobacion, cb_ficha_cargo_aprobadojefe AS aprobado_jefe, cb_ficha_cargo_firmajefe AS firma_electronica_jefe,
    cb_ficha_cargo_aprobadogerente AS aprobado_gerente, cb_ficha_cargo_firmagerente AS firma_electronica_gerente, cb_ficha_cargo_hipervinculo AS vinculo_archivo_ficha_cargo
FROM cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_fc_ficha_cargo
WHERE cb_ficha_cargo_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id 
    AND cb_ficha_cargo_estado=1 AND cb_ficha_cargo_id=16;



SELECT cb_tipo_documento_nombre AS tipo_doc, cb_documento_codigo AS codigo_doc, cb_documento_titulo AS titulo_doc, cb_ficha_cargo_hipervinculo AS archivo
FROM cb_fc_ficha_cargo, cb_gestion_documento, cb_fc_documentosaso, cb_gestion_tipo_documento
WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id 
    AND cb_documentosaso_estado=1 AND cb_ficha_cargo_id=16;



select 
    cb_documento_formulario_id as ID_FORMULARIO,
    cb_documento_formulario_codigo AS COD_FORMULARIO,
    cb_documento_codigo as DOC_RELACIONADO,
    cb_documento_formulario_titulo AS TITULO_FORMULARIO,
    cb_documento_formulario_versionVigente AS VERSION,
    cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION,
    cb_documento_formulario_aprobadoPor AS APROBADO_POR,
    cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO,
    cb_documento_formulario_vinculoFileDesc AS DESCARGA_FORMULARIO
    
    from 
    cb_gest_doc_formulario,
    cb_gestion_documento,
    cb_gestion_tipo_documento
    WHERE
    cb_documento_formulario_fkdocumento=cb_documento_id AND
    cb_documento_fktipo=cb_tipo_documento_id AND
    cb_documento_formulario_codigo='sdf' AND
    cb_documento_codigo='CEI';



SELECT * FROM cb_gestion_tipo_documento;
SELECT * FROM cb_gestion_documento;
SELECT * FROM cb_gest_doc_formulario;

SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_documento_formulario_codigo AS cod_formulario, cb_documento_formulario_titulo AS titulo_formulario,
    cb_documento_formulario_vinculofiledig AS vincuo_archivo, cb_documento_formulario_vinculofiledesc AS descarga_formulario, cb_documento_formulario_versionvigente AS version,
    cb_documento_formulario_fechapublicacion AS f_publicacion, cb_documento_formulario_aprobadopor AS aprobado_por, cb_tipo_documento_nombre AS tipo_doc_relacionado,
    cb_documento_codigo AS doc_relacionado
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_gest_doc_formulario, cb_gestion_tipo_documento
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id 
    AND cb_gas_fkarea=cb_area_id AND cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_estado=1
ORDER BY 1, 2, 3;






SELECT
cb_gerencia_nombre AS GERENCIA,
cb_area_nombre AS AREA,
cb_documento_formulario_codigo AS COD_FORMULARIO,
cb_documento_formulario_titulo AS TITULO_FORMULARIO,
cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO,
cb_documento_formulario_vinculoFileDesc AS DESCARGA_FORMULARIO,
cb_documento_formulario_versionVigente AS VERSION,
cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION,
cb_documento_formulario_aprobadoPor AS APROBADO_POR,
cb_tipo_documento_nombre AS TIPO_DOC_RELACIONADO,
cb_documento_codigo AS DOC_RELACIONADO
FROM
cb_gest_doc_formulario,
cb_gestion_documento,
cb_procesos_ficha_procesos,
cb_proc_gas,
cb_configuracion_gerencia,
cb_procesos_area,
cb_gestion_tipo_documento
WHERE
cb_documento_formulario_fkdocumento=cb_documento_id AND
cb_documento_fktipo=cb_tipo_documento_id AND
cb_documento_fkficha=cb_ficha_procesos_id AND
cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
cb_gas_fkgerencia=cb_gerencia_id AND
cb_gas_fkarea=cb_area_id AND cb_documento_formulario_estado=1;


SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_tipo_documento_nombre AS tipo_documento, 
cb_documento_codigo AS codigo, cb_documento_titulo AS titulo_doc, 
                    cb_documento_vinculoarchivodig AS vinculo_doc, cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, 
                    (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobado_por, 
                    cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculodiagflujo AS vinculo_diagrama_flujo, cb_ficha_procesos_codproceso AS cod_proceso, cb_documento_id AS id
                FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_proc_gas, 
                    cb_configuracion_gerencia, cb_procesos_area, cb_usuario_usuario
                WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_documento_fkaprobador=cb_usuario_id




SELECT cb_documento_codigo AS codigo_documento, cb_ficha_procesos_codproceso AS cod_proceso, cb_tipo_documento_nombre AS tipo_documento, cb_documento_titulo AS titulo_doc, 
                cb_documento_versionvigente AS version, cb_documento_fechapublicacion AS f_publicacion, (cb_usuario_nombre || ' ' || cb_usuario_apellido)AS aprobado_por,
                cb_documento_carpetaoperativa AS carpeta_operativa, cb_documento_vinculoarchivodig AS vinculo_archivo, cb_documento_vinculodiagflujo AS vinculo_diagrama
            FROM cb_gestion_documento, cb_gestion_tipo_documento, cb_procesos_ficha_procesos, cb_usuario_usuario
            WHERE cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_fkficha=cb_ficha_procesos_id 
                AND cb_documento_fkaprobador=cb_usuario_id AND cb_documento_estado=1




SELECT cb_ficha_procesos_id AS id, cb_gas_codigo AS id_area, cb_ficha_procesos_codproceso AS cod_proceso, cb_ficha_procesos_nombre AS nombre,
                cb_ficha_procesos_objetivo AS objetivo_proceso, cb_ficha_procesos_entradasrequeridas AS entradas_requeridas, cb_ficha_procesos_recursosnecesarios AS recursos_necesarios,
                cb_ficha_procesos_vigente AS vigente, cb_ficha_procesos_version AS version, cb_ficha_procesos_fechaemision AS fecha_emision, cb_ficha_procesos_salidasesperadas AS salidas_esperadas
            FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas
            WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id
                AND cb_ficha_procesos_estado=1



SELECT cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector, cb_gas_responsable AS responsable, cb_gas_vigente AS vigente
            FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector
            WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id
                AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id AND cb_gas_estado=1




SELECT cb_ficha_cargo_nombre AS nombre_cargo, cb_documento_codigo AS codigo_documento
            FROM cb_gestion_documento, cb_fc_ficha_cargo, cb_fc_documentosaso
            WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id 
                AND cb_ficha_cargo_estado=1




SELECT cb_bajadocumento_id AS id, cb_bajadocumento_codigo AS codigo_documento, cb_tipo_documento_nombre AS tipo_documento, cb_bajadocumento_titulo AS titulo, cb_bajadocumento_versionvigente AS version,
                        cb_bajadocumento_fechapublicacion AS fecha_publicacion, cb_bajadocumento_aprobadopor AS aprobado_por, cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
                        cb_bajadocumento_vinculoarchivo AS  vinculo_archivo_digital, cb_ficha_procesos_codproceso AS codigo_proceso
                    FROM cb_procesos_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
                    WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
                        AND cb_bajadocumento_estado=1
                    UNION    
                    SELECT cb_bajadocumento_id AS id, cb_bajadocumento_codigo AS codigo_documento, cb_tipo_documento_nombre AS tipo_documento, cb_bajadocumento_titulo AS titulo, cb_bajadocumento_versionvigente AS version,
                        cb_bajadocumento_fechapublicacion AS fecha_publicacion, cb_bajadocumento_aprobadopor AS aprobado_por, cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
                        cb_bajadocumento_vinculoarchivo AS  vinculo_archivo_digital, '' AS cb_ficha_procesos_codproceso AS codigo_proceso
                    FROM cb_procesos_bajadocumento, cb_gestion_tipo_documento
                    WHERE cb_bajadocumento_fktipo=cb_tipo_documento_id AND cb_bajadocumento_estado=1 AND cb_bajadocumento_id NOT IN
                        (SELECT cb_bajadocumento_id
                        FROM cb_procesos_bajadocumento, cb_procesos_ficha_procesos, cb_gestion_tipo_documento
                        WHERE cb_bajadocumento_fkproceso=cb_ficha_procesos_id AND cb_bajadocumento_fktipo=cb_tipo_documento_id
                            AND cb_bajadocumento_estado=1) ORDER BY 1



SELECT tbr.cb_bajadocumento_id AS id, tbr.cb_bajadocumento_codigo AS codigo_documento, tbr.cb_tipo_documento_nombre AS tipo_documento, tbr.cb_bajadocumento_titulo AS titulo, tbr.cb_bajadocumento_versionvigente AS version,
    tbr.cb_bajadocumento_fechapublicacion AS fecha_publicacion, tbr.cb_bajadocumento_aprobadopor AS aprobado_por, tbr.cb_bajadocumento_carpetaoperativa AS carpeta_operativa, 
    tbr.cb_bajadocumento_vinculoarchivo AS vinculo_archivo_digital, tbr.cb_ficha_procesos_codproceso AS codigo_proceso 
FROM (SELECT cb_bajadocumento_id ,cb_bajadocumento_codigo, cb_tipo_documento_nombre, cb_bajadocumento_titulo, cb_bajadocumento_versionvigente,
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
        AND cb_bajadocumento_estado=1) ORDER BY 1) AS tbr


SELECT * FROM cb_gest_doc_proceso;
SELECT * FROM cb_gest_docprocrevision;

SELECT
                    cb_gerencia_nombre AS GERENCIA,
                    cb_area_nombre AS AREA,
                    cb_documento_formulario_codigo AS COD_FORMULARIO,
                    cb_documento_formulario_titulo AS TITULO_FORMULARIO,
                    cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO,
                    cb_documento_formulario_vinculoFileDesc AS DESCARGA_FORMULARIO,
                    cb_documento_formulario_versionVigente AS VERSION,
                    cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION,
                    cb_documento_formulario_aprobadoPor AS APROBADO_POR,
                    cb_tipo_documento_nombre AS TIPO_DOC_RELACIONADO,
                    cb_documento_codigo AS DOC_RELACIONADO
                    FROM
                    cb_gest_doc_formulario,
                    cb_gestion_documento,
                    cb_procesos_ficha_procesos,
                    cb_proc_gas,
                    cb_configuracion_gerencia,
                    cb_procesos_area,
                    cb_gestion_tipo_documento
                    WHERE
                    cb_documento_formulario_fkdocumento=cb_documento_id AND
                    cb_documento_fktipo=cb_tipo_documento_id AND
                    cb_documento_fkficha=cb_ficha_procesos_id AND
                    cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
                    cb_gas_fkgerencia=cb_gerencia_id AND
                    cb_gas_fkarea=cb_area_id AND cb_documento_formulario_estado=1;




SELECT * FROM cb_procesos_ficha_procesos ORDER BY 3;
SELECT * FROM cb_procesos_indicador_proceso;
SELECT * FROM cb_proceso_seg_indicador;


SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_del_proceso, cb_indicador_proceso_codigo AS codigo_del_indicador, 
    cb_indicador_proceso_objetivo AS objetivo_del_indicador, cb_seguimiento_indicador_responsable AS responsable_del_seguimiento, 
    cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes,
    cb_seguimiento_indicador_valor AS valor_del_indicador, cb_seguimiento_indicador_observacion AS observaciones
FROM cb_configuracion_gerencia, cb_proc_gas, cb_procesos_ficha_procesos, cb_procesos_indicador_proceso, cb_proceso_seg_indicador
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_indicador_proceso_fkficha=cb_ficha_procesos_id
    AND cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_estado=1;




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
    AND cb_indicador_proceso_fkunidad=cb_unidad_medida_id AND cb_indicador_proceso_estado=1 AND cb_indicador_proceso_codigo='IFE-CAL1';



SELECT cb_seguimiento_indicador_id AS id, cb_indicador_proceso_codigo AS codigo_indicador, cb_seguimiento_indicador_responsable AS resp_seguimiento,
    cb_seguimiento_indicador_ano AS anio, cb_seguimiento_indicador_mes AS mes, cb_seguimiento_indicador_valor AS indicador, cb_seguimiento_indicador_observacion AS observaciones
FROM cb_procesos_indicador_proceso, cb_proceso_seg_indicador
WHERE cb_seguimiento_indicador_fkindicador=cb_indicador_proceso_id AND cb_seguimiento_indicador_estado=1 AND cb_indicador_proceso_codigo='IFE-CAL1';


SELECT * FROM cb_configuracion_gerencia;
SELECT * FROM cb_procesos_area;
SELECT * FROM cb_configuracion_sector;
SELECT * FROM cb_proc_gas;
SELECT * FROM cb_procesos_ficha_procesos;
SELECT * FROM cb_prob_ocurrencia;
SELECT * FROM cb_procesos_impacto;
SELECT * FROM cb_procesos_tipocro;
SELECT * FROM cb_proc_riesgos_oportunidades;
SELECT * FROM cb_procesos_seguimientocro;



SELECT cb_gerencia_nombre AS gerencia, cb_ficha_procesos_codproceso AS codigo_proceso,
    cb_riesgos_oportunidades_id AS id_cro, cb_tipocro_nombre AS tipo_crocm, cb_riesgos_oportunidades_descripcion AS descrippcion_crocm,
    cb_riesgos_oportunidades_accion AS accion, cb_seguimientocro_fechaseg AS fec_segu, cb_seguimientocro_observaciones AS observaciones,
    cb_seguimientocro_estadoseg AS estado, cb_seguimientocro_responsable AS responsable_seguimiento
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_proc_riesgos_oportunidades, cb_procesos_tipocro, cb_procesos_seguimientocro
WHERE cb_riesgos_oportunidades_fkficha=cb_ficha_procesos_id AND cb_gas_id=cb_ficha_procesos_fkareagerenciasector 
    AND cb_gas_fkgerencia=cb_gerencia_id AND cb_riesgos_oportunidades_fktipo=cb_tipocro_id 
    AND cb_seguimientocro_fkriesgos=cb_riesgos_oportunidades_id AND cb_seguimientocro_estado=1 ORDER BY 1, 2, 7;


SELECT * FROM cb_configuracion_gerencia;
SELECT * FROM cb_procesos_area;
SELECT * FROM cb_configuracion_sector;
SELECT * FROM cb_proc_gas;
SELECT * FROM cb_gestion_tipo_documento;
SELECT * FROM cb_gestion_documento;
SELECT * FROM cb_fc_ficha_cargo;
SELECT * FROM cb_fc_documentosaso;



SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_ficha_cargo_nombre AS id_cargo, cb_ficha_cargo_fechaaprobacion AS f_aprobacion,
    cb_ficha_cargo_aprobadojefe AS aprobado_jefe, cb_ficha_cargo_aprobadogerente AS aprobado_gerente, cb_ficha_cargo_id AS id
FROM cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_fc_ficha_cargo
WHERE cb_ficha_cargo_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_ficha_cargo_estado=1
ORDER BY 1, 2, 3;



SELECT cb_ficha_cargo_nombre AS id_cargo, cb_gas_codigo AS id_area, cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_sector_nombre AS sector,
    cb_ficha_cargo_objetivo AS objetivo_cargo, cb_ficha_cargo_responsabilidades AS responsabilidades, cb_ficha_cargo_experiencia AS experiencia,
    cb_ficha_cargo_conocimientos AS conocimientos, cb_ficha_cargo_formacion AS formacion, cb_ficha_cargo_caracteristicas AS caracteristicas_pers,
    cb_ficha_cargo_fechaaprobacion AS fecha_aprobacion, cb_ficha_cargo_aprobadojefe AS aprobado_jefe, cb_ficha_cargo_firmajefe AS firma_electronica_jefe,
    cb_ficha_cargo_aprobadogerente AS aprobado_gerente, cb_ficha_cargo_firmagerente AS firma_electronica_gerente, cb_ficha_cargo_hipervinculo AS vinculo_archivo_ficha_cargo
FROM cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_configuracion_sector, cb_fc_ficha_cargo
WHERE cb_ficha_cargo_fkarea=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fksector=cb_sector_id 
    AND cb_ficha_cargo_estado=1 AND cb_ficha_cargo_id=16;



SELECT cb_tipo_documento_nombre AS tipo_doc, cb_documento_codigo AS codigo_doc, cb_documento_titulo AS titulo_doc, cb_ficha_cargo_hipervinculo AS archivo
FROM cb_fc_ficha_cargo, cb_gestion_documento, cb_fc_documentosaso, cb_gestion_tipo_documento
WHERE cb_documentosaso_fkfichacargo=cb_ficha_cargo_id AND cb_documentosaso_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id 
    AND cb_documentosaso_estado=1 AND cb_ficha_cargo_id=16;



select 
    cb_documento_formulario_id as ID_FORMULARIO,
    cb_documento_formulario_codigo AS COD_FORMULARIO,
    cb_documento_codigo as DOC_RELACIONADO,
    cb_documento_formulario_titulo AS TITULO_FORMULARIO,
    cb_documento_formulario_versionVigente AS VERSION,
    cb_documento_formulario_fechaPublicacion AS FECHA_PUBLICACION,
    cb_documento_formulario_aprobadoPor AS APROBADO_POR,
    cb_documento_formulario_vinculoFileDig AS VINCULO_ARCHIVO,
    cb_documento_formulario_vinculoFileDesc AS DESCARGA_FORMULARIO
    
    from 
    cb_gest_doc_formulario,
    cb_gestion_documento,
    cb_gestion_tipo_documento
    WHERE
    cb_documento_formulario_fkdocumento=cb_documento_id AND
    cb_documento_fktipo=cb_tipo_documento_id AND
    cb_documento_formulario_codigo='sdf' AND
    cb_documento_codigo='CEI';



SELECT * FROM cb_gestion_tipo_documento;
SELECT * FROM cb_gestion_documento;
SELECT * FROM cb_gest_doc_formulario;

SELECT cb_gerencia_nombre AS gerencia, cb_area_nombre AS area, cb_documento_formulario_codigo AS cod_formulario, cb_documento_formulario_titulo AS titulo_formulario,
    cb_documento_formulario_vinculofiledig AS vincuo_archivo, cb_documento_formulario_vinculofiledesc AS descarga_formulario, cb_documento_formulario_versionvigente AS version,
    cb_documento_formulario_fechapublicacion AS f_publicacion, cb_documento_formulario_aprobadopor AS aprobado_por, cb_tipo_documento_nombre AS tipo_doc_relacionado,
    cb_documento_codigo AS doc_relacionado
FROM cb_gestion_documento, cb_procesos_ficha_procesos, cb_proc_gas, cb_configuracion_gerencia, cb_procesos_area, cb_gest_doc_formulario, cb_gestion_tipo_documento
WHERE cb_documento_fkficha=cb_ficha_procesos_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkgerencia=cb_gerencia_id 
    AND cb_gas_fkarea=cb_area_id AND cb_documento_formulario_fkdocumento=cb_documento_id AND cb_documento_fktipo=cb_tipo_documento_id AND cb_documento_formulario_estado=1
ORDER BY 1, 2, 3;


SELECT * FROM cb_gestion_tipo_documento;
SELECT * FROM cb_gestion_documento;
SELECT * FROM cb_gest_doc_proceso;
SELECT * FROM cb_gest_docprocrevision;

SELECT cb_docprocrevision_fkdoc AS id_revision, cb_docprocrevision_fecha AS fecha_recibido, cb_docprocrevision_responsable AS responsable_revision,
    cb_docprocrevision_estadodoc AS estado, cb_docprocrevision_firma AS firma_electronica
FROM cb_gest_doc_proceso, cb_gest_docprocrevision
WHERE cb_docprocrevision_fkdoc=cb_documento_proceso_id AND cb_docprocrevision_estado=1 AND cb_documento_proceso_id=1;


select cb_documento_codigo as COD_DOCUMENTO,cb_ficha_procesos_codproceso as COD_PROCESO,cb_tipo_documento_nombre as TIPO_DOCUMENTO,
                    cb_documento_titulo as TITULO_DOC,cb_documento_versionvigente as VERSION_VIGENTE,cb_documento_fechaPublicacion as FECHA_PUBLICACION,
                    cb_usuario_nombre AS APROBADO_POR,cb_documento_carpetaOperativa AS CARPETA_OPERATIVA, 
                    cb_documento_vinculoarchivodig AS vinculo_archivo_digital, cb_documento_vinculodiagflujo AS vinculo_diagrama_de_flujo
                    from cb_gestion_documento, cb_procesos_ficha_procesos,cb_gestion_tipo_documento,cb_usuario_usuario
                    WHERE cb_documento_fkficha = cb_ficha_procesos_id AND
                    cb_documento_fktipo=cb_tipo_documento_id AND
                    cb_documento_fkaprobador=cb_usuario_id AND
                    cb_documento_fkficha=28;


SELECT cb_gas_id AS idfc, cb_gas_codigo as ID, cb_gerencia_nombre AS GERENCIA, cb_area_nombre AS AREA, cb_sector_nombre AS SECTOR, 
    cb_ficha_procesos_nombre AS NOMBRE_DEL_PROCESO, cb_ficha_procesos_codproceso AS CODIGO_DEL_PROCESO, cb_gas_responsable AS RESPONSABLE, 
    cb_ficha_procesos_id AS id_area
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fksector=cb_sector_id
ORDER BY 6; 



SELECT cb_ficha_procesos_nombre as nombre_del_proceso, cb_ficha_procesos_codproceso as codigo_proceso, cb_gas_codigo as id, 
    cb_gerencia_nombre as gerencia, cb_area_nombre as area, cb_sector_nombre as sector, cb_gas_responsable as responsable, 
    cb_ficha_procesos_id AS idfc, cb_gas_id AS id_area
FROM cb_procesos_ficha_procesos, cb_proc_gas, cb_procesos_area, cb_configuracion_gerencia, cb_configuracion_sector
WHERE cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND cb_gas_fkarea=cb_area_id AND cb_gas_fkgerencia=cb_gerencia_id AND cb_gas_fksector=cb_sector_id
ORDER BY 2;