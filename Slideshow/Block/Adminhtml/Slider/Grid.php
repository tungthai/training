<?php
namespace Training\Slideshow\Block\Adminhtml\Slider;
use Training\Slideshow\Model\Status;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{

    protected $_sliderCollection;
    
    
    /**
     * [__construct description].
     *
     * @param \Magento\Backend\Block\Template\Context                         $context
     * @param \Magento\Backend\Helper\Data                                    $backendHelper
     * @param \Training\Slideshow\Model\ResourceModel\Slider\Collection       $sliderCollection
     * @param array                                                           $data
     */
    public function __construct(
            \Magento\Backend\Block\Template\Context $context, 
            \Magento\Backend\Helper\Data $backendHelper, 
            \Training\Slideshow\Model\ResourceModel\Slider\Collection $sliderCollection, 
            array $data = []
    ) {
        $this->_sliderCollection = $sliderCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No Slider Found'));
    }
    
    protected function _construct()
    {
        parent::_construct();
        $this->setId('sliderGrid');
        $this->setDefaultSort('slider_id');
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
        $this->setCollection($this->_sliderCollection);
        return parent::_prepareCollection();
    }

    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'slider_id',
            [
                'header' => __('Slider ID'),
                'type' => 'number',
                'index' => 'slider_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id',
            ]
        );
        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'index' => 'title',
                'class' => 'xxx',
                'width' => '50px',
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
                        'field' => 'slider_id',
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