<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Api;

/**
 * Interface StoreShipToManagementInterface
 * @package Born\WebsiteStoreCreator\Api
 */
interface StoreShipToManagementInterface
{

    /**
     * @param $shipTo
     * @return mixed
     */
    public function getStoreIdByShipto($shipTo);

    /**
     * @param $shipTo
     * @return mixed
     */
    public function getWebsiteIdByShipto($shipTo);
}
