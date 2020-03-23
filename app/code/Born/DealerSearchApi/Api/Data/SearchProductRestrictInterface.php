<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictExtensionInterface;

interface SearchProductRestrictInterface extends ExtensibleDataInterface
{
    const DEALER_CUST_NUMB = 'dealer_cust_numb';
    const PRODUCT_NUM = 'product_num';
    const SEARCH_PRODUCT_RESTRICT_ID = 'search_product_restrict_id';
    const ACTION = 'action';

    /**
     * Get search_product_restrict_id
     * @return string|null
     */
    public function getSearchProductRestrictId();

    /**
     * Set search_product_restrict_id
     * @param string $searchProductRestrictId
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setSearchProductRestrictId($searchProductRestrictId);

    /**
     * Get action
     * @return string|null
     */
    public function getAction();

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setAction($action);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchProductRestrictExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchProductRestrictExtensionInterface $extensionAttributes);

    /**
     * Get dealer_cust_numb
     * @return string|null
     */
    public function getDealerCustNumb();

    /**
     * Set dealer_cust_numb
     * @param string $dealerCustNumb
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setDealerCustNumb($dealerCustNumb);

    /**
     * Get product_num
     * @return string|null
     */
    public function getProductNum();

    /**
     * Set product_num
     * @param string $productNum
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setProductNum($productNum);
}
