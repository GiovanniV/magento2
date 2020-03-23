<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetAliases StructType
 * @subpackage Structs
 */
class GetAliases extends AbstractStructBase
{
    /**
     * The IDNUM
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $IDNUM;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * Constructor method for GetAliases
     * @uses GetAliases::setIDNUM()
     * @uses GetAliases::setCredentials()
     * @param int $iDNUM
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     */
    public function __construct($iDNUM = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this
            ->setIDNUM($iDNUM)
            ->setCredentials($credentials);
    }
    /**
     * Get IDNUM value
     * @return int
     */
    public function getIDNUM()
    {
        return $this->IDNUM;
    }
    /**
     * Set IDNUM value
     * @param int $iDNUM
     * @return \Born\Mkdata\Model\Api\StructType\GetAliases
     */
    public function setIDNUM($iDNUM = null)
    {
        // validation for constraint: int
        if (!is_null($iDNUM) && !is_numeric($iDNUM)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($iDNUM)), __LINE__);
        }
        $this->IDNUM = $iDNUM;
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
     * @return \Born\Mkdata\Model\Api\StructType\GetAliases
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
     * @return \Born\Mkdata\Model\Api\StructType\GetAliases
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
