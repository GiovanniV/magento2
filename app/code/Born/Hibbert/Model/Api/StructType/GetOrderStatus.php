<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for getOrderStatus StructType
 * Meta informations extracted from the WSDL
 * - type: tns:getOrderStatus
 * @subpackage Structs
 */
class GetOrderStatus extends AbstractStructBase
{
    /**
     * The arg0
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS
     */
    public $arg0;
    /**
     * Constructor method for getOrderStatus
     * @uses GetOrderStatus::setArg0()
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS $arg0
     */
    public function __construct(\Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS $arg0 = null)
    {
        $this
            ->setArg0($arg0);
    }
    /**
     * Get arg0 value
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS|null
     */
    public function getArg0()
    {
        return $this->arg0;
    }
    /**
     * Set arg0 value
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS $arg0
     * @return \Born\Hibbert\Model\Api\StructType\GetOrderStatus
     */
    public function setArg0(\Born\Hibbert\Model\Api\StructType\OrderStatusRequestWS $arg0 = null)
    {
        $this->arg0 = $arg0;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\GetOrderStatus
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
