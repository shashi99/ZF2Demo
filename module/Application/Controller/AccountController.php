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
use Application\Form\Register;

class AccountController extends AbstractAppController 
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
    
    
    public function registerAction()
    {
        $registerForm = new Register();
        
        //TODO: we are changeing this in refactor code.
        $view = new ViewModel();
        $request = $this->getRequest();
        
        
        if ($request->isPost()) {
            $postDataArray = $request->getPost();
           
            $registerForm->setData($this->getRequest()->getPost()->toArray());
           
            if ($registerForm->isValid()) {
              
                //print_r($postDataArray);exit;
                $encoder = $this->getServiceLocator()->get('app.password_encoder');
                $passwordEncode = $encoder->encode($postDataArray['password']);
                $postDataArray['password'] = $passwordEncode;
                $accountRepository =  $this->getRepository('Account');
               
                // Create account
                $accountObj = $accountRepository->createAccount($postDataArray);
                
                // Create user
                $userRepository = $this->getRepository('User');
                $userRepository->createUser($accountObj,$postDataArray);
                    
               // $flashMessenger = $this->_helper->getHelper('FlashMessenger');
                //$flashMessenger->addMessage('We did something in the last request');
                
                echo "saved";
                
            }
        }
        
        
        //public and private key are reading from User config file
        //TODO: Move to some comman file.
        //Get Key based on Environment.
        //Generate Key for production using (admin@costrategix.com)
        $applicationEnv = getenv('APPLICATION_ENV');

        //$this->layout('layout/guest_cms');
        $view->setVariable('registerForm', $registerForm);

        return $view;
        
    }
    
    public function thankyouAction(){
        $view = new ViewModel();
        return $view;
    }
}
