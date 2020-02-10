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
use Shapecode\Bundle\CronBundle\Annotation\CronJob;

use App\Entity\Auditoria;
use App\Entity\Hallazgo;
use App\Entity\Accion;
use App\Entity\Correo;


/**
 * @CronJob("*\/1 * * * *")
 * Will be executed every minute
 */
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
        /*$progressBar = new ProgressBar($output, 3);
        $progressBar->setBarCharacter('<fg=blue>▄</>');
        $progressBar->setEmptyBarCharacter("<fg=white>▄</>");
        $progressBar->setProgressCharacter("<fg=blue>➧</>");*/
        $io = new SymfonyStyle($input, $output);

        //$progressBar->start();
        
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

        //$progressBar->finish();
        $io->success('Datos obtenidosdos exitosamente :)');
    }
}
