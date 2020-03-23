<?php

namespace Born\SAML\Controller\Account;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Born\SAML\Helper\SAML as SAMLHelper;
use Magento\Framework\Url\DecoderInterface;

/**
 * Class Login
 * @package Born\SAML\Controller\Account
 */
class Login extends \Magento\Customer\Controller\Account\Login{

    /**
     * @var SAMLHelper
     */
    protected $_samlHelper;

    /**
     * @var \Magento\Framework\Module\Dir\Reader
     */
    protected $_moduleReader;

    protected $_urlDecoder;

    public function __construct(
        Context $context,
        Session $customerSession,
        PageFactory $resultPageFactory,
        SAMLHelper $helper,
        \Magento\Framework\Module\Dir\Reader $reader,
        DecoderInterface $decoder
    ) {
        $this->_samlHelper = $helper;
        $this->_moduleReader = $reader;
        $this->_urlDecoder = $decoder;
        parent::__construct($context,$customerSession, $resultPageFactory);
    }

    /**
     * @return \Magento\Framework\Controller\Result\Redirect|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        if($this->_samlHelper->isEnabled() && $this->_samlHelper->getSamlMetaData()){
            $refererUrl = $this->_urlDecoder->decode($this->getRequest()->getParam('referer'));
            $url = $this->_samlHelper->getLoginUrl() . "?relaystate={$refererUrl}";

            $resultRedirect = $this->resultRedirectFactory->create();

            $resultRedirect->setUrl($url);
            return $resultRedirect;
        }
        return parent::execute();
    }
}