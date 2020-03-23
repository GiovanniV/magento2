<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SearchDplResponse StructType
 * @subpackage Structs
 */
class SearchDplResponse extends AbstractStructBase
{
    /**
     * The SearchDplResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Report
     */
    public $SearchDplResult;
    /**
     * Constructor method for SearchDplResponse
     * @uses SearchDplResponse::setSearchDplResult()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Report $searchDplResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31Report $searchDplResult = null)
    {
        $this
            ->setSearchDplResult($searchDplResult);
    }
    /**
     * Get SearchDplResult value
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Report|null
     */
    public function getSearchDplResult()
    {
        return $this->SearchDplResult;
    }
    /**
     * Set SearchDplResult value
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Report $searchDplResult
     * @return \Born\Mkdata\Model\Api\StructType\SearchDplResponse
     */
    public function setSearchDplResult(\Born\Mkdata\Model\Api\StructType\DPLv31Report $searchDplResult = null)
    {
        $this->SearchDplResult = $searchDplResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\SearchDplResponse
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
