<?php

class Centurion_Form_Element_OnOff extends Zend_Form_Element_Select
{
    /**
     * If an element can be display or not in a group
     * @var array
     */
    protected $_isAllowedPlacement = array('aside');

    protected $_defaultOptions = array(
        'class' => 'field-switcher',
        'multiOptions' => array('0' => 'Off', '1' => 'On')
    );

    public function __construct($spec, $options = null)
    {
        $options = array_merge($options, $this->_defaultOptions);
        return parent::__construct($spec, $options);
    }

    /**
     * Return the allowed placement of the element
     * @return array
     */
    public function getAllowedPlacement()
    {
        return $this->_isAllowedPlacement;
    }

    /**
     * Return if an element is allowed to be display
     * @param string $placement
     * @return bool
     * @throws Centurion_Model_Exception
     */
    public function isAllowedPlacement($placement)
    {
        if (!is_string($placement)) {
            throw new Centurion_Form_Exception('placement has to be a string type.');
        } else {
            if (!in_array($placement, $this->getAllowedPlacement())) {
                throw new Centurion_Form_Exception('This type of field "'.$this->getType().'" (Element name : '.$this->getName().') is not allowed to be display in "'.$placement.'" display group.');
            } else {
                return true;
            }
        }

    }
}