<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for MatchType EnumType
 * @subpackage Enumerations
 */
class MatchType
{
    /**
     * Constant for value 'Is'
     * @return string 'Is'
     */
    const VALUE_IS = 'Is';
    /**
     * Constant for value 'Contains'
     * @return string 'Contains'
     */
    const VALUE_CONTAINS = 'Contains';
    /**
     * Constant for value 'IsSimilarTo'
     * @return string 'IsSimilarTo'
     */
    const VALUE_IS_SIMILAR_TO = 'IsSimilarTo';
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
     * @uses self::VALUE_IS
     * @uses self::VALUE_CONTAINS
     * @uses self::VALUE_IS_SIMILAR_TO
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_IS,
            self::VALUE_CONTAINS,
            self::VALUE_IS_SIMILAR_TO,
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
