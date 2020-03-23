<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Delist ServiceType
 * @subpackage Services
 */
class Delist extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named DelistDynamicScreeningListEntry
     * Meta informations extracted from the WSDL
     * - documentation: Delists/deactivates a Dynamic Screening List (DSL) entry using an ID supplied by you when adding it, or by the ID that was returned from the system when adding it. Use the idIsCustomers boolean to specify which type of ID you are
     * using.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\DelistDynamicScreeningListEntry $parameters
     * @return \Born\Mkdata\Model\Api\StructType\DelistDynamicScreeningListEntryResponse|bool
     */
    public function DelistDynamicScreeningListEntry(\Born\Mkdata\Model\Api\StructType\DelistDynamicScreeningListEntry $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->DelistDynamicScreeningListEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\DelistDynamicScreeningListEntryResponse
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
