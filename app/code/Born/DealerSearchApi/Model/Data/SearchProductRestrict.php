<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model\Data;

use Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use Born\DealerSearchApi\Api\Data\SearchProductRestrictExtensionInterface;

/**
 * Class SearchProductRestrict
 * @package Born\DealerSearchApi\Model\Data
 */
class SearchProductRestrict extends AbstractExtensibleObject implements SearchProductRestrictInterface
{

    /**
     * Get search_product_restrict_id
     * @return string|null
     */
    public function getSearchProductRestrictId()
    {
        return $this->_get(self::SEARCH_PRODUCT_RESTRICT_ID);
    }

    /**
     * Set search_product_restrict_id
     * @param string $searchProductRestrictId
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setSearchProductRestrictId($searchProductRestrictId)
    {
        return $this->setData(self::SEARCH_PRODUCT_RESTRICT_ID, $searchProductRestrictId);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchProductRestrictExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchProductRestrictExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get dealer_cust_numb
     * @return string|null
     */
    public function getDealerCustNumb()
    {
        return $this->_get(self::DEALER_CUST_NUMB);
    }

    /**
     * Set dealer_cust_numb
     * @param string $dealerCustNumb
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setDealerCustNumb($dealerCustNumb)
    {
        return $this->setData(self::DEALER_CUST_NUMB, $dealerCustNumb);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchProductRestrictInterface
     */
    public function setProductNum($productNum)
    {
        return $this->setData(self::PRODUCT_NUM, $productNum);
    }
}
