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
 * Interface RowInterface
 * @package Born\Jobs\Api\Data
 */
interface RowInterface extends ExtensibleDataInterface
{
    const SKILLS = 'skills';
    const JOB_ID = 'job_id';
    const TITLE = 'title';
    const SCHEDULE = 'schedule';
    const DESCRIPTION = 'description';
    const OPEN_DATE = 'open_date';
    const LISTING = 'listing';
    const POSITION = 'position';
    const EDUCATION = 'education';
    const EMAIL = 'email';
    const REPORTS_TO = 'reports_to';
    const REF = 'ref';
    const DISCLAIMER = 'disclaimer';
    const ACTION = 'action';

    /**
     * Get job_id
     * @return string|null
     */
    public function getJobId();

    /**
     * Set job_id
     * @param string $jobsId
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setJobId($jobsId);

    /**
     * Get open_date
     * @return string|null
     */
    public function getOpenDate();

    /**
     * Set open_date
     * @param string $openDate
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setOpenDate($openDate);

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setEmail($email);

    /**
     * Get ref
     * @return string|null
     */
    public function getRef();

    /**
     * Set ref
     * @param string $ref
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setRef($ref);

    /**
     * Get listing
     * @return string|null
     */
    public function getListing();

    /**
     * Set listing
     * @param string $listing
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setListing($listing);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setTitle($title);

    /**
     * Get position
     * @return string|null
     */
    public function getPosition();

    /**
     * Set position
     * @param string $position
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setPosition($position);

    /**
     * Get reports_to
     * @return string|null
     */
    public function getReportsTo();

    /**
     * Set reports_to
     * @param string $reportsTo
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setReportsTo($reportsTo);

    /**
     * Get schedule
     * @return string|null
     */
    public function getSchedule();

    /**
     * Set schedule
     * @param string $schedule
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setSchedule($schedule);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setDescription($description);

    /**
     * Get skills
     * @return string|null
     */
    public function getSkills();

    /**
     * Set skills
     * @param string $skills
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setSkills($skills);

    /**
     * Get education
     * @return string|null
     */
    public function getEducation();

    /**
     * Set education
     * @param string $education
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setEducation($education);

    /**
     * Get disclaimer
     * @return string|null
     */
    public function getDisclaimer();

    /**
     * Set disclaimer
     * @param string $disclaimer
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setDisclaimer($disclaimer);

    /**
     * Get Action
     * @return string|null
     */
    public function getAction();

    /**
     * Set Action
     * @param string $action
     * @return \Born\Jobs\Api\Data\RowInterface
     */
    public function setAction($action);
}//end interface
