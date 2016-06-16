<?php
namespace Packt\HelloWorld\Block\Adminhtml;

class Banner extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Training_Slideshow';
        $this->_controller = 'adminhtml_slideshow_banner';
        parent::_construct();
    }
}
?>