<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for SearchDpl StructType
 * @subpackage Structs
 */
class SearchDpl extends AbstractStructBase
{
    /**
     * The credentials
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\DPLv31Credentials
     */
    public $credentials;
    /**
     * The request
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\Search
     */
    public $request;
    /**
     * Constructor method for SearchDpl
     * @uses SearchDpl::setCredentials()
     * @uses SearchDpl::setRequest()
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @param \Born\Mkdata\Model\Api\StructType\Search $request
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null, \Born\Mkdata\Model\Api\StructType\Search $request = null)
    {
        $this
            ->setCredentials($credentials)
            ->setRequest($request);
    }
    /**
     * Get credentials value
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31Credentials|null
     */
    public function getCredentials()
    {
        return $this->credentials;
    }
    /**
     * Set credentials value
     * @param \Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials
     * @return \Born\Mkdata\Model\Api\StructType\SearchDpl
     */
    public function setCredentials(\Born\Mkdata\Model\Api\StructType\DPLv31Credentials $credentials = null)
    {
        $this->credentials = $credentials;
        return $this;
    }
    /**
     * Get request value
     * @return \Born\Mkdata\Model\Api\StructType\Search|null
     */
    public function getRequest()
    {
        return $this->request;
    }
    /**
     * Set request value
     * @param \Born\Mkdata\Model\Api\StructType\Search $request
     * @return \Born\Mkdata\Model\Api\StructType\SearchDpl
     */
    public function setRequest(\Born\Mkdata\Model\Api\StructType\Search $request = null)
    {
        $this->request = $request;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\SearchDpl
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
