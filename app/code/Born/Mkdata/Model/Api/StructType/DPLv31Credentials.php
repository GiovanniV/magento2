<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DPLv31Credentials StructType
 * @subpackage Structs
 */
class DPLv31Credentials extends AbstractStructBase
{
    /**
     * The Username
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Username;
    /**
     * The Password
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Password;
    /**
     * Constructor method for DPLv31Credentials
     * @uses DPLv31Credentials::setUsername()
     * @uses DPLv31Credentials::setPassword()
     * @param string $username
     * @param string $password
     */
    public function __construct($username = null, $password = null)
    {
        $this
            ->setUsername($username)
            ->setPassword($password);
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
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
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
     * Get Password value
     * @return string|null
     */
    public function getPassword()
    {
        return $this->Password;
    }
    /**
     * Set Password value
     * @param string $password
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($password)), __LINE__);
        }
        $this->Password = $password;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
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
