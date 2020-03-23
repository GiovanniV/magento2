<?php

namespace Born\Hibbert\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfErrorCodeWS ArrayType
 * @subpackage Arrays
 */
class ArrayOfErrorCodeWS extends AbstractStructArrayBase
{
    /**
     * The ErrorCodeWS
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\ErrorCodeWS[]
     */
    public $ErrorCodeWS;
    /**
     * Constructor method for ArrayOfErrorCodeWS
     * @uses ArrayOfErrorCodeWS::setErrorCodeWS()
     * @param \Born\Hibbert\Model\Api\StructType\ErrorCodeWS[] $errorCodeWS
     */
    public function __construct(array $errorCodeWS = array())
    {
        $this
            ->setErrorCodeWS($errorCodeWS);
    }
    /**
     * Get ErrorCodeWS value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS[]|null
     */
    public function getErrorCodeWS()
    {
        return isset($this->ErrorCodeWS) ? $this->ErrorCodeWS : null;
    }
    /**
     * Set ErrorCodeWS value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\ErrorCodeWS[] $errorCodeWS
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS
     */
    public function setErrorCodeWS(array $errorCodeWS = array())
    {
        foreach ($errorCodeWS as $arrayOfErrorCodeWSErrorCodeWSItem) {
            // validation for constraint: itemType
            if (!$arrayOfErrorCodeWSErrorCodeWSItem instanceof \Born\Hibbert\Model\Api\StructType\ErrorCodeWS) {
                throw new \InvalidArgumentException(sprintf('The ErrorCodeWS property can only contain items of \Born\Hibbert\Model\Api\StructType\ErrorCodeWS, "%s" given', is_object($arrayOfErrorCodeWSErrorCodeWSItem) ? get_class($arrayOfErrorCodeWSErrorCodeWSItem) : gettype($arrayOfErrorCodeWSErrorCodeWSItem)), __LINE__);
            }
        }
        if (is_null($errorCodeWS) || (is_array($errorCodeWS) && empty($errorCodeWS))) {
            unset($this->ErrorCodeWS);
        } else {
            $this->ErrorCodeWS = $errorCodeWS;
        }
        return $this;
    }
    /**
     * Add item to ErrorCodeWS value
     * @throws \InvalidArgumentException
     * @param \Born\Hibbert\Model\Api\StructType\ErrorCodeWS $item
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS
     */
    public function addToErrorCodeWS(\Born\Hibbert\Model\Api\StructType\ErrorCodeWS $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Hibbert\Model\Api\StructType\ErrorCodeWS) {
            throw new \InvalidArgumentException(sprintf('The ErrorCodeWS property can only contain items of \Born\Hibbert\Model\Api\StructType\ErrorCodeWS, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->ErrorCodeWS[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Hibbert\Model\Api\StructType\ErrorCodeWS|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string ErrorCodeWS
     */
    public function getAttributeName()
    {
        return 'ErrorCodeWS';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS
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
