<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for InventoryItemRequestWS StructType
 * @subpackage Structs
 */
class InventoryItemRequestWS extends AbstractStructBase
{
    /**
     * The clientReferenceNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $clientReferenceNumber;
    /**
     * The itemNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $itemNumber;
    /**
     * The password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $password;
    /**
     * The username
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $username;
    /**
     * Constructor method for InventoryItemRequestWS
     * @uses InventoryItemRequestWS::setClientReferenceNumber()
     * @uses InventoryItemRequestWS::setItemNumber()
     * @uses InventoryItemRequestWS::setPassword()
     * @uses InventoryItemRequestWS::setUsername()
     * @param string $clientReferenceNumber
     * @param string $itemNumber
     * @param string $password
     * @param string $username
     */
    public function __construct($clientReferenceNumber = null, $itemNumber = null, $password = null, $username = null)
    {
        $this
            ->setClientReferenceNumber($clientReferenceNumber)
            ->setItemNumber($itemNumber)
            ->setPassword($password)
            ->setUsername($username);
    }
    /**
     * Get clientReferenceNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getClientReferenceNumber()
    {
        return isset($this->clientReferenceNumber) ? $this->clientReferenceNumber : null;
    }
    /**
     * Set clientReferenceNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $clientReferenceNumber
     * @return \Born\Hibbert\Model\Api\StructType\InventoryItemRequestWS
     */
    public function setClientReferenceNumber($clientReferenceNumber = null)
    {
        // validation for constraint: string
        if (!is_null($clientReferenceNumber) && !is_string($clientReferenceNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($clientReferenceNumber)), __LINE__);
        }
        if (is_null($clientReferenceNumber) || (is_array($clientReferenceNumber) && empty($clientReferenceNumber))) {
            unset($this->clientReferenceNumber);
        } else {
            $this->clientReferenceNumber = $clientReferenceNumber;
        }
        return $this;
    }
    /**
     * Get itemNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getItemNumber()
    {
        return isset($this->itemNumber) ? $this->itemNumber : null;
    }
    /**
     * Set itemNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $itemNumber
     * @return \Born\Hibbert\Model\Api\StructType\InventoryItemRequestWS
     */
    public function setItemNumber($itemNumber = null)
    {
        // validation for constraint: string
        if (!is_null($itemNumber) && !is_string($itemNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($itemNumber)), __LINE__);
        }
        if (is_null($itemNumber) || (is_array($itemNumber) && empty($itemNumber))) {
            unset($this->itemNumber);
        } else {
            $this->itemNumber = $itemNumber;
        }
        return $this;
    }
    /**
     * Get password value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPassword()
    {
        return isset($this->password) ? $this->password : null;
    }
    /**
     * Set password value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $password
     * @return \Born\Hibbert\Model\Api\StructType\InventoryItemRequestWS
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($password)), __LINE__);
        }
        if (is_null($password) || (is_array($password) && empty($password))) {
            unset($this->password);
        } else {
            $this->password = $password;
        }
        return $this;
    }
    /**
     * Get username value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getUsername()
    {
        return isset($this->username) ? $this->username : null;
    }
    /**
     * Set username value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $username
     * @return \Born\Hibbert\Model\Api\StructType\InventoryItemRequestWS
     */
    public function setUsername($username = null)
    {
        // validation for constraint: string
        if (!is_null($username) && !is_string($username)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($username)), __LINE__);
        }
        if (is_null($username) || (is_array($username) && empty($username))) {
            unset($this->username);
        } else {
            $this->username = $username;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\InventoryItemRequestWS
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
