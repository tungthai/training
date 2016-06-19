<?php
 
namespace Training\Slideshow\Controller\Adminhtml\Banner;
 
use Training\Slideshow\Controller\Adminhtml\Banner;
 
class Edit extends Banner
{
   /**
     * @return void
     */
   public function execute()
   {
      $slideId = $this->getRequest()->getParam('banner_id');
      
        /** @var \Training\Slideshow\Model\Banner $model */
        $model = $this->_bannerFactory->create();
 
        if ($slideId) {
            $model->load($slideId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This banner no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
 
        // Restore previously entered form data from session
        $data = $this->_session->getBannerData(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->_coreRegistry->register('slideshow_banner', $model);
        
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Training_Slideshow::banner');
        $resultPage->getConfig()->getTitle()->prepend(__('Banner'));
 
        return $resultPage;
   }
}