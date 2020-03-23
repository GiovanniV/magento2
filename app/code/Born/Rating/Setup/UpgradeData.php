<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * @author Kai Kang
 */

namespace Born\Rating\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Config\Model\ResourceModel\Config as ResourceConfig;
use Magento\Review\Model\RatingFactory;
use Magento\Store\Model\StoreRepository;
use Magento\Review\Model\Rating;


/**
 * Class UpgradeData
 *
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var ResourceConfig
     */
    protected $resourceConfig;
    /**
     * @var RatingFactory
     */
    protected $ratingFactory;
    /**
     * @var StoreRepository
     */
    protected $storeRepository;
    /**
     * @var Rating
     */
    protected $ratingModel;


    public function __construct(
        ResourceConfig $resourceConfig,
        RatingFactory $ratingFactory,
        StoreRepository $storeRepository,
        Rating $ratingModel
    )
    {
        $this->resourceConfig = $resourceConfig;
        $this->ratingFactory = $ratingFactory;
        $this->storeRepository = $storeRepository;
        $this->ratingModel = $ratingModel;
    }


    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        /*
         *  Update Rating -> Start
         */
        if(version_compare($context->getVersion(),'1.0.3') < 0) {
            $this->deleteRate();
            $storeArray = $this->getAllStoresId();
            $this->CreateNewRating($storeArray);
        }
        if(version_compare($context->getVersion(),'1.0.4') < 0) {
            for ($i = 1; $i <= 5; $i++) {
                $optionData[] = ['rating_id' => 4, 'code' => (string)$i, 'value' => $i, 'position' => $i];
            }
            $setup->getConnection()->insertMultiple($setup->getTable('rating_option'), $optionData);
        }

        $setup->endSetup();
    }

    private function deleteRate(){
        $rates = $this->ratingFactory->create()->getCollection()->addEntityFilter(
            'product'
        )->load();

        foreach ($rates as $rate){
            $rate->delete();
        }
    }

    private function getAllStoresId(){
        $storeArray = [];
        $stores = $this->storeRepository->getList();
        foreach ($stores as $store) {
            array_push($storeArray, $store["store_id"]);
        }
        return $storeArray;

    }

    private function CreateNewRating(array $storeArray){
        $this->ratingModel->setRatingCode('Rating')
            ->setPosition('0')
            ->setStores($storeArray)
            ->setIsActive(true)
            ->setEntityId('1')
            ->save();
    }
}