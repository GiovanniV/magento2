<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Born\DealerSearchApi\Setup
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
         * Create table 'dealer_search_product'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dealer_search_product'))
            ->addColumn(
                'search_product_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Dealer Locator Id'
            )
            ->addColumn(
                'action',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'Store Name'
            )
            ->addColumn(
                'product_num',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'product sku'
            )
            ->addColumn(
                'line_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Line code'
            )
            ->addColumn(
                'market_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'market code'
            )
             ->addIndex(
                $installer->getIdxName('dealer_search_product', ['product_num']),
                ['product_num']
            )
             ->addIndex(
                $installer->getIdxName('dealer_search_product', ['line_code']),
                ['line_code']
            )
             ->addIndex(
                $installer->getIdxName('dealer_search_product', ['market_code']),
                ['market_code']
            )
            ->setComment('Dealer Locators');
        $installer->getConnection()->createTable($table);
        
        /**
         * Create table 'dealer_search_market_line'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dealer_search_market_line'))
            ->addColumn(
                'search_market_line_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Dealer Locator Id'
            )
            ->addColumn(
                'action',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'action'
            )
            ->addColumn(
                'parent_account',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'parent account'
            )
            ->addColumn(
                'line_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Line code'
            )
            ->addColumn(
                'market_code',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'market code'
            )
             ->addIndex(
                $installer->getIdxName('dealer_search_market_line', ['market_code']),
                ['market_code']
            )
             ->addIndex(
                $installer->getIdxName('dealer_search_market_line', ['parent_account']),
                ['parent_account']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_market_line', ['line_code']),
                ['line_code']
            )
            ->setComment('Dealer account');
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'dealer_search_master'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dealer_search_master'))
            ->addColumn(
                'search_master_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Dealer Locator Id'
            )
            ->addColumn(
                'action',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'action'
            )
            ->addColumn(
                'ship_to_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'parent account'
            )
            ->addColumn(
                'dealer_cust_numb',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Line code'
            )
            ->addColumn(
                'parent_account',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'market code'
            )

             ->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'name'
            )
            ->addColumn(
                'address1',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'address1'
            )
            ->addColumn(
                'address2',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'address'
            )
            ->addColumn(
                'city',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'city'
            )
           ->addColumn(
                'state',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'state'
            )
            ->addColumn(
                'zip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'zip'
            )
            ->addColumn(
                'country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'country'
            )
            ->addColumn(
                'phone',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'phone'
            )
                ->addColumn(
                'fax',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'fax'
            )
            ->addColumn(
                'installer',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'installer'
            )
            ->addColumn(
                'url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'url'
            )
            ->addColumn(
                'url_part',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'url_part'
            )
                ->addColumn(
                'latitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'latitude'
            )
            ->addColumn(
                'longitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'longitude'
            )
            ->addColumn(
                'google_map',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'google_map'
            )
             ->addColumn(
                'consumer_email',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'consumer_email'
            )
            ->addColumn(
                'consumer_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'consumer_url'
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_master', ['dealer_cust_numb']),
                ['dealer_cust_numb']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_master', ['parent_account']),
                ['parent_account']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_master', ['country']),
                ['country']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_master', ['city']),
                ['city']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_master', ['zip']),
                ['zip']
            )
            ->setComment('Dealer location');
        $installer->getConnection()->createTable($table);

        
        
        /**
         * Create table 'dealer_search_product_restrict'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dealer_search_product_restrict'))
            ->addColumn(
                'search_product_restrict_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Dealer Locator Id'
            )
            ->addColumn(
                'action',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'action'
            )
            ->addColumn(
                'dealer_cust_numb',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'parent account'
            )
            ->addColumn(
                'product_num',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Line code'
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_product_restrict', ['product_num']),
                ['product_num']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_product_restrict', ['dealer_cust_numb']),
                ['dealer_cust_numb']
            )
           ->setComment('Dealer account');
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'dealer_search_category'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dealer_search_category'))
            ->addColumn(
                'search_category_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Dealer Locator Id'
            )
            ->addColumn(
                'action',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'action'
            )
            ->addColumn(
                'dealer_cust_numb',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'parent account'
            )
            ->addColumn(
                'category',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Line code'
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_category', ['category']),
                ['category']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_category', ['dealer_cust_numb']),
                ['dealer_cust_numb']
            )
           ->setComment('Dealer account');
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'dealer_search_zip'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('dealer_search_zip'))
            ->addColumn(
                'search_zip_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Dealer Locator Id'
            )
            ->addColumn(
                'action',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                ['nullable' => true],
                'action'
            )
            ->addColumn(
                'zip',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'zip'
            )
            ->addColumn(
                'country',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'country'
            )
             ->addColumn(
                'latitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'latitude'
            )
            ->addColumn(
                'longitude',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'longitude'
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_zip', ['zip']),
                ['zip']
            )
                    ->addIndex(
                $installer->getIdxName('dealer_search_zip', ['country']),
                ['country']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_zip', ['longitude']),
                ['longitude']
            )
            ->addIndex(
                $installer->getIdxName('dealer_search_zip', ['latitude']),
                ['latitude']
            )
           ->setComment('Dealer account');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
