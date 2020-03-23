<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class SearchMaster
 * @package Born\DealerSearchApi\Model\ResourceModel
 */
class SearchMaster extends AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('dealer_search_master', 'search_master_id');
    }
}
