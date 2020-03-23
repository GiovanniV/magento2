<?php

namespace Born\Mkdata\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfLog ArrayType
 * @subpackage Arrays
 */
class ArrayOfLog extends AbstractStructArrayBase
{
    /**
     * The Log
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Mkdata\Model\Api\StructType\Log[]
     */
    public $Log;
    /**
     * Constructor method for ArrayOfLog
     * @uses ArrayOfLog::setLog()
     * @param \Born\Mkdata\Model\Api\StructType\Log[] $log
     */
    public function __construct(array $log = array())
    {
        $this
            ->setLog($log);
    }
    /**
     * Get Log value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Mkdata\Model\Api\StructType\Log[]|null
     */
    public function getLog()
    {
        return isset($this->Log) ? $this->Log : null;
    }
    /**
     * Set Log value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\Log[] $log
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog
     */
    public function setLog(array $log = array())
    {
        foreach ($log as $arrayOfLogLogItem) {
            // validation for constraint: itemType
            if (!$arrayOfLogLogItem instanceof \Born\Mkdata\Model\Api\StructType\Log) {
                throw new \InvalidArgumentException(sprintf('The Log property can only contain items of \Born\Mkdata\Model\Api\StructType\Log, "%s" given', is_object($arrayOfLogLogItem) ? get_class($arrayOfLogLogItem) : gettype($arrayOfLogLogItem)), __LINE__);
            }
        }
        if (is_null($log) || (is_array($log) && empty($log))) {
            unset($this->Log);
        } else {
            $this->Log = $log;
        }
        return $this;
    }
    /**
     * Add item to Log value
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\Log $item
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog
     */
    public function addToLog(\Born\Mkdata\Model\Api\StructType\Log $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Mkdata\Model\Api\StructType\Log) {
            throw new \InvalidArgumentException(sprintf('The Log property can only contain items of \Born\Mkdata\Model\Api\StructType\Log, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->Log[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Mkdata\Model\Api\StructType\Log|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Mkdata\Model\Api\StructType\Log|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Mkdata\Model\Api\StructType\Log|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Mkdata\Model\Api\StructType\Log|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Mkdata\Model\Api\StructType\Log|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string Log
     */
    public function getAttributeName()
    {
        return 'Log';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfLog
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
