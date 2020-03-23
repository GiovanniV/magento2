<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'kn_country_iso'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('kn_country_iso')
        )->addColumn(
            'country_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            2,
            ['nullable' => false, 'primary' => true, 'default' => false],
            'Country Id in ISO-2'
        )->addColumn(
            'iso3166_code',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 3,
            ['nullable' => true, 'default' => null],
            'Country ISO-3166 format'
        )->addIndex(
            $installer->getIdxName(
                'kn_country_iso',
                ['country_id', 'iso3166_code'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
            ),
            ['country_id', 'iso3166_code'],
            ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
        )->setComment(
            'Directory Country'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
