<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace  Born\RestrictedProducts\Controller\Product;

use Magento\Catalog\Controller\Product\View as Viewcont;

/**
     * Class View
     * @package Born\RestrictedProducts\Controller\Product
     */
    class View extends Viewcont
    {

        /**
         * @return mixed
         */
        public function execute()
        {
            // Get initial data from request
            if (!$this->_objectManager->get('Born\RestrictedProducts\Helper\Data')->getStatus()) {
                return 	parent::execute();
            }
            $categoryId = (int) $this->getRequest()->getParam('category', false);
            $productId = (int) $this->getRequest()->getParam('id');
            $specifyOptions = $this->getRequest()->getParam('options');

            if ($this->getRequest()->isPost() && $this->getRequest()->getParam(self::PARAM_NAME_URL_ENCODED)) {
                $product = $this->_initProduct();

                if (!$product) {
                    return $this->noProductRedirect();
                }

                if ($specifyOptions) {
                    $notice = $product->getTypeInstance()->getSpecifyOptionMessage();
                    $this->messageManager->addNoticeMessage($notice);
                }

                if ($this->getRequest()->isAjax()) {
                    $this->getResponse()->representJson(
                $this->_objectManager->get(\Magento\Framework\Json\Helper\Data::class)->jsonEncode([
                'backUrl' => $this->_redirect->getRedirectUrl()
                ])
                );
                    return;
                }
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setRefererOrBaseUrl();
                return $resultRedirect;
            }
            if ($this->getProductByrest()) {
                $this->messageManager->addError(__('Not allow to access of this product in your country'));
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setRefererOrBaseUrl();
                return $resultRedirect;

                return $this->noProductRedirect();
            }

            // Prepare helper and params
            $params = new \Magento\Framework\DataObject();
            $params->setCategoryId($categoryId);
            $params->setSpecifyOptions($specifyOptions);

            // Render page
            try {
                $page = $this->resultPageFactory->create();
                $this->viewHelper->prepareAndRender($page, $productId, $this, $params);
                return $page;
            } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
                return $this->noProductRedirect();
            } catch (\Exception $e) {
                $this->_objectManager->get(\Psr\Log\LoggerInterface::class)->critical($e);
                $resultForward = $this->resultForwardFactory->create();
                $resultForward->forward('noroute');
                return $resultForward;
            }
        }

        /**
         * @return bool
         */
        public function getProductByrest()
        {
            $productId = (int) $this->getRequest()->getParam('id');
            $geocountry=$this->_objectManager->get('Born\RestrictedProducts\Helper\Data')->getGeoCountry();
            $collection = $this->_objectManager->get('Magento\Catalog\Model\Product')->load($productId);
            if (strpos(strtolower($collection->getCustomAttribute('ship_to_countries_regions')->getValue()), strtolower($geocountry)) !== false) {
                return false;
            }
            return true;
        }
    }
