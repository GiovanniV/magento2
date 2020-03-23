<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfInventoryWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfInventoryWS extends AbstractStructArrayBase
{
    /**
     * The InventoryWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\InventoryWS[]
     */
    public $InventoryWS;
    /**
     * Constructor method for ArrayOfInventoryWS
     * @uses ArrayOfInventoryWS::setInventoryWS()
     * @param \Born\Hibbert\Model\Api\StructType\InventoryWS[] $inventoryWS
     */
    public function __construct(array $inventoryWS = array())
    {
        $this
            ->setInventoryWS($inventoryWS);
    }
    /**
     * Get InventoryWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS[]|null
     */
    public function getInventoryWS()
    {
        return isset($this->InventoryWS) ? $this->InventoryWS : null;
    }
    /**
     * Set InventoryWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\InventoryWS[] $inventoryWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS
     */
    public function setInventoryWS(array $inventoryWS = array())
    {
        foreach ($inventoryWS as $arrayOfInventoryWSInventoryWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfInventoryWSInventoryWSItem instanceof \Born\Hibbert\Model\Api\StructType\InventoryWS) {
                throw new \InvalidArgumentException(sprintf('The InventoryWS property can only contain items of \Born\Hibbert\Model\Api\StructType\InventoryWS, "%s" given', is_object($arrayOfInventoryWSInventoryWSItem) ? get_class($arrayOfInventoryWSInventoryWSItem) : gettype($arrayOfInventoryWSInventoryWSItem)), __LINE__);
            }
        }
        if (is_null($inventoryWS) || (is_array($inventoryWS) && empty($inventoryWS))) {
            unset($this->InventoryWS);
        } else {
            $this->InventoryWS = $inventoryWS;
        }
        return $this;
    }
    /**
     * Add item to InventoryWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\InventoryWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS
     */
    public function addToInventoryWS(\Born\Hibbert\Model\Api\StructType\InventoryWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\InventoryWS) {
            throw new \InvalidArgumentException(sprintf('The InventoryWS property can only contain items of \Born\Hibbert\Model\Api\StructType\InventoryWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->InventoryWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string InventoryWS
     */
    public function getAttributeName()
    {
        return 'InventoryWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS
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
