<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */

namespace Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict
 */
class Collection extends AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Born\DealerSearchApi\Model\SearchProductRestrict::class,
            \Born\DealerSearchApi\Model\ResourceModel\SearchProductRestrict::class
        );
    }
}
