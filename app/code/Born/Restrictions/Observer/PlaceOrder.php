<?php

namespace Born\Restrictions\Observer;

use Magento\Setup\Exception;

class PlaceOrder implements \Magento\Framework\Event\ObserverInterface
{
    protected $orderManagement;
    protected $orderStatusHistory;
    protected $orderModel;
    protected $search;
    protected $alert;

    public function __construct(
        \Magento\Sales\Api\OrderManagementInterfaceFactory $orderManagement,
        \Magento\Sales\Api\Data\OrderStatusHistoryInterfaceFactory $orderStatusHistory,
        \Magento\Sales\Model\Order $orderModel,
        \Born\Restrictions\Model\Search $search,
        \Born\Mkdata\Model\Alert $alert
    ) {
        $this->orderManagement = $orderManagement;
        $this->orderStatusHistory = $orderStatusHistory;
        $this->orderModel = $orderModel;
        $this->search = $search;
        $this->alert = $alert;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();

        $billingAddress = $order->getBillingAddress();
        $shippingAddress = $order->getShippingAddress();

        $billingNameToCheck = [
            'firstname' => $billingAddress->getFirstname(),
            'lastname' => $billingAddress->getLastname(),
        ];

        $shippingNameToCheck = [
            'firstname' => $shippingAddress->getFirstname(),
            'lastname' => $shippingAddress->getLastname(),
        ];

        $billingCompanyToCheck = [
            'company' => $billingAddress->getCompany(),
        ];

        $shippingCompanyToCheck = [
            'company' => $shippingAddress->getCompany(),
        ];

        $billingAddressToCheck = [
            'street'        => $billingAddress->getStreetLine(1),
            'city'          => $billingAddress->getCity(),
            'region'        => $billingAddress->getRegionCode(),
            'postalcode'    => $billingAddress->getPostcode(),
            'country'       => $billingAddress->getCountry(),
        ];

        $shippingAddressToCheck = [
            'street'        => $shippingAddress->getStreetLine(1),
            'city'          => $shippingAddress->getCity(),
            'region'        => $shippingAddress->getRegionCode(),
            'postalcode'    => $shippingAddress->getPostcode(),
            'country'       => $shippingAddress->getCountry(),
        ];

        // Search by name
        if ($this->handleResult($this->search->search('name', $billingNameToCheck), $order, 'Billing Name')) {
            return;
        }

        if ($this->handleResult($this->search->search('name', $shippingNameToCheck), $order, 'Shipping Name')) {
            return;
        }

        // Company
        if ($this->handleResult($this->search->search('company', $billingCompanyToCheck), $order, 'Billing Company')) {
            return;
        }

        if ($this->handleResult($this->search->search('company', $shippingCompanyToCheck), $order, 'Shipping Company')) {
            return;
        }

        // Address
        if ($this->handleResult($this->search->search('address', $billingAddressToCheck), $order, 'Billing Address')) {
            return;
        }

        if ($this->handleResult($this->search->search('address', $shippingAddressToCheck), $order, 'Shipping Address')) {
            return;
        }
	}

    public function handleResult($result, $order, $reason)
    {
        if (!$result) {
            // no errors, no matches
            return false;
        } else {
            $orderInstance = $this->orderModel->load($order->getId());
            // state correction
            try {
                $orderInstance->setState(\Magento\Sales\Model\Order::STATE_PROCESSING);
            } catch (Exception $e) {

            }

            $comment = $this->orderStatusHistory->create();

            $orderInstance->setStatus(\Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA);
            $comment->setStatus(\Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA);
            $comment->setComment('Field found in Checkout Restrictions: ' . $reason);
            $this->alert->sendMessage(
                'Checkout Restrictions Order Flagged for Review',
                'Order ID: ' . $order->getIncrementId(),
                'review'
            );

            $comment->setIsVisibleOnFront(false);
            $comment->setIsCustomerNotified(false);

            $orderManagement = $this->orderManagement->create();
            $orderManagement->addComment($order->getId(), $comment);

            // state correction
            try {
                $orderInstance->save();
            } catch (Exception $e) {

            }
            return true;
        }
    }
}