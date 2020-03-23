<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\InventoryApi\Api;

/**
 * Interface InventoryManagementInterface
 * @package Born\InventoryApi\Api
 */
interface InventoryManagementInterface
{
    /**
     * @param mixed $inventory
     * @return mixed
     */
    public function update($inventory);
}
