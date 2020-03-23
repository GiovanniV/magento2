<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\DealerSearchApi\Model;

use Born\DealerSearchApi\Api\Data\SearchMarketLineInterfaceFactory;
use Born\DealerSearchApi\Api\Data\SearchMarketLineInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Born\DealerSearchApi\Model\ResourceModel\SearchMarketLine as SearchMarketLineRespource;
use Born\DealerSearchApi\Model\ResourceModel\SearchMarketLine\Collection;

/**
 * Class SearchMarketLine
 * @package Born\DealerSearchApi\Model
 */
class SearchMarketLine extends AbstractModel
{

    /**
     * @var SearchMarketLineInterfaceFactory
     */
    protected $search_market_lineDataFactory;
    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SearchMarketLineInterfaceFactory $search_market_lineDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchMarketLine $resource
     * @param \Born\DealerSearchApi\Model\ResourceModel\SearchMarketLine\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
         Context $context,
         Registry $registry,
         SearchMarketLineInterfaceFactory $search_market_lineDataFactory,
         DataObjectHelper $dataObjectHelper,
         SearchMarketLineRespource $resource,
         Collection $resourceCollection,
        array $data = []
    ) {
        $this->search_market_lineDataFactory = $search_market_lineDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve search_market_line model with search_market_line data
     * @return SearchMarketLineInterface
     */
    public function getDataModel()
    {
        $search_market_lineData = $this->getData();
        
        $search_market_lineDataObject = $this->search_market_lineDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $search_market_lineDataObject,
            $search_market_lineData,
            SearchMarketLineInterface::class
        );
        
        return $search_market_lineDataObject;
    }
}
