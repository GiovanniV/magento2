<?php

namespace Born\Hibbert\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

class Inventory
{
	protected $stockRegistry;
	protected $api;
	
	public function __construct(
        Api $api,
	    \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry

	){
        $this->api = $api;
	    $this->stockRegistry = $stockRegistry;
	}
	
	public function updateInventory()
	{	
		$checked = 0;
		$updated = 0;
		
		$products = $this->api->getProducts();
		
		if (!$products) {
			return; // error
		}
		
		foreach ($products as $product) {
			$checked++;
			$sku = $product->partNumber;
			$qtyNew = (int) $product->netAvailable;
			
			try {
				$stockItem = $this->stockRegistry->getStockItemBySku($sku);
			} catch (NoSuchEntityException $e) {
				echo sprintf(__("Not found: %s\n"), $sku);
				continue;
			}
			
			echo sprintf(__("Checking: %s\n"), $sku);
			
			$qtyOld = (int) $stockItem->getQty();
			
			if ($qtyNew != $qtyOld) {
				echo sprintf(__("Updating: %s\n"), $sku);
				
				$stockItem->setQty($qtyNew);
				$stockItem->setIsInStock((bool) $qtyNew);
				$this->stockRegistry->updateStockItemBySku($sku, $stockItem);
				$updated++;
			}
		}
		
		return sprintf(__("Checked %s, Updated %s"), $checked, $updated);
	}
}