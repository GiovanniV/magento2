<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\BoomiShipping\Model\Carrier;

use Born\BoomiConnector\Model\BoomiConnector;
use Born\CountryISO\Model\CountryISORepository;
use Born\WebsiteStoreCreator\Model\StoreRelation;
use Born\WebsiteStoreCreator\Model\StoreShipToRepository;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Psr\Log\LoggerInterface;
use Zend\Http\Request;

/**
 * Class Boomishipping
 * @package Born\BoomiShipping\Model\Carrier
 */
class Boomishipping extends AbstractCarrier implements CarrierInterface
{

    /**
     * @var string
     */
    protected $_code = 'boomishipping';

    /**
     * @var bool
     */
    protected $_isFixed = true;

    /**
     * @var ResultFactory
     */
    protected $_rateResultFactory;

    /**
     * @var MethodFactory
     */
    protected $_rateMethodFactory;
    /**
     * @var BoomiConnector
     */
    protected $boomiConnector;
    /**
     * @var CountryISORepository
     */
    protected $countryISORepository;
    /**
     * @var StoreRelation
     */
    protected $storeRelation;
    /**
    * @var StoreManagerInterface
    */
    protected $storeManager;
    /**
     * @var Session
     */
    protected $cart;
    /**
    * @var logger
    */
    private $logger;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;
    /**
    * @var ScopeConfigInterface
    */
    protected $storeShipTo;
    /**
     * Constructor
     *
     * @param  ScopeConfigInterface $scopeConfig
     * @param  ErrorFactory $rateErrorFactory
     * @param  LoggerInterface $logger
     * @param  ResultFactory $rateResultFactory
     * @param  MethodFactory $rateMethodFactory
     * @param StoreManagerInterface $storeManager
     * @param StoreRelation $storeRelation
     * @param CountryISORepository $countryISORepository
     * @param Session $cart
     * @param StoreShipToRepository $StoreShipTo
     * @param array $data
     */

    public function __construct(
         ScopeConfigInterface $scopeConfig,
         ErrorFactory $rateErrorFactory,
         LoggerInterface $logger,
         ResultFactory $rateResultFactory,
         MethodFactory $rateMethodFactory,
         BoomiConnector $boomiConnector,
         StoreManagerInterface $storeManager,
         StoreRelation $storeRelation,
         CountryISORepository $countryISORepository,
         Session $cart,
         StoreShipToRepository $storeShipTo,
        array $data = []
    ) {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        $this->boomiConnector = $boomiConnector;
        $this->logger = $logger;
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->countryISORepository = $countryISORepository;
        $this->storeRelation = $storeRelation;
        $this->cart= $cart;
        $this->storeShipTo= $storeShipTo;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function collectRates(RateRequest $request)
    {
        $api_url= $this->scopeConfig->getValue("boomi_shipping/general/api_url", ScopeInterface::SCOPE_STORES);
        if (!$this->getConfigFlag('active') || !$api_url) {
            return false;
        }
        if (!$request->getDestCity() || !$request->getDestPostcode() || !$request->getDestCountryId()) {
            return false;
        }
        $result = $this->_rateResultFactory->create();
        $rates =[];
        $rates = $this->collectBoomiRates($request);
        if (count($rates)>0) {
            foreach ($rates['shipDetails_row'] as $rate) {
                $method = $this->_rateMethodFactory->create();
                $method->setCarrier($this->_code);
                $title=$rate['service_desc'] . ' ( ' . $rate['service_desc'] . ' )';
                $method->setCarrierTitle($title);
                $method->setMethod($rate['carrier'] . '_' . $rate['service']);
                $method->setMethodTitle($rate['carrier']);
                $method->setPrice($rate['freight']);
                $method->setCost($rate['freight']);
                $result->append($method);
            }
        } else {
            return false;
        }
        return $result;
    }

    /**
     * @param RateRequest $request
     * @return array
     * @throws \DOMException
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    private function collectBoomiRates(RateRequest $request)
    {
        $endpoint=$this->scopeConfig->getValue("boomi_shipping/general/api_url", ScopeInterface::SCOPE_STORES);
        $cartItems = [];

        foreach ($request->getAllItems() as $item) {
            $cartItems[]=['Product' =>(string)$item->getSku(), 'Qty' =>(string)$item->getQty(),'Unit_price' =>(string)$item->getPrice()];
        }
        $streetArray = explode("\n", $request->getDestStreet());
        $params = [
            'ShipTo' => [
                 'Store_Ship_To' =>$this->storeShipTo->getStoreShipToObjectByWebsiteId($this->storeManager->getStore()->getWebsiteId())->getStoreShipto(),
                 'Ship_To_Number' => $this->storeRelation->getShipToNumberByWebsiteId($this->storeManager->getStore()->getWebsiteId()),
                 'Address1' =>$streetArray[0],
                 'Address2' => (isset($streetArray[1]) ? $streetArray[1] : ''),
                 'City' => $request->getDestCity(),
                 'State' => $request->getDestRegionCode(),
                 'Zip' =>$request->getDestPostcode(),
                 'Country_Code' => $this->countryISORepository->getById($request->getDestCountryId())->getIso3166Code(),
                 'Cart_id' => $this->cart->getQuoteId(),
                 'CartContent' => $cartItems
            ]
          ];

        $response=$this->boomiConnector->makeRequest($params, $endpoint, Request::METHOD_POST);
        if (isset($response['bms_api']['ShipDetails'])) {
            return $response['bms_api']['ShipDetails'];
        } else {
            return [];
        }
    }

    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }
}
