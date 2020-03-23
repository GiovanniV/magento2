<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Model\ResourceModel\SearchZip as ResourceSearchZip;
use Born\DealerSearchApi\Api\SearchZipRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Store\Model\StoreManagerInterface;
use Born\DealerSearchApi\Api\Data\SearchZipInterfaceFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Born\DealerSearchApi\Model\ResourceModel\SearchZip\CollectionFactory as SearchZipCollectionFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\NoSuchEntityException;
use Born\DealerSearchApi\Api\Data\SearchZipSearchResultsInterfaceFactory;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Magento\Framework\Api\SearchCriteriaInterface;
use Born\DealerSearchApi\Api\Data\SearchZipInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class SearchZipRepository
 * @package Born\DealerSearchApi\Model
 */
class SearchZipRepository implements SearchZipRepositoryInterface
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
     * @var SearchZipCollectionFactory
     */
    protected $searchZipCollectionFactory;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    /**
     * @var Xml
     */
    private $xmlRender;
    /**
     * @var SearchZipFactory
     */
    protected $searchZipFactory;

    /**
     * @var ResourceSearchZip
     */
    protected $resource;

    /**
     * @var SearchZipSearchResultsInterfaceFactory
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
     * @var SearchZipInterfaceFactory
     */
    protected $dataSearchZipFactory;
    /**
    * @var SearchCriteriaBuilder
    */
    private $searchCriteriaBuilder;
    
    /**
     * @param ResourceSearchZip $resource
     * @param SearchZipFactory $searchZipFactory
     * @param SearchZipInterfaceFactory $dataSearchZipFactory
     * @param SearchZipCollectionFactory $searchZipCollectionFactory
     * @param SearchZipSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param Xml $xmlRender
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        ResourceSearchZip $resource,
        SearchZipFactory $searchZipFactory,
        SearchZipInterfaceFactory $dataSearchZipFactory,
        SearchZipCollectionFactory $searchZipCollectionFactory,
        SearchZipSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        Xml $xmlRender,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->resource = $resource;
        $this->searchZipFactory = $searchZipFactory;
        $this->searchZipCollectionFactory = $searchZipCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSearchZipFactory = $dataSearchZipFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->xmlRender = $xmlRender;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * {@inheritdoc}
     */
    public function save($dealerSearchZip)
    {
        $response = [];
        if (isset($dealerSearchZip['row']['country'])) {
            $dealerSearchZip['row']=[$dealerSearchZip['row']];
        }
        foreach ($dealerSearchZip['row'] as $searchZipRow) {
            if (isset($searchZipRow['zip'])) {
                $this->searchCriteriaBuilder->addFilter('zip', $searchZipRow['zip'], 'eq');
                $searchCriteria = $this->searchCriteriaBuilder->create();
                $validate=[];
                foreach ($this->getList($searchCriteria)->getItems() as $items) {
                    $validate[]=$items->getSearchZipId();
                }
                $action='insert';
                $searchZipModel = $this->searchZipFactory->create()->setData($searchZipRow);
                try {
                    if (count($validate)>0) {
                        $searchZipModel->setSearchZipId($validate[0]);
                        $action='update';
                    }
                    if (($searchZipRow['action']=='delete')&&(count($validate)>0)) {
                        $this->deleteById($validate[0]);
                        $action='delete';
                    } else {
                        $this->resource->save($searchZipModel);
                    }
                    $response[] = array('name'=>'dealer_search_zip','item'=>$searchZipRow['zip'].'~'.$searchZipRow['country'].'~'.$searchZipRow['latitude'].'~'.$searchZipRow['longitude'].'~'.$action,'status'=>'success','error_description'=>'');
                } catch (\Exception $exception) {
                    $response[] = array('name'=>'dealer_search_zip','item'=>$searchZipRow['zip'].'~'.$searchZipRow['country'].'~'.$searchZipRow['latitude'].'~'.$searchZipRow['longitude'],'status'=>'fail','error_description'=>$exception->getMessage());
                    continue;
                }
            } else {
                $zip= isset($searchZipRow['zip'])?$searchZipRow['zip']:'';
                $errorfield='';
                if ($zip=='') {
                    $errorfield=' zip';
                }
                $response[] = array('name'=>'dealer_search_zip','item'=>$zip,'status'=>'fail','error_description'=>$errorfield.' field missing');
            }
        }
        return [$response];
    }
    
  
    /**
     * {@inheritdoc}
     */
    public function getById($searchZipId)
    {
        $searchZip = $this->searchZipFactory->create();
        $this->resource->load($searchZip, $searchZipId);
        if (!$searchZip->getId()) {
            throw new NoSuchEntityException(__('search_zip with id "%1" does not exist.', $searchZipId));
        }
        return $searchZip->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        SearchCriteriaInterface $criteria
    ) {
        $collection = $this->searchZipCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchZipInterface::class
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
    public function delete(SearchZipInterface $searchZip)
    {
        try {
            $searchZipModel = $this->searchZipFactory->create();
            $this->resource->load($searchZipModel, $searchZip->getSearchZipId());
            $this->resource->delete($searchZipModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the search_zip: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($searchZipId)
    {
        return $this->delete($this->getById($searchZipId));
    }
    
    /**
     * {@inheritdoc}
     */
    public function LoadByCountryZip($countryZip)
    {
        $searchZip = $this->searchZipFactory->create();
        $this->resource->load($searchZip, $countryZip, 'country');
        return $searchZip->getZip();
    }
}
