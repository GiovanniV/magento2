<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddressWS StructType
 * @subpackage Structs
 */
class AddressWS extends AbstractStructBase
{
    /**
     * The city
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $city;
    /**
     * The country
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $country;
    /**
     * The line1
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $line1;
    /**
     * The line2
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $line2;
    /**
     * The postalCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $postalCode;
    /**
     * The state
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $state;
    /**
     * Constructor method for AddressWS
     * @uses AddressWS::setCity()
     * @uses AddressWS::setCountry()
     * @uses AddressWS::setLine1()
     * @uses AddressWS::setLine2()
     * @uses AddressWS::setPostalCode()
     * @uses AddressWS::setState()
     * @param string $city
     * @param string $country
     * @param string $line1
     * @param string $line2
     * @param string $postalCode
     * @param string $state
     */
    public function __construct($city = null, $country = null, $line1 = null, $line2 = null, $postalCode = null, $state = null)
    {
        $this
            ->setCity($city)
            ->setCountry($country)
            ->setLine1($line1)
            ->setLine2($line2)
            ->setPostalCode($postalCode)
            ->setState($state);
    }
    /**
     * Get city value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCity()
    {
        return isset($this->city) ? $this->city : null;
    }
    /**
     * Set city value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $city
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public function setCity($city = null)
    {
        // validation for constraint: string
        if (!is_null($city) && !is_string($city)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($city)), __LINE__);
        }
        if (is_null($city) || (is_array($city) && empty($city))) {
            unset($this->city);
        } else {
            $this->city = $city;
        }
        return $this;
    }
    /**
     * Get country value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCountry()
    {
        return isset($this->country) ? $this->country : null;
    }
    /**
     * Set country value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $country
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public function setCountry($country = null)
    {
        // validation for constraint: string
        if (!is_null($country) && !is_string($country)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($country)), __LINE__);
        }
        if (is_null($country) || (is_array($country) && empty($country))) {
            unset($this->country);
        } else {
            $this->country = $country;
        }
        return $this;
    }
    /**
     * Get line1 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLine1()
    {
        return isset($this->line1) ? $this->line1 : null;
    }
    /**
     * Set line1 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $line1
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public function setLine1($line1 = null)
    {
        // validation for constraint: string
        if (!is_null($line1) && !is_string($line1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($line1)), __LINE__);
        }
        if (is_null($line1) || (is_array($line1) && empty($line1))) {
            unset($this->line1);
        } else {
            $this->line1 = $line1;
        }
        return $this;
    }
    /**
     * Get line2 value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLine2()
    {
        return isset($this->line2) ? $this->line2 : null;
    }
    /**
     * Set line2 value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $line2
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public function setLine2($line2 = null)
    {
        // validation for constraint: string
        if (!is_null($line2) && !is_string($line2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($line2)), __LINE__);
        }
        if (is_null($line2) || (is_array($line2) && empty($line2))) {
            unset($this->line2);
        } else {
            $this->line2 = $line2;
        }
        return $this;
    }
    /**
     * Get postalCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPostalCode()
    {
        return isset($this->postalCode) ? $this->postalCode : null;
    }
    /**
     * Set postalCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $postalCode
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public function setPostalCode($postalCode = null)
    {
        // validation for constraint: string
        if (!is_null($postalCode) && !is_string($postalCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($postalCode)), __LINE__);
        }
        if (is_null($postalCode) || (is_array($postalCode) && empty($postalCode))) {
            unset($this->postalCode);
        } else {
            $this->postalCode = $postalCode;
        }
        return $this;
    }
    /**
     * Get state value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getState()
    {
        return isset($this->state) ? $this->state : null;
    }
    /**
     * Set state value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $state
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
     */
    public function setState($state = null)
    {
        // validation for constraint: string
        if (!is_null($state) && !is_string($state)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($state)), __LINE__);
        }
        if (is_null($state) || (is_array($state) && empty($state))) {
            unset($this->state);
        } else {
            $this->state = $state;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\AddressWS
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
