<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $socialConfig = null;

	private function getSocialConfig()
	{
		return $this->socialConfig;
	}

    public function setSocialConfig($config)
    {
        $this->socialConfig = $config;
    }

    public function indexAction()
    {
    	$social = $this->getSocialConfig();

        return new ViewModel(array(
        	'social' => $social
        ));
    }
}
