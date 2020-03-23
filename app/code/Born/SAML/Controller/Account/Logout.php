<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\SAML\Controller\Account;

use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session;
use Born\SAML\Helper\SAML as SAMLHelper;



class Logout extends \Magento\Customer\Controller\Account\Logout
{

    protected $_samlHelper;

    /**
     * @param Context $context
     * @param Session $customerSession
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        SAMLHelper $helper
    ) {
        parent::__construct($context,$customerSession);
        $this->_samlHelper = $helper;
    }

    /**
     * Customer logout action
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    public function execute()
    {
        $result = parent::execute();
        if($this->_samlHelper->isEnabled() && $this->_samlHelper->getSamlMetaData()){
            $refererUrl = $this->_url->getBaseUrl();
            $url = $this->_samlHelper->getLogoutUrl() . "?Target={$refererUrl}";

            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setUrl($url);
            return $resultRedirect;
        }
        return $result;
    }
}