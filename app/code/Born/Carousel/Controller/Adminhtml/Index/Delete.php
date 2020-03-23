<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Controller\Adminhtml\Index;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Driver\File;

/**
 * Class Delete
 * @package Born\Carousel\Controller\Adminhtml\Index
 */
class Delete extends \Born\Carousel\Controller\Adminhtml\Index
{
    protected $_filesystem;

    protected $_file;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Born\Carousel\Api\CarouselRepositoryInterface $carouselRepository
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Born\Carousel\Api\CarouselRepositoryInterface $carouselRepository,
        Filesystem $_filesystem,
        File $file
    ) {
        $this->_carouselRepository = $carouselRepository;
        $this->_filesystem = $_filesystem;
        $this->_file = $file;
        parent::__construct($context, $coreRegistry);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                $carousel = $this->_carouselRepository->getById($id);
                $fileName = $carousel->getBackgroundImage();
                $mediaRootDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
                try {
                    if ($this->_file->isExists($mediaRootDir . DS . 'carousel' . DS . $fileName)) {
                        $this->_file->deleteFile($mediaRootDir . DS . 'carousel' . DS . $fileName);
                    }
                } catch (FileSystemException $e) {
                    // File do not exists
                }
                $this->_carouselRepository->deleteById($id);
                $this->messageManager->addSuccessMessage(__('Carousel has been deleted.'));
                return $this->_redirect('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $this->_redirect('*/*/edit', ['id' => $id]);
            }
        }
        return $this->_redirect('*/*/index');
    }
}
