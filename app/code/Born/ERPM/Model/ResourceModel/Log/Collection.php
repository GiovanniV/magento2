<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\ERPM\Model\ResourceModel\Log;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Born\ERPM\Model\ResourceModel\Log
 */
class Collection extends AbstractCollection
{
    /**
     * @var int
     */
    protected $_idFieldName = 'log_id';

    /**
     * Log Collection constructor
     */
    protected function _construct()
    {
        $this->_init('Born\ERPM\Model\Log', 'Born\ERPM\Model\ResourceModel\Log');
    }
}
