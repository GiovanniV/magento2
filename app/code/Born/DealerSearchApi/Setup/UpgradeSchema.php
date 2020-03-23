<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class UpgradeSchema
 * @package Born\DealerSearchApi\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $setup->startSetup();
            /**
             * alter table 'dealer_search_product'
             */
            // Check if the table already exists
            /**
         * alter id column to dealer_search_product table
         */
            if ($setup->getConnection()->tableColumnExists('dealer_search_product', 'ids') === true) {
                $setup->getConnection()->changeColumn(
            $setup->getTable('dealer_search_product'),
            'ids',
            'search_product_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 'identity' => true,
                 'unsigned' => true,
                 'nullable' => false,
                 'primary' => true,
                'comment' => 'rename id to search_product_id'
            ]
             );
            }
            /*
             * alter id column to dealer_search_market_line table
         */
            if ($setup->getConnection()->tableColumnExists('dealer_search_market_line', 'id') === true) {
                $setup->getConnection()->changeColumn(
            $setup->getTable('dealer_search_market_line'),
            'id',
            'search_market_line_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 'identity' => true,
                 'unsigned' => true,
                 'nullable' => false,
                 'primary' => true,
                'comment' => 'rename id to search_market_line_id'
            ]
             );
            }
            /*
             * alter id column to dealer_search_product table
            */
            if ($setup->getConnection()->tableColumnExists('dealer_search_master', 'id') === true) {
                $setup->getConnection()->changeColumn(
            $setup->getTable('dealer_search_master'),
            'id',
            'search_master_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 'identity' => true,
                 'unsigned' => true,
                 'nullable' => false,
                 'primary' => true,
                'comment' => 'rename id to search_master_id'
            ]
             );
            }
            /*
             * alter id column to dealer_search_product_restrict table
            */
            if ($setup->getConnection()->tableColumnExists('dealer_search_product_restrict', 'id') === true) {
                $setup->getConnection()->changeColumn(
            $setup->getTable('dealer_search_product_restrict'),
            'id',
            'search_product_restrict_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 'identity' => true,
                 'unsigned' => true,
                 'nullable' => false,
                 'primary' => true,
                'comment' => 'rename id to search_product_restrict_id'
            ]
             );
            }
            /*
             * alter id column to dealer_search_category table
            */
            if ($setup->getConnection()->tableColumnExists('dealer_search_category', 'id') === true) {
                $setup->getConnection()->changeColumn(
            $setup->getTable('dealer_search_category'),
            'id',
            'search_category_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 'identity' => true,
                 'unsigned' => true,
                 'nullable' => false,
                 'primary' => true,
                'comment' => 'rename id to search_category_id'
            ]
             );
            }
            /*
             * alter id column to dealer_search_zip table
           */
            if ($setup->getConnection()->tableColumnExists('dealer_search_zip', 'id') === true) {
                $setup->getConnection()->changeColumn(
            $setup->getTable('dealer_search_zip'),
            'id',
            'search_zip_id',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                 'identity' => true,
                 'unsigned' => true,
                 'nullable' => false,
                 'primary' => true,
                'comment' => 'rename id to search_zip_id'
            ]
             );
            }
        }
        $setup->endSetup();
    }
}
