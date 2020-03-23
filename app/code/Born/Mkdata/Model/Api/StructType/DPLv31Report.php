<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DPLv31Report StructType
 * @subpackage Structs
 */
class DPLv31Report extends AbstractStructBase
{
    /**
     * The ReportDateTimeUTC
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $ReportDateTimeUTC;
    /**
     * The MaxHitsSurpassed
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $MaxHitsSurpassed;
    /**
     * The Hits
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry
     */
    public $Hits;
    /**
     * The SearchRequest
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\Search
     */
    public $SearchRequest;
    /**
     * Constructor method for DPLv31Report
     * @uses DPLv31Report::setReportDateTimeUTC()
     * @uses DPLv31Report::setMaxHitsSurpassed()
     * @uses DPLv31Report::setHits()
     * @uses DPLv31Report::setSearchRequest()
     * @param string $reportDateTimeUTC
     * @param bool $maxHitsSurpassed
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $hits
     * @param \Born\Mkdata\Model\Api\StructType\Search $searchRequest
     */
    public function __construct($reportDateTimeUTC = null, $maxHitsSurpassed = null, \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $hits = null, \Born\Mkdata\Model\Api\StructType\Search $searchRequest = null)
    {
        $this
            ->setReportDateTimeUTC($reportDateTimeUTC)
            ->setMaxHitsSurpassed($maxHitsSurpassed)
            ->setHits($hits)
            ->setSearchRequest($searchRequest);
    }
    /**
     * Get ReportDateTimeUTC value
     * @return string
     */
    public function getReportDateTimeUTC()
    {
        return $this->ReportDateTimeUTC;
    }
    /**
     * Set ReportDateTimeUTC value
     * @param string $reportDateTimeUTC
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Report
     */
    public function setReportDateTimeUTC($reportDateTimeUTC = null)
    {
        // validation for constraint: string
        if (!is_null($reportDateTimeUTC) && !is_string($reportDateTimeUTC)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($reportDateTimeUTC)), __LINE__);
        }
        $this->ReportDateTimeUTC = $reportDateTimeUTC;
        return $this;
    }
    /**
     * Get MaxHitsSurpassed value
     * @return bool
     */
    public function getMaxHitsSurpassed()
    {
        return $this->MaxHitsSurpassed;
    }
    /**
     * Set MaxHitsSurpassed value
     * @param bool $maxHitsSurpassed
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Report
     */
    public function setMaxHitsSurpassed($maxHitsSurpassed = null)
    {
        // validation for constraint: boolean
        if (!is_null($maxHitsSurpassed) && !is_bool($maxHitsSurpassed)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($maxHitsSurpassed)), __LINE__);
        }
        $this->MaxHitsSurpassed = $maxHitsSurpassed;
        return $this;
    }
    /**
     * Get Hits value
     * @return \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry|null
     */
    public function getHits()
    {
        return $this->Hits;
    }
    /**
     * Set Hits value
     * @param \Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $hits
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Report
     */
    public function setHits(\Born\Mkdata\Model\Api\ArrayType\ArrayOfDPLv31Entry $hits = null)
    {
        $this->Hits = $hits;
        return $this;
    }
    /**
     * Get SearchRequest value
     * @return \Born\Mkdata\Model\Api\StructType\Search|null
     */
    public function getSearchRequest()
    {
        return $this->SearchRequest;
    }
    /**
     * Set SearchRequest value
     * @param \Born\Mkdata\Model\Api\StructType\Search $searchRequest
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Report
     */
    public function setSearchRequest(\Born\Mkdata\Model\Api\StructType\Search $searchRequest = null)
    {
        $this->SearchRequest = $searchRequest;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Report
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
