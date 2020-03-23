<?php

namespace Born\Hibbert\Model\Api;

/**
 * Class which returns the class map definition
 * @package
 */
class ClassMap
{
    /**
     * Returns the mapping between the WSDL Structs and generated Structs' classes
     * This array is sent to the \SoapClient when calling the WS
     * @return string[]
     */
    final public static function get()
    {
        return array(
            'ErrorCodeWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\ErrorCodeWS',
            'OrderStatusWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderStatusWS',
            'InventoryItemRequestWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\InventoryItemRequestWS',
            'LocationWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\LocationWS',
            'DailyOrderStatusRequestWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\DailyOrderStatusRequestWS',
            'OrderStatusRequestWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderStatusRequestWS',
            'DailyOrderStatusResponseWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\DailyOrderStatusResponseWS',
            'ArrayOfOrderStatusWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfOrderStatusWS',
            'InventoryResponseWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\InventoryResponseWS',
            'OrderResponseWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderResponseWS',
            'ArrayOfPCIOrderRequestWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfPCIOrderRequestWS',
            'InventoryItemResponseWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\InventoryItemResponseWS',
            'PCIOrderRequestWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\PCIOrderRequestWS',
            'ArrayOfOrderLineItemWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfOrderLineItemWS',
            'AddressWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\AddressWS',
            'OrderStatusResponseWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderStatusResponseWS',
            'InventoryRequestWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\InventoryRequestWS',
            'ArrayOfOrderLineItemStatusWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfOrderLineItemStatusWS',
            'ArrayOfErrorCodeWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfErrorCodeWS',
            'PersonWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\PersonWS',
            'OrderLineItemStatusWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderLineItemStatusWS',
            'InventoryWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\InventoryWS',
            'ArrayOfOrderResponseWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfOrderResponseWS',
            'OrderWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderWS',
            'ArrayOfInventoryWS' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfInventoryWS',
            'OrderLineItemWS' => '\\Born\\Hibbert\\Model\\Api\\StructType\\OrderLineItemWS',
            'ArrayOfString' => '\\Born\\Hibbert\\Model\\Api\\ArrayType\\ArrayOfString',
            'getOrderStatus' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetOrderStatus',
            'getOrderStatusResponse' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetOrderStatusResponse',
            'getInventory' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetInventory',
            'getInventoryResponse' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetInventoryResponse',
            'getInventoryItem' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetInventoryItem',
            'getInventoryItemResponse' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetInventoryItemResponse',
            'getDailyOrderStatusFeed' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetDailyOrderStatusFeed',
            'getDailyOrderStatusFeedResponse' => '\\Born\\Hibbert\\Model\\Api\\StructType\\GetDailyOrderStatusFeedResponse',
            'placeOrder' => '\\Born\\Hibbert\\Model\\Api\\StructType\\PlaceOrder',
            'placeOrderResponse' => '\\Born\\Hibbert\\Model\\Api\\StructType\\PlaceOrderResponse',
            'Exception' => '\\Born\\Hibbert\\Model\\Api\\StructType\\Exception',
        );
    }
}
