<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */

namespace Born\ProductApi\Model;

use Born\ProductApi\Api\ProductManagementInterface;

/**
 * Class ProductManagement
 * @package Born\ProductApi\Model
 */
class ProductManagement implements ProductManagementInterface
{

    /**
     * @var productUpdater
     */
    private $productUpdater;

    /**
     * ProductManagement constructor.
     * @param ProductUpdater $productUpdater
     */
    public function __construct(
        ProductUpdater $productUpdater
    ) {
        $this->productUpdater = $productUpdater;
    }

    /**
     * @param string $priceUpdateXml
     * @return mixed
     */
    public function save($priceUpdateXml)
    {
        return $this->productUpdater->save($priceUpdateXml);
    }
}
