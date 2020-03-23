<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SearchProductSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get search_product list.
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface[]
     */
    public function getItems();

    /**
     * Set action list.
     * @param \Born\DealerSearchApi\Api\Data\SearchProductInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
