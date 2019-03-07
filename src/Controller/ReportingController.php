<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Rol;

class ReportingController extends AbstractController
{
    /**
     * @Route("/reporting", name="reporting")
     */
    public function index()
    {
        return $this->render('reporting/index.html.twig', [
            'controller_name' => 'ReportingController',
        ]);
    }

    /**
     * @Route("/auditoria_anual", methods={"POST"}, name="auditoria_anual")
     */
    public function auditoria_anual()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $anio = $sx['anio'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql  = "SELECT adq.cb_auditoria_equipo_id, tad.cb_tipo_auditoria_nombre, adq.cb_auditoria_equipo_fkauditoria, ad.cb_auditoria_fkarea,
                        ad.cb_auditoria_alcance, adt.cb_auditor_apellidosnombres, tadt.cb_tipo_auditor_nombre, ad.cb_auditoria_lugar,
                        ad.cb_auditoria_responsable, ad.cb_auditoria_fechahorainicio, ad.cb_auditoria_fechahorafin, ad.cb_auditoria_duracionestimada,
                        ac.cb_accion_descripcion, ef.cb_accion_eficacia_resultado, hl.cb_hallazgo_id, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
                    FROM cb_aud_auditoria ad, cb_aud_auditor adt, cb_aud_tipo_auditoria tad, 
                        cb_aud_tipo_auditor tadt, cb_aud_auditoria_equipo adq, cb_aud_hallazgo hl, cb_aud_accion ac, 
                        cb_aud_accion_eficacia ef, cb_proc_gas pga, cb_procesos_ficha_procesos fp, cb_configuracion_gerencia g
                    WHERE adq.cb_auditoria_equipo_fkauditoria=ad.cb_auditoria_id AND
                        adq.cb_auditoria_equipo_fkauditor=adt.cb_auditor_id AND 
                        adq.cb_auditoria_equipo_fktipo=tadt.cb_tipo_auditor_id  AND
                        ad.cb_auditoria_fktipo=tad.cb_tipo_auditoria_id AND ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND
                        ad.cb_auditoria_id=hl.cb_hallazgo_fkauditoria AND hl.cb_hallazgo_id=ac.cb_accion_fkhallazgo AND
                        ac.cb_accion_id=ef.cb_accion_eficacia_fkaccion AND ad.cb_auditoria_fkarea=pga.cb_gas_id AND
                        fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id AND date_part('year', ad.cb_auditoria_fechaprogramada)=:anio;";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['anio' => $anio]);
            $dtaud = $stmt->fetchAll();

            $sql2  = "SELECT *
                    FROM cb_aud_auditoria adta,
                    (SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_auditoria_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
                    FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
                    WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND
                        fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id) AS docs
                    WHERE adta.cb_auditoria_fkarea=docs.cb_gas_id AND date_part('year', adta.cb_auditoria_fechaprogramada)=:anio";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute(['anio' => $anio]);
            $dtdoc = $stmt2->fetchAll();

            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);

