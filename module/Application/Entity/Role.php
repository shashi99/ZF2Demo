<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity
 */
class Role
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
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role;

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
     * @var integer
     *
     * @ORM\Column(name="delete_flag", type="integer", nullable=true)
     */
    private $deleteFlag = '1';

    public function getId()
    {
        return $this->id;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
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

    public function setDeleteFlag(integer $deleteFlag)
    {
        $this->deleteFlag = $deleteFlag;
        return $this;
    }
 


}

