<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Controller\Adminhtml\Locator;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Driver\File;
use Born\DealerSearchApi\Model\SearchProduct;
use Born\DealerSearchApi\Model\SearchCategory;
use Born\DealerSearchApi\Model\SearchZip;
use Born\DealerSearchApi\Model\SearchProductRestrict;
use Born\DealerSearchApi\Model\SearchMaster;
use Born\DealerSearchApi\Model\SearchMarketLine;
use Magento\Framework\Exception\LocalizedException;
use Magento\TestFramework\Inspection\Exception;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Xml\Parser;

/**
 * Class Save
 * @package Born\DealerSearchApi\Controller\Adminhtml\Locator
 */
class Save extends \Magento\Backend\App\Action
{
    /**
     * @var Filesystem
     */
    protected $filesystem;
    /**
     * @var UploaderFactory
     */
    protected $fileUploaderFactory;
    /**
     * @var File
     */
    protected $file;
    /**
     * @var SearchProduct
     */
    protected $searchProduct;
    /**
     * @var SearchCategory
     */
    protected $searchCategory;
    /**
     * @var SearchZip
     */
    protected $searchZip;
    /**
     * @var SearchProductRestrict
     */
    protected $productRestrict;
    /**
     * @var SearchMaster
     */
    protected $searchMaster;
    /**
     * @var SearchMarketLine
     */
    protected $marketLine;
    /**
     * @var Parser
     */
    protected $parser;

    /**
     * Save constructor.
     * @param Context $context
     * @param Filesystem $filesystem
     * @param File $file
     * @param UploaderFactory $fileUploaderFactory
     * @param SearchProduct $searchproduct
     * @param SearchCategory $Searchcategory
     * @param SearchZip $searchzip
     * @param SearchProductRestrict $productrestrict
     * @param SearchMaster $searchmaster
     * @param SearchMarketLine $marketline
     * @param Parser $parser
     */
    public function __construct(
    Context $context,
    Filesystem $filesystem,
    File $file,
    UploaderFactory $fileUploaderFactory,
    SearchProduct $searchproduct,
    Searchcategory $Searchcategory,
    SearchZip $searchzip,
    SearchProductRestrict $productrestrict,
    SearchMaster $searchmaster,
    SearchMarketLine $marketline,
    Parser $parser
    ) {
        parent::__construct($context);
        $this->filesystem = $filesystem;
        $this->fileUploaderFactory = $fileUploaderFactory;
        $this->file = $file;
        $this->searchProduct = $searchproduct;
        $this->searchCategory = $Searchcategory;
        $this->searchZip = $searchzip;
        $this->productRestrict = $productrestrict;
        $this->searchMaster = $searchmaster;
        $this->marketLine = $marketline;
        $this->parser = $parser;
    }


