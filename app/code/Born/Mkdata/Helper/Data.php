<?php

namespace Born\Mkdata\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_MKDATA_INTEGRATION_ACTIVE = 'mkdata/integration/active';
    const XML_PATH_MKDATA_INTEGRATION_WSDL = 'mkdata/integration/wsdl';
    const XML_PATH_MKDATA_INTEGRATION_USERNAME = 'mkdata/integration/username';
    const XML_PATH_MKDATA_INTEGRATION_PASSWORD = 'mkdata/integration/password';

    const XML_PATH_MKDATA_FIELDS_COMPANY = 'mkdata/fields/company';
    const XML_PATH_MKDATA_FIELDS_ADDRESSES = 'mkdata/fields/addresses';

    const XML_PATH_MKDATA_ALERT_TIMEOUT = 'mkdata/alerts/enable_timeout';
    const XML_PATH_MKDATA_ALERT_REVIEW = 'mkdata/alerts/enable_review';
    const XML_PATH_MKDATA_ALERT_RECIPIENTS = 'mkdata/alerts/recipients';
    const XML_PATH_MKDATA_ALERT_FROM_NAME = 'mkdata/alerts/from_name';
    const XML_PATH_MKDATA_ALERT_FROM_EMAIL = 'mkdata/alerts/from_email';

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;

    /**
     * Data constructor.
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Helper\Context $context
    ) {
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_INTEGRATION_ACTIVE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getWsdl()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_INTEGRATION_WSDL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_INTEGRATION_USERNAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_INTEGRATION_PASSWORD,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getCheckCompany()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_FIELDS_COMPANY,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getCheckAddresses()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_FIELDS_ADDRESSES,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAlertOnTimeout()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_ALERT_TIMEOUT,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAlertOnReview()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_ALERT_REVIEW,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAlertsRecipients()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_ALERT_RECIPIENTS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAlertsFromName()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_ALERT_FROM_NAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getAlertsFromEmail()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_MKDATA_ALERT_FROM_EMAIL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}