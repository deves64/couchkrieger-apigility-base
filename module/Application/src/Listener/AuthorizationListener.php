<?php

namespace Application\Listener;

use ZF\MvcAuth\MvcAuthEvent;

class AuthorizationListener
{
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $authorization = $mvcAuthEvent->getAuthorizationService();

        // Deny from all
        //$authorization->deny();

        // Allow from all for oauth authentication
        $authorization->addResource('ZF\OAuth2\Controller\Auth::token');
        $authorization->allow(null, 'ZF\OAuth2\Controller\Auth::token');

        // Add application specific resources
        $authorization->addResource('Test\V1\Rest\User\Controller::entity');
        $authorization->allow('6eea6289-494f-11e8-bd8d-0242ac120002', 'Test\V1\Rest\User\Controller::entity', 'GET');
    }
}