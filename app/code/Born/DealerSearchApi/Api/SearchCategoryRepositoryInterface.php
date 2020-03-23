<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchCategoryInterface;

interface SearchCategoryRepositoryInterface
{

    /**
     * Save search_category
     * @param mixed $dealer_search_category
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($dealer_search_category);

    /**
     * Retrieve search_category
     * @param string $searchCategoryId
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($searchCategoryId);

    /**
     * Retrieve search_category matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Api\Data\SearchCategorySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete search_category
     * @param \Born\DealerSearchApi\Api\Data\SearchCategoryInterface $searchCategory
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SearchCategoryInterface $searchCategory);

    
    
    /**
     * Delete search_category by ID
     * @param string $searchCategoryId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($searchCategoryId);
}
