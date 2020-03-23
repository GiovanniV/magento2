<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\BoomiShipping\Model\Carrier;

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
use Magento\Shipping\Model\Carrier\AbstractCarrier;
use Magento\Shipping\Model\Carrier\CarrierInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory;
use Psr\Log\LoggerInterface;
use Magento\Shipping\Model\Rate\ResultFactory;
use Magento\Quote\Model\Quote\Address\RateResult\MethodFactory;
use Born\BoomiConnector\Model\BoomiConnector;
use Born\WebsiteStoreCreator\Model\StoreRelation;
use Born\CountryISO\Model\CountryISORepository;
use Magento\Checkout\Model\Session;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;
use Born\WebsiteStoreCreator\Model\StoreShipToRepository;
use Born\Shipping\Model\POBoxConfigProvider;
use Magento\Catalog\Model\Product;

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
     * @var POBoxConfigProvider
     */
    protected $poboxstatus;
    
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
     * @param POBoxConfigProvider $poboxstatus
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
         POBoxConfigProvider $poboxstatus,
         Product $product,
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
        $this->poboxstatus = $poboxstatus;
        $this->product = $product;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }
       
    /**
     * getAllowedMethods
     *
     * @param array
     */
    public function getAllowedMethods()
    {
        return [$this->_code => $this->getConfigData('name')];
    }

    /**
     * @param $request
     * @param $country
     * @param $state
     * @return int
     */
    public function getRestrictionsProduct($request, $country, $state)
    {
        $aerosol=0;
        $carb_status=0;
        $return=0;
        $carb=array('CT','DE','ME','MD','MA','NJ','NY','NM','OR','PA','RI','VT','WA','CA');//CARB states list
        foreach ($request->getAllItems() as $item) {
            $productId = $this->product->getIdBySku($item->getSku());
            $product = $this->product->load($productId);
            if ($product->getData('aerosol')>0) {
                $aerosol=1;
            }
            if ($product->getData('carb_status')>0) {
                $carb_status=1;
            }
        }
        if ($carb_status==1) {
            if (($country=='US')&&(in_array($request->getDestRegionCode(), $carb))) {
                $return=1;  //allow checkout proccess
            } else {
                $return=3;  //not allow checkout proccess
            }
        } elseif ($aerosol>0) {
            if ($country=='US') {
                $return=1;  //allow checkout proccess
            } else {
                $return=4;  //not allow checkout proccess
            }
        } else {
            $return=1;  //allow checkout proccess
        }
        
        return $return;
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
        if ((empty($request->getDestCity()))&&(empty($request->getDestPostcode()))&&(empty($request->getDestCountryId()))) {
            return false;
        }
        $message='';
        $restriction=$this->getRestrictionsProduct($request, $request->getDestCountryId(), $request->getDestRegionId());
        if ($restriction==3) {
            $flag=2;
            $message=__('We dont ship this product because of CARB regulations');
        } elseif ($restriction==4) {
            $flag=2;
            $message=__('We dont ship this product outside of United States');
        } else {
            $flag=1;
        }
        if ($this->poboxstatus->getConfig()==1) {
            $address=explode(' ', $request->getDestStreet());
            $pobs=['po','PO','P.O','post','box','po box'];
            foreach ($pobs as $pob) {
                if (in_array($pob, $address)) {
                    $flag=2;
                    $message=__('We dont ship to P.O. Please use a different address');
                }
            }
        }
        $result = $this->_rateResultFactory->create();
        $rates = $this->collectBoomiRate($request);
        if (count($rates)>0) {
            switch ($flag) {
            case 1:
                foreach ($rates['shipDetails_row'] as $rate) {
                    $method = $this->_rateMethodFactory->create();
                    $method->setCarrier($this->_code);
                    $title=$rate['service_desc'].' ( '.$rate['service_desc'].' )';
                    $method->setCarrierTitle($title);
                    $method->setMethod($rate['service']);
                    $method->setMethodTitle($rate['carrier']);
                    $method->setPrice($rate['freight']);
                    $method->setCost($rate['freight']);
                    $result->append($method);
                }

                break;
            case 2:
            
            $error = $this->_rateErrorFactory->create();
            $error->setCarrier($this->getCarrierCode());
            $error->setCarrierTitle($this->getConfigData('title'));
            $error->setErrorMessage($message);
            return $error;
           
           break;
            default:
            /* @var $error Error */
            $error = $this->_rateErrorFactory->create();
            $error->setCarrier($this->getCarrierCode());
            $error->setCarrierTitle($this->getConfigData('title'));
            $error->setErrorMessage($this->getConfigData('specificerrmsg'));
             return $error;
            }
        } else {
            return false;
        }
        // $result->reset();
        return $result;
    }

    /**
     * @param $request
     * @return array
     */
    public function collectBoomiRate($request)
    {
        $endpoint=$this->scopeConfig->getValue("boomi_shipping/general/api_url", ScopeInterface::SCOPE_STORES);
        
        $cartitems=array();
        foreach ($request->getAllItems() as $item) {
            $cartitems[]=['Product' =>(string)$item->getsku(), 'Qty' =>(string)$item->getQty(),'Unit_price' =>(string)$item->getPrice()];
        }
        $params = [
        'ShipTo' => [
         'Store_Ship_To' =>$this->storeShipTo->getStoreShipToObjectByWebsiteId($this->storeManager->getStore()->getWebsiteId())->getStoreShipto(),
         'Ship_To_Number' => $this->storeRelation->getShipToNumberByWebsiteId($this->storeManager->getStore()->getWebsiteId()),
         'Address1' =>$request->getDestStreet(),
         'Address2' => '',
        'City' => $request->getDestCity(),
        'State' => $request->getDestRegionCode(),
        'Zip' =>$request->getDestPostcode(),
         'Country_Code' => $this->countryISORepository->getById($request->getDestCountryId())->getIso3166Code(),
        'Cart_id' => $this->cart->getQuoteId(),
        'CartContent' => $cartitems
          ]
          ];
        $response=$this->boomiConnector->makeRequest($params, $endpoint, 'POST');
        // $response=$this->boomiConnector->getRequestXml($url,$request);
        if (isset($response['bms_api']['ShipDetails'])) {
            return $response['bms_api']['ShipDetails'];
        } else {
            return [];
        }
    }
}
