<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Block\Adminhtml\Locator;

use Born\DealerSearchApi\Model\SearchProductFactory;
use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;

/**
 * Class Edit
 * @package Born\DealerSearchApi\Block\Adminhtml\Locator
 */
class Edit extends Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $storeFactory = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        SearchProductFactory $storeFactory,
        array $data = []
    ) {
        $this->storeFactory = $storeFactory;
        parent::__construct($context, $data);
    }

    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_locator';
        $this->_blockGroup = 'Born_DealerSearchApi';

        parent::_construct();

        $this->buttonList->remove('save');
        $this->buttonList->remove('back');
        $this->buttonList->remove('reset');
        $this->buttonList->remove('delete');
        $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Submit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
    }

    /**
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        $locator = $this->storeFactory->load($this->getRequest()->getParam('user_id'));
        if ($locator) {
            return __("Edit Dealer Search '%1'", $locator->getName());
        } else {
            return __('New Dealer');
        }
    }
}
