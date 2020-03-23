<?php

namespace Born\SAML\Plugin\Model;

use Born\SAML\Helper\SAML as SAMLHelper;

/**
 * Class Url
 * @package Born\SAML\Plugin\Model
 */
class Url {

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
     * @param \Magento\Customer\Model\Url $subject
     * @param $result
     * @return mixed
     */
    public function afterGetLoginUrl(\Magento\Customer\Model\Url $subject, $result) {
        if($this->_helper->isEnabled() && $this->_helper->getSamlMetaData()){
            // We return the metadata login url
//            return $this->_helper->getLoginUrl();
        }
        return $result;
    }

    /**
     * @param \Magento\Customer\Model\Url $subject
     * @param $result
     * @return mixed
     */
    public function afterGetLogoutUrl(\Magento\Customer\Model\Url $subject, $result) {
        if($this->_helper->isEnabled() && $this->_helper->getSamlMetaData()){
            // We return the metadata logout url
            // return $this->_helper->getLogoutUrl();
        }
        return $result;
    }
}