<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'doctrine.fixtures_load_command' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\console\\Command\\Command.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Command\\DoctrineCommand.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-fixtures-bundle\\Command\\LoadDataFixturesDoctrineCommand.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\data-fixtures\\lib\\Doctrine\\Common\\DataFixtures\\Loader.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\DataFixtures\\ContainerAwareLoader.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-fixtures-bundle\\Loader\\SymfonyFixturesLoader.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\data-fixtures\\lib\\Doctrine\\Common\\DataFixtures\\FixtureInterface.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\data-fixtures\\lib\\Doctrine\\Common\\DataFixtures\\SharedFixtureInterface.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\data-fixtures\\lib\\Doctrine\\Common\\DataFixtures\\AbstractFixture.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-fixtures-bundle\\ORMFixtureInterface.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-fixtures-bundle\\Fixture.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\AccionesModFixtures.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\ComunicacionModFixtures.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\ConfiguracionModFixtures.php';
include_once $this->targetDirs[3].'\\vendor\\doctrine\\data-fixtures\\lib\\Doctrine\\Common\\DataFixtures\\DependentFixtureInterface.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\ModuloAccionFixtures.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\ModuloChildrenFixtures.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\ModuloFixtures.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\PersonalModFixtures.php';
include_once $this->targetDirs[3].'\\src\\DataFixtures\\UsuarioModFixtures.php';

$a = new \Doctrine\Bundle\FixturesBundle\Loader\SymfonyFixturesLoader($this);
$a->addFixtures(array(0 => new \App\DataFixtures\AccionesModFixtures(), 1 => new \App\DataFixtures\ComunicacionModFixtures(), 2 => new \App\DataFixtures\ConfiguracionModFixtures(), 3 => new \App\DataFixtures\ModuloAccionFixtures(), 4 => new \App\DataFixtures\ModuloChildrenFixtures(), 5 => new \App\DataFixtures\ModuloFixtures(), 6 => new \App\DataFixtures\PersonalModFixtures(), 7 => new \App\DataFixtures\UsuarioModFixtures(($this->services['security.password_encoder'] ?? $this->load('getSecurity_PasswordEncoderService.php')))));

$this->privates['doctrine.fixtures_load_command'] = $instance = new \Doctrine\Bundle\FixturesBundle\Command\LoadDataFixturesDoctrineCommand($a);

$instance->setName('doctrine:fixtures:load');

return $instance;
