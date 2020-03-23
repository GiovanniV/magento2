<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for License ServiceType
 * @subpackage Services
 */
class License extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named LicenseRequired
     * Meta informations extracted from the WSDL
     * - documentation: For ECCN licensing determination, given an ECCN code and ISO 2 letter code, the system returns details on license requirements.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\LicenseRequired $parameters
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequiredResponse|bool
     */
    public function LicenseRequired(\Born\Mkdata\Model\Api\StructType\LicenseRequired $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->LicenseRequired($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequiredResponse
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
