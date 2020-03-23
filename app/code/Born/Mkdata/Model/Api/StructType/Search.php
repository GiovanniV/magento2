<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Search StructType
 * @subpackage Structs
 */
class Search extends AbstractStructBase
{
    /**
     * The Connect
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Connect;
    /**
     * The ExcludeCommonWords
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $ExcludeCommonWords;
    /**
     * The AlwaysIncludeUnknownCountry
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $AlwaysIncludeUnknownCountry;
    /**
     * The MaxReturnHits
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $MaxReturnHits;
    /**
     * The ExcludeWeakAliases
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $ExcludeWeakAliases;
    /**
     * The IncludeDelistedParties
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $IncludeDelistedParties;
    /**
     * The Groups
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup
     */
    public $Groups;
    /**
     * The Reference
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Reference;
    /**
     * Constructor method for Search
     * @uses Search::setConnect()
     * @uses Search::setExcludeCommonWords()
     * @uses Search::setAlwaysIncludeUnknownCountry()
     * @uses Search::setMaxReturnHits()
     * @uses Search::setExcludeWeakAliases()
     * @uses Search::setIncludeDelistedParties()
     * @uses Search::setGroups()
     * @uses Search::setReference()
     * @param string $connect
     * @param bool $excludeCommonWords
     * @param bool $alwaysIncludeUnknownCountry
     * @param int $maxReturnHits
     * @param bool $excludeWeakAliases
     * @param bool $includeDelistedParties
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup $groups
     * @param string $reference
     */
    public function __construct($connect = null, $excludeCommonWords = null, $alwaysIncludeUnknownCountry = null, $maxReturnHits = null, $excludeWeakAliases = null, $includeDelistedParties = null, \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup $groups = null, $reference = null)
    {
        $this
            ->setConnect($connect)
            ->setExcludeCommonWords($excludeCommonWords)
            ->setAlwaysIncludeUnknownCountry($alwaysIncludeUnknownCountry)
            ->setMaxReturnHits($maxReturnHits)
            ->setExcludeWeakAliases($excludeWeakAliases)
            ->setIncludeDelistedParties($includeDelistedParties)
            ->setGroups($groups)
            ->setReference($reference);
    }
    /**
     * Get Connect value
     * @return string
     */
    public function getConnect()
    {
        return $this->Connect;
    }
    /**
     * Set Connect value
     * @uses \Born\Mkdata\Model\Api\EnumType\ConnectType::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\ConnectType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $connect
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setConnect($connect = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\ConnectType::valueIsValid($connect)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $connect, implode(', ', \Born\Mkdata\Model\Api\EnumType\ConnectType::getValidValues())), __LINE__);
        }
        $this->Connect = $connect;
        return $this;
    }
    /**
     * Get ExcludeCommonWords value
     * @return bool
     */
    public function getExcludeCommonWords()
    {
        return $this->ExcludeCommonWords;
    }
    /**
     * Set ExcludeCommonWords value
     * @param bool $excludeCommonWords
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setExcludeCommonWords($excludeCommonWords = null)
    {
        // validation for constraint: boolean
        if (!is_null($excludeCommonWords) && !is_bool($excludeCommonWords)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($excludeCommonWords)), __LINE__);
        }
        $this->ExcludeCommonWords = $excludeCommonWords;
        return $this;
    }
    /**
     * Get AlwaysIncludeUnknownCountry value
     * @return bool
     */
    public function getAlwaysIncludeUnknownCountry()
    {
        return $this->AlwaysIncludeUnknownCountry;
    }
    /**
     * Set AlwaysIncludeUnknownCountry value
     * @param bool $alwaysIncludeUnknownCountry
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setAlwaysIncludeUnknownCountry($alwaysIncludeUnknownCountry = null)
    {
        // validation for constraint: boolean
        if (!is_null($alwaysIncludeUnknownCountry) && !is_bool($alwaysIncludeUnknownCountry)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($alwaysIncludeUnknownCountry)), __LINE__);
        }
        $this->AlwaysIncludeUnknownCountry = $alwaysIncludeUnknownCountry;
        return $this;
    }
    /**
     * Get MaxReturnHits value
     * @return int
     */
    public function getMaxReturnHits()
    {
        return $this->MaxReturnHits;
    }
    /**
     * Set MaxReturnHits value
     * @param int $maxReturnHits
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setMaxReturnHits($maxReturnHits = null)
    {
        // validation for constraint: int
        if (!is_null($maxReturnHits) && !is_numeric($maxReturnHits)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($maxReturnHits)), __LINE__);
        }
        $this->MaxReturnHits = $maxReturnHits;
        return $this;
    }
    /**
     * Get ExcludeWeakAliases value
     * @return bool
     */
    public function getExcludeWeakAliases()
    {
        return $this->ExcludeWeakAliases;
    }
    /**
     * Set ExcludeWeakAliases value
     * @param bool $excludeWeakAliases
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setExcludeWeakAliases($excludeWeakAliases = null)
    {
        // validation for constraint: boolean
        if (!is_null($excludeWeakAliases) && !is_bool($excludeWeakAliases)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($excludeWeakAliases)), __LINE__);
        }
        $this->ExcludeWeakAliases = $excludeWeakAliases;
        return $this;
    }
    /**
     * Get IncludeDelistedParties value
     * @return bool
     */
    public function getIncludeDelistedParties()
    {
        return $this->IncludeDelistedParties;
    }
    /**
     * Set IncludeDelistedParties value
     * @param bool $includeDelistedParties
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setIncludeDelistedParties($includeDelistedParties = null)
    {
        // validation for constraint: boolean
        if (!is_null($includeDelistedParties) && !is_bool($includeDelistedParties)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($includeDelistedParties)), __LINE__);
        }
        $this->IncludeDelistedParties = $includeDelistedParties;
        return $this;
    }
    /**
     * Get Groups value
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup|null
     */
    public function getGroups()
    {
        return $this->Groups;
    }
    /**
     * Set Groups value
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup $groups
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setGroups(\Born\Mkdata\Model\Api\ArrayType\ArrayOfGroup $groups = null)
    {
        $this->Groups = $groups;
        return $this;
    }
    /**
     * Get Reference value
     * @return string|null
     */
    public function getReference()
    {
        return $this->Reference;
    }
    /**
     * Set Reference value
     * @param string $reference
     * @return \Born\Mkdata\Model\Api\StructType\Search
     */
    public function setReference($reference = null)
    {
        // validation for constraint: string
        if (!is_null($reference) && !is_string($reference)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($reference)), __LINE__);
        }
        $this->Reference = $reference;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\Search
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
