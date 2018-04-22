<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 * @ORM\Table(name="contact_message")
 *
 */
class ContactMessage
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;
    /**
     * @ORM\Column(type="datetimetz", name="received_at")
     */
    protected $receivedAt;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $company;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $forename;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $surname;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $phone;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $concern;
    /**
     * @ORM\Column(type="boolean", name="request_closed", nullable=true)
     */
    protected $requestClosed = false;
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     * @return DefaultContact
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getReceivedAt()
    {
        return $this->receivedAt;
    }
    /**
     * @param mixed $receivedAt
     * @return DefaultContact
     */
    public function setReceivedAt($receivedAt)
    {
        $this->receivedAt = $receivedAt;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }
    /**
     * @param mixed $company
     * @return DefaultContact
     */
    public function setCompany($company)
    {
        $this->company = $company;
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
     * @return DefaultContact
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
     * @return DefaultContact
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
     * @return DefaultContact
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
    /**
     * @param mixed $phone
     * @return DefaultContact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getConcern()
    {
        return $this->concern;
    }
    /**
     * @param mixed $concern
     * @return DefaultContact
     */
    public function setConcern($concern)
    {
        $this->concern = $concern;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getRequestClosed()
    {
        return $this->requestClosed;
    }
    /**
     * @param mixed $requestClosed
     * @return DefaultContact
     */
    public function setRequestClosed($requestClosed)
    {
        $this->requestClosed = $requestClosed;
        return $this;
    }
    /**
     * @return boolean
     */
    public function isRequestClosed()
    {
        return $this->requestClosed;
    }
}