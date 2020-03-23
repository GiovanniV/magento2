<?php

namespace Born\Integration\Model;

use Magento\Framework\HTTP\Client\Curl;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Magento\Framework\Profiler;
use Magento\Framework\HTTP\ZendClientFactory;
use Magento\Framework\Registry;

/**
 * Class Client
 * @package Born\ERPM\Model
 */
class Client{

    /**
     * @var
     */
    protected $_baseUrl;

    /**
     * @var
     */
    protected $_username;

    /**
     * @var
     */
    protected $_apiKey;

    /**
     * @var
     */
    protected $_password;

    /**
     *
     */
    const REQUEST_TIMEOUT = 30;
    /**
     *
     */
    const REQUEST_MAXREDIRECTS = 0;
    /**
     *
     */
    const REQUEST_CONTENT_TYPE = "application/json";

    /**
     * Log file name for debugging
     */
    const LOG_FILE_NAME = 'restapi.log';

    /**
     * Profiler name
     */
    const PROFILER_REQUEST = 'Born Integration API::Request';

    /**
     * @var Curl
     */
    protected $_curl;

    /**
     * @var Json
     */
    protected $_json;

    /**
     * @var DateTime
     */
    protected $_dateTime;

    /**
     * @var \Magento\Framework\HTTP\ZendClient
     */
    protected $_handler;

    /**
     * @var ZendClientFactory
     */
    protected $_httpClientFactory;

    /**
     * @var
     */
    protected $registry;

    /**
     * @var \Zend\Log\Logger
     */
    protected $_logger;


    /**
     * Client constructor.
     * @param Curl $curl
     * @param Json $json
     * @param DateTime $dateTime
     * @param ZendClientFactory $clientFactory
     * @param Registry $registry
     */
    public function __construct(
        Curl $curl,
        Json $json,
        DateTime $dateTime,
        ZendClientFactory $clientFactory,
        Registry $registry
    )
    {
        $this->_curl = $curl;
        $this->_json = $json;
        $this->_dateTime = $dateTime;
        $this->_httpClientFactory = $clientFactory;
        $this->_registry = $registry;
        $this->_logger = new \Zend\Log\Logger();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/' . self::LOG_FILE_NAME);
        $this->_logger->addWriter($writer);
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->_baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->_baseUrl = $baseUrl;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->_apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->_apiKey = $apiKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
        return $this;
    }

    /**
     * @param $path
     * @param array $params
     * @param bool $saveApiCall
     * @param bool $customErrorHandling
     * @param bool $appendResponseCode
     * @return bool|mixed|\Zend_Http_Response
     */
    public function post($path, $params = [], $saveApiCall = true, $customErrorHandling = false, $appendResponseCode = false)
    {
        return $this->call($path, $params, $saveApiCall, $customErrorHandling, \Zend_Http_Client::POST, $appendResponseCode);
    }

    /**
     * @param $path
     * @param null $params
     * @param $method
     * @return bool
     */
    protected function _call($path, $params = null, $method)
    {
        if ($method == \Zend_Http_Client::GET)
            $handler = $this->_createHandler($path, $params);
        else {
            $handler = $this->_createHandler($path);
            if (isset($params)) {
                $handler->setRawData($this->_json->serialize($params));
            }
        }

        if(!$handler){
            return false;
        }

        $reqName = 'Born Core API :: ' . $method . ' | ' . $path;
        Profiler::start(self::PROFILER_REQUEST);
        Profiler::start($reqName);

        $requestStartTime = microtime(TRUE);
        $response = $handler->request($method);
        $requestEndTime = microtime(TRUE) - $requestStartTime;

        Profiler::stop($reqName);
        Profiler::stop(self::PROFILER_REQUEST);

        return $response;
    }

    /**
     * @param $path
     * @param null $params
     * @param $saveApiCall
     * @param $customErrorHandling
     * @param $method
     * @param $appendResponseCode
     * @return bool|mixed
     */
    public function call($path, $params = null, $saveApiCall, $customErrorHandling, $method, $appendResponseCode)
    {
        try {
            if ($saveApiCall) {
                /* save the handler to recall the last request */
                $apiParams = [
                    'path' => $path,
                    'params' => $params,
                    'method' => $method
                ];

                if ($this->_registry->registry('apiParams')) {
                    $this->_registry->unregister('apiParams');
                }
                $this->_registry->register('apiParams', $apiParams);
            }
            $response = $this->_call($path, $params, $method);
            $response = $this->_handleResponse($response);
        } catch (\Zend_Http_Client_Exception $e) {
            $this->_logger->err($e->getMessage());
            return false;
        } catch (\Exception $e) {
            $this->_logger->err($e->getMessage());
            return false;
        }
        return $response;
    }

    /**
     * @param $response
     * @return mixed
     */
    protected function _handleResponse($response){
        return $response;
    }



    /**
     * @param $path
     * @param null $params
     * @return \Magento\Framework\HTTP\ZendClient|bool
     */
    protected function _createHandler($path, $params = null)
    {
        if(!$this->getUsername() && !$this->getPassword() && !$this->getBaseUrl() && !$this->getApiKey()){
            return false;
        }

        $this->_handler = $this->_httpClientFactory->create();
        $uri = \Zend_Uri_Http::fromString($this->getBaseUrl(). $path);
        $this->_handler->setUri($uri);
        $this->_handler->setAuth($this->getUsername(), $this->getPassword());
        $this->_handler->setConfig(
            [
                'maxredirects' => self::REQUEST_MAXREDIRECTS,
                'timeout' => self::REQUEST_TIMEOUT,
                'strict' => false
            ]
        );
        $this->_handler->setHeaders([
            'Content-Type' => self::REQUEST_CONTENT_TYPE,
            'api_key' => $this->getApiKey(),
            'cache-control' => 'no-cache'
        ]);

        if (isset($params)) {
            foreach ($params as $param => $value) {
                $this->_handler->setParameterGet($param, $value);
            }
        }
        return $this->_handler;
    }
}