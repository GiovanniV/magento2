<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Last ServiceType
 * @subpackage Services
 */
class Last extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named LastUpdate
     * Meta informations extracted from the WSDL
     * - documentation: Returns the most recent date/time that an entry on the list was updated
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\LastUpdate $parameters
     * @return \Born\Mkdata\Model\Api\StructType\LastUpdateResponse|bool
     */
    public function LastUpdate(\Born\Mkdata\Model\Api\StructType\LastUpdate $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->LastUpdate($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\LastUpdateResponse
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
