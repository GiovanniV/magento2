<?php

namespace Born\Config\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;


class UpgradeData implements UpgradeDataInterface
{

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if ($context->getVersion() && version_compare($context->getVersion(), '2.0.1') < 0) {
            // Lets modify the alignment to use varchar, this will be more helpful for frontend.
            $setup->startSetup();
            $setup->getConnection()->query("DELETE FROM theme WHERE theme_path LIKE '%Born%';");
            $setup->endSetup();
        }
    }
}