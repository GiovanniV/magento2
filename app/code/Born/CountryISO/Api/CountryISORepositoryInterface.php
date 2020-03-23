<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CountryISORepositoryInterface
 * @package Born\CountryISO\Api
 */
interface CountryISORepositoryInterface
{

    /**
     * Retrieve CountryISO
     * @param string $countryisoId
     * @return \Born\CountryISO\Api\Data\CountryISOInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($countryId);

    /**
     * @param $isoCode
     * @return mixed
     */
    public function getCountryIdByISOCode($isoCode);

    /**
     * @param $isoCode
     * @return mixed
     */
    public function getCountryModelByIsoCode($isoCode);

    /**
     * Retrieve CountryISO matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\CountryISO\Api\Data\CountryISOSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
       SearchCriteriaInterface $searchCriteria
    );
}
