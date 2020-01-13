<?php
/**
 
 */
namespace Mageplaza\Productslider\Controller\Adminhtml;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Mageplaza\Productslider\Model\SliderFactory;
/**
 * Class Slider
 * @package Mageplaza\Productslider\Controller\Adminhtml
 */
abstract class Slider extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'Mageplaza_Productslider::slider';
    /**
     * Slider Factory
     *
     * @var SliderFactory
     */
    protected $_sliderFactory;
    /**
     * Core registry
     *
     * @var Registry
     */
    protected $_coreRegistry;
    /**
     * Slider constructor.
     * @param SliderFactory $sliderFactory
     * @param Registry $coreRegistry
     * @param Context $context
     */
    public function __construct(
        Context $context,
        SliderFactory $sliderFactory,
        Registry $coreRegistry
    ) {
        $this->_sliderFactory = $sliderFactory;
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }
    /**
     * Init Slider
     *
     * @return \Mageplaza\Productslider\Model\Slider
     */
    protected function _initSlider()
    {
        $slider = $this->_sliderFactory->create();
        $sliderId = (int)$this->getRequest()->getParam('id');
        if ($sliderId) {
            $slider->load($sliderId);
        }
        $this->_coreRegistry->register('mageplaza_productslider_slider', $slider);
        return $slider;
    }
}