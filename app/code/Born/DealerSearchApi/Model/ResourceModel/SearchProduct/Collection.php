<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 *
 */
namespace Born\DealerSearchApi\Model\ResourceModel\SearchProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Born\DealerSearchApi\Model\ResourceModel\SearchProduct
 */
class Collection extends AbstractCollection
{

    /**
    * Define resource model
    *
    * @return void
    */
    protected function _construct()
    {
        $this->_init(
    \Born\DealerSearchApi\Model\SearchProduct::class,
    \Born\DealerSearchApi\Model\ResourceModel\SearchProduct::class
    );
    }

    /**
     * @param array $data
     * @return $this
     */
    public function addDistanceFilter($data = [])
    {
        if ($data['lat_search']!='') {
            $this->getSelect()->where('3959 * acos(cos( radians('.$data['lat_search'].')) * cos( radians( search_master.latitude ) ) * cos( radians( search_master.longitude ) - radians('.$data['long_search'].')) + sin( radians('.$data['lat_search'].') ) * sin( radians( search_master.latitude ) ) ) < '.$data['radius']);
        }
        return $this;
    }

    /**
     * @param $store
     * @param bool $withAdmin
     * @return $this
     */
    public function addStoreFilter($store, $withAdmin = true)
    {
        return $this;
    }

    /**
     * @return $this
     */
    public function joinallfivetable($result)
    {
        $distance= 0;
        $this->getSelect()->reset(\Zend_Db_Select::COLUMNS)->columns(['product_num']);
        $this->getSelect()->join(
    ['market_line' => $this->getTable('dealer_search_market_line')],
    'main_table.line_code = market_line.line_code and main_table.market_code = market_line.market_code',
        []
    );
        if (count($result)>0) {
            if ($result[0]['latitude']!='') {
                $distance= '(3959 * acos(cos( radians('.$result[0]['latitude'].')) * cos( radians( search_master.latitude ) ) * cos( radians( search_master.longitude ) - radians('.$result[0]['longitude'].')) + sin( radians('.$result[0]['latitude'].') ) * sin( radians( search_master.latitude ) ) ))';
            }
        }
        $this->getSelect()->join(
    ['search_master' => $this->getTable('dealer_search_master')],
    'search_master.parent_account = market_line.parent_account',
    ['search_master_id'=>'search_master.search_master_id','address'=>'search_master.address1','name'=>'search_master.name','address2'=>'search_master.address2','city'=>'search_master.city','state'=>'search_master.state','zip'=>'search_master.zip','phone'=>'search_master.phone','latitude'=>'search_master.latitude','longitude'=>'search_master.longitude','google_map'=>'search_master.google_map','consumer_email'=>'search_master.consumer_email','consumer_url'=>'search_master.consumer_url','installer'=>'search_master.installer','url'=>'search_master.url','url_part'=>'search_master.url_part','orderbycustom'=>$distance]
    );
        $this->getSelect()->group('search_master.search_master_id');


        return $this;
    }

    /**
     * @return mixed
     */
    protected function _renderFiltersBefore()
    {
        return parent::_renderFiltersBefore();
    }
}
