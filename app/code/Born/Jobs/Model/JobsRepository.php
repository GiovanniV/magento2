<?php
/**
 * Born_jobs
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\Jobs
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 * @link      https://www.knfilters.com/
 */

namespace Born\Jobs\Model;

use Born\Jobs\Api\Data\JobsInterfaceFactory;
use Born\Jobs\Api\Data\JobsSearchResultsInterfaceFactory;
use Born\Jobs\Api\Data\RowInterface;
use Born\Jobs\Api\JobsRepositoryInterface;
use Born\Jobs\Model\ResourceModel\Jobs as ResourceJobs;
use Born\Jobs\Model\ResourceModel\Jobs\CollectionFactory as JobsCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class JobsRepository
 * @package Born\Jobs\Model
 */
class JobsRepository implements JobsRepositoryInterface
{
    private $collectionProcessor;
    /**
     * @var ExtensibleDataObjectConverter
     */
    protected $extensibleDataObjectConverter;
    /**
     * @var JoinProcessorInterface
     */
    protected $extensionAttributesJoinProcessor;
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    /**
     * @var JobsFactory
     */
    protected $jobsFactory;
    /**
     * @var ResourceJobs
     */
    protected $resource;
    /**
     * @var JobsInterfaceFactory
     */
    protected $dataJobsFactory;
    /**
     * @var JobsSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @var DataObjectProcessor
     */
    protected $dataObjectProcessor;
    /**
     * @var JobsCollectionFactory
     */
    protected $jobsCollectionFactory;
    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param ResourceJobs                      $resource                         ResourceJobs
     * @param JobsFactory                       $jobsFactory                      JobsFactory
     * @param JobsInterfaceFactory              $dataJobsFactory                  JobsInterfaceFactory
     * @param JobsCollectionFactory             $jobsCollectionFactory            JobsCollectionFactory
     * @param JobsSearchResultsInterfaceFactory $searchResultsFactory             JobsSearchResultsInterfaceFactory
     * @param DataObjectHelper                  $dataObjectHelper                 DataObjectHelper
     * @param DataObjectProcessor               $dataObjectProcessor              DataObjectProcessor
     * @param StoreManagerInterface             $storeManager                     StoreManagerInterface
     * @param CollectionProcessorInterface      $collectionProcessor              CollectionProcessorInterface
     * @param JoinProcessorInterface            $extensionAttributesJoinProcessor JoinProcessorInterface
     * @param ExtensibleDataObjectConverter     $extensibleDataObjectConverter    ExtensibleDataObjectConverter
     */
    public function __construct(
        ResourceJobs $resource,
        JobsFactory $jobsFactory,
        JobsInterfaceFactory $dataJobsFactory,
        JobsCollectionFactory $jobsCollectionFactory,
        JobsSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->jobsFactory = $jobsFactory;
        $this->jobsCollectionFactory = $jobsCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataJobsFactory = $dataJobsFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(RowInterface $row)
    {
        $jobsData = $this->extensibleDataObjectConverter->toNestedArray(
            $row,
            [],
            \Born\Jobs\Api\Data\RowInterface::class
        );

        $jobsModel = $this->jobsFactory->create()->setData($jobsData);

        try {
            $this->resource->save($jobsModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the jobs: %1',
                $exception->getMessage()
            ));
        }
        return $jobsModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getById($jobsId)
    {
        $jobs = $this->jobsFactory->create();
        $this->resource->load($jobs, $jobsId);
        if (!$jobs->getId()) {
            throw new NoSuchEntityException(__('jobs with id "%1" does not exist.', $jobsId));
        }
        return $jobs->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->jobsCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Born\Jobs\Api\Data\JobsInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(RowInterface $jobs)
    {
        try {
            $jobsModel = $this->jobsFactory->create();
            $this->resource->load($jobsModel, $jobs->getJobId());
            $this->resource->delete($jobsModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the jobs: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($jobsId)
    {
        return $this->delete($this->getById($jobsId));
    }
}//end class
