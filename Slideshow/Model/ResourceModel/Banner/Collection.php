<?php

namespace Training\Slidershow\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    * Initialize resource collection
    *
    * @return void
    */
    public function _construct() {
        $this->_init('Training\Slidershow\Model\Banner', 'Training\Slidershow\Model\ResourceModel\Banner');
    }
}