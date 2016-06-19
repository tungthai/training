<?php
namespace Training\Slideshow\Controller\Adminhtml\Banner;

use Training\Slideshow\Controller\Adminhtml\Banner;

class NewAction extends Banner
{

    /**
     * Create new slider action
     *
     * @return void
     */
   public function execute()
   {
      $this->_forward('edit');
   }

}