<?php

namespace Born\Mkdata\Model\Api\StructType;

use \WsdlToPhp\PackageBase\AbstractStructBase;

/**
 * This class stands for DPLv31User StructType
 * @subpackage Structs
 */
class DPLv31User extends AbstractStructBase
{
    /**
     * The Id
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $Id;
    /**
     * The Access
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $Access;
    /**
     * The CBS
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $CBS;
    /**
     * The KeepLog
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $KeepLog;
    /**
     * The ECCN
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $ECCN;
    /**
     * The WebServiceAccess
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $WebServiceAccess;
    /**
     * The Downloads
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $Downloads;
    /**
     * The ChildCount
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var int
     */
    public $ChildCount;
    /**
     * The DeactivateDate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $DeactivateDate;
    /**
     * The CreateDate
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var string
     */
    public $CreateDate;
    /**
     * The Shared
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 1
     * @var bool
     */
    public $Shared;
    /**
     * The Username
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Username;
    /**
     * The Password
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Password;
    /**
     * The Description
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Description;
    /**
     * The LastName
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $LastName;
    /**
     * The RestName
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $RestName;
    /**
     * The Email
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $Email;
    /**
     * The NewSubAccountMask
     * Meta informations extracted from the WSDL
     * - maxOccurs: 1
     * - minOccurs: 0
     * @var string
     */
    public $NewSubAccountMask;
    /**
     * Constructor method for DPLv31User
     * @uses DPLv31User::setId()
     * @uses DPLv31User::setAccess()
     * @uses DPLv31User::setCBS()
     * @uses DPLv31User::setKeepLog()
     * @uses DPLv31User::setECCN()
     * @uses DPLv31User::setWebServiceAccess()
     * @uses DPLv31User::setDownloads()
     * @uses DPLv31User::setChildCount()
     * @uses DPLv31User::setDeactivateDate()
     * @uses DPLv31User::setCreateDate()
     * @uses DPLv31User::setShared()
     * @uses DPLv31User::setUsername()
     * @uses DPLv31User::setPassword()
     * @uses DPLv31User::setDescription()
     * @uses DPLv31User::setLastName()
     * @uses DPLv31User::setRestName()
     * @uses DPLv31User::setEmail()
     * @uses DPLv31User::setNewSubAccountMask()
     * @param int $id
     * @param int $access
     * @param bool $cBS
     * @param bool $keepLog
     * @param bool $eCCN
     * @param bool $webServiceAccess
     * @param bool $downloads
     * @param int $childCount
     * @param string $deactivateDate
     * @param string $createDate
     * @param bool $shared
     * @param string $username
     * @param string $password
     * @param string $description
     * @param string $lastName
     * @param string $restName
     * @param string $email
     * @param string $newSubAccountMask
     */
    public function __construct($id = null, $access = null, $cBS = null, $keepLog = null, $eCCN = null, $webServiceAccess = null, $downloads = null, $childCount = null, $deactivateDate = null, $createDate = null, $shared = null, $username = null, $password = null, $description = null, $lastName = null, $restName = null, $email = null, $newSubAccountMask = null)
    {
        $this
            ->setId($id)
            ->setAccess($access)
            ->setCBS($cBS)
            ->setKeepLog($keepLog)
            ->setECCN($eCCN)
            ->setWebServiceAccess($webServiceAccess)
            ->setDownloads($downloads)
            ->setChildCount($childCount)
            ->setDeactivateDate($deactivateDate)
            ->setCreateDate($createDate)
            ->setShared($shared)
            ->setUsername($username)
            ->setPassword($password)
            ->setDescription($description)
            ->setLastName($lastName)
            ->setRestName($restName)
            ->setEmail($email)
            ->setNewSubAccountMask($newSubAccountMask);
    }
    /**
     * Get Id value
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }
    /**
     * Set Id value
     * @param int $id
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setId($id = null)
    {
        // validation for constraint: int
        if (!is_null($id) && !is_numeric($id)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($id)), __LINE__);
        }
        $this->Id = $id;
        return $this;
    }
    /**
     * Get Access value
     * @return int
     */
    public function getAccess()
    {
        return $this->Access;
    }
    /**
     * Set Access value
     * @param int $access
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setAccess($access = null)
    {
        // validation for constraint: int
        if (!is_null($access) && !is_numeric($access)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($access)), __LINE__);
        }
        $this->Access = $access;
        return $this;
    }
    /**
     * Get CBS value
     * @return bool
     */
    public function getCBS()
    {
        return $this->CBS;
    }
    /**
     * Set CBS value
     * @param bool $cBS
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setCBS($cBS = null)
    {
        // validation for constraint: boolean
        if (!is_null($cBS) && !is_bool($cBS)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($cBS)), __LINE__);
        }
        $this->CBS = $cBS;
        return $this;
    }
    /**
     * Get KeepLog value
     * @return bool
     */
    public function getKeepLog()
    {
        return $this->KeepLog;
    }
    /**
     * Set KeepLog value
     * @param bool $keepLog
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setKeepLog($keepLog = null)
    {
        // validation for constraint: boolean
        if (!is_null($keepLog) && !is_bool($keepLog)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($keepLog)), __LINE__);
        }
        $this->KeepLog = $keepLog;
        return $this;
    }
    /**
     * Get ECCN value
     * @return bool
     */
    public function getECCN()
    {
        return $this->ECCN;
    }
    /**
     * Set ECCN value
     * @param bool $eCCN
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setECCN($eCCN = null)
    {
        // validation for constraint: boolean
        if (!is_null($eCCN) && !is_bool($eCCN)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($eCCN)), __LINE__);
        }
        $this->ECCN = $eCCN;
        return $this;
    }
    /**
     * Get WebServiceAccess value
     * @return bool
     */
    public function getWebServiceAccess()
    {
        return $this->WebServiceAccess;
    }
    /**
     * Set WebServiceAccess value
     * @param bool $webServiceAccess
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setWebServiceAccess($webServiceAccess = null)
    {
        // validation for constraint: boolean
        if (!is_null($webServiceAccess) && !is_bool($webServiceAccess)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($webServiceAccess)), __LINE__);
        }
        $this->WebServiceAccess = $webServiceAccess;
        return $this;
    }
    /**
     * Get Downloads value
     * @return bool
     */
    public function getDownloads()
    {
        return $this->Downloads;
    }
    /**
     * Set Downloads value
     * @param bool $downloads
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setDownloads($downloads = null)
    {
        // validation for constraint: boolean
        if (!is_null($downloads) && !is_bool($downloads)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($downloads)), __LINE__);
        }
        $this->Downloads = $downloads;
        return $this;
    }
    /**
     * Get ChildCount value
     * @return int
     */
    public function getChildCount()
    {
        return $this->ChildCount;
    }
    /**
     * Set ChildCount value
     * @param int $childCount
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setChildCount($childCount = null)
    {
        // validation for constraint: int
        if (!is_null($childCount) && !is_numeric($childCount)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a numeric value, "%s" given', gettype($childCount)), __LINE__);
        }
        $this->ChildCount = $childCount;
        return $this;
    }
    /**
     * Get DeactivateDate value
     * @return string
     */
    public function getDeactivateDate()
    {
        return $this->DeactivateDate;
    }
    /**
     * Set DeactivateDate value
     * @param string $deactivateDate
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setDeactivateDate($deactivateDate = null)
    {
        // validation for constraint: string
        if (!is_null($deactivateDate) && !is_string($deactivateDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($deactivateDate)), __LINE__);
        }
        $this->DeactivateDate = $deactivateDate;
        return $this;
    }
    /**
     * Get CreateDate value
     * @return string
     */
    public function getCreateDate()
    {
        return $this->CreateDate;
    }
    /**
     * Set CreateDate value
     * @param string $createDate
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setCreateDate($createDate = null)
    {
        // validation for constraint: string
        if (!is_null($createDate) && !is_string($createDate)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($createDate)), __LINE__);
        }
        $this->CreateDate = $createDate;
        return $this;
    }
    /**
     * Get Shared value
     * @return bool
     */
    public function getShared()
    {
        return $this->Shared;
    }
    /**
     * Set Shared value
     * @param bool $shared
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setShared($shared = null)
    {
        // validation for constraint: boolean
        if (!is_null($shared) && !is_bool($shared)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a bool, "%s" given', gettype($shared)), __LINE__);
        }
        $this->Shared = $shared;
        return $this;
    }
    /**
     * Get Username value
     * @return string|null
     */
    public function getUsername()
    {
        return $this->Username;
    }
    /**
     * Set Username value
     * @param string $username
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setUsername($username = null)
    {
        // validation for constraint: string
        if (!is_null($username) && !is_string($username)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($username)), __LINE__);
        }
        $this->Username = $username;
        return $this;
    }
    /**
     * Get Password value
     * @return string|null
     */
    public function getPassword()
    {
        return $this->Password;
    }
    /**
     * Set Password value
     * @param string $password
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setPassword($password = null)
    {
        // validation for constraint: string
        if (!is_null($password) && !is_string($password)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($password)), __LINE__);
        }
        $this->Password = $password;
        return $this;
    }
    /**
     * Get Description value
     * @return string|null
     */
    public function getDescription()
    {
        return $this->Description;
    }
    /**
     * Set Description value
     * @param string $description
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setDescription($description = null)
    {
        // validation for constraint: string
        if (!is_null($description) && !is_string($description)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($description)), __LINE__);
        }
        $this->Description = $description;
        return $this;
    }
    /**
     * Get LastName value
     * @return string|null
     */
    public function getLastName()
    {
        return $this->LastName;
    }
    /**
     * Set LastName value
     * @param string $lastName
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setLastName($lastName = null)
    {
        // validation for constraint: string
        if (!is_null($lastName) && !is_string($lastName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($lastName)), __LINE__);
        }
        $this->LastName = $lastName;
        return $this;
    }
    /**
     * Get RestName value
     * @return string|null
     */
    public function getRestName()
    {
        return $this->RestName;
    }
    /**
     * Set RestName value
     * @param string $restName
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setRestName($restName = null)
    {
        // validation for constraint: string
        if (!is_null($restName) && !is_string($restName)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($restName)), __LINE__);
        }
        $this->RestName = $restName;
        return $this;
    }
    /**
     * Get Email value
     * @return string|null
     */
    public function getEmail()
    {
        return $this->Email;
    }
    /**
     * Set Email value
     * @param string $email
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setEmail($email = null)
    {
        // validation for constraint: string
        if (!is_null($email) && !is_string($email)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($email)), __LINE__);
        }
        $this->Email = $email;
        return $this;
    }
    /**
     * Get NewSubAccountMask value
     * @return string|null
     */
    public function getNewSubAccountMask()
    {
        return $this->NewSubAccountMask;
    }
    /**
     * Set NewSubAccountMask value
     * @param string $newSubAccountMask
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
     */
    public function setNewSubAccountMask($newSubAccountMask = null)
    {
        // validation for constraint: string
        if (!is_null($newSubAccountMask) && !is_string($newSubAccountMask)) {
            throw new \InvalidArgumentException(sprintf('Invalid value, please provide a string, "%s" given', gettype($newSubAccountMask)), __LINE__);
        }
        $this->NewSubAccountMask = $newSubAccountMask;
        return $this;
    }
    /**
     * Method called when an object has been exported with var_export() functions
     * It allows to return an object instantiated with the values
     * @see AbstractStructBase::__set_state()
     * @uses AbstractStructBase::__set_state()
     * @param array $array the exported values
     * @return \Born\Mkdata\Model\Api\StructType\DPLv31User
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
