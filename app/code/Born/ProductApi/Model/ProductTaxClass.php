<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model;

use Magento\Framework\Exception\LocalizedException;
use Magento\Tax\Api\Data\TaxClassKeyInterface;
use Magento\Tax\Model\TaxClass\KeyFactory;
use Magento\Tax\Model\TaxClass\Management;
use Magento\Tax\Model\TaxClass\Repository;

/**
 * Class ProductTaxClass
 * @package Born\ProductApi\Model\Product
 */
class ProductTaxClass
{
    /**
     * @var KeyFactory
     */
    private $taxClassKeyFactory;

    /**
     * @var Management
     */
    private $taxClassManagement;

    /**
     * @var Repository
     */
    private $classRepository;

    /**
     * ProductTaxClass constructor.
     *
     * @param KeyFactory $taxClassKeyFactory
     * @param Management $taxClassManagement
     * @param Repository $classRepository
     */
    public function __construct(
        KeyFactory $taxClassKeyFactory,
        Management $taxClassManagement,
        Repository $classRepository
    ) {
        $this->taxClassKeyFactory = $taxClassKeyFactory;
        $this->taxClassManagement = $taxClassManagement;
        $this->classRepository = $classRepository;
    }

    /**
     * @param $productTaxClassName
     *
     * @return int
     * @throws LocalizedException
     */
    public function getProductTaxClassId($productTaxClassName)
    {
        $taxClassKey = $this->taxClassKeyFactory->create();
        $taxClassKey->setType(TaxClassKeyInterface::TYPE_NAME)->setValue($productTaxClassName);
        if ($this->taxClassManagement->getTaxClassId($taxClassKey)) {
            return $this->taxClassManagement->getTaxClassId($taxClassKey);
        }
        throw new LocalizedException(__('Product tax class ' . $productTaxClassName . ' is not correct.'));
    }

    /**
     * @param int $taxClassId
     *
     * @return string
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getTaxClassNameById($taxClassId)
    {
        return $this->classRepository->get($taxClassId)->getClassName();
    }
}
