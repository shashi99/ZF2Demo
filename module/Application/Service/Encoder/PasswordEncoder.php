<?php
namespace Application\Service\Encoder;

class PasswordEncoder
{

    private $options;

    public function __construct($options = array())
    {
        $this->options = $options;
    }

    public function encode($password)
    {
        switch ($this->options['algorithm']) {
            case 'bcrypt':
                $password = password_hash($password, PASSWORD_BCRYPT, array(
                    $this->options['cost']
                ));
                break;
            default:
                break;
        }
        
        return $password;
    }
    
    public function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}