<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Model\Data;

use Born\CountryISO\Api\Data\CountryISOInterface;

class CountryISO extends \Magento\Framework\Api\AbstractExtensibleObject implements CountryISOInterface
{
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
     * @return \Born\CountryISO\Api\Data\CountryISOInterface
     */
    public function setCountryId($countryId)
    {
        return $this->setData(self::COUNTRY_ID, $countryId);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\CountryISO\Api\Data\CountryISOExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\CountryISO\Api\Data\CountryISOExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Born\CountryISO\Api\Data\CountryISOExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get iso3166_code
     * @return string|null
     */
    public function getIso3166Code()
    {
        return $this->_get(self::ISO3166_CODE);
    }

    /**
     * Set iso3166_code
     * @param string $iso3166Code
     * @return \Born\CountryISO\Api\Data\CountryISOInterface
     */
    public function setIso3166Code($iso3166Code)
    {
        return $this->setData(self::ISO3166_CODE, $iso3166Code);
    }
}
