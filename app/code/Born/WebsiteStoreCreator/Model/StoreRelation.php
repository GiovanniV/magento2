<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model;

use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface;
use Born\WebsiteStoreCreator\Api\StoreShipToManagementInterface;
use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Magento\Directory\Model\CountryFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class StoreRelation
 * @package Born\WebsiteStoreCreator\Model
 */
class StoreRelation
{

    /**
     * @var array
     */
    private $storeViewToShipToNumber = [
      'kn_filters_us_store_view' => '81515.1.000',
      'kn_filters_ca_store_view' => '81515.1.0004',
      'kn_filters_de_store_view' => '81515.1.GERMAN',
      'kn_filters_fr_store_view' => '81515.1.FRENCH',
      'kn_filters_it_store_view' => '81515.1.ITALIAN',
      'kn_filters_es_store_view' => '81515.1.SPANISH',
      'kn_filters_uk_store_view' => '81523.12.000',
      'airaid_store_view' => '81515.1.AIRAID',
      'spectre_store_view' => '81515.1.0005',
      'aem_intakes_store_view' => '81515.1.0001',
    ];

    /**
     * @var array
     */
    private $websiteToShipToNumber = [
        'kn_filters_us' => '81515.1.000',
        'kn_filters_ca' => '81515.1.0004',
        'kn_filters_de' => '81515.1.GERMAN',
        'kn_filters_fr' => '81515.1.FRENCH',
        'kn_filters_it' => '81515.1.ITALIAN',
        'kn_filters_es' => '81515.1.SPANISH',
        'kn_filters_uk' => '81523.12.000',
        'airaid' => '81515.1.AIRAID',
        'spectre' => '81515.1.0005',
        'aem_intakes' => '81515.1.0001',
    ];

    /**
     * @var array
     */
    private $shipToDomain = [
        'knfilters.com' => '81515.1.000',
        'knfilters.ca' => '81515.1.0004',
        'knluftfilter.com' => '81515.1.GERMAN',
        'knfiltres.com' => '81515.1.FRENCH',
        'knfiltri.com' => '81515.1.ITALIAN',
        'knfiltros.com' => '81515.1.SPANISH',
        'knfilters.co.uk' => '81523.12.000',
        'airaid.com' => '81515.1.AIRAID',
        'spectreperformance.com' => '81515.1.0005',
        'aemintakes.com' => '81515.1.0001',
    ];

    /**
     * @var array
     */
    private $shipToLanguage = [
        '81515.1.000' => 'English',
        '81515.1.0004' => 'English',
        '81515.1.GERMAN' => 'German',
        '81515.1.FRENCH' => 'French',
        '81515.1.ITALIAN' => 'Italian',
        '81515.1.SPANISH' => 'Spanish',
        '81523.12.000' => 'English',
        '81515.1.AIRAID' => 'English',
        '81515.1.0005' => 'English',
        '81515.1.0001' => 'English',
    ];

    /**
     * @var StoreShipToManagementInterface
     */
    private $storeShipToManagement;

    /**
     * @var StoreShipToRepositoryInterface
     */
    private $storeShipToRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var CountryFactory
     */
    private $countryFactory;

    /**
     * StoreRelation constructor.
     * @param StoreShipToManagementInterface $storeShipToManagement
     * @param StoreShipToRepositoryInterface $storeShipToRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param CountryFactory $countryFactory
     */
    public function __construct(
        StoreShipToManagementInterface $storeShipToManagement,
        StoreShipToRepositoryInterface $storeShipToRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CountryFactory $countryFactory
    ) {
        $this->storeShipToManagement = $storeShipToManagement;
        $this->storeShipToRepository = $storeShipToRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->countryFactory = $countryFactory;
    }

    /**
     * @param $shipToNumber
     * @return false|int|string
     */
    public function getDomainByShipToNumber($shipToNumber)
    {
        return array_search($shipToNumber, $this->shipToDomain);
    }

    /**
     * @param $shipToNumber
     * @return mixed
     */
    public function getLanguageByShipToNumber($shipToNumber)
    {
        return $this->shipToLanguage[$shipToNumber];
    }

    /**
     * @param $websiteId
     * @return null|string
     * @throws \Exception
     */
    public function getShipToNumberByWebsiteId($websiteId)
    {
        return $this->getShipToRelationByWebsiteId($websiteId)->getShipToNumber();
    }

    /**
     * @param $websiteId
     * @return mixed
     * @throws \Exception
     */
    public function getCountryNameByWebsiteId($websiteId)
    {
        $shipToRelation = $this->getShipToRelationByWebsiteId($websiteId);
        $country = $this->countryFactory->create()->loadByCode($shipToRelation->getCountryId());
        return $country->getName();
    }

    /**
     * @param $websiteId
     * @return StoreShipToInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getShipToRelationByWebsiteId($websiteId)
    {
        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            StoreShipToInterface::WEBSITE_ID,
            $websiteId
        )->create();

        $shipToResult = $this->storeShipToRepository->getList($searchCriteria);
        foreach ($shipToResult->getItems() as $shipTo) {
            return $shipTo;
        }
        throw new \Exception('No ship_to_number for website_id: ' . $websiteId);
    }
}
