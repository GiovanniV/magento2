<?php

namespace Born\Mkdata\Model\Adyen;

class Cron extends \Adyen\Payment\Model\Cron
{
    public $restrictedStatuses = [
        \Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA
    ];

    protected function _setPaymentAuthorized($manualReviewComment = true, $createInvoice = false)
    {
        $this->_adyenLogger->addAdyenNotificationCronjob('Set order to authorised');

        // if full amount is captured create invoice
        $currency = $this->_order->getOrderCurrencyCode();
        $amount = $this->_value;
        $orderAmount = (int)$this->_adyenHelper->formatAmount($this->_order->getGrandTotal(), $currency);

        // create invoice for the capture notification if you are on manual capture
        if ($createInvoice == true && $amount == $orderAmount) {
            $this->_adyenLogger->addAdyenNotificationCronjob(
                'amount notification:' . $amount . ' amount order:' . $orderAmount
            );
            $this->_createInvoice();
        }

        $status = $this->_getConfigData(
            'payment_authorized',
            'adyen_abstract',
            $this->_order->getStoreId()
        );

        // virtual order can have different status
        if ($this->_order->getIsVirtual()) {
            $this->_adyenLogger->addAdyenNotificationCronjob('Product is a virtual product');
            $virtualStatus = $this->_getConfigData(
                'payment_authorized_virtual',
                'adyen_abstract',
                $this->_order->getStoreId()
            );
            if ($virtualStatus != "") {
                $status = $virtualStatus;
            }
        }

        // check for boleto if payment is totally paid
        if ($this->_paymentMethodCode() == "adyen_boleto") {
            // check if paid amount is the same as orginal amount
            $orginalAmount = $this->_boletoOriginalAmount;
            $paidAmount = $this->_boletoPaidAmount;

            if ($orginalAmount != $paidAmount) {
                // not the full amount is paid. Check if it is underpaid or overpaid
                // strip the  BRL of the string
                $orginalAmount = str_replace("BRL", "", $orginalAmount);
                $orginalAmount = floatval(trim($orginalAmount));

                $paidAmount = str_replace("BRL", "", $paidAmount);
                $paidAmount = floatval(trim($paidAmount));

                if ($paidAmount > $orginalAmount) {
                    $overpaidStatus = $this->_getConfigData(
                        'order_overpaid_status',
                        'adyen_boleto',
                        $this->_order->getStoreId()
                    );
                    // check if there is selected a status if not fall back to the default
                    $status = (!empty($overpaidStatus)) ? $overpaidStatus : $status;
                } else {
                    $underpaidStatus = $this->_getConfigData(
                        'order_underpaid_status',
                        'adyen_boleto',
                        $this->_order->getStoreId()
                    );
                    // check if there is selected a status if not fall back to the default
                    $status = (!empty($underpaidStatus)) ? $underpaidStatus : $status;
                }
            }
        }

        $comment = "Adyen Payment Successfully completed";

        // if manual review is true use the manual review status if this is set
        if ($manualReviewComment == true && $this->_fraudManualReview) {
            // check if different status is selected
            $fraudManualReviewStatus = $this->_getFraudManualReviewStatus();
            if ($fraudManualReviewStatus != "") {
                $status = $fraudManualReviewStatus;
                $comment = "Adyen Payment is in Manual Review check the Adyen platform";
            }
        }

        $previouslyFlagged = $this->checkOrderPreviouslyFlagged($this->_order->getStatusHistories());

        if ($previouslyFlagged) {
            $status = $previouslyFlagged;
            $this->_setState('processing');
        } else if ($this->checkOrderIsPreorder()) {
            $status = \Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_HOLD_PREORDER;
            $this->_setState('processing');
        } else {
            $status = (!empty($status)) ? $status : $this->_order->getStatus();
            $this->_setState($status);
        }

        $this->_order->addStatusHistoryComment(__($comment), $status);

        $this->_adyenLogger->addAdyenNotificationCronjob(
            'Order status is changed to authorised status, status is ' . $status
        );
    }

    public function checkOrderPreviouslyFlagged($histories)
    {
        $previousStatuses = [];

        foreach ($histories as $history) {
            $previousStatuses[] = $history['status'];
        }

        $heldForReview = false;

        if (in_array(\Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA, $previousStatuses)) {
            $heldForReview = true;
        }

        if ($heldForReview) {
            if (!in_array(\Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA_APPROVED, $previousStatuses)) {
                if ($heldForReview) {
                    return \Born\Mkdata\Observer\PlaceOrder::MAGENTO_STATUS_PENDING_MKDATA;
                }
            }
        }

        return false;
    }

    public function checkOrderIsPreorder()
    {
        $items = $this->_order->getItems();

        foreach ($items as $item) {
            if ($item->getProduct()->getExtensionAttributes()->getStockItem()->getBackorders() == '101') {
                return true;
            }
        }

        return false;
    }
}