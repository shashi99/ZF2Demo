<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"})})
 * @ORM\Entity(repositoryClass="Application\Repository\AccountRepository")
 */
class Account
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="sso_token", type="string", length=45, nullable=true)
     */
    private $ssoToken;

    /**
     * @var string
     *
     * @ORM\Column(name="reset_token", type="string", length=150, nullable=true)
     */
    private $resetToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_logged_in_dt_tm", type="datetime", nullable=false)
     */
    private $lastLoggedInDtTm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_dt_tm", type="datetime", nullable=false)
     */
    private $createDtTm;

    /**
     * @var boolean
     *
     * @ORM\Column(name="delete_flag", type="boolean", nullable=false)
     */
    private $deleteFlag = '1';

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getSsoToken()
    {
        return $this->ssoToken;
    }

    public function setSsoToken($ssoToken)
    {
        $this->ssoToken = $ssoToken;
        return $this;
    }

    public function getResetToken()
    {
        return $this->resetToken;
    }

    public function setResetToken($resetToken)
    {
        $this->resetToken = $resetToken;
        return $this;
    }

    public function getLastLoggedInDtTm()
    {
        return $this->lastLoggedInDtTm;
    }

    public function setLastLoggedInDtTm(\DateTime $lastLoggedInDtTm)
    {
        $this->lastLoggedInDtTm = $lastLoggedInDtTm;
        return $this;
    }

    public function getCreateDtTm()
    {
        return $this->createDtTm;
    }

    public function setCreateDtTm(\DateTime $createDtTm)
    {
        $this->createDtTm = $createDtTm;
        return $this;
    }

    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }

    public function setDeleteFlag(boolean $deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;
        return $this;
    }
    
    public function isActive(){
        return (!$this->getDeleteFlag()) ? true : false;
    }
 
 


}

