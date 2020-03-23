<?php

namespace Born\Hibbert\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for InventoryWS StructType
 * @subpackage Structs
 */
class InventoryWS extends AbstractStructBase
{
    /**
     * The acceptBackorders
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $acceptBackorders;
    /**
     * The availableOnWeb
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $availableOnWeb;
    /**
     * The clientReferenceNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $clientReferenceNumber;
    /**
     * The firstDateAvailable
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var string
     */
    public $firstDateAvailable;
    /**
     * The itemPrice
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var float
     */
    public $itemPrice;
    /**
     * The maxOrderAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $maxOrderAmount;
    /**
     * The minOrderAmount
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $minOrderAmount;
    /**
     * The netAvailable
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $netAvailable;
    /**
     * The partDescription
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $partDescription;
    /**
     * The partNumber
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $partNumber;
    /**
     * The partStatus
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $partStatus;
    /**
     * The printOnDemand
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $printOnDemand;
    /**
     * The productClass
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $productClass;
    /**
     * The productCode
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $productCode;
    /**
     * The productDivision
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $productDivision;
    /**
     * The productLine
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $productLine;
    /**
     * The productType
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * - nillable: true
     * @var string
     */
    public $productType;
    /**
     * The quantityOnHand
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var int
     */
    public $quantityOnHand;
    /**
     * The sellToZero
     * Meta informations extracted from the WSDL
     * - minOccurs: 0
     * @var bool
     */
    public $sellToZero;
    /**
     * Constructor method for InventoryWS
     * @uses InventoryWS::setAcceptBackorders()
     * @uses InventoryWS::setAvailableOnWeb()
     * @uses InventoryWS::setClientReferenceNumber()
     * @uses InventoryWS::setFirstDateAvailable()
     * @uses InventoryWS::setItemPrice()
     * @uses InventoryWS::setMaxOrderAmount()
     * @uses InventoryWS::setMinOrderAmount()
     * @uses InventoryWS::setNetAvailable()
     * @uses InventoryWS::setPartDescription()
     * @uses InventoryWS::setPartNumber()
     * @uses InventoryWS::setPartStatus()
     * @uses InventoryWS::setPrintOnDemand()
     * @uses InventoryWS::setProductClass()
     * @uses InventoryWS::setProductCode()
     * @uses InventoryWS::setProductDivision()
     * @uses InventoryWS::setProductLine()
     * @uses InventoryWS::setProductType()
     * @uses InventoryWS::setQuantityOnHand()
     * @uses InventoryWS::setSellToZero()
     * @param bool $acceptBackorders
     * @param bool $availableOnWeb
     * @param string $clientReferenceNumber
     * @param string $firstDateAvailable
     * @param float $itemPrice
     * @param int $maxOrderAmount
     * @param int $minOrderAmount
     * @param int $netAvailable
     * @param string $partDescription
     * @param string $partNumber
     * @param string $partStatus
     * @param bool $printOnDemand
     * @param string $productClass
     * @param string $productCode
     * @param string $productDivision
     * @param string $productLine
     * @param string $productType
     * @param int $quantityOnHand
     * @param bool $sellToZero
     */
    public function __construct($acceptBackorders = null, $availableOnWeb = null, $clientReferenceNumber = null, $firstDateAvailable = null, $itemPrice = null, $maxOrderAmount = null, $minOrderAmount = null, $netAvailable = null, $partDescription = null, $partNumber = null, $partStatus = null, $printOnDemand = null, $productClass = null, $productCode = null, $productDivision = null, $productLine = null, $productType = null, $quantityOnHand = null, $sellToZero = null)
    {
        $this
            ->setAcceptBackorders($acceptBackorders)
            ->setAvailableOnWeb($availableOnWeb)
            ->setClientReferenceNumber($clientReferenceNumber)
            ->setFirstDateAvailable($firstDateAvailable)
            ->setItemPrice($itemPrice)
            ->setMaxOrderAmount($maxOrderAmount)
            ->setMinOrderAmount($minOrderAmount)
            ->setNetAvailable($netAvailable)
            ->setPartDescription($partDescription)
            ->setPartNumber($partNumber)
            ->setPartStatus($partStatus)
            ->setPrintOnDemand($printOnDemand)
            ->setProductClass($productClass)
            ->setProductCode($productCode)
            ->setProductDivision($productDivision)
            ->setProductLine($productLine)
            ->setProductType($productType)
            ->setQuantityOnHand($quantityOnHand)
            ->setSellToZero($sellToZero);
    }
    /**
     * Get acceptBackorders value
     * @return bool|null
     */
    public function getAcceptBackorders()
    {
        return $this->acceptBackorders;
    }
    /**
     * Set acceptBackorders value
     * @param bool $acceptBackorders
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setAcceptBackorders($acceptBackorders = null)
    {
        // validation for constraint: boolean
        if (!is_null($acceptBackorders) && !is_bool($acceptBackorders)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($acceptBackorders)), __LINE__);
        }
        $this->acceptBackorders = $acceptBackorders;
        return $this;
    }
    /**
     * Get availableOnWeb value
     * @return bool|null
     */
    public function getAvailableOnWeb()
    {
        return $this->availableOnWeb;
    }
    /**
     * Set availableOnWeb value
     * @param bool $availableOnWeb
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setAvailableOnWeb($availableOnWeb = null)
    {
        // validation for constraint: boolean
        if (!is_null($availableOnWeb) && !is_bool($availableOnWeb)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($availableOnWeb)), __LINE__);
        }
        $this->availableOnWeb = $availableOnWeb;
        return $this;
    }
    /**
     * Get clientReferenceNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getClientReferenceNumber()
    {
        return isset($this->clientReferenceNumber) ? $this->clientReferenceNumber : null;
    }
    /**
     * Set clientReferenceNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $clientReferenceNumber
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setClientReferenceNumber($clientReferenceNumber = null)
    {
        // validation for constraint: string
        if (!is_null($clientReferenceNumber) && !is_string($clientReferenceNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($clientReferenceNumber)), __LINE__);
        }
        if (is_null($clientReferenceNumber) || (is_array($clientReferenceNumber) && empty($clientReferenceNumber))) {
            unset($this->clientReferenceNumber);
        } else {
            $this->clientReferenceNumber = $clientReferenceNumber;
        }
        return $this;
    }
    /**
     * Get firstDateAvailable value
     * @return string|null
     */
    public function getFirstDateAvailable()
    {
        return $this->firstDateAvailable;
    }
    /**
     * Set firstDateAvailable value
     * @param string $firstDateAvailable
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setFirstDateAvailable($firstDateAvailable = null)
    {
        // validation for constraint: string
        if (!is_null($firstDateAvailable) && !is_string($firstDateAvailable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($firstDateAvailable)), __LINE__);
        }
        $this->firstDateAvailable = $firstDateAvailable;
        return $this;
    }
    /**
     * Get itemPrice value
     * @return float|null
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }
    /**
     * Set itemPrice value
     * @param float $itemPrice
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setItemPrice($itemPrice = null)
    {
        $this->itemPrice = $itemPrice;
        return $this;
    }
    /**
     * Get maxOrderAmount value
     * @return int|null
     */
    public function getMaxOrderAmount()
    {
        return $this->maxOrderAmount;
    }
    /**
     * Set maxOrderAmount value
     * @param int $maxOrderAmount
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setMaxOrderAmount($maxOrderAmount = null)
    {
        // validation for constraint: int
        if (!is_null($maxOrderAmount) && !is_numeric($maxOrderAmount)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($maxOrderAmount)), __LINE__);
        }
        $this->maxOrderAmount = $maxOrderAmount;
        return $this;
    }
    /**
     * Get minOrderAmount value
     * @return int|null
     */
    public function getMinOrderAmount()
    {
        return $this->minOrderAmount;
    }
    /**
     * Set minOrderAmount value
     * @param int $minOrderAmount
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setMinOrderAmount($minOrderAmount = null)
    {
        // validation for constraint: int
        if (!is_null($minOrderAmount) && !is_numeric($minOrderAmount)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($minOrderAmount)), __LINE__);
        }
        $this->minOrderAmount = $minOrderAmount;
        return $this;
    }
    /**
     * Get netAvailable value
     * @return int|null
     */
    public function getNetAvailable()
    {
        return $this->netAvailable;
    }
    /**
     * Set netAvailable value
     * @param int $netAvailable
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setNetAvailable($netAvailable = null)
    {
        // validation for constraint: int
        if (!is_null($netAvailable) && !is_numeric($netAvailable)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($netAvailable)), __LINE__);
        }
        $this->netAvailable = $netAvailable;
        return $this;
    }
    /**
     * Get partDescription value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPartDescription()
    {
        return isset($this->partDescription) ? $this->partDescription : null;
    }
    /**
     * Set partDescription value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $partDescription
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setPartDescription($partDescription = null)
    {
        // validation for constraint: string
        if (!is_null($partDescription) && !is_string($partDescription)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($partDescription)), __LINE__);
        }
        if (is_null($partDescription) || (is_array($partDescription) && empty($partDescription))) {
            unset($this->partDescription);
        } else {
            $this->partDescription = $partDescription;
        }
        return $this;
    }
    /**
     * Get partNumber value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPartNumber()
    {
        return isset($this->partNumber) ? $this->partNumber : null;
    }
    /**
     * Set partNumber value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $partNumber
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setPartNumber($partNumber = null)
    {
        // validation for constraint: string
        if (!is_null($partNumber) && !is_string($partNumber)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($partNumber)), __LINE__);
        }
        if (is_null($partNumber) || (is_array($partNumber) && empty($partNumber))) {
            unset($this->partNumber);
        } else {
            $this->partNumber = $partNumber;
        }
        return $this;
    }
    /**
     * Get partStatus value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getPartStatus()
    {
        return isset($this->partStatus) ? $this->partStatus : null;
    }
    /**
     * Set partStatus value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $partStatus
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setPartStatus($partStatus = null)
    {
        // validation for constraint: string
        if (!is_null($partStatus) && !is_string($partStatus)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($partStatus)), __LINE__);
        }
        if (is_null($partStatus) || (is_array($partStatus) && empty($partStatus))) {
            unset($this->partStatus);
        } else {
            $this->partStatus = $partStatus;
        }
        return $this;
    }
    /**
     * Get printOnDemand value
     * @return bool|null
     */
    public function getPrintOnDemand()
    {
        return $this->printOnDemand;
    }
    /**
     * Set printOnDemand value
     * @param bool $printOnDemand
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setPrintOnDemand($printOnDemand = null)
    {
        // validation for constraint: boolean
        if (!is_null($printOnDemand) && !is_bool($printOnDemand)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($printOnDemand)), __LINE__);
        }
        $this->printOnDemand = $printOnDemand;
        return $this;
    }
    /**
     * Get productClass value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProductClass()
    {
        return isset($this->productClass) ? $this->productClass : null;
    }
    /**
     * Set productClass value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $productClass
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setProductClass($productClass = null)
    {
        // validation for constraint: string
        if (!is_null($productClass) && !is_string($productClass)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($productClass)), __LINE__);
        }
        if (is_null($productClass) || (is_array($productClass) && empty($productClass))) {
            unset($this->productClass);
        } else {
            $this->productClass = $productClass;
        }
        return $this;
    }
    /**
     * Get productCode value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProductCode()
    {
        return isset($this->productCode) ? $this->productCode : null;
    }
    /**
     * Set productCode value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $productCode
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setProductCode($productCode = null)
    {
        // validation for constraint: string
        if (!is_null($productCode) && !is_string($productCode)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($productCode)), __LINE__);
        }
        if (is_null($productCode) || (is_array($productCode) && empty($productCode))) {
            unset($this->productCode);
        } else {
            $this->productCode = $productCode;
        }
        return $this;
    }
    /**
     * Get productDivision value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProductDivision()
    {
        return isset($this->productDivision) ? $this->productDivision : null;
    }
    /**
     * Set productDivision value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $productDivision
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setProductDivision($productDivision = null)
    {
        // validation for constraint: string
        if (!is_null($productDivision) && !is_string($productDivision)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($productDivision)), __LINE__);
        }
        if (is_null($productDivision) || (is_array($productDivision) && empty($productDivision))) {
            unset($this->productDivision);
        } else {
            $this->productDivision = $productDivision;
        }
        return $this;
    }
    /**
     * Get productLine value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProductLine()
    {
        return isset($this->productLine) ? $this->productLine : null;
    }
    /**
     * Set productLine value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $productLine
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setProductLine($productLine = null)
    {
        // validation for constraint: string
        if (!is_null($productLine) && !is_string($productLine)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($productLine)), __LINE__);
        }
        if (is_null($productLine) || (is_array($productLine) && empty($productLine))) {
            unset($this->productLine);
        } else {
            $this->productLine = $productLine;
        }
        return $this;
    }
    /**
     * Get productType value
     * An additional test has been added (isset) before returning the property value as
     * this property may have been unset before, due to the fact that this property is
     * removable from the request (nillable=true+minOccurs=0)
     * @return string|null
     */
    public function getProductType()
    {
        return isset($this->productType) ? $this->productType : null;
    }
    /**
     * Set productType value
     * This property is removable from request (nillable=true+minOccurs=0), therefore
     * if the value assigned to this property is null, it is removed from this object
     * @param string $productType
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setProductType($productType = null)
    {
        // validation for constraint: string
        if (!is_null($productType) && !is_string($productType)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($productType)), __LINE__);
        }
        if (is_null($productType) || (is_array($productType) && empty($productType))) {
            unset($this->productType);
        } else {
            $this->productType = $productType;
        }
        return $this;
    }
    /**
     * Get quantityOnHand value
     * @return int|null
     */
    public function getQuantityOnHand()
    {
        return $this->quantityOnHand;
    }
    /**
     * Set quantityOnHand value
     * @param int $quantityOnHand
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setQuantityOnHand($quantityOnHand = null)
    {
        // validation for constraint: int
        if (!is_null($quantityOnHand) && !is_numeric($quantityOnHand)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($quantityOnHand)), __LINE__);
        }
        $this->quantityOnHand = $quantityOnHand;
        return $this;
    }
    /**
     * Get sellToZero value
     * @return bool|null
     */
    public function getSellToZero()
    {
        return $this->sellToZero;
    }
    /**
     * Set sellToZero value
     * @param bool $sellToZero
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
     */
    public function setSellToZero($sellToZero = null)
    {
        // validation for constraint: boolean
        if (!is_null($sellToZero) && !is_bool($sellToZero)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($sellToZero)), __LINE__);
        }
        $this->sellToZero = $sellToZero;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Hibbert\Model\Api\StructType\InventoryWS
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
