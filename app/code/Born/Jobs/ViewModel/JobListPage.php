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
namespace Born\Jobs\ViewModel;

use Born\Jobs\Model\JobsFactory;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class JobListPage
 * @package Born\Jobs\ViewModel
 */
class JobListPage implements ArgumentInterface
{
    /**
     * @var JobsFactory
     */
    protected $jobsFactory;

    /**
     * JobListPage constructor.
     * @param JobsFactory $jobsFactory JobsFactory
     */
    public function __construct(JobsFactory $jobsFactory)
    {
        $this->jobsFactory =  $jobsFactory;
    }

    /**
     * @return mixed
     */
    public function getJobList()
    {
        $jobs = $this->jobsFactory->create();

        return $jobs->getCollection();
    }
}
