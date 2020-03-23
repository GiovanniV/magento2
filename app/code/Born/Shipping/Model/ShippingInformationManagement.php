<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\Shipping\Model;
use Magento\Checkout\Api\Data\ShippingInformationInterface;
use Magento\Checkout\Model\ShippingInformationManagement as CoresShippingInformationManagement;
use Magento\Quote\Model\Quote;
use Magento\Quote\Api\Data\AddressInterface;
use Magento\Quote\Api\Data\CartInterface;
/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ShippingInformationManagement extends CoresShippingInformationManagement
{   
    /**
     * {@inheritDoc}
     */
    public function saveAddressInformation($cartId,ShippingInformationInterface $addressInformation
    ) {
        $address = $addressInformation->getShippingAddress();
        $billingAddress = $addressInformation->getBillingAddress();
        $carrierCode = $addressInformation->getShippingCarrierCode();
        $methodCode = $addressInformation->getShippingMethodCode();

        if (!$address->getCustomerAddressId()) {
            $address->setCustomerAddressId(null);
        }

        if (!$address->getCountryId()) {
            throw new StateException(__('Shipping address is not set'));
        }

        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $this->quoteRepository->getActive($cartId);
        $address->setLimitCarrier($carrierCode);
        $quote = $this->prepareShippingAssignmentboomi($quote, $address, $carrierCode . '_' . $methodCode);
        $this->validateQuoteboomi($quote);
        $quote->setIsMultiShipping(false);

        if ($billingAddress) {
            $quote->setBillingAddress($billingAddress);
        }

        try {
            $this->quoteRepository->save($quote);
        } catch (\Exception $e) {
            $this->logger->critical($e);
            throw new InputException(__('Unable to save shipping information. Please check input data.'));
        }

        $shippingAddress = $quote->getShippingAddress();

        /*if (!$shippingAddress->getShippingRateByCode($shippingAddress->getShippingMethod())) {
            throw new NoSuchEntityException(
                __('Carrier with such method not found: %1, %2', $carrierCode, $methodCode)
            );
        }*/

        /** @var \Magento\Checkout\Api\Data\PaymentDetailsInterface $paymentDetails */
        $paymentDetails = $this->paymentDetailsFactory->create();
        $paymentDetails->setPaymentMethods($this->paymentMethodManagement->getList($cartId));
        $paymentDetails->setTotals($this->cartTotalsRepository->get($cartId));
        return $paymentDetails;
    }

   protected function validateQuoteboomi(Quote $quote)
    {
        if (0 == $quote->getItemsCount()) {
            throw new InputException(__('Shipping method is not applicable for empty cart'));
        }
    }

 
    private function prepareShippingAssignmentboomi(CartInterface $quote, AddressInterface $address, $method)
    {
        $cartExtension = $quote->getExtensionAttributes();
        if ($cartExtension === null) {
            $cartExtension = $this->cartExtensionFactory->create();
        }

        $shippingAssignments = $cartExtension->getShippingAssignments();
        if (empty($shippingAssignments)) {
            $shippingAssignment = $this->shippingAssignmentFactory->create();
        } else {
            $shippingAssignment = $shippingAssignments[0];
        }

        $shipping = $shippingAssignment->getShipping();
        if ($shipping === null) {
            $shipping = $this->shippingFactory->create();
        }

        $shipping->setAddress($address);
        $shipping->setMethod($method);
        $shippingAssignment->setShipping($shipping);
        $cartExtension->setShippingAssignments([$shippingAssignment]);
        return $quote->setExtensionAttributes($cartExtension);
    }
 
}
