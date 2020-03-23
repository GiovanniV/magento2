<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */

namespace Born\DealerSearchApi\Api;

/**
 * Interface ProductNumInterface
 * @package Born\DealerSearchApi\Api
 */
interface ProductNumInterface
{
    /**
    * @param mixed $dealer_search_product
    * @return mixed
    */
    public function saveSearchProduct($dealer_search_product);
    /**
       * @param mixed $dealer_search_category
       * @return mixed
       */
    public function saveSearchCategory($dealer_search_category);
    /**
       * @param mixed $dealer_search_market_line
       * @return mixed
       */
    public function saveSearchMarketLine($dealer_search_market_line);
    /**
       * @param mixed $dealer_search_master
       * @return mixed
       */
    public function saveSearchMaster($dealer_search_master);
    /**
       * @param mixed $dealer_search_product_restrict
       * @return mixed
       */
    public function saveSearchProductRestrict($dealer_search_product_restrict);
    /**
       * @param mixed $dealer_search_zip
       * @return mixed
       */
    public function saveSearchZip($dealer_search_zip);
}
