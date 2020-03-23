<?php
/**
 * Index controller.
 */
namespace Born\SAML\Controller\Index;


use Magento\Framework\Controller\Result\RawFactory;


/**
 * Class Signin
 * @package Born\SAML\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Born\SAML\Helper\SAML
     */
    protected $samlHelper;

    /**
     * @var RawFactory
     */
    protected $rawFactory;

    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Born\SAML\Helper\SAML $samlHelper
     * @param RawFactory $rawResult
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Born\SAML\Helper\SAML $samlHelper,
        RawFactory $rawResult

    ) {
        $this->samlHelper = $samlHelper;
        $this->rawFactory = $rawResult;
        parent::__construct($context);
    }


    /**
     * @return \Magento\Framework\Controller\Result\Raw
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
        $resultRaw = $this->rawFactory->create();
        $resultRaw->setHeader('Content-Type', 'text/plain; charset=UTF-8');
        $resultRaw->setContents("Login Url:" . $this->samlHelper->getLoginUrl() . "\n" . "Logout Url:" . $this->samlHelper->getLogoutUrl());
        return $resultRaw;

    }
}