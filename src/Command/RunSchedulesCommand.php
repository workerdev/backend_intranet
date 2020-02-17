<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Auditoria;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\TipoAccion;


class RunSchedulesCommand extends Command
{
    protected static $defaultName = 'app:run-schedules';

    private $em;
    private $mailer;
    private $templating;

    public function __construct(EntityManagerInterface $em, \Twig_Environment $templating, \Swift_Mailer $mailer)
    {
        parent::__construct();
        $this->em = $em;
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    protected function configure()
    {
        $this
            ->setDescription('Schedule tasks - send emails')
        ;
    }

    public function b7days_email($date)
    {
        $acn_b7d = $this->em->getRepository(Accion::class)->findActionsBefore($date);
        if (!empty($acn_b7d)) {
            foreach ($acn_b7d as $acn) {
                $hallazgo = $this->em->getRepository(Hallazgo::class)->find($acn['fkhallazgo']);
                $auditoria = $this->em->getRepository(Auditoria::class)->find($hallazgo->getFkauditoria()->getId());
                $fktipo = !in_array($acn['fktipo'], ['', null])? $this->em->getRepository(TipoAccion::class)->find($acn['fktipo']): null;

                $tipo_aud = $auditoria->getFktipo() != null? $auditoria->getFktipo()->getNombre(): '';
                $tipo_hlg = $hallazgo->getFktipo() != null? $hallazgo->getFktipo()->getNombre(): '';
                $tipo_acn = $fktipo != null? $fktipo->getNombre(): '';

                $item_aud = [
                    "codigo" => $auditoria->getCodigo(),
                    "tipo" => $tipo_aud
                ];

                $item_hlg = [
                    "tipo" => $tipo_hlg,
                    "titulo" => $hallazgo->getTitulo(),
                    "descripcion" => $hallazgo->getDescripcion(),
                ];

                $item_acn = [
                    "tipo" => $tipo_acn,
                    "responsable" => $acn['responsableimplementacion'],
                    "descripcion" => $acn['descripcion']
                ];

                if ($auditoria->getFkgerente() != null && $auditoria->getFkjefe() != null) {
                    $mail_gr = $auditoria->getFkgerente()->getCorreo();
                    $mail_jf = $auditoria->getFkjefe()->getCorreo();
                    $correos = [$mail_gr, $mail_jf];

                    $message = (new \Swift_Message('ELFEC - Acción a implementar'))
                        ->setFrom($_SERVER['REMITENTE_CORREO'])
                        ->setTo($correos)
                        ->setBody($this->templating->render('mail/acnb7d_mail.html.twig', [
                                'auditoria'=> $item_aud,
                                'hallazgo'=> $item_hlg,
                                'accion'=> $item_acn
                            ]
                        ), 'text/html');

                    $this->mailer->send($message);
                }
            }
        }
        return;
    }

    public function expired_email($date)
    {
        $acn_out = $this->em->getRepository(Accion::class)->findActionsAfter($date);
        if (!empty($acn_out)) {
            foreach ($acn_out as $acn) {
                $hallazgo = $this->em->getRepository(Hallazgo::class)->find($acn['fkhallazgo']);
                $auditoria = $this->em->getRepository(Auditoria::class)->find($hallazgo->getFkauditoria()->getId());
                $fktipo = !in_array($acn['fktipo'], ['', null])? $this->em->getRepository(TipoAccion::class)->find($acn['fktipo']): null;

                $tipo_aud = $auditoria->getFktipo() != null? $auditoria->getFktipo()->getNombre(): '';
                $tipo_hlg = $hallazgo->getFktipo() != null? $hallazgo->getFktipo()->getNombre(): '';
                $tipo_acn = $fktipo != null? $fktipo->getNombre(): '';

                $item_aud = [
                    "codigo" => $auditoria->getCodigo(),
                    "tipo" => $tipo_aud
                ];

                $item_hlg = [
                    "tipo" => $tipo_hlg,
                    "titulo" => $hallazgo->getTitulo(),
                    "descripcion" => $hallazgo->getDescripcion(),
                ];

                $item_acn = [
                    "tipo" => $tipo_acn,
                    "responsable" => $acn['responsableimplementacion'],
                    "fecha" => $acn['fechaimplementacion'],
                    "descripcion" => $acn['descripcion']
                ];

                if ($auditoria->getFkgerente() != null && $auditoria->getFkjefe() != null) {
                    $mail_gr = $auditoria->getFkgerente()->getCorreo();
                    $mail_jf = $auditoria->getFkjefe()->getCorreo();
                    $correos = [$mail_gr, $mail_jf];

                    $message = (new \Swift_Message('ELFEC - Acción fuera de fecha'))
                        ->setFrom($_SERVER['REMITENTE_CORREO'])
                        ->setTo($correos)
                        ->setBody($this->templating->render('mail/acnout_mail.html.twig', [
                                'auditoria'=> $item_aud,
                                'hallazgo'=> $item_hlg,
                                'accion'=> $item_acn
                            ]
                        ), 'text/html');

                    $this->mailer->send($message);
                }
            }
        }
        return;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        try {
            date_default_timezone_set('America/La_Paz');
            $fecha = date("Y-m-d");
            $this->b7days_email($fecha);
            $this->expired_email($fecha);

            $message = "Tareas ejecutadas exitosamente :)";
        } catch(Exception $ee) {
            $message = "Error: {$e->getMessage()}";
        }

        $io->success($message);
    }
}