<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for AddDynamicScreeningListEntry StructType
 * @subpackage Structs
 */
class AddDynamicScreeningListEntry extends AbstractStructBase
{
    /**
     * The duplicateHandlingType
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $duplicateHandlingType;
    /**
     * The clientSuppliedId
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $clientSuppliedId;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
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
     * The ISO2LetterCountryCode
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $ISO2LetterCountryCode;
    /**
     * The UserDefinedCode
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $UserDefinedCode;
    /**
     * The Notes
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Notes;
    /**
     * Constructor method for AddDynamicScreeningListEntry
     * @uses AddDynamicScreeningListEntry::setDuplicateHandlingType()
     * @uses AddDynamicScreeningListEntry::setClientSuppliedId()
     * @uses AddDynamicScreeningListEntry::setCredentials()
     * @uses AddDynamicScreeningListEntry::setName()
     * @uses AddDynamicScreeningListEntry::setStreet1()
     * @uses AddDynamicScreeningListEntry::setStreet2()
     * @uses AddDynamicScreeningListEntry::setCity()
     * @uses AddDynamicScreeningListEntry::setRegion()
     * @uses AddDynamicScreeningListEntry::setISO2LetterCountryCode()
     * @uses AddDynamicScreeningListEntry::setUserDefinedCode()
     * @uses AddDynamicScreeningListEntry::setNotes()
     * @param string $duplicateHandlingType
     * @param int $clientSuppliedId
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param string $name
     * @param string $street1
     * @param string $street2
     * @param string $city
     * @param string $region
     * @param string $iSO2LetterCountryCode
     * @param string $userDefinedCode
     * @param string $notes
     */
    public function __construct($duplicateHandlingType = null, $clientSuppliedId = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, $name = null, $street1 = null, $street2 = null, $city = null, $region = null, $iSO2LetterCountryCode = null, $userDefinedCode = null, $notes = null)
    {
        $this
            ->setDuplicateHandlingType($duplicateHandlingType)
            ->setClientSuppliedId($clientSuppliedId)
            ->setCredentials($credentials)
            ->setName($name)
            ->setStreet1($street1)
            ->setStreet2($street2)
            ->setCity($city)
            ->setRegion($region)
            ->setISO2LetterCountryCode($iSO2LetterCountryCode)
            ->setUserDefinedCode($userDefinedCode)
            ->setNotes($notes);
    }
    /**
     * Get duplicateHandlingType value
     * @return string
     */
    public function getDuplicateHandlingType()
    {
        return $this->duplicateHandlingType;
    }
    /**
     * Set duplicateHandlingType value
     * @uses \Born\Mkdata\Model\Api\EnumType\DPLv31DuplicateHandlingType::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\DPLv31DuplicateHandlingType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $duplicateHandlingType
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
     */
    public function setDuplicateHandlingType($duplicateHandlingType = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\DPLv31DuplicateHandlingType::valueIsValid($duplicateHandlingType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $duplicateHandlingType, implode(', ', \Born\Mkdata\Model\Api\EnumType\DPLv31DuplicateHandlingType::getValidValues())), __LINE__);
        }
        $this->duplicateHandlingType = $duplicateHandlingType;
        return $this;
    }
    /**
     * Get clientSuppliedId value
     * @return int
     */
    public function getClientSuppliedId()
    {
        return $this->clientSuppliedId;
    }
    /**
     * Set clientSuppliedId value
     * @param int $clientSuppliedId
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
     */
    public function setClientSuppliedId($clientSuppliedId = null)
    {
        // validation for constraint: int
        if (!is_null($clientSuppliedId) && !is_numeric($clientSuppliedId)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($clientSuppliedId)), __LINE__);
        }
        $this->clientSuppliedId = $clientSuppliedId;
        return $this;
    }
    /**
     * Get credentials value
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Credentials|null
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
    /**
     * Set credentials value
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
     * Get ISO2LetterCountryCode value
     * @return string|null
     */
    public function getISO2LetterCountryCode()
    {
        return $this->ISO2LetterCountryCode;
    }
    /**
     * Set ISO2LetterCountryCode value
     * @param string $iSO2LetterCountryCode
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
     */
    public function setISO2LetterCountryCode($iSO2LetterCountryCode = null)
    {
        // validation for constraint: string
        if (!is_null($iSO2LetterCountryCode) && !is_string($iSO2LetterCountryCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($iSO2LetterCountryCode)), __LINE__);
        }
        $this->ISO2LetterCountryCode = $iSO2LetterCountryCode;
        return $this;
    }
    /**
     * Get UserDefinedCode value
     * @return string|null
     */
    public function getUserDefinedCode()
    {
        return $this->UserDefinedCode;
    }
    /**
     * Set UserDefinedCode value
     * @param string $userDefinedCode
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
     */
    public function setUserDefinedCode($userDefinedCode = null)
    {
        // validation for constraint: string
        if (!is_null($userDefinedCode) && !is_string($userDefinedCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($userDefinedCode)), __LINE__);
        }
        $this->UserDefinedCode = $userDefinedCode;
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
     * @return \Born\Mkdata\Model\Api\StructType\AddDynamicScreeningListEntry
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
