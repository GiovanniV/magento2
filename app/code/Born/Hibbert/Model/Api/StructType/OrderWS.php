<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderWS StructType
 * @subpackage Structs
 */
class OrderWS extends AbstractStructBase
{
    /**
     * The confirmationRequested
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $confirmationRequested;
    /**
     * The customerReferenceNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $customerReferenceNumber;
    /**
     * The duties
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $duties;
    /**
     * The numberOfLines
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $numberOfLines;
    /**
     * The orderDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $orderDate;
    /**
     * The orderLines
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS
     */
    public $orderLines;
    /**
     * The orderReferenceNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $orderReferenceNumber;
    /**
     * The shipmentMethod
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $shipmentMethod;
    /**
     * The shippingAccountNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $shippingAccountNumber;
    /**
     * The shippingHandling
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $shippingHandling;
    /**
     * The subtotal
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $subtotal;
    /**
     * The tax
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $tax;
    /**
     * The total
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $total;
    /**
     * The wantByDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $wantByDate;
    /**
     * Constructor method for OrderWS
     * @uses OrderWS::setConfirmationRequested()
     * @uses OrderWS::setCustomerReferenceNumber()
     * @uses OrderWS::setDuties()
     * @uses OrderWS::setNumberOfLines()
     * @uses OrderWS::setOrderDate()
     * @uses OrderWS::setOrderLines()
     * @uses OrderWS::setOrderReferenceNumber()
     * @uses OrderWS::setShipmentMethod()
     * @uses OrderWS::setShippingAccountNumber()
     * @uses OrderWS::setShippingHandling()
     * @uses OrderWS::setSubtotal()
     * @uses OrderWS::setTax()
     * @uses OrderWS::setTotal()
     * @uses OrderWS::setWantByDate()
     * @param bool $confirmationRequested
     * @param string $customerReferenceNumber
     * @param string $duties
     * @param int $numberOfLines
     * @param string $orderDate
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS $orderLines
     * @param string $orderReferenceNumber
     * @param string $shipmentMethod
     * @param string $shippingAccountNumber
     * @param float $shippingHandling
     * @param float $subtotal
     * @param float $tax
     * @param float $total
     * @param string $wantByDate
     */
    public function __construct($confirmationRequested = null, $customerReferenceNumber = null, $duties = null, $numberOfLines = null, $orderDate = null, \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS $orderLines = null, $orderReferenceNumber = null, $shipmentMethod = null, $shippingAccountNumber = null, $shippingHandling = null, $subtotal = null, $tax = null, $total = null, $wantByDate = null)
    {
        $this
            ->setConfirmationRequested($confirmationRequested)
            ->setCustomerReferenceNumber($customerReferenceNumber)
            ->setDuties($duties)
            ->setNumberOfLines($numberOfLines)
            ->setOrderDate($orderDate)
            ->setOrderLines($orderLines)
            ->setOrderReferenceNumber($orderReferenceNumber)
            ->setShipmentMethod($shipmentMethod)
            ->setShippingAccountNumber($shippingAccountNumber)
            ->setShippingHandling($shippingHandling)
            ->setSubtotal($subtotal)
            ->setTax($tax)
            ->setTotal($total)
            ->setWantByDate($wantByDate);
    }
    /**
     * Get confirmationRequested value
     * @return bool|null
     */
    public function getConfirmationRequested()
    {
        return $this->confirmationRequested;
    }
    /**
     * Set confirmationRequested value
     * @param bool $confirmationRequested
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setConfirmationRequested($confirmationRequested = null)
    {
        // validation for constraint: boolean
        if (!is_null($confirmationRequested) && !is_bool($confirmationRequested)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($confirmationRequested)), __LINE__);
        }
        $this->confirmationRequested = $confirmationRequested;
        return $this;
    }
    /**
     * Get customerReferenceNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCustomerReferenceNumber()
    {
        return isset($this->customerReferenceNumber) ? $this->customerReferenceNumber : null;
    }
    /**
     * Set customerReferenceNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $customerReferenceNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setCustomerReferenceNumber($customerReferenceNumber = null)
    {
        // validation for constraint: string
        if (!is_null($customerReferenceNumber) && !is_string($customerReferenceNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($customerReferenceNumber)), __LINE__);
        }
        if (is_null($customerReferenceNumber) || (is_array($customerReferenceNumber) && empty($customerReferenceNumber))) {
            unset($this->customerReferenceNumber);
        } else {
            $this->customerReferenceNumber = $customerReferenceNumber;
        }
        return $this;
    }
    /**
     * Get duties value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getDuties()
    {
        return isset($this->duties) ? $this->duties : null;
    }
    /**
     * Set duties value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $duties
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setDuties($duties = null)
    {
        // validation for constraint: string
        if (!is_null($duties) && !is_string($duties)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($duties)), __LINE__);
        }
        if (is_null($duties) || (is_array($duties) && empty($duties))) {
            unset($this->duties);
        } else {
            $this->duties = $duties;
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
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
     * Get orderLines value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS|null
     */
    public function getOrderLines()
    {
        return isset($this->orderLines) ? $this->orderLines : null;
    }
    /**
     * Set orderLines value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS $orderLines
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setOrderLines(\Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS $orderLines = null)
    {
        if (is_null($orderLines) || (is_array($orderLines) && empty($orderLines))) {
            unset($this->orderLines);
        } else {
            $this->orderLines = $orderLines;
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
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
     * Get shipmentMethod value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShipmentMethod()
    {
        return isset($this->shipmentMethod) ? $this->shipmentMethod : null;
    }
    /**
     * Set shipmentMethod value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shipmentMethod
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setShipmentMethod($shipmentMethod = null)
    {
        // validation for constraint: string
        if (!is_null($shipmentMethod) && !is_string($shipmentMethod)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shipmentMethod)), __LINE__);
        }
        if (is_null($shipmentMethod) || (is_array($shipmentMethod) && empty($shipmentMethod))) {
            unset($this->shipmentMethod);
        } else {
            $this->shipmentMethod = $shipmentMethod;
        }
        return $this;
    }
    /**
     * Get shippingAccountNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShippingAccountNumber()
    {
        return isset($this->shippingAccountNumber) ? $this->shippingAccountNumber : null;
    }
    /**
     * Set shippingAccountNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shippingAccountNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setShippingAccountNumber($shippingAccountNumber = null)
    {
        // validation for constraint: string
        if (!is_null($shippingAccountNumber) && !is_string($shippingAccountNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shippingAccountNumber)), __LINE__);
        }
        if (is_null($shippingAccountNumber) || (is_array($shippingAccountNumber) && empty($shippingAccountNumber))) {
            unset($this->shippingAccountNumber);
        } else {
            $this->shippingAccountNumber = $shippingAccountNumber;
        }
        return $this;
    }
    /**
     * Get shippingHandling value
     * @return float|null
     */
    public function getShippingHandling()
    {
        return $this->shippingHandling;
    }
    /**
     * Set shippingHandling value
     * @param float $shippingHandling
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setShippingHandling($shippingHandling = null)
    {
        $this->shippingHandling = $shippingHandling;
        return $this;
    }
    /**
     * Get subtotal value
     * @return float|null
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }
    /**
     * Set subtotal value
     * @param float $subtotal
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setSubtotal($subtotal = null)
    {
        $this->subtotal = $subtotal;
        return $this;
    }
    /**
     * Get tax value
     * @return float|null
     */
    public function getTax()
    {
        return $this->tax;
    }
    /**
     * Set tax value
     * @param float $tax
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setTax($tax = null)
    {
        $this->tax = $tax;
        return $this;
    }
    /**
     * Get total value
     * @return float|null
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * Set total value
     * @param float $total
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setTotal($total = null)
    {
        $this->total = $total;
        return $this;
    }
    /**
     * Get wantByDate value
     * @return string|null
     */
    public function getWantByDate()
    {
        return $this->wantByDate;
    }
    /**
     * Set wantByDate value
     * @param string $wantByDate
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public function setWantByDate($wantByDate = null)
    {
        // validation for constraint: string
        if (!is_null($wantByDate) && !is_string($wantByDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($wantByDate)), __LINE__);
        }
        $this->wantByDate = $wantByDate;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS
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
