<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchMasterInterface;

interface SearchMasterRepositoryInterface
{

    /**
     * Save search_master
     * @param mixed $dealer_search_master
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save($dealer_search_master);

    /**
     * Retrieve search_master
     * @param string $searchMasterId
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($searchMasterId);

    /**
     * Retrieve search_master matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
    /**
     * Retrieve search_master matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\DealerSearchApi\Model\ResourceModel\SearchMaster\CollectionFactory
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getDealerList(SearchCriteriaInterface $searchCriteria);
    /**
     * Delete search_master
     * @param \Born\DealerSearchApi\Api\Data\SearchMasterInterface $searchMaster
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(SearchMasterInterface $searchMaster);

    /**
     * Delete search_master by ID
     * @param string $searchMasterId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($searchMasterId);
}
