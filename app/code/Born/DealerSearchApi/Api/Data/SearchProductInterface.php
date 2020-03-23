<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Born\DealerSearchApi\Api\Data\SearchProductExtensionInterface;

interface SearchProductInterface extends ExtensibleDataInterface
{
    const PRODUCT_NUM = 'product_num';
    const MARKET_CODE = 'market_code';
    const ACTION = 'action';
    const SEARCH_PRODUCT_ID = 'search_product_id';
    const LINE_CODE = 'line_code';

    /**
     * Get search_product_id
     * @return string|null
     */
    public function getSearchProductId();

    /**
     * Set search_product_id
     * @param string $searchProductId
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setSearchProductId($searchProductId);

    /**
     * Get action
     * @return string|null
     */
    public function getAction();

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setAction($action);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchProductExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchProductExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchProductExtensionInterface $extensionAttributes);

    /**
     * Get product_num
     * @return string|null
     */
    public function getProductNum();

    /**
     * Set product_num
     * @param string $productNum
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setProductNum($productNum);

    /**
     * Get line_code
     * @return string|null
     */
    public function getLineCode();

    /**
     * Set line_code
     * @param string $lineCode
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setLineCode($lineCode);

    /**
     * Get market_code
     * @return string|null
     */
    public function getMarketCode();

    /**
     * Set market_code
     * @param string $marketCode
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setMarketCode($marketCode);
}
