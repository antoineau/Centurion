<?php

class Core_TestController extends Centurion_Controller_Action
{
    public function formAction()
    {
        $this->_helper->layout->setLayout('admin');

        $form = new Centurion_Form();

        $elements = array(
            array(
                'text'//, $options
            ),
            array(
                'textarea'
            ),
        );

        $decorators = array();

        $options = array('description' => 'Avec description');

        foreach($elements as $element)
        {
            if (!isset($element[1])) {
                $element[1] = array();
            }

            $elementOptions = array_merge($options, $element[1]);

            $form->addElement($element[0], $element[0].'_ok', $element[1]); //options natives
            $form->addElement($element[0], $element[0].'_ko', $element[1]);
            $form->addElement($element[0], $element[0].'_ok_with_desc', $elementOptions); //options spécifiques
            $form->addElement($element[0], $element[0].'_ko_with_desc', $elementOptions);

            $form->getElement($element[0].'_ko')->addError($element[0].'_ko');
            $form->getElement($element[0].'_ko_with_desc')->addError($element[0].'_ko_with_desc');
        }

        $this->view->form = $form;

        $formElements = $form->getElements();
        $this->view->formElementName = array();
        foreach($formElements as $formElement) {
            $this->view->formElementName[] = $formElement->getName();
        }
    }
}