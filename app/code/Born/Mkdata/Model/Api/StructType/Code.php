<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for code StructType
 * @subpackage Structs
 */
class Code extends AbstractStructBase
{
    /**
     * The codeCode
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $codeCode;
    /**
     * The codeName
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $codeName;
    /**
     * The sourceCountry
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $sourceCountry;
    /**
     * Constructor method for code
     * @uses Code::setCodeCode()
     * @uses Code::setCodeName()
     * @uses Code::setSourceCountry()
     * @param string $codeCode
     * @param string $codeName
     * @param string $sourceCountry
     */
    public function __construct($codeCode = null, $codeName = null, $sourceCountry = null)
    {
        $this
            ->setCodeCode($codeCode)
            ->setCodeName($codeName)
            ->setSourceCountry($sourceCountry);
    }
    /**
     * Get codeCode value
     * @return string|null
     */
    public function getCodeCode()
    {
        return $this->codeCode;
    }
    /**
     * Set codeCode value
     * @param string $codeCode
     * @return \Born\Mkdata\Model\Api\StructType\Code
     */
    public function setCodeCode($codeCode = null)
    {
        // validation for constraint: string
        if (!is_null($codeCode) && !is_string($codeCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($codeCode)), __LINE__);
        }
        $this->codeCode = $codeCode;
        return $this;
    }
    /**
     * Get codeName value
     * @return string|null
     */
    public function getCodeName()
    {
        return $this->codeName;
    }
    /**
     * Set codeName value
     * @param string $codeName
     * @return \Born\Mkdata\Model\Api\StructType\Code
     */
    public function setCodeName($codeName = null)
    {
        // validation for constraint: string
        if (!is_null($codeName) && !is_string($codeName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($codeName)), __LINE__);
        }
        $this->codeName = $codeName;
        return $this;
    }
    /**
     * Get sourceCountry value
     * @return string|null
     */
    public function getSourceCountry()
    {
        return $this->sourceCountry;
    }
    /**
     * Set sourceCountry value
     * @param string $sourceCountry
     * @return \Born\Mkdata\Model\Api\StructType\Code
     */
    public function setSourceCountry($sourceCountry = null)
    {
        // validation for constraint: string
        if (!is_null($sourceCountry) && !is_string($sourceCountry)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($sourceCountry)), __LINE__);
        }
        $this->sourceCountry = $sourceCountry;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\Code
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
