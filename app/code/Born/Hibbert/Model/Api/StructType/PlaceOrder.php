<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for placeOrder StructType
 * Meta informations extracted from the WSDL
 * - type: tns:placeOrder
 * @subpackage Structs
 */
class PlaceOrder extends AbstractStructBase
{
    /**
     * The arg0
     * Meta informations extracted from the WSDL
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS
     */
    public $arg0;
    /**
     * Constructor method for placeOrder
     * @uses PlaceOrder::setArg0()
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS $arg0
     */
    public function __construct(\Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS $arg0 = null)
    {
        $this
            ->setArg0($arg0);
    }
    /**
     * Get arg0 value
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS|null
     */
    public function getArg0()
    {
        return $this->arg0;
    }
    /**
     * Set arg0 value
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS $arg0
     * @return \Born\Hibbert\Model\Api\StructType\PlaceOrder
     */
    public function setArg0(\Born\Hibbert\Model\Api\ArrayType\ArrayOfPCIOrderRequestWS $arg0 = null)
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
     * @return \Born\Hibbert\Model\Api\StructType\PlaceOrder
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
