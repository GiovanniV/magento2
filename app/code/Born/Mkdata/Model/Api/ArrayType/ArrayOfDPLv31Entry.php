<?php

namespace Born\Mkdata\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfDPLv31Entry ArrayType
 * @subpackage Arrays
 */
class ArrayOfDPLv31Entry extends AbstractStructArrayBase
{
    /**
     * The DPLv31Entry
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Entry[]
     */
    public $DPLv3_1Entry;
    /**
     * Constructor method for ArrayOfDPLv31Entry
     * @uses ArrayOfDPLv31Entry::setDPLv31Entry()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Entry[] $DPLv31Entry
     */
    public function __construct(array $DPLv3_1Entry = array())
    {
        $this
            ->setDPLv31Entry($DPLv3_1Entry);
    }
    /**
     * Get dPLv3Entry value
     * @return dPLv3Entry
     */
    public function getDPLv31Entry()
    {
        return isset($this->DPLv3_1Entry) ? $this->DPLv3_1Entry : null;
    }
    /**
     * Set dPLv3Entry value
     * @param dPLv3Entry $dPLv3Entry
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry
     */
    public function setDPLv31Entry(array $DPLv3_1Entry = array())
    {
        foreach ($DPLv3_1Entry as $arrayOfDPLv31EntryDPLv31EntryItem) {
            // validation for constraint: itemType
            if (!$arrayOfDPLv31EntryDPLv31EntryItem instanceof \Born\Mkdata\Model\Api\StructType\DPLv31Entry) {
                throw new \InvalidArgumentException(sprintf('The DPLv31Entry property can only contain items of \Born\Mkdata\Model\Api\StructType\DPLv31Entry, "%s" given', is_object($arrayOfDPLv31EntryDPLv31EntryItem) ? get_class($arrayOfDPLv31EntryDPLv31EntryItem) : gettype($arrayOfDPLv31EntryDPLv31EntryItem)), __LINE__);
            }
        }
        if (is_null($DPLv3_1Entry) || (is_array($DPLv3_1Entry) && empty($DPLv3_1Entry))) {
            unset($this->DPLv3_1Entry);
        } else {
            $this->DPLv3_1Entry = $DPLv3_1Entry;
        }
        return $this;
    }
    /**
     * Add item to DPLv31Entry value
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Entry $item
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry
     */
    public function addToDPLv31Entry(\Born\Mkdata\Model\Api\StructType\DPLv31Entry $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Mkdata\Model\Api\StructType\DPLv31Entry) {
            throw new \InvalidArgumentException(sprintf('The DPLv31Entry property can only contain items of \Born\Mkdata\Model\Api\StructType\DPLv31Entry, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->DPLv31Entry[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string DPLv31Entry
     */
    public function getAttributeName()
    {
        return 'DPLv31Entry';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry
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
