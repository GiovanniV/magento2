<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class ProductUrlKey
 * @package Born\ProductApi\Model
 */
class ProductUrlKey
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * ProductUrlKey constructor.
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ProductRepositoryInterface $productRepository
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->productRepository = $productRepository;
    }

    /**
     * @param $urlKey
     * @return bool
     */
    public function isUrlKeyUnique($urlKey): bool
    {
        $this->searchCriteriaBuilder->addFilter('url_key', $urlKey);
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchResult = $this->productRepository->getList($searchCriteria);
        return ($searchResult->getTotalCount() ? false : true);
    }
}
