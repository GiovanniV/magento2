<?php

namespace Born\Restrictions\Model;

class Search
{
    protected $entityFactory;

    public function __construct(
        \Born\Restrictions\Model\EntityFactory $entityFactory
    ){
        $this->entityFactory = $entityFactory;
    }

    public function search($type, $data)
    {
        $rows = [];
        $entity = $this->entityFactory->create();
        $collection = $entity->getCollection();

        if ($type == 'name') {
            $rows = $collection->addFilter('firstname', $data['firstname'])
                ->addFilter('lastname', $data['lastname']);
        } else if ($type == 'company') {
            $rows = $collection->addFilter('company', $data['company']);
        } else if ($type == 'address') {
            $rows = $collection->addFilter('street', $data['street'])
                ->addFilter('city', $data['city'])
                ->addFilter('region', $data['region'])
                ->addFilter('postalcode', $data['postalcode'])
                ->addFilter('country', $data['country']);
        }

        return $rows->count();
    }
}