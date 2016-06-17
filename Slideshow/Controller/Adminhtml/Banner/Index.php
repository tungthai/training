<?php
namespace Training\Slideshow\Controller\Adminhtml\Banner;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    
    protected $resultPageFactory;

    public function __construct( Context $context, PageFactory $resultPageFactory) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        
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