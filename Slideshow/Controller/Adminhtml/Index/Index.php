<?php
namespace Training\Slideshow\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;

class Index extends \Magento\Backend\App\Action
{
    
    protected $resultPageFactory;
    protected $nowDateTime;

    public function __construct(Context $context, 
            PageFactory $resultPageFactory, DateTime $datetime) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->nowDateTime = $datetime;
    }
    
    public function execute()
    {
        $date_now = $this->nowDateTime->date();
        $slider = $this->_objectManager->create('Training\Slideshow\Model\Slider');
        $data['title'] = 'First Slider';
        $data['status'] = '1';
        //$data['created_time'] = $date_now;
                
        $slider->setTitle('add Slider');
        $slider->setStatus('1');
        $slider->setCreatedTime($date_now);
        $slider->save();
        $this->getResponse()->setBody('success');

    }
    
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Slideshow::slideshow');
    }
}