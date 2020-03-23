<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Up ServiceType
 * @subpackage Services
 */
class Up extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named Up
     * Meta informations extracted from the WSDL
     * - documentation: Returns true if system is up and credentials are valid. | Returns true if system is up and credentials are valid. | Returns true if system is up and credentials are valid.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\Up $parameters
     * @return \Born\Mkdata\Model\Api\StructType\UpResponse|bool
     */
    public function Up(\Born\Mkdata\Model\Api\StructType\Up $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->Up($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\UpResponse
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
