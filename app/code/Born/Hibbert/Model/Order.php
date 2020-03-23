<?php

namespace Born\Hibbert\Model;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

class Order
{
	const MAGENTO_STATUS_NEW = 'processing';
	const MAGENTO_STATUS_APPROVED = 'approved_mkdata';
	const MAGENTO_STATUS_RELEASED = 'released';
	const MAGENTO_STATUS_EXPORTED = 'exported';
	const HIBBERT_STATUS_SHIPPED = 'SHIPPED';

	protected $api;
	protected $orderRepository;
	protected $searchCriteriaBuilder;
	protected $shipOrder;
	protected $shipOrderFactory;
	protected $shipItem;
	protected $shipmentTrack;
	protected $orderManagement;
	protected $orderStatusHistory;
	protected $appState;
	protected $logger;

	public function __construct(
		Api $api,
		\Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
		\Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Sales\Api\ShipOrderInterfaceFactory $shipOrderFactory,
        \Magento\Sales\Api\Data\ShipmentItemCreationInterface $shipItem,
        \Magento\Sales\Api\Data\ShipmentTrackCreationInterface $shipmentTrack,
        \Magento\Sales\Api\OrderManagementInterfaceFactory $orderManagement,
        \Magento\Sales\Api\Data\OrderStatusHistoryInterfaceFactory $orderStatusHistory,
        \Magento\Framework\App\State $appState,
        \Born\Hibbert\Logger\Logger $logger
	){
	    $this->api = $api;
		$this->orderRepository = $orderRepository;
		$this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->shipOrderFactory = $shipOrderFactory;
		$this->shipItem = $shipItem;
		$this->shipmentTrack = $shipmentTrack;
		$this->orderManagement = $orderManagement;
		$this->orderStatusHistory = $orderStatusHistory;
		$this->appState = $appState;
		$this->logger = $logger;
	}

	public function exportOrders($orderId = null)
    {
        if (!$orderId) {
            printf("Looking for orders\n");
            $orders = $this->getOrders();
        } else {
            printf("Exporting single order %s\n", $orderId);
            $orders = $this->getOrder($orderId);
        }

        $totalOrders = count($orders);
        if (!$totalOrders) {
            return (string)__('There are no new orders to export.');
        }

        foreach ($orders as $order) {
            echo sprintf (__("Sending: %s \n"), $order->getIncrementId());
            $this->sendOrder($order);
        }

        return (string) sprintf (__("Sent %s order(s)"), $totalOrders);
	}

	protected function getOrders()
	{
		$searchCriteria = $this->searchCriteriaBuilder
			->addFilter('status', [self::MAGENTO_STATUS_NEW, self::MAGENTO_STATUS_APPROVED, self::MAGENTO_STATUS_RELEASED], 'in')
			->create();

		return $this->orderRepository->getList($searchCriteria);
	}

	protected function getOrder($orderId)
	{
		$searchCriteria = $this->searchCriteriaBuilder
			->addFilter('increment_id', $orderId, 'eq')
			->create();

		return $this->orderRepository->getList($searchCriteria);
	}

	public function sendOrder($order)
    {
        $parameters = [];

        //$billing = $order->getBillingAddress();
        $shipping = $order->getShippingAddress();
        $items = $order->getItems();

        $parameters['address']['city'] = $shipping->getCity();
        $parameters['address']['country'] = $shipping->getCountryId();
        $parameters['address']['line1'] = $shipping->getStreetLine(1);
        $parameters['address']['line2'] = $shipping->getStreetLine(2);
        $parameters['address']['postalCode'] = $shipping->getPostCode();
        $parameters['address']['state'] = $shipping->getRegionCode();

        $parameters['person']['company'] = $shipping->getCompany();
        $parameters['person']['firstname'] = $shipping->getFirstname();
        $parameters['person']['lastname'] = $shipping->getLastname();
        $parameters['person']['email'] = $shipping->getEmail();
        $parameters['person']['phone'] = $shipping->getTelephone();

        $parameters['information']['orderReferenceNumber'] = $order->getIncrementId();
        $parameters['information']['customerReferenceNumber'] = $order->getCustomerId();
        $parameters['information']['orderDate'] = str_replace(' ', 'T', $order->getCreatedAt());
        $parameters['information']['customerReferenceNumber'] = $order->getCustomerId();
        $parameters['information']['numberOfLines'] = $order->getTotalItemCount();
        $parameters['information']['shipmentMethod'] = $this->mapMagentoShippingToHibbert($order->getShippingMethod());
        $parameters['information']['subtotal'] = number_format($order->getSubtotal(), 2);
        $parameters['information']['shippingHandling'] = number_format($order->getShippingAmount(), 2);
        $parameters['information']['tax'] = number_format($order->getTaxAmount(), 2);
        $parameters['information']['total'] = number_format($order->getGrandTotal(), 2);

        foreach ($items as $item) {
            if ($item->getProductType() == 'bundle') {
                continue;
            }

            $lineId = $item->getId();
            $parameters['information']['orderLines'][$lineId]['itemPrice'] = number_format($item->getPrice(), 2);
            $parameters['information']['orderLines'][$lineId]['lineNumber'] = $lineId;
            $parameters['information']['orderLines'][$lineId]['partNumber'] = $item->getSku();
            $parameters['information']['orderLines'][$lineId]['quantityOrdered'] = number_format($item->getQtyOrdered(), 0);
            $parameters['information']['orderLines'][$lineId]['subtotal'] = number_format($item->getQtyOrdered() * $item->getPrice(), 2);
            $parameters['information']['orderLines'][$lineId]['tax'] = number_format($item->getTaxAmount(), 2);
            $parameters['information']['orderLines'][$lineId]['total'] = number_format($item->getRowTotal(), 2);
        }

        $response = $this->api->placeOrder($parameters);

        foreach ($response->OrderResponseWS as $orderResponse) {
            if (!$orderResponse->errors) {
                $hibbertOrderNumber = $orderResponse->orderNumber;
                $comment = $this->orderStatusHistory->create();
                $comment->setStatus(self::MAGENTO_STATUS_EXPORTED);
                $comment->setComment('Hibbert order #: ' . $hibbertOrderNumber);
                $comment->setIsVisibleOnFront(false);
                $comment->setIsCustomerNotified(false);

                $orderManagement = $this->orderManagement->create();
                $orderManagement->addComment($order->getId(), $comment);
            } else {
                $errorMessage = "Unknown Error";

                foreach ($orderResponse->errors->ErrorCodeWS as $error) {
                    $errorMessage = $error->errorDescription;
                    break;
                }

                $comment = $this->orderStatusHistory->create();
                $comment->setStatus('processing');
                $comment->setComment('Error exporting to Hibbert: ' . $errorMessage);
                $comment->setIsVisibleOnFront(false);
                $comment->setIsCustomerNotified(false);

                $orderManagement = $this->orderManagement->create();
                $orderManagement->addComment($order->getId(), $comment);

                $this->logger->info("Error exporting ID: " . $order->getIncrementId());
                $this->logger->info('Error: ' . $errorMessage);
            }
        }
    }

