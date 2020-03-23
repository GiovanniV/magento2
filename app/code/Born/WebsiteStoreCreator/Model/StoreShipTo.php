<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model;

use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface;
use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class StoreShipTo extends \Magento\Framework\Model\AbstractModel
{
    protected $storeshiptoDataFactory;

    protected $_eventPrefix = 'kn_storeshipto';
    protected $dataObjectHelper;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param StoreShipToInterfaceFactory $storeshiptoDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo $resource
     * @param \Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        StoreShipToInterfaceFactory $storeshiptoDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo $resource,
        \Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo\Collection $resourceCollection,
        array $data = []
    ) {
        $this->storeshiptoDataFactory = $storeshiptoDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve storeshipto model with storeshipto data
     * @return StoreShipToInterface
     */
    public function getDataModel()
    {
        $storeshiptoData = $this->getData();

        $storeshiptoDataObject = $this->storeshiptoDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $storeshiptoDataObject,
            $storeshiptoData,
            StoreShipToInterface::class
        );

        return $storeshiptoDataObject;
    }
}
