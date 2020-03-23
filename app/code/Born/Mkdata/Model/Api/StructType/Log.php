<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Log StructType
 * @subpackage Structs
 */
class Log extends AbstractStructBase
{
    /**
     * The Entry
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $Entry;
    /**
     * The Date_Time
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var string
     */
    public $Date_Time;
    /**
     * The Hits
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * - nillable: true
     * @var int
     */
    public $Hits;
    /**
     * The Username
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Username;
    /**
     * The Search
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Search;
    /**
     * The Reference
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Reference;
    /**
     * Constructor method for Log
     * @uses Log::setEntry()
     * @uses Log::setDate_Time()
     * @uses Log::setHits()
     * @uses Log::setUsername()
     * @uses Log::setSearch()
     * @uses Log::setReference()
     * @param int $entry
     * @param string $date_Time
     * @param int $hits
     * @param string $username
     * @param string $search
     * @param string $reference
     */
    public function __construct($entry = null, $date_Time = null, $hits = null, $username = null, $search = null, $reference = null)
    {
        $this
            ->setEntry($entry)
            ->setDate_Time($date_Time)
            ->setHits($hits)
            ->setUsername($username)
            ->setSearch($search)
            ->setReference($reference);
    }
    /**
     * Get Entry value
     * @return int
     */
    public function getEntry()
    {
        return $this->Entry;
    }
    /**
     * Set Entry value
     * @param int $entry
     * @return \Born\Mkdata\Model\Api\StructType\Log
     */
    public function setEntry($entry = null)
    {
        // validation for constraint: int
        if (!is_null($entry) && !is_numeric($entry)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($entry)), __LINE__);
        }
        $this->Entry = $entry;
        return $this;
    }
    /**
     * Get Date_Time value
     * @return string
     */
    public function getDate_Time()
    {
        return $this->Date_Time;
    }
    /**
     * Set Date_Time value
     * @param string $date_Time
     * @return \Born\Mkdata\Model\Api\StructType\Log
     */
    public function setDate_Time($date_Time = null)
    {
        // validation for constraint: string
        if (!is_null($date_Time) && !is_string($date_Time)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($date_Time)), __LINE__);
        }
        $this->Date_Time = $date_Time;
        return $this;
    }
    /**
     * Get Hits value
     * @return int
     */
    public function getHits()
    {
        return $this->Hits;
    }
    /**
     * Set Hits value
     * @param int $hits
     * @return \Born\Mkdata\Model\Api\StructType\Log
     */
    public function setHits($hits = null)
    {
        // validation for constraint: int
        if (!is_null($hits) && !is_numeric($hits)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($hits)), __LINE__);
        }
        $this->Hits = $hits;
        return $this;
    }
    /**
     * Get Username value
     * @return string|null
     */
    public function getUsername()
    {
        return $this->Username;
    }
    /**
     * Set Username value
     * @param string $username
     * @return \Born\Mkdata\Model\Api\StructType\Log
     */
    public function setUsername($username = null)
    {
        // validation for constraint: string
        if (!is_null($username) && !is_string($username)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($username)), __LINE__);
        }
        $this->Username = $username;
        return $this;
    }
    /**
     * Get Search value
     * @return string|null
     */
    public function getSearch()
    {
        return $this->Search;
    }
    /**
     * Set Search value
     * @param string $search
     * @return \Born\Mkdata\Model\Api\StructType\Log
     */
    public function setSearch($search = null)
    {
        // validation for constraint: string
        if (!is_null($search) && !is_string($search)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($search)), __LINE__);
        }
        $this->Search = $search;
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
     * @return \Born\Mkdata\Model\Api\StructType\Log
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
     * @return \Born\Mkdata\Model\Api\StructType\Log
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
