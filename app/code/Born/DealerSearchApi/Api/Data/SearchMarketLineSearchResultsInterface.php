<?php

/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SearchMarketLineSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get search_market_line list.
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface[]
     */
    public function getItems();

    /**
     * Set action list.
     * @param \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
