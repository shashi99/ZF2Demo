<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

$config = array(
    'doctrine' => array(
        'driver' => array(
            'Application_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Application/Entity'
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
    
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo'
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => Controller\IndexController::class
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
  
);

// Routing config
$config = \Zend\Stdlib\ArrayUtils::merge($config, include 'routes.config.php');

// Services config
$config = \Zend\Stdlib\ArrayUtils::merge($config, include 'services.config.php');

return $config;
