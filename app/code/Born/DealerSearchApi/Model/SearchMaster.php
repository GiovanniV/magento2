<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Magento\Framework\Api\DataObjectHelper;
use Born\DealerSearchApi\Api\Data\SearchMasterInterface;
use Born\DealerSearchApi\Api\Data\SearchMasterInterfaceFactory;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Born\DealerSearchApi\Model\ResourceModel\SearchMaster as SearchMasterResource;
use Born\DealerSearchApi\Model\ResourceModel\SearchMaster\Collection;

/**
 * Class SearchMaster
 * @package Born\DealerSearchApi\Model
 */
class SearchMaster extends AbstractModel
{

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    /**
     * @var SearchMasterInterfaceFactory
     */
    protected $search_masterDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SearchMasterInterfaceFactory $search_masterDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchMaster $resource
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchMaster\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
         Context $context,
         Registry $registry,
         SearchMasterInterfaceFactory $search_masterDataFactory,
         DataObjectHelper $dataObjectHelper,
         SearchMasterResource $resource,
         Collection $resourceCollection,
        array $data = []
    ) {
        $this->search_masterDataFactory = $search_masterDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve search_master model with search_master data
     * @return SearchMasterInterface
     */
    public function getDataModel()
    {
        $search_masterData = $this->getData();
        
        $search_masterDataObject = $this->search_masterDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $search_masterDataObject,
            $search_masterData,
            SearchMasterInterface::class
        );
        
        return $search_masterDataObject;
    }
}
