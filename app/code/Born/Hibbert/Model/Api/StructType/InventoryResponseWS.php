<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for InventoryResponseWS StructType
 * @subpackage Structs
 */
class InventoryResponseWS extends AbstractStructBase
{
    /**
     * The errors
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS
     */
    public $errors;
    /**
     * The inventoryItems
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS
     */
    public $inventoryItems;
    /**
     * The numberOfInventoryItems
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $numberOfInventoryItems;
    /**
     * The responseStatusCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $responseStatusCode;
    /**
     * Constructor method for InventoryResponseWS
     * @uses InventoryResponseWS::setErrors()
     * @uses InventoryResponseWS::setInventoryItems()
     * @uses InventoryResponseWS::setNumberOfInventoryItems()
     * @uses InventoryResponseWS::setResponseStatusCode()
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS $inventoryItems
     * @param int $numberOfInventoryItems
     * @param string $responseStatusCode
     */
    public function __construct(\Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors = null, \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS $inventoryItems = null, $numberOfInventoryItems = null, $responseStatusCode = null)
    {
        $this
            ->setErrors($errors)
            ->setInventoryItems($inventoryItems)
            ->setNumberOfInventoryItems($numberOfInventoryItems)
            ->setResponseStatusCode($responseStatusCode);
    }
    /**
     * Get errors value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS|null
     */
    public function getErrors()
    {
        return isset($this->errors) ? $this->errors : null;
    }
    /**
     * Set errors value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors
     * @return \Born\Hibbert\Model\Api\StructType\InventoryResponseWS
     */
    public function setErrors(\Born\Hibbert\Model\Api\ArrayType\ArrayOfErrorCodeWS $errors = null)
    {
        if (is_null($errors) || (is_array($errors) && empty($errors))) {
            unset($this->errors);
        } else {
            $this->errors = $errors;
        }
        return $this;
    }
    /**
     * Get inventoryItems value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS|null
     */
    public function getInventoryItems()
    {
        return isset($this->inventoryItems) ? $this->inventoryItems : null;
    }
    /**
     * Set inventoryItems value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param \Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS $inventoryItems
     * @return \Born\Hibbert\Model\Api\StructType\InventoryResponseWS
     */
    public function setInventoryItems(\Born\Hibbert\Model\Api\ArrayType\ArrayOfInventoryWS $inventoryItems = null)
    {
        if (is_null($inventoryItems) || (is_array($inventoryItems) && empty($inventoryItems))) {
            unset($this->inventoryItems);
        } else {
            $this->inventoryItems = $inventoryItems;
        }
        return $this;
    }
    /**
     * Get numberOfInventoryItems value
     * @return int|null
     */
    public function getNumberOfInventoryItems()
    {
        return $this->numberOfInventoryItems;
    }
    /**
     * Set numberOfInventoryItems value
     * @param int $numberOfInventoryItems
     * @return \Born\Hibbert\Model\Api\StructType\InventoryResponseWS
     */
    public function setNumberOfInventoryItems($numberOfInventoryItems = null)
    {
        // validation for constraint: int
        if (!is_null($numberOfInventoryItems) && !is_numeric($numberOfInventoryItems)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($numberOfInventoryItems)), __LINE__);
        }
        $this->numberOfInventoryItems = $numberOfInventoryItems;
        return $this;
    }
    /**
     * Get responseStatusCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getResponseStatusCode()
    {
        return isset($this->responseStatusCode) ? $this->responseStatusCode : null;
    }
    /**
     * Set responseStatusCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $responseStatusCode
     * @return \Born\Hibbert\Model\Api\StructType\InventoryResponseWS
     */
    public function setResponseStatusCode($responseStatusCode = null)
    {
        // validation for constraint: string
        if (!is_null($responseStatusCode) && !is_string($responseStatusCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($responseStatusCode)), __LINE__);
        }
        if (is_null($responseStatusCode) || (is_array($responseStatusCode) && empty($responseStatusCode))) {
            unset($this->responseStatusCode);
        } else {
            $this->responseStatusCode = $responseStatusCode;
        }
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\InventoryResponseWS
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
