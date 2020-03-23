<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Matisse Laurel
 *
 */

namespace Born\Newsletters\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $table = $setup->getTable('newsletter_subscriber');

        $setup->getConnection()->addColumn(
            $table,
            'frequency',
            [
                'type' => Table::TYPE_TEXT,
                'nullable' => true,
                'comment' => 'Frequency'
            ]
        );
        $setup->getConnection()->addColumn(
            $table,
            'disclaimer_agreed',
            [
                'type' => Table::TYPE_TEXT,
                'nullable' => true,
                'comment' => 'Disclaimer'
            ]
        );
        $setup->endSetup();
    }
}