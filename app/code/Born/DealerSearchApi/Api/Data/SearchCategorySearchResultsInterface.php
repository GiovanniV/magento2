<?php

/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SearchCategorySearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get search_category list.
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface[]
     */
    public function getItems();

    /**
     * Set action list.
     * @param \Born\DealerSearchApi\Api\Data\SearchCategoryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
