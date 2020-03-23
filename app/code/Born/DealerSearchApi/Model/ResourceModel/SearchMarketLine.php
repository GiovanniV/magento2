<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class SearchMarketLine
 * @package Born\DealerSearchApi\Model\ResourceModel
 */
class SearchMarketLine extends AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('dealer_search_market_line', 'search_market_line_id');
    }
}
