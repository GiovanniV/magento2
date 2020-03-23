<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ErrorCodeWS StructType
 * @subpackage Structs
 */
class ErrorCodeWS extends AbstractStructBase
{
    /**
     * The errorCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $errorCode;
    /**
     * The errorDescription
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $errorDescription;
    /**
     * Constructor method for ErrorCodeWS
     * @uses ErrorCodeWS::setErrorCode()
     * @uses ErrorCodeWS::setErrorDescription()
     * @param string $errorCode
     * @param string $errorDescription
     */
    public function __construct($errorCode = null, $errorDescription = null)
    {
        $this
            ->setErrorCode($errorCode)
            ->setErrorDescription($errorDescription);
    }
    /**
     * Get errorCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getErrorCode()
    {
        return isset($this->errorCode) ? $this->errorCode : null;
    }
    /**
     * Set errorCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $errorCode
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS
     */
    public function setErrorCode($errorCode = null)
    {
        // validation for constraint: string
        if (!is_null($errorCode) && !is_string($errorCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($errorCode)), __LINE__);
        }
        if (is_null($errorCode) || (is_array($errorCode) && empty($errorCode))) {
            unset($this->errorCode);
        } else {
            $this->errorCode = $errorCode;
        }
        return $this;
    }
    /**
     * Get errorDescription value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getErrorDescription()
    {
        return isset($this->errorDescription) ? $this->errorDescription : null;
    }
    /**
     * Set errorDescription value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $errorDescription
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS
     */
    public function setErrorDescription($errorDescription = null)
    {
        // validation for constraint: string
        if (!is_null($errorDescription) && !is_string($errorDescription)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($errorDescription)), __LINE__);
        }
        if (is_null($errorDescription) || (is_array($errorDescription) && empty($errorDescription))) {
            unset($this->errorDescription);
        } else {
            $this->errorDescription = $errorDescription;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS
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
