<?php 

namespace Born\Hibbert\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const XML_PATH_HIBBERT_INTEGRATION_ACTIVE = 'hibbert/integration/active';
	const XML_PATH_HIBBERT_INTEGRATION_WSDL = 'hibbert/integration/wsdl';
	const XML_PATH_HIBBERT_INTEGRATION_CLIENT_REFERENCE_NUMBER = 'hibbert/integration/client_reference_number';
	const XML_PATH_HIBBERT_INTEGRATION_USERNAME = 'hibbert/integration/username';
	const XML_PATH_HIBBERT_INTEGRATION_PASSWORD = 'hibbert/integration/password';

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
            self::XML_PATH_HIBBERT_INTEGRATION_ACTIVE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getWsdl()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_HIBBERT_INTEGRATION_WSDL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getClientReferenceNumber()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_HIBBERT_INTEGRATION_CLIENT_REFERENCE_NUMBER,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_HIBBERT_INTEGRATION_USERNAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_HIBBERT_INTEGRATION_PASSWORD,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}