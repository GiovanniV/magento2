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

namespace Born\Jobs\Model\Data;

use Born\Jobs\Api\Data\JobsInterface;
use Magento\Framework\Api\AbstractExtensibleObject;

/**
 * Class Jobs
 * @package Born\Jobs\Model\Data
 */
class Jobs extends AbstractExtensibleObject implements JobsInterface
{

    /**
     * Get row
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function getRow()
    {
        return $this->_get(self::ROW);
    }//end getRow()

    /**
     * Set row
     * @param \Born\Jobs\Api\Data\RowInterface $row
     * @return $this
     */
    public function setRow($row)
    {
        return $this->setData(self::ROW, $row);
    }//end setRow()
}//end class
