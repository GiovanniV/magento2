<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */
namespace Born\BoomiConnector\Model;

use Magento\Framework\Xml\Generator;
use Magento\Framework\Xml\Parser;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Zend\Http\Request;
use Zend\Stdlib\Parameters;
use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;

/**
 * Class BoomiConnector
 * @package Born\BoomiConnector\Model
 */
class BoomiConnector
{
    /**
     * @var Generator
     */
    private $xmlGenerator;

    /**
     * @var Parser
     */
    private $xmlParser;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * BoomiConnector constructor.
     * @param Generator $xmlGenerator
     * @param Parser $xmlParser
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        Generator $xmlGenerator,
        Parser $xmlParser,
        ScopeConfigInterface $scopeConfig
        ) {
        $this->xmlGenerator = $xmlGenerator;
        $this->xmlParser = $xmlParser;
        $this->scopeConfig = $scopeConfig;
    }


    /**
     * @param array $params
     * @param $endpoint
     * @param string $method
     * @return array
     * @throws \DOMException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function makeRequest(array $params, $endpoint, $method = Request::METHOD_GET)
    {
        $username = $this->scopeConfig->getValue("boomi_authorization/general/username", ScopeInterface::SCOPE_STORES);
        $password = $this->scopeConfig->getValue("boomi_authorization/general/password", ScopeInterface::SCOPE_STORES);
        $httpHeaders = new \Zend\Http\Headers();


        $httpHeaders->addHeaders([
            'Authorization' => 'Basic ' .base64_encode($username.':'.$password),
            'Accept' => 'application/xml'
        ]);

        $options = [
            'adapter'   => Curl::class,
            'curloptions' => [
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false
            ],
            'maxredirects' => 0,
            'timeout' => 60
        ];
        $request = new Request();
        $request->setHeaders($httpHeaders);
        $request->setUri($endpoint);
        $request->setMethod($method);

        if ($method == Request::METHOD_POST) {
            $xmlRequest= $this->xmlGenerator->arrayToXml($params)->__toString();
            $request->setContent($xmlRequest);
        } else {
            $params = new Parameters($params);
            $request->setQuery($params);
        }

        $client = new Client();
        $client->setOptions($options);
          
        try{
			$response = $client->send($request);
			if ($response->getStatusCode()==500) {		
				throw new \Exception('Boomi shipping API response has 500 error code.', 500);
			} else {
				$parser = $this->xmlParser->loadXML($response->getBody());
				return $parser->xmlToArray();
			}
	     } catch(Exception $e) {
			 return [];
			}
		   
			return [];
		}



}
