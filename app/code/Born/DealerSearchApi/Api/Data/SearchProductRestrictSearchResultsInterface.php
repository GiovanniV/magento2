<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SearchProductRestrictSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get search_product_restrict list.
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface[]
     */
    public function getItems();

    /**
     * Set action list.
     * @param \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
