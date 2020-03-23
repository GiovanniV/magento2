<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model;

use Born\ProductApi\Model\Attribute\Set;
use Born\WebsiteStoreCreator\Api\StoreShipToManagementInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\Data\ProductLinkInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product as ProductModel;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\ProductFactory;
use Magento\CatalogInventory\Api\Data\StockItemInterfaceFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;

/**
 * Class ProductUpdater
 * @package Born\ProductApi\Model
 */
class ProductUpdater
{
    /**
     * fileSystem
     *
     * @var \Magento\Framework\Filesystem
     */
    protected $fileSystem;

    /**
    * productRepository
    *
    * @var \Magento\Catalog\Api\ProductRepositoryInterface
    */
    protected $productRepository;

    /**
     * @var Set
     */
    private $attributeSet;

    /**
     * @var \Born\ProductApi\Model\ProductCategoryLink
     */
    private $productCategoryLink;

    /**
     * @var \Born\ProductApi\Model\ProductTaxClass
     */
    private $productTaxClass;

    /**
     * @var \Born\ProductApi\Model\ProductVisibility
     */
    private $productVisibility;

    /**
     * @var StockItemInterfaceFactory
     */
    private $stockItemFactory;

    /**
     * @var ProductLinkInterfaceFactory
     */
    private $productLinkFactory;

    /**
     * @var \Born\ProductApi\Model\ProductImage
     */
    private $productImage;

    /**
     * @var StoreShipToManagementInterface
     */
    private $storeShipToManagement;

    /**
     * @var ProductUrlKey
     */
    private $productUrlKey;

