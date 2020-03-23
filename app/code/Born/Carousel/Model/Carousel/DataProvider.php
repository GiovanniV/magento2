<?php

/*
  Copyright © 2018 BORN Commerce, Inc. All rights reserved.
  See COPYING.txt for license details.
 */

namespace Born\Carousel\Model\Carousel;

use Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class DataProvider
 * @package Born\Carousel\Model\Carousel
 */
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    public $storeManager;
    /**
     * @var \Born\Carousel\Model\ResourceModel\Carousel\CollectionFactory
     */
    protected $collection;
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $meta
     * @param array $data
     * @param CollectionFactory $carouselCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $carouselCollectionFactory,
        DataPersistorInterface $dataPersistor,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->storeManager = $storeManager;
        $this->collection = $carouselCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $carousel) {
            $carouselData = $carousel->getData();
            $carouselData = $this->afterLoadImageData($carouselData, ['background_image','background_image_mobile']);
            $this->loadedData[$carousel->getId()] = $carouselData;
        }
        $data = $this->dataPersistor->get('carousel');
        if (!empty($data)) {
            $carousel = $this->collection->getNewEmptyItem();
            $carousel->setData($data);
            $this->loadedData[$carousel->getId()] = $carousel->getData();
            $this->dataPersistor->clear('carousel');
        }
        return $this->loadedData;
    }

    /**
     * getting image url
     * @param array $data
     * @param array $images
     * @return array
     */
    public function afterLoadImageData($data, array $images)
    {
        foreach ($images as $image) {
            if (!empty($data[$image])) {
                $urlValue = $data[$image];
                unset($data[$image]);
                $data[$image][0]['name'] = $urlValue;
                $data[$image][0]['url'] = $this->storeManager->getStore()->getBaseUrl(
                        \Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . "carousel/" . $urlValue;
                $data[$image][0]['image'] = $urlValue;
            }
        }
        return $data;
    }
}
