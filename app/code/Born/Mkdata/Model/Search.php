<?php

namespace Born\Mkdata\Model;

/**
 * Class Search
 * @package Born\Mkdata\Model
 */
class Search
{
    /**
     * @var \Born\Mkdata\Helper\Data
     */
    protected $helper;
    /**
     * @var Api
     */
    protected $api;

    /**
     * Search constructor.
     * @param \Born\Mkdata\Helper\Data $helper
     * @param Api $api
     */
    public function __construct(
        \Born\Mkdata\Helper\Data $helper,
        Api $api
    ){
        $this->helper = $helper;
        $this->api = $api;
    }

    /**
     * @param $value
     * @return bool|int|void
     */
    public function searchPerson($value)
    {
        return $this->api->search('Name', $value);
    }

    /**
     * @param $value
     * @return bool|int|void
     */
    public function searchCompany($value)
    {
        return $this->api->search('Name', $value);
    }

    /**
     * @param $value
     * @return bool|int|void
     */
    public function searchAddress($value)
    {
        return $this->api->search('Country', $value);
    }
}