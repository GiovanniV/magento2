<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */

namespace Born\Shipping\Model;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
class POBoxConfigProvider implements ConfigProviderInterface
{
    const XPATH_DISABLED  = 'pobox/general/disabled';
 
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }
    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $store = $this->getStoreId();
        $disabled = $this->scopeConfig->getValue(self::XPATH_DISABLED, ScopeInterface::SCOPE_STORE, $store);      
      
        return $disabled;
    }
    public function getStoreId()
    {
        return $this->storeManager->getStore()->getStoreId();
    }
}