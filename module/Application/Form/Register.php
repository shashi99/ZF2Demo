<?php
namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Application\Form\RegisterFilter;

class Register extends Form
{

    private $inputFilter;

    private $param;

    public function __construct($param = null)
    {
        $this->param = $param;
        parent::__construct('register');
        $first_name = new Element('first_name');
        $first_name->setAttributes(array(
            'type' => 'Zend\Form\Element\Text',
            'placeholder' => "Enter Your First Name",
            'class' => "input-control",
            'required' => true,
            'id' => 'first_name'
        ));
        
        $last_name = new Element('last_name');
        $last_name->setAttributes(array(
            'type' => 'Zend\Form\Element\Text',
            'placeholder' => "Enter Your Last Name",
            'class' => "input-control",
            'required' => true,
            'id' => 'last_name'
        ));
        
        $user_name = new Element('username');
        $user_name->setAttributes(array(
            'type' => 'Zend\Form\Element\Text',
            'placeholder' => "Enter Your Last Name",
            'class' => "input-control",
            'required' => true,
            'id' => 'user_name'
        ));
        
        $email = new Element('email');
        $email->setAttributes(array(
            'type' => 'Zend\Form\Element\Email',
            'placeholder' => "Enter Your Email Address",
            'class' => "input-control",
            'required' => true,
            'id' => 'email'
        ));
        
        $password = new Element('password');
        $password->setAttributes(array(
            'type' => 'password',
            'placeholder' => "Create Your Password",
            'class' => "input-control",
            'required' => true,
            'id' => 'password'
        ));
        
        $confirm_password = new Element('confirm_password');
        $confirm_password->setAttributes(array(
            'type' => 'password',
            'placeholder' => "Re-enter Your Password",
            'class' => "input-control",
            'required' => true,
            'id' => 'confirm_password'
        ));
        
   
        
        $submit_register = new Element('submit_register');
        $submit_register->setAttributes(array(
            'type' => 'Submit',
            'value' => 'Sign Up',
            'id' => 'submit_register'
        ));
        $this->setName("register");
        $this->add($first_name);
        $this->add($last_name);
        $this->add($user_name);
        $this->add($email);
        $this->add($password);
        $this->add($confirm_password);
        $this->add($submit_register);

        
        $this->setAttribute('enctype', 'multipart/form-data');
        $rf = new RegisterFilter();
        $this->inputFilter = $rf->getInputFilter();
        
        $this->setInputFilter($this->inputFilter);
    }

    public function getInputFilter()
    {
        return $this->inputFilter;
    }
}