    /**
     *
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('locator/*/edit');
            return;
        }
        $model =$this->searchProduct;
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            $uploader = $this->fileUploaderFactory->create(['fileId' => 'image']);
            $uploader->setAllowedExtensions(['xml']);
            $uploader->setAllowRenameFiles(true);
            $uploader->setAllowCreateFolders(true);
            $uploader->setFilesDispersion(true);
            $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if ($uploader->checkAllowedExtension($ext)) {
                $path = $this->filesystem->getDirectoryRead(DirectoryList::MEDIA)
                        ->getAbsolutePath('born_dealersearch');
                $uploader->save($path);
                $tables= explode('.', $_FILES['image']['name']);
                $filexml=$path.$uploader->getUploadedFileName();
                $data = $this->parser->load($filexml)->xmlToArray();
                $count=0;
                switch ($tables[0]) {
                 case 'dealer_search_category':
                   foreach ($data['dealer_search_category']['row']as $row) {
                       $collection = $this->searchCategory->getCollection();
                       $collection->addFieldToFilter('dealer_cust_numb', $row['dealer_cust_numb']);
                       $collection->addFieldToFilter('category', $row['category']);
                       if ($collection->count()==0) {
                           $this->searchCategory->setData($row);
                           $this->searchCategory->save();
                           $count++;
                       }
                   }
                    break;
                case 'dealer_search_market_line':
                foreach ($data['dealer_search_market_line']['row']  as $row) {
                    $collection = $this->marketLine->getCollection();
                    $collection->addFieldToFilter('parent_account', $row['parent_account']);
                    $collection->addFieldToFilter('line_code', $row['line_code']);
                    $collection->addFieldToFilter('market_code', $row['market_code']);

                    if ($collection->count()==0) {
                        $this->marketLine->setData($row);
                        $this->marketLine->save();
                        $count++;
                    }
                }
                    break;
                case 'dealer_search_master':
                foreach ($data['dealer_search_master']['row'] as $row) {
                    $collection = $this->searchMaster->getCollection();
                    $collection->addFieldToFilter('ship_to_number', $row['ship_to_number']);
                    $collection->addFieldToFilter('dealer_cust_numb', $row['dealer_cust_numb']);
                    $collection->addFieldToFilter('parent_account', $row['parent_account']);
                    if ($collection->count()==0) {
                        $this->searchMaster->setData($row);
                        $this->searchMaster->save();
                        $count++;
                    }
                }

                    break;
                case 'dealer_search_product':
                 foreach ($data['dealer_search_product']['row'] as $row) {
                     $collection = $this->searchProduct->getCollection();
                     $collection->addFieldToFilter('product_num', $row['product_num']);
                     $collection->addFieldToFilter('line_code', $row['line_code']);
                     $collection->addFieldToFilter('market_code', $row['market_code']);
                     if ($collection->count()==0) {
                         $this->searchProduct->setData($row);
                         $this->searchProduct->save();
                         $count++;
                     }
                 }
                    break;
                case 'dealer_search_product_restrict':
                     foreach ($data['dealer_search_product_restrict']['row'] as $row) {
                         $collection = $this->productRestrict->getCollection();
                         $collection->addFieldToFilter('product_num', $row['product_num']);
                         $collection->addFieldToFilter('dealer_cust_numb', $row['dealer_cust_numb']);
                         if ($collection->count()==0) {
                             $this->productRestrict->setData($row);
                             $this->productRestrict->save();
                             $count++;
                         }
                     }
                    break;
                case 'dealer_search_zip':
                    foreach ($data['dealer_search_zip']['row'] as $row) {
                        $collection = $this->searchZip->getCollection();
                        $collection->addFieldToFilter('country', $row['country']);
                        $collection->addFieldToFilter('zip', $row['zip']);
                        $collection->addFieldToFilter('latitude', $row['latitude']);
                        $collection->addFieldToFilter('longitude', $row['longitude']);
                        if ($collection->count()==0) {
                            $this->searchZip->setData($row);
                            $this->searchZip->save();
                            $count++;
                        }
                    }
                    break;
            
                default:
                    return $this->_redirect('locator/*/edit');
            }
             
                $fileName = $uploader->getUploadedFileName();
                if ($fileName) {
                    $data['image'] = 'born_dealersearch'.$fileName;
                }
            } else {
                $this->messageManager->addError(__('Disallowed file type.'));
                return $this->redirectToEdit($model, $data);
            }
        } else {
            if (isset($data['image']['delete']) && $data['image']['delete'] == 1) {
                $data['image'] = '';
            } else {
                unset($data['image']);
            }
            return $this->_redirect('locator/*/edit');
        }

        $model->setData($data);
        try {
            $model->setStoreIds($this->getRequest()->getParam('stores', []));
            $model->save();
            $this->messageManager->addSuccess('We have uploaded '.$count .' row in table of '.$tables[0]);
            if ($this->file->isExists($filexml)) {
                $this->file->deleteFile($filexml);
            }
            $this->_getSession()->setLocator(false);
            $back = $this->getRequest()->getParam('back', false);
            if ($back == 'edit') {
                return $this->_redirect('locator/*/edit', ['id' => $model->getId(), '_current' => true, 'active_tab' => '']);
            }
            $this->_redirect('locator/*/edit');
        } catch (\Exception $e) {
            $messages = $e->getMessages();
            $this->messageManager->addMessages($messages);
            $this->redirectToEdit($model, $data);
        }
    }
    
    
    /**
     * @param Born\DealerSearchApi\Model\StoreFactory $model
     * @param array $data
     * @return void
     */
    protected function redirectToEdit($model, array $data)
    {
        $this->_getSession()->setLocator($data);
        $arguments = $model->getId() ? ['id' => $model->getId()] : [];
        $arguments = array_merge($arguments, ['_current' => true, 'active_tab' => '']);
        $this->_redirect('locator/*/edit', $arguments);
    }
}
