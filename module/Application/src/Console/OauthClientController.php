<?php

namespace Application\Console;

use RuntimeException;
use Zend\Console\Prompt\Confirm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Request as ConsoleRequest;

class OauthClientController extends  AbstractActionController
{
    /**
     * @var ClientService
     */
    protected $service;

    /**
     * OauthClientController constructor.
     * @param ClientService $service
     */
    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function createAction()
    {
        $request = $this->getRequest();

        if (! $request instanceof ConsoleRequest) {
            throw new RuntimeException('You can only use this action from a console!');
        }

        $clientName   = $request->getParam('clientName');
        $clientPassword   = $request->getParam('clientPassword');

        if(! $this->service->create($clientName, $clientPassword)) {
            return 'Es wurde KEIN Client erstellt!';
        }

       return 'Es wurde ein Client erstellt!';
    }
}