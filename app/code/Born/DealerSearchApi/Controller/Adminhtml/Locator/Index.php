<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Controller\Adminhtml\Locator;

use Born\DealerSearchApi\Controller\Adminhtml\Locator;

/**
 * Class Index
 * @package Born\DealerSearchApi\Controller\Adminhtml\Locator
 */
class Index extends Locator
{
    /**
     *
     */
    public function execute()
    {
        if ($this->getRequest()->getParam('ajax')) {
            $this->_forward('grid');
            return;
        }
        $this->_redirect('locator/locator/edit/');

        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->getPage()->getConfig()->getTitle()->set(__('Dealer Search'));
        $this->_setActiveMenu('Born_DealerSearchApi::locator_manage');

        $this->_view->renderLayout();
    }
}
