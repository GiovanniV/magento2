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

namespace Born\Jobs\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Interface JobsInterface
 * @package Born\Jobs\Api\Data
 */
interface JobsInterface extends ExtensibleDataInterface
{
    const ROW = 'row';

    /**
     * Get Row
     * @return mixed
     */
    public function getRow();

    /**
     * Set Row
     * @param \Born\Jobs\Api\Data\RowInterface $row RowInterface
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setRow($row);
}//end interface
