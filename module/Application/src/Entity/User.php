<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Zend\Stdlib\ArraySerializableInterface;
use ZF\OAuth2\Doctrine\Entity\UserInterface;
use ZF\OAuth2\Doctrine\Permissions\Acl\Role\ProviderInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 */
class User extends Entity implements UserInterface, ProviderInterface, ArraySerializableInterface
{
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $forename;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $surname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;

    /**
     * @ORM\ManyToMany(targetEntity="Role", mappedBy="user")
     */
    protected $role;

    /**
     * @var
     */
    protected $client;

    /**
     * @var
     */
    protected $accessToken;

    /**
     * @var
     */
    protected $authorizationCode;

    /**
     * @var
     */
    protected $refreshToken;

    /**
     * DefaultUser constructor.
     */
    public function __construct()
    {
        $this->role= new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * @param mixed $forename
     * @return User
     */
    public function setForename($forename)
    {
        $this->forename = $forename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Collection $role
     * @return $this
     */
    public function setRole(Collection $role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @param Role $role
     * @return $this
     */
    public function addRole(Role $role)
    {
        $this->role[] = $role;
        return $this;
    }

    /**
     * @param Role $role
     */
    public function removeRole(Role $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Exchange internal values from provided array
     *
     * @param  array $array
     * @return User
     */
    public function exchangeArray(array $array)
    {
        foreach ($array as $key => $value) {
            switch ($key) {
                case 'createdAt':
                    $this->setCreatedAt($value);
                    break;
                case 'forename':
                    $this->setForename($value);
                    break;
                case 'surname':
                    $this->setSurname($value);
                    break;
                case 'email':
                    $this->setEmail($value);
                    break;
                case 'password':
                    $this->setPassword($value);
                    break;
                default:
                    break;
            }
        }

        return $this;
    }
    /**
     * Return an array representation of the object
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'        => $this->getId(),
            'createdAt' => $this->getCreatedAt(),
            'forename'  => $this->getForename(),
            'surname'   => $this->getSurname(),
            'email'     => $this->getEmail(),
            'password'  => $this->getPassword()
        ];
    }
}