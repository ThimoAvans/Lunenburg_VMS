<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.1wbezau' shared service.

return $this->services['service_locator.1wbezau'] = new \Symfony\Component\DependencyInjection\ServiceLocator(array('passwordEncoder' => function () {
    return ${($_ = isset($this->services['security.password_encoder']) ? $this->services['security.password_encoder'] : $this->load('getSecurity_PasswordEncoderService.php')) && false ?: '_'};
}));
