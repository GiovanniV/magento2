<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Group StructType
 * @subpackage Structs
 */
class Group extends AbstractStructBase
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
     * The Matches
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch
     */
    public $Matches;
    /**
     * Constructor method for Group
     * @uses Group::setConnect()
     * @uses Group::setMatches()
     * @param string $connect
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch $matches
     */
    public function __construct($connect = null, \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch $matches = null)
    {
        $this
            ->setConnect($connect)
            ->setMatches($matches);
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
     * @return \Born\Mkdata\Model\Api\StructType\Group
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
     * Get Matches value
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch|null
     */
    public function getMatches()
    {
        return $this->Matches;
    }
    /**
     * Set Matches value
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch $matches
     * @return \Born\Mkdata\Model\Api\StructType\Group
     */
    public function setMatches(\Born\Mkdata\Model\Api\ArrayType\ArrayOfMatch $matches = null)
    {
        $this->Matches = $matches;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\Group
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
