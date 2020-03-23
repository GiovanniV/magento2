<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\WebsiteStoreCreator\Api\Data;

interface StoreShipToInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const FACILITY = 'facility';
    const COUNTRY_ID = 'country_id';
    const STORE_SHIPTO = 'store_shipto';
    const SHIP_TO_NUMBER = 'ship_to_number';
    const WEBSITE_ID = 'website_id';
    const PHONE = 'phone';
    const SHIPTO_ID = 'shipto_id';
    const EMAIL = 'email';

    /**
     * Get storeshipto_id
     * @return string|null
     */
    public function getShiptoId();

    /**
     * Set storeshipto_id
     * @param string $shiptoId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setShiptoId($shiptoId);

    /**
     * Get website_id
     * @return string|null
     */
    public function getWebsiteId();

    /**
     * Set website_id
     * @param string $websiteId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setWebsiteId($websiteId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\WebsiteStoreCreator\Api\Data\StoreShipToExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Born\WebsiteStoreCreator\Api\Data\StoreShipToExtensionInterface $extensionAttributes
    );

    /**
     * Get store_shipto
     * @return string|null
     */
    public function getStoreShipto();

    /**
     * Set store_shipto
     * @param string $storeShipto
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setStoreShipto($storeShipto);

    /**
     * Get ship_to_number
     * @return string|null
     */
    public function getShipToNumber();

    /**
     * Set ship_to_number
     * @param string $shipToNumber
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setShipToNumber($shipToNumber);

    /**
     * Get country_id
     * @return string|null
     */
    public function getCountryId();

    /**
     * Set country_id
     * @param string $countryId
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setCountryId($countryId);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setPhone($phone);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setEmail($email);

    /**
     * Get facility
     * @return string|null
     */
    public function getFacility();

    /**
     * Set facility
     * @param string $facility
     * @return \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface
     */
    public function setFacility($facility);
}
