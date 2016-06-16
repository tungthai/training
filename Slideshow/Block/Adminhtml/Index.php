<?php
namespace Packt\HelloWorld\Block\Adminhtml;

class Index extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'Training_Slideshow';
        $this->_controller = 'adminhtml_slideshow';
        parent::_construct();
    }
}
?>