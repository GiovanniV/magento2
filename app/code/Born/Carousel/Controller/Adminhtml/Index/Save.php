<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Controller\Adminhtml\Index;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class Save
 * @package Born\Carousel\Controller\Adminhtml\Index
 */
class Save extends \Born\Carousel\Controller\Adminhtml\Index
{
    /**
     * @var null
     */
    public $carouselRepository = null;
    /**
     * @var \Born\Carousel\Api\Data\CarouselInterfaceFactory
     */
    public $carouselInterfaceFactory = null;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Born\Carousel\Api\CarouselRepositoryInterface $carouselsRepository
     * @param \Born\Carousel\Api\Data\CarouselInterfaceFactory $carouselInterfaceFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Born\Carousel\Api\CarouselRepositoryInterface $carouselsRepository,
        \Born\Carousel\Api\Data\CarouselInterfaceFactory $carouselInterfaceFactory
    ) {
        $this->carouselRepository = $carouselsRepository;
        $this->carouselInterfaceFactory = $carouselInterfaceFactory;
        $this->messageManager = $context->getMessageManager();
        parent::__construct($context, $coreRegistry);
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('id');
            if ($id) {
                try {
                    $this->carouselRepository->getById($id);
                } catch (NoSuchEntityException $e) {
                    unset($data['id']);
                }
            }
            try {
                $dataModel = $this->carouselInterfaceFactory->create();
                $background_image = '';
                if (isset($data['background_image'][0]['name']) && isset($data['background_image'][0]['tmp_name'])) {
                    $background_image = $data['image'] = $data['background_image'][0]['name'];
                    $this->imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get(
                        'Born\Carousel\ImageUpload'
                    );
                    $background_image = time() . '_' . $background_image;
                    $this->imageUploader->moveFileFromTmp($data['image'], $background_image);
                } elseif (isset($data['background_image'][0]['image']) && !isset($data['background_image'][0]['tmp_name'])) {
                    $background_image = $data['image'] = $data['background_image'][0]['image'];
                } else {
                    $data['image'] = null;
                }
                $data['background_image'] = $background_image;

                $background_image_mobile = '';
                if (isset($data['background_image_mobile'][0]['name']) && isset($data['background_image_mobile'][0]['tmp_name'])) {
                    $background_image_mobile = $data['image'] = $data['background_image_mobile'][0]['name'];
                    $this->imageUploader = \Magento\Framework\App\ObjectManager::getInstance()->get(
                        'Born\Carousel\ImageUpload'
                    );
                    $background_image_mobile = time() . '_' . $background_image_mobile;
                    $this->imageUploader->moveFileFromTmp($data['image'], $background_image_mobile);
                } elseif (isset($data['background_image_mobile'][0]['image']) && !isset($data['background_image_mobile'][0]['tmp_name'])) {
                    $background_image_mobile = $data['image'] = $data['background_image_mobile'][0]['image'];
                } else {
                    $data['image'] = null;
                }
                $data['background_image_mobile'] = $background_image_mobile;

                $dataModel->addData($data);
                $this->carouselRepository->save($dataModel);

                $this->messageManager->addSuccessMessage(__('Carousel has been saved successfully.'));

                if ($this->getRequest()->getParam('back')) {
                    return $this->_redirect('*/*/edit', ['id' => $dataModel->getId(), '_current' => true]);
                }
                return $this->_redirect('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
        return $this->_redirect('*/*/new');
    }
}
