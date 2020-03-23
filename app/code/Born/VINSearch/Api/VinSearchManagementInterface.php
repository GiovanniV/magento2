<?php
/**
 * Born_VINSearch
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\VINSearch
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\VINSearch\Api;

interface VinSearchManagementInterface
{

    /**
     * GET for test api
     * @param void
     * @return string
     */
    public function getByVin();
}
