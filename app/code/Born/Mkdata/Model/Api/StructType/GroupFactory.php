<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GroupFactory StructType
 * @subpackage Structs
 */
class GroupFactory extends AbstractStructBase
{
    /**
     * The filterType
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $filterType;
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * The argument
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $argument;
    /**
     * Constructor method for GroupFactory
     * @uses GroupFactory::setFilterType()
     * @uses GroupFactory::setCredentials()
     * @uses GroupFactory::setArgument()
     * @param string $filterType
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param string $argument
     */
    public function __construct($filterType = null, \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, $argument = null)
    {
        $this
            ->setFilterType($filterType)
            ->setCredentials($credentials)
            ->setArgument($argument);
    }
    /**
     * Get filterType value
     * @return string
     */
    public function getFilterType()
    {
        return $this->filterType;
    }
    /**
     * Set filterType value
     * @uses \Born\Mkdata\Model\Api\EnumType\GroupFilterType::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\GroupFilterType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $filterType
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactory
     */
    public function setFilterType($filterType = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\GroupFilterType::valueIsValid($filterType)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $filterType, implode(', ', \Born\Mkdata\Model\Api\EnumType\GroupFilterType::getValidValues())), __LINE__);
        }
        $this->filterType = $filterType;
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
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactory
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Get argument value
     * @return string|null
     */
    public function getArgument()
    {
        return $this->argument;
    }
    /**
     * Set argument value
     * @param string $argument
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactory
     */
    public function setArgument($argument = null)
    {
        // validation for constraint: string
        if (!is_null($argument) && !is_string($argument)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($argument)), __LINE__);
        }
        $this->argument = $argument;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactory
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
