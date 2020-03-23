<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */


namespace Born\Customer\ViewModel;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;
use Born\Shipping\Model\POBoxConfigProvider;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\UrlFactory;
/**
 * Class DealerForm
 * @package Born\DealerForm\ViewModel
 */
class PoboxView implements ArgumentInterface
{
   
    /**
     * @var Registry
     */
    private $coreRegistry;
    
	 /**
    * @var StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var POBoxConfigProvider
     */
    protected $storepobox;
     /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param POBoxConfigProvider $storepobox
     * @param StoreManagerInterface $storeManager
	 * @param ScopeConfigInterface $scopeConfig
	 * @param UrlFactory $urlFactory
     * @param array $data
     */
    public function __construct(
        Registry $coreRegistry,
		POBoxConfigProvider $storepobox,
		StoreManagerInterface $storeManager,
		UrlFactory $urlFactory

    ) {
        $this->coreRegistry = $coreRegistry;
		 $this->storepobox= $storepobox;
        $this->storeManager = $storeManager;
		$this->urlModel = $urlFactory->create();
    }

	 
    /**
     * @return mixed
     */
      public function getStatus()
    {
       
     return $this->storepobox->getConfig();
        
    }
	   
	
	
}
