<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Clear ServiceType
 * @subpackage Services
 */
class Clear extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named ClearMatch
     * Meta informations extracted from the WSDL
     * - documentation: Clear a match reported in an Automated Batch Screening (ABS) report. If you are an ABS client, you will have the data necessary in your report to clear via this method.
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\ClearMatch $parameters
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatchResponse|bool
     */
    public function ClearMatch(\Born\Mkdata\Model\Api\StructType\ClearMatch $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->ClearMatch($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatchResponse
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
