<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\Carousel\Controller\Adminhtml\Index;

/**
 * Class Index
 * @package Born\Carousel\Controller\Adminhtml\Index
 */
class Index extends \Born\Carousel\Controller\Adminhtml\Index
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage
            ->setActiveMenu(static::ADMIN_RESOURCE)
            ->getConfig()
            ->getTitle()
            ->prepend(__('Carousel Banner Manager'));
        return $resultPage;
    }
}
