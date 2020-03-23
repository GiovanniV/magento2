<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model;

use Magento\Catalog\Model\Product\Visibility;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class ProductVisibility
 * @package Born\ProductApi\Model\Product
 */
class ProductVisibility
{
    /**
     * @var Visibility
     */
    private $productVisibility;

    /**
     * ProductVisibility constructor.
     *
     * @param Visibility $productVisibility
     */
    public function __construct(
        Visibility $productVisibility
    ) {
        $this->productVisibility = $productVisibility;
    }

    /**
     * @param string $visibility
     *
     * @return int
     * @throws LocalizedException
     */
    public function getProductVisibilityId($visibility)
    {
        foreach ($this->productVisibility->getOptionArray() as $visibilityId => $visibilityValue) {
            if ($visibilityValue==$visibility) {
                return $visibilityId;
            }
        }
        throw new LocalizedException(__('Product visibility ' . $visibility . ' is not correct.'));
    }

    /**
     * @param int $visibilityId
     *
     * @return string
     */
    public function getProductVisibilityValueById($visibilityId)
    {
        return $this->productVisibility->getOptionText($visibilityId);
    }
}
