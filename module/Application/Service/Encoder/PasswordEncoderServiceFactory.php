<?php
namespace Application\Service\Encoder;

class PasswordEncoderServiceFactory
{
    public function __invoke($serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $options = $config['encoder']['password_encoder'];
        
        return new PasswordEncoder($options);   
    }
}