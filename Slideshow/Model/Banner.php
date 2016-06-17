<?php

namespace Training\Slideshow\Model;

class Banner extends \Magento\Framework\Model\AbstractModel{
    const STATUS_ENABLE = 'Enable';
    const STATUS_DISABLE = 'Disable';
    
    public function __construct(
            \Magento\Framework\Model\Context $context, 
            \Magento\Framework\Registry $registry, 
            \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
            \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
            array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    
    public function _construct() {
        $this->_init('Training\Slideshow\Model\ResourceModel\Banner');
    }
}