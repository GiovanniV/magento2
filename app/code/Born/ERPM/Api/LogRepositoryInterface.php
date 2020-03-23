<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\ERPM\Api;


/**
 * Interface LogRepositoryInterface
 * @package Born\ERPM\Api
 */
interface LogRepositoryInterface
{
    /**
     * Save Log
     * @param \Born\ERPM\Api\Data\LogInterface $log
     * @return $this
     */
    public function save(\Born\ERPM\Api\Data\LogInterface $log);

    /**
     * Get Log by Id
     * @param $id
     * @return mixed
     */
    public function getById($id);

    /**
     * Get Log listing
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria);

    /**
     * Delete Log
     * @param \Born\ERPM\Api\Data\LogInterface $log
     * @return mixed
     */
    public function delete(\Born\ERPM\Api\Data\LogInterface $log);

    /**
     * Delete log by Id
     * @param $id
     * @return mixed
     */
    public function deleteById($id);
}
