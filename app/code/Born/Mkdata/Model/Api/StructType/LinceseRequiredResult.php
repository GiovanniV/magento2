<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for LinceseRequiredResult StructType
 * @subpackage Structs
 */
class LinceseRequiredResult extends AbstractStructBase
{
    /**
     * The Required
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $Required;
    /**
     * The Details
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Details;
    /**
     * Constructor method for LinceseRequiredResult
     * @uses LinceseRequiredResult::setRequired()
     * @uses LinceseRequiredResult::setDetails()
     * @param bool $required
     * @param string $details
     */
    public function __construct($required = null, $details = null)
    {
        $this
            ->setRequired($required)
            ->setDetails($details);
    }
    /**
     * Get Required value
     * @return bool
     */
    public function getRequired()
    {
        return $this->Required;
    }
    /**
     * Set Required value
     * @param bool $required
     * @return \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult
     */
    public function setRequired($required = null)
    {
        // validation for constraint: boolean
        if (!is_null($required) && !is_bool($required)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($required)), __LINE__);
        }
        $this->Required = $required;
        return $this;
    }
    /**
     * Get Details value
     * @return string|null
     */
    public function getDetails()
    {
        return $this->Details;
    }
    /**
     * Set Details value
     * @param string $details
     * @return \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult
     */
    public function setDetails($details = null)
    {
        // validation for constraint: string
        if (!is_null($details) && !is_string($details)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($details)), __LINE__);
        }
        $this->Details = $details;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult
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
