<?php
namespace Training\Slideshow\Block\Adminhtml\Banner;
use Training\Slideshow\Model\Status;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_bannerCollection;
    protected $_sliderCollection;
    
    /**
     * [__construct description].
     *
     * @param \Magento\Backend\Block\Template\Context                         $context
     * @param \Magento\Backend\Helper\Data                                    $backendHelper
     * @param \Training\Slideshow\Model\ResourceModel\Banner\Collection       $bannerCollection
     * @param array                                                           $data
     */
    public function __construct(
            \Magento\Backend\Block\Template\Context $context, 
            \Magento\Backend\Helper\Data $backendHelper, 
            \Training\Slideshow\Model\ResourceModel\Banner\Collection $bannerCollection,
            \Training\Slideshow\Model\ResourceModel\Slider\CollectionFactory $sliderCollectionFactory,
            array $data = []
    ) {
        $this->_bannerCollection = $bannerCollection;
        $this->_sliderCollection = $sliderCollectionFactory;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Banner Found'));
    }
    
    protected function _construct()
    {
        parent::_construct();
        $this->setId('bannerGrid');
        $this->setDefaultSort('banner_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }
    
    /**
     * prepare collection.
     *
     * @return [type] [description]
     */
    protected function _prepareCollection()
    {
        $this->setCollection($this->_bannerCollection);
        return parent::_prepareCollection();
    }

    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'banner_id',
            [
                'header' => __('Banner ID'),
                'type' => 'number',
                'index' => 'banner_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
            ]
        );
        $this->addColumn(
            'slider_id',
            [
                'header' => __('Slide'),
                'index' => 'slider_id',
                'type'    => 'options',
                'options' => $this->getSliderAvailableOption(),
            ]
        );
        
        $this->addColumn(
            'image',
            [
                'header' => __('Image'),
                'class' => 'xxx',
                'width' => '50px',
                'filter' => false,
                'renderer' => 'Training\Slideshow\Block\Adminhtml\Banner\Helper\Renderer\Image',
            ]
        );
        
        $this->addColumn(
            'order_banner',
            [
                'header' => __('Order'),
                'index' => 'order_banner',
            ]
        );

        $this->addColumn(
            'status',
            [
                'header' => __('Status'),
                'index' => 'status',
                'type' => 'options',
                'options' => Status::getAvailableStatuses(),
            ]
        );

        $this->addColumn(
            'edit',
            [
                'header' => __('Action'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' => [
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit',
                        ],
                        'field' => 'banner_id',
                    ],
                ],
                'filter' => false,
                'sortable' => false,
                'index' => 'stores',
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action',
            ]
        );

        return parent::_prepareColumns();
    }
    
    public function getSliderAvailableOption()
    {
        $options = [];
        $sliderCollection = $this->_sliderCollection->create()->addFieldToSelect(['title']);

        foreach ($sliderCollection as $slider) {
            $options[$slider->getId()] = $slider->getTitle();
        }

        return $options;
    }
}