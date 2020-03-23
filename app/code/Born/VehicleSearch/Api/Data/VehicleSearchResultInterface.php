<?php
/**
 * Born_VehicleSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VehicleSearch
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\VehicleSearch\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface VehicleSearchResultInterface extends SearchResultsInterface{
    /**
     * @return \Born\VehicleSearch\Api\Data\VehicleSearchInterface[]
     */
    public function getItems();

    /**
     * @param \Born\VehicleSearch\Api\Data\VehicleSearchInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}