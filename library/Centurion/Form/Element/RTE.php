<?php
/**
 * Centurion
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@centurion-project.org so we can send you a copy immediately.
 *
 * @category    Centurion
 * @package     Centurion_Form
 * @subpackage  Element
 * @copyright   Copyright (c) 2008-2011 Octave & Octave (http://www.octaveoctave.com)
 * @license     http://centurion-project.org/license/new-bsd     New BSD License
 * @version     $Id$
 */

/**
 * @category    Centurion
 * @package     Centurion_Form
 * @subpackage  Element
 * @copyright   Copyright (c) 2008-2011 Octave & Octave (http://www.octaveoctave.com)
 * @license     http://centurion-project.org/license/new-bsd     New BSD License
 * @author      Duong Antoine AU <antoine.au@gmail.com>
 */

/**
 * This class allows you to create a RTE textarea field
 */
class Centurion_Form_Element_RTE extends Zend_Form_Element_Textarea
{
    /**
     * If an element can be display or not in a group
     * @var array
     */
    protected $_isAllowedPlacement = array('main', 'header');

    protected $_defaultOptions = array(
        'class' => 'field-rte',
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
