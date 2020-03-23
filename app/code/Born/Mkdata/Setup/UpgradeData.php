<?php 

namespace Born\Mkdata\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 * @package Born\Mkdata\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
		$setup->startSetup();
		
		if (version_compare($context->getVersion(), '1.0.1') < 0) {
			$data = [];
			$data[] = ['status' => 'pending_mkdata', 'label' => __('Denied Party Review')];
			
			$setup->getConnection()->insertArray($setup->getTable('sales_order_status'), ['status', 'label'], $data);
			
			$data = [];
			$data[] = [
				'status' => 'pending_mkdata',
				'state' => 'processing',
				'is_default' => 0,
			];
			
			$setup->getConnection()->insertArray(
				$setup->getTable('sales_order_status_state'),
				['status', 'state', 'is_default'],
				$data
			);
		}

		if (version_compare($context->getVersion(), '1.0.2') < 0) {

		}

		if (version_compare($context->getVersion(), '1.0.3') < 0) {
			$data = [];
			$data[] = ['status' => 'approved_mkdata', 'label' => __('Review Approved')];

			$setup->getConnection()->insertArray($setup->getTable('sales_order_status'), ['status', 'label'], $data);

			$data = [];
			$data[] = [
				'status' => 'approved_mkdata',
				'state' => 'processing',
				'is_default' => 0,
			];

			$setup->getConnection()->insertArray(
				$setup->getTable('sales_order_status_state'),
				['status', 'state', 'is_default'],
				$data
			);
		}

		if (version_compare($context->getVersion(), '1.0.4') < 0) {
			$data = [];
			$data[] = ['status' => 'hold_preorder', 'label' => __('Pre Order Hold')];

			$setup->getConnection()->insertArray($setup->getTable('sales_order_status'), ['status', 'label'], $data);

			$data = [];
			$data[] = [
				'status' => 'hold_preorder',
				'state' => 'processing',
				'is_default' => 0,
			];

			$setup->getConnection()->insertArray(
				$setup->getTable('sales_order_status_state'),
				['status', 'state', 'is_default'],
				$data
			);
		}

		if (version_compare($context->getVersion(), '1.0.5') < 0) {
			$data = [];
			$data[] = ['status' => 'released', 'label' => __('Released')];

			$setup->getConnection()->insertArray($setup->getTable('sales_order_status'), ['status', 'label'], $data);

			$data = [];
			$data[] = [
				'status' => 'released',
				'state' => 'processing',
				'is_default' => 0,
			];

			$setup->getConnection()->insertArray(
				$setup->getTable('sales_order_status_state'),
				['status', 'state', 'is_default'],
				$data
			);
		}

		if (version_compare($context->getVersion(), '1.0.6') < 0) {
			$data = [];
			$data[] = ['status' => 'mkdata_denied', 'label' => __('Denied Party Denied')];

			$setup->getConnection()->insertArray($setup->getTable('sales_order_status'), ['status', 'label'], $data);

			$data = [];
			$data[] = [
				'status' => 'mkdata_denied',
				'state' => 'canceled',
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