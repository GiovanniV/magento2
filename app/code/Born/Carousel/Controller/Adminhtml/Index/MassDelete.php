<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Controller\Adminhtml\Index;

use Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Driver\File;

use Magento\Ui\Component\MassAction\Filter;

/**
 * Class MassDelete
 * @package Born\Carousel\Controller\Adminhtml\Index
 */
class MassDelete extends \Born\Carousel\Controller\Adminhtml\Index
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Born_Carousel::massdelete';

    /**
     * @var Filesystem
     */
    protected $_filesystem;

    /**
     * @var File
     */
    protected $_file;

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Context $context,
                                Filter $filter,
                                CollectionFactory $collectionFactory,
                                \Magento\Framework\Registry $coreRegistry,
                                Filesystem $_filesystem,
                                File $file
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->_filesystem = $_filesystem;
        $this->_file = $file;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $carousel) {
            $fileName = $carousel->getBackgroundImage();
            $mediaRootDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
            try {
                if ($this->_file->isExists($mediaRootDir . DS . 'carousel' . DS . $fileName)) {
                    $this->_file->deleteFile($mediaRootDir . DS . 'carousel' . DS . $fileName);
                }
            } catch (FileSystemException $e) {
                // File do not exists
            }

            $carousel->delete();
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been deleted.', $collectionSize));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
