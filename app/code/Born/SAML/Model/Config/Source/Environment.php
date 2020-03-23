<?php

namespace Born\SAML\Model\Config\Source;

/**
 * Class Environment
 * @package Born\SAML\Model\Config\Source
 */
class Environment implements \Magento\Framework\Option\ArrayInterface{

    const DEVELOPMENT = 'Intel_realsenseDEV';
    const PREPRODUCTION = 'Intel_resalsensePP';
    const PRODUCTION = 'Intel_realsensePROD';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::DEVELOPMENT,     'label' => __('Development')],
            ['value' => self::PREPRODUCTION,   'label' => __('PreProduction')],
            ['value' => self::PRODUCTION,      'label' => __('Production')],
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {

        return [
            self::DEVELOPMENT   => __('Development'),
            self::PREPRODUCTION => __('PreProduction'),
            self::PRODUCTION    => __('Production'),
            ];
    }
}