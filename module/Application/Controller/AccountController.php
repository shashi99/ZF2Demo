<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AccountController extends AbstractActionController
{

    public function indexAction()
    {
        return $this->redirect('login');
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $authService = $this->getServiceLocator()->get('app.authentication');
            $authService->getAdapter()->setIdentity($request->getPost('email'));
            $authService->getAdapter()->setCredential($request->getPost('password'));
        
            $result = $authService->authenticate();
        
            if ($result->isValid()) {
                $redirect = 'dashboard';
                if ($request->getPost('remember_me') == 1) {
                    $storage = $authService->getStorage();
                    $storage->setRememberMe();
                    $authService->setStorage($storage);
                }
                $authService->getStorage()->write($result->getIdentity());
        
                return $this->redirect()->toRoute($redirect);
            }
        }
        
        return new ViewModel();
    }
    
    public function logoutAction()
    {
        $authService = $this->getServiceLocator()->get('app.authentication');
        $authService->getStorage()->forgetMe();
        $authService->clearIdentity();
        
        return $this->redirect()->toRoute('login');
    }
}
