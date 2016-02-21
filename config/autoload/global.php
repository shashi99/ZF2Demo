<?php
/**
 * Global Configuration override
 */
require (__DIR__ . '/../parameters.php');

return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host' => $params['database_host'],
                    'port' => $params['database_port'],
                    'dbname' => $params['database_name'],
                    'user' => $params['database_user'],
                    'password' => $params['database_password']
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array'
            )
        ),
        'driver' => array(
            'Application_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../../module/Application/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'Application_driver'
                )
            ),
            'orm_log' => array(
                'drivers' => array(
                    'Application\Entity' => 'Application_driver'
                )
            )
        )
    ),
    'authentication' => array(
        'doctrine' => array(
            'entity_class' => 'Application\Entity\Account',
            'identity_property' => 'username',
        ),
        'session' => array(
            'remember_me_ttl' => $params['session_remember_me_ttl']
        )
    ),
    'encoder' => array(
        'password_encoder' => array(
            'algorithm' => 'bcrypt',
            'cost' => 10
        )
    ),
    'logger' => array(
        'enabled' => $params['logger_enabled'],
        'handler' => array(
            'type' => $params['logger_handler_type'],
            'level' => $params['logger_handler_level'],
            'filename' => $params['logger_handler_filename'],
            'max_files' => $params['logger_handler_max_files']
        )
    )
);
