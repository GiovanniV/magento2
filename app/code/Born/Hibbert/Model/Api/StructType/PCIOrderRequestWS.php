<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for PCIOrderRequestWS StructType
 * @subpackage Structs
 */
class PCIOrderRequestWS extends AbstractStructBase
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
     * The orderInformation
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\OrderWS
     */
    public $orderInformation;
    /**
     * The password
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $password;
    /**
     * The shippingLocation
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\StructType\LocationWS
     */
    public $shippingLocation;
    /**
     * The username
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $username;
    /**
     * Constructor method for PCIOrderRequestWS
     * @uses PCIOrderRequestWS::setClientReferenceNumber()
     * @uses PCIOrderRequestWS::setOrderInformation()
     * @uses PCIOrderRequestWS::setPassword()
     * @uses PCIOrderRequestWS::setShippingLocation()
     * @uses PCIOrderRequestWS::setUsername()
     * @param string $clientReferenceNumber
     * @param \Born\Hibbert\Model\Api\StructType\OrderWS $orderInformation
     * @param string $password
     * @param \Born\Hibbert\Model\Api\StructType\LocationWS $shippingLocation
     * @param string $username
     */
    public function __construct($clientReferenceNumber = null, \Born\Hibbert\Model\Api\StructType\OrderWS $orderInformation = null, $password = null, \Born\Hibbert\Model\Api\StructType\LocationWS $shippingLocation = null, $username = null)
    {
        $this
            ->setClientReferenceNumber($clientReferenceNumber)
            ->setOrderInformation($orderInformation)
            ->setPassword($password)
            ->setShippingLocation($shippingLocation)
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
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS
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
     * Get orderInformation value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\OrderWS|null
     */
    public function getOrderInformation()
    {
        return isset($this->orderInformation) ? $this->orderInformation : null;
    }
    /**
     * Set orderInformation value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\StructType\OrderWS $orderInformation
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS
     */
    public function setOrderInformation(\Born\Hibbert\Model\Api\StructType\OrderWS $orderInformation = null)
    {
        if (is_null($orderInformation) || (is_array($orderInformation) && empty($orderInformation))) {
            unset($this->orderInformation);
        } else {
            $this->orderInformation = $orderInformation;
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
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS
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
     * Get shippingLocation value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\StructType\LocationWS|null
     */
    public function getShippingLocation()
    {
        return isset($this->shippingLocation) ? $this->shippingLocation : null;
    }
    /**
     * Set shippingLocation value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\StructType\LocationWS $shippingLocation
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS
     */
    public function setShippingLocation(\Born\Hibbert\Model\Api\StructType\LocationWS $shippingLocation = null)
    {
        if (is_null($shippingLocation) || (is_array($shippingLocation) && empty($shippingLocation))) {
            unset($this->shippingLocation);
        } else {
            $this->shippingLocation = $shippingLocation;
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
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS
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
     * @return \Born\Hibbert\Model\Api\StructType\PCIOrderRequestWS
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
