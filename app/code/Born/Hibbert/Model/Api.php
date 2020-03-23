<?php 

namespace Born\Hibbert\Model;

class Api
{
    /**
     * @var \Born\Hibbert\Helper\Data
     */
    protected $helper;

    /**
     * @var array
     */
    protected $options;

    /**
     * Api constructor.
     * @param \Born\Hibbert\Helper\Data $helper
     */
    public function __construct(
		\Born\Hibbert\Helper\Data $helper
    )
    {	
		$this->helper = $helper;
		

    }

    public function getOptions(){
        if(!$this->options){
            $this->options = [
                \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_URL => $this->helper->getWsdl(),
                \WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_CLASSMAP => Api\ClassMap::get()
            ];
        }
        return $this->options;
    }

    /**
     * @return bool|Api\StructType\InventoryWS[]
     */
    public function getProducts()
	{
		$get = new Api\ServiceType\Get($this->getOptions());

		if ($get->getInventory(
			new Api\StructType\GetInventory(
				new Api\StructType\InventoryRequestWS($this->helper->getClientReferenceNumber(), $this->helper->getPassword(), $this->helper->getUsername())
			)
		) !== false) {
			$result = $get->getResult()->getReturn();

			if (!$result->errors) {
				return $result->inventoryItems->InventoryWS;
			} else {
				printf("Error: %s", $get->getLastError());
				return false;
			}
		} else {
			printf("Error: %s", $get->getLastError());
			return false;
		}
	}

    /**
     * @param $requestDate
     * @return bool|Api\StructType\OrderStatusWS[]
     */
    public function getOrderStatusFeed($requestDate)
    {
        $get = new Api\ServiceType\Get($this->getOptions());

        if ($get->getDailyOrderStatusFeed(
                new Api\StructType\GetDailyOrderStatusFeed(
                    new Api\StructType\DailyOrderStatusRequestWS($this->helper->getClientReferenceNumber(), $this->helper->getPassword(), $requestDate, $this->helper->getUsername())
                )
            ) !== false) {
            $result = $get->getResult()->getReturn();

            if (!$result->errors) {
                return $result->orderStatus->OrderStatusWS;
            } else {
                printf("Error: %s", $get->getLastError());
                return false;
            }
        } else {
            printf("Error: %s", $get->getLastError());
            return false;
        }
    }

    /**
     * @param $parameters
     * @return Api\ArrayType\ArrayOfOrderResponseWS|null
     */
    public function placeOrder($parameters)
    {
        $place = new Api\ServiceType\Place($this->getOptions());
        $lineItems = [];

        foreach ($parameters['information']['orderLines'] as $line) {
            $lineItems[] = new Api\StructType\OrderLineItemWS(
                $line['itemPrice'],
                $line['lineNumber'],
                $line['partNumber'],
                $line['quantityOrdered'],
                $line['subtotal'],
                $line['tax'],
                $line['total']
            );
        }

        $order = [];
        $order[] = new Api\StructType\PCIOrderRequestWS(
            $this->helper->getClientReferenceNumber(),
            new Api\StructType\OrderWS(
                null,
                $parameters['information']['customerReferenceNumber'],
                null,
                $parameters['information']['numberOfLines'],
                $parameters['information']['orderDate'],
                new Api\ArrayType\ArrayOfOrderLineItemWS($lineItems),
                $parameters['information']['orderReferenceNumber'],
                $parameters['information']['shipmentMethod'],
                null,
                $parameters['information']['shippingHandling'],
                $parameters['information']['subtotal'],
                $parameters['information']['tax'],
                $parameters['information']['total'],
                null
            ),
            $this->helper->getPassword(),
            new Api\StructType\LocationWS(
                new Api\StructType\AddressWS(
                    $parameters['address']['city'],
                    $parameters['address']['country'],
                    $parameters['address']['line1'],
                    $parameters['address']['line2'],
                    $parameters['address']['postalCode'],
                    $parameters['address']['state']
                ),
                new Api\StructType\PersonWS(
                    $parameters['person']['company'],
                    $parameters['person']['email'],
                    null,
                    $parameters['person']['firstname'],
                    $parameters['person']['lastname'],
                    $parameters['person']['phone'],
                    null,
                    null
                )
            ),
            $this->helper->getUsername()
        );

        $place->placeOrder(
            new Api\StructType\PlaceOrder(
                new Api\ArrayType\ArrayOfPCIOrderRequestWS($order)
            )
        );


        $result = $place->getResult()->getReturn();

        return $result;
    }
}