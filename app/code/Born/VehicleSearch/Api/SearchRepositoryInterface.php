<?php
/**
 * Born_VehicleSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VehicleSearch
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\VehicleSearch\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SearchRepositoryInterface
{

    /**
     * @param int $id
     * @return \Born\VehicleSearch\Api\Data\VehicleSearchInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param mixed $application_master
     * @return mixed
     */
    public function save($application_master);


    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Born\VehicleSearch\Api\Data\VehicleSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
