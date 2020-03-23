<?php
/**
 * Born_ImportTaxRateZone
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\ImportTaxRateZone
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */
namespace Born\ImportTaxRateZone\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Magento\Framework\App\Area;
use Magento\Framework\App\State;
use Magento\Tax\Model\Calculation\Rate;
use Magento\Tax\Model\ClassModel;

class ImportRateCommand extends Command
{

    const COUNTRY = 'country';

    protected $directoryList;
    protected $fileObj;
    protected $importHandler;
    protected $taxRateColl;
    protected $taxClassColl;
    /** @var \Magento\Framework\App\State **/
    private $state;

    public function __construct(
        State $state,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
        \Magento\Framework\Filesystem\Io\File $fileObj,
        \Magento\TaxImportExport\Model\Rate\CsvImportHandler $importHandler,
        Rate $taxRateColl,
        ClassModel $taxClassColl
    )
    {
        parent::__construct();
        $this->state = $state;
        $this->directoryList = $directoryList;
        $this->fileObj = $fileObj;
        $this->importHandler = $importHandler;
        $this->taxRateColl = $taxRateColl;
        $this->taxClassColl = $taxClassColl;
    }

    protected function configure()
    {
        $options = [
            new InputOption(
                self::COUNTRY,
                null,
                InputOption::VALUE_REQUIRED,
                'COUNTRY'
            )
        ];
        $this->setName('importTaxRateZone:import:rate')
            ->setDescription('Importing Tax Rate into Database')
        ->setDefinition($options);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->state->setAreaCode(Area::AREA_FRONTEND);
       if ($country = $input->getOption(self::COUNTRY)) {
            $filexml = "sales_tax.xml";
            if(file_exists($filexml)){
                $fileCreated = $this->_convertXmlToCsv($country,$filexml);
                if($fileCreated == ''){
                    $output->writeln("Please provide Valid file");
                }else{
                    $importOutput = $this->_importTaxRate();
                    if($importOutput == 'success'){
                        $setRule = $this->_createTaxRule($country);
                        if($setRule == 'success'){
                            $output->writeln("Import Successfully");
                            $this->_deleteImportedDir();
                        }else{
                            $output->writeln($setRule);
                        }
                    }else{
                        $output->writeln($importOutput);
                    }
                 }
            }else{
                $output->writeln("Please provide tax file in xml format with name as sales_tax.xml!");
            }
        } else {
            $output->writeln("Please provide country code !");
        }
        return $this;

    }

    /**
     * Convert tax xml file into tax csv format and store it to pub/media/ location
     * **/
    private function _convertXmlToCsv($country,$filexml){
        $filePath = "/tax/";
        $csvPath = $this->directoryList->getPath('media').$filePath;

        if (!is_dir($csvPath)) {
            $this->fileObj->mkdir($csvPath, 0775);
        }

        if(file_exists($filexml)){
            $xml = simplexml_load_file($filexml);
            $file = fopen($csvPath.'importTaxRate.csv', 'w');

            if($row = get_object_vars($xml->children()->children())){
                // First row contains column header values
                $header = array ('Code','Country','State','Zip/Post Code','Rate','Zip/Post is Range','Range From','Range To','default');
                fputcsv($file, $header,',','"');

                foreach ($xml->children() as $record) {
                    $data['Code'] = $country.'_'.$record->state.'_'.$record->zip;
                    $data['Country'] = $country;
                    $data['State'] = $record->state;
                    $data['Zip/Post Code'] = $record->zip;
                    $data['Rate'] = (max(doubleval($record->st_st),doubleval($record->co_st),doubleval($record->ci_st),doubleval($record->st_ut),doubleval($record->co_ut),doubleval($record->ci_ut)) * 100);
                    $data['Zip/Post is Range'] = '';
                    $data['Range From'] = '';
                    $data['Range To'] = '';
                    $data['default'] = '';
                    fputcsv($file, $data,',','"');
                }
                rewind($file);
                fclose($file);
                return 'success';
            }else{
                return '';
            }
        }
    }

    /**
     * Import tax rate zone in magento database
     * */
     private function _importTaxRate(){
         $filePath = "/tax/";
         $csvPath = $this->directoryList->getPath('media').$filePath;

         $csvFileImportData = array(
             'name' => "importTaxRate.csv",
             'type' => 'application/vnd.ms-excel',
             'tmp_name' => $csvPath."importTaxRate.csv",
             'error' => 0,
             'size' => filesize($csvPath."importTaxRate.csv")
         );
         try {
             $this->importHandler->importFromCsvFile($csvFileImportData);
             return 'success';
         }catch (\Magento\Framework\Exception\LocalizedException $e) {
            return $e->getMessage();
         } catch (\Exception $e) {
             return $e->getMessage();
         }
         return 'success';
     }

    /**
     * Import tax rate zone in magento database
     * **/
    private function _createTaxRule($country){
        $taxIds = array();


        $collection = $this->taxRateColl->getCollection()->addFieldToSelect('tax_calculation_rate_id')->addFieldToFilter('tax_country_id',$country);
        foreach ($collection->getData() as $data){
            $taxIds[] = $data['tax_calculation_rate_id'];
        }

        $productClsId = 0;
        $customerClsId = 0;
        foreach($this->taxClassColl->getCollection() as $tax){
            if($tax->getClassName() == "Taxable Goods" && $tax->getClassType() == "PRODUCT"){
                $productClsId =  $tax->getClassId();
            }else if($tax->getClassName() == "Retail Customer" && $tax->getClassType() == "CUSTOMER"){
                $customerClsId =  $tax->getClassId();
            }else{
                continue;
            }
        }
         try{
             $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
             $taxRule = $objectManager->create(\Magento\Tax\Model\Calculation\Rule::class);
             $taxRuleCol = $taxRule->getCollection()->addFieldToFilter('code',$country."_Rule_Retail");
             $taxRuleId = '';
             if($taxRuleCol->getSize()){
                 foreach($taxRuleCol as $tax){
                     $taxRuleId = $tax->getTaxCalculationRuleId();
                 }
             }
            if($taxRuleId){
                $taxRule->load($taxRuleId);
            }
            $taxRule->setCode($country."_Rule_Retail");
            $taxRule->setPriority(0);
            $taxRule->setCustomerTaxClassIds(array($customerClsId));
            $taxRule->setProductTaxClassIds(array($productClsId));
            $taxRule->setTaxRateIds($taxIds);
            $taxRule->save();
            return 'success';
        }catch(\Magento\Framework\Exception\LocalizedException $e) {
            return $e->getMessage();
        }catch(\Exception $e) {
            return $e->getMessage();
        }
        return '';
    }

    /*
     * Delete csv imported directory
     * */
    private function _deleteImportedDir(){
        $filePath = "/tax/";
        $csvPath = $this->directoryList->getPath('media').$filePath;
        array_map('unlink', glob("$csvPath/*.*"));
        rmdir($csvPath);
    }
}