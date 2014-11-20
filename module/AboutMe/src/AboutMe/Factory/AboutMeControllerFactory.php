<?php
/**
 * namespace definition and usage
 */
namespace AboutMe\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AboutMeControllerFactory implements FactoryInterface
{
     /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $age = $sm->get('config')['age'];

        $controller = new \AboutMe\Controller\AboutMeController;
        $controller->setAge($age);
        return $controller;
    }
}