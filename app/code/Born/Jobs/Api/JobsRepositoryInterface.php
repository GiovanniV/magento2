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

namespace Born\Jobs\Api;

use Born\Jobs\Api\Data\RowInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface JobsRepositoryInterface
 * @package Born\Jobs\Api
 */
interface JobsRepositoryInterface
{

    /**
     * Save jobs
     * @param \Born\Jobs\Api\Data\RowInterface $jobs
     * @return \Born\Jobs\Api\Data\RowInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(RowInterface $jobs);

    /**
     * Retrieve job
     * @param string $jobsId
     * @return \Born\Jobs\Api\Data\RowInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($jobsId);

    /**
     * Retrieve jobs matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\Jobs\Api\Data\JobsSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete jobs
     * @param \Born\Jobs\Api\Data\RowInterface $jobs
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(RowInterface $jobs);

    /**
     * Delete jobs by ID
     * @param string $jobsId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($jobsId);
}//end interface
