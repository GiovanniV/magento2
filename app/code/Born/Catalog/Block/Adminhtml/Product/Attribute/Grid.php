<?php
/**
 * Born_Catalog
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\Catalog
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\Catalog\Block\Adminhtml\Product\Attribute;

class Grid extends \Magento\Catalog\Block\Adminhtml\Product\Attribute\Grid
{
    /**
     * Add sort_order column to grid
     *
     * @return $this
     */
    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $this->addColumnAfter(
            'frontend_display_order',
            [
                'header' => __('Display Order'),
                'sortable' => true,
                'index' => 'frontend_display_order',
                'type' => 'text',
                'align' => 'center'
            ],
            'is_comparable'
        );
    }
}
