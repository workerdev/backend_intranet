<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\ProgressBar;

class LoadInfoCommand extends Command
{
    protected static $defaultName = 'app:load-info';

    protected function configure()
    {
        $this
            ->setDescription('Add data to the DB')
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
        $newdb = shell_exec('php bin/console doctrine:database:create');
        $progressBar->advance();
        
        $addtabs = shell_exec('php bin/console doctrine:schema:update --force');
        $progressBar->advance();
    
        $datatabs = shell_exec('php bin/console doctrine:fixtures:load');
        $progressBar->advance();
        $progressBar->finish();
        $io->success('Datos generados exitosamente :)');
    }
}
