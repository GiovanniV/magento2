<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchMarketLineInterface;

interface SearchMarketLineRepositoryInterface
{

    /**
     * Save search_market_line
     * @param mixed dealer_search_market_line
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($dealer_search_market_line);

    /**
     * Retrieve search_market_line
     * @param string $searchMarketLineId
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($searchMarketLineId);

    /**
     * Retrieve search_market_line matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete search_market_line
     * @param \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface $searchMarketLine
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SearchMarketLineInterface $searchMarketLine);

    /**
     * Delete search_market_line by ID
     * @param string $searchMarketLineId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($searchMarketLineId);
}
