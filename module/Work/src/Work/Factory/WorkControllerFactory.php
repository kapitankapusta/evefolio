<?php
/**
 * namespace definition and usage
 */
namespace Work\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class WorkControllerFactory implements FactoryInterface
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
        $technoService = $sm->get('techno_service');
        $controller = new \Work\Controller\WorkController;
        $controller->setEntityManager($em);
        $controller->setTechnoService($technoService);
        return $controller;
    }
}