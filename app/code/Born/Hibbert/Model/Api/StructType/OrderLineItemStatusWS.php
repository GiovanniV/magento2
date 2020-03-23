<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderLineItemStatusWS StructType
 * @subpackage Structs
 */
class OrderLineItemStatusWS extends AbstractStructBase
{
    /**
     * The itemPrice
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $itemPrice;
    /**
     * The lineNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $lineNumber;
    /**
     * The lineStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $lineStatus;
    /**
     * The partNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $partNumber;
    /**
     * The quantityBackordered
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $quantityBackordered;
    /**
     * The quantityOrdered
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $quantityOrdered;
    /**
     * The quantityShipped
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $quantityShipped;
    /**
     * The shipDate
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $shipDate;
    /**
     * The shipMethod
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $shipMethod;
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
     * The trackingNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $trackingNumber;
    /**
     * Constructor method for OrderLineItemStatusWS
     * @uses OrderLineItemStatusWS::setItemPrice()
     * @uses OrderLineItemStatusWS::setLineNumber()
     * @uses OrderLineItemStatusWS::setLineStatus()
     * @uses OrderLineItemStatusWS::setPartNumber()
     * @uses OrderLineItemStatusWS::setQuantityBackordered()
     * @uses OrderLineItemStatusWS::setQuantityOrdered()
     * @uses OrderLineItemStatusWS::setQuantityShipped()
     * @uses OrderLineItemStatusWS::setShipDate()
     * @uses OrderLineItemStatusWS::setShipMethod()
     * @uses OrderLineItemStatusWS::setSubtotal()
     * @uses OrderLineItemStatusWS::setTax()
     * @uses OrderLineItemStatusWS::setTotal()
     * @uses OrderLineItemStatusWS::setTrackingNumber()
     * @param float $itemPrice
     * @param int $lineNumber
     * @param string $lineStatus
     * @param string $partNumber
     * @param int $quantityBackordered
     * @param int $quantityOrdered
     * @param int $quantityShipped
     * @param string $shipDate
     * @param string $shipMethod
     * @param float $subtotal
     * @param float $tax
     * @param float $total
     * @param string $trackingNumber
     */
    public function __construct($itemPrice = null, $lineNumber = null, $lineStatus = null, $partNumber = null, $quantityBackordered = null, $quantityOrdered = null, $quantityShipped = null, $shipDate = null, $shipMethod = null, $subtotal = null, $tax = null, $total = null, $trackingNumber = null)
    {
        $this
            ->setItemPrice($itemPrice)
            ->setLineNumber($lineNumber)
            ->setLineStatus($lineStatus)
            ->setPartNumber($partNumber)
            ->setQuantityBackordered($quantityBackordered)
            ->setQuantityOrdered($quantityOrdered)
            ->setQuantityShipped($quantityShipped)
            ->setShipDate($shipDate)
            ->setShipMethod($shipMethod)
            ->setSubtotal($subtotal)
            ->setTax($tax)
            ->setTotal($total)
            ->setTrackingNumber($trackingNumber);
    }
    /**
     * Get itemPrice value
     * @return float|null
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }
    /**
     * Set itemPrice value
     * @param float $itemPrice
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setItemPrice($itemPrice = null)
    {
        $this->itemPrice = $itemPrice;
        return $this;
    }
    /**
     * Get lineNumber value
     * @return int|null
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }
    /**
     * Set lineNumber value
     * @param int $lineNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setLineNumber($lineNumber = null)
    {
        // validation for constraint: int
        if (!is_null($lineNumber) && !is_numeric($lineNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($lineNumber)), __LINE__);
        }
        $this->lineNumber = $lineNumber;
        return $this;
    }
    /**
     * Get lineStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLineStatus()
    {
        return isset($this->lineStatus) ? $this->lineStatus : null;
    }
    /**
     * Set lineStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $lineStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setLineStatus($lineStatus = null)
    {
        // validation for constraint: string
        if (!is_null($lineStatus) && !is_string($lineStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lineStatus)), __LINE__);
        }
        if (is_null($lineStatus) || (is_array($lineStatus) && empty($lineStatus))) {
            unset($this->lineStatus);
        } else {
            $this->lineStatus = $lineStatus;
        }
        return $this;
    }
    /**
     * Get partNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPartNumber()
    {
        return isset($this->partNumber) ? $this->partNumber : null;
    }
    /**
     * Set partNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $partNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setPartNumber($partNumber = null)
    {
        // validation for constraint: string
        if (!is_null($partNumber) && !is_string($partNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($partNumber)), __LINE__);
        }
        if (is_null($partNumber) || (is_array($partNumber) && empty($partNumber))) {
            unset($this->partNumber);
        } else {
            $this->partNumber = $partNumber;
        }
        return $this;
    }
    /**
     * Get quantityBackordered value
     * @return int|null
     */
    public function getQuantityBackordered()
    {
        return $this->quantityBackordered;
    }
    /**
     * Set quantityBackordered value
     * @param int $quantityBackordered
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setQuantityBackordered($quantityBackordered = null)
    {
        // validation for constraint: int
        if (!is_null($quantityBackordered) && !is_numeric($quantityBackordered)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($quantityBackordered)), __LINE__);
        }
        $this->quantityBackordered = $quantityBackordered;
        return $this;
    }
    /**
     * Get quantityOrdered value
     * @return int|null
     */
    public function getQuantityOrdered()
    {
        return $this->quantityOrdered;
    }
    /**
     * Set quantityOrdered value
     * @param int $quantityOrdered
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setQuantityOrdered($quantityOrdered = null)
    {
        // validation for constraint: int
        if (!is_null($quantityOrdered) && !is_numeric($quantityOrdered)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($quantityOrdered)), __LINE__);
        }
        $this->quantityOrdered = $quantityOrdered;
        return $this;
    }
    /**
     * Get quantityShipped value
     * @return int|null
     */
    public function getQuantityShipped()
    {
        return $this->quantityShipped;
    }
    /**
     * Set quantityShipped value
     * @param int $quantityShipped
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setQuantityShipped($quantityShipped = null)
    {
        // validation for constraint: int
        if (!is_null($quantityShipped) && !is_numeric($quantityShipped)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($quantityShipped)), __LINE__);
        }
        $this->quantityShipped = $quantityShipped;
        return $this;
    }
    /**
     * Get shipDate value
     * @return string|null
     */
    public function getShipDate()
    {
        return $this->shipDate;
    }
    /**
     * Set shipDate value
     * @param string $shipDate
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setShipDate($shipDate = null)
    {
        // validation for constraint: string
        if (!is_null($shipDate) && !is_string($shipDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shipDate)), __LINE__);
        }
        $this->shipDate = $shipDate;
        return $this;
    }
    /**
     * Get shipMethod value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getShipMethod()
    {
        return isset($this->shipMethod) ? $this->shipMethod : null;
    }
    /**
     * Set shipMethod value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $shipMethod
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setShipMethod($shipMethod = null)
    {
        // validation for constraint: string
        if (!is_null($shipMethod) && !is_string($shipMethod)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($shipMethod)), __LINE__);
        }
        if (is_null($shipMethod) || (is_array($shipMethod) && empty($shipMethod))) {
            unset($this->shipMethod);
        } else {
            $this->shipMethod = $shipMethod;
        }
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setTotal($total = null)
    {
        $this->total = $total;
        return $this;
    }
    /**
     * Get trackingNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getTrackingNumber()
    {
        return isset($this->trackingNumber) ? $this->trackingNumber : null;
    }
    /**
     * Set trackingNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $trackingNumber
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
     */
    public function setTrackingNumber($trackingNumber = null)
    {
        // validation for constraint: string
        if (!is_null($trackingNumber) && !is_string($trackingNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($trackingNumber)), __LINE__);
        }
        if (is_null($trackingNumber) || (is_array($trackingNumber) && empty($trackingNumber))) {
            unset($this->trackingNumber);
        } else {
            $this->trackingNumber = $trackingNumber;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS
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
