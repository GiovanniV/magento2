<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\ProductSort\Block\Product\ProductList;

use Magento\Catalog\Block\Product\ProductList\Toolbar as searchToolbar;

/**
 * Class Toolbar
 * @package Born\ProductSort\Block\Product\ProductList
 */
class Toolbar extends searchToolbar
{
    public function setCollection($collection)
    {
        $this->_collection = $collection;
        $this->_collection->setCurPage($this->getCurrentPage());

        // we need to set pagination only if passed value integer and more that 0
        $limit = (int)$this->getLimit();
        if ($limit) {
            $this->_collection->setPageSize($limit);
        }

        if ($this->getCurrentOrder()) {
            if (($this->getCurrentOrder()) == 'position') {
                $this->_collection->addAttributeToSort(
                    $this->getCurrentOrder(),
                    $this->getCurrentDirection()
                );
            } elseif (($this->getCurrentOrder()) == 'relevance') {
                $this->_collection->setOrder('name', 'ASC');
                $this->_collection->setOrder('price', 'ASC');
            } else {
                $this->_collection->setOrder($this->getCurrentOrder(), $this->getCurrentDirection());
            }
        }
        return $this;
    }
}
