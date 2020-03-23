<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfOrderResponseWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfOrderResponseWS extends AbstractStructArrayBase
{
    /**
     * The OrderResponseWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\OrderResponseWS[]
     */
    public $OrderResponseWS;
    /**
     * Constructor method for ArrayOfOrderResponseWS
     * @uses ArrayOfOrderResponseWS::setOrderResponseWS()
     * @param \Born\Hibbert\Model\Api\StructType\OrderResponseWS[] $orderResponseWS
     */
    public function __construct(array $orderResponseWS = array())
    {
        $this
            ->setOrderResponseWS($orderResponseWS);
    }
    /**
     * Get OrderResponseWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS[]|null
     */
    public function getOrderResponseWS()
    {
        return isset($this->OrderResponseWS) ? $this->OrderResponseWS : null;
    }
    /**
     * Set OrderResponseWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderResponseWS[] $orderResponseWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS
     */
    public function setOrderResponseWS(array $orderResponseWS = array())
    {
        foreach ($orderResponseWS as $arrayOfOrderResponseWSOrderResponseWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfOrderResponseWSOrderResponseWSItem instanceof \Born\Hibbert\Model\Api\StructType\OrderResponseWS) {
                throw new \InvalidArgumentException(sprintf('The OrderResponseWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderResponseWS, "%s" given', is_object($arrayOfOrderResponseWSOrderResponseWSItem) ? get_class($arrayOfOrderResponseWSOrderResponseWSItem) : gettype($arrayOfOrderResponseWSOrderResponseWSItem)), __LINE__);
            }
        }
        if (is_null($orderResponseWS) || (is_array($orderResponseWS) && empty($orderResponseWS))) {
            unset($this->OrderResponseWS);
        } else {
            $this->OrderResponseWS = $orderResponseWS;
        }
        return $this;
    }
    /**
     * Add item to OrderResponseWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderResponseWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS
     */
    public function addToOrderResponseWS(\Born\Hibbert\Model\Api\StructType\OrderResponseWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\OrderResponseWS) {
            throw new \InvalidArgumentException(sprintf('The OrderResponseWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderResponseWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->OrderResponseWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\OrderResponseWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string OrderResponseWS
     */
    public function getAttributeName()
    {
        return 'OrderResponseWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS
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
