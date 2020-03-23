<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for OrderStatusRequestWS StructType
 * @subpackage Structs
 */
class OrderStatusRequestWS extends AbstractStructBase
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
     * The numberOfOrderStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $numberOfOrderStatus;
    /**
     * The orderNumbers
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfString
     */
    public $orderNumbers;
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
     * Constructor method for OrderStatusRequestWS
     * @uses OrderStatusRequestWS::setClientReferenceNumber()
     * @uses OrderStatusRequestWS::setNumberOfOrderStatus()
     * @uses OrderStatusRequestWS::setOrderNumbers()
     * @uses OrderStatusRequestWS::setPassword()
     * @uses OrderStatusRequestWS::setUsername()
     * @param string $clientReferenceNumber
     * @param int $numberOfOrderStatus
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfString $orderNumbers
     * @param string $password
     * @param string $username
     */
    public function __construct($clientReferenceNumber = null, $numberOfOrderStatus = null, \Born\Hibbert\Model\Api\ArrayType\ArrayOfString $orderNumbers = null, $password = null, $username = null)
    {
        $this
            ->setClientReferenceNumber($clientReferenceNumber)
            ->setNumberOfOrderStatus($numberOfOrderStatus)
            ->setOrderNumbers($orderNumbers)
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
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
     * Get numberOfOrderStatus value
     * @return int|null
     */
    public function getNumberOfOrderStatus()
    {
        return $this->numberOfOrderStatus;
    }
    /**
     * Set numberOfOrderStatus value
     * @param int $numberOfOrderStatus
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
     */
    public function setNumberOfOrderStatus($numberOfOrderStatus = null)
    {
        // validation for constraint: int
        if (!is_null($numberOfOrderStatus) && !is_numeric($numberOfOrderStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($numberOfOrderStatus)), __LINE__);
        }
        $this->numberOfOrderStatus = $numberOfOrderStatus;
        return $this;
    }
    /**
     * Get orderNumbers value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfString|null
     */
    public function getOrderNumbers()
    {
        return isset($this->orderNumbers) ? $this->orderNumbers : null;
    }
    /**
     * Set orderNumbers value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfString $orderNumbers
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
     */
    public function setOrderNumbers(\Born\Hibbert\Model\Api\ArrayType\ArrayOfString $orderNumbers = null)
    {
        if (is_null($orderNumbers) || (is_array($orderNumbers) && empty($orderNumbers))) {
            unset($this->orderNumbers);
        } else {
            $this->orderNumbers = $orderNumbers;
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
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
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
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
