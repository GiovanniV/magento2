<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderStatusWS StructType
 * @subpackage Structs
 */
class OrderStatusWS extends AbstractStructBase
{
    /**
     * The billingInformation
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\LocationWS
     */
    public $billingInformation;
    /**
     * The customerNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $customerNumber;
    /**
     * The lineItemStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS
     */
    public $lineItemStatus;
    /**
     * The numberOfItemStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $numberOfItemStatus;
    /**
     * The orderDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $orderDate;
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
     * The orderStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $orderStatus;
    /**
     * The orderStatusDescription
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $orderStatusDescription;
    /**
     * The shippingInformation
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\LocationWS
     */
    public $shippingInformation;
    /**
     * Constructor method for OrderStatusWS
     * @uses OrderStatusWS::setBillingInformation()
     * @uses OrderStatusWS::setCustomerNumber()
     * @uses OrderStatusWS::setLineItemStatus()
     * @uses OrderStatusWS::setNumberOfItemStatus()
     * @uses OrderStatusWS::setOrderDate()
     * @uses OrderStatusWS::setOrderNumber()
     * @uses OrderStatusWS::setOrderReferenceNumber()
     * @uses OrderStatusWS::setOrderStatus()
     * @uses OrderStatusWS::setOrderStatusDescription()
     * @uses OrderStatusWS::setShippingInformation()
     * @param \Born\Hibbert\Model\Api\StructType\LocationWS $billingInformation
     * @param string $customerNumber
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS $lineItemStatus
     * @param int $numberOfItemStatus
     * @param string $orderDate
     * @param string $orderNumber
     * @param string $orderReferenceNumber
     * @param string $orderStatus
     * @param string $orderStatusDescription
     * @param \Born\Hibbert\Model\Api\StructType\LocationWS $shippingInformation
     */
    public function __construct(\Born\Hibbert\Model\Api\StructType\LocationWS $billingInformation = null, $customerNumber = null, \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS $lineItemStatus = null, $numberOfItemStatus = null, $orderDate = null, $orderNumber = null, $orderReferenceNumber = null, $orderStatus = null, $orderStatusDescription = null, \Born\Hibbert\Model\Api\StructType\LocationWS $shippingInformation = null)
    {
        $this
            ->setBillingInformation($billingInformation)
            ->setCustomerNumber($customerNumber)
            ->setLineItemStatus($lineItemStatus)
            ->setNumberOfItemStatus($numberOfItemStatus)
            ->setOrderDate($orderDate)
            ->setOrderNumber($orderNumber)
            ->setOrderReferenceNumber($orderReferenceNumber)
            ->setOrderStatus($orderStatus)
            ->setOrderStatusDescription($orderStatusDescription)
            ->setShippingInformation($shippingInformation);
    }
    /**
     * Get billingInformation value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\LocationWS|null
     */
    public function getBillingInformation()
    {
        return isset($this->billingInformation) ? $this->billingInformation : null;
    }
    /**
     * Set billingInformation value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\StructType\LocationWS $billingInformation
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setBillingInformation(\Born\Hibbert\Model\Api\StructType\LocationWS $billingInformation = null)
    {
        if (is_null($billingInformation) || (is_array($billingInformation) && empty($billingInformation))) {
            unset($this->billingInformation);
        } else {
            $this->billingInformation = $billingInformation;
        }
        return $this;
    }
    /**
     * Get customerNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCustomerNumber()
    {
        return isset($this->customerNumber) ? $this->customerNumber : null;
    }
    /**
     * Set customerNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $customerNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setCustomerNumber($customerNumber = null)
    {
        // validation for constraint: string
        if (!is_null($customerNumber) && !is_string($customerNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($customerNumber)), __LINE__);
        }
        if (is_null($customerNumber) || (is_array($customerNumber) && empty($customerNumber))) {
            unset($this->customerNumber);
        } else {
            $this->customerNumber = $customerNumber;
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
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
     * Get numberOfItemStatus value
     * @return int|null
     */
    public function getNumberOfItemStatus()
    {
        return $this->numberOfItemStatus;
    }
    /**
     * Set numberOfItemStatus value
     * @param int $numberOfItemStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setNumberOfItemStatus($numberOfItemStatus = null)
    {
        // validation for constraint: int
        if (!is_null($numberOfItemStatus) && !is_numeric($numberOfItemStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($numberOfItemStatus)), __LINE__);
        }
        $this->numberOfItemStatus = $numberOfItemStatus;
        return $this;
    }
    /**
     * Get orderDate value
     * @return string|null
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }
    /**
     * Set orderDate value
     * @param string $orderDate
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setOrderDate($orderDate = null)
    {
        // validation for constraint: string
        if (!is_null($orderDate) && !is_string($orderDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($orderDate)), __LINE__);
        }
        $this->orderDate = $orderDate;
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
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
     * Get orderStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderStatus()
    {
        return isset($this->orderStatus) ? $this->orderStatus : null;
    }
    /**
     * Set orderStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setOrderStatus($orderStatus = null)
    {
        // validation for constraint: string
        if (!is_null($orderStatus) && !is_string($orderStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($orderStatus)), __LINE__);
        }
        if (is_null($orderStatus) || (is_array($orderStatus) && empty($orderStatus))) {
            unset($this->orderStatus);
        } else {
            $this->orderStatus = $orderStatus;
        }
        return $this;
    }
    /**
     * Get orderStatusDescription value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getOrderStatusDescription()
    {
        return isset($this->orderStatusDescription) ? $this->orderStatusDescription : null;
    }
    /**
     * Set orderStatusDescription value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $orderStatusDescription
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setOrderStatusDescription($orderStatusDescription = null)
    {
        // validation for constraint: string
        if (!is_null($orderStatusDescription) && !is_string($orderStatusDescription)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($orderStatusDescription)), __LINE__);
        }
        if (is_null($orderStatusDescription) || (is_array($orderStatusDescription) && empty($orderStatusDescription))) {
            unset($this->orderStatusDescription);
        } else {
            $this->orderStatusDescription = $orderStatusDescription;
        }
        return $this;
    }
    /**
     * Get shippingInformation value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\LocationWS|null
     */
    public function getShippingInformation()
    {
        return isset($this->shippingInformation) ? $this->shippingInformation : null;
    }
    /**
     * Set shippingInformation value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\StructType\LocationWS $shippingInformation
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
     */
    public function setShippingInformation(\Born\Hibbert\Model\Api\StructType\LocationWS $shippingInformation = null)
    {
        if (is_null($shippingInformation) || (is_array($shippingInformation) && empty($shippingInformation))) {
            unset($this->shippingInformation);
        } else {
            $this->shippingInformation = $shippingInformation;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS
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
