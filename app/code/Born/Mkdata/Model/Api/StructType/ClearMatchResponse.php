<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ClearMatchResponse StructType
 * @subpackage Structs
 */
class ClearMatchResponse extends AbstractStructBase
{
    /**
     * The ClearMatchResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $ClearMatchResult;
    /**
     * Constructor method for ClearMatchResponse
     * @uses ClearMatchResponse::setClearMatchResult()
     * @param bool $clearMatchResult
     */
    public function __construct($clearMatchResult = null)
    {
        $this
            ->setClearMatchResult($clearMatchResult);
    }
    /**
     * Get ClearMatchResult value
     * @return bool
     */
    public function getClearMatchResult()
    {
        return $this->ClearMatchResult;
    }
    /**
     * Set ClearMatchResult value
     * @param bool $clearMatchResult
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatchResponse
     */
    public function setClearMatchResult($clearMatchResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($clearMatchResult) && !is_bool($clearMatchResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($clearMatchResult)), __LINE__);
        }
        $this->ClearMatchResult = $clearMatchResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatchResponse
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
