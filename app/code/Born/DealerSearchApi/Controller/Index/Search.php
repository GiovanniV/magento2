<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Controller\Index;

use Born\DealerSearchApi\Model\SearchProductFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Search
 * @package Born\DealerSearchApi\Controller\Index
 */
class Search extends \Magento\Framework\App\Action\Action
{
    /**
     * @var SearchProductFactory
     */
    protected $storeFactory;

    /**
     * Search constructor.
     * @param Context $context
     * @param SearchProductFactory $storeFactory
     */
    public function __construct(Context $context, SearchProductFactory $storeFactory)
    {
        parent::__construct($context);
        $this->storeFactory = $storeFactory;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();

        if (empty($data['country']) && (empty($data['zip']) || empty($data['city']))) {
            $this->messageManager->addError(__('Please enter Country or Zip or City'));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Dealer Search'));
        $this->_view->renderLayout();
    }
}
