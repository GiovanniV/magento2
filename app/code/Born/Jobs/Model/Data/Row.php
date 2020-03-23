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

use Born\Jobs\Api\Data\RowInterface;
use Magento\Framework\Api\AbstractExtensibleObject;

/**
 * Class Row
 * @package Born\Jobs\Model\Data
 */
class Row extends AbstractExtensibleObject implements RowInterface
{

    /**
     * Get job_id
     * @return string|null
     */
    public function getJobId()
    {
        return $this->_get(self::JOB_ID);
    }

    /**
     * Set job_id
     * @param string $jobsId
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setJobId($jobsId)
    {
        return $this->setData(self::JOB_ID, $jobsId);
    }

    /**
     * Get open_date
     * @return string|null
     */
    public function getOpenDate()
    {
        return $this->_get(self::OPEN_DATE);
    }

    /**
     * Set open_date
     * @param string $openDate
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setOpenDate($openDate)
    {
        return $this->setData(self::OPEN_DATE, $openDate);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get ref
     * @return string|null
     */
    public function getRef()
    {
        return $this->_get(self::REF);
    }

    /**
     * Set ref
     * @param string $ref
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setRef($ref)
    {
        return $this->setData(self::REF, $ref);
    }

    /**
     * Get listing
     * @return string|null
     */
    public function getListing()
    {
        return $this->_get(self::LISTING);
    }

    /**
     * Set listing
     * @param string $listing
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setListing($listing)
    {
        return $this->setData(self::LISTING, $listing);
    }

    /**
     * Get title
     * @return string|null
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get position
     * @return string|null
     */
    public function getPosition()
    {
        return $this->_get(self::POSITION);
    }

    /**
     * Set position
     * @param string $position
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setPosition($position)
    {
        return $this->setData(self::POSITION, $position);
    }

    /**
     * Get reports_to
     * @return string|null
     */
    public function getReportsTo()
    {
        return $this->_get(self::REPORTS_TO);
    }

    /**
     * Set reports_to
     * @param string $reportsTo
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setReportsTo($reportsTo)
    {
        return $this->setData(self::REPORTS_TO, $reportsTo);
    }

    /**
     * Get schedule
     * @return string|null
     */
    public function getSchedule()
    {
        return $this->_get(self::SCHEDULE);
    }

    /**
     * Set schedule
     * @param string $schedule
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setSchedule($schedule)
    {
        return $this->setData(self::SCHEDULE, $schedule);
    }

    /**
     * Get description
     * @return string|null
     */
    public function getDescription()
    {
        return $this->_get(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get skills
     * @return string|null
     */
    public function getSkills()
    {
        return $this->_get(self::SKILLS);
    }

    /**
     * Set skills
     * @param string $skills
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setSkills($skills)
    {
        return $this->setData(self::SKILLS, $skills);
    }

    /**
     * Get education
     * @return string|null
     */
    public function getEducation()
    {
        return $this->_get(self::EDUCATION);
    }

    /**
     * Set education
     * @param string $education
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setEducation($education)
    {
        return $this->setData(self::EDUCATION, $education);
    }

    /**
     * Get disclaimer
     * @return string|null
     */
    public function getDisclaimer()
    {
        return $this->_get(self::DISCLAIMER);
    }

    /**
     * Set disclaimer
     * @param string $disclaimer
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setDisclaimer($disclaimer)
    {
        return $this->setData(self::DISCLAIMER, $disclaimer);
    }

    /**
     * Get Action
     * @return string|null
     */
    public function getAction()
    {
        return $this->_get(self::ACTION);
    }

    /**
     * Set Action
     * @param string $action
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }
}
