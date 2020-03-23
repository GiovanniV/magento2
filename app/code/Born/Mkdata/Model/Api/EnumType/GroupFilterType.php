<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for GroupFilterType EnumType
 * @subpackage Enumerations
 */
class GroupFilterType
{
    /**
     * Constant for value 'RestrictToCodesBySourceCountry'
     * @return string 'RestrictToCodesBySourceCountry'
     */
    const VALUE_RESTRICT_TO_CODES_BY_SOURCE_COUNTRY = 'RestrictToCodesBySourceCountry';
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
     * @uses self::VALUE_RESTRICT_TO_CODES_BY_SOURCE_COUNTRY
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_RESTRICT_TO_CODES_BY_SOURCE_COUNTRY,
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
