<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for PersonWS StructType
 * @subpackage Structs
 */
class PersonWS extends AbstractStructBase
{
    /**
     * The companyName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $companyName;
    /**
     * The emailAddress
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $emailAddress;
    /**
     * The fax
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $fax;
    /**
     * The firstName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $firstName;
    /**
     * The lastName
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $lastName;
    /**
     * The phone
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $phone;
    /**
     * The prefix
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $prefix;
    /**
     * The suffix
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $suffix;
    /**
     * Constructor method for PersonWS
     * @uses PersonWS::setCompanyName()
     * @uses PersonWS::setEmailAddress()
     * @uses PersonWS::setFax()
     * @uses PersonWS::setFirstName()
     * @uses PersonWS::setLastName()
     * @uses PersonWS::setPhone()
     * @uses PersonWS::setPrefix()
     * @uses PersonWS::setSuffix()
     * @param string $companyName
     * @param string $emailAddress
     * @param string $fax
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param string $prefix
     * @param string $suffix
     */
    public function __construct($companyName = null, $emailAddress = null, $fax = null, $firstName = null, $lastName = null, $phone = null, $prefix = null, $suffix = null)
    {
        $this
            ->setCompanyName($companyName)
            ->setEmailAddress($emailAddress)
            ->setFax($fax)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setPhone($phone)
            ->setPrefix($prefix)
            ->setSuffix($suffix);
    }
    /**
     * Get companyName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getCompanyName()
    {
        return isset($this->companyName) ? $this->companyName : null;
    }
    /**
     * Set companyName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $companyName
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setCompanyName($companyName = null)
    {
        // validation for constraint: string
        if (!is_null($companyName) && !is_string($companyName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($companyName)), __LINE__);
        }
        if (is_null($companyName) || (is_array($companyName) && empty($companyName))) {
            unset($this->companyName);
        } else {
            $this->companyName = $companyName;
        }
        return $this;
    }
    /**
     * Get emailAddress value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getEmailAddress()
    {
        return isset($this->emailAddress) ? $this->emailAddress : null;
    }
    /**
     * Set emailAddress value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $emailAddress
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setEmailAddress($emailAddress = null)
    {
        // validation for constraint: string
        if (!is_null($emailAddress) && !is_string($emailAddress)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($emailAddress)), __LINE__);
        }
        if (is_null($emailAddress) || (is_array($emailAddress) && empty($emailAddress))) {
            unset($this->emailAddress);
        } else {
            $this->emailAddress = $emailAddress;
        }
        return $this;
    }
    /**
     * Get fax value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFax()
    {
        return isset($this->fax) ? $this->fax : null;
    }
    /**
     * Set fax value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $fax
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setFax($fax = null)
    {
        // validation for constraint: string
        if (!is_null($fax) && !is_string($fax)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($fax)), __LINE__);
        }
        if (is_null($fax) || (is_array($fax) && empty($fax))) {
            unset($this->fax);
        } else {
            $this->fax = $fax;
        }
        return $this;
    }
    /**
     * Get firstName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getFirstName()
    {
        return isset($this->firstName) ? $this->firstName : null;
    }
    /**
     * Set firstName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $firstName
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setFirstName($firstName = null)
    {
        // validation for constraint: string
        if (!is_null($firstName) && !is_string($firstName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($firstName)), __LINE__);
        }
        if (is_null($firstName) || (is_array($firstName) && empty($firstName))) {
            unset($this->firstName);
        } else {
            $this->firstName = $firstName;
        }
        return $this;
    }
    /**
     * Get lastName value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getLastName()
    {
        return isset($this->lastName) ? $this->lastName : null;
    }
    /**
     * Set lastName value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $lastName
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setLastName($lastName = null)
    {
        // validation for constraint: string
        if (!is_null($lastName) && !is_string($lastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastName)), __LINE__);
        }
        if (is_null($lastName) || (is_array($lastName) && empty($lastName))) {
            unset($this->lastName);
        } else {
            $this->lastName = $lastName;
        }
        return $this;
    }
    /**
     * Get phone value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPhone()
    {
        return isset($this->phone) ? $this->phone : null;
    }
    /**
     * Set phone value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $phone
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setPhone($phone = null)
    {
        // validation for constraint: string
        if (!is_null($phone) && !is_string($phone)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($phone)), __LINE__);
        }
        if (is_null($phone) || (is_array($phone) && empty($phone))) {
            unset($this->phone);
        } else {
            $this->phone = $phone;
        }
        return $this;
    }
    /**
     * Get prefix value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPrefix()
    {
        return isset($this->prefix) ? $this->prefix : null;
    }
    /**
     * Set prefix value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $prefix
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setPrefix($prefix = null)
    {
        // validation for constraint: string
        if (!is_null($prefix) && !is_string($prefix)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($prefix)), __LINE__);
        }
        if (is_null($prefix) || (is_array($prefix) && empty($prefix))) {
            unset($this->prefix);
        } else {
            $this->prefix = $prefix;
        }
        return $this;
    }
    /**
     * Get suffix value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getSuffix()
    {
        return isset($this->suffix) ? $this->suffix : null;
    }
    /**
     * Set suffix value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $suffix
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
     */
    public function setSuffix($suffix = null)
    {
        // validation for constraint: string
        if (!is_null($suffix) && !is_string($suffix)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($suffix)), __LINE__);
        }
        if (is_null($suffix) || (is_array($suffix) && empty($suffix))) {
            unset($this->suffix);
        } else {
            $this->suffix = $suffix;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\PersonWS
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
