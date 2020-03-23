<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Search ServiceType
 * @subpackage Services
 */
class Search extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named SearchDpl
     * Meta informations extracted from the WSDL
     * - documentation: Search the DPL using the search logic represented by the Search object.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\SearchDpl $parameters
     * @return \Born\Mkdata\Model\Api\StructType\SearchDplResponse|bool
     */
    public function SearchDpl(\Born\Mkdata\Model\Api\StructType\SearchDpl $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->SearchDpl($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\SearchDplResponse
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
