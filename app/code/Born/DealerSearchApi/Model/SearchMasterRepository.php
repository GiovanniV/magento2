<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Born\DealerSearchApi\Api\SearchMasterRepositoryInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Born\DealerSearchApi\Model\ResourceModel\SearchMaster\CollectionFactory as SearchMasterCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Born\DealerSearchApi\Model\ResourceModel\SearchMaster as ResourceSearchMaster;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Born\DealerSearchApi\Api\Data\SearchMasterSearchResultsInterfaceFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Born\DealerSearchApi\Api\Data\SearchMasterInterfaceFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Born\DealerSearchApi\Api\Data\SearchMasterInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class SearchMasterRepository
 * @package Born\DealerSearchApi\Model
 */
class SearchMasterRepository implements SearchMasterRepositoryInterface
{

    /**
     * @var SearchMasterInterfaceFactory
     */
    protected $dataSearchMasterFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var ExtensibleDataObjectConverter
     */
    protected $extensibleDataObjectConverter;
    /**
     * @var SearchMasterCollectionFactory
     */
    protected $searchMasterCollectionFactory;

    /**
     * @var SearchMasterFactory
     */
    protected $searchMasterFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var ResourceSearchMaster
     */
    protected $resource;

    /**
     * @var SearchMasterSearchResultsInterfaceFactory
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
     * @param ResourceSearchMaster $resource
     * @param SearchMasterFactory $searchMasterFactory
     * @param SearchMasterInterfaceFactory $dataSearchMasterFactory
     * @param SearchMasterCollectionFactory $searchMasterCollectionFactory
     * @param SearchMasterSearchResultsInterfaceFactory $searchResultsFactory
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
        ResourceSearchMaster $resource,
        SearchMasterFactory $searchMasterFactory,
        SearchMasterInterfaceFactory $dataSearchMasterFactory,
        SearchMasterCollectionFactory $searchMasterCollectionFactory,
        SearchMasterSearchResultsInterfaceFactory $searchResultsFactory,
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
        $this->searchMasterFactory = $searchMasterFactory;
        $this->searchMasterCollectionFactory = $searchMasterCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSearchMasterFactory = $dataSearchMasterFactory;
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
     
    public function save($dealerSsearchMaster)
    {
        $response = [];
        if (isset($dealerSsearchMaster['row']['dealer_cust_numb'])) {
            $dealerSsearchMaster['row']=[$dealerSsearchMaster['row']];
        }
        foreach ($dealerSsearchMaster['row'] as $search_master) {
            if (isset($search_master['ship_to_number'],$search_master['dealer_cust_numb'])) {
                $searchMasterModel = $this->searchMasterFactory->create()->setData($search_master);
                try {
                    $this->searchCriteriaBuilder->addFilter('dealer_cust_numb', $search_master['dealer_cust_numb'], 'eq')
                                        ->addFilter('ship_to_number', $search_master['ship_to_number'], 'eq');
                    $searchCriteria = $this->searchCriteriaBuilder->create();
                    $validate=[];
                    foreach ($this->getList($searchCriteria)->getItems() as $items) {
                        $validate[]=$items->getSearchMasterId();
                    }
                    $action='insert';
                    if (count($validate)>0) {
                        $searchMasterModel->setSearchMasterId($validate[0]);
                        $action='update';
                    }
                    if (($search_master['action']=='delete')&&(count($validate)>0)) {
                        $this->deleteById($validate[0]);
                        $action='delete';
                    } else {
                        $this->resource->save($searchMasterModel);
                    }
                    $response[] = array('name'=>'dealer_search_master','item'=>$search_master['ship_to_number'].'~'.$search_master['dealer_cust_numb'].'~'.$action,'status'=>'success','error_description'=>'');
                } catch (\Exception $exception) {
                    $response[] = array('name'=>'dealer_search_master','item'=>$search_master['ship_to_number'].'~'.$search_master['dealer_cust_numb'],'status'=>'fail','error_description'=>$exception->getMessage());
                    continue;
                }
            } else {
                $ship_to_number= isset($search_master['ship_to_number'])?$search_master['ship_to_number']:'';
                $dealer_cust_numb= isset($search_master['dealer_cust_numb'])?$search_master['dealer_cust_numb']:'';
                $errorfield='';
                if ($ship_to_number=='') {
                    $errorfield.='ship_to_number';
                }
                if ($dealer_cust_numb=='') {
                    $errorfield.=' dealer_cust_numb';
                }
                $response[] = array('name'=>'dealer_search_master','item'=>$ship_to_number.'~'.$dealer_cust_numb,'status'=>'fail','error_description'=>$errorfield.' field missing');
            }
        }
        return  [$response];
    }
     
    

    /**
     * {@inheritdoc}
     */
    public function getById($searchMasterId)
    {
        $searchMaster = $this->searchMasterFactory->create();
        $this->resource->load($searchMaster, $searchMasterId);
        if (!$searchMaster->getId()) {
            throw new NoSuchEntityException(__('search_master with id "%1" does not exist.', $searchMasterId));
        }
        return $searchMaster->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->searchMasterCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchMasterInterface::class
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
    public function getDealerList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->searchMasterCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchMasterInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        return $collection;
    }
    /**
     * {@inheritdoc}
     */
    public function delete(SearchMasterInterface $searchMaster)
    {
        try {
            $searchMasterModel = $this->searchMasterFactory->create();
            $this->resource->load($searchMasterModel, $searchMaster->getSearchMasterId());
            $this->resource->delete($searchMasterModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the search_master: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($searchMasterId)
    {
        return $this->delete($this->getById($searchMasterId));
    }
}
