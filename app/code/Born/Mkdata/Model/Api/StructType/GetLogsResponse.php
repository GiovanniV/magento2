<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetLogsResponse StructType
 * @subpackage Structs
 */
class GetLogsResponse extends AbstractStructBase
{
    /**
     * The GetLogsResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog
     */
    public $GetLogsResult;
    /**
     * Constructor method for GetLogsResponse
     * @uses GetLogsResponse::setGetLogsResult()
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog $getLogsResult
     */
    public function __construct(\Born\Mkdata\Model\Api\ArrayType\ArrayOfLog $getLogsResult = null)
    {
        $this
            ->setGetLogsResult($getLogsResult);
    }
    /**
     * Get GetLogsResult value
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog|null
     */
    public function getGetLogsResult()
    {
        return $this->GetLogsResult;
    }
    /**
     * Set GetLogsResult value
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog $getLogsResult
     * @return \Born\Mkdata\Model\Api\StructType\GetLogsResponse
     */
    public function setGetLogsResult(\Born\Mkdata\Model\Api\ArrayType\ArrayOfLog $getLogsResult = null)
    {
        $this->GetLogsResult = $getLogsResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetLogsResponse
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
