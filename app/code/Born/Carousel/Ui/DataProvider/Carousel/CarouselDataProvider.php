<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Ui\DataProvider\Carousel;

use Born\Carousel\Model\Carousel;
use Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class CarouselDataProvider
 * @package Born\Carousel\Ui\DataProvider\Carousel
 */
class CarouselDataProvider extends AbstractDataProvider
{
    /**
     * @var \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $addFieldStrategies;

    /**
     * @var array
     */
    protected $addFilterStrategies;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * CarouselDataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param DataPersistorInterface $dataPersistor
     * @param array $addFieldStrategies
     * @param array $addFilterStrategies
     * @param array $meta
     * @param array $data
     * @param Carousel $carousel
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Carousel $carousel,
        DataPersistorInterface $dataPersistor,
        CollectionFactory $collectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = []
    ) {
        $this->_storeManager = $storeManager;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        $baseurl = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $col_items = $this->getCollection()->toArray();
        $items = $col_items['items'];
        /** @var \Magento\Cms\Model\Block $block */
        $i = 0;
        foreach ($items as &$item) {
            if (isset($item['background_image'])) {
                $img = [];
                $img[$i]['image'] = $item['background_image'];
                $img[$i]['url'] = $baseurl . 'carousel/' . $item['background_image'];
                $item['background_image'] = $img;
            }
        }
        $this->loadedData = $col_items;
        return $this->loadedData;
    }
}
