<?php

namespace Training\Slideshow\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * _contruct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Training\Slideshow\Model\Banner', 'Training\Slideshow\Model\ResourceModel\Banner');
    }
}