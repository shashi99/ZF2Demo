<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserHasRole
 *
 * @ORM\Table(name="user_has_role")
 * @ORM\Entity
 */
class UserHasRole
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
     * @var integer
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    private $roleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    public function getId()
    {
        return $this->id;
    }

    public function getRoleId()
    {
        return $this->roleId;
    }

    public function setRoleId(integer $roleId)
    {
        $this->roleId = $roleId;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId(integer $userId)
    {
        $this->userId = $userId;
        return $this;
    }
 


}

