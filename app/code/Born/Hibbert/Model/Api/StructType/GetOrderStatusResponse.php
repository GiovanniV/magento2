<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for getOrderStatusResponse StructType
 * Meta informations extracted from the WSDL
 * - type: tns:getOrderStatusResponse
 * @subpackage Structs
 */
class GetOrderStatusResponse extends AbstractStructBase
{
    /**
     * The return
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS
     */
    public $return;
    /**
     * Constructor method for getOrderStatusResponse
     * @uses GetOrderStatusResponse::setReturn()
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS $return
     */
    public function __construct(\Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS $return = null)
    {
        $this
            ->setReturn($return);
    }
    /**
     * Get return value
     * @return \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS|null
     */
    public function getReturn()
    {
        return $this->return;
    }
    /**
     * Set return value
     * @param \Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS $return
     * @return \Born\Hibbert\Model\Api\StructType\GetOrderStatusResponse
     */
    public function setReturn(\Born\Hibbert\Model\Api\StructType\OrderStatusResponseWS $return = null)
    {
        $this->return = $return;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\GetOrderStatusResponse
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
