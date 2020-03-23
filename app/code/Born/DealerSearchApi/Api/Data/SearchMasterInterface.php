<?php

/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;
use Born\DealerSearchApi\Api\Data\SearchMasterExtensionInterface;

interface SearchMasterInterface extends ExtensibleDataInterface
{
    const LONGITUDE = 'longitude';
    const MARKET_CODE = 'market_code';
    const DEALER_CUST_NUMB = 'dealer_cust_numb';
    const URL = 'url';
    const CITY = 'city';
    const ACTION = 'action';
    const SHIP_TO_NUMBER = 'ship_to_number';
    const STATE = 'state';
    const INSTALLER = 'installer';
    const ADDRESS2 = 'address2';
    const NAME = 'name';
    const SEARCH_MASTER_ID = 'search_master_id';
    const ZIP = 'zip';
    const URL_PART = 'url_part';
    const ADDRESS1 = 'address1';
    const PHONE = 'phone';
    const COUNTRY = 'country';
    const GOOGLE_MAP = 'google_map';
    const PARENT_ACCOUNT = 'parent_account';
    const LATITUDE = 'latitude';
    const CONSUMER_URL = 'consumer_url';
    const PRODUCT_NUM = 'product_num';
    const LINE_CODE = 'line_code';
    const FAX = 'fax';
    const CONSUMER_EMAIL = 'consumer_email';

    /**
     * Get search_master_id
     * @return string|null
     */
    public function getSearchMasterId();

    /**
     * Set search_master_id
     * @param string $searchMasterId
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setSearchMasterId($searchMasterId);

    /**
     * Get action
     * @return string|null
     */
    public function getAction();

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setAction($action);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchMasterExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchMasterExtensionInterface $extensionAttributes);

    /**
     * Get ship_to_number
     * @return string|null
     */
    public function getShipToNumber();

    /**
     * Set ship_to_number
     * @param string $shipToNumber
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setShipToNumber($shipToNumber);

    /**
     * Get dealer_cust_numb
     * @return string|null
     */
    public function getDealerCustNumb();

    /**
     * Set dealer_cust_numb
     * @param string $dealerCustNumb
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setDealerCustNumb($dealerCustNumb);

    /**
     * Get parent_account
     * @return string|null
     */
    public function getParentAccount();

    /**
     * Set parent_account
     * @param string $parentAccount
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setParentAccount($parentAccount);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setName($name);

    /**
     * Get address1
     * @return string|null
     */
    public function getAddress1();

    /**
     * Set address1
     * @param string $address1
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setAddress1($address1);

    /**
     * Get address2
     * @return string|null
     */
    public function getAddress2();

    /**
     * Set address2
     * @param string $address2
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setAddress2($address2);

    /**
     * Get city
     * @return string|null
     */
    public function getCity();

    /**
     * Set city
     * @param string $city
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setCity($city);

    /**
     * Get state
     * @return string|null
     */
    public function getState();

    /**
     * Set state
     * @param string $state
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setState($state);

    /**
     * Get zip
     * @return string|null
     */
    public function getZip();

    /**
     * Set zip
     * @param string $zip
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setCountry($country);

    /**
     * Get phone
     * @return string|null
     */
    public function getPhone();

    /**
     * Set phone
     * @param string $phone
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setPhone($phone);

    /**
     * Get fax
     * @return string|null
     */
    public function getFax();

    /**
     * Set fax
     * @param string $fax
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setFax($fax);

    /**
     * Get installer
     * @return string|null
     */
    public function getInstaller();

    /**
     * Set installer
     * @param string $installer
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setInstaller($installer);

    /**
     * Get url
     * @return string|null
     */
    public function getUrl();

    /**
     * Set url
     * @param string $url
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setUrl($url);

    /**
     * Get url_part
     * @return string|null
     */
    public function getUrlPart();

    /**
     * Set url_part
     * @param string $urlPart
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setUrlPart($urlPart);

    /**
     * Get latitude
     * @return string|null
     */
    public function getLatitude();

    /**
     * Set latitude
     * @param string $latitude
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setLongitude($longitude);

    /**
     * Get google_map
     * @return string|null
     */
    public function getGoogleMap();

    /**
     * Set google_map
     * @param string $googleMap
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setGoogleMap($googleMap);

    /**
     * Get consumer_email
     * @return string|null
     */
    public function getConsumerEmail();

    /**
     * Set consumer_email
     * @param string $consumerEmail
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setConsumerEmail($consumerEmail);

    /**
     * Get consumer_url
     * @return string|null
     */
    public function getConsumerUrl();

    /**
     * Set consumer_url
     * @param string $consumerUrl
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setConsumerUrl($consumerUrl);

    /**
     * Get product_num
     * @return string|null
     */
    public function getProductNum();

    /**
     * Set product_num
     * @param string $productNum
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setProductNum($productNum);

    /**
     * Get line_code
     * @return string|null
     */
    public function getLineCode();

    /**
     * Set line_code
     * @param string $lineCode
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setLineCode($lineCode);

    /**
     * Get market_code
     * @return string|null
     */
    public function getMarketCode();

    /**
     * Set market_code
     * @param string $marketCode
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setMarketCode($marketCode);
}
