<?php
namespace Training\Slideshow\Controller\Adminhtml\Slider;

use Magento\Backend\App\Action\Context;
use Training\Slideshow\Controller\Adminhtml\Slider;

class Index extends Slider
{
    
    public function execute()
    {
//        if ($this->getRequest()->getQuery('ajax')) {
//            $this->_forward('grid');
//            return;
//        }
        
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Training_Slideshow::slider');
        $resultPage->addBreadcrumb(__('Slideshow'),__('Slideshow'));
        $resultPage->addBreadcrumb(__('Manage Banner'), __('Manage Slider'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Slider'));
        return $resultPage;
    }
    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Slideshow::slider');
    }
}