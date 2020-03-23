<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Block\Adminhtml\Locator\Edit\Tab;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Store\Model\System\Store;
use Magento\Backend\Block\Widget\Form\Generic;

/**
 * Dealer Locator edit form main tab
 *
 * @SuppressWarnings(PHPMD.DepthOfInheritance)
 */
class Main extends Generic
{
    /**
     * @var
     */
    protected $storeFactory;
    /**
     * @var
     */
    protected $wysiwygConfig;
    /**
     * @var Store
     */
    protected $systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Backend\Model\Auth\Session $authSession
     * @param \Magento\Framework\Locale\ListsInterface $localeLists
     * @param array $data
     */
    public function __construct(
              Context $context,
              Registry $registry,
              FormFactory $formFactory,
              Store $systemStore,
            array $data = []
    ) {
        $this->systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('locator');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('locator_');

        $baseFieldset = $form->addFieldset('base_fieldset', ['legend' => __('Dealer Information')]);
        if ($model->getId()) {
            $baseFieldset->addField('id', 'hidden', ['name' => 'id']);
        }

    
        $baseFieldset->addField(
                'image',
            'image',
            [
            'name' => 'image',
            'label' => __('Dealer xml'),
            'id' => 'image',
            'title' => __('Dealer xml'),
            'note' => __('Allowed extensions are xml'),
            'required' => true
                ]
        );
      

        $data = $model->getData();
        $data['ids'] = $model->getStores();
        $form->setValues($data);

        $this->setForm($form);

        return parent::_prepareForm();
    }
}
