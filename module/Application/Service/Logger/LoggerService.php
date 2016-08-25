<?php
namespace Application\Service\Logger;

class LoggerService
{

    private $config;

    private $logService;

    public function __construct($config, $logService)
    {
        $this->config = $config;
        $this->logService = $logService;
    }

    public function info($message, $context = array())
    {
        if (! $this->config['enabled']) {
            return false;
        }
        
         $this->logService->addInfo($message, $context);
    }

    public function warning($message, $context = array())
    {
        if (! $this->config['enabled']) {
             return false;
        }
        
        $this->logService->addWarning($message, $context);
    }

    public function error($message, $context = array())
    {
        if (! $this->config['enabled']) {
            return false;
        }
        
        $this->logService->addError($message, $context);
    }
    
    public function critical($message, $context = array())
    {

        if (! $this->config['enabled']) {
            return false;
        }
        $this->logService->addCritical($message, $context);
    }
    
    public function debug($message, $context = array())
    {
        if (! $this->config['enabled']) {
            return false;
        }
        $this->logService->addDebug($message, $context);
    }
    
}
