<?php

namespace Training\Slideshow\Model\ResourceModel;

class Slider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    
    public function _construct() {
        $this->_init('training_slideshow_slider','slider_id');
    }
}