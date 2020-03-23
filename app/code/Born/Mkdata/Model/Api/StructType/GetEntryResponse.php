<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetEntryResponse StructType
 * @subpackage Structs
 */
class GetEntryResponse extends AbstractStructBase
{
    /**
     * The GetEntryResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public $GetEntryResult;
    /**
     * Constructor method for GetEntryResponse
     * @uses GetEntryResponse::setGetEntryResult()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Entry $getEntryResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31Entry $getEntryResult = null)
    {
        $this
            ->setGetEntryResult($getEntryResult);
    }
    /**
     * Get GetEntryResult value
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry|null
     */
    public function getGetEntryResult()
    {
        return $this->GetEntryResult;
    }
    /**
     * Set GetEntryResult value
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Entry $getEntryResult
     * @return \Born\Mkdata\Model\Api\StructType\GetEntryResponse
     */
    public function setGetEntryResult(\Born\Mkdata\Model\Api\StructType\DPLv31Entry $getEntryResult = null)
    {
        $this->GetEntryResult = $getEntryResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetEntryResponse
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
