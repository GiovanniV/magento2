<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\ShareCart\Model;

use Born\ShareCart\Api\GetCartItemsManagementInterface;
use Magento\Checkout\Model\Cart;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class GetCartItemsManagement
 * @package Born\ShareCart\Model
 */
class GetCartItemsManagement implements GetCartItemsManagementInterface
{
    /*
    * @var cart
    */
    /**
     * @var Cart
     */
    protected $cart;
	 /**
     * @var storeManager
     */
     protected $storeManager;
    /**
     * {@inheritdoc}
     */
    public function __construct(Cart $cart,StoreManagerInterface $storemanager)
    {
        $this->cart = $cart;
		$this->storeManager = $storemanager;
    }
   
    /**
     * @return array|string
     */
    public function getGetCartItems()
    {
        $cartitems=[];
        $items = $this->cart->getQuote()->getAllItems();
		$store = $this->storeManager->getStore();
        foreach ($items as $item) {
			$productImageUrl = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' .$item->getProduct()->getData('small_image');

            $cartitems[]=['product_id'=>$item->getProductId(),'product_name'=>$item->getName(),'sku'=>$item->getSku(),'quantity'=>$item->getQty(),'price'=>$item->getPrice(),'images'=>$productImageUrl];
        }

        return $cartitems;
    }
}
