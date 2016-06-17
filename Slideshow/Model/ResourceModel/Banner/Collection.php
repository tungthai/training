<?php

namespace Training\Slideshow\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    * Initialize resource collection
    *
    * @return void
    */
    public function _construct() {
        $this->_init('Training\Slideshow\Model\Banner', 'Training\Slideshow\Model\ResourceModel\Banner');
    }
}