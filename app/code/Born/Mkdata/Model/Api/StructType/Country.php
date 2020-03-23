<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for country StructType
 * @subpackage Structs
 */
class Country extends AbstractStructBase
{
    /**
     * The countryCode
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $countryCode;
    /**
     * The cntryName
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $cntryName;
    /**
     * Constructor method for country
     * @uses Country::setCountryCode()
     * @uses Country::setCntryName()
     * @param string $countryCode
     * @param string $cntryName
     */
    public function __construct($countryCode = null, $cntryName = null)
    {
        $this
            ->setCountryCode($countryCode)
            ->setCntryName($cntryName);
    }
    /**
     * Get countryCode value
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }
    /**
     * Set countryCode value
     * @param string $countryCode
     * @return \Born\Mkdata\Model\Api\StructType\Country
     */
    public function setCountryCode($countryCode = null)
    {
        // validation for constraint: string
        if (!is_null($countryCode) && !is_string($countryCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($countryCode)), __LINE__);
        }
        $this->countryCode = $countryCode;
        return $this;
    }
    /**
     * Get cntryName value
     * @return string|null
     */
    public function getCntryName()
    {
        return $this->cntryName;
    }
    /**
     * Set cntryName value
     * @param string $cntryName
     * @return \Born\Mkdata\Model\Api\StructType\Country
     */
    public function setCntryName($cntryName = null)
    {
        // validation for constraint: string
        if (!is_null($cntryName) && !is_string($cntryName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($cntryName)), __LINE__);
        }
        $this->cntryName = $cntryName;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\Country
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
