<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Block;

use Born\Carousel\Model\Carousel as CarouselModel;
use Magento\Framework\View\Element\Template;

/**
 * Class Carousel
 * @package Born\Carousel\Block
 */
class Carousel extends Template
{

    /**
     * @var bool
     */
    protected $_filterBy;
    /**
     * @var Carousel
     */
    private $_carousel;

    /**
     * Carousel constructor.
     * @param Template\Context $context
     * @param CarouselModel $carousel
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CarouselModel $carousel,
        array $data = []
    ) {
        $this->_carousel = $carousel;
        $this->_filterBy = false;
        parent::__construct($context, $data);
    }

    public function getFilterBy()
    {
        return $this->_filterBy;
    }

    public function setFilterBy($filterBy)
    {
        return $this->_filterBy = $filterBy;
    }

    /**
     * @return \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
     */
    public function getCarousel()
    {
        $collection = $this->_carousel->getResourceCollection();
        $collection->setOrder('sort_order', 'ASC');
        return $collection;
    }
}
