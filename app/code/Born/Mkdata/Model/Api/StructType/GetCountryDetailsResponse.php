<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetCountryDetailsResponse StructType
 * @subpackage Structs
 */
class GetCountryDetailsResponse extends AbstractStructBase
{
    /**
     * The GetCountryDetailsResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\Country
     */
    public $GetCountryDetailsResult;
    /**
     * Constructor method for GetCountryDetailsResponse
     * @uses GetCountryDetailsResponse::setGetCountryDetailsResult()
     * @param \Born\Mkdata\Model\Api\StructType\Country $getCountryDetailsResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\Country $getCountryDetailsResult = null)
    {
        $this
            ->setGetCountryDetailsResult($getCountryDetailsResult);
    }
    /**
     * Get GetCountryDetailsResult value
     * @return \Born\Mkdata\Model\Api\StructType\Country|null
     */
    public function getGetCountryDetailsResult()
    {
        return $this->GetCountryDetailsResult;
    }
    /**
     * Set GetCountryDetailsResult value
     * @param \Born\Mkdata\Model\Api\StructType\Country $getCountryDetailsResult
     * @return \Born\Mkdata\Model\Api\StructType\GetCountryDetailsResponse
     */
    public function setGetCountryDetailsResult(\Born\Mkdata\Model\Api\StructType\Country $getCountryDetailsResult = null)
    {
        $this->GetCountryDetailsResult = $getCountryDetailsResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetCountryDetailsResponse
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
