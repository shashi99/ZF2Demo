<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $eventManager->attach('dispatch.error', function ($event) {
            
            $exception = $event->getResult()->exception;
            
            if ($exception) {
                $sm = $event->getApplication()
                    ->getServiceManager();
                $logger = $sm->get('app.logger');
                $logger->error($exception);
            }
        });
        $eventManager->attach('render.error', function ($event) {
            $exception = $event->getResult()->exception;
            
            if ($exception) {
                $sm = $event->getApplication()
                    ->getServiceManager();
                $logger = $sm->get('app.logger');
                $logger->error($exception);
            }
        });
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__
                )
            )
        );
    }

}
