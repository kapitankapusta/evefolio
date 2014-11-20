<?php
/**
 * namespace definition and usage
 */
namespace Cv\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CvControllerFactory implements FactoryInterface
{
     /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sm = $serviceLocator->getServiceLocator();
        $em = $sm->get('doctrine.entitymanager.orm_default');
        $controller = new \Cv\Controller\CvController;
        $controller->setEntityManager($em);
        return $controller;
    }
}