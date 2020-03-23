<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetLogs StructType
 * @subpackage Structs
 */
class GetLogs extends AbstractStructBase
{
    /**
     * The FromDateTime
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $FromDateTime;
    /**
     * The ToDateTime
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $ToDateTime;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * Constructor method for GetLogs
     * @uses GetLogs::setFromDateTime()
     * @uses GetLogs::setToDateTime()
     * @uses GetLogs::setCredentials()
     * @param string $fromDateTime
     * @param string $toDateTime
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     */
    public function __construct($fromDateTime = null, $toDateTime = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this
            ->setFromDateTime($fromDateTime)
            ->setToDateTime($toDateTime)
            ->setCredentials($credentials);
    }
    /**
     * Get FromDateTime value
     * @return string
     */
    public function getFromDateTime()
    {
        return $this->FromDateTime;
    }
    /**
     * Set FromDateTime value
     * @param string $fromDateTime
     * @return \Born\Mkdata\Model\Api\StructType\GetLogs
     */
    public function setFromDateTime($fromDateTime = null)
    {
        // validation for constraint: string
        if (!is_null($fromDateTime) && !is_string($fromDateTime)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($fromDateTime)), __LINE__);
        }
        $this->FromDateTime = $fromDateTime;
        return $this;
    }
    /**
     * Get ToDateTime value
     * @return string
     */
    public function getToDateTime()
    {
        return $this->ToDateTime;
    }
    /**
     * Set ToDateTime value
     * @param string $toDateTime
     * @return \Born\Mkdata\Model\Api\StructType\GetLogs
     */
    public function setToDateTime($toDateTime = null)
    {
        // validation for constraint: string
        if (!is_null($toDateTime) && !is_string($toDateTime)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($toDateTime)), __LINE__);
        }
        $this->ToDateTime = $toDateTime;
        return $this;
    }
    /**
     * Get credentials value
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Credentials|null
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
    /**
     * Set credentials value
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @return \Born\Mkdata\Model\Api\StructType\GetLogs
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetLogs
     */
    public static function __set_state(array $array)
    {
        return parent::__set_state($array);
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
