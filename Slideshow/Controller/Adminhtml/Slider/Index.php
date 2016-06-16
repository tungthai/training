    <?php
namespace Training\Slideshow\Controller\Adminhtml\Slider;

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
        
        $resultPage->setActiveMenu('Training_Slideshow::slider');
        $resultPage->addBreadcrumb(__('Slideshow'),__('Slideshow'));
        $resultPage->addBreadcrumb(__('Manage Slider'), __('Manage Slider'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Slider'));
        
        return $resultPage;
    }
    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Slideshow::slider');
    }
}