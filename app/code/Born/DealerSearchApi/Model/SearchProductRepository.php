<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Api\SearchProductRepositoryInterface;
use Born\DealerSearchApi\Api\Data\SearchProductSearchResultsInterfaceFactory;
use Born\DealerSearchApi\Api\Data\SearchProductInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Born\DealerSearchApi\Model\ResourceModel\SearchProduct as ResourceSearchProduct;
use Born\DealerSearchApi\Model\ResourceModel\SearchProduct\CollectionFactory as SearchProductCollectionFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Webapi\Rest\Response\Renderer\Xml;
use Born\DealerSearchApi\Api\Data\SearchProductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class SearchProductRepository
 * @package Born\DealerSearchApi\Model
 */
class SearchProductRepository implements SearchProductRepositoryInterface
{

    /**
     * @var SearchProductCollectionFactory
     */
    protected $searchProductCollectionFactory;

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
     * @var SearchProductInterfaceFactory
     */
    protected $dataSearchProductFactory;

    /**
     * @var ResourceSearchProduct
     */
    protected $resource;

    /**
     * @var SearchProductFactory
     */
    protected $searchProductFactory;

    /**
     * @var SearchProductSearchResultsInterfaceFactory
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
     * @param ResourceSearchProduct $resource
     * @param SearchProductFactory $searchProductFactory
     * @param SearchProductInterfaceFactory $dataSearchProductFactory
     * @param SearchProductCollectionFactory $searchProductCollectionFactory
     * @param SearchProductSearchResultsInterfaceFactory $searchResultsFactory
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
        ResourceSearchProduct $resource,
        SearchProductFactory $searchProductFactory,
        SearchProductInterfaceFactory $dataSearchProductFactory,
        SearchProductCollectionFactory $searchProductCollectionFactory,
        SearchProductSearchResultsInterfaceFactory $searchResultsFactory,
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
        $this->searchProductFactory = $searchProductFactory;
        $this->searchProductCollectionFactory = $searchProductCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSearchProductFactory = $dataSearchProductFactory;
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
     
    public function save($dealerSearchProduct)
    {
        $response = [];
        if (isset($dealerSearchProduct['row']['product_num'])) {
            $dealerSearchProduct['row']=[$dealerSearchProduct['row']];
        }
        foreach ($dealerSearchProduct['row'] as $search_product) {
            if (isset($search_product['line_code'],$search_product['product_num'],$search_product['market_code'])) {
                $searchProductModel = $this->searchProductFactory->create()->setData($search_product);
                try {
                    $this->searchCriteriaBuilder->addFilter('line_code', $search_product['line_code'], 'eq')
                                        ->addFilter('product_num', $search_product['product_num'], 'eq')
                                        ->addFilter('market_code', $search_product['market_code'], 'eq');
                    $searchCriteria = $this->searchCriteriaBuilder->create();
                    $validate=[];
                    foreach ($this->getList($searchCriteria)->getItems() as $items) {
                        $validate[]=$items->getSearchProductId();
                    }
                    $action='insert';
                    if (count($validate)>0) {
                        $searchProductModel->setSearchProductId($validate[0]);
                        $action='update';
                    }
                    if (($search_product['action']=='delete')&&(count($validate)>0)) {
                        $this->deleteById($validate[0]);
                        $action='delete';
                    } else {
                        $this->resource->save($searchProductModel);
                    }
                    $response[] = array('name'=>'dealer_search_product','item'=>$search_product['product_num'].'~'.$search_product['line_code'].'~'.$search_product['market_code'].'~'.$action,'status'=>'success','error_description'=>'');
                } catch (\Exception $exception) {
                    $response[] = array('name'=>'dealer_search_product','item'=>$search_product['product_num'].'~'.$search_product['line_code'].'~'.$search_product['market_code'],'status'=>'fail','error_description'=>$exception->getMessage());
                    continue;
                }
            } else {
                $product_num = isset($search_product['product_num'])?$search_product['product_num']:'';
                $line_code = isset($search_product['line_code'])?$search_product['line_code']:'';
                $market_code = isset($search_product['market_code'])?$search_product['market_code']:'';
                 
                $errorfield='';
                if ($product_num=='') {
                    $errorfield.='product_num';
                }
                if ($line_code=='') {
                    $errorfield.=' line_code';
                }
                if ($market_code=='') {
                    $errorfield.=' market_code';
                }
                $response[] = array('name'=>'dealer_search_product','item'=>$product_num.'~'.$line_code.'~'.$market_code,'status'=>'fail','error_description'=>$errorfield.' field missing');
            }
        }
        return  [$response];
    }
   
    /**
     * {@inheritdoc}
     */
    public function getById($searchProductId)
    {
        $searchProduct = $this->searchProductFactory->create();
        $this->resource->load($searchProduct, $searchProductId);
        if (!$searchProduct->getId()) {
            throw new NoSuchEntityException(__('search_product with id "%1" does not exist.', $searchProductId));
        }
        return $searchProduct->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->searchProductCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchProductInterface::class
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
        $collection = $this->searchProductCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            SearchProductInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        return $collection;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        SearchProductInterface $searchProduct
    ) {
        try {
            $searchProductModel = $this->searchProductFactory->create();
            $this->resource->load($searchProductModel, $searchProduct->getSearchProductId());
            $this->resource->delete($searchProductModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the search_product: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($searchProductId)
    {
        return $this->delete($this->getById($searchProductId));
    }
}
