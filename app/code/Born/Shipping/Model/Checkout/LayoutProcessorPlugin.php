<?php
/**
 * Copyright (c) 2018 BORN Group, Inc. All rights reserved
 * @author Giovanni
 */
namespace Born\Shipping\Model\Checkout;
use Magento\Checkout\Block\Checkout\LayoutProcessor;
use Born\Shipping\Model\POBoxConfigProvider;
class LayoutProcessorPlugin
{
   protected $poboxstatus;
      /**
     * @var POBoxConfigProvider
     */
   public function __construct(
        POBoxConfigProvider $poboxstatus
    ) {
        $this->poboxstatus = $poboxstatus;
      
    }
	/**
 * @param \Aheadworks\OneStepCheckout\Model\Layout\Processor\AddressAttributes $subject
 * @param array $jsLayout
 * @return array
 */
public function afterProcess(LayoutProcessor $subject, array $jsLayout) 
   {
	$flag=false;
	if($this->poboxstatus->getConfig()==1)
	{
	$flag=true;
	}
    $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
            ['shippingAddress']['children']['shipping-address-fieldset']['children']['street'] = [
        'component' => 'Magento_Ui/js/form/components/group',
        'label' => __('Street Address'),
        'required' => true,
        'dataScope' => 'shippingAddress.street',
        'provider' => 'checkoutProvider',
        'sortOrder' => 60,
        'type' => 'group',
        'additionalClasses' => 'street',
        'children' => [
                [
                'component' => 'Magento_Ui/js/form/element/abstract',
                'config' => [
                    'customScope' => 'shippingAddress',
                    'template' => 'ui/form/field',
                    'elementTmpl' => 'ui/form/element/input'
                ],
                'dataScope' => '0',
                'provider' => 'checkoutProvider',
                'validation' => ['required-entry' => true,"validate-pobox"=>$flag,"min_text_len‌​gth" => 1, "max_text_length" =>225],
            ],
                [
                'component' => 'Magento_Ui/js/form/element/abstract',
                'config' => [
                    'customScope' => 'shippingAddress',
                    'template' => 'ui/form/field',
                    'elementTmpl' => 'ui/form/element/input'
                ],
                
            ]
        ]
    ];
    return $jsLayout;
    }
}