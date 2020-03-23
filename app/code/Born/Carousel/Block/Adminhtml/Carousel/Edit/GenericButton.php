<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Born\Carousel\Block\Adminhtml\Carousel\Edit;

use Born\Carousel\Api\CarouselRepositoryInterface;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 * @package Born\Carousel\Block\Adminhtml\Carousel\Edit
 */
class GenericButton
{
    /**
     * @var \Magento\Backend\Block\Widget\Context
     */
    protected $context;

    /**
     * @var \Born\Carousel\Api\CarouselRepositoryInterface
     */
    protected $carouselRepository;

    /**
     * @param Context $context
     * @param CarouselRepositoryInterface $carouselRepository
     */
    public function __construct(
        Context $context,
        CarouselRepositoryInterface $carouselRepository
    ) {
        $this->context = $context;
        $this->carouselRepository = $carouselRepository;
    }

    /**
     * Return Restriction ID
     *
     * @return int|null
     */
    public function getId()
    {
        try {
            return $this->carouselRepository->getById(
                $this->context->getRequest()->getParam('id')
            )->getId();
        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
