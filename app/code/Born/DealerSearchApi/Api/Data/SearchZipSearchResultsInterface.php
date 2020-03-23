<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SearchZipSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get search_zip list.
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface[]
     */
    public function getItems();

    /**
     * Set action list.
     * @param \Born\DealerSearchApi\Api\Data\SearchZipInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
