<?php
namespace Cv\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Cv\Form\CvForm;
use Cv\Entity\Timeline;
use Cv\Entity\Vita;

class CvController extends AbstractActionController
{
	private $em;

	public function setEntityManager($em)
	{
		$this->em = $em;
	}

	private function getEntityManager()
	{
		return $this->em;
	}

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $vita = $em->getRepository('Cv\Entity\Vita')->findAll();
        return new ViewModel(array(
            'vita' => $vita,
        ));
    }

    public function addAction()
    {
        $form = new CvForm();
        $title = 'Add Vita';    
    	$request = $this->getRequest();
        if ($request->isPost()) {
        	$form->setData($request->getPost());
        	if ($form->isValid()) {
        		$vita = new Vita();
        		$data = $form->getData();
	        	$vita->exchangeArray($data);
	        	$this->getEntityManager()->persist($vita);
	        	$this->getEntityManager()->flush();	
        	}
		}

    	return array(
    		'form' => $form,
    		'title' => $title
    	);
    }

    public function removeAction()
    {

    }
}
