<?php
/**
 
 */
namespace Mageplaza\Productslider\Block;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Wishlist\Model\ResourceModel\Item\CollectionFactory as WishlistCollectionFactory;
use Mageplaza\Productslider\Helper\Data;
/**
 * Class FeaturedProducts
 * @package Mageplaza\Productslider\Block
 */
class WishlistProducts extends AbstractSlider
{
    /**
     * @var WishlistCollectionFactory
     */
    protected $_wishlistCollectionFactory;
    /**
     * WishlistProducts constructor.
     * @param Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param Visibility $catalogProductVisibility
     * @param DateTime $dateTime
     * @param Data $helperData
     * @param HttpContext $httpContext
     * @param WishlistCollectionFactory $wishlistCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,
        Visibility $catalogProductVisibility,
        DateTime $dateTime,
        Data $helperData,
        HttpContext $httpContext,
        WishlistCollectionFactory $wishlistCollectionFactory,
        array $data = []
    ) {
        $this->_wishlistCollectionFactory = $wishlistCollectionFactory;
        parent::__construct($context, $productCollectionFactory, $catalogProductVisibility, $dateTime, $helperData, $httpContext, $data);
    }
    /**
     * @inheritdoc
     */
    public function getProductCollection()
    {
        $collection = [];
        if ($this->_customer->isLoggedIn()) {
            $wishlist = $this->_wishlistCollectionFactory->create()
                ->addCustomerIdFilter($this->_customer->getCustomerId());
            $productIds = null;
            foreach ($wishlist as $product) {
                $productIds[] = $product->getProductId();
            }
            $collection = $this->_productCollectionFactory->create()->addIdFilter($productIds);
            $collection = $this->_addProductAttributesAndPrices($collection)->addStoreFilter($this->getStoreId())->setPageSize($this->getProductsCount());
        }
        return $collection;
    }
}