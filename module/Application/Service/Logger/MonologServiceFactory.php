<?php
namespace Application\Service\Logger;

use Monolog\Logger;

class MonologServiceFactory
{

    public function __invoke($serviceLocator)
    {
        $logger = new Logger('name');
        
        $config = $serviceLocator->get('Config');
        $logConfig = $config['logger'];
        $handler = $logConfig['handler'];
        $path = $handler['path'];
        $type = $handler['type'];
        $maxFiles = $handler['max_files'];
      
        
        switch (strtolower($type)) {
            case 'stream':
                $handlerObj = new \Monolog\Handler\StreamHandler($path);
                break;
            case 'rotating_file':
                $handlerObj = new \Monolog\Handler\RotatingFileHandler($path, $maxFiles);
                break;
        }
        
        $logger->pushHandler($handlerObj);
        
        return new LoggerService($logConfig, $logger);
    }
}