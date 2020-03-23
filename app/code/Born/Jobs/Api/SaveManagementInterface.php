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

/**
 * Interface SaveManagementInterface
 * @package Born\Jobs\Api
 */
interface SaveManagementInterface
{

    /**
     * Save jobs
     * @param \Born\Jobs\Api\Data\JobsInterface $jobs JobsInterface
     * @return \Born\Jobs\Api\Data\JobsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function postSave($jobs);
}//end interface
