<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\ProgressBar;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Auditoria;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\Correo;

class RunSchedulesCommand extends Command
{
    protected static $defaultName = 'app:run-schedules';

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Schedule tasks - send emails')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progressBar = new ProgressBar($output, 3);
        $progressBar->setBarCharacter('<fg=blue>▄</>');
        $progressBar->setEmptyBarCharacter("<fg=white>▄</>");
        $progressBar->setProgressCharacter("<fg=blue>➧</>");
        $io = new SymfonyStyle($input, $output);

        $progressBar->start();
        $auditoria = $this->em->getRepository(Auditoria::class)->findBy(['estado' => '1']);
        $progressBar->advance();
        
        $hallazgo = $this->em->getRepository(Hallazgo::class)->findBy(['estado' => '1']);
        $progressBar->advance();
    
        $accion = $this->em->getRepository(Accion::class)->findBy(['estado' => '1']);
        $progressBar->advance();
        
        $correo = $this->em->getRepository(Correo::class)->find('5');
        $newml = new Correo();
        $newml->setAsunto($correo->getAsunto());
        $newml->setMensaje($correo->getMensaje());
        $newml->setTipo('COMITÉ DE ÉTICA');
        $newml->setFecha(new \DateTime());
        $newml->setFkusuario($correo->getFkusuario());
        $newml->setEstado(1);

        $this->em->persist($newml);
        $this->em->flush();

        $progressBar->finish();
        $io->success('Datos obtenidosdos exitosamente :)');
    }
}
