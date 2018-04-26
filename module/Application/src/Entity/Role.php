<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use ZF\OAuth2\Doctrine\Permissions\Acl\Role\HierarchicalInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="role")
 *
 */
class Role extends Entity implements HierarchicalInterface
{
    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="child")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="Role", mappedBy="parent")
     */
    protected $child;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $name;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="role")
     * @ORM\JoinTable(name="user_to_role",
     *     joinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)})
     */
    protected $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->child = new ArrayCollection();
    }

    /**
     * Add user
     *
     * @param User $user
     *
     * @return Role
     */
    public function addUser(User $user)
    {
        $this->user[] = $user;
        return $this;
    }

    /**
     * Remove user
     *
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->user->removeElement($user);
    }
    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setParent(Role $role)
    {
        $this->parent = $role;
        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getChild()
    {
        return $this->child;
    }

    public function setChild(Role $role)
    {
        $this->child = $role;
        return $this;
    }

    public function getRoleId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}