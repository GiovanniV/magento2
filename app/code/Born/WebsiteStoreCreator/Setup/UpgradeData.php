<?php
/**
 * Born_WebsiteStoreCreator UpgradeData
 * @category  PHP
 * @package   Born\WebsiteStoreCreator
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 *
 */
namespace Born\WebsiteStoreCreator\Setup;

use Born\CountryISO\Api\CountryISORepositoryInterface;
use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterfaceFactory;
use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Born\WebsiteStoreCreator\Model\StoreRelation;
use Magento\Directory\Model\CountryFactory;
use Magento\Framework\App\Area;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\State;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\Registry;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Xml\Parser;
use Magento\Store\Model\Group as StoreGroupModel;
use Magento\Store\Model\GroupFactory;
use Magento\Store\Model\ResourceModel\Group;
use Magento\Store\Model\ResourceModel\Store;
use Magento\Store\Model\ResourceModel\Website;
use Magento\Store\Model\Store as DefaultStore;
use Magento\Store\Model\Store as StoreModel;
use Magento\Store\Model\StoreFactory;
use Magento\Store\Model\Website as WebsiteModel;
use Magento\Store\Model\WebsiteFactory;
use Magento\Store\Model\WebsiteRepository;
use Magento\Theme\Model\Config;
use Magento\Theme\Model\ResourceModel\Theme\CollectionFactory;
use Magento\Theme\Model\ThemeFactory;
use Amasty\MultiInventory\Model\WarehouseFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Amasty\MultiInventory\Api\WarehouseRepositoryInterface;
use Amasty\MultiInventory\Model\Warehouse\StoreFactory as WarehouseStoreFactory;
use Amasty\MultiInventory\Model\Warehouse\CustomerGroupFactory as WarehouseCustomerGroupFactory;

