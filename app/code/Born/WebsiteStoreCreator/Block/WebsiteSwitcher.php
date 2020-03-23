<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Block;

use Born\WebsiteStoreCreator\Model\StoreRelation;
use Magento\Framework\Url\Helper\Data as UrlHelper;
use Magento\Store\Block\Switcher;

/**
 * Class WebsiteSwitcher
 * @package Born\WebsiteStoreCreator\Block
 */
class WebsiteSwitcher extends Switcher
{

    /**
     * @var StoreRelation
     */
    private $storeRelation;

    /**
     * WebsiteSwitcher constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Data\Helper\PostHelper $postDataHelper
     * @param StoreRelation $storeRelation
     * @param array $data
     * @param UrlHelper|null $urlHelper
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Data\Helper\PostHelper $postDataHelper,
        StoreRelation $storeRelation,
        array $data = [],
        UrlHelper $urlHelper = null
    ) {
        $this->storeRelation = $storeRelation;
        parent::__construct($context, $postDataHelper, $data, $urlHelper);
    }

    /**
     * @return \Magento\Store\Api\Data\WebsiteInterface[]
     */
    public function getWebsites()
    {
        return $this->_storeManager->getWebsites();
    }

    /**
     * @param \Magento\Store\Api\Data\WebsiteInterface $website
     * @param \Magento\Store\Model\Store $store
     * @param array $data
     * @return string
     */
    public function getTargetWebsitePostData(
        \Magento\Store\Api\Data\WebsiteInterface $website,
        \Magento\Store\Model\Store $store,
        $data = []
    ) {
        $data['___website'] = $website->getCode();

        return $this->_postDataHelper->getPostData(
            $store->getCurrentUrl(true),
            $data
        );
    }

    /**
     * @return null|string
     */
    public function getCurrentShipToNumber()
    {
        return $this->storeRelation->getShipToNumberByWebsiteId($this->getCurrentWebsiteId());
    }

    /**
     * @param \Magento\Store\Api\Data\WebsiteInterface $website
     * @return null|string
     */
    public function getShipToNumberByWebsite(
        \Magento\Store\Api\Data\WebsiteInterface $website
    ) {
        return $this->storeRelation->getShipToNumberByWebsiteId($website->getId());
    }

    /**
     * @param \Magento\Store\Api\Data\WebsiteInterface $website
     * @return mixed
     */
    public function getCountryNameByWebsite(
        \Magento\Store\Api\Data\WebsiteInterface $website
    ) {
        return $this->storeRelation->getCountryNameByWebsiteId($website->getId());
    }

    /**
     * @return mixed
     */
    public function getCurrentWebsiteCountryName()
    {
        return $this->storeRelation->getCountryNameByWebsiteId($this->getCurrentWebsiteId());
    }
}
