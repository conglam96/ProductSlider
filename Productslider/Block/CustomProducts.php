<?php
/**
 
 */
namespace Mageplaza\Productslider\Block;
/**
 * Class CustomProducts
 * @package Mageplaza\Productslider\Block
 */
class CustomProducts extends AbstractSlider
{
    /**
     * @return $this|mixed
     */
    public function getProductCollection()
    {
        $productIds = $this->getSlider()->getProductIds();
        if (!is_array($productIds)) {
            $productIds = explode('&', $productIds);
        }
        $collection = $this->_productCollectionFactory->create()
            ->addIdFilter($productIds)
            ->setPageSize($this->getProductsCount());
        $this->_addProductAttributesAndPrices($collection);
        return $collection;
    }
}