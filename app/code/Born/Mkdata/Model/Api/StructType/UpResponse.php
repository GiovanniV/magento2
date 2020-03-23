<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UpResponse StructType
 * @subpackage Structs
 */
class UpResponse extends AbstractStructBase
{
    /**
     * The UpResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $UpResult;
    /**
     * Constructor method for UpResponse
     * @uses UpResponse::setUpResult()
     * @param bool $upResult
     */
    public function __construct($upResult = null)
    {
        $this
            ->setUpResult($upResult);
    }
    /**
     * Get UpResult value
     * @return bool
     */
    public function getUpResult()
    {
        return $this->UpResult;
    }
    /**
     * Set UpResult value
     * @param bool $upResult
     * @return \Born\Mkdata\Model\Api\StructType\UpResponse
     */
    public function setUpResult($upResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($upResult) && !is_bool($upResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($upResult)), __LINE__);
        }
        $this->UpResult = $upResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\UpResponse
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
