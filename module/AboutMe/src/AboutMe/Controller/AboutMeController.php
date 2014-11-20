<?php
namespace AboutMe\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AboutMeController extends AbstractActionController
{
	private $age = null;

	public function setAge($age)
	{
		$this->age = $age;
	}

	public function getAge()
	{
		return $this->age;
	}

    public function indexAction()
    {
        return new ViewModel(array(
            'age' => $this->getAge(),
        ));
    }
}
