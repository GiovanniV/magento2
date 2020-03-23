<?php

namespace Born\Config\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    const XML_PATH_API_URL = 'intel/general/support_link';

    const XML_PATH_SUBSCRIPTION_CHECKBOX = 'intel/registration/newsletter_sub_text';

    const XML_PATH_REGISTER_TERMS_CONDITIONS = 'intel/registration/registration_terms';

    /**
     * Support Url
     * @return mixed
     */
    public function getSupportUrl()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_API_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getNewsletterText()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SUBSCRIPTION_CHECKBOX,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getRegisterTermsAndCondition()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_REGISTER_TERMS_CONDITIONS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}