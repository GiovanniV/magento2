<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.12') < 0) {
            $this->createRelationTable($setup);
        }

        $setup->endSetup();
    }

    /**
     * @param SchemaSetupInterface $setup
     * @throws \Zend_Db_Exception
     */
    private function createRelationTable(SchemaSetupInterface $setup)
    {
        $table = $setup->getConnection()->newTable(
            $setup->getTable('kn_shipto_store')
        )->addColumn(
            'shipto_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true],
            'Entity ID'
        )->addColumn(
            'store_shipto',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Store Ship to'
        )->addColumn(
            'website_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            ['unsigned' => true],
            'Website Id'
        )->addColumn(
            'ship_to_number',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'ship_to_number'
        )->addColumn(
            'country_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            2,
            ['nullable' => false, 'primary' => true, 'default' => false],
            'Country Id in ISO-2'
        )->addColumn(
            'phone',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'phone'
        )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'email'
        )->addColumn(
            'facility',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            50,
            [],
            'facility'
        )->addIndex(
            $setup->getIdxName('kn_shipto_store', ['ship_to_number']),
            ['ship_to_number']
        )->addIndex(
            $setup->getIdxName(
                'kn_shipto_store',
                ['website_id', 'store_shipto'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
            ),
            ['website_id', 'store_shipto'],
            ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
        )->addIndex(
            $setup->getIdxName('kn_shipto_store', ['country_id']),
            ['country_id']
        )->addForeignKey(
            $setup->getFkName('kn_shipto_store', 'website_id', 'store_website', 'website_id'),
            'website_id',
            $setup->getTable('store_website'),
            'website_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_SET_NULL
        )->addForeignKey(
            $setup->getFkName('kn_shipto_store', 'country_id', 'kn_country_iso', 'country_id'),
            'country_id',
            $setup->getTable('kn_country_iso'),
            'country_id'
        )->setComment(
            'Relation Between Websites and shipto_store'
        );
        $setup->getConnection()->createTable($table);
    }
}
