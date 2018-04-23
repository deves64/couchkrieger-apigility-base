<?php

namespace Application\Entity;

use Zend\Stdlib\ArraySerializableInterface;
use ZF\OAuth2\Doctrine\Entity\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 */
class User implements UserInterface, ArraySerializableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

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
     * @ORM\Column(type="datetimetz", name="created_at", nullable=true)
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetimetz", name="updated_at", nullable=true)
     */
    protected $updatedAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $suspended = true;

    protected $client;

    protected $accessToken;

    protected $authorizationCode;

    protected $refreshToken;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * @param mixed $suspended
     * @return User
     */
    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;
        return $this;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

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
                case 'updatedAt':
                    $this->setUpdatedAt($value);
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
                case 'suspended':
                    $this->setSuspended($value);
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
            'updatedAt' => $this->getUpdatedAt(),
            'forename'  => $this->getForename(),
            'surname'   => $this->getSurname(),
            'email'     => $this->getEmail(),
            'password'  => $this->getPassword(),
            'suspended' => $this->getSuspended()
        ];
    }
}