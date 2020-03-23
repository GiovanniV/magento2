<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for FederalRegisterNotice StructType
 * @subpackage Structs
 */
class FederalRegisterNotice extends AbstractStructBase
{
    /**
     * The Volume
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $Volume;
    /**
     * The Page
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $Page;
    /**
     * The Date
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $Date;
    /**
     * Constructor method for FederalRegisterNotice
     * @uses FederalRegisterNotice::setVolume()
     * @uses FederalRegisterNotice::setPage()
     * @uses FederalRegisterNotice::setDate()
     * @param int $volume
     * @param int $page
     * @param string $date
     */
    public function __construct($volume = null, $page = null, $date = null)
    {
        $this
            ->setVolume($volume)
            ->setPage($page)
            ->setDate($date);
    }
    /**
     * Get Volume value
     * @return int
     */
    public function getVolume()
    {
        return $this->Volume;
    }
    /**
     * Set Volume value
     * @param int $volume
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice
     */
    public function setVolume($volume = null)
    {
        // validation for constraint: int
        if (!is_null($volume) && !is_numeric($volume)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($volume)), __LINE__);
        }
        $this->Volume = $volume;
        return $this;
    }
    /**
     * Get Page value
     * @return int
     */
    public function getPage()
    {
        return $this->Page;
    }
    /**
     * Set Page value
     * @param int $page
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice
     */
    public function setPage($page = null)
    {
        // validation for constraint: int
        if (!is_null($page) && !is_numeric($page)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($page)), __LINE__);
        }
        $this->Page = $page;
        return $this;
    }
    /**
     * Get Date value
     * @return string
     */
    public function getDate()
    {
        return $this->Date;
    }
    /**
     * Set Date value
     * @param string $date
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice
     */
    public function setDate($date = null)
    {
        // validation for constraint: string
        if (!is_null($date) && !is_string($date)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($date)), __LINE__);
        }
        $this->Date = $date;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\FederalRegisterNotice
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
