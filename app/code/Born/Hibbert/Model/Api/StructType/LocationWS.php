<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for LocationWS StructType
 * @subpackage Structs
 */
class LocationWS extends AbstractStructBase
{
    /**
     * The address
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public $address;
    /**
     * The contact
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public $contact;
    /**
     * Constructor method for LocationWS
     * @uses LocationWS::setAddress()
     * @uses LocationWS::setContact()
     * @param \Born\Hibbert\Model\Api\StructType\AddressWS $address
     * @param \Born\Hibbert\Model\Api\StructType\PersonWS $contact
     */
    public function __construct(\Born\Hibbert\Model\Api\StructType\AddressWS $address = null, \Born\Hibbert\Model\Api\StructType\PersonWS $contact = null)
    {
        $this
            ->setAddress($address)
            ->setContact($contact);
    }
    /**
     * Get address value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS|null
     */
    public function getAddress()
    {
        return isset($this->address) ? $this->address : null;
    }
    /**
     * Set address value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\StructType\AddressWS $address
     * @return \Born\Hibbert\Model\Api\StructType\LocationWS
     */
    public function setAddress(\Born\Hibbert\Model\Api\StructType\AddressWS $address = null)
    {
        if (is_null($address) || (is_array($address) && empty($address))) {
            unset($this->address);
        } else {
            $this->address = $address;
        }
        return $this;
    }
    /**
     * Get contact value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS|null
     */
    public function getContact()
    {
        return isset($this->contact) ? $this->contact : null;
    }
    /**
     * Set contact value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\StructType\PersonWS $contact
     * @return \Born\Hibbert\Model\Api\StructType\LocationWS
     */
    public function setContact(\Born\Hibbert\Model\Api\StructType\PersonWS $contact = null)
    {
        if (is_null($contact) || (is_array($contact) && empty($contact))) {
            unset($this->contact);
        } else {
            $this->contact = $contact;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\LocationWS
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
