<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

/**
 * Class UpgradeSchema
 * @package Born\Carousel\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.6', '<')) {
            $setup->startSetup();
            /**
             * Create table 'born_carousel'
             */
            $tableName = $setup->getTable('born_carousel');
            // Check if the table already exists
            if ($setup->getConnection()->isTableExists($tableName) == false) {
                $table = $setup->getConnection()->newTable(
                    $setup->getTable('born_carousel')
                )->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Id'
                )->addColumn(
                    'title',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Carousel Title'
                )->addColumn(
                    'body',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Body'
                )->addColumn(
                    'cta_text',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'CTA Text'
                )->addColumn(
                    'cta_link',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'CTA Link'
                )->addColumn(
                    'alignment',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false],
                    'Alignment'
                )->addColumn(
                    'background_image',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Background Image'
                );
                $setup->getConnection()->createTable($table);
            }
            $setup->endSetup();
        }

        if (version_compare($context->getVersion(), '2.0.7', '<')) {

            // Lets modify the alignment to use varchar, this will be more helpful for frontend.
            $setup->startSetup();
            $setup->getConnection()->query("ALTER TABLE born_carousel MODIFY alignment VARCHAR(10) DEFAULT 'left';");
            $setup->endSetup();
        }

        if (version_compare($context->getVersion(), '2.0.9', '<')) {
            /**
             * Add sort_order column to born_carousel table
             */
            if ($setup->getConnection()->tableColumnExists('born_carousel', 'sort_order') === false) {
                $setup->getConnection()
                    ->addColumn(
                        $setup->getTable('born_carousel'),
                        'sort_order',
                        [
                            'type'      => \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                            'nullable'  => false ,
                            'default'   => '0',
                            'after'     => 'background_image',
                            'comment'   => 'Sort Order'
                        ]
                    );
            }
            if ($setup->getConnection()->tableColumnExists('born_carousel', 'background_image_mobile') === false) {
                $setup->getConnection()
                    ->addColumn(
                        $setup->getTable('born_carousel'),
                        'background_image_mobile',
                        [
                            'type'      => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                            'length'    => 255,
                            'nullable'  => true ,
                            'default'   => null,
                            'after'     => 'background_image',
                            'comment'   => 'Background Image Mobile'
                        ]
                    );
            }
        }
    }
}
