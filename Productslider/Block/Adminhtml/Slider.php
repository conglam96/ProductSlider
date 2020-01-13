<?php
/**
 
 */
namespace Mageplaza\Productslider\Block\Adminhtml;
use Magento\Backend\Block\Widget\Grid\Container;
/**
 * Class Slider
 * @package Mageplaza\Productslider\Block\Adminhtml
 */
class Slider extends Container
{
    /**
     * constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_slider';
        $this->_blockGroup = 'Mageplaza_Productslider';
        $this->_headerText = __('Sliders');
        $this->_addButtonLabel = __('Create New Slider');
        parent::_construct();
    }
}