<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Get ServiceType
 * @subpackage Services
 */
class Get extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named GetEntry
     * Meta informations extracted from the WSDL
     * - documentation: Returns details about an entry on the Denied Parties List (DPL) from the unique ID that MK has assigned it (IDNUM).
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetEntry $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetEntryResponse|bool
     */
    public function GetEntry(\Born\Mkdata\Model\Api\StructType\GetEntry $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetUserDetails
     * Meta informations extracted from the WSDL
     * - documentation: Returns details about your own account, can be used to ensure that you have access to the web service
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetUserDetails $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetUserDetailsResponse|bool
     */
    public function GetUserDetails(\Born\Mkdata\Model\Api\StructType\GetUserDetails $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetUserDetails($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetCodeDetails
     * Meta informations extracted from the WSDL
     * - documentation: Returns the full name of a list from the list code.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetCodeDetails $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetCodeDetailsResponse|bool
     */
    public function GetCodeDetails(\Born\Mkdata\Model\Api\StructType\GetCodeDetails $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetCodeDetails($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetCountryDetails
     * Meta informations extracted from the WSDL
     * - documentation: Returns the full name of a country from the ISO 2 letter code
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetCountryDetails $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetCountryDetailsResponse|bool
     */
    public function GetCountryDetails(\Born\Mkdata\Model\Api\StructType\GetCountryDetails $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetCountryDetails($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetAliases
     * Meta informations extracted from the WSDL
     * - documentation: From a listings unique ID (IDNUM) we will return a list of all aliases for that party. This method only applies to DPL entries and not Premium lists.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetAliases $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetAliasesResponse|bool
     */
    public function GetAliases(\Born\Mkdata\Model\Api\StructType\GetAliases $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetAliases($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetDynamicScreeningListEntry
     * Meta informations extracted from the WSDL
     * - documentation: Returns a Dynamic Screening List (DSL) entry using an ID supplied by you when adding it, or by the ID that was returned from the system when adding it. Use the idIsCustomers boolean to specify which type of ID you are using.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntry $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntryResponse|bool
     */
    public function GetDynamicScreeningListEntry(\Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntry $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetDynamicScreeningListEntry($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Method to call the operation originally named GetLogs
     * Meta informations extracted from the WSDL
     * - documentation: Returns search log entries for the user passed in the credentials for the date/time range expressed by the From and To parameters
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GetLogs $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GetLogsResponse|bool
     */
    public function GetLogs(\Born\Mkdata\Model\Api\StructType\GetLogs $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GetLogs($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\GetAliasesResponse|\Born\Mkdata\Model\Api\StructType\GetCodeDetailsResponse|\Born\Mkdata\Model\Api\StructType\GetCountryDetailsResponse|\Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntryResponse|\Born\Mkdata\Model\Api\StructType\GetEntryResponse|\Born\Mkdata\Model\Api\StructType\GetLogsResponse|\Born\Mkdata\Model\Api\StructType\GetUserDetailsResponse
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
