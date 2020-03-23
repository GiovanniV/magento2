<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model\Data;

use Born\DealerSearchApi\Api\Data\SearchZipInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use Born\DealerSearchApi\Api\Data\SearchZipExtensionInterface;

/**
 * Class SearchZip
 * @package Born\DealerSearchApi\Model\Data
 */
class SearchZip extends AbstractExtensibleObject implements SearchZipInterface
{

    /**
     * Get search_zip_id
     * @return string|null
     */
    public function getSearchZipId()
    {
        return $this->_get(self::SEARCH_ZIP_ID);
    }

    /**
     * Set search_zip_id
     * @param string $searchZipId
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setSearchZipId($searchZipId)
    {
        return $this->setData(self::SEARCH_ZIP_ID, $searchZipId);
    }

    /**
     * Get action
     * @return string|null
     */
    public function getAction()
    {
        return $this->_get(self::ACTION);
    }

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchZipExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchZipExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchZipExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get zip
     * @return string|null
     */
    public function getZip()
    {
        return $this->_get(self::ZIP);
    }

    /**
     * Set zip
     * @param string $zip
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setZip($zip)
    {
        return $this->setData(self::ZIP, $zip);
    }

    /**
     * Get country
     * @return string|null
     */
    public function getCountry()
    {
        return $this->_get(self::COUNTRY);
    }

    /**
     * Set country
     * @param string $country
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
    }

    /**
     * Get latitude
     * @return string|null
     */
    public function getLatitude()
    {
        return $this->_get(self::LATITUDE);
    }

    /**
     * Set latitude
     * @param string $latitude
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setLatitude($latitude)
    {
        return $this->setData(self::LATITUDE, $latitude);
    }

    /**
     * Get longitude
     * @return string|null
     */
    public function getLongitude()
    {
        return $this->_get(self::LONGITUDE);
    }

    /**
     * Set longitude
     * @param string $longitude
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setLongitude($longitude)
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }
}
