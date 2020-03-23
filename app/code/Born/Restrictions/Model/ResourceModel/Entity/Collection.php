<?php


namespace Born\Restrictions\Model\ResourceModel\Entity;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Born\Restrictions\Model\Entity::class,
            \Born\Restrictions\Model\ResourceModel\Entity::class
        );
    }
}
