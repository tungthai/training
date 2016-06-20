<?php
 
namespace Training\Slideshow\Controller\Adminhtml;
 
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Training\Slideshow\Model\BannerFactory;
 
abstract class Banner extends \Magento\Backend\App\Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;
    
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_dateNow;
 
    /**
     * Result page factory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
 
    /**
     * Banner model factory
     *
     * @var \Training\Slideshow\Model\Banner
     */
    protected $_bannerFactory;
    
    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $_resultRedirectFactory;
     
    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param BannerFactory $bannerFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        BannerFactory $bannerFactory,
        DateTime $dateNow
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_bannerFactory = $bannerFactory;
        $this->_dateNow = $dateNow;
        $this->_resultRedirectFactory = $context->getResultRedirectFactory();
    }
 
    /**
     * Banner access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Slideshow::banner');
    }
}