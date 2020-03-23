<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Block;

use Born\DealerSearchApi\Model\SearchProductFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Directory\Model\Config\Source\Country;
use Born\DealerSearchApi\Model\SearchZipFactory;
use Born\DealerSearchApi\Model\SearchMasterFactory;
use Born\DealerSearchApi\Model\SearchProductRepository;
use Magento\Framework\View\Element\Template;
use Born\CountryISO\Model\CountryISOFactory;
use Born\CountryISO\Model\CountryISORepository;
use Born\DealerSearchApi\Model\SearchZipRepository;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Born\DealerSearchApi\Model\SearchProductRestrictRepository;
use Born\WebsiteStoreCreator\Model\StoreRelation;

/**
 * Class Stores
 * @package Born\DealerSearchApi\Block
 */
class Stores extends Template
{
    /**
     * @var Country
     */
    protected $countryFactory;
    /**
     * @var SearchProductFactory
     */
    protected $storeFactory;
    /**
     * @var
     */
    protected $resources;
    /**
     * @var null
     */
    protected $storeCollection = null;
    /**
     * @var int
     */
    protected $perPage = 75;
    /**
     * @var SearchZipFactory
     */
    protected $searchzipFactory;
    /**
     * @var SearchMasterFactory
     */
    protected $searchmasterFactory;
    /**
     * @var
     */
    protected $countryCollectionFactory;
    /**
     * @var
     */
    protected $countryISORepository;
    /**
     * @var SearchCriteriaInterface
     */
    protected $searchCriteriaInterface;
    /**
     * @var SearchZipRepository
     */
    protected $searchZipRepository;
    /**
    * @var productRestrictRepository
    */
    protected $searchCriteriaBuilder;
    /**
     * @var SearchProductRestrictRepository
     */
    protected $productRestrictRepository;
    /**
     * @var StoreRelation
     */
    protected $storeRelation;
    /**
     * @var searchProductRepository
     */
    protected $searchProductRepository;
    
