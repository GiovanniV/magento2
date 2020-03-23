<?php
/**
 * Copyright (c) 2018 Demo Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Demo\DealerSearchApi\Model;

use Magento\Framework\Api\DataObjectHelper;
use Demo\DealerSearchApi\Model\ResourceModel\SearchCategory as ResourceSearchCategory;
use Magento\Framework\Exception\CouldNotSaveException;
use Demo\DealerSearchApi\Api\SearchCategoryRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Demo\DealerSearchApi\Api\Data\SearchCategorySearchResultsInterfaceFactory;
use Demo\DealerSearchApi\Api\Data\SearchCategoryInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Demo\DealerSearchApi\Model\ResourceModel\SearchCategory\CollectionFactory as SearchCategoryCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Demo\DealerSearchApi\Api\Data\SearchCategoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class SearchCategoryRepository
 * @package Demo\DealerSearchApi\Model
 */
class SearchCategoryRepository implements SearchCategoryRepositoryInterface
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
     * @var SearchCategoryFactory
     */
    protected $searchCategoryFactory;

    /**
     * @var SearchCategoryCollectionFactory
     */
    protected $searchCategoryCollectionFactory;

    /**
     * @var ResourceSearchCategory
     */
    protected $resource;

    /**
     * @var SearchCategoryInterfaceFactory
     */
    protected $dataSearchCategoryFactory;

    /**
     * @var SearchCategorySearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;
    /**
     * @var Xml
     */
    private $xmlRender;

    /**
     * @param ResourceSearchCategory $resource
     * @param SearchCategoryFactory $searchCategoryFactory
     * @param SearchCategoryInterfaceFactory $dataSearchCategoryFactory
     * @param SearchCategoryCollectionFactory $searchCategoryCollectionFactory
     * @param SearchCategorySearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     * @param Xml $xmlRender
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ResourceSearchCategory $resource,
        SearchCategoryFactory $searchCategoryFactory,
        SearchCategoryInterfaceFactory $dataSearchCategoryFactory,
        SearchCategoryCollectionFactory $searchCategoryCollectionFactory,
        SearchCategorySearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        Xml $xmlRender,
        SearchCriteriaBuilder $searchCriteriaBuilder

    ) {
        $this->resource = $resource;
        $this->searchCategoryFactory = $searchCategoryFactory;
        $this->searchCategoryCollectionFactory = $searchCategoryCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSearchCategoryFactory = $dataSearchCategoryFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->xmlRender = $xmlRender;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

   
}
