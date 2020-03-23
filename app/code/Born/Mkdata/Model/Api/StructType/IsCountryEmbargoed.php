<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for IsCountryEmbargoed StructType
 * @subpackage Structs
 */
class IsCountryEmbargoed extends AbstractStructBase
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
     * The iso2Letter
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $iso2Letter;
    /**
     * Constructor method for IsCountryEmbargoed
     * @uses IsCountryEmbargoed::setCredentials()
     * @uses IsCountryEmbargoed::setIso2Letter()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param string $iso2Letter
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, $iso2Letter = null)
    {
        $this
            ->setCredentials($credentials)
            ->setIso2Letter($iso2Letter);
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
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoed
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Get iso2Letter value
     * @return string|null
     */
    public function getIso2Letter()
    {
        return $this->iso2Letter;
    }
    /**
     * Set iso2Letter value
     * @param string $iso2Letter
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoed
     */
    public function setIso2Letter($iso2Letter = null)
    {
        // validation for constraint: string
        if (!is_null($iso2Letter) && !is_string($iso2Letter)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($iso2Letter)), __LINE__);
        }
        $this->iso2Letter = $iso2Letter;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoed
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
