<?php
$routes = array(
    'home' => array(
        'type' => 'Zend\Mvc\Router\Http\Literal',
        'options' => array(
            'route' => '/',
            'defaults' => array(
                'controller' => 'Application\Controller\Index',
                'action' => 'index'
            )
        )
    ),
    
    'application' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/application',
            'defaults' => array(
                '__NAMESPACE__' => 'Application\Controller',
                'controller' => 'User',
                'action' => 'index'
            )
        ),
        'may_terminate' => true,
        'child_routes' => array(
            'default' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/[:controller[/:action]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array()
                )
            )
        )
    )
);

return array(
    'router' => array(
        'routes' => $routes
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array()
        )
    )
);