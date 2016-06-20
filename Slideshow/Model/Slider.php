<?php

namespace Training\Slideshow\Model;

class Slider extends \Magento\Framework\Model\AbstractModel
{

    protected $_sliderCollectionFactory;
    
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Training\Slideshow\Model\ResourceModel\Slider $resource,
        \Training\Slideshow\Model\ResourceModel\Slider\Collection $resourceCollection
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection);
        $this->_sliderCollectionFactory = $resourceCollection;
    }
    
    
    public function getOptionsSlider(){
        $sliderCollection = $this->_sliderCollectionFactory;
        
        $options[] = [
            'value' => '',
            'label' => __('-------- Please select a slider --------'),
        ];
        if(count($sliderCollection) > 0):
            foreach($sliderCollection as $slider){
                $options[] = [
                    'value' => $slider->getId(),
                    'label' =>$slider->getTitle(),
                ];
            }
        endif;
        return $options;
    }

}