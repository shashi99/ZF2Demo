<?php
return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory'
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            'app.logger' => 'Application\Service\Logger\MonologServiceFactory',
            'app.authentication' => 'Application\Service\Authentication\AuthenticationServiceFactory',
            'app.password_encoder' => 'Application\Service\Encoder\PasswordEncoderServiceFactory'
        )
    )
);