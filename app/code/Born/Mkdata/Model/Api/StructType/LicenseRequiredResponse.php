<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for LicenseRequiredResponse StructType
 * @subpackage Structs
 */
class LicenseRequiredResponse extends AbstractStructBase
{
    /**
     * The LicenseRequiredResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult
     */
    public $LicenseRequiredResult;
    /**
     * Constructor method for LicenseRequiredResponse
     * @uses LicenseRequiredResponse::setLicenseRequiredResult()
     * @param \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult $licenseRequiredResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\LinceseRequiredResult $licenseRequiredResult = null)
    {
        $this
            ->setLicenseRequiredResult($licenseRequiredResult);
    }
    /**
     * Get LicenseRequiredResult value
     * @return \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult|null
     */
    public function getLicenseRequiredResult()
    {
        return $this->LicenseRequiredResult;
    }
    /**
     * Set LicenseRequiredResult value
     * @param \Born\Mkdata\Model\Api\StructType\LinceseRequiredResult $licenseRequiredResult
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequiredResponse
     */
    public function setLicenseRequiredResult(\Born\Mkdata\Model\Api\StructType\LinceseRequiredResult $licenseRequiredResult = null)
    {
        $this->LicenseRequiredResult = $licenseRequiredResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\LicenseRequiredResponse
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
