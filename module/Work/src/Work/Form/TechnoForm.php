<?php
namespace Work\Form;

use Zend\Form\Form;
use Zend\Form\Fieldset;

class TechnoForm extends Form
{
    public function __construct($references)
    {
        parent::__construct('techno', $references);
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
            'name' => 'imagefilename',
            'attributes' => array(
                'type'  => 'text',
                'class' => 'input-group'
            ),
            'options' => array(
                'label' => 'Image File Name ',
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

        if(count($references) >= 1) {
            $this->add(array(
                'type' => 'Zend\Form\Element\Select',
                'attributes' => array(
                    'multiple' => 'multiple',
                ),
                // NOTE the addition of "[]" to the name:
                'name' => 'references',
                'options' => array(
                    'label' => 'References',
                    'empty_option' => 'Please choose some References',
                    'value_options' => $references,
                ),
            ));
        }

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