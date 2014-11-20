<?php
namespace Cv\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;

class CvForm extends Form
{
	public function __construct()
	{
		parent::__construct('cv');
		$this->setAttribute('method', 'post');
		$this->setAttribute('class', 'form-inline');
	    $this->add(array(
			'name' => 'title',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'input-group'
            ),
            'options' => array(
                'label' => 'Name',
            ),
		));

		$this->add(array(
			'name' => 'desc',
            'attributes' => array(
                'type'  => 'textarea',
                'class' => 'input-group'
            ),
            'options' => array(
                'label' => 'Description',
            ),
		));

		$this->add(array(
			'name' => 'latitude',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'input-group'
            ),
            'options' => array(
                'label' => 'Latitude',
            ),
		));

		$this->add(array(
			'name' => 'long',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'input-group'
            ),
            'options' => array(
                'label' => 'Longitude',
            ),
		));

		$this->add(array(
			'name' => 'date',
            'attributes' => array(
                'type'  => 'date',
                'class' => 'input-group',
                'min'  => '1987-12-18',
		        'max'  => date('Y-m-d'),
		        'step' => '1', // days; default step interval is 1 day
            ),
            'options' => array(
                'label' => 'Date',
            ),
		));

		$this->add(array(
			'name' => 'submit',
			'attributes' => array(
				'type'  => 'submit',
				'value' => 'save',
				'class'    => 'input-group btn btn-default'
			),
		));
	}
}