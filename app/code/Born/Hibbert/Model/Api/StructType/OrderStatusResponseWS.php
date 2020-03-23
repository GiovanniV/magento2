<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderStatusResponseWS StructType
 * @subpackage Structs
 */
class OrderStatusResponseWS extends AbstractStructBase
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
     * The numberOfOrderStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $numberOfOrderStatus;
    /**
     * The orderStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS
     */
    public $orderStatus;
    /**
     * The responseStatusCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $responseStatusCode;
    /**
     * Constructor method for OrderStatusResponseWS
     * @uses OrderStatusResponseWS::setErrors()
     * @uses OrderStatusResponseWS::setNumberOfOrderStatus()
     * @uses OrderStatusResponseWS::setOrderStatus()
     * @uses OrderStatusResponseWS::setResponseStatusCode()
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors
     * @param int $numberOfOrderStatus
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS $orderStatus
     * @param string $responseStatusCode
     */
    public function __construct(\Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors = null, $numberOfOrderStatus = null, \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS $orderStatus = null, $responseStatusCode = null)
    {
        $this
            ->setErrors($errors)
            ->setNumberOfOrderStatus($numberOfOrderStatus)
            ->setOrderStatus($orderStatus)
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS
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
     * Get numberOfOrderStatus value
     * @return int|null
     */
    public function getNumberOfOrderStatus()
    {
        return $this->numberOfOrderStatus;
    }
    /**
     * Set numberOfOrderStatus value
     * @param int $numberOfOrderStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS
     */
    public function setNumberOfOrderStatus($numberOfOrderStatus = null)
    {
        // validation for constraint: int
        if (!is_null($numberOfOrderStatus) && !is_numeric($numberOfOrderStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($numberOfOrderStatus)), __LINE__);
        }
        $this->numberOfOrderStatus = $numberOfOrderStatus;
        return $this;
    }
    /**
     * Get orderStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS|null
     */
    public function getOrderStatus()
    {
        return isset($this->orderStatus) ? $this->orderStatus : null;
    }
    /**
     * Set orderStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS $orderStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS
     */
    public function setOrderStatus(\Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS $orderStatus = null)
    {
        if (is_null($orderStatus) || (is_array($orderStatus) && empty($orderStatus))) {
            unset($this->orderStatus);
        } else {
            $this->orderStatus = $orderStatus;
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS
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
