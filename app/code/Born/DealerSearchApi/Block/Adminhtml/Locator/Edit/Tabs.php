<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Block\Adminhtml\Locator\Edit;

use Magento\Backend\Block\Widget\Tabs as TabsSide;

/**
 * Class Tabs
 * @package Born\DealerSearchApi\Block\Adminhtml\Locator\Edit
 */
class Tabs extends TabsSide
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('page_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Dealer Information'));
    }

    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'main_section',
            [
                'label' => __('Dealer Information'),
                'title' => __('Dealer Information'),
                'content' => $this->getLayout()->createBlock('Born\DealerSearchApi\Block\Adminhtml\Locator\Edit\Tab\Main')->toHtml(),
                'active' => true
            ]
        );
    
        return parent::_beforeToHtml();
    }
}
