<?php

namespace Training\Slideshow\Controller\Adminhtml\Banner;

use Training\Slideshow\Controller\Adminhtml\Banner;

class Save extends Banner {

    /**
     * @return void
     */
    public function execute() {
        $formData = $this->getRequest()->getPost();

        if ($formData) {
            $bannerModel = $this->_bannerFactory->create();
            $bannerId = $this->getRequest()->getParam('id');

            if ($bannerId) {
                $bannerModel->load($bannerId);
                $bannerModel->setUpdatedTime($this->_dateNow->date());
            } else {
                $bannerModel->setCreatedTime($this->_dateNow->date());
            }

            $bannerModel->setTitle(trim($formData['title']));
            $bannerModel->setStatus(trim($formData['status']));

            try {
                // Save news
                $bannerModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $bannerModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $bannerId]);
        }
    }

}
