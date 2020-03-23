<?php
/**
 * Born_VehicleSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VehicleSearch\Model\ResourceModel\Vehicles
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\VehicleSearch\Model\ResourceModel\Vehicles;

use Born\VehicleSearch\Model\ResourceModel\Vehicles as ResourceVehicles;
use Born\VehicleSearch\Model\Vehicles;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'vehicle_id';

    protected function _construct()
    {
        $this->_init(Vehicles::class,ResourceVehicles::class);
    }
}