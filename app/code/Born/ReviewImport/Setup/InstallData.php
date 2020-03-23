<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ReviewImport\Setup;

use Born\WebsiteStoreCreator\Model\StoreRelation;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\App\Area;
use Magento\Framework\App\State;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Xml\Parser;
use Magento\Review\Model\RatingFactory;
use Magento\Review\Model\Review;
use Magento\Review\Model\ReviewFactory;

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
     * @var ReviewFactory
     */
    private $reviewFactory;

    /**
     * @var RatingFactory
     */
    private $ratingFactory;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var StoreRelation
     */
    private $storeRelation;

    /**
     * @var State
     */
    private $state;

    /**
     * InstallData constructor.
     * @param Parser $xmlParser
     * @param Reader $moduleDirReader
     * @param ReviewFactory $reviewFactory
     * @param RatingFactory $ratingFactory
     * @param ProductRepositoryInterface $productRepository
     * @param StoreRelation $storeRelation
     * @param State $state
     */
    public function __construct(
        Parser $xmlParser,
        Reader $moduleDirReader,
        ReviewFactory $reviewFactory,
        RatingFactory $ratingFactory,
        ProductRepositoryInterface $productRepository,
        StoreRelation $storeRelation,
        State $state
    ) {
        $this->xmlParser = $xmlParser;
        $this->moduleDirReader = $moduleDirReader;
        $this->reviewFactory = $reviewFactory;
        $this->ratingFactory = $ratingFactory;
        $this->productRepository = $productRepository;
        $this->storeRelation = $storeRelation;
        $this->state = $state;
    }

    /*
     * @param  ModuleDataSetupInterface $setup
     * @param  ModuleContextInterface $context
     * @return void
     */
    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->state->setAreaCode(Area::AREA_ADMINHTML);
        $setup->startSetup();
        $filePath = $this->moduleDirReader->getModuleDir('', 'Born_ReviewImport')
            . '/Setup/import/product_review.xml';
        $parsedArray = $this->xmlParser->load($filePath)->xmlToArray();
//        foreach ($parsedArray['product_review']['row'] as $reviewArray) {
//            if (!isset($reviewArray['name'])
//                || !isset($reviewArray['message'])
//                || !isset($reviewArray['product_number'])
//                || !isset($reviewArray['ship_to_number'])
//            ) {
//                continue;
//            }
//            try {
//                $sku = strtoupper($reviewArray['product_number']);
//                $product = $this->productRepository->get($sku);
//            } catch (NoSuchEntityException $exception) {
//                continue;
//            }
//
//            $productId = $product->getId();
//            if (isset($reviewArray['user_rating'])) {
//                $reviewFinalData['ratings'][4] = 5;
//            }
//
//            $reviewFinalData['nickname'] = $reviewArray['name'];
//            $reviewFinalData['title'] = ($reviewArray['location'] ? $reviewArray['location'] : $reviewArray['name']);
//            $reviewFinalData['detail'] = $reviewArray['message'];
//            $review = $this->reviewFactory->create()->setData($reviewFinalData);
//            $review->unsetData('review_id');
//            $review->setEntityId($review->getEntityIdByCode(Review::ENTITY_PRODUCT_CODE))
//                ->setEntityPkValue($productId)
//                ->setStatusId(Review::STATUS_APPROVED)
//                ->setStoreId($this->storeRelation->getStoreIdByShipToNumber($reviewArray['ship_to_number']))
//                ->setStores([$this->storeRelation->getStoreIdByShipToNumber($reviewArray['ship_to_number'])])
//                ->save();
//
//            if (isset($reviewArray['user_rating'])) {
//                foreach ($reviewFinalData['ratings'] as $ratingId => $optionId) {
//                    $this->ratingFactory->create()
//                        ->setRatingId($ratingId)
//                        ->setReviewId($review->getId())
//                        ->addOptionVote($optionId, $productId);
//                }
//            }
//            $review->aggregate();
//        }
        $setup->endSetup();
    }
}
