<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddDynamicScreeningListEntryResponse StructType
 * @subpackage Structs
 */
class AddDynamicScreeningListEntryResponse extends AbstractStructBase
{
    /**
     * The AddDynamicScreeningListEntryResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $AddDynamicScreeningListEntryResult;
    /**
     * Constructor method for AddDynamicScreeningListEntryResponse
     * @uses AddDynamicScreeningListEntryResponse::setAddDynamicScreeningListEntryResult()
     * @param int $addDynamicScreeningListEntryResult
     */
    public function __construct($addDynamicScreeningListEntryResult = null)
    {
        $this
            ->setAddDynamicScreeningListEntryResult($addDynamicScreeningListEntryResult);
    }
    /**
     * Get AddDynamicScreeningListEntryResult value
     * @return int
     */
    public function getAddDynamicScreeningListEntryResult()
    {
        return $this->AddDynamicScreeningListEntryResult;
    }
    /**
     * Set AddDynamicScreeningListEntryResult value
     * @param int $addDynamicScreeningListEntryResult
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntryResponse
     */
    public function setAddDynamicScreeningListEntryResult($addDynamicScreeningListEntryResult = null)
    {
        // validation for constraint: int
        if (!is_null($addDynamicScreeningListEntryResult) && !is_numeric($addDynamicScreeningListEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($addDynamicScreeningListEntryResult)), __LINE__);
        }
        $this->AddDynamicScreeningListEntryResult = $addDynamicScreeningListEntryResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntryResponse
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
