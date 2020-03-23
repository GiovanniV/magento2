<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Api;

/**
 * Interface WebsiteCreatorInterface
 * @package Born\WebsiteStoreCreator\Api
 */
interface WebsiteCreatorInterface
{
    /**
     * @param mixed $store_shipto
     * @return mixed
     */
    public function save($store_shipto);

}