    /**
     * Stores constructor.
     * @param Context $context
     * @param Country $countryFactory
     * @param SearchMasterFactory $searchmasterFactory
     * @param SearchZipFactory $searchzipFactory
     * @param SearchProductFactory $storeFactory
     * @param productRestrictRepository $countryISOFactory
     * @param SearchProductRestrictRepository $searchCriteriaBuilder
     * @param CountryISOFactory $countryISOFactory
     * @param array $data
     * @param StoreRelation $storeRelation
     * @param SearchProductRepository $searchProductRepository
     */
    public function __construct(
    Context $context,
    Country $countryFactory,
    SearchMasterFactory $searchmasterFactory,
    SearchZipFactory $searchzipFactory,
    SearchProductFactory $storeFactory,
    CountryISOFactory $countryISOFactory,
    CountryISORepository $countryISORepository,
    SearchCriteriaInterface $searchCriteriaInterface,
    SearchZipRepository $searchZipRepository,
    SearchProductRestrictRepository $productRestrictRepository,
    SearchCriteriaBuilder $searchCriteriaBuilder,
    StoreRelation $storeRelation,
    SearchProductRepository $searchProductRepository,
    array $data = []
    ) {
        $this->countryFactory = $countryFactory;
        $this->storeFactory = $storeFactory;
        $this->searchmasterFactory = $searchmasterFactory;
        $this->searchzipFactory = $searchzipFactory;
        $this->countryISOFactory = $countryISOFactory;
        $this->CountryISORepository = $countryISORepository;
        $this->searchCriteriaInterface = $searchCriteriaInterface;
        $this->searchZipRepository = $searchZipRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->productRestrictRepository = $productRestrictRepository;
        $this->storeRelation = $storeRelation;
        $this->searchProductRepository = $searchProductRepository;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    /**
    * @return array
    */
    public function array_msort($array, $cols)
    {
        $colarr = array();
        foreach ($cols as $col => $order) {
            $colarr[$col] = array();
            foreach ($array as $k => $row) {
                $colarr[$col]['_'.$k] = strtolower($row[$col]);
            }
        }
        $eval = 'array_multisort(';
        foreach ($cols as $col => $order) {
            $eval .= '$colarr[\''.$col.'\'],'.$order.',';
        }
        $eval = substr($eval, 0, -1).');';
        eval($eval);
        $ret = array();
        foreach ($colarr as $col => $arr) {
            foreach ($arr as $k => $v) {
                $k = substr($k, 1);
                if (!isset($ret[$k])) {
                    $ret[$k] = $array[$k];
                }
                $ret[$k][$col] = $array[$k][$col];
            }
        }
        return $ret;
    }

      
    /**
     * @return array
     */
    public function getCountries()
    {
        foreach ($this->countryFactory->toOptionArray() as $row) {
            if (!empty($row['value'])) {
                $isocountrycode =$this->CountryISORepository->getById($row['value'])->getIso3166Code();
                $countryisolist[]=array('label'=>$row['label'],'value'=>$isocountrycode);
            } else {
                $countryisolist[]=array('label'=>$row['label'],'value'=>'');
            }
        }
        return $this->array_msort($countryisolist, array('label'=>SORT_ASC));
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->getRequest()->getParam('zipcode', '');
    }

    /**
     * @return mixed
     */
    public function getCityCode()
    {
        return $this->getRequest()->getParam('city', '');
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        $code='';
        if ($this->getRequest()->getParam('country', '')=='') {
            foreach ($this->getCountries() as $row) {
                if ($row['label']==$this->storeRelation->getCountryNameByWebsiteId($this->_storeManager->getStore()->getWebsiteId())) {
                    $code=$row['value'];
                }
            }
        } else {
            $code=$this->getRequest()->getParam('country', '');
        }
        return $code;
    }

    /**
     * @return mixed
     */
    public function getcurPageCode()
    {
        return $this->getRequest()->getParam('p', false);
    }

    /**
     * @return mixed
     */
    public function getDealertypeCode()
    {
        return $this->getRequest()->getParam('dealertype', '');
    }

    /**
     * @return mixed
     */
    public function getProductnumCode()
    {
        return $this->getRequest()->getParam('productnum', '');
    }

    /**
     * @return mixed
     */
    public function getPincodefoundCode()
    {
        return $this->getRequest()->getParam('pincodefound', '');
    }

    /**
     * @return mixed
     */
    protected function _getStoreCollection()
    {
        $data = $this->getRequest()->getParams();
        $searchCriteria=$this->searchCriteriaBuilder->addFilter('main_table.product_num', $data['productnum'], 'eq');
        $searchCriteriaobj = $this->searchCriteriaBuilder->create();
        $collection = $this->searchProductRepository->getDealerList($searchCriteriaobj);
        $result = $this->getCoordinate();
        if (count($result)>0) {
            if ($result[0]['latitude']!='') {
                $collection->getSelect()->order('orderbycustom', 'ASC');
            }
        }
        
        return $collection;
    }

  
    /**
     * @param $countryid
     * @return mixed
     */
    public function checkCountry($countryid)
    {
        $flag=0;
        if (!empty($this->searchZipRepository->LoadByCountryZip($countryid))) {
            $flag=1;
        }
        return $flag;
    }

    /**
     * @return mixed
     */
    public function getCoordinate()
    {
        $data = $this->getRequest()->getParams();
        $collectionzip = $this->searchzipFactory->create()->getCollection();
        $country='';
        $collectionmaster = $this->searchmasterFactory->create()->getCollection();
        if ($data['pincodefound']==1) {
            $collectionzip->addFieldToFilter('zip', $data['zipcode']);
            $collectionzip->addFieldToFilter('country', $data['country']);
            if ($collectionzip->count()>0) {
                return $collectionzip->getData();
            } else {
                $city='';
                if (($data['city']!=='')||($data['zipcode']=='')) {
                    $collectionmaster->addFieldToFilter('city', ['like' => $data['city']]);
                }
                $collectionmaster->addFieldToFilter('country', $data['country']);
                return   $collectionmaster->getData();
            }
        } else {
            $collectionmaster->addFieldToFilter('country', $data['country']);
    
            return   $collectionmaster->getData();
        }
    }

    /**
     * @return mixed|null
     */
    public function getStoreCollection()
    {
        $data = $this->getRequest()->getParams();

        if (is_null($this->storeCollection)) {
            $this->storeCollection = $this->_getStoreCollection();
            $this->storeCollection->setPageSize($this->perPage)->setCurPage($this->getCurrentPage());
            if (!empty($data['country'])) {
                $this->storeCollection->addFieldToFilter('search_master.country', $data['country']);
            }
            if (!empty($data['productnum'])) {
                ;
                $dealercust=$this->getProductRestrictDelaer($data['productnum']);
                if (count($dealercust)>0) {
                    $this->storeCollection->addFieldToFilter('search_master.parent_account', ['in' => implode(',', $dealercust)]);
                }
            }
            if (!empty($data['city'])) {
                $this->storeCollection->addFieldToFilter('search_master.city', array("like" => $data['city']));
            }
            if ($data['dealertype']=='1') {
                $this->storeCollection->addFieldToFilter('search_master.installer', '-1');
            }
            if ($data['dealertype']=='2') {
                $this->storeCollection->addFieldToFilter('search_master.installer', '0');
            }
            $result= $this->getCoordinate();
            if (count($result)>0) {
                $this->storeCollection->addDistanceFilter(array('lat_search'=>$result[0]['latitude'],'long_search'=>$result[0]['longitude'],'radius'=>100));
            }
            if (!empty($data['lat_search']) && !empty($data['long_search'])) {
                $this->storeCollection->addDistanceFilter($data);
            }
            $websitelocation=$this->storeRelation->getShipToNumberByWebsiteId($this->_storeManager->getStore()->getWebsiteId());
            $this->storeCollection->addFieldToFilter('search_master.ship_to_number', $websitelocation);

            $this->storeCollection->joinallfivetable($result);
        }
        return $this->storeCollection;
    }
    
    public function getProductRestrictDelaer($productnum)
    {
        $this->searchCriteriaBuilder->addFilter('product_num', $productnum, 'eq');
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $dealerRest=[];
        foreach ($this->productRestrictRepository->getList($searchCriteria)->getItems() as $items) {
            $dealerRest[]=$items->getDealerCustNumb();
        }
        return $dealerRest;
    }

    /**
     * @param $lat1
     * @param $lon1
     * @param $lat2
     * @param $lon2
     * @return array
     */
    public function getDistance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return compact('miles', 'kilometers');
    }
    /**
    * Fetch the current page for the stores list
    *
    * @return int
    */
    public function getCurrentPage()
    {
        return $this->getRequest()->getParam('p', false) ? $this->getRequest()->getParam('p') : 1;
    }

    /**
    * Get a pager
    *
    * @return string|null
    */
    public function getPager()
    {
        $pager = $this->getChildBlock('store.list.pager');

        if ($pager) {
            $storesPerPage = $this->perPage;
            $pager->setAvailableLimit(array($storesPerPage => $storesPerPage));
            $pager->setTotalNum($this->getStoreCollection()->getSize());
            $pager->setCollection($this->getStoreCollection());
            $pager->setShowPerPage(true);
            $pager->setShowAmounts(true);
            return $pager->toHtml();
        }

        return null;
    }
}
