<?php
namespace Training\Slideshow\Block\Adminhtml\Banner;
use Training\Slideshow\Model\Status;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_bannerCollection;
    
    
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
            array $data = []
    ) {
        $this->_bannerCollection = $bannerCollection;
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
                'header' => __('Slider ID'),
                'index' => 'banner_id',
            ]
        );
        
        $this->addColumn(
            'Order',
            [
                'header' => __('Order'),
                'index' => 'order',
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
                'header' => __('Edit'),
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
}