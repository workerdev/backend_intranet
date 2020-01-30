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
use App\Entity\DocProcRevision;
use App\Entity\DocumentoProceso;
use App\Entity\Auditoria;
use App\Entity\AuditoriaEquipo;
use App\Entity\Documento;
use App\Entity\SectorAudit;
use App\Entity\DocumentoAudit;
use App\Entity\Fortaleza;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\TipoAccion;
use App\Entity\AccionSeguimiento;
use App\Entity\AccionReprograma;
use App\Entity\AccionEficacia;
use App\Entity\FichaProcesos;


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
     * @Route("/aud_anual", methods={"POST"}, name="aud_anual")
     */
    public function aud_anual()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $anio = $sx['anio'];

            $auditorias = $this->getDoctrine()->getRepository(Auditoria::class)->findAllByYear($anio);

            $dtauditoria = [];
            if (!empty($auditorias)) {
                foreach ($auditorias as $aud) {
                    $fkproceso = $this->getDoctrine()->getRepository(FichaProcesos::class)->findOneBy(['id' => $aud['fkproceso'], 'estado' => '1']);
                    $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(['fkauditoria' => $aud['id'], 'estado' => '1']);
                    $sector = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $aud['id']], ['id' => 'ASC']);
                    $documentsadd = $this->getDoctrine()->getRepository(DocumentoAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $aud['id']], ['id' => 'ASC']);

                    if ($aud['fkproceso'] != null) {
                        $documentos = $this->getDoctrine()->getRepository(Documento::class)->findDocByProc($aud['fkproceso']);
                    }
                    else $documentos = [];

                    $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['estado' => '1', 'fkauditoria' => $aud['id']], ['fecharegistro' => 'ASC', 'titulo' => 'ASC']);

                    $dthallazgo = [];
                    if ($hallazgos != null) {
                        foreach ($hallazgos as $hlg) {
                            $fecreg = $hlg->getFecharegistro();
                            if ($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                            
                            $itemhlg = [
                                "id" => $hlg->getId(),
                                "fkauditoria" => $hlg->getFkauditoria(),
                                "fktipo" => $hlg->getFktipo(),
                                "ordinal" => $hlg->getOrdinal(),
                                "titulo" => $hlg->getTitulo(),
                                "descripcion" => $hlg->getDescripcion(),
                                "evidencia" => $hlg->getEvidencia(),
                                "documento" => $hlg->getDocumento(),
                                "puntoiso" => $hlg->getPuntoiso(),
                                "fkimpacto" => $hlg->getFkimpacto(),
                                "fkprobabilidad" => $hlg->getFkprobabilidad(),
                                "analisiscausaraiz" => $hlg->getAnalisiscausaraiz(),
                                "recomendaciones" => $hlg->getRecomendaciones(),
                                "cargoauditado" => $hlg->getCargoauditado(),
                                "nombreauditado" => $hlg->getNombreauditado(),
                                "responsable" => $hlg->getResponsable(),
                                "fecharegistro" => $rsfcr
                            ];
                            
                            $acciones = $this->getDoctrine()->getRepository(Accion::class)->findBy(['estado' => '1', 'fkhallazgo' => $hlg->getId()], ['fechaimplementacion' => 'ASC']);
                            $dtaccion = [];
                            if ($acciones != null) {
                                foreach ($acciones as $acn) {
                                    $fecimp = $acn->getFechaimplementacion();
                                    $fecreg = $acn->getFecharegistro();

                                    if($fecimp != null) $rsfci = $fecimp->format('Y-m-d'); else $rsfci = $fecimp;
                                    if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                                
                                    $itemacn = [
                                        "id" => $acn->getId(),
                                        "fkhallazgo" => $acn->getFkhallazgo(),
                                        "ordinal" => $acn->getOrdinal(),
                                        "descripcion" => $acn->getDescripcion(),
                                        "fechaimplementacion" => $rsfci,
                                        "responsableimplementacion" => $acn->getResponsableimplementacion(),
                                        "estadoaccion" => $acn->getEstadoaccion(),
                                        "responsableregistro" => $acn->getResponsableregistro(),
                                        "fecharegistro" => $rsfcr,
                                        "fktipo" => $acn->getFktipo()
                                    ];

                                    $verificaciones = $this->getDoctrine()->getRepository(AccionEficacia::class)->findBy(['fkaccion' => $acn->getId(), 'estado' => '1'], ['fecha' => 'ASC']);
                                    
                                    $dteficacia = [];
                                    if ($verificaciones != null) {
                                        foreach ($verificaciones as $efc) {
                                            $fec = $efc->getFecha();
                                            if($fec != null) $rsfc = $fec->format('Y-m-d'); else $rsfc = $fec;
                                            
                                            $itemvrf = [
                                                "id" => $efc->getId(),
                                                "fkaccion" => $efc->getFkaccion(),
                                                "eficaz" => $efc->getEficaz(),
                                                "resultado" => $efc->getResultado(),
                                                "fecha" => $rsfc,
                                                "responsable" => $efc->getResponsable(),
                                                "nombreverificador" => $efc->getNombreverificador(),
                                                "cargoverificador" => $efc->getCargoverificador()
                                            ];
                                            $dteficacia[] = $itemvrf;
                                        }
                                    }
                                    $dtaccion[] = ['itemacn' => $itemacn, 'eficacia' => $dteficacia];
                                }
                            }
                            
                            $dthallazgo[] = ['itemhlg' =>  $itemhlg, 'accion' =>  $dtaccion];
                        }
                    }

                    $eq_auditor = [];
                    $eq_lider = [];
                    $eq_experto = [];
                    $eq_observador = [];
                    if ($equipo != null) {
                        foreach ($equipo as $eqp) {
                            if ($eqp->getFktipo() != null) {
                                if (strtoupper($eqp->getFktipo()->getNombre()) == 'AUDITOR') $eq_auditor[] = $eqp;
                                if (strtoupper($eqp->getFktipo()->getNombre()) == 'AUDITOR LIDER') $eq_lider[] = $eqp;
                                if (strtoupper($eqp->getFktipo()->getNombre()) == 'EXPERTO TECNICO') $eq_experto[] = $eqp;
                                if (strtoupper($eqp->getFktipo()->getNombre()) == 'OBSERVADOR') $eq_observador[] = $eqp;
                            }
                        }
                    }

                    $dtauditoria[] = [
                        'itemaud' =>  $aud, 'hallazgo' =>  $dthallazgo, 'sector' => $sector, 'docs' => $documentos, 'docsadd' => $documentsadd, 
                        'auditor' => $eq_auditor, 'lider' => $eq_lider, 'experto' => $eq_experto, 'observador' => $eq_observador, 'proceso' => $fkproceso
                    ];
                }
            }
            
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


            if (sizeof($dtauditoria) > 0) {
                $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                $payable = $richText->createTextRun('GESTIÓN: ');
                $payable->getFont()->setBold(true);
                $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                $richText->createText($anio);
                $spreadsheet->getActiveSheet()->getCell('B3')->setValue($richText);
                $i = 4;


                foreach ($dtauditoria as $t) {
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

                    $spreadsheet->getActiveSheet()->getStyle('A'.$i)
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A'.$i)
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A'.$i)
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A'.$i)
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('B'.$i)
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i)
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i)
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B'.$i)
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('C'.$i)
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$i)
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$i)
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C'.$i)
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('D'.$i)
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$i)
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$i)
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$i)
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('F'.$i)
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F'.$i)
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F'.$i)
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F'.$i)
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('G'.$i)
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('G'.$i)
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('G'.$i)
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('G'.$i)
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);



                    $spreadsheet->getActiveSheet()->getStyle('A'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('A'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('B'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('B'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('C'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('C'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('D'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('E'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('E'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('E'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('E'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('F'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('F'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('G'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('G'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('H'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('H'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('H'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('H'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('I'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('I'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('I'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('I'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('J'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('J'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('J'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('J'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('K'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('K'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('K'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('K'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('L'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('L'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('L'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('L'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('M'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('M'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('M'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('M'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('N'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('N'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('N'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('N'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                    $spreadsheet->getActiveSheet()->getStyle('O'.($i+1))
                        ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('O'.($i+1))
                        ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('O'.($i+1))
                        ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('O'.($i+1))
                        ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);


                
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Equipo ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));

                    if ($t['itemaud']['id'] != '' && $t['itemaud']['id'] != null) $clteam = (int)$t['itemaud']['id'];
                    else $clteam = 0;

                    $richText->createText($clteam);
                    $spreadsheet->getActiveSheet()->getCell('A'.$i)->setValue($richText);
                    $spreadsheet->getActiveSheet()->getStyle('A'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Auditor líder: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
     
                    $str_lider = '';
                    if (!empty($t['lider'])) {
                        $firstldr = true;
                        foreach ($t['lider'] as $ldr) {
                            if (!$firstldr) $str_lider = $str_lider.' - ';
                            else $firstldr = false;
                            $str_lider = $str_lider.$ldr->getFkauditor()->getNombres().' '.$ldr->getFkauditor()->getPaterno().' '.$ldr->getFkauditor()->getMaterno();
                        }
                    }
                    $richText->createText($str_lider);
                    $spreadsheet->getActiveSheet()->getCell('B'.$i)->setValue($richText);


                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Auditor: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    
                    $str_auditor = '';
                    if (!empty($t['auditor'])) {
                        $firstadtr = true;
                        foreach ($t['auditor'] as $adtr) {
                            if (!$firstadtr) $str_auditor = $str_auditor.' - ';
                            else $firstadtr = false;
                            $str_auditor = $str_auditor.$adtr->getFkauditor()->getNombres().' '.$adtr->getFkauditor()->getPaterno().' '.$adtr->getFkauditor()->getMaterno();
                        }
                    }
                    $richText->createText($str_auditor);


                    $payable = $richText->createTextRun(' Observador: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    
                    $str_observador = '';
                    if (!empty($t['observador'])) {
                        $firstobs = true;
                        foreach ($t['observador'] as $obs) {
                            if (!$firstobs) $str_observador = $str_observador.' - ';
                            else $firstobs = false;
                            $str_observador = $str_observador.$obs->getFkauditor()->getNombres().' '.$obs->getFkauditor()->getPaterno().' '.$obs->getFkauditor()->getMaterno();
                        }
                    }
                    $richText->createText($str_observador);
                    
                    $spreadsheet->getActiveSheet()->getCell('C'.$i)->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Experto técnico: ');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    
                    $str_experto = '';
                    if (!empty($t['experto'])) {
                        $firstexp = true;
                        foreach ($t['experto'] as $exp) {
                            if (!$firstexp) $str_experto = $str_experto.' - ';
                            else $firstexp = false;
                            $str_experto = $str_experto.$exp->getFkauditor()->getNombres().' '.$exp->getFkauditor()->getPaterno().' '.$exp->getFkauditor()->getMaterno();
                        }
                    }
                    $richText->createText($str_experto);

                    $spreadsheet->getActiveSheet()->getCell('D'.$i)->setValue($richText);


                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Fecha y hora');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('F'.$i)->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Fecha y hora');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('G'.$i)->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('No. Auditoría');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('A'.($i+1))->setValue($richText);

                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Proceso a auditar');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('B'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Gerencia o área');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('C'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Lugar');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('D'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Persona auditar');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('E'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('INICIO');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('F'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('FIN');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('G'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Duración (hrs.)');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    
                    $spreadsheet->getActiveSheet()->getCell('H'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Tipo documento');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('I'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Código doc.');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('J'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Descripción del documento');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('K'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Resultados de auditorías previas');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('L'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Verificación de la eficacia Aud. Previa');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('M'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Propósitos comerciales y de negocio');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('N'.($i+1))->setValue($richText);
                    
                    $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                    $payable = $richText->createTextRun('Prioridades de la Dirección');
                    $payable->getFont()->setBold(true);
                    $payable->getFont()->setColor( new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));
                    $spreadsheet->getActiveSheet()->getCell('O'.($i+1))->setValue($richText);

                    

                    $i = $i + 2;
                    $sheet->setCellValue('A'.$i, $t['itemaud']['id']);

                    if ($t['proceso'] != null) $dtproc = $t['proceso']->getNombre();
                    else $dtproc = '';  

                    $sheet->setCellValue('B'.$i, $dtproc);

                    $str_gerencia = '';
                    $gerencias = [];
                    if (!empty($t['sector'])) {
                        $firstgr = true;
                        foreach ($t['sector'] as $sctr) {
                            if (!in_array($sctr->getFkgas()->getFkgerencia()->getId(), $gerencias)) {
                                if (!$firstgr) $str_gerencia = $str_gerencia.' - ';
                                else $firstgr = false;

                                $str_gerencia = $str_gerencia.$sctr->getFkgas()->getFkgerencia()->getNombre();
                                $gerencias[] = $sctr->getFkgas()->getFkgerencia()->getId();
                            } 
                        }
                    }

                    $sheet->setCellValue('C'.$i, $str_gerencia);

                    $sheet->setCellValue('D'.$i, $t['itemaud']['lugar']);
                    $sheet->setCellValue('E'.$i, '');
                    $sheet->setCellValue('F'.$i, $t['itemaud']['fechahorainicio']);
                    $sheet->setCellValue('G'.$i, $t['itemaud']['fechahorafin']);

                    if ($t['itemaud']['duracionestimada'] != '' && $t['itemaud']['duracionestimada'] != null) $clduration = (int)$t['itemaud']['duracionestimada'];
                    else $clduration = 0;

                    $sheet->setCellValue('H'.$i, $clduration);
                    $spreadsheet->getActiveSheet()->getStyle('H'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER);

                    $k = $i - 1;
                    if (!empty($t['docs'])){
                        foreach ($t['docs'] as $dc) {
                            $k++;
                            $sheet->setCellValue('I'.$k, $dc['tipo']);
                            $sheet->setCellValue('J'.$k, $dc['codigo']);
                            $sheet->setCellValue('K'.$k, $dc['titulo']);
                        }
                    }
                    if (!empty($t['docsadd'])){
                        foreach ($t['docsadd'] as $dca) {
                            $k++;
                            $sheet->setCellValue('I'.$k, $dca->getFkdocumento()->getFktipo()->getNombre());
                            $sheet->setCellValue('J'.$k, $dca->getFkdocumento()->getCodigo());
                            $sheet->setCellValue('K'.$k, $dca->getFkdocumento()->getTitulo());
                        }
                    }

                    $n = $i - 1;
                    if (!empty($t['hallazgo'])) {
                        foreach ($t['hallazgo'] as $hlg) {
                            if (!empty($hlg['accion'])) {
                                foreach ($hlg['accion'] as $acn) {
                                    if (!empty($acn['eficacia'])) {
                                        foreach ($acn['eficacia'] as $efc) {
                                            $n++;
                                            $sheet->setCellValue('L'.$n, $efc['resultado']);
                                            $sheet->setCellValue('M'.$n, $efc['eficaz']);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if ($k > $n) $i = $k + 3;
                    else $i = $n + 3;
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
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/Auditoria_anual_'.$fecha.'.xlsx');
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

            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);
            $fecpro = $auditoria->getFechaprogramada();
            $fecini = $auditoria->getFechahorainicio();
            $fecfin = $auditoria->getFechahorafin();
            $fecreg = $auditoria->getFecharegistro();
            if($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = $fecpro;
            if($fecini != null) $rsfci = $fecini->format('Y-m-d H:i'); else $rsfci = $fecini;
            if($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:i'); else $rsfcf = $fecfin;
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');  else $rsfcr = $fecreg;
            
            $sendinf = [
                "id" => $auditoria->getId(),
                "codigo" => $auditoria->getCodigo(),
                "fkproceso" => $auditoria->getFkproceso(),
                "fktipo" => $auditoria->getFktipo(),
                "fkgerente" => $auditoria->getFkgerente(),
                "fkjefe" => $auditoria->getFkjefe(),
                "fechaprogramada" => $rsfcp,
                "duracionestimada" => $auditoria->getDuracionestimada(),
                "lugar" => $auditoria->getLugar(),
                "alcance" => $auditoria->getAlcance(),
                "objetivos" => $auditoria->getObjetivos(),
                "fechahorainicio" => $rsfci,
                "fechahorafin" => $rsfcf,
                "conclusiones" => $auditoria->getConclusiones(),
                "fecharegistro" => $rsfcr
            ];
            
            if($auditoria->getFkproceso() != null){
                $documentos = $this->getDoctrine()->getRepository(Documento::class)->findDocByProc($auditoria->getFkproceso()->getId());
            }
            else $documentos = [];

            $sector = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'ASC']);
            $documentsadd = $this->getDoctrine()->getRepository(DocumentoAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'ASC']);
            $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(['fkauditoria' => $id, 'estado' => '1']);

            $html =$this->renderView('reporting/notificacionaud.html.twig', array('auditoria' => $sendinf, 'team' => $equipo, 'docs' => $documentos, 'sector' => $sector, 'docsadd' => $documentsadd));

            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            $dompdf->set_option('isHtml5ParserEnabled', true);
            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('Letter', 'portrait');

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
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/Notificacion_auditoria_'.$fecha.'.pdf');
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
            
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);
            $fecpro = $auditoria->getFechaprogramada();
            $fecini = $auditoria->getFechahorainicio();
            $fecfin = $auditoria->getFechahorafin();
            $fecreg = $auditoria->getFecharegistro();
            if($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = $fecpro;
            if($fecini != null) $rsfci = $fecini->format('Y-m-d H:i'); else $rsfci = $fecini;
            if($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:i'); else $rsfcf = $fecfin;
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');  else $rsfcr = $fecreg;
            
            $sendinf = [
                "id" => $auditoria->getId(),
                "codigo" => $auditoria->getCodigo(),
                "fkproceso" => $auditoria->getFkproceso(),
                "fktipo" => $auditoria->getFktipo(),
                "fkgerente" => $auditoria->getFkgerente(),
                "fkjefe" => $auditoria->getFkjefe(),
                "fechaprogramada" => $rsfcp,
                "duracionestimada" => $auditoria->getDuracionestimada(),
                "lugar" => $auditoria->getLugar(),
                "alcance" => $auditoria->getAlcance(),
                "objetivos" => $auditoria->getObjetivos(),
                "fechahorainicio" => $rsfci,
                "fechahorafin" => $rsfcf,
                "conclusiones" => $auditoria->getConclusiones(),
                "fecharegistro" => $rsfcr
            ];
            
            if($auditoria->getFkproceso() != null){
                $documentos = $this->getDoctrine()->getRepository(Documento::class)->findDocByProc($auditoria->getFkproceso()->getId());
            }
            else $documentos = [];

            $sector = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'ASC']);
            $documentsadd = $this->getDoctrine()->getRepository(DocumentoAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'ASC']);
            $equipo = $this->getDoctrine()->getRepository(AuditoriaEquipo::class)->findBy(['fkauditoria' => $id, 'estado' => '1']);

            $fortalezas = $this->getDoctrine()->getRepository(Fortaleza::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'DESC']);

            $datafrt = [];
            foreach ($fortalezas as $fort) {
                $fortaleza = (object) $fort;
                $fecreg = $fortaleza->getFecharegistro();
                if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                
                $info = [
                    "id" => $fortaleza->getId(),
                    "fkauditoria" => $fortaleza->getFkauditoria(),
                    "ordinal" => $fortaleza->getOrdinal(),
                    "descripcion" => $fortaleza->getDescripcion(),
                    "responsable" => $fortaleza->getResponsable(),
                    "fecharegistro" => $rsfcr
                ];
                $datafrt[] = $info;
            } 

            $hallazgos = $this->getDoctrine()->getRepository(Hallazgo::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'DESC']);

            $datahlg = [];
            foreach ($hallazgos as $hlg) {
                $hallazgo = (object) $hlg;
                $fecreg = $hallazgo->getFecharegistro();
                if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                
                $info = [
                    "id" => $hallazgo->getId(),
                    "fkauditoria" => $hallazgo->getFkauditoria(),
                    "fktipo" => $hallazgo->getFktipo(),
                    "ordinal" => $hallazgo->getOrdinal(),
                    "titulo" => $hallazgo->getTitulo(),
                    "descripcion" => $hallazgo->getDescripcion(),
                    "evidencia" => $hallazgo->getEvidencia(),
                    "documento" => $hallazgo->getDocumento(),
                    "puntoiso" => $hallazgo->getPuntoiso(),
                    "fkimpacto" => $hallazgo->getFkimpacto(),
                    "fkprobabilidad" => $hallazgo->getFkprobabilidad(),
                    "analisiscausaraiz" => $hallazgo->getAnalisiscausaraiz(),
                    "recomendaciones" => $hallazgo->getRecomendaciones(),
                    "cargoauditado" => $hallazgo->getCargoauditado(),
                    "nombreauditado" => $hallazgo->getNombreauditado(),
                    "responsable" => $hallazgo->getResponsable(),
                    "fecharegistro" => $rsfcr
                ];
                $datahlg[] = $info;
            }     

            $html = $this->renderView('reporting/auditoriaint.html.twig', array('auditoria' => $sendinf, 'team' => $equipo, 'docs' => $documentos, 'sector' => $sector, 'docsadd' => $documentsadd, 'fort' => $datafrt, 'hlg' => $datahlg));
         
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            $dompdf->set_option('isHtml5ParserEnabled', true);

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
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/Auditoria_interna_'.$fecha.'.pdf');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/accion_correctiva", methods={"POST"}, name="accion_correctiva")
     */
    public function accion_correctiva()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $idh = $sx['id'];
            
            $dthallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($idh);
            $id = $dthallazgo->getFkauditoria()->getId();
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);
            $fecpro = $auditoria->getFechaprogramada();
            $fecini = $auditoria->getFechahorainicio();
            $fecfin = $auditoria->getFechahorafin();
            $fecreg = $auditoria->getFecharegistro();
            if($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = $fecpro;
            if($fecini != null) $rsfci = $fecini->format('Y-m-d H:i'); else $rsfci = $fecini;
            if($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:i'); else $rsfcf = $fecfin;
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');  else $rsfcr = $fecreg;
            
            $auditoriadt = [
                "id" => $auditoria->getId(),
                "codigo" => $auditoria->getCodigo(),
                "fkproceso" => $auditoria->getFkproceso(),
                "fktipo" => $auditoria->getFktipo(),
                "fkgerente" => $auditoria->getFkgerente(),
                "fkjefe" => $auditoria->getFkjefe(),
                "fechaprogramada" => $rsfcp,
                "duracionestimada" => $auditoria->getDuracionestimada(),
                "lugar" => $auditoria->getLugar(),
                "alcance" => $auditoria->getAlcance(),
                "objetivos" => $auditoria->getObjetivos(),
                "fechahorainicio" => $rsfci,
                "fechahorafin" => $rsfcf,
                "conclusiones" => $auditoria->getConclusiones(),
                "fecharegistro" => $rsfcr
            ];

            $sector = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'ASC']);
            
            $acn_inmediata = [];
            $acn_correctiva = [];
            $acciones = $this->getDoctrine()->getRepository(Accion::class)->findBy(['estado' => '1', 'fkhallazgo' => $idh], ['fechaimplementacion' => 'ASC']);
            if ($acciones != null){
                foreach ($acciones as $acn) {
                    $fecimp = $acn->getFechaimplementacion();
                    $fecreg = $acn->getFecharegistro();

                    if($fecimp != null) $rsfci = $fecimp->format('Y-m-d'); else $rsfci = $fecimp;
                    if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
                
                    $acndt = [
                        "id" => $acn->getId(),
                        "fkhallazgo" => $acn->getFkhallazgo(),
                        "ordinal" => $acn->getOrdinal(),
                        "descripcion" => $acn->getDescripcion(),
                        "fechaimplementacion" => $rsfci,
                        "responsableimplementacion" => $acn->getResponsableimplementacion(),
                        "estadoaccion" => $acn->getEstadoaccion(),
                        "responsableregistro" => $acn->getResponsableregistro(),
                        "fecharegistro" => $rsfcr,
                        "fktipo" => $acn->getFktipo()
                    ];

                    if ($acn->getFktipo() != null){
                        $tipo = $this->getDoctrine()->getRepository(TipoAccion::class)->findOneBy(['estado' => '1', 'nombre' => 'Correción']);

                        if ($tipo != null){
                            if ($acn->getFktipo()->getId() == $tipo->getId()) $acn_inmediata[] = $acndt;
                            else $acn_correctiva[] = $acndt;
                        } else {
                            $acn_correctiva[] = $acndt;
                        }
                    }
                }
            }

            $html = $this->renderView('reporting/acncorrectiva.html.twig', array('auditoria' => $auditoriadt, 'sector' => $sector, 'hallazgo' => $dthallazgo, 'acn_inmediata' => $acn_inmediata, 'acn_correctiva' => $acn_correctiva));
         
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            $dompdf->set_option('isHtml5ParserEnabled', true);

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
            $pdfFilepath =  $publicDirectory . '/Acciones_correctivas_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');

            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/Acciones_correctivas_'.$fecha.'.pdf');
            $resultado = json_encode($resultado);

            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    /**
     * @Route("/seguimiento_accion", methods={"POST"}, name="seguimiento_accion")
     */
    public function seguimiento_accion()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $ida = $sx['id'];
            
            $dtaccion = $this->getDoctrine()->getRepository(Accion::class)->find($ida);
            $idh = $dtaccion->getFkhallazgo()->getId();
            $dthallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($idh);
            $id = $dthallazgo->getFkauditoria()->getId();
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);

            $fecpro = $auditoria->getFechaprogramada();
            $fecini = $auditoria->getFechahorainicio();
            $fecfin = $auditoria->getFechahorafin();
            $fecreg = $auditoria->getFecharegistro();
            if($fecpro != null) $rsfcp = $fecpro->format('Y-m-d');  else $rsfcp = $fecpro;
            if($fecini != null) $rsfci = $fecini->format('Y-m-d H:i'); else $rsfci = $fecini;
            if($fecfin != null) $rsfcf = $fecfin->format('Y-m-d H:i'); else $rsfcf = $fecfin;
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d');  else $rsfcr = $fecreg;
            
            $auditoriadt = [
                "id" => $auditoria->getId(),
                "codigo" => $auditoria->getCodigo(),
                "fkproceso" => $auditoria->getFkproceso(),
                "fktipo" => $auditoria->getFktipo(),
                "fkgerente" => $auditoria->getFkgerente(),
                "fkjefe" => $auditoria->getFkjefe(),
                "fechaprogramada" => $rsfcp,
                "duracionestimada" => $auditoria->getDuracionestimada(),
                "lugar" => $auditoria->getLugar(),
                "alcance" => $auditoria->getAlcance(),
                "objetivos" => $auditoria->getObjetivos(),
                "fechahorainicio" => $rsfci,
                "fechahorafin" => $rsfcf,
                "conclusiones" => $auditoria->getConclusiones(),
                "fecharegistro" => $rsfcr
            ];

            $sector = $this->getDoctrine()->getRepository(SectorAudit::class)->findBy(['estado' => '1', 'fkauditoria' => $id], ['id' => 'ASC']);
            
            $fecimp = $dtaccion->getFechaimplementacion();
            $fecreg = $dtaccion->getFecharegistro();

            if($fecimp != null) $rsfci = $fecimp->format('Y-m-d'); else $rsfci = $fecimp;
            if($fecreg != null) $rsfcr = $fecreg->format('Y-m-d'); else $rsfcr = $fecreg;
        
            $acndt = [
                "id" => $dtaccion->getId(),
                "fkhallazgo" => $dtaccion->getFkhallazgo(),
                "ordinal" => $dtaccion->getOrdinal(),
                "descripcion" => $dtaccion->getDescripcion(),
                "fechaimplementacion" => $rsfci,
                "responsableimplementacion" => $dtaccion->getResponsableimplementacion(),
                "estadoaccion" => $dtaccion->getEstadoaccion(),
                "responsableregistro" => $dtaccion->getResponsableregistro(),
                "fecharegistro" => $rsfcr,
                "fktipo" => $dtaccion->getFktipo()
            ];
            $acndt;

            $seguimientos = $this->getDoctrine()->getRepository(AccionSeguimiento::class)->findBy(['estado' => '1', 'fkaccion' => $ida], ['fecha' => 'ASC']);
            $dataseg = [];
            if($seguimientos != null){
                foreach ($seguimientos as $acn_seg) {
                    $fec = $acn_seg->getFecha();
                    if($fec != null) $rsfc = $fec->format('Y-m-d'); else $rsfc = $fec;
            
                    $infseg = [
                        "id" => $acn_seg->getId(),
                        "fkaccion" => $acn_seg->getFkaccion(),
                        "ordinal" => $acn_seg->getOrdinal(),
                        "fecha" => $rsfc,
                        "responsable" => $acn_seg->getResponsable(),
                        "observaciones" => $acn_seg->getObservaciones(),
                        "estadoseguimiento" => $acn_seg->getEstadoseguimiento()
                    ];
                    $dataseg[] = $infseg;
                }
            }

            $reprogramas = $this->getDoctrine()->getRepository(AccionReprograma::class)->findBy(['estado' => '1', 'fkaccion' => $ida], ['fecharegistro' => 'ASC']);
            $datarep = [];
            if($reprogramas != null){
                foreach ($reprogramas as $acn_rep) {
                    $fecant = $acn_rep->getFechaanterior();
                    $rsfca = $fecant->format('Y-m-d');
                    $fecimp = $acn_rep->getFechaimplementacion();
                    $rsfci = $fecimp->format('Y-m-d');
                    $fecreg = $acn_rep->getFecharegistro();
                    $rsfcr = $fecreg->format('Y-m-d');
                    
                    $infrep = [
                        "id" => $acn_rep->getId(),
                        "fkaccion" => $acn_rep->getFkaccion(),
                        "fechaanterior" => $rsfca,
                        "fechaimplementacion" => $rsfci,
                        "motivojustificacion" => $acn_rep->getMotivojustificacion(),
                        "autoriza" => $acn_rep->getAutoriza(),
                        "responsableregistro" => $acn_rep->getResponsableregistro(),
                        "fecharegistro" => $rsfcr
                    ];
                    $datarep[] = $infrep;
                }
            }

            $html = $this->renderView('reporting/seguimientoacn.html.twig', array('auditoria' => $auditoriadt, 'sector' => $sector, 'hallazgo' => $dthallazgo, 'accion' => $acndt, 'seguimientos' => $dataseg, 'reprogramas' => $datarep));
         
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            $dompdf->set_option('isHtml5ParserEnabled', true);

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
            $pdfFilepath =  $publicDirectory . '/Seguimiento_accion_'.$fecha.'.pdf';
            
            // Write file to the desired path
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('File guardado!', 'json');

            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/Seguimiento_accion_'.$fecha.'.pdf');
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
            $ida = $sx['id'];
            
            $dtaccion = $this->getDoctrine()->getRepository(Accion::class)->find($ida);
            $idh = $dtaccion->getFkhallazgo()->getId();
            $dthallazgo = $this->getDoctrine()->getRepository(Hallazgo::class)->find($idh);
            $id = $dthallazgo->getFkauditoria()->getId();
            $auditoria = $this->getDoctrine()->getRepository(Auditoria::class)->find($id);

            $acn_eficacia = $this->getDoctrine()->getRepository(AccionEficacia::class)->findOneBy(['estado' => '1', 'fkaccion' => $ida]);
            $fec = $acn_eficacia->getFecha();
            if($fec != null) $rsfc = $fec->format('Y-m-d'); else $rsfc = $fec;
            
            $dteficacia = [
                "id" => $acn_eficacia->getId(),
                "fkaccion" => $acn_eficacia->getFkaccion(),
                "eficaz" => $acn_eficacia->getEficaz(),
                "resultado" => $acn_eficacia->getResultado(),
                "fecha" => $rsfc,
                "responsable" => $acn_eficacia->getResponsable(),
                "nombreverificador" => $acn_eficacia->getNombreverificador(),
                "cargoverificador" => $acn_eficacia->getCargoverificador()
            ];

            $html = $this->renderView('reporting/verificacionef.html.twig', array('auditoria' => $auditoria, 'hallazgo' => $dthallazgo, 'accion' => $dtaccion, 'eficacia' => $dteficacia));
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            $dompdf->set_option('isHtml5ParserEnabled', true);

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
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/Eficacia_accion_'.$fecha.'.pdf');

            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
    
    /**
     * @Route("/docproceso_reporte", methods={"POST"}, name="docproceso_reporte")
     */
    public function reporte()
    {
        try {
            $sx = json_decode($_POST['object'], true);
            $id = $sx['id'];
            $documento = $this->getDoctrine()->getRepository(DocumentoProceso::class)->find($id);

            $dprocrevision = $this->getDoctrine()->getRepository(DocProcRevision::class)->findBy(['fkdoc' => $id, 'estado' => '1'], ['id' => 'ASC']);
            $docs = array();
            foreach ($dprocrevision as $docprocrev) {
                $fpb = $docprocrev->getFecha();
                if ($fpb != null) {
                    $result = $fpb->format('Y-m-d H:i:s');
                } else {
                    $result = $fpb;
                }

                $sendinf = [
                    "id" => $docprocrev->getId(),
                    "fecha" => $result,
                    "fkresponsable" => $docprocrev->getFkresponsable(),
                    "firma" => $docprocrev->getFirma(),
                    "estadodoc" => $docprocrev->getEstadodoc(),
                    "fkdoc" => $docprocrev->getFkdoc(),
                ];
                $docs[] = $sendinf;
            }     
            $elementos = array('doc_proceso' => $documento, 'en_revision' => $docs);
            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d H:i:s");

            $prove = array(
                'doc' => $elementos,
                'adicional' => array('fecha' => $fecha, 'dominio' => $_SERVER['HTTP_HOST'], 'logo' => '/resources/images/h_color_lg.png'),
            );
            
            $html = $this->renderView('reporting/documentoproc.html.twig', array('doc' => $elementos));

            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
           
            $dompdf = new Dompdf($pdfOptions);
            $dompdf->set_option('isHtml5ParserEnabled', true);
            $dompdf->loadHtml($html);

            $dompdf->setPaper('Letter', 'portrait');
            $dompdf->render();
            $output = $dompdf->output();
            
            $publicDirectory = $this->getParameter('Directorio_Reportes');
            date_default_timezone_set('America/La_Paz');
            $fecha = date("dmY_his");
            $pdfFilepath =  $publicDirectory . '/DocumentoProceso_'.$fecha.'.pdf';
            file_put_contents($pdfFilepath, $output);

            $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new JsonEncoder()));
            $json = $serializer->serialize('Reporte guardado!', 'json');
            $resultado = array('response'=>$json,'success' => true,
                'message' => 'Reporte generado correctamente.', 'url' => '/reportes/DocumentoProceso_'.$fecha.'.pdf');

            $resultado = json_encode($resultado);
            return new Response($resultado);
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
    }
}