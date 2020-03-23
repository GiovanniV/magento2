<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\Catalog\Model\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

/**
 * Class YesNo
 * @package Born\Catalog\Model\Source
 */
class YesNo extends AbstractSource
{

    /**
     * @return array
     */
    public function getAllOptions()
    {
        $this->_options=[
            ['label'=>'No', 'value'=>'0'],
            ['label'=>'Yes', 'value'=>'1'],
        ];

        return $this->_options;
    }
}
