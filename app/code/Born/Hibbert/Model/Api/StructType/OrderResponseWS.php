<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderResponseWS StructType
 * @subpackage Structs
 */
class OrderResponseWS extends AbstractStructBase
{
    /**
     * The errors
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS
     */
    public $errors;
    /**
     * The lineItemStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS
     */
    public $lineItemStatus;
    /**
     * The numberOfLines
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $numberOfLines;
    /**
     * The orderNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $orderNumber;
    /**
     * The orderReferenceNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $orderReferenceNumber;
    /**
     * The responseStatusCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $responseStatusCode;
    /**
     * Constructor method for OrderResponseWS
     * @uses OrderResponseWS::setErrors()
     * @uses OrderResponseWS::setLineItemStatus()
     * @uses OrderResponseWS::setNumberOfLines()
     * @uses OrderResponseWS::setOrderNumber()
     * @uses OrderResponseWS::setOrderReferenceNumber()
     * @uses OrderResponseWS::setResponseStatusCode()
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS $lineItemStatus
     * @param int $numberOfLines
     * @param string $orderNumber
     * @param string $orderReferenceNumber
     * @param string $responseStatusCode
     */
    public function __construct(\Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors = null, \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS $lineItemStatus = null, $numberOfLines = null, $orderNumber = null, $orderReferenceNumber = null, $responseStatusCode = null)
    {
        $this
            ->setErrors($errors)
            ->setLineItemStatus($lineItemStatus)
            ->setNumberOfLines($numberOfLines)
            ->setOrderNumber($orderNumber)
            ->setOrderReferenceNumber($orderReferenceNumber)
            ->setResponseStatusCode($responseStatusCode);
    }
    /**
     * Get errors value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS|null
     */
    public function getErrors()
    {
        return isset($this->errors) ? $this->errors : null;
    }
    /**
     * Set errors value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
     */
    public function setErrors(\Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors = null)
    {
        if (is_null($errors) || (is_array($errors) && empty($errors))) {
            unset($this->errors);
        } else {
            $this->errors = $errors;
        }
        return $this;
    }
    /**
     * Get lineItemStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS|null
     */
    public function getLineItemStatus()
    {
        return isset($this->lineItemStatus) ? $this->lineItemStatus : null;
    }
    /**
     * Set lineItemStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS $lineItemStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
     */
    public function setLineItemStatus(\Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS $lineItemStatus = null)
    {
        if (is_null($lineItemStatus) || (is_array($lineItemStatus) && empty($lineItemStatus))) {
            unset($this->lineItemStatus);
        } else {
            $this->lineItemStatus = $lineItemStatus;
        }
        return $this;
    }
    /**
     * Get numberOfLines value
     * @return int|null
     */
    public function getNumberOfLines()
    {
        return $this->numberOfLines;
    }
    /**
     * Set numberOfLines value
     * @param int $numberOfLines
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
     */
    public function setNumberOfLines($numberOfLines = null)
    {
        // validation for constraint: int
        if (!is_null($numberOfLines) && !is_numeric($numberOfLines)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($numberOfLines)), __LINE__);
        }
        $this->numberOfLines = $numberOfLines;
        return $this;
    }
    /**
     * Get orderNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderNumber()
    {
        return isset($this->orderNumber) ? $this->orderNumber : null;
    }
    /**
     * Set orderNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
     */
    public function setOrderNumber($orderNumber = null)
    {
        // validation for constraint: string
        if (!is_null($orderNumber) && !is_string($orderNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($orderNumber)), __LINE__);
        }
        if (is_null($orderNumber) || (is_array($orderNumber) && empty($orderNumber))) {
            unset($this->orderNumber);
        } else {
            $this->orderNumber = $orderNumber;
        }
        return $this;
    }
    /**
     * Get orderReferenceNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderReferenceNumber()
    {
        return isset($this->orderReferenceNumber) ? $this->orderReferenceNumber : null;
    }
    /**
     * Set orderReferenceNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderReferenceNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
     */
    public function setOrderReferenceNumber($orderReferenceNumber = null)
    {
        // validation for constraint: string
        if (!is_null($orderReferenceNumber) && !is_string($orderReferenceNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($orderReferenceNumber)), __LINE__);
        }
        if (is_null($orderReferenceNumber) || (is_array($orderReferenceNumber) && empty($orderReferenceNumber))) {
            unset($this->orderReferenceNumber);
        } else {
            $this->orderReferenceNumber = $orderReferenceNumber;
        }
        return $this;
    }
    /**
     * Get responseStatusCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getResponseStatusCode()
    {
        return isset($this->responseStatusCode) ? $this->responseStatusCode : null;
    }
    /**
     * Set responseStatusCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $responseStatusCode
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
     */
    public function setResponseStatusCode($responseStatusCode = null)
    {
        // validation for constraint: string
        if (!is_null($responseStatusCode) && !is_string($responseStatusCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($responseStatusCode)), __LINE__);
        }
        if (is_null($responseStatusCode) || (is_array($responseStatusCode) && empty($responseStatusCode))) {
            unset($this->responseStatusCode);
        } else {
            $this->responseStatusCode = $responseStatusCode;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS
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
