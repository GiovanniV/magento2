<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for Match StructType
 * @subpackage Structs
 */
class Match extends AbstractStructBase
{
    /**
     * The Field
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Field;
    /**
     * The Level
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $Level;
    /**
     * The Scope
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Scope;
    /**
     * The Type
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Type;
    /**
     * The Keyword
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Keyword;
    /**
     * Constructor method for Match
     * @uses Match::setField()
     * @uses Match::setLevel()
     * @uses Match::setScope()
     * @uses Match::setType()
     * @uses Match::setKeyword()
     * @param string $field
     * @param int $level
     * @param string $scope
     * @param string $type
     * @param string $keyword
     */
    public function __construct($field = null, $level = null, $scope = null, $type = null, $keyword = null)
    {
        $this
            ->setField($field)
            ->setLevel($level)
            ->setScope($scope)
            ->setType($type)
            ->setKeyword($keyword);
    }
    /**
     * Get Field value
     * @return string
     */
    public function getField()
    {
        return $this->Field;
    }
    /**
     * Set Field value
     * @uses \Born\Mkdata\Model\Api\EnumType\FieldType::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\FieldType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $field
     * @return \Born\Mkdata\Model\Api\StructType\Match
     */
    public function setField($field = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\FieldType::valueIsValid($field)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $field, implode(', ', \Born\Mkdata\Model\Api\EnumType\FieldType::getValidValues())), __LINE__);
        }
        $this->Field = $field;
        return $this;
    }
    /**
     * Get Level value
     * @return int
     */
    public function getLevel()
    {
        return $this->Level;
    }
    /**
     * Set Level value
     * @param int $level
     * @return \Born\Mkdata\Model\Api\StructType\Match
     */
    public function setLevel($level = null)
    {
        // validation for constraint: int
        if (!is_null($level) && !is_numeric($level)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($level)), __LINE__);
        }
        $this->Level = $level;
        return $this;
    }
    /**
     * Get Scope value
     * @return string
     */
    public function getScope()
    {
        return $this->Scope;
    }
    /**
     * Set Scope value
     * @uses \Born\Mkdata\Model\Api\EnumType\MatchScope::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\MatchScope::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $scope
     * @return \Born\Mkdata\Model\Api\StructType\Match
     */
    public function setScope($scope = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\MatchScope::valueIsValid($scope)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $scope, implode(', ', \Born\Mkdata\Model\Api\EnumType\MatchScope::getValidValues())), __LINE__);
        }
        $this->Scope = $scope;
        return $this;
    }
    /**
     * Get Type value
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }
    /**
     * Set Type value
     * @uses \Born\Mkdata\Model\Api\EnumType\MatchType::valueIsValid()
     * @uses \Born\Mkdata\Model\Api\EnumType\MatchType::getValidValues()
     * @throws \InvalidArgumentException
     * @param string $type
     * @return \Born\Mkdata\Model\Api\StructType\Match
     */
    public function setType($type = null)
    {
        // validation for constraint: enumeration
        if (!\Born\Mkdata\Model\Api\EnumType\MatchType::valueIsValid($type)) {
            throw new \InvalidArgumentException(sprintf('Value "%s" is invalid, please use one of: %s', $type, implode(', ', \Born\Mkdata\Model\Api\EnumType\MatchType::getValidValues())), __LINE__);
        }
        $this->Type = $type;
        return $this;
    }
    /**
     * Get Keyword value
     * @return string|null
     */
    public function getKeyword()
    {
        return $this->Keyword;
    }
    /**
     * Set Keyword value
     * @param string $keyword
     * @return \Born\Mkdata\Model\Api\StructType\Match
     */
    public function setKeyword($keyword = null)
    {
        // validation for constraint: string
        if (!is_null($keyword) && !is_string($keyword)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($keyword)), __LINE__);
        }
        $this->Keyword = $keyword;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\Match
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
