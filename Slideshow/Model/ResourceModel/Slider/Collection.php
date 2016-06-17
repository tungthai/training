<?php

namespace Training\Slideshow\Model\ResourceModel\Slider;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * _contruct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Training\Slideshow\Model\Slider', 'Training\Slideshow\Model\ResourceModel\Slider');
    }
}