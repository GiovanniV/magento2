<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\ERPM\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface LogSearchResultsInterface
 * @package Born\ERPM\Api\Data
 */
interface LogSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Log list
     *
     * @return \Born\ERPM\Api\Data\LogInterface[]
     */
    public function getItems();

    /**
     * Set Log list
     *
     * @param \Born\ERPM\Api\Data\LogInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
