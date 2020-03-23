<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model;

use Magento\Catalog\Api\CategoryListInterface;
use Magento\Catalog\Api\Data\CategoryLinkInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;

/**
 * Class ProductCategoryLink
 * @package Born\ProductApi\Model\Product
 */
class ProductCategoryLink
{
    /**
     * @var \Magento\Catalog\Api\CategoryListInterface
     */
    private $categoryList;

    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var \Magento\Catalog\Api\Data\CategoryLinkInterfaceFactory
     */
    private $categoryLinkFactory;

    /**
     * ProductCategoryLink constructor.
     *
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Catalog\Api\CategoryListInterface $categoryList
     * @param \Magento\Catalog\Api\Data\CategoryLinkInterfaceFactory $categoryLinkFactory
     */
    public function __construct(
        SearchCriteriaBuilder $searchCriteriaBuilder,
        CategoryListInterface $categoryList,
        CategoryLinkInterfaceFactory $categoryLinkFactory
    ) {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->categoryList = $categoryList;
        $this->categoryLinkFactory = $categoryLinkFactory;
    }

    /**
     * @param array $categoryNames
     *
     * @return array
     */
    public function getProductCategoryLinksByCategoryNames($categoryNames)
    {
        $categoryLinks = [];
        $this->searchCriteriaBuilder->addFilter('name', $categoryNames, 'in');
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $productCategories=$this->categoryList->getList($searchCriteria);
        foreach ($productCategories->getItems() as $category) {
            $categoryLink=$this->categoryLinkFactory->create();
            $categoryLink->setCategoryId($category->getId());
            $categoryLink->setPosition(rand(0, 1000));
            $categoryLinks[]=$categoryLink;
        }
        return $categoryLinks;
    }
}
