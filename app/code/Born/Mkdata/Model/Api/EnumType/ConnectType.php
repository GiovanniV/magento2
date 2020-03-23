<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for ConnectType EnumType
 * @subpackage Enumerations
 */
class ConnectType
{
    /**
     * Constant for value 'and'
     * @return string 'and'
     */
    const VALUE_AND = 'and';
    /**
     * Constant for value 'or'
     * @return string 'or'
     */
    const VALUE_OR = 'or';
    /**
     * Return true if value is allowed
     * @uses self::getValidValues()
     * @param mixed $value value
     * @return bool true|false
     */
    public static function valueIsValid($value)
    {
        return ($value === null) || in_array($value, self::getValidValues(), true);
    }
    /**
     * Return allowed values
     * @uses self::VALUE_AND
     * @uses self::VALUE_OR
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_AND,
            self::VALUE_OR,
        );
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
