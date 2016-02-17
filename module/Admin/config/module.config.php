<?php

namespace Admin;
$config =  array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\User' => Controller\UserController::class
        ),
    ),
);

// Routing config
$config = \Zend\Stdlib\ArrayUtils::merge($config, include 'routes.config.php');

return $config;