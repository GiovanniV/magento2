<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for DPLv31DuplicateHandlingType EnumType
 * @subpackage Enumerations
 */
class DPLv31DuplicateHandlingType
{
    /**
     * Constant for value 'Allow'
     * @return string 'Allow'
     */
    const VALUE_ALLOW = 'Allow';
    /**
     * Constant for value 'Update'
     * @return string 'Update'
     */
    const VALUE_UPDATE = 'Update';
    /**
     * Constant for value 'Error'
     * @return string 'Error'
     */
    const VALUE_ERROR = 'Error';
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
     * @uses self::VALUE_ALLOW
     * @uses self::VALUE_UPDATE
     * @uses self::VALUE_ERROR
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_ALLOW,
            self::VALUE_UPDATE,
            self::VALUE_ERROR,
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
