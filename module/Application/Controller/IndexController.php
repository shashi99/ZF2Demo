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
use Application\Money\Money;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
    	/* $cache = $this->getServiceLocator()->get('RedisCache');
    	 //echo "";
    	 $cache->setItem('l',10);
    	 $gh = $cache->incrementItem('l',1);
    	 //$cache->flush();
    	 print_r(get_class_methods($cache));
    	 echo ($cache->getItem('l'));
    	 exit;//$cache->getItem('foo');exit;*/
         $money = new Money(1);

    }
}
