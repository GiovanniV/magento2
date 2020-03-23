<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GetDynamicScreeningListEntry StructType
 * @subpackage Structs
 */
class GetDynamicScreeningListEntry extends AbstractStructBase
{
    /**
     * The id
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $id;
    /**
     * The idIsCustomers
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $idIsCustomers;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * Constructor method for GetDynamicScreeningListEntry
     * @uses GetDynamicScreeningListEntry::setId()
     * @uses GetDynamicScreeningListEntry::setIdIsCustomers()
     * @uses GetDynamicScreeningListEntry::setCredentials()
     * @param int $id
     * @param bool $idIsCustomers
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     */
    public function __construct($id = null, $idIsCustomers = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this
            ->setId($id)
            ->setIdIsCustomers($idIsCustomers)
            ->setCredentials($credentials);
    }
    /**
     * Get id value
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id value
     * @param int $id
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntry
     */
    public function setId($id = null)
    {
        // validation for constraint: int
        if (!is_null($id) && !is_numeric($id)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($id)), __LINE__);
        }
        $this->id = $id;
        return $this;
    }
    /**
     * Get idIsCustomers value
     * @return bool
     */
    public function getIdIsCustomers()
    {
        return $this->idIsCustomers;
    }
    /**
     * Set idIsCustomers value
     * @param bool $idIsCustomers
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntry
     */
    public function setIdIsCustomers($idIsCustomers = null)
    {
        // validation for constraint: boolean
        if (!is_null($idIsCustomers) && !is_bool($idIsCustomers)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($idIsCustomers)), __LINE__);
        }
        $this->idIsCustomers = $idIsCustomers;
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
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntry
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
     * @return \Born\Mkdata\Model\Api\StructType\GetDynamicScreeningListEntry
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
