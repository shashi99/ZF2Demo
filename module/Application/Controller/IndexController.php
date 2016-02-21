<?php
namespace Application\Controller;

use Application\Controller\AbstractAppController;

class IndexController extends AbstractAppController
{
    public function indexAction()
    {
        return $this->redirect()->toRoute('login');
    }
}