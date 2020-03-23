<?php


namespace Born\Restrictions\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface EntityRepositoryInterface
{

    /**
     * Save Entity
     * @param \Born\Restrictions\Api\Data\EntityInterface $entity
     * @return \Born\Restrictions\Api\Data\EntityInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Born\Restrictions\Api\Data\EntityInterface $entity
    );

    /**
     * Retrieve Entity
     * @param string $entityId
     * @return \Born\Restrictions\Api\Data\EntityInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($entityId);

    /**
     * Retrieve Entity matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\Restrictions\Api\Data\EntitySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Entity
     * @param \Born\Restrictions\Api\Data\EntityInterface $entity
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Born\Restrictions\Api\Data\EntityInterface $entity
    );

    /**
     * Delete Entity by ID
     * @param string $entityId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($entityId);
}
