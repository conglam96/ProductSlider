<?php
/**
 
 */
namespace Mageplaza\Productslider\Block;
use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Mageplaza\Productslider\Helper\Data;
use Mageplaza\Productslider\Model\ResourceModel\Report\Product\CollectionFactory as MostViewedCollectionFactory;
/**
 * Class MostViewedProducts
 * @package Mageplaza\Productslider\Block
 */
class MostViewedProducts extends AbstractSlider
{
    /**
     * @var MostViewedCollectionFactory
     */
    protected $_mostViewedProductsFactory;
    /**
     * MostViewedProducts constructor.
     * @param Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param Visibility $catalogProductVisibility
     * @param DateTime $dateTime
     * @param Data $helperData
     * @param HttpContext $httpContext
     * @param MostViewedCollectionFactory $mostViewedProductsFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,
        Visibility $catalogProductVisibility,
        DateTime $dateTime,
        Data $helperData,
        HttpContext $httpContext,
        MostViewedCollectionFactory $mostViewedProductsFactory,
        array $data = []
    ) {
        $this->_mostViewedProductsFactory = $mostViewedProductsFactory;
        parent::__construct($context, $productCollectionFactory, $catalogProductVisibility, $dateTime, $helperData, $httpContext, $data);
    }
    /**
     * Get Product Collection of MostViewed Products
     * @return mixed
     */
    public function getProductCollection()
    {
        $collection = $this->_mostViewedProductsFactory->create()
            ->addAttributeToSelect('*')
            ->setStoreId($this->getStoreId())->addViewsCount()
            ->addStoreFilter($this->getStoreId())
            ->setPageSize($this->getProductsCount());
        return $collection;
    }
}