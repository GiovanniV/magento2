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

/**
 * Interface JobsSearchResultsInterface
 * @package Born\Jobs\Api\Data
 */
interface JobsSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get jobs list.
     * @return \Born\Jobs\Api\Data\RowInterface[]
     */
    public function getItems();

    /**
     * Set open_date list.
     * @param \Born\Jobs\Api\Data\RowInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}//end interface
