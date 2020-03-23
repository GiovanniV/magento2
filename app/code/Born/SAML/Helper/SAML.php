<?php

namespace Born\SAML\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Phrase;
use Born\SAML\Model\Config\Source\Environment;

/**
 * Class SAML
 * @package Born\SAML\Helper
 */
class SAML extends AbstractHelper{

    const XML_PATH_SAML_GENERAL_SETTINGS_ENABLED = 'saml/general_settings/enabled';
    const XML_PATH_SAML_GENERAL_SETTINGS_METADATA = 'saml/general_settings/metadata';
    const XML_PATH_SAML_GENERAL_SETTINGS_ENVIRONMENT = 'saml/general_settings/environment';

    /**
     * @var string
     */
    protected $_samlData;

    /**
     * @var \SimpleSAML_Configuration
     */
    protected $_idpMetaData;

    /**
     * @var \Magento\Framework\Module\Dir\Reader
     */
    protected $_moduleReader;

    /**
     * SAML constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\Module\Dir\Reader $moduleReader
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\Module\Dir\Reader $moduleReader

    )
    {
        $this->_moduleReader = $moduleReader;
        parent::__construct($context);
    }

    /**
     * Not longer used
     * @return mixed
     */
    public function getSamlMetaData(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_SAML_GENERAL_SETTINGS_METADATA,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * Not longer used
     * @return mixed
     */
    public function getSamlEnvironment(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_SAML_GENERAL_SETTINGS_ENVIRONMENT,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * @return bool
     */
    public function isEnabled(){
        return ($this->getEnabled() && $this->getSamlEnvironment());
    }

    /**
     * @return mixed
     */
    public function getEnabled(){
        return $this->scopeConfig->getValue(
            self::XML_PATH_SAML_GENERAL_SETTINGS_ENABLED,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE
        );
    }

    /**
     * @return bool|string
     */
    public function getMetaDataIdp(){
        if($this->isEnabled()){
            $environment = $this->getSamlEnvironment();
            // We might get different ids in the future for each environment
            switch($environment):
                case $environment == Environment::DEVELOPMENT:
                    return 'sepmp_dev';
                case $environment == Environment::PREPRODUCTION:
                    return 'sepmp_preprod';
                case $environment == Environment::PRODUCTION:
                    return 'sepmp_prod';
                default:
                    return false;
            endswitch;
        }
        return false;
    }


    /**
     * @return bool|\SimpleSAML_Configuration
     */
    public function getSamlData(){

        if(!$this->isEnabled()){
            return false;
        }

        if(!$this->getSamlMetaData()){
            return false;
        }

        if(!$this->_idpMetaData){
            $configPath = $this->_moduleReader->getModuleDir(\Magento\Framework\Module\Dir::MODULE_VIEW_DIR,'Born_SAML');

            // By doing this, we 'set' the main configuration file to point to the Born_SAML folder instead of the
            // simplesamlphp library folder
            \SimpleSAML_Configuration::setConfigDir($configPath, 'simplesaml');
            $config = \SimpleSAML_Configuration::getConfig('config.php','simplesaml');

            /** @var \sspmod_saml_Auth_Source_SP $source */
            $source = \SimpleSAML_Auth_Source::getById($this->getSamlEnvironment(), 'sspmod_saml_Auth_Source_SP');

            /** @var \SimpleSAML_Configuration $spMetadata */
            $idpMetadata = $source->getIdPMetadata($this->getMetaDataIdp());

            // Metadata files can be found in app/code/Born/SAML/view/metadata folder
            $this->_idpMetaData = $idpMetadata;

            return $this->_idpMetaData;

        }
        return false;
    }


    /**
     * Get the Login URL
     * @return array|bool|mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getLoginUrl(){
        if(!$this->_idpMetaData){
            $this->_idpMetaData = $this->getSamlData();
            if(!$this->_idpMetaData)
            {
                return false;
            }
        }

        try{
            $loginUrl = $this->_idpMetaData->getArray('SingleSignOnService');
        } catch (\Exception $e){
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($e->getMessage()));
        }

        $loginUrl = $loginUrl['0']['Location'];

        return $loginUrl;
    }

    /**
     * Get the Logout Url
     * @return array|bool|mixed
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getLogoutUrl(){
        if(!$this->_idpMetaData){
            $this->_idpMetaData = $this->getSamlData();
            if(!$this->_idpMetaData)
            {
                return false;
            }
        }

        try{
            $logoutUrl = $this->_idpMetaData->getArray('SingleLogoutService');
        } catch (\Exception $e){
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($e->getMessage()));
        }
        $logoutUrl = $logoutUrl['0']['Location'];

        return $logoutUrl;
    }

    /**
     * Get the X509Certificate Certificate
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getCertificate(){
        if(!$this->_idpMetaData){
            $this->_idpMetaData = $this->getSamlData();
            if(!$this->_idpMetaData)
            {
                return false;
            }
        }
        try {
            $publicKey = $this->_idpMetaData->getPublicKeys();
        } catch (\Exception $e){
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($e->getMessage()));
        }
        $certificate = $publicKey[0]['X509Certificate'];

        return $certificate;
    }


}