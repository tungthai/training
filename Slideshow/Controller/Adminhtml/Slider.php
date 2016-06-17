<?php
 
namespace Training\Slideshow\Controller\Adminhtml;
 
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Training\Slideshow\Model\SliderFactory;
 
abstract class Slider extends \Magento\Backend\App\Action
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
     * Slider model factory
     *
     * @var \Training\Slideshow\Model\Sliderr
     */
    protected $_sliderFactory;
    
    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param PageFactory $resultPageFactory
     * @param SliderFactory $sliderFactory
     */
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        SliderFactory $sliderFactory,
        DateTime $dateNow
    ) {
        parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_sliderFactory = $sliderFactory;
        $this->_dateNow = $dateNow;
    }
 
    /**
     * Slider access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Slideshow::slider');
    }
}