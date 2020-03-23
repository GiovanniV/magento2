<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetCodeDetailsResponse StructType
 * @subpackage Structs
 */
class GetCodeDetailsResponse extends AbstractStructBase
{
    /**
     * The GetCodeDetailsResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\Code
     */
    public $GetCodeDetailsResult;
    /**
     * Constructor method for GetCodeDetailsResponse
     * @uses GetCodeDetailsResponse::setGetCodeDetailsResult()
     * @param \Born\Mkdata\Model\Api\StructType\Code $getCodeDetailsResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\Code $getCodeDetailsResult = null)
    {
        $this
            ->setGetCodeDetailsResult($getCodeDetailsResult);
    }
    /**
     * Get GetCodeDetailsResult value
     * @return \Born\Mkdata\Model\Api\StructType\Code|null
     */
    public function getGetCodeDetailsResult()
    {
        return $this->GetCodeDetailsResult;
    }
    /**
     * Set GetCodeDetailsResult value
     * @param \Born\Mkdata\Model\Api\StructType\Code $getCodeDetailsResult
     * @return \Born\Mkdata\Model\Api\StructType\GetCodeDetailsResponse
     */
    public function setGetCodeDetailsResult(\Born\Mkdata\Model\Api\StructType\Code $getCodeDetailsResult = null)
    {
        $this->GetCodeDetailsResult = $getCodeDetailsResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetCodeDetailsResponse
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
