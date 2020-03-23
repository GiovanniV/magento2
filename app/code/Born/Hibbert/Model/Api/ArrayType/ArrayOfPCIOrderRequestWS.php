<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfPCIOrderRequestWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfPCIOrderRequestWS extends AbstractStructArrayBase
{
    /**
     * The PCIOrderRequestWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS[]
     */
    public $PCIOrderRequestWS;
    /**
     * Constructor method for ArrayOfPCIOrderRequestWS
     * @uses ArrayOfPCIOrderRequestWS::setPCIOrderRequestWS()
     * @param \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS[] $pCIOrderRequestWS
     */
    public function __construct(array $pCIOrderRequestWS = array())
    {
        $this
            ->setPCIOrderRequestWS($pCIOrderRequestWS);
    }
    /**
     * Get PCIOrderRequestWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS[]|null
     */
    public function getPCIOrderRequestWS()
    {
        return isset($this->PCIOrderRequestWS) ? $this->PCIOrderRequestWS : null;
    }
    /**
     * Set PCIOrderRequestWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS[] $pCIOrderRequestWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS
     */
    public function setPCIOrderRequestWS(array $pCIOrderRequestWS = array())
    {
        foreach ($pCIOrderRequestWS as $arrayOfPCIOrderRequestWSPCIOrderRequestWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfPCIOrderRequestWSPCIOrderRequestWSItem instanceof \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS) {
                throw new \InvalidArgumentException(sprintf('The PCIOrderRequestWS property can only contain items of \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS, "%s" given', is_object($arrayOfPCIOrderRequestWSPCIOrderRequestWSItem) ? get_class($arrayOfPCIOrderRequestWSPCIOrderRequestWSItem) : gettype($arrayOfPCIOrderRequestWSPCIOrderRequestWSItem)), __LINE__);
            }
        }
        if (is_null($pCIOrderRequestWS) || (is_array($pCIOrderRequestWS) && empty($pCIOrderRequestWS))) {
            unset($this->PCIOrderRequestWS);
        } else {
            $this->PCIOrderRequestWS = $pCIOrderRequestWS;
        }
        return $this;
    }
    /**
     * Add item to PCIOrderRequestWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS
     */
    public function addToPCIOrderRequestWS(\Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS) {
            throw new \InvalidArgumentException(sprintf('The PCIOrderRequestWS property can only contain items of \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->PCIOrderRequestWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string PCIOrderRequestWS
     */
    public function getAttributeName()
    {
        return 'PCIOrderRequestWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS
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
