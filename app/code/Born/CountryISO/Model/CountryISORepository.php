<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Model;

use Born\CountryISO\Api\CountryISORepositoryInterface;
use Born\CountryISO\Api\Data\CountryISOInterface;
use Born\CountryISO\Api\Data\CountryISOSearchResultsInterfaceFactory;
use Born\CountryISO\Model\ResourceModel\CountryISO as ResourceCountryISO;
use Born\CountryISO\Model\ResourceModel\CountryISO\CollectionFactory as CountryISOCollectionFactory;
use Magento\Directory\Api\CountryInformationAcquirerInterface;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class CountryISORepository
 * @package Born\CountryISO\Model
 */
class CountryISORepository implements CountryISORepositoryInterface
{

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;

    /**
     * @var ResourceCountryISO
     */
    protected $resource;

    /**
     * @var CountryISOFactory
     */
    protected $countryISOFactory;

    /**
     * @var CountryISOSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CountryISOCollectionFactory
     */
    protected $countryISOCollectionFactory;

    /**
     * @var CountryInformationAcquirerInterface
     */
    protected $countryInformation;

    /**
     * CountryISORepository constructor.
     * @param ResourceCountryISO $resource
     * @param CountryISOFactory $countryISOFactory
     * @param CountryISOCollectionFactory $countryISOCollectionFactory
     * @param CountryISOSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param CountryInformationAcquirerInterface $countryInformation
     */
    public function __construct(
        ResourceCountryISO $resource,
        CountryISOFactory $countryISOFactory,
        CountryISOCollectionFactory $countryISOCollectionFactory,
        CountryISOSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        CountryInformationAcquirerInterface $countryInformation
    ) {
        $this->resource = $resource;
        $this->countryISOFactory = $countryISOFactory;
        $this->countryISOCollectionFactory = $countryISOCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->countryInformation = $countryInformation;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($countryId)
    {
        $countryISO = $this->countryISOFactory->create();
        $this->resource->load($countryISO, $countryId);
        if (!$countryISO->getId()) {
            throw new NoSuchEntityException(__('Country with country_id "%1" does not exist.', $countryId));
        }
        return $countryISO->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryIdByISOCode($isoCode)
    {
        $countryISO = $this->countryISOFactory->create();
        $this->resource->load($countryISO, $isoCode, CountryISOInterface::ISO3166_CODE);
        if (!$countryISO->getId()) {
            throw new NoSuchEntityException(__('CountryISO with iso_code "%1" does not exist.', $isoCode));
        }
        return $countryISO->getDataModel();
    }

    /**
     * @param $isoCode
     * @return \Magento\Directory\Api\Data\CountryInformationInterface|mixed
     * @throws NoSuchEntityException
     */
    public function getCountryModelByIsoCode($isoCode)
    {
        $countryISOModel = $this->getCountryIdByISOCode($isoCode);
        return $this->countryInformation->getCountryInfo($countryISOModel->getCountryId());
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->countryISOCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            CountryISOInterface::class
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
}
