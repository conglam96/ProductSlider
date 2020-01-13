<?php
/**
 
 */
namespace Mageplaza\Productslider\Model\ResourceModel\Slider;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
/**
 * Class Collection
 * @package Mageplaza\Productslider\Model\ResourceModel\Slider
 */
class Collection extends AbstractCollection
{
    /**
     * ID Field Name
     *
     * @var string
     */
    protected $_idFieldName = 'slider_id';
    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'mageplaza_productslider_slider_collection';
    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'slider_collection';
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mageplaza\Productslider\Model\Slider', 'Mageplaza\Productslider\Model\ResourceModel\Slider');
    }
}