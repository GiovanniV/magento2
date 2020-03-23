<?php

namespace Born\AdobeAnalytics\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const XML_PATH_WAP_SECTION = 'adobe_analytics/general_settings/wapSection';
    const XML_PATH_WAP_LOCAL_CODE_MAPPING = 'adobe_analytics/general_settings/wapLocalCode_mapping';
    const XML_PATH_SCRIPT = 'adobe_analytics/general_settings/script';

    /**
     * wap section
     * @return mixed
     */
    public function getWapSection()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_WAP_SECTION,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * wap local code mapping
     * @return mixed
     */
    public function getWapLocalCodeMapping()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_WAP_LOCAL_CODE_MAPPING,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /*
    * adobe analytics script
    * @return mixed
    */
    public function getScript()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_SCRIPT,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}