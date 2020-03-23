<?php
/**
 * Born_VehicleSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VehicleSearch
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\VehicleSearch\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'kn_vehicles'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('kn_vehicles'))
            ->addColumn(
                'vehicle_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Vehicle Id'
            )
            ->addColumn(
                'ship_to_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Ship to Number'
            )
            ->addColumn(
                'application_number',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Application Number'
            )
            ->addColumn(
                'year',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                [],
                'Year'
            )
            ->addColumn(
                'make',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                100,
                [],
                'Make'
            )
            ->addColumn(
                'model',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                100,
                [],
                'Vehicle Model'
            )
            ->addColumn(
                'engine_size_l',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'Engine Size'
            )
            ->addColumn(
                'app_group',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                [],
                'App Group'
            )
            ->addColumn(
                'year_url',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                250,
                [],
                'Year Url'
            )
             ->addIndex(
                $installer->getIdxName('kn_vehicles', ['make']),
                ['make']
            )
             ->addIndex(
                $installer->getIdxName('kn_vehicles', ['model']),
                ['model']
            )
             ->addIndex(
                $installer->getIdxName('kn_vehicles', ['application_number']),
                ['application_number']
            )
            ->setComment('KN Vehicles');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
