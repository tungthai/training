<?php
namespace Training\Slideshow\Controller\Adminhtml\Slider;

use Training\Slideshow\Controller\Adminhtml\Slider;

class NewAction extends Slider
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