<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Model\ResourceModel\SearchMarketLine as ResourceSearchMarketLine;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Store\Model\StoreManagerInterface;
use Born\DealerSearchApi\Model\ResourceModel\SearchMarketLine\CollectionFactory as SearchMarketLineCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Born\DealerSearchApi\Api\Data\SearchMarketLineSearchResultsInterfaceFactory;
use Born\DealerSearchApi\Api\SearchMarketLineRepositoryInterface;
use Born\DealerSearchApi\Api\Data\SearchMarketLineInterfaceFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Born\DealerSearchApi\Api\Data\SearchMarketLineInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class SearchMarketLineRepository
 * @package Born\DealerSearchApi\Model
 */
class SearchMarketLineRepository implements SearchMarketLineRepositoryInterface
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
     * @var SearchMarketLineFactory
     */
    protected $searchMarketLineFactory;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var SearchMarketLineCollectionFactory
     */
    protected $searchMarketLineCollectionFactory;

    /**
     * @var ResourceSearchMarketLine
     */
    protected $resource;

    /**
     * @var SearchMarketLineInterfaceFactory
     */
    protected $dataSearchMarketLineFactory;

    /**
     * @var SearchMarketLineSearchResultsInterfaceFactory
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
     * @param ResourceSearchMarketLine $resource
     * @param SearchMarketLineFactory $searchMarketLineFactory
     * @param SearchMarketLineInterfaceFactory $dataSearchMarketLineFactory
     * @param SearchMarketLineCollectionFactory $searchMarketLineCollectionFactory
     * @param SearchMarketLineSearchResultsInterfaceFactory $searchResultsFactory
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
        ResourceSearchMarketLine $resource,
        SearchMarketLineFactory $searchMarketLineFactory,
        SearchMarketLineInterfaceFactory $dataSearchMarketLineFactory,
        SearchMarketLineCollectionFactory $searchMarketLineCollectionFactory,
        SearchMarketLineSearchResultsInterfaceFactory $searchResultsFactory,
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
        $this->searchMarketLineFactory = $searchMarketLineFactory;
        $this->searchMarketLineCollectionFactory = $searchMarketLineCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSearchMarketLineFactory = $dataSearchMarketLineFactory;
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
     
    public function save($dealerSearchMarketLine)
    {
        $response = [];
        if (isset($dealerSearchMarketLine['row']['parent_account'])) {
            $dealerSearchMarketLine['row']=[$dealerSearchMarketLine['row']];
        }
        foreach ($dealerSearchMarketLine['row'] as $search_master_line) {
            if (isset($search_master_line['line_code'], $search_master_line['parent_account'],$search_master_line['market_code'])) {
                $searchMarketLineModel = $this->searchMarketLineFactory->create()->setData($search_master_line);
                try {
                    $this->searchCriteriaBuilder->addFilter('line_code', $search_master_line['line_code'], 'eq')
                                        ->addFilter('parent_account', $search_master_line['parent_account'], 'eq')
                                        ->addFilter('market_code', $search_master_line['market_code'], 'eq');
                    $searchCriteria = $this->searchCriteriaBuilder->create();
                    $validate=[];
                    foreach ($this->getList($searchCriteria)->getItems() as $items) {
                        $validate[]=$items->getSearchMarketLineId();
                    }
                    $action='insert';
                    if (count($validate)>0) {
                        $searchMarketLineModel->setSearchMarketLineId($validate[0]);
                        $action='update';
                    }
                    if (($search_master_line['action']=='delete')&&(count($validate)>0)) {
                        $this->deleteById($validate[0]);
                        $action='delete';
                    } else {
                        $this->resource->save($searchMarketLineModel);
                    }
                    $response[] = array('name'=>'dealer_search_market_line','item'=>$search_master_line['parent_account'].'~'.$search_master_line['line_code'].'~'.$search_master_line['market_code'].'~'.$action,'status'=>'success','error_description'=>'');
                } catch (\Exception $exception) {
                    $response[] = array('name'=>'dealer_search_market_line','item'=>$search_master_line['parent_account'].'~'.$search_master_line['line_code'].'~'.$search_master_line['market_code'],'status'=>'fail','error_description'=>$exception->getMessage());
                    continue;
                }
            } else {
                $parent_account= isset($search_master_line['parent_account'])?$search_master_line['parent_account']:'';
                $line_code= isset($search_master_line['line_code'])?$search_master_line['line_code']:'';
                $market_code= isset($search_master_line['market_code'])?$search_master_line['market_code']:'';
                $errorfield='';
                if ($parent_account=='') {
                    $errorfield.='parent_account';
                }
                if ($line_code=='') {
                    $errorfield.=' line_code';
                }
                if ($market_code=='') {
                    $errorfield.=' market_code';
                }
                $response[] = array('name'=>'dealer_search_market_line','item'=>$parent_account.'~'.$line_code.'~'.$market_code,'status'=>'fail','error_description'=>$errorfield.' field missing');
            }
        }
        return  [$response];
    }
    
   
    /**
     * {@inheritdoc}
     */
    public function getById($searchMarketLineId)
    {
        $searchMarketLine = $this->searchMarketLineFactory->create();
        $this->resource->load($searchMarketLine, $searchMarketLineId);
        if (!$searchMarketLine->getId()) {
            throw new NoSuchEntityException(__('search_market_line with id "%1" does not exist.', $searchMarketLineId));
        }
        return $searchMarketLine->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->searchMarketLineCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchMarketLineInterface::class
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
    public function delete(SearchMarketLineInterface $searchMarketLine)
    {
        try {
            $searchMarketLineModel = $this->searchMarketLineFactory->create();
            $this->resource->load($searchMarketLineModel, $searchMarketLine->getSearchMarketLineId());
            $this->resource->delete($searchMarketLineModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the search_market_line: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($searchMarketLineId)
    {
        return $this->delete($this->getById($searchMarketLineId));
    }
}
