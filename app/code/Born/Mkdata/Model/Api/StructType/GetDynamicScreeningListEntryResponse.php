<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetDynamicScreeningListEntryResponse StructType
 * @subpackage Structs
 */
class GetDynamicScreeningListEntryResponse extends AbstractStructBase
{
    /**
     * The GetDynamicScreeningListEntryResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public $GetDynamicScreeningListEntryResult;
    /**
     * Constructor method for GetDynamicScreeningListEntryResponse
     * @uses GetDynamicScreeningListEntryResponse::setGetDynamicScreeningListEntryResult()
     * @param \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity $getDynamicScreeningListEntryResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity $getDynamicScreeningListEntryResult = null)
    {
        $this
            ->setGetDynamicScreeningListEntryResult($getDynamicScreeningListEntryResult);
    }
    /**
     * Get GetDynamicScreeningListEntryResult value
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity|null
     */
    public function getGetDynamicScreeningListEntryResult()
    {
        return $this->GetDynamicScreeningListEntryResult;
    }
    /**
     * Set GetDynamicScreeningListEntryResult value
     * @param \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity $getDynamicScreeningListEntryResult
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntryResponse
     */
    public function setGetDynamicScreeningListEntryResult(\Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity $getDynamicScreeningListEntryResult = null)
    {
        $this->GetDynamicScreeningListEntryResult = $getDynamicScreeningListEntryResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntryResponse
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
