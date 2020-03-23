<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\PriceApi\Model;

use Born\PriceApi\Api\PriceManagementInterface;

/**
 * Class PriceManagement
 * @package Born\PriceApi\Model
 */
class PriceManagement implements PriceManagementInterface
{

    /**
     * @var PriceUpdater
     */
    private $priceUpdater;

    /**
     * PriceManagement constructor.
     * @param PriceUpdater $priceUpdater
     */
    public function __construct(
        PriceUpdater $priceUpdater
    ) {
        $this->priceUpdater = $priceUpdater;
    }

    /**
     * @param string $priceUpdateXml
     * @return mixed
     */
    public function update($priceUpdateXml)
    {
        return $this->priceUpdater->update($priceUpdateXml);
    }
}
