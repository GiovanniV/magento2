<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Born\DealerSearchApi\Api\Data\SearchZipExtensionInterface;

interface SearchZipInterface extends ExtensibleDataInterface
{
    const ZIP = 'zip';
    const LONGITUDE = 'longitude';
    const ACTION = 'action';
    const SEARCH_ZIP_ID = 'search_zip_id';
    const COUNTRY = 'country';
    const LATITUDE = 'latitude';

    /**
     * Get search_zip_id
     * @return string|null
     */
    public function getSearchZipId();

    /**
     * Set search_zip_id
     * @param string $searchZipId
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setSearchZipId($searchZipId);

    /**
     * Get action
     * @return string|null
     */
    public function getAction();

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setAction($action);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchZipExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchZipExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchZipExtensionInterface $extensionAttributes);

    /**
     * Get zip
     * @return string|null
     */
    public function getZip();

    /**
     * Set zip
     * @param string $zip
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setZip($zip);

    /**
     * Get country
     * @return string|null
     */
    public function getCountry();

    /**
     * Set country
     * @param string $country
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setCountry($country);

    /**
     * Get latitude
     * @return string|null
     */
    public function getLatitude();

    /**
     * Set latitude
     * @param string $latitude
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setLatitude($latitude);

    /**
     * Get longitude
     * @return string|null
     */
    public function getLongitude();

    /**
     * Set longitude
     * @param string $longitude
     * @return \Born\DealerSearchApi\Api\Data\SearchZipInterface
     */
    public function setLongitude($longitude);
}
