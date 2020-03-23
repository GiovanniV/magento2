<?php

/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\Carousel\Model\Config\Source;

use Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory;

/**
 * Description of Carousel
 */
class Carousel implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * Carousel constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
    }

    /**
     * Carousel allignment options
     * @return array
     */
    public function toOptionArray()
    {
        /** @var \Born\Carousel\Model\ResourceModel\Carousel\Collection $collection */
        $collection = $this->_collectionFactory->create();
        $array = [];
        if ($collection->getSize()) {
            /** @var \Born\Carousel\Model\Carousel $item */
            foreach ($collection as $item) {
                $array[] = ['value' => $item->getId(), 'label' => __($item->getTitle())];
            }
        }
        return $array;
    }
}
