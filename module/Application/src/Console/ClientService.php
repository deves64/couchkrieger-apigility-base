<?php

namespace Application\Console;

use Application\Entity\Role;
use Application\Entity\User;
use Doctrine\ORM\EntityManager;
use Zend\Crypt\Password\Bcrypt;
use ZF\OAuth2\Doctrine\Entity\Client;

class ClientService
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var Bcrypt
     */
    protected $bcrypt;

    /**
     * ClientService constructor.
     * @param EntityManager $entityManager
     * @param Bcrypt $bcrypt
     */
    public function __construct(EntityManager $entityManager, Bcrypt $bcrypt)
    {
        $this->entityManager = $entityManager;
        $this->bcrypt = $bcrypt;
    }

    /**
     * @param $clientName
     * @param $clientPassword
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create($clientName, $clientPassword)
    {
        $entityManager = $this->entityManager;
        $entityRepository = $entityManager->getRepository('ZF\OAuth2\Doctrine\Entity\Client');

        if($entityRepository->findBy(['clientId' => $clientName])) {
            return false;
        }

        $client = new Client();
        $client->setClientId($clientName);
        $client->setSecret($this->bcrypt->create($clientPassword));
        $client->setRedirectUri('/oauth/receivecode');
        $client->setGrantType(null);

        $role = new Role();
        $role->setName('administrator');

        $entityManager->persist($role);

        $user = new User();
        $user->setForename('David');
        $user->setSurname('Atayee');
        $user->setEmail('david.atayee@gmail.com');
        $user->setPassword($this->bcrypt->create($clientPassword));
        $user->addRole($role);

        $entityManager->persist($user);

        $role->addUser($user);

        $entityManager->persist($client);
        $entityManager->flush();

        return true;
    }
}