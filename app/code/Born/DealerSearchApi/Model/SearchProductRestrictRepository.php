<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict\CollectionFactory as SearchProductRestrictCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict as ResourceSearchProductRestrict;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Store\Model\StoreManagerInterface;
use Born\DealerSearchApi\Api\SearchProductRestrictRepositoryInterface;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictInterfaceFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class SearchProductRestrictRepository implements SearchProductRestrictRepositoryInterface
{

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var SearchProductRestrictInterfaceFactory
     */
    protected $dataSearchProductRestrictFactory;

    /**
     * @var ExtensibleDataObjectConverter
     */
    protected $extensibleDataObjectConverter;
    /**
     * @var SearchProductRestrictCollectionFactory
     */
    protected $searchProductRestrictCollectionFactory;

    /**
     * @var SearchProductRestrictFactory
     */
    protected $searchProductRestrictFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var ResourceSearchProductRestrict
     */
    protected $resource;

    /**
     * @var SearchProductRestrictSearchResultsInterfaceFactory
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
     * @param ResourceSearchProductRestrict $resource
     * @param SearchProductRestrictFactory $searchProductRestrictFactory
     * @param SearchProductRestrictInterfaceFactory $dataSearchProductRestrictFactory
     * @param SearchProductRestrictCollectionFactory $searchProductRestrictCollectionFactory
     * @param SearchProductRestrictSearchResultsInterfaceFactory $searchResultsFactory
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
        ResourceSearchProductRestrict $resource,
        SearchProductRestrictFactory $searchProductRestrictFactory,
        SearchProductRestrictInterfaceFactory $dataSearchProductRestrictFactory,
        SearchProductRestrictCollectionFactory $searchProductRestrictCollectionFactory,
        SearchProductRestrictSearchResultsInterfaceFactory $searchResultsFactory,
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
        $this->searchProductRestrictFactory = $searchProductRestrictFactory;
        $this->searchProductRestrictCollectionFactory = $searchProductRestrictCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSearchProductRestrictFactory = $dataSearchProductRestrictFactory;
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
     
    public function save($dealerSearchProductRestrict)
    {
        $response = [];
        if (isset($dealerSearchProductRestrict['row']['product_num'])) {
            $dealerSearchProductRestrict['row']=[$dealerSearchProductRestrict['row']];
        }
        foreach ($dealerSearchProductRestrict['row'] as $search_product_restrict) {
            if (isset($search_product_restrict['product_num'],$search_product_restrict['dealer_cust_numb'])) {
                $searchProductRestrictModel = $this->searchProductRestrictFactory->create()->setData($search_product_restrict);
                try {
                    $this->searchCriteriaBuilder->addFilter('dealer_cust_numb', $search_product_restrict['dealer_cust_numb'], 'eq')
                                        ->addFilter('product_num', $search_product_restrict['product_num'], 'eq');
                    $searchCriteria = $this->searchCriteriaBuilder->create();
                    $validate=[];
                    foreach ($this->getList($searchCriteria)->getItems() as $items) {
                        $validate[]=$items->getSearchProductRestrictId();
                    }
                    $action='insert';
                    if (count($validate)>0) {
                        $searchProductRestrictModel->setSearchProductRestrictId($validate[0]);
                        $action='update';
                    }
                    if (($search_product_restrict['action']=='delete')&&(count($validate)>0)) {
                        $this->deleteById($validate[0]);
                        $action='delete';
                    } else {
                        $this->resource->save($searchProductRestrictModel);
                    }
                    $response[] = array('name'=>'dealer_search_product_restrict','item'=>$search_product_restrict['dealer_cust_numb'].'~'.$search_product_restrict['product_num'].'~'.$action,'status'=>'success','error_description'=>'');
                } catch (\Exception $exception) {
                    $product_num= isset($search_product_restrict['product_num'])?$search_product_restrict['product_num']:'';
                    $dealer_cust_numb= isset($search_product_restrict['dealer_cust_numb'])?$search_product_restrict['dealer_cust_numb']:'';
                    $response[] = array('name'=>'dealer_search_product_restrict','item'=>$dealer_cust_numb.'~'.$product_num,'status'=>'fail','error_description'=>$exception->getMessage());
                    continue;
                }
            } else {
                $product_num= isset($search_product_restrict['product_num'])?$search_product_restrict['product_num']:'';
                $dealer_cust_numb= isset($search_product_restrict['dealer_cust_numb'])?$search_product_restrict['dealer_cust_numb']:'';
                $errorfield='';
                if ($product_num=='') {
                    $errorfield.='product_num';
                }
                if ($dealer_cust_numb=='') {
                    $errorfield.=' dealer_cust_numb';
                }
                $response[] = array('name'=>'dealer_search_product_restrict','item'=>$dealer_cust_numb.'~'.$product_num,'status'=>'fail','error_description'=>$errorfield.' field missing');
            }
        }
        return  [$response];
    }
   

    /**
     * {@inheritdoc}
     */
    public function getById($searchProductRestrictId)
    {
        $searchProductRestrict = $this->searchProductRestrictFactory->create();
        $this->resource->load($searchProductRestrict, $searchProductRestrictId);
        if (!$searchProductRestrict->getId()) {
            throw new NoSuchEntityException(__('search_product_restrict with id "%1" does not exist.', $searchProductRestrictId));
        }
        return $searchProductRestrict->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->searchProductRestrictCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchProductRestrictInterface::class
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
    public function delete(SearchProductRestrictInterface $searchProductRestrict)
    {
        try {
            $searchProductRestrictModel = $this->searchProductRestrictFactory->create();
            $this->resource->load($searchProductRestrictModel, $searchProductRestrict->getSearchProductRestrictId());
            $this->resource->delete($searchProductRestrictModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the search_product_restrict: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($searchProductRestrictId)
    {
        return $this->delete($this->getById($searchProductRestrictId));
    }
}
