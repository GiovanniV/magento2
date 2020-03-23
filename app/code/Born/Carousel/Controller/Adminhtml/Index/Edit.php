<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\Carousel\Controller\Adminhtml\Index;

/**
 * Class Edit
 * @package Born\Carousel\Controller\Adminhtml\Index
 */
class Edit extends \Born\Carousel\Controller\Adminhtml\Index
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    public $resultPageFactory;

    /**
     * @var \Born\Carousel\Api\CarouselRepositoryInterface
     */
    public $carouselRepository;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Born\Carousel\Model\Carousel $carouselModel
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Born\Carousel\Api\CarouselRepositoryInterface $carouselRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->carouselRepository = $carouselRepository;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        if ($rowId) {
            $rowData = $this->carouselRepository->getById($rowId);
            $rowTitle = $rowData->getTitle();
            if (!$rowData->getId()) {
                $this->messageManager->addErrorMessage(__('row data no longer exist.'));
                $this->_redirect('*/*/index');
                return;
            }
            $this->coreRegistry->register('row_data', $rowData);
        }
        $resultPage = $this->resultPageFactory->create();
        if ($rowId && $rowData->getId()) {
            $title = __('Edit Slide: ') . $rowTitle;
        } else {
            $title = __('Add Slide ');
        }

        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
}
