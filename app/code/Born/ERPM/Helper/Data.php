<?php

namespace Born\ERPM\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper{

    const XML_PATH_API_URL  = 'erpm/general_settings/api_url';
    const XML_PATH_USERNAME = 'erpm/general_settings/username';
    const XML_PATH_PASSWORD = 'erpm/general_settings/password';
    const XML_PATH_API_KEY  = 'erpm/general_settings/api_key';

    const XML_PATH_NEWSLETTER_SUBSCRIPTION_CODE  = 'erpm/subscription/subscription_code';
    const XML_PATH_NEWSLETTER_ENGAGEMENT_CODE  = 'erpm/subscription/engagement_code';
    const XML_PATH_NEWSLETTER_URL  = 'erpm/subscription/newsletter_url';

    /**
     * Api Url
     * @return mixed
     */
    public function getApiUrl()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_API_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Username
     * @return mixed
     */
    public function getUsername()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_USERNAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Passowrd
     * @return mixed
     */
    public function getPassword()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_PASSWORD,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Api Key
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_API_KEY,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Subscription Code
     * @return mixed
     */
    public function getSubscriptionCode(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_NEWSLETTER_SUBSCRIPTION_CODE,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Engagement Code
     * @return mixed
     */
    public function getEngagementCode(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_NEWSLETTER_ENGAGEMENT_CODE,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Newsletter URL
     * @return mixed
     */
    public function getNewsletterUrl(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_NEWSLETTER_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }


}