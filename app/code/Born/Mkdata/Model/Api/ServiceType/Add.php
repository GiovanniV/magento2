<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Add ServiceType
 * @subpackage Services
 */
class Add extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named AddDynamicScreeningListEntry
     * Meta informations extracted from the WSDL
     * - documentation: Add an entry to my Dynamic Screening List (DSL). The only required field is Name, all others can be empty strings. The clientSuppliedID can be used if you wish to update the record in the future, this number needs to be unique across
     * your list, if you don't wish to use this then set this to 0.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry $parameters
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntryResponse|bool
     */
    public function AddDynamicScreeningListEntry(\Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->AddDynamicScreeningListEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntryResponse
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
