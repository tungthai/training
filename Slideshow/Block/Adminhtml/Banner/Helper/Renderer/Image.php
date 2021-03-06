<?php

namespace Training\Slideshow\Block\Adminhtml\Banner\Helper\Renderer;

class Image extends \Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer
{
    /**
     * Store manager.
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * banner factory.
     *
     * @var \Magestore\Bannerslider\Model\BannerFactory
     */
    protected $_bannerFactory;
    
    
    protected $_bannerModel;

    /**
     * [__construct description].
     *
     * @param \Magento\Backend\Block\Context              $context
     * @param \Magento\Store\Model\StoreManagerInterface  $storeManager
     * @param \Magestore\Bannerslider\Model\BannerFactory $bannerFactory
     * @param array                                       $data
     */
    public function __construct(
        \Magento\Backend\Block\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Training\Slideshow\Model\BannerFactory $bannerFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_storeManager = $storeManager;
        $this->_bannerFactory = $bannerFactory;
    }

    /**
     * Render action.
     *
     * @param \Magento\Framework\DataObject $row
     *
     * @return string
     */
    public function render(\Magento\Framework\DataObject $row)
    {
        $banner = $this->_bannerFactory->create()->load($row->getId());
        if($banner->getImage() != ''){
            $srcImage = $this->_storeManager->getStore()->getBaseUrl(
                    \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                ) .'/'. $banner->getImage();

            return '<image style="max-width:120px; max-height: 70px;" src ="'.$srcImage.'" alt="'.$banner->getImage().'" >';
        }
        return '';
    }
}