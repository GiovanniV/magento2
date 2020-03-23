<?php

namespace Born\Mkdata\Model\Api\EnumType;

/**
 * This class stands for MatchScope EnumType
 * @subpackage Enumerations
 */
class MatchScope
{
    /**
     * Constant for value 'Phrase'
     * @return string 'Phrase'
     */
    const VALUE_PHRASE = 'Phrase';
    /**
     * Constant for value 'Word'
     * @return string 'Word'
     */
    const VALUE_WORD = 'Word';
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
     * @uses self::VALUE_PHRASE
     * @uses self::VALUE_WORD
     * @return string[]
     */
    public static function getValidValues()
    {
        return array(
            self::VALUE_PHRASE,
            self::VALUE_WORD,
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
