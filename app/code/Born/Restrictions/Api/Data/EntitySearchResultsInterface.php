<?php


namespace Born\Restrictions\Api\Data;

interface EntitySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Entity list.
     * @return \Born\Restrictions\Api\Data\EntityInterface[]
     */
    public function getItems();

    /**
     * Set firstname list.
     * @param \Born\Restrictions\Api\Data\EntityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
