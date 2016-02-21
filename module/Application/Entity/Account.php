<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity
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
    private $deleteFlag = '0';



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Account
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set ssoToken
     *
     * @param string $ssoToken
     *
     * @return Account
     */
    public function setSsoToken($ssoToken)
    {
        $this->ssoToken = $ssoToken;

        return $this;
    }

    /**
     * Get ssoToken
     *
     * @return string
     */
    public function getSsoToken()
    {
        return $this->ssoToken;
    }

    /**
     * Set resetToken
     *
     * @param string $resetToken
     *
     * @return Account
     */
    public function setResetToken($resetToken)
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    /**
     * Get resetToken
     *
     * @return string
     */
    public function getResetToken()
    {
        return $this->resetToken;
    }

    /**
     * Set lastLoggedinInDtTm
     *
     * @param \DateTime $lastLoggedInDtTm
     *
     * @return Account
     */
    public function setLastLoggedInDtTm($lastLoggedInDtTm)
    {
        $this->lastLoggedInDtTm = $lastLoggedInDtTm;

        return $this;
    }

    /**
     * Get lastLoggedInDtTm
     *
     * @return \DateTime
     */
    public function getLastLoggedInDtTm()
    {
        return $this->lastLoggedinDtTm;
    }

    /**
     * Set createDtTm
     *
     * @param \DateTime $createDtTm
     *
     * @return Account
     */
    public function setCreateDtTm($createDtTm)
    {
        $this->createDtTm = $createDtTm;

        return $this;
    }

    /**
     * Get createDtTm
     *
     * @return \DateTime
     */
    public function getCreateDtTm()
    {
        return $this->createDtTm;
    }

    /**
     * Set deleteFlag
     *
     * @param boolean $deleteFlag
     *
     * @return Account
     */
    public function setDeleteFlag($deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;

        return $this;
    }

    /**
     * Get deleteFlag
     *
     * @return boolean
     */
    public function getDeleteFlag()
    {
        return $this->deleteFlag;
    }
    
    public function isActive()
    {
        return (!$this->getDeleteFlag()) ? true : false;
    }
}
