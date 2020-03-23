<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model;

use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class StoreShipToManagement
 * @package Born\WebsiteStoreCreator\Model
 */
class StoreShipToManagement implements \Born\WebsiteStoreCreator\Api\StoreShipToManagementInterface
{

    /**
     * @var StoreShipToRepositoryInterface
     */
    private $storeShipToRepository;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * StoreShipToManagement constructor.
     * @param StoreShipToRepositoryInterface $storeShipToRepository
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        StoreShipToRepositoryInterface $storeShipToRepository,
        StoreManagerInterface $storeManager
    ) {
        $this->storeShipToRepository = $storeShipToRepository;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreIdByShipto($shipTo)
    {
        /* @var  $storeShipToRelation \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface */
        $storeShipToRelation = $this->storeShipToRepository->getByStoreShipTo($shipTo);
        $website = $this->storeManager->getWebsite($storeShipToRelation->getWebsiteId());
        return $this->storeManager->getGroup($website->getDefaultGroupId())->getDefaultStoreId();
    }

    /**
     * @param $shipTo
     * @return mixed|null|string
     */
    public function getWebsiteIdByShipto($shipTo)
    {
        $storeShipToRelation = $this->storeShipToRepository->getByStoreShipTo($shipTo);
        return $storeShipToRelation->getWebsiteId();
    }
}
