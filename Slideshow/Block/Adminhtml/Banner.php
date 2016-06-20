<?php
namespace Training\Slideshow\Block\Adminhtml;

class Banner extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected $_media_path;
    
    protected function _construct()
    {
        $this->_controller = 'adminhtml_banner';
        $this->_blockGroup = 'Training_Slideshow';
        $this->_headerText = __('Manage Banner');
        $this->_addButtonLabel = __('Add New Banner');
        $this->_media_path = 'Training\Slideshow\Model\File\Uploader';
        parent::_construct();
    }
    
    public function getMediaPath(){
        return $this->_media_path;
    }
}
?>