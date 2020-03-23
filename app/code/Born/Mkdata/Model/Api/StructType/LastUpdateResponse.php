<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for LastUpdateResponse StructType
 * @subpackage Structs
 */
class LastUpdateResponse extends AbstractStructBase
{
    /**
     * The LastUpdateResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $LastUpdateResult;
    /**
     * Constructor method for LastUpdateResponse
     * @uses LastUpdateResponse::setLastUpdateResult()
     * @param string $lastUpdateResult
     */
    public function __construct($lastUpdateResult = null)
    {
        $this
            ->setLastUpdateResult($lastUpdateResult);
    }
    /**
     * Get LastUpdateResult value
     * @return string
     */
    public function getLastUpdateResult()
    {
        return $this->LastUpdateResult;
    }
    /**
     * Set LastUpdateResult value
     * @param string $lastUpdateResult
     * @return \Born\Mkdata\Model\Api\StructType\LastUpdateResponse
     */
    public function setLastUpdateResult($lastUpdateResult = null)
    {
        // validation for constraint: string
        if (!is_null($lastUpdateResult) && !is_string($lastUpdateResult)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastUpdateResult)), __LINE__);
        }
        $this->LastUpdateResult = $lastUpdateResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\LastUpdateResponse
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
