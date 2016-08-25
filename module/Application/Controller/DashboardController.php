<?php
namespace Application\Controller;

use Application\Controller\AbstractAppController;
use Zend\View\Model\ViewModel;

class DashboardController extends AbstractAppController
{
    public function indexAction()
    {
        $authService = $this->getServiceLocator()->get('app.authentication');
        if(!$authService->hasIdentity()){
            
		return $this->redirect()->toRoute('login');
        
	}
        $viewParams = array();
        return new ViewModel($viewParams);
    }
}