	public function updateOrders()
    {
        $completeOrders = [];
        $datesToCheck = [];

        // Orders in processing to check
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('status', self::MAGENTO_STATUS_EXPORTED, 'eq') // do not update already processed
            ->create();
        $pendingShipment = $this->orderRepository->getList($searchCriteria);

        foreach ($pendingShipment as $pendingOrder) {
            $datesToCheck[] = date('Y-m-d', strtotime($pendingOrder->getCreatedAt()));
        }

        $datesToCheck = array_unique($datesToCheck);

        foreach ($datesToCheck as $requestDate) {
            $orders = $this->api->getOrderStatusFeed($requestDate);

            if (!$orders) {
                // no updates for this date
                continue;
            }

            foreach ($orders as $order) {
                if ($order->orderStatus == self::HIBBERT_STATUS_SHIPPED) {
                    $completeOrders[$order->orderReferenceNumber]['tracking'] = [];

                    foreach ($order->lineItemStatus->OrderLineItemStatusWS as $line) {
                        if (!array_key_exists($line->trackingNumber, $completeOrders[$order->orderReferenceNumber]['tracking'])) {
                            $completeOrders[$order->orderReferenceNumber]['tracking'][$line->trackingNumber] = $line->shipMethod;
                        }
                    }
                }
            }
        }

        // $completeOrders['000000001']['tracking']['ABC123'] = 'UPSG'; // test

        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('increment_id', array_keys($completeOrders), 'in')
            ->addFilter('status', self::MAGENTO_STATUS_EXPORTED, 'eq') // do not update already processed
            ->create();
        $orderList = $this->orderRepository->getList($searchCriteria);

        if (!count($orderList)) {
            return (string) __('No New Orders to Update');
        }

        foreach ($orderList as $order) {

            $this->orderRepository->get($order->getId());

            $data = $completeOrders[$order->getIncrementId()];

            $shipItems = [];

            foreach ($order->getAllItems() as $orderItem) {
                if (!$orderItem->getQtyToShip() || $orderItem->getIsVirtual()) {
                    continue;
                }

                $itemCreation = $this->shipItem
                    ->setOrderItemId($orderItem->getId())
                    ->setQty($orderItem->getQtyOrdered());
                $shipItems[] = clone $itemCreation;
            }

            $trackingItems = [];

            foreach ($data['tracking'] as $tracking => $method) {
                $method = $this->mapHibbertToMagento($method);

                if ($method) {
                    $trackingCreation = $this->shipmentTrack
                        ->setTrackNumber($tracking)
                        ->setCarrierCode($method['carrier_code'])
                        ->setTitle($method['title']);
                    $trackingItems[] = clone $trackingCreation;
                }
            }

            $shipOrder = $this->shipOrderFactory->create();

            $shipOrder->execute(
                $order->getId(),
                $shipItems,
                true, // notify
                false, // append comment
                null, // comment
                $trackingItems
            );
        }
    }

    protected function mapMagentoShippingToHibbert($method)
    {
        $methods = [
            'ups_GND' => 'UPSG'
        ];

        if (array_key_exists($method, $methods)) {
            return $methods[$method];
        }

        return 'UPSG'; // default, if error
    }

    protected function mapHibbertToMagento($method)
    {
        $methods = [
            'UPSG' => ['carrier_code' => 'ups', 'title' => 'UPS Ground']
        ];

        if (array_key_exists($method, $methods)) {
            return $methods[$method];
        }

        return $methods['UPSG']; // default, if error
    }
}