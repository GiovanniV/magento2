<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model\Data;

use Born\DealerSearchApi\Api\Data\SearchCategoryInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use Born\DealerSearchApi\Api\Data\SearchCategoryExtensionInterface;

/**
 * Class SearchCategory
 * @package Born\DealerSearchApi\Model\Data
 */
class SearchCategory extends AbstractExtensibleObject implements SearchCategoryInterface
{

    /**
     * Get search_category_id
     * @return string|null
     */
    public function getSearchCategoryId()
    {
        return $this->_get(self::SEARCH_CATEGORY_ID);
    }

    /**
     * Set search_category_id
     * @param string $searchCategoryId
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setSearchCategoryId($searchCategoryId)
    {
        return $this->setData(self::SEARCH_CATEGORY_ID, $searchCategoryId);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchCategoryExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchCategoryExtensionInterface $extensionAttributes)
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
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setDealerCustNumb($dealerCustNumb)
    {
        return $this->setData(self::DEALER_CUST_NUMB, $dealerCustNumb);
    }

    /**
     * Get category
     * @return string|null
     */
    public function getCategory()
    {
        return $this->_get(self::CATEGORY);
    }

    /**
     * Set category
     * @param string $category
     * @return \Born\DealerSearchApi\Api\Data\SearchCategoryInterface
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }
}
