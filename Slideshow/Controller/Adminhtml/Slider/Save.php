<?php

namespace Training\Slideshow\Controller\Adminhtml\Slider;

use Training\Slideshow\Controller\Adminhtml\Slider;

class Save extends Slider {

    /**
     * @return void
     */
    public function execute() {
        $formData = $this->getRequest()->getPost();

        if ($formData) {
            $sliderModel = $this->_sliderFactory->create();
            $sliderId = $this->getRequest()->getParam('id');

            if ($sliderId) {
                $sliderModel->load($sliderId);
                $sliderModel->setUpdatedTime($this->_dateNow->date());
            } else {
                $sliderModel->setCreatedTime($this->_dateNow->date());
            }

            $sliderModel->setTitle(trim($formData['title']));
            $sliderModel->setStatus(trim($formData['status']));

            try {
                $sliderModel->save();

                // Display success message
                $this->messageManager->addSuccess(__('The news has been saved.'));

                // Check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['id' => $sliderModel->getId(), '_current' => true]);
                    return;
                }

                // Go to grid page
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['id' => $sliderId]);
        }
    }

}
