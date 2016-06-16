<?php

namespace Training\Slideshow\Model\ResourceModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    
    public function _construct() {
        $this->_init('training_slideshow_banner','banner_id');
    }
}