<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Controller\Adminhtml;

use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;

/**
 * Class Locator
 * @package Born\DealerSearchApi\Controller\Adminhtml
 */
abstract class Locator extends Action
{
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $fileFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     */
    public function __construct(Context $context, FileFactory $fileFactory)
    {
        $this->fileFactory = $fileFactory;
        parent::__construct($context);
    }

    /**
     * Check if user has enough privileges
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Born_DealerSearchApi::locator');
    }
}
