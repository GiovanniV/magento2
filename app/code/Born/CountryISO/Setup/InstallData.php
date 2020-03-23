<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\CountryISO\Setup;

use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Xml\Parser;

/**
 * Class InstallData
 * @package Born\ReviewImport\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var Parser
     */
    private $xmlParser;

    /**
     * @var Reader
     */
    private $moduleDirReader;

    /**
     * InstallData constructor.
     * @param Parser $xmlParser
     * @param Reader $moduleDirReader
     */
    public function __construct(
        Parser $xmlParser,
        Reader $moduleDirReader
    ) {
        $this->xmlParser = $xmlParser;
        $this->moduleDirReader = $moduleDirReader;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();
        $data = [];
        $filePath = $this->moduleDirReader->getModuleDir('', 'Born_CountryISO')
            . '/Setup/import/countries.xml';
        $parsedArray = $this->xmlParser->load($filePath)->xmlToArray();
        foreach ($parsedArray['countries']['country'] as $country) {
            $data[] = [$country['_attribute']['alpha-2'],  $country['_attribute']['country-code']];
        }
        $columns = ['country_id', 'iso3166_code'];
        $setup->getConnection()->insertArray($setup->getTable('kn_country_iso'), $columns, $data);
        $setup->endSetup();
    }
}
