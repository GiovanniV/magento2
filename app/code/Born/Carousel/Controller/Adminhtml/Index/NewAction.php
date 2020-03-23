<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Controller\Adminhtml\Index;

/**
 * Class NewAction
 * @package Born\Carousel\Controller\Adminhtml\Index
 */
class NewAction extends \Born\Carousel\Controller\Adminhtml\Index
{
    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        return $this->_forward('edit');
    }
}
