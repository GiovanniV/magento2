<?php

/*
  Copyright © 2018 BORN Commerce, Inc. All rights reserved.
  See COPYING.txt for license details.
 */

namespace Born\Carousel\Model\Config\Source;

/**
 * Description of Alignment
 */
class Alignment implements \Magento\Framework\Option\ArrayInterface
{
    const CAROUSEL_ALIGNMENT_LEFT = 'left';
    const CAROUSEL_ALIGNMENT_RIGHT = 'right';
    const CAROUSEL_ALIGNMENT_CENTER = 'center';

    /**
     * Carousel alignment options
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::CAROUSEL_ALIGNMENT_LEFT, 'label' => __('Left')],
            ['value' => self::CAROUSEL_ALIGNMENT_CENTER, 'label' => __('Center')],
            ['value' => self::CAROUSEL_ALIGNMENT_RIGHT, 'label' => __('Right')]
        ];
    }
}
