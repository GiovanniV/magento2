<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CarouselSearchResultsInterface
 * @package Born\Carousel\Api\Data
 */
interface CarouselSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Carousel list
     *
     * @return \Born\Carousel\Api\Data\CarouselInterface[]
     */
    public function getItems();

    /**
     * Set Carousel list
     *
     * @param \Born\Carousel\Api\Data\CarouselInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
