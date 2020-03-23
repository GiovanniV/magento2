<?php
/**
 * Copyright © 2018 BORN Commerce, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Born\Carousel\Block\Adminhtml\Carousel\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveAndContinueButton
 * @package Born\Carousel\Block\Adminhtml\Carousel\Edit
 */
class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * SaveAndContinueButton
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'saveAndContinueEdit'],
                ],
            ],
            'sort_order' => 80,
        ];
    }
}
