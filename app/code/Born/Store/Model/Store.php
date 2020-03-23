<?php

namespace Born\Store\Model;

/**
 * Class Store
 * @package Born\Store\Model
 */
class Store extends \Magento\Store\Model\Store
{
    /**
     * @param string $url
     * @return string
     */
    protected function _updatePathUseStoreView($url)
    {
        if ($this->isUseStoreInUrl()) {
            // TODO: might be good to add this in the configuration
            if($this->getCode() == 'en'){
                $url .= '/';
            }else{
                $url .= $this->getCode() . '/';
            }

        }
        return $url;
    }
}