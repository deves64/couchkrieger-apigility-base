<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Application\Listener\AuthorizationListener;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use ZF\MvcAuth\MvcAuthEvent;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

       /* $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new AuthorizationListener(),
            100 // Less than 1000 to allow roles to be added first && >= 100
        );*/
    }
}
