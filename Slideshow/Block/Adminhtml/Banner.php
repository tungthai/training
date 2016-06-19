<?php
namespace Training\Slideshow\Block\Adminhtml;

class Banner extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_banner';
        $this->_blockGroup = 'Training_Slideshow';
        $this->_headerText = __('Manage Banner');
        $this->_addButtonLabel = __('Add New Banner');
        
        parent::_construct();
    }
}
?>