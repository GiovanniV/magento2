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

use Born\Jobs\Api\Data\RowInterface;
use Born\Jobs\Api\Data\RowInterfaceFactory;
use Born\Jobs\Model\ResourceModel\Jobs as JobResource;
use Born\Jobs\Model\ResourceModel\Jobs\Collection;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;

/**
 * Class Jobs
 * @package Born\Jobs\Model
 */
class Jobs extends AbstractModel
{
    /**
     * @var RowInterfaceFactory
     */
    protected $jobsDataFactory;
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;
    protected $_eventPrefix = 'born_jobs';

    /**
     * Jobs constructor.
     * @param Context             $context            Context
     * @param Registry            $registry           Registry
     * @param RowInterfaceFactory $jobsDataFactory    RowInterfaceFactory
     * @param DataObjectHelper    $dataObjectHelper   DataObjectHelper
     * @param JobResource         $resource           JobResource
     * @param Collection          $resourceCollection Collection
     * @param array               $data               array
     */
    public function __construct(
        Context $context,
        Registry $registry,
        RowInterfaceFactory $jobsDataFactory,
        DataObjectHelper $dataObjectHelper,
        JobResource $resource,
        Collection $resourceCollection,
        array $data = []
    ) {
        $this->jobsDataFactory = $jobsDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }//end __construct()

    /**
     * Retrieve jobs model with jobs data
     * @return RowInterface
     */
    public function getDataModel($jobsData = null)
    {
        $jobsData = $jobsData ?? $this->getData();

        $jobsDataObject = $this->jobsDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $jobsDataObject,
            $jobsData,
            RowInterface::class
        );

        return $jobsDataObject;
    }//end getDataModel()
}//end class
