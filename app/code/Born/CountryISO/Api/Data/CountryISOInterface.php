<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Api\Data;

interface CountryISOInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    const ISO3166_CODE = 'iso3166_code';
    const COUNTRY_ID = 'country_id';

    /**
     * Get country_id
     * @return string|null
     */
    public function getCountryId();

    /**
     * Set country_id
     * @param string $countryId
     * @return \Born\CountryISO\Api\Data\CountryISOInterface
     */
    public function setCountryId($countryId);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\CountryISO\Api\Data\CountryISOExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Born\CountryISO\Api\Data\CountryISOExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Born\CountryISO\Api\Data\CountryISOExtensionInterface $extensionAttributes
    );

    /**
     * Get iso3166_code
     * @return string|null
     */
    public function getIso3166Code();

    /**
     * Set iso3166_code
     * @param string $iso3166Code
     * @return \Born\CountryISO\Api\Data\CountryISOInterface
     */
    public function setIso3166Code($iso3166Code);
}
