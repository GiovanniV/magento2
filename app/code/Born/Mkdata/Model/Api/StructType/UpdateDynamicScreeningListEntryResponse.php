<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for UpdateDynamicScreeningListEntryResponse StructType
 * @subpackage Structs
 */
class UpdateDynamicScreeningListEntryResponse extends AbstractStructBase
{
    /**
     * The UpdateDynamicScreeningListEntryResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $UpdateDynamicScreeningListEntryResult;
    /**
     * Constructor method for UpdateDynamicScreeningListEntryResponse
     * @uses UpdateDynamicScreeningListEntryResponse::setUpdateDynamicScreeningListEntryResult()
     * @param bool $updateDynamicScreeningListEntryResult
     */
    public function __construct($updateDynamicScreeningListEntryResult = null)
    {
        $this
            ->setUpdateDynamicScreeningListEntryResult($updateDynamicScreeningListEntryResult);
    }
    /**
     * Get UpdateDynamicScreeningListEntryResult value
     * @return bool
     */
    public function getUpdateDynamicScreeningListEntryResult()
    {
        return $this->UpdateDynamicScreeningListEntryResult;
    }
    /**
     * Set UpdateDynamicScreeningListEntryResult value
     * @param bool $updateDynamicScreeningListEntryResult
     * @return \Born\Mkdata\Model\Api\StructType\UpdateDynamicScreeningListEntryResponse
     */
    public function setUpdateDynamicScreeningListEntryResult($updateDynamicScreeningListEntryResult = null)
    {
        // validation for constraint: boolean
        if (!is_null($updateDynamicScreeningListEntryResult) && !is_bool($updateDynamicScreeningListEntryResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($updateDynamicScreeningListEntryResult)), __LINE__);
        }
        $this->UpdateDynamicScreeningListEntryResult = $updateDynamicScreeningListEntryResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\UpdateDynamicScreeningListEntryResponse
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
