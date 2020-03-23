<?php

namespace Born\ERPM\Model\Method;

use Born\Integration\Model\Client;
use Born\ERPM\Model\LogRepository;
use Born\ERPM\Model\LogFactory;
use Born\ERPM\Helper\Data;

use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\Phrase;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Stdlib\DateTime\Timezone;

/**
 * Class Person
 * @package Born\ERPM\Model\Method
 */
class Person{


    /**
     * @var Client
     */
    protected $_client;

    /**
     * @var LogRepository
     */
    protected $_logRepository;

    /**
     * @var LogFactory
     */
    protected $_logFactory;

    const API_PATH = 'person';

    /**
     * @var Json
     */
    protected $_json;

    protected $_storeManager;

    protected $_request;

    protected $_timeZone;

    public function __construct(
        Client $client,
        LogRepository $logRepository,
        LogFactory $logFactory,
        Data $helper,
        Json $json,
        StoreManagerInterface $storeManager,
        RequestInterface $request,
        Timezone $timezone
    )
    {
        $this->_client = $client;
        $this->_logRepository = $logRepository;
        $this->_logFactory = $logFactory;
        $this->_helper = $helper;
        $this->_json = $json;
        $this->_storeManager = $storeManager;
        $this->_request = $request;
        $this->_timeZone = $timezone;
    }

    /**
     * @param \Magento\Customer\Model\Customer $customer
     */
    public function registerCustomer(\Magento\Customer\Model\Customer $customer, $username, $password, $countryCode='')
    {
        // We get all the api information and set the information
        $apiUrl         = $this->_helper->getApiUrl();
        $apiUsername    = $this->_helper->getUsername();
        $apiPassword    = $this->_helper->getPassword();
        $apiKey         = $this->_helper->getApiKey();
        if(!$apiUrl && !$apiUsername && !$apiPassword && !$apiKey){
            return false;
        }

        $this->_client->setBaseUrl($apiUrl);
        $this->_client->setUsername($apiUsername);
        $this->_client->setPassword($apiPassword);
        $this->_client->setApiKey($apiKey);

        $personData = [];

        // Prepare the data
        $personData["IntelLoginAuthentication"] = [
            "LoginID" => $username,
            "Password" => $password
        ];
        $personData["FirstName"]    = $customer->getFirstname();
        $personData["LastName"]     = $customer->getLastname();
        $personData["EmailID"]      = $customer->getEmail();
        $personData["UserStatus"]   = 'ACTIVE';
        $personData["PhysicalCountry"]   = $countryCode;
        $personData["PersonMembership"]   = ["EngagementCode" => "Intel_RealSense"];
        $personData["blnPublish"]   = 'true';
        $personData["blnNotify"]   = 'true';
        $personData["ChangeAgent"]   = 'MAGENTO';
        $personData["ChgAgtLoginId"]   = 'sys_magentouser';
        if($this->_request->getParam('is_subscribed')){

            $subscriptionCodes = $this->_helper->getSubscriptionCode();
            $engagementCode = $this->_helper->getEngagementCode();
            // Date Format "j/m/Y h:i:s A

            $date = date('m/j/Y h:i:s A');

            if($subscriptionCodes && $engagementCode){
                $codes = $this->_json->unserialize($subscriptionCodes);
                foreach($codes as $code){
                    $personData["Subscriptions"][] = [
                        "SubscriptionCode" => $code["SubscriptionCode"],
                        "SubscriptionName" => $code["SubscriptionName"],
                        "SubscriptionDate" => $date,
                        "SubscriptionStatusDate" => $date,
                        "hasSubscribed" => 'Y',
                        "EngagementCode" => $engagementCode,
                        "DeliveryTypes" => [
                            ["type" => "EMAIL"]
                        ]
                    ];

                }
            }

        }

        $person["Person"] = $personData;

        /** @var \Zend_Http_Response $response */
        $response = $this->_client->post(self::API_PATH, $person);

        try{
            if(!$response){
                throw new \Exception('Something went wrong when creating the customer.');
            }

            $this->logRequest($person,$response);

            $responseContent = $this->_json->unserialize($response->getBody());
            if(isset($responseContent['ErrorCode']) && $responseContent['ErrorCode'] == 'E'){
                throw new \Exception($responseContent['ErrorDescription']);
            }

            if(isset($responseContent['Exception'])){
                throw new \Exception($responseContent['Exception']);
            }

            // Set the information returned
            $customer->setData('erpm_login_id',$username);
            if(isset($responseContent['PersonId'])){
                $customer->setData('erpm_person_id',$responseContent['PersonId']);
            }
            if(isset($responseContent['EnterpriseId'])){
                $customer->setData('erpm_enterprise_id',$responseContent['EnterpriseId']);
            }
            if(isset($responseContent['EnterpriseId'])){
                $customer->setData('erpm_country',$responseContent['EnterpriseId']);
            }


        } catch (\InvalidArgumentException $exception){
            // If its unable to unserialize, is because we are getting an error.
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($response->getBody()));
        } catch (\Exception $exception){
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($exception->getMessage()));
        }

    }

    protected function logRequest($request, $response){
        /** @var \Born\ERPM\Model\Log $log */
        $log = $this->_logFactory->create();
        $log->setRequest($this->_json->serialize($request));
        $log->setReponse($response->getBody());
        $log->setApiName('person');
        $log->setStoreId($this->_storeManager->getStore()->getId());
        try{
            $this->_logRepository->save($log);
            
        }  catch (\Exception $exception){
            throw new \Magento\Framework\Exception\LocalizedException(new Phrase($exception->getMessage()));
        }

    }
}