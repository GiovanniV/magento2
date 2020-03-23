<?php

namespace Born\Hibbert\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Get ServiceType
 * @subpackage Services
 */
class Get extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named getInventory
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Hibbert\Model\Api\StructType\GetInventory $parameters
     * @return \Born\Hibbert\Model\Api\StructType\GetInventoryResponse|bool
     */
    public function getInventory(\Born\Hibbert\Model\Api\StructType\GetInventory $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->getInventory($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named getOrderStatus
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Hibbert\Model\Api\StructType\GetOrderStatus $parameters
     * @return \Born\Hibbert\Model\Api\StructType\GetOrderStatusResponse|bool
     */
    public function getOrderStatus(\Born\Hibbert\Model\Api\StructType\GetOrderStatus $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->getOrderStatus($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named getInventoryItem
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Hibbert\Model\Api\StructType\GetInventoryItem $parameters
     * @return \Born\Hibbert\Model\Api\StructType\GetInventoryItemResponse|bool
     */
    public function getInventoryItem(\Born\Hibbert\Model\Api\StructType\GetInventoryItem $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->getInventoryItem($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named getDailyOrderStatusFeed
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Hibbert\Model\Api\StructType\GetDailyOrderStatusFeed $parameters
     * @return \Born\Hibbert\Model\Api\StructType\GetDailyOrderStatusFeedResponse|bool
     */
    public function getDailyOrderStatusFeed(\Born\Hibbert\Model\Api\StructType\GetDailyOrderStatusFeed $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->getDailyOrderStatusFeed($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Hibbert\Model\Api\StructType\GetDailyOrderStatusFeedResponse|\Born\Hibbert\Model\Api\StructType\GetInventoryItemResponse|\Born\Hibbert\Model\Api\StructType\GetInventoryResponse|\Born\Hibbert\Model\Api\StructType\GetOrderStatusResponse
     */
    public function getResult()
    {
        return parent::getResult();
    }
    /**
     * Method returning the class name
     * @return string __CLASS__
     */
    public function __toString()
    {
        return __CLASS__;
    }
}
