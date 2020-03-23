<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\InventoryApi\Model;

use Amasty\MultiInventory\Api\Data\WarehouseItemInterfaceFactory;
use Amasty\MultiInventory\Api\WarehouseItemRepositoryInterface;
use Amasty\MultiInventory\Api\WarehouseRepositoryInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

/**
 * Class InventoryUpdater
 * @package Born\InventoryApi\Model
 */
class InventoryUpdater
{
    /**
     * @var WarehouseItemInterfaceFactory
     */
    private $warehouseItemInterfaceFactory;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var WarehouseRepositoryInterface
     */
    private $warehouseRepository;

    /**
     * @var WarehouseItemRepositoryInterface
     */
    private $warehouseItemRepository;

    /**
     * InventoryUpdater constructor.
     * @param WarehouseItemInterfaceFactory $warehouseItemInterfaceFactory
     * @param ProductRepositoryInterface $productRepository
     * @param WarehouseRepositoryInterface $warehouseRepository
     * @param WarehouseItemRepositoryInterface $warehouseItemRepository
     */
    public function __construct(
        WarehouseItemInterfaceFactory $warehouseItemInterfaceFactory,
        ProductRepositoryInterface $productRepository,
        WarehouseRepositoryInterface $warehouseRepository,
        WarehouseItemRepositoryInterface $warehouseItemRepository

    ) {
        $this->warehouseItemInterfaceFactory=$warehouseItemInterfaceFactory;
        $this->productRepository = $productRepository;
        $this->warehouseRepository = $warehouseRepository;
        $this->warehouseItemRepository = $warehouseItemRepository;
    }

    /**
     * @param $inventory
     * @return array
     */
    public function update($inventory)
    {
        $response = [];
        if (isset($inventory['inventory_row']['sku'])) {
            $singleElement = $inventory['inventory_row'];
            unset($inventory['inventory_row']);
            $inventory['inventory_row'][] = $singleElement;
        }

        foreach ($inventory['inventory_row'] as $inventoryRow) {
            if (!isset($inventoryRow['sku'])) {
                $errorInfo = ['item'=>'', 'status'=>'fail', 'ErrorDescription'=>'sku field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($inventoryRow['qty'])) {
                $errorInfo = ['item'=>$inventoryRow['sku'], 'status'=>'fail', 'ErrorDescription'=>'qty field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($inventoryRow['facility'])) {
                $errorInfo = ['item'=>$inventoryRow['sku'], 'status'=>'fail', 'ErrorDescription'=>'facility field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }

            try {
                $product = $this->productRepository->get($inventoryRow['sku']);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$inventoryRow['sku'], 'status'=>'fail', 'ErrorDescription'=>'Product doesn\'t exist'];
                $response['row'][]= $errorInfo;
                continue;
            }

            try {
                $warehouse = $this->warehouseRepository->getByCode($inventoryRow['facility']);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$inventoryRow['sku'], 'status'=>'fail', 'ErrorDescription'=>'Warehouse doesn\'t exist'];
                $response['row'][]= $errorInfo;
                continue;
            }

            /* @var \Amasty\MultiInventory\Api\Data\WarehouseItemInterface $warehouseItem*/
            $warehouseItem = $this->warehouseItemInterfaceFactory->create();
            $warehouseItem->setProductId($product->getId());
            $warehouseItem->setQty($inventoryRow['qty']);
            $warehouseItem->setWarehouseId($warehouse->getId());

            try {
                $this->warehouseItemRepository->addStock($warehouseItem);
            } catch (\Exception $exception) {
                $errorInfo = ['item'=>$inventoryRow['sku'], 'status'=>'fail', 'ErrorDescription'=>$exception->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            }
            $successInfo = ['item'=>$inventoryRow['sku'] . '~' . $inventoryRow['facility'], 'status'=>'success', 'ErrorDescription'=>''];
            $response['row'][]= $successInfo;
        }

        return  $response;
    }
}
