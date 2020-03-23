<?php
/**
 * SSO controller.
 */
namespace Born\ERPM\Controller\Services;

use Magento\Framework\Phrase;

/**
 * Class SSO
 * @package Born\ERPM\Controller\Services
 */
/**
 * Class SSO
 * @package Born\ERPM\Controller\Services
 */
class SSO extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $_redirectFactory;

    /**
     * @var \Magento\Framework\Module\Dir\Reader
     */
    protected $_moduleReader;

    /**
     * @var \Born\SAML\Helper\SAML
     */
    protected $_samlHelper;

    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $_customerRepository;

    /**
     * @var \Magento\Customer\Api\Data\CustomerInterfaceFactory
     */
    protected $_customerFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Customer\Api\AccountManagementInterface
     */
    protected $_accountManagement;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $_session;

    /**
     * @var \Magento\Framework\Stdlib\Cookie\PhpCookieManager
     */
    protected $_cookieManager;

    /**
     * @var \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory
     */
    protected $_cookieMetadataFactory;

    public function __construct(
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Module\Dir\Reader $reader,
        \Magento\Framework\Data\Form\FormKey $formKey,
        \Born\SAML\Helper\SAML $samlHelper,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Api\Data\CustomerInterfaceFactory $customerFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Customer\Api\AccountManagementInterface $accountManagement,
        \Magento\Customer\Model\Session $session,
        \Magento\Framework\Stdlib\Cookie\PhpCookieManager $cookieManager,
        \Magento\Framework\Stdlib\Cookie\CookieMetadataFactory $cookieMetadataFactory
    ) {
        parent::__construct($context);
        $this->_moduleReader = $reader;
        $this->_redirectFactory = $redirectFactory;
        $this->_samlHelper = $samlHelper;

        // We have to add the form_key or this will redirect the customer to homepage with
        // wrong form key error.
        $request = $this->getRequest();
        $request->setPostValue('form_key', $formKey->getFormKey());
        $this->_customerRepository = $customerRepository;
        $this->_customerFactory = $customerFactory;
        $this->_storeManager = $storeManager;
        $this->_accountManagement = $accountManagement;
        $this->_session = $session;
        $this->_cookieManager = $cookieManager;
        $this->_cookieMetadataFactory = $cookieMetadataFactory;
    }

    /**
     * @return \Magento\Framework\Controller\Result\Redirect
     * @throws \Exception
     * @throws \SimpleSAML_Error_BadRequest
     * @throws \SimpleSAML_Error_Error
     */
    public function execute()
    {
        if(!$this->_samlHelper->isEnabled()){
            $resultRedirect = $this->_redirectFactory->create();
            $this->messageManager->addErrorMessage(__('We are unable to log you in, please check the configurations'));
            // URL is checked to be internal in $this->_redirect->success()
            $resultRedirect->setUrl($this->_redirect->success($this->_url->getBaseUrl()));
            return $resultRedirect;
        }

        if($this->_session->isLoggedIn()){
            $resultRedirect = $this->_redirectFactory->create();
            // URL is checked to be internal in $this->_redirect->success()
            $resultRedirect->setUrl($this->_redirect->success($this->_url->getBaseUrl()));
            return $resultRedirect;
        }

        $configPath = $this->_moduleReader->getModuleDir(\Magento\Framework\Module\Dir::MODULE_VIEW_DIR,'Born_SAML');

        // By doing this, we 'set' the main configuration file so we no longer get errors.
        \SimpleSAML_Configuration::setConfigDir($configPath, 'simplesaml');
        $config = \SimpleSAML_Configuration::getConfig('config.php','simplesaml');


        $source = \SimpleSAML_Auth_Source::getById($this->_samlHelper->getSamlEnvironment(), 'sspmod_saml_Auth_Source_SP');
        $spMetadata = $source->getMetadata();
        try {
            $b = \SAML2\Binding::getCurrentBinding();
        } catch (\Exception $e) { // TODO: look for a specific exception
            // This is dirty. Instead of checking the message of the exception, \SAML2\Binding::getCurrentBinding() should throw
            // an specific exception when the binding is unknown, and we should capture that here
            if ($e->getMessage() === 'Unable to find the current binding.') {
                throw new \SimpleSAML_Error_Error('ACSPARAMS', $e, 400);
            } else {
                throw $e; // do not ignore other exceptions!
            }
        }

        if ($b instanceof \SAML2\HTTPArtifact) {
            $b->setSPMetadata($spMetadata);
        }

        $response = $b->receive();

        if (!($response instanceof \SAML2\Response)) {
            throw new \SimpleSAML_Error_BadRequest('Invalid message received to AssertionConsumerService endpoint.');
        }

        $idp = $response->getIssuer();
        if ($idp === null) {
            // no Issuer in the response. Look for an unencrypted assertion with an issuer
            foreach ($response->getAssertions() as $a) {
                if ($a instanceof \SAML2\Assertion) {
                    // we found an unencrypted assertion, there should be an issuer here
                    $idp = $a->getIssuer();
                    break;
                }
            }
            if ($idp === null) {
                // no issuer found in the assertions
                throw new \Exception('Missing <saml:Issuer> in message delivered to AssertionConsumerService.');
            }
        }

        $state = null;
        $stateId = $response->getInResponseTo();
        if (!empty($stateId)) {
            // this should be a response to a request we sent earlier
            try {
                $state = \SimpleSAML_Auth_State::loadState($stateId, 'saml:sp:sso');
            } catch (\Exception $e) {
                // something went wrong,
                \SimpleSAML\Logger::warning('Could not load state specified by InResponseTo: '.$e->getMessage().
                    ' Processing response as unsolicited.');
            }
        }

        $idpMetadata = $source->getIdPmetadata($idp);

        try {
            $assertions = \sspmod_saml_Message::processResponse($spMetadata, $idpMetadata, $response);
        } catch (\sspmod_saml_Error $e) {
            // the status of the response wasn't "success"
            $e = $e->toException();
            \SimpleSAML_Auth_State::throwException($state, $e);
        }

        $authenticatingAuthority = null;
        $nameId = null;
        $sessionIndex = null;
        $expire = null;
        $attributes = array();
        $foundAuthnStatement = false;

        foreach ($assertions as $assertion) {

            // check for duplicate assertion (replay attack)
            $store = \SimpleSAML\Store::getInstance();
            if ($store !== false) {
                $aID = $assertion->getId();
                if ($store->get('saml.AssertionReceived', $aID) !== null) {
                    $e = new \SimpleSAML_Error_Exception('Received duplicate assertion.');
                    \SimpleSAML_Auth_State::throwException($state, $e);
                }

                $notOnOrAfter = $assertion->getNotOnOrAfter();
                if ($notOnOrAfter === null) {
                    $notOnOrAfter = time() + 24 * 60 * 60;
                } else {
                    $notOnOrAfter += 60; // we allow 60 seconds clock skew, so add it here also
                }

                $store->set('saml.AssertionReceived', $aID, true, $notOnOrAfter);
            }


            if ($authenticatingAuthority === null) {
                $authenticatingAuthority = $assertion->getAuthenticatingAuthority();
            }
            if ($nameId === null) {
                $nameId = $assertion->getNameId();
            }
            if ($sessionIndex === null) {
                $sessionIndex = $assertion->getSessionIndex();
            }
            if ($expire === null) {
                $expire = $assertion->getSessionNotOnOrAfter();
            }

            $attributes = array_merge($attributes, $assertion->getAttributes());

            if ($assertion->getAuthnInstant() !== null) {
                // assertion contains AuthnStatement, since AuthnInstant is a required attribute
                $foundAuthnStatement = true;
            }
        }

        try{
            $customer = $this->validateCustomer($attributes);
            $this->_session->setCustomerDataAsLoggedIn($customer);
            $this->_session->regenerateId();

            if ($this->_cookieManager->getCookie('mage-cache-sessid')) {
                $metadata = $this->_cookieMetadataFactory->createCookieMetadata();
                $metadata->setPath('/');
                $this->_cookieManager->deleteCookie('mage-cache-sessid', $metadata);
            }

            $resultRedirect = $this->_redirectFactory->create();
            // We get the relaystate url to redirect the customer to where they were before
            $redirectUrl = $this->getRequest()->getParam('RelayState', false);
            if(!$redirectUrl){
                $redirectUrl = $this->_url->getBaseUrl();
            }
            $resultRedirect->setUrl($this->_redirect->success($redirectUrl));
            return $resultRedirect;
        } catch (\Exception $e){
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($e->getMessage()));
        }


    }

    /**
     * @param $attributes
     * @return bool|\Magento\Customer\Api\Data\CustomerInterface
     * @throws \Exception
     */
    protected function validateCustomer($attributes){

        try{
            /** @var \Magento\Customer\Api\Data\CustomerInterface $customer */
            $customer = $this->_customerRepository->get($attributes["EmailAddress"][0]);
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e){
            /** @var \Magento\Customer\Api\Data\CustomerInterface $customer */
            $customer = $this->createCustomer($attributes);
        } catch (\Exception $e){
            throw $e;
        }
        return $customer;
    }

    /**
     * @param $attributes
     * @return bool|\Magento\Customer\Api\Data\CustomerInterface
     */
    protected function createCustomer($attributes){
        try {
            /** @var \Magento\Customer\Api\Data\CustomerInterface $customer */
            $customer = $this->_customerFactory->create();

            $websiteId = $this->_storeManager->getWebsite()->getWebsiteId();

            $customer->setWebsiteId($websiteId);
            $customer->setFirstname($attributes["FirstName"][0]);
            $customer->setLastname($attributes["LastName"][0]);
            $customer->setEmail($attributes["EmailAddress"][0]);

            $newCustomer = $this->_customerRepository->save($customer);

            return $newCustomer;
        }catch (\Exception $e) {
            throw $e;
        }

    }

}