<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface;

interface SearchProductRestrictRepositoryInterface
{

    /**
     * Save search_product_restrict
     * @param mixed $dealer_search_product_restrict
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($dealer_search_product_restrict);

    /**
     * Retrieve search_product_restrict
     * @param string $searchProductRestrictId
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($searchProductRestrictId);

    /**
     * Retrieve search_product_restrict matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete search_product_restrict
     * @param \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface $searchProductRestrict
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SearchProductRestrictInterface $searchProductRestrict);

    /**
     * Delete search_product_restrict by ID
     * @param string $searchProductRestrictId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($searchProductRestrictId);
}
