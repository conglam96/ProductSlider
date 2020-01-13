<?php
/**
 
 */
namespace Mageplaza\Productslider\Model\Config\Source;
/**
 * Class ProductTypeWidget
 * @package Mageplaza\Productslider\Model\Config\Source
 */
class ProductTypeWidget extends ProductType
{
    /**
     * @return array
     */
    public function toArray()
    {
        $options = parent::toArray();
        unset($options[self::CATEGORY]);
        unset($options[self::CUSTOM_PRODUCTS]);
        return $options;
    }
}