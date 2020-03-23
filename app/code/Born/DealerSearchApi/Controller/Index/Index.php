<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Controller\Index;

use Born\DealerSearchApi\Model\SearchProductFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 * @package Born\DealerSearchApi\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var SearchProductFactory
     */
    protected $storeFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param SearchProductFactory $storeFactory
     */
    public function __construct(Context $context, SearchProductFactory $storeFactory)
    {
        parent::__construct($context);
        $this->storeFactory = $storeFactory;
    }

    /**
     *
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Dealer search'));
        $this->_view->renderLayout();
    }
}
