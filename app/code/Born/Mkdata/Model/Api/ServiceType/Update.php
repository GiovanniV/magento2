<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Update ServiceType
 * @subpackage Services
 */
class Update extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named UpdateDynamicScreeningListEntry
     * Meta informations extracted from the WSDL
     * - documentation: Updates an entry on your Dynamic Screening List (DSL) using an ID supplied by you when adding it, or by the ID that was returned from the system when adding it. Use the idIsCustomers boolean to specify which type of ID you are using.
     * The only required field is Name, all others can be empty strings.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\UpdateDynamicScreeningListEntry $parameters
     * @return \Born\Mkdata\Model\Api\StructType\UpdateDynamicScreeningListEntryResponse|bool
     */
    public function UpdateDynamicScreeningListEntry(\Born\Mkdata\Model\Api\StructType\UpdateDynamicScreeningListEntry $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->UpdateDynamicScreeningListEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\UpdateDynamicScreeningListEntryResponse
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
