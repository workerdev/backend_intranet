<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Shapecode\Bundle\CronBundle\Annotation\CronJob;
use Jobby\Jobby;

/**
 * @CronJob("*\/1 * * * *")
 * Will be executed every minute
 */
class RunTaskCommand extends Command
{
    protected static $defaultName = 'app:run-task';

    protected function configure()
    {
        $this
            ->setDescription('Prove to run Cron')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $io = new SymfonyStyle($input, $output);
            $jobby = new Jobby();

            // Every job has a name
            $jobby->add('RunSchedules', [
                // Run a shell command
                'command'  => 'app:run-schedules',
                
                // Ordinary crontab schedule format is supported.
                // This schedule runs every hour.
                'schedule' => '*,1 * * * *',
                'enabled' => true
            ]);

            $jobby->run();

            $io->success('Cron job proves.');
        } catch(Exception $e) {
            printf($e->getMessage());
        }
        
    }
}
