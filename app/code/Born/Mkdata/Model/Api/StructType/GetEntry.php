<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetEntry StructType
 * @subpackage Structs
 */
class GetEntry extends AbstractStructBase
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
     * The source
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $source;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * Constructor method for GetEntry
     * @uses GetEntry::setIdnum()
     * @uses GetEntry::setSource()
     * @uses GetEntry::setCredentials()
     * @param int $idnum
     * @param string $source
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     */
    public function __construct($idnum = null, $source = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this
            ->setIdnum($idnum)
            ->setSource($source)
            ->setCredentials($credentials);
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
     * @return \Born\Mkdata\Model\Api\StructType\GetEntry
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
     * Get source value
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
    /**
     * Set source value
     * @uses \Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $source
     * @return \Born\Mkdata\Model\Api\StructType\GetEntry
     */
    public function setSource($source = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::valueIsValid($source)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $source, implode(', ', \Born\Mkdata\Model\Api\EnumType\DPLv31ListSource::getValidValues())), __LINE__);
        }
        $this->source = $source;
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
     * @return \Born\Mkdata\Model\Api\StructType\GetEntry
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GetEntry
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
