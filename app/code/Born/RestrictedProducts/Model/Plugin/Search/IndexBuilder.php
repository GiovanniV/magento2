<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\RestrictedProducts\Model\Plugin\Search;

use Born\RestrictedProducts\Helper\Data;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\DB\Select;
use Magento\Framework\Search\Request\Query\Filter;
use Magento\Framework\Search\RequestInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class IndexBuilder
 * @package Born\RestrictedProducts\Model\Plugin\Search
 */
class IndexBuilder
{
    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface
    */
    protected $scopeConfig;

    /**
    * @var \Magento\Store\Model\StoreManagerInterface
    */
    protected $storeManager;

    /**
     * IndexBuilder constructor.
     * @param StoreManagerInterface $storeManager
     * @param CollectionFactory $productCollectionFactory
     * @param Visibility $productVisibility
     * @param Resolver $layerResolver
     * @param Data $data
     */
    public function __construct(
StoreManagerInterface $storeManager,
CollectionFactory $productCollectionFactory,
Visibility $productVisibility,
Resolver $layerResolver,
Data $data
) {
        $this->storeManager = $storeManager;
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productVisibility = $productVisibility;
        $this->layerResolver = $layerResolver;
        $this->data=$data;
    }

    /**
    * Build index query
    *
    * @param $subject
    * @param callable $proceed
    * @param RequestInterface $request
    * @return Select
    * @SuppressWarnings(PHPMD.UnusedFormatParameter)
    */
    public function aroundBuild($subject, callable $proceed, RequestInterface $request)
    {
        $select = $proceed($request);
        if ($this->data->getStatus()) {
            $storeId = $this->storeManager->getStore()->getStoreId();
            $rootCatId = $this->storeManager->getStore($storeId)->getRootCategoryId();
            $productUniqueIds = $this->getCustomCollectionQuery();
            if (count($productUniqueIds)>0) {
                $select->where('search_index.entity_id IN (' . join(',', $productUniqueIds) . ')');
            } else {
                $select->where('search_index.entity_id=0');
            }
        }
        return $select;
    }

    /**
    *
    * @return ProductIds[]
    */
    public function getCustomCollectionQuery()
    {
        /* get all category ids of current store */
        $websiteId = $this->storeManager->getStore()->getWebsiteId();
        $catalog_ids=$this->layerResolver->get()->getCurrentCategory()->getId();
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect(['entity_id','sku']);
        // filter current website products
        $collection->addWebsiteFilter($websiteId);
        // set visibility filter
        $collection->setVisibility($this->productVisibility->getVisibleInSiteIds());
        $collection->addCategoriesFilter(['in' => $catalog_ids]);

        $geocountry=$this->data->getGeoCountry();
        $collection->addAttributeToFilter('ship_to_countries_regions', ['like' => '%' . $geocountry . '%']);

        $getProductAllIds = $collection->getAllIds();
        $getProductUniqueIds = array_unique($getProductAllIds);
        return $getProductUniqueIds;
    }
}
