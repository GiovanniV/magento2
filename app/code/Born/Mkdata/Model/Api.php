<?php

namespace Born\Mkdata\Model;

/**
 * Class Api
 * @package Born\Mkdata\Model
 */
class Api
{
    /**
     * @var \Born\Mkdata\Helper\Data
     */
    protected $helper;
    /**
     * @var array
     */
    protected $options;

    /**
     * Api constructor.
     * @param \Born\Mkdata\Helper\Data $helper
     */
    public function __construct(
        \Born\Mkdata\Helper\Data $helper
    )
    {
        $this->helper = $helper;

        $this->options = [
            \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => $this->helper->getWsdl(),
            \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => Api\ClassMap::get()
        ];
    }

    /**
     * @param $value
     * @param bool $address
     * @return bool|int|void
     */
    public function search($field, $value)
    {
        $matches = [];
        $matches[] = new Api\StructType\Match(
            $field,
            4,
            'Word',
            'Is',
            $value
        );

        $groups = [];
        $groups[] = new Api\StructType\Group(
            'or',
            new Api\ArrayType\ArrayOfMatch($matches)
            );

        $search = new Api\ServiceType\Search($this->options);

        if ($search->SearchDpl(
            new Api\StructType\SearchDpl(
                new Api\StructType\DPLv31Credentials($this->helper->getUsername(), $this->helper->getPassword()),
                 new Api\StructType\Search(
                'or',
                true,
                true,
                2,
                true,
                true,
                    new  Api\ArrayType\ArrayOfGroup($groups)
                )
            )
        ) !== false) {
            $result = $search->getResult()->getSearchDplResult()->getHits()->getDPLv31Entry();

            return array('status' => 'success', 'count' => count($result), 'entities' => $result);
        } else {
            //$search->getLastError();
            return array('status' => 'error', 'count' => 0, 'entities' => []);
        }

        return array('status' => 'error', 'count' => 0, 'entities' => []);
    }
}