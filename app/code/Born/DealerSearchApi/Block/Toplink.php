<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */

namespace Born\DealerSearchApi\Block;

use Magento\Catalog\Model\Product;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Element\Html\Link;

/**
 * Class Toplink
 * @package Born\DealerSearchApi\Block
 */
class Toplink extends Link
{
    
     /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var Product
     */
    private $product;
    /**
     * @var
     */
    protected $scopeConfig;
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Toplink constructor.
     * @param Template\Context $context
     * @param Registry $registry
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
    Template\Context $context,
    Registry $registry,
    StoreManagerInterface $storeManager,
    array $data
    ) {
        $this->registry = $registry;
        $this->scopeConfig = $context->getScopeConfig();
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }


    /**
     * @return Product
     */
    private function getProduct()
    {
        if (is_null($this->product)) {
            $this->product = $this->registry->registry('product');

            if (!$this->product->getId()) {
                throw new LocalizedException(__('Failed to initialize product'));
            }
        }

        return $this->product;
    }

    /**
     * @return mixed
     */
    public function getProductSku()
    {
        return $this->getProduct()->getSku();
    }

    /**
     * @return string|void
     */
    protected function _toHtml()
    {
        if (false != $this->getTemplate()) {
            return parent::_toHtml();
        }
        if ($this->getStoreConfig('locator/general/top_link_label')!='') {
            $label=$this->getStoreConfig('locator/general/top_link_label');
        } else {
            $label=$this->getLabel();
        }
        if ($this->getStoreConfig('locator/general/top_link')>0) {
            return '<p class="dealersearch"><a ' . str_ireplace("dealersearch/", "dealersearch/?productnum=".$this->getProductSku(), $this->getLinkAttributes()).' >' . $this->escapeHtml($label).'</a></p>';
        }
        return;
    }

    /**
     * @return mixed
     */
    public function getStore()
    {
        return $this->storeManager->getStore();
    }
    
    /* Get system store config */
    /**
     * @param $node
     * @param null $storeId
     * @return mixed
     */
    public function getStoreConfig($node, $storeId = null)
    {
        if ($storeId != null) {
            return $this->scopeConfig->getValue($node, ScopeInterface::SCOPE_STORE, $storeId);
        }
        return $this->scopeConfig->getValue($node, ScopeInterface::SCOPE_STORE, $this->getStore()->getId());
    }
}
