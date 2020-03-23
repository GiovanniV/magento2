<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Api\Data\SearchCategoryInterfaceFactory;
use Born\DealerSearchApi\Api\Data\SearchCategoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Born\DealerSearchApi\Model\ResourceModel\SearchCategory as SearchCategoryResource;
use Born\DealerSearchApi\Model\ResourceModel\SearchCategory\Collection;

/**
 * Class SearchCategory
 * @package Born\DealerSearchApi\Model
 */
class SearchCategory extends AbstractModel
{

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var SearchCategoryInterfaceFactory
     */
    protected $search_categoryDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SearchCategoryInterfaceFactory $search_categoryDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchCategory $resource
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchCategory\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
         Context $context,
         Registry $registry,
         SearchCategoryInterfaceFactory $search_categoryDataFactory,
         DataObjectHelper $dataObjectHelper,
         SearchCategoryResource $resource,
         Collection $resourceCollection,
        array $data = []
    ) {
        $this->search_categoryDataFactory = $search_categoryDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve search_category model with search_category data
     * @return SearchCategoryInterface
     */
    public function getDataModel()
    {
        $search_categoryData = $this->getData();
        
        $search_categoryDataObject = $this->search_categoryDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $search_categoryDataObject,
            $search_categoryData,
            SearchCategoryInterface::class
        );
        
        return $search_categoryDataObject;
    }
}
