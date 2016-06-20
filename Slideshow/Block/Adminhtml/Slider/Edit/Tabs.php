<?php


namespace Training\Slideshow\Block\Adminhtml\Slider\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;
 
class Tabs extends WidgetTabs {
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('slider_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Slider Information'));
    }
 
    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'slider_section',
            [
                'label' => __('Slider'),
                'title' => __('Slider'),
                'content' => $this->getLayout()->createBlock(
                    'Training\Slideshow\Block\Adminhtml\Slider\Edit\Tab\Slider'
                )->toHtml(),
                'active' => true
            ]
        );
        $this->addTab(
            'banner_section',
            [
                'label' => __('Banner of Slider'),
                'title' => __('Banner of Slider'),
                'content' => $this->getLayout()->createBlock(
                    'Training\Slideshow\Block\Adminhtml\Banner'
                )->setTemplate('Training_Slideshow::banner/grid.phtml')->toHtml()
            ]
        );
 
        return parent::_beforeToHtml();
    }
}
