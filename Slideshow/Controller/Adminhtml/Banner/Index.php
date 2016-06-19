<?php
namespace Training\Slideshow\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Training\Slideshow\Controller\Adminhtml\Banner;

class Index extends Banner
{
    
    public function execute()
    {
//        if ($this->getRequest()->getQuery('ajax')) {
//            $this->_forward('grid');
//            return;
//        }
        
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Training_Slideshow::banner');
        $resultPage->addBreadcrumb(__('Slideshow'),__('Slideshow'));
        $resultPage->addBreadcrumb(__('Manage Banner'), __('Manage Banner'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Banner'));
        return $resultPage;
    }
    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Slideshow::banner');
    }
}