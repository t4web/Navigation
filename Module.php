<?php

namespace T4webNavigation;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use T4webNavigation\Menu\Navigator;
use T4webNavigation\Factory as NavigationFactory;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface, ServiceProviderInterface
{

    public function getConfig($env = null)
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'T4webNavigation\Menu\Navigator' => function (ServiceLocatorInterface $sl) {
                    return new Navigator();
                },
                'NavigationMenu' => function (ServiceLocatorInterface $sl) {
                    $factory = new NavigationFactory();
                    return $factory->createService($sl);
                }
            )
        );
    }

}
