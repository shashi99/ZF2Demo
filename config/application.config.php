<?php
/**
 * System configuration
 */

require 'parameters.php';

return array(
    'modules' => $params['modules'],
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor'
        ),
        'config_glob_paths' => array(
            'config/autoload/{{,*.}global,{,*.}local}.php'
        ),
        'config_cache_enabled' => $params['cache_enabled'],
        'config_cache_key' => $params['cache_key'],
        'cache_dir' => $params['cache_dir']
    )
);
