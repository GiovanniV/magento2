<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Block\Widget;

use Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class Carousel
 * @package Born\Carousel\Block\Widget
 */
class Carousel extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "widget/carousel.phtml";

    /**
     * @var File
     */
    protected $_file = null;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Born\Carousel\Model\ResourceModel\Carousel\Collection
     */
    protected $_collection = null;

    /**
     * Carousel constructor.
     * @param Template\Context $context
     * @param CollectionFactory $collection
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param File $file
     * @param Filesystem $_filesystem
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        CollectionFactory $collection,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        File $file,
        Filesystem $_filesystem,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_file = $file;
        $this->_filesystem = $_filesystem;
        $this->_storeManager = $storeManager;
        $this->_collection = $collection->create();
        $this->_currentStoreId = $this->_storeManager->getStore()->getId();
    }

    /**
     * Prepare the collection to filter only the carousel ids
     */
    protected function prepareCollection()
    {
        if ($this->getData('carousels')) {
            $carousels = explode(',', $this->getData('carousels'));
            $this->_collection->addFieldToFilter('id', ['in' => $carousels]);
            $this->_collection->addOrder('sort_order', \Magento\Framework\Data\Collection::SORT_ORDER_ASC);
        }
    }

    /**
     * Get all carousel sildes
     * @return array
     */
    public function getCarouselSlides()
    {
        if ($this->getData('carousels')) {
            $this->prepareCollection();
            $data = $this->_collection->toArray();
            if ($data && $data['totalRecords'] > 0) {
                return $data['items'];
            }
        }
        return [];
    }

    /**
     * Get slides image src
     * @param $filename
     * @return bool|string
     */
    public function getImageSrc($filename)
    {
        $mediaRootDir = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath();
        if ($filename && $this->_file->isExists($mediaRootDir . DIRECTORY_SEPARATOR . 'carousel' . DIRECTORY_SEPARATOR . $filename)) {
            $baseurl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
            $baseurl .= 'carousel/' . $filename;
            return $baseurl;
        }
        return false;
    }
}
