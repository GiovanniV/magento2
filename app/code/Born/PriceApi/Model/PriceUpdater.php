<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\PriceApi\Model;

use Born\WebsiteStoreCreator\Api\StoreShipToManagementInterface;
use Magento\Catalog\Api\BasePriceStorageInterface;
use Magento\Catalog\Api\Data\BasePriceInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

/**
 * Class PriceUpdater
 * @package Born\PriceApi\Model
 */
class PriceUpdater
{

    /**
     * @var BasePriceStorageInterface
     */
    private $basePriceStorage;

    /**
     * @var BasePriceInterfaceFactory
     */
    private $basePriceFactory;

    /**
     * @var StoreShipToManagementInterface
     */
    private $storeShipToManagement;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * PriceUpdater constructor.
     * @param BasePriceStorageInterface $basePriceStorage
     * @param BasePriceInterfaceFactory $basePriceFactory
     * @param StoreShipToManagementInterface $storeShipToManagement
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        BasePriceStorageInterface $basePriceStorage,
        BasePriceInterfaceFactory $basePriceFactory,
        StoreShipToManagementInterface $storeShipToManagement,
        ProductRepositoryInterface $productRepository
    ) {
        $this->basePriceStorage = $basePriceStorage;
        $this->basePriceFactory = $basePriceFactory;
        $this->storeShipToManagement = $storeShipToManagement;
        $this->productRepository = $productRepository;
    }

    /**
     * @param $product_prices
     * @return array
     */
    public function update($product_prices)
    {
        $prices = [];
        $response = [];

        if (isset($product_prices['row']['product_num'])) {
            $singleElement = $product_prices['row'];
            unset($product_prices['row']);
            $product_prices['row'][] = $singleElement;
        }

        foreach ($product_prices['row'] as $priceRow) {
            if (!isset($priceRow['cust_price'])) {
                $errorInfo = ['item'=>$priceRow['product_num'] . '~' . $priceRow['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>'cust_price field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            if (!isset($priceRow['store_shipto'])) {
                $errorInfo = ['item'=>$priceRow['product_num'], 'status'=>'fail', 'ErrorDescription'=>'store_shipto field is missing'];
                $response['row'][]= $errorInfo;
                continue;
            }
            /* @var $price \Magento\Catalog\Api\Data\BasePriceInterface */
            $price = $this->basePriceFactory->create();
            $storeId = $this->storeShipToManagement->getStoreIdByShipto($priceRow['store_shipto']);
            $price->setStoreId($storeId);
            $price->setSku($priceRow['product_num']);
            $price->setPrice($priceRow['cust_price']);
            $prices[]=$price;
            try {
                $this->productRepository->get($priceRow['product_num']);
                $this->basePriceStorage->update($prices);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$priceRow['product_num'] . '~' . $priceRow['store_shipto'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            }
            $successInfo = ['item'=>$priceRow['product_num'] . '~' . $priceRow['store_shipto'], 'status'=>'success', 'ErrorDescription'=>''];
            $response['row'][]= $successInfo;
        }

        return $response;
    }
}
