<?php

/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Born\DealerSearchApi\Api\Data\SearchMarketLineExtensionInterface;

interface SearchMarketLineInterface extends ExtensibleDataInterface
{
    const MARKET_CODE = 'market_code';
    const ACTION = 'action';
    const PARENT_ACCOUNT = 'parent_account';
    const LINE_CODE = 'line_code';
    const SEARCH_MARKET_LINE_ID = 'search_market_line_id';

    /**
     * Get search_market_line_id
     * @return string|null
     */
    public function getSearchMarketLineId();

    /**
     * Set search_market_line_id
     * @param string $searchMarketLineId
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setSearchMarketLineId($searchMarketLineId);

    /**
     * Get action
     * @return string|null
     */
    public function getAction();

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setAction($action);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchMarketLineExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchMarketLineExtensionInterface $extensionAttributes);

    /**
     * Get parent_account
     * @return string|null
     */
    public function getParentAccount();

    /**
     * Set parent_account
     * @param string $parentAccount
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setParentAccount($parentAccount);

    /**
     * Get line_code
     * @return string|null
     */
    public function getLineCode();

    /**
     * Set line_code
     * @param string $lineCode
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setMarketCode($marketCode);
}
