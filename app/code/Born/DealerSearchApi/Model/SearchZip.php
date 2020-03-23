<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Api\Data\SearchZipInterfaceFactory;
use Born\DealerSearchApi\Api\Data\SearchZipInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Registry;
use Magento\Framework\Model\Context;
use Born\DealerSearchApi\Model\ResourceModel\SearchZip as SearchZipResource;
use Born\DealerSearchApi\Model\ResourceModel\SearchZip\Collection;

class SearchZip extends AbstractModel
{

    /**
     * @var SearchZipInterfaceFactory
     */
    protected $search_zipDataFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SearchZipInterfaceFactory $search_zipDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchZip $resource
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchZip\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
          Context $context,
          Registry $registry,
          SearchZipInterfaceFactory $search_zipDataFactory,
          DataObjectHelper $dataObjectHelper,
          SearchZipResource $resource,
          Collection $resourceCollection,
        array $data = []
    ) {
        $this->search_zipDataFactory = $search_zipDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve search_zip model with search_zip data
     * @return SearchZipInterface
     */
    public function getDataModel()
    {
        $search_zipData = $this->getData();

        $search_zipDataObject = $this->search_zipDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $search_zipDataObject,
            $search_zipData,
            SearchZipInterface::class
        );
        
        return $search_zipDataObject;
    }
}
