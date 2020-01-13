<?php
/**
 
 */
namespace Mageplaza\Productslider\Block\Adminhtml\Config\Field;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
/**
 * Class Responsive
 * @package Mageplaza\Productslider\Block\Adminhtml\Config\Field
 */
class Responsive extends AbstractFieldArray
{
    /**
     * @inheritdoc
     */
    protected function _prepareToRender()
    {
        $this->addColumn('size', ['label' => __('Screen size max'), 'renderer' => false]);
        $this->addColumn('items', ['label' => __('Number of items'), 'renderer' => false]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
}