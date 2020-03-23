<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for DPLv31ListSource EnumType
 * @subpackage Enumerations
 */
class DPLv31ListSource
{
    /**
     * Constant for value 'DeniedPartyList'
     * @return string 'DeniedPartyList'
     */
    const VALUE_DENIED_PARTY_LIST = 'DeniedPartyList';
    /**
     * Constant for value 'PremiumList'
     * @return string 'PremiumList'
     */
    const VALUE_PREMIUM_LIST = 'PremiumList';
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
     * @uses self::VALUE_DENIED_PARTY_LIST
     * @uses self::VALUE_PREMIUM_LIST
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_DENIED_PARTY_LIST,
            self::VALUE_PREMIUM_LIST,
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
