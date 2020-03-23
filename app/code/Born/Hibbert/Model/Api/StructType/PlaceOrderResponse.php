<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for placeOrderResponse StructType
 * Meta informations extracted from the WSDL
 * - type: tns:placeOrderResponse
 * @subpackage Structs
 */
class PlaceOrderResponse extends AbstractStructBase
{
    /**
     * The return
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS
     */
    public $return;
    /**
     * Constructor method for placeOrderResponse
     * @uses PlaceOrderResponse::setReturn()
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS $return
     */
    public function __construct(\Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS $return = null)
    {
        $this
            ->setReturn($return);
    }
    /**
     * Get return value
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS|null
     */
    public function getReturn()
    {
        return $this->return;
    }
    /**
     * Set return value
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS $return
     * @return \Born\Hibbert\Model\Api\StructType\PlaceOrderResponse
     */
    public function setReturn(\Born\Hibbert\Model\Api\ArrayType\ArrayOfOrderResponseWS $return = null)
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
     * @return \Born\Hibbert\Model\Api\StructType\PlaceOrderResponse
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