    /**
     * ProductUpdater constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param Filesystem $Filesystem
     * @param Set $attributeSet
     * @param ProductFactory $productFactory
     * @param ProductCategoryLink $productCategoryLink
     * @param ProductTaxClass $productTaxClass
     * @param ProductVisibility $productVisibility
     * @param StockItemInterfaceFactory $stockItemFactory
     * @param ProductLinkInterfaceFactory $productLinkFactory
     * @param ProductImage $productImage
     * @param StoreShipToManagementInterface $storeShipToManagement
     * @param ProductUrlKey $productUrlKey
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        Filesystem $Filesystem,
        Set $attributeSet,
        ProductFactory $productFactory,
        ProductCategoryLink $productCategoryLink,
        ProductTaxClass $productTaxClass,
        ProductVisibility $productVisibility,
        StockItemInterfaceFactory $stockItemFactory,
        ProductLinkInterfaceFactory $productLinkFactory,
        ProductImage $productImage,
        StoreShipToManagementInterface $storeShipToManagement,
        ProductUrlKey $productUrlKey
    ) {
        $this->productRepository=$productRepository;
        $this->fileSystem=$Filesystem;
        $this->attributeSet = $attributeSet;
        $this->productFactory = $productFactory;
        $this->productCategoryLink = $productCategoryLink;
        $this->productTaxClass = $productTaxClass;
        $this->productVisibility = $productVisibility;
        $this->stockItemFactory = $stockItemFactory;
        $this->productLinkFactory = $productLinkFactory;
        $this->productImage = $productImage;
        $this->storeShipToManagement = $storeShipToManagement;
        $this->productUrlKey = $productUrlKey;
    }

    /**
     * @param $products
     * @return string
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @throws \Magento\Framework\Exception\FileSystemException
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\StateException
     */
    public function save($products)
    {
        $response = [];
        $mediaPath = $this->fileSystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();

        foreach ($products as $xmlProduct) {
            if ($xmlProduct['action']=='delete') {
                try {
                    $product = $this->productRepository->get($xmlProduct['sku']);
                } catch (\Exception $e) {
                    $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'success', 'ErrorDescription'=>''];
                    $response['row'][]= $errorInfo;
                    continue;
                }
                try {
                    $this->productRepository->delete($product);
                } catch (\Exception $e) {
                    $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                    $response['row'][]= $errorInfo;
                    continue;
                }
                $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            } else {
                try {
                    $product = $this->productRepository->get($xmlProduct['sku']);
                } catch (\Exception $e) {
                    $product = $this->productFactory->create();
                }
            }

            $xmlProduct[ProductInterface::TYPE_ID] = $xmlProduct['product_type'];
            unset($xmlProduct['product_type']);

            $xmlProduct[ProductInterface::STATUS] = Status::STATUS_ENABLED;
            $xmlProduct[ProductInterface::ATTRIBUTE_SET_ID] = 4;

            /*Categories*/
            if (isset($xmlProduct['categories'])) {
                $categoriesArray=explode('/', $xmlProduct['categories']);
                $this->setCategoryLinks($product, $categoriesArray);
                unset($xmlProduct['categories']);
            }

            /*Website Ids*/
            if (is_array($xmlProduct['store_shipto']['site'])) {
                $xmlWebsites = array_values($xmlProduct['store_shipto']['site']);
            } else {
                $xmlWebsites=[$xmlProduct['store_shipto']['site']];
            }
            $websiteIds=[];
            $websiteError = 0;
            foreach ($xmlWebsites as $xmlWebsite) {
                try {
                    $websiteId = $this->storeShipToManagement->getWebsiteIdByShipto($xmlWebsite);
                    $websiteIds[]=$websiteId;
                    continue;
                } catch (\Exception $e) {
                    $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                    $response['row'][]= $errorInfo;
                    $websiteError=1;
                    continue;
                }
            }

            if ($websiteError) {
                continue;
            }

            /*Product Tax Class Handler*/
            try {
                $xmlProduct['tax_class'] = $this->productTaxClass->getProductTaxClassId($xmlProduct['tax_class_name']);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            }
            unset($xmlProduct['tax_class_name']);

            /*Product Visibility Handler*/
            try {
                $xmlProduct[ProductInterface::VISIBILITY] = $this->productVisibility->getProductVisibilityId($xmlProduct[ProductInterface::VISIBILITY]);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            }

            if (isset($xmlProduct['additional_attributes'])) {
                $xmlProduct['available_information'] = $xmlProduct['additional_attributes'];
                unset($xmlProduct['additional_attributes']);
            }

            //Unset Translation data if product created
            if ($product->getId()) {
                unset($xmlProduct['description']);
                unset($xmlProduct['short_description']);
                unset($xmlProduct['meta_title']);
                unset($xmlProduct['meta_keyword']);
                unset($xmlProduct['meta_description']);
                unset($xmlProduct['additional_attributes']);
            }

            /*Generate unique url_key */
            if (!isset($xmlProduct['url_key'])) {
                $xmlProduct['url_key'] = $this->validateAndFormatUniqueUrlKey($product, $xmlProduct);
            }

            $product->setData($xmlProduct);

            $this->setWebsites($product, $websiteIds);
            unset($xmlProduct['store_shipto']);

            /* Upsell */
            if (isset($xmlProduct['upsell_skus'])) {
                if (is_array($xmlProduct['upsell_skus']['upsell_sku'])) {
                    $upsellSkus = array_values($xmlProduct['upsell_skus']['upsell_sku']);
                } else {
                    $upsellSkus=[$xmlProduct['upsell_skus']['upsell_sku']];
                }
                $productLinks = [];
                foreach ($upsellSkus as $upselSku) {
                    $productLink = $this->productLinkFactory->create();
                    $productLink->setSku($product->getSku());
                    $productLink->setLinkedProductSku($upselSku);
                    $productLink->setLinkType('upsell');
                    $productLink->setLinkedProductType('simple');
                    $productLinks[] = $productLink;
                }
                $product->setProductLinks($productLinks);
            }

            /*Product Images*/
            $mediaGallery = [];
            if (isset($xmlProduct['base_image'])) {
                if (!file_exists($mediaPath . 'import/' . $xmlProduct['base_image'])) {
                    $this->downloadImages($xmlProduct['base_image'], $mediaPath);
                }
                $mediaGallery[]=['base'=>true , 'small'=>true , 'thumbnail'=>true , 'file' => $xmlProduct['base_image']];
                unset($xmlProduct['base_image']);
            }

            if (isset($xmlProduct['additional_images'])) {
                if (is_array($xmlProduct['additional_images']['image'])) {
                    $additionalImages = array_values($xmlProduct['additional_images']['image']);
                } else {
                    $additionalImages=[$xmlProduct['additional_images']['image']];
                }

                foreach ($additionalImages as $additionalImage) {
                    if (!file_exists($mediaPath . 'import/' . $additionalImage)) {
                        $this->downloadImages($additionalImage, $mediaPath);
                    }
                    $mediaGallery[]=['file' => $additionalImage];
                }
                unset($xmlProduct['additional_images']);
            }

            $mediaGalleryEntries = $this->productImage->addMediaGalleryEntries($mediaGallery);
            $product->setMediaGalleryEntries($mediaGalleryEntries);

            try {
                $product = $this->productRepository->save($product);
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>$e->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            }

            /* Inventory */
            if (isset($xmlProduct['qty'])) {
//                $extensionAttributes = $product->getExtensionAttributes();
//                $stockItem = $extensionAttributes->getStockItem();
//                $stockItem->setQty($xmlProduct['qty']);
//                $stockItem->setIsInStock(($xmlProduct['qty'] > 0 ? true : false));
//                $stockItem->setManageStock(true);
//                $stockItem->setStockId(1);
//                $stockItem->setProductId($product->getId());
//                $product->setExtensionAttributes($extensionAttributes);
                unset($xmlProduct['qty']);
                //Inventory handled by the multi-inventory module
            }

            try {
                $this->productRepository->save($product);
                $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'success', 'ErrorDescription'=>''];
                $response['row'][]= $errorInfo;
            } catch (\Exception $e) {
                $errorInfo = ['item'=>$xmlProduct['sku'], 'status'=>'fail', 'ErrorDescription'=>'Inventory Stock: ' . $e->getMessage()];
                $response['row'][]= $errorInfo;
                continue;
            }
        }

        return  $response;
    }

    /**
     * @param $im
     * @param $mediaPath
     */
    public function downloadImages($im, $mediaPath)
    {
        $ch = curl_init('http://kandn.com/images/l/' . $im);
        $fp = fopen($mediaPath . 'import/' . $im, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }

    /**
     * @param ProductModel $product
     * @param array $productData
     */
    private function setCategoryLinks(ProductModel $product, array $productCategories)
    {
        $extensionAttributes = $product->getExtensionAttributes();
        $categoryLinks = $this->productCategoryLink->getProductCategoryLinksByCategoryNames($productCategories);
        $extensionAttributes->setCategoryLinks($categoryLinks);
        $product->setExtensionAttributes($extensionAttributes);
    }

    /**
     * @param ProductModel $product
     * @param array $websiteIds
     */
    private function setWebsites(ProductModel $product, array $websiteIds)
    {
        $extensionAttributes = $product->getExtensionAttributes();
        $extensionAttributes->setWebsiteIds($websiteIds);
        $product->setExtensionAttributes($extensionAttributes);
    }

    /**
     * @param ProductModel $product
     * @param array $productData
     * @return string
     */
    private function validateAndFormatUniqueUrlKey(ProductModel $product, array $productData): string
    {
        $urlKey=$product->formatUrlKey($productData[ProductInterface::NAME]);

        if (!$this->productUrlKey->isUrlKeyUnique($urlKey)) {
            $urlKey.='-' . $productData[ProductInterface::SKU];
        }
        if (!$this->productUrlKey->isUrlKeyUnique($urlKey)) {
            $urlKey.='-' . time();
        }
        return $urlKey;
    }
}
