<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetUserDetailsResponse StructType
 * @subpackage Structs
 */
class GetUserDetailsResponse extends AbstractStructBase
{
    /**
     * The GetUserDetailsResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public $GetUserDetailsResult;
    /**
     * Constructor method for GetUserDetailsResponse
     * @uses GetUserDetailsResponse::setGetUserDetailsResult()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31User $getUserDetailsResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31User $getUserDetailsResult = null)
    {
        $this
            ->setGetUserDetailsResult($getUserDetailsResult);
    }
    /**
     * Get GetUserDetailsResult value
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User|null
     */
    public function getGetUserDetailsResult()
    {
        return $this->GetUserDetailsResult;
    }
    /**
     * Set GetUserDetailsResult value
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31User $getUserDetailsResult
     * @return \Born\Mkdata\Model\Api\StructType\GetUserDetailsResponse
     */
    public function setGetUserDetailsResult(\Born\Mkdata\Model\Api\StructType\DPLv31User $getUserDetailsResult = null)
    {
        $this->GetUserDetailsResult = $getUserDetailsResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetUserDetailsResponse
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
