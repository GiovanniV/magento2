<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfOrderLineItemWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfOrderLineItemWS extends AbstractStructArrayBase
{
    /**
     * The OrderLineItemWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\OrderLineItemWS[]
     */
    public $OrderLineItemWS;
    /**
     * Constructor method for ArrayOfOrderLineItemWS
     * @uses ArrayOfOrderLineItemWS::setOrderLineItemWS()
     * @param \Born\Hibbert\Model\Api\StructType\OrderLineItemWS[] $orderLineItemWS
     */
    public function __construct(array $orderLineItemWS = array())
    {
        $this
            ->setOrderLineItemWS($orderLineItemWS);
    }
    /**
     * Get OrderLineItemWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS[]|null
     */
    public function getOrderLineItemWS()
    {
        return isset($this->OrderLineItemWS) ? $this->OrderLineItemWS : null;
    }
    /**
     * Set OrderLineItemWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderLineItemWS[] $orderLineItemWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS
     */
    public function setOrderLineItemWS(array $orderLineItemWS = array())
    {
        foreach ($orderLineItemWS as $arrayOfOrderLineItemWSOrderLineItemWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfOrderLineItemWSOrderLineItemWSItem instanceof \Born\Hibbert\Model\Api\StructType\OrderLineItemWS) {
                throw new \InvalidArgumentException(sprintf('The OrderLineItemWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderLineItemWS, "%s" given', is_object($arrayOfOrderLineItemWSOrderLineItemWSItem) ? get_class($arrayOfOrderLineItemWSOrderLineItemWSItem) : gettype($arrayOfOrderLineItemWSOrderLineItemWSItem)), __LINE__);
            }
        }
        if (is_null($orderLineItemWS) || (is_array($orderLineItemWS) && empty($orderLineItemWS))) {
            unset($this->OrderLineItemWS);
        } else {
            $this->OrderLineItemWS = $orderLineItemWS;
        }
        return $this;
    }
    /**
     * Add item to OrderLineItemWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderLineItemWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS
     */
    public function addToOrderLineItemWS(\Born\Hibbert\Model\Api\StructType\OrderLineItemWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\OrderLineItemWS) {
            throw new \InvalidArgumentException(sprintf('The OrderLineItemWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderLineItemWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->OrderLineItemWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string OrderLineItemWS
     */
    public function getAttributeName()
    {
        return 'OrderLineItemWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemWS
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
