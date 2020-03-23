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

namespace Born\Jobs\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * @param SchemaSetupInterface   $setup   SchemaSetupInterface
     * @param ModuleContextInterface $context ModuleContextInterface
     * @throws \Zend_Db_Exception
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $jobsTable = $setup->getConnection()->newTable($setup->getTable('kn_jobs'));

        $jobsTable->addColumn(
            'job_id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true,'nullable' => false,'primary' => true,'unsigned' => true],
            'Entity ID'
        );

        $jobsTable->addColumn(
            'open_date',
            Table::TYPE_DATE,
            null,
            [],
            'open_date'
        );

        $jobsTable->addColumn(
            'email',
            Table::TYPE_TEXT,
            null,
            [],
            'email'
        );

        $jobsTable->addColumn(
            'ref',
            Table::TYPE_TEXT,
            null,
            [],
            'ref'
        );

        $jobsTable->addColumn(
            'listing',
            Table::TYPE_TEXT,
            null,
            [],
            'listing'
        );

        $jobsTable->addColumn(
            'title',
            Table::TYPE_TEXT,
            null,
            [],
            'title'
        );

        $jobsTable->addColumn(
            'position',
            Table::TYPE_TEXT,
            null,
            [],
            'position'
        );

        $jobsTable->addColumn(
            'reports_to',
            Table::TYPE_TEXT,
            null,
            [],
            'reports_to'
        );

        $jobsTable->addColumn(
            'schedule',
            Table::TYPE_TEXT,
            null,
            [],
            'schedule'
        );

        $jobsTable->addColumn(
            'description',
            Table::TYPE_TEXT,
            null,
            [],
            'description'
        );

        $jobsTable->addColumn(
            'skills',
            Table::TYPE_TEXT,
            null,
            [],
            'skills'
        );

        $jobsTable->addColumn(
            'education',
            Table::TYPE_TEXT,
            null,
            [],
            'education'
        );

        $jobsTable->addColumn(
            'disclaimer',
            Table::TYPE_TEXT,
            null,
            [],
            'disclaimer'
        );

        $setup->getConnection()->createTable($jobsTable);
    }
}
