<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for FieldType EnumType
 * @subpackage Enumerations
 */
class FieldType
{
    /**
     * Constant for value 'Name'
     * @return string 'Name'
     */
    const VALUE_NAME = 'Name';
    /**
     * Constant for value 'Street'
     * @return string 'Street'
     */
    const VALUE_STREET = 'Street';
    /**
     * Constant for value 'City'
     * @return string 'City'
     */
    const VALUE_CITY = 'City';
    /**
     * Constant for value 'State'
     * @return string 'State'
     */
    const VALUE_STATE = 'State';
    /**
     * Constant for value 'Country'
     * @return string 'Country'
     */
    const VALUE_COUNTRY = 'Country';
    /**
     * Constant for value 'Code'
     * @return string 'Code'
     */
    const VALUE_CODE = 'Code';
    /**
     * Constant for value 'Notes'
     * @return string 'Notes'
     */
    const VALUE_NOTES = 'Notes';
    /**
     * Constant for value 'IDNUM'
     * @return string 'IDNUM'
     */
    const VALUE_IDNUM = 'IDNUM';
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
     * @uses self::VALUE_NAME
     * @uses self::VALUE_STREET
     * @uses self::VALUE_CITY
     * @uses self::VALUE_STATE
     * @uses self::VALUE_COUNTRY
     * @uses self::VALUE_CODE
     * @uses self::VALUE_NOTES
     * @uses self::VALUE_IDNUM
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_NAME,
            self::VALUE_STREET,
            self::VALUE_CITY,
            self::VALUE_STATE,
            self::VALUE_COUNTRY,
            self::VALUE_CODE,
            self::VALUE_NOTES,
            self::VALUE_IDNUM,
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
