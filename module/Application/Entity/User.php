<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="fk_user_1_idx", columns={"account_id"})})
 * @ORM\Entity(repositoryClass="Application\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=false)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_dt_tm", type="datetime", nullable=false)
     */
    private $createDtTm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_dt_tm", type="datetime", nullable=false)
     */
    private $updateDtTm;

    /**
     * @var boolean
     *
     * @ORM\Column(name="delete_flag", type="boolean", nullable=false)
     */
    private $deleteFlag ='1';

    /**
     * @var \Application\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     * })
     */
    private $account;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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

    public function getUpdateDtTm()
    {
        return $this->updateDtTm;
    }

    public function setUpdateDtTm(\DateTime $updateDtTm)
    {
        $this->updateDtTm = $updateDtTm;
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

    public function getAccount()
    {
        return $this->account;
    }

    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }
 


}

