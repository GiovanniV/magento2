<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetCodeDetails StructType
 * @subpackage Structs
 */
class GetCodeDetails extends AbstractStructBase
{
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * The listCode
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $listCode;
    /**
     * Constructor method for GetCodeDetails
     * @uses GetCodeDetails::setCredentials()
     * @uses GetCodeDetails::setListCode()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param string $listCode
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, $listCode = null)
    {
        $this
            ->setCredentials($credentials)
            ->setListCode($listCode);
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
     * @return \Born\Mkdata\Model\Api\StructType\GetCodeDetails
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Get listCode value
     * @return string|null
     */
    public function getListCode()
    {
        return $this->listCode;
    }
    /**
     * Set listCode value
     * @param string $listCode
     * @return \Born\Mkdata\Model\Api\StructType\GetCodeDetails
     */
    public function setListCode($listCode = null)
    {
        // validation for constraint: string
        if (!is_null($listCode) && !is_string($listCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($listCode)), __LINE__);
        }
        $this->listCode = $listCode;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetCodeDetails
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
