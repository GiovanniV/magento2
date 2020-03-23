<?php


namespace Born\Restrictions\Model\ResourceModel;

class Entity extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('born_restrictions_entity', 'entity_id');
    }
}
