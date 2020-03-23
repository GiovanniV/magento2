<?php
/**
 * Born_Catalog
 *
 * PHP version 5.x-7.x
 *
 * @category  PHP
 * @package   Born\Catalog
 * @author    Born Support <support@borngroup.com>
 * @copyright 2018 Copyright BORN Commerce Pvt Ltd, https://www.borngroup.com/
 * @license   https://www.borngroup.com/ Private
 */

namespace Born\Catalog\Block\Product\View;

class Attributes extends \Magento\Catalog\Block\Product\View\Attributes
{
    /**
     *
     * Added Attribute Sort order
     *
     * @param array $excludeAttr
     * @return array
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function getAdditionalData(array $excludeAttr = [])
    {
        $data = [];
        $product = $this->getProduct();
        $attributes = $product->getAttributes();
        foreach ($attributes as $attribute) {
            if ($attribute->getIsVisibleOnFront() && !in_array($attribute->getAttributeCode(), $excludeAttr)) {
                $value = $attribute->getFrontend()->getValue($product);

                if ($value instanceof Phrase) {
                    $value = (string)$value;
                } elseif ($attribute->getFrontendInput() == 'price' && is_string($value)) {
                    $value = $this->priceCurrency->convertAndFormat($value);
                }

                if (is_string($value) && strlen($value)) {
                    $data[$attribute->getAttributeCode()] = [
                        'label' => __($attribute->getStoreLabel()),
                        'value' => $value,
                        'code' => $attribute->getAttributeCode(),
                        'display_order' => $attribute->getFrontendDisplayOrder()
                    ];
                }
            }
        }
        $newDataArr = [];
        foreach ($data as $newData) {
            $newDataArr[] = $newData['display_order'];
        }
        array_multisort($newDataArr, SORT_ASC, $data);
        return $data;
    }
}
