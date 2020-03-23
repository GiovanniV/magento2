<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model;

use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface;
use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterfaceFactory;
use Born\WebsiteStoreCreator\Api\Data\StoreShipToSearchResultsInterfaceFactory;
use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo as ResourceStoreShipTo;
use Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo\CollectionFactory as StoreShipToCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class StoreShipToRepository
 * @package Born\WebsiteStoreCreator\Model
 */
class StoreShipToRepository implements StoreShipToRepositoryInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var ExtensibleDataObjectConverter
     */
    protected $extensibleDataObjectConverter;
    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var StoreShipToCollectionFactory
     */
    protected $storeShipToCollectionFactory;

    /**
     * @var ResourceStoreShipTo
     */
    protected $resource;

    /**
     * @var StoreShipToInterfaceFactory
     */
    protected $dataStoreShipToFactory;

    /**
     * @var StoreShipToFactory
     */
    protected $storeShipToFactory;

    /**
     * @var StoreShipToSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param ResourceStoreShipTo $resource
     * @param StoreShipToFactory $storeShipToFactory
     * @param StoreShipToInterfaceFactory $dataStoreShipToFactory
     * @param StoreShipToCollectionFactory $storeShipToCollectionFactory
     * @param StoreShipToSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceStoreShipTo $resource,
        StoreShipToFactory $storeShipToFactory,
        StoreShipToInterfaceFactory $dataStoreShipToFactory,
        StoreShipToCollectionFactory $storeShipToCollectionFactory,
        StoreShipToSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->storeShipToFactory = $storeShipToFactory;
        $this->storeShipToCollectionFactory = $storeShipToCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataStoreShipToFactory = $dataStoreShipToFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        StoreShipToInterface $storeShipTo
    ) {
        $storeShipToData = $this->extensibleDataObjectConverter->toNestedArray(
            $storeShipTo,
            [],
            StoreShipToInterface::class
        );

        $storeShipToModel = $this->storeShipToFactory->create()->setData($storeShipToData);

        try {
            $this->resource->save($storeShipToModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the storeShipTo: %1',
                $exception->getMessage()
            ));
        }
        return $storeShipToModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($storeShipToId)
    {
        $storeShipTo = $this->storeShipToFactory->create();
        $this->resource->load($storeShipTo, $storeShipToId);
        if (!$storeShipTo->getId()) {
            throw new NoSuchEntityException(__('StoreShipTo with id "%1" does not exist.', $storeShipToId));
        }
        return $storeShipTo->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getByStoreShipTo($storeShipToNumber)
    {
        $storeShipTo = $this->storeShipToFactory->create();
        $this->resource->load($storeShipTo, $storeShipToNumber, 'store_shipto');
        if (!$storeShipTo->getId()) {
            throw new NoSuchEntityException(__('StoreShipTo with store_shipto "%1" does not exist.', $storeShipToNumber));
        }
        return $storeShipTo->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->storeShipToCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            StoreShipToInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        StoreShipToInterface $storeShipTo
    ) {
        try {
            $storeShipToModel = $this->storeShipToFactory->create();
            $this->resource->load($storeShipToModel, $storeShipTo->getStoreshiptoId());
            $this->resource->delete($storeShipToModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the StoreShipTo: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($storeShipToId)
    {
        return $this->delete($this->getById($storeShipToId));
    }

    /**
     * @param $websiteId
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getStoreShipToObjectByWebsiteId($websiteId)
    {
        $storeShipTo = $this->storeShipToFactory->create();
        $this->resource->load($storeShipTo, $websiteId, 'website_id');
        if (!$storeShipTo->getId()) {
            throw new NoSuchEntityException(__('StoreShipTo with website_id "%1" does not exist.', $websiteId));
        }
        return $storeShipTo->getDataModel();
    }

    /**
     * @param $storeId
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getStoreShipToObjectByStoreId($storeId)
    {
        $store = $this->storeManager->getStore($storeId);
        return $this->getStoreShipToObjectByWebsiteId($store->getWebsiteId());
    }
}
