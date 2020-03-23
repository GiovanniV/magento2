<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Born\WebsiteStoreCreator\Model\StoreShipTo::class,
            \Born\WebsiteStoreCreator\Model\ResourceModel\StoreShipTo::class
        );
    }
}
