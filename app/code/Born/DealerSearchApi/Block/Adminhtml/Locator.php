<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Block\Adminhtml;

use Born\DealerSearchApi\Model\ResourceModel\SearchProduct\Collection;
use Magento\Backend\Block\Template\Context;
use Born\DealerSearchApi\Model\ResourceModel\SearchProduct\CollectionFactory;
use \Magento\Backend\Block\Template;

/**
 * Class Locator
 * @package Born\DealerSearchApi\Block\Adminhtml
 */
class Locator extends Template
{

    /**
     * @var \Born\DealerSearchApi\Model\ResourceModel\Store\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Born\DealerSearchApi\Model\ResourceModel\Store\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     *
     */
    public function _construct()
    {
        parent::_construct();
        $this->addButton(
            'save',
            [
                'id' => 'save',
                'label' => __('Add New  Dealer'),
                'class' => 'save primary',
                'onclick' => "window.location = '" . $this->getUrl('locator/*/edit') . "'"
            ]
        );
    }

    /**
     * @param $buttonId
     * @param array $data
     */
    protected function addButton($buttonId, array $data)
    {
        $childBlockId = $buttonId . '_button';
        $button = $this->getLayout()->createBlock('Magento\Backend\Block\Widget\Button', $this->getNameInLayout() . '-' . $childBlockId);
        $button->setData($data);
        $block = $this->getLayout()->getBlock('page.actions.toolbar');
        if ($block) {
            $block->setChild($childBlockId, $button);
        }
    }

    /**
     * Prepares block to render
     *
     * @return $this
     */
    protected function _beforeToHtml()
    {
        return parent::_beforeToHtml();
    }
}
