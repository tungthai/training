<?php

namespace Training\Slideshow\Block\Adminhtml\Banner\Edit\Tab;
 
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Training\Slideshow\Model\Status;
use Training\Slideshow\Model\Slider;

class Form extends Generic implements TabInterface
{

    protected $_sliderFactory;


    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Slider $sliderFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Slider $sliderFactory,
        array $data = []
    ) {
        $this->_sliderFactory = $sliderFactory;
        parent::__construct($context, $registry, $formFactory, $data);
    }
 
    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
       /** @var $model \Training\Slideshow\Model\Banner */
        $model = $this->_coreRegistry->registry('slideshow_banner');
 
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
//        $form->setHtmlIdPrefix('banner_');
 
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Banner Information')]
        );
        
        if ($model->getId()) {
            $fieldset->addField('banner_id', 'hidden', ['name' => 'banner_id']);
        }
        
        $fieldset->addField(
                'slider_id',
                'select',
                [
                    'label' => __('Slider'),
                    'name' => 'slider_id',
                    'values' => $this->_sliderFactory->getOptionsSlider(),
                ]
        );
        
        $fieldset->addField(
            'image',
            'image',
            [
                'title' => __('Banner Image'),
                'label' => __('Banner Image'),
                'name'  => 'image',
                'note'  => 'Allow image type: jpg, jpeg, gif, png',
            ]
        );
        
        $fieldset->addField(
            'url',
            'text',
            [
                'title' => __('URL'),
                'label' => __('URL'),
                'name'  => 'url',
            ]
        );
        
        $fieldset->addField(
            'order_banner',
            'text',
            [
                'name'      => 'order_banner',
                'label'     => __('Order'),
                'type'      => 'number',
                'class'     => 'validate-number validate-greater-than-zero',
                'maxlength' => 2,
                'style'     => 'width: 50px'
            ]
        );
        
        
        $fieldset->addField(
            'status',
            'select',
            [
                'name'      => 'status',
                'label'     => __('Status'),
                'options'   => Status::getAvailableStatuses()
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
 
    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Banner Info');
    }
 
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Banner Info');
    }
 
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
 
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}