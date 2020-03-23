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

use Born\Jobs\Api\Data\JobsInterface;
use Born\Jobs\Api\JobsRepositoryInterface;
use Born\Jobs\Api\SaveManagementInterface;

/**
 * Class SaveManagement
 * @package Born\Jobs\Model
 */
class SaveManagement implements SaveManagementInterface
{
    /**
     * @var JobsRepositoryInterface
     */
    protected $jobRepository;
    /**
     * @var JobsInterface
     */
    protected $jobs;
    protected $jobsModel;

    const UPINSERT = 'upsert';
    const DELETE   = 'delete';
    const SUCCESS  = 'success';
    const ERROR    = 'error';
    const JOBS     = 'jobs';

    /**
     * SaveManagement constructor.
     * @param JobsRepositoryInterface $jobsRepository JobsRepositoryInterface
     * @param JobsInterface           $jobs           JobsInterface
     * @param Jobs                    $jobsModel      jobsModel
     */
    public function __construct(
        JobsRepositoryInterface $jobsRepository,
        JobsInterface           $jobs,
        Jobs                    $jobsModel
    ) {
        $this->jobRepository = $jobsRepository;
        $this->jobs          = $jobs;
        $this->jobsModel     = $jobsModel;
    }

    /**
     * {@inheritdoc}
     */
    public function postSave($jobs)
    {
        $item = [];
        $i = 0;

        foreach ($jobs->getRow() as $row) {
            $row = $this->jobsModel->getDataModel($row);
            if ($row->getAction() == self::UPINSERT) {
                try {
                    $job = $this->jobRepository->save($row);
                    $item[$i] = $this->getItemArray($job);
                } catch (\Exception $exception) {
                    $item[$i]=$this->getItemArray($row, $exception->getMessage());
                }
            } elseif ($row->getAction() == self::DELETE) {
                try {
                    $this->jobRepository->deleteById($row->getJobId());
                    $item[$i] = $this->getItemArray($row);
                } catch (\Exception $exception) {
                    $item[$i] = $this->getItemArray($row, $exception->getMessage());
                }
            }
            $i++;
        }

        return [$item];
    }//end  postSave()

    /**
     * @param object       $row          jobRow
     * @param null/string  $errorMessage Error string
     * @return array
     */
    public function getItemArray($row, $errorMessage = null)
    {
        $item =[];
        $item['name'] = self::JOBS;
        $item['item'] = $row->getJobId();
        $item['status'] = isset($errorMessage) ? self::ERROR : self::SUCCESS;
        $item['error_description'] = $errorMessage ?? '';

        return $item;
    }//end getItemArray()
}//end class
