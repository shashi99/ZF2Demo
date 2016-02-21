<?php
$routes = array(
    'home' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/',
            'defaults' => array(
                'controller' => 'IndexController',
                'action' => 'index'
            )
        )
    ),
    'login' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/login',
            'defaults' => array(
                'controller' => 'AccountController',
                'action' => 'login'
            )
        )
    ),
    'logout' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/logout',
            'defaults' => array(
                'controller' => 'AccountController',
                'action' => 'logout'
            )
        )
    ),
    'dashboard' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/dashboard',
            'defaults' => array(
                'controller' => 'DashboardController',
                'action' => 'index'
            )
        )
    ),
    'application' => array(
        'type' => 'Literal',
        'options' => array(
            'route' => '/application',
            'defaults' => array(
                'controller' => 'IndexController',
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