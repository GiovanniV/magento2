<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */

namespace Born\ProductApi\Model;

use Magento\Catalog\Api\Data\ProductAttributeMediaGalleryEntryInterfaceFactory;
use Magento\Framework\Api\Data\ImageContentInterfaceFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class ProductImage
 * @package Born\ProductApi\Model
 */
class ProductImage
{
    /**
     * @var array
     */
    private $allowedMimeTypes;

    /**
     * @var \Magento\Framework\App\Filesystem\DirectoryList
     */
    private $directoryList;

    /**
     * @var ProductAttributeMediaGalleryEntryInterfaceFactory
     */
    private $mediaAttributeFactory;

    /**
     * @var ImageContentInterfaceFactory
     */
    private $imageContentFactory;

    /**
     * Folder for saved images
     */
    const DESTINATION_FOLDER = 'import';

    /**
     * @var array
     */
    private $defaultMimeTypes = [
        'image/jpg',
        'image/jpeg',
        'image/png',
    ];

    /**
     * ProductImage constructor.
     *
     * @param DirectoryList $directoryList
     * @param ProductAttributeMediaGalleryEntryInterfaceFactory $mediaAttributeFactory
     * @param ImageContentInterfaceFactory $imageContentFactory
     * @param array $allowedMimeTypes
     */
    public function __construct(
        DirectoryList $directoryList,
        ProductAttributeMediaGalleryEntryInterfaceFactory $mediaAttributeFactory,
        ImageContentInterfaceFactory $imageContentFactory,
        array $allowedMimeTypes = []
    ) {
        $this->directoryList = $directoryList;
        $this->allowedMimeTypes = array_merge($this->defaultMimeTypes, $allowedMimeTypes);
        $this->mediaAttributeFactory = $mediaAttributeFactory;
        $this->imageContentFactory = $imageContentFactory;
    }

    /**
     * @param array $productImages
     *
     * @return array
     * @throws LocalizedException
     * @throws \Magento\Framework\Exception\FileSystemException
     */
    public function addMediaGalleryEntries($productImages)
    {
        $mediaGalleryEntries = [];
        $i=1;
        foreach ($productImages as $productImageInfo) {
            $filePath = $this->directoryList->getPath('media') . '/' . self::DESTINATION_FOLDER . '/' . $productImageInfo['file'];
            if (!is_file($filePath)) {
                throw new LocalizedException(__('The image file ' . $productImageInfo['file'] . ' does not exist'));
            }
            $imageContent = file_get_contents($filePath);
            $imageTypes=[];
            $mediaAttribute = $this->mediaAttributeFactory->create();
            $mediaAttribute->setMediaType('image');
            $mediaAttribute->setLabel('K&N');
            $mediaAttribute->setPosition($i);

            $mediaAttributeContent = $this->imageContentFactory->create();
            $mediaAttributeContent->setBase64EncodedData(base64_encode($imageContent));
            $mediaAttributeContent->setName($productImageInfo['file']);
            $mediaAttributeContent->setType($this->getMimeTypeByImage($imageContent));

            $mediaAttribute->setContent($mediaAttributeContent);
            $mediaAttribute->setDisabled(false);

            if (isset($productImageInfo['base'])) {
                $imageTypes[]='image';
            }
            if (isset($productImageInfo['small'])) {
                $imageTypes[]='small_image';
            }
            if (isset($productImageInfo['thumbnail'])) {
                $imageTypes[]='thumbnail';
            }
            $mediaAttribute->setTypes($imageTypes);
            $mediaGalleryEntries[] = $mediaAttribute;
            $i++;
        }
        return $mediaGalleryEntries;
    }

    /**
     * @param string $rawData
     *
     * @return string
     * @throws LocalizedException
     */
    private function getMimeTypeByImage($rawData)
    {
        $imageProperties = $this->getImageProperties($rawData);
        if (empty($imageProperties)) {
            throw new LocalizedException(__('The image content must have mime data.'));
        }
        return $imageProperties['mime'];
    }

    /**
     * @param string $rawData
     *
     * @return array
     */
    private function getImageProperties($rawData)
    {
        return  @getimagesizefromstring($rawData);
    }
}
