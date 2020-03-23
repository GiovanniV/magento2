<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\PriceApi\Api;

/**
 * Interface PriceManagementInterface
 * @package Born\PriceApi\Api
 */
interface PriceManagementInterface
{

    /**
     * @param mixed $product_prices
     * @return mixed
     */
    public function update($product_prices);
}
