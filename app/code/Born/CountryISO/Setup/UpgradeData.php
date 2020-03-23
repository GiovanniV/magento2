<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */
namespace Born\CountryISO\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Class UpgradeData
 * @package Born\CountryISO\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addNetherlandsAntilles($setup);
        }
        $setup->endSetup();
    }

    /** @see https://en.wikipedia.org/wiki/ISO_3166-1_numeric
     * @param ModuleDataSetupInterface $setup
     */
    private function addNetherlandsAntilles(ModuleDataSetupInterface $setup)
    {
        $data[]=['AN', '532'];
        $columns = ['country_id', 'iso3166_code'];
        $setup->getConnection()->insertArray($setup->getTable('kn_country_iso'), $columns, $data);
    }
}