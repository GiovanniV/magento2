<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DynamicScreeningEntity StructType
 * @subpackage Structs
 */
class DynamicScreeningEntity extends AbstractStructBase
{
    /**
     * The DynamicScreeningEntityID
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $DynamicScreeningEntityID;
    /**
     * The DynamicScreeningListID
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var int
     */
    public $DynamicScreeningListID;
    /**
     * The CreatedByUserID
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var int
     */
    public $CreatedByUserID;
    /**
     * The EntryDate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var string
     */
    public $EntryDate;
    /**
     * The LastUpdate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var string
     */
    public $LastUpdate;
    /**
     * The DelistDate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var string
     */
    public $DelistDate;
    /**
     * The ClientID
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var int
     */
    public $ClientID;
    /**
     * The Name
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Name;
    /**
     * The Street1
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Street1;
    /**
     * The Street2
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Street2;
    /**
     * The City
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $City;
    /**
     * The Region
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Region;
    /**
     * The Country
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Country;
    /**
     * The Code
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Code;
    /**
     * The Notes
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Notes;
    /**
     * Constructor method for DynamicScreeningEntity
     * @uses DynamicScreeningEntity::setDynamicScreeningEntityID()
     * @uses DynamicScreeningEntity::setDynamicScreeningListID()
     * @uses DynamicScreeningEntity::setCreatedByUserID()
     * @uses DynamicScreeningEntity::setEntryDate()
     * @uses DynamicScreeningEntity::setLastUpdate()
     * @uses DynamicScreeningEntity::setDelistDate()
     * @uses DynamicScreeningEntity::setClientID()
     * @uses DynamicScreeningEntity::setName()
     * @uses DynamicScreeningEntity::setStreet1()
     * @uses DynamicScreeningEntity::setStreet2()
     * @uses DynamicScreeningEntity::setCity()
     * @uses DynamicScreeningEntity::setRegion()
     * @uses DynamicScreeningEntity::setCountry()
     * @uses DynamicScreeningEntity::setCode()
     * @uses DynamicScreeningEntity::setNotes()
     * @param int $dynamicScreeningEntityID
     * @param int $dynamicScreeningListID
     * @param int $createdByUserID
     * @param string $entryDate
     * @param string $lastUpdate
     * @param string $delistDate
     * @param int $clientID
     * @param string $name
     * @param string $street1
     * @param string $street2
     * @param string $city
     * @param string $region
     * @param string $country
     * @param string $code
     * @param string $notes
     */
    public function __construct($dynamicScreeningEntityID = null, $dynamicScreeningListID = null, $createdByUserID = null, $entryDate = null, $lastUpdate = null, $delistDate = null, $clientID = null, $name = null, $street1 = null, $street2 = null, $city = null, $region = null, $country = null, $code = null, $notes = null)
    {
        $this
            ->setDynamicScreeningEntityID($dynamicScreeningEntityID)
            ->setDynamicScreeningListID($dynamicScreeningListID)
            ->setCreatedByUserID($createdByUserID)
            ->setEntryDate($entryDate)
            ->setLastUpdate($lastUpdate)
            ->setDelistDate($delistDate)
            ->setClientID($clientID)
            ->setName($name)
            ->setStreet1($street1)
            ->setStreet2($street2)
            ->setCity($city)
            ->setRegion($region)
            ->setCountry($country)
            ->setCode($code)
            ->setNotes($notes);
    }
    /**
     * Get DynamicScreeningEntityID value
     * @return int
     */
    public function getDynamicScreeningEntityID()
    {
        return $this->DynamicScreeningEntityID;
    }
    /**
     * Set DynamicScreeningEntityID value
     * @param int $dynamicScreeningEntityID
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setDynamicScreeningEntityID($dynamicScreeningEntityID = null)
    {
        // validation for constraint: int
        if (!is_null($dynamicScreeningEntityID) && !is_numeric($dynamicScreeningEntityID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($dynamicScreeningEntityID)), __LINE__);
        }
        $this->DynamicScreeningEntityID = $dynamicScreeningEntityID;
        return $this;
    }
    /**
     * Get DynamicScreeningListID value
     * @return int
     */
    public function getDynamicScreeningListID()
    {
        return $this->DynamicScreeningListID;
    }
    /**
     * Set DynamicScreeningListID value
     * @param int $dynamicScreeningListID
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setDynamicScreeningListID($dynamicScreeningListID = null)
    {
        // validation for constraint: int
        if (!is_null($dynamicScreeningListID) && !is_numeric($dynamicScreeningListID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($dynamicScreeningListID)), __LINE__);
        }
        $this->DynamicScreeningListID = $dynamicScreeningListID;
        return $this;
    }
    /**
     * Get CreatedByUserID value
     * @return int
     */
    public function getCreatedByUserID()
    {
        return $this->CreatedByUserID;
    }
    /**
     * Set CreatedByUserID value
     * @param int $createdByUserID
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setCreatedByUserID($createdByUserID = null)
    {
        // validation for constraint: int
        if (!is_null($createdByUserID) && !is_numeric($createdByUserID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($createdByUserID)), __LINE__);
        }
        $this->CreatedByUserID = $createdByUserID;
        return $this;
    }
    /**
     * Get EntryDate value
     * @return string
     */
    public function getEntryDate()
    {
        return $this->EntryDate;
    }
    /**
     * Set EntryDate value
     * @param string $entryDate
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setEntryDate($entryDate = null)
    {
        // validation for constraint: string
        if (!is_null($entryDate) && !is_string($entryDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($entryDate)), __LINE__);
        }
        $this->EntryDate = $entryDate;
        return $this;
    }
    /**
     * Get LastUpdate value
     * @return string
     */
    public function getLastUpdate()
    {
        return $this->LastUpdate;
    }
    /**
     * Set LastUpdate value
     * @param string $lastUpdate
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setLastUpdate($lastUpdate = null)
    {
        // validation for constraint: string
        if (!is_null($lastUpdate) && !is_string($lastUpdate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastUpdate)), __LINE__);
        }
        $this->LastUpdate = $lastUpdate;
        return $this;
    }
    /**
     * Get DelistDate value
     * @return string
     */
    public function getDelistDate()
    {
        return $this->DelistDate;
    }
    /**
     * Set DelistDate value
     * @param string $delistDate
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setDelistDate($delistDate = null)
    {
        // validation for constraint: string
        if (!is_null($delistDate) && !is_string($delistDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($delistDate)), __LINE__);
        }
        $this->DelistDate = $delistDate;
        return $this;
    }
    /**
     * Get ClientID value
     * @return int
     */
    public function getClientID()
    {
        return $this->ClientID;
    }
    /**
     * Set ClientID value
     * @param int $clientID
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setClientID($clientID = null)
    {
        // validation for constraint: int
        if (!is_null($clientID) && !is_numeric($clientID)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($clientID)), __LINE__);
        }
        $this->ClientID = $clientID;
        return $this;
    }
    /**
     * Get Name value
     * @return string|null
     */
    public function getName()
    {
        return $this->Name;
    }
    /**
     * Set Name value
     * @param string $name
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setName($name = null)
    {
        // validation for constraint: string
        if (!is_null($name) && !is_string($name)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($name)), __LINE__);
        }
        $this->Name = $name;
        return $this;
    }
    /**
     * Get Street1 value
     * @return string|null
     */
    public function getStreet1()
    {
        return $this->Street1;
    }
    /**
     * Set Street1 value
     * @param string $street1
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setStreet1($street1 = null)
    {
        // validation for constraint: string
        if (!is_null($street1) && !is_string($street1)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($street1)), __LINE__);
        }
        $this->Street1 = $street1;
        return $this;
    }
    /**
     * Get Street2 value
     * @return string|null
     */
    public function getStreet2()
    {
        return $this->Street2;
    }
    /**
     * Set Street2 value
     * @param string $street2
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setStreet2($street2 = null)
    {
        // validation for constraint: string
        if (!is_null($street2) && !is_string($street2)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($street2)), __LINE__);
        }
        $this->Street2 = $street2;
        return $this;
    }
    /**
     * Get City value
     * @return string|null
     */
    public function getCity()
    {
        return $this->City;
    }
    /**
     * Set City value
     * @param string $city
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setCity($city = null)
    {
        // validation for constraint: string
        if (!is_null($city) && !is_string($city)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($city)), __LINE__);
        }
        $this->City = $city;
        return $this;
    }
    /**
     * Get Region value
     * @return string|null
     */
    public function getRegion()
    {
        return $this->Region;
    }
    /**
     * Set Region value
     * @param string $region
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setRegion($region = null)
    {
        // validation for constraint: string
        if (!is_null($region) && !is_string($region)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($region)), __LINE__);
        }
        $this->Region = $region;
        return $this;
    }
    /**
     * Get Country value
     * @return string|null
     */
    public function getCountry()
    {
        return $this->Country;
    }
    /**
     * Set Country value
     * @param string $country
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setCountry($country = null)
    {
        // validation for constraint: string
        if (!is_null($country) && !is_string($country)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($country)), __LINE__);
        }
        $this->Country = $country;
        return $this;
    }
    /**
     * Get Code value
     * @return string|null
     */
    public function getCode()
    {
        return $this->Code;
    }
    /**
     * Set Code value
     * @param string $code
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setCode($code = null)
    {
        // validation for constraint: string
        if (!is_null($code) && !is_string($code)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($code)), __LINE__);
        }
        $this->Code = $code;
        return $this;
    }
    /**
     * Get Notes value
     * @return string|null
     */
    public function getNotes()
    {
        return $this->Notes;
    }
    /**
     * Set Notes value
     * @param string $notes
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
     */
    public function setNotes($notes = null)
    {
        // validation for constraint: string
        if (!is_null($notes) && !is_string($notes)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($notes)), __LINE__);
        }
        $this->Notes = $notes;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\DynamicScreeningEntity
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
