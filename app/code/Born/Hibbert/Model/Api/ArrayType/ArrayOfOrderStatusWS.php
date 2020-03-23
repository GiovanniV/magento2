<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfOrderStatusWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfOrderStatusWS extends AbstractStructArrayBase
{
    /**
     * The OrderStatusWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\OrderStatusWS[]
     */
    public $OrderStatusWS;
    /**
     * Constructor method for ArrayOfOrderStatusWS
     * @uses ArrayOfOrderStatusWS::setOrderStatusWS()
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusWS[] $orderStatusWS
     */
    public function __construct(array $orderStatusWS = array())
    {
        $this
            ->setOrderStatusWS($orderStatusWS);
    }
    /**
     * Get OrderStatusWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS[]|null
     */
    public function getOrderStatusWS()
    {
        return isset($this->OrderStatusWS) ? $this->OrderStatusWS : null;
    }
    /**
     * Set OrderStatusWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusWS[] $orderStatusWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS
     */
    public function setOrderStatusWS(array $orderStatusWS = array())
    {
        foreach ($orderStatusWS as $arrayOfOrderStatusWSOrderStatusWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfOrderStatusWSOrderStatusWSItem instanceof \Born\Hibbert\Model\Api\StructType\OrderStatusWS) {
                throw new \InvalidArgumentException(sprintf('The OrderStatusWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderStatusWS, "%s" given', is_object($arrayOfOrderStatusWSOrderStatusWSItem) ? get_class($arrayOfOrderStatusWSOrderStatusWSItem) : gettype($arrayOfOrderStatusWSOrderStatusWSItem)), __LINE__);
            }
        }
        if (is_null($orderStatusWS) || (is_array($orderStatusWS) && empty($orderStatusWS))) {
            unset($this->OrderStatusWS);
        } else {
            $this->OrderStatusWS = $orderStatusWS;
        }
        return $this;
    }
    /**
     * Add item to OrderStatusWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS
     */
    public function addToOrderStatusWS(\Born\Hibbert\Model\Api\StructType\OrderStatusWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\OrderStatusWS) {
            throw new \InvalidArgumentException(sprintf('The OrderStatusWS property can only contain items of \Born\Hibbert\Model\Api\StructType\OrderStatusWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->OrderStatusWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string OrderStatusWS
     */
    public function getAttributeName()
    {
        return 'OrderStatusWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderStatusWS
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
