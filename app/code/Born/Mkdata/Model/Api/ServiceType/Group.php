<?php

namespace Born\Mkdata\Model\Api\ServiceType;

use \WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Group ServiceType
 * @subpackage Services
 */
class Group extends AbstractSoapClientBase
{
    /**
     * Method to call the operation originally named GroupFactory
     * Meta informations extracted from the WSDL
     * - documentation: The group factory can help generate groups for a search object to express complicated search criteria. Currently it only supports once such concept, a group that limits the search to list codes from a supplied country
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::getResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param \Born\Mkdata\Model\Api\StructType\GroupFactory $parameters
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactoryResponse|bool
     */
    public function GroupFactory(\Born\Mkdata\Model\Api\StructType\GroupFactory $parameters)
    {
        try {
            $this->setResult($this->getSoapClient()->GroupFactory($parameters));
            return $this->getResult();
        } catch (\SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactoryResponse
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
