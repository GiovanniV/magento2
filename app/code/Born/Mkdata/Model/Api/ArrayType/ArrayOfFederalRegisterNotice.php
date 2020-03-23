<?php

namespace Born\Mkdata\Model\Api\ArrayType;

use \WsdlToPhp\PackageBase\AbstractStructArrayBase;

/**
 * This class stands for ArrayOfFederalRegisterNotice ArrayType
 * @subpackage Arrays
 */
class ArrayOfFederalRegisterNotice extends AbstractStructArrayBase
{
    /**
     * The FederalRegisterNotice
     * Meta informations extracted from the WSDL
     * - maxOccurs: unbounded
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice[]
     */
    public $FederalRegisterNotice;
    /**
     * Constructor method for ArrayOfFederalRegisterNotice
     * @uses ArrayOfFederalRegisterNotice::setFederalRegisterNotice()
     * @param \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice[] $federalRegisterNotice
     */
    public function __construct(array $federalRegisterNotice = array())
    {
        $this
            ->setFederalRegisterNotice($federalRegisterNotice);
    }
    /**
     * Get FederalRegisterNotice value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice[]|null
     */
    public function getFederalRegisterNotice()
    {
        return isset($this->FederalRegisterNotice) ? $this->FederalRegisterNotice : null;
    }
    /**
     * Set FederalRegisterNotice value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice[] $federalRegisterNotice
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice
     */
    public function setFederalRegisterNotice(array $federalRegisterNotice = array())
    {
        foreach ($federalRegisterNotice as $arrayOfFederalRegisterNoticeFederalRegisterNoticeItem) {
            // validation for constraint: itemType
            if (!$arrayOfFederalRegisterNoticeFederalRegisterNoticeItem instanceof \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice) {
                throw new \InvalidArgumentException(sprintf('The FederalRegisterNotice property can only contain items of \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice, "%s" given', is_object($arrayOfFederalRegisterNoticeFederalRegisterNoticeItem) ? get_class($arrayOfFederalRegisterNoticeFederalRegisterNoticeItem) : gettype($arrayOfFederalRegisterNoticeFederalRegisterNoticeItem)), __LINE__);
            }
        }
        if (is_null($federalRegisterNotice) || (is_array($federalRegisterNotice) && empty($federalRegisterNotice))) {
            unset($this->FederalRegisterNotice);
        } else {
            $this->FederalRegisterNotice = $federalRegisterNotice;
        }
        return $this;
    }
    /**
     * Add item to FederalRegisterNotice value
     * @throws \InvalidArgumentException
     * @param \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice $item
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice
     */
    public function addToFederalRegisterNotice(\Born\Mkdata\Model\Api\StructType\FederalRegisterNotice $item)
    {
        // validation for constraint: itemType
        if (!$item instanceof \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice) {
            throw new \InvalidArgumentException(sprintf('The FederalRegisterNotice property can only contain items of \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice, "%s" given', is_object($item) ? get_class($item) : gettype($item)), __LINE__);
        }
        $this->FederalRegisterNotice[] = $item;
        return $this;
    }
    /**
     * Returns the current element
     * @see AbstractStructArrayBase::current()
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice|null
     */
    public function current()
    {
        return parent::current();
    }
    /**
     * Returns the indexed element
     * @see AbstractStructArrayBase::item()
     * @param int $index
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice|null
     */
    public function item($index)
    {
        return parent::item($index);
    }
    /**
     * Returns the first element
     * @see AbstractStructArrayBase::first()
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice|null
     */
    public function first()
    {
        return parent::first();
    }
    /**
     * Returns the last element
     * @see AbstractStructArrayBase::last()
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice|null
     */
    public function last()
    {
        return parent::last();
    }
    /**
     * Returns the element at the offset
     * @see AbstractStructArrayBase::offsetGet()
     * @param int $offset
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice|null
     */
    public function offsetGet($offset)
    {
        return parent::offsetGet($offset);
    }
    /**
     * Returns the attribute name
     * @see AbstractStructArrayBase::getAttributeName()
     * @return string FederalRegisterNotice
     */
    public function getAttributeName()
    {
        return 'FederalRegisterNotice';
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructArrayBase::__set_state()
     * @uses AbstractStructArrayBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice
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
