<?php
namespace Work\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Work\Form\RefForm;
use Work\Form\TechnoForm;
use Work\Entity\Techno;
use Work\Entity\Ref;

class WorkController extends AbstractActionController
{
    private $em = null;
    private $technoService = null;

    public function setEntityManager($em)
    {
        $this->em = $em;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    public function setTechnoService($service)
    {
        $this->technoService = $service;
    }

    public function getTechnoService()
    {
        return $this->technoService;
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $technos = $em->getRepository('Work\Entity\Techno')->findAll();
        return new ViewModel(array(
            'technos' => $technos
        ));
    }

    public function addAction()
    {   
        $em = $this->getEntityManager();
        $type = $this->params()->fromRoute('type');
        if ($type === 'reference') {
            $form = new RefForm();    
        } else {
            $referenceObjects = $em->getRepository('Work\Entity\Ref')->findAll();
            $referenceArray = [];

            foreach ($referenceObjects as $key => $ref) {
                $referenceArray[$ref->getId()] = $ref->getTitle();
            }

            $form = new TechnoForm($referenceArray);
        }
        $title = 'Add ' . $type;    
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $data = $form->getData();
                if ($type === 'techno') {
                    $emObject =  new Techno();
                    if (isset($data['references'])) {
                        foreach ($this->getTechnoService()->findRefs($data['references']) as $reference) {
                            $emObject->addReference($reference);
                        } 
                    }
                } else {
                    $emObject = new Ref();
                }
                $emObject->exchangeArray($data);
                $this->getEntityManager()->persist($emObject);
                $this->getEntityManager()->flush(); 
            }
        }
        return new ViewModel(array(
            'form'  => $form,
            'type'  => $type,
            'title' => $title
        ));
    }
}
