<?php

namespace Training\Slideshow\Controller\Adminhtml\Banner;

use Training\Slideshow\Controller\Adminhtml\Banner;
use Magento\Framework\App\Filesystem\DirectoryList;

class Save extends Banner {

    /**
     * @return void
     */
    public function execute() {
        $resultRedirect = $this->_resultRedirectFactory->create();
        
        $formData = $this->getRequest()->getPostValue();

        if ($formData) {
            $bannerModel = $this->_bannerFactory->create();
            $bannerId = $this->getRequest()->getParam('banner_id');

            if ($bannerId) {
                $bannerModel->load($bannerId);
                $bannerModel->setUpdatedTime($this->_dateNow->date());
            } else {
                $bannerModel->setCreatedTime($this->_dateNow->date());
            }
            
            $imageRequest = $this->getRequest()->getFiles('image');
            if ($imageRequest) {
                if (isset($imageRequest['name'])) {
                    $fileName = $imageRequest['name'];
                } else {
                    $fileName = '';
                }
            } else {
                $fileName = '';
            }
            if ($imageRequest && strlen($fileName)) {
                /*
                 * Save image upload
                 */
                try {
                    $uploader = $this->_objectManager->create(
                        'Magento\MediaStorage\Model\File\Uploader',
                        ['fileId' => 'image']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);

                    /** @var \Magento\Framework\Image\Adapter\AdapterInterface $imageAdapter */
                    $imageAdapter = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')->create();

                    $uploader->addValidateCallback('banner_image', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);

                    /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
                    $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')->getDirectoryRead(DirectoryList::MEDIA);
                    $result = $uploader->save($mediaDirectory->getAbsolutePath(\Training\Slideshow\Model\Banner::MEDIA_PATH));
                    $formData['image'] = \Training\Slideshow\Model\Banner::MEDIA_PATH . $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            }else{
                if (isset($formData['image']) && isset($formData['image']['value'])) {
                    if (isset($formData['image']['delete'])) {
                        $formData['image'] = null;
                        $formData['delete_image'] = true;
                    } elseif (isset($formData['image']['value'])) {
                        $formData['image'] = $formData['image']['value'];
                    } else {
                        $formData['image'] = null;
                    }
                }
            }

            $bannerModel->setData($formData);
            
            try {
                $bannerModel->save();

                $this->messageManager->addSuccess(__('The banner has been saved.'));
                $this->_getSession()->setFormData(false);

            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                $this->messageManager->addException($e, __('Something went wrong while saving the banner.'));
            }

            $this->_getSession()->setFormData($formData);
            $this->_redirect('*/*/edit', ['banner_id' => $bannerId]);
        }
        return $resultRedirect->setPath('*/*/');
    }

}
