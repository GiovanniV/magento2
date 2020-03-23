<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Api;

/**
 * Interface CarouselRepositoryInterface
 * @package Born\Carousel\Api
 */
interface CarouselRepositoryInterface
{
    /**
     * Save carousel
     * @param Data\CarouselInterface $carousel
     * @return mixed
     */
    public function save(\Born\Carousel\Api\Data\CarouselInterface $carousel);

    /**
     * Get Carousel by Id
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Get Carousel listing
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria);

    /**
     * Delete Carousel
     * @param Data\CarouselInterface $carousel
     * @return mixed
     */
    public function delete(\Born\Carousel\Api\Data\CarouselInterface $carousel);

    /**
     * Delete carousel by Id
     * @param $id
     * @return mixed
     */
    public function deleteById($id);
}
