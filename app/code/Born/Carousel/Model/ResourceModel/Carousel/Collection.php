<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Model\ResourceModel\Carousel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Born\Carousel\Model\ResourceModel\Carousel
 */
class Collection extends AbstractCollection
{
    /**
     * @var int
     */
    protected $_idFieldName = 'id';

    /**
     * Carousel Collection constructor
     */
    protected function _construct()
    {
        $this->_init('Born\Carousel\Model\Carousel', 'Born\Carousel\Model\ResourceModel\Carousel');
    }
}
