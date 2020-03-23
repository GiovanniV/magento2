<?php

namespace Born\Mkdata\Observer;

class CorrectStatus implements \Magento\Framework\Event\ObserverInterface
{
    protected $helper;
    protected $logger;

    public function __construct(
        \Born\Mkdata\Helper\Data $helper,
        \Born\Mkdata\Logger\Logger $logger
    ) {
        $this->helper = $helper;
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getOrder();

        $this->logger->info($order->getOrigData('status'));
        $this->logger->info($order->getData('status'));

        if ($order->getOrigData('status') == \Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA) {

            if ($order->getData('status') != \Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA_APPROVED) {
                $order->setState($order->getOrigData('state'));
                $order->setStatus($order->getOrigData('status'));
            }
        }
    }
}