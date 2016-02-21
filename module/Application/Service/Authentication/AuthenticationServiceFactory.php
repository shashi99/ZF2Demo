<?php
namespace Application\Service\Authentication;

use Zend\Authentication\AuthenticationService;

class AuthenticationServiceFactory
{

    public function __invoke($serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        
        // Configure Storage
        $sessionOptions = $config['authentication']['session'];
        $storage = new Storage();
        $storage->setRememberMeTime($sessionOptions['remember_me_ttl']);
        
        // Configure Adapter
        $adapterOptions = $config['authentication']['doctrine'];
        $em = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $entityRepository = $em->getRepository($adapterOptions['entity_class']);
        $passwordEncoder = $serviceLocator->get('app.password_encoder');
        
        $adapter = new Adapter($entityRepository, $adapterOptions['identity_property'], $passwordEncoder);
        
        // Set Storage and Adapter object to Authentication service
        return new AuthenticationService($storage, $adapter);
    }
}