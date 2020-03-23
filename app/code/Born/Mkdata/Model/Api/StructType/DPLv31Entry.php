<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DPLv31Entry StructType
 * @subpackage Structs
 */
class DPLv31Entry extends AbstractStructBase
{
    /**
     * The IDNUM
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $IDNUM;
    /**
     * The Source
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Source;
    /**
     * The StartDate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $StartDate;
    /**
     * The EndDate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var string
     */
    public $EndDate;
    /**
     * The WeakAlias
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $WeakAlias;
    /**
     * The LastUpdate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
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
     * The Name
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Name;
    /**
     * The Street
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Street;
    /**
     * The City
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $City;
    /**
     * The State
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $State;
    /**
     * The Country
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Country;
    /**
     * The Notes
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Notes;
    /**
     * The Code
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Code;
    /**
     * The Url
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Url;
    /**
     * The FederalRegisterNotices
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice
     */
    public $FederalRegisterNotices;
    /**
     * Constructor method for DPLv31Entry
     * @uses DPLv31Entry::setIDNUM()
     * @uses DPLv31Entry::setSource()
     * @uses DPLv31Entry::setStartDate()
     * @uses DPLv31Entry::setEndDate()
     * @uses DPLv31Entry::setWeakAlias()
     * @uses DPLv31Entry::setLastUpdate()
     * @uses DPLv31Entry::setDelistDate()
     * @uses DPLv31Entry::setName()
     * @uses DPLv31Entry::setStreet()
     * @uses DPLv31Entry::setCity()
     * @uses DPLv31Entry::setState()
     * @uses DPLv31Entry::setCountry()
     * @uses DPLv31Entry::setNotes()
     * @uses DPLv31Entry::setCode()
     * @uses DPLv31Entry::setUrl()
     * @uses DPLv31Entry::setFederalRegisterNotices()
     * @param int $iDNUM
     * @param string $source
     * @param string $startDate
     * @param string $endDate
     * @param bool $weakAlias
     * @param string $lastUpdate
     * @param string $delistDate
     * @param string $name
     * @param string $street
     * @param string $city
     * @param string $state
     * @param string $country
     * @param string $notes
     * @param string $code
     * @param string $url
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice $federalRegisterNotices
     */
    public function __construct($iDNUM = null, $source = null, $startDate = null, $endDate = null, $weakAlias = null, $lastUpdate = null, $delistDate = null, $name = null, $street = null, $city = null, $state = null, $country = null, $notes = null, $code = null, $url = null, \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice $federalRegisterNotices = null)
    {
        $this
            ->setIDNUM($iDNUM)
            ->setSource($source)
            ->setStartDate($startDate)
            ->setEndDate($endDate)
            ->setWeakAlias($weakAlias)
            ->setLastUpdate($lastUpdate)
            ->setDelistDate($delistDate)
            ->setName($name)
            ->setStreet($street)
            ->setCity($city)
            ->setState($state)
            ->setCountry($country)
            ->setNotes($notes)
            ->setCode($code)
            ->setUrl($url)
            ->setFederalRegisterNotices($federalRegisterNotices);
    }
    /**
     * Get IDNUM value
     * @return int
     */
    public function getIDNUM()
    {
        return $this->IDNUM;
    }
    /**
     * Set IDNUM value
     * @param int $iDNUM
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setIDNUM($iDNUM = null)
    {
        // validation for constraint: int
        if (!is_null($iDNUM) && !is_numeric($iDNUM)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($iDNUM)), __LINE__);
        }
        $this->IDNUM = $iDNUM;
        return $this;
    }
    /**
     * Get Source value
     * @return string
     */
    public function getSource()
    {
        return $this->Source;
    }
    /**
     * Set Source value
     * @uses \Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $source
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setSource($source = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::valueIsValid($source)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $source, implode(', ', \Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::getValidValues())), __LINE__);
        }
        $this->Source = $source;
        return $this;
    }
    /**
     * Get StartDate value
     * @return string
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }
    /**
     * Set StartDate value
     * @param string $startDate
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setStartDate($startDate = null)
    {
        // validation for constraint: string
        if (!is_null($startDate) && !is_string($startDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($startDate)), __LINE__);
        }
        $this->StartDate = $startDate;
        return $this;
    }
    /**
     * Get EndDate value
     * @return string
     */
    public function getEndDate()
    {
        return $this->EndDate;
    }
    /**
     * Set EndDate value
     * @param string $endDate
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setEndDate($endDate = null)
    {
        // validation for constraint: string
        if (!is_null($endDate) && !is_string($endDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($endDate)), __LINE__);
        }
        $this->EndDate = $endDate;
        return $this;
    }
    /**
     * Get WeakAlias value
     * @return bool
     */
    public function getWeakAlias()
    {
        return $this->WeakAlias;
    }
    /**
     * Set WeakAlias value
     * @param bool $weakAlias
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setWeakAlias($weakAlias = null)
    {
        // validation for constraint: boolean
        if (!is_null($weakAlias) && !is_bool($weakAlias)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($weakAlias)), __LINE__);
        }
        $this->WeakAlias = $weakAlias;
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * Get Street value
     * @return string|null
     */
    public function getStreet()
    {
        return $this->Street;
    }
    /**
     * Set Street value
     * @param string $street
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setStreet($street = null)
    {
        // validation for constraint: string
        if (!is_null($street) && !is_string($street)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($street)), __LINE__);
        }
        $this->Street = $street;
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * Get State value
     * @return string|null
     */
    public function getState()
    {
        return $this->State;
    }
    /**
     * Set State value
     * @param string $state
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setState($state = null)
    {
        // validation for constraint: string
        if (!is_null($state) && !is_string($state)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($state)), __LINE__);
        }
        $this->State = $state;
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
     * Get Url value
     * @return string|null
     */
    public function getUrl()
    {
        return $this->Url;
    }
    /**
     * Set Url value
     * @param string $url
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setUrl($url = null)
    {
        // validation for constraint: string
        if (!is_null($url) && !is_string($url)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($url)), __LINE__);
        }
        $this->Url = $url;
        return $this;
    }
    /**
     * Get FederalRegisterNotices value
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice|null
     */
    public function getFederalRegisterNotices()
    {
        return $this->FederalRegisterNotices;
    }
    /**
     * Set FederalRegisterNotices value
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice $federalRegisterNotices
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
     */
    public function setFederalRegisterNotices(\Born\Mkdata\Model\Api\ArrayType\ArrayOfFederalRegisterNotice $federalRegisterNotices = null)
    {
        $this->FederalRegisterNotices = $federalRegisterNotices;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Entry
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
