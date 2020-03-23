<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for ClearMatch StructType
 * @subpackage Structs
 */
class ClearMatch extends AbstractStructBase
{
    /**
     * The idnum
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $idnum;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * The partyName
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $partyName;
    /**
     * The signature
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $signature;
    /**
     * Constructor method for ClearMatch
     * @uses ClearMatch::setIdnum()
     * @uses ClearMatch::setCredentials()
     * @uses ClearMatch::setPartyName()
     * @uses ClearMatch::setSignature()
     * @param int $idnum
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param string $partyName
     * @param string $signature
     */
    public function __construct($idnum = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, $partyName = null, $signature = null)
    {
        $this
            ->setIdnum($idnum)
            ->setCredentials($credentials)
            ->setPartyName($partyName)
            ->setSignature($signature);
    }
    /**
     * Get idnum value
     * @return int
     */
    public function getIdnum()
    {
        return $this->idnum;
    }
    /**
     * Set idnum value
     * @param int $idnum
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatch
     */
    public function setIdnum($idnum = null)
    {
        // validation for constraint: int
        if (!is_null($idnum) && !is_numeric($idnum)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($idnum)), __LINE__);
        }
        $this->idnum = $idnum;
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
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatch
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Get partyName value
     * @return string|null
     */
    public function getPartyName()
    {
        return $this->partyName;
    }
    /**
     * Set partyName value
     * @param string $partyName
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatch
     */
    public function setPartyName($partyName = null)
    {
        // validation for constraint: string
        if (!is_null($partyName) && !is_string($partyName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($partyName)), __LINE__);
        }
        $this->partyName = $partyName;
        return $this;
    }
    /**
     * Get signature value
     * @return string|null
     */
    public function getSignature()
    {
        return $this->signature;
    }
    /**
     * Set signature value
     * @param string $signature
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatch
     */
    public function setSignature($signature = null)
    {
        // validation for constraint: string
        if (!is_null($signature) && !is_string($signature)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($signature)), __LINE__);
        }
        $this->signature = $signature;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\ClearMatch
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
