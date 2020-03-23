<?php
/**
 * Born_WebsiteStoreCreator InstallData
 * @category  PHP
 * @package   Born\WebsiteStoreCreator
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 *
 */

namespace Born\WebsiteStoreCreator\Setup;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Store\Model\GroupFactory;
use Magento\Store\Model\ResourceModel\Group;
use Magento\Store\Model\ResourceModel\Store;
use Magento\Store\Model\ResourceModel\Website;
use Magento\Store\Model\StoreFactory;
use Magento\Store\Model\WebsiteFactory;

class InstallData implements InstallDataInterface
{
    /*
     * @var ManagerInterface
     */
    private $eventManager;
    /*
     * @var GroupFactory
     */
    private $groupFactory;
    /*
     * @var Group
     */
    private $groupResourceModel;
    /*
     * @var StoreFactory
     */
    private $storeFactory;
    /*
     * @var Store
     */
    private $storeResourceModel;
    /*
     * @var WebsiteFactory
     */
    private $websiteFactory;
    /*
     * @var Website
     */
    private $websiteResourceModel;

    /*
     * InstallData constructor.
     * @param WebsiteFactory $websiteFactory
     * @param Website $websiteResourceModel
     * @param Store $storeResourceModel
     * @param Group $groupResourceModel
     * @param StoreFactory $storeFactory
     * @param GroupFactory $groupFactory
     * @param ManagerInterface $eventManager
     */
    public function __construct(
        Group $groupResourceModel,
        GroupFactory $groupFactory,
        ManagerInterface $eventManager,
        Store $storeResourceModel,
        StoreFactory $storeFactory,
        Website $websiteResourceModel,
        WebsiteFactory $websiteFactory
    ) {
        $this->eventManager = $eventManager;
        $this->groupFactory = $groupFactory;
        $this->groupResourceModel = $groupResourceModel;
        $this->storeFactory = $storeFactory;
        $this->storeResourceModel = $storeResourceModel;
        $this->websiteFactory = $websiteFactory;
        $this->websiteResourceModel = $websiteResourceModel;
    }

    /*
     * @param  ModuleDataSetupInterface $setup
     * @param  ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $default_attributes = [
            [
                'website_code' => 'kn_filters_us',
                'website_name' => 'KN Filters US',
                'group_name' => 'KN Filters US Store',
                'store_code' => 'kn_filters_us_store_view',
                'store_name' => 'US',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'kn_filters_ca',
                'website_name' => 'KN Filters CA',
                'group_name' => 'KN Filters CANADA Store',
                'store_code' => 'kn_filters_ca_store_view',
                'store_name' => 'CANADA',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'Kn_filters_de',
                'website_name' => 'KN Filters DE',
                'group_name' => 'KN Filters DE Store',
                'store_code' => 'Kn_filters_de_store_view',
                'store_name' => 'Germany',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'Kn_filters_fr',
                'website_name' => 'KN Filters FR',
                'group_name' => 'KN Filters FR Store',
                'store_code' => 'Kn_filters_fr_store_view',
                'store_name' => 'France',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'Kn_filters_it',
                'website_name' => 'KN Filters IT',
                'group_name' => 'KN Filters IT Store',
                'store_code' => 'Kn_filters_it_store_view',
                'store_name' => 'Italy',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'Kn_filters_es',
                'website_name' => 'KN Filters ES',
                'group_name' => 'KN Filters ES Store',
                'store_code' => 'Kn_filters_es_store_view',
                'store_name' => 'Spain',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'Kn_filters_uk',
                'website_name' => 'KN Filters UK',
                'group_name' => 'KN Filters UK Store',
                'store_code' => 'Kn_filters_uk_store_view',
                'store_name' => 'UK',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'airaid',
                'website_name' => 'Airaid',
                'group_name' => 'Airaid Online Store',
                'store_code' => 'airaid_store_view',
                'store_name' => 'US',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'spectre',
                'website_name' => 'Spectre',
                'group_name' => 'Spectre Online Store',
                'store_code' => 'spectre_store_view',
                'store_name' => 'US',
                'is_active' => '1',
                'root_category_id' => 2
            ],
            [
                'website_code' => 'aem_intakes',
                'website_name' => 'AEM Intakes',
                'group_name' => 'AEM Intakes Online Store',
                'store_code' => 'aem_intakes_store_view',
                'store_name' => 'US',
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
                $this->storeResourceModel->save($store);
                $this->eventManager->dispatch('store_add', ['store' => $store]);
            }
        }

        $setup->endSetup();
    }

    /*
     * @param \Magento\Store\Model\Website $website
     * @param array $attribute
     * @return \Magento\Store\Model\Website
     */
    public function setWebID($website, $attribute)
    {
        if (!$website->getId()) {
            $website->setCode($attribute['website_code']);
            $website->setName($attribute['website_name']);
            $this->websiteResourceModel->save($website);
        }

        return $website;
    }
}
