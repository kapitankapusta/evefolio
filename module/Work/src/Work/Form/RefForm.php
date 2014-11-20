<?php
namespace Work\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;

class RefForm extends Form
{
    public function __construct()
    {
        parent::__construct('ref');
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
            'name' => 'date',
            'attributes' => array(
                'type'  => 'date',
                'class' => 'input-group',
                'min'  => '2000-12-18',
                'max'  => date('Y-m-d'),
                'step' => '1', // days; default step interval is 1 day
            ),
            'options' => array(
                'label' => 'Date',
            ),
        ));

        $this->add(array(
            'name' => 'webpage',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'input-group'
            ),
            'options' => array(
                'label' => 'Webpage',
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