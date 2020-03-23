<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Model\Data;

use Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface;

class StoreShipTo extends \Magento\Framework\Api\AbstractExtensibleObject implements StoreShipToInterface
{
    /**
     * Get storeshipto_id
     * @return string|null
     */
    public function getShiptoId()
    {
        return $this->_get(self::SHIPTO_ID);
    }

    /**
     * Set storeshipto_id
     * @param string $shiptoId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setShiptoId($shiptoId)
    {
        return $this->setData(self::SHIPTO_ID, $shiptoId);
    }

    /**
     * Get website_id
     * @return string|null
     */
    public function getWebsiteId()
    {
        return $this->_get(self::WEBSITE_ID);
    }

    /**
     * Set website_id
     * @param string $websiteId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setWebsiteId($websiteId)
    {
        return $this->setData(self::WEBSITE_ID, $websiteId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\WebsiteStoreCreator\Api\Data\StoreShipToExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Born\WebsiteStoreCreator\Api\Data\StoreShipToExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get store_shipto
     * @return string|null
     */
    public function getStoreShipto()
    {
        return $this->_get(self::STORE_SHIPTO);
    }

    /**
     * Set store_shipto
     * @param string $storeShipto
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setStoreShipto($storeShipto)
    {
        return $this->setData(self::STORE_SHIPTO, $storeShipto);
    }

    /**
     * Get ship_to_number
     * @return string|null
     */
    public function getShipToNumber()
    {
        return $this->_get(self::SHIP_TO_NUMBER);
    }

    /**
     * Set ship_to_number
     * @param string $shipToNumber
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setShipToNumber($shipToNumber)
    {
        return $this->setData(self::SHIP_TO_NUMBER, $shipToNumber);
    }

    /**
     * Get country_id
     * @return string|null
     */
    public function getCountryId()
    {
        return $this->_get(self::COUNTRY_ID);
    }

    /**
     * Set country_id
     * @param string $countryId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setCountryId($countryId)
    {
        return $this->setData(self::COUNTRY_ID, $countryId);
    }

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone()
    {
        return $this->_get(self::PHONE);
    }

    /**
     * Set phone
     * @param string $phone
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get facility
     * @return string|null
     */
    public function getFacility()
    {
        return $this->_get(self::FACILITY);
    }

    /**
     * Set facility
     * @param string $facility
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setFacility($facility)
    {
        return $this->setData(self::FACILITY, $facility);
    }
}
