<?php

class Core_TestController extends Centurion_Controller_Action
{
    public function formAction()
    {
        $this->_helper->layout->setLayout('admin');

        $form = new Centurion_Form();

        $elements = array(
            array(
                'text', //type
                'texte', //name
                //$options
            ),
            array(
                'textarea',
            ),
            array(
                'rte',
            ),
            array(
                'datepicker',
            ),
            array(
                'datetimepicker',
            ),
            array(
                'timepicker',
            ),
            array(
                'radio',
            ),
        );

        $options = array('description' => 'Field Description');

        foreach($elements as $element)
        {
            //Element name
            if (!isset($element[1])) {
                $element[1] = $element[0];
            }

            //Element option
            if (!isset($element[2])) {
                $element[2] = array();
            }

            //Merging options
            $elementOptions = array_merge($options, $element[2]);

            $form->addElement($element[0], $element[1].'_ok', $element[2]); //options natives
            $form->addElement($element[0], $element[1].'_ko', $element[2]);
            $form->addElement($element[0], $element[1].'_ok_with_desc', $elementOptions); //options spécifiques
            $form->addElement($element[0], $element[1].'_ko_with_desc', $elementOptions);

            $form->getElement($element[1].'_ko')->addError('Error Message : '.$element[1].' : ko');
            $form->getElement($element[1].'_ko_with_desc')->addError('Error Message : '.$element[1].' : ko with desc');
        }

        $this->view->form = $form;

        $formElements = $form->getElements();
        $this->view->formElementName = array();
        foreach($formElements as $formElement) {
            $this->view->formElementName[] = $formElement->getName();
        }
    }
}