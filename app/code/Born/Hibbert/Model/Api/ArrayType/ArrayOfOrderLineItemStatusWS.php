<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfOrderLineItemStatusWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfOrderLineItemStatusWS extends AbstractStructArrayBase
{
    /**
     * The OrderLineItemStatusWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS[]
     */
    public $OrderLineItemStatusWS;
    /**
     * Constructor method for ArrayOfOrderLineItemStatusWS
     * @uses ArrayOfOrderLineItemStatusWS::setOrderLineItemStatusWS()
     * @param \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS[] $orderLineItemStatusWS
     */
    public function __construct(array $orderLineItemStatusWS = array())
    {
        $this
            ->setOrderLineItemStatusWS($orderLineItemStatusWS);
    }
    /**
     * Get OrderLineItemStatusWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS[]|null
     */
    public function getOrderLineItemStatusWS()
    {
        return isset($this->OrderLineItemStatusWS) ? $this->OrderLineItemStatusWS : null;
    }
    /**
     * Set OrderLineItemStatusWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS[] $orderLineItemStatusWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS
     */
    public function setOrderLineItemStatusWS(array $orderLineItemStatusWS = array())
    {
        foreach ($orderLineItemStatusWS as $arrayOfOrderLineItemStatusWSOrderLineItemStatusWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfOrderLineItemStatusWSOrderLineItemStatusWSItem instanceof \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS) {
                throw new \InvalidArgumentException(sprintf('The OrderLineItemStatusWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS, "%s" given', is_object($arrayOfOrderLineItemStatusWSOrderLineItemStatusWSItem) ? get_class($arrayOfOrderLineItemStatusWSOrderLineItemStatusWSItem) : gettype($arrayOfOrderLineItemStatusWSOrderLineItemStatusWSItem)), __LINE__);
            }
        }
        if (is_null($orderLineItemStatusWS) || (is_array($orderLineItemStatusWS) && empty($orderLineItemStatusWS))) {
            unset($this->OrderLineItemStatusWS);
        } else {
            $this->OrderLineItemStatusWS = $orderLineItemStatusWS;
        }
        return $this;
    }
    /**
     * Add item to OrderLineItemStatusWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS
     */
    public function addToOrderLineItemStatusWS(\Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS) {
            throw new \InvalidArgumentException(sprintf('The OrderLineItemStatusWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->OrderLineItemStatusWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\OrderLineItemStatusWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string OrderLineItemStatusWS
     */
    public function getAttributeName()
    {
        return 'OrderLineItemStatusWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderLineItemStatusWS
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
