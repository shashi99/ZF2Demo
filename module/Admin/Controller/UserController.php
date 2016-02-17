<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Controller\AbstractAppController;

class UserController extends AbstractAppController
{

    public function listAction()
    {
        // throw new \Exception('service not found',400);
        $users = $this->getRepository('User')->getUsers();
        
        $logger = $this->getServiceLocator()->get('app.logger');
        $logger->debug('debug message',$users);
        //$logger->write('warning message', 'warning');
        
        echo "<pre>";
        print_r($users);
        die();
        // echo "asa";exit;
    }
}