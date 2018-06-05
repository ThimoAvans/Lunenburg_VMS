<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.listener.basic.main' shared service.

return $this->services['security.authentication.listener.basic.main'] = new \Symfony\Component\Security\Http\Firewall\BasicAuthenticationListener(${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage()) && false ?: '_'}, ${($_ = isset($this->services['security.authentication.manager']) ? $this->services['security.authentication.manager'] : $this->getSecurity_Authentication_ManagerService()) && false ?: '_'}, 'main', ${($_ = isset($this->services['security.authentication.form_entry_point.main']) ? $this->services['security.authentication.form_entry_point.main'] : $this->load('getSecurity_Authentication_FormEntryPoint_MainService.php')) && false ?: '_'}, ${($_ = isset($this->services['monolog.logger.security']) ? $this->services['monolog.logger.security'] : $this->load('getMonolog_Logger_SecurityService.php')) && false ?: '_'});