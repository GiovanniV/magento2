<?php

namespace Born\Hibbert\Cron;

class Inventory {
 
    protected $scopeConfig;
    protected $inventory;
    protected $logger;
    protected $helper;
 
    public function __construct(
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Born\Hibbert\Model\Inventory $inventory,
        \Born\Hibbert\Logger\Logger $logger,
        \Born\Hibbert\Helper\Data $helper
	) {
        $this->scopeConfig = $scopeConfig;
        $this->inventory = $inventory;
        $this->logger = $logger;
        $this->helper = $helper;
    }
 
    public function execute()
    {
        if (!$this->helper->getIsActive()) {
            return; // module is turned off
        }

		$this->logger->info('Inventory Update: Started (CRON)');

        $this->inventory->updateInventory();

		$this->logger->info('Inventory Update: Finished (CRON)');
		
        return $this;
    }
}