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

use Magento\Framework\Api\ExtensibleDataInterface;


interface VehicleSearchInterface extends ExtensibleDataInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getShipToNumber();

    /**
     * @param string $shipToNumber
     * @return void
     */
    public function setShipToNumber($shipToNumber);

    /**
     * @return string
     */
    public function getApplicationNumber();

    /**
     * @param string $applicationNumber
     * @return void
     */
    public function setApplicationNumber($applicationNumber);

    /**
     * @return string
     */
    public function getYear();

    /**
     * @param string $year
     * @return void
     */
    public function setYear($year);

    /**
     * @return string
     */
    public function getModel();

    /**
     * @param string $model
     * @return void
     */
    public function setModel($model);

    /**
     * @return string
     */
    public function getMake();

    /**
     * @param string $make
     * @return void
     */
    public function setMake($make);

    /**
     * @return string
     */
    public function getEngineSizeL();

    /**
     * @param string $engineSizeL
     * @return void
     */
    public function setEngineSizeL($engineSizeL);

    /**
     * @return string
     */
    public function getAppGroup();

    /**
     * @param string $appGroup
     * @return void
     */
    public function setAppGroup($appGroup);

    /**
     * @return string
     */
    public function getYearUrl();

    /**
     * @param string $yearUrl
     * @return void
     */
    public function setYearUrl($yearUrl);
}