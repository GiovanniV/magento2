<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model\Attribute;

use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Set as AttributeSet;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Set
 * @package Born\ProductApi\Model\Attribute
 */
class Set
{
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    /**
     * @var \Magento\Eav\Api\AttributeSetRepositoryInterface
     */
    private $attributeSetRepository;

    /**
     * @var \Magento\Eav\Model\Config
     */
    private $eavConfig;

    /**
     * Set constructor.
     *
     * @param \Magento\Eav\Model\Config $eavConfig
     * @param \Magento\Eav\Api\AttributeSetRepositoryInterface $attributeSetRepository
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Eav\Api\AttributeSetRepositoryInterface $attributeSetRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->eavConfig = $eavConfig;
        $this->attributeSetRepository = $attributeSetRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @param string $attributeSetName
     *
     * @return int
     * @throws LocalizedException
     */
    public function getAttributeSetIdByName(string $attributeSetName)
    {
        $productEntityId = $this->eavConfig->getEntityType(\Magento\Catalog\Model\Product::ENTITY)->getId();
        $this->searchCriteriaBuilder->addFilter(AttributeSet::KEY_ATTRIBUTE_SET_NAME, $attributeSetName);
        $this->searchCriteriaBuilder->addFilter(AttributeInterface::ENTITY_TYPE_ID, $productEntityId);
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $searchResult = $this->attributeSetRepository->getList($searchCriteria);
        foreach ($searchResult->getItems() as $attributeSet) {
            return $attributeSet->getAttributeSetId();
        }
        throw new LocalizedException(__('Attribute set with name ' . $attributeSetName . ' not exist'));
    }

    /**
     * @param int $attributeSetId
     *
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getAttributeSetNameById(int $attributeSetId)
    {
        return $this->attributeSetRepository->get($attributeSetId)->getAttributeSetName();
    }
}
