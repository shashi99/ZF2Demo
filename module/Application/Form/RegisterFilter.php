<?php
namespace Application\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Zend\Validator;

class RegisterFilter extends InputFilter
{

    public function getInputFilter()
    {
        
        $maxvalidator = new Validator\StringLength();
        $maxvalidator->setMax(50);
        
        $minvalidator = new Validator\StringLength();
        $minvalidator->setMin(4);
        
        $email = new Input('email');
        $email->getValidatorChain()->attach(new Validator\EmailAddress());
        $email->getValidatorChain()->attach($maxvalidator);
        $email->getValidatorChain()->attach($minvalidator);
        
        $password = new Input('password');
        $password->getValidatorChain()->attach($maxvalidator);
        $password->getValidatorChain()->attach(new Validator\StringLength(array(
            'min' => 6
        )));
        
        $first_name = new Input('first_name');
        $first_name->getValidatorChain()->attach($maxvalidator);
        $first_name->getValidatorChain()->attach($minvalidator);
        
      
        
        $user_name = new Input('username');
        $user_name->getValidatorChain()->attach($maxvalidator);
        $user_name->getValidatorChain()->attach($minvalidator);
        
        $inputFilter = new InputFilter();
        $inputFilter->add($email);
        $inputFilter->add($password);
        $inputFilter->add($first_name);
        $inputFilter->add($user_name);
        
        return $inputFilter;
    }
}
