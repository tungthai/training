<?php

namespace Training\Slideshow\Model;

class Banner extends \Magento\Framework\Model\AbstractModel
{

    protected $_bannerCollectionFactory;
    
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Training\Slideshow\Model\ResourceModel\Banner $resource,
        \Training\Slideshow\Model\ResourceModel\Banner\Collection $resourceCollection
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection);
        $this->_bannerCollectionFactory = $resourceCollection;
    }
    
}