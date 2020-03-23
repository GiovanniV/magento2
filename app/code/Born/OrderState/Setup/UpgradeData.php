<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\OrderState\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            if ($installer->getTableRow($installer->getTable('sales_order_status_state'), 'status', 'exported')) {
                $installer->updateTableRow(
                    $installer->getTable('sales_order_status_state'),
                    'status',
                    'exported',
                    'visible_on_front',
                    '1'
                );
            }
        }
    }
}
