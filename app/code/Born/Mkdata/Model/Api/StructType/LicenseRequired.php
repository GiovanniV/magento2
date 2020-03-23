<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for LicenseRequired StructType
 * @subpackage Structs
 */
class LicenseRequired extends AbstractStructBase
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
     * The eccnCode
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $eccnCode;
    /**
     * The iso2Country
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $iso2Country;
    /**
     * Constructor method for LicenseRequired
     * @uses LicenseRequired::setCredentials()
     * @uses LicenseRequired::setEccnCode()
     * @uses LicenseRequired::setIso2Country()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param string $eccnCode
     * @param string $iso2Country
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, $eccnCode = null, $iso2Country = null)
    {
        $this
            ->setCredentials($credentials)
            ->setEccnCode($eccnCode)
            ->setIso2Country($iso2Country);
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
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequired
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Get eccnCode value
     * @return string|null
     */
    public function getEccnCode()
    {
        return $this->eccnCode;
    }
    /**
     * Set eccnCode value
     * @param string $eccnCode
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequired
     */
    public function setEccnCode($eccnCode = null)
    {
        // validation for constraint: string
        if (!is_null($eccnCode) && !is_string($eccnCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($eccnCode)), __LINE__);
        }
        $this->eccnCode = $eccnCode;
        return $this;
    }
    /**
     * Get iso2Country value
     * @return string|null
     */
    public function getIso2Country()
    {
        return $this->iso2Country;
    }
    /**
     * Set iso2Country value
     * @param string $iso2Country
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequired
     */
    public function setIso2Country($iso2Country = null)
    {
        // validation for constraint: string
        if (!is_null($iso2Country) && !is_string($iso2Country)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($iso2Country)), __LINE__);
        }
        $this->iso2Country = $iso2Country;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequired
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
