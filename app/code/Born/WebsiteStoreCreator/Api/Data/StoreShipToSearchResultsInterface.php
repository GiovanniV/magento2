<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Api\Data;

interface StoreShipToSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get StoreShipTo list.
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface[]
     */
    public function getItems();

    /**
     * Set website_id list.
     * @param \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
