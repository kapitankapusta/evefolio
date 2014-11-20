<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface; 
use Zend\Mvc\MvcEvent;
use \Zend\Mvc\Controller\ControllerManager;
use Application\Controller\IndexController;

class Module implements ViewHelperProviderInterface
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
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

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'navigation_helper' => function($sm) {
                    $helper = new View\Helper\NavigationHelper;
                    $helper->setConfig($this->getConfig()['nav']);
                    $locator = $sm->getServiceLocator(); 
                    $urlHelper = $sm->get('url');
                    $helper->setUrlHelper($urlHelper);
                    $helper->setPath();
                    return $helper;
                }
            )
        );  
   }
}
