<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model;

use Born\WebsiteStoreCreator\Api\WebsiteCreatorInterface;
use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Born\CountryISO\Api\CountryISORepositoryInterface;
use Magento\Directory\Model\CountryFactory;
use Magento\Store\Model\Group as StoreGroupModel;
use Magento\Store\Model\Website as WebsiteModel;
use Magento\Store\Model\Store as StoreModel;
use Born\WebsiteStoreCreator\Setup\UpgradeData;
use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterfaceFactory;
use Magento\Framework\ObjectManagerInterface;

/**
 * Class WebsiteCreator
 * @package Born\WebsiteStoreCreator\Model
 */
class WebsiteCreator implements WebsiteCreatorInterface
{
    /**
     * @var StoreShipToRepositoryInterface
     */
    private $storeShipToRepository;

    /**
     * @var CountryISORepositoryInterface
     */
    private $countryISORepository;

    /**
     * @var CountryFactory
     */
    private $countryFactory;

    /**
     * @var StoreShipToInterfaceFactory
     */
    private $shipToFactory;

    /**
     * @var ObjectManagerInterface
     */
    private $objectManager;

    /**
     * WebsiteCreator constructor.
     * @param StoreShipToRepositoryInterface $storeShipToRepository
     * @param CountryISORepositoryInterface $countryISORepository
     * @param CountryFactory $countryFactory
     * @param StoreShipToInterfaceFactory $shipToFactory
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(
        StoreShipToRepositoryInterface $storeShipToRepository,
        CountryISORepositoryInterface $countryISORepository,
        CountryFactory $countryFactory,
        StoreShipToInterfaceFactory $shipToFactory,
        ObjectManagerInterface $objectManager
    ) {
        $this->storeShipToRepository = $storeShipToRepository;
        $this->countryISORepository = $countryISORepository;
        $this->countryFactory = $countryFactory;
        $this->shipToFactory = $shipToFactory;
        $this->objectManager = $objectManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save($store_shipto) {

        $response = [];
        $errorInfo = [];

        if (isset($store_shipto['row']['action'])) {
            $store_shipto['row']=[$store_shipto['row']];
        }

        foreach ($store_shipto['row'] as $row) {
            if (!isset($row['ship_to_number'])) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'ship_to_number field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($row['store_shipto'])) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'store_shipto field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($row['country'])) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'country field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($row['currency'])) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'currency field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($row['domain'])) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'domain field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($row['language'])) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'language field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }

            $countryISO = $this->countryISORepository->getCountryIdByISOCode($row['country']);
            $domain = strtolower($row['domain']);

            /* @var  $country \Magento\Directory\Model\Country */
            $country = $this->countryFactory->create()->loadByCode($countryISO->getCountryId());

            $websiteCode = 'website_' . str_replace('.', '_', $row['store_shipto']);
            $websiteName = str_replace('.', '_', $domain)
                . ' ' . $row['currency'] . ' ' . $country->getName();
            $websiteModel = $this->objectManager->create(WebsiteModel::class);

            $websiteModel->load($websiteCode, 'code');
            if (!$websiteModel->getId()) {
                $websiteModel->setId(null);
            }
            $websiteModel->setCode($websiteCode);
            $websiteModel->setName($websiteName);
            $websiteModel->save();

            $groupCode = 'group_' . str_replace('.', '_', $row['store_shipto']);
            $groupName = $domain;
            $groupModel = $this->objectManager->create(StoreGroupModel::class);

            $groupModel->load($groupCode, 'code');
            if (!$groupModel->getId()) {
                $groupModel->setId(null);
            }
            $groupModel->setWebsiteId($websiteModel->getId());
            $groupModel->setCode($groupCode);
            $groupModel->setName($groupName);
            $groupModel->setRootCategoryId(UpgradeData::ROOT_CATEGORY_ID);
            $groupModel->save();

            $websiteModel->setDefaultGroupId($groupModel->getId());
            $websiteModel->save();

            $storeCode = 'store_' . str_replace('.', '_', $row['store_shipto']);
            $storeModel = $this->objectManager->create(StoreModel::class);
            $storeModel->load($storeCode, 'code');
            if (!$storeModel->getId()) {
                $storeModel->setId(null);
            }
            $storeModel->setWebsiteId($websiteModel->getId());
            $storeModel->setGroupId($groupModel->getId());
            $storeModel->setCode($storeCode);
            $storeModel->setName($row['language']);
            $storeModel->setIsActive(false);
            $storeModel->save();

            $groupModel->setDefaultStoreId($storeModel->getId());
            $groupModel->save();

            /* @var  $shipToStore \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface */

            try {
                $shipToStore = $this->storeShipToRepository->getByStoreShipTo($row['store_shipto']);
            } catch (\Exception $e) {
                $shipToStore = $this->shipToFactory->create();
            }

            $shipToStore->setShipToNumber($row['ship_to_number']);
            $shipToStore->setStoreShipto($row['store_shipto']);
            $shipToStore->setPhone($row['phone']);
            $shipToStore->setEmail($row['email']);
            $shipToStore->setFacility($row['facility']);
            $shipToStore->setCountryId($countryISO->getCountryId());
            $shipToStore->setWebsiteId($websiteModel->getId());
            try {
                $shipToStore = $this->storeShipToRepository->save($shipToStore);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'shipToStore relation had save issue please do it manually'];
                $response['row'][]= $errorInfo;
                continue;
            }

            $successInfo = ['item'=>$row['ship_to_number'] . '~' . $row['store_shipto'], 'status'=>'success', 'ErrorDescription'=>''];
            $response['row'][]= $successInfo;
        }

        return $response;
    }
}
