<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Model\ResourceModel\CountryISO;

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
            \Born\CountryISO\Model\CountryISO::class,
            \Born\CountryISO\Model\ResourceModel\CountryISO::class
        );
    }
}
