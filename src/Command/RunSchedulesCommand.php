<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\ProgressBar;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Intl\Locales;
use Symfony\Component\Intl\Timezones;
use intl;

use App\Entity\Auditoria;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\Correo;


class RunSchedulesCommand extends Command
{
    protected static $defaultName = 'app:run-schedules';

    private $em;
    private $mailer;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
        $this->mailer = new \Swift_Mailer();
    }

    protected function configure()
    {
        $this
            ->setDescription('Schedule tasks - send emails')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /*$progressBar = new ProgressBar($output, 3);
        $progressBar->setBarCharacter('<fg=blue>▄</>');
        $progressBar->setEmptyBarCharacter("<fg=white>▄</>");
        $progressBar->setProgressCharacter("<fg=blue>➧</>");*/
        $io = new SymfonyStyle($input, $output);

        //$progressBar->start();
        \Locale::setDefault('es');
        $timezone = Timezones::getName('America/La_Paz');
        
        $correo = $this->em->getRepository(Correo::class)->find('1');
        $newml = new Correo();
        $newml->setAsunto($correo->getAsunto());
        $newml->setMensaje($correo->getMensaje());
        $newml->setTipo('COMITÉ DE ÉTICA');
        $newml->setFecha(new \DateTime());
        $newml->setFkusuario($correo->getFkusuario());
        $newml->setEstado(1);

        $this->em->persist($newml);
        $this->em->flush();
        //$progressBar->advance();

        date_default_timezone_set('America/La_Paz');
        $fecha = date("Y-m-d");
        
        $acn_b7d = $this->em->getRepository(Accion::class)->findActionsBefrore($fecha);
        if (!empty($acn_b7d)) {
            foreach ($acn_b7d as $acn) {
                $hallazgo = $this->em->getRepository(Hallazgo::class)->find($acn['fkhallazgo']);
                $auditoria = $this->em->getRepository(Auditoria::class)->find($hallazgo->getFkauditoria()->getId());
                $tipo_aud = $auditoria->gettFktipo() != null? $auditoria->gettFktipo()->getNombre(): '';
                $tipo_hlg = $hallazgo->gettFktipo() != null? $hallazgo->gettFktipo()->getNombre(): '';
                $tipo_acn = $acn->gettFktipo() != null? $acn->gettFktipo()->getNombre(): '';

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
                        ->setBody($this->renderView('mail/acnb7d_mail.html.twig', [
                                'auditoria'=> $item_aud,
                                'hallazgo'=> $item_hlg,
                                'accion'=> $item_acn
                            ]
                        ), 'text/html');

                    $this->mailer->send($message);
                }
            }
        }
        
        $acn_out = $this->em->getRepository(Accion::class)->findActionsAfter($fecha);
        if (!empty($acn_out)) {
            foreach ($acn_out as $acn) {
                $hallazgo = $this->em->getRepository(Hallazgo::class)->find($acn['fkhallazgo']);
                $auditoria = $this->em->getRepository(Auditoria::class)->find($hallazgo->getFkauditoria()->getId());
                $tipo_aud = $auditoria->gettFktipo() != null? $auditoria->gettFktipo()->getNombre(): '';
                $tipo_hlg = $hallazgo->gettFktipo() != null? $hallazgo->gettFktipo()->getNombre(): '';
                $tipo_acn = $acn->gettFktipo() != null? $acn->gettFktipo()->getNombre(): '';

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
                        ->setBody($this->renderView('mail/acnout_mail.html.twig', [
                                'auditoria'=> $item_aud,
                                'hallazgo'=> $item_hlg,
                                'accion'=> $item_acn
                            ]
                        ), 'text/html');

                    $this->mailer->send($message);
                }
            }
        }

        //$progressBar->finish();
        $io->success('Datos obtenidosdos exitosamente :)');
    }
}
