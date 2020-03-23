<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Is ServiceType
 * @subpackage Services
 */
class Is extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named IsCountryEmbargoed
     * Meta informations extracted from the WSDL
     * - documentation: Returns true or false indicating whether or not a country is embargoed. The Search method does not check for embargoed status, so if that check is important for you, you will need to call this method as well
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoed $parameters
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoedResponse|bool
     */
    public function IsCountryEmbargoed(\Born\Mkdata\Model\Api\StructType\IsCountryEmbargoed $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->IsCountryEmbargoed($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoedResponse
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
