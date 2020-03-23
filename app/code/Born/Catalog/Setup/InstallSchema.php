<?php
/**
 * Born_Catalog
 *
 *
 * @category  PHP
 * @package   Born\Catalog
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 *
 */
namespace Born\Catalog\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * UpgradeData
 *
 * @category  PHP
 * @package   Born\Catalog
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install function for adding new column in eav_attribute
     *
     * @param SchemaSetupInterface   $setup   Setup Instance
     * @param ModuleContextInterface $context Module Context
     *
     * @throws \Zend_Db_Exception
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        /**
         * add new fields to eav_attribute
         */
        $eavTableName = $installer->getTable('eav_attribute');
        $connection   = $installer->getConnection();

        if (!$connection->tableColumnExists($eavTableName, 'frontend_display_order')) {
            $connection->addColumn(
                $eavTableName,
                'frontend_display_order',
                [
                    'type'     => Table::TYPE_INTEGER,
                    'unsigned' => true,
                    'nullable' => false,
                    'default'  => '0',
                    'comment'  => 'Frontend Display Order',
                ]
            );
        }
        $installer->endSetup();
    }//end install()
}//end class
