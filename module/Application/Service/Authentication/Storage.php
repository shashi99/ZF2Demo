<?php
namespace Application\Service\Authentication;

use Zend\Authentication\Storage\Session;

class Storage extends Session
{
    private $ttl;
    
    public function setRememberMe()
    {
        $this->session->getManager()->rememberMe($this->getRememberMeTime());
    }

    public function forgetMe()
    {
        $this->session->getManager()->forgetMe();
    }
    
    /**
     * Set TTL for remember me cookie
     * 
     * @param $time integer Time in seconds 
     */
    public function setRememberMeTime($time)
    {
        $this->ttl = $time;
    }
    
    /**
     * Returns remember me cookie time
     */
    public function getRememberMeTime()
    {
        return $this->ttl;
    }
}