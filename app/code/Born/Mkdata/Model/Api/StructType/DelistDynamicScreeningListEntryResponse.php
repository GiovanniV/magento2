<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DelistDynamicScreeningListEntryResponse StructType
 * @subpackage Structs
 */
class DelistDynamicScreeningListEntryResponse extends AbstractStructBase
{
    /**
     * The DelistDynamicScreeningListEntryResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $DelistDynamicScreeningListEntryResult;
    /**
     * Constructor method for DelistDynamicScreeningListEntryResponse
     * @uses DelistDynamicScreeningListEntryResponse::setDelistDynamicScreeningListEntryResult()
     * @param bool $delistDynamicScreeningListEntryResult
     */
    public function __construct($delistDynamicScreeningListEntryResult = null)
    {
        $this
            ->setDelistDynamicScreeningListEntryResult($delistDynamicScreeningListEntryResult);
    }
    /**
     * Get DelistDynamicScreeningListEntryResult value
     * @return bool
     */
    public function getDelistDynamicScreeningListEntryResult()
    {
        return $this->DelistDynamicScreeningListEntryResult;
    }
    /**
     * Set DelistDynamicScreeningListEntryResult value
     * @param bool $delistDynamicScreeningListEntryResult
     * @return \Born\Mkdata\Model\Api\StructType\DelistDynamicScreeningListEntryResponse
     */
    public function setDelistDynamicScreeningListEntryResult($delistDynamicScreeningListEntryResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($delistDynamicScreeningListEntryResult) && !is_bool($delistDynamicScreeningListEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($delistDynamicScreeningListEntryResult)), __LINE__);
        }
        $this->DelistDynamicScreeningListEntryResult = $delistDynamicScreeningListEntryResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\DelistDynamicScreeningListEntryResponse
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
