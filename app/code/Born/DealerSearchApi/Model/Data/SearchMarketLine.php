<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model\Data;

use Born\DealerSearchApi\Api\Data\SearchMarketLineInterface;
use Magento\Framework\Api\AbstractExtensibleObject;
use Born\DealerSearchApi\Api\Data\SearchMarketLineExtensionInterface;

/**
 * Class SearchMarketLine
 * @package Born\DealerSearchApi\Model\Data
 */
class SearchMarketLine extends AbstractExtensibleObject implements SearchMarketLineInterface
{

    /**
     * Get search_market_line_id
     * @return string|null
     */
    public function getSearchMarketLineId()
    {
        return $this->_get(self::SEARCH_MARKET_LINE_ID);
    }

    /**
     * Set search_market_line_id
     * @param string $searchMarketLineId
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setSearchMarketLineId($searchMarketLineId)
    {
        return $this->setData(self::SEARCH_MARKET_LINE_ID, $searchMarketLineId);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setAction($action)
    {
        return $this->setData(self::ACTION, $action);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Born\DealerSearchApi\Api\Data\SearchMarketLineExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(SearchMarketLineExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get parent_account
     * @return string|null
     */
    public function getParentAccount()
    {
        return $this->_get(self::PARENT_ACCOUNT);
    }

    /**
     * Set parent_account
     * @param string $parentAccount
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setParentAccount($parentAccount)
    {
        return $this->setData(self::PARENT_ACCOUNT, $parentAccount);
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
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
     * @return \Born\DealerSearchApi\Api\Data\SearchMarketLineInterface
     */
    public function setMarketCode($marketCode)
    {
        return $this->setData(self::MARKET_CODE, $marketCode);
    }
}
