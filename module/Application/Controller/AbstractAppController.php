<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;


abstract class AbstractAppController extends AbstractActionController
{
    /**
     * 
     * @param string $entityName
     */
    protected function getRepository($entityName)
    {
        $em = $this->getEntityManager();
        $pos = strstr($entityName, '\\');
        if(!$pos){
            $entityName = 'Application\Entity\\' . $entityName;
        }
        
        $repo = $em->getRepository($entityName);
        
        return $repo;
    }
    
    /**
     * 
     * @return object
     */
    protected function getEntityManager()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        return $em;
    }
    
}