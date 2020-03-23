<?php

namespace Born\Hibbert\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Place ServiceType
 * @subpackage Services
 */
class Place extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named placeOrder
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Hibbert\Model\Api\StructType\PlaceOrder $parameters
     * @return \Born\Hibbert\Model\Api\StructType\PlaceOrderResponse|bool
     */
    public function placeOrder(\Born\Hibbert\Model\Api\StructType\PlaceOrder $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->placeOrder($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Hibbert\Model\Api\StructType\PlaceOrderResponse
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
