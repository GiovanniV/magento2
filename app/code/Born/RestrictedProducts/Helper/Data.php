<?php
/**
 * Copyright (c) 2019 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\RestrictedProducts\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;
use Magento\Framework\HTTP\ZendClientFactory;
use Magento\Framework\Registry;

/**
 * Class Data
 * @package Born\RestrictedProducts\Helper
 */
class Data extends AbstractHelper
{

    /**
     *
     */
    const XML_PATH_API_URL = 'born/born/geolocation';

    /**
     *
     */
    const XML_PATH_STATUS = 'born/born/enable';

    /**
     *
     */
    const XML_PATH_REGISTER_USERNAME = 'born/born/username';
    /**
     *
     */
    const XML_PATH_REGISTER_PASS = 'born/born/password';
    /**
     *
     */
    const LOG_FILE_NAME = 'restapiip.log';
    /**
     * @var Curl
     */
    protected $curl;
    /**
     * @var ZendClientFactory
     */
    protected $httpClientFactory;
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;
    /**
     * @var
     */
    protected $registry;

    /**
     * @var \Zend\Log\Logger
     */
    protected $logger;
    /**
     * @var RemoteAddress
     */
    protected $remote;
    /**
     * Support Url
     * @return mixed
     */
    public function __construct(
        Curl $curl,
        ZendClientFactory $clientFactory,
        Registry $registry,
        ScopeConfigInterface $scopeConfig,
        RemoteAddress $remote
    ) {
        $this->curl = $curl;
        $this->remote = $remote;
        $this->scopeConfig = $scopeConfig;
        $this->httpClientFactory = $clientFactory;
        $this->registry = $registry;
        $this->logger = new \Zend\Log\Logger();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/' . self::LOG_FILE_NAME);
        $this->logger->addWriter($writer);
    }

    /**
     * @return mixed
     */
    public function getApiUrl()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_API_URL,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getApiUsername()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_REGISTER_USERNAME,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getApykey()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_REGISTER_PASS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_STATUS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return bool
     */
    public function getGeoCountry()
    {
        if (($this->getApiUrl()=='')&&($this->getApykey()=='')) {
            return false;
        }//return false;

        if ($this->remote->getRemoteAddress()=='127.0.0.1') {
            $ip='47.149.248.225';
        } else {
            $ip=$this->remote->getRemoteAddress();
        }

        $url=$this->getApiUrl() . '/' . $ip . '/country_name?api-key=' . $this->getApykey();
        $this->curl->get($url);
        $response = $this->curl->getBody();
        return $response;
    }
}
