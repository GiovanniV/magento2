<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetAliasesResponse StructType
 * @subpackage Structs
 */
class GetAliasesResponse extends AbstractStructBase
{
    /**
     * The GetAliasesResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry
     */
    public $GetAliasesResult;
    /**
     * Constructor method for GetAliasesResponse
     * @uses GetAliasesResponse::setGetAliasesResult()
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $getAliasesResult
     */
    public function __construct(\Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $getAliasesResult = null)
    {
        $this
            ->setGetAliasesResult($getAliasesResult);
    }
    /**
     * Get GetAliasesResult value
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry|null
     */
    public function getGetAliasesResult()
    {
        return $this->GetAliasesResult;
    }
    /**
     * Set GetAliasesResult value
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $getAliasesResult
     * @return \Born\Mkdata\Model\Api\StructType\GetAliasesResponse
     */
    public function setGetAliasesResult(\Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $getAliasesResult = null)
    {
        $this->GetAliasesResult = $getAliasesResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetAliasesResponse
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
