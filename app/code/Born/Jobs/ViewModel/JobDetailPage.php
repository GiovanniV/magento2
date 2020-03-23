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

use Born\Jobs\Api\JobsRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class JobDetailPage
 * @package Born\Jobs\ViewModel
 */
class JobDetailPage implements ArgumentInterface
{
    /**
     * @var JobsRepositoryInterface
     */
    protected $jobsRepository;

    /**
     * JobDetailPage constructor.
     * @param JobsRepositoryInterface $jobsRepository JobsRepositoryInterface
     */
    public function __construct(JobsRepositoryInterface $jobsRepository)
    {
        $this->jobsRepository =  $jobsRepository;
    }

    /**
     * @param $id
     * @return \Born\Jobs\Api\Data\RowInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getJobById($id)
    {
        return $this->jobsRepository->getById($id);
    }//end getJobById()


    public function getEmailString($job)
    {
        if (!$job->getRef()) {
            return $job->getEmail() .
                '?subject=' . $job->getPosition().'-' .$job->getRef();
        }
        return $job->getEmail().'?subject=' . $job->getPosition();
    }//end getJobById()

}//end class
