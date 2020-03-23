<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */
namespace Born\Sales\Plugin;

use Born\WebsiteStoreCreator\Api\StoreShipToRepositoryInterface;
use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

/**
 * Plugin for Order repository.
 */
class OrderRepository
{
    /**
     * @var \Magento\Sales\Api\Data\OrderExtensionFactory
     */
    private $extensionFactory;

    /**
     * @var StoreShipToRepositoryInterface
     */
    private $storeShipToRepository;

    /**
     * OrderRepository constructor.
     * @param OrderExtensionFactory $extensionFactory
     * @param StoreShipToRepositoryInterface $storeShipToRepository
     */
    public function __construct(
        OrderExtensionFactory $extensionFactory,
        StoreShipToRepositoryInterface $storeShipToRepository
    ) {
        $this->extensionFactory = $extensionFactory;
        $this->storeShipToRepository = $storeShipToRepository;
    }

    /**
     * @param OrderRepositoryInterface $subject
     * @param OrderInterface $entity
     * @return OrderInterface
     */
    public function afterGet(
        OrderRepositoryInterface $subject,
        OrderInterface $entity
    ) {
        /** @var \Magento\Sales\Api\Data\OrderExtension $extensionAttributes */
        $extensionAttributes = $entity->getExtensionAttributes();

        if ($extensionAttributes === null) {
            $extensionAttributes = $this->extensionFactory->create();
        }

        $extensionAttributes->setCartId($entity->getCartId());
        /* @var \Born\WebsiteStoreCreator\Api\Data\StoreShipToInterface $storeRelation */
        $storeRelation = $this->storeShipToRepository->getStoreShipToObjectByStoreId($entity->getStoreId());
        $extensionAttributes->setStoreShipto($storeRelation->getStoreShipto());
        $extensionAttributes->setShipToNumber($storeRelation->getShipToNumber());

        $entity->setExtensionAttributes($extensionAttributes);
        return $entity;
    }

    /**
     * @param OrderRepositoryInterface $subject
     * @param OrderSearchResultInterface $entities
     * @return OrderSearchResultInterface
     */
    public function afterGetList(
        OrderRepositoryInterface $subject,
        OrderSearchResultInterface $entities
    ) {
        /** @var \Magento\Sales\Api\Data\OrderInterface $entity */
        foreach ($entities->getItems() as $entity) {
            $this->afterGet($subject, $entity);
        }
        return $entities;
    }
}
