<?php


namespace Born\Restrictions\Model;

use Born\Restrictions\Model\ResourceModel\Entity as ResourceEntity;
use Born\Restrictions\Api\EntityRepositoryInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Born\Restrictions\Model\ResourceModel\Entity\CollectionFactory as EntityCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Born\Restrictions\Api\Data\EntitySearchResultsInterfaceFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Born\Restrictions\Api\Data\EntityInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;

class EntityRepository implements EntityRepositoryInterface
{

    protected $searchResultsFactory;

    private $collectionProcessor;

    protected $entityFactory;

    private $storeManager;

    protected $dataObjectProcessor;

    protected $entityCollectionFactory;

    protected $resource;

    protected $dataObjectHelper;

    protected $extensionAttributesJoinProcessor;

    protected $dataEntityFactory;

    protected $extensibleDataObjectConverter;

    /**
     * @param ResourceEntity $resource
     * @param EntityFactory $entityFactory
     * @param EntityInterfaceFactory $dataEntityFactory
     * @param EntityCollectionFactory $entityCollectionFactory
     * @param EntitySearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceEntity $resource,
        EntityFactory $entityFactory,
        EntityInterfaceFactory $dataEntityFactory,
        EntityCollectionFactory $entityCollectionFactory,
        EntitySearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->entityFactory = $entityFactory;
        $this->entityCollectionFactory = $entityCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataEntityFactory = $dataEntityFactory;
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
        \Born\Restrictions\Api\Data\EntityInterface $entity
    ) {
        /* if (empty($entity->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $entity->setStoreId($storeId);
        } */
        
        $entityData = $this->extensibleDataObjectConverter->toNestedArray(
            $entity,
            [],
            \Born\Restrictions\Api\Data\EntityInterface::class
        );
        
        $entityModel = $this->entityFactory->create()->setData($entityData);
        
        try {
            $this->resource->save($entityModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the entity: %1',
                $exception->getMessage()
            ));
        }
        return $entityModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($entityId)
    {
        $entity = $this->entityFactory->create();
        $this->resource->load($entity, $entityId);
        if (!$entity->getId()) {
            throw new NoSuchEntityException(__('Entity with id "%1" does not exist.', $entityId));
        }
        return $entity->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->entityCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Born\Restrictions\Api\Data\EntityInterface::class
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
        \Born\Restrictions\Api\Data\EntityInterface $entity
    ) {
        try {
            $entityModel = $this->entityFactory->create();
            $this->resource->load($entityModel, $entity->getEntityId());
            $this->resource->delete($entityModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Entity: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($entityId)
    {
        return $this->delete($this->getById($entityId));
    }
}
