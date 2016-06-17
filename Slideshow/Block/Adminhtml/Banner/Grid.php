<?php
namespace Training\Slideshow\Block\Adminhtml\Slider;

use Magento\Backend\Block\Widget\Grid as WidgetGrid;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_sliderCollection;
    
    
    /**
     * [__construct description].
     *
     * @param \Magento\Backend\Block\Template\Context                         $context
     * @param \Magento\Backend\Helper\Data                                    $backendHelper
     * @param \Training\Slideshow\Model\ResourceModel\Slider\Collection $sliderCollectionFactory
     * @param array                                                           $data
     */
    public function __construct(
            \Magento\Backend\Block\Template\Context $context, 
            \Magento\Backend\Helper\Data $backendHelper, 
            \Training\Slideshow\Model\ResourceModel\Banner\Collection $sliderCollection, 
            array $data = []
    ) {
        $this->_sliderCollection = $sliderCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Slider Found'));
    }
    
}