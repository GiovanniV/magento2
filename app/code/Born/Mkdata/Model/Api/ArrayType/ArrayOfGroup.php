<?php

namespace Born\Mkdata\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfGroup ArrayType
 * @subpackage Arrays
 */
class ArrayOfGroup extends AbstractStructArrayBase
{
    /**
     * The Group
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Mkdata\Model\Api\StructType\Group[]
     */
    public $Group;
    /**
     * Constructor method for ArrayOfGroup
     * @uses ArrayOfGroup::setGroup()
     * @param \Born\Mkdata\Model\Api\StructType\Group[] $group
     */
    public function __construct(array $group = array())
    {
        $this
            ->setGroup($group);
    }
    /**
     * Get Group value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Mkdata\Model\Api\StructType\Group[]|null
     */
    public function getGroup()
    {
        return isset($this->Group) ? $this->Group : null;
    }
    /**
     * Set Group value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\Group[] $group
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup
     */
    public function setGroup(array $group = array())
    {
        foreach ($group as $arrayOfGroupGroupItem) {
            // validation for constraint: itemType
            if (!$arrayOfGroupGroupItem instanceof \Born\Mkdata\Model\Api\StructType\Group) {
                throw new \InvalidArgumentException(sprintf('The Group property can only contain items of \Born\Mkdata\Model\Api\StructType\Group, "%s" given', is_object($arrayOfGroupGroupItem) ? get_class($arrayOfGroupGroupItem) : gettype($arrayOfGroupGroupItem)), __LINE__);
            }
        }
        if (is_null($group) || (is_array($group) && empty($group))) {
            unset($this->Group);
        } else {
            $this->Group = $group;
        }
        return $this;
    }
    /**
     * Add item to Group value
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\Group $item
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup
     */
    public function addToGroup(\Born\Mkdata\Model\Api\StructType\Group $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Mkdata\Model\Api\StructType\Group) {
            throw new \InvalidArgumentException(sprintf('The Group property can only contain items of \Born\Mkdata\Model\Api\StructType\Group, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->Group[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Mkdata\Model\Api\StructType\Group|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Mkdata\Model\Api\StructType\Group|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Mkdata\Model\Api\StructType\Group|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Mkdata\Model\Api\StructType\Group|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Mkdata\Model\Api\StructType\Group|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string Group
     */
    public function getAttributeName()
    {
        return 'Group';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup
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
