<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchProductInterface;

interface SearchProductRepositoryInterface
{

    /**
     * Save search_product
     * @param mixed $dealer_search_product
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($dealer_search_product);

    /**
     * Retrieve search_product
     * @param string $searchProductId
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($searchProductId);

    /**
     * Retrieve search_product matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Api\Data\SearchProductSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
    /**
    * Retrieve search_master matching the specified criteria.
    * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    * @return \Born\DealerSearchApi\Model\ResourceModel\SearchProduct\CollectionFactory
    * @throws \Magento\Framework\Exception\LocalizedException
    */
    public function getDealerList(SearchCriteriaInterface $searchCriteria);
    /**
     * Delete search_product
     * @param \Born\DealerSearchApi\Api\Data\SearchProductInterface $searchProduct
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SearchProductInterface $searchProduct);

    /**
     * Delete search_product by ID
     * @param string $searchProductId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($searchProductId);
}
