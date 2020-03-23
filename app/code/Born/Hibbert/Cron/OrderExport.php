<?php

namespace Born\Hibbert\Cron;

class OrderExport {
 
    protected $scopeConfig;
    protected $order;
    protected $logger;
    protected $helper;
 
    public function __construct(
		\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Born\Hibbert\Model\Order $order,
        \Born\Hibbert\Logger\Logger $logger,
        \Born\Hibbert\Helper\Data $helper
	) {
        $this->scopeConfig = $scopeConfig;
        $this->order = $order;
        $this->logger = $logger;
        $this->helper = $helper;
    }
 
    public function execute()
    {
        if (!$this->helper->getIsActive()) {
            return; // module is turned off
        }

		$this->logger->info('Order Export: Started (CRON)');

        $this->order->exportOrders();

		$this->logger->info('Order Export: Finished (CRON)');
		
        return $this;
    }
}