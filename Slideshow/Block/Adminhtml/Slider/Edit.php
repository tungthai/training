<?php
namespace Training\Slideshow\Block\Adminhtml\Slider;

use Magento\Backend\Block\Widget\Form\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class Edit extends Container
{

   /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;
 
    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }
 
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_slider';
        $this->_blockGroup = 'Training_Slideshow';
 
        parent::_construct();
 
        $this->buttonList->update('save', 'label', __('Save'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ]
                    ]
                ]
            ],
            -100
        );
        $this->buttonList->update('delete', 'label', __('Delete'));
    }
    
    /**
     * Retrieve text for header element depending on loaded slider
     * 
     * @return string
     */
    public function getHeaderText()
    {
        $sliderRegistry = $this->_coreRegistry->registry('slideshow_slider');
        if ($sliderRegistry->getId()) {
            $sliderTitle = $this->escapeHtml($sliderRegistry->getTitle());
            return __("Edit Slider '%1'", $sliderTitle);
        } else {
            return __('Add Slider');
        }
    }
    
    protected function _prepareLayout()
    {
        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('post_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'post_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'post_content');
                }
            };
        ";
 
        return parent::_prepareLayout();
    }
    
    
    public function getSlider()
    {
        return $this->_coreRegistry->registry('slider');
    }
    
    /**
     * Retrieve the save and continue edit Url.
     *
     * @return string
     */
//    protected function _getSaveAndContinueUrl()
//    {
//        return $this->getUrl(
//            '*/*/save',
//            ['_current' => true, 'back' => 'edit', 'tab' => '{{tab_id}}']
//        );
//    }
}

