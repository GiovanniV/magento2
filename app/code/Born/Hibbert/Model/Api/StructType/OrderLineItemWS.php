<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderLineItemWS StructType
 * @subpackage Structs
 */
class OrderLineItemWS extends AbstractStructBase
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
     * The partNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $partNumber;
    /**
     * The quantityOrdered
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $quantityOrdered;
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
     * Constructor method for OrderLineItemWS
     * @uses OrderLineItemWS::setItemPrice()
     * @uses OrderLineItemWS::setLineNumber()
     * @uses OrderLineItemWS::setPartNumber()
     * @uses OrderLineItemWS::setQuantityOrdered()
     * @uses OrderLineItemWS::setSubtotal()
     * @uses OrderLineItemWS::setTax()
     * @uses OrderLineItemWS::setTotal()
     * @param float $itemPrice
     * @param int $lineNumber
     * @param string $partNumber
     * @param int $quantityOrdered
     * @param float $subtotal
     * @param float $tax
     * @param float $total
     */
    public function __construct($itemPrice = null, $lineNumber = null, $partNumber = null, $quantityOrdered = null, $subtotal = null, $tax = null, $total = null)
    {
        $this
            ->setItemPrice($itemPrice)
            ->setLineNumber($lineNumber)
            ->setPartNumber($partNumber)
            ->setQuantityOrdered($quantityOrdered)
            ->setSubtotal($subtotal)
            ->setTax($tax)
            ->setTotal($total);
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
     */
    public function setTotal($total = null)
    {
        $this->total = $total;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS
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
