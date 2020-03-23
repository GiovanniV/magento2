<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Api\Data;

interface CountryISOSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get CountryISO list.
     * @return \Born\CountryISO\Api\Data\CountryISOInterface[]
     */
    public function getItems();

    /**
     * Set country_id list.
     * @param \Born\CountryISO\Api\Data\CountryISOInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
