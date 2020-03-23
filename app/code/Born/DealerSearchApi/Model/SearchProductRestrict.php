<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Api\Data\SearchProductRestrictInterfaceFactory;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict\Collection;
use Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict as SearchProductRestrictResource;
use Magento\Framework\Registry;
use Magento\Framework\Model\Context;

/**
 * Class SearchProductRestrict
 * @package Born\DealerSearchApi\Model
 */
class SearchProductRestrict extends AbstractModel
{

    /**
     * @var SearchProductRestrictInterfaceFactory
     */
    protected $search_product_restrictDataFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SearchProductRestrictInterfaceFactory $search_product_restrictDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict $resource
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
         Context $context,
         Registry $registry,
        SearchProductRestrictInterfaceFactory $search_product_restrictDataFactory,
        DataObjectHelper $dataObjectHelper,
        SearchProductRestrictResource $resource,
        Collection $resourceCollection,
        array $data = []
    ) {
        $this->search_product_restrictDataFactory = $search_product_restrictDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve search_product_restrict model with search_product_restrict data
     * @return SearchProductRestrictInterface
     */
    public function getDataModel()
    {
        $search_product_restrictData = $this->getData();
        
        $search_product_restrictDataObject = $this->search_product_restrictDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $search_product_restrictDataObject,
            $search_product_restrictData,
            SearchProductRestrictInterface::class
        );
        
        return $search_product_restrictDataObject;
    }
}
