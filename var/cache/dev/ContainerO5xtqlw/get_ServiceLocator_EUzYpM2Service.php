<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private '.service_locator.eUzYpM2' shared service.

return $this->privates['.service_locator.eUzYpM2'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('validator' => function () {
    return ($this->services['validator'] ?? $this->load('getValidatorService.php'));
}));