<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */
namespace Born\Bug18248\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '2.0.1', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'2.1.0', 'data_version' => '2.1.0'],
                ['module = ?' => 'Amazon_Core']
            );
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'2.1.0', 'data_version' => '2.1.0'],
                ['module = ?' => 'Amazon_Login']
            );
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'2.1.0', 'data_version' => '2.1.0'],
                ['module = ?' => 'Amazon_Payment']
            );
        }
        if (version_compare($context->getVersion(), '2.0.2', '<')) {
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'4.4.4', 'data_version' => '4.4.4'],
                ['module = ?' => 'Klarna_Core']
            );
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'4.3.4', 'data_version' => '4.3.4'],
                ['module = ?' => 'Klarna_Ordermanagement']
            );
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'5.4.4', 'data_version' => '5.4.4'],
                ['module = ?' => 'Klarna_Kp']
            );
            $setup->getConnection()->update(
                $setup->getTable('setup_module'),
                ['schema_version'=>'100.2.0', 'data_version' => '100.2.0'],
                ['module = ?' => 'Vertex_Tax']
            );
        }
    }
}
