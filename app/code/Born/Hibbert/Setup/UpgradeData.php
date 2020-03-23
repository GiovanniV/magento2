<?php 

namespace Born\Hibbert\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
		$setup->startSetup();
		
		if (version_compare($context->getVersion(), '1.0.1') < 0) {
			$data = [];
			$data[] = ['status' => 'exported', 'label' => __('Order Confirmation')];
			
			$setup->getConnection()->insertArray($setup->getTable('sales_order_status'), ['status', 'label'], $data);
			
			$data = [];
			$data[] = [
				'status' => 'exported',
				'state' => 'processing',
				'is_default' => 0,
			];
			
			$setup->getConnection()->insertArray(
				$setup->getTable('sales_order_status_state'),
				['status', 'state', 'is_default'],
				$data
			);
		}
		
		$setup->endSetup();
	}
}