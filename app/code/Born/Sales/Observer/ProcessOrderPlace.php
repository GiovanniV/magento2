<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Alexander Lukyanov
 *
 */
namespace Born\Sales\Observer;

use Magento\Framework\DataObject\Copy;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class ProcessOrderPlace
 * @package Born\Sales\Observer
 */
class ProcessOrderPlace implements ObserverInterface
{
    /**
     * @var Copy
     */
    protected $objectCopyService;

    /**
     * ProcessOrderPlace constructor.
     * @param Copy $objectCopyService
     */
    public function __construct(
        Copy $objectCopyService
    ) {
        $this->objectCopyService = $objectCopyService;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     * @return $this|void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getEvent()->getOrder();
        /** @var \Magento\Sales\Model\Quote $quote */
        $quote = $observer->getEvent()->getQuote();
        $this->objectCopyService->copyFieldsetToTarget('sales_convert_quote', 'to_order', $quote, $order);
        return $this;
    }
}
