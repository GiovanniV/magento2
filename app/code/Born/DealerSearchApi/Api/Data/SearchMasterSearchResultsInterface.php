<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface SearchMasterSearchResultsInterface extends SearchResultsInterface
{

    /**
     * Get search_master list.
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface[]
     */
    public function getItems();

    /**
     * Set action list.
     * @param \Born\DealerSearchApi\Api\Data\SearchMasterInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
