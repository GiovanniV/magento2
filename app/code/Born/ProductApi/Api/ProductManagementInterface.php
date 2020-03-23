<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */

namespace Born\ProductApi\Api;

/**
 * Interface ProductManagementInterface
 * @package Born\ProductApi\Api
 */
interface ProductManagementInterface
{

    /**
     * @param mixed $products
     * @return mixed
     */
    public function save($products);
}
