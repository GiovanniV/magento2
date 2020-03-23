<?php

/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchZipInterface;

interface SearchZipRepositoryInterface
{
    /**
     * save search_zip
     * @param mixed $dealer_search_zip
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($dealer_search_zip);

    /**
     * Retrieve search_zip if matching matching both country and zip
     * @param mixed $countryZip
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function LoadByCountryZip($countryZip);
    /**
     * Retrieve search_zip
     * @param string $searchZipId
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($searchZipId);

    /**
     * Retrieve search_zip matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Api\Data\SearchZipSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete search_zip
     * @param \Born\DealerSearchApi\Api\Data\SearchZipInterface $dealer_search_zip
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SearchZipInterface $dealer_search_zip);

    /**
     * Delete search_zip by ID
     * @param string $searchZipId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($searchZipId);
}
