<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\InventoryApi\Model;

use Born\InventoryApi\Api\InventoryManagementInterface;

/**
 * Class InventoryManagement
 * @package Born\InventoryApi\Model
 */
class InventoryManagement implements InventoryManagementInterface
{

    /**
     * @var InventoryUpdater
     */
    private $inventoryUpdater;

    /**
     * InventoryManagement constructor.
     * @param InventoryUpdater $inventoryUpdater
     */
    public function __construct(
        InventoryUpdater $inventoryUpdater
    ) {
        $this->inventoryUpdater = $inventoryUpdater;
    }

    /**
     * @param $inventoryUpdateXml
     * @return mixed
     */
    public function update($inventoryUpdateXml)
    {
        return $this->inventoryUpdater->update($inventoryUpdateXml);
    }
}
