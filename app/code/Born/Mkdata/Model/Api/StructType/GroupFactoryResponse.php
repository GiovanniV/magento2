<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for GroupFactoryResponse StructType
 * @subpackage Structs
 */
class GroupFactoryResponse extends AbstractStructBase
{
    /**
     * The GroupFactoryResult
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var \Born\Mkdata\Model\Api\StructType\Group
     */
    public $GroupFactoryResult;
    /**
     * Constructor method for GroupFactoryResponse
     * @uses GroupFactoryResponse::setGroupFactoryResult()
     * @param \Born\Mkdata\Model\Api\StructType\Group $groupFactoryResult
     */
    public function __construct(\Born\Mkdata\Model\Api\StructType\Group $groupFactoryResult = null)
    {
        $this
            ->setGroupFactoryResult($groupFactoryResult);
    }
    /**
     * Get GroupFactoryResult value
     * @return \Born\Mkdata\Model\Api\StructType\Group|null
     */
    public function getGroupFactoryResult()
    {
        return $this->GroupFactoryResult;
    }
    /**
     * Set GroupFactoryResult value
     * @param \Born\Mkdata\Model\Api\StructType\Group $groupFactoryResult
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactoryResponse
     */
    public function setGroupFactoryResult(\Born\Mkdata\Model\Api\StructType\Group $groupFactoryResult = null)
    {
        $this->GroupFactoryResult = $groupFactoryResult;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\GroupFactoryResponse
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
