<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\UserRepository")
 * @ORM\Table(name="user")
 * 
 */
class User
{
   /**
     * @var Integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     *
     * @var string
     * @ORM\Column(name="name",type="string",nullable=false)
     */
    private $name;

    /**
     *
     * @var string
     * @ORM\Column(name="email",type="string",nullable=false)
     */
    private $email;

    /**
     *
     * @var string
     * @ORM\Column(name="password",type="string",nullable=false)
     */
    private $password;

    /**
     *
     * @return the unknown_type
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return the unknown_type
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @param unknown_type $name            
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return the unknown_type
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param unknown_type $email            
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     *
     * @return the unknown_type
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     *
     * @param unknown_type $password            
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}