<?php
 
namespace Training\Slideshow\Controller\Adminhtml\Slider;
 
use Training\Slideshow\Controller\Adminhtml\Slider;
 
class Edit extends Slider
{
   /**
     * @return void
     */
   public function execute()
   {
      $slideId = $this->getRequest()->getParam('id');
      
        /** @var \Training\Slideshow\Model\Slider $model */
        $model = $this->_sliderFactory->create();
 
        if ($slideId) {
            $model->load($slideId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This slider no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
 
        // Restore previously entered form data from session
        $data = $this->_session->getSliderData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('slideshow_slider', $model);
 
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Training_Slideshow::slider');
        $resultPage->getConfig()->getTitle()->prepend(__('Slider'));
 
        return $resultPage;
   }
}