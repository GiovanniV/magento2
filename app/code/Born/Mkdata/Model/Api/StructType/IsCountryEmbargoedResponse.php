<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for IsCountryEmbargoedResponse StructType
 * @subpackage Structs
 */
class IsCountryEmbargoedResponse extends AbstractStructBase
{
    /**
     * The IsCountryEmbargoedResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $IsCountryEmbargoedResult;
    /**
     * Constructor method for IsCountryEmbargoedResponse
     * @uses IsCountryEmbargoedResponse::setIsCountryEmbargoedResult()
     * @param bool $isCountryEmbargoedResult
     */
    public function __construct($isCountryEmbargoedResult = null)
    {
        $this
            ->setIsCountryEmbargoedResult($isCountryEmbargoedResult);
    }
    /**
     * Get IsCountryEmbargoedResult value
     * @return bool
     */
    public function getIsCountryEmbargoedResult()
    {
        return $this->IsCountryEmbargoedResult;
    }
    /**
     * Set IsCountryEmbargoedResult value
     * @param bool $isCountryEmbargoedResult
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoedResponse
     */
    public function setIsCountryEmbargoedResult($isCountryEmbargoedResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($isCountryEmbargoedResult) && !is_bool($isCountryEmbargoedResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($isCountryEmbargoedResult)), __LINE__);
        }
        $this->IsCountryEmbargoedResult = $isCountryEmbargoedResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\IsCountryEmbargoedResponse
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
