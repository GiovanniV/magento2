<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Born Support <support@borngroup.com>
 *
 */

namespace Born\Customer\Setup;

use Magento\Customer\Model\Config\Share;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * @codeCoverageIgnore
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var Magento\Customer\Model\Config\Share
     */
    protected $share;

    /**
     * @var Magento\Framework\App\Config\ConfigResource\ConfigInterface
     */
    protected $resourceConfig;

    /**
     * @param SalesSetupFactory $share
     */
    public function __construct(Share $share, ConfigInterface $resourceConfig)
    {
        $this->share = $share;
        $this->resourceConfig = $resourceConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $this->setGlobal($setup);
        }
        $installer->endSetup();
    }

    /**
     * @param ModuleDataSetupInterface $setup
     */
    public function setGlobal(ModuleDataSetupInterface $setup)
    {
        $this->resourceConfig->saveConfig(
            $this->share::XML_PATH_CUSTOMER_ACCOUNT_SHARE,
            $this->share::SHARE_GLOBAL
        );
    }
}
