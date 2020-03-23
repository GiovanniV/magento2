<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model\Data;

use Born\DealerSearchApi\Api\Data\SearchMasterInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use Born\DealerSearchApi\Api\Data\SearchMasterExtensionInterface;

/**
 * Class SearchMaster
 * @package Born\DealerSearchApi\Model\Data
 */
class SearchMaster extends AbstractExtensibleObject implements SearchMasterInterface
{

    /**
     * Get search_master_id
     * @return string|null
     */
    public function getSearchMasterId()
    {
        return $this->_get(self::SEARCH_MASTER_ID);
    }

    /**
     * Set search_master_id
     * @param string $searchMasterId
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setSearchMasterId($searchMasterId)
    {
        return $this->setData(self::SEARCH_MASTER_ID, $searchMasterId);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchMasterExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchMasterExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setShipToNumber($shipToNumber)
    {
        return $this->setData(self::SHIP_TO_NUMBER, $shipToNumber);
    }

    /**
     * Get dealer_cust_numb
     * @return string|null
     */
    public function getDealerCustNumb()
    {
        return $this->_get(self::DEALER_CUST_NUMB);
    }

    /**
     * Set dealer_cust_numb
     * @param string $dealerCustNumb
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setDealerCustNumb($dealerCustNumb)
    {
        return $this->setData(self::DEALER_CUST_NUMB, $dealerCustNumb);
    }

    /**
     * Get parent_account
     * @return string|null
     */
    public function getParentAccount()
    {
        return $this->_get(self::PARENT_ACCOUNT);
    }

    /**
     * Set parent_account
     * @param string $parentAccount
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setParentAccount($parentAccount)
    {
        return $this->setData(self::PARENT_ACCOUNT, $parentAccount);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get address1
     * @return string|null
     */
    public function getAddress1()
    {
        return $this->_get(self::ADDRESS1);
    }

    /**
     * Set address1
     * @param string $address1
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setAddress1($address1)
    {
        return $this->setData(self::ADDRESS1, $address1);
    }

    /**
     * Get address2
     * @return string|null
     */
    public function getAddress2()
    {
        return $this->_get(self::ADDRESS2);
    }

    /**
     * Set address2
     * @param string $address2
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setAddress2($address2)
    {
        return $this->setData(self::ADDRESS2, $address2);
    }

    /**
     * Get city
     * @return string|null
     */
    public function getCity()
    {
        return $this->_get(self::CITY);
    }

    /**
     * Set city
     * @param string $city
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get state
     * @return string|null
     */
    public function getState()
    {
        return $this->_get(self::STATE);
    }

    /**
     * Set state
     * @param string $state
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setState($state)
    {
        return $this->setData(self::STATE, $state);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setCountry($country)
    {
        return $this->setData(self::COUNTRY, $country);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setPhone($phone)
    {
        return $this->setData(self::PHONE, $phone);
    }

    /**
     * Get fax
     * @return string|null
     */
    public function getFax()
    {
        return $this->_get(self::FAX);
    }

    /**
     * Set fax
     * @param string $fax
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setFax($fax)
    {
        return $this->setData(self::FAX, $fax);
    }

    /**
     * Get installer
     * @return string|null
     */
    public function getInstaller()
    {
        return $this->_get(self::INSTALLER);
    }

    /**
     * Set installer
     * @param string $installer
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setInstaller($installer)
    {
        return $this->setData(self::INSTALLER, $installer);
    }

    /**
     * Get url
     * @return string|null
     */
    public function getUrl()
    {
        return $this->_get(self::URL);
    }

    /**
     * Set url
     * @param string $url
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setUrl($url)
    {
        return $this->setData(self::URL, $url);
    }

    /**
     * Get url_part
     * @return string|null
     */
    public function getUrlPart()
    {
        return $this->_get(self::URL_PART);
    }

    /**
     * Set url_part
     * @param string $urlPart
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setUrlPart($urlPart)
    {
        return $this->setData(self::URL_PART, $urlPart);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setLongitude($longitude)
    {
        return $this->setData(self::LONGITUDE, $longitude);
    }

    /**
     * Get google_map
     * @return string|null
     */
    public function getGoogleMap()
    {
        return $this->_get(self::GOOGLE_MAP);
    }

    /**
     * Set google_map
     * @param string $googleMap
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setGoogleMap($googleMap)
    {
        return $this->setData(self::GOOGLE_MAP, $googleMap);
    }

    /**
     * Get consumer_email
     * @return string|null
     */
    public function getConsumerEmail()
    {
        return $this->_get(self::CONSUMER_EMAIL);
    }

    /**
     * Set consumer_email
     * @param string $consumerEmail
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setConsumerEmail($consumerEmail)
    {
        return $this->setData(self::CONSUMER_EMAIL, $consumerEmail);
    }

    /**
     * Get consumer_url
     * @return string|null
     */
    public function getConsumerUrl()
    {
        return $this->_get(self::CONSUMER_URL);
    }

    /**
     * Set consumer_url
     * @param string $consumerUrl
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setConsumerUrl($consumerUrl)
    {
        return $this->setData(self::CONSUMER_URL, $consumerUrl);
    }

    /**
     * Get product_num
     * @return string|null
     */
    public function getProductNum()
    {
        return $this->_get(self::PRODUCT_NUM);
    }

    /**
     * Set product_num
     * @param string $productNum
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setProductNum($productNum)
    {
        return $this->setData(self::PRODUCT_NUM, $productNum);
    }

    /**
     * Get line_code
     * @return string|null
     */
    public function getLineCode()
    {
        return $this->_get(self::LINE_CODE);
    }

    /**
     * Set line_code
     * @param string $lineCode
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setLineCode($lineCode)
    {
        return $this->setData(self::LINE_CODE, $lineCode);
    }

    /**
     * Get market_code
     * @return string|null
     */
    public function getMarketCode()
    {
        return $this->_get(self::MARKET_CODE);
    }

    /**
     * Set market_code
     * @param string $marketCode
     * @return \Born\DealerSearchApi\Api\Data\SearchMasterInterface
     */
    public function setMarketCode($marketCode)
    {
        return $this->setData(self::MARKET_CODE, $marketCode);
    }
}
