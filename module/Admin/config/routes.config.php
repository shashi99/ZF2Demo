<?php
$routes = array(
    'user-list' => array(
        'type' => 'Segment',
        'options' => array(
            'route' => '/user/list',
            'defaults' => array(
                'controller' => 'Admin\Controller\User',
                'action' => 'list'
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
    