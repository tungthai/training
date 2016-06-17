<?php
namespace Training\Slideshow\Block\Adminhtml;

class Slider extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_slider';
        $this->_blockGroup = 'Training_Slideshow';
        $this->_headerText = __('Manage Slider');
        $this->_addButtonLabel = __('Add New Slider');
        
        parent::_construct();
    }
}
?>