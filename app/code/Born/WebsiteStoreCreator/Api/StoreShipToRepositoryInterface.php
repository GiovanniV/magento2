<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Api;

use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface StoreShipToRepositoryInterface
 * @package Born\WebsiteStoreCreator\Api
 */
interface StoreShipToRepositoryInterface
{

    /**
     * Save StoreShipTo
     * @param \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface $storeShipTo
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        StoreShipToInterface $storeShipTo
    );

    /**
     * Retrieve StoreShipTo
     * @param string $storeshiptoId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($storeShipTo);

    /**
     * @param $storeShipTo
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function getByStoreShipTo($storeShipTo);

    /**
     * @param $websiteId
     * @return mixed
     */
    public function getStoreShipToObjectByWebsiteId($websiteId);

    /**
     * @param $storeId
     * @return mixed
     */
    public function getStoreShipToObjectByStoreId($storeId);

    /**
     * Retrieve StoreShipTo matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete StoreShipTo
     * @param \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface $storeShipTo
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        StoreShipToInterface $storeShipTo
    );

    /**
     * Delete StoreShipTo by ID
     * @param string $storeshiptoId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($storeshiptoId);
}
