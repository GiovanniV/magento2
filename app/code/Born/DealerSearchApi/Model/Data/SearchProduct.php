<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model\Data;

use Born\DealerSearchApi\Api\Data\SearchProductInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use Born\DealerSearchApi\Api\Data\SearchProductExtensionInterface;

/**
 * Class SearchProduct
 * @package Born\DealerSearchApi\Model\Data
 */
class SearchProduct extends AbstractExtensibleObject implements SearchProductInterface
{

    /**
     * Get search_product_id
     * @return string|null
     */
    public function getSearchProductId()
    {
        return $this->_get(self::SEARCH_PRODUCT_ID);
    }

    /**
     * Set search_product_id
     * @param string $searchProductId
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setSearchProductId($searchProductId)
    {
        return $this->setData(self::SEARCH_PRODUCT_ID, $searchProductId);
    }

    /**
     * Get action
     * @return string|null
     */
    public function getAction()
    {
        return $this->_get(self::ACTION);
    }

    /**
     * Set action
     * @param string $action
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchProductExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchProductExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchProductExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get product_num
     * @return string|null
     */
    public function getProductNum()
    {
        return $this->_get(self::PRODUCT_NUM);
    }

    /**
     * Set product_num
     * @param string $productNum
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setProductNum($productNum)
    {
        return $this->setData(self::PRODUCT_NUM, $productNum);
    }

    /**
     * Get line_code
     * @return string|null
     */
    public function getLineCode()
    {
        return $this->_get(self::LINE_CODE);
    }

    /**
     * Set line_code
     * @param string $lineCode
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setLineCode($lineCode)
    {
        return $this->setData(self::LINE_CODE, $lineCode);
    }

    /**
     * Get market_code
     * @return string|null
     */
    public function getMarketCode()
    {
        return $this->_get(self::MARKET_CODE);
    }

    /**
     * Set market_code
     * @param string $marketCode
     * @return \Born\DealerSearchApi\Api\Data\SearchProductInterface
     */
    public function setMarketCode($marketCode)
    {
        return $this->setData(self::MARKET_CODE, $marketCode);
    }
}
