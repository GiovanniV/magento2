<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\ERPM\Model;


use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchResults;

use Born\ERPM\Api\LogRepositoryInterface;
use Born\ERPM\Api\Data\LogInterface;
use Born\ERPM\Api\Data\LogInterfaceFactory;
use Born\ERPM\Model\ResourceModel\Log as ResourceData;
use Born\ERPM\Model\ResourceModel\Log\CollectionFactory as LogCollectionFactory;


/**
 * Class LogRepository
 * @package Born\ERPM\Model
 */
class LogRepository implements LogRepositoryInterface
{
    /**
     * @var array
     */
    protected $_instances = [];
    /**
     * @var ResourceData
     */
    protected $_resource;

    /**
     * @var LogCollectionFactory
     */
    protected $_logCollectionFactory;

    /**
     * @var LogInterfaceFactory
     */
    protected $_logInterfaceFactory;

    /**
     * @var DataObjectHelper
     */
    protected $_dataObjectHelper;

    /**
     * LogRepository constructor.
     * @param ResourceData $resource
     * @param LogCollectionFactory $logCollectionFactory
     * @param LogSearchResultsInterface $logSearchResultsInterfaceFactory
     * @param LogInterface $logInterfaceFactory
     * @param DataObjectHelper $dataObjectHelper
     */
    public function __construct(
        ResourceData $resource,
        LogCollectionFactory $logCollectionFactory,
        SearchResults $logSearchResultsInterfaceFactory,
        LogInterfaceFactory $logInterfaceFactory,
        DataObjectHelper $dataObjectHelper
    )
    {
        $this->_resource = $resource;
        $this->_logCollectionFactory = $logCollectionFactory;
        $this->_logResultsFactory = $logSearchResultsInterfaceFactory;
        $this->_logInterfaceFactory = $logInterfaceFactory;
        $this->_dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param LogInterface $log
     * @return LogInterface
     * @throws CouldNotSaveException
     */
    public function save(\Born\ERPM\Api\Data\LogInterface $log)
    {
        try {
            /** @var \Magento\Framework\Model\AbstractModel|LogInterface $data */
            $this->_resource->save($log);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the Log: %1',
                $exception->getMessage()
            ));
        }
        return $log;
    }


    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return $this
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var LogSearchResultsInterface $searchResults */
        $searchResults = $this->_logResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        /** @var \Born\ERPM\Model\ResourceModel\Log\Collection $collection */
        $collection = $this->_lohCollectionFactory->create();

        //Add filters from root filter group to the collection
        /** @var FilterGroup $group */
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $sortOrders = $criteria->getSortOrders();
        /** @var SortOrder $sortOrder */
        if ($sortOrders) {
            foreach ($criteria->getSortOrders() as $sortOrder) {
                $field = $sortOrder->getField();
                $collection->addOrder(
                    $field,
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        } else {
            $field = 'id';
            $collection->addOrder($field, 'ASC');
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());

        $data = [];
        foreach ($collection as $datum) {
            $dataDataObject = $this->_logInterfaceFactory->create();
            $this->_dataObjectHelper->populateWithArray($dataDataObject, $datum->getData(), LogInterface::class);
            $data[] = $dataDataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults->setItems($data);
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteById($id)
    {
        $data = $this->getById($id);
        return $this->delete($data);
    }

    /**
     * @param $id
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        if (!isset($this->_instances[$id])) {

            /** @var LogInterface $data */
            $data = $this->_logInterfaceFactory->create();
            $this->_resource->load($data, $id);
            if (!$data->getId()) {
                throw new NoSuchEntityException(__('Requested Log doesn\'t exist'));
            }
            $this->_instances[$id] = $data;
        }
        return $this->_instances[$id];
    }

    /**
     * @param LogInterface $log
     * @return bool
     * @throws CouldNotSaveException
     * @throws StateException
     */
    public function delete(\Born\ERPM\Api\Data\LogInterface $log)
    {
        /** @var \Born\ERPM\Api\Data\LogInterface|\Magento\Framework\Model\AbstractModel $log */
        $id = $log->getId();
        try {
            unset($this->_instances[$id]);
            $this->_resource->delete($log);
        } catch (ValidatorException $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        } catch (\Exception $e) {
            throw new StateException(
                __('Unable to remove data %1', $id)
            );
        }
        unset($this->_instances[$id]);
        return true;
    }
}