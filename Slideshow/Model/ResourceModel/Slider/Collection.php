<?php

namespace Training\Slidershow\Model\ResourceModel\Slider;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
    * Initialize resource collection
    *
    * @return void
    */
    public function _construct() {
        $this->_init('Training\Slidershow\Model\Slider', 'Training\Slidershow\Model\ResourceModel\Slider');
    }
}