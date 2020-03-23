<?php

namespace Born\Mkdata\Observer;

use Magento\Setup\Exception;

/**
 * Class PlaceOrder
 * @package Born\Mkdata\Observer
 */
class PlaceOrder implements \Magento\Framework\Event\ObserverInterface
{
    const MAGENTO_STATUS_PENDING_MKDATA = 'pending_mkdata';
    const MAGENTO_STATUS_PENDING_MKDATA_APPROVED = 'approved_mkdata';
    const MAGENTO_STATUS_HOLD_PREORDER = 'hold_preorder';

    /**
     * @var \Born\Mkdata\Helper\Data
     */
    protected $helper;
    /**
     * @var \Born\Mkdata\Model\Search
     */
    protected $search;
    /**
     * @var
     */
    protected $alert;
    /**
     * @var \Magento\Sales\Api\OrderManagementInterfaceFactory
     */
    protected $orderManagement;
    /**
     * @var \Magento\Sales\Api\Data\OrderStatusHistoryInterfaceFactory
     */
    protected $orderStatusHistory;

    /**
     * PlaceOrder constructor.
     * @param \Born\Mkdata\Helper\Data $helper
     * @param \Born\Mkdata\Model\Search $search
     * @param \Born\Mkdata\Model\Alert $alert
     * @param \Magento\Sales\Api\OrderManagementInterfaceFactory $orderManagement
     * @param \Magento\Sales\Api\Data\OrderStatusHistoryInterfaceFactory $orderStatusHistory
     */
    public function __construct(
        \Born\Mkdata\Helper\Data $helper,
        \Born\Mkdata\Model\Search $search,
        \Born\Mkdata\Model\Alert $alert,
        \Magento\Sales\Api\OrderManagementInterfaceFactory $orderManagement,
        \Magento\Sales\Api\Data\OrderStatusHistoryInterfaceFactory $orderStatusHistory
    ) {
        $this->helper = $helper;
        $this->search = $search;
        $this->alert = $alert;
        $this->orderManagement = $orderManagement;
        $this->orderStatusHistory = $orderStatusHistory;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->helper->getIsActive()) {
            return; // module is turned off
        }

        $order = $observer->getEvent()->getOrder();

        $billingAddress = $order->getBillingAddress();
        $shippingAddress = $order->getShippingAddress();

        $billingAddressToCheck = [
            'country'   => $billingAddress->getCountryId(),
        ];

        $shippingAddressToCheck = [
            'country'   => $shippingAddress->getCountryId(),
        ];

        // Billing Name
        if ($this->handleResult(
            $this->search->searchPerson($billingAddress->getName()),
            $order,
            'Billing Name'))
        {
            return;
        }

        // Shipping Name
        if ($this->handleResult(
            $this->search->searchPerson($shippingAddress->getName()),
            $order,
            'Shipping Name'))
        {
            return;
        }

        // Company
        if ($this->helper->getCheckCompany()) {
            $billingCompany = $billingAddress->getCompany();
            $shippingCompany = $shippingAddress->getCompany();

            // Billing Company
            if ($billingCompany) {
                if ($this->handleResult(
                    $this->search->searchCompany($billingCompany),
                    $order,
                    'Billing Company')) {
                    return;
                }
            }

            // Shipping Company
            if ($shippingCompany) {
                if ($this->handleResult(
                    $this->search->searchCompany($shippingCompany),
                    $order,
                    'Shipping Company')) {
                    return;
                }
            }
        }

        // Countries
        if ($this->helper->getCheckAddresses()) {
            // Billing Country
            if ($this->handleResult(
                $this->search->searchAddress($billingAddress->getCountryId()),
                $order,
                'Billing Country'))
            {
                return;
            }

            // Shipping Country
            if ($this->handleResult(
                $this->search->searchAddress($shippingAddress->getCountryId()),
                $order,
                'Shipping Country'))
            {
                return;
            }
        }
	}

    /**
     * @param $result
     * @param $order
     * @param $reason
     * @return bool
     */

    public function handleResult($result, $order, $reason)
    {
        if ($result['status'] == 'success' && $result['count'] == 0) {
            // no errors, no matches
            return false;
        } else {

            $billingAddress = $order->getBillingAddress();
            $shippingAddress = $order->getShippingAddress();

            $notificationData = [
                'Order ID'                      => $order->getIncrementId(),
                'Reason'                        => '',
                'before_billing'                => '',
                'Billing Information'           => '',
                'Billing First Name'            => $billingAddress->getFirstname(),
                'Billing Last Name'             => $billingAddress->getLastname(),
                'Billing Street 1'              => $billingAddress->getStreetLine(1),
                'Billing Street 2'              => $billingAddress->getStreetLine(2),
                'Billing City'                  => $billingAddress->getCity(),
                'Billing State'                 => $billingAddress->getRegionId(),
                'Billing ZIP'                   => $billingAddress->getPostcode(),
                'Billing Country'               => $billingAddress->getCountryId(),
                'Billing Phone'                 => $billingAddress->getTelephone(),
                'before_shipping'               => '',
                'Shipping Information'          => '',
                'Shipping First Name'           => $shippingAddress->getFirstname(),
                'Shipping Last Name'            => $shippingAddress->getLastname(),
                'Shipping Street 1'             => $shippingAddress->getStreetLine(1),
                'Shipping Street 2'             => $shippingAddress->getStreetLine(2),
                'Shipping City'                 => $shippingAddress->getCity(),
                'Shipping State'                => $shippingAddress->getRegionId(),
                'Shipping ZIP'                  => $shippingAddress->getPostcode(),
                'Shipping Country'              => $shippingAddress->getCountryId(),
                'Shipping Phone'                => $shippingAddress->getTelephone(),
                'before_mkdata'                 => '',
                'MKDenial Information'          => '',
            ];


            $i = 0;
            foreach ($result['entities'] as $entities) {
                foreach ($entities as $label => $value) {
                    if ($label == 'FederalRegisterNotices') {
                        continue;
                    }

                    $notificationData['mkdata'][$i][$label] = $value;
                }
                $i++;
            }

            $comment = $this->orderStatusHistory->create();
            $comment->setStatus(self::MAGENTO_STATUS_PENDING_MKDATA);

            if ($result['status'] == 'error') {
                $message = 'Could not check MK Data, connection error';

                $comment->setComment($message);

                $notificationData['Reason'] = $message;
                $this->alert->sendMessage(
                    'MK Data Connection Error',
                    $notificationData,
                    'timeout'
                );
            } else {
                $message = 'Field found in MK Data: ' . $reason;

                $comment->setComment($message);

                $notificationData['Reason'] = $message;
                $this->alert->sendMessage(
                    'MK Data Order Flagged for Review',
                    $notificationData,
                    'review'
                );
            }

            $comment->setIsVisibleOnFront(false);
            $comment->setIsCustomerNotified(false);

            $orderManagement = $this->orderManagement->create();
            $orderManagement->addComment($order->getId(), $comment);

            return true;
        }
    }
}