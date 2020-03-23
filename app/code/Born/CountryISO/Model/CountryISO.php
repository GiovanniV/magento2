<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Model;

use Born\CountryISO\Api\Data\CountryISOInterface;
use Born\CountryISO\Api\Data\CountryISOInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class CountryISO extends \Magento\Framework\Model\AbstractModel
{
    protected $_eventPrefix = 'born_countryiso_countryiso';
    protected $countryisoDataFactory;

    protected $dataObjectHelper;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CountryISOInterfaceFactory $countryisoDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\CountryISO\Model\ResourceModel\CountryISO $resource
     * @param \Born\CountryISO\Model\ResourceModel\CountryISO\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CountryISOInterfaceFactory $countryisoDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Born\CountryISO\Model\ResourceModel\CountryISO $resource,
        \Born\CountryISO\Model\ResourceModel\CountryISO\Collection $resourceCollection,
        array $data = []
    ) {
        $this->countryisoDataFactory = $countryisoDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve countryiso model with countryiso data
     * @return CountryISOInterface
     */
    public function getDataModel()
    {
        $countryISOData = $this->getData();

        $countryISODataObject = $this->countryisoDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $countryISODataObject,
            $countryISOData,
            CountryISOInterface::class
        );

        return $countryISODataObject;
    }
}
