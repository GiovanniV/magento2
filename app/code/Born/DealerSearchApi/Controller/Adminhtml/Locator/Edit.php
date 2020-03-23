<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Controller\Adminhtml\Locator;

use Born\DealerSearchApi\Model\SearchProductFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;

/**
 * Class Edit
 * @package Born\DealerSearchApi\Controller\Adminhtml\Locator
 */
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var SearchProductFactory
     */
    protected $storeFactory;
    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Edit constructor.
     * @param Context $context
     * @param SearchProductFactory $storeFactory
     * @param Registry $coreRegistry
     */
    public function __construct(Context $context, SearchProductFactory $storeFactory, Registry $coreRegistry)
    {
        parent::__construct($context);
        $this->storeFactory = $storeFactory;
        $this->coreRegistry = $coreRegistry;
    }
    
    /**
     * @return $this
     */
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_addBreadcrumb(
            __('Dealer Search'),
            __('Dealer Search')
        )->_addBreadcrumb(
            __('Edit'),
            __('Edit')
        );
        return $this;
    }

    /**
     * @return void
     */
    public function execute()
    {
        $storeId = $this->getRequest()->getParam('id');
        /** @var \Magento\User\Model\User $model */
        $model = $this->storeFactory->create();
        $data = $this->_session->getLocator(true);
        if (!empty($data)) {
            $model->setData($data);
        }
        $this->coreRegistry->register('locator', $model);
        if (isset($storeId)) {
            $breadcrumb = __('Dealer Search');
        } else {
            $breadcrumb = __('Dealer Search');
        }
        $this->_initAction()->_addBreadcrumb($breadcrumb, $breadcrumb);
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Dealer Search'));
        $this->_view->getPage()->getConfig()->getTitle()->prepend($model->getId() ? __("Dealer Search '%1'", $model->getName()) : __('Dealer Search'));
        $this->_view->renderLayout();
    }
}
