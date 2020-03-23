<?php

namespace Born\ERPM\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;


class UpgradeData implements UpgradeDataInterface
{
    protected $_eavSetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->_eavSetupFactory = $eavSetupFactory;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if ($context->getVersion() && version_compare($context->getVersion(), '2.0.2') < 0) {
            $setup->startSetup();

            /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
            $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);

            $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY,'erpm_login_id');
            $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY,'erpm_person_id');
            $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY,'erpm_enterprise_id');
            $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY,'erpm_country');

            /**
             * Add attributes to the eav/attribute
             */
            $eavSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY,
                'erpm_login_id',
                [
                    'type' => 'varchar',
                    'label' => 'Login Id',
                    'input' => 'text',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                    'sort_order' => 900,
                    'required' => false,
                    'group' => 'ERPM Information',
                    'used_in_forms' => ['customer_account_create','customer_account_edit','adminhtml_customer'],
                    'visible' => 0
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY,
                'erpm_person_id',
                [
                    'type' => 'varchar',
                    'label' => 'Person Id',
                    'input' => 'text',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                    'sort_order' => 910,
                    'required' => false,
                    'group' => 'ERPM Information',
                    'used_in_forms' => ['customer_account_create','customer_account_edit','adminhtml_customer'],
                    'visible' => 0
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY,
                'erpm_enterprise_id',
                [
                    'type' => 'varchar',
                    'label' => 'Enterprise Id',
                    'input' => 'text',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                    'sort_order' => 920,
                    'required' => false,
                    'group' => 'ERPM Information',
                    'used_in_forms' => ['customer_account_create','customer_account_edit','adminhtml_customer'],
                    'visible' => 0
                ]
            );

            $eavSetup->addAttribute(
                \Magento\Customer\Model\Customer::ENTITY,
                'erpm_country',
                [
                    'type' => 'varchar',
                    'input' => 'select',
                    'label' => 'ERPM Country',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                    'sort_order' => 930,
                    'required' => false,
                    'group' => 'ERPM Information',
                    'source' => \Magento\Customer\Model\ResourceModel\Address\Attribute\Source\Country::class,
                    'used_in_forms' => ['customer_account_create','customer_account_edit','adminhtml_customer'],
                    'visible' => 0
                ]
            );
            $setup->endSetup();
        }
    }

}