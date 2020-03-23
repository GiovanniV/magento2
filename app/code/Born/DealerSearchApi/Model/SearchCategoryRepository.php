<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Magento\Framework\Api\DataObjectHelper;
use Born\DealerSearchApi\Model\ResourceModel\SearchCategory as ResourceSearchCategory;
use Magento\Framework\Exception\CouldNotSaveException;
use Born\DealerSearchApi\Api\SearchCategoryRepositoryInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Born\DealerSearchApi\Api\Data\SearchCategorySearchResultsInterfaceFactory;
use Born\DealerSearchApi\Api\Data\SearchCategoryInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Born\DealerSearchApi\Model\ResourceModel\SearchCategory\CollectionFactory as SearchCategoryCollectionFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Born\DealerSearchApi\Api\Data\SearchCategoryInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class SearchCategoryRepository
 * @package Born\DealerSearchApi\Model
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

    /**
     * {@inheritdoc}
     */
    public function save($dealerSearchCategory)
    {
        $response = [];
        if (isset($dealerSearchCategory['row']['dealer_cust_numb'])) {
            $dealerSearchCategory['row']=[$dealerSearchCategory['row']];
        }
        foreach ($dealerSearchCategory['row'] as $search_category) {
           	if(isset($search_category['dealer_cust_numb'])&&(isset($search_category['category']) || (array_key_exists("category",$search_category)))) {
                $searchCategoryModel = $this->searchCategoryFactory->create()->setData($search_category);
                try {
                    $this->searchCriteriaBuilder->addFilter('dealer_cust_numb', $search_category['dealer_cust_numb'], 'eq')
                                            ->addFilter('category', $search_category['category'], 'eq');
                    $searchCriteria = $this->searchCriteriaBuilder->create();
                    $validate=[];
                    foreach ($this->getList($searchCriteria)->getItems() as $items) {
                        $validate[]=$items->getSearchCategoryId();
                    }
                    $action='insert';
                    if (count($validate)>0) {
                        $searchCategoryModel->setSearchCategoryId($validate[0]);
                        $action='update';
                    }
                    if (($search_category['action']=='delete')&&(count($validate)>0)) {
                        $this->deleteById($validate[0]);
                        $action='delete';
                    } else {
                        $this->resource->save($searchCategoryModel);
                    }
                
                    $response[]= array('name'=>'dealer_search_category','item'=>$search_category['dealer_cust_numb'].'~'.$search_category['category'].'~'.$action,'status'=>'success','error_description'=>'');
                } catch (\Exception $exception) {
                    $response[] = array('name'=>'dealer_search_category','item'=>$search_category['dealer_cust_numb'].'~'.$search_category['category'],'status'=>'fail','error_description'=>$exception->getMessage());
                    continue;
                }
            } else {
                $dealer_cust_numb= isset($search_category['dealer_cust_numb'])?$search_category['dealer_cust_numb']:'';
                $category= isset($search_category['category'])?$search_category['category']:'';
                $errorfield='';
                if ($dealer_cust_numb=='') {
                    $errorfield.='dealer_cust_numb';
                }
                if ($category=='') {
                    $errorfield.=' category';
                }
                $response[] = array('name'=>'dealer_search_category','item'=>$dealer_cust_numb.'~'.$category,'status'=>'fail','error_description'=>$errorfield.' field missing');
            }
        }
        return  [$response];
    }
     
     
    /**
     * {@inheritdoc}
     */
    public function getById($searchCategoryId)
    {
        $searchCategory = $this->searchCategoryFactory->create();
        $this->resource->load($searchCategory, $searchCategoryId);
        if (!$searchCategory->getId()) {
            throw new NoSuchEntityException(__('search_category with id "%1" does not exist.', $searchCategoryId));
        }
        return $searchCategory->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->searchCategoryCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchCategoryInterface::class
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
    public function delete(SearchCategoryInterface $searchCategory)
    {
        try {
            $searchCategoryModel = $this->searchCategoryFactory->create();
            $this->resource->load($searchCategoryModel, $searchCategory->getSearchCategoryId());
            $this->resource->delete($searchCategoryModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the search_category: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($searchCategoryId)
    {
        return $this->delete($this->getById($searchCategoryId));
    }
}