/**
 * Class UpgradeData
 * @package Born\WebsiteStoreCreator\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     *
     */
    const THMEM_PATH = "Borngroup/kn_theme";
    /**
     *
     */
    const THEME_PATH2 = "Borngroup/kandn";
    /**
     *
     */
    const THEME_PATH3 = "Born/kandn";
    /**
     *
     */
    const DEFAULT_THEME_PATH = "Born/kn";

    /**
     *
     */
    const ROOT_CATEGORY_ID = 2;

    /**
     * @var \Magento\Theme\Model\Config
     */
    private $config;

    /**
     * @var \Magento\Theme\Model\ResourceModel\Theme\CollectionFactory
     */
    private $collectionFactory;
    /*
     * @var \Magento\Store\Model\StoreFactory
     */
    /**
     * @var StoreFactory
     */
    private $storeFactory;
    /*
     * @var \Magento\Store\Model\WebsiteFactory
     */
    /**
     * @var WebsiteFactory
     */
    private $websiteFactory;
    /*
     * @var \Magento\Store\Model\GroupFactory
     */
    /**
     * @var GroupFactory
     */
    private $groupFactory;
    /*
     * @var \Magento\Store\Model\ResourceModel\Group
     */
    /**
     * @var Group
     */
    private $groupResourceModel;
    /*
     * @var \Magento\Framework\Event\ManagerInterface
     */
    /**
     * @var ManagerInterface
     */
    private $eventManager;
    /**
     * @var \Magento\Store\Model\Store
     */
    private $defaultStore;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Framework\App\Config\Storage\WriterInterface
     */
    protected $_configWriter;

    /**
     * @var WebsiteRepository
     */
    protected $websiteRepository;

    /**
     * @var Store
     */
    protected $store;

    /**
     * @var Website
     */
    protected $website;

    /**
     * @var ThemeFactory
     */
    protected $themeFactory;

    /**
     * @var StoreModel
     */
    protected $storeModel;

    /**
     * @var WebsiteModel
     */
    protected $websiteModel;

    /**
     * @var StoreGroupModel
     */
    protected $storeGroupModel;

    /**
     * @var ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @var State
     */
    private $state;

    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var Parser
     */

    private $xmlParser;

    /**
     * @var Reader
     */
    private $moduleDirReader;

    /**
     * @var CountryISORepositoryInterface
     */
    private $countryISORepository;

    /**
     * @var CountryFactory
     */
    private $countryFactory;

    /**
     * @var StoreRelation
     */
    private $storeRelation;

    /**
     * @var StoreShipToInterfaceFactory
     */
    private $shipToFactory;

    /**
     * @var StoreShipToRepositoryInterface
     */
    private $storeShipToRepository;

    /**
     * @var WarehouseFactory
     */
    private $warehouseFactory;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var WarehouseRepositoryInterface
     */
    private $warehouseRepository;

    /**
     * @var WarehouseStoreFactory
     */
    private $warehouseStoreFactory;

    /**
     * @var WarehouseCustomerGroupFactory
     */
    private $warehouseGroupFactory;

    /**
     * UpgradeData constructor.
     * @param \Magento\Framework\App\Config\Storage\WriterInterface $configWriter
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param WebsiteRepository $websiteRepository
     * @param Store $store
     * @param Website $website
     * @param ThemeFactory $themeFactory
     * @param CollectionFactory $collectionFactory
     * @param Config $config
     * @param StoreModel $defaultStore
     * @param StoreFactory $storeFactory
     * @param WebsiteFactory $websiteFactory
     * @param GroupFactory $groupFactory
     * @param Group $groupResourceModel
     * @param ManagerInterface $eventManager
     * @param StoreModel $storeModel
     * @param WebsiteModel $websiteModel
     * @param StoreGroupModel $storeGroupModel
     * @param ObjectManagerInterface $objectManager
     * @param State $state
     * @param Registry $registry
     * @param Parser $xmlParser
     * @param Reader $moduleDirReader
     * @param CountryISORepositoryInterface $countryISORepository
     * @param CountryFactory $countryFactory
     * @param StoreRelation $storeRelation
     * @param StoreShipToInterfaceFactory $shipToFactory
     * @param StoreShipToRepositoryInterface $storeShipToRepository
     * @param WarehouseFactory $warehouseFactory
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param WarehouseRepositoryInterface $warehouseRepository
     * @param WarehouseStoreFactory $warehouseStoreFactory
     * @param WarehouseCustomerGroupFactory $warehouseGroupFactory
     */
    public function __construct(
        \Magento\Framework\App\Config\Storage\WriterInterface $configWriter,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
         WebsiteRepository $websiteRepository,
        Store $store,
        Website $website,
        ThemeFactory $themeFactory,
        CollectionFactory $collectionFactory,
        Config $config,
        DefaultStore $defaultStore,
        StoreFactory $storeFactory,
        WebsiteFactory $websiteFactory,
        GroupFactory $groupFactory,
        Group $groupResourceModel,
        ManagerInterface $eventManager,
        StoreModel $storeModel,
        WebsiteModel $websiteModel,
        StoreGroupModel $storeGroupModel,
        ObjectManagerInterface $objectManager,
        State $state,
        Registry $registry,
        Parser $xmlParser,
        Reader $moduleDirReader,
        CountryISORepositoryInterface $countryISORepository,
        CountryFactory $countryFactory,
        StoreRelation $storeRelation,
        StoreShipToInterfaceFactory $shipToFactory,
        StoreShipToRepositoryInterface $storeShipToRepository,
        WarehouseFactory $warehouseFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        WarehouseRepositoryInterface $warehouseRepository,
        WarehouseStoreFactory $warehouseStoreFactory,
        WarehouseCustomerGroupFactory $warehouseGroupFactory
    ) {
        $this->_configWriter = $configWriter;
        $this->_storeManager = $storeManager;
        $this->websiteRepository = $websiteRepository;
        $this->store = $store;
        $this->website = $website;
        $this->themeFactory = $themeFactory;
        $this->collectionFactory = $collectionFactory;
        $this->config = $config;
        $this->defaultStore = $defaultStore;
        $this->storeFactory = $storeFactory;
        $this->websiteFactory = $websiteFactory;
        $this->groupFactory = $groupFactory;
        $this->groupResourceModel = $groupResourceModel;
        $this->eventManager = $eventManager;
        $this->storeModel = $storeModel;
        $this->websiteModel = $websiteModel;
        $this->storeGroupModel = $storeGroupModel;
        $this->objectManager = $objectManager;
        $this->state = $state;
        $this->registry = $registry;
        $this->xmlParser = $xmlParser;
        $this->moduleDirReader = $moduleDirReader;
        $this->countryISORepository = $countryISORepository;
        $this->countryFactory = $countryFactory;
        $this->storeRelation = $storeRelation;
        $this->shipToFactory = $shipToFactory;
        $this->storeShipToRepository = $storeShipToRepository;
        $this->warehouseFactory = $warehouseFactory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->warehouseRepository = $warehouseRepository;
        $this->warehouseStoreFactory = $warehouseStoreFactory;
        $this->warehouseGroupFactory = $warehouseGroupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            /*$websites = $this->_storeManager->getWebsites();
            $scope = 'websites';
            foreach ($websites as $website) {
                $this->getLocaleAndCurrency($website->getCode(), $website->getId(), $scope);
            }
            */
        }
        if (version_compare($context->getVersion(), '1.0.2', '<')) {
//            $website = $this->websiteRepository->get('kn_filters_us');
//            $website->setIsDefault(true);
//            $website->save();
        }
        if (version_compare($context->getVersion(), '1.0.3', '<')) {
            $this->_configWriter->delete('design/theme/theme_id');
        }

        if (version_compare($context->getVersion(), '1.0.4', '<')) {
//            $this->changeStoreCodeToLowerCase();
//            $this->changeWebsiteCodeToLowerCase();
        }

        if (version_compare($context->getVersion(), '1.0.5', '<')) {
            $this->deleteOldTheme();
        }

        if (version_compare($context->getVersion(), '1.0.6', '<')) {
            $this->setDefaultTheme();
        }

        if (version_compare($context->getVersion(), '1.0.7', '<')) {
            //  $this->setJPCHWebsite();
        }

        if (version_compare($context->getVersion(), '1.0.8', '<')) {
            $this->deleteOldTheme();
            $this->setDefaultTheme();
        }

        if (version_compare($context->getVersion(), '1.0.9', '<')) {
            $this->setJsBinding();
        }

        if (version_compare($context->getVersion(), '1.0.10', '<')) {
            $this->deleteOldTheme();
        }

        if (version_compare($context->getVersion(), '1.0.11', '<')) {
            $this->deleteAllWebsitesExceptDefault();
        }

        if (version_compare($context->getVersion(), '1.0.13', '<')) {
            $this->addStoresBasedonXML();
        }

        if (version_compare($context->getVersion(), '1.0.14', '<')) {
            $this->removeLegacyWebsiteStore();
        }
        if (version_compare($context->getVersion(), '1.0.15', '<')) {
            $this->removeCustomersOrders($setup);
        }

        if (version_compare($context->getVersion(), '1.0.16', '<')) {
            $this->removeReviews($setup);
        }

        if (version_compare($context->getVersion(), '1.0.17', '<')) {
            $this->setPriceScope();
        }

        if (version_compare($context->getVersion(), '1.0.18', '<')) {
            $this->setCurrencies();
        }

        if (version_compare($context->getVersion(), '1.0.19', '<')) {
            $this->setWarehouses();
        }

        if (version_compare($context->getVersion(), '1.0.20', '<')) {
            $this->setStoreBaseCurrency();
        }

        if (version_compare($context->getVersion(), '1.0.21', '<')) {
            $this->updateCurrencies();
        }

        if (version_compare($context->getVersion(), '1.0.22', '<')) {
            $this->enableLogs();
        }

        $setup->endSetup();
    }

    /*
     * Retrieve locale and currency based on website code
     * **/
    /**
     * @param $websiteCode
     * @param $WebsiteId
     * @param $scope
     */
    private function getLocaleAndCurrency($websiteCode, $WebsiteId, $scope)
    {
        switch ($websiteCode) {
            case 'kn_filters_us':
            case 'airaid':
            case 'spectre':
            case 'aem_intakes':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'US');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'en_US');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'USD');
                break;
            case 'kn_filters_ca':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'CA');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'en_US');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'USD');
                break;
            case 'kn_filters_de':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'DE');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'de_DE');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'EUR');
                break;
            case 'kn_filters_fr':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'FR');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'fr_FR');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'EUR');
                break;
            case 'kn_filters_it':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'IT');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'it_IT');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'EUR');
                break;
            case 'kn_filters_es':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'ES');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'es_ES');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'EUR');
                break;
            case 'kn_filters_uk':
                $this->addDefaultCountryToWebsite($WebsiteId, $scope, 'GB');
                $this->addLocaleToWebsite($WebsiteId, $scope, 'en_US');
                $this->addCurrencyToWebsite($WebsiteId, $scope, 'GBP');
                break;
        }
    }

    /*
     * Adding default country to multiple websites into core_config_data table
     * **/
    /**
     * @param $scopeId
     * @param $scope
     * @param $value
     */
    private function addDefaultCountryToWebsite($scopeId, $scope, $value)
    {
        $this->_configWriter->save('general/country/default', $value, $scope, $scopeId);
    }

    /*
     * Adding locale to multiple websites into core_config_data table
     * **/
    /**
     * @param $scopeId
     * @param $scope
     * @param $value
     */
    private function addLocaleToWebsite($scopeId, $scope, $value)
    {
        $this->_configWriter->save('general/locale/code', $value, $scope, $scopeId);
    }
    /*
     * Adding config value of currency for multiple website
     * ***/
    /**
     * @param $scopeId
     * @param $scope
     * @param $value
     */
    private function addCurrencyToWebsite($scopeId, $scope, $value)
    {
        $this->_configWriter->save('currency/options/base', $value, $scope, $scopeId);
        $this->_configWriter->save('currency/options/default', $value, $scope, $scopeId);
        $this->_configWriter->save('currency/options/allow', $value, $scope, $scopeId);
    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    private function changeStoreCodeToLowerCase()
    {
        $stores = $this->_storeManager->getStores();
        foreach ($stores as $store) {
            $storeCode  = $store->getCode();
            $store->setCode(strtolower($storeCode));
            $this->store->save($store);
        }
    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    private function changeWebsiteCodeToLowerCase()
    {
        $websites = $this->websiteRepository->getList();
        foreach ($websites as $website) {
            $websiteCode = $website->getCode();
            $website->setCode(strtolower($websiteCode));
            $this->website->save($website);
        }
    }

    /**
     *
     */
    private function deleteOldTheme()
    {
        $themes = $this->themeFactory->create()->getCollection()->load();
        foreach ($themes as $theme) {
            if ($theme["theme_path"] == self::THMEM_PATH || $theme["theme_path"] == self::THEME_PATH2 || $theme["theme_path"] == self::THEME_PATH3) {
                $theme->delete();
            }
        }
    }

    /**
     *
     */
    private function setDefaultTheme()
    {
        $themes = $this->collectionFactory->create()->loadRegisteredThemes();
        /**
         * @var \Magento\Theme\Model\Theme $theme
         */
        foreach ($themes as $theme) {
            if ($theme->getCode() == self::DEFAULT_THEME_PATH) {
                $this->config->assignToStore(
                    $theme,
                    [$this->defaultStore::DEFAULT_STORE_ID],
                    ScopeConfigInterface::SCOPE_TYPE_DEFAULT
                );
            }
        }
    }

    /**
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    private function setJPCHWebsite()
    {
        $default_attributes = [
                [
                    'website_code' => 'kn_filters_ch',
                    'website_name' => 'KN Filters CH',
                    'group_name' => 'KN Filters CH Store',
                    'store_code' => 'kn_filters_ch_store_view',
                    'store_name' => 'CH',
                    'is_active' => '1',
                    'root_category_id' => 2
                ],
                [
                    'website_code' => 'kn_filters_jp',
                    'website_name' => 'KN Filters JP',
                    'group_name' => 'KN Filters JP Store',
                    'store_code' => 'kn_filters_jp_store_view',
                    'store_name' => 'JP',
                    'is_active' => '1',
                    'root_category_id' => 2
                ]
            ];
        $default_attributes = [];
        foreach ($default_attributes as $attribute) {
            /** @var  \Magento\Store\Model\Store $store */
            $store = $this->storeFactory->create();
            $store->load($attribute['store_code']);

            if (!$store->getId()) {
                /** @var \Magento\Store\Model\Website $website */
                $website = $this->websiteFactory->create();
                $website->load($attribute['website_code']);
                $website = $this->setWebID($website, $attribute);

                /** @var \Magento\Store\Model\Group $group */
                $group = $this->groupFactory->create();
                $group->setWebsiteId($website->getWebsiteId());
                $group->setName($attribute['group_name']);
                $group->setCode($attribute['store_code']);
                $group->setRootCategoryId($attribute['root_category_id']);
                $this->groupResourceModel->save($group);

                $group = $this->groupFactory->create();
                $group->load($attribute['group_name'], 'name');
                $store->setCode($attribute['store_code']);
                $store->setName($attribute['store_name']);
                $store->setWebsite($website);
                $store->setGroupId($group->getId());
                $store->setData('is_active', $attribute['is_active']);
                $this->store->save($store);
                $this->eventManager->dispatch('store_add', ['store' => $store]);
            }
        }
    }

    /*
     * @param \Magento\Store\Model\Website $website
     * @param array $attribute
     * @return \Magento\Store\Model\Website
     */
    /**
     * @param $website
     * @param $attribute
     * @return mixed
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function setWebID($website, $attribute)
    {
        if (!$website->getId()) {
            $website->setCode($attribute['website_code']);
            $website->setName($attribute['website_name']);
            $this->website->save($website);
        }

        return $website;
    }

    /**
     *
     */
    private function setJsBinding()
    {
        $this->_configWriter->save('dev/js/enable_js_bundling', 1);
    }

    /**
     * @throws \Exception
     */
    private function deleteAllWebsitesExceptDefault()
    {
        $this->state->setAreaCode(Area::AREA_ADMINHTML);
        $this->registry->register('isSecureArea', true);
        $notRemovedWebsites = [];
        $defaultWebsite ='';
        $defaultGroup='';

        foreach ($this->_storeManager->getWebsites() as $website) {
            if ($website->getId()) {
                $model = $this->objectManager->create(WebsiteModel::class)->load($website->getId());
                $model->isReadOnly(false);
                if ($model->isCanDelete()) {
                    $model->delete();
                } else {
                    $notRemovedWebsites[] = $website->getId();
                    $defaultWebsite = $website;
                }
            }
        }

        foreach ($this->_storeManager->getGroups() as $group) {
            if ($group->getId()) {
                $model = $this->objectManager->create(StoreGroupModel::class)->load($group->getId());
                if (!in_array($group->getWebsiteId(), $notRemovedWebsites)) {
                    $model->setWebsite($defaultWebsite);
                    $model->delete();
                } else {
                    $defaultGroup = $group;
                }
            }
        }

        foreach ($this->_storeManager->getStores() as $store) {
            if ($store->getId()) {
                $model = $this->objectManager->create(StoreModel::class)->load($store->getId());
                if (!in_array($store->getWebsiteId(), $notRemovedWebsites)) {
                    $model->setGroup($defaultGroup);
                    $model->delete();
                }
            }
        }
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function addStoresBasedonXML()
    {
        $filePath = $this->moduleDirReader->getModuleDir('', 'Born_WebsiteStoreCreator')
            . '/Setup/import/store_shipto.xml';
        $parsedArray = $this->xmlParser->load($filePath)->xmlToArray();
        foreach ($parsedArray['store_shipto']['row'] as $row) {
            $countryISO = $this->countryISORepository->getCountryIdByISOCode($row['country']);
            /* @var  $country \Magento\Directory\Model\Country */
            $country = $this->countryFactory->create()->loadByCode($countryISO->getCountryId());

            $websiteCode = 'website_' . str_replace('.', '_', $row['store_shipto']);
            $websiteName = str_replace('.', '_', $this->storeRelation->getDomainByShipToNumber($row['ship_to_number']))
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
            $groupName = $this->storeRelation->getDomainByShipToNumber($row['ship_to_number']);
            $groupModel = $this->objectManager->create(StoreGroupModel::class);

            $groupModel->load($groupCode, 'code');
            if (!$groupModel->getId()) {
                $groupModel->setId(null);
            }
            $groupModel->setWebsiteId($websiteModel->getId());
            $groupModel->setCode($groupCode);
            $groupModel->setName($groupName);
            $groupModel->setRootCategoryId(self::ROOT_CATEGORY_ID);
            $groupModel->save();

            $websiteModel->setDefaultGroupId($groupModel->getId());
            if ($row['store_shipto']=='81515.1.000') {
                $websiteModel->setIsDefault(true);
            }
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
            $storeModel->setName($this->storeRelation->getLanguageByShipToNumber($row['ship_to_number']));
            $storeModel->setIsActive(true);
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
            $shipToStore = $this->storeShipToRepository->save($shipToStore);
        }
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function removeLegacyWebsiteStore()
    {
        if (!$this->registry->registry('isSecureArea')) {
            $this->registry->register('isSecureArea', true);
        }

        foreach ($this->_storeManager->getWebsites() as $website) {
            if ($website->getCode()=='kn_filters_us') {
                $model = $this->objectManager->create(WebsiteModel::class)->load($website->getId());
                $model->isReadOnly(false);
                if ($model->isCanDelete()) {
                    $model->delete();
                }
            }
        }

        foreach ($this->_storeManager->getGroups() as $group) {
            if ($group->getCode()=='kn_filters_us_store_view') {
                $model = $this->objectManager->create(StoreGroupModel::class)->load($group->getId());
                $model->setWebsite($this->_storeManager->getWebsite('website_81515_1_000'));
                $model->delete();
            }
        }

        foreach ($this->_storeManager->getStores() as $store) {
            if ($store->getCode()=='kn_filters_us_store_view') {
                $model = $this->objectManager->create(StoreModel::class)->load($store->getId());
                $model->setGroup($this->_storeManager->getGroup(0));
                $model->delete();
            }
        }
    }

    /**
     * @param $setup
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function removeCustomersOrders($setup)
    {
        $this->state->setAreaCode(Area::AREA_ADMINHTML);
        try {
            $setup->getConnection()->delete($setup->getTable('customer_entity'));
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
        try {
            $order = $this->objectManager->create('\Magento\Sales\Model\Order');
            $orderCollection = $order->getCollection()
                ->addAttributeToSelect("*");
            foreach ($orderCollection as $order) {
                $this->registry->register('isSecureArea', true);
                $order->delete();
                $this->registry->unregister('isSecureArea');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * @param $setup
     */
    public function removeReviews($setup)
    {
        $setup->getConnection()->delete($setup->getTable('review'));
        $setup->getConnection()->delete($setup->getTable('review_detail'));
        $setup->getConnection()->delete($setup->getTable('review_store'));
        $setup->getConnection()->delete($setup->getTable('review_entity_summary'));
        $setup->getConnection()->delete($setup->getTable('customer_address_entity'));
        $setup->getConnection()->delete($setup->getTable('customer_address_entity_datetime'));
        $setup->getConnection()->delete($setup->getTable('customer_address_entity_decimal'));
        $setup->getConnection()->delete($setup->getTable('customer_address_entity_int'));
        $setup->getConnection()->delete($setup->getTable('customer_address_entity_text'));
        $setup->getConnection()->delete($setup->getTable('customer_address_entity_varchar'));
        $setup->getConnection()->delete($setup->getTable('customer_entity_datetime'));
        $setup->getConnection()->delete($setup->getTable('customer_entity_decimal'));
        $setup->getConnection()->delete($setup->getTable('customer_entity_int'));
        $setup->getConnection()->delete($setup->getTable('customer_entity_text'));
        $setup->getConnection()->delete($setup->getTable('customer_entity_varchar'));
        $setup->getConnection()->delete($setup->getTable('customer_grid_flat'));
        $setup->getConnection()->delete($setup->getTable('customer_log'));
        $setup->getConnection()->delete($setup->getTable('customer_visitor'));
    }

    /**
     *
     */
    private function setPriceScope()
    {
        $this->_configWriter->save('catalog/price/scope', 1);
    }

    /**
     *
     */
    private function setCurrencies()
    {
        $filePath = $this->moduleDirReader->getModuleDir('', 'Born_WebsiteStoreCreator')
            . '/Setup/import/store_shipto.xml';
        $parsedArray = $this->xmlParser->load($filePath)->xmlToArray();
        foreach ($parsedArray['store_shipto']['row'] as $row) {
            $storeShipToRelation = $this->storeShipToRepository->getByStoreShipTo($row['store_shipto']);
            $this->_configWriter->save('currency/options/default', $row['currency'],ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $storeShipToRelation->getWebsiteId());
            $this->_configWriter->save('currency/options/allow', $row['currency'],ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $storeShipToRelation->getWebsiteId());
            $this->_configWriter->save('currency/options/base', $row['currency'],ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $storeShipToRelation->getWebsiteId());
        }
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function setWarehouses()
    {
        $this->_configWriter->save('amasty_multi_inventory/stock/enabled_multi', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/defination_warehouse', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/separate_orders', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/decrease_stock', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/decrease_physical', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/lock_on_store', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_customer_group_priority', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_customer_group_is_active', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_nearest_priority', 2);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_nearest_is_active', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_priority_warehouses_priority', 3);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_priority_warehouses_is_active', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_store_view_priority', 4);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_store_view_is_active', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_stock_priority', 5);
        $this->_configWriter->save('amasty_multi_inventory/stock/dispatch_order_stock_is_active', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/use_google_to_locate', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/return_creditmemo', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/low_stock', 1);
        $this->_configWriter->save('amasty_multi_inventory/stock/backorders_default', 0);
        $this->_configWriter->save('amasty_multi_inventory/stock/backorders_action', 0);
        $this->_configWriter->save('amasty_multi_inventory/general/enable_log', 1);
        $this->_configWriter->save('amasty_multi_inventory/general/google_address', 0);

        $warehouses = [];
        $searchCriteria = $this->searchCriteriaBuilder->create();
        foreach ($this->storeShipToRepository->getList($searchCriteria)->getItems() as $websiteRelationItem) {
            $websiteRelationItem->getFacility();
            $website = $this->_storeManager->getWebsite($websiteRelationItem->getWebsiteId());
            $group = $this->_storeManager->getGroup($website->getDefaultGroupId());

            $warehouses [$websiteRelationItem->getFacility()][]=$group->getDefaultStoreId();

        }

        foreach ($warehouses as $warehouse_code => $warehouse_stores) {
            $warehouseModel = $this->warehouseFactory->create();
            $data = [];
            $data['warehouse_id'] = null;
            $data['code'] = $warehouse_code;
            $data['title'] = $warehouse_code;
            $data['backorders'] = 0;
            $data['backorders'] = 0;
            $data['is_shipping'] = 0;
            $data['priority'] = 1;
            $warehouseModel->setData($data);
            $this->warehouseRepository->save($warehouseModel);

            foreach ($warehouse_stores as $id) {
                /* @var \Amasty\MultiInventory\Model\Warehouse\Store $object*/
                $object = $this->warehouseStoreFactory->create();
                $object->setStoreId($id);
                $warehouseModel->addStore($object);
            }

            foreach ([0,1,2,3] as $id) {
                /* @var \Amasty\MultiInventory\Model\Warehouse\CustomerGroup $object*/
                $object = $this->warehouseGroupFactory->create();
                $object->setGroupId($id);
                $warehouseModel->addGroupCustomer($object);
            }
            $this->warehouseRepository->save($warehouseModel);
        }
    }

    /**
     *
     */
    private function setStoreBaseCurrency()
    {
        $this->_configWriter->save('currency/options/default', 'USD',ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);
        $this->_configWriter->save('currency/options/allow', 'USD',ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);
        $this->_configWriter->save('currency/options/base', 'USD',ScopeConfigInterface::SCOPE_TYPE_DEFAULT, 0);
    }

    /**
     *
     */
    private function updateCurrencies()
    {
        $filePath = $this->moduleDirReader->getModuleDir('', 'Born_WebsiteStoreCreator')
            . '/Setup/import/store_shipto.xml';
        $parsedArray = $this->xmlParser->load($filePath)->xmlToArray();
        foreach ($parsedArray['store_shipto']['row'] as $row) {
            $storeShipToRelation = $this->storeShipToRepository->getByStoreShipTo($row['store_shipto']);
            $this->_configWriter->delete('currency/options/default',ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $storeShipToRelation->getWebsiteId());
            $this->_configWriter->delete('currency/options/allow',ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $storeShipToRelation->getWebsiteId());
            $this->_configWriter->delete('currency/options/base',ScopeConfigInterface::SCOPE_TYPE_DEFAULT, $storeShipToRelation->getWebsiteId());

            $this->_configWriter->save('currency/options/default', $row['currency'],'websites', $storeShipToRelation->getWebsiteId());
            $this->_configWriter->save('currency/options/allow', $row['currency'],'websites', $storeShipToRelation->getWebsiteId());
            $this->_configWriter->save('currency/options/base', $row['currency'],'websites', $storeShipToRelation->getWebsiteId());
        }
    }

    /**
     *
     */
    private function enableLogs()
    {
        $this->_configWriter->save('dev/debug/debug_logging', 1);
    }

}
