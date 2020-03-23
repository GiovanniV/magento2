<?php

namespace Born\Mkdata\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfMatch ArrayType
 * @subpackage Arrays
 */
class ArrayOfMatch extends AbstractStructArrayBase
{
    /**
     * The Match
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Mkdata\Model\Api\StructType\Match[]
     */
    public $Match;
    /**
     * Constructor method for ArrayOfMatch
     * @uses ArrayOfMatch::setMatch()
     * @param \Born\Mkdata\Model\Api\StructType\Match[] $match
     */
    public function __construct(array $match = array())
    {
        $this
            ->setMatch($match);
    }
    /**
     * Get Match value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Mkdata\Model\Api\StructType\Match[]|null
     */
    public function getMatch()
    {
        return isset($this->Match) ? $this->Match : null;
    }
    /**
     * Set Match value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\Match[] $match
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch
     */
    public function setMatch(array $match = array())
    {
        foreach ($match as $arrayOfMatchMatchItem) {
            // validation for constraint: itemType
            if (!$arrayOfMatchMatchItem instanceof \Born\Mkdata\Model\Api\StructType\Match) {
                throw new \InvalidArgumentException(sprintf('The Match property can only contain items of \Born\Mkdata\Model\Api\StructType\Match, "%s" given', is_object($arrayOfMatchMatchItem) ? get_class($arrayOfMatchMatchItem) : gettype($arrayOfMatchMatchItem)), __LINE__);
            }
        }
        if (is_null($match) || (is_array($match) && empty($match))) {
            unset($this->Match);
        } else {
            $this->Match = $match;
        }
        return $this;
    }
    /**
     * Add item to Match value
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\Match $item
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch
     */
    public function addToMatch(\Born\Mkdata\Model\Api\StructType\Match $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Mkdata\Model\Api\StructType\Match) {
            throw new \InvalidArgumentException(sprintf('The Match property can only contain items of \Born\Mkdata\Model\Api\StructType\Match, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->Match[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Mkdata\Model\Api\StructType\Match|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Mkdata\Model\Api\StructType\Match|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Mkdata\Model\Api\StructType\Match|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Mkdata\Model\Api\StructType\Match|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Mkdata\Model\Api\StructType\Match|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string Match
     */
    public function getAttributeName()
    {
        return 'Match';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch
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
