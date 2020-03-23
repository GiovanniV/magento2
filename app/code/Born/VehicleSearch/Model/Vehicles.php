<?php
/**
 * Born_VehicleSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VehicleSearch\Model
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */
namespace Born\VehicleSearch\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Born\VehicleSearch\Api\Data\VehicleSearchInterface;


class Vehicles extends AbstractExtensibleModel implements VehicleSearchInterface
{
    const SHIP_TO_NUMBER = 'ship_to_number';
    const APPLICATION_NUMBER = 'application_number';
    const YEAR = 'year';
    const MAKE = 'make';
    const MODEL = 'model';
    const ENGINE_SIZE_L = 'engine_size_l';
    const APP_GROUP = 'app_group';
    const YEAR_URL = 'year_url';

    protected function _construct()
    {
        $this->_init(ResourceModel\Vehicles::class);
    }

    public function getShipToNumber()
    {
        return $this->_getData(self::SHIP_TO_NUMBER);
    }

    public function setShipToNumber($ship_to_number)
    {
        $this->setData(self::SHIP_TO_NUMBER,$ship_to_number);
    }

    public function getApplicationNumber()
    {
        return $this->_getData(self::APPLICATION_NUMBER);
    }

    public function setApplicationNumber($application_number)
    {
        $this->setData(self::APPLICATION_NUMBER,$application_number);
    }

    public function getYear()
    {
        return $this->_getData(self::YEAR);
    }

    public function setYear($year)
    {
        $this->setData(self::YEAR,$year);
    }

    public function getMake()
    {
        return $this->_getData(self::MAKE);
    }

    public function setMake($make)
    {
        $this->setData(self::MAKE,$make);
    }

    public function getModel()
    {
        return $this->_getData(self::MODEL);
    }

    public function setModel($model)
    {
        $this->setData(self::MODEL,$model);
    }

    public function getEngineSizeL()
    {
        return $this->_getData(self::ENGINE_SIZE_L);
    }

    public function setEngineSizeL($engine_size_l)
    {
        $this->setData(self::ENGINE_SIZE_L,$engine_size_l);
    }

    public function getAppGroup()
    {
        return $this->_getData(self::APP_GROUP);
    }

    public function setAppGroup($app_group)
    {
        $this->setData(self::APP_GROUP,$app_group);
    }
    public function getYearUrl()
    {
        return $this->_getData(self::YEAR_URL);
    }

    public function setYearUrl($yearUrl)
    {
        $this->setData(self::YEAR_URL,$yearUrl);
    }
}