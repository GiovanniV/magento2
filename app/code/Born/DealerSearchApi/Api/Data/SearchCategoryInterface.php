<?php

/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Born\DealerSearchApi\Api\Data\SearchCategoryExtensionInterface;

interface SearchCategoryInterface extends ExtensibleDataInterface
{
    const DEALER_CUST_NUMB = 'dealer_cust_numb';
    const CATEGORY = 'category';
    const ACTION = 'action';
    const SEARCH_CATEGORY_ID = 'search_category_id';

    /**
     * Get search_category_id
     * @return string|null
     */
    public function getSearchCategoryId();

    /**
     * Set search_category_id
     * @param string $searchCategoryId
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setSearchCategoryId($searchCategoryId);

    /**
     * Get action
     * @return string|null
     */
    public function getAction();

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setAction($action);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchCategoryExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchCategoryExtensionInterface $extensionAttributes);

    /**
     * Get dealer_cust_numb
     * @return string|null
     */
    public function getDealerCustNumb();

    /**
     * Set dealer_cust_numb
     * @param string $dealerCustNumb
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setDealerCustNumb($dealerCustNumb);

    /**
     * Get category
     * @return string|null
     */
    public function getCategory();

    /**
     * Set category
     * @param string $category
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setCategory($category);
}
