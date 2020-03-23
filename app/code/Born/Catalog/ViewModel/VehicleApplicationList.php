<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\Catalog\ViewModel;

use Born\ApplicationXref\Api\ApplicationRepositoryInterface;
use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class VehicleApplicationList
 * @package Born\Catalog\ViewModel
 */
class VehicleApplicationList implements ArgumentInterface
{
    /**
     * @var ApplicationRepositoryInterface
     */
    private $applicationRepository;

    /**
     * @var Registry
     */
    private $coreRegistry;

    /**
     * @var StoreShipToRepositoryInterface
     */
    private $storeShipToRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * VehicleApplicationList constructor.
     * @param ApplicationRepositoryInterface $applicationRepository
     * @param Registry $registry
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param StoreShipToRepositoryInterface $storeShipToRepository
     */
    public function __construct(
        ApplicationRepositoryInterface $applicationRepository,
        Registry $registry,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        StoreShipToRepositoryInterface $storeShipToRepository
    ) {
        $this->applicationRepository = $applicationRepository;
        $this->coreRegistry = $registry;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->storeShipToRepository = $storeShipToRepository;
    }

    /**
     * @return mixed
     */
    public function getVehicles()
    {
        return $this->applicationRepository->getVehiclesBySku($this->coreRegistry->registry('product')->getSku());
    }

    /**
     * @return \Born\ApplicationXref\Api\Data\ApplicationXrefSearchResultInterface
     */
    public function getApplicationXref()
    {
        $storeShipToRelation = $this->storeShipToRepository->getStoreShipToObjectForCurrentWebsite();
        $this->searchCriteriaBuilder->addFilter('ship_to_number', $storeShipToRelation->getShipToNumber(), 'eq');
        $this->searchCriteriaBuilder->addFilter('sku', $this->coreRegistry->registry('product')->getSku(), 'eq');
        $searchCriteria = $this->searchCriteriaBuilder->create();
        return $this->applicationRepository->getList($searchCriteria);
    }
}