            $html = $this->renderView('reporting/auditoriasig.html.twig', array('objects' => $dtaud, 'docs' => $dtdoc));

            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            //$dompdf->setPaper('A4', 'portrait');
            $dompdf->setPaper(array(0, 0, 1250, 841), 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Store PDF Binary Data
            $output = $dompdf->output();
            
            // In this case, we want to write the file in the public directory
            $publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            $pdfFilepath =  $publicDirectory . '/Programa_anual_auditoria_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/aud_anual", methods={"POST"}, name="aud_anual")
     */
    public function aud_anual()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $anio = $sx['anio'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql  = "SELECT adq.cb_auditoria_equipo_id AS eq_id, tad.cb_tipo_auditoria_nombre AS  tpaud_tipo, adq.cb_auditoria_equipo_fkauditoria AS eq_fkaud, ad.cb_auditoria_fkarea AS aud_fkarea,
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
                        fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id AND date_part('year', ad.cb_auditoria_fechaprogramada)=:anio";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['anio' => $anio]);
            $dtaud = $stmt->fetchAll();

            $sql2  = "SELECT tbr.cb_auditoria_id AS aud_id, tbr.cb_auditoria_fkarea AS aud_fkarea, tbr.cb_auditoria_fktipo AS aud_fktipo, tbr.cb_auditoria_codigo AS aud_codigo,
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
                    WHERE adta.cb_auditoria_fkarea=docs.cb_gas_id AND date_part('year', adta.cb_auditoria_fechaprogramada)=:anio) AS tbr";

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute(['anio' => $anio]);
            $dtdoc = $stmt2->fetchAll();

            //dd($dtaud);
            //dd($dtdoc);
            
            $spreadsheet = new Spreadsheet();
            
            /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
            $sheet = $spreadsheet->getActiveSheet();

            //$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(34);
            //$spreadsheet->getActiveSheet()->getDefaultRowDimension()->setRowHeight(20);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);


            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName('Logo');
            $drawing->setDescription('Logo');
            $ruta = $this->getParameter('Directorio_LogoRep');
            $drawing->setPath($ruta);
            $drawing->setHeight(45);
            $drawing->setWorksheet($spreadsheet->getActiveSheet());


            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('GCDO-0802-01');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('D1')->setValue($richText);

            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('PROGRAMA ANUAL DE AUDITORÍAS AL SISTEMA INTEGRADO DE GESTIÓN');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('B2')->setValue($richText);

            if (sizeof($dtaud) > 0){
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

            $spreadsheet->getActiveSheet()->getStyle('A4')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A4')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A4')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A4')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('B4')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('B4')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('B4')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('B4')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('C4')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('C4')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('C4')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('C4')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('D4')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('D4')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('D4')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('D4')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('F4')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('F4')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('F4')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('F4')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('G4')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('G4')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('G4')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('G4')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);



            $spreadsheet->getActiveSheet()->getStyle('A5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('A5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('B5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('B5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('B5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('B5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('C5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('C5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('C5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('C5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('D5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('D5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('D5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('D5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('E5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('E5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('E5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('E5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('F5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('F5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('F5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('F5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('G5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('G5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('G5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('G5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('H5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('H5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('H5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('H5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('I5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('I5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('I5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('I5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('J5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('J5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('J5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('J5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('K5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('K5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('K5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('K5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('L5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('L5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('L5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('L5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('M5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('M5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('M5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('M5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('N5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('N5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('N5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('N5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

            $spreadsheet->getActiveSheet()->getStyle('O5')
                ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('O5')
                ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('O5')
                ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $spreadsheet->getActiveSheet()->getStyle('O5')
                ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('GESTIÓN: ');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $richText->createText(substr($dtaud[0]['aud_fhini'], 0, 4));
            $spreadsheet->getActiveSheet()->getCell('B3')->setValue($richText);
            
            $code = $dtaud[0]['eq_id'];
            $pass = false;
            $i = 6;

            foreach ($dtaud as $t) {
                if($t['eq_id'] != $code && $pass == true){
                    $code = $t['tpaud_tipo'];
                    $pass = false;
                }
                if($t['eq_id'] == $code && $pass == false){
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Equipo ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $richText->createText($t['eq_id']);
                    $spreadsheet->getActiveSheet()->getCell('A4')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Auditor líder: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    if($t['tpadr_nombre'] == "AUDITOR LIDER"){
                        $richText->createText($t['adr_apnomb']);
                    }
                    $spreadsheet->getActiveSheet()->getCell('B4')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Auditor: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    if($t['tpadr_nombre'] == "AUDITOR"){
                        $richText->createText($t['adr_apnomb'].' ');
                    }
                    $payable = $richText->createTextRun(' Observador: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    if($t['tpadr_nombre'] == "OBSERVADOR"){
                        $richText->createText($t['adr_apnomb']);
                    }
                    $spreadsheet->getActiveSheet()->getCell('C4')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Experto técnico: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    if($t['tpadr_nombre'] == "EXPERTO TECNICO"){
                        $richText->createText($t['adr_apnomb']);
                    }
                    $spreadsheet->getActiveSheet()->getCell('D4')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Fecha y hora');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('F4')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Fecha y hora');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('G4')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('No. Auditoría');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('A5')->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Proceso a auditar');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('B5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Gerencia o área');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('C5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Lugar');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('D5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Persona auditar');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('E5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('INICIO');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('F5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('FIN');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('G5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Duración (hrs.)');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('H5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Tipo documento');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('I5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Código doc.');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('J5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Descripción del documento');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('K5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Resultados de auditorías previas');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('L5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Verificación de la eficacia Aud. Previa');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('M5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Propósitos comerciales y de negocio');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('N5')->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Prioridades de la Dirección');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('O5')->setValue($richText);

                    $pass = true;
                }

                $sheet->setCellValue('A'.$i, $t['eq_fkaud']);
                $sheet->setCellValue('B'.$i, $t['fp_nombre']);
                $sheet->setCellValue('C'.$i, $t['g_nombre']);
                $sheet->setCellValue('D'.$i, $t['aud_lugar']);
                $sheet->setCellValue('E'.$i, $t['aud_responsable']);
                $sheet->setCellValue('F'.$i, $t['aud_fhini']);
                $sheet->setCellValue('G'.$i, $t['aud_fhfin']);
                $sheet->setCellValue('H'.$i, $t['aud_duracionest']);
                
                $sheet->setCellValue('I'.$i, $dtdoc[0]['dtpex_tipo']);
                $sheet->setCellValue('J'.$i, $dtdoc[0]['dex_codigo']);
                $sheet->setCellValue('K'.$i, $dtdoc[0]['dex_titulo']);

                $sheet->setCellValue('L'.$i, $t['acn_descripcion']);
                $sheet->setCellValue('M'.$i, $t['ef_resultado']);

                foreach ($dtdoc as $m) {
                    if($dtdoc[0]['dex_codigo'] != $m['dex_codigo'] && $t['eq_fkaud'] == $m['aud_id'] && $t['aud_fkarea'] == $m['aud_fkarea']){    
                        $i++;
                        $sheet->setCellValue('I'.$i, $m['dtpex_tipo']);
                        $sheet->setCellValue('J'.$i, $m['dex_codigo']);
                        $sheet->setCellValue('K'.$i, $m['dex_titulo']);
                    }                 }

                $i++;
                //echo json_encode($t['tpaud_tipo']).'<br>';
                //dd($t);
            }

            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('Fecha');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('D'.($i+4))->setValue($richText);


            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('COORDINADOR GCDO');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('A'.($i+7))->setValue($richText);
            
            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('RESPONSABLE MEDIO AMBIENTE');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('C'.($i+7))->setValue($richText);

            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('RESPONSABLE SySO');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('F'.($i+7))->setValue($richText);

            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('DIRECTOR SIG');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('K'.($i+7))->setValue($richText);

            $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
            $payable = $richText->createTextRun('GERENTE GENERAL');
            $payable->getFont()->setBold(true);
            $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
            $spreadsheet->getActiveSheet()->getCell('N'.($i+7))->setValue($richText);
            } else {
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);

                $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $payable = $richText->createTextRun('No se encontraron registros de esta gestión.');
                $payable->getFont()->setBold(true);
                $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                $spreadsheet->getActiveSheet()->getCell('B4')->setValue($richText);
            }

            
            $sheet->setTitle("GCDO-0802-01");
            
            // Create your Office 2007 Excel (XLSX Format)
            $writer = new Xlsx($spreadsheet);
            
            // In this case, we want to write the file in the public directory
            $publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            // e.g /var/www/project/public/my_first_excel_symfony4.xlsx
            $excelFilepath =  $publicDirectory . '/Auditoria_anual_'.$fecha.'.xlsx';
            
            // Create the file
            $writer->save($excelFilepath);

            // In this case, we want to write the file in the public directory
            /*$publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            $pdfFilepath =  $publicDirectory . '/Programa_anual_auditoria_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);*/

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/aud_notify", methods={"GET"}, name="aud_notify")
     */
    public function aud_notify()
    {
        try {
            //$sx = json_decode($_POST['object'], true);
            $id = 3; //$sx['id'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql  = "SELECT adq.cb_auditoria_equipo_id, tad.cb_tipo_auditoria_nombre, adq.cb_auditoria_equipo_fkauditoria, ad.cb_auditoria_fkarea,
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
                fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id AND
                ad.cb_auditoria_id=".$id;

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $dtaud = $stmt->fetchAll();

            $sql2  = "SELECT *
                    FROM cb_aud_auditoria adta,
                    (SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_gas_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
                    FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
                    WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND 
                        fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id)as docs
                    where adta.cb_auditoria_fkarea=docs.cb_gas_id AND adta.cb_auditoria_id=".$id;

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute();
            $dtdoc = $stmt2->fetchAll();

            //dd($dtaud);
            //dd($dtdoc);
            $phpWord = new PhpWord();
            
            $section = $phpWord->addSection();
            // Adding Text element to the Section having font styled by default...
            $section->addText(
                '"Learn from yesterday, live for today, hope for tomorrow. '
                . 'The important thing is not to stop questioning." '
                . '(Albert Einstein)'
            );

            // Saving the document as OOXML file...
            $objWriter = IOFactory::createWriter($phpWord, 'Word2007');

            $filePath = 'hello_world_serverfile.docx';
            // Write file into path
            $objWriter->save($filePath);
            
            // In this case, we want to write the file in the public directory
            /*$publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            // e.g /var/www/project/public/my_first_excel_symfony4.xlsx
            $excelFilepath =  $publicDirectory . '/Auditoria_anual_'.$fecha.'.xlsx';
            
            // Create the file
            $writer->save($excelFilepath);*/

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/auditoria_notif", methods={"POST"}, name="auditoria_notif")
     */
    public function auditoria_notif()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql  = "SELECT adq.cb_auditoria_equipo_id, tad.cb_tipo_auditoria_nombre, adq.cb_auditoria_equipo_fkauditoria, ad.cb_auditoria_fkarea,
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
                fp.cb_ficha_procesos_fkareagerenciasector=pga.cb_gas_id AND pga.cb_gas_fkgerencia=g.cb_gerencia_id AND
                ad.cb_auditoria_id=".$id;

            $stmt = $cx->prepare($sql);
            $stmt->execute();
            $dtaud = $stmt->fetchAll();

            $sql2  = "SELECT *
                    FROM cb_aud_auditoria adta,
                    (SELECT d.cb_documento_extra_id ,grc.cb_gas_id, (u.cb_usuario_nombre || ' ' || u.cb_usuario_apellido) AS cb_gas_responsable, d.cb_documento_extra_codigo, d.cb_documento_extra_titulo, dt.cb_doc_tipoextra_tipo, fp.cb_ficha_procesos_nombre, g.cb_gerencia_nombre
                    FROM cb_procesos_ficha_procesos fp, cb_gest_documento_extra d, cb_gestion_doctipoextra dt, cb_proc_gas grc, cb_configuracion_gerencia g, cb_usuario_usuario u
                    WHERE grc.cb_gas_id=fp.cb_ficha_procesos_fkareagerenciasector AND grc.cb_gas_fkgerencia=g.cb_gerencia_id AND u.cb_usuario_id=grc.cb_gas_fkresponsable AND
                        fp.cb_ficha_procesos_id=d.cb_documento_extra_fkproceso AND d.cb_documento_extra_fktipo=dt.cb_doc_tipoextra_id)AS docs
                    WHERE adta.cb_auditoria_fkarea=docs.cb_gas_id AND adta.cb_auditoria_id=".$id;

            $stmt2 = $cx->prepare($sql2);
            $stmt2->execute();
            $dtdoc = $stmt2->fetchAll();

            //dd($dtaud);

            $html =$this->renderView('reporting/notificacionaud.html.twig', array('objects' => $dtaud, 'docs' => $dtdoc));

            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Store PDF Binary Data
            $output = $dompdf->output();
            
            // In this case, we want to write the file in the public directory
            $publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            $pdfFilepath =  $publicDirectory . '/Notificacion_auditoria_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/auditoria_rep", methods={"POST"}, name="auditoria_rep")
     */
    public function auditoria_rep()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sqlp = "SELECT DISTINCT(cb_ficha_procesos_nombre), cb_gerencia_nombre, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
            FROM cb_aud_auditoria, cb_proc_gas, cb_procesos_ficha_procesos, cb_configuracion_gerencia, cb_aud_tipo_auditoria
            WHERE cb_auditoria_fkarea=cb_gas_id AND cb_ficha_procesos_fkareagerenciasector=cb_gas_id AND
                cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_gas_fkarea=cb_gerencia_id AND cb_auditoria_id=:id";

            $stmt = $cx->prepare($sqlp);
            $stmt->execute(['id' => $id]);
            $dtproc = $stmt->fetchAll();

            $sqleq = "SELECT cb_aud_auditoria_equipo.*, cb_tipo_auditor_nombre, cb_auditor_apellidosnombres, cb_aud_auditoria.*
                FROM cb_aud_auditoria, cb_aud_auditoria_equipo, cb_aud_tipo_auditor, cb_aud_auditor
                WHERE cb_auditoria_id=cb_auditoria_equipo_fkauditoria AND cb_tipo_auditor_id=cb_auditoria_equipo_fktipo AND
                    cb_auditor_id=cb_auditoria_equipo_fkauditor AND cb_auditoria_id=:id";

            $stmteq = $cx->prepare($sqleq);
            $stmteq->execute(['id' => $id]);
            $dtequ = $stmteq->fetchAll();

            $sqldoc = "SELECT DISTINCT(cb_documento_extra_codigo), cb_documento_extra_titulo, cb_doc_tipoextra_tipo, cb_aud_auditoria.*
                FROM cb_aud_auditoria, cb_proc_gas, cb_procesos_ficha_procesos, cb_gest_documento_extra, cb_gestion_doctipoextra
                WHERE cb_auditoria_fkarea=cb_gas_id AND cb_gas_id=cb_ficha_procesos_fkareagerenciasector AND
                    cb_ficha_procesos_id=cb_documento_extra_fkproceso AND cb_documento_extra_fktipo=cb_doc_tipoextra_id AND cb_auditoria_id=:id";

            $stmtdoc = $cx->prepare($sqldoc);
            $stmtdoc->execute(['id' => $id]);
            $dtdoc = $stmtdoc->fetchAll();

            $sqlfrt= "SELECT cb_aud_fortaleza.*, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
                FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_aud_fortaleza
                WHERE cb_auditoria_id=cb_fortaleza_fkauditoria AND cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_auditoria_id=:id";

            $stmtfrt = $cx->prepare($sqlfrt);
            $stmtfrt->execute(['id' => $id]);
            $dtfrt = $stmtfrt->fetchAll();

            $sqlhlg = "SELECT DISTINCT(cb_hallazgo_id), cb_auditoria_id, cb_hallazgo_descripcion, cb_tipo_hallazgo_nombre, cb_accion_descripcion, cb_accion_eficacia_resultado, cb_accion_eficacia_fecha, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
                FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo, cb_aud_accion, cb_aud_accion_eficacia
                WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_id=cb_accion_fkhallazgo AND cb_accion_id=cb_accion_eficacia_fkaccion
                    AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_auditoria_id=:id
                ORDER BY 2, 1";

            $stmthlg= $cx->prepare($sqlhlg);
            $stmthlg->execute(['id' => $id]);
            $dthlg = $stmthlg->fetchAll();

            //dd($dtaud);

            $html = $this->renderView('reporting/auditoriaint.html.twig', array('objects' => $dtproc, 'team' => $dtequ, 'docs' => $dtdoc, 'fort' => $dtfrt, 'hlzg' => $dthlg));
         
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);

            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Store PDF Binary Data
            $output = $dompdf->output();
            
            // In this case, we want to write the file in the public directory
            $publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            $pdfFilepath =  $publicDirectory . '/Auditoria_interna_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accion_verif", methods={"POST"}, name="accion_verif")
     */
    public function accion_verif()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            
            $cx = $this->getDoctrine()->getManager()->getConnection();
            $sql = "SELECT DISTINCT(cb_hallazgo_id), cb_auditoria_id, cb_hallazgo_descripcion, cb_tipo_hallazgo_nombre, cb_accion_id, cb_accion_descripcion, cb_aud_accion_eficacia.*, cb_tipo_auditoria_nombre, cb_aud_auditoria.*
                FROM cb_aud_auditoria, cb_aud_tipo_auditoria, cb_aud_hallazgo, cb_aud_tipo_hallazgo, cb_aud_accion, cb_aud_accion_eficacia
                WHERE cb_auditoria_id=cb_hallazgo_fkauditoria AND cb_hallazgo_id=cb_accion_fkhallazgo AND cb_accion_id=cb_accion_eficacia_fkaccion
                    AND cb_hallazgo_fktipo=cb_tipo_hallazgo_id AND cb_auditoria_fktipo=cb_tipo_auditoria_id AND cb_accion_id=:id
                ORDER BY 2, 1";

            $stmt = $cx->prepare($sql);
            $stmt->execute(['id' => $id]);
            $dtef = $stmt->fetchAll();

            $html = $this->renderView('reporting/verificacionef.html.twig', array('objects' => $dtef));
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);

            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Store PDF Binary Data
            $output = $dompdf->output();
            
            // In this case, we want to write the file in the public directory
            $publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            $pdfFilepath =  $publicDirectory . '/Eficacia_accion_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.');
            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
