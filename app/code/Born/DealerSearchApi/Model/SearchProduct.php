<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Api\Data\SearchProductInterface;
use Born\DealerSearchApi\Api\Data\SearchProductInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Born\DealerSearchApi\Model\ResourceModel\SearchProduct  as SearchProductResource;
use Born\DealerSearchApi\Model\ResourceModel\SearchProduct\Collection;

/**
 * Class SearchProduct
 * @package Born\DealerSearchApi\Model
 */
class SearchProduct extends AbstractModel
{

    /**
     * @var SearchProductInterfaceFactory
     */
    protected $search_productDataFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SearchProductInterfaceFactory $search_productDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchProduct $resource
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchProduct\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
         Context $context,
         Registry $registry,
         SearchProductInterfaceFactory $search_productDataFactory,
         DataObjectHelper $dataObjectHelper,
         SearchProductResource $resource,
         Collection $resourceCollection,
        array $data = []
    ) {
        $this->search_productDataFactory = $search_productDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve search_product model with search_product data
     * @return SearchProductInterface
     */
    public function getDataModel()
    {
        $search_productData = $this->getData();
        
        $search_productDataObject = $this->search_productDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $search_productDataObject,
            $search_productData,
            SearchProductInterface::class
        );
        
        return $search_productDataObject;
    }
}
