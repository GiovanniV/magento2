<?php

namespace Born\SAML\Plugin\Block\Account;

use Born\SAML\Helper\SAML as SAMLHelper;

/**
 * Class AuthorizationLink
 * @package Born\SAML\Plugin\Block\Account
 */
class AuthorizationLink {

    /**
     * @var SAMLHelper
     */
    protected $_helper;

    /**
     * Url constructor.
     * @param SAMLHelper $helper
     */
    public function __construct(
        SAMLHelper $helper
    ) {
        $this->_helper = $helper;
    }

    /**
     * @param \Magento\Customer\Block\Account\AuthorizationLink $subject
     * @param $result
     * @return mixed
     */
    public function afterGetHref(\Magento\Customer\Block\Account\AuthorizationLink $subject, $result){
        if($this->_helper->isEnabled() && $this->_helper->getSamlMetaData()){
            // We return the metadata login url
            return $subject->isLoggedIn()
                ? $this->_helper->getLogoutUrl()
                : $this->_helper->getLoginUrl();
        }
        return $result;
    }
}