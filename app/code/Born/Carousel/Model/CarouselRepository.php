<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Model;

use Born\Carousel\Api\CarouselRepositoryInterface;
use Born\Carousel\Api\Data\CarouselInterface;
use Born\Carousel\Api\Data\CarouselInterfaceFactory;
use Born\Carousel\Api\Data\CarouselSearchResultsInterfaceFactory;
use Born\Carousel\Model\ResourceModel\Carousel as ResourceData;
use Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory as CarouselCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;

use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\ValidatorException;

/**
 * Class CarouselRepository
 * @package Born\Carousel\Model
 */
class CarouselRepository implements CarouselRepositoryInterface
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
     * @var CarouselCollectionFactory
     */
    protected $_carouselCollectionFactory;

    /**
     * @var CarouselSearchResultsInterfaceFactory
     */
    protected $_carouselResultsFactory;

    /**
     * @var CarouselInterfaceFactory
     */
    protected $_carouselInterfaceFactory;

    /**
     * @var DataObjectHelper
     */
    protected $_dataObjectHelper;

    public function __construct(
        ResourceData $resource,
        CarouselCollectionFactory $carouselCollectionFactory,
        CarouselSearchResultsInterfaceFactory $carouselSearchResultsInterfaceFactory,
        CarouselInterfaceFactory $carouselInterfaceFactory,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->_resource = $resource;
        $this->_carouselCollectionFactory = $carouselCollectionFactory;
        $this->_carouselResultsFactory = $carouselSearchResultsInterfaceFactory;
        $this->_carouselInterfaceFactory = $carouselInterfaceFactory;
        $this->_dataObjectHelper = $dataObjectHelper;
    }

    /**
     * Save Carousel
     *
     * @param \Born\Carousel\Api\Data\CarouselInterface $carousel
     * @return \Born\Carousel\Api\Data\CarouselInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Born\Carousel\Api\Data\CarouselInterface $carousel)
    {
        try {
            /** @var CarouselInterface|\Magento\Framework\Model\AbstractModel $data */
            $this->_resource->save($carousel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the Carousel: %1',
                $exception->getMessage()
            ));
        }
        return $carousel;
    }

    /**
     * Retrieve carousel matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Born\Carousel\Api\Data\CarouselSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        /** @var \Born\Carousel\Api\Data\CarouselSearchResultsInterface $searchResults */
        $searchResults = $this->_carouselResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        /** @var \Born\Carousel\Model\ResourceModel\Carousel\Collection $collection */
        $collection = $this->_carouselCollectionFactory->create();

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
            $dataDataObject = $this->_carouselInterfaceFactory->create();
            $this->_dataObjectHelper->populateWithArray($dataDataObject, $datum->getData(), CarouselInterface::class);
            $data[] = $dataDataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults->setItems($data);
    }

    /**
     * Delete Carousel by ID
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id)
    {
        $data = $this->getById($id);
        return $this->delete($data);
    }

    /**
     * Retrieve the Carousel
     * @param int $id
     * @return \Born\Carousel\Api\Data\CarouselInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        if (!isset($this->_instances[$id])) {
            $data = $this->_carouselInterfaceFactory->create();
            $this->_resource->load($data, $id);
            if (!$data->getId()) {
                throw new NoSuchEntityException(__('Requested carousel doesn\'t exist'));
            }
            $this->_instances[$id] = $data;
        }
        return $this->_instances[$id];
    }

    /**
     * @param CarouselInterface $carousel
     * @return bool
     * @throws CouldNotSaveException
     * @throws StateException
     */
    public function delete(\Born\Carousel\Api\Data\CarouselInterface $carousel)
    {
        /** @var \Born\Carousel\Api\Data\CarouselInterface|\Magento\Framework\Model\AbstractModel $Carousel */
        $id = $carousel->getId();
        try {
            unset($this->_instances[$id]);
            $this->_resource->delete($carousel);
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
