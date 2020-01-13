<?php
/**
 
 */
namespace Mageplaza\Productslider\Block;
use Zend_Db_Expr;
/**
 * Class OnSaleProduct
 * @package Mageplaza\Productslider\Block
 */
class OnSaleProduct extends AbstractSlider
{
    /**
     * @inheritdoc
     */
    public function getProductCollection()
    {
        $visibleProducts = $this->_catalogProductVisibility->getVisibleInCatalogIds();
        $collection = $this->_productCollectionFactory->create()->setVisibility($visibleProducts);
        $collection = $this->_addProductAttributesAndPrices($collection)
            ->addAttributeToFilter(
                'special_from_date',
                ['date' => true, 'to' => $this->getEndOfDayDate()],
                'left'
            )->addAttributeToFilter(
                'special_to_date',
                ['or' => [0 => ['date' => true,
                                                   'from' => $this->getStartOfDayDate()],
                                             1 => ['is' => new Zend_Db_Expr(
                                                 'null'
                                             )],]],
                'left'
            )->addAttributeToSort(
                'news_from_date',
                'desc'
            )->addStoreFilter($this->getStoreId())->setPageSize(
                $this->getProductsCount()
            );
        return $collection;
    }
}